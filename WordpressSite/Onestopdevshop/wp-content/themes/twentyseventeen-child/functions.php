<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles()
{

  $parent_style = 'twentyseventeen-style';
  $child_style = 'twentyseventeen-child';

    if ( is_page_template( 'estimate.php' ) || is_page_template( 'contact-page.php' )) {
        wp_enqueue_style( $child_style.'_bootstrap', get_theme_file_uri().'/assets/css/bootstrap.css' );
        wp_enqueue_style( $child_style.'_responsive', get_theme_file_uri().'/assets/css/responsive.css' );
        
    }
    if ( is_page_template( 'estimate.php' ) ) {
        wp_enqueue_style( $child_style.'_estimate_style', get_theme_file_uri().'/assets/css/estimate_style.css' );
    }
    if ( is_page_template( 'contact-page.php' ) ) {
        wp_enqueue_style( $child_style.'_contact_style', get_theme_file_uri().'/assets/css/contact_style.css' );
        wp_enqueue_style( $child_style.'_contact_responsive_style', get_theme_file_uri().'/assets/css/contact_responsive.css' );
    }
   wp_enqueue_style( $child_style.'_style', get_theme_file_uri().'/style.css' );
   wp_enqueue_style( $child_style.'_assets-style', get_theme_file_uri().'/assets/css/style.css' );
   wp_enqueue_style( $child_style.'_normalize', get_theme_file_uri().'/assets/css/normalize.css' );
   wp_enqueue_style( $child_style.'_components', get_theme_file_uri().'/assets/css/components.css' );
   wp_enqueue_style( $child_style.'_about', get_theme_file_uri().'/assets/css/onestop-b2fbcd-about.css' );
   wp_enqueue_style( $child_style.'_onestop_b2fbcd', get_theme_file_uri().'/assets/css/onestop-b2fbcd.css' );

   if ( is_page_template( 'about-page.php' ) ) {
     wp_enqueue_style( $child_style.'_about', get_theme_file_uri().'/assets/css/onestop-b2fbcd-about.css' );
   }
   if(is_page_template('podcast-page.php') ){
     wp_enqueue_style( $child_style.'_onestop-b2fbcd', get_theme_file_uri().'/assets/css/onestop-b2fbcd.css' );
   }
   if(is_page_template( 'blog-page.php' )){
     wp_enqueue_style( $child_style.'_onestop-b2fbcd', get_theme_file_uri().'/assets/css/onestop-b2fbcd.css' );
     wp_enqueue_style( $child_style.'_blog', get_theme_file_uri().'/assets/css/bloglist.css' );
   }
   if(is_front_page()){
     wp_enqueue_style( $child_style.'_onestop-b2fbcd', get_theme_file_uri().'/assets/css/onestop-b2fbcd.css' );
   }
   if(is_search()){
     wp_enqueue_style( $child_style.'_onestop-b2fbcd', get_theme_file_uri().'/assets/css/onestop-b2fbcd.css' );
   }
   if(is_single()){
     wp_enqueue_style( $child_style.'_onestop-b2fbcd', get_theme_file_uri().'/assets/css/onestop-b2fbcd.css' );
     wp_enqueue_style( $child_style.'_podcast-details', get_theme_file_uri().'/assets/css/podcast_details_page.css' );
   }

   if(is_singular('podcast')){
     wp_enqueue_style( $child_style.'_onestop', get_theme_file_uri().'/assets/css/onestop-b2fbcd.css' );
     wp_enqueue_style( $child_style.'_podcast-details', get_theme_file_uri().'/assets/css/podcast_details_page.css' );
   }
    wp_enqueue_style( $child_style.'_technologies_css', get_theme_file_uri().'/assets/css/onestop-b2fbcd-product.css' );
   if( is_page_template( 'technologies-page.php' )){

        wp_enqueue_style( $child_style.'_style', get_theme_file_uri().'/style.css' );
        wp_enqueue_style( $child_style.'_technologies_css', get_theme_file_uri().'/assets/css/onestop-b2fbcd-product.css' );
        wp_enqueue_style( $child_style.'_menu_css', get_theme_file_uri().'/assets/css/menu.css' );

   }
   wp_enqueue_style( $child_style.'_widget_css', get_theme_file_uri().'/assets/css/widget.css' );
   wp_enqueue_style( $child_style.'_menu_css', get_theme_file_uri().'/assets/css/menu.css' );
   wp_enqueue_style( $child_style.'_fancybox_css', get_theme_file_uri().'/assets/css/jquery.fancybox.min.css' );



   //js
    wp_enqueue_script($child_style.'_jquery', get_stylesheet_directory_uri().'/assets/js/jquery.min.js', ['jquery'], '', 'in_footer');
   if(!is_page_template( 'technologies-page.php' )){
   //wp_enqueue_script($child_style.'_jquery', get_stylesheet_directory_uri().'/assets/js/jquery.min.js', ['jquery'], '', 'in_footer');
   wp_enqueue_script($child_style.'_onestop_b2fbcd', get_stylesheet_directory_uri().'/assets/js/onestop-b2fbcd.js', ['jquery'], '', 'in_footer');
   }

   wp_enqueue_script($child_style.'_bootstrap', get_stylesheet_directory_uri().'/assets/js/bootstrap.min.js', ['jquery'], '', 'in_footer');
   wp_enqueue_script($child_style.'_custom', get_stylesheet_directory_uri().'/assets/js/custom.js', ['jquery'], '', 'in_footer');

   wp_enqueue_script($child_style.'_webfont', get_stylesheet_directory_uri().'/assets/js/webfont.js', ['jquery'], '', 'in_footer');
   wp_enqueue_script($child_style.'_widget_js', get_stylesheet_directory_uri().'/assets/js/widget.js', ['jquery'], '', 'in_footer');
   
   
   wp_enqueue_script($child_style.'_mega-menu_js', get_stylesheet_directory_uri().'/assets/js/mega-menu.js', ['jquery'], '', 'in_footer');
   wp_enqueue_script($child_style.'_jquery.morecontent_js', get_stylesheet_directory_uri().'/assets/js/jquery.morecontent.js', ['jquery'], '', 'in_footer');
   wp_enqueue_script($child_style.'_demo_js', get_stylesheet_directory_uri().'/assets/js/demo.js', ['jquery'], '', 'in_footer');
}
//add menu class
add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );

function wpse156165_menu_add_class( $atts, $item, $args ) {
    $class = 'nav-link w-nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}

//read more option

function get_excerpt($count){
    global $post;
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    // $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = '<p class="mobile__spacing">'.$excerpt.'...</p>';
    return $excerpt;
}
function get_excerpt_title($count){
    global $post;
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_title();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    // $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = '<h4>'.$excerpt.'...</h4>';
    return $excerpt;
}
add_action( 'init','portfolio_cpt' );

function portfolio_cpt() {
  $cap_type = 'post';
  $plural = 'podcast';
  $single = 'podcast';
  $cpt_name = 'podcast';
  $opts['can_export'] = TRUE;
  $opts['capability_type'] = $cap_type;
  $opts['description'] = '';
  $opts['exclude_from_search'] = FALSE;
  $opts['has_archive'] = true;
  $opts['hierarchical'] = FALSE;
  $opts['map_meta_cap'] = TRUE;
  $opts['menu_icon'] = 'dashicons-businessman';
  $opts['menu_position'] = 25;
  $opts['public'] = TRUE;
  $opts['publicly_querable'] = TRUE;
  $opts['query_var'] = TRUE;
  $opts['register_meta_box_cb'] = '';
  $opts['rewrite'] = true;
  $opts['show_in_admin_bar'] = TRUE;
  $opts['show_in_menu'] = TRUE;
  $opts['show_in_nav_menu'] = TRUE;
  $opts['supports'] = array('title', 'editor', 'custom-fields', 'excerpt', 'thumbnail');
  $opts['taxonomies'] = array('post_tag');


  $opts['labels']['add_new'] = esc_html__( "Add New {$single}", 'wisdom' );
  $opts['labels']['add_new_item'] = esc_html__( "Add New {$single}", 'wisdom' );
  $opts['labels']['all_items'] = esc_html__( $plural, 'wisdom' );
  $opts['labels']['edit_item'] = esc_html__( "Edit {$single}" , 'wisdom' );
  $opts['labels']['menu_name'] = esc_html__( $plural, 'wisdom' );
  $opts['labels']['name'] = esc_html__( $plural, 'wisdom' );
  $opts['labels']['name_admin_bar'] = esc_html__( $single, 'wisdom' );
  $opts['labels']['new_item'] = esc_html__( "New {$single}", 'wisdom' );
  $opts['labels']['not_found'] = esc_html__( "No {$plural} Found", 'wisdom' );
  $opts['labels']['not_found_in_trash'] = esc_html__( "No {$plural} Found in Trash", 'wisdom' );
  $opts['labels']['parent_item_colon'] = esc_html__( "Parent {$plural} :", 'wisdom' );
  $opts['labels']['search_items'] = esc_html__( "Search {$plural}", 'wisdom' );
  $opts['labels']['singular_name'] = esc_html__( $single, 'wisdom' );
  $opts['labels']['view_item'] = esc_html__( "View {$single}", 'wisdom' );
  register_post_type( strtolower($cpt_name), $opts );
}

function portfolio_taxonomy() {
    register_taxonomy(
        'portfoliocategory',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'portfolio',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'portfolio category',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'portfolio', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'portfolio_taxonomy');

add_shortcode( 'portfolio', 'portfolio_cpt_shortcode');

function portfolio_cpt_shortcode($attr){

    $args = array(
        'posts_per_page' => '',
        'post_type' => 'portfolio',
        'post_status' => 'publish'
    );

    $string = '';
    $stringcontents = '';
    $query = new WP_Query( $args );
    if( $query->have_posts() ){

        while( $query->have_posts() ){
            $query->the_post();
             $image_testimonial = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full', false  );
            $thumb_url = $image_testimonial[0];
            $view_link = get_field('view');
            $string .='<div class="content _33">
              <a href="'.$view_link['url'].'" class="lightbox-link w-inline-block w-lightbox">
              <div class="portfolio-wrapper" style="background-color:'.rtrim(get_field('card_bakground_color')).';" >
                  <h3 class="portfolio-title">'.get_the_title().'</h3><img src="'.$thumb_url.'" srcset="'.$thumb_url.'" sizes="(max-width: 991px) 100vw, 59vw" alt="" class="img-portfolio">
                  <div class="overlay-portf">
                    <div class="btn ghost">View</div>
                  </div>
                </div>
              </a>
            </div>';
        }
    }
    wp_reset_postdata();
    return $string;
}

//podcast

add_action( 'init','podcast_cpt' );

function podcast_cpt() {
  $cap_type = 'post';
  $plural = 'Portfolio';
  $single = 'Portfolio';
  $cpt_name = 'portfolio';
  $opts['can_export'] = TRUE;
  $opts['capability_type'] = $cap_type;
  $opts['description'] = '';
  $opts['exclude_from_search'] = FALSE;
  $opts['has_archive'] = FALSE;
  $opts['hierarchical'] = FALSE;
  $opts['map_meta_cap'] = TRUE;
  $opts['menu_icon'] = 'dashicons-businessman';
  $opts['menu_position'] = 25;
  $opts['public'] = TRUE;
  $opts['publicly_querable'] = TRUE;
  $opts['query_var'] = TRUE;
  $opts['register_meta_box_cb'] = '';
  $opts['rewrite'] = FALSE;
  $opts['show_in_admin_bar'] = TRUE;
  $opts['show_in_menu'] = TRUE;
  $opts['show_in_nav_menu'] = TRUE;
  $opts['supports'] = array('title', 'editor', 'custom-fields', 'excerpt', 'thumbnail');


  $opts['labels']['add_new'] = esc_html__( "Add New {$single}", 'wisdom' );
  $opts['labels']['add_new_item'] = esc_html__( "Add New {$single}", 'wisdom' );
  $opts['labels']['all_items'] = esc_html__( $plural, 'wisdom' );
  $opts['labels']['edit_item'] = esc_html__( "Edit {$single}" , 'wisdom' );
  $opts['labels']['menu_name'] = esc_html__( $plural, 'wisdom' );
  $opts['labels']['name'] = esc_html__( $plural, 'wisdom' );
  $opts['labels']['name_admin_bar'] = esc_html__( $single, 'wisdom' );
  $opts['labels']['new_item'] = esc_html__( "New {$single}", 'wisdom' );
  $opts['labels']['not_found'] = esc_html__( "No {$plural} Found", 'wisdom' );
  $opts['labels']['not_found_in_trash'] = esc_html__( "No {$plural} Found in Trash", 'wisdom' );
  $opts['labels']['parent_item_colon'] = esc_html__( "Parent {$plural} :", 'wisdom' );
  $opts['labels']['search_items'] = esc_html__( "Search {$plural}", 'wisdom' );
  $opts['labels']['singular_name'] = esc_html__( $single, 'wisdom' );
  $opts['labels']['view_item'] = esc_html__( "View {$single}", 'wisdom' );
  register_post_type( strtolower( $cpt_name ), $opts );
}

function podcast_taxonomy() {
    register_taxonomy(
        'podcastcategory',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'podcast',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'podcast category',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'podcast', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'podcast_taxonomy');

function count_cat_post($category) {
if(is_string($category)) {
    $catID = get_cat_ID($category);
}
elseif(is_numeric($category)) {
    $catID = $category;
} else {
    return 0;
}
$cat = get_category($catID);
return $cat->count;
}


add_shortcode( 'podcast', 'podcast_cpt_shortcode');

function podcast_cpt_shortcode($attr){
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'posts_per_page' => '25',
        'post_type' => 'podcast',
        'post_status' => 'publish',
        'paged' => $paged,
    );

    $string = '';
    $stringcontents = '';
    $query = new WP_Query( $args );
  //echo "<pre>"; print_r($query); exit;
    if( $query->have_posts() ){

        while( $query->have_posts() ){
            $query->the_post();
             $image_testimonial = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full', false  );
            $thumb_url = $image_testimonial[0];
            $categories = get_the_terms($post->ID,'podcastcategory');
            $string .='<article>
               <div class="blog_style1">
                  <div class="article__podcasts__img"> <img class="img-fluid"src="'.$thumb_url.'"alt="'.get_the_author().'"> </div>
                  <div class="article___title">
                     <div class="blog_text_inner">
                        <div class="mic"> <a class="mic_btn"href="'.get_permalink($post->ID).'">'.$categories[0]->name.'</a> </div>
                        <a href="'.get_permalink($post->ID).'">
                           <h4>'.get_the_title().'</h4>
                        </a>
                     </div>
                  </div>
                  '.get_excerpt(220).'
                  <div class="article___text">
                     <p class="author__p"> By <a class="author__name"href="#">'.get_the_author().'</a>
                        <span>'.get_the_date( get_option('date_format') ).'</span>
                     </p>
					 <div class="share-section">
                      <a href="'.get_permalink($post->ID).'"class="shares">'.do_shortcode(' [mashshare buttons="false"]').'</a>
                    </div>
                  </div>
               </div>
            </article>';
        }

        $count = count_cat_post('podcasts');
        $published_post_count = $count->publish;
        $total_pages = ceil( $count / 4 );
         //echo "<pre>"; print_r($count); exit; 
        $string .= '<div class="pagination">
           <div class="page__1__of">
              <span class="paging-input">Page '.$paged.' of </span>
              <span class="tablenav-paging-text">'.$query->max_num_pages.'</span>
           </div>
           <div class="page__number">';

        $big = 999999999; // need an unlikely integer

        $string .=  paginate_links([

            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),

            'format' => '?paged=%#%',

            'current' => max( 1, get_query_var('paged') ),

            'total' => $query->max_num_pages,
            'prev_text' => __('«'),
            'next_text' => __('»')


          ]);

        $string .= '</div></div>';
    }
    wp_reset_postdata();
    return $string;
}

//new post in sidebar

add_shortcode( 'blog', 'blog_cpt_shortcode');

function blog_cpt_shortcode($attr){
    global $post;
    $args = array(
        'posts_per_page' => '10',
        'post_type' => 'post',
        'category__not_in' => array( '152' ),
        'post_status' => 'publish'
    );

    $string = '';
    $stringcontents = '';
    $query = new WP_Query( $args );
    if( $query->have_posts() ){

        while( $query->have_posts() ){
            $query->the_post();

            $string .='<div class="media post_item">
               <div class="media-body">
                  <a href="'.get_permalink($post->ID).'">
                     <h4>'.get_the_title().'</h4>
                  </a>
                  <p> By  <a href="'.get_permalink($post->ID).'">'.get_the_author().'</a> <span>'.get_the_date( get_option('date_format') ).'</span></p>
               </div>
            </div>';
        }
    }
    wp_reset_postdata();
    return $string;
}

//new podcast in sidebar

add_shortcode( 'recent_podcast', 'recent_podcast_shortcode');

function recent_podcast_shortcode($attr){
    global $post;
    $args = array(
        'posts_per_page' => '-1',
        'post_status' => 'publish',
        'post_type' => 'podcast'
        
    );

    $string = '';
    $stringcontents = '';
    $query = new WP_Query( $args );
    //echo "<pre>"; print_r($query);exit;
    if( $query->have_posts() ){
        while( $query->have_posts() ){
            $query->the_post();
            $event_name = get_post_meta( $post->ID, 'popular_podcast', true );
            
            if($event_name == 'Yes'){
                $string .='<div class="media post_item">
                <div class="media-body">
                      <a href="'.get_permalink($post->ID).'">
                         <h4>'.get_the_title().'</h4>
                      </a>
                      <p> By  <a href="'.get_permalink($post->ID).'">'.get_the_author().'</a> <span>'.get_the_date( get_option('date_format') ).'</span></p>
                   </div>
                </div>';
            }
            
        }
    }
    wp_reset_postdata();
    return $string;
}



// blog list

add_shortcode( 'blog-list', 'blog_list_cpt_shortcode');

function blog_list_cpt_shortcode($attr){
    global $post;
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'posts_per_page' => '-1',
        'post_type' => 'post',
        'category__not_in' => array( '152' ),
        'post_status' => 'publish'
    );

    $string = '';
    $stringcontents = '';
    $query = new WP_Query( $args );
    if( $query->have_posts() ){

        while( $query->have_posts() ){
            $query->the_post();
             $image_testimonial = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full', false  );
            $thumb_url = $image_testimonial[0];

            $string .='<article>
               <div class="blog_style1">
                  <div class="article_card_img">
                     <a href="'.get_permalink($post->ID).'">';
                     if(has_post_thumbnail()){
                      $string .='<img class="img-fluid"src="'.$thumb_url.'" alt="blog image">';
                    }else{

                    }
                      $string  .='
                  </div>
                  <div class="blog_card__title">
                  <h4>'.get_the_title().'</h4>
                  '.get_excerpt(200).'</a>
                  </div>
               </div>
            </article>';
        }

    }
    wp_reset_postdata();
    return $string;
}
add_shortcode( 'popular-post', 'popular_post_shortcode');

