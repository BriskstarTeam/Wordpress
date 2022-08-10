<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

$happy_baby_blog_style = explode('_', happy_baby_get_theme_option('blog_style'));
$happy_baby_columns = empty($happy_baby_blog_style[1]) ? 2 : max(2, $happy_baby_blog_style[1]);
$happy_baby_expanded = !happy_baby_sidebar_present() && happy_baby_is_on(happy_baby_get_theme_option('expand_content'));
$happy_baby_post_format = get_post_format();
$happy_baby_post_format = empty($happy_baby_post_format) ? 'standard' : str_replace('post-format-', '', $happy_baby_post_format);
$happy_baby_animation = happy_baby_get_theme_option('blog_animation');
$happy_baby_components = happy_baby_is_inherit(happy_baby_get_theme_option_from_meta('meta_parts')) 
							? 'categories,date,counters'.($happy_baby_columns < 3 ? ',edit' : '')
							: happy_baby_array_get_keys_by_value(happy_baby_get_theme_option('meta_parts'));
$happy_baby_counters = happy_baby_is_inherit(happy_baby_get_theme_option_from_meta('counters')) 
							? 'comments'
							: happy_baby_array_get_keys_by_value(happy_baby_get_theme_option('counters'));

?><div class="<?php echo esc_attr($happy_baby_blog_style[0] == 'classic' ? 'column' : 'masonry_item masonry_item'); ?>-1_<?php echo esc_attr($happy_baby_columns); ?>"><article id="post-<?php the_ID(); ?>"
	<?php post_class( 'post_item post_format_'.esc_attr($happy_baby_post_format)
					. ' post_layout_classic post_layout_classic_'.esc_attr($happy_baby_columns)
					. ' post_layout_'.esc_attr($happy_baby_blog_style[0]) 
					. ' post_layout_'.esc_attr($happy_baby_blog_style[0]).'_'.esc_attr($happy_baby_columns)
					); ?>
	<?php echo (!happy_baby_is_off($happy_baby_animation) ? ' data-animation="'.esc_attr(happy_baby_get_animation_classes($happy_baby_animation)).'"' : ''); ?>>
	<?php

	// Sticky label
	if ( is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	happy_baby_show_post_featured( array( 'thumb_size' => happy_baby_get_thumb_size($happy_baby_blog_style[0] == 'classic'
													? (strpos(happy_baby_get_theme_option('body_style'), 'full')!==false 
															? ( $happy_baby_columns > 2 ? 'big' : 'huge' )
															: (	$happy_baby_columns > 2
																? ($happy_baby_expanded ? 'med' : 'small')
																: ($happy_baby_expanded ? 'big' : 'med')
																)
														)
													: (strpos(happy_baby_get_theme_option('body_style'), 'full')!==false 
															? ( $happy_baby_columns > 2 ? 'masonry-big' : 'full' )
															: (	$happy_baby_columns <= 2 && $happy_baby_expanded ? 'masonry-big' : 'masonry')
														)
								) ) );

	if ( !in_array($happy_baby_post_format, array('link', 'aside', 'status', 'quote')) ) {
		?>
		<div class="post_header entry-header">
			<?php 
			do_action('happy_baby_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h4 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' );

			do_action('happy_baby_action_before_post_meta'); 

			// Post meta
			if (!empty($happy_baby_components))
				happy_baby_show_post_meta(apply_filters('happy_baby_filter_post_meta_args', array(
					'components' => $happy_baby_components,
					'counters' => $happy_baby_counters,
					'seo' => false
					), $happy_baby_blog_style[0], $happy_baby_columns)
				);

			do_action('happy_baby_action_after_post_meta'); 
			?>
		</div><!-- .entry-header -->
		<?php
	}		
	?>

	<div class="post_content entry-content">
		<div class="post_content_inner">
			<?php
			$happy_baby_show_learn_more = false;
			if (has_excerpt()) {
				the_excerpt();
			} else if (strpos(get_the_content('!--more'), '!--more')!==false) {
				the_content( '' );
			} else if (in_array($happy_baby_post_format, array('link', 'aside', 'status'))) {
				the_content();
			} else if ($happy_baby_post_format == 'quote') {
				if (($quote = happy_baby_get_tag(get_the_content(), '<blockquote>', '</blockquote>'))!='')
					happy_baby_show_layout(wpautop($quote));
				else
					the_excerpt();
			} else if (substr(get_the_content(), 0, 1)!='[') {
				the_excerpt();
			}
			?>
		</div>
		<?php
		// Post meta
		if (in_array($happy_baby_post_format, array('link', 'aside', 'status', 'quote'))) {
			if (!empty($happy_baby_components))
				happy_baby_show_post_meta(apply_filters('happy_baby_filter_post_meta_args', array(
					'components' => $happy_baby_components,
					'counters' => $happy_baby_counters
					), $happy_baby_blog_style[0], $happy_baby_columns)
				);
		}
		// More button
		if ( $happy_baby_show_learn_more ) {
			?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'happy-baby'); ?></a></p><?php
		}
		?>
	</div><!-- .entry-content -->

</article></div>