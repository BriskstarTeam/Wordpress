<?php
/**
 * The Gallery template to display posts
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

$happy_baby_blog_style = explode('_', happy_baby_get_theme_option('blog_style'));
$happy_baby_columns = empty($happy_baby_blog_style[1]) ? 2 : max(2, $happy_baby_blog_style[1]);
$happy_baby_post_format = get_post_format();
$happy_baby_post_format = empty($happy_baby_post_format) ? 'standard' : str_replace('post-format-', '', $happy_baby_post_format);
$happy_baby_animation = happy_baby_get_theme_option('blog_animation');
$happy_baby_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_gallery post_layout_gallery_'.esc_attr($happy_baby_columns).' post_format_'.esc_attr($happy_baby_post_format) ); ?>
	<?php echo (!happy_baby_is_off($happy_baby_animation) ? ' data-animation="'.esc_attr(happy_baby_get_animation_classes($happy_baby_animation)).'"' : ''); ?>
	data-size="<?php if (!empty($happy_baby_image[1]) && !empty($happy_baby_image[2])) echo intval($happy_baby_image[1]) .'x' . intval($happy_baby_image[2]); ?>"
	data-src="<?php if (!empty($happy_baby_image[0])) echo esc_url($happy_baby_image[0]); ?>"
	>

	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	$happy_baby_image_hover = 'icon';
	if (in_array($happy_baby_image_hover, array('icons', 'zoom'))) $happy_baby_image_hover = 'dots';
	$happy_baby_components = happy_baby_is_inherit(happy_baby_get_theme_option_from_meta('meta_parts')) 
								? 'categories,date,counters,share'
								: happy_baby_array_get_keys_by_value(happy_baby_get_theme_option('meta_parts'));
	$happy_baby_counters = happy_baby_is_inherit(happy_baby_get_theme_option_from_meta('counters')) 
								? 'comments'
								: happy_baby_array_get_keys_by_value(happy_baby_get_theme_option('counters'));
	happy_baby_show_post_featured(array(
		'hover' => $happy_baby_image_hover,
		'thumb_size' => happy_baby_get_thumb_size( strpos(happy_baby_get_theme_option('body_style'), 'full')!==false || $happy_baby_columns < 3 ? 'masonry-big' : 'masonry' ),
		'thumb_only' => true,
		'show_no_image' => true,
		'post_info' => '<div class="post_details">'
							. '<h2 class="post_title"><a href="'.esc_url(get_permalink()).'">'. esc_html(get_the_title()) . '</a></h2>'
							. '<div class="post_description">'
								. (!empty($happy_baby_components)
										? happy_baby_show_post_meta(apply_filters('happy_baby_filter_post_meta_args', array(
											'components' => $happy_baby_components,
											'counters' => $happy_baby_counters,
											'seo' => false,
											'echo' => false
											), $happy_baby_blog_style[0], $happy_baby_columns))
										: '')
								. '<div class="post_description_content">'
									. apply_filters('the_excerpt', get_the_excerpt())
								. '</div>'
								. '<a href="'.esc_url(get_permalink()).'" class="theme_button post_readmore"><span class="post_readmore_label">' . esc_html__('Learn more', 'happy-baby') . '</span></a>'
							. '</div>'
						. '</div>'
	));
	?>
</article>