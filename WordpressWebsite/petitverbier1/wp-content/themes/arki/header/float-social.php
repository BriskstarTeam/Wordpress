<?php
	/* a template for displaying the header social network */

	$social_list = array(
		'delicious' => 'fa fa-delicious', 
		'email' => 'fa fa-envelope', 
		'deviantart' => 'fa fa-deviantart', 
		'digg' => 'fa fa-digg', 
		'facebook' => 'fa fa-facebook', 
		'flickr' => 'fa fa-flickr', 
		'lastfm' => 'fa fa-lastfm',
		'linkedin' => 'fa fa-linkedin', 
		'pinterest' => 'fa fa-pinterest-p', 
		'rss' => 'fa fa-rss', 
		'skype' => 'fa fa-skype', 
		'stumbleupon' => 'fa fa-stumbleupon', 
		'tumblr' => 'fa fa-tumblr', 
		'twitter' => 'fa fa-twitter',
		'vimeo' => 'fa fa-vimeo', 
		'youtube' => 'fa fa-youtube',
		'instagram' => 'fa fa-instagram',
		'snapchat' => 'fa fa-snapchat-ghost',
	);

	
	$post_option = arki_get_post_option(get_the_ID());

	$extra_class = '';

	if( empty($post_option['display-float-social-after-page-title']) ){
		$after_title = arki_get_option('general', 'display-float-social-after-page-title', 'disable');
	}else{
		$after_title = $post_option['display-float-social-after-page-title'];
	}
	if( $after_title == 'enable' ){
		$extra_class .= ' arki-display-after-title';
	}
		
	$enable_float_social_title = arki_get_option('general', 'enable-float-social-title', 'enable');

	echo '<div class="arki-float-social ' . esc_attr($extra_class) . '" id="arki-float-social" >';
	if( $enable_float_social_title == 'enable' ){
		echo '<span class="arki-head" >' . esc_html__('Follow Us On', 'arki') . '</span>';
		echo '<span class="arki-divider" ></span>';
	} 
	
	foreach( $social_list as $social_key => $social_icon ){
		$social_link = arki_get_option('general', 'float-social-' . $social_key);

		if( $social_key == 'email' && !empty($social_link) ){
			$social_link = 'mailto:' . $social_link;
		}

		if( !empty($social_link) ){
			echo '<a href="' . esc_attr($social_link) . '" target="_blank" class="arki-float-social-icon" title="' . esc_attr($social_key) . '" >';
			echo '<i class="' . esc_attr($social_icon) . '" ></i>';
			echo '</a>';
		}
	}
	echo '</div>';