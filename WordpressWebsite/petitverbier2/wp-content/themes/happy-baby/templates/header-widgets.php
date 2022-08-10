<?php
/**
 * The template to display the widgets area in the header
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

// Header sidebar
$happy_baby_header_name = happy_baby_get_theme_option('header_widgets');
$happy_baby_header_present = !happy_baby_is_off($happy_baby_header_name) && is_active_sidebar($happy_baby_header_name);
if ($happy_baby_header_present) { 
	happy_baby_storage_set('current_sidebar', 'header');
	$happy_baby_header_wide = happy_baby_get_theme_option('header_wide');
	ob_start();
	if ( is_active_sidebar($happy_baby_header_name) ) {
		dynamic_sidebar($happy_baby_header_name);
	}
	$happy_baby_widgets_output = ob_get_contents();
	ob_end_clean();
	if (!empty($happy_baby_widgets_output)) {
		$happy_baby_widgets_output = preg_replace("/<\/aside>[\r\n\s]*<aside/", "</aside><aside", $happy_baby_widgets_output);
		$happy_baby_need_columns = strpos($happy_baby_widgets_output, 'columns_wrap')===false;
		if ($happy_baby_need_columns) {
			$happy_baby_columns = max(0, (int) happy_baby_get_theme_option('header_columns'));
			if ($happy_baby_columns == 0) $happy_baby_columns = min(6, max(1, substr_count($happy_baby_widgets_output, '<aside ')));
			if ($happy_baby_columns > 1)
				$happy_baby_widgets_output = preg_replace("/class=\"widget /", "class=\"column-1_".esc_attr($happy_baby_columns).' widget ', $happy_baby_widgets_output);
			else
				$happy_baby_need_columns = false;
		}
		?>
		<div class="header_widgets_wrap widget_area<?php echo !empty($happy_baby_header_wide) ? ' header_fullwidth' : ' header_boxed'; ?>">
			<div class="header_widgets_inner widget_area_inner">
				<?php 
				if (!$happy_baby_header_wide) { 
					?><div class="content_wrap"><?php
				}
				if ($happy_baby_need_columns) {
					?><div class="columns_wrap"><?php
				}
				do_action( 'happy_baby_action_before_sidebar' );
				happy_baby_show_layout($happy_baby_widgets_output);
				do_action( 'happy_baby_action_after_sidebar' );
				if ($happy_baby_need_columns) {
					?></div>	<!-- /.columns_wrap --><?php
				}
				if (!$happy_baby_header_wide) {
					?></div>	<!-- /.content_wrap --><?php
				}
				?>
			</div>	<!-- /.header_widgets_inner -->
		</div>	<!-- /.header_widgets_wrap -->
		<?php
	}
}
?>