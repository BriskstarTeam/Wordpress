<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.10
 */

$happy_baby_footer_scheme =  happy_baby_is_inherit(happy_baby_get_theme_option('footer_scheme')) ? happy_baby_get_theme_option('color_scheme') : happy_baby_get_theme_option('footer_scheme');
$footer_bg = happy_baby_is_on(happy_baby_get_theme_option('footer_bg')) ? ' bg-footer-style' : '';
?>
<footer class="footer_wrap footer_default scheme_<?php echo esc_attr($happy_baby_footer_scheme); echo esc_attr($footer_bg); ?>">

	<div class="footer_info_wrap">
		<div class="content_wrap">
			<div class="columns_wrap">
				<div class="column-1_3">
					<?php
					$info_1 = happy_baby_get_theme_option('info_1');
					if($info_1) {
						$info_image_1 = happy_baby_get_theme_option('info_image_1');
						if (empty($info_image_1)) {
							$info_image_1 = happy_baby_get_file_url('images/info_1.png');
						}
						if (!empty($info_image_1)) {
							echo '<img src="' . esc_url($info_image_1) . '" class="info_footer_image" alt="' . esc_attr(basename($info_image_1)) . '">';
						}
						echo esc_attr($info_1) ? '<div class="info_footer">' . happy_baby_show_layout($info_1) . "</div>" : '';
					}
					?>
				</div><div class="column-1_3">
					<?php
					$info_2 = happy_baby_get_theme_option('info_2');
					if($info_2) {
						$info_image_2 = happy_baby_get_theme_option('info_image_2');
						if (empty($info_image_2)) {
							$info_image_2 = happy_baby_get_file_url('images/info_2.png');
						}
						if (!empty($info_image_2)) {
							echo '<img src="' . esc_url($info_image_2) . '" class="info_footer_image" alt="' . esc_attr(basename($info_image_2)) . '">';
						}
						echo esc_attr($info_2) ? '<div class="info_footer">' . happy_baby_show_layout($info_2) . "</div>" : '';
					}
					?>
				</div><div class="column-1_3">
					<?php
					$info_3 = happy_baby_get_theme_option('info_3');
					if($info_3) {
						$info_image_3 = happy_baby_get_theme_option('info_image_3');
						if (empty($info_image_3)) {
							$info_image_3 = happy_baby_get_file_url('images/info_3.png');
						}
						if (!empty($info_image_3)) {
							echo '<img src="' . esc_url($info_image_3) . '" class="info_footer_image" alt="' . esc_attr(basename($info_image_3)) . '">';
						}
						echo esc_attr($info_3) ? '<div class="info_footer">' . happy_baby_show_layout($info_3) . "</div>" : '';
					}
					?>
				</div>
			</div>
		</div>
	</div>

	<?php

	// Footer widgets area
	get_template_part( 'templates/footer-widgets' );

	// Logo
	get_template_part( 'templates/footer-logo' );

	// Socials
	get_template_part( 'templates/footer-socials' );

	// Menu
	get_template_part( 'templates/footer-menu' );

	// Copyright area
	get_template_part( 'templates/footer-copyright' );
	
	?>
</footer><!-- /.footer_wrap -->
