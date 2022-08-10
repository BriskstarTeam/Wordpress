<?php
/* WP GDPR Compliance support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('happy_baby_wp_gdpr_compliance_theme_setup9')) {
	add_action( 'after_setup_theme', 'happy_baby_wp_gdpr_compliance_theme_setup9', 9 );
	function happy_baby_wp_gdpr_compliance_theme_setup9() {
		
		if (is_admin()) {
			add_filter( 'happy_baby_filter_tgmpa_required_plugins',         'happy_baby_wp_gdpr_compliance_tgmpa_required_plugins' );
		}
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'happy_baby_wp_gdpr_compliance_tgmpa_required_plugins' ) ) {
	
	function happy_baby_wp_gdpr_compliance_tgmpa_required_plugins($list=array()) {
		if (in_array('wp-gdpr-compliance', happy_baby_storage_get('required_plugins'))) {
			// wp_gdpr_compliance plugin
			$list[] = array(
					'name' 		=> esc_html__('Cookie Information', 'happy-baby'),
					'slug' 		=> 'wp-gdpr-compliance',
					'required' 	=> false
			);
		}
		return $list;
	}
}

// Check if wp_gdpr_compliance installed and activated
if ( !function_exists( 'happy_baby_exists_wp_gdpr_compliance' ) ) {
	function happy_baby_exists_wp_gdpr_compliance() {
//		Old way (before v.2.0)
//		Attention! In the v.2.0 and v.2.0.1 this check throw fatal error in their autoloader!
//		return class_exists( 'WPGDPRC\WPGDPRC' );
//		New way (to avoid error in wp_gdpr_compliance autoloader)
//		Check constants:	before v.2.0						after v.2.0
        return defined( 'WP_GDPR_C_ROOT_FILE' ) || defined( 'WPGDPRC_ROOT_FILE' );
	}
}
?>