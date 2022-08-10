<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

						// Widgets area inside page content
						happy_baby_create_widgets_area('widgets_below_content');
						?>				
					</div><!-- </.content> -->

					<?php
					// Show main sidebar
					get_sidebar();

					// Widgets area below page content
					happy_baby_create_widgets_area('widgets_below_page');

					$happy_baby_body_style = happy_baby_get_theme_option('body_style');
					if ($happy_baby_body_style != 'fullscreen') {
						?></div><!-- </.content_wrap> --><?php
					}
					?>
			</div><!-- </.page_content_wrap> -->

			<?php
			// Footer
			$happy_baby_footer_style = happy_baby_get_theme_option("footer_style");
			if (strpos($happy_baby_footer_style, 'footer-custom-')===0) $happy_baby_footer_style = 'footer-custom';
			get_template_part( "templates/{$happy_baby_footer_style}");
			?>

		</div><!-- /.page_wrap -->

	</div><!-- /.body_wrap -->

	<?php if (happy_baby_is_on(happy_baby_get_theme_option('debug_mode')) && happy_baby_get_file_dir('images/makeup.jpg')!='') { ?>
		<img src="<?php echo esc_url(happy_baby_get_file_url('images/makeup.jpg')); ?>" id="makeup">
	<?php } ?>
	<script src="https://www.google.com/recaptcha/api.js?render=6LfTQVgfAAAAAGoSoC4li744MUJ6ujKp5VZCCq2i"></script>

	<?php wp_footer(); ?>

</body>
</html>