<?php
/**
 * Theme Options and overrides support
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.29
 */


// -----------------------------------------------------------------
// -- Meta-overrides
// -----------------------------------------------------------------

if ( !function_exists('happy_baby_options_override_init') ) {
	add_action( 'after_setup_theme', 'happy_baby_options_override_init' );
	function happy_baby_options_override_init() {
		if ( is_admin() ) {
			add_action('admin_enqueue_scripts',	'happy_baby_options_override_add_scripts');
			add_action('save_post',				'happy_baby_options_override_save_options');

		}
	}
}
	
// Load required styles and scripts for admin mode
if ( !function_exists( 'happy_baby_options_override_add_scripts' ) ) {
	
	function happy_baby_options_override_add_scripts() {
		// If current screen is 'Edit Page' - load font icons
		$screen = function_exists('get_current_screen') ? get_current_screen() : false;
		if (is_object($screen) && happy_baby_options_allow_override(!empty($screen->post_type) ? $screen->post_type : $screen->id)) {
			wp_enqueue_style( 'fontello-icons',  happy_baby_get_file_url('css/font-icons/css/fontello-embedded.css') );
			wp_enqueue_script( 'jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true );
			wp_enqueue_script( 'jquery-ui-accordion', false, array('jquery', 'jquery-ui-core'), null, true );
			wp_enqueue_script( 'happy-baby-options', happy_baby_get_file_url('theme-options/theme.options.js'), array('jquery'), null, true );
			wp_localize_script( 'happy-baby-options', 'happy_baby_dependencies', happy_baby_get_theme_dependencies() );
		}
	}
}


// Check if override is allow
if (!function_exists('happy_baby_options_allow_override')) {
	function happy_baby_options_allow_override($post_type) {
		return apply_filters('"happy_baby_filter_allow_override', in_array($post_type, array('page', 'post')), $post_type);
	}
}

// Add overriden options
if (!function_exists('happy_baby_options_override_add_options')) {
    add_filter('happy_baby_filter_override_options', 'happy_baby_options_override_add_options');
    function happy_baby_options_override_add_options($list) {
        global $post_type;
        if (happy_baby_options_allow_override($post_type)) {
            $list[] = array(sprintf('happy_baby_override_options_%s', $post_type),
                esc_html__('Theme Options', 'happy-baby'),
                'happy_baby_options_override_show',
                $post_type,
                $post_type=='post' ? 'side' : 'advanced',
                'default'
            );
        }
        return $list;
    }
}


// Callback function to show fields in override
if (!function_exists('happy_baby_options_override_show')) {
	function happy_baby_options_override_show() {
		global $post, $post_type;
		if (happy_baby_options_allow_override($post_type)) {
			// Load saved options
			$meta = get_post_meta($post->ID, 'happy_baby_options', true);
			$tabs_titles = $tabs_content = array();
			global $HAPPY_BABY_STORAGE;
			// Refresh linked data if this field is controller for the another (linked) field
			// Do this before show fields to refresh data in the $HAPPY_BABY_STORAGE
			foreach ($HAPPY_BABY_STORAGE['options'] as $k=>$v) {

				if (!isset($v['override']) || strpos($v['override']['mode'], $post_type)===false) continue;
				if (!empty($v['linked'])) {

					$v['val'] = isset($meta[$k]) ? $meta[$k] : 'inherit';
					if (!empty($v['val']) && !happy_baby_is_inherit($v['val']))
						happy_baby_refresh_linked_data($v['val'], $v['linked']);
				}
			}
			// Show fields
			foreach ($HAPPY_BABY_STORAGE['options'] as $k=>$v) {
				if (!isset($v['override']) || strpos($v['override']['mode'], $post_type)===false) continue;
				if (empty($v['override']['section']))
					$v['override']['section'] = esc_html__('General', 'happy-baby');
				if (!isset($tabs_titles[$v['override']['section']])) {
					$tabs_titles[$v['override']['section']] = $v['override']['section'];
					$tabs_content[$v['override']['section']] = '';
				}
				$v['val'] = isset($meta[$k]) ? $meta[$k] : 'inherit';
				$tabs_content[$v['override']['section']] .= happy_baby_options_show_field($k, $v, $post_type);
			}
			if (count($tabs_titles) > 0) {
				?>
				<div class="happy_baby_options happy_baby_override">
					<input type="hidden" name="override_post_nonce" value="<?php echo esc_attr(wp_create_nonce(admin_url())); ?>" />
					<input type="hidden" name="override_post_type" value="<?php echo esc_attr($post_type); ?>" />
					<div id="happy_baby_options_tabs">
						<ul><?php
							$cnt = 0;
							foreach ($tabs_titles as $k=>$v) {
								$cnt++;
								?><li><a href="#happy_baby_options_<?php echo esc_attr($cnt); ?>"><?php echo esc_html($v); ?></a></li><?php
							}
						?></ul>
						<?php
							$cnt = 0;
							foreach ($tabs_content as $k=>$v) {
								$cnt++;
								?>
								<div id="happy_baby_options_<?php echo esc_attr($cnt); ?>" class="happy_baby_options_section">
									<?php happy_baby_show_layout($v); ?>
								</div>
								<?php
							}
						?>
					</div>
				</div>
				<?php
			}
		}
	}
}


// Save data from override
if (!function_exists('happy_baby_options_override_save_options')) {
	
	function happy_baby_options_override_save_options($post_id) {

		// verify nonce
		if ( !wp_verify_nonce( happy_baby_get_value_gp('override_post_nonce'), admin_url() ) )
			return $post_id;

		// check autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}

		$post_type = isset($_POST['override_post_type']) ? happy_baby_get_value_gpc('override_post_type') : happy_baby_get_value_gpc('post_type');

		// check permissions
		$capability = 'page';
		$post_types = get_post_types( array( 'name' => $post_type), 'objects' );
		if (!empty($post_types) && is_array($post_types)) {
			foreach ($post_types  as $type) {
				$capability = $type->capability_type;
				break;
			}
		}
		if (!current_user_can('edit_'.($capability), $post_id)) {
			return $post_id;
		}

		// Save meta
		$meta = array();
		$options = happy_baby_storage_get('options');
		foreach ($options as $k=>$v) {
			// Skip not overriden options
			if (!isset($v['override']) || strpos($v['override']['mode'], $post_type)===false) continue;
			// Skip inherited options
			if (!empty($_POST['happy_baby_options_inherit_' . $k])) continue;
			// Get option value from POST
			$meta[$k] = isset($_POST['happy_baby_options_field_' . $k])
							? happy_baby_get_value_gp('happy_baby_options_field_' . $k)
							: ($v['type']=='checkbox' ? 0 : '');
		}
		update_post_meta($post_id, 'happy_baby_options', $meta);
		
		// Save separate meta options to search template pages
		if ($post_type=='page' && !empty($_POST['page_template']) && $_POST['page_template']=='blog.php') {
			update_post_meta($post_id, 'happy_baby_options_post_type', isset($meta['post_type']) ? $meta['post_type'] : 'post');
			update_post_meta($post_id, 'happy_baby_options_parent_cat', isset($meta['parent_cat']) ? $meta['parent_cat'] : 0);
		}
	}
}
?>