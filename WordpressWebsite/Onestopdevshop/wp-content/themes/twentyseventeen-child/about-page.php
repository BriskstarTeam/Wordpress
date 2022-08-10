<?php
   /* Template Name: about page */
   get_header(); ?>
   <div class="hero-section">
    <div class="hero-wrapper">
   <div class="hero-container">
     <div class="hero-content">
       <h1 class="hero-h1"><?php the_field('banner_title'); ?></h1>
       <p class="hero-p"><?php the_field('banner_decription'); ?></p>
       <?php $btn_link_banner = get_field('banner_button_link'); ?>
       <a href="<?php echo $btn_link_banner['url']; ?>" target="_blank" class="btn w-button"><?php the_field('banner_button_text'); ?></a></div>
       <?php $image = get_field('banner_image'); ?>
     <div class="hero-content"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-hero">
     </div>
   </div>
   </div>
   </div>
<div class="section lightblue">
 <div class="container">
   <?php $section_1_testimonial_image = get_field('a_section-1_testimonial_image'); ?>
   <div class="testimonial-wrapper nomargin"><img src="<?php echo $section_1_testimonial_image['url']; ?>" alt="<?php echo $section_1_testimonial_image['name']; ?>" class="img-testimonial">
     <div class="testimonial-text-wrapper">
       <p class="testimonial-text">&quot;<?php the_field('a_section-1_testimonial_quot'); ?>&quot;</p>
       <div class="testimonial-name"><?php the_field('a_section-1_testimonial_name'); ?></div>
     </div>
   </div>
 </div>
</div>
<div class="section lightblue">
 <div class="container">
   <div class="wrapper toppadding">
     <div class="content _50">
       <h2 class="title-content"><?php the_field('a_section-2_title'); ?></h2>
       <?php the_field('a_section-2_description'); ?>
     </div>
     <?php $section_2_image = get_field('a_section-2_image'); ?>
     <div class="content _50 v"><img src="<?php echo $section_2_image['url']; ?>"  sizes="(max-width: 479px) 87vw, (max-width: 767px) 75vw, (max-width: 991px) 81vw, 41vw" alt="testimonial"></div>
   </div>
 </div>
</div>
<div class="section lightblue">
 <div class="container">
   <div class="line-wrapper"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line"></div>
   <div class="wrapper rev top">
     <div class="content _33">
       <?php the_field('a_section-3_description_one'); ?>
     </div>
     <div class="content _33">
       <?php $section_3_image = get_field('a_section-3_image'); ?>
       <img src="<?php echo $section_3_image['url']; ?>" alt="<?php echo $section_3_image['name']; ?>" class="img-100"></div>
     <div class="content _33">
       <?php the_field('a_section-3_description_two'); ?>
     </div>
   </div>
 </div>
</div>
<div class="section lightblue paddingbot">
 <div class="container">
   <div class="line-wrapper c"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line small"></div>
   <div class="wrapper rev">
     <div class="content _50 img-bgshape padding">
       <?php $section_4_image = get_field('a_section-4_image'); ?>
       <img src="<?php echo $section_4_image['url']; ?>"  sizes="(max-width: 479px) 86vw, (max-width: 767px) 83vw, (max-width: 991px) 88vw, 45vw" alt="image"></div>
     <div class="content _50">
       <h2 class="title-content"><?php the_field('a_section-4_title'); ?></h2>
        <?php the_field('a_section-4_description'); ?>
     </div>
   </div>
 </div>
