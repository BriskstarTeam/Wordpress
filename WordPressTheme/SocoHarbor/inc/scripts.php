<?php
// Main Styles 
// Main Styles 
function socoharborCss() 
{
	wp_enqueue_style('style', get_stylesheet_uri(), null, null);
	
	// Registration of styles
	wp_register_style("all.min.css", get_template_directory_uri() . '/assets/css/all.min.css', null, null);
	wp_register_style("bootstrap.min.css", get_template_directory_uri() . '/assets/css/bootstrap.min.css', null, null);
	wp_register_style("lightgallery.css",get_template_directory_uri() . '/assets/css/lightgallery.css', null, null);
	wp_register_style("responsive.css",get_template_directory_uri() . '/assets/css/responsive.css', null, null);
	wp_register_style("slick-theme.css",get_template_directory_uri() . '/assets/css/slick-theme.css', null, null);
	wp_register_style("slick.css", get_template_directory_uri() . '/assets/css/slick.css', null, null);
	wp_register_style("style.css",  get_template_directory_uri() . '/assets/css/style.css', null, null);
	wp_register_style("cubeportfolio.min.css",  get_template_directory_uri() . '/assets/css/cubeportfolio.min.css', null, null);
	// Enqueue
	
	wp_enqueue_style('bootstrap.min.css');
	wp_enqueue_style('all.min.css');
	wp_enqueue_style('slick.css');
	wp_enqueue_style('slick-theme.css');
	wp_enqueue_style('lightgallery.css');
	wp_enqueue_style('cubeportfolio.min.css');
	wp_enqueue_style('style.css');
	wp_enqueue_style('responsive.css');
	wp_enqueue_script('jquery');
	
	
	
}
add_action('wp_enqueue_scripts', 'socoharborCss');

function socoharborJs() 
{
	wp_enqueue_style('style', get_stylesheet_uri(), null, null);
	
	// Registration of styles
	wp_register_script('bootstrap.min.js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), null, TRUE);
	wp_register_script('jquery.min.js', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null, TRUE);
	wp_register_script('lightgallery-all.js', get_template_directory_uri() . '/assets/js/lightgallery-all.js', array(), null, TRUE);
	

	wp_register_script('custom.js', get_template_directory_uri() . '/assets/js/custom.js', array(), null, TRUE);
	//wp_register_script('main.js', get_template_directory_uri() . '/assets/js/main.js', array(), null, TRUE);
	wp_register_script('main.js', get_template_directory_uri() . '/assets/js/main.js', array(), null, TRUE);
	wp_register_script('map.js', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array(), null, TRUE);
	//wp_register_script('map.js', get_template_directory_uri() . '/assets/js/map.js', array(), null, TRUE);
	
	wp_register_script('script.js', get_template_directory_uri() . '/assets/js/script.js', array(), null, TRUE);
	
	wp_register_script('index.js', get_template_directory_uri() . '/assets/js/index.js', array(), null, TRUE);
	
	wp_register_script('property-google-map', 'https://maps.googleapis.com/maps/api/js?v=3&libraries=places,drawing&key=AIzaSyDyJDEyJCzYCPQVIBhnGtxKi4uAtTTGnhA', array(), null, TRUE);
	wp_register_script('property-single', get_template_directory_uri() . '/assets/js/property-single.js', array(), null, TRUE);
	
	wp_register_script('slick.js', get_template_directory_uri() . '/assets/js/slick.js', array(), null, TRUE);
	wp_register_script('cubeportfolio.min.js', get_template_directory_uri() . '/assets/js/jquery.cubeportfolio.min.js', array(), null, TRUE);
	wp_register_script('font-awesome.js', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js', array(), null, TRUE);
	wp_register_script('jquery.inputmask.bundle.js',get_template_directory_uri() . '/assets/js/jquery.inputmask.bundle.js' , array(), null, TRUE);
	
	
	// Enqueue
	wp_enqueue_script('jquery.min.js');
	wp_enqueue_script('bootstrap.min.js');
	wp_enqueue_script('slick.js');
	if ( is_page_template( 'templates/main-page.php' ) ) {
		/*wp_enqueue_script('map.js');
		wp_enqueue_script('custom.js');
		wp_enqueue_script('main.js');*/
	}
	wp_enqueue_script('main.js');
	wp_enqueue_script('property-google-map');
	wp_enqueue_script('index.js');
	wp_enqueue_script('lightgallery-all.js');
	wp_enqueue_script('property-single');
	wp_enqueue_script('font-awesome.js');
	wp_enqueue_script('cubeportfolio.min.js');
	wp_enqueue_script('script.js');
	wp_enqueue_script('jquery.inputmask.bundle.js');

	?>
	<script type="text/javascript">
		var home_url = '<?php echo home_url(); ?>';		
	</script>
	<?php
}
add_action('wp_enqueue_scripts', 'socoharborJs');
?>
