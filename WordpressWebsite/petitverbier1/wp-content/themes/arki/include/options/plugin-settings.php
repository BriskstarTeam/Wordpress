<?php
	/*	
	*	Goodlayers Option
	*	---------------------------------------------------------------------
	*	This file store an array of theme options
	*	---------------------------------------------------------------------
	*/	

	// save the css/js file 
	add_action('gdlr_core_after_save_theme_option', 'arki_gdlr_core_after_save_theme_option');
	if( !function_exists('arki_gdlr_core_after_save_theme_option') ){
		function arki_gdlr_core_after_save_theme_option(){
			if( function_exists('gdlr_core_generate_combine_script') ){
				arki_clear_option();

				gdlr_core_generate_combine_script(array(
					'lightbox' => arki_gdlr_core_lightbox_type()
				));
			}
		}
	}

	if( !function_exists('arki_gdlr_core_get_privacy_options') ){
		function arki_gdlr_core_get_privacy_options( $type = 1 ){
			if( function_exists('gdlr_core_get_privacy_options') ){
				return gdlr_core_get_privacy_options( $type );
			}

			return array();
		} // arki_gdlr_core_get_privacy_options
	}

	// add the option
	$arki_admin_option->add_element(array(
	
		// plugin head section
		'title' => esc_html__('Miscellaneous', 'arki'),
		'slug' => 'arki_plugin',
		'icon' => get_template_directory_uri() . '/include/options/images/plugin.png',
		'options' => array(
			
			// starting the subnav
			'thumbnail-sizing' => array(
				'title' => esc_html__('Thumbnail Sizing', 'arki'),
				'customizer' => false,
				'options' => array(
				
					'enable-srcset' => array(
						'title' => esc_html__('Enable Srcset', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable',
						'description' => esc_html__('Enable this option will improve the performance by resizing the image based on the screensize. Please be cautious that this will generate multiple images on your server.', 'arki')
					),
					'thumbnail-sizing' => array(
						'title' => esc_html__('Add Thumbnail Size', 'arki'),
						'type' => 'custom',
						'item-type' => 'thumbnail-sizing',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					
				) // thumbnail-sizing-options
			), // thumbnail-sizing-nav		

			'consent-settings' => array(
				'title' => esc_html__('Consent Settings', 'arki'),
				'options' => arki_gdlr_core_get_privacy_options(1)
			),
			'privacy-settings' => array(
				'title' => esc_html__('Privacy Style Settings', 'arki'),
				'options' => arki_gdlr_core_get_privacy_options(2)
			),

			'plugins' => array(
				'title' => esc_html__('Plugins', 'arki'),
				'options' => array(

					'font-icon' => array(
						'title' => esc_html__('Icon Type', 'arki'),
						'type' => 'multi-combobox',
						'options' => (function_exists('gdlr_core_get_icon_font_title')? gdlr_core_get_icon_font_title(): array()),
						'description' => esc_html__('You can use Ctrl/Command button to select multiple items or remove the selected item. Leave this field blank to select all items in the list.', 'arki'),
						'default' => array('font-awesome', 'elegant-font')
					),
					'lightbox' => array(
						'title' => esc_html__('Lightbox Type', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'lightGallery' => esc_html__('LightGallery', 'arki'),
							'strip' => esc_html__('Strip', 'arki'),
						)
					),
					'ilightbox-skin' => array(
						'title' => esc_html__('iLightbox Skin', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'dark' => esc_html__('Dark', 'arki'),
							'light' => esc_html__('Light', 'arki'),
							'mac' => esc_html__('Mac', 'arki'),
							'metro-black' => esc_html__('Metro Black', 'arki'),
							'metro-white' => esc_html__('Metro White', 'arki'),
							'parade' => esc_html__('Parade', 'arki'),
							'smooth' => esc_html__('Smooth', 'arki'),		
						),
						'condition' => array( 'lightbox' => 'ilightbox' )
					),
					'link-to-lightbox' => array(
						'title' => esc_html__('Turn Image Link To Open In Lightbox', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'lightbox-video-autoplay' => array(
						'title' => esc_html__('Enable Video Autoplay On Lightbox', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					
				) // plugin-options
			), // plugin-nav		
			'additional-script' => array(
				'title' => esc_html__('Custom Css/Js', 'arki'),
				'options' => array(
				
					'additional-css' => array(
						'title' => esc_html__('Additional CSS ( without <style> tag )', 'arki'),
						'type' => 'textarea',
						'data-type' => 'text',
						'selector' => '#gdlr#',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'additional-mobile-css' => array(
						'title' => esc_html__('Mobile CSS ( screen below 767px )', 'arki'),
						'type' => 'textarea',
						'data-type' => 'text',
						'selector' => '@media only screen and (max-width: 767px){ #gdlr# }',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'additional-head-script' => array(
						'title' => esc_html__('Additional Head Script ( without <script> tag )', 'arki'),
						'type' => 'textarea',
						'wrapper-class' => 'gdlr-core-fullsize',
						'descriptin' => esc_html__('Eg. For analytics', 'arki')
					),
					'additional-head-script2' => array(
						'title' => esc_html__('Additional Head Script ( with <script> tag )', 'arki'),
						'type' => 'textarea',
						'wrapper-class' => 'gdlr-core-fullsize',
						'descriptin' => esc_html__('Eg. For analytics', 'arki')
					),
					'additional-body-script' => array(
						'title' => esc_html__('Additional Body Script ( with <script> tag )', 'arki'),
						'type' => 'textarea',
						'wrapper-class' => 'gdlr-core-fullsize',
						'descriptin' => esc_html__('Eg. For Google Tag Manager', 'arki')
					),
					'additional-script' => array(
						'title' => esc_html__('Additional Script ( without <script> tag )', 'arki'),
						'type' => 'textarea',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					
				) // additional-script-options
			), // additional-script-nav	
			'maintenance' => array(
				'title' => esc_html__('Maintenance Mode', 'arki'),
				'options' => array(		
					'enable-maintenance' => array(
						'title' => esc_html__('Enable Maintenance / Coming Soon Mode', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),					
					'maintenance-page' => array(
						'title' => esc_html__('Select Maintenance / Coming Soon Page', 'arki'),
						'type' => 'combobox',
						'options' => 'post_type',
						'options-data' => 'page'
					),

				) // maintenance-options
			), // maintenance
			'pre-load' => array(
				'title' => esc_html__('Preload', 'arki'),
				'options' => array(		
					'enable-preload' => array(
						'title' => esc_html__('Enable Preload', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
					'preload-image' => array(
						'title' => esc_html__('Preload Image', 'arki'),
						'type' => 'upload',
						'data-type' => 'file', 
						'selector' => '.arki-page-preload{ background-image: url(#gdlr#); }',
						'condition' => array( 'enable-preload' => 'enable' ),
						'description' => esc_html__('Upload the image (.gif) you want to use as preload animation. You could search it online at https://www.google.com/search?q=loading+gif as well', 'arki')
					),
				)
			),
			'import-export' => array(
				'title' => esc_html__('Import / Export', 'arki'),
				'options' => array(

					'export' => array(
						'title' => esc_html__('Export Option', 'arki'),
						'type' => 'export',
						'action' => 'gdlr_core_theme_option_export',
						'options' => array(
							'all' => esc_html__('All Options(general/typography/color/miscellaneous) exclude widget, custom template', 'arki'),
							'arki_general' => esc_html__('General Option', 'arki'),
							'arki_typography' => esc_html__('Typography Option', 'arki'),
							'arki_color' => esc_html__('Color Option', 'arki'),
							'arki_plugin' => esc_html__('Miscellaneous', 'arki'),
							'widget' => esc_html__('Widget', 'arki'),
							'page-builder-template' => esc_html__('Custom Page Builder Template', 'arki'),
						),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'import' => array(
						'title' => esc_html__('Import Option', 'arki'),
						'type' => 'import',
						'action' => 'gdlr_core_theme_option_import',
						'wrapper-class' => 'gdlr-core-fullsize'
					),

				) // import-options
			), // import-export
			
		
		) // plugin-options
		
	), 8);	