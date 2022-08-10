<?php
/**
 * The default template to display the content
 *
 * Used for index/archive/search.
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

$happy_baby_post_format = get_post_format();
$happy_baby_post_format = empty($happy_baby_post_format) ? 'standard' : str_replace('post-format-', '', $happy_baby_post_format);
$happy_baby_animation = happy_baby_get_theme_option('blog_animation');

?><article id="post-<?php the_ID(); ?>" 
	<?php post_class( 'post_item post_layout_excerpt post_format_'.esc_attr($happy_baby_post_format) ); ?>
	<?php echo (!happy_baby_is_off($happy_baby_animation) ? ' data-animation="'.esc_attr(happy_baby_get_animation_classes($happy_baby_animation)).'"' : ''); ?>
	><?php

	// Sticky label
	if ( false && is_sticky() && !is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}
	?>


	<div class="info_post_short">
		<?php
		$dt = get_the_date('d M');
		if (!empty($dt)) {	?>
			<span class="post_date"><?php echo esc_html($dt); ?></span>
		<?php
		}
		if (!is_singular() || have_comments() || comments_open()) {
			$post_comments = get_comments_number();
			echo '<span class="post_comments">'	. trim($post_comments) . '</span>';
		}
		?>
	</div>



	<?php
	// Title and post meta
	if (get_the_title() != '') {
		?>
		<div class="post_header entry-header">
			<?php
			do_action('happy_baby_action_before_post_title'); 

			// Post title
			the_title( sprintf( '<h2 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );

			do_action('happy_baby_action_before_post_meta'); 

			// Post meta
			$happy_baby_components = happy_baby_is_inherit(happy_baby_get_theme_option_from_meta('meta_parts')) 
										? 'categories,date,counters,edit'
										: happy_baby_array_get_keys_by_value(happy_baby_get_theme_option('meta_parts'));
			$happy_baby_counters = happy_baby_is_inherit(happy_baby_get_theme_option_from_meta('counters')) 
										? 'views,likes,comments'
										: happy_baby_array_get_keys_by_value(happy_baby_get_theme_option('counters'));

			if (!empty($happy_baby_components))
				happy_baby_show_post_meta(apply_filters('happy_baby_filter_post_meta_args', array(
					'components' => $happy_baby_components,
					'counters' => $happy_baby_counters,
					'seo' => false
					), 'excerpt', 1)
				);
			?>
		</div><!-- .post_header --><?php
	}

	// Featured image
	happy_baby_show_post_featured(array( 'thumb_size' => happy_baby_get_thumb_size( strpos(happy_baby_get_theme_option('body_style'), 'full')!==false ? 'full' : 'big' ) ));

	// Post content
	?><div class="post_content entry-content"><?php
		if (happy_baby_get_theme_option('blog_content') == 'fullpost') {
			// Post content area
			?><div class="post_content_inner"><?php
				the_content( '' );
			?></div><?php
			// Inner pages
			wp_link_pages( array(
				'before'      => '<div class="page_links"><span class="page_links_title">' . esc_html__( 'Pages:', 'happy-baby' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'happy-baby' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

		} else {

			$happy_baby_show_learn_more = !in_array($happy_baby_post_format, array('link', 'aside', 'status', 'quote'));

			// Post content area
			?><div class="post_content_inner"><?php
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
			?></div><?php
			// More button
			if ( $happy_baby_show_learn_more ) {
				?><p><a class="more-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'happy-baby'); ?></a></p><?php
			}

		}
	?></div><!-- .entry-content -->
</article>