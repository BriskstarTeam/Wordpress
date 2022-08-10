<?php
/* Woocommerce support functions
------------------------------------------------------------------------------- */




// Theme init priorities:
// 1 - register filters, that add/remove lists items for the Theme Options
if (!function_exists('happy_baby_woocommerce_theme_setup1')) {
	add_action( 'after_setup_theme', 'happy_baby_woocommerce_theme_setup1', 1 );
	function happy_baby_woocommerce_theme_setup1() {

        add_theme_support( 'woocommerce', array( 'product_grid' => array( 'max_columns' => 4 ) ) );

		// Next setting from the WooCommerce 3.0+ enable built-in image zoom on the single product page
		add_theme_support( 'wc-product-gallery-zoom' );

		// Next setting from the WooCommerce 3.0+ enable built-in image slider on the single product page
		add_theme_support( 'wc-product-gallery-slider' ); 

		// Next setting from the WooCommerce 3.0+ enable built-in image lightbox on the single product page
		add_theme_support( 'wc-product-gallery-lightbox' );

		add_filter( 'happy_baby_filter_list_sidebars', 	'happy_baby_woocommerce_list_sidebars' );
		add_filter( 'happy_baby_filter_list_posts_types',	'happy_baby_woocommerce_list_post_types');

        // Detect if WooCommerce support 'Product Grid' feature
        $product_grid = happy_baby_exists_woocommerce() && function_exists( 'wc_get_theme_support' ) ? wc_get_theme_support( 'product_grid' ) : false;
        add_theme_support( 'wc-product-grid-enable', isset( $product_grid['min_columns'] ) && isset( $product_grid['max_columns'] ) );
	}
}

// Theme init priorities:
// 3 - add/remove Theme Options elements
if (!function_exists('happy_baby_woocommerce_theme_setup3')) {
	add_action( 'after_setup_theme', 'happy_baby_woocommerce_theme_setup3', 3 );
	function happy_baby_woocommerce_theme_setup3() {
		if (happy_baby_exists_woocommerce()) {
		
			// Section 'WooCommerce'
			happy_baby_storage_merge_array('options', '', array_merge(
				array(
					'shop' => array(
						"title" => esc_html__('Shop', 'happy-baby'),
						"desc" => wp_kses_data( __('Select parameters to display the shop pages', 'happy-baby') ),
						"type" => "section"
						),
					'posts_per_page_shop' => array(
						"title" => esc_html__('Products per page', 'happy-baby'),
						"desc" => wp_kses_data( __('How many products should be displayed on the shop page. If empty - use global value from the menu Settings - Reading', 'happy-baby') ),
						"std" => '',
						"type" => "text"
						),
					'blog_columns_shop' => array(
						"title" => esc_html__('Shop loop columns', 'happy-baby'),
						"desc" => wp_kses_data( __('How many columns should be used in the shop loop (from 2 to 4)?', 'happy-baby') ),
						"std" => 2,
						"options" => happy_baby_get_list_range(2,4),
						"type" => "hidden"
						),
					'shop_mode' => array(
						"title" => esc_html__('Shop mode', 'happy-baby'),
						"desc" => wp_kses_data( __('Select style for the products list', 'happy-baby') ),
						"std" => 'thumbs',
						"options" => array(
							'thumbs'=> esc_html__('Thumbnails', 'happy-baby'),
							'list'	=> esc_html__('List', 'happy-baby'),
						),
						"type" => "select"
						),
					'stretch_tabs_area' => array(
						"title" => esc_html__('Stretch tabs area', 'happy-baby'),
						"desc" => wp_kses_data( __('Stretch area with tabs on the single product to the screen width if the sidebar is hidden', 'happy-baby') ),
						"std" => 1,
						"type" => "checkbox"
						),
					'related_posts_shop' => array(
						"title" => esc_html__('Related products', 'happy-baby'),
						"desc" => wp_kses_data( __('How many related products should be displayed in the single product page?', 'happy-baby') ),
						"std" => 3,
						"options" => happy_baby_get_list_range(0,9),
						"type" => "select"
						),
					'related_columns_shop' => array(
						"title" => esc_html__('Related columns', 'happy-baby'),
						"desc" => wp_kses_data( __('How many columns should be used to output related products in the single product page?', 'happy-baby') ),
						"std" => 3,
						"options" => happy_baby_get_list_range(1,4),
						"type" => "select"
						)
				),
				happy_baby_options_get_list_cpt_options('shop')
			));
		}
	}
}

