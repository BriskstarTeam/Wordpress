<?php 
	/*	
	*	Goodlayers Tgmpa Action File
	*/		
	
	// move the menu to goodlayers main area
	if( is_admin() ){ add_action('after_setup_theme', 'arki_change_tgmpa_location', 20); }
	if( !function_exists('arki_change_tgmpa_location') ){
		function arki_change_tgmpa_location(){

			if( function_exists('init_goodlayers_core_system') ){
				gdlr_core_admin_menu::register_menu(array(
					'parent-slug' => 'goodlayers_main_menu',
					'menu-url' => 'themes.php?page=tgmpa-install-plugins',
					'menu-slug' => 'tgmpa-install-plugins',
					'menu-parent-slug' => 'themes.php',
					'menu-title' => esc_html__( 'Install Plugins', 'arki' ),
					'page-title' => esc_html__( 'Install Required Plugins', 'arki' ),
					'capability' => 'edit_theme_options'
				));	
			}else{
				gdlr_core_admin_menu::register_menu(array(
					'parent-slug' => 'theme_landing',
					'menu-url' => 'themes.php?page=tgmpa-install-plugins',
					'menu-slug' => 'tgmpa-install-plugins',
					'menu-parent-slug' => 'themes.php',
					'menu-title' => esc_html__( 'Install Plugins', 'arki' ),
					'page-title' => esc_html__( 'Install Required Plugins', 'arki' ),
					'capability' => 'edit_theme_options'
				));	
				
			}
			
		}
	}

	// auto install and redirect to plugin page
	if( !function_exists('arki_tgmpa_complete') ){
		function arki_tgmpa_complete(){
			if( !empty($GLOBALS['tgmpa']) ){
				
				// force plugin installation
				$tgmpa = call_user_func(array(get_class($GLOBALS['tgmpa']), 'get_instance'));
				return $tgmpa->is_tgmpa_complete(true);
			}
		}
	}
	
	// auto install and redirect to plugin page
	if( !function_exists('arki_tgmpa_does_plugin_active') ){
		function arki_tgmpa_does_plugin_active($slug, $redirect_url){
			
			if( !empty($GLOBALS['tgmpa']) ){
				$tgmpa = call_user_func(array(get_class($GLOBALS['tgmpa']), 'get_instance'));
			
				if( !$tgmpa->is_plugin_installed($slug) ){
					return false;
				}else if( !$tgmpa->is_pg_active($slug) ){
					$result = activate_plugin($slug . '/' . $slug . '.php');
					return menu_page_url($redirect_url, false);
				}
			}
			
			return menu_page_url($redirect_url, false);
		}
	}
	if( !function_exists('arki_tgmpa_auto_install_url') ){
		function arki_tgmpa_auto_install_url($slug, $redirect_url){

			// force plugin installation
			if( !empty($GLOBALS['tgmpa']) ){
				$tgmpa = call_user_func(array(get_class($GLOBALS['tgmpa']), 'get_instance'));
				if( !$tgmpa->is_plugin_installed($slug) ){
					return add_query_arg(array(
						'plugin' => $slug,
						'tgmpa-install' => 'install-plugin',
						'tgmpa-nonce' => wp_create_nonce('tgmpa-install'),
						'return-page' => $redirect_url
					), $tgmpa->get_tgmpa_url());
				}else if( !$tgmpa->is_pg_active($slug) ){
					$result = activate_plugin($slug . '/' . $slug . '.php');
					return menu_page_url($redirect_url, false);
				}
			}

			return menu_page_url($redirect_url, false);
		}
	}

	if( !function_exists('arki_verified_plugins') ){
		function arki_verified_plugins(){
			$ret = array();

			$plugins = array(
				'goodlayers-core' => esc_html__('Goodlayers Core', 'arki'), 
				'goodlayers-core-portfolio' => esc_html__('Goodlayers Core Portfolio', 'arki'), 
				'goodlayers-core-personnel' => esc_html__('Goodlayers Core Personnel', 'arki'), 
				'goodlayers-core-twitter' => esc_html__('Goodlayers Core Twitter', 'arki'), 
				'revslider' => esc_html__('Revolution Slider', 'arki')
			);
			$plugin_versions = get_option('arki-plugins-version', array());
			foreach( $plugins as $slug => $title ){
				$download_url = arki_get_download_url($slug);
				if( !empty($download_url) && !empty($plugin_versions[$slug]['version']) ){
					$ret[] = array(
						'name' => $title,
						'slug' => $slug, 
						'source' => $download_url,
						'required' => true, 
						'version' => $plugin_versions[$slug]['version'], 
					);
				}
				
			}

			return $ret;
		}
	}

	// register the menu for tgm plugin
	add_action('tgmpa_register', 'arki_register_required_plugins');
	if( !function_exists('arki_register_required_plugins') ){
		function arki_register_required_plugins(){

			$plugins = array_merge(arki_verified_plugins(), array(
				array(
					'name'               => esc_html__('Envato Market', 'arki'),
					'slug'               => 'envato-market', 
					'source'             => get_template_directory() . '/admin/tgmpa/plugins/envato-market.zip',
					'required'           => false, 
					'version'            => '2.0.6', 
					'force_activation'   => false, 
					'force_deactivation' => false, 
				),
				array(
					'name'      => esc_html__('Contact Form 7', 'arki'),
					'slug'      => 'contact-form-7',
					'required'  => false,
				),
				array(
					'name'      => esc_html__('WP Google Map Plugin', 'arki'),
					'slug'      => 'wp-google-map-plugin',
					'required'  => false,
				),
			));
			
			$config = array(
				'id'           => 'arki',                 // Unique ID for hashing notices for multiple instances of TGMPA.
				'default_path' => '',                      // Default absolute path to bundled plugins.
				'menu'         => 'tgmpa-install-plugins', // Menu slug.
				'parent_slug'  => 'themes.php',            // Parent menu slug.
				'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
				'has_notices'  => true,                    // Show admin notices or not.
				'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
				'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
				'is_automatic' => false,                   // Automatically activate plugins after installation or not.
				'message'      => '',                      // Message to output right before the plugins table.
			);

			tgmpa( $plugins, $config );
			
		} // arki_register_required_plugins
	} // function_exists