function popular_post_shortcode($attr){

    $args = array(
        'posts_per_page' => '10',
        'post_type' => 'post',

        'category__not_in' => array( '152' ),
        'post_status' => 'publish'
    );

    $string = '';
    $stringcontents = '';
    $query = new WP_Query( $args );
    if( $query->have_posts() ){

        while( $query->have_posts() ){
            global $post;
            $query->the_post();
            $image_testimonial = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full', false  );
            $thumb_url = $image_testimonial[0];
            $string .='
            <div class="media-body sub__post">
               <a href="'.get_permalink($post->ID).'">
                  <div class="sub__post_img">';
                    if(has_post_thumbnail()){
                     $string .='<img class="img-fluid"src="'.$thumb_url.'"alt="blog image">';
                   }else{
                     $string .='<img class="img-fluid" src="'.get_theme_file_uri().'/assets/images/imgpsh_fullsize_anim (2).png" alt="blog image">';
                   }
                  $string .='</div>
                  <div class="sub__title_card_side">
               <a href="'.get_permalink($post->ID).'">'.get_excerpt_title(35).'</a>
               <p> By  <a href="'.get_permalink($post->ID).'">'.get_the_author().' </a> <span>'.get_the_date( get_option('date_format') ).' </span></p></div>
            </div>';
        }
    }
    wp_reset_postdata();
    return $string;
}
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'footer-3',
            'name'          => __( 'footer 3' ),
            'description'   => __( 'footer 3 section.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'id'            => 'footer-4',
            'name'          => __( 'footer 4' ),
            'description'   => __( 'footer 4 section.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

}

/*Add meta description on blog post*/
function gretathemes_meta_description() {
    global $post;
    $url = $_SERVER['REQUEST_URI'];
    $currentUrl = explode('/', $url);
    if ( (is_singular() && !is_page() )) {
        $des_post = strip_tags( $post->post_content );
        $des_post = strip_shortcodes( $post->post_content );
        $des_post = str_replace( array("\n", "\r", "\t"), ' ', $des_post );
        $des_post = mb_substr( $des_post, 0, 150, 'utf8' );
        $des_post = trim($des_post);
        if(($currentUrl[1] != "podcast") && !is_single()) {
            echo '<meta name="description" content="' . $des_post . '">' . "\n";
        }
        
    }
}
add_action( 'wp_head', 'gretathemes_meta_description');


function gretathemes_meta_tags() {
    echo '<meta name="meta_name" content="meta_value" />';
}
add_action('wp_head', 'gretathemes_meta_tags');
/*------Remove tag & category from url-----*/

function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');


/*-------------Disable all plugins update--------------*/

function remove_core_updates(){
        global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
    }
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

/*-------------Disable all plugins update--------------*/
add_action( 'pmxi_saved_post', 'my_set_parent', 10, 3 );

function my_set_parent( $post_id, $xml, $is_update ) {
	if ( $parent = wp_get_post_parent_id( $post_id ) ) {
		update_post_meta( $post_id, '_wpcf_belongs_ParentName_id', $parent );
	}
}



/* Creates the meta box. */
/* Hook meta box to just the 'place' post type. */
add_action( 'add_meta_boxes_place', 'my_add_meta_boxes' );

/* Creates the meta box. */
function my_add_meta_boxes( $post ) {

	add_meta_box(
		'my-place-parent',
		__( 'Neighborhood', 'example-textdomain' ),
		'my_place_parent_meta_box',
		$post->post_type,
		'side',
		'core'
	);
}


add_action( 'wp_footer', 'mycustom_wp_footer' );

function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( e ) {
    window.location.href = "https://www.onestopdevshop.io/thank-you/";
    
}, false );
</script>
<?php
}