// Theme init priorities:
// 9 - register other filters (for installer, etc.)
if (!function_exists('happy_baby_woocommerce_theme_setup9')) {
	add_action( 'after_setup_theme', 'happy_baby_woocommerce_theme_setup9', 9 );
	function happy_baby_woocommerce_theme_setup9() {
		
		if (happy_baby_exists_woocommerce()) {
			add_action( 'wp_enqueue_scripts', 								'happy_baby_woocommerce_frontend_scripts', 1100 );
			add_filter( 'happy_baby_filter_merge_styles',						'happy_baby_woocommerce_merge_styles' );
			add_filter( 'happy_baby_filter_merge_scripts',						'happy_baby_woocommerce_merge_scripts');
			add_filter( 'happy_baby_filter_get_post_info',		 				'happy_baby_woocommerce_get_post_info');
			add_filter( 'happy_baby_filter_post_type_taxonomy',				'happy_baby_woocommerce_post_type_taxonomy', 10, 2 );
			if (!is_admin()) {
				add_filter( 'happy_baby_filter_detect_blog_mode',				'happy_baby_woocommerce_detect_blog_mode' );
				add_filter( 'happy_baby_filter_get_blog_title', 				'happy_baby_woocommerce_get_blog_title');
				add_filter( 'happy_baby_filter_get_post_categories', 			'happy_baby_woocommerce_get_post_categories');
				add_filter( 'happy_baby_filter_allow_override_header_image',	'happy_baby_woocommerce_allow_override_header_image' );
				add_action( 'happy_baby_action_before_post_meta',				'happy_baby_woocommerce_action_before_post_meta');
				add_action( 'pre_get_posts',								'happy_baby_woocommerce_pre_get_posts' );
				add_filter( 'happy_baby_filter_localize_script',				'happy_baby_woocommerce_localize_script' );
			}

            // Detect if WooCommerce support 'Product Grid' feature
            $product_grid = function_exists( 'wc_get_theme_support' ) ? wc_get_theme_support( 'product_grid' ) : false;
            add_theme_support( 'wc-product-grid-enable', isset( $product_grid['min_columns'] ) && isset( $product_grid['max_columns'] ) );

		}
		if (is_admin()) {
			add_filter( 'happy_baby_filter_tgmpa_required_plugins',			'happy_baby_woocommerce_tgmpa_required_plugins' );
		}

		// Add wrappers and classes to the standard WooCommerce output
		if (happy_baby_exists_woocommerce()) {

			// Remove WOOC sidebar
			remove_action( 'woocommerce_sidebar', 						'woocommerce_get_sidebar', 10 );

			// Remove link around product item
			remove_action('woocommerce_before_shop_loop_item',			'woocommerce_template_loop_product_link_open', 10);
			remove_action('woocommerce_after_shop_loop_item',			'woocommerce_template_loop_product_link_close', 5);

			// Remove link around product category
			remove_action('woocommerce_before_subcategory',				'woocommerce_template_loop_category_link_open', 10);
			remove_action('woocommerce_after_subcategory',				'woocommerce_template_loop_category_link_close', 10);
			
			// Open main content wrapper - <article>
			remove_action( 'woocommerce_before_main_content',			'woocommerce_output_content_wrapper', 10);
			add_action(    'woocommerce_before_main_content',			'happy_baby_woocommerce_wrapper_start', 10);
			// Close main content wrapper - </article>
			remove_action( 'woocommerce_after_main_content',			'woocommerce_output_content_wrapper_end', 10);		
			add_action(    'woocommerce_after_main_content',			'happy_baby_woocommerce_wrapper_end', 10);

			// Close header section
			add_action(    'woocommerce_archive_description',			'happy_baby_woocommerce_archive_description', 15 );

			// Add theme specific search form
			add_filter(    'get_product_search_form',					'happy_baby_woocommerce_get_product_search_form' );

			// Change text on 'Add to cart' button
			add_filter(    'woocommerce_product_add_to_cart_text',		'happy_baby_woocommerce_add_to_cart_text' );
			add_filter(    'woocommerce_product_single_add_to_cart_text','happy_baby_woocommerce_add_to_cart_text' );

			// Add list mode buttons
			add_action(    'woocommerce_before_shop_loop', 				'happy_baby_woocommerce_before_shop_loop', 10 );

			// Set columns number for the products loop
            if ( ! get_theme_support( 'wc-product-grid-enable' ) ) {
                add_filter('loop_shop_columns', 'happy_baby_woocommerce_loop_shop_columns');
                add_filter('post_class', 'happy_baby_woocommerce_loop_shop_columns_class');
                add_filter('product_cat_class', 'happy_baby_woocommerce_loop_shop_columns_class', 10, 3);
            }
			// Open product/category item wrapper
			add_action(    'woocommerce_before_subcategory_title',		'happy_baby_woocommerce_item_wrapper_start', 9 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'happy_baby_woocommerce_item_wrapper_start', 9 );
			// Close featured image wrapper and open title wrapper
			add_action(    'woocommerce_before_subcategory_title',		'happy_baby_woocommerce_title_wrapper_start', 20 );
			add_action(    'woocommerce_before_shop_loop_item_title',	'happy_baby_woocommerce_title_wrapper_start', 20 );

			// Wrap product title into link
			add_action(    'the_title',									'happy_baby_woocommerce_the_title');
			// Wrap category title into link
			add_action(		'woocommerce_shop_loop_subcategory_title',  'happy_baby_woocommerce_shop_loop_subcategory_title', 9, 1);

			// Close title wrapper and add description in the list mode
			add_action(    'woocommerce_after_shop_loop_item_title',	'happy_baby_woocommerce_title_wrapper_end', 7);
			add_action(    'woocommerce_after_subcategory_title',		'happy_baby_woocommerce_title_wrapper_end2', 10 );
			// Close product/category item wrapper
			add_action(    'woocommerce_after_subcategory',				'happy_baby_woocommerce_item_wrapper_end', 20 );
			add_action(    'woocommerce_after_shop_loop_item',			'happy_baby_woocommerce_item_wrapper_end', 20 );

			// Add product ID into product meta section (after categories and tags)
			add_action(    'woocommerce_product_meta_end',				'happy_baby_woocommerce_show_product_id', 10);
			
			// Set columns number for the product's thumbnails
			add_filter(    'woocommerce_product_thumbnails_columns',	'happy_baby_woocommerce_product_thumbnails_columns' );


			// Detect current shop mode
			if (!is_admin()) {
				$shop_mode = happy_baby_get_value_gpc('happy_baby_shop_mode');
				if (empty($shop_mode) && happy_baby_check_theme_option('shop_mode'))
					$shop_mode = happy_baby_get_theme_option('shop_mode');
				if (empty($shop_mode))
					$shop_mode = 'thumbs';
				happy_baby_storage_set('shop_mode', $shop_mode);
			}
		}
	}
}

