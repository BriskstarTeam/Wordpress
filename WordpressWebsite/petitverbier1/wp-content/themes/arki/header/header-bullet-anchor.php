<?php
	/* a template for displaying the header social network */

	$post_option = arki_get_post_option(get_the_ID());
	if( !empty($post_option['bullet-anchor']) ){

		echo '<div class="arki-bullet-anchor" id="arki-bullet-anchor" >';
		echo '<a class="arki-bullet-anchor-link current-menu-item" href="' . get_permalink() . '" ></a>';
		foreach( $post_option['bullet-anchor'] as $anchor ){
			echo '<a class="arki-bullet-anchor-link" href="' . esc_url($anchor['title']) . '" ></a>';
		}
		echo '</div>';
	}