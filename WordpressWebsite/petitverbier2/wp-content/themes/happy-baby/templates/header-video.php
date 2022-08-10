<?php
/**
 * The template to display the background video in the header
 *
 * @package WordPress
 * @subpackage HAPPY_BABY
 * @since HAPPY_BABY 1.0.14
 */
$happy_baby_header_video = happy_baby_get_header_video();
$happy_baby_embed_video = '';
if (!empty($happy_baby_header_video) && !happy_baby_is_from_uploads($happy_baby_header_video)) {
	if (happy_baby_is_youtube_url($happy_baby_header_video) && preg_match('/[=\/]([^=\/]*)$/', $happy_baby_header_video, $matches) && !empty($matches[1])) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr($matches[1]); ?>"></div><?php
	} else {
		global $wp_embed;
		if (false && is_object($wp_embed)) {
			$happy_baby_embed_video = do_shortcode($wp_embed->run_shortcode( '[embed]' . trim($happy_baby_header_video) . '[/embed]' ));
			$happy_baby_embed_video = happy_baby_make_video_autoplay($happy_baby_embed_video);
		} else {
			$happy_baby_header_video = str_replace('/watch?v=', '/embed/', $happy_baby_header_video);
			$happy_baby_header_video = happy_baby_add_to_url($happy_baby_header_video, array(
				'feature' => 'oembed',
				'controls' => 0,
				'autoplay' => 1,
				'showinfo' => 0,
				'modestbranding' => 1,
				'wmode' => 'transparent',
				'enablejsapi' => 1,
				'origin' => home_url(),
				'widgetid' => 1
			));
			$happy_baby_embed_video = '<iframe src="' . esc_url($happy_baby_header_video) . '" width="1170" height="658" allowfullscreen="0" frameborder="0"></iframe>';
		}
		?><div id="background_video"><?php happy_baby_show_layout($happy_baby_embed_video); ?></div><?php
	}
}
?>