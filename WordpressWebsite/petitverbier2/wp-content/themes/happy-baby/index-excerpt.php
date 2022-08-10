<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

happy_baby_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	?><div class="posts_container"><?php
	
	$happy_baby_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$happy_baby_sticky_out = happy_baby_get_theme_option('sticky_style')=='columns' 
							&& is_array($happy_baby_stickies) && count($happy_baby_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($happy_baby_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	while ( have_posts() ) { the_post(); 
		if ($happy_baby_sticky_out && !is_sticky()) {
			$happy_baby_sticky_out = false;
			?></div><?php
		}
		get_template_part( 'content', $happy_baby_sticky_out && is_sticky() ? 'sticky' : 'excerpt' );
	}
	if ($happy_baby_sticky_out) {
		$happy_baby_sticky_out = false;
		?></div><?php
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