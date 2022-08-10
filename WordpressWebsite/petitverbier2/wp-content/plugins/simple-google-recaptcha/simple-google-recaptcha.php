<?php
/*
* Plugin Name: Simple Google reCAPTCHA
* Description: Simply protect your WordPress against spam comments and brute-force attacks, thanks to Google reCAPTCHA!
* Version: 3.9
* Author: Michal Novák
* Author URI: https://www.novami.cz
* License: GPLv3
* Text Domain: simple-google-recaptcha
*/

use SimpleGoogleRecaptchaEntity as Entity;


if (!defined('ABSPATH')) {
    die('Direct access not allowed!');
}

include sprintf('%s/entity.php', dirname(__FILE__));

/**
 * Class SimpleGoogleRecaptcha
 */
class SimpleGoogleRecaptcha
{
    /** @var string */
    const UPDATE = 'update';

    /** @var string */
    const DISABLE = 'disable';

    /** @var string */
    const KEY_SUFIX = '_key';

    /** @var string */
    const SGR_V2 = 'v2 "I\'m not a robot" Checkbox';

    /** @var string */
    const SGR_V3 = 'v3';

    /** @var string */
    const SGR_MAIN = 'sgr_main';

    /** @var string */
    const SGR_ACTION = 'sgr_action';

    /** @var SimpleGoogleRecaptcha */
    public static $instance;

    /** @var string */
    private $pluginName;

    /** @var Entity[] */
    private $options;

    /**
     * SimpleGoogleRecaptcha constructor.
     */
    private function __construct()
    {
        add_action('init', [$this, 'run']);
        add_action('activated_plugin', [$this, 'activation']);
    }

    /**
     * @return SimpleGoogleRecaptcha
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param int $type
     * @return int
     */
    private function getOptionFilter($type)
    {
        return $type === Entity::INT ? FILTER_SANITIZE_NUMBER_INT : FILTER_SANITIZE_FULL_SPECIAL_CHARS;
    }

    /**
     * @return void
     */
    private function loadSettings()
    {
        foreach ($this->options as $id => $option) {
            $type = $option->getType();
            $filter = $this->getOptionFilter($type);
            $filteredValue = filter_var(get_option($id), $filter);
            $option->setValue($type === Entity::INT ? intval($filteredValue) : strval($filteredValue));
        }
    }

    /**
     * @param string $id
     * @return int|string
     */
    private function getOptionValue($id)
    {
        return $this->options[$id]->getValue();
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->pluginName = get_file_data(__FILE__, ['Name' => 'Plugin Name'])['Name'];

        $this->options = [
            Entity::SITE_KEY => new Entity(__('Site Key', 'simple-google-recaptcha'), Entity::STRING),
            Entity::SECRET_KEY => new Entity(__('Secret Key', 'simple-google-recaptcha'), Entity::STRING),
            Entity::LOGIN_DISABLE => new Entity(__('Disable on login form', 'simple-google-recaptcha'), Entity::INT),
            Entity::VERSION => new Entity(__('Enable reCAPTCHA v3', 'simple-google-recaptcha'), Entity::INT),
            Entity::BADGE_HIDE => new Entity(__('Hide reCAPTCHA v3 badge', 'simple-google-recaptcha'), Entity::INT),
        ];

        $this->updateSettings();

        $this->loadSettings();

        $this->disableProtection();

        $this->enqueueMain();

        $this->frontend();

        add_filter(sprintf('plugin_action_links_%s', plugin_basename(__FILE__)), [$this, 'actionLinks']);

        add_action('admin_menu', [$this, 'adminMenu']);
    }

    /**
     * @return void
     */
    public function updateSettings()
    {
        $postAction = strval(filter_input(INPUT_POST, self::SGR_ACTION, FILTER_SANITIZE_SPECIAL_CHARS));

        if ($postAction === self::UPDATE && current_user_can('manage_options')) {
            $hash = null;
            foreach ($this->options as $key => $option) {
                $postValue = filter_input(INPUT_POST, $key, $this->getOptionFilter($option->getType()));

                if ($postValue) {
                    update_option($key, $postValue);

                    if (substr($key, -strlen(self::KEY_SUFIX)) === self::KEY_SUFIX) {
                        $hash .= $postValue;
                    }
                } else {
                    delete_option($key);
                }
            }

            setcookie(Entity::HASH, md5($hash), time() + 60 * 60 * 24 * 10, '/');

            echo sprintf('<div class="notice notice-success"><p><strong>%s</strong></p></div>', __('Settings saved!', 'simple-google-recaptcha'));
        }
    }

