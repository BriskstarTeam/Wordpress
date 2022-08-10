<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

$happy_baby_args = get_query_var('happy_baby_logo_args');

// Site logo
$happy_baby_logo_image  = happy_baby_get_logo_image(isset($happy_baby_args['type']) ? $happy_baby_args['type'] : '');
$happy_baby_logo_text   = happy_baby_is_on(happy_baby_get_theme_option('logo_text')) ? get_bloginfo( 'name' ) : '';
$happy_baby_logo_slogan = get_bloginfo( 'description', 'display' );
if (!empty($happy_baby_logo_image) || !empty($happy_baby_logo_text)) {
	?><a class="sc_layouts_logo" href="<?php echo is_front_page() ? '#' : esc_url(home_url('/')); ?>"><?php
		if (!empty($happy_baby_logo_image)) {
			$happy_baby_attr = happy_baby_getimagesize($happy_baby_logo_image);
			echo '<img src="'.esc_url($happy_baby_logo_image).'" alt="'.esc_attr(basename($happy_baby_logo_image)).'"'.(!empty($happy_baby_attr[3]) ? sprintf(' %s', $happy_baby_attr[3]) : '').'>' ;
		} else {
			happy_baby_show_layout(happy_baby_prepare_macros($happy_baby_logo_text), '<span class="logo_text">', '</span>');
			happy_baby_show_layout(happy_baby_prepare_macros($happy_baby_logo_slogan), '<span class="logo_slogan">', '</span>');
		}
	?></a><?php
}
?>