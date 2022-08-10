<?php
/**
 * Generate custom CSS
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0
 */

// Return CSS with custom colors and fonts
if (!function_exists('happy_baby_customizer_get_css')) {

	function happy_baby_customizer_get_css($colors=null, $fonts=null, $remove_spaces=true, $only_scheme='') {

		$css = array(
			'fonts' => '',
			'colors' => ''
		);
		
		// Theme fonts
		//---------------------------------------------
		if ($fonts === null) {
			$fonts = happy_baby_get_theme_fonts();
		}
		
		if ($fonts) {

			// Make theme-specific fonts rules
			$fonts = happy_baby_customizer_add_theme_fonts($fonts);

			$rez = array();
			$rez['fonts'] = <<<CSS

body {
	{$fonts['p_font-family']}
	{$fonts['p_font-size']}
	{$fonts['p_font-weight']}
	{$fonts['p_font-style']}
	{$fonts['p_line-height']}
	{$fonts['p_text-decoration']}
	{$fonts['p_text-transform']}
	{$fonts['p_letter-spacing']}
}
.xdsoft_datetimepicker{
    {$fonts['p_font-family']}
}

p, ul, ol, dl, blockquote, address {
	{$fonts['p_margin-top']}
	{$fonts['p_margin-bottom']}
}

h1 {
	{$fonts['h1_font-family']}
	{$fonts['h1_font-size']}
	{$fonts['h1_font-weight']}
	{$fonts['h1_font-style']}
	{$fonts['h1_line-height']}
	{$fonts['h1_text-decoration']}
	{$fonts['h1_text-transform']}
	{$fonts['h1_letter-spacing']}
	{$fonts['h1_margin-top']}
	{$fonts['h1_margin-bottom']}
}
h2 {
	{$fonts['h2_font-family']}
	{$fonts['h2_font-size']}
	{$fonts['h2_font-weight']}
	{$fonts['h2_font-style']}
	{$fonts['h2_line-height']}
	{$fonts['h2_text-decoration']}
	{$fonts['h2_text-transform']}
	{$fonts['h2_letter-spacing']}
	{$fonts['h2_margin-top']}
	{$fonts['h2_margin-bottom']}
}
h3 {
	{$fonts['h3_font-family']}
	{$fonts['h3_font-size']}
	{$fonts['h3_font-weight']}
	{$fonts['h3_font-style']}
	{$fonts['h3_line-height']}
	{$fonts['h3_text-decoration']}
	{$fonts['h3_text-transform']}
	{$fonts['h3_letter-spacing']}
	{$fonts['h3_margin-top']}
	{$fonts['h3_margin-bottom']}
}
h4 {
	{$fonts['h4_font-family']}
	{$fonts['h4_font-size']}
	{$fonts['h4_font-weight']}
	{$fonts['h4_font-style']}
	{$fonts['h4_line-height']}
	{$fonts['h4_text-decoration']}
	{$fonts['h4_text-transform']}
	{$fonts['h4_letter-spacing']}
	{$fonts['h4_margin-top']}
	{$fonts['h4_margin-bottom']}
}
h5 {
	{$fonts['h5_font-family']}
	{$fonts['h5_font-size']}
	{$fonts['h5_font-weight']}
	{$fonts['h5_font-style']}
	{$fonts['h5_line-height']}
	{$fonts['h5_text-decoration']}
	{$fonts['h5_text-transform']}
	{$fonts['h5_letter-spacing']}
	{$fonts['h5_margin-top']}
	{$fonts['h5_margin-bottom']}
}
h6 {
	{$fonts['h6_font-family']}
	{$fonts['h6_font-size']}
	{$fonts['h6_font-weight']}
	{$fonts['h6_font-style']}
	{$fonts['h6_line-height']}
	{$fonts['h6_text-decoration']}
	{$fonts['h6_text-transform']}
	{$fonts['h6_letter-spacing']}
	{$fonts['h6_margin-top']}
	{$fonts['h6_margin-bottom']}
}

input[type="text"],
input[type="number"],
input[type="email"],
input[type="tel"],
input[type="search"],
input[type="password"],
textarea,
textarea.wp-editor-area,
.select_container,
select,
.select_container select {
	{$fonts['input_font-family']}
	{$fonts['input_font-size']}
	{$fonts['input_font-weight']}
	{$fonts['input_font-style']}
	{$fonts['input_line-height']}
	{$fonts['input_text-decoration']}
	{$fonts['input_text-transform']}
	{$fonts['input_letter-spacing']}
}

button,
.wp-block-button .wp-block-button__link,
input[type="button"],
input[type="reset"],
input[type="submit"],
.theme_button,
.gallery_preview_show .post_readmore,
.post_item .more-link,
div.esg-filter-wrapper .esg-filterbutton > span,
.happy_baby_tabs .happy_baby_tabs_titles li a {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}

.comments_wrap .comments_form_title,
.comments_list_wrap .comments_list_title,
.related_wrap_title,
.top_panel .slider_engine_revo .slide_title {
	{$fonts['h1_font-family']}
}

blockquote,
mark, ins,
.logo_text,
.post_price.price,
.theme_scroll_down {
	{$fonts['h5_font-family']}
}



.post_layout_chess .post_title,
blockquote:before {
	{$fonts['h1_font-family']}
}

.post_meta {
	{$fonts['info_font-family']}
	{$fonts['info_font-size']}
	{$fonts['info_font-weight']}
	{$fonts['info_font-style']}
	{$fonts['info_line-height']}
	{$fonts['info_text-decoration']}
	{$fonts['info_text-transform']}
	{$fonts['info_letter-spacing']}
	{$fonts['info_margin-top']}
	{$fonts['info_margin-bottom']}
}

em, i,
.post-date, .rss-date 
.post_date, .post_meta_item, .post_counters_item,
.comments_list_wrap .comment_date,
.comments_list_wrap .comment_time,
.comments_list_wrap .comment_counters,
.top_panel .slider_engine_revo .slide_subtitle,
.logo_slogan,
fieldset legend,
figure figcaption,
.wp-caption .wp-caption-text,
.wp-caption .wp-caption-dd,
.wp-caption-overlay .wp-caption .wp-caption-text,
.wp-caption-overlay .wp-caption .wp-caption-dd,
.format-audio .post_featured .post_audio_author,
.trx_addons_audio_player .audio_author,
.post_item_single .post_content .post_meta,
.author_bio .author_link,
.comments_list_wrap .comment_posted,
.comments_list_wrap .comment_reply {
	{$fonts['info_font-family']}
}
.search_wrap .search_results .post_meta_item,
.search_wrap .search_results .post_counters_item {
	{$fonts['p_font-family']}
}

.logo_text {
	{$fonts['logo_font-family']}
	{$fonts['logo_font-size']}
	{$fonts['logo_font-weight']}
	{$fonts['logo_font-style']}
	{$fonts['logo_line-height']}
	{$fonts['logo_text-decoration']}
	{$fonts['logo_text-transform']}
	{$fonts['logo_letter-spacing']}
}
.logo_footer_text {
	{$fonts['logo_font-family']}
}

.menu_main_nav_area {
	{$fonts['menu_font-size']}
	{$fonts['menu_line-height']}
}
.menu_main_nav > li,
.menu_main_nav > li > a {
	{$fonts['menu_font-family']}
	{$fonts['menu_font-weight']}
	{$fonts['menu_font-style']}
	{$fonts['menu_text-decoration']}
	{$fonts['menu_text-transform']}
	{$fonts['menu_letter-spacing']}
}
.menu_main_nav > li ul,
.menu_main_nav > li ul > li,
.menu_main_nav > li ul > li > a {
	{$fonts['submenu_font-family']}
	{$fonts['submenu_font-size']}
	{$fonts['submenu_font-weight']}
	{$fonts['submenu_font-style']}
	{$fonts['submenu_line-height']}
	{$fonts['submenu_text-decoration']}
	{$fonts['submenu_text-transform']}
	{$fonts['submenu_letter-spacing']}
}
.menu_mobile .menu_mobile_nav_area > ul > li,
.menu_mobile .menu_mobile_nav_area > ul > li > a {
	{$fonts['menu_font-family']}
}
.menu_mobile .menu_mobile_nav_area > ul > li li,
.menu_mobile .menu_mobile_nav_area > ul > li li > a {
	{$fonts['submenu_font-family']}
}


/* Custom Headers */
.sc_layouts_row,
.sc_layouts_row input[type="text"] {
	{$fonts['menu_font-family']}
	{$fonts['menu_font-size']}
	{$fonts['menu_font-weight']}
	{$fonts['menu_font-style']}
	{$fonts['menu_line-height']}
}
.sc_layouts_row .sc_button {
	{$fonts['button_font-family']}
	{$fonts['button_font-size']}
	{$fonts['button_font-weight']}
	{$fonts['button_font-style']}
	{$fonts['button_line-height']}
	{$fonts['button_text-decoration']}
	{$fonts['button_text-transform']}
	{$fonts['button_letter-spacing']}
}
.sc_layouts_menu_nav > li,
.sc_layouts_menu_nav > li > a {
	{$fonts['menu_font-family']}
	{$fonts['menu_font-weight']}
	{$fonts['menu_font-style']}
	{$fonts['menu_text-decoration']}
	{$fonts['menu_text-transform']}
	{$fonts['menu_letter-spacing']}
}
.sc_layouts_menu_popup .sc_layouts_menu_nav > li,
.sc_layouts_menu_popup .sc_layouts_menu_nav > li > a,
.sc_layouts_menu_nav > li ul,
.sc_layouts_menu_nav > li ul > li,
.sc_layouts_menu_nav > li ul > li > a {
	{$fonts['submenu_font-family']}
	{$fonts['submenu_font-size']}
	{$fonts['submenu_font-weight']}
	{$fonts['submenu_font-style']}
	{$fonts['submenu_line-height']}
	{$fonts['submenu_text-decoration']}
	{$fonts['submenu_text-transform']}
	{$fonts['submenu_letter-spacing']}
}

.sc_title_extra .sc_item_subtitle,
.author_bio .author_link,
.format-audio .post_featured .post_audio_title,
.trx_addons_audio_player .audio_caption {
	{$fonts['h1_font-family']}
}

.post_layout_excerpt .info_post_short {
	{$fonts['other_font-family']}
}

.sc_button.sc_button_simple {
	{$fonts['p_font-family']}
}

CSS;
			$rez = apply_filters('happy_baby_filter_get_css', $rez, false, $fonts, '');
			$css['fonts'] = $rez['fonts'];

			
			// Border radius
			//--------------------------------------
			$rad = happy_baby_get_border_radius();
			$rad50 = ' '.$rad != ' 0' ? '50%' : 0;
			$css['fonts'] .= <<<CSS

/* Buttons */
button,
input[type="button"],
input[type="reset"],
input[type="submit"],
.theme_button,
.post_item .post_item .more-link,
.gallery_preview_show .post_readmore,

/* Fields */
input[type="text"],
input[type="number"],
input[type="email"],
input[type="tel"],
input[type="password"],
input[type="search"],
select,
.select_container,
textarea,

/* Search fields */
.widget_search .search-field,
.woocommerce.widget_product_search .search_field,
.widget_display_search #bbp_search,
#bbpress-forums #bbp-search-form #bbp_search,

/* Comment fields */
.comments_wrap .comments_field input,
.comments_wrap .comments_field textarea,

/* Select 2 */
.select2-container .select2-choice,
.select2-container .select2-selection,

/* Tags cloud */
.widget_product_tag_cloud a,
.widget_tag_cloud a {

}
.select_container:before {

}
textarea.wp-editor-area {

}

/* Radius 50% or 0 */
.widget li a img {

}

CSS;
		}


		// Theme colors
		//--------------------------------------
		if ($colors !== false) {
			$schemes = empty($only_scheme) ? array_keys(happy_baby_get_list_schemes()) : array($only_scheme);
	
			if (count($schemes) > 0) {
				$rez = array();
				foreach ($schemes as $scheme) {
					// Prepare colors
					if (empty($only_scheme)) $colors = happy_baby_get_scheme_colors($scheme);
	
					// Make theme-specific colors and tints
					$colors = happy_baby_customizer_add_theme_colors($colors);
			
					// Make styles
					$rez['colors'] = <<<CSS

/* Common tags */
body {
	background-color: {$colors['bg_color']};
}
.scheme_self {
	color: {$colors['text']};
}
ol, ul {
	color: {$colors['text_dark']};
}
ul.trx_addons_list_dot_circled {
	color: {$colors['text']};
}

h1, h2, h3, h4, h5, h6,
h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
li a,
[class*="color_style_"] h1 a, [class*="color_style_"] h2 a, [class*="color_style_"] h3 a, [class*="color_style_"] h4 a, [class*="color_style_"] h5 a, [class*="color_style_"] h6 a, [class*="color_style_"] li a {
	color: {$colors['text_dark']};
}
h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover,
li a:hover {
	color: {$colors['text_link']};
}
.color_style_link2 h1 a:hover, .color_style_link2 h2 a:hover, .color_style_link2 h3 a:hover, .color_style_link2 h4 a:hover, .color_style_link2 h5 a:hover, .color_style_link2 h6 a:hover, .color_style_link2 li a:hover {
	color: {$colors['text_link2']};
}
.color_style_link3 h1 a:hover, .color_style_link3 h2 a:hover, .color_style_link3 h3 a:hover, .color_style_link3 h4 a:hover, .color_style_link3 h5 a:hover, .color_style_link3 h6 a:hover, .color_style_link3 li a:hover {
	color: {$colors['text_link3']};
}
.color_style_dark h1 a:hover, .color_style_dark h2 a:hover, .color_style_dark h3 a:hover, .color_style_dark h4 a:hover, .color_style_dark h5 a:hover, .color_style_dark h6 a:hover, .color_style_dark li a:hover {
	color: {$colors['text_link']};
}

dt, b, strong, i, em, mark, ins {	
	color: {$colors['text_dark']};
}
s, strike, del {	
	color: {$colors['text_light']};
}

code {
	color: {$colors['alter_text']};
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_color']};
}
code a {
	color: {$colors['alter_link']};
}
code a:hover {
	color: {$colors['alter_hover']};
}

a {
	color: {$colors['text_link']};
}
a:hover {
	color: {$colors['text_hover']};
}
.color_style_link2 a {
	color: {$colors['text_link2']};
}
.color_style_link2 a:hover {
	color: {$colors['text_hover2']};
}
.color_style_link3 a {
	color: {$colors['text_link3']};
}
.color_style_link3 a:hover {
	color: {$colors['text_hover3']};
}
.color_style_dark a {
	color: {$colors['text_dark']};
}
.color_style_dark a:hover {
	color: {$colors['text_link']};
}

blockquote {
	color: {$colors['extra_dark']};
	background-color: {$colors['text_link2']};
}
blockquote:before {
	color: {$colors['extra_dark']};
}
blockquote a {
	color: {$colors['extra_dark']};
}
blockquote a:hover {
	color: {$colors['text_hover']};
}

table th, table th + th, table td + th  {
	border-color: {$colors['extra_bd_color']};
}
table td, table th + td, table td + td,
.woocommerce div.product form.cart .variations th.label,
.woocommerce div.product form.cart .variations td.label {
	color: {$colors['alter_dark']};
	border-color: {$colors['bd_color']};
}
table th {
	color: {$colors['extra_dark']};
	background-color: {$colors['text_dark']};
}
table th b, table th strong {
	color: {$colors['extra_dark']};
}
table > tbody > tr:nth-child(2n+1) > td {
	background-color: {$colors['alter_bg_color_04']};
}
table > tbody > tr:nth-child(2n) > td {
	background-color: {$colors['alter_bg_color']};
}
table th a:hover {
	color: {$colors['extra_dark']};
}

hr {
	border-color: {$colors['bd_color']};
}
figure figcaption,
.wp-caption .wp-caption-text,
.wp-caption .wp-caption-dd,
.wp-caption-overlay .wp-caption .wp-caption-text,
.wp-caption-overlay .wp-caption .wp-caption-dd {
	color: {$colors['text_dark']};
	background-color: {$colors['alter_bg_color']};
}
ul > li:before {
	color: {$colors['text_link']};
}


/* Form fields
-------------------------------------------------- */


button[disabled],
input[type="submit"][disabled],
input[type="button"][disabled] {
    background-color: {$colors['text_light']} !important;
    color: {$colors['text']} !important;
}

.widget_search form:after,
.woocommerce.widget_product_search form:after,
.widget_block .wc-block-product-search .wc-block-product-search__fields:after,
.widget_display_search form:after,
#bbpress-forums #bbp-search-form:after {
	color: {$colors['input_text']};
}
.widget_search form:hover:after,
.woocommerce.widget_product_search form:hover:after,
.widget_block .wc-block-product-search .wc-block-product-search__fields:hover:after,
.widget_display_search form:hover:after,
#bbpress-forums #bbp-search-form:hover:after {
	color: {$colors['input_dark']};
}

/* Field set */
fieldset {
	border-color: {$colors['bd_color']};
}
fieldset legend {
	color: {$colors['text_dark']};
	background-color: {$colors['bg_color']};
}

/* Text fields */
::-webkit-input-placeholder { color: {$colors['text_light']}; }
::-moz-placeholder          { color: {$colors['text_light']}; }
:-ms-input-placeholder      { color: {$colors['text_light']}; }


input::-webkit-input-placeholder { color: {$colors['input_text']}; opacity: 1;}
input::-moz-placeholder          { color: {$colors['input_text']}; opacity: 1;}
input:-ms-input-placeholder      { color: {$colors['input_text']}; opacity: 1;}

textarea::-webkit-input-placeholder { color: {$colors['input_text']}; opacity: 1;}
textarea::-moz-placeholder          { color: {$colors['input_text']}; opacity: 1;}
textarea:-ms-input-placeholder      { color: {$colors['input_text']}; opacity: 1;}

input:focus::-webkit-input-placeholder { color: {$colors['input_dark']}; opacity: 1;}
input:focus::-moz-placeholder          { color: {$colors['input_dark']}; opacity: 1;}
input:focus:-ms-input-placeholder      { color: {$colors['input_dark']}; opacity: 1;}

textarea:focus::-webkit-input-placeholder { color: {$colors['input_dark']}; opacity: 1;}
textarea:focus::-moz-placeholder          { color: {$colors['input_dark']}; opacity: 1;}
textarea:focus:-ms-input-placeholder      { color: {$colors['input_dark']}; opacity: 1;}

input[type="text"],
input[type="number"],
input[type="email"],
input[type="tel"],
input[type="search"],
input[type="password"],
.select_container,
.select2-container .select2-choice,
.select2-container .select2-selection,
textarea,
textarea.wp-editor-area,
/* BB Press */
#buddypress .dir-search input[type="search"],
#buddypress .dir-search input[type="text"],
#buddypress .groups-members-search input[type="search"],
#buddypress .groups-members-search input[type="text"],
#buddypress .standard-form input[type="color"],
#buddypress .standard-form input[type="date"],
#buddypress .standard-form input[type="datetime-local"],
#buddypress .standard-form input[type="datetime"],
#buddypress .standard-form input[type="email"],
#buddypress .standard-form input[type="month"],
#buddypress .standard-form input[type="number"],
#buddypress .standard-form input[type="password"],
#buddypress .standard-form input[type="range"],
#buddypress .standard-form input[type="search"],
#buddypress .standard-form input[type="tel"],
#buddypress .standard-form input[type="text"],
#buddypress .standard-form input[type="time"],
#buddypress .standard-form input[type="url"],
#buddypress .standard-form input[type="week"],
#buddypress .standard-form select,
#buddypress .standard-form textarea,
#buddypress form#whats-new-form textarea,
/* Booked */
#booked-page-form input[type="email"],
#booked-page-form input[type="text"],
#booked-page-form input[type="password"],
#booked-page-form textarea,
.booked-upload-wrap,
.booked-upload-wrap input {
	color: {$colors['input_text']};
	border-color: {$colors['input_bd_color']};
	background-color: {$colors['input_bg_color']};
}
input[type="text"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
input[type="tel"]:focus,
input[type="search"]:focus,
input[type="password"]:focus,
.select_container:hover,
select option:hover,
select option:focus,
.select2-container .select2-choice:hover,
textarea:focus,
textarea.wp-editor-area:focus,
/* BB Press */
#buddypress .dir-search input[type="search"]:focus,
#buddypress .dir-search input[type="text"]:focus,
#buddypress .groups-members-search input[type="search"]:focus,
#buddypress .groups-members-search input[type="text"]:focus,
#buddypress .standard-form input[type="color"]:focus,
#buddypress .standard-form input[type="date"]:focus,
#buddypress .standard-form input[type="datetime-local"]:focus,
#buddypress .standard-form input[type="datetime"]:focus,
#buddypress .standard-form input[type="email"]:focus,
#buddypress .standard-form input[type="month"]:focus,
#buddypress .standard-form input[type="number"]:focus,
#buddypress .standard-form input[type="password"]:focus,
#buddypress .standard-form input[type="range"]:focus,
#buddypress .standard-form input[type="search"]:focus,
#buddypress .standard-form input[type="tel"]:focus,
#buddypress .standard-form input[type="text"]:focus,
#buddypress .standard-form input[type="time"]:focus,
#buddypress .standard-form input[type="url"]:focus,
#buddypress .standard-form input[type="week"]:focus,
#buddypress .standard-form select:focus,
#buddypress .standard-form textarea:focus,
#buddypress form#whats-new-form textarea:focus,
/* Booked */
#booked-page-form input[type="email"]:focus,
#booked-page-form input[type="text"]:focus,
#booked-page-form input[type="password"]:focus,
#booked-page-form textarea:focus,
.booked-upload-wrap:hover,
.booked-upload-wrap input:focus {
	color: {$colors['input_dark']};
	border-color: {$colors['input_bd_hover']};
	background-color: {$colors['input_bg_hover']};
}

/* Select containers */
.select_container:before {
	color: {$colors['input_text']};
	background-color: {$colors['input_bg_color']};
}
.select_container:focus:before,
.select_container:hover:before {
	color: {$colors['input_dark']};
	background-color: {$colors['input_bg_hover']};
}
.select_container:after {
	color: {$colors['input_text']};
}
.select_container:focus:after,
.select_container:hover:after {
	color: {$colors['input_dark']};
}
.select_container select {
	color: {$colors['input_text']};
	background: {$colors['input_bg_color']} !important;
}
.select_container select:focus {
	color: {$colors['input_dark']};
	background-color: {$colors['input_bg_hover']} !important;
}

.select2-results {
	color: {$colors['input_text']};
	border-color: {$colors['input_bd_hover']};
	background: {$colors['input_bg_color']};
}
.select2-results .select2-highlighted {
	color: {$colors['input_dark']};
	background: {$colors['input_bg_hover']};
}
.wpcf7-form span[class*='acceptance'] input[type="checkbox"] + span:before,
form.mc4wp-form input[type="checkbox"] + span:before,
input[type="radio"] + label:before,
input[type="checkbox"] + label:before {
	border-color: {$colors['input_bd_color']};
	background-color: {$colors['input_bg_color']};
}


/* Simple button */
.sc_button_simple:not(.sc_button_bg_image),
.sc_button_simple:not(.sc_button_bg_image):before,
.sc_button_simple:not(.sc_button_bg_image):after {
	color:{$colors['text_link']};
}
.sc_button_simple:not(.sc_button_bg_image):hover,
.sc_button_simple:not(.sc_button_bg_image):hover:before,
.sc_button_simple:not(.sc_button_bg_image):hover:after {
	color:{$colors['text_hover']} !important;
}

.sc_button_simple.color_style_link2:not(.sc_button_bg_image),
.sc_button_simple.color_style_link2:not(.sc_button_bg_image):before,
.sc_button_simple.color_style_link2:not(.sc_button_bg_image):after,
.color_style_link2 .sc_button_simple:not(.sc_button_bg_image),
.color_style_link2 .sc_button_simple:not(.sc_button_bg_image):before,
.color_style_link2 .sc_button_simple:not(.sc_button_bg_image):after {
	color:{$colors['text_link2']};
}
.sc_button_simple.color_style_link2:not(.sc_button_bg_image):hover,
.sc_button_simple.color_style_link2:not(.sc_button_bg_image):hover:before,
.sc_button_simple.color_style_link2:not(.sc_button_bg_image):hover:after,
.color_style_link2 .sc_button_simple:not(.sc_button_bg_image):hover,
.color_style_link2 .sc_button_simple:not(.sc_button_bg_image):hover:before,
.color_style_link2 .sc_button_simple:not(.sc_button_bg_image):hover:after {
	color:{$colors['text_hover2']};
}

.sc_button_simple.color_style_link3:not(.sc_button_bg_image),
.sc_button_simple.color_style_link3:not(.sc_button_bg_image):before,
.sc_button_simple.color_style_link3:not(.sc_button_bg_image):after,
.color_style_link3 .sc_button_simple:not(.sc_button_bg_image),
.color_style_link3 .sc_button_simple:not(.sc_button_bg_image):before,
.color_style_link3 .sc_button_simple:not(.sc_button_bg_image):after {
	color:{$colors['text_link3']};
}
.sc_button_simple.color_style_link3:not(.sc_button_bg_image):hover,
.sc_button_simple.color_style_link3:not(.sc_button_bg_image):hover:before,
.sc_button_simple.color_style_link3:not(.sc_button_bg_image):hover:after,
.color_style_link3 .sc_button_simple:not(.sc_button_bg_image):hover,
.color_style_link3 .sc_button_simple:not(.sc_button_bg_image):hover:before,
.color_style_link3 .sc_button_simple:not(.sc_button_bg_image):hover:after {
	color:{$colors['text_hover3']};
}

.sc_button_simple.color_style_dark:not(.sc_button_bg_image),
.sc_button_simple.color_style_dark:not(.sc_button_bg_image):before,
.sc_button_simple.color_style_dark:not(.sc_button_bg_image):after,
.color_style_dark .sc_button_simple:not(.sc_button_bg_image),
.color_style_dark .sc_button_simple:not(.sc_button_bg_image):before,
.color_style_dark .sc_button_simple:not(.sc_button_bg_image):after {
	color:{$colors['text_dark']};
}
.sc_button_simple.color_style_dark:not(.sc_button_bg_image):hover,
.sc_button_simple.color_style_dark:not(.sc_button_bg_image):hover:before,
.sc_button_simple.color_style_dark:not(.sc_button_bg_image):hover:after,
.color_style_dark .sc_button_simple:not(.sc_button_bg_image):hover,
.color_style_dark .sc_button_simple:not(.sc_button_bg_image):hover:before,
.color_style_dark .sc_button_simple:not(.sc_button_bg_image):hover:after {
	color:{$colors['text_link']} !important;
}

.sc_button_simple.color_style_dark:not(.sc_button_bg_image):hover .sc_button_icon,
.sc_button_simple.color_style_dark:not(.sc_button_bg_image) .sc_button_icon {
	color:{$colors['text_link']};
}



/* Bordered button */
.sc_button_bordered:not(.sc_button_bg_image) {
	color:{$colors['text_link']};
	border-color:{$colors['text_link']};
}
.sc_button_bordered:not(.sc_button_bg_image):hover {
	color:{$colors['text_hover']} !important;
	border-color:{$colors['text_hover']} !important;
}
.sc_button_bordered.color_style_link2:not(.sc_button_bg_image) {
	color:{$colors['text_link2']};
	border-color:{$colors['text_link2']};
}
.sc_button_bordered.color_style_link2:not(.sc_button_bg_image):hover {
	color:{$colors['text_hover2']} !important;
	border-color:{$colors['text_hover2']} !important;
}
.sc_button_bordered.color_style_link3:not(.sc_button_bg_image) {
	color:{$colors['text_link3']};
	border-color:{$colors['text_link3']};
}
.sc_button_bordered.color_style_link3:not(.sc_button_bg_image):hover {
	color:{$colors['text_hover3']} !important;
	border-color:{$colors['text_hover3']} !important;
}
.sc_button_bordered.color_style_dark:not(.sc_button_bg_image) {
	color:{$colors['text_dark']};
	border-color:{$colors['text_dark']};
}
.sc_button_bordered.color_style_dark:not(.sc_button_bg_image):hover {
	color:{$colors['text_link']} !important;
	border-color:{$colors['text_link']} !important;
}

/* Normal button */
button,
input[type="reset"],
input[type="submit"],
input[type="button"],
.post_item .more-link,
.comments_wrap .form-submit input[type="submit"],
.wp-block-button:not(.is-style-outline) .wp-block-button__link,
/* BB & Buddy Press */
#buddypress .comment-reply-link,
#buddypress .generic-button a,
#buddypress a.button,
#buddypress button,
#buddypress input[type="button"],
#buddypress input[type="reset"],
#buddypress input[type="submit"],
#buddypress ul.button-nav li a,
a.bp-title-button,
/* Booked */
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button,
body #booked-profile-page .booked-profile-appt-list .appt-block .booked-cal-buttons .google-cal-button > a,
body #booked-profile-page input[type="submit"],
body #booked-profile-page button,
body .booked-list-view input[type="submit"],
body .booked-list-view button,
body table.booked-calendar input[type="submit"],
body table.booked-calendar button,
body .booked-modal input[type="submit"],
body .booked-modal button,
/* ThemeREX Addons */
.sc_button_default,
.sc_button:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image),
.sc_action_item_link,
.socials_share:not(.socials_type_drop) .social_icon,
/* Tribe Events */
#tribe-bar-form .tribe-bar-submit input[type="submit"],
#tribe-bar-form.tribe-bar-mini .tribe-bar-submit input[type="submit"],
#tribe-bar-views li.tribe-bar-views-option a,
#tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option.tribe-bar-active a,
#tribe-events .tribe-events-button,
.tribe-events-button,
.tribe-events-cal-links a,
.tribe-events-sub-nav li a,
/* EDD buttons */
.edd_download_purchase_form .button,
#edd-purchase-button,
.edd-submit.button,
.widget_block .wp-block-button__link {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}

.wp-block-button.is-style-outline .wp-block-button__link{
	color: {$colors['text_link']};
	border-color: {$colors['text_link']};
}

.theme_button {
	color: {$colors['inverse_link']} !important;
	background-color: {$colors['text_link']} !important;
}
.sc_price_item_link {
	color: {$colors['inverse_link']};
	background-color: {$colors['extra_link']};
}
.sc_button_default.color_style_link2,
.sc_button.color_style_link2:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image) {
	background-color: {$colors['text_link2']};
}
.sc_button_default.color_style_link3,
.sc_button.color_style_link3:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image) {
	background-color: {$colors['text_link3']};
}
.sc_button_default.color_style_dark,
.sc_button.color_style_dark:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image) {
	background-color: {$colors['text_dark']};
}
.search_wrap .search_submit:before {
	color: {$colors['input_text']};
}

