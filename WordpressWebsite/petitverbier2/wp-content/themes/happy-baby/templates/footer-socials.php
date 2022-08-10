<?php
/**
 * The template to display the socials in the footer
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.10
 */


// Socials
if ( happy_baby_is_on(happy_baby_get_theme_option('socials_in_footer')) && ($happy_baby_output = happy_baby_get_socials_links()) != '') {
	?>
	<div class="footer_socials_wrap socials_wrap">
		<div class="footer_socials_inner">
			<?php happy_baby_show_layout($happy_baby_output); ?>
		</div>
	</div>
	<?php
}
?>