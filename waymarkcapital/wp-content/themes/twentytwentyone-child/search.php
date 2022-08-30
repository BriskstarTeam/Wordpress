<?php
   get_header(); ?>
<section class="article__and__side__bar search_padding_top">
   <div class="shape1" ></div>
   <div class="container">
      <?php if ( have_posts() ) : ?>
  			<h2 class="page-title">
  			<?php
  			/* translators: Search query. */
  			printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' );
  			?>
      </h2>
  		<?php else : ?>
  			<h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
  		<?php endif; ?>
      <div class="article__row">
         <div class="w-col-8 varical__line">
            <div class="blog_left_sidebar">
              <?php
              if ( have_posts() ) :
                // Start the Loop.
                while ( have_posts() ) :
                  the_post();
                  $image_testimonial = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full', false  );
                 $thumb_url = $image_testimonial[0];
                   ?>
                  <article>
                     <div class="blog_style1">
                        <div class="article__podcasts__img"> <img class="img-fluid"src="<?php echo $thumb_url; ?>"alt="<?php echo get_the_author(); ?>"> </div>
                        <div class="article___title">
                           <div class="blog_text_inner">
                              <a href="<?php echo get_permalink($post->ID); ?>">
                                 <h4><?php echo get_the_title(); ?></h4>
                              </a>
                           </div>
                        </div>
                        <?php echo get_excerpt(220); ?>
                        <div class="article___text">
                           <p class="author__p"> By <a class="author__name"href="#"><?php echo get_the_author(); ?></a>
                              <span><?php echo get_the_date( get_option('date_format') ); ?></span>
                           </p>
                        </div>
                     </div>
                  </article>
                 <?php
               	endwhile;
              endif;
              ?>
            </div>
         </div>
         <div class="w-col-4">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget search_widget">
                 <?php get_search_form(); ?>
               </aside>
               <aside class="single_sidebar_card_widget">
                  <h4>Filium morte multavit si sine</h4>
                  <p class="semititle">Try Risk-Free Today</p>
                  <p>Epicurus in bonis sit sentiri haec ratio late patet in quo quaerimus, non. Hanc ego cum memoriter, tum etiam erga nos amice et ultimum bonorum.</p>
                  <a class="sidebar_card_btn" href="#">Apply To Be A Guest</a>
               </aside>
               <aside class="single_sidebar_widget popular_post_widget">
                  <h3 class="widget_title">Top new popular posts</h3>
                  <?php echo do_shortcode('[blog]'); ?>
               </aside>
               <aside class="single_sidebar_social_icon">
                  <h3 class="widget_title">Follow us</h3>
                  <div class="social_icon">
                     <a href="#"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/img/facebook.png"></a>
                     <a href="#"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/img/instagram.png"></a>
                     <a href="#"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/img/linkedin.png"></a>
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
