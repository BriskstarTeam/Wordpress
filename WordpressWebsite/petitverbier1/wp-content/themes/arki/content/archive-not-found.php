<?php
/**
 * The template for displaying archive not found
 */

	echo '<div class="arki-not-found-wrap" id="arki-full-no-header-wrap" >';
	echo '<div class="arki-not-found-background" ></div>';
	echo '<div class="arki-not-found-container arki-container">';
	echo '<div class="arki-header-transparent-substitute" ></div>';
	
	echo '<div class="arki-not-found-content arki-item-pdlr">';
	echo '<h1 class="arki-not-found-head" >' . esc_html__('Not Found', 'arki') . '</h1>';
	echo '<div class="arki-not-found-caption" >' . esc_html__('Nothing matched your search criteria. Please try again with different keywords.', 'arki') . '</div>';

	echo '<form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">';
	echo '<input type="text" class="search-field arki-title-font" placeholder="' . esc_attr__('Type Keywords...', 'arki') . '" value="" name="s">';
	echo '<div class="arki-top-search-submit"><i class="fa fa-search" ></i></div>';
	echo '<input type="submit" class="search-submit" value="Search">';
	echo '</form>';
	echo '<div class="arki-not-found-back-to-home" ><a href="' . esc_url(home_url('/')) . '" >' . esc_html__('Or Back To Homepage', 'arki') . '</a></div>';
	echo '</div>'; // arki-not-found-content

	echo '</div>'; // arki-not-found-container
	echo '</div>'; // arki-not-found-wrap