<?php
/**
 * The template to display menu in the footer
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.10
 */

// Footer menu
$happy_baby_menu_footer = happy_baby_get_nav_menu(array(
											'location' => 'menu_footer',
											'class' => 'sc_layouts_menu sc_layouts_menu_default'
											));
if (!empty($happy_baby_menu_footer)) {
	?>
	<div class="footer_menu_wrap">
		<div class="footer_menu_inner">
			<?php happy_baby_show_layout($happy_baby_menu_footer); ?>
		</div>
	</div>
	<?php
}
?>