<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.22
 */

// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( !function_exists('happy_baby_customizer_theme_setup1') ) {
	add_action( 'after_setup_theme', 'happy_baby_customizer_theme_setup1', 1 );
	function happy_baby_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		happy_baby_storage_set('settings', array(
			
			'duplicate_options'		=> 'child',		// none  - use separate options for template and child-theme
													// child - duplicate theme options from the main theme to the child-theme only
													// both  - sinchronize changes in the theme options between main and child themes
			
			'custmize_refresh'		=> 'auto',		// Refresh method for preview area in the Appearance - Customize:
													// auto - refresh preview area on change each field with Theme Options
													// manual - refresh only obn press button 'Refresh' at the top of Customize frame
		
			'max_load_fonts'		=> 5,			// Max fonts number to load from Google fonts or from uploaded fonts
		
			'max_excerpt_length'	=> 45,			// Max words number for the excerpt in the blog style 'Excerpt'.
													// For style 'Classic' - get half from this value

			'comment_maxlength'		=> 1000,		// Max length of the message from contact form

			'comment_after_name'	=> true,		// Place 'comment' field before the 'name' and 'email'
			
			'socials_type'			=> 'icons',		// Type of socials:
													// icons - use font icons to present social networks
													// images - use images from theme's folder trx_addons/css/icons.png
			
			'icons_type'			=> 'icons',		// Type of other icons:
													// icons - use font icons to present icons
													// images - use images from theme's folder trx_addons/css/icons.png
			
			'icons_selector'		=> 'internal',	// Icons selector in the shortcodes:

													// internal - internal popup with plugin's or theme's icons list (fast)
			'disable_jquery_ui'		=> false,		// Prevent loading custom jQuery UI libraries in the third-party plugins
		
			'use_mediaelements'		=> true,		// Load script "Media Elements" to play video and audio
		));


		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------
		
		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		
		happy_baby_storage_set('load_fonts', array(
			// Google font
			array(
				'name'	 => 'Caveat',
				'family' => 'cursive',
				'styles' => '400,700'		// Parameter 'style' used only for the Google fonts
			),
			array(
				'name'	 => 'Fredoka One',
				'family' => 'cursive',
				'styles' => '400'		// Parameter 'style' used only for the Google fonts
			),
			// Font-face packed with theme
			array(
				'name'   => 'metropolis',
				'family' => 'sans-serif'
			)

		));
		
		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		happy_baby_storage_set('load_fonts_subset', 'latin,latin-ext');
		
		// Settings of the main tags
		happy_baby_storage_set('theme_fonts', array(
			'p' => array(
				'title'				=> esc_html__('Main text', 'happy-baby'),
				'description'		=> esc_html__('Font settings of the main text of the site', 'happy-baby'),
				'font-family'		=> '"metropolis",sans-serif',
				'font-size' 		=> '1rem',
				'font-weight'		=> '300',
				'font-style'		=> 'normal',
				'line-height'		=> '1.69em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0.3px',
				'margin-top'		=> '0em',
				'margin-bottom'		=> '1.25em'
				),
			'h1' => array(
				'title'				=> esc_html__('Heading 1', 'happy-baby'),
				'font-family'		=> '"Fredoka One",cursive',
				'font-size' 		=> '3.438em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.2em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '1.63em',
				'margin-bottom'		=> '1.06em'
				),
			'h2' => array(
				'title'				=> esc_html__('Heading 2', 'happy-baby'),
				'font-family'		=> '"Fredoka One",cursive',
				'font-size' 		=> '2.5em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.2em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '2.1em',
				'margin-bottom'		=> '1em'
				),
			'h3' => array(
				'title'				=> esc_html__('Heading 3', 'happy-baby'),
				'font-family'		=> '"metropolis",sans-serif',
				'font-size' 		=> '1.875em',
				'font-weight'		=> '800',
				'font-style'		=> 'normal',
				'line-height'		=> '1.18em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '2.2em',
				'margin-bottom'		=> '1.45em'
				),
			'h4' => array(
				'title'				=> esc_html__('Heading 4', 'happy-baby'),
				'font-family'		=> '"metropolis",sans-serif',
				'font-size' 		=> '1.625em',
				'font-weight'		=> '800',
				'font-style'		=> 'normal',
				'line-height'		=> '1.3043em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '2.5em',
				'margin-bottom'		=> '1.28em'
				),
			'h5' => array(
				'title'				=> esc_html__('Heading 5', 'happy-baby'),
				'font-family'		=> '"metropolis",sans-serif',
				'font-size' 		=> '1.375em',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.23em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px',
				'margin-top'		=> '2.1em',
				'margin-bottom'		=> '1.1em'
				),
			'h6' => array(
				'title'				=> esc_html__('Heading 6', 'happy-baby'),
				'font-family'		=> '"metropolis",sans-serif',
				'font-size' 		=> '1.125em',
				'font-weight'		=> '700',
				'font-style'		=> 'normal',
				'line-height'		=> '1.24em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0.2px',
				'margin-top'		=> '2.7em',
				'margin-bottom'		=> '0.9em'
				),
			'logo' => array(
				'title'				=> esc_html__('Logo text', 'happy-baby'),
				'description'		=> esc_html__('Font settings of the text case of the logo', 'happy-baby'),
				'font-family'		=> '"Fredoka One",cursive',
				'font-size' 		=> '1.8em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.25em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '1px'
				),
			'button' => array(
				'title'				=> esc_html__('Buttons', 'happy-baby'),
				'font-family'		=> '"Fredoka One",cursive',
				'font-size' 		=> '18px',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> '',
				'letter-spacing'	=> '0px'
				),
			'input' => array(
				'title'				=> esc_html__('Input fields', 'happy-baby'),
				'description'		=> esc_html__('Font settings of the input fields, dropdowns and textareas', 'happy-baby'),
				'font-family'		=> 'inherit',
				'font-size' 		=> '1em',
				'font-weight'		=> '400',
				'font-style'		=> 'normal',
				'line-height'		=> '1.2em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0px'
				),
			'info' => array(
				'title'				=> esc_html__('Post meta', 'happy-baby'),
				'description'		=> esc_html__('Font settings of the post meta: date, counters, share, etc.', 'happy-baby'),
				'font-family'		=> '"metropolis",sans-serif',
				'font-size' 		=> '14px',
				'font-weight'		=> '300',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'none',
				'letter-spacing'	=> '0.3px',
				'margin-top'		=> '0.4em',
				'margin-bottom'		=> ''
				),
			'menu' => array(
				'title'				=> esc_html__('Main menu', 'happy-baby'),
				'description'		=> esc_html__('Font settings of the main menu items', 'happy-baby'),
				'font-family'		=> '"metropolis",sans-serif',
				'font-size' 		=> '13px',
				'font-weight'		=> '600',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '1.9px'
				),
			'submenu' => array(
				'title'				=> esc_html__('Dropdown menu', 'happy-baby'),
				'description'		=> esc_html__('Font settings of the dropdown menu items', 'happy-baby'),
				'font-family'		=> '"metropolis",sans-serif',
				'font-size' 		=> '13px',
				'font-weight'		=> '600',
				'font-style'		=> 'normal',
				'line-height'		=> '1.5em',
				'text-decoration'	=> 'none',
				'text-transform'	=> 'uppercase',
				'letter-spacing'	=> '0px'
				),
			'other' => array(
				'title'				=> esc_html__('Other', 'happy-baby'),
				'description'		=> esc_html__('Font settings of the Other items', 'happy-baby'),
				'font-family'		=> '"Caveat",cursive'
			)
		));
		
		
		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		happy_baby_storage_set('scheme_color_groups', array(
			'main'	=> array(
							'title'			=> esc_html__('Main', 'happy-baby'),
							'description'	=> esc_html__('Colors of the main content area', 'happy-baby')
							),
			'alter'	=> array(
							'title'			=> esc_html__('Alter', 'happy-baby'),
							'description'	=> esc_html__('Colors of the alternative blocks (sidebars, etc.)', 'happy-baby')
							),
			'extra'	=> array(
							'title'			=> esc_html__('Extra', 'happy-baby'),
							'description'	=> esc_html__('Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'happy-baby')
							),
			'inverse' => array(
							'title'			=> esc_html__('Inverse', 'happy-baby'),
							'description'	=> esc_html__('Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'happy-baby')
							),
			'input'	=> array(
							'title'			=> esc_html__('Input', 'happy-baby'),
							'description'	=> esc_html__('Colors of the form fields (text field, textarea, select, etc.)', 'happy-baby')
							),
			)
		);
		happy_baby_storage_set('scheme_color_names', array(
			'bg_color'	=> array(
							'title'			=> esc_html__('Background color', 'happy-baby'),
							'description'	=> esc_html__('Background color of this block in the normal state', 'happy-baby')
							),
			'bg_hover'	=> array(
							'title'			=> esc_html__('Background hover', 'happy-baby'),
							'description'	=> esc_html__('Background color of this block in the hovered state', 'happy-baby')
							),
			'bd_color'	=> array(
							'title'			=> esc_html__('Border color', 'happy-baby'),
							'description'	=> esc_html__('Border color of this block in the normal state', 'happy-baby')
							),
			'bd_hover'	=>  array(
							'title'			=> esc_html__('Border hover', 'happy-baby'),
							'description'	=> esc_html__('Border color of this block in the hovered state', 'happy-baby')
							),
			'text'		=> array(
							'title'			=> esc_html__('Text', 'happy-baby'),
							'description'	=> esc_html__('Color of the plain text inside this block', 'happy-baby')
							),
			'text_dark'	=> array(
							'title'			=> esc_html__('Text dark', 'happy-baby'),
							'description'	=> esc_html__('Color of the dark text (bold, header, etc.) inside this block', 'happy-baby')
							),
			'text_light'=> array(
							'title'			=> esc_html__('Text light', 'happy-baby'),
							'description'	=> esc_html__('Color of the light text (post meta, etc.) inside this block', 'happy-baby')
							),
			'text_link'	=> array(
							'title'			=> esc_html__('Link', 'happy-baby'),
							'description'	=> esc_html__('Color of the links inside this block', 'happy-baby')
							),
			'text_hover'=> array(
							'title'			=> esc_html__('Link hover', 'happy-baby'),
							'description'	=> esc_html__('Color of the hovered state of links inside this block', 'happy-baby')
							),
			'text_link2'=> array(
							'title'			=> esc_html__('Link 2', 'happy-baby'),
							'description'	=> esc_html__('Color of the accented texts (areas) inside this block', 'happy-baby')
							),
			'text_hover2'=> array(
							'title'			=> esc_html__('Link 2 hover', 'happy-baby'),
							'description'	=> esc_html__('Color of the hovered state of accented texts (areas) inside this block', 'happy-baby')
							),
			'text_link3'=> array(
							'title'			=> esc_html__('Link 3', 'happy-baby'),
							'description'	=> esc_html__('Color of the other accented texts (buttons) inside this block', 'happy-baby')
							),
			'text_hover3'=> array(
							'title'			=> esc_html__('Link 3 hover', 'happy-baby'),
							'description'	=> esc_html__('Color of the hovered state of other accented texts (buttons) inside this block', 'happy-baby')
							)
			)
		);
		happy_baby_storage_set('schemes', array(
		
			// Color scheme: 'default'
			'default' => array(
				'title'	 => esc_html__('Default', 'happy-baby'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'			=> '#ffffff',
					'bd_color'			=> '#eaeaea',
		
					// Text and links colors
					'text'				=> '#7f808c',
					'text_light'		=> '#95959d',
					'text_dark'			=> '#262f71',
					'text_link'			=> '#88d4f2',
					'text_hover'		=> '#262f71',
					'text_link2'		=> '#ffb9cc',
					'text_hover2'		=> '#f6a3ba',
					'text_link3'		=> '#ffd786',
					'text_hover3'		=> '#f8bb4a',
		
					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'	=> '#f9f9f9',
					'alter_bg_hover'	=> '#e6e6e6',
					'alter_bd_color'	=> '#eaeaea',
					'alter_bd_hover'	=> '#dadada',
					'alter_text'		=> '#b6b6bc',
					'alter_light'		=> '#7e7f8b',
					'alter_dark'		=> '#262f71',
					'alter_link'		=> '#ffb9cc',
					'alter_hover'		=> '#72cfd5',
					'alter_link2'		=> '#8be77c',
					'alter_hover2'		=> '#ddb837',
					'alter_link3'		=> '#eec432',
					'alter_hover3'		=> '#ddb837',
		
					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'	=> '#4559b3',
					'extra_bg_hover'	=> '#28272e',
					'extra_bd_color'	=> '#3a427e',
					'extra_bd_hover'	=> '#3d3d3d',
					'extra_text'		=> '#bfbfbf',
					'extra_light'		=> '#afafaf',
					'extra_dark'		=> '#ffffff',
					'extra_link'		=> '#ffd786',
					'extra_hover'		=> '#f8bb4a',
					'extra_link2'		=> '#80d572',
					'extra_hover2'		=> '#8be77c',
					'extra_link3'		=> '#ddb837',
					'extra_hover3'		=> '#eec432',
		
					// Input fields (form's fields and textarea)
					'input_bg_color'	=> '#f4f4f4',
					'input_bg_hover'	=> '#f4f4f4',
					'input_bd_color'	=> '#eaeaea',
					'input_bd_hover'	=> '#eaeaea',
					'input_text'		=> '#b6b6bc',
					'input_light'		=> '#b6b6bc',
					'input_dark'		=> '#262f71',
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color'	=> '#67bcc1',
					'inverse_bd_hover'	=> '#5aa4a9',
					'inverse_text'		=> '#1d1d1d',
					'inverse_light'		=> '#333333',
					'inverse_dark'		=> '#000000',
					'inverse_link'		=> '#ffffff',
					'inverse_hover'		=> '#1d1d1d'
				)
			),
		
			// Color scheme: 'dark'
			'dark' => array(
				'title'  => esc_html__('Dark', 'happy-baby'),
				'colors' => array(
					
					// Whole block border and background
					'bg_color'			=> '#0e0d12',
					'bd_color'			=> '#1c1b1f',
		
					// Text and links colors
					'text'				=> '#b7b7b7',
					'text_light'		=> '#b6b6bc',
					'text_dark'			=> '#ffffff',
					'text_link'			=> '#88d4f2',
					'text_hover'		=> '#262f71',
					'text_link2'		=> '#ffb9cc',
					'text_hover2'		=> '#f6a3ba',
					'text_link3'		=> '#ffd786',
					'text_hover3'		=> '#f8bb4a',

					// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
					'alter_bg_color'	=> '#262f71',
					'alter_bg_hover'	=> '#e6e6e6',
					'alter_bd_color'	=> '#313131',
					'alter_bd_hover'	=> '#3d3d3d',
					'alter_text'		=> '#c1c8e9',
					'alter_light'		=> '#7f808c',
					'alter_dark'		=> '#ffffff',
					'alter_link'		=> '#ffb9cc',
					'alter_hover'		=> '#fe7259',
					'alter_link2'		=> '#8be77c',
					'alter_hover2'		=> '#80d572',
					'alter_link3'		=> '#eec432',
					'alter_hover3'		=> '#ddb837',

					// Extra blocks (submenu, tabs, color blocks, etc.)
					'extra_bg_color'	=> '#4559b3',
					'extra_bg_hover'	=> '#28272e',
					'extra_bd_color'	=> '#313131',
					'extra_bd_hover'	=> '#3d3d3d',
					'extra_text'		=> '#a6a6a6',
					'extra_light'		=> '#5f5f5f',
					'extra_dark'		=> '#ffffff',
					'extra_link'		=> '#ffd786',
					'extra_hover'		=> '#f8bb4a',
					'extra_link2'		=> '#80d572',
					'extra_hover2'		=> '#8be77c',
					'extra_link3'		=> '#ddb837',
					'extra_hover3'		=> '#eec432',

					// Input fields (form's fields and textarea)
					'input_bg_color'	=> '#0e1755',
					'input_bg_hover'	=> '#0e1755',
					'input_bd_color'	=> '#0d154c',
					'input_bd_hover'	=> '#0d154c',
					'input_text'		=> '#717baf',
					'input_light'		=> '#ffffff',
					'input_dark'		=> '#ffffff',
					
					// Inverse blocks (text and links on the 'text_link' background)
					'inverse_bd_color'	=> '#e36650',
					'inverse_bd_hover'	=> '#cb5b47',
					'inverse_text'		=> '#1d1d1d',
					'inverse_light'		=> '#5f5f5f',
					'inverse_dark'		=> '#000000',
					'inverse_link'		=> '#ffffff',
					'inverse_hover'		=> '#1d1d1d'
				)
			)
		
		));
		
		// Simple schemes substitution
		happy_baby_storage_set('schemes_simple', array(
			// Main color	// Slave elements and it's darkness koef.
			'text_link'		=> array('alter_hover' => 1,	'extra_link' => 1, 'inverse_bd_color' => 0.85, 'inverse_bd_hover' => 0.7),
			'text_hover'	=> array('alter_link' => 1,		'extra_hover' => 1),
			'text_link2'	=> array('alter_hover2' => 1,	'extra_link2' => 1),
			'text_hover2'	=> array('alter_link2' => 1,	'extra_hover2' => 1),
			'text_link3'	=> array('alter_hover3' => 1,	'extra_link3' => 1),
			'text_hover3'	=> array('alter_link3' => 1,	'extra_hover3' => 1)
		));
	}
}

			
// Additional (calculated) theme-specific colors
// Attention! Don't forget setup custom colors also in the theme.customizer.color-scheme.js
if (!function_exists('happy_baby_customizer_add_theme_colors')) {
	function happy_baby_customizer_add_theme_colors($colors) {
		if (substr($colors['text'], 0, 1) == '#') {
			$colors['bg_color_0']  = happy_baby_hex2rgba( $colors['bg_color'], 0 );
			$colors['bg_color_02']  = happy_baby_hex2rgba( $colors['bg_color'], 0.2 );
			$colors['bg_color_07']  = happy_baby_hex2rgba( $colors['bg_color'], 0.7 );
			$colors['bg_color_08']  = happy_baby_hex2rgba( $colors['bg_color'], 0.8 );
			$colors['bg_color_09']  = happy_baby_hex2rgba( $colors['bg_color'], 0.9 );
			$colors['alter_bg_color_07']  = happy_baby_hex2rgba( $colors['alter_bg_color'], 0.7 );
			$colors['alter_bg_color_04']  = happy_baby_hex2rgba( $colors['alter_bg_color'], 0.4 );
			$colors['alter_bg_color_02']  = happy_baby_hex2rgba( $colors['alter_bg_color'], 0.2 );
			$colors['alter_bd_color_02']  = happy_baby_hex2rgba( $colors['alter_bd_color'], 0.2 );
			$colors['extra_bg_color_07']  = happy_baby_hex2rgba( $colors['extra_bg_color'], 0.7 );
			$colors['text_dark_07']  = happy_baby_hex2rgba( $colors['text_dark'], 0.7 );
			$colors['text_link_02']  = happy_baby_hex2rgba( $colors['text_link'], 0.2 );
			$colors['text_link_07']  = happy_baby_hex2rgba( $colors['text_link'], 0.7 );
			$colors['text_link_blend'] = happy_baby_hsb2hex(happy_baby_hex2hsb( $colors['text_link'], 2, -5, 5 ));
			$colors['alter_link_blend'] = happy_baby_hsb2hex(happy_baby_hex2hsb( $colors['alter_link'], 2, -5, 5 ));
		} else {
			$colors['bg_color_0'] = '{{ data.bg_color_0 }}';
			$colors['bg_color_02'] = '{{ data.bg_color_02 }}';
			$colors['bg_color_07'] = '{{ data.bg_color_07 }}';
			$colors['bg_color_08'] = '{{ data.bg_color_08 }}';
			$colors['bg_color_09'] = '{{ data.bg_color_09 }}';
			$colors['alter_bg_color_07'] = '{{ data.alter_bg_color_07 }}';
			$colors['alter_bg_color_04'] = '{{ data.alter_bg_color_04 }}';
			$colors['alter_bg_color_02'] = '{{ data.alter_bg_color_02 }}';
			$colors['alter_bd_color_02'] = '{{ data.alter_bd_color_02 }}';
			$colors['extra_bg_color_07'] = '{{ data.extra_bg_color_07 }}';
			$colors['text_dark_07'] = '{{ data.text_dark_07 }}';
			$colors['text_link_02'] = '{{ data.text_link_02 }}';
			$colors['text_link_07'] = '{{ data.text_link_07 }}';
			$colors['text_link_blend'] = '{{ data.text_link_blend }}';
			$colors['alter_link_blend'] = '{{ data.alter_link_blend }}';
		}
		return $colors;
	}
}


			
// Additional theme-specific fonts rules
// Attention! Don't forget setup fonts rules also in the theme.customizer.color-scheme.js
if (!function_exists('happy_baby_customizer_add_theme_fonts')) {
	function happy_baby_customizer_add_theme_fonts($fonts) {
		$rez = array();	
		foreach ($fonts as $tag => $font) {
			if (substr($font['font-family'], 0, 2) != '{{') {
				$rez[$tag.'_font-family'] 		= !empty($font['font-family']) && !happy_baby_is_inherit($font['font-family'])
														? 'font-family:' . trim($font['font-family']) . ';' 
														: '';
				$rez[$tag.'_font-size'] 		= !empty($font['font-size']) && !happy_baby_is_inherit($font['font-size'])
														? 'font-size:' . happy_baby_prepare_css_value($font['font-size']) . ";"
														: '';
				$rez[$tag.'_line-height'] 		= !empty($font['line-height']) && !happy_baby_is_inherit($font['line-height'])
														? 'line-height:' . trim($font['line-height']) . ";"
														: '';
				$rez[$tag.'_font-weight'] 		= !empty($font['font-weight']) && !happy_baby_is_inherit($font['font-weight'])
														? 'font-weight:' . trim($font['font-weight']) . ";"
														: '';
				$rez[$tag.'_font-style'] 		= !empty($font['font-style']) && !happy_baby_is_inherit($font['font-style'])
														? 'font-style:' . trim($font['font-style']) . ";"
														: '';
				$rez[$tag.'_text-decoration'] 	= !empty($font['text-decoration']) && !happy_baby_is_inherit($font['text-decoration'])
														? 'text-decoration:' . trim($font['text-decoration']) . ";"
														: '';
				$rez[$tag.'_text-transform'] 	= !empty($font['text-transform']) && !happy_baby_is_inherit($font['text-transform'])
														? 'text-transform:' . trim($font['text-transform']) . ";"
														: '';
				$rez[$tag.'_letter-spacing'] 	= !empty($font['letter-spacing']) && !happy_baby_is_inherit($font['letter-spacing'])
														? 'letter-spacing:' . trim($font['letter-spacing']) . ";"
														: '';
				$rez[$tag.'_margin-top'] 		= !empty($font['margin-top']) && !happy_baby_is_inherit($font['margin-top'])
														? 'margin-top:' . happy_baby_prepare_css_value($font['margin-top']) . ";"
														: '';
				$rez[$tag.'_margin-bottom'] 	= !empty($font['margin-bottom']) && !happy_baby_is_inherit($font['margin-bottom'])
														? 'margin-bottom:' . happy_baby_prepare_css_value($font['margin-bottom']) . ";"
														: '';
			} else {
				$rez[$tag.'_font-family']		= '{{ data["'.$tag.'_font-family"] }}';
				$rez[$tag.'_font-size']			= '{{ data["'.$tag.'_font-size"] }}';
				$rez[$tag.'_line-height']		= '{{ data["'.$tag.'_line-height"] }}';
				$rez[$tag.'_font-weight']		= '{{ data["'.$tag.'_font-weight"] }}';
				$rez[$tag.'_font-style']		= '{{ data["'.$tag.'_font-style"] }}';
				$rez[$tag.'_text-decoration']	= '{{ data["'.$tag.'_text-decoration"] }}';
				$rez[$tag.'_text-transform']	= '{{ data["'.$tag.'_text-transform"] }}';
				$rez[$tag.'_letter-spacing']	= '{{ data["'.$tag.'_letter-spacing"] }}';
				$rez[$tag.'_margin-top']		= '{{ data["'.$tag.'_margin-top"] }}';
				$rez[$tag.'_margin-bottom']		= '{{ data["'.$tag.'_margin-bottom"] }}';
			}
		}
		return $rez;
	}
}