</div>
<div class="section lightblue">
 <div class="container">
   <div class="line-wrapper"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line"></div>
   <div class="wrapper rev">
     <div class="content _50 nopadding">
       <div class="img-bgshape">
         <div class="testimonial-wrapper nomargin">
           <div class="testimonial-text-wrapper center">
             <?php $section_5_testimonial = get_field('a_section-5_testimonial_image'); ?>
             <img src="<?php echo $section_5_testimonial['url']; ?>" alt="testimonial" class="img-testimonial top">

 <div class="example" data-mrc  data-buttonmore="Read full review" data-buttonless="Read Less">
             <p class="testimonial-text">&quot;<?php the_field('a_section-5_testimonial_quot'); ?>&quot;</p>
           </div>
            <div class="method-controls">
            </div>
           </div>
         </div>
       </div>
     </div>
     <div class="content _50">
       <h2 class="title-content"><?php the_field('a_section-5_title'); ?></h2>
       <?php the_field('a_section-4_description'); ?>
     </div>
   </div>
   <div class="wrapper rev">
     <div class="content _50">
       <?php the_field('a_section-6_description'); ?>
     </div>
     <div class="content _50 lp">
       <?php $section_6_image = get_field('a_section-6_image'); ?>
       <img src="<?php echo $section_6_image['url']; ?>" sizes="(max-width: 991px) 100vw, 62vw" alt="<?php echo $section_6_image['name']; ?>" class="rotate"></div>
   </div>
 </div>
</div>
<div class="section wave">
 <div class="container">
   <div class="wrapper top rev expand">
     <div class="content _50 h-a"><a href="<?php echo get_site_url(); ?>/podcasts/" target="_blank" class="wrapper-page-link w-inline-block">
       <img src="<?php echo get_theme_file_uri(); ?>/assets/images/big-break-logo-square-2020.png" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/big-break-logo-square-2020-p-500.png 500w, <?php echo get_theme_file_uri(); ?>/assets/images/big-break-logo-square-2020-p-800.png 800w, <?php echo get_theme_file_uri(); ?>/assets/images/big-break-logo-square-2020.png 926w" sizes="(max-width: 479px) 72vw, (max-width: 767px) 33vw, (max-width: 991px) 250px, 18vw" alt="big-break-logo-square" class="logo-bb-small"></a>
       <a href="<?php echo get_site_url(); ?>/portfolio/" target="_blank" class="wrapper-page-link text w-inline-block">
         <div>Our Tech<br>Stack</div>
       </a>
     </div>
     <div class="content _50 l">
       <h2 class="title-section margin-bot"><?php the_field('a_section_7_title'); ?></h2>
       <?php the_field('a_section-7_description'); ?>
     </div>
   </div>
 </div>
