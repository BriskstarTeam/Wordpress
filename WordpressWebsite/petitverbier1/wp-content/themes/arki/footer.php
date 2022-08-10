<?php
/**
 * The template for displaying the footer
 */
	
	$post_option = arki_get_post_option(get_the_ID());
	if( empty($post_option['enable-footer']) || $post_option['enable-footer'] == 'default' ){
		$enable_footer = arki_get_option('general', 'enable-footer', 'enable');
	}else{
		$enable_footer = $post_option['enable-footer'];
	}	
	if( empty($post_option['enable-copyright']) || $post_option['enable-copyright'] == 'default' ){
		$enable_copyright = arki_get_option('general', 'enable-copyright', 'enable');
	}else{
		$enable_copyright = $post_option['enable-copyright'];
	}

	$fixed_footer = arki_get_option('general', 'fixed-footer', 'disable');
	echo '</div>'; // arki-page-wrapper

	if( $enable_footer == 'enable' || $enable_copyright == 'enable' ){

		if( $fixed_footer == 'enable' ){
			echo '</div>'; // arki-body-wrapper

			echo '<footer class="arki-fixed-footer" id="arki-fixed-footer" >';
		}else{
			echo '<footer>';
		}

		if( $enable_footer == 'enable' ){

			$arki_footer_layout = array(
				'footer-1'=>array('arki-column-60'),
				'footer-2'=>array('arki-column-15', 'arki-column-15', 'arki-column-15', 'arki-column-15'),
				'footer-3'=>array('arki-column-15', 'arki-column-15', 'arki-column-30',),
				'footer-4'=>array('arki-column-20', 'arki-column-20', 'arki-column-20'),
				'footer-5'=>array('arki-column-20', 'arki-column-40'),
				'footer-6'=>array('arki-column-40', 'arki-column-20'),
			);
			$footer_style = arki_get_option('general', 'footer-style');
			$footer_style = empty($footer_style)? 'footer-2': $footer_style;

			$count = 0;
			$has_widget = false;
			foreach( $arki_footer_layout[$footer_style] as $layout ){ $count++;
				if( is_active_sidebar('footer-' . $count) ){ $has_widget = true; }
			}

			if( $has_widget ){ 	

				$footer_column_divider = arki_get_option('general', 'enable-footer-column-divider', 'enable');
				$extra_class  = ($footer_column_divider == 'enable')? ' arki-with-column-divider': '';

				echo '<div class="arki-footer-wrapper ' . esc_attr($extra_class) . '" >';
				echo '<div class="arki-footer-container arki-container clearfix" >';
				
				$count = 0;
				foreach( $arki_footer_layout[$footer_style] as $layout ){ $count++;
					echo '<div class="arki-footer-column arki-item-pdlr ' . esc_attr($layout) . '" >';
					if( is_active_sidebar('footer-' . $count) ){
						dynamic_sidebar('footer-' . $count); 
					}
					echo '</div>';
				}
				
				echo '</div>'; // arki-footer-container
				echo '</div>'; // arki-footer-wrapper 
			}
		} // enable footer

		if( $enable_copyright == 'enable' ){
			$copyright_style = arki_get_option('general', 'copyright-style', 'center');
			
			if( $copyright_style == 'center' ){
				$copyright_text = arki_get_option('general', 'copyright-text');

				if( !empty($copyright_text) ){
					echo '<div class="arki-copyright-wrapper" >';
					echo '<div class="arki-copyright-container arki-container">';
					echo '<div class="arki-copyright-text arki-item-pdlr">';
					echo gdlr_core_escape_content(gdlr_core_text_filter($copyright_text));
					echo '</div>';
					echo '</div>';
					echo '</div>'; // arki-copyright-wrapper
				}
			}else if( $copyright_style == 'left-right' ){
				$copyright_left = arki_get_option('general', 'copyright-left');
				$copyright_right = arki_get_option('general', 'copyright-right');

				if( !empty($copyright_left) || !empty($copyright_right) ){
					echo '<div class="arki-copyright-wrapper" >';
					echo '<div class="arki-copyright-container arki-container clearfix">';
					if( !empty($copyright_left) ){
						echo '<div class="arki-copyright-left arki-item-pdlr">';
						echo gdlr_core_escape_content(gdlr_core_text_filter($copyright_left));
						echo '</div>';
					}

					if( !empty($copyright_right) ){
						echo '<div class="arki-copyright-right arki-item-pdlr">';
						echo gdlr_core_escape_content(gdlr_core_text_filter($copyright_right));
						echo '</div>';
					}
					echo '</div>';
					echo '</div>'; // arki-copyright-wrapper
				}
			}
		}

		echo '</footer>';

		if( $fixed_footer == 'disable' ){
			echo '</div>'; // arki-body-wrapper
		}
		echo '</div>'; // arki-body-outer-wrapper

	// disable footer	
	}else{
		echo '</div>'; // arki-body-wrapper
		echo '</div>'; // arki-body-outer-wrapper
	}

	$header_style = arki_get_option('general', 'header-style', 'plain');
	
	if( $header_style == 'side' || $header_style == 'side-toggle' ){
		echo '</div>'; // arki-header-side-nav-content
	}

	$back_to_top = arki_get_option('general', 'enable-back-to-top', 'disable');
	if( $back_to_top == 'enable' ){
		echo '<a href="#arki-top-anchor" class="arki-footer-back-to-top-button" id="arki-footer-back-to-top-button"><i class="fa fa-angle-up" ></i></a>';
	}

	// side content menu
	$side_content_menu = (arki_get_option('general', 'side-content-menu', 'disable') == 'enable')? true: false;
	if( $side_content_menu ){
		$side_content_widget = arki_get_option('general', 'side-content-widget', '');	

		if( is_active_sidebar($side_content_widget) ){ 
			echo '<div id="arki-side-content-menu" >';
			echo '<i class="arki-side-content-menu-close ion-android-close" ></i>';
			dynamic_sidebar($side_content_widget); 
			echo '</div>';
		}
	}		
?>

<?php wp_footer(); ?>

</body>
</html>