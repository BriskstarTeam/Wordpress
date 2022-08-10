<?php
/**
 * The template for homepage posts with "Classic" style
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

happy_baby_storage_set('blog_archive', true);

// Load scripts for 'Masonry' layout
if (substr(happy_baby_get_theme_option('blog_style'), 0, 7) == 'masonry') {
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'classie', happy_baby_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
	wp_enqueue_script( 'happy-baby-gallery-script', happy_baby_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );
}

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$happy_baby_classes = 'posts_container '
						. (substr(happy_baby_get_theme_option('blog_style'), 0, 7) == 'classic' ? 'columns_wrap columns_padding_bottom' : 'masonry_wrap');
	$happy_baby_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$happy_baby_sticky_out = happy_baby_get_theme_option('sticky_style')=='columns' 
							&& is_array($happy_baby_stickies) && count($happy_baby_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($happy_baby_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	if (!$happy_baby_sticky_out) {
		if (happy_baby_get_theme_option('first_post_large') && !is_paged() && !in_array(happy_baby_get_theme_option('body_style'), array('fullwide', 'fullscreen'))) {
			the_post();
			get_template_part( 'content', 'excerpt' );
		}
		
		?><div class="<?php echo esc_attr($happy_baby_classes); ?>"><?php
	}
	while ( have_posts() ) { the_post(); 
		if ($happy_baby_sticky_out && !is_sticky()) {
			$happy_baby_sticky_out = false;
			?></div><div class="<?php echo esc_attr($happy_baby_classes); ?>"><?php
		}
		get_template_part( 'content', $happy_baby_sticky_out && is_sticky() ? 'sticky' : 'classic' );
	}
	
	?></div><?php

	happy_baby_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>