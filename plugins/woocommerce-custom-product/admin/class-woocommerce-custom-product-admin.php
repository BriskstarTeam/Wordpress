<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Woocommerce_Custom_Product
 * @subpackage Woocommerce_Custom_Product/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woocommerce_Custom_Product
 * @subpackage Woocommerce_Custom_Product/admin
 * @author     Keyur <kpadaria@gmail.com>
 */
class Woocommerce_Custom_Product_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woocommerce_Custom_Product_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Custom_Product_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/woocommerce-custom-product-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woocommerce_Custom_Product_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Custom_Product_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/woocommerce-custom-product-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	* Update order table for admin pannel
	*/
	public function order_table_image_link_after_order_itemmeta( $item_id, $item, $product ){
		if( is_admin() && $item->is_type('line_item') && $file_data = $item->get_meta( '_img_file' ) ){
			echo '<p><a href="'.$file_data['guid'].'" target="_blank" class="button">'.__("Open Image") . '</a></p>'; // Optional
			echo "<img src=".$file_data['guid']." width='auto' height='150'>";	 // Optional
		}
	}
	/**
	* Update email content for order place 
	*/
	public function wc_email_new_order_custom_meta_data($order, $sent_to_admin, $plain_text, $email){
		if ( 'new_order' === $email->id ) {
			foreach ($order->get_items() as $item ) {
				if ( $file_data = $item->get_meta( '_img_file' ) ) {
					echo '<p>
						<a href="'.$file_data['guid'].'" target="_blank" class="button">'.__("Download Image") . '</a><br>
						<pre><code style="font-size:12px; background-color:#eee; padding:5px;">'.$file_data['guid'].'</code></pre>
					</p><br>';
				}
			}
		}
	}
}
