<?php
/**
 * Plugin support: Date Time Picker Field
 *
 * @package WordPress
 * @subpackage ThemeREX Addons
 * @since v1.5
 */


// Check if Instagram Feed installed and activated
if ( !function_exists( 'trx_addons_exists_date_time_picker_field' ) ) {
    function trx_addons_exists_date_time_picker_field() {
        return defined('ABSPATH');
    }
}

// One-click import support
//------------------------------------------------------------------------

// Check plugin in the required plugins
if ( !function_exists( 'trx_addons_date_time_picker_field_importer_required_plugins' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_required_plugins',	'trx_addons_date_time_picker_field_importer_required_plugins', 10, 2 );
    function trx_addons_date_time_picker_field_importer_required_plugins($not_installed='', $list='') {
        if (strpos($list, 'date-time-picker-field')!==false && !trx_addons_exists_date_time_picker_field() )
            $not_installed .= '<br>' . esc_html__('Date Time Picker Field', 'trx_addons');
        return $not_installed;
    }
}

// Set plugin's specific importer options
if ( !function_exists( 'trx_addons_date_time_picker_field_importer_set_options' ) ) {
    if (is_admin()) add_filter( 'trx_addons_filter_importer_options',	'trx_addons_date_time_picker_field_importer_set_options' );
    function trx_addons_date_time_picker_field_importer_set_options($options=array()) {
        if (trx_addons_exists_date_time_picker_field() && in_array('date-time-picker-field', $options['required_plugins'])) {
            if (is_array($options)) {
                $options['additional_options'][] = 'dtpicker';		// Add slugs to export options for this plugin
            }
        }
        return $options;
    }
}
?>
