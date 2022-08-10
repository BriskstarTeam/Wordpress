<?php

	define('ARKI_ITEM_ID', 32544719);
	define('ARKI_PURCHASE_VERFIY_URL', 'https://goodlayers.com/licenses/wp-json/verify/purchase_code'); 
	define('ARKI_PLUGIN_VERSION_URL', 'https://goodlayers.com/licenses/wp-json/version/plugin');
	define('ARKI_PLUGIN_UPDATE_URL', 'https://goodlayers.com/licenses/wp-content/plugins/goodlayers-verification/download/');
	
	// define('ARKI_PURCHASE_VERFIY_URL', 'http://localhost/arki/wp-json/verify/purchase_code'); 
	// define('ARKI_PLUGIN_VERSION_URL', 'http://localhost/arki/wp-json/version/plugin'); 
	// define('ARKI_PLUGIN_UPDATE_URL', 'http://localhost/Gdl%20Theme/plugins/goodlayers-verification/download/');

	if( !function_exists('arki_is_purchase_verified') ){
		function arki_is_purchase_verified(){
			$purchase_code = arki_get_purchase_code();
			return empty($purchase_code)? false: true;
		}
	}
	if( !function_exists('arki_get_purchase_code') ){
		function arki_get_purchase_code(){
			return get_option('envato_purchase_code_' . ARKI_ITEM_ID, '');
		}
	}
	if( !function_exists('arki_get_download_url') ){
		function arki_get_download_url($file){
			$download_key = get_option('arki_download_key', '');
			$purchase_code = arki_get_purchase_code();
			if( empty($download_key) ) return false;

			return add_query_arg(array(
				'purchase_code' => $purchase_code,
				'download_key' => $download_key,
				'file' => $file
			), ARKI_PLUGIN_UPDATE_URL);
		}
	}

	# delete_option('envato_purchase_code_' . ARKI_ITEM_ID);
	# delete_option('arki_download_key');
	if( !function_exists('arki_verify_purchase') ){
		function arki_verify_purchase($purchase_code, $register){
			$response = wp_remote_post(ARKI_PURCHASE_VERFIY_URL, array(
				'body' => array(
					'register' => $register,
					'item_id' => ARKI_ITEM_ID,
					'website' => get_site_url(),
					'purchase_code' => $purchase_code
				)
			));

			if( is_wp_error($response) || wp_remote_retrieve_response_code($response) != 200 ){
				throw new Exception(wp_remote_retrieve_response_message($response));
			}

			$data = json_decode(wp_remote_retrieve_body($response), true);
			if( $data['status'] == 'success' ){
				update_option('envato_purchase_code_' . ARKI_ITEM_ID, $purchase_code);
				update_option('arki_download_key', $data['download_key']);
				return true;
			}else{
				update_option('envato_purchase_code_' . ARKI_ITEM_ID, '');
				update_option('arki_download_key', '');

				if( !empty($data['message']) ){
					throw new Exception($data['message']);
				}else{
					throw new Exception(esc_html__('Unknown Error', 'arki'));
				}
				
			}

		} // arki_verify_purchase
	}

	// delete_option('arki_daily_schedule');
	// delete_option('arki-plugins-version');
	add_action('init', 'arki_admin_schedule');
	if( !function_exists('arki_admin_schedule') ){
		function arki_admin_schedule(){
			if( !is_admin() ) return;

			$current_date = date('Y-m-d');
			$daily_schedule = get_option('arki_daily_schedule', '');
			if( $daily_schedule != $current_date ){
				update_option('arki_daily_schedule', $current_date);
				do_action('arki_daily_schedule');
			}
		}
	}

	# update version from server
	add_action('arki_daily_schedule', 'arki_plugin_version_update');
	if( !function_exists('arki_plugin_version_update') ){
		function arki_plugin_version_update(){
			$response = wp_remote_get(ARKI_PLUGIN_VERSION_URL);

			if( !is_wp_error($response) && !empty($response['body']) ){
				update_option('arki-plugins-version', json_decode($response['body'], true));
			}
		}
	}