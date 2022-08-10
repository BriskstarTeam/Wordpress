<?php
get_header(); ?>

<?php
    /* Start the Loop */
   while ( have_posts() ) :
   the_post();
   $post = $GLOBALS['post'];
   $image_testimonial = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full', false  );
  $thumb_url = $image_testimonial[0];
  $iframe_for_audio = get_field('iframe_for_audio');
?>

<section class="podcast_details_page blog_post">
  <div class="container">
     <div class="podcast_details__row blog_details">
        <div class="w-col-12">
           <article class="">
              <div class="podcast_details_fuche_img">
                 <div class="podcast_details_img">
                    <img class="img-fluid"src="<?php echo $thumb_url; ?>"alt="<?php echo get_the_author(); ?>">
                 </div>
                 <div class="podcast_details__content single">
                    <h1><?php echo get_the_title(); ?></h1>
                 </div>
                 <div class="article___text">
                    <p class="author__p"> By <a class="author__name"href="#"><?php echo get_the_author(); ?></a>
                       <span><?php echo get_the_date( get_option('date_format') ); ?></span>
                    </p>
                    <p><?php echo do_shortcode('[mashshare]'); ?></p>
                    <?php if(@iframe_for_audio != "") { ?>
                    <p class="mobile__spacing"><?php echo get_the_content(); ?></p>
                    <?php }else{ ?>
                    <section class="podcast_details_page_section2 ">
                    	<div class="container">
                    		<div class="podcast_details__row">
                    			<div class="w-col-8 varical__line">
                                    <?php echo the_content(); ?>
                    			</div>
                    		</div>
                    	</div>
                        <div class="shape3"></div>
                        <div class="shape4"></div>
                    </section>
                    <?php } ?>
                 </div>
              </div>
           </article>
        </div>
        <?php /*<div class="w-col-4">
           <div class="podcast_blog_right_sidebar">
              <aside class="single_sidebar_card_widget podcast_sidebar_widget">
                  <h4>Subscribe</h4>
                  <p class="podcast_semititle">Want to know how proven founders start their Software as a Solution and take it from $0 - $30,000 monthly recurring revenue?</p>
                  <p class="podcast_semititle2">Sign up to receive our best tips,tricks and hacks from proven founders that have already done it.</p>
                  <?php //echo do_shortcode('[newsletter_form]'); ?>
                  <form class="formclsss" method="post" action="<? echo get_home_url(); ?>/?na=s" onsubmit="return newsletter_check(this)">
                     <input type="hidden" name="nlang" value="">
                     <div class="position-relative form-group"><label class="form-group has-float-label "><input type="text" name="nn" placeholder="enter your first name" class="form-control" value="" required><span>Name</span></label></div>
                     <div class="position-relative form-group"><label class="form-group has-float-label "><input type="text" placeholder="enter your first name" name="ne" class="form-control" value="" required><span>Email</span></label></div>
                     <button class="podcast_sidebar_btn" type="submit"><span>sign up</span></button>
                  </form>
              </aside>

              <aside class="single_sidebar_widget popular_post_widget">
                 <h3 class="widget_title">Top new popular posts</h3>
                 <?php echo do_shortcode('[blog]'); ?>
              </aside>

           </div>
        </div>*/ ?>
     </div>
  </div>
  <div class="shape_pod"></div>
</section>

<?php
endwhile;

get_footer(); ?>
