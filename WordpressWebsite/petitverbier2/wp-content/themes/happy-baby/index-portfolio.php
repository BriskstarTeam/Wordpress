<?php
/**
 * The template for homepage posts with "Portfolio" style
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

happy_baby_storage_set('blog_archive', true);

// Load scripts for both 'Gallery' and 'Portfolio' layouts!
wp_enqueue_script( 'imagesloaded' );
wp_enqueue_script( 'masonry' );
wp_enqueue_script( 'classie', happy_baby_get_file_url('js/theme.gallery/classie.min.js'), array(), null, true );
wp_enqueue_script( 'happy-baby-gallery-script', happy_baby_get_file_url('js/theme.gallery/theme.gallery.js'), array(), null, true );

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	$happy_baby_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$happy_baby_sticky_out = happy_baby_get_theme_option('sticky_style')=='columns' 
							&& is_array($happy_baby_stickies) && count($happy_baby_stickies) > 0 && get_query_var( 'paged' ) < 1;
	
	// Show filters
	$happy_baby_cat = happy_baby_get_theme_option('parent_cat');
	$happy_baby_post_type = happy_baby_get_theme_option('post_type');
	$happy_baby_taxonomy = happy_baby_get_post_type_taxonomy($happy_baby_post_type);
	$happy_baby_show_filters = happy_baby_get_theme_option('show_filters');
	$happy_baby_tabs = array();
	if (!happy_baby_is_off($happy_baby_show_filters)) {
		$happy_baby_args = array(
			'type'			=> $happy_baby_post_type,
			'child_of'		=> $happy_baby_cat,
			'orderby'		=> 'name',
			'order'			=> 'ASC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 0,
			'exclude'		=> '',
			'number'		=> '',
			'taxonomy'		=> $happy_baby_taxonomy,
			'pad_counts'	=> false
		);
		$happy_baby_portfolio_list = get_terms($happy_baby_args);
		if (is_array($happy_baby_portfolio_list) && count($happy_baby_portfolio_list) > 0) {
			$happy_baby_tabs[$happy_baby_cat] = esc_html__('All', 'happy-baby');
			foreach ($happy_baby_portfolio_list as $happy_baby_term) {
				if (isset($happy_baby_term->term_id)) $happy_baby_tabs[$happy_baby_term->term_id] = $happy_baby_term->name;
			}
		}
	}
	if (count($happy_baby_tabs) > 0) {
		$happy_baby_portfolio_filters_ajax = true;
		$happy_baby_portfolio_filters_active = $happy_baby_cat;
		$happy_baby_portfolio_filters_id = 'portfolio_filters';
		if (!is_customize_preview())
			wp_enqueue_script('jquery-ui-tabs', false, array('jquery', 'jquery-ui-core'), null, true);
		?>
		<div class="portfolio_filters happy_baby_tabs happy_baby_tabs_ajax">
			<ul class="portfolio_titles happy_baby_tabs_titles">
				<?php
				foreach ($happy_baby_tabs as $happy_baby_id=>$happy_baby_title) {
					?><li><a href="<?php echo esc_url(happy_baby_get_hash_link(sprintf('#%s_%s_content', $happy_baby_portfolio_filters_id, $happy_baby_id))); ?>" data-tab="<?php echo esc_attr($happy_baby_id); ?>"><?php echo esc_html($happy_baby_title); ?></a></li><?php
				}
				?>
			</ul>
			<?php
			$happy_baby_ppp = happy_baby_get_theme_option('posts_per_page');
			if (happy_baby_is_inherit($happy_baby_ppp)) $happy_baby_ppp = '';
			foreach ($happy_baby_tabs as $happy_baby_id=>$happy_baby_title) {
				$happy_baby_portfolio_need_content = $happy_baby_id==$happy_baby_portfolio_filters_active || !$happy_baby_portfolio_filters_ajax;
				?>
				<div id="<?php echo esc_attr(sprintf('%s_%s_content', $happy_baby_portfolio_filters_id, $happy_baby_id)); ?>"
					class="portfolio_content happy_baby_tabs_content"
					data-blog-template="<?php echo esc_attr(happy_baby_storage_get('blog_template')); ?>"
					data-blog-style="<?php echo esc_attr(happy_baby_get_theme_option('blog_style')); ?>"
					data-posts-per-page="<?php echo esc_attr($happy_baby_ppp); ?>"
					data-post-type="<?php echo esc_attr($happy_baby_post_type); ?>"
					data-taxonomy="<?php echo esc_attr($happy_baby_taxonomy); ?>"
					data-cat="<?php echo esc_attr($happy_baby_id); ?>"
					data-parent-cat="<?php echo esc_attr($happy_baby_cat); ?>"
					data-need-content="<?php echo (false===$happy_baby_portfolio_need_content ? 'true' : 'false'); ?>"
				>
					<?php
					if ($happy_baby_portfolio_need_content) 
						happy_baby_show_portfolio_posts(array(
							'cat' => $happy_baby_id,
							'parent_cat' => $happy_baby_cat,
							'taxonomy' => $happy_baby_taxonomy,
							'post_type' => $happy_baby_post_type,
							'page' => 1,
							'sticky' => $happy_baby_sticky_out
							)
						);
					?>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	} else {
		happy_baby_show_portfolio_posts(array(
			'cat' => $happy_baby_cat,
			'parent_cat' => $happy_baby_cat,
			'taxonomy' => $happy_baby_taxonomy,
			'post_type' => $happy_baby_post_type,
			'page' => 1,
			'sticky' => $happy_baby_sticky_out
			)
		);
	}

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>