button:hover,
button:focus,
.post_item .more-link:hover,

/* ThemeREX Addons */
.sc_button_default:hover,
.sc_button:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image):hover,
.sc_action_item_link:hover,
.socials_share:not(.socials_type_drop) .social_icon:hover,
/* Tribe Events */
#tribe-bar-form .tribe-bar-submit input[type="submit"]:hover,
#tribe-bar-form .tribe-bar-submit input[type="submit"]:focus,
#tribe-bar-form.tribe-bar-mini .tribe-bar-submit input[type="submit"]:hover,
#tribe-bar-form.tribe-bar-mini .tribe-bar-submit input[type="submit"]:focus,
#tribe-bar-views li.tribe-bar-views-option a:hover,
#tribe-bar-views .tribe-bar-views-list .tribe-bar-views-option.tribe-bar-active a:hover,
#tribe-events .tribe-events-button:hover,
.tribe-events-button:hover,
.tribe-events-cal-links a:hover,
.tribe-events-sub-nav li a:hover,
/* EDD buttons */
.edd_download_purchase_form .button:hover, .edd_download_purchase_form .button:active, .edd_download_purchase_form .button:focus,
#edd-purchase-button:hover, #edd-purchase-button:active, #edd-purchase-button:focus,
.edd-submit.button:hover, .edd-submit.button:active, .edd-submit.button:focus {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}


