<?php
   /* Template Name: Sales page */
   get_header('sales');
   ?>

 <?php
 $hero_small_text = get_field('hero_small_text');
 $hero_title = get_field('hero_title');
 $hero_tagline = get_field('hero_tagline');
 $hero_banner_image = get_field('hero_banner_image');
 $get_started_button = get_field('get_started_button');
 $get_started_link = get_field('get_started_link');
 ?>  
<div class="hero-section">
   <div class="hero-wrapper">
      <div class="hero-container">
         <div class="hero-content seo-hero">
            <h5 class="small-text"><?php echo $hero_small_text; ?></h5>
            <h1 class="hero-h1 pb-10"><?php echo $hero_title; ?></h1>
            <p class="p20 pb-10"><?php echo $hero_tagline; ?> </p>
            <a href="<?php echo $get_started_link; ?>" target="_blank" class="btn w-button"><?php echo $get_started_button; ?></a>
         </div>
         <div class="htext-center"><img src="<?php echo $hero_banner_image['url']; ?>" alt="<?php echo $hero_banner_image['name']; ?>" class="img-hero large">
         </div>
      </div>
   </div>
</div>
<?php
   $another_client_image = get_field('another_client_image');
   $another_client_description = get_field('another_client_description');
?>  
<div class="section lightblue">
   <div class="container">
      <div class="wrapper rev">
         <div class="content _50 ">
            <div class="img-bgshape graph-vector">
               <img src="<?php echo $another_client_image['url']; ?>" alt="sl-machine-learning">
            </div>
         </div>
         <div class="content _50">
            <p class="seo-text-content"><?php echo $another_client_description; ?></p>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="line-wrapper r pt-0 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line"></div>
   </div>
<?php
   $boost_my_ranking_title = get_field('boost_my_ranking_title');
   $boost_my_ranking_tagline = get_field('boost_my_ranking_tagline');
   $ranking_image = get_field('ranking_image');
?> 
   <div class="container">
      <div class="wrapper rev">
         <div class="content _50">
            <h2 class="title-content mb-0 pb-10"><?php echo $boost_my_ranking_title; ?> </h2>
            <p class="mb-0 pb-10">(<?php echo $boost_my_ranking_tagline; ?>)</p>
            <?php if (have_rows('boost_my_ranking_features')):
                 while (have_rows('boost_my_ranking_features')): the_row();
                    $tickbox = get_sub_field('tickbox');
                    $ranking_features = get_sub_field('ranking_features');
                    ?>
                        <div class="list-item mb-10">
                           <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark" width="20px" height="20px"></p>
                           <div><?php echo $ranking_features; ?></div>
                        </div>
                    <?php
                 endwhile;
             endif;
           ?>
           <?php if (have_rows('ranking_text')):
                 while (have_rows('ranking_text')): the_row();
                    $ranking_title = get_sub_field('ranking_title');
                    ?>
                        <p class="mb-0 pb-10"><?php echo $ranking_title; ?></p>
                    <?php
                 endwhile;
             endif;
           ?>
         </div>
         <div class="content _50">
            <div class="img-bgshape graph-vector">
               <img src="<?php echo $ranking_image['url']; ?>" alt="ul-machine-learning">
            </div>
         </div>
      </div>
   </div>
</div>
<?php
   $copywriter_writing_image = get_field('copywriter_writing_image');
   $copywriter_writing_title = get_field('copywriter_writing_title');
?> 
<div class="container">
   <div class="wrapper">
      <div class="content _50">
         <div class="img-bgshape graph-vector">
            <img src="<?php echo $copywriter_writing_image['url']; ?>" alt="ul-machine-learning">
         </div>
      </div>

      <div class="content _50">
         <h2 class="title-content mb-0 pb-10"><?php echo $copywriter_writing_title; ?></h2>
         <p class="mb-0 pb-10">You get: </p>
         <?php if (have_rows('copywriter_writing_features')):
              while (have_rows('copywriter_writing_features')): the_row();
                 $tickbox = get_sub_field('tickbox');
                 $copywriter_features = get_sub_field('copywriter_features');
                 ?>
                     <div class="list-item mb-10">
                        <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark" width="20px" height="20px"></p>
                        <div><?php echo $copywriter_features; ?></div>
                     </div>
                 <?php
              endwhile;
          endif;
        ?>
      </div>
   </div>
</div>
<div class="container">
   <div class="line-wrapper r pt-0 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line"></div>
</div>
<?php
   $copywriting_title = get_field('copywriting_title');
   $copywriting_tagline = get_field('copywriting_tagline');
