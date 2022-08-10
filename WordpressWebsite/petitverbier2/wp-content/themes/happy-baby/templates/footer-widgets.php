<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.10
 */

// Footer sidebar
$happy_baby_footer_name = happy_baby_get_theme_option('footer_widgets');
$happy_baby_footer_present = !happy_baby_is_off($happy_baby_footer_name) && is_active_sidebar($happy_baby_footer_name);
if ($happy_baby_footer_present) { 
	happy_baby_storage_set('current_sidebar', 'footer');
	$happy_baby_footer_wide = happy_baby_get_theme_option('footer_wide');
	ob_start();
	if ( is_active_sidebar($happy_baby_footer_name) ) {
		dynamic_sidebar($happy_baby_footer_name);
	}
	$happy_baby_out = trim(ob_get_contents());
	ob_end_clean();
	if (!empty($happy_baby_out)) {
		$happy_baby_out = preg_replace("/<\\/aside>[\r\n\s]*<aside/", "</aside><aside", $happy_baby_out);
		$happy_baby_need_columns = true;
		if ($happy_baby_need_columns) {
			$happy_baby_columns = max(0, (int) happy_baby_get_theme_option('footer_columns'));
			if ($happy_baby_columns == 0) $happy_baby_columns = min(4, max(1, substr_count($happy_baby_out, '<aside ')));
			if ($happy_baby_columns > 1)
				$happy_baby_out = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($happy_baby_columns).' widget ', $happy_baby_out);
			else
				$happy_baby_need_columns = false;
		}
		?>
		<div class="footer_widgets_wrap widget_area<?php echo !empty($happy_baby_footer_wide) ? ' footer_fullwidth' : ''; ?> sc_layouts_row  sc_layouts_row_type_normal">
			<div class="footer_widgets_inner widget_area_inner">
				<?php 
				if (!$happy_baby_footer_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($happy_baby_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'happy_baby_action_before_sidebar' );
				happy_baby_show_layout($happy_baby_out);
				do_action( 'happy_baby_action_after_sidebar' );
				if ($happy_baby_need_columns) {
					?></div><!-- /.columns_wrap --><?php
				}
				if (!$happy_baby_footer_wide) {
					?></div><!-- /.content_wrap --><?php
				}
				?>
			</div><!-- /.footer_widgets_inner -->
		</div><!-- /.footer_widgets_wrap -->
		<?php
	}
}
?>