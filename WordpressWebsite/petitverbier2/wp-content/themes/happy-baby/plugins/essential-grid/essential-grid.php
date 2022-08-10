<?php
/* Essential Grid support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('happy_baby_essential_grid_theme_setup9')) {
	add_action( 'after_setup_theme', 'happy_baby_essential_grid_theme_setup9', 9 );
	function happy_baby_essential_grid_theme_setup9() {
		if (happy_baby_exists_essential_grid()) {
			add_action( 'wp_enqueue_scripts', 							'happy_baby_essential_grid_frontend_scripts', 1100 );
			add_filter( 'happy_baby_filter_merge_styles',					'happy_baby_essential_grid_merge_styles' );
		}
		if (is_admin()) {
			add_filter( 'happy_baby_filter_tgmpa_required_plugins',		'happy_baby_essential_grid_tgmpa_required_plugins' );
		}
	}
}

// Check if plugin installed and activated
if ( !function_exists( 'happy_baby_exists_essential_grid' ) ) {
	function happy_baby_exists_essential_grid() {
        return defined('EG_PLUGIN_PATH') || defined( 'ESG_PLUGIN_PATH' );
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'happy_baby_essential_grid_tgmpa_required_plugins' ) ) {
	
	function happy_baby_essential_grid_tgmpa_required_plugins($list=array()) {
		if (in_array('essential-grid', happy_baby_storage_get('required_plugins'))) {
			$path = happy_baby_get_file_dir('plugins/essential-grid/essential-grid.zip');
			$list[] = array(
						'name' 		=> esc_html__('Essential Grid', 'happy-baby'),
						'slug' 		=> 'essential-grid',
                        'version'	=> '3.0.13',
						'source'	=> !empty($path) ? $path : 'upload://essential-grid.zip',
						'required' 	=> false
			);
		}
		return $list;
	}
}
	
// Enqueue plugin's custom styles
if ( !function_exists( 'happy_baby_essential_grid_frontend_scripts' ) ) {
	
	function happy_baby_essential_grid_frontend_scripts() {
		if (happy_baby_is_on(happy_baby_get_theme_option('debug_mode')) && happy_baby_get_file_dir('plugins/essential-grid/essential-grid.css')!='')
			wp_enqueue_style( 'happy-baby-essential-grid',  happy_baby_get_file_url('plugins/essential-grid/essential-grid.css'), array(), null );
	}
}
	
// Merge custom styles
if ( !function_exists( 'happy_baby_essential_grid_merge_styles' ) ) {
	
	function happy_baby_essential_grid_merge_styles($list) {
		$list[] = 'plugins/essential-grid/essential-grid.css';
		return $list;
	}
}
?>