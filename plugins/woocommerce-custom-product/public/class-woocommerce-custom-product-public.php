<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Woocommerce_Custom_Product
 * @subpackage Woocommerce_Custom_Product/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Woocommerce_Custom_Product
 * @subpackage Woocommerce_Custom_Product/public
 * @author     Keyur <kpadaria@gmail.com>
 */
class Woocommerce_Custom_Product_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/woocommerce-custom-product-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/woocommerce-custom-product-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	* Function for display image field above cart button
	*/

	public function display_img_above_cart()
	{
		echo '<p class="form-row validate-required" id="image_upload_custom" >
				<label for="file_field">'.__("Upload Image","Woocommerce_Custom_Product").'
					<input type="file" id="cus_file" name="image" accept="image/*" onchange="readURL(this);">
					<button class="reset_image" style="display:none;">Remove Image</button>
					<img id="prev_image" src="#" alt="your image" style="display:none;margin:20px;" />
				</label>
			</p>';
	}
	
	/**
	* Add data to the cart item
	*/

	public function add_image_fields_data_as_cart_item_data( $cart_item, $product_id)
	{
		if( isset($_FILES['image']) && ! empty($_FILES['image']) && !empty($_FILES['image']['name']) ) {
			$upload       = wp_upload_bits( $_FILES['image']['name'], null, file_get_contents( $_FILES['image']['tmp_name'] ) );
			$filetype     = wp_check_filetype( basename( $upload['file'] ), null );
			$upload_dir   = wp_upload_dir();
			$upl_base_url = is_ssl() ? str_replace('http://', 'https://', $upload_dir['baseurl']) : $upload_dir['baseurl'];
			$base_name    = basename( $upload['file'] );
	
			$cart_item['file_upload'] = array(
				'guid'      => $upl_base_url .'/'. _wp_relative_upload_path( $upload['file'] ), // Url
				'file_type' => $filetype['type'], // File type
				'file_name' => $base_name, // File name
				'title'     => ucfirst( preg_replace('/\.[^.]+$/', '', $base_name ) ), // Title
			);
			$cart_item['unique_key'] = md5( microtime().rand() );
		}
		return $cart_item;
	}

	/**
	* Display item in cart item
	*/
	public function display_image_cart_table($cart_item_data, $cart_item){
		if ( isset( $cart_item['file_upload']['title'] ) ){
			$cart_item_data[] = array(
				'name' => __( 'Image', 'woocommerce' ),
				'value' => "<img src=".$cart_item['file_upload']['guid']." data-uid=".$cart_item['unique_key']." width='auto' height='150'>",
			);
		}
		return $cart_item_data;
	}

	/**
	* Update cart item image field
	*/

	public function image_order_update_order_item_meta( $item, $cart_item_key, $values, $order ){
		if ( isset( $values['file_upload'] ) ){
			$item->update_meta_data( '_img_file',  $values['file_upload'] );
		}
	}
}