input[type="submit"]:hover,
input[type="submit"]:focus,
input[type="reset"]:hover,
input[type="reset"]:focus,
input[type="button"]:hover,
input[type="button"]:focus,
.comments_wrap .form-submit input[type="submit"]:hover,
.comments_wrap .form-submit input[type="submit"]:focus,
/* Booked */
.booked-calendar-wrap .booked-appt-list .timeslot .timeslot-people button:hover,
body #booked-profile-page .booked-profile-appt-list .appt-block .booked-cal-buttons .google-cal-button > a:hover,
body #booked-profile-page input[type="submit"]:hover,
body #booked-profile-page button:hover,
body .booked-list-view input[type="submit"]:hover,
body .booked-list-view button:hover,
body table.booked-calendar input[type="submit"]:hover,
body table.booked-calendar button:hover,
body .booked-modal input[type="submit"]:hover,
body .booked-modal button:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.wp-block-button:not(.is-style-outline) .wp-block-button__link:hover{
	background-color: {$colors['alter_text']};
}

.wp-block-button.is-style-outline .wp-block-button__link:hover{
	color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}

.post_layout_excerpt.sticky .more-link {
	background-color: {$colors['text_hover']};
}
.theme_button:hover,
.theme_button:focus {
	color: {$colors['inverse_link']} !important;
	background-color: {$colors['text_link']} !important;
}
.sc_price_item_link:hover {
	color: {$colors['inverse_link']};
}
.sc_button_default.color_style_link2:hover,
.sc_button.color_style_link2:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image):hover {
	background-color: {$colors['text_link2']};
}
.sc_button_default.color_style_link3:hover,
.sc_button.color_style_link3:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image):hover {
	background-color: {$colors['text_link3']};
}
.sc_button_default.color_style_dark:hover,
.sc_button.color_style_dark:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image):hover {
	background-color: {$colors['text_dark']};
}
.search_wrap .search_submit:hover:before {
	color: {$colors['input_dark']};
}

