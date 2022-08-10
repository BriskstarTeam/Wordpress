<?php
/**
 * The main template file
 */

	get_header();

	if( have_posts() ){

		$sidebar_type = arki_get_option('general', 'archive-blog-sidebar', 'none');
		$sidebar_left = arki_get_option('general', 'archive-blog-sidebar-left');
		$sidebar_right = arki_get_option('general', 'archive-blog-sidebar-right');

		if( $sidebar_type == 'left' && !is_active_sidebar($sidebar_left) ){
			$sidebar_type = 'none';
		}
		if( $sidebar_type == 'right' && !is_active_sidebar($sidebar_right) ){
			$sidebar_type = 'none';
		}
	
		echo '<div class="arki-content-container arki-container">';
		echo '<div class="' . esc_attr(arki_get_sidebar_wrap_class($sidebar_type)) . '" >';

		// sidebar content
		echo '<div class="' . esc_attr(arki_get_sidebar_class(array('sidebar-type'=>$sidebar_type, 'section'=>'center'))) . '" >';
		
		if( class_exists('gdlr_core_pb_element_blog')  ){

			get_template_part('content/archive', 'blog');

		}else{

			get_template_part('content/archive', 'default');
			
		}

		echo '</div>'; // arki-get-sidebar-class

		// sidebar left
		if( $sidebar_type == 'left' || $sidebar_type == 'both' ){
			echo arki_get_sidebar($sidebar_type, 'left', $sidebar_left);
		}

		// sidebar right
		if( $sidebar_type == 'right' || $sidebar_type == 'both' ){
			echo arki_get_sidebar($sidebar_type, 'right', $sidebar_right);
		}

		echo '</div>'; // arki-get-sidebar-wrap-class
	 	echo '</div>'; // arki-content-container
	 	
	 }

	get_footer(); 
?>