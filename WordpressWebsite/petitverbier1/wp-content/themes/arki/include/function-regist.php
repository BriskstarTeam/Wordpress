<?php 
	/*	
	*	Goodlayers Function Inclusion File
	*	---------------------------------------------------------------------
	*	This file contains the script to includes necessary function to the theme
	*	---------------------------------------------------------------------
	*/

	// Set the content width based on the theme's design and stylesheet.
	if( !isset($content_width) ){
		$content_width = str_replace('px', '', '1150px'); 
	}

	// Add body class for page builder
	add_filter('body_class', 'arki_body_class');
	if( !function_exists('arki_body_class') ){
		function arki_body_class( $classes ) {
			$classes[] = 'arki-body';
			$classes[] = 'arki-body-front';

			// layout class
			$layout = arki_get_option('general', 'layout', 'full');
			if( $layout == 'boxed' ){
			 	$classes[] = 'arki-boxed';

			 	$border = arki_get_option('general', 'enable-boxed-border', 'disable');
			 	if( $border == 'enable' ){
			 		$classes[] = 'arki-boxed-border';
			 	}
			}else{
				$classes[] = 'arki-full';
			}

			// background class
			if( $layout == 'boxed' ){
				$post_option = arki_get_post_option(get_the_ID());
				if( empty($post_option['body-background-type']) || $post_option['body-background-type'] == 'default' ){
					$background = arki_get_option('general', 'background-type', 'color');
				 	if( $background == 'pattern' ){
				 		$classes[] = 'arki-background-pattern';
				 	}
				}
			}

			// header style
			$header_style = arki_get_option('general', 'header-style', 'plain');
			if( !in_array($header_style, array('side', 'side-toggle')) ){
				if( is_page() ){
					$post_option = arki_get_post_option(get_the_ID());
				}

				if( empty($post_option['sticky-navigation']) || $post_option['sticky-navigation'] == 'default' ){
					$sticky_menu = arki_get_option('general', 'enable-main-navigation-sticky', 'enable');
				}else{
					$sticky_menu = $post_option['sticky-navigation'];
				}
				if( $sticky_menu == 'enable' ){
					$classes[] = ' arki-with-sticky-navigation';
					
					$sticky_menu_logo = arki_get_option('general', 'enable-logo-on-main-navigation-sticky', 'enable');
					if( $sticky_menu_logo == 'disable' ){
						$classes[] = ' arki-sticky-navigation-no-logo';
					}
				}
			}

			// blog style
			if( is_single() && get_post_type() == 'post' ){
				$blog_style = arki_get_option('general', 'blog-style', 'style-1');
				$classes[] = ' arki-blog-' . $blog_style;
			}

			// blockquote style
			$blockquote_style = arki_get_option('general', 'blockquote-style', 'style-1');
			$classes[] = ' arki-blockquote-' . $blockquote_style;
			
			return $classes;
		}
	}

	// Set the neccessary function to be used in the theme
	add_action('after_setup_theme', 'arki_theme_setup');
	if( !function_exists( 'arki_theme_setup' ) ){
		function arki_theme_setup(){
			
			// define textdomain for translation
			load_theme_textdomain('arki', get_template_directory() . '/languages');

			// add default posts and comments RSS feed links to head.
			add_theme_support('automatic-feed-links');

			// declare that this theme does not use a hard-coded <title> tag in <head>
			add_theme_support('title-tag');

			// tmce editor stylesheet
			add_editor_style('/css/editor-style.css');

			// define menu locations
			register_nav_menus(array(
				'main_menu' => esc_html__('Primary Menu', 'arki'),
				'right_menu' => esc_html__('Secondary Menu', 'arki'),
				'top_bar_menu' => esc_html__('Top Bar Menu', 'arki'),
				'mobile_menu' => esc_html__('Mobile Menu', 'arki'),
			));

			// enable support for post formats / thumbnail
			add_theme_support('post-thumbnails');
			add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio')); // 'status', 'chat'
			
			// switch default core markup
			add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
			
			// add custom image size
			$thumbnail_sizes = arki_get_option('plugin', 'thumbnail-sizing');
			if( !empty($thumbnail_sizes) ){
				foreach( $thumbnail_sizes as $thumbnail_size ){
					add_image_size($thumbnail_size['name'], $thumbnail_size['width'], $thumbnail_size['height'], true);
				}
			}

		}
	}

	// turn the page comment off by default
	add_filter( 'wp_insert_post_data', 'arki_page_default_comments_off' );
	if( !function_exists('arki_page_default_comments_off') ){
		function arki_page_default_comments_off( $data ) {
			if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
				$data['comment_status'] = 0;
			} 

			return $data;
		}
	}

	// top bar menu
	if( !function_exists('arki_get_top_bar_menu') ){
		function arki_get_top_bar_menu($position = 'left'){
			if( has_nav_menu('top_bar_menu') ){
				wp_nav_menu(array(
					'menu_id' => 'arki-top-bar-menu',
					'theme_location'=>'top_bar_menu', 
					'container'=> '', 
					'menu_class'=> 'sf-menu arki-top-bar-menu arki-top-bar-' . esc_attr($position) . '-menu',
					'walker' => new arki_menu_walker()
				));
			}
		}
	}

	// logo displaying
	if( !function_exists('arki_get_logo') ){
		function arki_get_logo($settings = array()){

			$enable_logo = get_post_meta(get_the_ID(), 'gdlr-enable-logo', true);
			if( empty($enable_logo) ){
				$enable_logo = arki_get_option('general', 'enable-logo', 'enable');
			}
			if( $enable_logo == 'disable' ){ return ''; }
			
			$extra_class  = (isset($settings['padding']) && $settings['padding'] === false)? '': ' arki-item-pdlr';
			$extra_class .= empty($settings['wrapper-class'])? '': ' ' . $settings['wrapper-class'];
			
			$ret  = '<div class="arki-logo ' . esc_attr($extra_class) . '">';
			$ret .= '<div class="arki-logo-inner">';
		
			// fixed nav logo
			$orig_logo_class = ''; 
			$enable_fixed_nav = arki_get_option('general', 'enable-main-navigation-sticky', 'enable');
			$fixed_nav_sticky = arki_get_option('general', 'enable-logo-on-main-navigation-sticky', 'enable');
			$fixed_nav_logo = arki_get_option('general', 'fixed-navigation-bar-logo', '');
			$fixed_nav_logo2x = arki_get_option('general', 'fixed-navigation-bar-logo2x', '');
			if( $enable_fixed_nav == 'enable' && $fixed_nav_sticky == 'enable' && !empty($fixed_nav_logo) ){
				$srcset = '';
				if( !empty($fixed_nav_logo2x) ){
					$srcset  = gdlr_core_get_image_url($fixed_nav_logo, 'full', false) . ' 1x, ';
					$srcset .= gdlr_core_get_image_url($fixed_nav_logo2x, 'full', false) . ' 2x';
					$srcset = ' srcset="' . esc_attr($srcset) . '" ';
				}

				$ret .= '<a class="arki-fixed-nav-logo" href="' . esc_url(home_url('/')) . '" >';
				$ret .= gdlr_core_get_image($fixed_nav_logo, 'full', array('srcset' => $srcset));
				$ret .= '</a>';

				$orig_logo_class = ' arki-orig-logo'; 
			}
		
			// print logo / mobile logo
			if( !empty($settings['mobile']) ){
				$logo_id = arki_get_option('general', 'mobile-logo');
			} 
			if( empty($logo_id) ){
				$logo_id = arki_get_option('general', 'logo');
				$logo_id2x = arki_get_option('general', 'logo2x');
			}
			if( is_numeric($logo_id) && !wp_attachment_is_image($logo_id) ){
				$logo_id = '';
			}
			$ret .= '<a class="' . esc_attr($orig_logo_class) . '" href="' . esc_url(home_url('/')) . '" >';
			if( empty($logo_id) ){
				$srcset  = get_template_directory_uri() . '/images/logo.png 1x, ';
				$srcset .= get_template_directory_uri() . '/images/logo2x.png 2x';
				$srcset = ' srcset="' . esc_attr($srcset) . '" ';

				$ret .= gdlr_core_get_image(get_template_directory_uri() . '/images/logo.png', 'full', array('srcset' => $srcset));
			}else{
				$srcset = '';
				if( !empty($logo_id2x) ){
					$srcset  = gdlr_core_get_image_url($logo_id, 'full', false) . ' 1x, ';
					$srcset .= gdlr_core_get_image_url($logo_id2x, 'full', false) . ' 2x';
					$srcset = ' srcset="' . esc_attr($srcset) . '" ';
				}

				$ret .= gdlr_core_get_image($logo_id, 'full', array('srcset' => $srcset));
			}
			$ret .= '</a>';

			$ret .= '</div>';
			$ret .= '</div>';

			return $ret;
		}	
	}

	// set anchor color
	add_action('wp_enqueue_scripts', 'arki_set_anchor_color', 12);
	if( !function_exists('arki_set_anchor_color') ){
		function arki_set_anchor_color(){
			$post_option = arki_get_post_option(get_the_ID());

			$anchor_css = '';
			if( !empty($post_option['bullet-anchor']) ){
				foreach( $post_option['bullet-anchor'] as $anchor ){
					if( !empty($anchor['title']) ){
						$anchor_section = str_replace('#', '', $anchor['title']);

						if( !empty($anchor['anchor-color']) ){
							$anchor_css .= '.arki-bullet-anchor[data-anchor-section="' . esc_attr($anchor_section) . '"] a:before{ background-color: ' . esc_html($anchor['anchor-color']) . '; }';
						}
						if( !empty($anchor['anchor-hover-color']) ){
							$anchor_css .= '.arki-bullet-anchor[data-anchor-section="' . esc_attr($anchor_section) . '"] a:hover, ';
							$anchor_css .= '.arki-bullet-anchor[data-anchor-section="' . esc_attr($anchor_section) . '"] a.current-menu-item{ border-color: ' . esc_html($anchor['anchor-hover-color']) . '; }';
							$anchor_css .= '.arki-bullet-anchor[data-anchor-section="' . esc_attr($anchor_section) . '"] a:hover:before, ';
							$anchor_css .= '.arki-bullet-anchor[data-anchor-section="' . esc_attr($anchor_section) . '"] a.current-menu-item:before{ background: ' . esc_html($anchor['anchor-hover-color']) . '; }';
						}
					}
				}
			}

			if( !empty($anchor_css) ){
				wp_add_inline_style('arki-style-core', $anchor_css);
			}
		}
	}

	// set float social color
	add_action('wp_enqueue_scripts', 'arki_set_float_social_color', 12);
	if( !function_exists('arki_set_float_social_color') ){
		function arki_set_float_social_color(){
			$post_option = arki_get_post_option(get_the_ID());

			$anchor_css = '';
			if( !empty($post_option['float-social']) ){
				foreach( $post_option['float-social'] as $anchor ){
					if( !empty($anchor['title']) ){
						$anchor_section = str_replace('#', '', $anchor['title']);

						if( !empty($anchor['section-color']) ){
							$anchor_css .= '.arki-float-social[data-section="' . esc_attr($anchor_section) . '"]{ color: ' . esc_html($anchor['section-color']) . '; }';
							$anchor_css .= '.arki-float-social[data-section="' . esc_attr($anchor_section) . '"] .arki-divider{ border-color: ' . esc_html($anchor['section-color']) . '; }';
							$anchor_css .= '.arki-float-social[data-section="' . esc_attr($anchor_section) . '"] .arki-float-social-icon{ color: ' . esc_html($anchor['section-color']) . '; }';
						}
						if( !empty($anchor['section-hover-color']) ){
							$anchor_css .= '.arki-float-social[data-section="' . esc_attr($anchor_section) . '"] .arki-float-social-icon:hover{ color: ' . esc_html($anchor['section-hover-color']) . '; }';
						}
					}
				}
			}

			if( !empty($anchor_css) ){
				wp_add_inline_style('arki-style-core', $anchor_css);
			}
		}
	}
	add_filter('gdlr_core_pb_wrapper_background_extra', 'arki_gdlr_core_pb_wrapper_background_extra');
	if( !function_exists('arki_gdlr_core_pb_wrapper_background_extra') ){
		function arki_gdlr_core_pb_wrapper_background_extra($extra){
			$extra[] = 'float-social-id';
			return $extra;
		}
	}

	// remove id from nav menu item
	add_filter('nav_menu_item_id', 'arki_nav_menu_item_id', 10, 4);
	if( !function_exists('arki_nav_menu_item_id') ){
		function arki_nav_menu_item_id( $id, $item, $args, $depth ){
			return '';
		}
	}

	// add additional script
	add_action('wp_head', 'arki_header_script', 99);
	if( !function_exists('arki_header_script') ){
		function arki_header_script(){
			$header_script = arki_get_option('plugin', 'additional-head-script', '');
			if( !empty($header_script) ){
				echo '<script>' . $header_script . '</script>';
			}

			$header_script2 = arki_get_option('plugin', 'additional-head-script2', '');
			if( !empty($header_script2) ){
				echo gdlr_core_text_filter($header_script2);
			}

		}
	}
	add_action('gdlr_core_after_body', 'arki_after_body_script');
	if( !function_exists('arki_after_body_script') ){
		function arki_after_body_script(){
			$body_script = arki_get_option('plugin', 'additional-body-script', '');
			if( !empty($body_script) ){
				echo gdlr_core_text_filter($body_script);
			}

		}
	}
	add_action('wp_footer', 'arki_footer_script');
	if( !function_exists('arki_footer_script') ){
		function arki_footer_script(){
			$footer_script = arki_get_option('plugin', 'additional-script', '');
			if( !empty($footer_script) ){
				echo '<script>' . $footer_script . '</script>';
			}

		}
	}

	remove_action('tgmpa_register', 'newsletter_register_required_plugins');