.sc_form button:hover,
.sc_button:not(.sc_button_simple):not(.sc_button_bordered):not(.sc_button_bg_image):hover {
	background-color: {$colors['text_link']};
}




/* Buttons in sidebars */

/* MailChimp */
.mc4wp-form input[type="submit"],
/* WooCommerce */
#btn-buy,
.woocommerce .woocommerce-message .button,
.woocommerce .woocommerce-error .button,
.woocommerce .woocommerce-info .button,
.widget.woocommerce .button,
.widget.woocommerce a.button,
.widget.woocommerce button.button,
.widget.woocommerce input.button,
.widget.woocommerce input[type="button"],
.widget.woocommerce input[type="submit"],
.widget.WOOCS_CONVERTER .button,
.widget.yith-woocompare-widget a.button,
.widget_product_search .search_button {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
/* MailChimp */
.mc4wp-form input[type="submit"]:hover,
.mc4wp-form input[type="submit"]:focus {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_hover']};
}

/* Buttons in WP Editor */
.wp-editor-container input[type="button"] {
	background-color: {$colors['alter_bg_color']};
	border-color: {$colors['alter_bd_color']};
	color: {$colors['alter_dark']};
	-webkit-box-shadow: 0 1px 0 0 {$colors['alter_bd_hover']};
	    -ms-box-shadow: 0 1px 0 0 {$colors['alter_bd_hover']};
			box-shadow: 0 1px 0 0 {$colors['alter_bd_hover']};	
}
.wp-editor-container input[type="button"]:hover,
.wp-editor-container input[type="button"]:focus {
	background-color: {$colors['alter_bg_hover']};
	border-color: {$colors['alter_bd_hover']};
	color: {$colors['alter_link']};
}



/* WP Standard classes */
.sticky {
	border-color: {$colors['bd_color']};
}
.sticky .label_sticky {
	border-top-color: {$colors['text_link']};
}
	

/* Page */
#page_preloader,
.scheme_self.header_position_under .page_content_wrap,
.page_wrap {
	background-color: {$colors['bg_color']};
}
.preloader_wrap > div {
	background-color: {$colors['text_link']};
}

/* Header */
.scheme_self.top_panel.with_bg_image:before {
	background-color: {$colors['bg_color_07']};
}
.scheme_self.top_panel .slider_engine_revo .slide_subtitle,
.top_panel .slider_engine_revo .slide_subtitle {
	color: {$colors['text_link']};
}
.top_panel_default .top_panel_navi,
.scheme_self.top_panel_default .top_panel_navi {
	background-color: {$colors['bg_color']};
}
.top_panel_default .top_panel_title,
.scheme_self.top_panel_default .top_panel_title {
	background-color: {$colors['alter_bg_color']};
}


/* Tabs */
div.esg-filter-wrapper .esg-filterbutton > span,
.happy_baby_tabs .happy_baby_tabs_titles li a {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bg_hover']};
}
div.esg-filter-wrapper .esg-filterbutton > span:hover,
.happy_baby_tabs .happy_baby_tabs_titles li a:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
div.esg-filter-wrapper .esg-filterbutton.selected > span,
.happy_baby_tabs .happy_baby_tabs_titles li.ui-state-active a {
	color: {$colors['bg_color']};
	background-color: {$colors['text_dark']};
}

/* Post layouts */
.post_item {
	color: {$colors['text']};
}
.post_meta,
.post_meta_item,
.post_meta_item a,
.post_meta_item:before,
.post_meta_item:after,
.post_meta_item:hover:before,
.post_meta_item:hover:after,
.post_date a,
.post_date:before,
.post_date:after,
.post_info .post_info_item,
.post_info .post_info_item a,
.post_info_counters .post_counters_item,
.post_counters .socials_share .socials_caption:before,
.post_counters .socials_share .socials_caption:hover:before {
	color: {$colors['text_light']};
}

.post_meta .post_meta_item.post_edit > a:after,
.post_meta .post_meta_item:after,
.vc_inline-link:after {
	background-color: {$colors['text_light']};
}

.post_date a:hover,
a.post_meta_item:hover,
a.post_meta_item:hover:before,
.post_meta_item a:hover,
.post_meta_item a:hover:before,
.post_info .post_info_item a:hover,
.post_info .post_info_item a:hover:before,
.post_info_counters .post_counters_item:hover,
.post_info_counters .post_counters_item:hover:before {
	color: {$colors['text_dark']};
}
.post_item .post_title a:hover {
	color: {$colors['text_link']};
}
footer .post_item .post_title a:hover {
	color: {$colors['text_link2']};
}

.post_meta_item.post_categories,
.post_meta_item.post_categories a {}
.post_meta_item.post_categories a:hover {
	color: {$colors['text_hover']};
}

.post_meta_item .socials_share .social_items {
	background-color: {$colors['bg_color']};
}
.post_meta_item .social_items,
.post_meta_item .social_items:before {
	background-color: {$colors['bg_color']};
	border-color: {$colors['bd_color']};
	color: {$colors['text_light']};
}
.post_layout_excerpt:not(.sticky) + .post_layout_excerpt:not(.sticky) {}
.post_layout_excerpt {
	background-color: {$colors['alter_bg_color']};
}

.post_layout_excerpt .info_post_short .post_date {
	background-color: {$colors['text_dark']};
	color: {$colors['inverse_link']};
}


.post_layout_classic {
	border-color: {$colors['bd_color']};
}

.scheme_self.gallery_preview:before {
	background-color: {$colors['bg_color']};
}
.scheme_self.gallery_preview {
	color: {$colors['text']};
}


/* Post Formats */
.trx_addons_audio_player .audio_caption {
	color: {$colors['inverse_link']};
}
/* Audio */
.trx_addons_audio_player .audio_author,
.format-audio .post_featured .post_audio_author {
	color: {$colors['inverse_link']};
}
.format-audio .post_featured.without_thumb .post_audio {
	background-color: {$colors['extra_bg_color']};
}
.format-audio .post_featured.without_thumb .post_audio_title,
.without_thumb .mejs-controls .mejs-currenttime,
.without_thumb .mejs-controls .mejs-duration {
	color: {$colors['inverse_link']};
}

.trx_addons_audio_player.without_cover {
	background-color: {$colors['extra_bg_color']};
}
.trx_addons_audio_player.with_cover .audio_caption {
	color: {$colors['inverse_link']};
}
.trx_addons_audio_player.without_cover .audio_author {
	color: {$colors['inverse_link']};
}
.trx_addons_audio_player .mejs-container .mejs-controls .mejs-time {
	color: {$colors['inverse_link']};
}
.trx_addons_audio_player.with_cover .mejs-container .mejs-controls .mejs-time {
	color: {$colors['inverse_link']};
}

.scheme_dark.footer_default .mejs-container .mejs-controls,
.scheme_dark.sidebar .mejs-container .mejs-controls,
.mejs-container .mejs-controls,
.mejs-embed,
.mejs-embed body {
	background: {$colors['text_dark_07']};
}

.mejs-controls .mejs-button,
.mejs-controls .mejs-time-rail .mejs-time-current,
.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
	color: {$colors['extra_bg_color']};
	background: {$colors['inverse_link']};
}
.mejs-controls .mejs-button:hover {
	color: {$colors['inverse_link']};
	background: {$colors['text_hover']};
}
.mejs-controls .mejs-time-rail .mejs-time-total,
.mejs-controls .mejs-time-rail .mejs-time-loaded,
.mejs-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total {
	background: {$colors['text_link_02']};
}

