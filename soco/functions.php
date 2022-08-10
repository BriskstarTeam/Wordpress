<?php
require_once (get_template_directory() . '/inc/scripts.php');

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

if (!function_exists('socoharbor_setup')):

    function socoharbor_setup()
    {
        // Content width
        global $content_width;
        if (!isset($content_width))
        {
            $content_width = 1170; /* pixels */
        }

        //======Enable support for Post Thumbnails on posts and pages.===//
        add_theme_support('post-thumbnails');
        add_image_size('socoharbor-large-thumb', 830);
        add_image_size('socoharbor-medium-thumb', 550, 400, true);
        add_image_size('socoharbor-small-thumb', 230);
        add_image_size('socoharbor-service-thumb', 350);
        add_image_size('socoharbor-mas-thumb', 480);
        add_image_size('socoharbor-logo', 651, 490);

    }
endif;
add_action('after_setup_theme', 'socoharbor_setup');

function custom_menu()
{
    register_nav_menu('main-menu', __(' Main Menu'));
}
add_action('after_setup_theme', 'custom_menu');

//footer setup
function custom_footer_menu()
{
    register_nav_menu('footer-menu', __(' Footer Menu'));
}
add_action('after_setup_theme', 'custom_footer_menu');

function menu_item_class($classes, $item, $args, $depth)
{

    global $post;

    if ('main-menu' === $args->theme_location)
    {
        if ($item->object_id == $post->ID)
        {
            $css[] = "nav-item active";
        }
        else
        {
            $css[] = "nav-item";
        }

        return $css;
    }

    if ('footer-menu' === $args->theme_location)
    {
        $css[] = "footer_list"; // you can add multiple classes here
        return $css;
    }

    return $classes;

}
add_filter('nav_menu_css_class', 'menu_item_class', 99, 4);

function modify_menuclass($ulclass, $args)
{
    global $post;
    switch ($args->theme_location)
    {

        case "main-menu":
            if ($post->ID == '136')
            {
                return preg_replace('/<a /', '<a class="seventh nav-link before after"', $ulclass);
            }
            else
            {

                return preg_replace('/<a /', '<a class="seventh nav-link before after"', $ulclass);
            }

        case "footer-menu":
            return $ulclass;

        default:
            return $ulclass;
    }

}
add_filter('wp_nav_menu', 'modify_menuclass', 99, 2);

// function footer_menu_item_class( $classes, $item )
// {
//     $ss[] = "footer_list"; // you can add multiple classes here
//     return $ss;
// }
// add_filter( 'nav_menu_css_class' , 'footer_menu_item_class' , 10, 2 );


//this function is used in copyright Year
function currentYear()
{
    return date('Y');
}

/*
 * Creating a function to create our CPT
*/

function custom_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Suites', 'Post Type General Name', 'soco') ,
        'singular_name' => _x('Suite', 'Post Type Singular Name', 'soco') ,
        'menu_name' => __('Suites', 'soco') ,
        'parent_item_colon' => __('Parent Suite', 'soco') ,
        'all_items' => __('All Suites', 'soco') ,
        'view_item' => __('View Suite', 'soco') ,
        'add_new_item' => __('Add New Suite', 'soco') ,
        'add_new' => __('Add New', 'soco') ,
        'edit_item' => __('Edit Suite', 'soco') ,
        'update_item' => __('Update Suite', 'soco') ,
        'search_items' => __('Search Suite', 'soco') ,
        'not_found' => __('Not Found', 'soco') ,
        'not_found_in_trash' => __('Not found in Trash', 'soco') ,
    );

    // Set other options for Custom Post Type
    $args = array(
        'label' => __('suites', 'soco') ,
        'description' => __('Suite reviews', 'soco') ,
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'revisions',
            'custom-fields',
        ) ,

        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('suites', $args);

}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
*/

add_action('init', 'custom_post_type', 0);