    /**
     * @param $links
     * @return array
     */
    public function actionLinks($links)
    {
        return array_merge(['settings' => sprintf('<a href="options-general.php%s">%s</a>', Entity::PAGE_QUERY, __('Settings', 'simple-google-recaptcha'))], $links);
    }

    /**
     * @param $plugin
     * @return void
     */
    public function activation($plugin)
    {
        if ($plugin === plugin_basename(__FILE__) && (!get_option(Entity::SITE_KEY) || !get_option(Entity::SECRET_KEY))) {
            exit(wp_redirect(admin_url(sprintf('options-general.php%s', Entity::PAGE_QUERY))));
        }
    }

    /**
     * @return void
     */
    public function optionsPage()
    {
        echo sprintf('<div class="wrap"><h1>%s - %s</h1><form method="post" action="%s">', $this->pluginName, __('Settings', 'simple-google-recaptcha'), Entity::PAGE_QUERY);

        settings_fields('sgr_header_section');
        do_settings_sections('sgr_options');

        echo sprintf('<input type="hidden" name="%s" value="%s">', self::SGR_ACTION, self::UPDATE);

        submit_button();

        echo sprintf('%s</form>%s</div>', PHP_EOL, $this->messageProtectionStatus());
    }

    /**
     * @return void
     */
    public function adminMenu()
    {
        add_submenu_page('options-general.php', $this->pluginName, 'Google reCAPTCHA', 'manage_options', 'sgr_options', [$this, 'optionsPage']);
        add_action('admin_init', [$this, 'displayOptions']);
    }

    /**
     * @return void
     */
    public function display_sgr_site_key()
    {
        echo sprintf('<input type="text" name="%1$s" class="regular-text" id="%1$s" value="%2$s" />', Entity::SITE_KEY, $this->getOptionValue(Entity::SITE_KEY));
    }

    /**
     * @return void
     */
    public function display_sgr_secret_key()
    {
        echo sprintf('<input type="text" name="%1$s" class="regular-text" id="%1$s" value="%2$s" />', Entity::SECRET_KEY, $this->getOptionValue(Entity::SECRET_KEY));
    }

    /**
     * @return void
     */
    public function display_sgr_login_disable()
    {
        echo sprintf('<input type="checkbox" name="%1$s" id="%1$s" value="1" %2$s />', Entity::LOGIN_DISABLE, checked(1, $this->getOptionValue(Entity::LOGIN_DISABLE), false));
    }

    /**
     * @return void
     */
    public function display_sgr_version()
    {
        echo sprintf('<input type="checkbox" name="%1$s" id="%1$s" value="3" %2$s />', Entity::VERSION, checked(3, $this->getOptionValue(Entity::VERSION), false));
    }

    /**
     * @return void
     */
    public function display_sgr_badge_hide()
    {
        echo sprintf('<input type="checkbox" name="%1$s" id="%1$s" value="1" %2$s />', Entity::BADGE_HIDE, checked(1, $this->getOptionValue(Entity::BADGE_HIDE), false));
    }

    /**
     * @return void
     */
    public function displayOptions()
    {
        add_settings_section('sgr_header_section', __('Google reCAPTCHA keys', 'simple-google-recaptcha'), [], 'sgr_options');

        foreach ($this->options as $key => $option) {
            add_settings_field($key, $option->getName(), [$this, sprintf('display_%s', $key)], 'sgr_options', 'sgr_header_section');
            register_setting('sgr_header_section', $key);
        }
    }

    /**
     * @return void
     */
    public function enqueueMain()
    {
        $jsName = 'sgr.js';
        $jsPath = sprintf('%s%s', plugin_dir_path(__FILE__), $jsName);
        wp_enqueue_script(self::SGR_MAIN, sprintf('%s%s', plugin_dir_url(__FILE__), $jsName), [], filemtime($jsPath));

        wp_localize_script(self::SGR_MAIN, self::SGR_MAIN, [Entity::SITE_KEY => $this->getOptionValue(Entity::SITE_KEY)]);

        $cssName = 'sgr.css';
        $cssPath = sprintf('%s%s', plugin_dir_path(__FILE__), $cssName);
        wp_enqueue_style(self::SGR_MAIN, sprintf('%s%s', plugin_dir_url(__FILE__), $cssName), [], filemtime($cssPath));
    }