.trx_addons_audio_player .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total:before,
.trx_addons_audio_player .mejs-controls .mejs-time-rail .mejs-time-total:before {
	background: rgba(255,255,255,0.3);
}


/* Aside */
.format-aside .post_content_inner {
	color: {$colors['alter_dark']};
	background-color: {$colors['alter_bg_color']};
}

/* Link and Status */
.format-link .post_content_inner,
.format-status .post_content_inner {
	color: {$colors['text_dark']};
}

/* Chat */
.format-chat p > b,
.format-chat p > strong {
	color: {$colors['text_dark']};
}

/* Video */
.trx_addons_video_player.with_cover .video_hover,
.format-video .post_featured.with_thumb .post_video_hover {
	color: {$colors['inverse_link']};
}
.trx_addons_video_player.with_cover .video_hover:hover,
.format-video .post_featured.with_thumb .post_video_hover:hover {
	color: {$colors['text_hover']};
	background-color: {$colors['inverse_link']};
}
.sidebar_inner .trx_addons_video_player.with_cover .video_hover {
	color: {$colors['alter_link']};
}
.sidebar_inner .trx_addons_video_player.with_cover .video_hover:hover {
	color: {$colors['text_hover']};
	background-color: {$colors['inverse_link']};
}

/* Chess */
.post_layout_chess .post_content_inner:after {
	background: linear-gradient(to top, {$colors['bg_color']} 0%, {$colors['bg_color_0']} 100%) no-repeat scroll right top / 100% 100% {$colors['bg_color_0']};
}
.post_layout_chess_1 .post_meta:before {
	background-color: {$colors['bd_color']};
}

