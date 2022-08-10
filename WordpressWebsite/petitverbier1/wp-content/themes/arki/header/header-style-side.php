<?php
	/* a template for displaying the header area */

	$header_side_style = arki_get_option('general', 'header-side-style', 'top-left');
	$header_class = 'arki-' . arki_get_option('general', 'header-side-align', 'left') . '-align';
?>	
<header class="arki-header-wrap arki-header-style-side <?php echo esc_attr($header_class); ?>" >
	<?php

		$logo_wrap_class = '';
		$navigation_class = '';
		if( arki_get_option('general', 'enable-main-navigation-submenu-indicator', 'disable') == 'enable' ){
			$navigation_class .= 'arki-navigation-submenu-indicator ';
		}
		if( in_array($header_side_style, array('middle-left-2', 'middle-right-2')) ){
			$logo_wrap_class .= 'arki-pos-middle ';
		}else if( in_array($header_side_style, array('middle-left', 'middle-right')) ){
			$navigation_class .= 'arki-pos-middle ';
		} 

		echo arki_get_logo(array('padding' => false, 'wrapper-class' => $logo_wrap_class));
	?>
	<div class="arki-navigation clearfix <?php echo esc_attr($navigation_class); ?>" >
	<?php
		// print main menu
		if( has_nav_menu('main_menu') ){
			echo '<div class="arki-main-menu" id="arki-main-menu" >';
			wp_nav_menu(array(
				'theme_location'=>'main_menu', 
				'container'=> '', 
				'menu_class'=> 'sf-vertical'
			));
			echo '</div>';
		}

		// menu right side
		$enable_search = (arki_get_option('general', 'enable-main-navigation-search', 'enable') == 'enable')? true: false;
		$enable_cart = (arki_get_option('general', 'enable-main-navigation-cart', 'enable') == 'enable' && class_exists('WooCommerce'))? true: false;
		if( $enable_search || $enable_cart ){
			echo '<div class="arki-main-menu-right-wrap clearfix" >';

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
				echo '<div class="arki-main-menu-cart" id="arki-main-menu-cart" >';
				echo '<i class="' . esc_attr($cart_icon) . '" data-arki-lb="top-bar" ></i>';
				arki_get_woocommerce_bar();
				echo '</div>';
			}

			echo '</div>'; // arki-main-menu-right-wrap
		}
	?>
	</div><!-- arki-navigation -->
	<?php
		// social network
		$top_bar_social = arki_get_option('general', 'enable-top-bar-social', 'enable');
		if( $top_bar_social == 'enable' ){

			$top_bar_social_class = '';
			if( in_array($header_side_style, array('top-left', 'top-right', 'middle-left', 'middle-right')) ){
				$top_bar_social_class .= 'arki-pos-bottom ';
			}

			echo '<div class="arki-header-social ' . esc_attr($top_bar_social_class) . '" >';
			get_template_part('header/header', 'social');
			echo '</div>';
			
			arki_set_option('general', 'enable-top-bar-social', 'disable');
		}
	?>
</header><!-- header -->