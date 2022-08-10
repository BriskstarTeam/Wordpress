<?php
	/*	
	*	Goodlayers Option
	*	---------------------------------------------------------------------
	*	This file store an array of theme options
	*	---------------------------------------------------------------------
	*/	

	// add custom css for theme option
	add_filter('gdlr_core_theme_option_top_file_write', 'arki_gdlr_core_theme_option_top_file_write', 10, 2);
	if( !function_exists('arki_gdlr_core_theme_option_top_file_write') ){
		function arki_gdlr_core_theme_option_top_file_write( $css, $option_slug ){
			if( $option_slug != 'goodlayers_main_menu' ) return;

			ob_start();
?>
.arki-body h1, .arki-body h2, .arki-body h3, .arki-body h4, .arki-body h5, .arki-body h6{ margin-top: 0px; margin-bottom: 20px; line-height: 1.2; font-weight: 700; }
#poststuff .gdlr-core-page-builder-body h2{ padding: 0px; margin-bottom: 20px; line-height: 1.2; font-weight: 700; }
#poststuff .gdlr-core-page-builder-body h1{ padding: 0px; font-weight: 700; }

.gdlr-core-flexslider.gdlr-core-bullet-style-cylinder .flex-control-nav li a{ width: 27px; height: 7px; }
.gdlr-core-newsletter-item.gdlr-core-style-rectangle .gdlr-core-newsletter-email input[type="email"]{ line-height: 17px; padding: 30px 20px; height: 65px; }
.gdlr-core-newsletter-item.gdlr-core-style-rectangle .gdlr-core-newsletter-submit input[type="submit"]{ height: 65px; font-size: 13px; }

.gdlr-core-personnel-thumbnail-hover-social .gdlr-core-social-network-item a{ display: block; margin-bottom: 10px; margin-right: 0 !important; }
.gdlr-core-personnel-thumbnail-hover-social .gdlr-core-social-network-item a:last-child{ margin-bottom: 0px; }
.gdlr-core-personnel-thumbnail-hover-content{ display: flex; flex-direction: column; }
.gdlr-core-personnel-thumbnail-hover-title{ order: 2; font-size: 24px; font-weight: 400; letter-spacing: 2px }
.gdlr-core-personnel-thumbnail-hover-social{ order: 1; }
.gdlr-core-personnel-thumbnail-hover-position{ order: 3; font-size: 18px; color: #c2c2c2; letter-spacing: 1px; }

.gdlr-core-newsletter-item.gdlr-core-style-rectangle .gdlr-core-newsletter-email{ padding-right: 10px; }
.gdlr-core-newsletter-item.gdlr-core-style-rectangle .gdlr-core-newsletter-submit input[type="submit"]{ font-size: 17px; text-transform: none; font-weight: normal; }

.gdlr-core-portfolio-item.gdlr-core-layout-zigzag .flexslider li:nth-child(3n+1){ margin-top: 40px; }
.gdlr-core-portfolio-item.gdlr-core-layout-zigzag .flexslider li:nth-child(3n+3){ margin-top: 80px; }
@media only screen and (max-width: 767px){
    .gdlr-core-portfolio-item.gdlr-core-layout-zigzag .flexslider li{ margin-top: 0px; !important; }
}

.gdlr-core-portfolio-grid3 .gdlr-core-portfolio-info{ display: block; margin-bottom: 4px; }
.gdlr-core-portfolio-grid3 .gdlr-portfolio-learn-more{ float: right; }
.gdlr-core-portfolio-grid3 .gdlr-core-portfolio-content-wrap{ margin-left: 40px; }
.gdlr-core-portfolio-grid3 .gdlr-core-portfolio-content-wrap .gdlr-core-portfolio-title{ margin-bottom: 0px; display: inline; padding-bottom: 5px; }
@media only screen and (max-width: 767px){
.gdlr-core-portfolio-grid3 .gdlr-core-portfolio-content-wrap{ margin: 0; }
}

.gdlr-core-flexslider.gdlr-core-overflow-visible[data-type="carousel"] ul.slides > li.flex-with-active-class{ opacity: 0.5; }
.gdlr-core-flexslider.gdlr-core-overflow-visible[data-type="carousel"] ul.slides > li.flex-with-active-class.flex-active-slide{ opacity: 1; }
.gdlr-core-flexslider-custom-nav .icon-arrow-left:after{ content: " "; display: inline-block; width: 15px; border-bottom-width: 1px; border-bottom-style: solid; margin-bottom: 0.4em; opacity: 0; 
    transform: translateX(20px); -webkit-transform: translateX(20px); -moz-transform: translateX(20px);
    transition: opacity 300ms, transform 300ms; }
.gdlr-core-flexslider-custom-nav .icon-arrow-left:hover:after{ opacity: 1; transform: translateX(0px); }
.gdlr-core-flexslider-custom-nav .icon-arrow-right:before{ content: " "; display: inline-block; width: 15px; border-bottom-width: 1px; border-bottom-style: solid; margin-bottom: 0.4em; opacity: 0; 
    transform: translateX(-20px); -webkit-transform: translateX(-20px); -moz-transform: translateX(-20px);
    transition: opacity 300ms, transform 300ms; }
.gdlr-core-flexslider-custom-nav .icon-arrow-right:hover:before{ opacity: 1; transform: translateX(0px); }
.gdlr-core-flexslider-custom-nav .icon-arrow-right:after{ content: "\e606"; }

.gdlr-core-toggle-box-style-icon .gdlr-core-toggle-box-item-icon{ font-size: 14px; }
.gdlr-core-toggle-box-style-icon .gdlr-core-toggle-box-item-tab .gdlr-core-toggle-box-item-icon:before{ content: "\e604"; font-family: 'simple-line-icons'; }
.gdlr-core-toggle-box-style-icon .gdlr-core-toggle-box-item-tab.gdlr-core-active .gdlr-core-toggle-box-item-icon:before{ content: "\e607"; }
.gdlr-core-accordion-style-icon .gdlr-core-accordion-item-icon{ font-size:  14px; }
.gdlr-core-accordion-style-icon .gdlr-core-accordion-item-tab .gdlr-core-accordion-item-icon:before{ content: "\e604"; font-family: 'simple-line-icons'; }
.gdlr-core-accordion-style-icon .gdlr-core-accordion-item-tab.gdlr-core-active .gdlr-core-accordion-item-icon:before{ content: "\e607"; }

.gdlr-core-personnel-style-medium .gdlr-core-personnel-list{ border-width: 1px; border-style: solid; display: table; width: 100%; }
.gdlr-core-personnel-style-medium .gdlr-core-personnel-list > div{ display: table-cell; vertical-align: middle; float: none; }
.gdlr-core-personnel-style-medium .gdlr-core-personnel-list-image{ width: 37%; max-width: 37%; }
.gdlr-core-personnel-style-medium .gdlr-core-personnel-list-content-wrap{ padding: 30px 30px 20px; }
.gdlr-core-personnel-style-medium .gdlr-core-personnel-list-image img{ margin: -1px;}

.gdlr-core-filterer-wrap.gdlr-core-style-text a:before{ content: "/"; width: 0; display: inline-block;
    transform: translateX(14px); -webkit-transform: translateX(-14px); -moz-transform: translateX(14px); }
.gdlr-core-filterer-wrap.gdlr-core-style-text a:first-child:before{ display: none; }
.gdlr-core-filterer-wrap.gdlr-core-style-text .gdlr-core-filterer{ margin-left: 12px; margin-right: 12px; }
.gdlr-core-filterer-wrap.gdlr-core-style-text.gdlr-core-left-align:before{ content: " "; display: inline-block; width: 10px; border-bottom-width: 1px; border-bottom-style: solid; margin-bottom: 0.3em; margin-right: 25px; }

.gdlr-core-price-table-item.gdlr-core-style-2 .gdlr-core-price-table-title,
.gdlr-core-price-table-item.gdlr-core-style-2 .gdlr-core-price-table-caption,
.gdlr-core-price-table-item.gdlr-core-style-2 .gdlr-core-price-table-price{ text-align: center; }

ul.gdlr-core-custom-menu-widget.gdlr-core-menu-style-plain { text-transform: uppercase; }
ul.gdlr-core-custom-menu-widget.gdlr-core-menu-style-plain a:before{ content: " "; display: inline-block; width: 12px; 
    border-bottom-width: 1px; border-bottom-style: solid; margin-bottom: 0.36em; margin-right: 8px; margin-left: -20px; opacity: 0;
    transition: opacity 300ms, margin-left 300ms; -moz-transition: opacity 300ms, margin-left 300ms; -webkit-transition: opacity 300ms, margin-left 300ms; }
ul.gdlr-core-custom-menu-widget.gdlr-core-menu-style-plain a:hover:before, 
ul.gdlr-core-custom-menu-widget.gdlr-core-menu-style-plain .current-menu-item a:before{ opacity: 1; margin-left: 0; }

.gdlr-core-portfolio-single-nav-wrap.gdlr-core-style-2{ border-top-width: 1px; border-top-style: solid; }
.gdlr-core-portfolio-single-nav-wrap.gdlr-core-style-2 .gdlr-core-portfolio-single-nav i{ font-size: 52px; padding: 0; background: transparent; }
.gdlr-core-portfolio-single-nav-wrap.gdlr-core-style-2 .gdlr-core-portfolio-single-nav-middle{ padding: 0; background: transparent }
.gdlr-core-portfolio-single-nav-wrap.gdlr-core-style-2 .gdlr-core-portfolio-single-nav-middle i:before{ content: "\e603"; display: inline-block; font-family: "simple-line-icons"; font-size: 28px; line-height: 52px; }
.gdlr-core-portfolio-single-nav-wrap.gdlr-core-style-2 .gdlr-core-portfolio-single-nav-left i:before{ content: "\f3d5"; font-family: "Ionicons"; }
.gdlr-core-portfolio-single-nav-wrap.gdlr-core-style-2 .gdlr-core-portfolio-single-nav-left .gdlr-core-portfolio-text{ display: none; }
.gdlr-core-portfolio-single-nav-wrap.gdlr-core-style-2 .gdlr-core-portfolio-single-nav-right i:before{ content: "\f3d6"; font-family: "Ionicons"; }
.gdlr-core-portfolio-single-nav-wrap.gdlr-core-style-2 .gdlr-core-portfolio-single-nav-right .gdlr-core-portfolio-text{ display: none; }

.gdlr-core-body .gdlr-core-load-more{ font-size: 17px; text-transform: capitalize; letter-spacing: 1px; border-bottom-width: 1px; border-bottom-style: solid; padding: 0px 0px 2px; }

@media only screen and (max-width: 767px){
    .gdlr-core-personnel-style-medium .gdlr-core-personnel-list > div{ display: block; }
       .gdlr-core-personnel-style-medium .gdlr-core-personnel-list-image{ width: 100%; max-width: 100%; }
}

/* custom */

.gdlr-core-flexslider.gdlr-core-bullet-style-round4 .flex-control-nav li a{ width: 19px; height: 19px; }
.gdlr-core-bullet-style-round4.gdlr-core-flexslider .flex-control-nav li{ margin: 0px 9px; }
.gdlr-core-flexslider.gdlr-core-bullet-style-round4 .flex-control-nav li a.flex-active{ width: 9px; height: 9px; margin: 5px 6px; }
.gdlr-core-newsletter-item.gdlr-core-style-round2 .gdlr-core-newsletter-submit input[type="submit"]{ height: 55px; }
.wpcf7 input, .wpcf7 select{ font-size: 16px; padding: 18px 22px; }
.gdlr-core-input-wrap [class^="gdlr-core-column-"]{ margin-bottom: 20px; }
.gdlr-core-newsletter-item.gdlr-core-style-rectangle .gdlr-core-newsletter-email input[type="email"]{ border-width: 2px; }
.gdlr-core-newsletter-item.gdlr-core-style-rectangle .gdlr-core-newsletter-email input[type="email"]{ font-size: 18px; letter-spacing: 1px; }
.gdlr-core-blog-grid.gdlr-core-style-3-date .gdlr-core-blog-title{ margin-bottom: -10px; font-weight: 500; }
.gdlr-core-blog-grid.gdlr-core-style-3-date .gdlr-core-blog-thumbnail{ margin-bottom: 40px; }
.gdlr-core-blog-info-wrapper .gdlr-core-blog-info{ font-size: 12px; font-weight: 500; letter-spacing: 3px; }
.gdlr-core-personnel-style-modern .gdlr-core-personnel-list{ margin-right: -1px; }
.gdlr-core-blog-grid.gdlr-core-style-3-date.gdlr-core-with-thumbnail .gdlr-core-blog-info-date{ font-weight: 500; text-transform: uppercase; letter-spacing: 4px; padding: 24px 30px; }
.gdlr-core-blog-grid.gdlr-core-style-3-date .gdlr-core-blog-thumbnail { margin-left: 62px; }
.gdlr-core-title-item .gdlr-core-title-item-caption-prefix { border-right-width: 4px; }
.gdlr-core-blog-grid .gdlr-core-blog-title{ font-size: 20px; font-weight: 600; }
.gdlr-core-blog-grid .gdlr-core-blog-grid-date .gdlr-core-blog-info-date { font-size: 13px; font-weight: 500; }
.gdlr-core-blog-full .gdlr-core-excerpt-read-more.gdlr-core-plain-text{ margin-top: 25px; }
.gdlr-core-blog-full .gdlr-core-excerpt-read-more{ margin-bottom: 10px; }
.gdlr-core-recent-post-widget-wrap.gdlr-core-style-1 .gdlr-core-recent-post-widget-title{ font-size: 18px; font-weight: 500; }
.gdlr-core-blog-info-author .gdlr-core-head{ margin-right: 7px; }
.gdlr-core-recent-post-widget-wrap.gdlr-core-style-1 .gdlr-core-recent-post-widget{ margin-bottom: 25px; }
.gdlr-core-blog-full.gdlr-core-style-2-date .gdlr-core-blog-info{ font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; }
.gdlr-core-blog-info-wrapper .gdlr-core-blog-info{ font-size: 12px; }
.gdlr-core-blog-info-wrapper .gdlr-core-head{ margin-right: 11px; }
.gdlr-core-blog-grid.gdlr-core-style-2 .gdlr-core-blog-info-wrapper .gdlr-core-blog-info{ font-size: 11px; letter-spacing: 1.5px; text-transform: uppercase;}
.gdlr-core-blog-link-format.gdlr-core-small.gdlr-core-style-2 .gdlr-core-blog-content{ font-size: 17px; }
.gdlr-core-blog-grid.gdlr-core-style-2 .gdlr-core-blog-info-wrapper{ margin-bottom: 9px; }
.gdlr-core-blockquote-item.gdlr-core-large-size .gdlr-core-blockquote-item-content{ font-size: 25px; line-height: 1.6; }
.gdlr-core-blockquote-item.gdlr-core-medium-size .gdlr-core-blockquote-item-content{ font-size: 22px; line-height: 1.6; }
.gdlr-core-blockquote-item.gdlr-core-small-size .gdlr-core-blockquote-item-content{ font-size: 18px; line-height: 1.6; }
.gdlr-core-blockquote-item.gdlr-core-small-size .gdlr-core-blockquote-item-author{ font-size: 15px; }
.gdlr-core-blockquote-item.gdlr-core-medium-size .gdlr-core-blockquote-item-author{ font-size: 17px; }
.gdlr-core-blockquote-item.gdlr-core-large-size .gdlr-core-blockquote-item-author{ font-size: 18px; }
.gdlr-core-icon-list-item .gdlr-core-icon-list-content{ font-size: 17px; }
input.wpcf7-form-control.wpcf7-submit.gdlr-core-curve-button{ margin-top: 15px; }
.gdlr-core-newsletter-item.gdlr-core-style-rectangle .gdlr-core-newsletter-email input[type="email"]{ font-size: 17px; }
.gdlr-core-newsletter-item.gdlr-core-style-round2 .gdlr-core-newsletter-submit input[type="submit"]{ height: 55px; }
ul.gdlr-core-custom-menu-widget.gdlr-core-menu-style-half li{ margin-bottom: 12px; }
.gdlr-core-recent-post-widget-wrap.gdlr-core-style-4 .gdlr-core-recent-post-widget-title{ font-weight: 500; }
.gdlr-core-testimonial-style-center .gdlr-core-testimonial-quote{ padding: 15px 0px 0px; }
.gdlr-core-testimonial-style-center .gdlr-core-testimonial-content p:after{ border-bottom-width: 3px; }
.gdlr-core-blog-grid.gdlr-core-style-4 .gdlr-core-blog-grid-top-info .gdlr-core-blog-info{ font-weight: 500; }
.gdlr-core-blog-grid.gdlr-core-style-4 .gdlr-core-blog-info.gdlr-core-blog-info-author{ font-weight: 500; }
.gdlr-core-feature-content-item .gdlr-core-feature-content-title{ margin-bottom: 22px; }
.gdlr-core-feature-content-content.gdlr-core-skin-content p{ margin-bottom: 5px; }
.gdlr-core-feature-content-item li.gdlr-core-item-mglr.flex-with-active-class.flex-active-slide{ margin-right: -1px !important; }
.gdlr-core-portfolio-modern2 .gdlr-core-image-overlay-content{ bottom: 40px; left: 40px; }
.gdlr-core-recent-post-widget-wrap.gdlr-core-style-4 .gdlr-core-recent-post-widget-thumbnail{ margin-top: 7px; }
.gdlr-core-recent-post-widget-wrap.gdlr-core-style-4 .gdlr-core-recent-post-widget{ margin-bottom: 26px;}
.single-product.woocommerce div.product .gdlr-core-social-share-item a{ font-size: 18px; }
.single-product.woocommerce div.product .corzo-woocommerce-tab .gdlr-core-tab-item-title{ font-size: 18px; }
html .woocommerce ul.cart_list li a, html .woocommerce ul.product_list_widget li a { font-weight: 500; }
.gdlr-core-recent-post-widget-wrap.gdlr-core-style-4 .gdlr-core-blog-info{ font-size: 13px; letter-spacing: 1.5px; text-transform: uppercase; font-weight: 500; }
.gdlr-core-testimonial-style-block .gdlr-core-testimonial-frame{  padding: 40px 50px 50px; margin-top: 50px; }
.gdlr-core-accordion-style-icon.gdlr-core-with-divider .gdlr-core-accordion-item-tab{ margin-bottom: 28px; }
.gdlr-core-accordion-style-icon .gdlr-core-accordion-item-title{ margin-bottom: 33px; }
.gdlr-core-blog-grid.gdlr-core-style-3-date .gdlr-core-blog-thumbnail{ margin-bottom: 40px; }
.gdlr-core-social-network-item .gdlr-core-social-network-icon{ font-size: 24px; }
.gdlr-core-personnel-thumbnail-hover-social .gdlr-core-social-network-item a{ margin-bottom: 20px; }
.gdlr-core-product-grid-2 .gdlr-core-product-price{ font-weight: 600; }
ul.gdlr-core-custom-menu-widget.gdlr-core-menu-style-plain li{ margin-bottom: 20px; font-size: 14px; letter-spacing: 5px; font-weight: 500; }
.gdlr-core-blog-full .gdlr-core-excerpt-read-more.gdlr-core-plain-text{ margin-top: 32px; font-weight: 500; }
.widget_gdlr-core-custom-menu-widget h1.arki-widget-title{ margin-bottom: 45px; }
.services-page .arki-sidebar-area .gdlr-core-sidebar-item h1.arki-widget-title{ font-size: 29px; }
.gdlr-core-newsletter-item.gdlr-core-style-rectangle .gdlr-core-newsletter-submit input[type="submit"]{ font-weight: 600; }
<?php
			$css .= ob_get_contents();
			ob_end_clean(); 

			return $css;
		}
	}
	add_filter('gdlr_core_theme_option_bottom_file_write', 'arki_gdlr_core_theme_option_bottom_file_write', 10, 2);
	if( !function_exists('arki_gdlr_core_theme_option_bottom_file_write') ){
		function arki_gdlr_core_theme_option_bottom_file_write( $css, $option_slug ){
			if( $option_slug != 'goodlayers_main_menu' ) return;

			$general = get_option('arki_general');

			if( !empty($general['enable-fixed-navigation-slide-bar']) && $general['enable-fixed-navigation-slide-bar'] == 'disable' ){
				$css .= '.arki-fixed-navigation .arki-navigation .arki-navigation-slide-bar{ display: none !important; }';
			}

			if( !empty($general['item-padding']) ){
				$margin = 2 * intval(str_replace('px', '', $general['item-padding']));
				if( !empty($margin) && is_numeric($margin) ){
					$css .= '.arki-item-mgb, .gdlr-core-item-mgb{ margin-bottom: ' . $margin . 'px; }';

					$margin -= 1;
					$css .= '.arki-body .gdlr-core-testimonial-item .gdlr-core-flexslider.gdlr-core-with-outer-frame-element .flex-viewport, '; 
					$css .= '.arki-body .gdlr-core-feature-content-item .gdlr-core-flexslider.gdlr-core-with-outer-frame-element .flex-viewport, '; 
					$css .= '.arki-body .gdlr-core-personnel-item .gdlr-core-flexslider.gdlr-core-with-outer-frame-element .flex-viewport, '; 
					$css .= '.arki-body .gdlr-core-hover-box-item .gdlr-core-flexslider.gdlr-core-with-outer-frame-element .flex-viewport,'; 
					$css .= '.arki-body .gdlr-core-portfolio-item .gdlr-core-flexslider.gdlr-core-with-outer-frame-element .flex-viewport, '; 
					$css .= '.arki-body .gdlr-core-product-item .gdlr-core-flexslider.gdlr-core-with-outer-frame-element .flex-viewport, '; 
					$css .= '.arki-body .gdlr-core-product-item .gdlr-core-flexslider.gdlr-core-with-outer-frame-element .flex-viewport, '; 
					$css .= '.arki-body .gdlr-core-blog-item .gdlr-core-flexslider.gdlr-core-with-outer-frame-element .flex-viewport, '; 
					$css .= '.arki-body .arki-lp-course-list-item .gdlr-core-flexslider.gdlr-core-with-outer-frame-element .flex-viewport{ '; 
					$css .= 'padding-top: ' . $margin . 'px; margin-top: -' . $margin . 'px; padding-right: ' . $margin . 'px; margin-right: -' . $margin . 'px; ';
					$css .= 'padding-left: ' . $margin . 'px; margin-left: -' . $margin . 'px; padding-bottom: ' . $margin . 'px; margin-bottom: -' . $margin . 'px; ';
					$css .= '}';
				}
			}

			if( !empty($general['mobile-logo-position']) && $general['mobile-logo-position'] == 'logo-right' ){
				$css .= '.arki-mobile-header .arki-logo-inner{ margin-right: 0px; margin-left: 80px; float: right; }';	
				$css .= '.arki-mobile-header .arki-mobile-menu-right{ left: 30px; right: auto; }';	
				$css .= '.arki-mobile-header .arki-main-menu-search{ float: right; margin-left: 0px; margin-right: 25px; }';	
				$css .= '.arki-mobile-header .arki-mobile-menu{ float: right; margin-left: 0px; margin-right: 30px; }';	
				$css .= '.arki-mobile-header .arki-main-menu-cart{ float: right; margin-left: 0px; margin-right: 20px; padding-left: 0px; padding-right: 5px; }';	
				$css .= '.arki-mobile-header .arki-top-cart-content-wrap{ left: 0px; }';
			}

			return $css;
		}
	}

	$arki_admin_option->add_element(array(
	
		// general head section
		'title' => esc_html__('General', 'arki'),
		'slug' => 'arki_general',
		'icon' => get_template_directory_uri() . '/include/options/images/general.png',
		'options' => array(
		
			'layout' => array(
				'title' => esc_html__('Layout', 'arki'),
				'options' => array(
					'custom-header' => array(
						'title' => esc_html__('Select Custom Header As Default Header', 'arki'),
						'type' => 'combobox',
						'single' => 'gdlr_core_custom_header_id',
						'options' => array('' => esc_html__('None', 'arki')) + gdlr_core_get_post_list('gdlr_core_header'),
						'description' => esc_html__('Any settings you set at the theme option will be ignored', 'arki')
					),
					'layout' => array(
						'title' => esc_html__('Layout', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'full' => esc_html__('Full', 'arki'),
							'boxed' => esc_html__('Boxed', 'arki'),
						)
					),
					'boxed-layout-top-margin' => array(
						'title' => esc_html__('Box Layout Top/Bottom Margin', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '150',
						'data-type' => 'pixel',
						'default' => '0px',
						'selector' => 'body.arki-boxed .arki-body-wrapper{ margin-top: #gdlr#; margin-bottom: #gdlr#; }',
						'condition' => array( 'layout' => 'boxed' ) 
					),
					'body-margin' => array(
						'title' => esc_html__('Body Margin ( Frame Spaces )', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '100',
						'data-type' => 'pixel',
						'default' => '0px',
						'selector' => '.arki-body-wrapper.arki-with-frame, body.arki-full .arki-fixed-footer{ margin: #gdlr#; }',
						'condition' => array( 'layout' => 'full' ),
						'description' => esc_html__('This value will be automatically omitted for side header style.', 'arki'),
					),
					'background-type' => array(
						'title' => esc_html__('Background Type', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'color' => esc_html__('Color', 'arki'),
							'image' => esc_html__('Image', 'arki'),
							'pattern' => esc_html__('Pattern', 'arki'),
						)
					),
					'background-image' => array(
						'title' => esc_html__('Background Image', 'arki'),
						'type' => 'upload',
						'data-type' => 'file', 
						'selector' => '.arki-body-background{ background-image: url(#gdlr#); }',
						'condition' => array('background-type' => 'image' )
					),
					'background-image-size' => array(
						'title' => esc_html__('Background Image Size', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'cover' => esc_html__('Cover ( full width and height )', 'arki'),
							'contain' => esc_html__('Contain', 'arki'),
							'auto' => esc_html__('Auto', 'arki'),
						),
						'default' => 'cover',
						'selector' => '.arki-body-background{ background-size: #gdlr#; }',
						'condition' => array( 'background-type' => 'image' )
					), 
					'background-image-repeat' => array(
						'title' => esc_html__('Background Image Repeat', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'no-repeat' => esc_html__('No Repeat', 'arki'),
							'repeat' => esc_html__('Repeat X & Y', 'arki'),
							'repeat-x' => esc_html__('Repeat X', 'arki'),
							'repeat-y' => esc_html__('Repeat Y', 'arki'),
						),
						'default' => 'cover',
						'selector' => '.arki-body-background{ background-repeat: #gdlr#; }',
						'condition' => array( 'background-type' => 'image' )
					), 
					'background-image-position' => array(
						'title' => esc_html__('Background Image Position', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'center' => esc_html__('Center', 'arki'),
							'top left' => esc_html__('Top Left', 'arki'),
							'top center' => esc_html__('Top Center', 'arki'),
							'top right' => esc_html__('Top Right', 'arki'),
							'center left' => esc_html__('Center Left', 'arki'),
							'center right' => esc_html__('Center Right', 'arki'),
							'bottom left' => esc_html__('Bottom Left', 'arki'),
							'bottom center' => esc_html__('Bottom Center', 'arki'),
							'bottom right' => esc_html__('Bottom Right', 'arki')
						),
						'default' => 'center',
						'selector' => '.arki-body-background{ background-position: #gdlr#; }',
						'condition' => array( 'background-type' => 'image' )
					),
					'background-image-opacity' => array(
						'title' => esc_html__('Background Image Opacity', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'opacity',
						'default' => '100',
						'condition' => array( 'layout' => 'boxed', 'background-type' => 'image' ),
						'selector' => '.arki-body-background{ opacity: #gdlr#; }'
					),
					'background-pattern' => array(
						'title' => esc_html__('Background Type', 'arki'),
						'type' => 'radioimage',
						'data-type' => 'text',
						'options' => 'pattern', 
						'selector' => '.arki-background-pattern .arki-body-outer-wrapper{ background-image: url(' . GDLR_CORE_URL . '/include/images/pattern/#gdlr#.png); }',
						'condition' => array('background-type' => 'pattern' ),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'enable-boxed-border' => array(
						'title' => esc_html__('Enable Boxed Border', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable',
						'condition' => array( 'layout' => 'boxed', 'background-type' => 'pattern' ),
					),
					'item-padding' => array(
						'title' => esc_html__('Item Left/Right Spaces', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '40',
						'data-type' => 'pixel',
						'default' => '15px',
						'description' => 'Space between each page items',
						'selector' => '.arki-item-pdlr, .gdlr-core-item-pdlr{ padding-left: #gdlr#; padding-right: #gdlr#; }' . 
							'.arki-item-rvpdlr, .gdlr-core-item-rvpdlr{ margin-left: -#gdlr#; margin-right: -#gdlr#; }' .
							'.gdlr-core-metro-rvpdlr{ margin-top: -#gdlr#; margin-right: -#gdlr#; margin-bottom: -#gdlr#; margin-left: -#gdlr#; }' .
							'.arki-item-mglr, .gdlr-core-item-mglr, .arki-navigation .sf-menu > .arki-mega-menu .sf-mega,' . 
							'.sf-menu.arki-top-bar-menu > .arki-mega-menu .sf-mega{ margin-left: #gdlr#; margin-right: #gdlr#; }' .
							'.gdlr-core-pbf-wrapper-container-inner{ width: calc(100% - #gdlr# - #gdlr#); }'
					
					),
					'container-width' => array(
						'title' => esc_html__('Container Width', 'arki'),
						'type' => 'text',
						'data-type' => 'pixel',
						'data-input-type' => 'pixel',
						'default' => '1180px',
						'selector' => '.arki-container, .gdlr-core-container, body.arki-boxed .arki-body-wrapper, ' . 
							'body.arki-boxed .arki-fixed-footer .arki-footer-wrapper, body.arki-boxed .arki-fixed-footer .arki-copyright-wrapper{ max-width: #gdlr#; }' 
					),
					'container-padding' => array(
						'title' => esc_html__('Container Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '100',
						'data-type' => 'pixel',
						'default' => '15px',
						'selector' => '.arki-body-front .gdlr-core-container, .arki-body-front .arki-container{ padding-left: #gdlr#; padding-right: #gdlr#; }'  . 
							'.arki-body-front .arki-container .arki-container, .arki-body-front .arki-container .gdlr-core-container, '.
							'.arki-body-front .gdlr-core-container .gdlr-core-container{ padding-left: 0px; padding-right: 0px; }' .
							'.arki-navigation-header-style-bar.arki-style-2 .arki-navigation-background{ left: #gdlr#; right: #gdlr#; }'
					),
					'sidebar-title-divider' => array(
						'title' => esc_html__('Sidebar Title Divider', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
					),
					'sidebar-heading-tag' => array(
						'title' => esc_html__('Sidebar Heading Tag', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'h1' => esc_html__('H1', 'arki'),
							'h2' => esc_html__('H2', 'arki'),
							'h3' => esc_html__('H3', 'arki'),
							'h4' => esc_html__('H4', 'arki'),
							'h5' => esc_html__('H5', 'arki'),
							'h6' => esc_html__('H6', 'arki'),
						),
						'default' => 'h3'
					),
					'sidebar-width' => array(
						'title' => esc_html__('Sidebar Width', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'30' => '50%', '20' => '33.33%', '15' => '25%', '12' => '20%', '10' => '16.67%'
						),
						'default' => 20,
					),
					'both-sidebar-width' => array(
						'title' => esc_html__('Both Sidebar Width', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'30' => '50%', '20' => '33.33%', '15' => '25%', '12' => '20%', '10' => '16.67%'
						),
						'default' => 15,
					),
					
				) // header-options
			), // header-nav	
			
			'top-bar' => arki_top_bar_options(),

			'top-bar-social' => arki_top_bar_social_options(),			

			'header' => arki_header_options(),
			
			'logo' => arki_logo_options(),

			'navigation' => arki_navigation_options(), 
			
			'fixed-navigation' => arki_fixed_navigation_options(),

			'float-social' => array(
				'title' => esc_html__('Float Social', 'arki'),
				'options' => array(
					'enable-float-social' => array(
						'title' => esc_html__('Enable Float Social', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
					'enable-float-social-title' => array(
						'title' => esc_html__('Float Social Title', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'display-float-social-after-page-title' => array(
						'title' => esc_html__('Display Float Social After Page Title', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
					'float-social-delicious' => array(
						'title' => esc_html__('Float Social Delicious Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-email' => array(
						'title' => esc_html__('Float Social Email Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-deviantart' => array(
						'title' => esc_html__('Float Social Deviantart Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-digg' => array(
						'title' => esc_html__('Float Social Digg Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-facebook' => array(
						'title' => esc_html__('Float Social Facebook Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-flickr' => array(
						'title' => esc_html__('Float Social Flickr Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-lastfm' => array(
						'title' => esc_html__('Float Social Lastfm Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-linkedin' => array(
						'title' => esc_html__('Float Social Linkedin Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-pinterest' => array(
						'title' => esc_html__('Float Social Pinterest Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-rss' => array(
						'title' => esc_html__('Float Social RSS Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-skype' => array(
						'title' => esc_html__('Float Social Skype Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-stumbleupon' => array(
						'title' => esc_html__('Float Social Stumbleupon Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-tumblr' => array(
						'title' => esc_html__('Float Social Tumblr Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-twitter' => array(
						'title' => esc_html__('Float Social Twitter Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-vimeo' => array(
						'title' => esc_html__('Float Social Vimeo Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-youtube' => array(
						'title' => esc_html__('Float Social Youtube Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-instagram' => array(
						'title' => esc_html__('Float Social Instagram Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
					'float-social-snapchat' => array(
						'title' => esc_html__('Float Social Snapchat Link', 'arki'),
						'type' => 'text',
						'condition' => array( 'enable-float-social' => 'enable' )
					),
				)
			),

			'title-style' => array(
				'title' => esc_html__('Page Title Style', 'arki'),
				'options' => array(

					'default-title-style' => array(
						'title' => esc_html__('Default Page Title Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'small' => esc_html__('Small', 'arki'),
							'medium' => esc_html__('Medium', 'arki'),
							'large' => esc_html__('Large', 'arki'),
							'custom' => esc_html__('Custom', 'arki'),
						),
						'default' => 'small'
					),
					'default-title-align' => array(
						'title' => esc_html__('Default Page Title Alignment', 'arki'),
						'type' => 'radioimage',
						'options' => 'text-align',
						'default' => 'left'
					),
					'default-title-top-padding' => array(
						'title' => esc_html__('Default Page Title Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '350',
						'default' => '93px',
						'selector' => '.arki-page-title-wrap.arki-style-custom .arki-page-title-content{ padding-top: #gdlr#; }',
						'condition' => array( 'default-title-style' => 'custom' )
					),
					'default-title-bottom-padding' => array(
						'title' => esc_html__('Default Page Title Bottom Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '350',
						'default' => '87px',
						'selector' => '.arki-page-title-wrap.arki-style-custom .arki-page-title-content{ padding-bottom: #gdlr#; }',
						'condition' => array( 'default-title-style' => 'custom' )
					),
					'default-page-caption-top-margin' => array(
						'title' => esc_html__('Default Page Caption Top Margin', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '200',
						'default' => '13px',						
						'selector' => '.arki-page-title-wrap.arki-style-custom .arki-page-caption{ margin-top: #gdlr#; }',
						'condition' => array( 'default-title-style' => 'custom' )
					),
					'default-title-font-transform' => array(
						'title' => esc_html__('Default Page Title Font Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'' => esc_html__('Default', 'arki'),
							'none' => esc_html__('None', 'arki'),
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
						),
						'default' => 'default',
						'selector' => '.arki-page-title-wrap .arki-page-title{ text-transform: #gdlr#; }'
					),
					'default-title-font-size' => array(
						'title' => esc_html__('Default Page Title Font Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '37px',
						'selector' => '.arki-page-title-wrap.arki-style-custom .arki-page-title{ font-size: #gdlr#; }',
						'condition' => array( 'default-title-style' => 'custom' )
					),
					'default-title-font-weight' => array(
						'title' => esc_html__('Default Page Title Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'selector' => '.arki-page-title-wrap .arki-page-title{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800. Leave this field blank for default value (700).', 'arki')					
					),
					'default-title-letter-spacing' => array(
						'title' => esc_html__('Default Page Title Letter Spacing', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '20',
						'default' => '0px',
						'selector' => '.arki-page-title-wrap.arki-style-custom .arki-page-title{ letter-spacing: #gdlr#; }',
						'condition' => array( 'default-title-style' => 'custom' )
					),
					'default-caption-font-transform' => array(
						'title' => esc_html__('Default Page Caption Font Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'' => esc_html__('Default', 'arki'),
							'none' => esc_html__('None', 'arki'),
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
						),
						'default' => 'default',
						'selector' => '.arki-page-title-wrap .arki-page-caption{ text-transform: #gdlr#; }'
					),
					'default-caption-font-size' => array(
						'title' => esc_html__('Default Page Caption Font Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '16px',
						'selector' => '.arki-page-title-wrap.arki-style-custom .arki-page-caption{ font-size: #gdlr#; }',
						'condition' => array( 'default-title-style' => 'custom' )
					),
					'default-caption-font-weight' => array(
						'title' => esc_html__('Default Page Caption Font Weight', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'selector' => '.arki-page-title-wrap .arki-page-caption{ font-weight: #gdlr#; }',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800. Leave this field blank for default value (400).', 'arki')					
					),
					'default-caption-letter-spacing' => array(
						'title' => esc_html__('Default Page Caption Letter Spacing', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '20',
						'default' => '0px',
						'selector' => '.arki-page-title-wrap.arki-style-custom .arki-page-caption{ letter-spacing: #gdlr#; }',
						'condition' => array( 'default-title-style' => 'custom' )
					),
					'page-title-top-bottom-gradient' => array(
						'title' => esc_html__('Default Page Title Top/Bottom Gradient', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'both' => esc_html__('Both', 'arki'),
							'top' => esc_html__('Top', 'arki'),
							'bottom' => esc_html__('Bottom', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'none',
					),
					'page-title-top-gradient-size' => array(
						'title' => esc_html__('Default Page Title Top Gradient Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '1000',
 						'default' => '413px',
						'selector' => '.arki-page-title-wrap .arki-page-title-top-gradient{ height: #gdlr#; }',
					),
					'page-title-bottom-gradient-size' => array(
						'title' => esc_html__('Default Page Title Bottom Gradient Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '1000',
 						'default' => '413px',
						'selector' => '.arki-page-title-wrap .arki-page-title-bottom-gradient{ height: #gdlr#; }',
					),
					'default-title-background-overlay-opacity' => array(
						'title' => esc_html__('Default Page Title Background Overlay Opacity', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'opacity',
						'default' => '80',
						'selector' => '.arki-page-title-wrap .arki-page-title-overlay{ opacity: #gdlr#; }'
					),
				) 
			), // title style

			'title-background' => array(
				'title' => esc_html__('Page Title Background', 'arki'),
				'options' => array(

					'default-title-background' => array(
						'title' => esc_html__('Default Page Title Background', 'arki'),
						'type' => 'upload',
						'data-type' => 'file',
						'selector' => '.arki-page-title-wrap{ background-image: url(#gdlr#); }'
					),
					'default-portfolio-title-background' => array(
						'title' => esc_html__('Default Portfolio Title Background', 'arki'),
						'type' => 'upload',
						'data-type' => 'file',
						'selector' => 'body.single-portfolio .arki-page-title-wrap{ background-image: url(#gdlr#); }'
					),
					'default-personnel-title-background' => array(
						'title' => esc_html__('Default Personnel Title Background', 'arki'),
						'type' => 'upload',
						'data-type' => 'file',
						'selector' => 'body.single-personnel .arki-page-title-wrap{ background-image: url(#gdlr#); }'
					),
					'default-search-title-background' => array(
						'title' => esc_html__('Default Search Title Background', 'arki'),
						'type' => 'upload',
						'data-type' => 'file',
						'selector' => 'body.search .arki-page-title-wrap{ background-image: url(#gdlr#); }'
					),
					'default-archive-title-background' => array(
						'title' => esc_html__('Default Archive Title Background', 'arki'),
						'type' => 'upload',
						'data-type' => 'file',
						'selector' => 'body.archive .arki-page-title-wrap{ background-image: url(#gdlr#); }'
					),
					'default-404-background' => array(
						'title' => esc_html__('Default 404 Background', 'arki'),
						'type' => 'upload',
						'data-type' => 'file',
						'selector' => '.arki-not-found-wrap .arki-not-found-background{ background-image: url(#gdlr#); }'
					),
					'default-404-background-opacity' => array(
						'title' => esc_html__('Default 404 Background Opacity', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'opacity',
						'default' => '27',
						'selector' => '.arki-not-found-wrap .arki-not-found-background{ opacity: #gdlr#; }'
					),

				) 
			), // title background

			'blog-title-style' => array(
				'title' => esc_html__('Blog Title Style', 'arki'),
				'options' => array(

					'default-blog-title-style' => array(
						'title' => esc_html__('Default Blog Title Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'small' => esc_html__('Small', 'arki'),
							'large' => esc_html__('Large', 'arki'),
							'custom' => esc_html__('Custom', 'arki'),
							'inside-content' => esc_html__('Inside Content', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'small'
					),
					'default-blog-title-top-padding' => array(
						'title' => esc_html__('Default Blog Title Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '400',
						'default' => '93px',
						'selector' => '.arki-blog-title-wrap.arki-style-custom .arki-blog-title-content{ padding-top: #gdlr#; }',
						'condition' => array( 'default-blog-title-style' => 'custom' )
					),
					'default-blog-title-bottom-padding' => array(
						'title' => esc_html__('Default Blog Title Bottom Padding', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '400',
						'default' => '87px',
						'selector' => '.arki-blog-title-wrap.arki-style-custom .arki-blog-title-content{ padding-bottom: #gdlr#; }',
						'condition' => array( 'default-blog-title-style' => 'custom' )
					),
					'default-blog-feature-image' => array(
						'title' => esc_html__('Default Blog Feature Image Location', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'content' => esc_html__('Inside Content', 'arki'),
							'title-background' => esc_html__('Title Background', 'arki'),
							'none' => esc_html__('None', 'arki'),
						),
						'default' => 'content',
						'condition' => array( 'default-blog-title-style' => array('small', 'large', 'custom') )
					),
					'default-blog-title-background-image' => array(
						'title' => esc_html__('Default Blog Title Background Image', 'arki'),
						'type' => 'upload',
						'data-type' => 'file',
						'selector' => '.arki-blog-title-wrap{ background-image: url(#gdlr#); }',
						'condition' => array( 'default-blog-title-style' => array('small', 'large', 'custom') )
					),
					'default-blog-top-bottom-gradient' => array(
						'title' => esc_html__('Default Blog ( Feature Image ) Title Top/Bottom Gradient', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'enable' => esc_html__('Both', 'arki'),
							'top' => esc_html__('Top', 'arki'),
							'bottom' => esc_html__('Bottom', 'arki'),
							'disable' => esc_html__('None', 'arki'),
						),
						'default' => 'enable',
					),
					'single-blog-title-top-gradient-size' => array(
						'title' => esc_html__('Single Blog Title Top Gradient Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '1000',
 						'default' => '413px',
						'selector' => '.arki-blog-title-wrap.arki-feature-image .arki-blog-title-top-overlay{ height: #gdlr#; }',
					),
					'single-blog-title-bottom-gradient-size' => array(
						'title' => esc_html__('Single Blog Title Bottom Gradient Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'data-min' => '0',
						'data-max' => '1000',
 						'default' => '413px',
						'selector' => '.arki-blog-title-wrap.arki-feature-image .arki-blog-title-bottom-overlay{ height: #gdlr#; }',
					),
					'default-blog-title-background-overlay-opacity' => array(
						'title' => esc_html__('Default Blog Title Background Overlay Opacity', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'opacity',
						'default' => '80',
						'selector' => '.arki-blog-title-wrap .arki-blog-title-overlay{ opacity: #gdlr#; }',
						'condition' => array( 'default-blog-title-style' => array('small', 'large', 'custom') )
					),

				) 
			), // post title style			

			'blog-style' => array(
				'title' => esc_html__('Blog Style', 'arki'),
				'options' => array(
					'blog-style' => array(
						'title' => esc_html__('Single Blog Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'style-1' => esc_html__('Style 1', 'arki'),
							'style-2' => esc_html__('Style 2', 'arki'),
							'style-3' => esc_html__('Style 3', 'arki'),
							'style-4' => esc_html__('Style 4', 'arki'),
							'style-5' => esc_html__('Style 5', 'arki'),
							'magazine' => esc_html__('Magazine', 'arki')
						),
						'default' => 'style-1'
					),
					'blog-title-style' => array(
						'title' => esc_html__('Single Blog Title Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'' => esc_html__('Default', 'arki'),
							'style-1' => esc_html__('Style 1', 'arki'),
							'style-2' => esc_html__('Style 2', 'arki'),
							'style-4' => esc_html__('Style 4', 'arki')
						)
					),
					'blog-date-feature' => array(
						'title' => esc_html__('Enable Blog Date Feature', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'condition' => array( 'blog-title-style' => 'style-1' )
					),
					'blog-date-feature-year' => array(
						'title' => esc_html__('Enable Year on Blog Date Feature', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable',
						'condition' => array( 'blog-title-style' => 'style-1', 'blog-date-feature' => 'enable' )
					),
					'blockquote-style' => array(
						'title' => esc_html__('Blockquote Style ( <blockquote> tag )', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'style-1' => esc_html__('Style 1', 'arki'),
							'style-2' => esc_html__('Style 2', 'arki'),
							'style-3' => esc_html__('Style 3', 'arki')
						),
						'default' => 'style-1'
					),
					'blog-sidebar' => array(
						'title' => esc_html__('Single Blog Sidebar ( Default )', 'arki'),
						'type' => 'radioimage',
						'options' => 'sidebar',
						'default' => 'none',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'blog-sidebar-left' => array(
						'title' => esc_html__('Single Blog Sidebar Left ( Default )', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'blog-sidebar'=>array('left', 'both') )
					),
					'blog-sidebar-right' => array(
						'title' => esc_html__('Single Blog Sidebar Right ( Default )', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'blog-sidebar'=>array('right', 'both') )
					),
					'blog-max-content-width' => array(
						'title' => esc_html__('Single Blog Max Content Width ( No sidebar layout )', 'arki'),
						'type' => 'text',
						'data-type' => 'text',
						'data-input-type' => 'pixel',
						'default' => '900px',
						'selector' => 'body.single-post .arki-sidebar-style-none, body.blog .arki-sidebar-style-none, ' . 
							'.arki-blog-style-2 .arki-comment-content{ max-width: #gdlr#; }'
					),
					'blog-thumbnail-size' => array(
						'title' => esc_html__('Single Blog Thumbnail Size', 'arki'),
						'type' => 'combobox',
						'options' => 'thumbnail-size',
						'default' => 'full'
					),
					'meta-option' => array(
						'title' => esc_html__('Meta Option', 'arki'),
						'type' => 'multi-combobox',
						'options' => array( 
							'date' => esc_html__('Date', 'arki'),
							'author' => esc_html__('Author', 'arki'),
							'category' => esc_html__('Category', 'arki'),
							'tag' => esc_html__('Tag', 'arki'),
							'comment' => esc_html__('Comment', 'arki'),
							'comment-number' => esc_html__('Comment Number', 'arki'),
						),
						'default' => array('author', 'category', 'tag', 'comment-number')
					),
					'blog-author' => array(
						'title' => esc_html__('Enable Single Blog Author', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'blog-navigation' => array(
						'title' => esc_html__('Enable Single Blog Navigation', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'pagination-style' => array(
						'title' => esc_html__('Pagination Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'plain' => esc_html__('Plain', 'arki'),
							'rectangle' => esc_html__('Rectangle', 'arki'),
							'rectangle-border' => esc_html__('Rectangle Border', 'arki'),
							'round' => esc_html__('Round', 'arki'),
							'round-border' => esc_html__('Round Border', 'arki'),
							'circle' => esc_html__('Circle', 'arki'),
							'circle-border' => esc_html__('Circle Border', 'arki'),
						),
						'default' => 'round'
					),
					'pagination-align' => array(
						'title' => esc_html__('Pagination Alignment', 'arki'),
						'type' => 'radioimage',
						'options' => 'text-align',
						'default' => 'right'
					),
					'enable-related-post' => array(
						'title' => esc_html__('Enable Related Post', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
					),
					'related-post-blog-style' => array(
						'title' => esc_html__('Related Post Blog Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'blog-column' => esc_html__('Blog Column', 'arki'), 
							'blog-column-with-frame' => esc_html__('Blog Column With Frame', 'arki'), 
						),
						'default' => 'blog-column-with-frame',
					),
					'related-post-blog-column-style' => array(
						'title' => esc_html__('Related Post Blog Column Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'style-1' => esc_html__('Style 1', 'arki'), 
							'style-2' => esc_html__('Style 2', 'arki'), 
							'style-3' => esc_html__('Style 3', 'arki'), 
						),
						'default' => 'blog-column-with-frame',
					),
					'related-post-column-size' => array(
						'title' => esc_html__('Related Post Column Size', 'arki'),
						'type' => 'combobox',
						'options' => array( 60 => 1, 30 => 2, 20 => 3, 15 => 4, 12 => 5 ),
						'default' => '20',
					),
					'related-post-meta-option' => array(
						'title' => esc_html__('Related Post Meta Option', 'arki'),
						'type' => 'multi-combobox',
						'options' => array(
							'date' => esc_html__('Date', 'arki'),
							'author' => esc_html__('Author', 'arki'),
							'category' => esc_html__('Category', 'arki'),
							'tag' => esc_html__('Tag', 'arki'),
							'comment' => esc_html__('Comment', 'arki'),
							'comment-number' => esc_html__('Comment Number', 'arki'),
						),
						'default' => array('date', 'author', 'category', 'comment-number'),
					),
					'related-post-thumbnail-size' => array(
						'title' => esc_html__('Related Post Blog Thumbnail Size', 'arki'),
						'type' => 'combobox',
						'options' => 'thumbnail-size',
						'default' => 'full',
					),
					'related-post-num-fetch' => array(
						'title' => esc_html__('Related Post Num Fetch', 'arki'),
						'type' => 'text',
						'default' => '3',
					),
					'related-post-excerpt-number' => array(
						'title' => esc_html__('Related Post Excerpt Number', 'arki'),
						'type' => 'text',
						'default' => '0',
					),
				) // blog-style-options
			), // blog-style-nav

			'blog-social-share' => array(
				'title' => esc_html__('Blog Social Share', 'arki'),
				'options' => array(
					'blog-social-share' => array(
						'title' => esc_html__('Enable Single Blog Share', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'blog-social-share-count' => array(
						'title' => esc_html__('Enable Single Blog Share Count', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'blog-social-facebook' => array(
						'title' => esc_html__('Facebook', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'blog-facebook-access-token' => array(
						'title' => esc_html__('Facebook Access Token', 'arki'),
						'type' => 'text',
					),	
					'blog-social-linkedin' => array(
						'title' => esc_html__('Linkedin', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),			
					'blog-social-pinterest' => array(
						'title' => esc_html__('Pinterest', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),			
					'blog-social-stumbleupon' => array(
						'title' => esc_html__('Stumbleupon', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),			
					'blog-social-twitter' => array(
						'title' => esc_html__('Twitter', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),			
					'blog-social-email' => array(
						'title' => esc_html__('Email', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
				) // blog-style-options
			), // blog-style-nav
			
			'event' => array(
				'title' => esc_html__('Event', 'arki'),
				'options' => array(
					'default-event-title-background' => array(
						'title' => esc_html__('Default Event Title Background', 'arki'),
						'type' => 'upload',
						'data-type' => 'file',
						'selector' => 'body.single-event .arki-page-title-wrap{ background-image: url(#gdlr#); }'
					),
					'default-event-sidebar' => array(
						'title' => esc_html__('Default Event Sidebar', 'arki'),
						'type' => 'radioimage',
						'options' => 'sidebar',
						'default' => 'none',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'default-event-sidebar-left' => array(
						'title' => esc_html__('Default Event Sidebar Left', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'default-event-sidebar'=>array('left', 'both') )
					),
					'default-event-sidebar-right' => array(
						'title' => esc_html__('Default Event Sidebar Right', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'default-event-sidebar'=>array('right', 'both') )
					),
				)
			),
			
			'search-archive' => array(
				'title' => esc_html__('Search/Archive', 'arki'),
				'options' => array(
					'archive-blog-sidebar' => array(
						'title' => esc_html__('Archive Blog Sidebar', 'arki'),
						'type' => 'radioimage',
						'options' => 'sidebar',
						'default' => 'right',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'archive-blog-sidebar-left' => array(
						'title' => esc_html__('Archive Blog Sidebar Left', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'archive-blog-sidebar'=>array('left', 'both') )
					),
					'archive-blog-sidebar-right' => array(
						'title' => esc_html__('Archive Blog Sidebar Right', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'archive-blog-sidebar'=>array('right', 'both') )
					),
					'archive-blog-style' => array(
						'title' => esc_html__('Archive Blog Style', 'arki'),
						'type' => 'radioimage',
						'options' => array(
							'blog-full' => GDLR_CORE_URL . '/include/images/blog-style/blog-full.png',
							'blog-full-with-frame' => GDLR_CORE_URL . '/include/images/blog-style/blog-full-with-frame.png',
							'blog-column' => GDLR_CORE_URL . '/include/images/blog-style/blog-column.png',
							'blog-column-with-frame' => GDLR_CORE_URL . '/include/images/blog-style/blog-column-with-frame.png',
							'blog-column-no-space' => GDLR_CORE_URL . '/include/images/blog-style/blog-column-no-space.png',
							'blog-image' => GDLR_CORE_URL . '/include/images/blog-style/blog-image.png',
							'blog-image-no-space' => GDLR_CORE_URL . '/include/images/blog-style/blog-image-no-space.png',
							'blog-left-thumbnail' => GDLR_CORE_URL . '/include/images/blog-style/blog-left-thumbnail.png',
							'blog-right-thumbnail' => GDLR_CORE_URL . '/include/images/blog-style/blog-right-thumbnail.png',
						),
						'default' => 'blog-full',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'archive-blog-full-style' => array(
						'title' => esc_html__('Blog Full Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'style-1' => esc_html__('Style 1', 'arki'),
							'style-2' => esc_html__('Style 2', 'arki'),
						),
						'condition' => array( 'archive-blog-style'=>array('blog-full', 'blog-full-with-frame') )
					),
					'archive-blog-side-thumbnail-style' => array(
						'title' => esc_html__('Blog Side Thumbnail Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'style-1' => esc_html__('Style 1', 'arki'),
							'style-1-large' => esc_html__('Style 1 Large Thumbnail', 'arki'),
							'style-2' => esc_html__('Style 2', 'arki'),
							'style-2-large' => esc_html__('Style 2 Large Thumbnail', 'arki'),
						),
						'condition' => array( 'archive-blog-style'=>array('blog-left-thumbnail', 'blog-right-thumbnail') )
					),
					'archive-blog-column-style' => array(
						'title' => esc_html__('Blog Column Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'style-1' => esc_html__('Style 1', 'arki'),
							'style-2' => esc_html__('Style 2', 'arki'),
						),
						'condition' => array( 'archive-blog-style'=>array('blog-column', 'blog-column-with-frame', 'blog-column-no-space') )
					),
					'archive-blog-image-style' => array(
						'title' => esc_html__('Blog Image Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'style-1' => esc_html__('Style 1', 'arki'),
							'style-2' => esc_html__('Style 2', 'arki'),
						),
						'condition' => array( 'archive-blog-style'=>array('blog-image', 'blog-image-no-space') )
					),
					'archive-blog-full-alignment' => array(
						'title' => esc_html__('Archive Blog Full Alignment', 'arki'),
						'type' => 'combobox',
						'default' => 'enable',
						'options' => array(
							'left' => esc_html__('Left', 'arki'),
							'center' => esc_html__('Center', 'arki'),
						),
						'condition' => array( 'archive-blog-style' => array('blog-full', 'blog-full-with-frame') )
					),
					'archive-thumbnail-size' => array(
						'title' => esc_html__('Archive Thumbnail Size', 'arki'),
						'type' => 'combobox',
						'options' => 'thumbnail-size'
					),
					'archive-show-thumbnail' => array(
						'title' => esc_html__('Archive Show Thumbnail', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'condition' => array( 'archive-blog-style' => array('blog-full', 'blog-full-with-frame', 'blog-column', 'blog-column-with-frame', 'blog-column-no-space', 'blog-left-thumbnail', 'blog-right-thumbnail') )
					),
					'archive-column-size' => array(
						'title' => esc_html__('Archive Column Size', 'arki'),
						'type' => 'combobox',
						'options' => array( 60 => 1, 30 => 2, 20 => 3, 15 => 4, 12 => 5 ),
						'default' => 20,
						'condition' => array( 'archive-blog-style' => array('blog-column', 'blog-column-with-frame', 'blog-column-no-space', 'blog-image', 'blog-image-no-space') )
					),
					'archive-excerpt' => array(
						'title' => esc_html__('Archive Excerpt Type', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'specify-number' => esc_html__('Specify Number', 'arki'),
							'show-all' => esc_html__('Show All ( use <!--more--> tag to cut the content )', 'arki'),
						),
						'default' => 'specify-number',
						'condition' => array('archive-blog-style' => array('blog-full', 'blog-full-with-frame', 'blog-column', 'blog-column-with-frame', 'blog-column-no-space', 'blog-left-thumbnail', 'blog-right-thumbnail'))
					),
					'archive-excerpt-number' => array(
						'title' => esc_html__('Archive Excerpt Number', 'arki'),
						'type' => 'text',
						'default' => 55,
						'data-input-type' => 'number',
						'condition' => array('archive-blog-style' => array('blog-full', 'blog-full-with-frame', 'blog-column', 'blog-column-with-frame', 'blog-column-no-space', 'blog-left-thumbnail', 'blog-right-thumbnail'), 'archive-excerpt' => 'specify-number')
					),
					'archive-date-feature' => array(
						'title' => esc_html__('Enable Blog Date Feature', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'condition' => array( 'archive-blog-style' => array('blog-full', 'blog-full-with-frame', 'blog-left-thumbnail', 'blog-right-thumbnail') )
					),
					'archive-meta-option' => array(
						'title' => esc_html__('Archive Meta Option', 'arki'),
						'type' => 'multi-combobox',
						'options' => array( 
							'date' => esc_html__('Date', 'arki'),
							'author' => esc_html__('Author', 'arki'),
							'category' => esc_html__('Category', 'arki'),
							'tag' => esc_html__('Tag', 'arki'),
							'comment' => esc_html__('Comment', 'arki'),
							'comment-number' => esc_html__('Comment Number', 'arki'),
						),
						'default' => array('date', 'author', 'category')
					),
					'archive-show-read-more' => array(
						'title' => esc_html__('Archive Show Read More Button', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'condition' => array('archive-blog-style' => array('blog-full', 'blog-full-with-frame', 'blog-left-thumbnail', 'blog-right-thumbnail'),)
					),
					'archive-blog-title-font-size' => array(
						'title' => esc_html__('Blog Title Font Size', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
					),
					'archive-blog-title-font-weight' => array(
						'title' => esc_html__('Blog Title Font Weight', 'arki'),
						'type' => 'text',
						'description' => esc_html__('Eg. lighter, bold, normal, 300, 400, 600, 700, 800', 'arki')
					),
					'archive-blog-title-letter-spacing' => array(
						'title' => esc_html__('Blog Title Letter Spacing', 'arki'),
						'type' => 'text',
						'data-input-type' => 'pixel',
					),
					'archive-blog-title-text-transform' => array(
						'title' => esc_html__('Blog Title Text Transform', 'arki'),
						'type' => 'combobox',
						'data-type' => 'text',
						'options' => array(
							'none' => esc_html__('None', 'arki'),
							'uppercase' => esc_html__('Uppercase', 'arki'),
							'lowercase' => esc_html__('Lowercase', 'arki'),
							'capitalize' => esc_html__('Capitalize', 'arki'),
						),
						'default' => 'none'
					),
				)
			),

			'woocommerce-style' => array(
				'title' => esc_html__('Woocommerce Style', 'arki'),
				'options' => array(

					'woocommerce-archive-sidebar' => array(
						'title' => esc_html__('Woocommerce Archive Sidebar', 'arki'),
						'type' => 'radioimage',
						'options' => 'sidebar',
						'default' => 'right',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'woocommerce-archive-sidebar-left' => array(
						'title' => esc_html__('Woocommerce Archive Sidebar Left', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'woocommerce-archive-sidebar'=>array('left', 'both') )
					),
					'woocommerce-archive-sidebar-right' => array(
						'title' => esc_html__('Woocommerce Archive Sidebar Right', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'woocommerce-archive-sidebar'=>array('right', 'both') )
					),
					'woocommerce-archive-product-style' => array(
						'title' => esc_html__('Woocommerce Archive Product Style', 'arki'),
						'type' => 'combobox',
						'options' => array( 
							'grid' => esc_html__('Grid', 'arki'),
							'grid-2' => esc_html__('Grid 2', 'arki'),
							'grid-3' => esc_html__('Grid 3', 'arki'),
							'grid-4' => esc_html__('Grid 4', 'arki'),
						),
						'default' => 'grid'
					),
					'woocommerce-archive-product-amount' => array(
						'title' => esc_html__('Woocommerce Archive Product Amount', 'arki'),
						'type' => 'text',
					),
					'woocommerce-archive-column-size' => array(
						'title' => esc_html__('Woocommerce Archive Column Size', 'arki'),
						'type' => 'combobox',
						'options' => array( 60 => 1, 30 => 2, 20 => 3, 15 => 4, 12 => 5, 10 => 6, ),
						'default' => 15
					),
					'woocommerce-archive-thumbnail' => array(
						'title' => esc_html__('Woocommerce Archive Thumbnail Size', 'arki'),
						'type' => 'combobox',
						'options' => 'thumbnail-size',
						'default' => 'full'
					),
					'woocommerce-related-product-column-size' => array(
						'title' => esc_html__('Woocommerce Related Product Column Size', 'arki'),
						'type' => 'combobox',
						'options' => array( 60 => 1, 30 => 2, 20 => 3, 15 => 4, 12 => 5, 10 => 6, ),
						'default' => 15
					),
					'woocommerce-related-product-num-fetch' => array(
						'title' => esc_html__('Woocommerce Related Product Num Fetch', 'arki'),
						'type' => 'text',
						'default' => 4,
						'data-input-type' => 'number'
					),
					'woocommerce-related-product-thumbnail' => array(
						'title' => esc_html__('Woocommerce Related Product Thumbnail Size', 'arki'),
						'type' => 'combobox',
						'options' => 'thumbnail-size',
						'default' => 'full'
					),
				)
			),

			'portfolio-style' => array(
				'title' => esc_html__('Portfolio Style', 'arki'),
				'options' => array(
					'portfolio-slug' => array(
						'title' => esc_html__('Portfolio Slug (Permalink)', 'arki'),
						'type' => 'text',
						'default' => 'portfolio',
						'description' => esc_html__('Please save the "Settings > Permalink" area once after made a changes to this field.', 'arki')
					),
					'portfolio-category-slug' => array(
						'title' => esc_html__('Portfolio Category Slug (Permalink)', 'arki'),
						'type' => 'text',
						'default' => 'portfolio_category',
						'description' => esc_html__('Please save the "Settings > Permalink" area once after made a changes to this field.', 'arki')
					),
					'portfolio-tag-slug' => array(
						'title' => esc_html__('Portfolio Tag Slug (Permalink)', 'arki'),
						'type' => 'text',
						'default' => 'portfolio_tag',
						'description' => esc_html__('Please save the "Settings > Permalink" area once after made a changes to this field.', 'arki')
					),
					'enable-single-portfolio-navigation' => array(
						'title' => esc_html__('Enable Single Portfolio Navigation', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'disable' => esc_html__('Disable', 'arki'),
							'enable' => esc_html__('Style 1', 'arki'),
							'style-2' => esc_html__('Style 2', 'arki'),
						),
						'default' => 'enable'
					),
					'enable-single-portfolio-navigation-in-same-tag' => array(
						'title' => esc_html__('Enable Single Portfolio Navigation Within Same Tag', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'condition' => array( 'enable-single-portfolio-navigation' => array('enable', 'style-2') )
					),
					'single-portfolio-navigation-middle-link' => array(
						'title' => esc_html__('Single Portfolio Navigation Middle Link', 'arki'),
						'type' => 'text',
						'default' => '#',
						'condition' => array( 'enable-single-portfolio-navigation' => 'style-2' )
					),
					'portfolio-icon-hover-link' => array(
						'title' => esc_html__('Portfolio Hover Icon (Link)', 'arki'),
						'type' => 'radioimage',
						'options' => 'hover-icon-link',
						'default' => 'icon_link_alt'
					),
					'portfolio-icon-hover-video' => array(
						'title' => esc_html__('Portfolio Hover Icon (Video)', 'arki'),
						'type' => 'radioimage',
						'options' => 'hover-icon-video',
						'default' => 'icon_film'
					),
					'portfolio-icon-hover-image' => array(
						'title' => esc_html__('Portfolio Hover Icon (Image)', 'arki'),
						'type' => 'radioimage',
						'options' => 'hover-icon-image',
						'default' => 'icon_zoom-in_alt'
					),
					'portfolio-icon-hover-size' => array(
						'title' => esc_html__('Portfolio Hover Icon Size', 'arki'),
						'type' => 'fontslider',
						'data-type' => 'pixel',
						'default' => '22px',
						'selector' => '.gdlr-core-portfolio-thumbnail .gdlr-core-portfolio-icon{ font-size: #gdlr#; }' 
					),
					'enable-related-portfolio' => array(
						'title' => esc_html__('Enable Related Portfolio', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'related-portfolio-style' => array(
						'title' => esc_html__('Related Portfolio Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'grid' => esc_html__('Grid', 'arki'),
							'modern' => esc_html__('Modern', 'arki'),
						),
						'condition' => array('enable-related-portfolio'=>'enable')
					),
					'related-portfolio-column-size' => array(
						'title' => esc_html__('Related Portfolio Column Size', 'arki'),
						'type' => 'combobox',
						'options' => array( 60 => 1, 30 => 2, 20 => 3, 15 => 4, 12 => 5, 10 => 6, ),
						'default' => 15,
						'condition' => array('enable-related-portfolio'=>'enable')
					),
					'related-portfolio-num-fetch' => array(
						'title' => esc_html__('Related Portfolio Num Fetch', 'arki'),
						'type' => 'text',
						'default' => 4,
						'data-input-type' => 'number',
						'condition' => array('enable-related-portfolio'=>'enable')
					),
					'related-portfolio-thumbnail-size' => array(
						'title' => esc_html__('Related Portfolio Thumbnail Size', 'arki'),
						'type' => 'combobox',
						'options' => 'thumbnail-size',
						'condition' => array('enable-related-portfolio'=>'enable'),
						'default' => 'medium'
					),
					'related-portfolio-num-excerpt' => array(
						'title' => esc_html__('Related Portfolio Num Excerpt', 'arki'),
						'type' => 'text',
						'default' => 20,
						'data-input-type' => 'number',
						'condition' => array('enable-related-portfolio'=>'enable', 'related-portfolio-style'=>'grid')
					),
				)
			),

			'portfolio-archive' => array(
				'title' => esc_html__('Portfolio Archive', 'arki'),
				'options' => array(
					'archive-portfolio-sidebar' => array(
						'title' => esc_html__('Archive Portfolio Sidebar', 'arki'),
						'type' => 'radioimage',
						'options' => 'sidebar',
						'default' => 'none',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'archive-portfolio-sidebar-left' => array(
						'title' => esc_html__('Archive Portfolio Sidebar Left', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'archive-portfolio-sidebar'=>array('left', 'both') )
					),
					'archive-portfolio-sidebar-right' => array(
						'title' => esc_html__('Archive Portfolio Sidebar Right', 'arki'),
						'type' => 'combobox',
						'options' => 'sidebar',
						'default' => 'none',
						'condition' => array( 'archive-portfolio-sidebar'=>array('right', 'both') )
					),
					'archive-portfolio-style' => array(
						'title' => esc_html__('Archive Portfolio Style', 'arki'),
						'type' => 'radioimage',
						'options' => array(
							'modern' => get_template_directory_uri() . '/include/options/images/portfolio/modern.png',
							'modern-no-space' => get_template_directory_uri() . '/include/options/images/portfolio/modern-no-space.png',
							'grid' => get_template_directory_uri() . '/include/options/images/portfolio/grid.png',
							'grid-no-space' => get_template_directory_uri() . '/include/options/images/portfolio/grid-no-space.png',
							'modern-desc' => get_template_directory_uri() . '/include/options/images/portfolio/modern-desc.png',
							'modern-desc-no-space' => get_template_directory_uri() . '/include/options/images/portfolio/modern-desc-no-space.png',
							'medium' => get_template_directory_uri() . '/include/options/images/portfolio/medium.png',
						),
						'default' => 'medium',
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'archive-portfolio-thumbnail-size' => array(
						'title' => esc_html__('Archive Portfolio Thumbnail Size', 'arki'),
						'type' => 'combobox',
						'options' => 'thumbnail-size'
					),
					'archive-portfolio-grid-text-align' => array(
						'title' => esc_html__('Archive Portfolio Grid Text Align', 'arki'),
						'type' => 'radioimage',
						'options' => 'text-align',
						'default' => 'left',
						'condition' => array( 'archive-portfolio-style' => array( 'grid', 'grid-no-space' ) )
					),
					'archive-portfolio-grid-style' => array(
						'title' => esc_html__('Archive Portfolio Grid Content Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'normal' => esc_html__('Normal', 'arki'),
							'with-frame' => esc_html__('With Frame', 'arki'),
							'with-bottom-border' => esc_html__('With Bottom Border', 'arki'),
						),
						'default' => 'normal',
						'condition' => array( 'archive-portfolio-style' => array( 'grid', 'grid-no-space' ) )
					),
					'archive-enable-portfolio-tag' => array(
						'title' => esc_html__('Archive Enable Portfolio Tag', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'condition' => array( 'archive-portfolio-style' => array( 'grid', 'grid-no-space', 'modern-desc', 'modern-desc-no-space', 'medium' ) )
					),
					'archive-portfolio-medium-size' => array(
						'title' => esc_html__('Archive Portfolio Medium Thumbnail Size', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'small' => esc_html__('Small', 'arki'),
							'large' => esc_html__('Large', 'arki'),
						),
						'condition' => array( 'archive-portfolio-style' => 'medium' )
					),
					'archive-portfolio-medium-style' => array(
						'title' => esc_html__('Archive Portfolio Medium Thumbnail Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'left' => esc_html__('Left', 'arki'),
							'right' => esc_html__('Right', 'arki'),
							'switch' => esc_html__('Switch ( Between Left and Right )', 'arki'),
						),
						'default' => 'switch',
						'condition' => array( 'archive-portfolio-style' => 'medium' )
					),
					'archive-portfolio-hover' => array(
						'title' => esc_html__('Archive Portfolio Hover Style', 'arki'),
						'type' => 'radioimage',
						'options' => array(
							'title' => get_template_directory_uri() . '/include/options/images/portfolio/hover/title.png',
							'title-icon' => get_template_directory_uri() . '/include/options/images/portfolio/hover/title-icon.png',
							'title-tag' => get_template_directory_uri() . '/include/options/images/portfolio/hover/title-tag.png',
							'icon-title-tag' => get_template_directory_uri() . '/include/options/images/portfolio/hover/icon-title-tag.png',
							'icon' => get_template_directory_uri() . '/include/options/images/portfolio/hover/icon.png',
							'margin-title' => get_template_directory_uri() . '/include/options/images/portfolio/hover/margin-title.png',
							'margin-title-icon' => get_template_directory_uri() . '/include/options/images/portfolio/hover/margin-title-icon.png',
							'margin-title-tag' => get_template_directory_uri() . '/include/options/images/portfolio/hover/margin-title-tag.png',
							'margin-icon-title-tag' => get_template_directory_uri() . '/include/options/images/portfolio/hover/margin-icon-title-tag.png',
							'margin-icon' => get_template_directory_uri() . '/include/options/images/portfolio/hover/margin-icon.png',
							'none' => get_template_directory_uri() . '/include/options/images/portfolio/hover/none.png',
						),
						'default' => 'icon',
						'max-width' => '100px',
						'condition' => array( 'archive-portfolio-style' => array('modern', 'modern-no-space', 'grid', 'grid-no-space', 'medium') ),
						'wrapper-class' => 'gdlr-core-fullsize'
					),
					'archive-portfolio-column-size' => array(
						'title' => esc_html__('Archive Portfolio Column Size', 'arki'),
						'type' => 'combobox',
						'options' => array( 60=>1, 30=>2, 20=>3, 15=>4, 12=>5 ),
						'default' => 20,
						'condition' => array( 'archive-portfolio-style' => array('modern', 'modern-no-space', 'grid', 'grid-no-space', 'modern-desc', 'modern-desc-no-space') )
					),
					'archive-portfolio-excerpt' => array(
						'title' => esc_html__('Archive Portfolio Excerpt Type', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'specify-number' => esc_html__('Specify Number', 'arki'),
							'show-all' => esc_html__('Show All ( use <!--more--> tag to cut the content )', 'arki'),
							'none' => esc_html__('Disable Exceprt', 'arki'),
						),
						'default' => 'specify-number',
						'condition' => array( 'archive-portfolio-style' => array( 'grid', 'grid-no-space', 'modern-desc', 'modern-desc-no-space', 'medium' ) )
					),
					'archive-portfolio-excerpt-number' => array(
						'title' => esc_html__('Archive Portfolio Excerpt Number', 'arki'),
						'type' => 'text',
						'default' => 55,
						'data-input-type' => 'number',
						'condition' => array( 'archive-portfolio-style' => array( 'grid', 'grid-no-space', 'modern-desc', 'modern-desc-no-space', 'medium' ), 'archive-portfolio-excerpt' => 'specify-number' )
					),

				)
			),

			'personnel-style' => array(
				'title' => esc_html__('Personnel Style', 'arki'),
				'options' => array(
					'personnel-slug' => array(
						'title' => esc_html__('Personnel Slug (Permalink)', 'arki'),
						'type' => 'text',
						'default' => 'personnel',
						'description' => esc_html__('Please save the "Settings > Permalink" area once after made a changes to this field.', 'arki')
					),
					'personnel-category-slug' => array(
						'title' => esc_html__('Personnel Category Slug (Permalink)', 'arki'),
						'type' => 'text',
						'default' => 'personnel_category',
						'description' => esc_html__('Please save the "Settings > Permalink" area once after made a changes to this field.', 'arki')
					),
				)
			),

			'footer' => array(
				'title' => esc_html__('Footer/Copyright', 'arki'),
				'options' => array(

					'fixed-footer' => array(
						'title' => esc_html__('Fixed Footer', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
					'enable-footer' => array(
						'title' => esc_html__('Enable Footer', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'footer-background' => array(
						'title' => esc_html__('Footer Background', 'arki'),
						'type' => 'upload',
						'data-type' => 'file',
						'selector' => '.arki-footer-wrapper{ background-image: url(#gdlr#); background-size: cover; }',
						'condition' => array( 'enable-footer' => 'enable' )
					),
					'footer-title-divider' => array(
						'title' => esc_html__('Footer Title Divider', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
					'enable-footer-column-divider' => array(
						'title' => esc_html__('Enable Footer Column Divider', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable',
						'condition' => array( 'enable-footer' => 'enable' )
					),
					'footer-top-padding' => array(
						'title' => esc_html__('Footer Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '300',
						'data-type' => 'pixel',
						'default' => '70px',
						'selector' => '.arki-footer-wrapper{ padding-top: #gdlr#; }',
						'condition' => array( 'enable-footer' => 'enable' )
					),
					'footer-bottom-padding' => array(
						'title' => esc_html__('Footer Bottom Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '300',
						'data-type' => 'pixel',
						'default' => '50px',
						'selector' => '.arki-footer-wrapper{ padding-bottom: #gdlr#; }',
						'condition' => array( 'enable-footer' => 'enable' )
					),
					'footer-style' => array(
						'title' => esc_html__('Footer Style', 'arki'),
						'type' => 'radioimage',
						'wrapper-class' => 'gdlr-core-fullsize',
						'options' => array(
							'footer-1' => get_template_directory_uri() . '/include/options/images/footer-style1.png',
							'footer-2' => get_template_directory_uri() . '/include/options/images/footer-style2.png',
							'footer-3' => get_template_directory_uri() . '/include/options/images/footer-style3.png',
							'footer-4' => get_template_directory_uri() . '/include/options/images/footer-style4.png',
							'footer-5' => get_template_directory_uri() . '/include/options/images/footer-style5.png',
							'footer-6' => get_template_directory_uri() . '/include/options/images/footer-style6.png',
						),
						'default' => 'footer-2',
						'condition' => array( 'enable-footer' => 'enable' )
					),
					'enable-copyright' => array(
						'title' => esc_html__('Enable Copyright', 'arki'),
						'type' => 'checkbox',
						'default' => 'enable'
					),
					'copyright-style' => array(
						'title' => esc_html__('Copyright Style', 'arki'),
						'type' => 'combobox',
						'options' => array(
							'center' => esc_html__('Center', 'arki'),
							'left-right' => esc_html__('Left & Right', 'arki'),
						),
						'condition' => array( 'enable-copyright' => 'enable' )
					),
					'copyright-top-padding' => array(
						'title' => esc_html__('Copyright Top Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '300',
						'data-type' => 'pixel',
						'default' => '38px',
						'selector' => '.arki-copyright-container{ padding-top: #gdlr#; }',
						'condition' => array( 'enable-copyright' => 'enable' )
					),
					'copyright-bottom-padding' => array(
						'title' => esc_html__('Copyright Bottom Padding', 'arki'),
						'type' => 'fontslider',
						'data-min' => '0',
						'data-max' => '300',
						'data-type' => 'pixel',
						'default' => '38px',
						'selector' => '.arki-copyright-container{ padding-bottom: #gdlr#; }',
						'condition' => array( 'enable-copyright' => 'enable' )
					),	
					'copyright-text' => array(
						'title' => esc_html__('Copyright Text', 'arki'),
						'type' => 'textarea',
						'wrapper-class' => 'gdlr-core-fullsize',
						'condition' => array( 'enable-copyright' => 'enable', 'copyright-style' => 'center' )
					),
					'copyright-left' => array(
						'title' => esc_html__('Copyright Left', 'arki'),
						'type' => 'textarea',
						'wrapper-class' => 'gdlr-core-fullsize',
						'condition' => array( 'enable-copyright' => 'enable', 'copyright-style' => 'left-right' )
					),
					'copyright-right' => array(
						'title' => esc_html__('Copyright Right', 'arki'),
						'type' => 'textarea',
						'wrapper-class' => 'gdlr-core-fullsize',
						'condition' => array( 'enable-copyright' => 'enable', 'copyright-style' => 'left-right' )
					),
					'enable-back-to-top' => array(
						'title' => esc_html__('Enable Back To Top Button', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable'
					),
				) // footer-options
			), // footer-nav	
		
		) // general-options
		
	), 2);