//-------------------------------------------------------
//-- Thumb sizes
//-------------------------------------------------------

if ( !function_exists('happy_baby_customizer_theme_setup') ) {
	add_action( 'after_setup_theme', 'happy_baby_customizer_theme_setup' );
	function happy_baby_customizer_theme_setup() {

		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size(370, 0, false);
		
		// Add thumb sizes
		// ATTENTION! If you change list below - check filter's names in the 'trx_addons_filter_get_thumb_size' hook
		$thumb_sizes = apply_filters('happy_baby_filter_add_thumb_sizes', array(
			'happy_baby-thumb-huge'		=> array(1170, 658, true),
			'happy_baby-thumb-big' 		=> array( 760, 428, true),
			'happy_baby-thumb-med' 		=> array( 408, 250, true), // 370, 208 -> 408, 230
			'happy_baby-thumb-tiny' 		=> array(  90,  90, true),
			'happy_baby-thumb-masonry-big' => array( 760,   0, false),		// Only downscale, not crop
			'happy_baby-thumb-masonry'		=> array( 408,   0, false),		// Only downscale, not crop
			'happy_baby-thumb-cub'		    => array( 600, 600, true),
			)
		);
		$mult = happy_baby_get_theme_option('retina_ready', 1);
		if ($mult > 1) $GLOBALS['content_width'] = apply_filters( 'happy_baby_filter_content_width', 1170*$mult);
		foreach ($thumb_sizes as $k=>$v) {
			// Add Original dimensions
			add_image_size( $k, $v[0], $v[1], $v[2]);
			// Add Retina dimensions
			if ($mult > 1) add_image_size( $k.'-@retina', $v[0]*$mult, $v[1]*$mult, $v[2]);
		}

	}
}

