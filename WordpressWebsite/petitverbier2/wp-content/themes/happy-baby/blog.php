<?php
/**
 * The template to display blog archive
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

/*
Template Name: Blog archive
*/

/**
 * Make page with this template and put it into menu
 * to display posts as blog archive
 * You can setup output parameters (blog style, posts per page, parent category, etc.)
 * in the Theme Options section (under the page content)
 * You can build this page in the WPBakery Page Builder to make custom page layout:
 * just insert %%CONTENT%% in the desired place of content
 */

// Get template page's content
$happy_baby_content = '';
$happy_baby_blog_archive_mask = '%%CONTENT%%';
$happy_baby_blog_archive_subst = sprintf('<div class="blog_archive">%s</div>', $happy_baby_blog_archive_mask);
if ( have_posts() ) {
	the_post(); 
	if (($happy_baby_content = apply_filters('the_content', get_the_content())) != '') {
		if (($happy_baby_pos = strpos($happy_baby_content, $happy_baby_blog_archive_mask)) !== false) {
			$happy_baby_content = preg_replace('/(\<p\>\s*)?'.$happy_baby_blog_archive_mask.'(\s*\<\/p\>)/i', $happy_baby_blog_archive_subst, $happy_baby_content);
		} else
			$happy_baby_content .= $happy_baby_blog_archive_subst;
		$happy_baby_content = explode($happy_baby_blog_archive_mask, $happy_baby_content);
		// Add VC custom styles to the inline CSS
		$vc_custom_css = get_post_meta( get_the_ID(), '_wpb_shortcodes_custom_css', true );
		if ( !empty( $vc_custom_css ) ) happy_baby_add_inline_css(strip_tags($vc_custom_css));
	}
}

// Prepare args for a new query
$happy_baby_args = array(
	'post_status' => current_user_can('read_private_pages') && current_user_can('read_private_posts') ? array('publish', 'private') : 'publish'
);
$happy_baby_args = happy_baby_query_add_posts_and_cats($happy_baby_args, '', happy_baby_get_theme_option('post_type'), happy_baby_get_theme_option('parent_cat'));
$happy_baby_page_number = get_query_var('paged') ? get_query_var('paged') : (get_query_var('page') ? get_query_var('page') : 1);
if ($happy_baby_page_number > 1) {
	$happy_baby_args['paged'] = $happy_baby_page_number;
	$happy_baby_args['ignore_sticky_posts'] = true;
}
$happy_baby_ppp = happy_baby_get_theme_option('posts_per_page');
if ((int) $happy_baby_ppp != 0)
	$happy_baby_args['posts_per_page'] = (int) $happy_baby_ppp;
// Make a new query
query_posts( $happy_baby_args );
// Set a new query as main WP Query
$GLOBALS['wp_the_query'] = $GLOBALS['wp_query'];

// Set query vars in the new query!
if (is_array($happy_baby_content) && count($happy_baby_content) == 2) {
	set_query_var('blog_archive_start', $happy_baby_content[0]);
	set_query_var('blog_archive_end', $happy_baby_content[1]);
}

get_template_part('index');
?>