/* Pagination */
.nav-links-old {
	color: {$colors['text_dark']};
}
.nav-links-old a:hover {
	color: {$colors['text_dark']};
	border-color: {$colors['text_dark']};
}

div.esg-pagination .esg-pagination-button,
.woocommerce nav.woocommerce-pagination ul li a,
.page_links > a,
.comments_pagination .page-numbers,
.nav-links .page-numbers {
	color: {$colors['text_light']};
	background-color: {$colors['alter_bg_color']};
}
div.esg-pagination .esg-pagination-button:hover,
div.esg-pagination .esg-pagination-button.selected,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current,
.page_links > a:hover,
.page_links > span:not(.page_links_title),
.comments_pagination a.page-numbers:hover,
.comments_pagination .page-numbers.current,
.nav-links a.page-numbers:hover,
.nav-links .page-numbers.current {
	color: {$colors['text_hover']};
	background-color: {$colors['alter_bg_color']};
}

/* Single post */
.post_item_single .post_header .post_date {
	color: {$colors['text_light']};
}
.post_item_single .post_header .post_meta_item,
.post_item_single .post_header .post_meta_item:before,
.post_item_single .post_header .post_meta_item:hover:before,
.post_item_single .post_header .post_meta_item a,
.post_item_single .post_header .post_meta_item a:before,
.post_item_single .post_header .post_meta_item a:hover:before,
.post_item_single .post_header .post_meta_item .socials_caption,
.post_item_single .post_header .post_meta_item .socials_caption:before,
.post_item_single .post_header .post_edit a {
	color: {$colors['text_light']};
}

.post_item_single .post_header .post_categories a {
	color: {$colors['text_hover']};
}
.post_item_single .post_header .post_categories,
.post_item_single .post_header .post_categories a:hover {
	color: {$colors['text_light']};
}


.post_item_single .post_meta_item:hover,
.post_item_single .post_meta_item > a:hover,
.post_item_single .post_meta_item .socials_caption:hover,
.post_item_single .post_edit a:hover {
	color: {$colors['text_hover']};
}
.post_item_single .post_content .post_meta_label,
.post_item_single .post_content .post_meta_item:hover .post_meta_label {
	color: {$colors['text_dark']};
}

.post_item_single .post_content .post_tags a {
	color: {$colors['alter_light']};
	background-color: {$colors['alter_bg_hover']};
}
.post_item_single .post_content .post_tags a:hover {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link2']};
}
.post_item_single .post_content .post_meta .post_share .social_item .social_icon {
	color: {$colors['inverse_link']} !important;
	background-color: {$colors['text_link2']};
}
.post_item_single .post_content .post_meta .post_share .social_item:hover .social_icon {
	color: {$colors['inverse_link']} !important;
	background-color: {$colors['text_link2']};
}

.post-password-form input[type="submit"] {
	border-color: {$colors['text_dark']};
}
.post-password-form input[type="submit"]:hover,
.post-password-form input[type="submit"]:focus {
	color: {$colors['bg_color']};
}

/* Single post navi */
.nav-links-single .nav-links {
	border-color: {$colors['bd_color']};
}
.nav-links-single .nav-links a .meta-nav {
	color: {$colors['text_light']};
}
.nav-links-single .nav-links a .post_date {
	color: {$colors['text_light']};
}
.nav-links-single .nav-links a:hover .meta-nav,
.nav-links-single .nav-links a:hover .post_date {
	color: {$colors['text_dark']};
}
.nav-links-single .nav-links a:hover .post-title {
	color: {$colors['text_link']};
}

/* Author info */
.author_info:before {
	background-color: {$colors['bd_color']};
}
.author_info {
	color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
}
.author_info .author_title {
	color: {$colors['inverse_link']};
}
.author_info a {
	color: {$colors['inverse_link']};
}
.author_info a:hover {
	color: {$colors['text_hover']};
}
.author_info .socials_wrap .social_item .social_icon {
	color: {$colors['text_link']};
	background-color: {$colors['inverse_link']};
}
.author_info .socials_wrap .social_item:hover .social_icon {
	color: {$colors['text_link']};
	background-color: {$colors['inverse_link']};
}

/* Related posts */
.related_wrap {
	border-color: {$colors['bd_color']};
}
.related_wrap .related_item_style_1 .post_header {
	background-color: {$colors['bg_color_07']};
}
.related_wrap .related_item_style_1:hover .post_header {
	background-color: {$colors['bg_color']};
}
.related_wrap .related_item_style_1 .post_date a {
	color: {$colors['text']};
}
.related_wrap .related_item_style_1:hover .post_date a {
	color: {$colors['text_light']};
}
.related_wrap .related_item_style_1:hover .post_date a:hover {
	color: {$colors['text_dark']};
}

/* Comments */
.comments_list_wrap,
.comments_list_wrap > ul {
	border-color: {$colors['bd_color']};
}
.comments_list_wrap li + li,
.comments_list_wrap li ul {
	border-color: {$colors['bd_color']};
}
.comments_list_wrap .comment_posted,
.comments_list_wrap .comment_info {
	color: {$colors['text_light']};
}
.comments_list_wrap .comment_counters a {
	color: {$colors['text_link']};
}
.comments_list_wrap .comment_counters a:before {
	color: {$colors['text_link']};
}
.comments_list_wrap .comment_counters a:hover:before,
.comments_list_wrap .comment_counters a:hover {
	color: {$colors['text_hover']};
}
.comments_list_wrap .comment_text {
	color: {$colors['text']};
}
.comments_list_wrap .comment_reply a {
	color: {$colors['text_link']};
}
.comments_list_wrap .comment_reply a:hover {
	color: {$colors['text_hover']};
}
.comments_form_wrap {
	border-color: {$colors['bd_color']};
}
.comments_wrap .comments_notes {
	color: {$colors['text_light']};
}


