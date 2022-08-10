<?php
/**
 * The template to display the featured image in the single post
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

if ( get_query_var('happy_baby_header_image')=='' && is_singular() && has_post_thumbnail() && in_array(get_post_type(), array('post', 'page')) )  {
	$happy_baby_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
	if (!empty($happy_baby_src[0])) {
		happy_baby_sc_layouts_showed('featured', true);
		?><div class="sc_layouts_featured with_image <?php echo esc_attr(happy_baby_add_inline_css_class('background-image:url('.esc_url($happy_baby_src[0]).');')); ?>"></div><?php
	}
}
?>