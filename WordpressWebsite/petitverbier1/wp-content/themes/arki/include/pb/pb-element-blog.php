<?php 

	add_filter('gdlr_core_blog_info_prefix', 'arki_gdlr_core_blog_info_prefix');
	if( !function_exists('arki_gdlr_core_blog_info_prefix') ){
		function arki_gdlr_core_blog_info_prefix(){
			return array(
				'date' => '<i class="icon-clock" ></i>',
				'tag' => '<i class="icon-tag" ></i>',
				'category' => '<i class="icon-folder" ></i>',
				'comment' => '<i class="fa fa-comments-o" ></i>',
				'like' => '<i class="icon-heart" ></i>',
				'author' => '<i class="icon-user" ></i>',
				'comment-number' => '<i class="fa fa-comments-o" ></i>',
			);
		}
	}


	// add_filter('gdlr_core_blog_item_options', 'arki_gdlr_core_blog_item_options');
	if( !function_exists('arki_gdlr_core_blog_item_options') ){
		function arki_gdlr_core_blog_item_options($options){
			if( !empty($options['settings']['options']) ){
				$options['settings']['options'] = gdlr_core_array_insert($options['settings']['options'], 'blog-style', array(
					'blog-widget-with-feature' => array(
						'title' => esc_html__('Blog Widget With Feature', 'arki'),
						'type' => 'checkbox',
						'default' => 'disable',
						'condition' => array( 'blog-style'=> 'blog-widget' ),
						'description' => esc_html__('Feature area will take the first column if multiple column is selected', 'arki')
					)
				));

				$options['settings']['options']['blog-style']['options']['blog-widget'] = get_template_directory_uri() . '/images/blog-thumbnail-featured-widget.jpg';

				unset($options['settings']['options']['blog-widget-bottom-divider']);
				unset($options['settings']['options']['item-size']);
			}
			return $options;
		}
	}

	// add_filter('gdlr_core_blog_style_content', 'arki_gdlr_core_blog_style_content', 10, 3);
	if( !function_exists('arki_gdlr_core_blog_style_content') ){
		function arki_gdlr_core_blog_style_content($ret, $args, $blog_style){

			if( in_array($args['blog-style'], array('blog-column', 'blog-column-with-frame', 'blog-column-no-space')) ){
				if( empty($args['blog-column-style']) || $args['blog-column-style'] == 'style-1' ){
					return arki_gdlr_core_blog_grid( $args, $blog_style );
				}
			}else if( $args['blog-style'] == 'blog-widget' ){
				return arki_gdlr_core_blog_widget( $args, $blog_style );
			}

			return $ret;
		}
	}