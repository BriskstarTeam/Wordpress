<?php
/**
 * The Portfolio template to display the content
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

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_portfolio post_layout_portfolio_'.esc_attr($happy_baby_columns).' post_format_'.esc_attr($happy_baby_post_format).(is_sticky() && !is_paged() ? ' sticky' : '') ); ?>
	<?php echo (!happy_baby_is_off($happy_baby_animation) ? ' data-animation="'.esc_attr(happy_baby_get_animation_classes($happy_baby_animation)).'"' : ''); ?>>
	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	$happy_baby_image_hover = happy_baby_get_theme_option('image_hover');
	// Featured image
	happy_baby_show_post_featured(array(
		'thumb_size' => happy_baby_get_thumb_size(strpos(happy_baby_get_theme_option('body_style'), 'full')!==false || $happy_baby_columns < 3 ? 'masonry-big' : 'masonry'),
		'show_no_image' => true,
		'class' => $happy_baby_image_hover == 'dots' ? 'hover_with_info' : '',
		'post_info' => $happy_baby_image_hover == 'dots' ? '<div class="post_info">'.esc_html(get_the_title()).'</div>' : ''
	));
	?>
</article>