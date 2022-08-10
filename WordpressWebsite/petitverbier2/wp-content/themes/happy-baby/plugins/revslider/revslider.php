<?php
/* Revolution Slider support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('happy_baby_revslider_theme_setup9')) {
	add_action( 'after_setup_theme', 'happy_baby_revslider_theme_setup9', 9 );
	function happy_baby_revslider_theme_setup9() {
		if (happy_baby_exists_revslider()) {
			add_action( 'wp_enqueue_scripts', 					'happy_baby_revslider_frontend_scripts', 1100 );
			add_filter( 'happy_baby_filter_merge_styles',			'happy_baby_revslider_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'happy_baby_filter_tgmpa_required_plugins','happy_baby_revslider_tgmpa_required_plugins' );
		}
	}
}

// Check if RevSlider installed and activated
if ( !function_exists( 'happy_baby_exists_revslider' ) ) {
	function happy_baby_exists_revslider() {
		return function_exists('rev_slider_shortcode');
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'happy_baby_revslider_tgmpa_required_plugins' ) ) {
	
	function happy_baby_revslider_tgmpa_required_plugins($list=array()) {
		if (in_array('revslider', happy_baby_storage_get('required_plugins'))) {
			$path = happy_baby_get_file_dir('plugins/revslider/revslider.zip');
			$list[] = array(
					'name' 		=> esc_html__('Revolution Slider', 'happy-baby'),
					'slug' 		=> 'revslider',
                    'version'	=> '6.5.14',
					'source'	=> !empty($path) ? $path : 'upload://revslider.zip',
					'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue custom styles
if ( !function_exists( 'happy_baby_revslider_frontend_scripts' ) ) {
	
	function happy_baby_revslider_frontend_scripts() {
		if (happy_baby_is_on(happy_baby_get_theme_option('debug_mode')) && happy_baby_get_file_dir('plugins/revslider/revslider.css')!='')
			wp_enqueue_style( 'happy-baby-revslider',  happy_baby_get_file_url('plugins/revslider/revslider.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'happy_baby_revslider_merge_styles' ) ) {
	
	function happy_baby_revslider_merge_styles($list) {
		$list[] = 'plugins/revslider/revslider.css';
		return $list;
	}
}
?>