<?php
   /* Template Name: Estimate page */
   get_header(); ?>
   <?php
   $estimate_project_title = get_field('estimate_project_title');
   $google_privacy_policty = get_field('google_privacy_policty');
   $we_know_time = get_field('we_know_time');
   $get_back_to_you = get_field('get_back_to_you');
   $we_will_prepare_an_estimate = get_field('we_will_prepare_an_estimate');
   $we_will_perform_a_free_code = get_field('we_will_perform_a_free_code');
   $as_trusted_by_title = get_field('as_trusted_by_title');
  
   
   ?>
   <section class="revised-estimation">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12 col-lg-5 form-section">
                  <div class="form-content">
                     <h1 class="estimate_project"><?php echo $estimate_project_title; ?></h1>
                     <?php echo do_shortcode('[contact-form-7 id="6846" html_id="estimate-project" title="Estimate"]'); ?>
                     <?php /*<a href="<?php echo home_url(); ?>"><input type="submit" class="btn btn-theme" value="Back"></a> */ ?>
                  </div>
                  <p class="small-text"><?php echo $google_privacy_policty; ?></p>
               </div>
               <div class="col-md-12 col-lg-7 detail-section">
                  <div class="list-wrapper">
                     <div class="text-box">
                        <div class="text-content">
                           <p><?php echo $we_know_time; ?> </p>
                        </div>
                     </div>
                     <div class="text-box">
                        <div class="text-content">
                           <p><span class="fw-bold"><?php echo $get_back_to_you; ?></span></p>
                        </div>
                     </div>
                     <div class="text-box">
                        <div class="text-content">
                           <p><?php echo $we_will_prepare_an_estimate; ?></p>
                        </div>
                     </div>
                     <div class="text-box">
                        <div class="text-content">
                           <p><?php echo $we_will_perform_a_free_code; ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="trusted-logo">
                     <h6><?php echo $as_trusted_by_title; ?></h6>
                     <div class="logo-group">
                        <div class="row logo-list">
                            <?php if (have_rows('partner_logo_image')):
                                 while (have_rows('partner_logo_image')): the_row();
                                    $partners_logo = get_sub_field('partners_logo');
                                    //echo "<pre>"; print_r($partners_logo); exit;
                                    ?>
                                    <div><img src="<?php echo $partners_logo['url']; ?>" alt="<?php echo $partners_logo['title']; ?>" class="img-fluid"></div>
                                <?php
                                endwhile;
                             endif;
                              ?>
                        </div>
                        <div class="row logo-list">
                           <?php if (have_rows('partner_logo_image_1')):
                                 while (have_rows('partner_logo_image_1')): the_row();
                                    $partners_logo1 = get_sub_field('partners_logo_1');
                                    ?>
                                    <div><img src="<?php echo $partners_logo1['url']; ?>" alt="<?php echo $partners_logo1['title']; ?>" class="img-fluid"></div>
                                <?php
                                endwhile;
                             endif;
                          ?>
                        </div>
                        <div class="row logo-list">
                           <?php if (have_rows('partner_logo_image_2')):
                                 while (have_rows('partner_logo_image_2')): the_row();
                                    $partners_logo2 = get_sub_field('partners_logo_2');
                                    ?>
                                    <div><img src="<?php echo $partners_logo2['url']; ?>" alt="<?php echo $partners_logo2['title']; ?>" class="img-fluid"></div>
                                <?php
                                endwhile;
                             endif;
                          ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
<div class="contact_us_template">
    <?php get_footer(); ?>
</div>
