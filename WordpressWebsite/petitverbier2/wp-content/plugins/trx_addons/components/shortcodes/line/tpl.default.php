<?php
/**
 * The style "default" of the Line block
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.4.3
 */

$args = get_query_var('trx_addons_args_sc_line');

?><div id="<?php echo esc_attr($args['id']); ?>"
		class="sc_line<?php
			echo ' var_'.esc_attr($args['line_variant']);
			echo ' '.esc_attr($args['line_style']);
			echo ' '.esc_attr($args['line_type']);
			if (!empty($args['class'])) echo ' '.esc_attr($args['class']);
			?>"<?php
		if (isset($args['css']) && $args['css']!='') echo ' style="'.esc_attr($args['css']).'"';
?>><?php

	$icon = 'waves'.$args['line_variant'];
	$svg = trx_addons_get_file_dir('css/icons.svg/'.trx_addons_esc($icon).'.svg');

	if (!empty($svg)) {
		trx_addons_show_layout(trx_addons_get_svg_from_file($svg));
	}

?></div>