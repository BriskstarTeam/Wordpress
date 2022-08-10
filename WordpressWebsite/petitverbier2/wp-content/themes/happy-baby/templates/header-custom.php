<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.06
 */

$happy_baby_header_css = $happy_baby_header_image = '';
$happy_baby_header_video = happy_baby_get_header_video();
if (true || empty($happy_baby_header_video)) {
	$happy_baby_header_image = get_header_image();
	if (happy_baby_is_on(happy_baby_get_theme_option('header_image_override')) && apply_filters('happy_baby_filter_allow_override_header_image', true)) {
		if (is_category()) {
			if (($happy_baby_cat_img = happy_baby_get_category_image()) != '')
				$happy_baby_header_image = $happy_baby_cat_img;
		} else if (is_singular() || happy_baby_storage_isset('blog_archive')) {
			if (has_post_thumbnail()) {
				$happy_baby_header_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				if (is_array($happy_baby_header_image)) $happy_baby_header_image = $happy_baby_header_image[0];
			} else
				$happy_baby_header_image = '';
		}
	}
}

$happy_baby_header_id = str_replace('header-custom-', '', happy_baby_get_theme_option("header_style"));
$happy_baby_header_meta = get_post_meta($happy_baby_header_id, 'trx_addons_options', true);

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr($happy_baby_header_id); 
						?> top_panel_custom_<?php echo esc_attr(sanitize_title(get_the_title($happy_baby_header_id)));
						echo !empty($happy_baby_header_image) || !empty($happy_baby_header_video) 
							? ' with_bg_image' 
							: ' without_bg_image';
						if ($happy_baby_header_video!='') 
							echo ' with_bg_video';
						if ($happy_baby_header_image!='') 
							echo ' '.esc_attr(happy_baby_add_inline_css_class('background-image: url('.esc_url($happy_baby_header_image).');'));
						if (!empty($happy_baby_header_meta['margin']) != '') 
							echo ' '.esc_attr(happy_baby_add_inline_css_class('margin-bottom: '.esc_attr(happy_baby_prepare_css_value($happy_baby_header_meta['margin'])).';'));
						if (is_single() && has_post_thumbnail()) 
							echo ' with_featured_image';
						if (happy_baby_is_on(happy_baby_get_theme_option('header_fullheight'))) 
							echo ' header_fullheight trx-stretch-height';
						?> scheme_<?php echo esc_attr(happy_baby_is_inherit(happy_baby_get_theme_option('header_scheme')) 
														? happy_baby_get_theme_option('color_scheme') 
														: happy_baby_get_theme_option('header_scheme'));
						?>"><?php

	// Background video
	if (!empty($happy_baby_header_video)) {
		get_template_part( 'templates/header-video' );
	}
		
	// Custom header's layout
	do_action('happy_baby_action_show_layout', $happy_baby_header_id);

	// Header widgets area
	get_template_part( 'templates/header-widgets' );
		
?></header>