<?php
/**
 * The template part for displaying single posts
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="arki-single-article clearfix" >
		<?php
			// print post title
			$post_type = get_post_type();
			$blog_style = arki_get_option('general', 'blog-style', 'style-1');
			if( $post_type == 'post' ){

				$post_option = arki_get_post_option(get_the_ID());

				if( empty($post_option['blog-feature-image']) || $post_option['blog-feature-image'] == 'default' ){
					$feature_image_pos = arki_get_option('general', 'default-blog-feature-image', 'content');
				}else{
					$feature_image_pos = $post_option['blog-feature-image'];
				}
				if( empty($post_option['blog-title-style']) || $post_option['blog-title-style'] == 'default' ){
					$title_style = arki_get_option('general', 'default-blog-title-style', 'small');
				}else{	
					$title_style = $post_option['blog-title-style'];
				}

				// post title
				if( $blog_style == 'style-4' && $title_style == 'inside-content' ){
					get_template_part('content/content-single', 'title');
				}

				// feature image 
				$post_format = get_post_format();
				if( empty($post_format) ){
					if( $feature_image_pos == 'content' ){
						$feature_image = get_post_thumbnail_id();
						if( !empty($feature_image) ){
							$thumbnail_size = arki_get_option('general', 'blog-thumbnail-size', 'full');

							echo '<div class="arki-single-article-thumbnail arki-media-image" >';
							echo gdlr_core_get_image($feature_image, $thumbnail_size);
							echo '</div>';
						}
					}
				}else{
					get_template_part('content/content-thumbnail', $post_format);
				}

				// post title
				if( $blog_style != 'style-4' && $title_style == 'inside-content' ){
					get_template_part('content/content-single', 'title');
				}
			}

			echo '<div class="arki-single-article-content">';
			// social share
			$blog_style = arki_get_option('general', 'blog-style', 'style-1');
			if( $blog_style == 'magazine' && arki_get_option('general', 'blog-social-share', 'enable') == 'enable' ){
				if( class_exists('gdlr_core_pb_element_social_share') ){
					$share_count = (arki_get_option('general', 'blog-social-share-count', 'enable') == 'enable')? 'counter': 'none';

					echo '<div class="arki-single-social-share arki-item-rvpdlr" >';
					echo gdlr_core_pb_element_social_share::get_content(array(
						'social-head' => $share_count,
						'style'=>'color',
						'layout'=>'right-text', 
						'text-align'=>'left',
						'facebook'=>arki_get_option('general', 'blog-social-facebook', 'enable'),
						'linkedin'=>arki_get_option('general', 'blog-social-linkedin', 'enable'),
						'pinterest'=>arki_get_option('general', 'blog-social-pinterest', 'enable'),
						'stumbleupon'=>arki_get_option('general', 'blog-social-stumbleupon', 'enable'),
						'twitter'=>arki_get_option('general', 'blog-social-twitter', 'enable'),
						'email'=>arki_get_option('general', 'blog-social-email', 'enable'),
						'padding-bottom'=>'0px'
					));
					echo '</div>';
				}
			}

			// content
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links">',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '%',
				'separator'   => '',
			) );
			echo '</div>';
		?>
	</div><!-- arki-single-article -->
</article><!-- post-id -->