if ( !function_exists('happy_baby_customizer_image_sizes') ) {
	add_filter( 'image_size_names_choose', 'happy_baby_customizer_image_sizes' );
	function happy_baby_customizer_image_sizes( $sizes ) {
		$thumb_sizes = apply_filters('happy_baby_filter_add_thumb_sizes', array(
			'happy_baby-thumb-huge'		=> esc_html__( 'Huge image', 'happy-baby' ),
			'happy_baby-thumb-big'			=> esc_html__( 'Large image', 'happy-baby' ),
			'happy_baby-thumb-med'			=> esc_html__( 'Medium image', 'happy-baby' ),
			'happy_baby-thumb-tiny'		=> esc_html__( 'Small square avatar', 'happy-baby' ),
			'happy_baby-thumb-masonry-big'	=> esc_html__( 'Masonry Large (scaled)', 'happy-baby' ),
			'happy_baby-thumb-masonry'		=> esc_html__( 'Masonry (scaled)', 'happy-baby' ),
			'happy_baby-thumb-cub'		    => esc_html__( 'Cub', 'happy-baby' ),
			)
		);
		$mult = happy_baby_get_theme_option('retina_ready', 1);
		foreach($thumb_sizes as $k=>$v) {
			$sizes[$k] = $v;
			if ($mult > 1) $sizes[$k.'-@retina'] = $v.' '.esc_html__('@2x', 'happy-baby' );
		}
		return $sizes;
	}
}

