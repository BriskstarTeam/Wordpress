<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

if (happy_baby_sidebar_present()) {
	ob_start();
	$happy_baby_sidebar_name = happy_baby_get_theme_option('sidebar_widgets');
	happy_baby_storage_set('current_sidebar', 'sidebar');
	if ( is_active_sidebar($happy_baby_sidebar_name) ) {
		dynamic_sidebar($happy_baby_sidebar_name);
	}
	$happy_baby_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($happy_baby_out)) {
		$happy_baby_sidebar_position = happy_baby_get_theme_option('sidebar_position');
		?>
		<div class="sidebar <?php echo esc_attr($happy_baby_sidebar_position); ?> widget_area<?php if (!happy_baby_is_inherit(happy_baby_get_theme_option('sidebar_scheme'))) echo ' scheme_'.esc_attr(happy_baby_get_theme_option('sidebar_scheme')); ?>" role="complementary">
			<div class="sidebar_inner">
				<?php
				do_action( 'happy_baby_action_before_sidebar' );
				happy_baby_show_layout(preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $happy_baby_out));
				do_action( 'happy_baby_action_after_sidebar' );
				?>
			</div><!-- /.sidebar_inner -->
		</div><!-- /.sidebar -->
		<?php
	}
}
?>