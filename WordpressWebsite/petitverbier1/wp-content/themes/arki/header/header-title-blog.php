<?php
	/* a template for displaying the single post title */
	
	$post_option = arki_get_post_option(get_the_ID());

	// title style
	if( empty($post_option['blog-title-style']) || $post_option['blog-title-style'] == 'default' ){
		$title_style = arki_get_option('general', 'default-blog-title-style', 'small');
	}else{	
		$title_style = $post_option['blog-title-style'];

		if( $post_option['blog-title-style'] == 'custom' ){
			$title_spacing = empty($post_option['blog-title-padding'])? array(): $post_option['blog-title-padding'];
		}
	}

	// title opacity
	$title_overlay_opacity = empty($post_option['blog-title-background-overlay-opacity'])? '': $post_option['blog-title-background-overlay-opacity'];

	// feature image gradient
	if( empty($post_option['blog-top-bottom-gradient']) || $post_option['blog-top-bottom-gradient'] == 'default' ){
		$header_gradient = arki_get_option('general', 'default-blog-top-bottom-gradient', 'enable');
	}else{
		$header_gradient = $post_option['blog-top-bottom-gradient'];
	}
	
	if( $title_style != 'none' && $title_style != 'inside-content' ){	

		$extra_class = ' arki-style-' . $title_style;

		// background
		if( empty($post_option['blog-feature-image']) || $post_option['blog-feature-image'] == 'default' ){
			$feature_image_pos = arki_get_option('general', 'default-blog-feature-image', 'content');
		}else{
			$feature_image_pos = $post_option['blog-feature-image'];
		}

		if( $feature_image_pos == 'title-background' ){
			$title_background = wp_get_attachment_url(get_post_thumbnail_id());
			$extra_class .= ' arki-feature-image';

		}else if( !empty($post_option['blog-title-background-image']) ){
			if( is_numeric($post_option['blog-title-background-image']) ){
				$title_background = wp_get_attachment_url($post_option['blog-title-background-image']);
			}else{
				$title_background = $post_option['blog-title-background-image'];
			}
		}

		// start printing blog item
		echo '<div class="arki-blog-title-wrap ' . esc_attr($extra_class) . '" ' . gdlr_core_esc_style(array(
			'background-image' => empty($title_background)? '': $title_background
		)) . '>';
		echo '<div class="arki-header-transparent-substitute" ></div>';
		if( $header_gradient == 'enable' || $header_gradient == 'top' ){  
			echo '<div class="arki-blog-title-top-overlay" ></div>';
		}
		echo '<div class="arki-blog-title-overlay" ' . gdlr_core_esc_style(array(
			'opacity' => empty($title_overlay_opacity)? '': $title_overlay_opacity,
			'background-color' => empty($background_overlay_color)? '': $background_overlay_color
		)) . ' ></div>';
		if( $header_gradient == 'enable' || $header_gradient == 'bottom' ){  
			echo '<div class="arki-blog-title-bottom-overlay" ></div>';
		}
		echo '<div class="arki-blog-title-container arki-container" >';
		echo '<div class="arki-blog-title-content arki-item-pdlr" ' . gdlr_core_esc_style(array(
			'padding-top' => empty($title_spacing['padding-top'])? '': $title_spacing['padding-top'],
			'padding-bottom' => empty($title_spacing['padding-bottom'])? '': $title_spacing['padding-bottom']
		)) . ' >';

		get_template_part('content/content-single', 'title');

		echo '</div>'; // arki-page-title-content
		echo '</div>'; // arki-page-title-container
		echo '</div>'; // arki-page-title-wrap

		// breadcrumbs
		if( function_exists('bcn_display') ){
			echo '<div class="arki-breadcrumbs" >';
			echo '<div class="arki-breadcrumbs-container arki-container" >';
			echo '<div class="arki-breadcrumbs-item arki-item-pdlr" >';
       		bcn_display();
       		echo '</div>';
       		echo '</div>';
       		echo '</div>';
    	}

	}else if( $title_style == 'inside-content' ){
		echo '<div class="arki-header-transparent-substitute" ></div>';
	}
?>