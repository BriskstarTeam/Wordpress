<?php
/**
 * The template part for displaying single post title
 */

	$blog_date = arki_get_option('general', 'blog-date-feature', '');
	$blog_style = arki_get_option('general', 'blog-style', 'style-1');
	$blog_title_style = arki_get_option('general', 'blog-title-style', '');
	if( empty($blog_title_style) ){
		if( in_array($blog_style, array('style-3', 'magazine')) ){
			$blog_title_style = 'style-1';
		}else{
			$blog_title_style = $blog_style;
		}
	}

	$blog_info_atts = array( 'wrapper' => true );
	$blog_info_atts['display'] = arki_get_option('general', 'meta-option', '');
	if( empty($blog_date) && empty($blog_info_atts['display']) ){
		$blog_info_atts['display'] = array('author', 'category', 'tag', 'comment-number');
	}

	echo '<header class="arki-single-article-head arki-single-blog-title-' . esc_attr($blog_title_style) . ' clearfix" >';
	if( $blog_title_style == 'style-1' && (empty($blog_date) || $blog_date == 'enable') ){
		echo '<div class="arki-single-article-date-wrapper  post-date updated">';
		echo '<div class="arki-single-article-date-day">' .  get_the_time('d') . '</div>';
		echo '<div class="arki-single-article-date-month">' . get_the_time('M') . '</div>';

		$blog_date_year = arki_get_option('general', 'blog-date-feature-year', '');
		if( !empty($blog_date_year) && $blog_date_year == 'enable' ){
			echo '<div class="arki-single-article-date-year">' . get_the_time('Y') . '</div>';
		} 
		echo '</div>';
	}else if( $blog_title_style == 'style-2'){
		$blog_info_atts['separator'] = '•';
		echo arki_get_blog_info($blog_info_atts);
	}

	echo '<div class="arki-single-article-head-right">';
	if( is_single() ){
		echo '<h1 class="arki-single-article-title">' . get_the_title() . '</h1>';
	}else{
		echo '<h3 class="arki-single-article-title"><a href="' . get_permalink() . '" >' . get_the_title() . '</a></h3>';
	}

	if( $blog_title_style == 'style-1' ){
		echo arki_get_blog_info($blog_info_atts);
	}else if( $blog_title_style == 'style-4' ){
		$blog_info_atts['separator'] = '•';
		echo arki_get_blog_info($blog_info_atts);
	}
	echo '</div>';
	echo '</header>';