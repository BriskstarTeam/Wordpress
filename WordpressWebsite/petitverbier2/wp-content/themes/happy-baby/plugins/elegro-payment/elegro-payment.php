<?php
/* elegro Crypto Payment support functions
------------------------------------------------------------------------------- */


// Check if this plugin installed and activated
if ( ! function_exists( 'happy_baby_exists_elegro_payment' ) ) {
    function happy_baby_exists_elegro_payment() {
        return class_exists( 'WC_Elegro_Payment' );
    }
}


/* elegro Crypto Payment support functions
------------------------------------------------------------------------------- */

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('happy_baby_elegro_payment_theme_setup9')) {
    add_action('after_setup_theme', 'happy_baby_elegro_payment_theme_setup9', 9);
    function happy_baby_elegro_payment_theme_setup9()
    {
        if (happy_baby_exists_elegro_payment()) {
            add_action('wp_enqueue_scripts', 'happy_baby_elegro_payment_frontend_scripts', 1100);
            add_filter('happy_baby_filter_merge_styles', 'happy_baby_elegro_payment_merge_styles');
        }
        if (is_admin()) {
            add_filter('happy_baby_filter_tgmpa_required_plugins', 'happy_baby_elegro_payment_tgmpa_required_plugins');
        }
    }
}



// Filter to add in the required plugins list
if (!function_exists('happy_baby_elegro_payment_tgmpa_required_plugins')) {
    function happy_baby_elegro_payment_tgmpa_required_plugins($list = array())
    {
        if (in_array('elegro-payment', happy_baby_storage_get('required_plugins')))
            $list[] = array(
                'name' => esc_html__('elegro Crypto Payment', 'happy-baby'),
                'slug' => 'elegro-payment',
                'required' => false
            );
        return $list;
    }
}


// Custom styles and scripts
//------------------------------------------------------------------------

// Enqueue custom styles
if (!function_exists('happy_baby_elegro_payment_frontend_scripts')) {
    function happy_baby_elegro_payment_frontend_scripts()
    {
        if (happy_baby_exists_elegro_payment()) {
            if (happy_baby_is_on(happy_baby_get_theme_option('debug_mode')) && happy_baby_get_file_dir('plugins/elegro-payment/elegro-payment.css') != '')
                wp_enqueue_style('happy-baby-elegro-payment', happy_baby_get_file_url('plugins/elegro-payment/elegro-payment.css'), array(), null);
        }
    }
}

// Merge custom styles
if (!function_exists('happy_baby_elegro_payment_merge_styles')) {
    function happy_baby_elegro_payment_merge_styles($list)
    {
        $list[] = 'plugins/elegro-payment/elegro-payment.css';
        return $list;
    }
}
