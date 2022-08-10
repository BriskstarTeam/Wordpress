<?php
get_header(); ?>

<?php
    /* Start the Loop */
   while ( have_posts() ) :
   the_post();
   $post = $GLOBALS['post'];
   $image_testimonial = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full', false  );
  $thumb_url = $image_testimonial[0];
?>
<section class="podcast_details_page">
  <div class="container">
     <div class="podcast_details__row">
        <div class="w-col-8 varical__line">
           <article class="podcast_details">
              <div class="podcast_details_fuche_img">
                 <div class="podcast_details_img">
                    <img class="img-fluid"src="<?php echo $thumb_url; ?>"alt="<?php echo get_the_author(); ?>">
                 </div>
                 <div class="podcast_details__content">
                    <h1><?php echo get_the_title(); ?></h1>
                 </div>
                 <div class="article___text">
                    <p class="author__p"> By <a class="author__name"href="#"><?php echo get_the_author(); ?></a>
                       <span><?php echo get_the_date( get_option('date_format') ); ?></span></p>
                    <?php echo do_shortcode('[mashshare]'); ?>
                    <p class="mobile__spacing"><?php echo get_the_content(); ?></p>
                 </div>
              </div>
           </article>
           <article class="iframe">
              <?php echo get_field('iframe_for_audio'); ?>
           </article>
           <article class="listen_on">
              <ul id="clients-list"class="clearfix">
                 <li>
                    <h4>Listen on</h4>
                 </li>
                 <?php while ( have_rows('icon_list') ) : the_row(); ?>
                   <?php $icon_link = get_sub_field('icon_link');  ?>
                 <li ><a href="<?php echo $icon_link['url']; ?>" target="_blank" class="<?php echo the_sub_field('icon_image'); ?>"> </a></li>
                 <?php endwhile; ?>
              </ul>
           </article>
        </div>
        <div class="w-col-4">
           <div class="podcast_blog_right_sidebar">
              <aside class="single_sidebar_card_widget podcast_sidebar_widget">
                  <h4>Subscribe</h4>
                  <p class="podcast_semititle"> Want to know how proven founders start their Software as a Solution and take it from $0 - $30,000 monthly recurring revenue?</p>
                  <p class="podcast_semititle2">Sign up to receive updates from our podcast about the best tips, tricks, and hacks from proven founders that have already done it.</p>
                  <?php //echo do_shortcode('[newsletter_form]'); ?>
                  <?php /*<form class="formclsss" method="post" action="<? echo get_home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                     <input type="hidden" name="nlang" value="">
                     <div class="position-relative form-group"><label class="form-group has-float-label "><input type="text" name="nn" placeholder="enter your first name" class="form-control" value="" required><span>Name</span></label></div>
                     <div class="position-relative form-group"><label class="form-group has-float-label "><input type="text" placeholder="enter your first name" name="ne" class="form-control" value="" required><span>Email</span></label></div>
                     <button class="podcast_sidebar_btn" type="submit"><span>sign up</span></button>
                  </form> */ ?>
                  <span><?php echo do_shortcode('[contact-form-7 id="6848" title="Subscription"]'); ?></span>
              </aside>
           </div>
        </div>
     </div>
  </div>
  <div class="shape_pod"></div>
</section>
<section class="podcast_details_page_section2 ">
  <div class="container">
     <div class="podcast_details__row">
        <div class="w-col-8 varical__line">
           <article class="podcast_details glimpse">
              <h3>Here’s a glimpse of what you’ll learn:</h3>
              <ul >
                 <?php while ( have_rows('what_u_learn') ) : the_row(); ?>
                 <li class="glimpse_item"><?php echo the_sub_field('learn_pont'); ?></li>
                 <?php endwhile; ?>
              </ul>
           </article>
           <article class="podcast_episode">
              <h3>In this episode…</h3>
              <div class="episode">
                <?php echo get_field('episode_description'); ?>
              </div>
              </ul>
           </article>
           <article class="podcast_details">
              <h3>Resources Mentioned in this episode</h3>
              <ul class="resources">
                <?php while ( have_rows('resources_mentioned_in_the_episode') ) : the_row(); ?>
                  <?php $link = get_sub_field('resources_mentioned_link'); ?>
                 <li class="glimpse_item"><a href="<?php echo $link['url']; ?>" target="_blank"><?php echo the_sub_field('resources_mentioned_point'); ?></a></li>
                <?php endwhile; ?>
                 </ul>
           </article>
           <article class="podcast_episode sponsor">
              <h3>Sponsor for this episode...</h3>
              <div class="episode">
                 <?php echo get_field('sponsor_for_the_episode') ?>
              </div>
              </ul>
           </article>
        </div>
        <div class="w-col-4">
           <div class="podcast_blog_right_sidebar">
              <aside class="single_sidebar_widget popular_post_widget">
                 <h3 class="widget_title">Top new popular podcast</h3>
                 <?php echo do_shortcode('[recent_podcast]'); ?>
              </aside>
           </div>
        </div>
     </div>
  </div>

     <div class="shape3"></div>
     <div class="shape4"></div>
</section>
<?php
endwhile;
?>
<script>
var mpid = document.getElementById("myMp3");

function setCurMpTime() { 
    
  mpid.currentTime=3.05;
} 
</script> 
<?php
get_footer(); ?>
