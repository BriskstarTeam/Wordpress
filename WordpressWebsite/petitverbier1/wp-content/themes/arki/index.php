<?php
/**
 * The main template file
 */ 


	get_header();

	echo '<div class="arki-content-container arki-container">';
	echo '<div class="arki-sidebar-style-none" >'; // for max width

	get_template_part('content/archive', 'default');

	echo '</div>'; // arki-content-area
	echo '</div>'; // arki-content-container

	get_footer(); 