/* function broker_custom_post_type()
       {
           
           // Set UI labels for Custom Post Type
                   $labels = array(
                       'name'                => _x( 'Brokers', 'Post Type General Name', 'soco' ),
                       'singular_name'       => _x( 'Broker', 'Post Type Singular Name', 'soco' ),
                       'menu_name'           => __( 'Brokers', 'soco' ),
                       'parent_item_colon'   => __( 'Parent Broker', 'soco' ),
                       'all_items'           => __( 'All Brokers', 'soco' ),
                       'view_item'           => __( 'View Broker', 'soco' ),
                       'add_new_item'        => __( 'Add New Broker', 'soco' ),
                       'add_new'             => __( 'Add New', 'soco' ),
                       'edit_item'           => __( 'Edit Broker', 'soco' ),
                       'update_item'         => __( 'Update Broker', 'soco' ),
                       'search_items'        => __( 'Search Broker', 'soco' ),
                       'not_found'           => __( 'Not Found', 'soco' ),
                       'not_found_in_trash'  => __( 'Not found in Trash', 'soco' ),
                   );
                   
               // Set other options for Custom Post Type
                   
                   $args = array(
                       'label'               => __( 'brokers', 'soco' ),
                       'description'         => __( 'broker reviews', 'soco' ),
                       'labels'              => $labels,
                       // Features this CPT supports in Post Editor
                       'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                       
                       'hierarchical'        => true,
                       'public'              => true,
                       'show_ui'             => true,
                       'show_in_menu'        => true,
                       'show_in_nav_menus'   => true,
                       'show_in_admin_bar'   => true,
                       'menu_position'       => 5,
                       'can_export'          => true,
                       'has_archive'         => true,
                       'exclude_from_search' => false,
                       'publicly_queryable'  => true,
                       'capability_type'     => 'post',
                       'show_in_rest' => true,
               
                   );
                   
                   // Registering your Custom Post Type
                   register_post_type( 'brokers', $args );
   
               }
               
               add_action( 'init', 'broker_custom_post_type', 0 );*/

function contact_custom_post_type()
{

    // Set UI labels for Custom Post Type
    /*$labels = array(
        'name' => _x('Contacts', 'Post Type General Name', 'soco') ,
        'singular_name' => _x('Contact', 'Post Type Singular Name', 'soco') ,
        'menu_name' => __('Contacts', 'soco') ,
        'parent_item_colon' => __('Parent Contact', 'soco') ,
        'all_items' => __('All Contact', 'soco') ,
        'view_item' => __('View Contact', 'soco') ,
        'add_new_item' => __('Add New Contact', 'soco') ,
        'add_new' => __('Add New', 'soco') ,
        'edit_item' => __('Edit Contact', 'soco') ,
        'update_item' => __('Update Contact', 'soco') ,
        'search_items' => __('Search Contact', 'soco') ,
        'not_found' => __('Not Found', 'soco') ,
        'not_found_in_trash' => __('Not found in Trash', 'soco') ,
    );

    // Set other options for Custom Post Type
    $args = array(
        'label' => __('contacts', 'soco') ,
        'description' => __('contact reviews', 'soco') ,
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'revisions',
            'custom-fields',
        ) ,

        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('contacts', $args);*/

    // Set UI labels for Custom Post Type
    $labels = array(
        'name' => _x('Agents', 'Post Type General Name', 'soco') ,
        'singular_name' => _x('Agent', 'Post Type Singular Name', 'soco') ,
        'menu_name' => __('Agents', 'soco') ,
        'parent_item_colon' => __('Parent Agent', 'soco') ,
        'all_items' => __('All Agents', 'soco') ,
        'view_item' => __('View Agent', 'soco') ,
        'add_new_item' => __('Add New Agent', 'soco') ,
        'add_new' => __('Add New', 'soco') ,
        'edit_item' => __('Edit Agent', 'soco') ,
        'update_item' => __('Update Agent', 'soco') ,
        'search_items' => __('Search Agent', 'soco') ,
        'not_found' => __('Not Found', 'soco') ,
        'not_found_in_trash' => __('Not found in Trash', 'soco') ,
    );

    // Set other options for Custom Post Type
    $args = array(
        'label' => __('agents', 'soco') ,
        'description' => __('Agents reviews', 'soco') ,
        'labels' => $labels,
        // Features this CPT supports in Post Editor
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'revisions',
            'custom-fields',
        ) ,

        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,

    );

    // Registering your Custom Post Type
    register_post_type('agent_listing', $args);

}

add_action('init', 'contact_custom_post_type', 0);

function mapKey($api)
{
    $api['key'] = 'AIzaSyCYjJ4QWKI8OIrMkjcOcghv-YRVmqTtDKE';
    return $api;
}

add_filter('acf/fields/google_map/api', 'mapKey');

