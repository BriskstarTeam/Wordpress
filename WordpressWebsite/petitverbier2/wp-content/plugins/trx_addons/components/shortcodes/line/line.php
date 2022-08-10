<?php
/**
 * Shortcode: Line
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.4.3
 */

	
// Load required styles and scripts for the frontend
if ( !function_exists( 'trx_addons_sc_line_load_scripts_front' ) ) {
	add_action("wp_enqueue_scripts", 'trx_addons_sc_line_load_scripts_front');
	function trx_addons_sc_line_load_scripts_front() {
		if (trx_addons_is_on(trx_addons_get_option('debug_mode'))) {
			wp_enqueue_style( 'trx_addons-sc_line', trx_addons_get_file_url(TRX_ADDONS_PLUGIN_SHORTCODES . 'line/line.css'), array(), null );
		}
	}
}

	
// Merge shortcode's specific styles into single stylesheet
if ( !function_exists( 'trx_addons_sc_line_merge_styles' ) ) {
	add_action("trx_addons_filter_merge_styles", 'trx_addons_sc_line_merge_styles');
	function trx_addons_sc_line_merge_styles($list) {
		$list[] = TRX_ADDONS_PLUGIN_SHORTCODES . 'line/line.css';
		return $list;
	}
}


// trx_sc_line
//-------------------------------------------------------------
/*
[trx_sc_line id="unique_id" title="" subtitle="" description=""]
*/
if ( !function_exists( 'trx_addons_sc_line' ) ) {
	function trx_addons_sc_line($atts, $content=null){
		$atts = trx_addons_sc_prepare_atts('trx_sc_line', $atts, array(
			// Individual params
			"line_type" => "top",
			"line_style" => "color_1",
			"line_variant" => 1,
			// Common params
			"id" => "",
			"class" => ""
			)
		);
		
		$output = '';

			ob_start();
			trx_addons_get_template_part(array(
											TRX_ADDONS_PLUGIN_SHORTCODES . 'line/tpl.default.php',
											TRX_ADDONS_PLUGIN_SHORTCODES . 'line/tpl.default.php'
											),
                                            'trx_addons_args_sc_line',
                                            $atts
                                        );
			$output = ob_get_contents();
			ob_end_clean();

		return apply_filters('trx_addons_sc_output', $output, 'trx_sc_line', $atts, $content);
	}
}


// Add [trx_sc_content] in the VC shortcodes list
if (!function_exists('trx_addons_sc_line_add_in_vc')) {
	function trx_addons_sc_line_add_in_vc() {
		
		if (!trx_addons_exists_visual_composer()) return;
		
		add_shortcode("trx_sc_line", "trx_addons_sc_line");
		
		vc_lean_map("trx_sc_line", 'trx_addons_sc_line_add_in_vc_params');
		class WPBakeryShortCode_Trx_Sc_Line extends WPBakeryShortCode {}
	}
	add_action('init', 'trx_addons_sc_line_add_in_vc', 20);
}

// Return params
if (!function_exists('trx_addons_sc_line_add_in_vc_params')) {
	function trx_addons_sc_line_add_in_vc_params() {
		return apply_filters('trx_addons_sc_map', array(
				"base" => "trx_sc_line",
				"name" => esc_html__("Line", 'trx_addons'),
				"description" => wp_kses_data( __("Add Line", 'trx_addons') ),
				"category" => esc_html__('ThemeREX', 'trx_addons'),
				"icon" => 'icon_trx_sc_line',
				"class" => "trx_sc_line",
				'content_element' => true,
				'is_container' => false,
				"show_settings_on_create" => true,
				"params" => array_merge(
					array(
						array(
							"param_name" => "line_type",
							"heading" => esc_html__("Type", 'trx_addons'),
							"description" => wp_kses_data( __("Select line type", 'trx_addons') ),
							'edit_field_class' => 'vc_col-sm-6',
							"std" => "top",
							"value" => array(
								esc_html__('Top', 'trx_addons') => 'top',
								esc_html__('Bottom', 'trx_addons') => 'bottom'
							),
							"type" => "dropdown"
						),
						array(
							"param_name" => "line_style",
							"heading" => esc_html__("Style", 'trx_addons'),
							"description" => wp_kses_data( __("Select line style", 'trx_addons') ),
							'edit_field_class' => 'vc_col-sm-6',
							"std" => "color_1",
							"value" => array(
								esc_html__('Color 1', 'trx_addons') => 'color_1',
								esc_html__('Color 2', 'trx_addons') => 'color_2',
								esc_html__('Color 3', 'trx_addons') => 'color_3',
								esc_html__('Color 4', 'trx_addons') => 'color_4',
								esc_html__('Color 5', 'trx_addons') => 'color_5',
							),
							"type" => "dropdown"
						),
						array(
							"param_name" => "line_variant",
							"heading" => esc_html__("Variant", 'trx_addons'),
							"description" => wp_kses_data( __("Select line variant", 'trx_addons') ),
							'edit_field_class' => 'vc_col-sm-12',
							"std" => "top",
							"value" => array(
								esc_html__('Variant 1', 'trx_addons') => 1,
								esc_html__('Variant 2', 'trx_addons') => 2
							),
							"type" => "dropdown"
						),
					),
					//trx_addons_vc_add_title_param(''),
					trx_addons_vc_add_id_param()
				)
			), 'trx_sc_line' );
	}
}
?>