<?php
	/* a template for displaying the header area */

	// header container
	$body_layout = arki_get_option('general', 'layout', 'full');
	$body_margin = arki_get_option('general', 'body-margin', '0px');
	$header_width = arki_get_option('general', 'header-width', 'boxed');
	$header_background_style = arki_get_option('general', 'header-background-style', 'solid');
	
	if( $header_width == 'boxed' ){
		$header_container_class = ' arki-container';
	}else if( $header_width == 'custom' ){
		$header_container_class = ' arki-header-custom-container';
	}else{
		$header_container_class = ' arki-header-full';
	}

	$header_style = arki_get_option('general', 'header-plain-style', 'menu-right');
	$navigation_offset = arki_get_option('general', 'fixed-navigation-anchor-offset', '');

	$header_wrap_class  = ' arki-style-' . $header_style;
	$header_wrap_class .= ' arki-sticky-navigation';
	if( $header_style == 'center-logo' || $body_layout == 'boxed' || 
		$body_margin != '0px' || $header_background_style == 'transparent' ){
		
		$header_wrap_class .= ' arki-style-slide';
	}else{
		$header_wrap_class .= ' arki-style-fixed';
	}
?>	
<header class="arki-header-wrap arki-header-style-plain <?php echo esc_attr($header_wrap_class); ?>" <?php
		if( !empty($navigation_offset) ){
			echo 'data-navigation-offset="' . esc_attr($navigation_offset) . '" ';
		}
	?> >
	<div class="arki-header-background" ></div>
	<div class="arki-header-container <?php echo esc_attr($header_container_class); ?>">
			
		<div class="arki-header-container-inner clearfix">
			<?php

				if( $header_style == 'splitted-menu' && has_nav_menu('main_menu') ){
					global $arki_center_nav_item;
					$arki_center_nav_item = arki_get_logo();
				}else{
					echo arki_get_logo();
				}

				$navigation_class = '';
				if( arki_get_option('general', 'enable-main-navigation-submenu-indicator', 'disable') == 'enable' ){
					$navigation_class = 'arki-navigation-submenu-indicator ';
				}
			?>
			<div class="arki-navigation arki-item-pdlr clearfix <?php echo esc_attr($navigation_class); ?>" >
			<?php
				$enable_search = (arki_get_option('general', 'enable-main-navigation-search', 'enable') == 'enable')? true: false;
				$enable_cart = (arki_get_option('general', 'enable-main-navigation-cart', 'enable') == 'enable' && class_exists('WooCommerce'))? true: false;

				// print main menu
				if( has_nav_menu('main_menu') ){
					echo '<div class="arki-main-menu" id="arki-main-menu" >';
					wp_nav_menu(array(
						'theme_location'=>'main_menu', 
						'container'=> '', 
						'menu_class'=> 'sf-menu',
						'walker' => new arki_menu_walker()
					));

					if( ($enable_search || $enable_cart) && $header_style == 'menu-left' ){
						
						if( $enable_search ){
							$search_icon = arki_get_option('general', 'main-navigation-search-icon', 'fa fa-search');
							echo '<div class="arki-main-menu-search" id="arki-top-search" >';
							echo '<i class="' . esc_attr($search_icon) . '" ></i>';
							echo '</div>';
							arki_get_top_search();

							$enable_search = false;
						}

						if( $enable_cart ){
							$cart_icon = arki_get_option('general', 'main-navigation-cart-icon', 'fa fa-shopping-cart');
							echo '<div class="arki-main-menu-cart" id="arki-menu-cart" >';
							echo '<i class="' . esc_attr($cart_icon) . '" data-arki-lb="top-bar" ></i>';
							arki_get_woocommerce_bar();
							echo '</div>';
						
							$enable_cart = false;
						}
						
					}
					
					arki_get_navigation_slide_bar();

					echo '</div>';
				}

				if( $header_style == 'splitted-menu' ){
					$arki_center_nav_item = '';
				}
				
				// menu right side
				$menu_right_class = '';
				if( in_array($header_style, array('center-menu', 'center-logo', 'splitted-menu')) ){
					$menu_right_class = ' arki-item-mglr arki-navigation-top';
				}

				$enable_right_button = (arki_get_option('general', 'enable-main-navigation-right-button', 'disable') == 'enable')? true: false;
				$custom_main_menu_right = apply_filters('arki_custom_main_menu_right', '');
				$side_content_menu = (arki_get_option('general', 'side-content-menu', 'disable') == 'enable')? true: false;
				if( has_nav_menu('right_menu') || $enable_search || $enable_cart || $enable_right_button || !empty($custom_main_menu_right) || $side_content_menu ){
					echo '<div class="arki-main-menu-right-wrap clearfix ' . esc_attr($menu_right_class) . '" >';

					// search icon
					if( $enable_search ){
						$search_icon = arki_get_option('general', 'main-navigation-search-icon', 'fa fa-search');
						echo '<div class="arki-main-menu-search" id="arki-top-search" >';
						echo '<i class="' . esc_attr($search_icon) . '" ></i>';
						echo '</div>';
						arki_get_top_search();
					}

					// cart icon
					if( $enable_cart ){
						$cart_icon = arki_get_option('general', 'main-navigation-cart-icon', 'fa fa-shopping-cart');
						echo '<div class="arki-main-menu-cart" id="arki-menu-cart" >';
						echo '<i class="' . esc_attr($cart_icon) . '" data-arki-lb="top-bar" ></i>';
						arki_get_woocommerce_bar();
						echo '</div>';
					}

					// menu right button
					if( $enable_right_button ){
						$button_class = 'arki-style-' . arki_get_option('general', 'main-navigation-right-button-style', 'default');
						$button_link = arki_get_option('general', 'main-navigation-right-button-link', '');
						$button_link_target = arki_get_option('general', 'main-navigation-right-button-link-target', '_self');
						if( !empty($button_link) ){
							echo '<a class="arki-main-menu-right-button arki-button-1 ' . esc_attr($button_class) . '" href="' . esc_url($button_link) . '" target="' . esc_attr($button_link_target) . '" >';
							echo arki_get_option('general', 'main-navigation-right-button-text', '');
							echo '</a>';
						}

						$button_class = 'arki-style-' . arki_get_option('general', 'main-navigation-right-button-style-2', 'default');
						$button_link = arki_get_option('general', 'main-navigation-right-button-link-2', '');
						$button_link_target = arki_get_option('general', 'main-navigation-right-button-link-target-2', '_self');
						if( !empty($button_link) ){
							echo '<a class="arki-main-menu-right-button arki-button-2 ' . esc_attr($button_class) . '" href="' . esc_url($button_link) . '" target="' . esc_attr($button_link_target) . '" >';
							echo arki_get_option('general', 'main-navigation-right-button-text-2', '');
							echo '</a>';
						}
					}

					// custom menu right
					if( !empty($custom_main_menu_right) ){
						echo gdlr_core_text_filter($custom_main_menu_right);
					}

					// print right menu
					if( has_nav_menu('right_menu') && $header_style != 'splitted-menu' ){
						arki_get_custom_menu(array(
							'container-class' => 'arki-main-menu-right',
							'button-class' => 'arki-right-menu-button arki-top-menu-button',
							'icon-class' => 'fa fa-bars',
							'id' => 'arki-right-menu',
							'theme-location' => 'right_menu',
							'type' => arki_get_option('general', 'right-menu-type', 'right')
						));
					}

					if( $side_content_menu ){
						$side_content_widget = arki_get_option('general', 'side-content-widget', '');
						if( is_active_sidebar($side_content_widget) ){ 
							echo '<div class="arki-side-content-menu-button" ><span></span></div>';
						}
					}
					echo '</div>'; // arki-main-menu-right-wrap

					if( has_nav_menu('right_menu') && $header_style == 'splitted-menu'  ){
						echo '<div class="arki-main-menu-left-wrap clearfix arki-item-pdlr arki-navigation-top" >';
						arki_get_custom_menu(array(
							'container-class' => 'arki-main-menu-right',
							'button-class' => 'arki-right-menu-button arki-top-menu-button',
							'icon-class' => 'fa fa-bars',
							'id' => 'arki-right-menu',
							'theme-location' => 'right_menu',
							'type' => arki_get_option('general', 'right-menu-type', 'right')
						));
						echo '</div>';
					}
				}
			?>
			</div><!-- arki-navigation -->

		</div><!-- arki-header-inner -->
	</div><!-- arki-header-container -->
</header><!-- header -->