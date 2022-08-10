<?php
/**
 * Child-Theme functions and definitions
 */
  
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


add_filter('use_block_editor_for_post', '__return_false', 10);

add_filter( 'wpcf7_validate_text', 'alphanumeric_validation_filter', 20, 2 );
add_filter( 'wpcf7_validate_text*', 'alphanumeric_validation_filter', 20, 2 );
function alphanumeric_validation_filter( $result, $tag ) {
    $tag = new WPCF7_Shortcode( $tag );
    
    if ( 'parent-name' == $tag->name || 'kids-name' == $tag->name) {
        $name_of_the_input = isset( $_POST[$tag->name] ) ? trim( $_POST[$tag->name] ) : '';
    
        if ( !preg_match('/^[a-zA-Z ]+$/',$name_of_the_input) ) {
            $result->invalidate( $tag, "Allowed characters only" );
        }
    }

    if($_POST['end-date'] < $_POST['start-date']){
        $result->invalidate( 'end-date', "End date should be grater than start date" );
	}
	
	if(date('Y-m-d') < $_POST['kids-birthdate']){
		$result->invalidate('kids-birthdate', "Birthdate should not be future date." );
	}
	
	if($_POST['services'] == "Hour based"){
		if(empty($_POST['start-time'])){
			$result->invalidate('start-time', "This field is required." );
		}
		if(empty($_POST['end-time'])){
			$result->invalidate('end-time', "This field is required." );
		}

		if($_POST['start-time'] && $_POST['end-time']){
			$start_date = date('Y-m-d')." ".$_POST['start-time'];
			$end_time = date('Y-m-d')." ".$_POST['end-time'];
			if(strtotime($end_time) <= strtotime($start_date)){
				$result->invalidate('end-time', "End time should be grater than start time." );
			}
		}
	}
    return $result;
}

/**
* Enqueue script for child theme
*/
function theme_custom_js_main() {
    if(is_front_page()){
        wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '1.0.0', true );
	}
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'theme_custom_js_main' );
/**
* Prevent multiple clicks
*/
add_action( 'wp_footer', 'prevent_cf7_multiple_emails' );
	function prevent_cf7_multiple_emails() {
	?>

	<script type="text/javascript">
	var disableSubmit = false;
	jQuery('input.wpcf7-submit[type="submit"]').click(function() {
	   // jQuery(':input[type="submit"]').attr('value',"Sending...");
	    if (disableSubmit == true) {
	        return false;
	    }
	    disableSubmit = true;
	    return true;
	})
	  
	var wpcf7Elm = document.querySelector( '.wpcf7' );
	wpcf7Elm.addEventListener( 'wpcf7_before_send_mail', function( event ) {
	   // jQuery(':input[type="submit"]').attr('value',"Sent");
	    disableSubmit = false;
	}, false );

	wpcf7Elm.addEventListener( 'wpcf7invalid', function( event ) {
	  //  jQuery(':input[type="submit"]').attr('value',"Submit")
	    disableSubmit = false;
	}, false );
	</script>
	<?php
} ?>