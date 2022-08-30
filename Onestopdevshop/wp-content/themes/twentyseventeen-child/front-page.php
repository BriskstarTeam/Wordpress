<?php
   /* Template Name: Home page */
   get_header(); ?>
   <div class="hero-section">
    <div class="hero-wrapper">
   <div class="hero-container">
     <div class="hero-content">
       <h1 class="hero-h1"><?php utf8_encode(the_field('banner_title')); ?></h1>
       <p class="hero-p"><?php the_field('banner_decription'); ?></p>
       <?php $btn_link_banner = get_field('banner_button_link'); ?>
       <a href="<?php echo $btn_link_banner['url']; ?>" class="btn w-button"><?php the_field('banner_button_text'); ?></a></div>
       <?php $image = get_field('banner_image'); ?>
     <div class="hero-content"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt']; ?>" class="img-hero">
     </div>
   </div>
   </div>
   </div>
<div class="section lightblue custom_p_m">
  <div class="container">
    <div class="content">
      <h4 class="astrustedby large1">As trusted by</h4>
      <div class="wrapper wrap white">
        <?php  while ( have_rows('brand_logo') ) : the_row(); ?>
        <?php $logo_image = get_sub_field('logo_image'); ?>
        <img src="<?php echo $logo_image['url']; ?>" sizes="(max-width: 479px) 100px, 150px" alt="<?php echo $logo_image['alt']; ?>" class="logo-trusted-by <?php echo get_sub_field('image_size'); ?>">
        <?php endwhile; ?>
      </div>
  </div>
</div>
<div class="section lightblue">
  <div class="container">
    <div class="line-wrapper dashed-line"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line"></div>
    <div class="wrapper rev">
      <?php $second_section_image = get_field('h_second_section_image'); ?>
      <div class="content _50"><img src="<?php echo $second_section_image['url']; ?>" alt="section image" class="img-bgshape"></div>
      <div class="content _50">
        <h2 class="title-content"><?php the_field('h_second_section_title'); ?></h2>
        <p class="p20"><?php the_field('h_second_section_description'); ?></p>
        <?php $sections_testimonial_image = get_field('h_section-2_testimonial_image'); ?>
        <div class="testimonial-wrapper"><img src="<?php echo $sections_testimonial_image['url']; ?>" alt="testimonial" class="img-testimonial">
          <div class="testimonial-text-wrapper">
            <p class="testimonial-text">&quot;<?php the_field('h_section-2_testimonial_quot'); ?>&quot;</p>
            <div class="testimonial-name"><?php the_field('h_section-2_testimonial_name'); ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section lightblue">
  <div class="container">
    <div class="line-wrapper c"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line small"></div>
    <div class="wrapper aline_flex_start_custom">
      <div class="content _50">
        <h2 class="title-content"><?php the_field('h_section-3_title'); ?></h2>

        <div class="example front-page" data-mrc data-buttonmore="More" data-buttonless="Read Less">
           <?php the_field('h_section-3_description'); ?>
        </div>
        <?php $third_section_testimonial_image = get_field('h_section-3_testimonial_image'); ?>
        <div class="testimonial-wrapper"><img src="<?php echo $third_section_testimonial_image['url']; ?>" alt="testimonial_image" class="img-testimonial">
          <div class="testimonial-text-wrapper">
            <div class="example" data-mrc data-buttonmore="More" data-buttonless="Less">
               <div class="testimonial-name"><?php the_field('h_section-3_testimonial_name'); ?></div>
            <p class="testimonial-text">&quot;<?php the_field('h_section-3_testimonial_qout'); ?> &quot;</p>
          </div>

          </div>
        </div>
      </div>
      <?php $section_3_image = get_field('h_section-3_image'); ?>
      <div class="content _50 podcast-profile"><img src="<?php echo $section_3_image['url']; ?>" alt="<?php echo $section_3_image['name']; ?>" class="img-bgshape rounded"></div>
    </div>
  </div>
