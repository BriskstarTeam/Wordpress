<?php
   /* Template Name: Contact page */
   
   get_header(); ?>
   
   <?php
       $estimate_project_title = get_field('estimate_project_title');
       $google_privacy_policty = get_field('google_privacy_policty');
       $contact_email = get_field('contact_email');
       $address = get_field('address');
       $book_a_call_with_us = get_field('book_a_call_with_us');
       $one_click_scheduling = get_field('one_click_scheduling');
       $book_a_call = get_field('book_a_call');
       $person_image = get_field('person_image');
       $person_name = get_field('person_name');
       $person_description = get_field('person_description');
       $description = get_field('description');
       $as_trusted_by_title = get_field('as_trusted_by_title');
      
   
   ?>
<section class="revised-estimation">
 <div class="container-fluid">
    <div class="row">
       <div class="col-md-12 col-lg-5 form-section">
          <div class="form-content">
             <h1 class="estimate_project"><?php echo $estimate_project_title; ?></h1>
             <?php echo do_shortcode('[contact-form-7 id="6847" html_id="contact-us" title="Contact Us"]'); ?>
          </div>
          <div class="address-group">
             <p><?php echo $contact_email; ?></span></p>
             <div class="address-box">
                <?php echo $address; ?>
             </div>
          </div>
          <p class="small-text"><?php echo $google_privacy_policty; ?></p>
       </div>
       <div class="col-md-12 col-lg-7 detail-section">
          <div class="book-call">
             <div>
                <h6 class="subtitle"><?php echo $book_a_call_with_us; ?></h6>
                <h5 class="m-0"><?php echo $one_click_scheduling; ?></h5>
             </div>
             <div>
                <button type="submit" class="btn btn-theme">
                    <a href="https://app.acuityscheduling.com/schedule.php?owner=16422817" target="_blank"><?php echo $book_a_call; ?></a>
                </button>
             </div>
          </div>
          <div class="detail-text">
             <div class="detail">
                <div class="mr-2"><img src="<?php echo $person_image['url']; ?>" alt="<?php echo $person_image['title']; ?>"></div>
                <div class="person-detail">
                   <h5><?php echo $person_name; ?></h5>
                   <p><?php echo $person_description; ?></p>
                </div>
             </div>
             <p class="m-0">"<?php echo $description; ?>"</p>
          </div>
          <div class="trusted-logo">
             <h6><?php echo $as_trusted_by_title; ?></h6>
             <div class="logo-group">
                <div class="row logo-list">
                   <?php if (have_rows('partner_logo_image')):
                         while (have_rows('partner_logo_image')): the_row();
                            $partners_logo = get_sub_field('partners_logo');
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
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2892.162019088256!2d172.64492291549408!3d-43.54066447912528!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d3189f611a54a51%3A0xf34fc53eb30cba27!2sOneStopDeckShop!5e0!3m2!1sen!2sus!4v1615269788898!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
   </div>
</div>
      
<style>
  .grecaptcha-badge { visibility: hidden; }
</style>
<div class="contact_us_template">
    <?php get_footer(); ?>
</div>
