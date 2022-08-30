<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->
<?php
    if(is_single()){ ?>
      <footer>
        <div class="footer">
           <div class="row">
              <div class="col-sm-6">
                 <div class="footer-box">
                    <img src="<?php echo get_theme_file_uri('/assets/images/footer-shape.png'); ?>" class="img-fluid">
                    <div class="footer-content">
                       <h3>Buying Pre-IPO Stocks Made Easy</h3>
                       <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                          alteration in some form, by injected humour.
                       </p>
                       <a class="theme_btn thm-btn border-radius-5 show-more" tabindex="0">Book A Call Now</a>
                    </div>
                 </div>
              </div>
              <div class="col-sm-6">
                 <div class="footer-bottom-content">
                    <img src="<?php echo get_theme_file_uri('/assets/images/Logo.svg'); ?>" class="img-fluid" />
                    <p>Copyright © <a href="https://www.waymarkcapital.com/">Waymark Capital</a> <?php echo date('Y'); ?>. All rights reserved</p>
                 </div>
              </div>
           </div>
        </div>
     </footer>
    <?php }else if((!is_page('home'))  ) { ?>
	<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php if ( has_nav_menu( 'footer' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					/*wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'items_wrap'     => '%3$s',
							'container'      => false,
							'depth'          => 1,
							'link_before'    => '<span>',
							'link_after'     => '</span>',
							'fallback_cb'    => false,
						)
					); */
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
		<?php endif; ?>
		<div class="site-info">
			<div class="site-name">
				<?php if ( has_custom_logo() ) : ?>
					<div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
					<?php if ( get_bloginfo( 'name' ) && get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
						<?php if ( is_front_page() && ! is_paged() ) : ?>
							<?php bloginfo( 'name' ); ?>
						<?php else : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endif; ?>
			</div><!-- .site-name -->
			<div class="powered-by">
			    <p>Copyright © <a href="https://www.waymarkcapital.com/">Waymark Capital</a> <?php echo date('Y'); ?>. All rights reserved</p>
				<?php
				/* translators: %s: WordPress. */
				/*printf(
					esc_html__( 'Proudly powered by %s.', 'Waymark Capital' ),
					'<a href="' . esc_url( __( 'https://www.waymarkcapital.com/', 'Waymark Capital' ) ) . '">Waymark Capital</a>'
				); */
				?>
			</div><!-- .powered-by -->

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
<?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