// Theme init priorities:
// Action 'wp'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)
if (!function_exists('happy_baby_woocommerce_theme_setup_wp')) {
	add_action( 'wp', 'happy_baby_woocommerce_theme_setup_wp' );
	function happy_baby_woocommerce_theme_setup_wp() {
		if (happy_baby_exists_woocommerce()) {
			// Set columns number for the related products
			if ((int) happy_baby_get_theme_option('related_posts') == 0) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			} else {
				add_filter(    'woocommerce_output_related_products_args',	'happy_baby_woocommerce_output_related_products_args' );
				add_filter(    'woocommerce_related_products_columns',		'happy_baby_woocommerce_related_products_columns' );
			}
		}
	}
}


// Check if WooCommerce installed and activated
if ( !function_exists( 'happy_baby_exists_woocommerce' ) ) {
	function happy_baby_exists_woocommerce() {
		return class_exists('Woocommerce');
	}
}

// Return true, if current page is any woocommerce page
if ( !function_exists( 'happy_baby_is_woocommerce_page' ) ) {
	function happy_baby_is_woocommerce_page() {
		$rez = false;
		if (happy_baby_exists_woocommerce())
			$rez = is_woocommerce() || is_shop() || is_product() || is_product_category() || is_product_tag() || is_product_taxonomy() || is_cart() || is_checkout() || is_account_page();
		return $rez;
	}
}

// Detect current blog mode
if ( !function_exists( 'happy_baby_woocommerce_detect_blog_mode' ) ) {
	
	function happy_baby_woocommerce_detect_blog_mode($mode='') {
		if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy())
			$mode = 'shop';
		else if (is_product() || is_cart() || is_checkout() || is_account_page())
			$mode = 'shop';
		return $mode;
	}
}