/* Page 404 */
.post_item_404 .page_title {
	color: {$colors['text_light']};
}
.post_item_404 .page_description {
	color: {$colors['text_link']};
}
.post_item_404 .go_home {
	border-color: {$colors['text_dark']};
}

/* Sidebar */
.scheme_self.sidebar .sidebar_inner {
	color: {$colors['alter_text']};
}
.scheme_self.sidebar .sidebar_inner .widget  {
	background-color: {$colors['alter_bg_color']};
}
.sidebar_inner .widget + .widget {
	border-color: {$colors['bd_color']};
}
.scheme_self.sidebar .widget + .widget {
	border-color: {$colors['alter_bd_color']};
}
.scheme_self.sidebar h1, .scheme_self.sidebar h2, .scheme_self.sidebar h3, .scheme_self.sidebar h4, .scheme_self.sidebar h5, .scheme_self.sidebar h6,
.scheme_self.sidebar h1 a, .scheme_self.sidebar h2 a, .scheme_self.sidebar h3 a, .scheme_self.sidebar h4 a, .scheme_self.sidebar h5 a, .scheme_self.sidebar h6 a {
	color: {$colors['text_dark']};
}
.scheme_self.sidebar h1 a:hover, .scheme_self.sidebar h2 a:hover, .scheme_self.sidebar h3 a:hover, .scheme_self.sidebar h4 a:hover, .scheme_self.sidebar h5 a:hover, .scheme_self.sidebar h6 a:hover {
	color: {$colors['text_link2']};
}

.widget ul,
.widget ol {
	color: {$colors['alter_text']};
}
.widget .comment-author-link {
	color: {$colors['text_dark']};
}


/* Widgets */
.widget ul > li:before,
.widget ol.wp-block-latest-comments:not(.has-avatars) > li:before {
	background-color: {$colors['text_link']};
}
.scheme_self.sidebar ul > li:before {
	background-color: {$colors['text_link']};
}
.scheme_self.sidebar a {
	color: {$colors['alter_dark']};
}
.scheme_self.sidebar a:hover {
	color: {$colors['text_link']};
}




.scheme_self.sidebar li > a,
.scheme_self.sidebar .post_title > a {
	color: {$colors['alter_dark']};
}
.scheme_self.sidebar li > a:hover,
.scheme_self.sidebar .post_title > a:hover {
	color: {$colors['text_link']};
}

/* Archive */
.scheme_self.sidebar .widget_archive li {
	color: {$colors['alter_dark']};
}

/* Calendar */
.wp-block-calendar caption,
.wp-block-calendar tbody td a,
.wp-block-calendar th,
.widget_calendar caption,
.widget_calendar tbody td a,
.widget_calendar th {
	color: {$colors['text_dark']};
}
.scheme_self.sidebar .widget_calendar caption,
.scheme_self.sidebar .widget_calendar tbody td a,
.scheme_self.sidebar .widget_calendar th {
	color: {$colors['alter_dark']};
}
.wp-block-calendar tbody td,
.widget_calendar tbody td {
	color: {$colors['text']} !important;
}
.scheme_self.sidebar .widget_calendar tbody td {
	color: {$colors['alter_text']} !important;
}
.wp-block-calendar tbody td a:hover,
.widget_calendar tbody td a:hover {
	color: {$colors['alter_link']};
}
.scheme_self.sidebar .widget_calendar tbody td a:hover {
	color: {$colors['text_link']};
}
.wp-block-calendar tbody td a:after,
.widget_calendar tbody td a:after {
	background-color: {$colors['alter_link']};
}
.scheme_self.sidebar .widget_calendar tbody td a:after {
	background-color: {$colors['text_link']};
}
.wp-block-calendar td#today,
.widget_calendar td#today {
	color: {$colors['inverse_link']} !important;
}
.wp-block-calendar td#today a,
.widget_calendar td#today a {
	color: {$colors['inverse_link']};
}
.wp-block-calendar td#today a:hover,
.widget_calendar td#today a:hover {
	color: {$colors['inverse_hover']};
}
.wp-block-calendar td#today:before,
.widget_calendar td#today:before {
	background-color: {$colors['alter_link']};
}
.scheme_self.sidebar .widget_calendar td#today {
	color: {$colors['inverse_link']} !important;
}
.scheme_self.sidebar .widget_calendar td#today:before {
	background-color: {$colors['text_link']};
}
.wp-block-calendar td#today a:after,
.widget_calendar td#today a:after {
	background-color: {$colors['inverse_link']};
}
.wp-block-calendar td#today a:hover:after,
.widget_calendar td#today a:hover:after {
	background-color: {$colors['inverse_hover']};
}
.wp-calendar-nav .wp-calendar-nav-prev a,
.wp-calendar-nav .wp-calendar-nav-next a,
.widget_calendar #prev a,
.widget_calendar #next a {
	color: {$colors['text_dark']};
}
.scheme_self.sidebar .wp-calendar-nav .wp-calendar-nav-prev a,
.scheme_self.sidebar .wp-calendar-nav .wp-calendar-nav-next a,
.scheme_self.sidebar .widget_calendar #prev a,
.scheme_self.sidebar .widget_calendar #next a {
	color: {$colors['text_dark']};
}
.wp-calendar-nav .wp-calendar-nav-prev a:hover,
.wp-calendar-nav .wp-calendar-nav-next a:hover,
.widget_calendar #prev a:hover,
.widget_calendar #next a:hover {
	color: {$colors['alter_link']};
}
.scheme_self.sidebar .wp-calendar-nav .wp-calendar-nav-prev a:hover,
.scheme_self.sidebar .wp-calendar-nav .wp-calendar-nav-next a:hover,
.scheme_self.sidebar .widget_calendar #prev a:hover,
.scheme_self.sidebar .widget_calendar #next a:hover {
	color: {$colors['text_link']};
}
.wp-calendar-nav .wp-calendar-nav-prev a:before,
.wp-calendar-nav .wp-calendar-nav-next a:before,
.widget_calendar td#prev a:before,
.widget_calendar td#next a:before {
	background-color: {$colors['alter_bg_color']};
}
.scheme_self.sidebar .wp-calendar-nav .wp-calendar-nav-prev a:before,
.scheme_self.sidebar .wp-calendar-nav .wp-calendar-nav-next a:before,
.scheme_self.sidebar .widget_calendar td#prev a:before,
.scheme_self.sidebar .widget_calendar td#next a:before {
	background-color: {$colors['alter_bg_color']};
}

.post_content .wp-calendar-nav .wp-calendar-nav-prev a:before,
.post_content .wp-calendar-nav .wp-calendar-nav-next a:before{
	background-color: {$colors['bg_color']};
}

/* Categories */
.widget_categories li {
	color: {$colors['text_dark']};
}
.scheme_self.sidebar .widget_categories li {
	color: {$colors['alter_dark']};
}

/* Tag cloud */
.wp-block-tag-cloud a,
aside.widget_product_tag_cloud a,
aside.widget_tag_cloud a {
	color: {$colors['alter_light']};
	background-color: {$colors['alter_bg_hover']};
}
.scheme_self.sidebar aside.widget_product_tag_cloud a,
.scheme_self.sidebar aside.widget_tag_cloud a {
	color: {$colors['alter_light']};
	background-color: {$colors['alter_bg_hover']};
}

.widget_product_tag_cloud a:hover,
.widget_tag_cloud a:hover {
	color: {$colors['inverse_link']} !important;
	background-color: {$colors['alter_link']};
}

.scheme_self.sidebar .widget_product_tag_cloud a:hover,
.scheme_self.sidebar .widget_tag_cloud a:hover {
	background-color: {$colors['text_link']};
}

.wp-block-tag-cloud a:hover{
	color: {$colors['inverse_link']} !important;
	background-color: {$colors['text_link']};
}