</div>
<div class="section lightblue">
  <div class="container">
    <div class="line-wrapper dashed-line"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line"></div>
    <div class="wrapper rev aline_flex_start_custom">
      <?php $section_4_image = get_field('h_section-4_image'); ?>
      <div class="content _50"><img src="<?php echo $section_4_image['url']; ?>" alt="<?php echo $section_4_image['name'] ?>"></div>
      <div class="content _50">
        <div class="pre-title"><?php the_field('h_section-4_pre_title'); ?></div>
        <h2 class="title-content"><?php the_field('h_section-4_title'); ?></h2>

        <div class="example" data-mrc data-buttonmore="Read the full story" data-buttonless="Read less story">
           <?php the_field('h_section-4_description'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section lightblue paddingbot">
  <div class="container">
    <div class="line-wrapper c"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line small"></div>
    <div class="wrapper rev">
      <?php $four_section_image = get_field('h_section-5_image'); ?>
      <div class="content _50 img-bgshape"><img src="<?php echo $four_section_image['url']; ?>" alt="<?php echo $four_section_image['name']; ?>"></div>
      <div class="content _50">
        <div class="pre-title"><?php the_field('h_section-5_pre_title'); ?></div>
        <h2 class="title-content"><?php the_field('h_section-5_title'); ?></h2>
        <?php the_field('h_section-5_description'); ?>
      </div>
    </div>
  </div>
</div>
<div class="section lightblue">
  <div class="container">
    <div class="line-wrapper dashed-line"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line"></div>
    <div class="wrapper rev">
      <?php $six_section_image = get_field('h_section-6_image'); ?>
      <div class="content _50"><img src="<?php echo $six_section_image['url']; ?>" alt="image"></div>
      <div class="content _50">
        <div class="pre-title"><?php the_field('h_section-6_pre_title'); ?></div>
        <h2 class="title-content"><?php the_field('h_section-6_title'); ?></h2>
        <?php the_field('h_section-6_description'); ?>
        <div class="w-embed w-script">
          <!--  Calendly link widget begin  -->
          <?php $section_six_link = get_field('h_section-6_button_link'); ?>
          
          <!--  Calendly link widget end  -->
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section wave">
  <div class="container">
    <div class="content">
        <a class="btn w-button" href="<?php echo $section_six_link['url']; ?>" target="_blank"><?php the_field('h_section-6_button_text'); ?></a>
      <!--<h2 class="title-section margin-bot pre-title"><a class="p20" href="<?php //echo $section_six_link['url']; ?>" target="_blank"><?php //the_field('h_section-6_button_text'); ?></a></h2>-->
      
      <div class="wrapper-logos">
        <?php while ( have_rows('h_section-7_logo') ) : the_row(); ?>
        <div class="logo-item-wrapper">
          <?php $image = get_sub_field('logo_image') ?>
          <img src="<?php echo $image['url']; ?>"  sizes="(max-width: 479px) 31vw, 66.8125px" alt="logo" class="logo-img tiny">
        </div>
        <?php endwhile; ?>
      </div>
    </div>
    <div class="wrapper top">
        <?php the_field('h_section-7_second_description'); ?>
      </div>
    </div>
  </div>
</div>
<div class="section np">
  <div class="container">
    <div class="line-wrapper c"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line small"></div>
    <div class="content">
      <div class="pre-title"><?php the_field('h_section-8_pre_title'); ?></div>
      <h2 class="title-section"><?php the_field('h_section-8_title'); ?></h2>
    </div>
    <div class="content">
      <p class="p20"><?php the_field('h_section-8_sub_title'); ?></p>
    </div>
    <div class="wrapper top">
      <?php   while ( have_rows('customer_type') ) : the_row(); ?>
        <?php $image = get_sub_field('icon_image'); ?>
      <div class="content _50"><img src="<?php echo $image['url']; ?>" alt="icon-small" class="icon-small">
        <h3 class="h3"><?php the_sub_field('title'); ?></h3>
        <p class="p20"><?php the_sub_field('description'); ?></p>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>
<div class="section np more-button">
  <div class="container">
    <div class="line-wrapper dashed-line"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line"></div>
    <div class="wrapper rev">
      <?php $nine_section_image = get_field('h__section-9_image'); ?>
      <div class="content _50 img-bgshape"><img src="<?php echo $nine_section_image['url']; ?>" alt="<?php echo $nine_section_image['name']; ?>"></div>
      <div class="content _50">
        <div class="pre-title"><?php the_field('h_section-9_pre-title'); ?></div>
        <h2 class="title-content"><?php the_field('h_section-9_title'); ?></h2>
        <?php the_field('h_section-9_description'); ?>
        <?php $section_9_testimonial_image = get_field('h_section-9_testimonial_image'); ?>
        <div class="testimonial-wrapper"><img src="<?php echo $section_9_testimonial_image['url']; ?>" alt="<?php echo $section_9_testimonial_image['name']; ?>" class="img-testimonial">
          <div class="testimonial-text-wrapper">
            <div class="example white_color" data-mrc data-buttonmore="More" data-buttonless="Less">
              <div class="testimonial-name"><?php the_field('h_section-9_testimonial_name'); ?></div>
            <p class="testimonial-text">&quot; <?php the_field('h_section-9_testimonial_quot'); ?> &quot;</p>
          </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section wave2">
  <div class="container">
    <div class="line-wrapper c"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line small"></div>
    <?php $section_9_icon = get_field('h_section-10_icon'); ?>
    <div class="content"><img src="<?php echo $section_9_icon['url']; ?>" alt="<?php echo $section_9_icon['name']; ?>" class="icon-large">

    </div>
    <div class="content">
      <h2 class="title-section"><?php the_field('h_section-10_title'); ?></h2>
      <?php the_field('h_section-10_description'); ?>
      <div class="w-embed w-script">
        <!--  Calendly link widget begin  -->
        <?php $section_10_btn_link = get_field('h_section-10_button_link'); ?>
        <a class="btn w-button" href="<?php echo $section_10_btn_link['url']; ?>" target="_blank"><?php the_field('h_section-10_button_text'); ?></a>
        <!--  Calendly link widget end  -->
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>