// Remove some thumb-sizes from the ThemeREX Addons list
if ( !function_exists( 'happy_baby_customizer_trx_addons_add_thumb_sizes' ) ) {
	add_filter( 'trx_addons_filter_add_thumb_sizes', 'happy_baby_customizer_trx_addons_add_thumb_sizes');
	function happy_baby_customizer_trx_addons_add_thumb_sizes($list=array()) {
		if (is_array($list)) {
			foreach ($list as $k=>$v) {
				if (in_array($k, array(
								'trx_addons-thumb-huge',
								'trx_addons-thumb-big',
								'trx_addons-thumb-medium',
								'trx_addons-thumb-tiny',
								'trx_addons-thumb-masonry-big',
								'trx_addons-thumb-masonry',
								'trx_addons-thumb-cub',
								)
							)
						) unset($list[$k]);
			}
		}
		return $list;
	}
}

// and replace removed styles with theme-specific thumb size
if ( !function_exists( 'happy_baby_customizer_trx_addons_get_thumb_size' ) ) {
	add_filter( 'trx_addons_filter_get_thumb_size', 'happy_baby_customizer_trx_addons_get_thumb_size');
	function happy_baby_customizer_trx_addons_get_thumb_size($thumb_size='') {
		return str_replace(array(
							'trx_addons-thumb-huge',
							'trx_addons-thumb-huge-@retina',
							'trx_addons-thumb-big',
							'trx_addons-thumb-big-@retina',
							'trx_addons-thumb-medium',
							'trx_addons-thumb-medium-@retina',
							'trx_addons-thumb-tiny',
							'trx_addons-thumb-tiny-@retina',
							'trx_addons-thumb-masonry-big',
							'trx_addons-thumb-masonry-big-@retina',
							'trx_addons-thumb-masonry',
							'trx_addons-thumb-masonry-@retina',
							'trx_addons-thumb-cub',
							'trx_addons-thumb-cub-@retina',
							),
							array(
							'happy_baby-thumb-huge',
							'happy_baby-thumb-huge-@retina',
							'happy_baby-thumb-big',
							'happy_baby-thumb-big-@retina',
							'happy_baby-thumb-med',
							'happy_baby-thumb-med-@retina',
							'happy_baby-thumb-tiny',
							'happy_baby-thumb-tiny-@retina',
							'happy_baby-thumb-masonry-big',
							'happy_baby-thumb-masonry-big-@retina',
							'happy_baby-thumb-masonry',
							'happy_baby-thumb-masonry-@retina',
							'happy_baby-thumb-cub',
							'happy_baby-thumb-cub-@retina',
							),
							$thumb_size);
	}
}




// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if (!function_exists('happy_baby_create_theme_options')) {

	function happy_baby_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override =sprintf( esc_html__('%sAttention!%s Some of these options can be overridden in the following sections (Homepage, Blog archive, Shop, Events, etc.) or in the settings of individual pages', 'happy-baby'),'<b>','</b>');

		happy_baby_storage_set('options', array(

			// Section 'Title & Tagline' - add theme options in the standard WP section
			'title_tagline' => array(
				"title" => esc_html__('Title, Tagline & Site icon', 'happy-baby'),
				"desc" => wp_kses_data( esc_html__('Specify site title and tagline (if need) and upload the site icon', 'happy-baby') ),
				"type" => "section"
				),


			// Section 'Header' - add theme options in the standard WP section
			'header_image' => array(
				"title" => esc_html__('Header', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload logo images, select header type and widgets set for the header', 'happy-baby') )
							. '<br>'
							. wp_kses_data( $msg_override ),
				"type" => "section"
				),
			'header_image_override' => array(
				"title" => esc_html__('Header image override', 'happy-baby'),
				"desc" => wp_kses_data( __("Allow override the header image with the page's/post's/product's/etc. featured image", 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_style' => array(
				"title" => esc_html__('Header style', 'happy-baby'),
				"desc" => wp_kses_data( __('Select style to display the site header', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"std" => 'header-default',
				"options" => array(),
				"type" => "select"
				),
			'header_position' => array(
				"title" => esc_html__('Header position', 'happy-baby'),
				"desc" => wp_kses_data( __('Select position to display the site header', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"std" => 'default',
				"options" => array(),
				"type" => "select"
				),
			'header_widgets' => array(
				"title" => esc_html__('Header widgets', 'happy-baby'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on each page', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'happy-baby'),
					"desc" => wp_kses_data( __('Select set of widgets to show in the header on this page', 'happy-baby') ),
				),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),
			'header_columns' => array(
				"title" => esc_html__('Header columns', 'happy-baby'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the Header. If 0 - autodetect by the widgets count', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"dependency" => array(
					'header_style' => array('header-default'),
					'header_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => happy_baby_get_list_range(0,6),
				"type" => "select"
				),
			'header_scheme' => array(
				"title" => esc_html__('Header Color Scheme', 'happy-baby'),
				"desc" => wp_kses_data( __('Select color scheme to decorate header area', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"std" => 'inherit',
				"options" => array(),
				"refresh" => false,
				"type" => "select"
				),
			'header_fullheight' => array(
				"title" => esc_html__('Header fullheight', 'happy-baby'),
				"desc" => wp_kses_data( __("Enlarge header area to fill whole screen. Used only if header have a background image", 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_wide' => array(
				"title" => esc_html__('Header fullwide', 'happy-baby'),
				"desc" => wp_kses_data( __('Do you want to stretch the header widgets area to the entire window width?', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"dependency" => array(
					'header_style' => array('header-default')
				),
				"std" => 1,
				"type" => "checkbox"
				),

			'menu_info' => array(
				"title" => esc_html__('Menu settings', 'happy-baby'),
				"desc" => wp_kses_data( __('Select main menu style, position, color scheme and other parameters', 'happy-baby') ),
				"type" => "info"
				),
			'menu_style' => array(
				"title" => esc_html__('Menu position', 'happy-baby'),
				"desc" => wp_kses_data( __('Select position of the main menu', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"std" => 'top',
				"options" => array(
					'top'	=> esc_html__('Top',	'happy-baby'),
				),
				"type" => "switch"
				),
			'menu_scheme' => array(
				"title" => esc_html__('Menu Color Scheme', 'happy-baby'),
				"desc" => wp_kses_data( __('Select color scheme to decorate main menu area', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"std" => 'inherit',
				"options" => array(),
				"refresh" => false,
				"type" => "select"
				),
			'menu_side_stretch' => array(
				"title" => esc_html__('Stretch sidemenu', 'happy-baby'),
				"desc" => wp_kses_data( __('Stretch sidemenu to window height (if menu items number >= 5)', 'happy-baby') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_side_icons' => array(
				"title" => esc_html__('Iconed sidemenu', 'happy-baby'),
				"desc" => wp_kses_data( __('Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'happy-baby') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'menu_mobile_fullscreen' => array(
				"title" => esc_html__('Mobile menu fullscreen', 'happy-baby'),
				"desc" => wp_kses_data( __('Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'happy-baby') ),
				"dependency" => array(
					'menu_style' => array('left', 'right')
				),
				"std" => 1,
				"type" => "checkbox"
				),
			'logo_info' => array(
				"title" => esc_html__('Logo settings', 'happy-baby'),
				"desc" => wp_kses_data( __('Select logo images for the normal and Retina displays', 'happy-baby') ),
				"type" => "info"
				),
			'logo' => array(
				"title" => esc_html__('Logo', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site logo', 'happy-baby') ),
				"class" => "happy_baby_column-1_2 happy_baby_new_row",
				"std" => '',
				"type" => "image"
				),
			'logo_retina' => array(
				"title" => esc_html__('Logo for Retina', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'happy-baby') ),
				"class" => "happy_baby_column-1_2",
				"std" => '',
				"type" => "image"
				),
			'logo_inverse' => array(
				"title" => esc_html__('Logo inverse', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it on the dark background', 'happy-baby') ),
				"class" => "happy_baby_column-1_2 happy_baby_new_row",
				"std" => '',
				"type" => "image"
				),
			'logo_inverse_retina' => array(
				"title" => esc_html__('Logo inverse for Retina', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'happy-baby') ),
				"class" => "happy_baby_column-1_2",
				"std" => '',
				"type" => "image"
				),
			'logo_side' => array(
				"title" => esc_html__('Logo side', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu', 'happy-baby') ),
				"class" => "happy_baby_column-1_2 happy_baby_new_row",
				"std" => '',
				"type" => "hidden"
				),
			'logo_side_retina' => array(
				"title" => esc_html__('Logo side for Retina', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site logo (with vertical orientation) to display it in the side menu on Retina displays (if empty - use default logo from the field above)', 'happy-baby') ),
				"class" => "happy_baby_column-1_2",
				"std" => '',
				"type" => "hidden"
				),
			'logo_text' => array(
				"title" => esc_html__('Logo from Site name', 'happy-baby'),
				"desc" => wp_kses_data( __('Do you want use Site name and description as Logo if images above are not selected?', 'happy-baby') ),
				"std" => 1,
				"type" => "checkbox"
				),
			'telephone' => array(
				"title" => esc_html__('Header telephone number', 'happy-baby'),
				"desc" => esc_html__('Header telephone number', 'happy-baby'),
				"override" => array(
                    'mode' => '',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"dependency" => array(
					'header_style' => array('header-default')
				),
				"std" => '',
				"type" => "textarea"
			),
			'button_name' => array(
				"title" => esc_html__('Button name', 'happy-baby'),
				"desc" => esc_html__('Button name', 'happy-baby'),
				"override" => array(
                    'mode' => '',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"dependency" => array(
					'header_style' => array('header-default')
				),
				"std" => '',
				"type" => "text"
			),
			'button_url' => array(
				"title" => esc_html__('Button URL', 'happy-baby'),
				"desc" => esc_html__('Button URL', 'happy-baby'),
				"override" => array(
                    'mode' => '',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"dependency" => array(
					'header_style' => array('header-default')
				),
				"std" => '',
				"type" => "text"
			),



			// Section 'Content'
			'content' => array(
				"title" => esc_html__('Content', 'happy-baby'),
				"desc" => wp_kses_data( __('Options of the content area.', 'happy-baby') )
							. '<br>'
							. wp_kses_data( $msg_override ),
				"type" => "section",
				),
			'color_scheme' => array(
				"title" => esc_html__('Site Color Scheme', 'happy-baby'),
				"desc" => wp_kses_data( __('Select color scheme to decorate whole site. Attention! Case "Inherit" can be used only for custom pages, not for root site content in the Appearance - Customize', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"std" => 'default',
				"options" => array(),
				"refresh" => false,
				"type" => "select"
				),
			'body_style' => array(
				"title" => esc_html__('Body style', 'happy-baby'),
				"desc" => wp_kses_data( __('Select width of the body content', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"refresh" => false,
				"std" => 'wide',
				"options" => array(
					'boxed'		=> esc_html__('Boxed',		'happy-baby'),
					'wide'		=> esc_html__('Wide',		'happy-baby'),
					'fullwide'	=> esc_html__('Fullwide',	'happy-baby'),
					'fullscreen'=> esc_html__('Fullscreen',	'happy-baby')
				),
				"type" => "select"
				),
			'boxed_bg_image' => array(
				"title" => esc_html__('Boxed bg image', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload image, used as background in the boxed body', 'happy-baby') ),
				"dependency" => array(
					'body_style' => array('boxed')
				),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"std" => '',
				"type" => "image"
				),
			'expand_content' => array(
				"title" => esc_html__('Expand content', 'happy-baby'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'remove_margins' => array(
				"title" => esc_html__('Remove margins', 'happy-baby'),
				"desc" => wp_kses_data( __('Remove margins above and below the content area', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"refresh" => false,
				"std" => 0,
				"type" => "checkbox"
				),
			'border_radius' => array(
				"title" => esc_html__('Border radius', 'happy-baby'),
				"desc" => wp_kses_data( __('Specify the border radius of the form fields and buttons in pixels or other valid CSS units', 'happy-baby') ),
				"std" => 0,
				"type" => "hidden"
				),
			'no_image' => array(
				"title" => esc_html__('No image placeholder', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload image, used as placeholder for the posts without featured image', 'happy-baby') ),
				"std" => '',
				"type" => "image"
				),
			'seo_snippets' => array(
				"title" => esc_html__('SEO snippets', 'happy-baby'),
				"desc" => wp_kses_data( __('Add structured data markup to the single posts and pages', 'happy-baby') ),
				"std" => 0,
				"type" => "checkbox"
				),
            'privacy_text' => array(
                "title" => esc_html__("Text with Privacy Policy link", 'happy-baby'),
                "desc"  => wp_kses_data( __("Specify text with Privacy Policy link for the checkbox 'I agree ...'", 'happy-baby') ),
                "std"   => wp_kses_data( __( 'I agree that my submitted data is being collected and stored.', 'happy-baby') ),
                "type"  => "text"
            ),
			'author_info' => array(
				"title" => esc_html__('Author info', 'happy-baby'),
				"desc" => wp_kses_data( __("Display block with information about post's author", 'happy-baby') ),
				"std" => 1,
				"type" => "checkbox"
				),
			'related_posts' => array(
				"title" => esc_html__('Related posts', 'happy-baby'),
				"desc" => wp_kses_data( __('How many related posts should be displayed in the single post? If 0 - no related posts showed.', 'happy-baby') ),
				"std" => 2,
				"options" => happy_baby_get_list_range(0,9),
				"type" => "select"
				),
			'related_columns' => array(
				"title" => esc_html__('Related columns', 'happy-baby'),
				"desc" => wp_kses_data( __('How many columns should be used to output related posts in the single page (from 2 to 4)?', 'happy-baby') ),
				"std" => 2,
				"options" => happy_baby_get_list_range(1,4),
				"type" => "select"
				),


			// Section 'Content'
			'sidebar' => array(
				"title" => esc_html__('Sidebars', 'happy-baby'),
				"desc" => wp_kses_data( __('Options of the sidebar and other widgets areas', 'happy-baby') )
							. '<br>'
							. wp_kses_data( $msg_override ),
				"type" => "section",
				),
			'sidebar_widgets' => array(
				"title" => esc_html__('Sidebar widgets', 'happy-baby'),
				"desc" => wp_kses_data( __('Select default widgets to show in the sidebar', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'happy-baby')
				),
				"std" => 'sidebar_widgets',
				"options" => array(),
				"type" => "select"
				),
			'sidebar_scheme' => array(
				"title" => esc_html__('Sidebar Color Scheme', 'happy-baby'),
				"desc" => wp_kses_data( __('Select color scheme to decorate sidebar', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'happy-baby')
				),
				"std" => 'dark',
				"options" => array(),
				"refresh" => false,
				"type" => "select"
				),
			'sidebar_position' => array(
				"title" => esc_html__('Sidebar position', 'happy-baby'),
				"desc" => wp_kses_data( __('Select position to show sidebar', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'happy-baby')
				),
				"refresh" => false,
				"std" => 'right',
				"options" => array(),
				"type" => "select"
				),
			'hide_sidebar_on_single' => array(
				"title" => esc_html__('Hide sidebar on the single post', 'happy-baby'),
				"desc" => wp_kses_data( __("Hide sidebar on the single post's pages", 'happy-baby') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'widgets_above_page' => array(
				"title" => esc_html__('Widgets at the top of the page', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show at the top of the page (above content and sidebar)', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'happy-baby')
				),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),
			'widgets_above_content' => array(
				"title" => esc_html__('Widgets above the content', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'happy-baby')
				),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),
			'widgets_below_content' => array(
				"title" => esc_html__('Widgets below the content', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'happy-baby')
				),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),
			'widgets_below_page' => array(
				"title" => esc_html__('Widgets at the bottom of the page', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show at the bottom of the page (below content and sidebar)', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Widgets', 'happy-baby')
				),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),



			// Section 'Footer'
			'footer' => array(
				"title" => esc_html__('Footer', 'happy-baby'),
				"desc" => wp_kses_data( __('Select set of widgets and columns number in the site footer', 'happy-baby') )
							. '<br>'
							. wp_kses_data( $msg_override ),
				"type" => "section"
				),
			'footer_style' => array(
				"title" => esc_html__('Footer style', 'happy-baby'),
				"desc" => wp_kses_data( __('Select style to display the site footer', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'happy-baby')
				),
				"std" => 'footer-default',
				"options" => array(),
				"type" => "select"
				),
			'footer_scheme' => array(
				"title" => esc_html__('Footer Color Scheme', 'happy-baby'),
				"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'happy-baby')
				),
				"std" => 'dark',
				"options" => array(),
				"refresh" => false,
				"type" => "select"
				),

			'footer_bg' => array(
				"title" => esc_html__('Footer bg style', 'happy-baby'),
				"desc" => wp_kses_data( __('Do you want use footer bg style?', 'happy-baby') ),
				"std" => 1,
				"type" => "checkbox"
			),

			'footer_widgets' => array(
				"title" => esc_html__('Footer widgets', 'happy-baby'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'happy-baby')
				),
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"std" => 'footer_widgets',
				"options" => array(),
				"type" => "select"
				),
			'footer_columns' => array(
				"title" => esc_html__('Footer columns', 'happy-baby'),
				"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'happy-baby')
				),
				"dependency" => array(
					'footer_style' => array('footer-default'),
					'footer_widgets' => array('^hide')
				),
				"std" => 0,
				"options" => happy_baby_get_list_range(0,6),
				"type" => "select"
				),
			'footer_wide' => array(
				"title" => esc_html__('Footer fullwide', 'happy-baby'),
				"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'happy-baby') ),
				"override" => array(
					'mode' => 'page,cpt_team,cpt_services,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
					'section' => esc_html__('Footer', 'happy-baby')
				),
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_in_footer' => array(
				"title" => esc_html__('Show logo', 'happy-baby'),
				"desc" => wp_kses_data( __('Show logo in the footer', 'happy-baby') ),
				'refresh' => false,
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'logo_footer' => array(
				"title" => esc_html__('Logo for footer', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site logo to display it in the footer', 'happy-baby') ),
				"dependency" => array(
					'footer_style' => array('footer-default'),
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'logo_footer_retina' => array(
				"title" => esc_html__('Logo for footer (Retina)', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'happy-baby') ),
				"dependency" => array(
					'footer_style' => array('footer-default'),
					'logo_in_footer' => array('1')
				),
				"std" => '',
				"type" => "image"
				),
			'socials_in_footer' => array(
				"title" => esc_html__('Show social icons', 'happy-baby'),
				"desc" => wp_kses_data( __('Show social icons in the footer (under logo or footer widgets)', 'happy-baby') ),
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'copyright' => array(
				"title" => esc_html__('Copyright', 'happy-baby'),
				"desc" => wp_kses_data( __('Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'happy-baby') ),
				"std" => esc_html__('ThemeREX &copy; {Y}. All rights reserved.', 'happy-baby'),
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"refresh" => false,
				"type" => "textarea"
				),


			'info_image_1' => array(
				"title" => esc_html__('Info image 1', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site Info image', 'happy-baby') ),
				"std" => '',
				"type" => "image"
			),
			'info_1' => array(
				"title" => esc_html__('Info 1', 'happy-baby'),
				"desc" => wp_kses_data( __('Footer Info 1', 'happy-baby') ),
				"std" => '',
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"refresh" => false,
				"type" => "textarea"
			),

			'info_image_2' => array(
				"title" => esc_html__('Info image 2', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site Info image', 'happy-baby') ),
				"std" => '',
				"type" => "image"
			),
			'info_2' => array(
				"title" => esc_html__('Info 2', 'happy-baby'),
				"desc" => wp_kses_data( __('Footer Info 2', 'happy-baby') ),
				"std" => '',
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"refresh" => false,
				"type" => "textarea"
			),

			'info_image_3' => array(
				"title" => esc_html__('Info image 3', 'happy-baby'),
				"desc" => wp_kses_data( __('Select or upload site Info image', 'happy-baby') ),
				"std" => '',
				"type" => "image"
			),
			'info_3' => array(
				"title" => esc_html__('Info 3', 'happy-baby'),
				"desc" => wp_kses_data( __('Footer Info 3', 'happy-baby') ),
				"std" => '',
				"dependency" => array(
					'footer_style' => array('footer-default')
				),
				"refresh" => false,
				"type" => "textarea"
			),





			// Section 'Homepage' - settings for home page
			'homepage' => array(
				"title" => esc_html__('Homepage', 'happy-baby'),
				"desc" => wp_kses_data( __("Select blog style and widgets to display on the default homepage. Attention! If you use custom page as the homepage - please set up parameters in the 'Theme Options' section of this page.", 'happy-baby') ),
				"type" => "section"
				),
			'expand_content_home' => array(
				"title" => esc_html__('Expand content', 'happy-baby'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the Homepage', 'happy-baby') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style_home' => array(
				"title" => esc_html__('Blog style', 'happy-baby'),
				"desc" => wp_kses_data( __('Select posts style for the homepage', 'happy-baby') ),
				"std" => 'excerpt',
				"options" => array(),
				"type" => "select"
				),
			'first_post_large_home' => array(
				"title" => esc_html__('First post large', 'happy-baby'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of the Homepage', 'happy-baby') ),
				"dependency" => array(
					'blog_style_home' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			'header_style_home' => array(
				"title" => esc_html__('Header style', 'happy-baby'),
				"desc" => wp_kses_data( __('Select style to display the site header on the homepage', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'header_position_home' => array(
				"title" => esc_html__('Header position', 'happy-baby'),
				"desc" => wp_kses_data( __('Select position to display the site header on the homepage', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'header_widgets_home' => array(
				"title" => esc_html__('Header widgets', 'happy-baby'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the homepage', 'happy-baby') ),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),
			'sidebar_widgets_home' => array(
				"title" => esc_html__('Sidebar widgets', 'happy-baby'),
				"desc" => wp_kses_data( __('Select sidebar to show on the homepage', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'sidebar_position_home' => array(
				"title" => esc_html__('Sidebar position', 'happy-baby'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the homepage', 'happy-baby') ),
				"refresh" => false,
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'widgets_above_page_home' => array(
				"title" => esc_html__('Widgets above the page', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'happy-baby') ),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),
			'widgets_above_content_home' => array(
				"title" => esc_html__('Widgets above the content', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'happy-baby') ),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),
			'widgets_below_content_home' => array(
				"title" => esc_html__('Widgets below the content', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'happy-baby') ),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),
			'widgets_below_page_home' => array(
				"title" => esc_html__('Widgets below the page', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'happy-baby') ),
				"std" => 'hide',
				"options" => array(),
				"type" => "select"
				),



			// Section 'Blog archive'
			'blog' => array(
				"title" => esc_html__('Blog archive', 'happy-baby'),
				"desc" => wp_kses_data( __('Options for the blog archive', 'happy-baby') ),
				"type" => "section",
				),
			'expand_content_blog' => array(
				"title" => esc_html__('Expand content', 'happy-baby'),
				"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden on the blog archive', 'happy-baby') ),
				"refresh" => false,
				"std" => 1,
				"type" => "checkbox"
				),
			'blog_style' => array(
				"title" => esc_html__('Blog style', 'happy-baby'),
				"desc" => wp_kses_data( __('Select posts style for the blog archive', 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"std" => 'excerpt',
				"options" => array(),
				"type" => "select"
				),
			'blog_columns' => array(
				"title" => esc_html__('Blog columns', 'happy-baby'),
				"desc" => wp_kses_data( __('How many columns should be used in the blog archive (from 2 to 4)?', 'happy-baby') ),
				"std" => 2,
				"options" => happy_baby_get_list_range(2,4),
				"type" => "hidden"
				),
			'post_type' => array(
				"title" => esc_html__('Post type', 'happy-baby'),
				"desc" => wp_kses_data( __('Select post type to show in the blog archive', 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"linked" => 'parent_cat',
				"refresh" => false,
				"hidden" => true,
				"std" => 'post',
				"options" => array(),
				"type" => "select"
				),
			'parent_cat' => array(
				"title" => esc_html__('Category to show', 'happy-baby'),
				"desc" => wp_kses_data( __('Select category to show in the blog archive', 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"refresh" => false,
				"hidden" => true,
				"std" => '0',
				"options" => array(),
				"type" => "select"
				),
			'posts_per_page' => array(
				"title" => esc_html__('Posts per page', 'happy-baby'),
				"desc" => wp_kses_data( __('How many posts will be displayed on this page', 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),
			'meta_parts' => array(
				"title" => esc_html__('Post meta', 'happy-baby'),
				"desc" => wp_kses_data( __("Select elements to show in the post meta area on default blog archive and search results. You can drag items to change their order. Attention! If your blog archive created by page with parameter 'Page template' equal to 'Blog archive' - please set up parameter 'Post meta' in the 'Theme Options' section of this page.", 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"dir" => 'vertical',
				"sortable" => true,
				"std" => 'categories=1|date=0|counters=0|author=1|share=0|edit=0',
				"options" => array(
					'categories' => esc_html__('Categories', 'happy-baby'),
					'date'		 => esc_html__('Post date', 'happy-baby'),
					'author'	 => esc_html__('Post author', 'happy-baby'),
					'counters'	 => esc_html__('Post counters', 'happy-baby'),
					'share'		 => esc_html__('Share links', 'happy-baby'),
					'edit'		 => esc_html__('Edit link', 'happy-baby')
				),
				"type" => "checklist"
			),
			'counters' => array(
				"title" => esc_html__('Counters', 'happy-baby'),
				"desc" => wp_kses_data( __("Select counters to show in the post meta area on default blog archive and search results. If your blog archive created by page with parameter 'Page template' equal to 'Blog archive' - please set up parameter 'Counters' in the 'Theme Options' section of this page. Attention! You can drag items to change their order. Likes and Views available only if ThemeREX Addons is active", 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"dir" => 'vertical',
				"sortable" => true,
				"std" => 'views=1|likes=1|comments=1',
				"options" => array(
					'views' => esc_html__('Views', 'happy-baby'),
					'likes' => esc_html__('Likes', 'happy-baby'),
					'comments' => esc_html__('Comments', 'happy-baby')
				),
				"type" => "checklist"
			),
			"blog_pagination" => array(
				"title" => esc_html__('Pagination style', 'happy-baby'),
				"desc" => wp_kses_data( __('Show Older/Newest posts or Page numbers below the posts list', 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"std" => "links",
				"options" => array(
					'pages'	=> esc_html__("Page numbers", 'happy-baby'),
					'links'	=> esc_html__("Older/Newest", 'happy-baby'),
					'more'	=> esc_html__("Load more", 'happy-baby'),
					'infinite' => esc_html__("Infinite scroll", 'happy-baby')
				),
				"type" => "select"
				),
			'show_filters' => array(
				"title" => esc_html__('Show filters', 'happy-baby'),
				"desc" => wp_kses_data( __('Show categories as tabs to filter posts', 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' ),
					'blog_style' => array('portfolio', 'gallery')
				),
				"hidden" => true,
				"std" => 0,
				"type" => "checkbox"
				),
			'first_post_large' => array(
				"title" => esc_html__('First post large', 'happy-baby'),
				"desc" => wp_kses_data( __('Make first post large (with Excerpt layout) on the Classic layout of blog archive', 'happy-baby') ),
				"dependency" => array(
					'blog_style' => array('classic')
				),
				"std" => 0,
				"type" => "checkbox"
				),
			"blog_content" => array(
				"title" => esc_html__('Posts content', 'happy-baby'),
				"desc" => wp_kses_data( __("Show full post's content in the blog or only post's excerpt", 'happy-baby') ),
				"std" => "excerpt",
				"options" => array(
					'excerpt'	=> esc_html__('Excerpt',	'happy-baby'),
					'fullpost'	=> esc_html__('Full post',	'happy-baby')
				),
				"type" => "select"
				),
			'time_diff_before' => array(
				"title" => esc_html__('Time difference', 'happy-baby'),
				"desc" => wp_kses_data( __("How many days show time difference instead post's date", 'happy-baby') ),
				"std" => 5,
				"type" => "text"
				),
			'sticky_style' => array(
				"title" => esc_html__('Sticky posts style', 'happy-baby'),
				"desc" => wp_kses_data( __('Select style of the sticky posts output', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(
					'inherit' => esc_html__('Decorated posts', 'happy-baby'),
					'columns' => esc_html__('Mini-cards',	'happy-baby')
				),
				"type" => "select"
				),
			"blog_animation" => array(
				"title" => esc_html__('Animation for the posts', 'happy-baby'),
				"desc" => wp_kses_data( __('Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Content', 'happy-baby')
				),
				"dependency" => array(
                    '#page_template' => array( 'blog.php' ),
                    '.editor-page-attributes__template select' => array( 'blog.php' )
				),
				"std" => "none",
				"options" => array(),
				"type" => "select"
				),
			'header_style_blog' => array(
				"title" => esc_html__('Header style', 'happy-baby'),
				"desc" => wp_kses_data( __('Select style to display the site header on the blog archive', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'header_position_blog' => array(
				"title" => esc_html__('Header position', 'happy-baby'),
				"desc" => wp_kses_data( __('Select position to display the site header on the blog archive', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'header_widgets_blog' => array(
				"title" => esc_html__('Header widgets', 'happy-baby'),
				"desc" => wp_kses_data( __('Select set of widgets to show in the header on the blog archive', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'sidebar_widgets_blog' => array(
				"title" => esc_html__('Sidebar widgets', 'happy-baby'),
				"desc" => wp_kses_data( __('Select sidebar to show on the blog archive', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'sidebar_position_blog' => array(
				"title" => esc_html__('Sidebar position', 'happy-baby'),
				"desc" => wp_kses_data( __('Select position to show sidebar on the blog archive', 'happy-baby') ),
				"refresh" => false,
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'hide_sidebar_on_single_blog' => array(
				"title" => esc_html__('Hide sidebar on the single post', 'happy-baby'),
				"desc" => wp_kses_data( __("Hide sidebar on the single post", 'happy-baby') ),
				"std" => 0,
				"type" => "checkbox"
				),
			'widgets_above_page_blog' => array(
				"title" => esc_html__('Widgets above the page', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show above page (content and sidebar)', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'widgets_above_content_blog' => array(
				"title" => esc_html__('Widgets above the content', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'widgets_below_content_blog' => array(
				"title" => esc_html__('Widgets below the content', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),
			'widgets_below_page_blog' => array(
				"title" => esc_html__('Widgets below the page', 'happy-baby'),
				"desc" => wp_kses_data( __('Select widgets to show below the page (content and sidebar)', 'happy-baby') ),
				"std" => 'inherit',
				"options" => array(),
				"type" => "select"
				),



			// Section 'Colors' - choose color scheme and customize separate colors from it
			'scheme' => array(
				"title" => esc_html__('* Color scheme editor', 'happy-baby'),
				"desc" => esc_html__("Modify colors and preview changes on your site", 'happy-baby'),
				"priority" => 1000,
				"type" => "section"
				),

			'scheme_storage' => array(
				"title" => esc_html__('Color schemes', 'happy-baby'),
				"desc" => esc_html__('Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'happy-baby'),
				"std" => '$happy_baby_get_scheme_storage',
				"refresh" => false,
				"type" => "scheme_editor"
				),


			// Section 'Hidden'
			'media_title' => array(
				"title" => esc_html__('Media title', 'happy-baby'),
				"desc" => wp_kses_data( __('Used as title for the audio and video item in this post', 'happy-baby') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'happy-baby')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),
			'media_author' => array(
				"title" => esc_html__('Media author', 'happy-baby'),
				"desc" => wp_kses_data( __('Used as author name for the audio and video item in this post', 'happy-baby') ),
				"override" => array(
					'mode' => 'post',
					'section' => esc_html__('Title', 'happy-baby')
				),
				"hidden" => true,
				"std" => '',
				"type" => "text"
				),


			// Internal options.
			// Attention! Don't change any options in the section below!
			'reset_options' => array(
				"title" => '',
				"desc" => '',
				"std" => '0',
				"type" => "hidden",
				),

		));


		// Prepare panel 'Fonts'
		$fonts = array(

			// Panel 'Fonts' - manage fonts loading and set parameters of the base theme elements
			'fonts' => array(
				"title" => esc_html__('* Fonts settings', 'happy-baby'),
				"desc" => '',
				"priority" => 1500,
				"type" => "panel"
				),

			// Section 'Load_fonts'
			'load_fonts' => array(
				"title" => esc_html__('Load fonts', 'happy-baby'),
				"desc" => wp_kses_data( __('Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'happy-baby') )
						. '<br>'
						. wp_kses_data( __('<b>Attention!</b> Press "Refresh" button to reload preview area after the all fonts are changed', 'happy-baby') ),
				"type" => "section"
				),
			'load_fonts_subset' => array(
				"title" => esc_html__('Google fonts subsets', 'happy-baby'),
				"desc" => wp_kses_data( __('Specify comma separated list of the subsets which will be load from Google fonts', 'happy-baby') )
						. '<br>'
						. wp_kses_data( __('Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'happy-baby') ),
				"class" => "happy_baby_column-1_3 happy_baby_new_row",
				"refresh" => false,
				"std" => '$happy_baby_get_load_fonts_subset',
				"type" => "text"
				)
		);

		for ($i=1; $i<=happy_baby_get_theme_setting('max_load_fonts'); $i++) {
			
			$fonts["load_fonts-{$i}-name"] = array(
				"title" => esc_html__('Font name', 'happy-baby'),
				"desc" => '',
				"class" => "happy_baby_column-1_3 happy_baby_new_row",
				"refresh" => false,
				"std" => '$happy_baby_get_load_fonts_option',
				"type" => "text"
				);
			$fonts["load_fonts-{$i}-family"] = array(
				"title" => esc_html__('Font family', 'happy-baby'),
				"desc" => $i==1
							? wp_kses_data( __('Select font family to use it if font above is not available', 'happy-baby') )
							: '',
				"class" => "happy_baby_column-1_3",
				"refresh" => false,
				"std" => '$happy_baby_get_load_fonts_option',
				"options" => array(
					'inherit' => esc_html__("Inherit", 'happy-baby'),
					'serif' => esc_html__('serif', 'happy-baby'),
					'sans-serif' => esc_html__('sans-serif', 'happy-baby'),
					'monospace' => esc_html__('monospace', 'happy-baby'),
					'cursive' => esc_html__('cursive', 'happy-baby'),
					'fantasy' => esc_html__('fantasy', 'happy-baby')
				),
				"type" => "select"
				);
			$fonts["load_fonts-{$i}-styles"] = array(
				"title" => esc_html__('Font styles', 'happy-baby'),
				"desc" => $i==1
							? wp_kses_data( __('Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'happy-baby') )
											. '<br>'
								. wp_kses_data( __('<b>Attention!</b> Each weight and style increase download size! Specify only used weights and styles.', 'happy-baby') )
							: '',
				"class" => "happy_baby_column-1_3",
				"refresh" => false,
				"std" => '$happy_baby_get_load_fonts_option',
				"type" => "text"
				);
		}
		$fonts['load_fonts_end'] = array(
			"type" => "section_end"
			);

		// Sections with font's attributes for each theme element
		$theme_fonts = happy_baby_get_theme_fonts();
		foreach ($theme_fonts as $tag=>$v) {
			$fonts["{$tag}_section"] = array(
				"title" => !empty($v['title'])
								? $v['title']
								: esc_html(sprintf(esc_html__('%s settings', 'happy-baby'), $tag)),
				"desc" => !empty($v['description'])
								? $v['description']
								: wp_kses( sprintf(__('Font settings of the "%s" tag.', 'happy-baby'), $tag), 'happy_baby_kses_content' ),
				"type" => "section",
				);

			foreach ($v as $css_prop=>$css_value) {
				if (in_array($css_prop, array('title', 'description'))) continue;
				$options = '';
				$type = 'text';
				$title = ucfirst(str_replace('-', ' ', $css_prop));
				if ($css_prop == 'font-family') {
					$type = 'select';
					$options = array();
				} else if ($css_prop == 'font-weight') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'happy-baby'),
						'100' => esc_html__('100 (Light)', 'happy-baby'),
						'200' => esc_html__('200 (Light)', 'happy-baby'),
						'300' => esc_html__('300 (Thin)',  'happy-baby'),
						'400' => esc_html__('400 (Normal)', 'happy-baby'),
						'500' => esc_html__('500 (Semibold)', 'happy-baby'),
						'600' => esc_html__('600 (Semibold)', 'happy-baby'),
						'700' => esc_html__('700 (Bold)', 'happy-baby'),
						'800' => esc_html__('800 (Black)', 'happy-baby'),
						'900' => esc_html__('900 (Black)', 'happy-baby')
					);
				} else if ($css_prop == 'font-style') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'happy-baby'),
						'normal' => esc_html__('Normal', 'happy-baby'),
						'italic' => esc_html__('Italic', 'happy-baby')
					);
				} else if ($css_prop == 'text-decoration') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'happy-baby'),
						'none' => esc_html__('None', 'happy-baby'),
						'underline' => esc_html__('Underline', 'happy-baby'),
						'overline' => esc_html__('Overline', 'happy-baby'),
						'line-through' => esc_html__('Line-through', 'happy-baby')
					);
				} else if ($css_prop == 'text-transform') {
					$type = 'select';
					$options = array(
						'inherit' => esc_html__("Inherit", 'happy-baby'),
						'none' => esc_html__('None', 'happy-baby'),
						'uppercase' => esc_html__('Uppercase', 'happy-baby'),
						'lowercase' => esc_html__('Lowercase', 'happy-baby'),
						'capitalize' => esc_html__('Capitalize', 'happy-baby')
					);
				}
				$fonts["{$tag}_{$css_prop}"] = array(
					"title" => $title,
					"desc" => '',
					"class" => "happy_baby_column-1_5",
					"refresh" => false,
					"std" => '$happy_baby_get_theme_fonts_option',
					"options" => $options,
					"type" => $type
				);
			}

			$fonts["{$tag}_section_end"] = array(
				"type" => "section_end"
				);
		}

		$fonts['fonts_end'] = array(
			"type" => "panel_end"
			);

		// Add fonts parameters into Theme Options
		happy_baby_storage_merge_array('options', '', $fonts);

		// Add Header Video if WP version < 4.7
		if (!function_exists('get_header_video_url')) {
			happy_baby_storage_set_array_after('options', 'header_image_override', 'header_video', array(
				"title" => esc_html__('Header video', 'happy-baby'),
				"desc" => wp_kses_data( __("Select video to use it as background for the header", 'happy-baby') ),
				"override" => array(
					'mode' => 'page',
					'section' => esc_html__('Header', 'happy-baby')
				),
				"std" => '',
				"type" => "video"
				)
			);
		}
	}
}


// Returns a list of options that can be overridden for CPT
if (!function_exists('happy_baby_options_get_list_cpt_options')) {
	function happy_baby_options_get_list_cpt_options($cpt) {
		if (empty($title)) $title = ucfirst($cpt);
		return array(
					"header_style_{$cpt}" => array(
						"title" => esc_html__('Header style', 'happy-baby'),
						"desc" => wp_kses_data( sprintf(__('Select style to display the site header on the %s pages', 'happy-baby'), $title) ),
						"std" => 'inherit',
						"options" => array(),
						"type" => "select"
						),
					"header_position_{$cpt}" => array(
						"title" => esc_html__('Header position', 'happy-baby'),
						"desc" => wp_kses_data( sprintf(__('Select position to display the site header on the %s pages', 'happy-baby'), $title) ),
						"std" => 'inherit',
						"options" => array(),
						"type" => "select"
						),
					"header_widgets_{$cpt}" => array(
						"title" => esc_html__('Header widgets', 'happy-baby'),
						"desc" => wp_kses_data( sprintf(__('Select set of widgets to show in the header on the %s pages', 'happy-baby'), $title) ),
						"std" => 'hide',
						"options" => array(),
						"type" => "select"
						),
					"sidebar_widgets_{$cpt}" => array(
						"title" => esc_html__('Sidebar widgets', 'happy-baby'),
						"desc" => wp_kses_data( sprintf(__('Select sidebar to show on the %s pages', 'happy-baby'), $title) ),
						"std" => 'hide',
						"options" => array(),
						"type" => "select"
						),
					"sidebar_position_{$cpt}" => array(
						"title" => esc_html__('Sidebar position', 'happy-baby'),
						"desc" => wp_kses_data( sprintf(__('Select position to show sidebar on the %s pages', 'happy-baby'), $title) ),
						"refresh" => false,
						"std" => 'left',
						"options" => array(),
						"type" => "select"
						),
					"hide_sidebar_on_single_{$cpt}" => array(
						"title" => esc_html__('Hide sidebar on the single pages', 'happy-baby'),
						"desc" => wp_kses_data( __("Hide sidebar on the single page", 'happy-baby') ),
						"std" => 0,
						"type" => "checkbox"
						),
					"expand_content_{$cpt}" => array(
						"title" => esc_html__('Expand content', 'happy-baby'),
						"desc" => wp_kses_data( __('Expand the content width if the sidebar is hidden', 'happy-baby') ),
						"refresh" => false,
						"std" => 1,
						"type" => "checkbox"
						),
					"widgets_above_page_{$cpt}" => array(
						"title" => esc_html__('Widgets at the top of the page', 'happy-baby'),
						"desc" => wp_kses_data( __('Select widgets to show at the top of the page (above content and sidebar)', 'happy-baby') ),
						"std" => 'hide',
						"options" => array(),
						"type" => "select"
						),
					"widgets_above_content_{$cpt}" => array(
						"title" => esc_html__('Widgets above the content', 'happy-baby'),
						"desc" => wp_kses_data( __('Select widgets to show at the beginning of the content area', 'happy-baby') ),
						"std" => 'hide',
						"options" => array(),
						"type" => "select"
						),
					"widgets_below_content_{$cpt}" => array(
						"title" => esc_html__('Widgets below the content', 'happy-baby'),
						"desc" => wp_kses_data( __('Select widgets to show at the ending of the content area', 'happy-baby') ),
						"std" => 'hide',
						"options" => array(),
						"type" => "select"
						),
					"widgets_below_page_{$cpt}" => array(
						"title" => esc_html__('Widgets at the bottom of the page', 'happy-baby'),
						"desc" => wp_kses_data( __('Select widgets to show at the bottom of the page (below content and sidebar)', 'happy-baby') ),
						"std" => 'hide',
						"options" => array(),
						"type" => "select"
						),
					"footer_scheme_{$cpt}" => array(
						"title" => esc_html__('Footer Color Scheme', 'happy-baby'),
						"desc" => wp_kses_data( __('Select color scheme to decorate footer area', 'happy-baby') ),
						"std" => 'dark',
						"options" => array(),
						"type" => "select"
						),
					"footer_widgets_{$cpt}" => array(
						"title" => esc_html__('Footer widgets', 'happy-baby'),
						"desc" => wp_kses_data( __('Select set of widgets to show in the footer', 'happy-baby') ),
						"std" => 'footer_widgets',
						"options" => array(),
						"type" => "select"
						),
					"footer_columns_{$cpt}" => array(
						"title" => esc_html__('Footer columns', 'happy-baby'),
						"desc" => wp_kses_data( __('Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'happy-baby') ),
						"dependency" => array(
							"footer_widgets_{$cpt}" => array('^hide')
						),
						"std" => 0,
						"options" => happy_baby_get_list_range(0,6),
						"type" => "select"
						),
					"footer_wide_{$cpt}" => array(
						"title" => esc_html__('Footer fullwide', 'happy-baby'),
						"desc" => wp_kses_data( __('Do you want to stretch the footer to the entire window width?', 'happy-baby') ),
						"std" => 0,
						"type" => "checkbox"
						)
					);
	}
}


// Return lists with choises when its need in the admin mode
if (!function_exists('happy_baby_options_get_list_choises')) {
	add_filter('happy_baby_filter_options_get_list_choises', 'happy_baby_options_get_list_choises', 10, 2);
	function happy_baby_options_get_list_choises($list, $id) {
		if (is_array($list) && count($list)==0) {
			if (strpos($id, 'header_style')===0)
				$list = happy_baby_get_list_header_styles(strpos($id, 'header_style_')===0);
			else if (strpos($id, 'header_position')===0)
				$list = happy_baby_get_list_header_positions(strpos($id, 'header_position_')===0);
			else if (strpos($id, 'header_widgets')===0)
				$list = happy_baby_get_list_sidebars(strpos($id, 'header_widgets_')===0, true);
			else if (strpos($id, 'header_scheme')===0 
					|| strpos($id, 'menu_scheme')===0
					|| strpos($id, 'color_scheme')===0
					|| strpos($id, 'sidebar_scheme')===0
					|| strpos($id, 'footer_scheme')===0)
				$list = happy_baby_get_list_schemes($id!='color_scheme');
			else if (strpos($id, 'sidebar_widgets')===0)
				$list = happy_baby_get_list_sidebars(strpos($id, 'sidebar_widgets_')===0, true);
			else if (strpos($id, 'sidebar_position')===0)
				$list = happy_baby_get_list_sidebars_positions(strpos($id, 'sidebar_position_')===0);
			else if (strpos($id, 'widgets_above_page')===0)
				$list = happy_baby_get_list_sidebars(strpos($id, 'widgets_above_page_')===0, true);
			else if (strpos($id, 'widgets_above_content')===0)
				$list = happy_baby_get_list_sidebars(strpos($id, 'widgets_above_content_')===0, true);
			else if (strpos($id, 'widgets_below_page')===0)
				$list = happy_baby_get_list_sidebars(strpos($id, 'widgets_below_page_')===0, true);
			else if (strpos($id, 'widgets_below_content')===0)
				$list = happy_baby_get_list_sidebars(strpos($id, 'widgets_below_content_')===0, true);
			else if (strpos($id, 'footer_style')===0)
				$list = happy_baby_get_list_footer_styles(strpos($id, 'footer_style_')===0);
			else if (strpos($id, 'footer_widgets')===0)
				$list = happy_baby_get_list_sidebars(strpos($id, 'footer_widgets_')===0, true);
			else if (strpos($id, 'blog_style')===0)
				$list = happy_baby_get_list_blog_styles(strpos($id, 'blog_style_')===0);
			else if (strpos($id, 'post_type')===0)
				$list = happy_baby_get_list_posts_types();
			else if (strpos($id, 'parent_cat')===0)
				$list = happy_baby_array_merge(array(0 => esc_html__('- Select category -', 'happy-baby')), happy_baby_get_list_categories());
			else if (strpos($id, 'blog_animation')===0)
				$list = happy_baby_get_list_animations_in();
			else if ($id == 'color_scheme_editor')
				$list = happy_baby_get_list_schemes();
			else if (strpos($id, '_font-family') > 0)
				$list = happy_baby_get_list_load_fonts(true);
		}
		return $list;
	}
}
?>