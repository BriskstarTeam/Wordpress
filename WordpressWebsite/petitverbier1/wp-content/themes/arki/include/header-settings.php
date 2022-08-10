<?php

	add_filter('gdlr_core_enable_header_post_type', 'arki_gdlr_core_enable_header_post_type');
	if( !function_exists('arki_gdlr_core_enable_header_post_type') ){
		function arki_gdlr_core_enable_header_post_type( $args ){
			return true;
		}
	}
	
	add_filter('gdlr_core_header_options', 'arki_gdlr_core_header_options', 10, 2);
	if( !function_exists('arki_gdlr_core_header_options') ){
		function arki_gdlr_core_header_options( $options, $with_default = true ){

			// get option
			$options = array(
				'top-bar' => arki_top_bar_options(),
				'top-bar-social' => arki_top_bar_social_options(),			
				'header' => arki_header_options(),
				'logo' => arki_logo_options(),
				'navigation' => arki_navigation_options(), 
				'fixed-navigation' => arki_fixed_navigation_options(),
			);

			// set default
			if( $with_default ){
				foreach( $options as $slug => $option ){
					foreach( $option['options'] as $key => $value ){
						$options[$slug]['options'][$key]['default'] = arki_get_option('general', $key);
					}
				}
			} 
			
			return $options;
		}
	}	

	add_filter('gdlr_core_header_typography_options', 'arki_gdlr_core_header_typography_options', 10, 2);
	if( !function_exists('arki_gdlr_core_header_typography_options') ){
		function arki_gdlr_core_header_typography_options( $options, $with_default = true ){

			// get option
			$options = array(
				'navigation-font-size' => arki_navigation_font_size_options(),
			);

			// set default
			if( $with_default ){
				foreach( $options as $slug => $option ){
					foreach( $option['options'] as $key => $value ){
						$options[$slug]['options'][$key]['default'] = arki_get_option('typography', $key);
					}
				}
			} 
			
			return $options;
		}
	}
	
	add_filter('gdlr_core_header_color_options', 'arki_gdlr_core_header_color_options', 10, 2);
	if( !function_exists('arki_gdlr_core_header_color_options') ){
		function arki_gdlr_core_header_color_options( $options, $with_default = true ){

			$options = array(
				'header-color' => arki_header_color_options(), 
				'navigation-menu-color' => arki_navigation_color_options(), 		
				'navigation-right-color' => arki_navigation_right_color_options(),
			);

			// set default
			if( $with_default ){
				foreach( $options as $slug => $option ){
					foreach( $option['options'] as $key => $value ){
						$options[$slug]['options'][$key]['default'] = arki_get_option('color', $key);
					}
				}
			}

			return $options;
		}
	}

	add_action('wp_head', 'arki_set_custom_header');
	if( !function_exists('arki_set_custom_header') ){
		function arki_set_custom_header(){
			arki_get_option('general', 'layout', '');
			
			$header_id = get_post_meta(get_the_ID(), 'gdlr_core_custom_header_id', true);
			if( empty($header_id) ){
				$header_id = arki_get_option('general', 'custom-header', '');
			}

			if( !empty($header_id) ){
				$option = 'arki_general';
				$header_options = get_post_meta($header_id, 'gdlr-core-header-settings', true);

				if( !empty($header_options) ){
					foreach( $header_options as $key => $value ){
						$GLOBALS[$option][$key] = $value;
					}
				}

				$header_css = get_post_meta($header_id, 'gdlr-core-custom-header-css', true);
				if( !empty($header_css) ){
					if( get_post_type() == 'page' ){
						$header_css = str_replace('.gdlr-core-page-id', '.page-id-' . get_the_ID(), $header_css);
					}else{
						$header_css = str_replace('.gdlr-core-page-id', '.postid-' . get_the_ID(), $header_css);
					}
					echo '<style type="text/css" >' . $header_css . '</style>';
				}
				

			}
		} // arki_set_custom_header
	}

	// override menu on page option
	add_filter('wp_nav_menu_args', 'arki_wp_nav_menu_args');
	if( !function_exists('arki_wp_nav_menu_args') ){
		function arki_wp_nav_menu_args($args){

			$arki_locations = array('main_menu', 'right_menu', 'top_bar_menu', 'mobile_menu');
			if( !empty($args['theme_location']) && in_array($args['theme_location'], $arki_locations) ){
				$menu_id = get_post_meta(get_the_ID(), 'gdlr-core-location-' . $args['theme_location'], true);
				
				if( !empty($menu_id) ){
					$args['menu'] = $menu_id;
					$args['theme_location'] = '';
				}
			}

			return $args;
		}
	}

	if( !function_exists('arki_top_bar_options') ){
		function arki_top_bar_options(){
			return array(
				'title' => esc_html__('Top Bar', 'arki'),
				'options' => array(

					'enable-top-bar' => array(
						'title' => esc_html__('Enable Top Bar', 'arki'),
						'type' => 'checkbox',
					),
					'enable-top-bar-on-mobile' => array(
						'title' => esc_html__('Enable Top Bar On Mobile', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
					'top-bar-width' => array(
						'title' => esc_html__('Top Bar Width', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'boxed' => esc_html__('Boxed ( Within Container )', 'arki'),
							'full' => esc_html__('Full', 'arki'),
							'custom' => esc_html__('Custom', 'arki'),
						),
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-width-pixel' => array(
						'title' => esc_html__('Top Bar Width Pixel', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'default' => '1140px',
						'condition' => array( 'enable-top-bar' => 'enable', 'top-bar-width' => 'custom' ),
						'selector' => '.arki-top-bar-container.arki-top-bar-custom-container{ max-width: #gdlr#; }'
					),
					'top-bar-full-side-padding' => array(
						'title' => esc_html__('Top Bar Full ( Left/Right ) Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '100',
						'data-type' => 'pixel',
						'default' => '15px',
						'selector' => '.arki-top-bar-container.arki-top-bar-full{ padding-right: #gdlr#; padding-left: #gdlr#; }',
						'condition' => array( 'enable-top-bar' => 'enable', 'top-bar-width' => 'full' )
					),
					'top-bar-menu-position' => array(
						'title' => esc_html__('Top Bar Menu Position', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'none' => esc_html__('None', 'arki'),
							'left' => esc_html__('Left', 'arki'),
							'right' => esc_html__('Right', 'arki'),
						),
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-center-text' => array(
						'title' => esc_html__('Top Bar Center Text', 'arki'),
						'type' => 'textarea',
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-left-text' => array(
						'title' => esc_html__('Top Bar Left Text', 'arki'),
						'type' => 'textarea',
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-right-text' => array(
						'title' => esc_html__('Top Bar Right Text', 'arki'),
						'type' => 'textarea',
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-top-padding' => array(
						'title' => esc_html__('Top Bar Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '200',
 						'default' => '10px',
						'selector' => '.arki-top-bar{ padding-top: #gdlr#; }',
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-bottom-padding' => array(
						'title' => esc_html__('Top Bar Bottom Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '200',
						'default' => '10px',
						'selector' => '.arki-top-bar{ padding-bottom: #gdlr#; }' .
							'.arki-top-bar .arki-top-bar-menu > li > a{ padding-bottom: #gdlr#; }' .  
							'.sf-menu.arki-top-bar-menu > .arki-mega-menu .sf-mega, .sf-menu.arki-top-bar-menu > .arki-normal-menu ul{ margin-top: #gdlr#; }',
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-text-size' => array(
						'title' => esc_html__('Top Bar Text Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '15px',
						'selector' => '.arki-top-bar{ font-size: #gdlr#; }',
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-bottom-border' => array(
						'title' => esc_html__('Top Bar Bottom Border', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '10',
						'default' => '0',
						'selector' => '.arki-top-bar{ border-bottom-width: #gdlr#; }',
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-shadow-size' => array(
						'title' => esc_html__('Top Bar Shadow Size', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
						'condition' => array( 'enable-top-bar' => 'enable' )
					),
					'top-bar-shadow-color' => array(
						'title' => esc_html__('Top Bar Shadow Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#000',
						'selector-extra' => true,
						'selector' => '.arki-top-bar{ ' . 
							'box-shadow: 0px 0px <top-bar-shadow-size>t rgba(#gdlra#, 0.1); ' . 
							'-webkit-box-shadow: 0px 0px <top-bar-shadow-size>t rgba(#gdlra#, 0.1); ' . 
							'-moz-box-shadow: 0px 0px <top-bar-shadow-size>t rgba(#gdlra#, 0.1); }',
						'condition' => array( 'enable-top-bar' => 'enable' )
					)

				)
			);
		}
	}

	if( !function_exists('arki_top_bar_social_options') ){
		function arki_top_bar_social_options(){
			return array(
				'title' => esc_html__('Top Bar Social', 'arki'),
				'options' => array(
					'enable-top-bar-social' => array(
						'title' => esc_html__('Enable Top Bar Social', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'top-bar-social-position' => array(
						'title' => esc_html__('Top Bar Social Position', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'left' => esc_html__('Left', 'arki'),
							'right' => esc_html__('Right', 'arki'),
						),
						'default' => 'right',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-delicious' => array(
						'title' => esc_html__('Top Bar Social Delicious Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-email' => array(
						'title' => esc_html__('Top Bar Social Email Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-deviantart' => array(
						'title' => esc_html__('Top Bar Social Deviantart Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-digg' => array(
						'title' => esc_html__('Top Bar Social Digg Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-facebook' => array(
						'title' => esc_html__('Top Bar Social Facebook Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-flickr' => array(
						'title' => esc_html__('Top Bar Social Flickr Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-lastfm' => array(
						'title' => esc_html__('Top Bar Social Lastfm Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-linkedin' => array(
						'title' => esc_html__('Top Bar Social Linkedin Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-pinterest' => array(
						'title' => esc_html__('Top Bar Social Pinterest Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-rss' => array(
						'title' => esc_html__('Top Bar Social RSS Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-skype' => array(
						'title' => esc_html__('Top Bar Social Skype Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-stumbleupon' => array(
						'title' => esc_html__('Top Bar Social Stumbleupon Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-tumblr' => array(
						'title' => esc_html__('Top Bar Social Tumblr Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-twitter' => array(
						'title' => esc_html__('Top Bar Social Twitter Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-vimeo' => array(
						'title' => esc_html__('Top Bar Social Vimeo Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-youtube' => array(
						'title' => esc_html__('Top Bar Social Youtube Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-instagram' => array(
						'title' => esc_html__('Top Bar Social Instagram Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),
					'top-bar-social-snapchat' => array(
						'title' => esc_html__('Top Bar Social Snapchat Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-top-bar-social' => 'enable' )
					),

				)
			);
		}
	}

	if( !function_exists('arki_header_options') ){
		function arki_header_options(){
			return array(
				'title' => esc_html__('Header', 'arki'),
				'options' => array(

					'header-style' => array(
						'title' => esc_html__('Header Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'plain' => esc_html__('Plain', 'arki'),
							'bar' => esc_html__('Bar', 'arki'),
							'bar2' => esc_html__('Navigation Boxed', 'arki'),
							'boxed' => esc_html__('Boxed', 'arki'),
							'side' => esc_html__('Side Menu', 'arki'),
							'side-toggle' => esc_html__('Side Menu Toggle', 'arki'),
						),
						'default' => 'plain',
					),
					'header-plain-style' => array(
						'title' => esc_html__('Header Plain Style', 'arki'),
						'type' => 'radioimage',
						'options' => array(
							'menu-left' => get_template_directory_uri() . '/images/header/plain-menu-left.jpg',
							'menu-right' => get_template_directory_uri() . '/images/header/plain-menu-right.jpg',
							'center-logo' => get_template_directory_uri() . '/images/header/plain-center-logo.jpg',
							'center-menu' => get_template_directory_uri() . '/images/header/plain-center-menu.jpg',
							'splitted-menu' => get_template_directory_uri() . '/images/header/plain-splitted-menu.jpg',
						),
						'default' => 'menu-right',
						'condition' => array( 'header-style' => 'plain' ),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'header-plain-bottom-border' => array(
						'title' => esc_html__('Plain Header Bottom Border', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '10',
						'default' => '0',
						'selector' => '.arki-header-style-plain{ border-bottom-width: #gdlr#; }',
						'condition' => array( 'header-style' => array('plain') )
					),
					'header-bar-navigation-align' => array(
						'title' => esc_html__('Header Bar Style', 'arki'),
						'type' => 'radioimage',
						'options' => array(
							'left' => get_template_directory_uri() . '/images/header/bar-left.jpg',
							'center' => get_template_directory_uri() . '/images/header/bar-center.jpg',
							'center-logo' => get_template_directory_uri() . '/images/header/bar-center-logo.jpg',
						),
						'default' => 'center',
						'condition' => array( 'header-style' => 'bar' ),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'header-bar2-navigation-align' => array(
						'title' => esc_html__('Header Bar 2 Style', 'arki'),
						'type' => 'radioimage',
						'options' => array(
							'left' => get_template_directory_uri() . '/images/header/bar2-left.jpg',
							'center' => get_template_directory_uri() . '/images/header/bar2-center.jpg',
							'center-logo' => get_template_directory_uri() . '/images/header/bar2-center-logo.jpg',
						),
						'default' => 'center',
						'condition' => array( 'header-style' => 'bar2' ),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'header-background-style' => array(
						'title' => esc_html__('Header/Navigation Background Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'solid' => esc_html__('Solid', 'arki'),
							'transparent' => esc_html__('Transparent', 'arki'),
						),
						'default' => 'solid',
						'condition' => array( 'header-style' => array('plain', 'bar', 'bar2') )
					),
					'top-bar-background-opacity' => array(
						'title' => esc_html__('Top Bar Background Opacity', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'opacity',
						'default' => '50',
						'condition' => array( 'header-style' => 'plain', 'header-background-style' => 'transparent' ),
						'selector' => '.arki-header-background-transparent .arki-top-bar-background{ opacity: #gdlr#; }'
					),
					'header-background-opacity' => array(
						'title' => esc_html__('Header Background Opacity', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'opacity',
						'default' => '50',
						'condition' => array( 'header-style' => array('plain', 'bar2'), 'header-background-style' => 'transparent' ),
						'selector' => '.arki-header-background-transparent .arki-header-background{ opacity: #gdlr#; }'
					),
					'navigation-background-opacity' => array(
						'title' => esc_html__('Navigation Background Opacity', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'opacity',
						'default' => '50',
						'condition' => array( 'header-style' => array('bar', 'bar2'), 'header-background-style' => 'transparent' ),
						'selector' => '.arki-navigation-bar-wrap.arki-style-transparent .arki-navigation-background{ opacity: #gdlr#; }'
					),
					'header-boxed-style' => array(
						'title' => esc_html__('Header Boxed Style', 'arki'),
						'type' => 'radioimage',
						'options' => array(
							'menu-right' => get_template_directory_uri() . '/images/header/boxed-menu-right.jpg',
							'center-menu' => get_template_directory_uri() . '/images/header/boxed-center-menu.jpg',
							'splitted-menu' => get_template_directory_uri() . '/images/header/boxed-splitted-menu.jpg',
						),
						'default' => 'menu-right',
						'condition' => array( 'header-style' => 'boxed' ),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'boxed-top-bar-background-opacity' => array(
						'title' => esc_html__('Top Bar Background Opacity', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'opacity',
						'default' => '0',
						'condition' => array( 'header-style' => 'boxed' ),
						'selector' => '.arki-header-boxed-wrap .arki-top-bar-background{ opacity: #gdlr#; }'
					),
					'boxed-top-bar-background-extend' => array(
						'title' => esc_html__('Top Bar Background Extend ( Bottom )', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0px',
						'data-max' => '200px',
						'default' => '0px',
						'condition' => array( 'header-style' => 'boxed' ),
						'selector' => '.arki-header-boxed-wrap .arki-top-bar-background{ margin-bottom: -#gdlr#; }'
					),
					'boxed-header-top-margin' => array(
						'title' => esc_html__('Header Top Margin', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0px',
						'data-max' => '200px',
						'default' => '0px',
						'condition' => array( 'header-style' => 'boxed' ),
						'selector' => '.arki-header-style-boxed{ margin-top: #gdlr#; }'
					),
					'header-side-style' => array(
						'title' => esc_html__('Header Side Style', 'arki'),
						'type' => 'radioimage',
						'options' => array(
							'top-left' => get_template_directory_uri() . '/images/header/side-top-left.jpg',
							'middle-left' => get_template_directory_uri() . '/images/header/side-middle-left.jpg',
							'middle-left-2' => get_template_directory_uri() . '/images/header/side-middle-left-2.jpg',
							'top-right' => get_template_directory_uri() . '/images/header/side-top-right.jpg',
							'middle-right' => get_template_directory_uri() . '/images/header/side-middle-right.jpg',
							'middle-right-2' => get_template_directory_uri() . '/images/header/side-middle-right-2.jpg',
						),
						'default' => 'top-left',
						'condition' => array( 'header-style' => 'side' ),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'header-side-align' => array(
						'title' => esc_html__('Header Side Text Align', 'arki'),
						'type' => 'radioimage',
						'options' => 'text-align',
						'default' => 'left',
						'condition' => array( 'header-style' => 'side' )
					),
					'header-side-toggle-style' => array(
						'title' => esc_html__('Header Side Toggle Style', 'arki'),
						'type' => 'radioimage',
						'options' => array(
							'left' => get_template_directory_uri() . '/images/header/side-toggle-left.jpg',
							'right' => get_template_directory_uri() . '/images/header/side-toggle-right.jpg',
						),
						'default' => 'left',
						'condition' => array( 'header-style' => 'side-toggle' ),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'header-side-toggle-menu-type' => array(
						'title' => esc_html__('Header Side Toggle Menu Type', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'left' => esc_html__('Left Slide Menu', 'arki'),
							'right' => esc_html__('Right Slide Menu', 'arki'),
							'overlay' => esc_html__('Overlay Menu', 'arki'),
						),
						'default' => 'overlay',
						'condition' => array( 'header-style' => 'side-toggle' )
					),
					'header-side-toggle-display-logo' => array(
						'title' => esc_html__('Display Logo', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'condition' => array( 'header-style' => 'side-toggle' )
					),
					'header-width' => array(
						'title' => esc_html__('Header Width', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'boxed' => esc_html__('Boxed ( Within Container )', 'arki'),
							'full' => esc_html__('Full', 'arki'),
							'custom' => esc_html__('Custom', 'arki'),
						),
						'condition' => array('header-style'=> array('plain', 'bar', 'bar2', 'boxed'))
					),
					'header-width-pixel' => array(
						'title' => esc_html__('Header Width Pixel', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
						'data-type' => 'pixel',
						'default' => '1140px',
						'condition' => array('header-style'=> array('plain', 'bar', 'bar2', 'boxed'), 'header-width' => 'custom'),
						'selector' => '.arki-header-container.arki-header-custom-container{ max-width: #gdlr#; }'
					),
					'header-full-side-padding' => array(
						'title' => esc_html__('Header Full ( Left/Right ) Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '100',
						'data-type' => 'pixel',
						'default' => '15px',
						'selector' => '.arki-header-container.arki-header-full{ padding-right: #gdlr#; padding-left: #gdlr#; }',
						'condition' => array('header-style'=> array('plain', 'bar', 'bar2', 'boxed'), 'header-width'=>'full')
					),
					'boxed-header-frame-radius' => array(
						'title' => esc_html__('Header Frame Radius', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '3px',
						'condition' => array( 'header-style' => 'boxed' ),
						'selector' => '.arki-header-boxed-wrap .arki-header-background{ border-radius: #gdlr#; -moz-border-radius: #gdlr#; -webkit-border-radius: #gdlr#; }'
					),
					'boxed-header-content-padding' => array(
						'title' => esc_html__('Header Content ( Left/Right ) Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '100',
						'data-type' => 'pixel',
						'default' => '30px',
						'selector' => '.arki-header-style-boxed .arki-header-container-item{ padding-left: #gdlr#; padding-right: #gdlr#; }' . 
							'.arki-navigation-right{ right: #gdlr#; } .arki-navigation-left{ left: #gdlr#; }',
						'condition' => array( 'header-style' => 'boxed' )
					),
					'navigation-text-top-margin' => array(
						'title' => esc_html__('Navigation Text Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '200',
						'default' => '0px',
						'condition' => array( 'header-style' => 'plain', 'header-plain-style' => 'splitted-menu' ),
						'selector' => '.arki-header-style-plain.arki-style-splitted-menu .arki-navigation .sf-menu > li > a{ padding-top: #gdlr#; } ' .
							'.arki-header-style-plain.arki-style-splitted-menu .arki-main-menu-left-wrap,' .
							'.arki-header-style-plain.arki-style-splitted-menu .arki-main-menu-right-wrap{ padding-top: #gdlr#; }'
					),
					'navigation-text-top-margin-boxed' => array(
						'title' => esc_html__('Navigation Text Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '200',
						'default' => '0px',
						'condition' => array( 'header-style' => 'boxed', 'header-boxed-style' => 'splitted-menu' ),
						'selector' => '.arki-header-style-boxed.arki-style-splitted-menu .arki-navigation .sf-menu > li > a{ padding-top: #gdlr#; } ' .
							'.arki-header-style-boxed.arki-style-splitted-menu .arki-main-menu-left-wrap,' .
							'.arki-header-style-boxed.arki-style-splitted-menu .arki-main-menu-right-wrap{ padding-top: #gdlr#; }'
					),
					'navigation-text-side-spacing' => array(
						'title' => esc_html__('Navigation Text Side ( Left / Right ) Spaces', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '30',
						'data-type' => 'pixel',
						'default' => '13px',
						'selector' => '.arki-navigation .sf-menu > li{ padding-left: #gdlr#; padding-right: #gdlr#; }',
						'condition' => array( 'header-style' => array('plain', 'bar', 'bar2', 'boxed') )
					),
					'navigation-left-offset' => array(
						'title' => esc_html__('Navigation Left Offset Spaces', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '0',
						'selector' => '.arki-navigation .arki-main-menu{ margin-left: #gdlr#; }'
					),
					'navigation-slide-bar' => array(
						'title' => esc_html__('Navigation Slide Bar', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'disable' => esc_html__('Disable', 'arki'),
							'enable' => esc_html__('Bar With Triangle Style', 'arki'),
							'style-2' => esc_html__('Bar Style', 'arki'),
							'style-2-left' => esc_html__('Bar Style Left', 'arki'),
							'style-dot' => esc_html__('Dot Style', 'arki')
						),
						'default' => 'enable',
						'condition' => array( 'header-style' => array('plain', 'bar', 'bar2', 'boxed') )
					),
					'navigation-slide-bar-width' => array(
						'title' => esc_html__('Navigation Slide Bar Width', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'condition' => array( 'header-style' => array('plain', 'bar', 'bar2', 'boxed'), 'navigation-slide-bar' => array('style-2', 'style-2-left') )
					),
					'navigation-slide-bar-height' => array(
						'title' => esc_html__('Navigation Slide Bar Height', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-navigation .arki-navigation-slide-bar-style-2{ border-bottom-width: #gdlr#; }',
						'condition' => array( 'header-style' => array('plain', 'bar', 'bar2', 'boxed'), 'navigation-slide-bar' => array('style-2', 'style-2-left') )
					),
					'navigation-slide-bar-top-margin' => array(
						'title' => esc_html__('Navigation Slide Bar Top Margin', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '',
						'selector' => '.arki-navigation .arki-navigation-slide-bar{ margin-top: #gdlr#; }',
						'condition' => array( 'header-style' => array('plain', 'bar', 'bar2', 'boxed'), 'navigation-slide-bar' => array('enable', 'style-2', 'style-2-left', 'style-dot') )
					),
					'side-header-width-pixel' => array(
						'title' => esc_html__('Header Width Pixel', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '600',
						'default' => '340px',
						'condition' => array('header-style' => array('side', 'side-toggle')),
						'selector' => '.arki-header-side-nav{ width: #gdlr#; }' . 
							'.arki-header-side-content.arki-style-left{ margin-left: #gdlr#; }' .
							'.arki-header-side-content.arki-style-right{ margin-right: #gdlr#; }'
					),
					'side-header-side-padding' => array(
						'title' => esc_html__('Header Side Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '200',
						'default' => '70px',
						'condition' => array('header-style' => 'side'),
						'selector' => '.arki-header-side-nav.arki-style-side{ padding-left: #gdlr#; padding-right: #gdlr#; }' . 
							'.arki-header-side-nav.arki-style-left .sf-vertical > li > ul.sub-menu{ padding-left: #gdlr#; }' .
							'.arki-header-side-nav.arki-style-right .sf-vertical > li > ul.sub-menu{ padding-right: #gdlr#; }'
					),
					'navigation-text-top-spacing' => array(
						'title' => esc_html__('Navigation Text Top / Bottom Spaces', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '40',
						'data-type' => 'pixel',
						'default' => '16px',
						'selector' => ' .arki-navigation .sf-vertical > li{ padding-top: #gdlr#; padding-bottom: #gdlr#; }',
						'condition' => array( 'header-style' => array('side') )
					),
					'logo-right-text' => array(
						'title' => esc_html__('Header Right Text', 'arki'),
						'type' => 'textarea',
						'condition' => array('header-style' => array('bar', 'bar2')),
					),
					'logo-right-text-top-padding' => array(
						'title' => esc_html__('Header Right Text Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '200',
						'default' => '30px',
						'condition' => array('header-style' => array('bar', 'bar2')),
						'selector' => '.arki-header-style-bar .arki-logo-right-text{ padding-top: #gdlr#; }'
					),
					'header-shadow-size' => array(
						'title' => esc_html__('Header Shadow Size', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
						'condition' => array( 'header-style' => 'plain' )
					),
					'header-shadow-color' => array(
						'title' => esc_html__('Header Shadow Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#000',
						'selector-extra' => true,
						'selector' => '.arki-header-style-plain{ ' . 
							'box-shadow: 0px 0px <header-shadow-size>t rgba(#gdlra#, 0.1); ' . 
							'-webkit-box-shadow: 0px 0px <header-shadow-size>t rgba(#gdlra#, 0.1); ' . 
							'-moz-box-shadow: 0px 0px <header-shadow-size>t rgba(#gdlra#, 0.1); }',
						'condition' => array( 'header-style' => 'plain' )
					)
				)
			);
		}
	}

	if( !function_exists('arki_logo_options') ){
		function arki_logo_options(){
			return array(
				'title' => esc_html__('Logo', 'arki'),
				'options' => array(
					'enable-logo' => array(
						'title' => esc_html__('Enable Logo', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'logo' => array(
						'title' => esc_html__('Logo', 'arki'),
						'type' => 'upload',
						'condition' => array( 'enable-logo' => 'enable' )
					),
					'logo2x' => array(
						'title' => esc_html__('Logo 2x (Retina)', 'arki'),
						'type' => 'upload',
						'condition' => array( 'enable-logo' => 'enable' )
					),
					'logo-top-padding' => array(
						'title' => esc_html__('Logo Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '200',
						'data-type' => 'pixel',
						'default' => '20px',
						'selector' => '.arki-logo{ padding-top: #gdlr#; }',
						'description' => esc_html__('This option will be omitted on splitted menu option.', 'arki'),
						'condition' => array( 'enable-logo' => 'enable' )
					),
					'logo-bottom-padding' => array(
						'title' => esc_html__('Logo Bottom Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '200',
						'data-type' => 'pixel',
						'default' => '20px',
						'selector' => '.arki-logo{ padding-bottom: #gdlr#; }',
						'description' => esc_html__('This option will be omitted on splitted menu option.', 'arki'),
						'condition' => array( 'enable-logo' => 'enable' )
					),
					'logo-left-padding' => array(
						'title' => esc_html__('Logo Left Padding', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-logo.arki-item-pdlr{ padding-left: #gdlr#; }',
						'description' => esc_html__('Leave this field blank for default value.', 'arki'),
						'condition' => array( 'enable-logo' => 'enable' )
					),
					'max-logo-width' => array(
						'title' => esc_html__('Max Logo Width', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '200px',
						'selector' => '.arki-logo-inner{ max-width: #gdlr#; }',
						'condition' => array( 'enable-logo' => 'enable' )
					),

					'mobile-logo' => array(
						'title' => esc_html__('Mobile/Tablet Logo', 'arki'),
						'type' => 'upload',
						'description' => esc_html__('Leave this option blank to use the same logo.', 'arki'),
						'condition' => array( 'enable-logo' => 'enable' )
					),
					'max-tablet-logo-width' => array(
						'title' => esc_html__('Max Tablet Logo Width', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '@media only screen and (max-width: 999px){ .arki-mobile-header .arki-logo-inner{ max-width: #gdlr#; } }',
						'condition' => array( 'enable-logo' => 'enable' )
					),
					'max-mobile-logo-width' => array(
						'title' => esc_html__('Max Mobile Logo Width', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '@media only screen and (max-width: 767px){ .arki-mobile-header .arki-logo-inner{ max-width: #gdlr#; } }',
						'condition' => array( 'enable-logo' => 'enable' )
					),
					'mobile-logo-position' => array(
						'title' => esc_html__('Mobile Logo Position', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'logo-left' => esc_html__('Logo Left', 'arki'),
							'logo-center' => esc_html__('Logo Center', 'arki'),
							'logo-right' => esc_html__('Logo Right', 'arki'),
						),
						'condition' => array( 'enable-logo' => 'enable' )
					),
				
				)
			);
		}
	}

	if( !function_exists('arki_navigation_options') ){
		function arki_navigation_options(){
			return array(
				'title' => esc_html__('Navigation', 'arki'),
				'options' => array(
					'main-navigation-top-padding' => array(
						'title' => esc_html__('Main Navigation Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '200',
						'data-type' => 'pixel',
						'default' => '25px',
						'selector' => '.arki-navigation{ padding-top: #gdlr#; }' . 
							'.arki-navigation-top{ top: #gdlr#; }'
					),
					'main-navigation-bottom-padding' => array(
						'title' => esc_html__('Main Navigation Bottom Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '200',
						'data-type' => 'pixel',
						'default' => '20px',
						'selector' => '.arki-navigation .sf-menu > li > a{ padding-bottom: #gdlr#; }'
					),
					'main-navigation-item-right-padding' => array(
						'title' => esc_html__('Main Navigation Item Right Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '200',
						'data-type' => 'pixel',
						'default' => '0px',
						'selector' => '.arki-navigation .arki-main-menu{ padding-right: #gdlr#; }'
					),
					'main-navigation-right-padding' => array(
						'title' => esc_html__('Main Navigation Wrap Right Padding', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-navigation.arki-item-pdlr{ padding-right: #gdlr#; }',
						'description' => esc_html__('Leave this field blank for default value.', 'arki'),
					),
					'enable-main-navigation-submenu-indicator' => array(
						'title' => esc_html__('Enable Main Navigation Submenu Indicator', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable',
					),
					'navigation-right-top-margin' => array(
						'title' => esc_html__('Navigation Right ( search/cart/button ) Top Margin ', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
						'data-type' => 'pixel',
						'selector' => '.arki-main-menu-right-wrap{ margin-top: #gdlr#; }'
					),
					'navigation-right-right-margin' => array(
						'title' => esc_html__('Navigation Right Right Margin ', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
						'data-type' => 'pixel',
						'selector' => '.arki-main-menu-right-wrap.arki-item-mglr{ margin-right: #gdlr#; }'
					),
					'enable-main-navigation-search' => array(
						'title' => esc_html__('Enable Main Navigation Search', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
					),
					'main-navigation-search-icon' => array(
						'title' => esc_html__('Main Navigation Search Icon', 'arki'),
						'type' => 'text',
						'default' => 'fa fa-search',
						'condition' => array('enable-main-navigation-search' => 'enable')
					),
					'main-navigation-search-icon-top-margin' => array(
						'title' => esc_html__('Main Navigation Search Icon Top Margin', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-main-menu-search{ margin-top: #gdlr#; }',
						'condition' => array('enable-main-navigation-search' => 'enable')
					),
					'enable-main-navigation-cart' => array(
						'title' => esc_html__('Enable Main Navigation Cart ( Woocommerce )', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'description' => esc_html__('The icon only shows if the woocommerce plugin is activated', 'arki')
					),
					'main-navigation-cart-icon' => array(
						'title' => esc_html__('Main Navigation Cart Icon', 'arki'),
						'type' => 'text',
						'default' => 'fa fa-shopping-cart',
						'condition' => array('enable-main-navigation-search' => 'enable')
					),
					'main-navigation-cart-icon-top-margin' => array(
						'title' => esc_html__('Main Navigation Cart Icon Top Margin', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel', 
						'selector' => '.arki-main-menu-cart{ margin-top: #gdlr#; }',
						'condition' => array('enable-main-navigation-search' => 'enable')
					),
					'enable-main-navigation-right-button' => array(
						'title' => esc_html__('Enable Main Navigation Right Button', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable',
						'description' => esc_html__('This option will be ignored on header side style', 'arki')
					),
					'main-navigation-right-button-style' => array(
						'title' => esc_html__('Main Navigation Right Button Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'default' => esc_html__('Default', 'arki'),
							'round' => esc_html__('Round', 'arki'),
							'round-with-shadow' => esc_html__('Round With Shadow', 'arki'),
						),
						'condition' => array( 'enable-main-navigation-right-button' => 'enable' ) 
					),
					'main-navigation-right-button-text' => array(
						'title' => esc_html__('Main Navigation Right Button Text', 'arki'),
						'type' => 'text',
						'default' => esc_html__('Buy Now', 'arki'),
						'condition' => array( 'enable-main-navigation-right-button' => 'enable' ) 
					),
					'main-navigation-right-button-link' => array(
						'title' => esc_html__('Main Navigation Right Button Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-main-navigation-right-button' => 'enable' ) 
					),
					'main-navigation-right-button-link-target' => array(
						'title' => esc_html__('Main Navigation Right Button Link Target', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'_self' => esc_html__('Current Screen', 'arki'),
							'_blank' => esc_html__('New Window', 'arki'),
						),
						'condition' => array( 'enable-main-navigation-right-button' => 'enable' ) 
					),
					'main-navigation-right-button-style-2' => array(
						'title' => esc_html__('Main Navigation Right Button Style 2', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'default' => esc_html__('Default', 'arki'),
							'round' => esc_html__('Round', 'arki'),
							'round-with-shadow' => esc_html__('Round With Shadow', 'arki'),
						),
						'condition' => array( 'enable-main-navigation-right-button' => 'enable' ) 
					),
					'main-navigation-right-button-text-2' => array(
						'title' => esc_html__('Main Navigation Right Button Text 2', 'arki'),
						'type' => 'text',
						'default' => esc_html__('Buy Now', 'arki'),
						'condition' => array( 'enable-main-navigation-right-button' => 'enable' ) 
					),
					'main-navigation-right-button-link-2' => array(
						'title' => esc_html__('Main Navigation Right Button Link 2', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-main-navigation-right-button' => 'enable' ) 
					),
					'main-navigation-right-button-link-target-2' => array(
						'title' => esc_html__('Main Navigation Right Button Link Target 2', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'_self' => esc_html__('Current Screen', 'arki'),
							'_blank' => esc_html__('New Window', 'arki'),
						),
						'condition' => array( 'enable-main-navigation-right-button' => 'enable' ) 
					),
					'right-menu-type' => array(
						'title' => esc_html__('Secondary/Mobile Menu Type', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'left' => esc_html__('Left Slide Menu', 'arki'),
							'right' => esc_html__('Right Slide Menu', 'arki'),
							'overlay' => esc_html__('Overlay Menu', 'arki'),
						),
						'default' => 'right'
					),
					'right-menu-style' => array(
						'title' => esc_html__('Secondary/Mobile Menu Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'hamburger-with-border' => esc_html__('Hamburger With Border ( Font Awesome )', 'arki'),
							'hamburger' => esc_html__('Hamburger', 'arki'),
							'hamburger-small' => esc_html__('Hamburger Small', 'arki'),
						),
						'default' => 'hamburger-with-border'
					),
					'side-content-menu' => array(
						'title' => esc_html__('Side Content Menu', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
					'side-content-widget' => array(
						'title' => esc_html__('Choose Side Content Widget', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'condition' => array( 'side-content-menu' => 'enable' )
					),
					'side-content-background-color' => array(
						'title' => esc_html__('Side Content Background Color', 'arki'),
						'type' => 'colorpicker',
						'selector' => '.arki-header-side-content, #arki-side-content-menu{ background-color: #gdlr#; }',
						'condition' => array( 'side-content-menu' => 'enable' )
					),
					'side-content-shadow-size' => array(
						'title' => esc_html__('Side Content Shadow Size', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'condition' => array( 'side-content-menu' => 'enable' )
					),
					'side-content-shadow-opacity' => array(
						'title' => esc_html__('Side Content Shadow Opacity', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'default' => '0.1',
						'condition' => array( 'side-content-menu' => 'enable' ),
						'selector-extra' => true,
						'selector' => '#arki-side-content-menu{ box-shadow: 0px 0px <side-content-shadow-size>t rgba(0, 0, 0, #gdlr#); -webkit-box-shadow: 0px 0px <side-content-shadow-size>t rgba(0, 0, 0, #gdlr#); }'
					),
					
				) // logo-options
			);
		}
	}

	if( !function_exists('arki_fixed_navigation_options') ){
		function arki_fixed_navigation_options(){
			return array(
				'title' => esc_html__('Fixed Navigation', 'arki'),
				'options' => array(

					'enable-main-navigation-sticky' => array(
						'title' => esc_html__('Enable Fixed Navigation Bar', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
					),
					'enable-logo-on-main-navigation-sticky' => array(
						'title' => esc_html__('Enable Logo on Fixed Navigation Bar', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'description' => esc_html__('This option will be omitted when the logo is disabeld', 'arki'),
						'condition' => array( 'enable-main-navigation-sticky' => 'enable' )
					),
					'fixed-navigation-bar-logo' => array(
						'title' => esc_html__('Fixed Navigation Bar Logo', 'arki'),
						'type' => 'upload',
						'description' => esc_html__('Leave blank to show default logo', 'arki'),
						'condition' => array( 'enable-main-navigation-sticky' => 'enable', 'enable-logo-on-main-navigation-sticky' => 'enable' )
					),
					'fixed-navigation-bar-logo2x' => array(
						'title' => esc_html__('Fixed Navigation Bar Logo 2x (Retina)', 'arki'),
						'type' => 'upload',
						'description' => esc_html__('Leave blank to show default logo', 'arki'),
						'condition' => array( 'enable-main-navigation-sticky' => 'enable', 'enable-logo-on-main-navigation-sticky' => 'enable' )
					),
					'fixed-navigation-max-logo-width' => array(
						'title' => esc_html__('Fixed Navigation Max Logo Width', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '',
						'condition' => array( 'enable-main-navigation-sticky' => 'enable' ),
						'selector' => '.arki-fixed-navigation.arki-style-slide .arki-logo-inner img{ max-height: none !important; }' .
							'.arki-animate-fixed-navigation.arki-header-style-plain .arki-logo-inner, ' . 
							'.arki-animate-fixed-navigation.arki-header-style-boxed .arki-logo-inner{ max-width: #gdlr#; }' . 
							'.arki-mobile-header.arki-fixed-navigation .arki-logo-inner{ max-width: #gdlr#; }'
					),
					'fixed-navigation-logo-top-padding' => array(
						'title' => esc_html__('Fixed Navigation Logo Top Padding', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '20px',
						'condition' => array( 'enable-main-navigation-sticky' => 'enable' ),
						'selector' => '.arki-animate-fixed-navigation.arki-header-style-plain .arki-logo, ' . 
							'.arki-animate-fixed-navigation.arki-header-style-boxed .arki-logo{ padding-top: #gdlr#; }'
					),
					'fixed-navigation-logo-bottom-padding' => array(
						'title' => esc_html__('Fixed Navigation Logo Bottom Padding', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '20px',
						'condition' => array( 'enable-main-navigation-sticky' => 'enable' ),
						'selector' => '.arki-animate-fixed-navigation.arki-header-style-plain .arki-logo, ' . 
							'.arki-animate-fixed-navigation.arki-header-style-boxed .arki-logo{ padding-bottom: #gdlr#; }'
					),
					'fixed-navigation-top-padding' => array(
						'title' => esc_html__('Fixed Navigation Top Padding', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '30px',
						'condition' => array( 'enable-main-navigation-sticky' => 'enable' ),
						'selector' => '.arki-animate-fixed-navigation.arki-header-style-plain .arki-navigation, ' . 
							'.arki-animate-fixed-navigation.arki-header-style-boxed .arki-navigation{ padding-top: #gdlr#; }' . 
							'.arki-animate-fixed-navigation.arki-header-style-plain .arki-navigation-top, ' . 
							'.arki-animate-fixed-navigation.arki-header-style-boxed .arki-navigation-top{ top: #gdlr#; }' .
							'.arki-animate-fixed-navigation.arki-navigation-bar-wrap .arki-navigation{ padding-top: #gdlr#; }'
					),
					'fixed-navigation-bottom-padding' => array(
						'title' => esc_html__('Fixed Navigation Bottom Padding', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '25px',
						'condition' => array( 'enable-main-navigation-sticky' => 'enable' ),
						'selector' => '.arki-animate-fixed-navigation.arki-header-style-plain .arki-navigation .sf-menu > li > a, ' . 
							'.arki-animate-fixed-navigation.arki-header-style-boxed .arki-navigation .sf-menu > li > a{ padding-bottom: #gdlr#; }' .
							'.arki-animate-fixed-navigation.arki-navigation-bar-wrap .arki-navigation .sf-menu > li > a{ padding-bottom: #gdlr#; }' .
							'.arki-animate-fixed-navigation .arki-main-menu-right{ margin-bottom: #gdlr#; }'
					),
					'enable-fixed-navigation-slide-bar' => array(
						'title' => esc_html__('Enable Fixed Navigation Slide Bar', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'fixed-navigation-slide-bar-top-margin' => array(
						'title' => esc_html__('Fixed Navigation Slide Bar Top Margin', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '',
						'selector' => '.arki-fixed-navigation .arki-navigation .arki-navigation-slide-bar{ margin-top: #gdlr#; }',
						'condition' => array('enable-fixed-navigation-slide-bar' => 'enable')
					),
					'fixed-navigation-anchor-offset' => array(
						'title' => esc_html__('Fixed Navigation Anchor Offset ( Fixed Navigation Height )', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '75px',
						'condition' => array( 'enable-main-navigation-sticky' => 'enable' ),
					),
					'enable-mobile-navigation-sticky' => array(
						'title' => esc_html__('Enable Mobile Fixed Navigation Bar', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
					),

				)
			);
		}
	}

	if( !function_exists('arki_navigation_font_size_options') ){
		function arki_navigation_font_size_options(){
			return array(
				'title' => esc_html__('Navigation Font Size', 'arki'),
				'options' => array(	
					'navigation-font-size' => array(
						'title' => esc_html__('Navigation Font Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '14px',
						'selector' => '.arki-navigation .sf-menu > li > a, .arki-navigation .sf-vertical > li > a{ font-size: #gdlr#; }' 
					),	
					'navigation-font-weight' => array(
						'title' => esc_html__('Navigation Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'default' => '800',
						'selector' => '.arki-navigation .sf-menu > li > a, .arki-navigation .sf-vertical > li > a{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),	
					'navigation-font-letter-spacing' => array(
						'title' => esc_html__('Navigation Font Letter Spacing', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-navigation .sf-menu > li > a, .arki-navigation .sf-vertical > li > a{ letter-spacing: #gdlr#; }'
					),
					'navigation-text-transform' => array(
						'title' => esc_html__('Navigation Text Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'uppercase',
						'selector' => '.arki-navigation .sf-menu > li > a, .arki-navigation .sf-vertical > li > a{ text-transform: #gdlr#; }',
					),
					'sub-navigation-font-size' => array(
						'title' => esc_html__('Sub Navigation Font Size', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
						'data-type' => 'pixel',
						'selector' => '.arki-navigation .sf-menu > .arki-normal-menu .sub-menu, .arki-navigation .sf-menu>.arki-mega-menu .sf-mega-section-inner .sub-menu a{ font-size: #gdlr#; }' 
					),
					'sub-navigation-font-weight' => array(
						'title' => esc_html__('Sub Navigation Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'default' => '800',
						'selector' => '.arki-navigation .sf-menu > .arki-normal-menu .sub-menu, .arki-navigation .sf-menu>.arki-mega-menu .sf-mega-section-inner .sub-menu a{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),	
					'sub-navigation-font-letter-spacing' => array(
						'title' => esc_html__('Sub Navigation Font Letter Spacing', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-navigation .sf-menu > .arki-normal-menu .sub-menu, .arki-navigation .sf-menu>.arki-mega-menu .sf-mega-section-inner .sub-menu a{ letter-spacing: #gdlr#; }'
					),
					'sub-navigation-text-transform' => array(
						'title' => esc_html__('Sub Navigation Text Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'uppercase',
						'selector' => '.arki-navigation .sf-menu > .arki-normal-menu .sub-menu, .arki-navigation .sf-menu>.arki-mega-menu .sf-mega-section-inner .sub-menu a{ text-transform: #gdlr#; }',
					),
					'navigation-right-button-font-size' => array(
						'title' => esc_html__('Navigation Right Button Font Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '11px',
						'selector' => '.arki-main-menu-right-button{ font-size: #gdlr#; }' 
					),	
					'navigation-right-button-font-weight' => array(
						'title' => esc_html__('Navigation Right Button Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'selector' => '.arki-main-menu-right-button{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),	
					'navigation-right-button-font-letter-spacing' => array(
						'title' => esc_html__('Navigation Right Button Font Letter Spacing', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-main-menu-right-button{ letter-spacing: #gdlr#; }'
					),
					'navigation-right-button-text-transform' => array(
						'title' => esc_html__('Navigation Right Button Text Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'uppercase',
						'selector' => '.arki-main-menu-right-button{ text-transform: #gdlr#; }',
					),
				) // font-size-options
			);
		}
	}

	if( !function_exists('arki_header_color_options') ){
		function arki_header_color_options(){

			return array(
				'title' => esc_html__('Header', 'arki'),
				'options' => array(
					'top-bar-background-color' => array(
						'title' => esc_html__('Top Bar Background Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#222222',
						'selector' => '.arki-top-bar-background{ background-color: #gdlr#; }'
					),
					'top-bar-bottom-border-color' => array(
						'title' => esc_html__('Top Bar Bottom Border Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector' => '.arki-body .arki-top-bar{ border-bottom-color: #gdlr#; }'
					),
					'top-bar-text-color' => array(
						'title' => esc_html__('Top Bar Text Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector' => '.arki-top-bar{ color: #gdlr#; }'
					),
					'top-bar-link-color' => array(
						'title' => esc_html__('Top Bar Link Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector' => '.arki-body .arki-top-bar a{ color: #gdlr#; }'
					),
					'top-bar-link-hover-color' => array(
						'title' => esc_html__('Top Bar Link Hover Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector' => '.arki-body .arki-top-bar a:hover{ color: #gdlr#; }'
					),
					'top-bar-social-color' => array(
						'title' => esc_html__('Top Bar Social Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector' => '.arki-top-bar .arki-top-bar-right-social a{ color: #gdlr#; }'
					),
					'top-bar-social-hover-color' => array(
						'title' => esc_html__('Top Bar Social Hover Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#e44444',
						'selector' => '.arki-top-bar .arki-top-bar-right-social a:hover{ color: #gdlr#; }'
					),
					'header-background-color' => array(
						'title' => esc_html__('Header Background Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector' => '.arki-header-background, .arki-sticky-menu-placeholder, .arki-header-style-boxed.arki-fixed-navigation, body.single-product .arki-header-background-transparent{ background-color: #gdlr#; }'
					),
					'header-plain-bottom-border-color' => array(
						'title' => esc_html__('Header Bottom Border Color ( Header Plain Style )', 'arki'),
						'type' => 'colorpicker',
						'default' => '#e8e8e8',
						'selector' => '.arki-header-wrap.arki-header-style-plain{ border-color: #gdlr#; }'
					),
					'logo-background-color' => array(
						'title' => esc_html__('Logo Background Color ( Header Side Menu Toggle Style )', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector' => '.arki-header-side-nav.arki-style-side-toggle .arki-logo{ background-color: #gdlr#; }'
					),
					'secondary-menu-icon-color' => array(
						'title' => esc_html__('Secondary Menu Icon Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#383838',
						'selector'=> '.arki-top-menu-button i, .arki-mobile-menu-button i{ color: #gdlr#; }' . 
							'.arki-mobile-button-hamburger:before, ' . 
							'.arki-mobile-button-hamburger:after, ' . 
							'.arki-mobile-button-hamburger span, ' . 
							'.arki-mobile-button-hamburger-small:before, ' . 
							'.arki-mobile-button-hamburger-small:after, ' . 
							'.arki-mobile-button-hamburger-small span{ background: #gdlr#; }' .
							'.arki-side-content-menu-button span,' .
							'.arki-side-content-menu-button:before, ' .
							'.arki-side-content-menu-button:after{ background: #gdlr#; }'
					),
					'secondary-menu-border-color' => array(
						'title' => esc_html__('Secondary Menu Border Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#dddddd',
						'selector'=> '.arki-main-menu-right .arki-top-menu-button, .arki-mobile-menu .arki-mobile-menu-button{ border-color: #gdlr#; }'
					),
					'search-overlay-background-color' => array(
						'title' => esc_html__('Search Overlay Background Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#000000',
						'selector'=> '.arki-top-search-wrap{ background-color: #gdlr#; background-color: rgba(#gdlra#, 0.88); }'
					),
					'top-cart-background-color' => array(
						'title' => esc_html__('Top Cart Background Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector'=> '.arki-top-cart-content-wrap .arki-top-cart-content{ background-color: #gdlr#; }'
					),
					'top-cart-title-color' => array(
						'title' => esc_html__('Top Cart Title Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#000000',
						'selector'=> '.arki-top-cart-content-wrap .arki-top-cart-title, .arki-top-cart-item .arki-top-cart-item-title, ' . 
							'.arki-top-cart-item .arki-top-cart-item-remove{ color: #gdlr#; }'
					),
					'top-cart-info-color' => array(
						'title' => esc_html__('Top Cart Info Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#6c6c6c',
						'selector'=> '.arki-top-cart-content-wrap .woocommerce-Price-amount.amount{ color: #gdlr#; }'
					),
					'top-cart-view-cart-color' => array(
						'title' => esc_html__('Top Cart : View Cart Text Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#323232',
						'selector'=> '.arki-body .arki-top-cart-button-wrap .arki-top-cart-button, .arki-body .arki-top-cart-button-wrap .arki-top-cart-button:hover{ color: #gdlr#; }'
					),
					'top-cart-view-cart-background-color' => array(
						'title' => esc_html__('Top Cart : View Cart Background Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#f4f4f4',
						'selector'=> '.arki-body .arki-top-cart-button-wrap .arki-top-cart-button{ background-color: #gdlr#; }'
					),
					'top-cart-checkout-color' => array(
						'title' => esc_html__('Top Cart : Checkout Text Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector'=> '.arki-body .arki-top-cart-button-wrap .arki-top-cart-button-2{ color: #gdlr#; }'
					),
					'top-cart-checkout-background-color' => array(
						'title' => esc_html__('Top Cart : Checkout Background Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#000000',
						'selector'=> '.arki-body .arki-top-cart-button-wrap .arki-top-cart-button-2{ background-color: #gdlr#; }'
					),
					'breadcrumbs-text-color' => array(
						'title' => esc_html__('Breadcrumbs ( Plugin ) Text Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#c0c0c0',
						'selector'=> '.arki-body .arki-breadcrumbs, .arki-body .arki-breadcrumbs a span, ' . 
							'.gdlr-core-breadcrumbs-item, .gdlr-core-breadcrumbs-item a span{ color: #gdlr#; }'
					),
					'breadcrumbs-text-active-color' => array(
						'title' => esc_html__('Breadcrumbs ( Plugin ) Text Active Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#777777',
						'selector'=> '.arki-body .arki-breadcrumbs span, .arki-body .arki-breadcrumbs a:hover span, ' . 
							'.gdlr-core-breadcrumbs-item span, .gdlr-core-breadcrumbs-item a:hover span{ color: #gdlr#; }'
					),
				) // header-options
			);

		}
	}

	if( !function_exists('arki_navigation_color_options') ){
		function arki_navigation_color_options(){

			return array(
				'title' => esc_html__('Menu', 'arki'),
				'options' => array(

					'navigation-bar-background-color' => array(
						'title' => esc_html__('Navigation Bar Background Color ( Header Bar Style )', 'arki'),
						'type' => 'colorpicker',
						'default' => '#f4f4f4',
						'selector' => '.arki-navigation-background{ background-color: #gdlr#; }'
					),
					'navigation-bar-top-border-color' => array(
						'title' => esc_html__('Navigation Bar Top Border Color ( Header Bar Style )', 'arki'),
						'type' => 'colorpicker',
						'default' => '#e8e8e8',
						'selector' => '.arki-navigation-bar-wrap{ border-color: #gdlr#; }'
					),
					'navigation-slide-bar-color' => array(
						'title' => esc_html__('Navigation Slide Bar Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#2d9bea',
						'selector' => '.arki-navigation .arki-navigation-slide-bar, ' . 
							'.arki-navigation .arki-navigation-slide-bar-style-dot:before{ border-color: #gdlr#; }' . 
							'.arki-navigation .arki-navigation-slide-bar:before{ border-bottom-color: #gdlr#; }'
					),
					'main-menu-text-color' => array(
						'title' => esc_html__('Main Menu Text Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#999999',
						'selector' => '.sf-menu > li > a, .sf-vertical > li > a{ color: #gdlr#; }'
					),
					'main-menu-text-hover-color' => array(
						'title' => esc_html__('Main Menu Text Hover Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#333333',
						'selector' => '.sf-menu > li > a:hover, ' . 
							'.sf-menu > li.current-menu-item > a, ' .
							'.sf-menu > li.current-menu-ancestor > a, ' .
							'.sf-vertical > li > a:hover, ' . 
							'.sf-vertical > li.current-menu-item > a, ' .
							'.sf-vertical > li.current-menu-ancestor > a{ color: #gdlr#; }'
					),
					'sub-menu-background-color' => array(
						'title' => esc_html__('Sub Menu Background Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#2e2e2e',
						'selector'=> '.sf-menu > .arki-normal-menu li, .sf-menu > .arki-mega-menu > .sf-mega, ' . 
							'.sf-vertical ul.sub-menu li, ul.sf-menu > .menu-item-language li{ background-color: #gdlr#; }'
					),
					'sub-menu-text-color' => array(
						'title' => esc_html__('Sub Menu Text Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#bebebe',
						'selector'=> '.sf-menu > li > .sub-menu a, .sf-menu > .arki-mega-menu > .sf-mega a, ' . 
							'.sf-vertical ul.sub-menu li a{ color: #gdlr#; }'
					),
					'sub-menu-text-hover-color' => array(
						'title' => esc_html__('Sub Menu Text Hover Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector'=> '.sf-menu > li > .sub-menu a:hover, ' . 
							'.sf-menu > li > .sub-menu .current-menu-item > a, ' . 
							'.sf-menu > li > .sub-menu .current-menu-ancestor > a, '.
							'.sf-menu > .arki-mega-menu > .sf-mega a:hover, '.
							'.sf-menu > .arki-mega-menu > .sf-mega .current-menu-item > a, '.
							'.sf-vertical > li > .sub-menu a:hover, ' . 
							'.sf-vertical > li > .sub-menu .current-menu-item > a, ' . 
							'.sf-vertical > li > .sub-menu .current-menu-ancestor > a{ color: #gdlr#; }'
					),
					'sub-menu-text-hover-background-color' => array(
						'title' => esc_html__('Sub Menu Text Hover Background', 'arki'),
						'type' => 'colorpicker',
						'default' => '#393939',
						'selector'=> '.sf-menu > li > .sub-menu a:hover, ' . 
							'.sf-menu > li > .sub-menu .current-menu-item > a, ' . 
							'.sf-menu > li > .sub-menu .current-menu-ancestor > a, '.
							'.sf-menu > .arki-mega-menu > .sf-mega a:hover, '.
							'.sf-menu > .arki-mega-menu > .sf-mega .current-menu-item > a, '.
							'.sf-vertical > li > .sub-menu a:hover, ' . 
							'.sf-vertical > li > .sub-menu .current-menu-item > a, ' . 
							'.sf-vertical > li > .sub-menu .current-menu-ancestor > a{ background-color: #gdlr#; }'
					),
					'sub-mega-menu-title-color' => array(
						'title' => esc_html__('Sub Mega Menu Title Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector'=> '.arki-navigation .sf-menu > .arki-mega-menu .sf-mega-section-inner > a{ color: #gdlr#; }'
					),
					'sub-mega-menu-divider-color' => array(
						'title' => esc_html__('Sub Mega Menu Divider Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#424242',
						'selector'=> '.arki-navigation .sf-menu > .arki-mega-menu .sf-mega-section{ border-color: #gdlr#; }'
					),
					'sub-menu-shadow-size' => array(
						'title' => esc_html__('Sub Menu Shadow Size', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
					),
					'sub-menu-shadow-opacity' => array(
						'title' => esc_html__('Sub Menu Shadow Opacity', 'arki'),
						'type' => 'text',
						'default' => '0.15',
					),
					'sub-menu-shadow-color' => array(
						'title' => esc_html__('Sub Menu Shadow Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#000',
						'selector-extra' => true,
						'selector' => '.arki-navigation .sf-menu > .arki-normal-menu .sub-menu, .arki-navigation .sf-menu > .arki-mega-menu .sf-mega{ ' . 
							'box-shadow: 0px 0px <sub-menu-shadow-size>t rgba(#gdlra#, <sub-menu-shadow-opacity>t); ' .
							'-webkit-box-shadow: 0px 0px <sub-menu-shadow-size>t rgba(#gdlra#, <sub-menu-shadow-opacity>t); ' .
							'-moz-box-shadow: 0px 0px <sub-menu-shadow-size>t rgba(#gdlra#, <sub-menu-shadow-opacity>t); }',
					),
					'fixed-menu-shadow-size' => array(
						'title' => esc_html__('Fixed Menu Shadow Size', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
					),
					'fixed-menu-shadow-opacity' => array(
						'title' => esc_html__('Fixed Menu Shadow Opacity', 'arki'),
						'type' => 'text',
						'default' => '0.15',
					),
					'fixed-menu-shadow-color' => array(
						'title' => esc_html__('Fixed Menu Shadow Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#000',
						'selector-extra' => true,
						'selector' => '.arki-fixed-navigation.arki-style-fixed, .arki-fixed-navigation.arki-style-slide{ ' . 
							'box-shadow: 0px 0px <fixed-menu-shadow-size>t rgba(#gdlra#, <fixed-menu-shadow-opacity>t); ' .
							'-webkit-box-shadow: 0px 0px <fixed-menu-shadow-size>t rgba(#gdlra#, <fixed-menu-shadow-opacity>t); ' .
							'-moz-box-shadow: 0px 0px <fixed-menu-shadow-size>t rgba(#gdlra#, <fixed-menu-shadow-opacity>t); }',
					),
					'side-menu-text-color' => array(
						'title' => esc_html__('Side Menu Text Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#979797',
						'selector'=> '.mm-navbar .mm-title, .mm-navbar .mm-btn, ul.mm-listview li > a, ul.mm-listview li > span{ color: #gdlr#; }' . 
							'ul.mm-listview li a{ border-color: #gdlr#; }' .
							'.mm-arrow:after, .mm-next:after, .mm-prev:before{ border-color: #gdlr#; }'
					),
					'side-menu-text-hover-color' => array(
						'title' => esc_html__('Side Menu Text Hover Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector'=> '.mm-navbar .mm-title:hover, .mm-navbar .mm-btn:hover, ' .
							'ul.mm-listview li a:hover, ul.mm-listview li > span:hover, ' . 
							'ul.mm-listview li.current-menu-item > a, ul.mm-listview li.current-menu-ancestor > a, ul.mm-listview li.current-menu-ancestor > span{ color: #gdlr#; }'
					),
					'side-menu-background-color' => array(
						'title' => esc_html__('Side Menu Background Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#1f1f1f',
						'selector'=> '.mm-menu{ background-color: #gdlr#; }'
					),
					'side-menu-border-color' => array(
						'title' => esc_html__('Side Menu Border Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#626262',
						'selector'=> 'ul.mm-listview li{ border-color: #gdlr#; }'
					),
					'side-menu-shadow-size' => array(
						'title' => esc_html__('Side Menu Shadow Size', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
					),
					'side-menu-shadow-opacity' => array(
						'title' => esc_html__('Side Menu Shadow Opacity', 'arki'),
						'type' => 'text',
						'default' => '0.15',
					),
					'side-menu-shadow-color' => array(
						'title' => esc_html__('Side Menu Shadow Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#000',
						'selector-extra' => true,
						'selector' => '.arki-header-side-nav{ ' . 
							'box-shadow: 0px 0px <side-menu-shadow-size>t rgba(#gdlra#, <side-menu-shadow-opacity>t); ' .
							'-webkit-box-shadow: 0px 0px <side-menu-shadow-size>t rgba(#gdlra#, <side-menu-shadow-opacity>t); ' .
							'-moz-box-shadow: 0px 0px <side-menu-shadow-size>t rgba(#gdlra#, <side-menu-shadow-opacity>t); }',
					),
					'overlay-menu-background-color' => array(
						'title' => esc_html__('Overlay Menu Background Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#000000',
						'selector'=> '.arki-overlay-menu-content{ background-color: #gdlr#; background-color: rgba(#gdlra#, 0.88); }'
					),
					'overlay-menu-border-color' => array(
						'title' => esc_html__('Overlay Menu Border Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#424242',
						'selector'=> '.arki-overlay-menu-content ul.menu > li, .arki-overlay-menu-content ul.sub-menu ul.sub-menu{ border-color: #gdlr#; }'
					),
					'overlay-menu-text-color' => array(
						'title' => esc_html__('Overlay Menu Text Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector'=> '.arki-overlay-menu-content ul li a, .arki-overlay-menu-content .arki-overlay-menu-close{ color: #gdlr#; }'
					),
					'overlay-menu-text-hover-color' => array(
						'title' => esc_html__('Overlay Menu Text Hover Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#a8a8a8',
						'selector'=> '.arki-overlay-menu-content ul li a:hover{ color: #gdlr#; }'
					),
					'anchor-bullet-background-color' => array(
						'title' => esc_html__('Anchor Bullet Background', 'arki'),
						'type' => 'colorpicker',
						'default' => '#777777',
						'selector'=> '.arki-bullet-anchor a:before{ background-color: #gdlr#; }'
					),
					'anchor-bullet-background-active-color' => array(
						'title' => esc_html__('Anchor Bullet Background Active', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector'=> '.arki-bullet-anchor a:hover, .arki-bullet-anchor a.current-menu-item{ border-color: #gdlr#; }' .
							'.arki-bullet-anchor a:hover:before, .arki-bullet-anchor a.current-menu-item:before{ background: #gdlr#; }'
					),		
				) // navigation-menu-options
			);	

		}
	}

	if( !function_exists('arki_navigation_right_color_options') ){
		function arki_navigation_right_color_options(){

			return array(
				'title' => esc_html__('Navigation Right', 'arki'),
				'options' => array(

					'navigation-bar-right-icon-color' => array(
						'title' => esc_html__('Navigation Bar Right Icon Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#383838',
						'selector'=> '.arki-main-menu-search i, .arki-main-menu-cart i{ color: #gdlr#; }'
					),
					'woocommerce-cart-icon-number-background' => array(
						'title' => esc_html__('Woocommmerce Cart\'s Icon Number Background', 'arki'),
						'type' => 'colorpicker',
						'default' => '#bd584e',
						'selector'=> '.arki-main-menu-cart > .arki-top-cart-count{ background-color: #gdlr#; }'
					),
					'woocommerce-cart-icon-number-color' => array(
						'title' => esc_html__('Woocommmerce Cart\'s Icon Number Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#ffffff',
						'selector'=> '.arki-main-menu-cart > .arki-top-cart-count{ color: #gdlr#; }'
					),
					'navigation-right-button-text-color' => array(
						'title' => esc_html__('Navigation Right Button Text Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#333333',
						'selector'=> '.arki-body .arki-main-menu-right-button{ color: #gdlr#; }'
					),
					'navigation-right-button-text-hover-color' => array(
						'title' => esc_html__('Navigation Right Button Text Hover Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#555555',
						'selector'=> '.arki-body .arki-main-menu-right-button:hover{ color: #gdlr#; }'
					),
					'navigation-right-button-background-color' => array(
						'title' => esc_html__('Navigation Right Button Background Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '',
						'selector'=> '.arki-body .arki-main-menu-right-button{ background-color: #gdlr#; }'
					),
					'navigation-right-button-background-hover-color' => array(
						'title' => esc_html__('Navigation Right Button Background Hover Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '',
						'selector'=> '.arki-body .arki-main-menu-right-button:hover{ background-color: #gdlr#; }'
					),
					'navigation-right-button-border-color' => array(
						'title' => esc_html__('Navigation Right Button Border Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#333333',
						'selector'=> '.arki-body .arki-main-menu-right-button{ border-color: #gdlr#; }'
					),
					'navigation-right-button-border-hover-color' => array(
						'title' => esc_html__('Navigation Right Button Border Hover Color', 'arki'),
						'type' => 'colorpicker',
						'default' => '#555555',
						'selector'=> '.arki-body .arki-main-menu-right-button:hover{ border-color: #gdlr#; }'
					),
					'navigation-right-button2-text-color' => array(
						'title' => esc_html__('Navigation Right Button 2 Text Color', 'arki'),
						'type' => 'colorpicker',
						'selector'=> '.arki-body .arki-main-menu-right-button.arki-button-2{ color: #gdlr#; }'
					),
					'navigation-right-button2-text-hover-color' => array(
						'title' => esc_html__('Navigation Right Button 2 Text Hover Color', 'arki'),
						'type' => 'colorpicker',
						'selector'=> '.arki-body .arki-main-menu-right-button.arki-button-2:hover{ color: #gdlr#; }'
					),
					'navigation-right-button2-background-color' => array(
						'title' => esc_html__('Navigation Right Button 2 Background Color', 'arki'),
						'type' => 'colorpicker',
						'selector'=> '.arki-body .arki-main-menu-right-button.arki-button-2{ background-color: #gdlr#; }'
					),
					'navigation-right-button2-background-hover-color' => array(
						'title' => esc_html__('Navigation Right Button 2 Background Hover Color', 'arki'),
						'type' => 'colorpicker',
						'selector'=> '.arki-body .arki-main-menu-right-button.arki-button-2:hover{ background-color: #gdlr#; }'
					),
					'navigation-right-button2-border-color' => array(
						'title' => esc_html__('Navigation Right Button 2 Border Color', 'arki'),
						'type' => 'colorpicker',
						'selector'=> '.arki-body .arki-main-menu-right-button.arki-button-2{ border-color: #gdlr#; }'
					),
					'navigation-right-button2-border-hover-color' => array(
						'title' => esc_html__('Navigation Right Button 2 Border Hover Color', 'arki'),
						'type' => 'colorpicker',
						'selector'=> '.arki-body .arki-main-menu-right-button.arki-button-2:hover{ border-color: #gdlr#; }'
					),
					'navigation-right-button-shadow-color' => array(
						'title' => esc_html__('Main Navigation Right Button Shadow Color', 'arki'),
						'type' => 'colorpicker',
						'data-type' => 'rgba',
						'default' => '#000',
						'selector' => '.arki-main-menu-right-button.arki-style-round-with-shadow{ box-shadow: 0px 4px 18px rgba(#gdlra#, 0.11); -webkit-box-shadow: 0px 4px 18px rgba(#gdlra#, 0.11); } '
					),

				)
			);

		}
	}