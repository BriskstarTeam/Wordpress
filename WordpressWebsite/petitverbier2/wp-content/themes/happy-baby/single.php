<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

get_header();

while ( have_posts() ) { the_post();

	get_template_part( 'content', get_post_format() );

	if(false) {
		// Previous/next post navigation.
		?>
		<div class="nav-links-single"><?php
		the_post_navigation(array(
			'next_text' => '<span class="nav-arrow"></span>'
				. '<span class="screen-reader-text">' . esc_html__('Next post:', 'happy-baby') . '</span> '
				. '<h6 class="post-title">%title</h6>'
				. '<span class="post_date">%date</span>',
			'prev_text' => '<span class="nav-arrow"></span>'
				. '<span class="screen-reader-text">' . esc_html__('Previous post:', 'happy-baby') . '</span> '
				. '<h6 class="post-title">%title</h6>'
				. '<span class="post_date">%date</span>'
		));
		?></div><?php
	}
	// Related posts
	$happy_baby_related_posts = (int) happy_baby_get_theme_option('related_posts');
	if ($happy_baby_related_posts > 0) {
		happy_baby_show_related_posts(array('orderby' => 'rand',
										'posts_per_page' => max(1, min(9, happy_baby_get_theme_option('related_posts'))),
										'columns' => max(1, min(4, happy_baby_get_theme_option('related_columns')))
										),
									2
									);
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
?>