// Return taxonomy for current post type
if ( !function_exists( 'happy_baby_woocommerce_post_type_taxonomy' ) ) {
	
	function happy_baby_woocommerce_post_type_taxonomy($tax='', $post_type='') {
		if ($post_type == 'product')
			$tax = 'product_cat';
		return $tax;
	}
}

// Return true if page title section is allowed
if ( !function_exists( 'happy_baby_woocommerce_allow_override_header_image' ) ) {
	
	function happy_baby_woocommerce_allow_override_header_image($allow=true) {
		return is_product() ? false : $allow;
	}
}

// Return shop page ID
if ( !function_exists( 'happy_baby_woocommerce_get_shop_page_id' ) ) {
	function happy_baby_woocommerce_get_shop_page_id() {
		return get_option('woocommerce_shop_page_id');
	}
}

// Return shop page link
if ( !function_exists( 'happy_baby_woocommerce_get_shop_page_link' ) ) {
	function happy_baby_woocommerce_get_shop_page_link() {
		$url = '';
		$id = happy_baby_woocommerce_get_shop_page_id();
		if ($id) $url = get_permalink($id);
		return $url;
	}
}

// Show categories of the current product
if ( !function_exists( 'happy_baby_woocommerce_get_post_categories' ) ) {
	
	function happy_baby_woocommerce_get_post_categories($cats='') {
		if (get_post_type()=='product') {
			$cats = happy_baby_get_post_terms(', ', get_the_ID(), 'product_cat');
		}
		return $cats;
	}
}

// Add 'product' to the list of the supported post-types
if ( !function_exists( 'happy_baby_woocommerce_list_post_types' ) ) {
	
	function happy_baby_woocommerce_list_post_types($list=array()) {
		$list['product'] = esc_html__('Products', 'happy-baby');
		return $list;
	}
}

// Show price of the current product in the widgets and search results
if ( !function_exists( 'happy_baby_woocommerce_get_post_info' ) ) {
	
	function happy_baby_woocommerce_get_post_info($post_info='') {
		if (get_post_type()=='product') {
			global $product;
			if ( $price_html = $product->get_price_html() ) {
				$post_info = '<div class="post_price product_price price">' . trim($price_html) . '</div>' . $post_info;
			}
		}
		return $post_info;
	}
}

// Show price of the current product in the search results streampage
if ( !function_exists( 'happy_baby_woocommerce_action_before_post_meta' ) ) {
	
	function happy_baby_woocommerce_action_before_post_meta() {
		if (!is_single() && get_post_type()=='product') {
			global $product;
			if ( $price_html = $product->get_price_html() ) {
				?><div class="post_price product_price price"><?php happy_baby_show_layout($price_html); ?></div><?php
			}
		}
	}
}
	
// Enqueue WooCommerce custom styles
if ( !function_exists( 'happy_baby_woocommerce_frontend_scripts' ) ) {
	
	function happy_baby_woocommerce_frontend_scripts() {
			if (happy_baby_is_on(happy_baby_get_theme_option('debug_mode')) && happy_baby_get_file_dir('plugins/woocommerce/woocommerce.css')!='')
				wp_enqueue_style( 'happy-baby-woocommerce',  happy_baby_get_file_url('plugins/woocommerce/woocommerce.css'), array(), null );
			if (happy_baby_is_on(happy_baby_get_theme_option('debug_mode')) && happy_baby_get_file_dir('plugins/woocommerce/woocommerce.js')!='')
				wp_enqueue_script( 'happy-baby-woocommerce', happy_baby_get_file_url('plugins/woocommerce/woocommerce.js'), array('jquery'), null, true );
	}
}
	
// Merge custom styles
if ( !function_exists( 'happy_baby_woocommerce_merge_styles' ) ) {
	
	function happy_baby_woocommerce_merge_styles($list) {
		$list[] = 'plugins/woocommerce/woocommerce.css';
		return $list;
	}
}
	
// Merge custom scripts
if ( !function_exists( 'happy_baby_woocommerce_merge_scripts' ) ) {
	
	function happy_baby_woocommerce_merge_scripts($list) {
		$list[] = 'plugins/woocommerce/woocommerce.js';
		return $list;
	}
}

