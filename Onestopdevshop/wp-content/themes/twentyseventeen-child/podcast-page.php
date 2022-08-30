<?php
   /* Template Name: podcast page */
   get_header(); 
   
   ?>
 <div class="blog__banner_list ">
    <div class="container ">
        <div class="banner_bg_color">
            <div class="blog__banner_content">
                 <div class="hero-content podcast__banner__col__4 blog__banner_p">
                    <h1 class="hero-h1"><?php the_field('banner_title'); ?></h1>
                    <p class="hero-p"><?php the_field('banner_decription'); ?></p>
                     <?php echo do_shortcode('[contact-form-7 id="6718" title="Podcast"]'); ?>
                     <div class="hero-content podcast__banner__col__7 blog__banner_p display_aliment vidio_pos">
                    <div class="card fancybox__img">
                        <script src="https://fast.wistia.com/embed/medias/dq7ludvm3y.jsonp" async></script>
                        <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
                        <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                            <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                                <div class="wistia_embed wistia_async_dq7ludvm3y videoFoam=true" style="height:100%;position:relative;width:100%">
                                    <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;">
                                        <img src="https://fast.wistia.com/embed/medias/dq7ludvm3y/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="swatch" aria-hidden="true" onload="this.parentNode.style.opacity=1;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                 </div>
                 
            </div>
        </div>
    </div>
</div>
<section class="listen_on">
   <div class="container">
      <div id="clients">
         <div class="clients-wrap c_p_t">
            <h4>Listen on</h4>
           <ul id="clients-list" class="clearfix">

             <?php while ( have_rows('icon_list_page') ) : the_row(); ?>
               <?php $icon_link = get_sub_field('icon_link');  ?>
             <li ><a href="<?php echo $icon_link['url']; ?>" target="_blank" class="<?php echo the_sub_field('icon_image'); ?> social_icon"> </a></li>
             <?php endwhile; ?>
         </div>
         <!-- @end .clients-wrap -->
      </div>
   </div>
</section>
<section class="article__and__side__bar">
   <div class="shape1" ></div>
   <div class="container">
      <h5> Podcasts</h5>
      <div class="article__row">
         <div class="w-col-8 varical__line">
            <div class="blog_left_sidebar">
               <?php echo do_shortcode('[podcast]') ?>
            </div>
         </div>
         <div class="w-col-4">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget search_widget">
                 <?php get_search_form(); ?>
               </aside>
               <aside class="single_sidebar_card_widget">
                  <h4><?php //the_field('card_title'); ?></h4>
                  <p class="semititle"><?php //echo  the_field('card_sub_title'); ?></p>
                  <p><?php the_field('card_decription'); ?></p>
                  <?php $button_link = get_field('button_link'); ?>
                  <a class="sidebar_card_btn" href="<?php echo $button_link['url']; ?>"><?php the_field('button_text'); ?></a>
               </aside>
               <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Top new popular podcasts</h3>
                   <?php //echo get_field('popular_podcast'); exit('fgshsrhr');?>
                  <?php echo do_shortcode('[recent_podcast]'); ?>
               </aside>
               <aside class="single_sidebar_social_icon">
                  <h3 class="widget_title">Follow us</h3>
                  <div class="social_icon">
                    <a href="https://www.facebook.com/WaveReview" target="_blank"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/img/facebook.png" alt="facebook"></a>
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
