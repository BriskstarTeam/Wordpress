<?php
/**
 * The template for displaying 404 pages (not found)
 */

	get_header();
	
	?>
	<div class="arki-not-found-wrap" id="arki-full-no-header-wrap" >
		<div class="arki-not-found-background" ></div>
		<div class="arki-not-found-container arki-container">
			<div class="arki-header-transparent-substitute" ></div>
	
			<div class="arki-not-found-content arki-item-pdlr">
			<?php
				echo '<h1 class="arki-not-found-head" >' . esc_html__('404', 'arki') . '</h1>';
				echo '<h3 class="arki-not-found-title arki-content-font" >' . esc_html__('Page Not Found', 'arki') . '</h3>';
				echo '<div class="arki-not-found-caption" >' . esc_html__('Sorry, we couldn\'t find the page you\'re looking for.', 'arki') . '</div>';

				echo '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">';
				echo '<input type="text" class="search-field arki-title-font" placeholder="' . esc_attr__('Type Keywords...', 'arki') . '" value="" name="s">';
				echo '<div class="arki-top-search-submit"><i class="fa fa-search" ></i></div>';
				echo '<input type="submit" class="search-submit" value="Search">';
				echo '</form>';
				echo '<div class="arki-not-found-back-to-home" ><a href="' . esc_url(home_url('/')) . '" >' . esc_html__('Or Back To Homepage', 'arki') . '</a></div>';
			?>
			</div>
		</div>
	</div>
	<?php

	get_footer(); 
