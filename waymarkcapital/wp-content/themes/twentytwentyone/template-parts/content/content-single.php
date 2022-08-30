<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<?php 
$caltegory = get_the_category();


//echo "<pre>"; print_r(); exit;
?>
<section class="innerpage-banner-area">
    <img src="<?php echo get_theme_file_uri('/assets/images/innerpage-banner.jpg'); ?>" class="img-fluid" />
    <div class="innerpage-banner-content">
       <h2>Pre IPO Insights</h2>
    </div>
 </section>
 <section class="blog blog-details">
    <div class="container-fluid">
       <div class="row">
          <div class="col-md-9">
             <div class="blog-mainbox">
                <div class="row">
                   <div class="col-sm-12">
                      <div class="blog-box">
                         <div class="blog-imgbox">
                            <?php twenty_twenty_one_post_thumbnail(); ?>
                            <h4 class="blog-Category"><?php echo $caltegory[0]->name; ?></h4>
                         </div>
                         <div class="blog-contentbox">
                            <span class="blog-date"><?php echo date('j F Y', strtotime(get_the_date())); ?></span>
                            <?php the_title( '<h6>', '</h6>' ); ?>
                            <?php
                        		the_content();
                        		wp_link_pages(
                        			array(
                        				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
                        				'after'    => '</nav>',
                        				/* translators: %: Page number. */
                        				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
                        			)
                        		);
                        		?>
                         </div>
                         <div class="blog-share">
                             <span>Share:</span>
                            <?php echo do_shortcode("[Sassy_Social_Share]"); ?>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-3">
             <div class="position-relative blog-search">
                <aside class="single_sidebar_widget search_widget">
                     <?php get_search_form(); ?>
                  </aside>
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
    <?php if ( ! is_singular( 'attachment' ) ) : ?>
		<?php get_template_part( 'template-parts/post/author-bio' ); ?>
	<?php endif; ?>
 </section>

	

<!-- #post-<?php the_ID(); ?> -->

