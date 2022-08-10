<?php
/**
 * The template 'Style 2' to displaying related posts
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

$happy_baby_link = get_permalink();
$happy_baby_post_format = get_post_format();
$happy_baby_post_format = empty($happy_baby_post_format) ? 'standard' : str_replace('post-format-', '', $happy_baby_post_format);
?><div id="post-<?php the_ID(); ?>" 
	<?php post_class( 'related_item related_item_style_2 post_format_'.esc_attr($happy_baby_post_format) ); ?>><?php
	happy_baby_show_post_featured(array(
		'thumb_size' => happy_baby_get_thumb_size( (int) happy_baby_get_theme_option('related_posts') == 1 ? 'huge' : 'big' ),
		'show_no_image' => false,
		'singular' => false
		)
	);
	?><div class="post_header entry-header"><?php
		if ( false && in_array(get_post_type(), array( 'post', 'attachment' ) ) ) {
			?><span class="post_date"><a href="<?php echo esc_url($happy_baby_link); ?>"><?php echo happy_baby_get_date(); ?></a></span><?php
		}
		?>
		<h6 class="post_title entry-title"><a href="<?php echo esc_url($happy_baby_link); ?>"><?php
                if ( '' == get_the_title() ) {
                    esc_html_e( '- No title -', 'happy-baby' );
                } else {
                    echo the_title();
                }
		?></a></h6>
	</div>
</div>