//to add svg files into website because wp doesn't allow by default
function add_file_types_to_uploads($file_types)
{

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg';
    $file_types = array_merge($file_types, $new_filetypes);

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

//Send email to particular brokers of the page
function wpcf7_before_send_mail_function($contact_form, $abort, $submission)
{

    $suite_id = $submission->get_meta('container_post_id');
    

    $featured_posts = get_field('broker', $suite_id);
   
    $emails = array();
    if ($featured_posts):
        foreach ($featured_posts as $post):
            setup_postdata($post);
            $email = get_field('e-mail_address', $post);
            array_push($emails, $email);

        endforeach;
        wp_reset_postdata();
    endif;
    $emailstr = implode(",", $emails);


    $dynamic_email = $emailstr;
    $properties = $contact_form->get_properties();
    $properties['mail']['recipient'] = $dynamic_email;
    $contact_form->set_properties($properties);

    return $contact_form;

}
add_filter('wpcf7_before_send_mail', 'wpcf7_before_send_mail_function', 10, 3);

add_filter('wpcf7_validate_text*', 'custom_textarea_validation_filter', 1, 2);
function custom_textarea_validation_filter($result, $tag)
{
    $tag = new WPCF7_Shortcode($tag);
    $result = (object)$result;

    $first_name = 'first_name';
    $last_name = 'last_name';
    $ra = "/^([a-zA-Z' ]+)$/";

    if ($first_name == $tag->name)
    {
        $first_name_empty = isset($_POST[$first_name]) ? trim(wp_unslash((string)$_POST[$first_name])) : " ";

        if (empty($first_name_empty))
        {
            $result->invalidate($tag, "First Name is required.");
        }

        if (!preg_match($ra, $_POST[$first_name]))
        {
            $result->invalidate($tag, "Enter valid First Name.");
        }
    }

    if ($last_name == $tag->name)
    {
        $last_name_empty = isset($_POST[$last_name]) ? trim(wp_unslash((string)$_POST[$last_name])) : " ";

        if (empty($last_name_empty))
        {
            $result->invalidate($tag, "Last Name is required.");
        }
        if (!preg_match($ra, $_POST[$last_name]))
        {
            $result->invalidate($tag, "Enter valid Last Name.");
        }
    }
    return $result;
}

add_filter('wpcf7_validate_email*', 'custom_email_validation_filter', 1, 2);
function custom_email_validation_filter($result, $tag)
{
    $tag = new WPCF7_Shortcode($tag);
    $result = (object)$result;

    $email = 'email';

    if ($email == $tag->name)
    {
        $email_empty = isset($_POST[$email]) ? trim(wp_unslash((string)$_POST[$email])) : " ";

        if (empty($email_empty))
        {
            $result->invalidate($tag, "Email is required.");
        }
    }
    return $result;
}

add_filter('wpcf7_validate_textarea*', 'custom_email_textarea_filter', 1, 2);
function custom_email_textarea_filter($result, $tag)
{
    $tag = new WPCF7_Shortcode($tag);
    $result = (object)$result;

    $textarea = 'Message';

    if ($textarea == $tag->name)
    {
        $textarea_empty = isset($_POST[$textarea]) ? trim(wp_unslash((string)$_POST[$textarea])) : " ";

        if (empty($textarea_empty))
        {
            $result->invalidate($tag, "Message is required.");
        }
    }
    return $result;
}

add_filter('wpcf7_validate_tel*', 'custom_tel_validation_filter', 1, 2);
function custom_tel_validation_filter($result, $tag)
{
    $tag = new WPCF7_Shortcode($tag);
    $result = (object)$result;

    $phone_no = 'phone_no';

    if ($phone_no == $tag->name)
    {
        $phone_empty = isset($_POST[$phone_no]) ? trim(wp_unslash((string)$_POST[$phone_no])) : " ";

        if (empty($phone_empty))
        {
            $result->invalidate($tag, "Phone is required.");
        }
    }
    return $result;
}
function debug_cf7_add_error( $items, $result ) {
    if ( 'mail_failed' == $result['status'] ) {
        global $phpmailer;
        $items['errorInfo'] = $phpmailer->ErrorInfo;
    }
    return $items;
}
add_action( 'wpcf7_ajax_json_echo', 'debug_cf7_add_error', 10, 2 );


// hide update notifications
function remove_core_updates()
{
    global $wp_version;
    return(object) 
    array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes


function favicon4admin() {
echo '<link rel="icon" href="'.get_theme_file_uri().'/assets/img/favicon.png" sizes="32x32" />';
}
add_action('login_head', 'favicon4admin');
add_action( 'admin_head', 'favicon4admin' );

    // Prevent Multi Submit on all WPCF7 forms
    add_action( 'wp_footer', 'prevent_cf7_multiple_emails' );

    function prevent_cf7_multiple_emails() {
    ?>

    <script type="text/javascript">
    var disableSubmit = false;
    jQuery('input.wpcf7-submit[type="submit"]').click(function() {
        if (disableSubmit == true) {
            return false;
        }
        disableSubmit = true;
        return true;
    })
      
    var wpcf7Elm = document.querySelector( '.wpcf7' );
    wpcf7Elm.addEventListener( 'wpcf7_before_send_mail', function( event ) {
        disableSubmit = false;
    }, false );

    wpcf7Elm.addEventListener( 'wpcf7invalid', function( event ) {
        disableSubmit = false;
    }, false );
    </script>
    <?php
} ?>