// Filter to add in the required plugins list
if ( !function_exists( 'happy_baby_woocommerce_tgmpa_required_plugins' ) ) {
	
	function happy_baby_woocommerce_tgmpa_required_plugins($list=array()) {
		if (in_array('woocommerce', happy_baby_storage_get('required_plugins')))
			$list[] = array(
					'name' 		=> esc_html__('WooCommerce', 'happy-baby'),
					'slug' 		=> 'woocommerce',
					'required' 	=> false
				);

		return $list;
	}
}



// Add WooCommerce specific items into lists
//------------------------------------------------------------------------

// Add sidebar
if ( !function_exists( 'happy_baby_woocommerce_list_sidebars' ) ) {
	
	function happy_baby_woocommerce_list_sidebars($list=array()) {
		$list['woocommerce_widgets'] = array(
											'name' => esc_html__('WooCommerce Widgets', 'happy-baby'),
											'description' => esc_html__('Widgets to be shown on the WooCommerce pages', 'happy-baby')
											);
		return $list;
	}
}




// Decorate WooCommerce output: Loop
//------------------------------------------------------------------------

// Add query vars to set products per page
if (!function_exists('happy_baby_woocommerce_pre_get_posts')) {
	
	function happy_baby_woocommerce_pre_get_posts($query) {
		if (!$query->is_main_query()) return;
		if ($query->get('post_type') == 'product') {
			$ppp = get_theme_mod('posts_per_page_shop', 0);
			if ($ppp > 0)
				$query->set('posts_per_page', $ppp);
		}
	}
}


// Before main content
if ( !function_exists( 'happy_baby_woocommerce_wrapper_start' ) ) {
	
	function happy_baby_woocommerce_wrapper_start() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			<article class="post_item_single post_type_product">
			<?php
		} else {
			?>
			<div class="list_products shop_mode_<?php echo !happy_baby_storage_empty('shop_mode') ? happy_baby_storage_get('shop_mode') : 'thumbs'; ?>">
				<div class="list_products_header">
			<?php
		}
	}
}

// After main content
if ( !function_exists( 'happy_baby_woocommerce_wrapper_end' ) ) {
	
	function happy_baby_woocommerce_wrapper_end() {
		if (is_product() || is_cart() || is_checkout() || is_account_page()) {
			?>
			</article><!-- /.post_item_single -->
			<?php
		} else {
			?>
			</div><!-- /.list_products -->
			<?php
		}
	}
}

// Close header section
if ( !function_exists( 'happy_baby_woocommerce_archive_description' ) ) {
	
	function happy_baby_woocommerce_archive_description() {
		?>
		</div><!-- /.list_products_header -->
		<?php
	}
}

// Add list mode buttons
if ( !function_exists( 'happy_baby_woocommerce_before_shop_loop' ) ) {
	
	function happy_baby_woocommerce_before_shop_loop() {
		?>
		<div class="happy_baby_shop_mode_buttons"><form action="<?php echo esc_url(happy_baby_get_current_url()); ?>" method="post"><input type="hidden" name="happy_baby_shop_mode" value="<?php echo esc_attr(happy_baby_storage_get('shop_mode')); ?>" /><a href="#" class="woocommerce_thumbs icon-th" title="<?php esc_attr_e('Show products as thumbs', 'happy-baby'); ?>"></a><a href="#" class="woocommerce_list icon-th-list" title="<?php esc_attr_e('Show products as list', 'happy-baby'); ?>"></a></form></div><!-- /.happy_baby_shop_mode_buttons -->
		<?php
	}
}

// Number of columns for the shop streampage
if ( !function_exists( 'happy_baby_woocommerce_loop_shop_columns' ) ) {
	
	function happy_baby_woocommerce_loop_shop_columns($cols) {
		return max(2, min(4, happy_baby_get_theme_option('blog_columns')));
	}
}

// Add column class into product item in shop streampage
if ( !function_exists( 'happy_baby_woocommerce_loop_shop_columns_class' ) ) {
	
	
	function happy_baby_woocommerce_loop_shop_columns_class($classes, $class='', $cat='') {
		global $woocommerce_loop;
		if (is_product()) {
			if (!empty($woocommerce_loop['columns'])) {
				$classes[] = ' column-1_'.esc_attr($woocommerce_loop['columns']);
			}
		} else if (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) {
			$classes[] = ' column-1_'.esc_attr(max(2, min(4, happy_baby_get_theme_option('blog_columns'))));
		}
		return $classes;
	}
}


