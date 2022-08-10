<?php
	// mobile menu template
	echo '<div class="arki-mobile-header-wrap" >';

	// top bar
	$top_bar = arki_get_option('general', 'enable-top-bar-on-mobile', 'disable');
	if( $top_bar == 'enable' ){
		get_template_part('header/header', 'top-bar');
	}

	// header
	$logo_position = arki_get_option('general', 'mobile-logo-position', 'logo-left');
	$sticky_mobile_nav = arki_get_option('general', 'enable-mobile-navigation-sticky', 'enable');
	echo '<div class="arki-mobile-header arki-header-background arki-style-slide ';
	if($sticky_mobile_nav == 'enable'){
		echo 'arki-sticky-mobile-navigation ';
	}
	echo '" id="arki-mobile-header" >';
	echo '<div class="arki-mobile-header-container arki-container clearfix" >';
	echo arki_get_logo(array(
		'mobile' => true,
		'wrapper-class' => ($logo_position == 'logo-center'? 'arki-mobile-logo-center': '')
	));

	echo '<div class="arki-mobile-menu-right" >';

	// search icon
	$enable_search = (arki_get_option('general', 'enable-main-navigation-search', 'enable') == 'enable')? true: false;
	if( $enable_search ){
		echo '<div class="arki-main-menu-search" id="arki-mobile-top-search" >';
		echo '<i class="fa fa-search" ></i>';
		echo '</div>';
		arki_get_top_search();
	}

	// cart icon
	$enable_cart = (arki_get_option('general', 'enable-main-navigation-cart', 'enable') == 'enable' && class_exists('WooCommerce'))? true: false;
	if( $enable_cart ){
		echo '<div class="arki-main-menu-cart" id="arki-mobile-menu-cart" >';
		echo '<i class="fa fa-shopping-cart" data-arki-lb="top-bar" ></i>';
		arki_get_woocommerce_bar();
		echo '</div>';
	}

	if( $logo_position == 'logo-center' ){
		echo '</div>';
		echo '<div class="arki-mobile-menu-left" >';
	}

	// mobile menu
	if( has_nav_menu('mobile_menu') ){
		arki_get_custom_menu(array(
			'type' => arki_get_option('general', 'right-menu-type', 'right'),
			'container-class' => 'arki-mobile-menu',
			'button-class' => 'arki-mobile-menu-button',
			'icon-class' => 'fa fa-bars',
			'id' => 'arki-mobile-menu',
			'theme-location' => 'mobile_menu'
		));
	}
	echo '</div>'; // arki-mobile-menu-right/left
	echo '</div>'; // arki-mobile-header-container
	echo '</div>'; // arki-mobile-header

	echo '</div>'; // arki-mobile-header-wrap