</div>
<div class="section np">
 <div class="container">
   <div class="line-wrapper c"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line small"></div>
   <div class="wrapper top">
     <div class="content _50 img-bgshape _1">
       <div class="wrapper-logos">
         <div class="logo-item-wrapper-2"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/royal-mail-uk-logo-9FC5DB9C13-seeklogo.com.png" alt="royal-mail-uk-logo" class="logo-img big"></div>
         <div class="logo-item-wrapper-2"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/1200px-Canadian_Olympic_Committee_logo.svg.png" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/1200px-Canadian_Olympic_Committee_logo.svg-p-500.png 500w, <?php echo get_theme_file_uri(); ?>/assets/images/1200px-Canadian_Olympic_Committee_logo.svg-p-800.png 800w, <?php echo get_theme_file_uri(); ?>/assets/images/1200px-Canadian_Olympic_Committee_logo.svg-p-1080.png 1080w, <?php echo get_theme_file_uri(); ?>/assets/images/1200px-Canadian_Olympic_Committee_logo.svg.png 1200w" sizes="40.015625px" alt="Canadian_Olympic_Committee" class="logo-img"></div>
         <div class="logo-item-wrapper-2 unnamed"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/unnamed.png" alt="unnamed" class="logo-img "></div>
         <div class="logo-item-wrapper-2 profit_drive"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/Profit_Drive_Logo.png" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/Profit_Drive_Logo-p-500.png 500w, <?php echo get_theme_file_uri(); ?>/assets/images/Profit_Drive_Logo-p-800.png 800w, <?php echo get_theme_file_uri(); ?>/assets/images/Profit_Drive_Logo.png 1370w" sizes="(max-width: 479px) 73vw, 220.375px" alt="Profit_Drive_Logo" class="logo-img"></div>
         <div class="logo-item-wrapper-2 rei-blackbook"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/rei-blackbook-logo-black-1.png" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/rei-blackbook-logo-black-1-p-500.png 500w, <?php echo get_theme_file_uri(); ?>/assets/images/rei-blackbook-logo-black-1-p-800.png 800w, <?php echo get_theme_file_uri(); ?>/assets/images/rei-blackbook-logo-black-1-p-1080.png 1080w, <?php echo get_theme_file_uri(); ?>/assets/images/rei-blackbook-logo-black-1-p-1600.png 1600w, <?php echo get_theme_file_uri(); ?>/assets/images/rei-blackbook-logo-black-1-p-2000.png 2000w, <?php echo get_theme_file_uri(); ?>/assets/images/rei-blackbook-logo-black-1-p-2600.png 2600w, <?php echo get_theme_file_uri(); ?>/assets/images/rei-blackbook-logo-black-1-p-3200.png 3200w, <?php echo get_theme_file_uri(); ?>/assets/images/rei-blackbook-logo-black-1.png 5304w" sizes="(max-width: 479px) 76vw, 226.828125px" alt="rei-blackbook-logo" class="logo-img"></div>
         <div class="logo-item-wrapper-2 london_stock"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/1200px-London_Stock_Exchange_Logo.svg.png" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/1200px-London_Stock_Exchange_Logo.svg-p-500.png 500w, <?php echo get_theme_file_uri(); ?>/assets/images/1200px-London_Stock_Exchange_Logo.svg-p-800.png 800w, <?php echo get_theme_file_uri(); ?>/assets/images/1200px-London_Stock_Exchange_Logo.svg-p-1080.png 1080w, <?php echo get_theme_file_uri(); ?>/assets/images/1200px-London_Stock_Exchange_Logo.svg.png 1200w" sizes="(max-width: 479px) 76vw, 236.828125px" alt="London_Stock_Exchange" class="logo-img"></div>
         <div class="logo-item-wrapper-2 juice_logo_grey"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/juice_logo_grey.png" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/juice_logo_grey-p-500.png 500w, <?php echo get_theme_file_uri(); ?>/assets/images/juice_logo_grey-p-800.png 800w, images/juice_logo_grey.png 1265w" sizes="(max-width: 479px) 78vw, 269.140625px" alt="juice_logo_grey" class="logo-img"></div>
         <div class="logo-item-wrapper-2 day_year"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/90-day-year-e1575419437962.png" alt="90-day-year" class="logo-img"></div>
         <div class="logo-item-wrapper-2 wavereview"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/wavereview.png" alt="wavereview" class="logo-img"></div>
         <div class="logo-item-wrapper-2 wave_client_logo"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/5abb96869a11b51e2e2e389143326456.png" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/5abb96869a11b51e2e2e389143326456-p-500.png 500w, images/5abb96869a11b51e2e2e389143326456.png 1200w" sizes="114.28125px" alt="5abb96869a11b51e2e2e389143326456" class="logo-img"></div>
         <div class="logo-item-wrapper-2 freckle_logo"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/freckle-logo.png" alt="freckle-logo" class="logo-img"></div>
       </div>
     </div>
     <div class="content _50">
        <?php the_field('a_section-8_description'); ?>
     </div>
   </div>
 </div>
</div>
<div class="section np">
 <div class="container"></div>
</div>
<div class="section dark-img">
 <div class="container">
   <div class="content center">
     <ul class="list w-list-unstyled">
       <?php the_field('a_section-9_description'); ?>
       <?php $section_9_link = get_field('a_section-9_button_link'); ?>
     </ul><a href="<?php $section_9_link['url']; ?>" target="_blank" class="btn large w-button"><?php the_field('a_section-9_button_text'); ?></a></div>
 </div>
</div>
<?php get_footer(); ?>
