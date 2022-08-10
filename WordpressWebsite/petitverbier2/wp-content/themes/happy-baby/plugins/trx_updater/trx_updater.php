<?php
/* ThemeREX Updater support functions
------------------------------------------------------------------------------- */


// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'happy_baby_trx_updater_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'happy_baby_trx_updater_theme_setup9', 9 );
    function happy_baby_trx_updater_theme_setup9() {
        if ( is_admin() ) {
            add_filter( 'happy_baby_filter_tgmpa_required_plugins', 'happy_baby_trx_updater_tgmpa_required_plugins', 8 );
        }
    }
}


// Filter to add in the required plugins list
if ( !function_exists( 'happy_baby_trx_updater_tgmpa_required_plugins' ) ) {
    function happy_baby_trx_updater_tgmpa_required_plugins($list=array()) {
        if (in_array('trx_updater', happy_baby_storage_get('required_plugins'))) {
            $path = happy_baby_get_file_dir('plugins/trx_updater/trx_updater.zip');
            $list[] = array(
                'name' 		=> esc_html__('ThemeREX Updater', 'happy-baby'),
                'slug'     => 'trx_updater',
                'version'  => '1.9.6',
                'source'	=> !empty($path) ? $path : 'upload://trx_updater.zip',
                'required' => false,
            );
        }
        return $list;
    }
}
