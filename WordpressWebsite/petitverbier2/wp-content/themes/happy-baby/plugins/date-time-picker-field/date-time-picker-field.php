<?php
/* elegro Crypto Payment support functions
------------------------------------------------------------------------------- */
// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if ( ! function_exists( 'happy_baby_date_time_picker_field_theme_setup9' ) ) {
    add_action( 'after_setup_theme', 'happy_baby_date_time_picker_field_theme_setup9', 9 );
    function happy_baby_date_time_picker_field_theme_setup9() {
        if ( happy_baby_exists_date_time_picker_field() ) {
            add_action('wp_enqueue_scripts', 'happy_baby_date_time_picker_field_frontend_scripts', 1100);
            add_filter( 'happy_baby_filter_merge_styles', 'happy_baby_date_time_picker_field_merge_styles' );
        }
        if ( is_admin() ) {
            add_filter( 'happy_baby_filter_tgmpa_required_plugins', 'happy_baby_date_time_picker_field_tgmpa_required_plugins' );
        }
    }
}

// Filter to add in the required plugins list
if ( ! function_exists( 'happy_baby_date_time_picker_field_tgmpa_required_plugins' ) ) {
    function happy_baby_date_time_picker_field_tgmpa_required_plugins( $list = array() ) {
        if (in_array('date-time-picker-field', happy_baby_storage_get('required_plugins'))) {
            $list[] = array(
                'name' 		=> esc_html__('Date Time Picker Field', 'happy-baby'),
                'slug'     => 'date-time-picker-field',
                'required' => false,
            );
        }
        return $list;
    }
}

// Check if this plugin installed and activated
if ( ! function_exists( 'happy_baby_exists_date_time_picker_field' ) ) {
    function happy_baby_exists_date_time_picker_field() {
        return defined('ABSPATH');
    }
}

// Merge custom styles
if ( ! function_exists( 'happy_baby_date_time_picker_field_merge_styles' ) ) {
    function happy_baby_date_time_picker_field_merge_styles( $list ) {
        $list[] = 'plugins/date-time-picker-field/date-time-picker-field.css';
        return $list;
    }
}
// Enqueue custom styles
if (!function_exists('happy_baby_date_time_picker_field_frontend_scripts')) {
    function happy_baby_date_time_picker_field_frontend_scripts()
    {
        if (happy_baby_exists_date_time_picker_field()) {
            if (happy_baby_is_on(happy_baby_get_theme_option('debug_mode')) && happy_baby_get_file_dir('plugins/date-time-picker-field/date-time-picker-field.css') != '')
                wp_enqueue_style('happy-baby-date-time-picker-field', happy_baby_get_file_url('plugins/date-time-picker-field/date-time-picker-field.css'), array(), null);
        }
    }
}
