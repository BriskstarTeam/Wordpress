<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles()
{

  $parent_style = 'twentyseventeen-style';
  $child_style = 'twentyseventeen-child';

   wp_enqueue_style( $child_style.'_style', get_theme_file_uri().'/assets/css/style.css' );
   wp_enqueue_style( $child_style.'_custom', get_theme_file_uri().'/assets/css/custom.css' );
   
   //js
   
   wp_enqueue_script($child_style.'_jquery', 'https://code.jquery.com/jquery-2.2.0.min.js', ['jquery'], '', 'in_footer');
   wp_enqueue_script($child_style.'_bootstrap_min', get_stylesheet_directory_uri().'/assets/js/bootstrap.min.js', ['jquery'], '', 'in_footer');
   wp_enqueue_script($child_style.'_custom_js', get_stylesheet_directory_uri().'/assets/js/custom.js', ['jquery'], '', 'in_footer');
   
}
//add menu class
add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

function wpse156165_menu_add_class( $atts, $item, $args ) {
    $class = 'nav-link w-nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

//read more option