/* RSS */
.widget_rss .widget_title a:first-child {
	color: {$colors['text_link']};
}
.scheme_self.sidebar .widget_rss .widget_title a:first-child {
	color: {$colors['alter_link']};
}
.widget_rss .widget_title a:first-child:hover {
	color: {$colors['text_hover']};
}
.scheme_self.sidebar .widget_rss .widget_title a:first-child:hover {
	color: {$colors['alter_hover']};
}
.widget_rss .rss-date {
	color: {$colors['text_light']};
}
.scheme_self.sidebar .widget_rss .rss-date {
	color: {$colors['alter_light']};
}

.widget_block .wc-block-grid .wc-block-grid__products .wc-block-grid__product-onsale {
    color: {$colors['inverse_link']};
	background-color: {$colors['text_link']};
	border-color: {$colors['text_link']};
}

/* Footer */
.scheme_self.footer_wrap,
.footer_wrap .scheme_self.vc_row {
	color: {$colors['alter_text']};
}
.scheme_self.footer_wrap .widget,
.scheme_self.footer_wrap .sc_content .wpb_column,
.footer_wrap .scheme_self.vc_row .widget,
.footer_wrap .scheme_self.vc_row .sc_content .wpb_column {
	border-color: {$colors['alter_bd_color']};
}
.scheme_self.footer_wrap h1, .scheme_self.footer_wrap h2, .scheme_self.footer_wrap h3,
.scheme_self.footer_wrap h4, .scheme_self.footer_wrap h5, .scheme_self.footer_wrap h6,
.scheme_self.footer_wrap h1 a, .scheme_self.footer_wrap h2 a, .scheme_self.footer_wrap h3 a,
.scheme_self.footer_wrap h4 a, .scheme_self.footer_wrap h5 a, .scheme_self.footer_wrap h6 a,
.footer_wrap .scheme_self.vc_row h1, .footer_wrap .scheme_self.vc_row h2, .footer_wrap .scheme_self.vc_row h3,
.footer_wrap .scheme_self.vc_row h4, .footer_wrap .scheme_self.vc_row h5, .footer_wrap .scheme_self.vc_row h6,
.footer_wrap .scheme_self.vc_row h1 a, .footer_wrap .scheme_self.vc_row h2 a, .footer_wrap .scheme_self.vc_row h3 a,
.footer_wrap .scheme_self.vc_row h4 a, .footer_wrap .scheme_self.vc_row h5 a, .footer_wrap .scheme_self.vc_row h6 a {
	color: {$colors['alter_dark']};
}
.scheme_self.footer_wrap h1 a:hover, .scheme_self.footer_wrap h2 a:hover, .scheme_self.footer_wrap h3 a:hover,
.scheme_self.footer_wrap h4 a:hover, .scheme_self.footer_wrap h5 a:hover, .scheme_self.footer_wrap h6 a:hover,
.footer_wrap .scheme_self.vc_row h1 a:hover, .footer_wrap .scheme_self.vc_row h2 a:hover, .footer_wrap .scheme_self.vc_row h3 a:hover,
.footer_wrap .scheme_self.vc_row h4 a:hover, .footer_wrap .scheme_self.vc_row h5 a:hover, .footer_wrap .scheme_self.vc_row h6 a:hover {
	color: {$colors['alter_link']};
}
.scheme_self.footer_wrap .widget li:before,
.footer_wrap .scheme_self.vc_row .widget li:before {
	background-color: {$colors['text_link2']};
}
.scheme_self.footer_wrap a,
.footer_wrap .scheme_self.vc_row a {
	color: {$colors['text_link2']};
}
.scheme_self.footer_wrap a:hover,
.footer_wrap .scheme_self.vc_row a:hover {
	color: {$colors['inverse_link']};
}

.footer_logo_inner {
	border-color: {$colors['alter_bd_color']};
}
.footer_logo_inner:after {
	background-color: {$colors['alter_text']};
}
.footer_socials_inner .social_item .social_icon {
	color: {$colors['alter_text']};
}
.footer_socials_inner .social_item:hover .social_icon {
	color: {$colors['alter_dark']};
}
.menu_footer_nav_area ul li a {
	color: {$colors['alter_dark']};
}
.menu_footer_nav_area ul li a:hover {
	color: {$colors['alter_link']};
}
.menu_footer_nav_area ul li+li:before {
	border-color: {$colors['alter_light']};
}

.footer_copyright_inner {
	color: {$colors['text_dark']};
}
.footer_copyright_inner a {
	color: {$colors['text_dark']};
}
.footer_copyright_inner a:hover {
	color: {$colors['text_link']};
}
.footer_copyright_inner .copyright_text {
	color: {$colors['text']};
}


/* Third-party plugins */

.mfp-bg {
	background-color: {$colors['bg_color_07']};
}
.mfp-image-holder .mfp-close,
.mfp-iframe-holder .mfp-close,
.mfp-close-btn-in .mfp-close {
	color: {$colors['text_dark']};
	background-color: transparent;
}
.mfp-image-holder .mfp-close:hover,
.mfp-iframe-holder .mfp-close:hover,
.mfp-close-btn-in .mfp-close:hover {
	color: {$colors['text_link']};
}


.post_layout_excerpt.sticky .info_post_short .post_comments {
	color: {$colors['text_link2']};
}

.contacts_info span[class*="icon-"] {
	color: {$colors['text_link']};
}


.sc_form_form .sc_form_field_button button {
	background-color: {$colors['input_bg_color']};
	color: {$colors['text_hover2']};
}


.ui-datepicker .ui-datepicker-title {
	color: {$colors['text_dark']};
}
.ui-datepicker .ui-datepicker-buttonpane button {
	background-color: {$colors['text_link']};
	color: {$colors['inverse_link']};
}
.ui-datepicker .ui-datepicker-buttonpane button:hover {
	background-color: {$colors['text_hover']};
	color: {$colors['inverse_link']};
}


.form_order_dark {
	background-color: {$colors['text_link']};
}
.form_order_dark h2 {
	color: {$colors['inverse_link']};
}

.wpcf7-form .form_order_dark .wpcf7-submit {
	background-color: {$colors['input_bg_color']};
	color: {$colors['text_link']};
}
.wpcf7-form .form_order_dark .wpcf7-submit:hover {
	background-color: {$colors['input_bg_color']};
	color: {$colors['text_link']};
}
.post_item.post_layout_excerpt.sticky .post_title a:hover {
	color: {$colors['text_hover']};
}


/*------datetimepicker------*/

.xdsoft_datetimepicker .xdsoft_label>.xdsoft_select>div>.xdsoft_option.xdsoft_current,
.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_default, 

.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box>div>div.xdsoft_current {
	background-color: {$colors['alter_dark']};
}
.xdsoft_datetimepicker .xdsoft_calendar th,
.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_current{
   background-color: {$colors['alter_dark']} !important;
 	color: {$colors['inverse_link']} !important;
}
.xdsoft_datetimepicker .xdsoft_label>.xdsoft_select>div>.xdsoft_option:hover,
.xdsoft_datetimepicker .xdsoft_calendar td:hover, 
.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box>div>div:hover{
    background-color: {$colors['alter_link']}!important;
}


.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box>div>div,
.xdsoft_datetimepicker .xdsoft_label,
.xdsoft_datetimepicker .xdsoft_calendar td,
.xdsoft_datetimepicker{
    background: {$colors['alter_bg_color']};
}

/*------------*/

.wp-block-cover p:not(.has-text-color) > strong,
.wp-block-cover p:not(.has-text-color) > a,
.wp-block-cover p:not(.has-text-color) {
	color: {$colors['inverse_link']};
}
.wp-block-cover p:not(.has-text-color) > a:hover{
	color: {$colors['alter_link2']};
}


CSS;
				
					$rez = apply_filters('happy_baby_filter_get_css', $rez, $colors, false, $scheme);
					$css['colors'] .= $rez['colors'];
				}
			}
		}
				
		$css_str = (!empty($css['fonts']) ? $css['fonts'] : '')
				. (!empty($css['colors']) ? $css['colors'] : '');
		return apply_filters( 'happy_baby_filter_prepare_css', $css_str, $remove_spaces );
	}
}
?>