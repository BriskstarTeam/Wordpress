<?php
	/* a template for displaying the header area */
?>	
<header class="arki-header-wrap arki-header-style-side-toggle" >
	<?php
		$display_logo = arki_get_option('general', 'header-side-toggle-display-logo', 'enable');
		if( $display_logo == 'enable' ){
			echo arki_get_logo(array('padding' => false));
		}

		$navigation_class = '';
		if( arki_get_option('general', 'enable-main-navigation-submenu-indicator', 'disable') == 'enable' ){
			$navigation_class = 'arki-navigation-submenu-indicator ';
		}
	?>
	<div class="arki-navigation clearfix <?php echo esc_attr($navigation_class); ?>" >
	<?php
		// print main menu
		if( has_nav_menu('main_menu') ){
			arki_get_custom_menu(array(
				'container-class' => 'arki-main-menu',
				'button-class' => 'arki-side-menu-icon',
				'icon-class' => 'fa fa-bars',
				'id' => 'arki-main-menu',
				'theme-location' => 'main_menu',
				'type' => arki_get_option('general', 'header-side-toggle-menu-type', 'overlay')
			));
		}
	?>
	</div><!-- arki-navigation -->
	<?php

		// menu right side
		$enable_search = (arki_get_option('general', 'enable-main-navigation-search', 'enable') == 'enable')? true: false;
		$enable_cart = (arki_get_option('general', 'enable-main-navigation-cart', 'enable') == 'enable' && class_exists('WooCommerce'))? true: false;
		if( $enable_search || $enable_cart ){ 
			echo '<div class="arki-header-icon arki-pos-bottom" >';

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
</header><!-- header -->