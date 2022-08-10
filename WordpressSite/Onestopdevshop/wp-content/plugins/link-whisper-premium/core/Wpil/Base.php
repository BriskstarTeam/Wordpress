<?php

/**
 * Base controller
 */
class Wpil_Base
{
    public static $report_menu;

    /**
     * Register services
     */
    public function register()
    {
        add_action('admin_init', [$this, 'init']);
        add_action('admin_menu', [$this, 'addMenu']);
        add_action('add_meta_boxes', [$this, 'addMetaBoxes']);
        add_action('admin_enqueue_scripts', [$this, 'addScripts']);
        add_action('plugin_action_links_' . WPIL_PLUGIN_NAME, [$this, 'showSettingsLink']);
        add_action('upgrader_process_complete', [$this, 'upgrade_complete'], 10, 2);
        add_action('wp_ajax_get_post_suggestions', ['Wpil_Suggestion','ajax_get_post_suggestions']);
        add_action('wp_ajax_update_suggestion_display', ['Wpil_Suggestion','ajax_update_suggestion_display']);
        add_action('wp_ajax_wpil_csv_export', ['Wpil_Export','ajax_csv']);
    }

    /**
     * Initial function
     */
    function init()
    {
        $post = self::getPost();

        if (!empty($_GET['csv_export'])) {
            Wpil_Export::csv();
        }

        if (!empty($_GET['type'])) { // if the current page has a "type" value
            $type = $_GET['type'];

            switch ($type) {
                case 'delete_link':
                    Wpil_Link::delete();
                    break;
                case 'inbound_suggestions_page_container':
                    include WP_INTERNAL_LINKING_PLUGIN_DIR . '/templates/inbound_suggestions_page_container.php';
                    exit;
                    break;
            }
        }

        if (!empty($_GET['area'])) {
            switch ($_GET['area']) {
                case 'wpil_export':
                    Wpil_Export::getInstance()->export($post);
                    break;
                case 'wpil_excel_export':
                    $post = self::getPost();
                    if (!empty($post)) {
                        Wpil_Excel::exportPost($post);
                    }
                    break;
            }
        }

        if (!empty($_POST['hidden_action'])) {
            switch ($_POST['hidden_action']) {
                case 'wpil_save_settings':
                    Wpil_Settings::save();
                    break;
                case 'activate_license':
                    Wpil_License::activate();
                    break;
            }
        }

        //add screen options
        add_action("load-" . self::$report_menu, function () {
            add_screen_option( 'report_options', array(
                'option' => 'report_options',
            ) );
        });
    }

    /**
     * This function is used for adding menu and submenus
     *
     *
     * @return  void
     */
    public function addMenu()
    {
        if (!Wpil_License::isValid()) {
            add_menu_page(
                __('Link Whisper', 'wpil'),
                __('Link Whisper', 'wpil'),
                'manage_categories',
                'link_whisper_license',
                [Wpil_License::class, 'init'],
                plugin_dir_url(__DIR__).'../images/lw-icon-16x16.png'
            );

            return;
        }

        add_menu_page(
            __('Link Whisper', 'wpil'),
            __('Link Whisper', 'wpil'),
            'edit_posts',
            'link_whisper',
            [Wpil_Report::class, 'init'],
            plugin_dir_url(__DIR__). '../images/lw-icon-16x16.png'
        );

        if(WPIL_STATUS_LINK_TABLE_EXISTS){
            $page_title = __('Internal Links Report', 'wpil');
            $menu_title = __('Report', 'wpil');
        }else{
            $page_title = __('Internal Links Report', 'wpil');
            $menu_title = __('Complete Install', 'wpil');
        }

        self::$report_menu = add_submenu_page(
            'link_whisper',
            $page_title,
            $menu_title,
            'edit_posts',
            'link_whisper',
            [Wpil_Report::class, 'init']
        );

        // add the advanced functionality if the first scan has been run
        if(WPIL_STATUS_LINK_TABLE_EXISTS){
            add_submenu_page(
                'link_whisper',
                __('Auto-Linking', 'wpil'),
                __('Auto-Linking', 'wpil'),
                'manage_categories',
                'link_whisper_keywords',
                [Wpil_Keyword::class, 'init']
            );

            add_submenu_page(
                'link_whisper',
                __('URL Changer', 'wpil'),
                __('URL Changer', 'wpil'),
                'manage_categories',
                'link_whisper_url_changer',
                [Wpil_URLChanger::class, 'init']
            );
        }
        add_submenu_page(
            'link_whisper',
            __('Settings', 'wpil'),
            __('Settings', 'wpil'),
            'manage_categories',
            'link_whisper_settings',
            [Wpil_Settings::class, 'init']
        );

        add_submenu_page(
            'link_whisper',
            __('License', 'wpil'),
            __('License', 'wpil'),
            'manage_categories',
            'link_whisper_license',
            [Wpil_License::class, 'init']
        );
    }

