<?php
get_header(); ?>
<section class="blgo_details_page ">
<div class="container">
<div class="podcast_details__row">
<div class="w-col-8 varical__line">
<article class="blgo_details">
<div class="podcast_details_fuche_img">
<div class="blog_details_img">
<?php
    /* Start the Loop */
   while ( have_posts() ) :
   the_post();
   $post = $GLOBALS['post'];
   $image_testimonial = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full', false  );
  $thumb_url = $image_testimonial[0];
?>
 <?php if(has_post_thumbnail()){ ?>
 <img class="img-fluid"src="<?php echo $thumb_url; ?>"alt="<?php echo get_the_title(); ?>">
<?php } else{ } ?>
 <div class="blog__pareghaph">
 <h1><?php echo get_the_title(); ?></h1>
 <p ><p><?php echo get_the_content(); ?></p>
</div>
</div>
</div>

</article>
</div>
<div class="w-col-4">
<div class="podcast_blog_right_sidebar">

<aside class="single_sidebar_widget popular_post_widget">
  <h3 class="widget_title">Top new popular posts</h3>
  <?php echo do_shortcode('[blog]'); ?>
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

get_footer(); ?>
