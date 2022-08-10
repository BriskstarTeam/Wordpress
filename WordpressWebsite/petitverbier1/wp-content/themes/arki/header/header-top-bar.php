<?php
	/* a template for displaying the top bar */

	if( arki_get_option('general', 'enable-top-bar', 'enable') == 'enable' ){

		$top_bar_width = arki_get_option('general', 'top-bar-width', 'boxed');
		$top_bar_container_class = '';

		if( $top_bar_width == 'boxed' ){
			$top_bar_container_class = 'arki-container ';
		}else if( $top_bar_width == 'custom' ){
			$top_bar_container_class = 'arki-top-bar-custom-container ';
		}else{
			$top_bar_container_class = 'arki-top-bar-full ';
		}

		$top_bar_menu = arki_get_option('general', 'top-bar-menu-position', 'none');
		$top_bar_social = arki_get_option('general', 'enable-top-bar-social', 'enable');
		$top_bar_social_position = arki_get_option('general', 'top-bar-social-position', 'right');

		echo '<div class="arki-top-bar" >';
		echo '<div class="arki-top-bar-background" ></div>';
		echo '<div class="arki-top-bar-container ' . esc_attr($top_bar_container_class) . '" >';
		echo '<div class="arki-top-bar-container-inner clearfix" >';

		$center_text = arki_get_option('general', 'top-bar-center-text', '');
		if( !empty($center_text) ){
			echo '<div class="arki-top-bar-center-text arki-item-pdlr">';
			echo gdlr_core_escape_content(gdlr_core_text_filter($center_text));
			echo '</div>';
		}

		$language_flag = arki_get_wpml_flag();
		$left_text = arki_get_option('general', 'top-bar-left-text', '');
		if( !empty($left_text) || !empty($language_flag) || ($top_bar_menu == 'left' && has_nav_menu('top_bar_menu')) ||
			($top_bar_social == 'enable' && $top_bar_social_position == 'left') ){

			echo '<div class="arki-top-bar-left arki-item-pdlr">';
			echo '<div class="arki-top-bar-left-text">';
			if( $top_bar_menu == 'left' ){
				arki_get_top_bar_menu('left');
			}
			echo gdlr_core_escape_content($language_flag);
			echo gdlr_core_escape_content(gdlr_core_text_filter($left_text));
			echo '</div>';

			// social
			if( $top_bar_social == 'enable' && $top_bar_social_position == 'left' ){
				echo '<div class="arki-top-bar-right-social" >';
				get_template_part('header/header', 'social');
				echo '</div>';	
			}
			echo '</div>';
		}

		$right_text = arki_get_option('general', 'top-bar-right-text', '');
		$custom_top_bar_right = apply_filters('arki_custom_top_bar_right', ''); 
		if( !empty($right_text) || $top_bar_social == 'enable' || !empty($custom_top_bar_right) ||
			($top_bar_menu == 'right' && has_nav_menu('top_bar_menu')) ){
			echo '<div class="arki-top-bar-right arki-item-pdlr">';
			if( $top_bar_menu == 'right' ){
				arki_get_top_bar_menu('right');
			}

			if( !empty($right_text) ){
				echo '<div class="arki-top-bar-right-text">';
				echo gdlr_core_escape_content(gdlr_core_text_filter($right_text));
				echo '</div>';
			}

			if( $top_bar_social == 'enable' && $top_bar_social_position == 'right' ){
				echo '<div class="arki-top-bar-right-social" >';
				get_template_part('header/header', 'social');
				echo '</div>';	

				$top_bar_social = 'disable';
			}

			if( !empty($custom_top_bar_right) ){
				echo gdlr_core_text_filter($custom_top_bar_right);
			}
			echo '</div>';	
		}
		echo '</div>'; // arki-top-bar-container-inner
		echo '</div>'; // arki-top-bar-container
		echo '</div>'; // arki-top-bar

	}  // top bar
?>