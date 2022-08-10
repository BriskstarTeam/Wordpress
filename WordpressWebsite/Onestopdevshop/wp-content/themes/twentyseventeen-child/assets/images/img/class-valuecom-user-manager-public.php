<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Valuecom_User_Manager
 * @subpackage Valuecom_User_Manager/public
 * @author     Thanasis Chrysovergis <thanasis_chrysovergis@valuecom.gr>
 */
class Valuecom_User_Manager_Public
{

	private $plugin_name;
	private $pluginRootPath;
	private $pluginRootUrl;
	private $version;

	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->pluginRootPath = ABSPATH . 'wp-content/plugins/' . $this->plugin_name;
		$this->pluginRootUrl = plugins_url() . '/' . $this->plugin_name;
	}

	public function myAccount()
	{
		ob_start();
		require_once $this->pluginRootPath . '/public/partials/class-vum-my-account.php';
		$content = ob_get_clean();
		ob_end_flush();

		return $content;
	}

	public function editProfile()
	{
		$current_user = wp_get_current_user();
		$firstname	= $_POST['firstName'];
		$lastname		= $_POST['lastName'];

		wp_update_user(array(
			'ID' => $current_user->ID, 
			'first_name'=> $firstname, 
			'last_name'=> $lastname
		));

		// wp_redirect(get_permalink('my-account'));
		header('Location: https://delta.valuecom-demos.com/my-account#');
		exit;
	}

	public function loginUser()
	{
		$response 		= array();
		$username		= $_POST['username'];
		$password		= $_POST['password'];

		$response['errorStatus'] 	= false;
		$response['errorUsername'] 	= false;
		$response['errorPassword']  = false;
		$response['usersError'] 	= false;

		if (empty($username)) {
			$response['errorStatus'] 		= true;
			$response['errorUsername'] 		= true;
			$response['errorUsernameMsg']	= __('Username or Email Address is required.', 'valuecom-user-manager');
		}
		if (empty($password)) {
			$response['errorStatus'] 		= true;
			$response['errorPassword'] 		= true;
			$response['errorPasswordMsg'] 	= __('Password is required.', 'valuecom-user-manager');
		}

		if ($response['errorStatus'] == false) {
			if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
				$user = get_user_by('email', $username);
			} else {
				$user = get_user_by('login', $username);
			}

			if ($user && wp_check_password($password, $user->data->user_pass, $user->ID)) {
				if (get_user_meta($user->ID, 'is_activated', 1) != true) {
					$response['errorStatus'] 	= true;
					$response['usersError'] 	= true;
					$response['usersErrorMsg'] 	= __('Please activate your account by following the link sent to your email.', 'valuecom-user-manager');
				} else {
					$creds = array('user_login' => $user->data->user_login, 'user_password' => $password);
					$user2 = wp_signon($creds, false);
					wp_set_auth_cookie($user2->ID, true, false);
					do_action('wp_login', $user2->user_login);
					if (!is_wp_error($user2)) {
						$response['errorStatus'] 	= false;
						$response['success'] 	 	= __('Logged in successfully.', 'valuecom-user-manager');
					} else {
						$response['errorStatus'] 	= true;
						$response['usersError'] 	= true;
						$response['usersErrorMsg'] 	= __('Email Address/Username or Password you entered is incorrect.', 'valuecom-user-manager');
					}
				}
			} else {
				$response['errorStatus'] = true;
				$response['usersError'] = true;
				$response['usersErrorMsg'] = __('Email Address/Username or Password you entered is incorrect.', 'valuecom-user-manager');
			}
		}
		echo json_encode($response);
		exit;
	}

	public function registerUser()
	{

		echo '<pre>';
		print_r($_POST);
		exit;

		$response 		  = array();
		$_POST 			  = $_POST['formDataObject'];
		$username		  = $_POST['email'];
		$firstname		  = $_POST['firstName'];
		$lastname		  = $_POST['lastName'];
		$email			  = $_POST['email'];
		$activationURL	  = get_home_url();
		$password 		  = $_POST['password'];

		$response['errorStatus'] 			= false;
		$response['hiddenError'] 			= false;
		$response['errorusername'] 			= false;
		$response['errorfirstname'] 		= false;
		$response['errorlastname'] 			= false;
		$response['erroremail'] 			= false;
		$response['emailWarning'] 			= false;

		// USER NAME VALIDATION - START

		if (empty($username)) {
			$response['errorStatus'] = true;
			$response['errorusername'] = true;
			$response['errorusernameMsg'] = __('Username is required.', 'valuecom-user-manager');
		} else if (strlen($username) < 6) {
			$response['errorStatus'] = true;
			$response['errorusername'] = true;
			$response['errorusernameMsg'] = __('Username should contain minimum 6 characters.', 'valuecom-user-manager');
		} else if (strlen($username) > 100) {
			$response['errorStatus'] = true;
			$response['errorusername'] = true;
			$response['errorusernameMsg'] = __('Username should contain maximum 15 characters.', 'valuecom-user-manager');
		} else if (username_exists($username)) {
			$response['errorStatus'] = true;
			$response['errorusername'] = true;
			$response['errorusernameMsg'] = __('Username already exist.Try with different Username.', 'valuecom-user-manager');
		}
		// USER NAME VALIDATION - END

		if (empty($firstname)) {
			$response['errorStatus'] = true;
			$response['errorfirstname'] = true;
			$response['errorfirstnameMsg'] = __('Firstname is required.', 'valuecom-user-manager');
		}
		if (empty($lastname)) {
			$response['errorStatus'] = true;
			$response['errorlastname'] = true;
			$response['errorlastnameMsg'] = __('Lastname is required.', 'valuecom-user-manager');
		}

		// EMAIL VALIDATION - START
		if (empty($email)) {
			$response['errorStatus'] = true;
			$response['erroremail'] = true;
			$response['erroremailMsg'] = __('Email is required.', 'valuecom-user-manager');
		} else if (!is_email($email)) {
			$response['errorStatus'] = true;
			$response['erroremail'] = true;
			$response['erroremailMsg'] = __('Please enter a valid email address.', 'valuecom-user-manager');
		} else if (email_exists($email)) {
			$response['errorStatus'] = true;
			$response['erroremail'] = true;
			$response['erroremailMsg'] = __('Email already exist.Try with different Email address.', 'valuecom-user-manager');
		}
		// EMAIL VALIDATION - END
		if ($response['errorStatus'] == false) {
			$new_user_id = wp_insert_user(array(
				'first_name' => ucfirst($firstname),
				'last_name'	 => ucfirst($lastname),
				'user_email' => $email,
				'user_login' => $username,
				'user_pass'  =>  md5($password),
				'role'		 => 'subscriber',
			));

			if (!is_wp_error($new_user_id)) {
				if ($new_user_id) {
					$activation_token 		= $this->generateRandomString();
					$activation_link 		= $activationURL . '?account-activation=yes&user_id=' . $new_user_id . '&activation_token=' . $activation_token;

					update_user_meta($new_user_id, 'activation_token', $activation_token);
					update_user_meta($new_user_id, 'activation_token_time', time());
					update_user_meta($new_user_id, 'is_activated', 0);
					update_user_meta($new_user_id, 'user_active_status', 'pending');

					// termsConditions
					update_user_meta($new_user_id, 'termsConditions', $_POST['termsConditions']);
					update_user_meta($new_user_id, 'isPregnantOrChild', $_POST['vsmHavePregnantOrChild']);

					// childData if selected first option
					update_user_meta($new_user_id, 'childData', $_POST['childData']);

					// childData if selected second option
					update_user_meta($new_user_id, 'pregnantData', $_POST['pregnantData']);

					ob_start();
					require_once $this->pluginRootPath . '/public/partials/templates/email-template.php';
					$emailContent = ob_get_clean();
					ob_end_flush();

					$to 		= $email;
					$subject 	= get_bloginfo('name') . ' - User Activation';
					$headers[] 	= 'From: ' . get_bloginfo('name') . '<' . get_option('admin_email') . '>';
					$headers[] 	= 'Content-Type: text/html; charset=UTF-8';
					$is_sent = wp_mail($to, $subject, $emailContent, $headers);

					if ($is_sent) {
						$response['errorStatus'] = false;
						$response['success'] = __('Thanks for your registration. Please check you email for account activation link.', 'valuecom-user-manager');
					} else {
						$response['errorStatus'] = false;
						$response['emailWarning'] = true;
						$response['warning'] = __('There was an error trying to send account activation email. Please contact site admin to active your account.', 'valuecom-user-manager');
					}
				}
			} else {
				$response['errorStatus'] = true;
				$response['usersError'] = true;
				$response['usersErrorMsg'] = __('Error: Please fill-up the form and submit it again', 'valuecom-user-manager');
			}
		} else {
			$response['errorStatus'] = true;
			$response['usersError'] = true;
			$response['usersErrorMsg'] = __('Error: Please fill-up the form and submit it again', 'valuecom-user-manager');
		}
		echo json_encode($response);
		exit;
	}

	public function generateRandomString($length = 20)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/valuecom-user-manager-public.css', array(), time(), 'all');
	}

	public function enqueue_scripts()
	{
		wp_enqueue_script($this->plugin_name . '-repeater', plugin_dir_url(__FILE__) . 'js/repeater.js', array('jquery'), time(), false);
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/valuecom-user-manager-public.js', array('jquery'), time(), false);
		wp_enqueue_script('delta-moms-script', plugin_dir_url(__FILE__) . 'js/delta-moms-ajax-script.js', array('jquery'));
		wp_localize_script('delta-moms-script', 'deltaMoms_ajax', array('ajax_url' => admin_url('admin-ajax.php'), 'check_nonce' => wp_create_nonce('deltaMoms-nonce')));
	}

	public function registerShortcodesCallback()
	{
		add_shortcode('loginRegisterPopup', array($this, 'loginRegisterPopupCallback'));
		add_shortcode('myAccountButton', array($this, 'myAccountButtonCallback'));
	}

	public function loginRegisterPopupCallback()
	{
		ob_start();
		require 'partials/class-vum-form.php';
		return ob_get_clean();
	}

	public function myAccountButtonCallback()
	{
		ob_start();
		require 'partials/class-vum-my-account-button.php';
		return ob_get_clean();
	}

	public function userVerificationCallback()
	{
		if (isset($_GET['account-activation']) && isset($_GET['activation_token'])) {
			$activationToken = $_GET['activation_token'];
			$userId = $_GET['user_id'];
			$userActivationToken = get_user_meta($userId, 'activation_token', true);
			if ($userActivationToken === $activationToken) {
				update_user_meta($userId, 'is_activated', 1);
				update_user_meta($userId, 'activation_token', Null);
				function serActivationScriptCallback()
				{
?>
					<script>
						(function($) {
							$(document).ready(function() {
								'use strict';
								$('.vumloginForm').addClass('hideForm');
								$('.vumregisterForm').addClass('hideForm');
								$('.vumAfterVerifyForm').removeClass('hideForm');
								$('#loginRegisterForm').addClass('modalOpen');
								$("body").css({
									"overflow": "hidden"
								});
							});
						})(jQuery);
					</script>
<?php
				}
				add_action('wp_footer', 'serActivationScriptCallback');
			}
		}
	}
}
