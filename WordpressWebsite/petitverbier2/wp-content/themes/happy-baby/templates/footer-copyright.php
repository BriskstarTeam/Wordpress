<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.10
 */

// Copyright area
$happy_baby_footer_scheme =  happy_baby_is_inherit(happy_baby_get_theme_option('footer_scheme')) ? happy_baby_get_theme_option('color_scheme') : happy_baby_get_theme_option('footer_scheme');
$happy_baby_copyright_scheme = happy_baby_is_inherit(happy_baby_get_theme_option('copyright_scheme')) ? $happy_baby_footer_scheme : happy_baby_get_theme_option('copyright_scheme');
?> 
<div class="footer_copyright_wrap scheme_<?php echo esc_attr($happy_baby_copyright_scheme); ?>">
	<div class="footer_copyright_inner">
		<div class="content_wrap">
			<div class="copyright_text"><?php
				// Replace {{...}} and [[...]] on the <i>...</i> and <b>...</b>
				$happy_baby_copyright = happy_baby_prepare_macros(happy_baby_get_theme_option('copyright'));
				if (!empty($happy_baby_copyright)) {
					// Replace {date_format} on the current date in the specified format
					if (preg_match("/(\\{[\\w\\d\\\\\\-\\:]*\\})/", $happy_baby_copyright, $happy_baby_matches)) {
						$happy_baby_copyright = str_replace($happy_baby_matches[1], date(str_replace(array('{', '}'), '', $happy_baby_matches[1])), $happy_baby_copyright);
					}
					// Display copyright
					echo wp_kses_data(nl2br($happy_baby_copyright));
				}
			?></div>
		</div>
	</div>
</div>
