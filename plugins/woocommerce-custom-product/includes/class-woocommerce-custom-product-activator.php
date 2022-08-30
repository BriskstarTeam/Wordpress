<?php

/**
 * Fired during plugin activation
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Woocommerce_Custom_Product
 * @subpackage Woocommerce_Custom_Product/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Woocommerce_Custom_Product
 * @subpackage Woocommerce_Custom_Product/includes
 * @author     Keyur <kpadaria@gmail.com>
 */
class Woocommerce_Custom_Product_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		$obj = new Woocommerce_Custom_Product();
		$version = $obj->get_version();
		add_option( 'woocommerce_custom_product_version', $version);
	}
}