    /**
     * @return void
     */
    public function enqueueScripts()
    {
        $apiUrlBase = sprintf('https://www.recaptcha.net/recaptcha/api.js?hl=%s', get_locale());
        $jsUrl = sprintf('%s&onload=sgr_2&render=explicit', $apiUrlBase);

        if ($this->getOptionValue(Entity::VERSION) === 3) {
            $jsUrl = sprintf('%s&render=%s&onload=sgr_3', $apiUrlBase, $this->getOptionValue(Entity::SITE_KEY));
        }

        wp_enqueue_script('sgr_recaptcha', $jsUrl, [], time());
    }

    /**
     * @return void
     */
    public function frontend()
    {
        $rcpActivate = !is_user_logged_in() && !wp_doing_ajax() && !function_exists('wpcf7_contact_form_shortcode');
        $recaptchaSiteKey = $this->getOptionValue(Entity::SITE_KEY);
        $recaptchaSecretKey = $this->getOptionValue(Entity::SECRET_KEY);

        if ($rcpActivate && $recaptchaSiteKey && $recaptchaSecretKey) {
            $sgr_display_list = [
                'bp_after_signup_profile_fields',
                'comment_form_after_fields',
                'lostpassword_form',
                'register_form',
                'woocommerce_lostpassword_form',
                'woocommerce_register_form'
            ];

            $sgr_verify_list = [
                'bp_signup_validate',
                'lostpassword_post',
                'preprocess_comment',
                'registration_errors',
                'woocommerce_register_post'
            ];

            if (!$this->getOptionValue(Entity::LOGIN_DISABLE)) {
                array_push($sgr_display_list, 'login_form', 'woocommerce_login_form');
                $sgr_verify_list[] = 'authenticate';
            }

            $sgrDisplay = $this->getOptionValue(Entity::VERSION) === 3 ? 'v3Display' : 'v2Display';

            foreach ($sgr_display_list as $sgr_display) {
                add_action($sgr_display, [$this, 'enqueueScripts']);
                add_action($sgr_display, [$this, $sgrDisplay]);
            }

            foreach ($sgr_verify_list as $sgr_verify) {
                add_action($sgr_verify, [$this, 'verify']);
            }
        }
    }

    /**
     * @return void
     */
    public function v2Display()
    {
        $this->displayDisableProtection();

        echo '<div class="sgr-main"></div>';
    }

    /**
     * @return void
     */
    public function v3Display()
    {
        $badgeText = null;

        if ($this->getOptionValue(Entity::BADGE_HIDE)) {
            $cssName = 'sgr_hide.css';
            $cssPath = sprintf('%s%s', plugin_dir_path(__FILE__), $cssName);
            wp_enqueue_style('sgr_hide', sprintf('%s%s', plugin_dir_url(__FILE__), $cssName), [], filemtime($cssPath));

            $badgeText = sprintf('%s<p class="sgr-infotext">%s</p>', PHP_EOL, __('This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.', 'simple-google-recaptcha'));
        }

        $this->displayDisableProtection();

        echo sprintf('<input type="hidden" name="g-recaptcha-response" class="sgr-main">%s', $badgeText);
    }

    /**
     * @return void
     */
    private function displayDisableProtection()
    {
        if ($this->adminCookieHash()) {
            echo sprintf('<p class="sgr-infotext"><a href="?%s=%s">%s</a></p>', self::SGR_ACTION, self::DISABLE, __('Emergency reCAPTCHA deactivate', 'simple-google-recaptcha'));
        }
    }

    /**
     * @return void
     */
    private function disableProtection()
    {
        $getAction = strval(filter_input(INPUT_GET, self::SGR_ACTION, FILTER_SANITIZE_SPECIAL_CHARS));

        if ($getAction === self::DISABLE && $this->adminCookieHash()) {
            $keys = [
                Entity::SITE_KEY,
                Entity::SECRET_KEY
            ];

            foreach ($keys as $key) {
                delete_option($key);
                $this->options[$key]->setValue('');
            }
        }
    }

