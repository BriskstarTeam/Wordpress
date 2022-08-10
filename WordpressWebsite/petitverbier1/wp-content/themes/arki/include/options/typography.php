<?php
	/*	
	*	Goodlayers Option
	*	---------------------------------------------------------------------
	*	This file store an array of theme options
	*	---------------------------------------------------------------------
	*/	

	$arki_admin_option->add_element(array(
	
		// typography head section
		'title' => esc_html__('Typography', 'arki'),
		'slug' => 'arki_typography',
		'icon' => get_template_directory_uri() . '/include/options/images/typography.png',
		'options' => array(
		
			// starting the subnav
			'font-family' => array(
				'title' => esc_html__('Font Family', 'arki'),
				'options' => array(
					'google-font-display' => array(
						'title' => esc_html__('Google Font Display', 'arki'),
						'type' => 'combobox',
						'options' => array( 
							'' => esc_html__('Auto', 'arki'),
							'block' => esc_html__('Block', 'arki'),
							'swap' => esc_html__('Swap', 'arki'),
							'fallback' => esc_html__('Fall Back', 'arki'),
							'optional' => esc_html__('Optional', 'arki'),
						),
						'default' => 'optional',
						'description' => wp_kses(__('This option could increase the page speed result of your site. You can learn more about the font display <a href="https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display" target="_blank" >here</a>', 'arki'), array('a'=>array('href'=>array(), 'target'=>array())))
					),
					'heading-font' => array(
						'title' => esc_html__('Heading Font', 'arki'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.arki-body h1, .arki-body h2, .arki-body h3, ' . 
							'.arki-body h4, .arki-body h5, .arki-body h6, .arki-body .arki-title-font,' .
							'.arki-body .gdlr-core-title-font{ font-family: #gdlr#; }' . 
							'.woocommerce-breadcrumb, .woocommerce span.onsale, ' .
							'.single-product.woocommerce div.product p.price .woocommerce-Price-amount, .single-product.woocommerce #review_form #respond label{ font-family: #gdlr#; }'
					),
					'navigation-font' => array(
						'title' => esc_html__('Navigation Font', 'arki'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.arki-navigation .sf-menu > li > a, .arki-navigation .sf-vertical > li > a, .arki-navigation-font{ font-family: #gdlr#; }'
					),	
					'content-font' => array(
						'title' => esc_html__('Content Font', 'arki'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.arki-body, .arki-body .gdlr-core-content-font, ' . 
							'.arki-body input, .arki-body textarea, .arki-body button, .arki-body select, ' . 
							'.arki-body .arki-content-font, .gdlr-core-audio .mejs-container *{ font-family: #gdlr#; }'
					),
					'info-font' => array(
						'title' => esc_html__('Info Font', 'arki'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.arki-body .gdlr-core-info-font, .arki-body .arki-info-font{ font-family: #gdlr#; }'
					),
					'blog-info-font' => array(
						'title' => esc_html__('Blog Info Font', 'arki'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.arki-body .gdlr-core-blog-info-font, .arki-body .arki-blog-info-font{ font-family: #gdlr#; }'
					),
					'quote-font' => array(
						'title' => esc_html__('Quote Font', 'arki'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.arki-body .gdlr-core-quote-font, blockquote{ font-family: #gdlr#; }'
					),
					'testimonial-font' => array(
						'title' => esc_html__('Testimonial Font', 'arki'),
						'type' => 'font',
						'data-type' => 'font',
						'default' => 'Open Sans',
						'selector' => '.arki-body .gdlr-core-testimonial-content{ font-family: #gdlr#; }'
					),
					'additional-font' => array(
						'title' => esc_html__('Additional Font', 'arki'),
						'type' => 'font',
						'data-type' => 'font',
						'customizer' => false,
						'default' => 'Georgia, serif',
						'description' => esc_html__('Additional font you want to include for custom css.', 'arki')
					),
					'additional-font2' => array(
						'title' => esc_html__('Additional Font2', 'arki'),
						'type' => 'font',
						'data-type' => 'font',
						'customizer' => false,
						'default' => 'Georgia, serif',
						'description' => esc_html__('Additional font you want to include for custom css.', 'arki')
					),
					
				) // font-family-options
			), // font-family-nav
			
			'font-size' => array(
				'title' => esc_html__('Font Size', 'arki'),
				'options' => array(
				
					'h1-font-size' => array(
						'title' => esc_html__('H1 Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '52px',
						'selector' => '.arki-body h1{ font-size: #gdlr#; }' 
					),					
					'h2-font-size' => array(
						'title' => esc_html__('H2 Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '48px',
						'selector' => '.arki-body h2, #poststuff .gdlr-core-page-builder-body h2{ font-size: #gdlr#; }' 
					),					
					'h3-font-size' => array(
						'title' => esc_html__('H3 Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '36px',
						'selector' => '.arki-body h3{ font-size: #gdlr#; }' 
					),					
					'h4-font-size' => array(
						'title' => esc_html__('H4 Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '28px',
						'selector' => '.arki-body h4{ font-size: #gdlr#; }' 
					),					
					'h5-font-size' => array(
						'title' => esc_html__('H5 Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '22px',
						'selector' => '.arki-body h5{ font-size: #gdlr#; }' 
					),					
					'h6-font-size' => array(
						'title' => esc_html__('H6 Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '18px',
						'selector' => '.arki-body h6{ font-size: #gdlr#; }' 
					),				
					'header-font-weight' => array(
						'title' => esc_html__('Header Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'selector' => '.arki-body h1, .arki-body h2, .arki-body h3, .arki-body h4, .arki-body h5, .arki-body h6{ font-weight: #gdlr#; }' . 
							'#poststuff .gdlr-core-page-builder-body h1, #poststuff .gdlr-core-page-builder-body h2{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),
					'content-font-size' => array(
						'title' => esc_html__('Content Font Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '15px',
						'selector' => '.arki-body{ font-size: #gdlr#; }' 
					),
					'content-font-weight' => array(
						'title' => esc_html__('Content Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'selector' => '.arki-body{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),
					'content-line-height' => array(
						'title' => esc_html__('Content Line Height', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'default' => '1.7',
						'selector' => '.arki-body, .arki-line-height, .gdlr-core-line-height{ line-height: #gdlr#; }'
					),
					'content-letter-spacing' => array(
						'title' => esc_html__('Content Letter Spacing', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-body{ letter-spacing: #gdlr#; }'
					),
					'footer-letter-spacing' => array(
						'title' => esc_html__('Footer Letter Spacing', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-footer-wrapper{ letter-spacing: #gdlr#; }'
					),
					
				) // font-size-options
			), // font-size-nav			
			
			'mobile-font-size' => array(
				'title' => esc_html__('Mobile Font Size', 'arki'),
				'options' => array(

					'mobile-h1-font-size' => array(
						'title' => esc_html__('Mobile H1 Size', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '@media only screen and (max-width: 767px){ .arki-body h1{ font-size: #gdlr#; } }' 
					),
					'mobile-h2-font-size' => array(
						'title' => esc_html__('Mobile H2 Size', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '@media only screen and (max-width: 767px){ .arki-body h2, #poststuff .gdlr-core-page-builder-body h2{ font-size: #gdlr#; } }' 
					),
					'mobile-h3-font-size' => array(
						'title' => esc_html__('Mobile H3 Size', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '@media only screen and (max-width: 767px){ .arki-body h3{ font-size: #gdlr#; } }' 
					),
					'mobile-h4-font-size' => array(
						'title' => esc_html__('Mobile H4 Size', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '@media only screen and (max-width: 767px){ .arki-body h4{ font-size: #gdlr#; } }' 
					),
					'mobile-h5-font-size' => array(
						'title' => esc_html__('Mobile H5 Size', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '@media only screen and (max-width: 767px){ .arki-body h5{ font-size: #gdlr#; } }' 
					),
					'mobile-h6-font-size' => array(
						'title' => esc_html__('Mobile H6 Size', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '@media only screen and (max-width: 767px){ .arki-body h6{ font-size: #gdlr#; } }' 
					),					
					'mobile-content-font-size' => array(
						'title' => esc_html__('Mobile Content Font Size', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '@media only screen and (max-width: 767px){ .arki-body{ font-size: #gdlr#; } }' 
					),

				)
			),

			'navigation-font-size' => arki_navigation_font_size_options(), // font-size-nav
			
			'footer-font-size' => array(
				'title' => esc_html__('Sidebar / Footer Font Size', 'arki'),
				'options' => array(
					
					'sidebar-title-font-size' => array(
						'title' => esc_html__('Sidebar Title Font Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '13px',
						'selector' => '.arki-sidebar-area .arki-widget-title{ font-size: #gdlr#; }' 
					),
					'sidebar-title-font-weight' => array(
						'title' => esc_html__('Sidebar Title Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'selector' => '.arki-sidebar-area .arki-widget-title{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),	
					'sidebar-title-font-letter-spacing' => array(
						'title' => esc_html__('Sidebar Title Font Letter Spacing', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-sidebar-area .arki-widget-title{ letter-spacing: #gdlr#; }'
					),
					'sidebar-title-text-transform' => array(
						'title' => esc_html__('Sidebar Title Text Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'uppercase',
						'selector' => '.arki-sidebar-area .arki-widget-title{ text-transform: #gdlr#; }',
					),
					'footer-title-font-size' => array(
						'title' => esc_html__('Footer Title Font Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '13px',
						'selector' => '.arki-footer-wrapper .arki-widget-title{ font-size: #gdlr#; }' 
					),
					'footer-title-font-weight' => array(
						'title' => esc_html__('Footer Title Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'selector' => '.arki-footer-wrapper .arki-widget-title{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),	
					'footer-title-font-letter-spacing' => array(
						'title' => esc_html__('Footer Title Font Letter Spacing', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-footer-wrapper .arki-widget-title{ letter-spacing: #gdlr#; }'
					),
					'footer-title-text-transform' => array(
						'title' => esc_html__('Footer Title Text Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'uppercase',
						'selector' => '.arki-footer-wrapper .arki-widget-title{ text-transform: #gdlr#; }',
					),
					'footer-font-size' => array(
						'title' => esc_html__('Footer Content Font Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '15px',
						'selector' => '.arki-footer-wrapper{ font-size: #gdlr#; }' 
					),
					'footer-content-font-weight' => array(
						'title' => esc_html__('Footer Content Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'selector' => '.arki-footer-wrapper .widget_text{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),	
					'footer-content-text-transform' => array(
						'title' => esc_html__('Footer Content Text Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'none',
						'selector' => '.arki-footer-wrapper .widget_text{ text-transform: #gdlr#; }',
					),
					'copyright-font-size' => array(
						'title' => esc_html__('Copyright Font Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '14px',
						'selector' => '.arki-copyright-text, .arki-copyright-left, .arki-copyright-right{ font-size: #gdlr#; }' 
					),
					'copyright-font-weight' => array(
						'title' => esc_html__('Copyright Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'selector' => '.arki-copyright-text, .arki-copyright-left, .arki-copyright-right{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),	
					'copyright-font-letter-spacing' => array(
						'title' => esc_html__('Copyright Font Letter Spacing', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'selector' => '.arki-copyright-text, .arki-copyright-left, .arki-copyright-right{ letter-spacing: #gdlr#; }'
					),
					'copyright-text-transform' => array(
						'title' => esc_html__('Copyright Text Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'uppercase',
						'selector' => '.arki-copyright-text, .arki-copyright-left, .arki-copyright-right{ text-transform: #gdlr#; }',
					),
				)
			),

			'font-upload' => array(
				'title' => esc_html__('Font Uploader', 'arki'),
				'reload-after' => true,
				'customizer' => false,
				'options' => array(
					
					'font-upload' => array(
						'title' => esc_html__('Upload Fonts', 'arki'),
						'type' => 'custom',
						'item-type' => 'fontupload',
						'wrapper-class' => 'gdlr-core-fullsize',
					),
					
				) // fontupload-options
			), // fontupload-nav
		
		) // typography-options
		
	), 4);