function replace_submenu_class($menu) {  
  $menu = preg_replace('/ class="sub-menu"/','/ class="sub-menu custom_sub_menu" /',$menu);  
  return $menu;  
}  
add_filter('wp_nav_menu','replace_submenu_class'); 

add_filter( 'wpseo_opengraph_desc', '__return_false' );

/*Add meta description on blog post*/

add_filter( 'big_image_size_threshold', '__return_false' );


function CustomHead() {
    $url = $_SERVER['REQUEST_URI'];
    $currentUrl = explode('/', $url);
    echo '<script type="application/ld+json">
        {
            "@context" : "https://schema.org",
            "@type" : "Organization",
            "name" : "Onestopdevshop",
            "url" : "https://onestopdevshop.io/"}
        </script>';
    if(is_page('geordie-wardman')){
        echo '<script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "Person",
          "name": "Geordie Wardman",
          "url": "https://onestopdevshop.io/geordie-wardman/",
          "image": "https://onestopdevshop.io/wp-content/uploads/2020/06/gsw-smokeumper.png",
          "sameAs": [
            "https://twitter.com/geordiewardman",
            "https://www.linkedin.com/in/geordiewardman/",
            "https://onestopdevshop.io/",
            "https://about.me/Geordiewardman"
          ],
          "jobTitle": "Owner",
          "worksFor": {
            "@type": "Organization",
            "name": "Onestop Devshop - SaaS Company"
          }  
        }
        </script>';
    }
    if(($currentUrl[1] != "podcast") && (is_single()) ){ ?>
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Article",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?php the_permalink() ?>" //blog url
          },
          "headline": "<?php the_title() ?>", //call meta title 
          "description": "<?php echo substr( get_the_excerpt(), 0,160 ); ?>",  //call meta description 160 char
          "image": "<?php echo get_the_post_thumbnail_url(); ?>",  //  featured image
          "author": {
            "@type": "Person",
            "name": "Geordie Wardman"
          },  
          "publisher": {
            "@type": "Organization",
            "name": "Organization",
            "logo": {
              "@type": "ImageObject",
              "url": "https://onestopdevshop.io/wp-content/uploads/2020/04/cropped-Logo-1.jpg"
            }
          },
          "datePublished": "<?php echo get_the_date(); ?>",
          "dateModified": "<?php echo get_the_date(); ?>"
        }
        </script>
   <?php }else{ 
        $content = get_field('iframe_for_audio');
        preg_match('/src="([^"]+)"/', $content, $match);
        $url = $match[1];
   ?>
       <script type="application/ld+json">
        {
           "@context": "https://schema.org/",
           "@type": "PodcastEpisode",
           "url": "<?php the_permalink() ?>",
           "name": "Geordie Wardman",
           "datePublished": "<?php echo get_the_date(); ?>",
           "timeRequired": "PT60M",
           "description": "In this episode Geordie discussed regarding '<?php the_title() ?>' ",
           "associatedMedia": {
             "@type": "MediaObject",
             "contentUrl": "<?php echo $url; ?>"
           },
           "partOfSeries": {
             "@type": "PodcastSeries",
             "name": "Big Break Software Podcast",
             "url": "https://onestopdevshop.io/podcasts/"
           }
         }
        </script>
  <?php }
}
add_action('wp_head','CustomHead',1,1);

remove_filter( 'the_content', 'wpautop' );


function my_custom_js() {
    echo "";
}
// Add hook for admin <head></head>
add_action( 'admin_head', 'my_custom_js' );
// Add hook for front-end <head></head>
add_action( 'wp_head', 'my_custom_js' );


