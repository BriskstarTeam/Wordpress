<?php
/**
 * The template to show mobile menu
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_<?php echo esc_attr(happy_baby_get_theme_option('menu_mobile_fullscreen') > 0 ? 'fullscreen' : 'narrow'); ?> scheme_dark">
	<div class="menu_mobile_inner">
		<a class="menu_mobile_close icon-cancel"></a><?php

		// Logo
		set_query_var('happy_baby_logo_args', array('type' => 'inverse'));
		get_template_part( 'templates/header-logo' );
		set_query_var('happy_baby_logo_args', array());

		// Mobile menu
		$happy_baby_menu_mobile = happy_baby_get_nav_menu('menu_mobile');
		if (empty($happy_baby_menu_mobile)) {
			$happy_baby_menu_mobile = apply_filters('happy_baby_filter_get_mobile_menu', '');
			if (empty($happy_baby_menu_mobile)) $happy_baby_menu_mobile = happy_baby_get_nav_menu('menu_main');
			if (empty($happy_baby_menu_mobile)) $happy_baby_menu_mobile = happy_baby_get_nav_menu();
		}
		if (!empty($happy_baby_menu_mobile)) {
			if (!empty($happy_baby_menu_mobile))
				$happy_baby_menu_mobile = str_replace(
					array('menu_main', 'id="menu-', 'sc_layouts_menu_nav', 'sc_layouts_hide_on_mobile', 'hide_on_mobile'),
					array('menu_mobile', 'id="menu_mobile-', '', '', ''),
					$happy_baby_menu_mobile
					);
			if (strpos($happy_baby_menu_mobile, '<nav ')===false)
				$happy_baby_menu_mobile = sprintf('<nav class="menu_mobile_nav_area">%s</nav>', $happy_baby_menu_mobile);
			happy_baby_show_layout(apply_filters('happy_baby_filter_menu_mobile_layout', $happy_baby_menu_mobile));
		}

		// Search field
		do_action('happy_baby_action_search', 'normal', 'search_mobile', false);
		
		// Social icons
		happy_baby_show_layout(happy_baby_get_socials_links(), '<div class="socials_mobile">', '</div>');
		?>
	</div>
</div>
