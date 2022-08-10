<?php
   /* Template Name: blog page */
   get_header(); ?>
   <div class="blog__banner_list ">
    <div class="container">

    	<div class="banner_bg_color">
         <div class="blog__banner_content onestop-blog">
            <div class="w-col-4 blog__banner_img blog__banner_p mobilewidh4">
               <?php $image = get_field('banner_image'); ?>
             <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
            <div class="w-col-8 blog__banner_p blog__right_p mobilewidh8">
               <h1 class=""> <?php the_field('banner_title'); ?> </h1>
               <p class=""> <?php the_field('banner_decription'); ?></p>
                  <?php //echo do_shortcode('[contact-form-7 id="6201" title="Contact form 1"]'); ?>
                  <?php echo do_shortcode('[contact-form-7 id="6845" title="Blog Banner"]'); ?>
            </div>
         </div>
      </div>
       </div>
   </div>
   <section class="article__and__card">
      <div class="shape1" ></div>
      <div class="container">
         <div class="bloglist__row">
            <div class="w-col-8 ">
               <div class="blog_left_card">
                <?php echo do_shortcode('[blog-list]'); ?>
               </div>
            </div>
            <div class="w-col-4">
               <div class="bloglist_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <?php get_search_form(); ?>
                  </aside>
                  <aside class="bloglist_card_widget">
                     <h4>Top new popular posts</h4>
                  </aside>
                  <aside class="bloglist_popular_post">
                     <?php echo do_shortcode('[popular-post]'); ?>
                  </aside>
                  <aside class="single_sidebar_social_icon">
                     <h3 class="widget_title">Follow us</h3>
                     <div class="social_icon">
                        <a href="https://www.facebook.com/groups/softwarestartupsgrowthhiring" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/img/facebook.png" alt="facebook"></a>
                        <a href="https://twitter.com/geordiewardman" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/img/twitter.png" alt="twitter"></a>
                        <a href="https://www.linkedin.com/in/geordiewardman/" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/img/linkedin.png" alt="linkedin"></a>
                     </div>
                  </aside>
               </div>
            </div>
         </div>
      </div>
      <div class="shape2" ></div>
      <div class="shape3" ></div>
      <div class="shape4" ></div>
   </section>
<?php get_footer(); ?>
