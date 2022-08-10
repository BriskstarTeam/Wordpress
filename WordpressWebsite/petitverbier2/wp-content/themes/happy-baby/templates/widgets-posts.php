<?php
/**
 * The template to display posts in widgets and/or in the search results
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

$happy_baby_post_id    = get_the_ID();
$happy_baby_post_date  = happy_baby_get_date();
$happy_baby_post_title = get_the_title();
$happy_baby_post_link  = get_permalink();
$happy_baby_post_author_id   = get_the_author_meta('ID');
$happy_baby_post_author_name = get_the_author_meta('display_name');
$happy_baby_post_author_url  = get_author_posts_url($happy_baby_post_author_id, '');

$happy_baby_args = get_query_var('happy_baby_args_widgets_posts');
$happy_baby_show_date = isset($happy_baby_args['show_date']) ? (int) $happy_baby_args['show_date'] : 1;
$happy_baby_show_image = isset($happy_baby_args['show_image']) ? (int) $happy_baby_args['show_image'] : 1;
$happy_baby_show_author = isset($happy_baby_args['show_author']) ? (int) $happy_baby_args['show_author'] : 1;
$happy_baby_show_counters = isset($happy_baby_args['show_counters']) ? (int) $happy_baby_args['show_counters'] : 1;
$happy_baby_show_categories = isset($happy_baby_args['show_categories']) ? (int) $happy_baby_args['show_categories'] : 1;

$happy_baby_output = happy_baby_storage_get('happy_baby_output_widgets_posts');

$happy_baby_post_counters_output = '';
if ( $happy_baby_show_counters ) {
	$happy_baby_post_counters_output = '<span class="post_info_item post_info_counters">'
								. happy_baby_get_post_counters('comments')
							. '</span>';
}


$happy_baby_output .= '<article class="post_item with_thumb">';

if ($happy_baby_show_image) {
	$happy_baby_post_thumb = get_the_post_thumbnail($happy_baby_post_id, happy_baby_get_thumb_size('tiny'), array(
		'alt' => the_title_attribute( array( 'echo' => false ) )
	));
	if ($happy_baby_post_thumb) $happy_baby_output .= '<div class="post_thumb">' . ($happy_baby_post_link ? '<a href="' . esc_url($happy_baby_post_link) . '">' : '') . ($happy_baby_post_thumb) . ($happy_baby_post_link ? '</a>' : '') . '</div>';
}

$happy_baby_output .= '<div class="post_content">'
			. ($happy_baby_show_categories 
					? '<div class="post_categories">'
						. happy_baby_get_post_categories()
						. $happy_baby_post_counters_output
						. '</div>' 
					: '')
			. '<h6 class="post_title">' . ($happy_baby_post_link ? '<a href="' . esc_url($happy_baby_post_link) . '">' : '') . ($happy_baby_post_title) . ($happy_baby_post_link ? '</a>' : '') . '</h6>'
			. apply_filters('happy_baby_filter_get_post_info', 
								'<div class="post_info">'
									. ($happy_baby_show_date 
										? '<span class="post_info_item post_info_posted">'
											. ($happy_baby_post_link ? '<a href="' . esc_url($happy_baby_post_link) . '" class="post_info_date">' : '') 
											. esc_html($happy_baby_post_date) 
											. ($happy_baby_post_link ? '</a>' : '')
											. '</span>'
										: '')
									. ($happy_baby_show_author 
										? '<span class="post_info_item post_info_posted_by">' 
											. esc_html__('by', 'happy-baby') . ' ' 
											. ($happy_baby_post_link ? '<a href="' . esc_url($happy_baby_post_author_url) . '" class="post_info_author">' : '') 
											. esc_html($happy_baby_post_author_name) 
											. ($happy_baby_post_link ? '</a>' : '') 
											. '</span>'
										: '')
									. (!$happy_baby_show_categories && $happy_baby_post_counters_output
										? $happy_baby_post_counters_output
										: '')
								. '</div>')
		. '</div>'
	. '</article>';
happy_baby_storage_set('happy_baby_output_widgets_posts', $happy_baby_output);
?>