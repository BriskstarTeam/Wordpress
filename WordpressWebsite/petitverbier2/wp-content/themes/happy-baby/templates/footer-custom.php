<?php
/**
 * The template to display default site footer
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.10
 */

$happy_baby_footer_scheme =  happy_baby_is_inherit(happy_baby_get_theme_option('footer_scheme')) ? happy_baby_get_theme_option('color_scheme') : happy_baby_get_theme_option('footer_scheme');
$happy_baby_footer_id = str_replace('footer-custom-', '', happy_baby_get_theme_option("footer_style"));
$happy_baby_footer_meta = get_post_meta($happy_baby_footer_id, 'trx_addons_options', true);
$footer_bg = happy_baby_is_on(happy_baby_get_theme_option('footer_bg')) ? ' bg-footer-style' : '';
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr($happy_baby_footer_id); 
						?> footer_custom_<?php echo esc_attr(sanitize_title(get_the_title($happy_baby_footer_id))); 
						if (!empty($happy_baby_footer_meta['margin']) != '') 
							echo ' '.esc_attr(happy_baby_add_inline_css_class('margin-top: '.esc_attr(happy_baby_prepare_css_value($happy_baby_footer_meta['margin'])).';'));
						?> scheme_<?php echo esc_attr($happy_baby_footer_scheme); 
						echo esc_attr($footer_bg);
						?>">
	<?php
    // Custom footer's layout
    do_action('happy_baby_action_show_layout', $happy_baby_footer_id);
	?>
</footer><!-- /.footer_wrap -->