// Open item wrapper for categories and products
if ( !function_exists( 'happy_baby_woocommerce_item_wrapper_start' ) ) {
	
	
	function happy_baby_woocommerce_item_wrapper_start($cat='') {
		happy_baby_storage_set('in_product_item', true);
		?>
		<div class="post_item post_layout_<?php echo esc_attr(happy_baby_storage_get('shop_mode')); ?>">
			<div class="post_featured hover_icon">
				<?php do_action('happy_baby_action_woocommerce_item_featured_start'); ?>
				<a href="<?php echo esc_url(is_object($cat) ? get_term_link($cat->slug, 'product_cat') : get_permalink()); ?>">
				<?php
	}
}

// Open item wrapper for categories and products
if ( !function_exists( 'happy_baby_woocommerce_open_item_wrapper' ) ) {
	
	
	function happy_baby_woocommerce_title_wrapper_start($cat='') {
				?></a><?php
					?><div class="mask"></div><?php
					happy_baby_hovers_add_icons('shop', array('cat'=>$cat));
				do_action('happy_baby_action_woocommerce_item_featured_end');
				?>
			</div><!-- /.post_featured -->
			<div class="post_data">
				<div class="post_data_inner">
					<div class="post_header entry-header">
					<?php
	}
}


// Display product's tags before the title
if ( !function_exists( 'happy_baby_woocommerce_title_tags' ) ) {
	
	function happy_baby_woocommerce_title_tags() {
		global $product;
		happy_baby_show_layout(wc_get_product_tag_list( $product->get_id(), ', ', '<div class="post_tags product_tags">', '</div>' ));
	}
}

// Wrap product title into link
if ( !function_exists( 'happy_baby_woocommerce_the_title' ) ) {
	
	function happy_baby_woocommerce_the_title($title) {
		if (happy_baby_storage_get('in_product_item') && get_post_type()=='product') {
			$title = '<a href="'.esc_url(get_permalink()).'">'.esc_html($title).'</a>';
		}
		return $title;
	}
}

// Wrap category title into link
if ( !function_exists( 'happy_baby_woocommerce_shop_loop_subcategory_title' ) ) {
	
	function happy_baby_woocommerce_shop_loop_subcategory_title($cat) {
		if (happy_baby_storage_get('in_product_item') && is_object($cat)) {
			$cat->name = sprintf('<a href="%s">%s</a>', esc_url(get_term_link($cat->slug, 'product_cat')), $cat->name);
		}
		return $cat;
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'happy_baby_woocommerce_title_wrapper_end' ) ) {
	
	function happy_baby_woocommerce_title_wrapper_end() {
			?>
			</div><!-- /.post_header -->
		<?php
		if (happy_baby_storage_get('shop_mode') == 'list' && (is_shop() || is_product_category() || is_product_tag() || is_product_taxonomy()) && !is_product()) {
		    $excerpt = apply_filters('the_excerpt', get_the_excerpt());
			?>
			<div class="post_content entry-content"><?php happy_baby_show_layout($excerpt); ?></div>
			<?php
		}
	}
}

// Add excerpt in output for the product in the list mode
if ( !function_exists( 'happy_baby_woocommerce_title_wrapper_end2' ) ) {
	
	function happy_baby_woocommerce_title_wrapper_end2($category) {
			?>
			</div><!-- /.post_header -->
		<?php
		if (happy_baby_storage_get('shop_mode') == 'list' && is_shop() && !is_product()) {
			?>
			<div class="post_content entry-content"><?php happy_baby_show_layout($category->description); ?></div><!-- /.post_content -->
			<?php
		}
	}
}

// Close item wrapper for categories and products
if ( !function_exists( 'happy_baby_woocommerce_close_item_wrapper' ) ) {
	
	
	function happy_baby_woocommerce_item_wrapper_end($cat='') {
				?>
				</div><!-- /.post_data_inner -->
			</div><!-- /.post_data -->
		</div><!-- /.post_item -->
		<?php
		happy_baby_storage_set('in_product_item', false);
	}
}

// Change text on 'Add to cart' button
if ( ! function_exists( 'happy_baby_woocommerce_add_to_cart_text' ) ) {
    function happy_baby_woocommerce_add_to_cart_text( $text = '' ) {
        global $product;
        return is_object( $product ) && $product->is_in_stock()
        && 'grouped' !== $product->get_type()
        && ( 'external' !== $product->get_type() || $product->get_button_text() == '' )
            ? esc_html__( 'Buy now', 'happy-baby' )
            : $text;
    }
}

