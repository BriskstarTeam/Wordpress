<?php
	/*	
	*	Goodlayers Function File
	*	---------------------------------------------------------------------
	*	This file include all of important function and features of the theme
	*	---------------------------------------------------------------------
	*/
	
	// goodlayers core plugin function
	include_once(get_template_directory() . '/admin/core/sidebar-generator.php');
	include_once(get_template_directory() . '/admin/core/utility.php');
	include_once(get_template_directory() . '/admin/core/media.php' );
	
	// create admin page
	if( is_admin() ){
		include_once(get_template_directory() . '/admin/tgmpa/class-tgm-plugin-activation.php');

		if( !class_exists('gdlr_core_admin_menu') ){
			include_once(get_template_directory() . '/admin/installer/admin-menu.php');	
			gdlr_core_admin_menu::init();
		}
		include_once(get_template_directory() . '/admin/installer/verification.php');
		include_once(get_template_directory() . '/admin/installer/theme-landing.php');
		include_once(get_template_directory() . '/admin/installer/getting-start.php');	
		include_once(get_template_directory() . '/admin/installer/plugin-activation.php');
	}
	
	// plugins
	include_once(get_template_directory() . '/plugins/wpml.php');
	include_once(get_template_directory() . '/plugins/revslider.php');
	
	/////////////////////
	// front end script
	/////////////////////
	
	include_once(get_template_directory() . '/include/header-settings.php' );
	include_once(get_template_directory() . '/include/utility.php' );
	include_once(get_template_directory() . '/include/function-regist.php' );
	include_once(get_template_directory() . '/include/navigation-menu.php' );
	include_once(get_template_directory() . '/include/include-script.php' );
	include_once(get_template_directory() . '/include/goodlayers-core-filter.php' );
	include_once(get_template_directory() . '/include/maintenance.php' );

	include_once(get_template_directory() . '/include/pb/pb-element-blog.php' );
	include_once(get_template_directory() . '/include/pb/pb-element-portfolio.php' );

	include_once(get_template_directory() . '/woocommerce/woocommerce-settings.php' );
	
	/////////////////////
	// execute module 
	/////////////////////
	
	// initiate sidebar structure
	$sidebar_heading_tag = arki_get_option('general', 'sidebar-heading-tag', 'h3');
	$sidebar_atts = array(
		'before_widget' => '<div id="%1$s" class="widget %2$s arki-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<' . $sidebar_heading_tag . ' class="arki-widget-title">',
		'after_title'   => '</' . $sidebar_heading_tag . '><span class="clear"></span>' );

	if( arki_get_option('general', 'sidebar-title-divider', 'enable') == 'enable' ){
		$sidebar_atts['before_title'] = '<' . $sidebar_heading_tag . ' class="arki-widget-title"><span class="arki-widget-head-text">';
		$sidebar_atts['after_title'] = '</span><span class="arki-widget-head-divider"></span></' . $sidebar_heading_tag . '><span class="clear"></span>';
	}
	new gdlr_core_sidebar_generator($sidebar_atts);

	// clear data for wpml translation
	add_action('init', 'arki_clear_general_option');
	if( !function_exists('arki_clear_general_option') ){
		function arki_clear_general_option(){
			unset($GLOBALS['arki_general']);
		}	
	}	

	// remove the core default action to enqueue the theme script
	remove_action('after_setup_theme', 'gdlr_init_goodlayers_core_elements');
	add_action('after_setup_theme', 'arki_init_goodlayers_core_elements');
	if( !function_exists('arki_init_goodlayers_core_elements') ){
		function arki_init_goodlayers_core_elements(){

			global $arki_admin_option;
			
			// create an admin option and customizer
			if( (is_admin() || is_customize_preview()) && class_exists('gdlr_core_admin_option') && class_exists('gdlr_core_theme_customizer') ){
				
				$arki_admin_option = new gdlr_core_admin_option(array(
					'filewrite' => arki_get_style_custom(true)
				));	
				
				include_once( get_template_directory() . '/include/options/general.php');
				include_once( get_template_directory() . '/include/options/typography.php');
				include_once( get_template_directory() . '/include/options/color.php');
				include_once( get_template_directory() . '/include/options/plugin-settings.php');

				if( is_customize_preview() ){
					new gdlr_core_theme_customizer($arki_admin_option);
				}

				// clear an option for customize page
				add_action('wp', 'arki_clear_option');
				
			}
			
			// add the script for page builder / page options / post option
			if( is_admin() ){

				if( class_exists('gdlr_core_revision') ){
					$revision_num = 5;
					new gdlr_core_revision($revision_num);
				}
				
				// create page option
				if( class_exists('gdlr_core_page_option') ){

					// for page post type
					new gdlr_core_page_option(array(
						'post_type' => array('page'),
						'options' => array(
							'layout' => array(
								'title' => esc_html__('Layout', 'arki'),
								'options' => array(
									'custom-header' => array(
										'title' => esc_html__('Select Custom Header', 'arki'),
										'type' => 'combobox',
										'single' => 'gdlr_core_custom_header_id',
										'options' => array('' => esc_html__('Default', 'arki')) + gdlr_core_get_post_list('gdlr_core_header')
									),
									'enable-header-area' => array(
										'title' => esc_html__('Enable Header Area', 'arki'),
										'type' => 'checkbox',
										'default' => 'enable'
									),
									'enable-logo' => array(
										'title' => esc_html__('Enable Logo', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'' => esc_html__('Default', 'arki'),
											'enable' => esc_html__('Enable', 'arki'),
											'disable' => esc_html__('Disable', 'arki')
										),
										'single' => 'gdlr-enable-logo',
										'condition' => array( 'enable-header-area' => 'enable' )
									),
									'sticky-navigation' => array(
										'title' => esc_html__('Sticky Navigation', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'arki'),
											'enable' => esc_html__('Enable', 'arki'),
											'disable' => esc_html__('Disable', 'arki'),
										),
										'condition' => array( 'enable-header-area' => 'enable' )
									),
									'enable-page-title' => array(
										'title' => esc_html__('Enable Page Title', 'arki'),
										'type' => 'checkbox',
										'default' => 'enable',
										'condition' => array( 'enable-header-area' => 'enable' )
									),
									'page-caption' => array(
										'title' => esc_html__('Caption', 'arki'),
										'type' => 'textarea',
										'condition' => array( 'enable-header-area' => 'enable', 'enable-page-title' => 'enable' )
									),					
									'title-background' => array(
										'title' => esc_html__('Page Title Background', 'arki'),
										'type' => 'upload',
										'condition' => array( 'enable-header-area' => 'enable', 'enable-page-title' => 'enable' )
									),
									'enable-breadcrumbs' => array(
										'title' => esc_html__('Enable Breadcrumbs', 'arki'),
										'type' => 'checkbox',
										'default' => 'disable',
										'condition' => array( 'enable-header-area' => 'enable', 'enable-page-title' => 'enable' )
									),
									'body-background-type' => array(
										'title' => esc_html__('Body Background Type', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'arki'),
											'image' => esc_html__('Image ( Only For Boxed Layout )', 'arki'),
										)
									),
									'body-background-image' => array(
										'title' => esc_html__('Body Background Image', 'arki'),
										'type' => 'upload',
										'data-type' => 'file', 
										'condition' => array( 'body-background-type' => 'image' )
									),
									'body-background-image-opacity' => array(
										'title' => esc_html__('Body Background Image Opacity', 'arki'),
										'type' => 'fontslider',
										'data-type' => 'opacity',
										'default' => '100',
										'condition' => array( 'body-background-type' => 'image' )
									),
									'show-content' => array(
										'title' => esc_html__('Show WordPress Editor Content', 'arki'),
										'type' => 'checkbox',
										'default' => 'enable',
										'description' => esc_html__('Disable this to hide the content in editor to show only page builder content.', 'arki'),
									),
									'sidebar' => array(
										'title' => esc_html__('Sidebar', 'arki'),
										'type' => 'radioimage',
										'options' => 'sidebar',
										'default' => 'none',
										'wrapper-class' => 'gdlr-core-fullsize'
									),
									'sidebar-left' => array(
										'title' => esc_html__('Sidebar Left', 'arki'),
										'type' => 'combobox',
										'options' => 'sidebar',
										'condition' => array( 'sidebar' => array('left', 'both') )
									),
									'sidebar-right' => array(
										'title' => esc_html__('Sidebar Right', 'arki'),
										'type' => 'combobox',
										'options' => 'sidebar',
										'condition' => array( 'sidebar' => array('right', 'both') )
									),
									'enable-footer' => array(
										'title' => esc_html__('Enable Footer', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'arki'),
											'enable' => esc_html__('Enable', 'arki'),
											'disable' => esc_html__('Disable', 'arki'),
										)
									),
									'enable-copyright' => array(
										'title' => esc_html__('Enable Copyright', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'arki'),
											'enable' => esc_html__('Enable', 'arki'),
											'disable' => esc_html__('Disable', 'arki'),
										)
									),

								)
							), // layout
							'title' => array(
								'title' => esc_html__('Title Style', 'arki'),
								'options' => array(

									'title-style' => array(
										'title' => esc_html__('Page Title Style', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'arki'),
											'small' => esc_html__('Small', 'arki'),
											'medium' => esc_html__('Medium', 'arki'),
											'large' => esc_html__('Large', 'arki'),
											'custom' => esc_html__('Custom', 'arki'),
										),
										'default' => 'default'
									),
									'title-align' => array(
										'title' => esc_html__('Page Title Alignment', 'arki'),
										'type' => 'radioimage',
										'options' => 'text-align',
										'with-default' => true,
										'default' => 'default'
									),
									'title-spacing' => array(
										'title' => esc_html__('Page Title Padding', 'arki'),
										'type' => 'custom',
										'item-type' => 'padding',
										'data-input-type' => 'pixel',
										'options' => array('padding-top', 'padding-bottom', 'caption-top-margin'),
										'wrapper-class' => 'gdlr-core-fullsize gdlr-core-no-link gdlr-core-large',
										'condition' => array( 'title-style' => 'custom' )
									),
									'title-font-size' => array(
										'title' => esc_html__('Page Title Font Size', 'arki'),
										'type' => 'custom',
										'item-type' => 'padding',
										'data-input-type' => 'pixel',
										'options' => array('title-size', 'title-letter-spacing', 'caption-size', 'caption-letter-spacing'),
										'wrapper-class' => 'gdlr-core-fullsize gdlr-core-no-link gdlr-core-large',
										'condition' => array( 'title-style' => 'custom' )
									),
									'title-font-weight' => array(
										'title' => esc_html__('Page Title Font Weight', 'arki'),
										'type' => 'custom',
										'item-type' => 'padding',
										'options' => array('title-weight', 'caption-weight'),
										'wrapper-class' => 'gdlr-core-fullsize gdlr-core-no-link gdlr-core-large',
										'condition' => array( 'title-style' => 'custom' )
									),
									'title-font-transform' => array(
										'title' => esc_html__('Page Title Font Transform', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'none' => esc_html__('None', 'arki'),
											'uppercase' => esc_html__('Uppercase', 'arki'),
											'lowercase' => esc_html__('Lowercase', 'arki'),
											'capitalize' => esc_html__('Capitalize', 'arki'),
										),
										'default' => 'uppercase',
										'condition' => array( 'title-style' => 'custom' )
									),
									'top-bottom-gradient' => array(
										'title' => esc_html__('Title Top/Bottom Gradient', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'arki'),
											'both' => esc_html__('Both', 'arki'),
											'top' => esc_html__('Top', 'arki'),
											'bottom' => esc_html__('Bottom', 'arki'),
											'disable' => esc_html__('None', 'arki'),
										)
									),
									'title-background-overlay-opacity' => array(
										'title' => esc_html__('Page Title Background Overlay Opacity', 'arki'),
										'type' => 'text',
										'description' => esc_html__('Fill the number between 0.01 - 1 ( Leave Blank For Default Value )', 'arki'),
										'condition' => array( 'title-style' => 'custom' )
									),
									'title-color' => array(
										'title' => esc_html__('Page Title Color', 'arki'),
										'type' => 'colorpicker',
									),
									'caption-color' => array(
										'title' => esc_html__('Page Caption Color', 'arki'),
										'type' => 'colorpicker',
									),
									'title-background-overlay-color' => array(
										'title' => esc_html__('Page Background Overlay Color', 'arki'),
										'type' => 'colorpicker',
									),

								)
							), // title
							'header' => array(
								'title' => esc_html__('Header', 'arki'),
								'options' => array(

									'main_menu' => array(
										'title' => esc_html__('Primary Menu', 'arki'),
										'type' => 'combobox',
										'options' => function_exists('gdlr_core_get_menu_list')? gdlr_core_get_menu_list(): array(),
										'single' => 'gdlr-core-location-main_menu'
									),
									'right_menu' => array(
										'title' => esc_html__('Secondary Menu', 'arki'),
										'type' => 'combobox',
										'options' => function_exists('gdlr_core_get_menu_list')? gdlr_core_get_menu_list(): array(),
										'single' => 'gdlr-core-location-right_menu'
									),
									'top_bar_menu' => array(
										'title' => esc_html__('Top Bar Menu', 'arki'),
										'type' => 'combobox',
										'options' => function_exists('gdlr_core_get_menu_list')? gdlr_core_get_menu_list(): array(),
										'single' => 'gdlr-core-location-top_bar_menu'
									),
									'mobile_menu' => array(
										'title' => esc_html__('Mobile Menu', 'arki'),
										'type' => 'combobox',
										'options' => function_exists('gdlr_core_get_menu_list')? gdlr_core_get_menu_list(): array(),
										'single' => 'gdlr-core-location-mobile_menu'
									),
									
									'header-slider' => array(
										'title' => esc_html__('Header Slider ( Above Navigation )', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'none' => esc_html__('None', 'arki'),
											'layer-slider' => esc_html__('Layer Slider', 'arki'),
											'master-slider' => esc_html__('Master Slider', 'arki'),
											'revolution-slider' => esc_html__('Revolution Slider', 'arki'),
										),
										'description' => esc_html__('For header style plain / bar / boxed', 'arki'),
									),
									'layer-slider-id' => array(
										'title' => esc_html__('Choose Layer Slider', 'arki'),
										'type' => 'combobox',
										'options' => gdlr_core_get_layerslider_list(),
										'condition' => array( 'header-slider' => 'layer-slider' )
									),
									'master-slider-id' => array(
										'title' => esc_html__('Choose Master Slider', 'arki'),
										'type' => 'combobox',
										'options' => gdlr_core_get_masterslider_list(),
										'condition' => array( 'header-slider' => 'master-slider' )
									),
									'revolution-slider-id' => array(
										'title' => esc_html__('Choose Revolution Slider', 'arki'),
										'type' => 'combobox',
										'options' => gdlr_core_get_revolution_slider_list(),
										'condition' => array( 'header-slider' => 'revolution-slider' )
									),

								) // header options
							), // header

							'bullet-anchor' => array(
								'title' => esc_html__('Bullet Anchor', 'arki'),
								'options' => array(
									'bullet-anchor-description' => array(
										'type' => 'description',
										'description' => esc_html__('This feature is used for one page navigation. It will appear on the right side of page. You can put the id of element in \'Anchor Link\' field to let the bullet scroll the page to.', 'arki')
									),
									'bullet-anchor' => array(
										'title' => esc_html__('Add Anchor', 'arki'),
										'type' => 'custom',
										'item-type' => 'tabs',
										'options' => array(
											'title' => array(
												'title' => esc_html__('Anchor Link', 'arki'),
												'type' => 'text',
											),
											'anchor-color' => array(
												'title' => esc_html__('Anchor Color', 'arki'),
												'type' => 'colorpicker',
											),
											'anchor-hover-color' => array(
												'title' => esc_html__('Anchor Hover Color', 'arki'),
												'type' => 'colorpicker',
											)
										),
										'wrapper-class' => 'gdlr-core-fullsize'
									),
								)
							),

							'float-social' => array(
								'title' => esc_html__('Float Social', 'arki'),
								'options' => array(
									'enable-float-social' => array(
										'title' => esc_html__('Enable Float Social', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'' => esc_html__('Default', 'arki'),
											'enable' => esc_html__('Enable', 'arki'),
											'disable' => esc_html__('Disable', 'arki'),
										)
									),
									'display-float-social-after-page-title' => array(
										'title' => esc_html__('Display Float Social After Page Title', 'arki'),
										'type' => 'checkbox',
										'options' => array(
											'' => esc_html__('Default', 'arki'),
											'enable' => esc_html__('Enable', 'arki'),
											'disable' => esc_html__('Disable', 'arki'),
										)
									),
									'float-social' => array(
										'title' => esc_html__('Add Color Section(Use Float Social ID in Wrapper Setting > General Tab)', 'arki'),
										'type' => 'custom',
										'item-type' => 'tabs',
										'extra' => array(
											'item-title' => esc_html__('Item\'s ID', 'arki')
										),
										'options' => array(
											'title' => array(
												'title' => esc_html__('Section ID', 'arki'),
												'type' => 'text',
											),
											'section-color' => array(
												'title' => esc_html__('Social Color', 'arki'),
												'type' => 'colorpicker',
											),
											'section-hover-color' => array(
												'title' => esc_html__('Social Hover Color', 'arki'),
												'type' => 'colorpicker',
											)
										),
										'wrapper-class' => 'gdlr-core-fullsize'
									),
								)
							)
						)
					));

					// for post post type
					new gdlr_core_page_option(array(
						'post_type' => array('post'),
						'options' => array(
							'layout' => array(
								'title' => esc_html__('Layout', 'arki'),
								'options' => array(

									'show-content' => array(
										'title' => esc_html__('Show WordPress Editor Content', 'arki'),
										'type' => 'checkbox',
										'default' => 'enable',
										'description' => esc_html__('Disable this to hide the content in editor to show only page builder content.', 'arki'),
									),
									'sidebar' => array(
										'title' => esc_html__('Sidebar', 'arki'),
										'type' => 'radioimage',
										'options' => 'sidebar',
										'with-default' => true,
										'default' => 'default',
										'wrapper-class' => 'gdlr-core-fullsize'
									),
									'sidebar-left' => array(
										'title' => esc_html__('Sidebar Left', 'arki'),
										'type' => 'combobox',
										'options' => 'sidebar',
										'condition' => array( 'sidebar' => array('left', 'both') )
									),
									'sidebar-right' => array(
										'title' => esc_html__('Sidebar Right', 'arki'),
										'type' => 'combobox',
										'options' => 'sidebar',
										'condition' => array( 'sidebar' => array('right', 'both') )
									),
								)
							),
							'metro-layout' => array(
								'title' => esc_html__('Metro Layout', 'arki'),
								'options' => array(
									'metro-column-size' => array(
										'title' => esc_html__('Column Size', 'arki'),
										'type' => 'combobox',
										'options' => array( 'default'=> esc_html__('Default', 'arki'), 
											60 => '1/1', 30 => '1/2', 20 => '1/3', 40 => '2/3', 
											15 => '1/4', 45 => '3/4', 12 => '1/5', 24 => '2/5', 36 => '3/5', 48 => '4/5',
											10 => '1/6', 50 => '5/6'),
										'default' => 'default',
										'description' => esc_html__('Choosing default will display the value selected by the page builder item.', 'arki')
									),
									'metro-thumbnail-size' => array(
										'title' => esc_html__('Thumbnail Size', 'arki'),
										'type' => 'combobox',
										'options' => 'thumbnail-size',
										'with-default' => true,
										'default' => 'default',
										'description' => esc_html__('Choosing default will display the value selected by the page builder item.', 'arki')
									)
								)
							),						
							'title' => array(
								'title' => esc_html__('Title', 'arki'),
								'options' => array(

									'blog-title-style' => array(
										'title' => esc_html__('Blog Title Style', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'arki'),
											'small' => esc_html__('Small', 'arki'),
											'large' => esc_html__('Large', 'arki'),
											'custom' => esc_html__('Custom', 'arki'),
											'inside-content' => esc_html__('Inside Content', 'arki'),
											'none' => esc_html__('None', 'arki'),
										),
										'default' => 'default'
									),
									'blog-title-padding' => array(
										'title' => esc_html__('Blog Title Padding', 'arki'),
										'type' => 'custom',
										'item-type' => 'padding',
										'data-input-type' => 'pixel',
										'options' => array('padding-top', 'padding-bottom'),
										'wrapper-class' => 'gdlr-core-fullsize gdlr-core-no-link gdlr-core-large',
										'condition' => array( 'blog-title-style' => 'custom' )
									),
									'blog-feature-image' => array(
										'title' => esc_html__('Blog Feature Image Location', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'arki'),
											'content' => esc_html__('Inside Content', 'arki'),
											'title-background' => esc_html__('Title Background', 'arki'),
											'none' => esc_html__('None', 'arki'),
										)
									),
									'blog-title-background-image' => array(
										'title' => esc_html__('Blog Title Background Image', 'arki'),
										'type' => 'upload',
										'data-type' => 'file',
										'condition' => array( 
											'blog-title-style' => array('default', 'small', 'large', 'custom'),
											'blog-feature-image' => array('default', 'content', 'none')
										),
										'description' => esc_html__('Will be overridden by feature image if selected.', 'arki'),
									),
									'blog-top-bottom-gradient' => array(
										'title' => esc_html__('Blog ( Feature Image ) Title Top/Bottom Gradient', 'arki'),
										'type' => 'combobox',
										'options' => array(
											'default' => esc_html__('Default', 'arki'),
											'enable' => esc_html__('Both', 'arki'),
											'top' => esc_html__('Top', 'arki'),
											'bottom' => esc_html__('Bottom', 'arki'),
											'disable' => esc_html__('None', 'arki'),
										)
									),
									'blog-title-background-overlay-opacity' => array(
										'title' => esc_html__('Blog Title Background Overlay Opacity', 'arki'),
										'type' => 'text',
										'description' => esc_html__('Fill the number between 0.01 - 1 ( Leave Blank For Default Value )', 'arki'),
									),

								) // options
							) // title
						)
					));
				}

			}
			
			// create page builder
			if( class_exists('gdlr_core_page_builder') ){
				new gdlr_core_page_builder(array(
					'style' => array(
						'style-custom' => arki_get_style_custom()
					)
				));
			}
			
		} // arki_init_goodlayers_core_elements
	} // function_exists


	add_filter('gdlr_core_portfolio_options', 'arki_gdlr_core_portfolio_options');
	if( !function_exists('arki_gdlr_core_portfolio_options') ){
		function arki_gdlr_core_portfolio_options($options){
			if( function_exists('gdlr_core_array_insert') ){
				$options['general']['options'] = gdlr_core_array_insert($options['general']['options'], 'title-background', array(
					'enable-breadcrumbs' => array(
						'title' => esc_html__('Enable Breadcrumbs', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable',
						'condition' => array( 'enable-page-title' => 'enable' )
					),
				));
			}
			

			return $options;
		}
	}