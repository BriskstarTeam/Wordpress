<?php
/**
 * The template to display the Author bio
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */
?>

<div class="author_info author vcard" itemprop="author" itemscope itemtype="//schema.org/Person">

	<div class="author_avatar" itemprop="image">
		<?php 
		$happy_baby_mult = happy_baby_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 400*$happy_baby_mult );
		?>
	</div><!-- .author_avatar -->

	<div class="author_description">
		<h5 class="author_title" itemprop="name"><?php echo wp_kses_data(sprintf(__('About %s', 'happy-baby'), '<span class="fn">'.get_the_author().'</span>')); ?></h5>
		<div class="author_bio" itemprop="description">
			<?php echo wp_kses(wpautop(get_the_author_meta( 'description' )), 'happy_baby_kses_content'); ?>
			<a class="author_link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php esc_html_e( 'Read More', 'happy-baby' ); ?>
			</a>
			<?php do_action('happy_baby_action_user_meta'); ?>
		</div><!-- .author_bio -->
	</div><!-- .author_description -->

</div><!-- .author_info -->
