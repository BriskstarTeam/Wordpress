<?php
/**
 * The Sticky template to display the sticky posts
 *
 * Used for index/archive
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

$happy_baby_columns = max(1, min(3, count(get_option( 'sticky_posts' ))));
$happy_baby_post_format = get_post_format();
$happy_baby_post_format = empty($happy_baby_post_format) ? 'standard' : str_replace('post-format-', '', $happy_baby_post_format);
$happy_baby_animation = happy_baby_get_theme_option('blog_animation');

?><div class="column-1_<?php echo esc_attr($happy_baby_columns); ?>"><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_sticky post_format_'.esc_attr($happy_baby_post_format) ); ?>
	<?php echo (!happy_baby_is_off($happy_baby_animation) ? ' data-animation="'.esc_attr(happy_baby_get_animation_classes($happy_baby_animation)).'"' : ''); ?>
	>

	<?php
	if ( is_sticky() && is_home() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	happy_baby_show_post_featured(array(
		'thumb_size' => happy_baby_get_thumb_size($happy_baby_columns==1 ? 'big' : ($happy_baby_columns==2 ? 'med' : 'avatar'))
	));

	if ( !in_array($happy_baby_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php
			// Post title
			the_title( sprintf( '<h6 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
			// Post meta
			happy_baby_show_post_meta(apply_filters('happy_baby_filter_post_meta_args', array(), 'sticky', $happy_baby_columns));
			?>
		</div><!-- .entry-header -->
		<?php
	}
	?>
</article></div>