    /**
     * @param $error_code
     * @return string|void
     */
    private function errorMessage($error_code)
    {
        switch ($error_code) {
            case 'missing-input-secret':
                return __('The secret parameter is missing.', 'simple-google-recaptcha');
            case 'missing-input-response':
                return __('The response parameter is missing.', 'simple-google-recaptcha');
            case 'invalid-input-secret':
                return __('The secret parameter is invalid or malformed.', 'simple-google-recaptcha');
            case 'invalid-input-response':
                return __('The response parameter is invalid or malformed.', 'simple-google-recaptcha');
            case 'bad-request':
                return __('The request is invalid or malformed.', 'simple-google-recaptcha');
            case 'timeout-or-duplicate':
                return __('The response is no longer valid: either is too old or has been used previously.', 'simple-google-recaptcha');
            default:
                return __('Unknown error.', 'simple-google-recaptcha');
        }
    }

    /**
     * @param $response
     * @return array|mixed
     */
    private function recaptchaResponseParse($response)
    {
        $secretKey = $this->getOptionValue(Entity::SECRET_KEY);
        $rcpUrl = sprintf('https://www.recaptcha.net/recaptcha/api/siteverify?secret=%s&response=%s', $secretKey, $response);
        $response = (array)wp_remote_get($rcpUrl);

        $falseResponse = [
            'success' => false,
            'error-codes' => ['general-fail']
        ];

        return isset($response['body']) ? json_decode($response['body'], 1) : $falseResponse;
    }

    /**
     * @param $input
     * @return mixed|void
     */
    public function verify($input)
    {
        if (!empty($_POST)) {
            $response = strval(filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $parsedResponse = $this->recaptchaResponseParse($response);

            if (isset($parsedResponse['success']) && $parsedResponse['success'] === true) {
                return $input;
            } else {
                $errorTitle = 'reCAPTCHA';
                $errorParams = ['response' => 403, 'back_link' => 1];
                $failedMsg = '<p><strong>%s:</strong> Google reCAPTCHA %s. %s</p>';
                $error = __('Error', 'simple-google-recaptcha');
                $verificationFailed = __('verification failed', 'simple-google-recaptcha');

                if (!$response) {
                    wp_die(sprintf($failedMsg, $error, $verificationFailed, __('Do you have JavaScript enabled?', 'simple-google-recaptcha')), $errorTitle, $errorParams);
                }

                $recaptcha_error_code = isset($parsedResponse['error-codes'][0]) ? $parsedResponse['error-codes'][0] : null;
                wp_die(sprintf($failedMsg, $error, $verificationFailed, $this->errorMessage($recaptcha_error_code)), $errorTitle, $errorParams);
            }
        }
    }

    /**
     * @return string
     */
    public function messageProtectionStatus()
    {
        $class = 'warning';
        $name = __('Notice', 'simple-google-recaptcha');
        $status = __('is enabled', 'simple-google-recaptcha');
        $msg = __('Keep on mind, that in case of emergency, you can disable this plugin via FTP access, just rename the plugin folder.', 'simple-google-recaptcha');

        if (!$this->getOptionValue(Entity::SITE_KEY) || !$this->getOptionValue(Entity::SECRET_KEY)) {
            $class = 'error';
            $name = __('Warning', 'simple-google-recaptcha');
            $status = __('is disabled', 'simple-google-recaptcha');
            $msg = __('You have to <a href="https://www.google.com/recaptcha/admin" rel="external">register your domain</a>, get required Google reCAPTCHA keys %s and save them bellow.', 'simple-google-recaptcha');
        }

        $type = $this->getOptionValue(Entity::VERSION) === 3 ? self::SGR_V3 : self::SGR_V2;

        return sprintf('<div class="notice notice-%s"><p><strong>%s:</strong> Google reCAPTCHA %s!</p><p>%s</p></div>', $class, $name, $status, sprintf($msg, $type));
    }

    /**
     * @return bool
     */
    public function adminCookieHash()
    {
        $cookieHash = filter_input(INPUT_COOKIE, Entity::HASH, FILTER_SANITIZE_SPECIAL_CHARS);

        if ($cookieHash === md5($this->getOptionValue(Entity::SITE_KEY) . $this->getOptionValue(Entity::SECRET_KEY))) {
            return true;
        } else {
            return false;
        }
    }
}

SimpleGoogleRecaptcha::getInstance();
