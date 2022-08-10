<?php
/**
 * The template to display the site logo in the footer
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.10
 */

// Logo
if (happy_baby_is_on(happy_baby_get_theme_option('logo_in_footer'))) {
	$happy_baby_logo_image = '';
	if (happy_baby_get_retina_multiplier(2) > 1)
		$happy_baby_logo_image = happy_baby_get_theme_option( 'logo_footer_retina' );
	if (empty($happy_baby_logo_image)) 
		$happy_baby_logo_image = happy_baby_get_theme_option( 'logo_footer' );
	$happy_baby_logo_text   = get_bloginfo( 'name' );
	if (!empty($happy_baby_logo_image) || !empty($happy_baby_logo_text)) {
		?>
		<div class="footer_logo_wrap">
			<div class="footer_logo_inner">
				<?php
				if (!empty($happy_baby_logo_image)) {
					$happy_baby_attr = happy_baby_getimagesize($happy_baby_logo_image);
					echo '<a href="'.esc_url(home_url('/')).'"><img src="'.esc_url($happy_baby_logo_image).'" class="logo_footer_image" alt="'.esc_attr(basename($happy_baby_logo_image)).'"'.(!empty($happy_baby_attr[3]) ? sprintf(' %s', $happy_baby_attr[3]) : '').'></a>' ;
				} else if (!empty($happy_baby_logo_text)) {
					echo '<h1 class="logo_footer_text"><a href="'.esc_url(home_url('/')).'">' . esc_html($happy_baby_logo_text) . '</a></h1>';
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>