?> 
<div class="container">
   <div class="content center pb-0 pt-0 seo-title-box">
      <h2 class="title-content"><?php echo $copywriting_title; ?></h2>
      <p class="mt-5"><?php echo $copywriting_tagline; ?></p>
   </div>
   <div class="wrapper seo-detail bussiness-detail pt-0">
      <div class="content _50 pt-0 pb-10">
         <?php if (have_rows('copywriting_property')):
              while (have_rows('copywriting_property')): the_row();
                 $title = get_sub_field('title');
                 $description = get_sub_field('copywriting_description');
                 ?>
                     <p> <span><?php echo $title; ?></span>  <?php echo $description; ?></p>
                 <?php
              endwhile;
          endif;
        ?>
      </div>
      <div class="content _50 pt-0 pb-10">
         <?php if (have_rows('copywriting_property_2')):
              while (have_rows('copywriting_property_2')): the_row();
                 $title1 = get_sub_field('title1');
                 $description1 = get_sub_field('copywriting_description1');
                 ?>
                     <p> <span><?php echo $title1; ?></span>  <?php echo $description1; ?></p>
                 <?php
              endwhile;
          endif;
        ?>
      </div>
   </div>
</div>
<div class="section wave2 pb-10">
   <div class="line-wrapper c pb-0 pt-20"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line"></div>
<?php
   $organic_traffic_title = get_field('organic_traffic_title');
   $online_interactions = get_field('online_interactions');
   $boost_my_ranking_and_deliver = get_field('boost_my_ranking_and_deliver');
   $slogen = get_field('slogen');
?> 
   <div class="container">
      <div class="content center pb-0 pt-0 seo-title-box">
         <h2 class="title-content"><?php echo $organic_traffic_title; ?></h2>
         <p class="mt-5"><?php echo $online_interactions; ?> </p>
      </div>
      <div class="wrapper bussiness-detail">
         <div class="content _50 pt-0 pb-10">
            <?php if (have_rows('organic_traffic_features')):
                 while (have_rows('organic_traffic_features')): the_row();
                    $tickbox = get_sub_field('tickbox');
                    $traffic_description = get_sub_field('organic_traffic_description');
                    ?>
                        <div class="list-item mb-10">
                           <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark" width="20px" height="20px"></p>
                           <div><?php echo $traffic_description; ?></div>
                        </div>
                    <?php
                 endwhile;
             endif;
            ?>
         </div>
         <div class="content _50 pt-0 pb-10">
            <?php if (have_rows('organic_traffic_features_2')):
                 while (have_rows('organic_traffic_features_2')): the_row();
                    $tickbox1 = get_sub_field('tickbox1');
                    $traffic_description1 = get_sub_field('organic_traffic_description1');
                    ?>
                        <div class="list-item mb-10">
                           <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox1['url']; ?>" alt="checkmark" width="20px" height="20px"></p>
                           <div><?php echo $traffic_description1; ?></div>
                        </div>
                    <?php
                 endwhile;
             endif;
            ?>
         </div>
      </div>
      <div class="highlight-text pt-0">
         <h4><?php echo $boost_my_ranking_and_deliver; ?></h4>
         <p><?php echo $slogen; ?></p>
      </div>
      <div class="line-wrapper c pb-0 pt-20">
         <img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line">
      </div>
   <?php
      $maintenance_packages_title = get_field('maintenance_packages_title');
   ?> 
      <div class="content center pb-0 pt-0 seo-title-box">
         <h2 class="title-content"><?php echo $maintenance_packages_title; ?></h2>
      </div>
   </div>
   <section class="pricing-table">
      <div class="container">
         <div class="row wrapper">
            <!-- Price -->
            <?php 
               if (have_rows('maintenance_packages_plans')):
                   $i = 1;
                 while (have_rows('maintenance_packages_plans')): the_row(); 
                     if($i == 2){
                        $class = 'dark-blue-bg';
                        $offer = '<h6>CHF<span> 500</span> off</h6>';
                     }else{
                        $class = '';
                        $offer = '';
                     }
                  ?>
               <div class="col-md-4">
                  <div class="pricing-head <?php echo $class; ?>">
                     <h4><?php echo the_sub_field('plan_type'); ?></h4>
                     <?php echo $offer; ?>
                     <span class="curency">CHF</span> <span class="amount"><?php echo the_sub_field('plan_price'); ?></span> <span class="month">/ per month</span>
                  </div>
                  <div class="price-in">
                     <?php if( have_rows('plean_detail') ): ?>
                        <ul class="text-center">
                           <?php while( have_rows('plean_detail') ): the_row();
                              $detail = get_sub_field('detail');
                           ?>
                           <li><?php echo $detail; ?> </li>
                           <?php endwhile; ?>
                        </ul>
                     <?php endif; ?>
                     <div class="price-note">
                        <div class="price-blue-note">
                           <p><?php echo the_sub_field('bonus'); ?></p>
                           <span><?php echo the_sub_field('duration'); ?></span>
                        </div>
                        
                        <a class="btn" href="<?php echo the_sub_field('purchase_url'); ?>"><?php echo the_sub_field('purchase_button'); ?></a>
                     </div>
                  </div>
               </div>
               <?php 
                  $i++;
                  endwhile;
               endif; ?>
         </div>
         </div>
      </div>
</section>
</div>

<?php get_footer(); ?>