    /**
     * Get post or term by ID from GET or POST request
     *
     * @return Wpil_Model_Post|null
     */
    public static function getPost()
    {
        if (!empty($_REQUEST['term_id'])) {
            $post = new Wpil_Model_Post((int)$_REQUEST['term_id'], 'term');
        } elseif (!empty($_REQUEST['post_id'])) {
            $post = new Wpil_Model_Post((int)$_REQUEST['post_id']);
        } else {
            $post = null;
        }

        return $post;
    }

    /**
     * Show plugin version
     *
     * @return string
     */
    public static function showVersion()
    {
        $plugin_data = get_plugin_data(WP_INTERNAL_LINKING_PLUGIN_DIR . 'link-whisper.php');

        return "<p style='float: right'>version <b>".$plugin_data['Version']."</b></p>";
    }

    /**
     * Show extended error message
     *
     * @param $errno
     * @param $errstr
     * @param $error_file
     * @param $error_line
     */
    public static function handleError($errno, $errstr, $error_file, $error_line)
    {
        if (stristr($errstr, "WordPress could not establish a secure connection to WordPress.org")) {
            return;
        }

        $file = 'n/a';
        $func = 'n/a';
        $line = 'n/a';
        $debugTrace = debug_backtrace();
        if (isset($debugTrace[1])) {
            $file = isset($debugTrace[1]['file']) ? $debugTrace[1]['file'] : 'n/a';
            $line = isset($debugTrace[1]['line']) ? $debugTrace[1]['line'] : 'n/a';
        }
        if (isset($debugTrace[2])) {
            $func = $debugTrace[2]['function'] ? $debugTrace[2]['function'] : 'n/a';
        }

        $out = "call from <b>$file</b>, $func, $line";

        $trace = '';
        $bt = debug_backtrace();
        $sp = 0;
        foreach($bt as $k=>$v) {
            extract($v);

            $args = '';
            if (isset($v['args'])) {
                $args2 = array();
                foreach($v['args'] as $k => $v) {
                    if (!is_scalar($v)) {
                        $args2[$k] = "Array";
                    }
                    else {
                        $args2[$k] = $v;
                    }
                }
                $args = implode(", ", $args2);
            }

            $file = substr($file,1+strrpos($file,"/"));
            $trace .= str_repeat("&nbsp;",++$sp);
            $trace .= "file=<b>$file</b>, line=$line,
									function=$function(".
                var_export($args, true).")<br>";
        }

        $out .= $trace;

        echo "<b>Error:</b> [$errno] $errstr - $error_file:$error_line<br><br><hr><br><br>$out";
    }

    /**
     * Add meta box to the post edit page
     */
    public static function addMetaBoxes()
    {
        if (Wpil_License::isValid())
        {
            add_meta_box('wpil_link-articles', 'Link Whisper Suggested Links', [Wpil_Base::class, 'showSuggestionsBox'], Wpil_Settings::getPostTypes());
        }
    }

    /**
     * Show meta box on the post edit page
     */
    public static function showSuggestionsBox()
    {
        $post_id = isset($_REQUEST['post']) ? (int)$_REQUEST['post'] : '';
        $user = wp_get_current_user();
        if ($post_id) {
            include WP_INTERNAL_LINKING_PLUGIN_DIR . '/templates/link_list_v2.php';
        }
    }

    /**
     * Add scripts to the admin panel
     *
     * @param $hook
     */
    public static function addScripts($hook)
    {
        if (strpos($_SERVER['REQUEST_URI'], '/post.php') !== false || strpos($_SERVER['REQUEST_URI'], '/term.php') !== false || (!empty($_GET['page']) && $_GET['page'] == 'link_whisper')) {
            wp_enqueue_editor();
        }

        wp_register_script('wpil_sweetalert_script_min', WP_INTERNAL_LINKING_PLUGIN_URL . 'js/sweetalert.min.js', array('jquery'), $ver=false, $in_footer=true);
        wp_enqueue_script('wpil_sweetalert_script_min');

        $js_path = 'js/wpil_admin.js';
        $f_path = WP_INTERNAL_LINKING_PLUGIN_DIR.$js_path;
        $ver = filemtime($f_path);

        wp_register_script('wpil_admin_script', WP_INTERNAL_LINKING_PLUGIN_URL.$js_path, array('jquery'), $ver, $in_footer=true);
        wp_enqueue_script('wpil_admin_script');

        if (!empty($_GET['page']) && $_GET['page'] == 'link_whisper' && !empty($_GET['type']) && $_GET['type'] == 'links') {
            wp_register_script('wpil_report', WP_INTERNAL_LINKING_PLUGIN_URL . 'js/wpil_report.js', array('jquery'), $ver, $in_footer = true);
            wp_enqueue_script('wpil_report');
        }

        if (!empty($_GET['page']) && $_GET['page'] == 'link_whisper' && !empty($_GET['type']) && $_GET['type'] == 'error') {
            wp_register_script('wpil_error', WP_INTERNAL_LINKING_PLUGIN_URL . 'js/wpil_error.js', array('jquery'), $ver, $in_footer = true);
            wp_enqueue_script('wpil_error');
        }

        if (!empty($_GET['page']) && $_GET['page'] == 'link_whisper_keywords') {
            wp_register_script('wpil_keyword', WP_INTERNAL_LINKING_PLUGIN_URL . 'js/wpil_keyword.js', array('jquery'), $ver, $in_footer=true);
            wp_enqueue_script('wpil_keyword');
        }

        if (!empty($_GET['page']) && $_GET['page'] == 'link_whisper_url_changer') {
            wp_register_script('wpil_keyword', WP_INTERNAL_LINKING_PLUGIN_URL . 'js/wpil_url_changer.js', array('jquery'), $ver, $in_footer=true);
            wp_enqueue_script('wpil_keyword');
        }

        $js_path = 'js/wpil_admin_settings.js';
        $f_path = WP_INTERNAL_LINKING_PLUGIN_DIR.$js_path;
        $ver = filemtime($f_path);

        wp_register_script('wpil_admin_settings_script', WP_INTERNAL_LINKING_PLUGIN_URL.$js_path, array('jquery'), $ver, $in_footer=true);
        wp_enqueue_script('wpil_admin_settings_script');

        $style_path = 'css/wpil_admin.css';
        $f_path = WP_INTERNAL_LINKING_PLUGIN_DIR.$style_path;
        $ver = filemtime($f_path);

        wp_register_style('wpil_admin_style', WP_INTERNAL_LINKING_PLUGIN_URL.$style_path, $deps=[], $ver);
        wp_enqueue_style('wpil_admin_style');

        $ajax_url = admin_url('admin-ajax.php');

        $script_params = [];
        $script_params['ajax_url'] = $ajax_url;
        $script_params['completed'] = __('completed', 'wpil');

        $script_params["WPIL_OPTION_REPORT_LAST_UPDATED"] = get_option(WPIL_OPTION_REPORT_LAST_UPDATED);

        wp_localize_script('wpil_admin_script', 'wpil_ajax', $script_params);
    }

    /**
     * Show settings link on the plugins page
     *
     * @param $links
     * @return array
     */
    public static function showSettingsLink($links)
    {
        $links[] = '<a href="admin.php?page=link_whisper_settings">Settings</a>';

        return $links;
    }

    /**
     * Loads default LinkWhisper settings in to database on plugin activation.
     */
    public static function activate()
    {
        // only set default option values if the options are empty
        if('' === get_option(WPIL_OPTION_LICENSE_STATUS, '')){
            update_option(WPIL_OPTION_LICENSE_STATUS, '');
        }
        if('' === get_option(WPIL_OPTION_LICENSE_KEY, '')){
            update_option(WPIL_OPTION_LICENSE_KEY, '');
        }
        if('' === get_option(WPIL_OPTION_LICENSE_DATA, '')){
            update_option(WPIL_OPTION_LICENSE_DATA, '');
        }
        if('' === get_option(WPIL_OPTION_IGNORE_NUMBERS, '')){
            update_option(WPIL_OPTION_IGNORE_NUMBERS, '1');
        }
        if('' === get_option(WPIL_OPTION_POST_TYPES, '')){
            update_option(WPIL_OPTION_POST_TYPES, ['post', 'page']);
        }
        if('' === get_option(WPIL_OPTION_LINKS_OPEN_NEW_TAB, '')){
            update_option(WPIL_OPTION_LINKS_OPEN_NEW_TAB, '0');
        }
        if('' === get_option(WPIL_OPTION_DEBUG_MODE, '')){
            update_option(WPIL_OPTION_DEBUG_MODE, '0');
        }
        if('' === get_option(WPIL_OPTION_UPDATE_REPORTING_DATA_ON_SAVE, '')){
            update_option(WPIL_OPTION_UPDATE_REPORTING_DATA_ON_SAVE, '0');
        }
        if('' === get_option(WPIL_OPTION_IGNORE_WORDS, '')){
            $ignore = "-\r\n" . implode("\r\n", Wpil_Settings::getIgnoreWords()) . "\r\n-";
            update_option(WPIL_OPTION_IGNORE_WORDS, $ignore);
        }
        if('' === get_option(WPIL_LINK_TABLE_IS_CREATED, '')){
            Wpil_Report::setupWpilLinkTable(true);
            // if the plugin is activating and the link table isn't set up, assume this is a fresh install
            update_option('wpil_fresh_install', true); // the link table was created with ver 0.8.3 and was the first major table event, so it should be a safe test for new installs
        }

        Wpil_Link::removeLinkClass();

        self::updateTables();
    }

    /**
     * Runs any update routines after the plugin has been updated.
     */
    public static function upgrade_complete($upgrader_object, $options){
        // If an update has taken place and the updated type is plugins and the plugins element exists
        if( $options['action'] == 'update' && $options['type'] == 'plugin' && isset( $options['plugins'] ) ) {
            // Go through each plugin to see if Link Whisper was updated
            foreach( $options['plugins'] as $plugin ) {
                if( $plugin == WPIL_PLUGIN_NAME ) {
                    // make sure the tables are up to date
                    self::updateTables();
                }
            }
        }
    }

    /**
     * Updates the existing LW data tables with changes as we add them.
     * Does a version check to see if any DB tables have been updated since the last time this was run.
     */
    public static function updateTables(){
        global $wpdb;

        // if the DB is up to date, exit
        if(WPIL_STATUS_SITE_DB_VERSION === WPIL_STATUS_PLUGIN_DB_VERSION){
            return;
        }

        // if this is a fresh install of the plugin
        if(get_option('wpil_fresh_install', false) && empty(WPIL_STATUS_SITE_DB_VERSION)){
            // set the DB version as the latest since all the created tables will be up to date
            update_option('wpil_site_db_version', WPIL_STATUS_PLUGIN_DB_VERSION);
            update_option('wpil_fresh_install', false);
        }

        if(WPIL_STATUS_SITE_DB_VERSION < 0.9){
            // Added in v1.0.0
            // if the error links table exists
            $error_tbl_exists = $wpdb->query("SHOW TABLES LIKE '{$wpdb->prefix}wpil_broken_links'");
            if(!empty($error_tbl_exists)){
                // find out if the table has a last_checked col
                $col = $wpdb->query("SHOW COLUMNS FROM {$wpdb->prefix}wpil_broken_links LIKE 'last_checked'");
                if(empty($col)){
                    // if it doesn't, add it and a check_count col to the table
                    $update_table = "ALTER TABLE {$wpdb->prefix}wpil_broken_links ADD COLUMN check_count INT(2) DEFAULT 0 AFTER created, ADD COLUMN last_checked DATETIME NOT NULL DEFAULT NOW() AFTER created";
                    $wpdb->query($update_table);
                }
            }

            // update the state of the DB to this point
            update_option('wpil_site_db_version', '0.9');
        }

        // if the current DB version is less than 1.0, run the 1.0 update
        if(WPIL_STATUS_SITE_DB_VERSION < 1.0){
            /** added in v1.0.1 **/
            // if the error links table exists
            $error_tbl_exists = $wpdb->query("SHOW TABLES LIKE '{$wpdb->prefix}wpil_broken_links'");
            if(!empty($error_tbl_exists)){
                // find out if the table has a ignore_link col
                $col = $wpdb->query("SHOW COLUMNS FROM {$wpdb->prefix}wpil_broken_links LIKE 'ignore_link'");
                if(empty($col)){
                    // if it doesn't, update it with the "ignore_link" column
                    $update_table = "ALTER TABLE {$wpdb->prefix}wpil_broken_links ADD COLUMN ignore_link tinyint(1) DEFAULT 0 AFTER `check_count`";
                    $wpdb->query($update_table);
                }
            }

            // update the state of the DB to this point
            update_option('wpil_site_db_version', '1.0');
        }

        if(WPIL_STATUS_SITE_DB_VERSION < 1.16){
            $error_tbl_exists = $wpdb->query("SHOW TABLES LIKE '{$wpdb->prefix}wpil_broken_links'");
            if(!empty($error_tbl_exists)) {
                $col = $wpdb->query("SHOW COLUMNS FROM {$wpdb->prefix}wpil_broken_links LIKE 'sentence'");
                if (empty($col)) {
                    $update_table = "ALTER TABLE {$wpdb->prefix}wpil_broken_links ADD COLUMN sentence varchar(1000) AFTER `ignore_link`";
                    $wpdb->query($update_table);
                }
            }

            $error_tbl_exists = $wpdb->query("SHOW TABLES LIKE '{$wpdb->prefix}wpil_report_links'");
            if(!empty($error_tbl_exists)) {
                $col = $wpdb->query("SHOW COLUMNS FROM {$wpdb->prefix}wpil_report_links LIKE 'location'");
                if (empty($col)) {
                    $update_table = "ALTER TABLE {$wpdb->prefix}wpil_report_links ADD COLUMN location varchar(20) AFTER `post_type`";
                    $wpdb->query($update_table);
                }
            }

            update_option('wpil_site_db_version', '1.16');
        }

        if(WPIL_STATUS_SITE_DB_VERSION < 1.17){
            $keywrd_url_tbl_exists = $wpdb->query("SHOW TABLES LIKE '{$wpdb->prefix}wpil_keyword_links'");
            if(!empty($keywrd_url_tbl_exists)) {
                $col = $wpdb->query("SHOW COLUMNS FROM {$wpdb->prefix}wpil_keyword_links LIKE 'anchor'");
                if (empty($col)) {
                    $update_table = "ALTER TABLE {$wpdb->prefix}wpil_keyword_links ADD COLUMN anchor text AFTER `post_type`";
                    $wpdb->query($update_table);
                }
            }

            update_option('wpil_site_db_version', '1.17');
        }

        if(WPIL_STATUS_SITE_DB_VERSION < 1.18){
            $keywrd_url_tbl_exists = $wpdb->query("SHOW TABLES LIKE '{$wpdb->prefix}wpil_keywords'");
            if(!empty($keywrd_url_tbl_exists)) {
                $col = $wpdb->query("SHOW COLUMNS FROM {$wpdb->prefix}wpil_keywords LIKE 'restrict_cats'");
                if (empty($col)) {
                    $update_table = "ALTER TABLE {$wpdb->prefix}wpil_keywords ADD COLUMN restrict_cats tinyint(1) DEFAULT 0 AFTER `link_once`";
                    $wpdb->query($update_table);
                }
            }

            $keywrd_url_tbl_exists = $wpdb->query("SHOW TABLES LIKE '{$wpdb->prefix}wpil_keywords'");
            if(!empty($keywrd_url_tbl_exists)) {
                $col = $wpdb->query("SHOW COLUMNS FROM {$wpdb->prefix}wpil_keywords LIKE 'restricted_cats'");
                if (empty($col)) {
                    $update_table = "ALTER TABLE {$wpdb->prefix}wpil_keywords ADD COLUMN restricted_cats text AFTER `restrict_cats`";
                    $wpdb->query($update_table);
                }
            }

            update_option('wpil_site_db_version', '1.18');
        }

    }

    public static function fixCollation($table)
    {
        global $wpdb;
        $table_status = $wpdb->get_results("SHOW TABLE STATUS where name like '$table'");
        if (empty($table_status[0]->Collation) || $table_status[0]->Collation != 'utf8mb4_unicode_ci') {
            $wpdb->query("alter table $table convert to character set utf8mb4 collate utf8mb4_unicode_ci");
        }
    }

    public static function verify_nonce($key)
    {
        $user = wp_get_current_user();
        if(!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], $user->ID . $key)){
            wp_send_json(array(
                'error' => array(
                    'title' => __('Data Error', 'wpil'),
                    'text'  => __('There was an error in processing the data, please reload the page and try again.', 'wpil'),
                )
            ));
        }
    }
}