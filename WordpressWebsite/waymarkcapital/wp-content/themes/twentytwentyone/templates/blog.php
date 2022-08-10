<?php
   /* Template Name: Blog */
   get_header(); 
   ?>
 <?php
    $innerpage_banner_image = get_field('innerpage_banner_image');
    $pre_ipo_insights_title = get_field('pre_ipo_insights_title');
    $search_icon = get_field('search_icon');
?>
  <section class="innerpage-banner-area">
    <img src="<?php echo $innerpage_banner_image['url']; ?>" alt="<?php echo $innerpage_banner_image['name']; ?>" class="img-fluid" />
    <div class="innerpage-banner-content">
      <h2><?php echo $pre_ipo_insights_title; ?></h2>
    </div>
  </section>
  <section class="blog">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">
          <div class="blog-mainbox">
            <div class="row">
               <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array('numberposts' => 10, 'post_type' => 'post', 'paged' => $paged);
                $blog = get_posts( $args );
                $wp_query = new WP_Query($args);
                foreach ($blog as $key => $val){
                   $content = $val->post_content;
                   $title = $val->post_title;
                   $featureImage = get_the_post_thumbnail( $val->ID, 'full', array( 'class' => 'align-left' ) );
                   $category_detail = get_the_category($val->ID);
                   $post_date = $val->post_date;
                   $category_name = $category_detail[0]->name;
                   $singlePageUrl = $val->guid;
                ?>
              <div class="col-sm-6">
                <div class="blog-box">
                  <div class="blog-imgbox">
                    <a href="<?php echo $singlePageUrl; ?>" class="link link--metis "><?php echo $featureImage; ?></a>
                    <span class="blog-date"><?php echo date("j F Y", strtotime($post_date)); ?></span>
                    <h4 class="blog-Category"><?php echo $category_name; ?></h4>
                  </div>
                  <div class="blog-contentbox">
                    <h6><a href="<?php echo $singlePageUrl; ?>" class="link link--metis "><?php echo $title; ?></a></h6>
                    <p><?php echo $content; ?></p>
                    <a href="<?php echo $singlePageUrl; ?>" class="link link--metis ">Read More</a>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
          <div class="blog-pagination">
            <ul class="pagination pagination-md">
              <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="https://www.waymarkcapital.com/blog/">1</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="position-relative blog-search">
            <?php get_search_form(); ?>
          </div>
          <div class="blog-category">
            <span class="blog-category-title">Categories</span>
            <ul class="list-style-6">
            <?php
                global $post;
                $categories = get_terms( array( 'taxonomy' => 'category', 'hide_empty' => false) );
                foreach($categories as $key => $val){ 
                    if($val->name != 'Uncategorized'){ ?>
                        <li><a href="<?php echo site_url().'/category/'.$val->name; ?>"><?php echo $val->name; ?></a></li>        
                    <?php }
                 } ?>
            </ul>
          </div>
          <div class="recent-blog">
            <span class="blog-recent-title">Recent Post</span>
            <div class="recent-blog-mainbox">
            <?php
                $args = array('numberposts' => 2, 'post_type' => 'post', 'order' => 'DESC');
                $blogs = get_posts( $args );
                foreach($blogs as $key => $val){
                    $title = $val->post_title;
                    $featureImage = get_the_post_thumbnail( $val->ID, 'full', array( 'class' => 'align-left' ) );
                    $singlePageUrl = $val->guid;
                    $post_date = $val->post_date; ?>
                    <div class="recent-blog-box">
                        <a href="<?php echo $singlePageUrl; ?>" class="link link--metis"><?php echo $featureImage; ?></a>
                        <span><?php echo date("j F Y", strtotime($post_date)); ?> </span>
                        <a href="<?php echo $singlePageUrl; ?>" class="link link--metis"><h6><?php echo $title; ?></h6></a>
                    </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php
    $footer_shape = get_field('footer_shape');
    $buying_pre_ipo_stocks = get_field('buying_pre_ipo_stocks');
    $buying_pre_ipo_details = get_field('buying_pre_ipo_details');
    $footer_logo = get_field('footer_logo');
    $footer_text = get_field('footer_text');
  ?>
<footer>
    <div class="footer">
      <div class="row">
        <div class="col-sm-6">
          <div class="footer-box">
            <img src="<?php echo $footer_shape['url']; ?>" alt="<?php echo $footer_shape['name']; ?>" class="img-fluid">
            <div class="footer-content">
              <h3><?php echo $buying_pre_ipo_stocks; ?></h3>
              <p><?php echo $buying_pre_ipo_details; ?></p>
              <a class="theme_btn thm-btn border-radius-5 show-more" tabindex="0">Book A Call Now</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="footer-bottom-content">
            <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['name']; ?>" class="img-fluid" />
            <p><?php echo $footer_text; ?></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php //get_footer(); ?>