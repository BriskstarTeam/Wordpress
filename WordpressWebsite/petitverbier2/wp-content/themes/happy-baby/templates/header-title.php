<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

// Page (category, tag, archive, author) title

if ( happy_baby_need_page_title() ) {
	happy_baby_sc_layouts_showed('title', true);
	happy_baby_sc_layouts_showed('postmeta', false);
	?>
	<div class="top_panel_title sc_layouts_row sc_layouts_row_type_normal">
		<div class="content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Post meta on the single post
						if ( false && is_single() )  {
							?><div class="sc_layouts_title_meta"><?php
								happy_baby_show_post_meta(apply_filters('happy_baby_filter_post_meta_args', array(
									'components' => 'categories,date,counters,edit',
									'counters' => 'views,comments,likes',
									'seo' => true
									), 'header', 1)
								);
							?></div><?php
						}
						
						// Blog/Post title
						?><div class="sc_layouts_title_title"><?php
							$happy_baby_blog_title = happy_baby_get_blog_title();
							$happy_baby_blog_title_text = $happy_baby_blog_title_class = $happy_baby_blog_title_link = $happy_baby_blog_title_link_text = '';
							if (is_array($happy_baby_blog_title)) {
								$happy_baby_blog_title_text = $happy_baby_blog_title['text'];
								$happy_baby_blog_title_class = !empty($happy_baby_blog_title['class']) ? ' '.$happy_baby_blog_title['class'] : '';
								$happy_baby_blog_title_link = !empty($happy_baby_blog_title['link']) ? $happy_baby_blog_title['link'] : '';
								$happy_baby_blog_title_link_text = !empty($happy_baby_blog_title['link_text']) ? $happy_baby_blog_title['link_text'] : '';
							} else
								$happy_baby_blog_title_text = $happy_baby_blog_title;
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr($happy_baby_blog_title_class); ?>"><?php
								$happy_baby_top_icon = happy_baby_get_category_icon();
								if (!empty($happy_baby_top_icon)) {
									$happy_baby_attr = happy_baby_getimagesize($happy_baby_top_icon);
									?><img src="<?php echo esc_url($happy_baby_top_icon); ?>" alt="<?php echo esc_attr(basename($happy_baby_top_icon)); ?>" <?php if (!empty($happy_baby_attr[3])) happy_baby_show_layout($happy_baby_attr[3]);?>><?php
								}
								echo wp_kses($happy_baby_blog_title_text, 'happy_baby_kses_content');
							?></h1>
							<?php
							if (!empty($happy_baby_blog_title_link) && !empty($happy_baby_blog_title_link_text)) {
								?><a href="<?php echo esc_url($happy_baby_blog_title_link); ?>" class="theme_button theme_button_small sc_layouts_title_link"><?php echo esc_html($happy_baby_blog_title_link_text); ?></a><?php
							}
							
							// Category/Tag description
							if ( is_category() || is_tag() || is_tax() ) 
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
		
						?></div><?php
	
						// Breadcrumbs
						?><div class="sc_layouts_title_breadcrumbs"><?php
							do_action( 'happy_baby_action_breadcrumbs');
						?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>