// Decorate price
if ( !function_exists( 'happy_baby_woocommerce_get_price_html' ) ) {
	
	function happy_baby_woocommerce_get_price_html($price='') {
		if (!is_admin() && !empty($price)) {
			$sep = get_option('woocommerce_price_decimal_sep');
			if (empty($sep)) $sep = '.';
			$price = preg_replace('/([0-9,]+)(\\'.trim($sep).')([0-9]{2})/', '\\1<span class="decimals">\\3</span>', $price);
		}
		return $price;
	}
}



// Decorate WooCommerce output: Single product
//------------------------------------------------------------------------

// Add WooCommerce specific vars into localize array
if (!function_exists('happy_baby_woocommerce_localize_script')) {
	
	function happy_baby_woocommerce_localize_script($arr) {
		$arr['stretch_tabs_area'] = !happy_baby_sidebar_present() ? happy_baby_get_theme_option('stretch_tabs_area') : 0;
		return $arr;
	}
}

// Add Product ID for the single product
if ( !function_exists( 'happy_baby_woocommerce_show_product_id' ) ) {
	
	function happy_baby_woocommerce_show_product_id() {
		$authors = wp_get_post_terms(get_the_ID(), 'pa_product_author');
		if (is_array($authors) && count($authors)>0) {
			echo '<span class="product_author">'.esc_html__('Author: ', 'happy-baby');
			$delim = '';
			foreach ($authors as $author) {
				echo  esc_html($delim) . '<span>' . esc_html($author->name) . '</span>';
				$delim = ', ';
			}
			echo '</span>';
		}
		echo '<span class="product_id">'.esc_html__('Product ID: ', 'happy-baby') . '<span>' . get_the_ID() . '</span></span>';
	}
}

// Number columns for the product's thumbnails
if ( !function_exists( 'happy_baby_woocommerce_product_thumbnails_columns' ) ) {
	
	function happy_baby_woocommerce_product_thumbnails_columns($cols) {
		return 4;
	}
}

// Set products number for the related products
if ( !function_exists( 'happy_baby_woocommerce_output_related_products_args' ) ) {
	
	function happy_baby_woocommerce_output_related_products_args($args) {
		$args['posts_per_page'] = max(0, min(9, happy_baby_get_theme_option('related_posts')));
		$args['columns'] = max(1, min(4, happy_baby_get_theme_option('related_columns')));
		return $args;
	}
}

// Set columns number for the related products
if ( !function_exists( 'happy_baby_woocommerce_related_products_columns' ) ) {
	
	function happy_baby_woocommerce_related_products_columns($columns) {
		$columns = max(1, min(4, happy_baby_get_theme_option('related_columns')));
		return $columns;
	}
}



// Decorate WooCommerce output: Widgets
//------------------------------------------------------------------------

// Search form
if ( !function_exists( 'happy_baby_woocommerce_get_product_search_form' ) ) {
	
	function happy_baby_woocommerce_get_product_search_form($form) {
		return '
		<form role="search" method="get" class="search_form" action="' . esc_url(home_url('/')) . '">
			<input type="text" class="search_field" placeholder="' . esc_attr__('Search for products &hellip;', 'happy-baby') . '" value="' . get_search_query() . '" name="s" /><button class="search_button" type="submit">' . esc_html__('Search', 'happy-baby') . '</button>
			<input type="hidden" name="post_type" value="product" />
		</form>
		';
	}
}


if ( ! function_exists( 'happy_baby_woocommerce_price_filter_widget_step' ) ) {
    add_filter('woocommerce_price_filter_widget_step', 'happy_baby_woocommerce_price_filter_widget_step');
    function happy_baby_woocommerce_price_filter_widget_step( $step = '' ) {
        $step = 1;
        return $step;
    }
}

// Return current page title
if ( !function_exists( 'happy_baby_woocommerce_get_blog_title' ) ) {

    function happy_baby_woocommerce_get_blog_title($title='') {
        if (is_woocommerce() && is_shop()) {
            $id = happy_baby_woocommerce_get_shop_page_id();
            $title = $id ? get_the_title($id) : esc_html__('Shop', 'happy-baby');
        }
        return $title;
    }
}

// Add plugin-specific colors and fonts to the custom CSS
if (happy_baby_exists_woocommerce()) { require_once HAPPY_BABY_THEME_DIR . 'plugins/woocommerce/woocommerce.styles.php'; }
?>