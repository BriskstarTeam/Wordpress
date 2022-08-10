<?php
   /* Template Name: Angular page */
   get_header();
   ?>

 <?php 
    $main_title = get_field('main_title');
    $title_tagline = get_field('title_tagline');
    $button_link = get_field('button_link');
    $estimate_button = get_field('estimate_button');
    $main_image = get_field('main_image');
?>
  <div class="hero-section">
    <div class="hero-wrapper">   
      <div class="hero-container">
       <div class="hero-content service-hero">
       <h1 class="hero-h1 pb-10"><?php echo $main_title; ?></h1>
       <?php echo $title_tagline; ?>
       <a href="<?php echo $button_link; ?>" target="_blank" class="btn w-button"><?php echo $estimate_button; ?></a></div>
        <div class="hero-content padding"><img src="<?php echo $main_image['url']; ?>" alt="<?php echo $main_image['name']; ?>" class="img-hero large">
     </div>
   </div>
    </div>
  </div>

 <?php 
    $business_title = get_field('business_title');
    $business_tagline = get_field('business_tagline');
?>
<div class="section lightblue">
<div class="container">
<div class="wrapper bussiness-detail">
   <div class="content">
      <h2 class="title-content mb-0 pb-10 pt-20"><?php echo $business_title; ?></h2>
      <p><?php echo $business_tagline; ?></p>
   </div>
</div>
</div>

<div class="container">
<div class="line-wrapper pt-0 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1.svg" class="img-line small"></div>
</div>
<?php 
    $trusted_by = get_field('trusted_by');
?>
<div class="container">
    <div class="content">
      <h4 class="astrustedby large1"><?php echo $trusted_by; ?></h4>
      <div class="wrapper wrap white">
            <?php if (have_rows('company_image')):
                 while (have_rows('company_image')): the_row();
                    $trusted_by_image = get_sub_field('trusted_by_image');
                    ?>
                        <img src="<?php echo $trusted_by_image['url']; ?>" sizes="(max-width: 479px) 100px, 150px" alt="<?php echo $trusted_by_image['name']; ?>" class="logo-trusted-by none">
                    <?php
                 endwhile;
             endif;
           ?>
     </div>
  </div>
</div>

<?php 
    $satisfaction_image = get_field('satisfaction_image');
    $end_to_end_satisfaction_title = get_field('end_to_end_satisfaction_title');
    $ideation_to_completion = get_field('ideation_to_completion');
?>
<div class="container">
    <div class="wrapper rev">
      <div class="content _50 ">
          <div class="img-bgshape graph-vector">
           <img src="<?php echo $satisfaction_image['url']; ?>" alt="<?php echo $satisfaction_image['name']; ?>">
          </div>
     </div>
      <div class="content _50">
        <h2 class="title-content mb-0"><?php echo $end_to_end_satisfaction_title; ?></h2>
        <h5><?php echo $ideation_to_completion; ?></h5>
        <?php if (have_rows('ideation_features')):
             while (have_rows('ideation_features')): the_row();
                $tickbox = get_sub_field('tickbox');
                $details = get_sub_field('details');
                ?>
                <div class="list-item mb-10">
                    <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                    <div><?php echo $details; ?></div>
                </div>
                <?php
             endwhile;
         endif;
       ?>
      </div>
    </div>
</div>


<div class="container">
<div class="line-wrapper r pt-0 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-2.svg" alt="Never be fearful of flaky freelancers again" class="img-line"></div>
</div>

<?php 
    $customizable_image = get_field('customizable_image');
    $customizable_software_solutions = get_field('customizable_software_solutions');
    $customizable_software_tagline = get_field('customizable_software_tagline');
?>
<div class="container">
    <div class="wrapper rev">
      <div class="content _50">
        <h2 class="title-content mb-0"><?php echo $customizable_software_solutions; ?></h2>
        <h5><?php echo $customizable_software_tagline; ?></h5>
         <?php if (have_rows('customizable')):
             while (have_rows('customizable')): the_row();
                $tickbox = get_sub_field('tickbox');
                $details = get_sub_field('customizable_details');
                ?>
                <div class="list-item mb-10">
                    <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                    <div><?php echo $details; ?></div>
                </div>
                <?php
             endwhile;
         endif;
       ?>
      </div>
      <div class="content _50 ">
          <div class="img-bgshape graph-vector">
           <img src="<?php echo $customizable_image['url']; ?>" alt="<?php echo $customizable_image['name']; ?>">
          </div>
     </div>
    </div>
</div>


<div class="container">
<div class="line-wrapper pt-0 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1.svg" class="img-line"></div>
</div>

<?php 
    $trusted_by_image = get_field('trusted_by_image');
    $trusted_by_customer_title = get_field('trusted_by_customer_title');
    $feel_secure_tagline = get_field('feel_secure_tagline');
?>
<div class="container">
    <div class="wrapper rev">
      <div class="content _50 ">
          <div class="img-bgshape graph-vector">
           <img src="<?php echo $trusted_by_image['url']; ?>" alt="<?php echo $trusted_by_image['name']; ?>">
          </div>
     </div>
      <div class="content _50">
        <h2 class="title-content mb-0"><?php echo $trusted_by_customer_title; ?></h2>
        <h5><?php echo $feel_secure_tagline; ?></h5>
        <?php if (have_rows('trusted_customer_details')):
             while (have_rows('trusted_customer_details')): the_row();
                $tickbox = get_sub_field('tickbox');
                $details = get_sub_field('details');
                ?>
                <div class="list-item mb-10">
                    <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                    <div><?php echo $details; ?></div>
                </div>
                <?php
             endwhile;
         endif;
       ?>
      </div>
    </div>
</div>
</div>

<?php
    $having_a_solid_plan = get_field('having_a_solid_plan');
    $what_does_it = get_field('what_does_it');
    $imagine_when_you_have = get_field('imagine_when_you_have');
    $you_can_have_confidence = get_field('you_can_have_confidence');
    $get_started_title = get_field('get_started_title');
    $call_link = get_field('call_link');
    $call_button = get_field('call_button');
?>
<div class="container  section-padding pb-0">
<div class="wrapper">
   <div class="content _50 pt-0 pb-10">
      <h2 class="title-content mb-0">Imagine…</h2>
      <p><?php echo $having_a_solid_plan; ?></p>
      <h5><?php echo $what_does_it; ?></h5>
      <?php if (have_rows('imagine_details')):
             while (have_rows('imagine_details')): the_row();
                $tickbox = get_sub_field('tickbox');
                $details = get_sub_field('details');
                ?>
                <div class="list-item mb-10">
                    <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                    <div><?php echo $details; ?></div>
                </div>
                <?php
             endwhile;
         endif;
       ?>
      
      <p><?php echo $imagine_when_you_have; ?></p>
   </div>
   <div class="content _50 pb-10">
      <?php echo $you_can_have_confidence; ?>
      <?php if (have_rows('your_idea')):
             while (have_rows('your_idea')): the_row();
                $tickbox = get_sub_field('tickbox');
                $details = get_sub_field('details');
                ?>
                <div class="list-item mb-10">
                    <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                    <div><?php echo $details; ?></div>
                </div>
                <?php
             endwhile;
         endif;
       ?>
   </div>
</div>

<div class="highlight-text pt-0 ">
     <h4><?php echo $get_started_title; ?> </h4>
     <a href="<?php echo $call_link; ?>" target="_blank" class="btn w-button"><?php echo $call_button; ?></a>
    </div>
</div>

<?php
    $testimonial_description = get_field('testimonial_description');
    $testimonial_image = get_field('testimonial_image');
    $testimonial_name = get_field('testimonial_name');
    $testimonial_tagline = get_field('testimonial_tagline');
    $estimate_project_button_link = get_field('estimate_project_button_link');
    $estimate_project_button = get_field('estimate_project_button');
?>

<div class="section wave2 pb-10">
  <div class="container kickstart">
        <div class="line-wrapper c pt-20 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line small"></div>
        <div class="testimonial-wrapper text-center">
            <div class="testimonial-text-wrapper m-auto">
                <p class="testimonial-text"><?php echo $testimonial_description; ?></p>
            </div>
        </div>
        <div class="text-center">
            <img src="<?php echo $testimonial_image['url']; ?>" alt="todd" class="img-testimonial mr-0">
            <div class="testimonial-name"><?php echo $testimonial_name; ?></div>
            <h5><?php echo $testimonial_tagline; ?></h5>
            <a href="<?php echo $estimate_project_button_link; ?>" target="_blank" class="btn w-button"><?php echo $estimate_project_button; ?></a>
        </div>
    </div>

<?php
    $no_more_trial = get_field('no_more_trial');
    $no_more_trial_description = get_field('no_more_trial_description');
?>
 <div class="container">
    <div class="content _50 highlight-text pb-10">
      <h2 class="title-content mb-0 pt-40"><?php echo $no_more_trial; ?></h2>
    </div>
    <div class="wrapper bussiness-detail">
        <?php echo $no_more_trial_description; ?>
    </div>
</div>


<div class="line-wrapper c pb-0 pt-20"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line small"></div>

<?php
    $why_choose_us = get_field('why_choose_us');
    $why_choose_us_description = get_field('why_choose_us_description');
    $you_get_title = get_field('you_get_title');
?>
 <div class="container">
      <div class="content _50 highlight-text pb-10">
      <h2 class="title-content mb-0"><?php echo $why_choose_us; ?></h2>
     </div>
   <div class="wrapper bussiness-detail">
   <div class="content _50 pt-0 pb-10">
      <?php echo $why_choose_us_description; ?>
      <?php if (have_rows('why_choose_us_feature')):
             while (have_rows('why_choose_us_feature')): the_row();
                $tickbox = get_sub_field('tickbox');
                $details = get_sub_field('details');
                ?>
                <div class="list-item mb-10">
                    <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                    <div><?php echo $details; ?></div>
                </div>
                <?php
             endwhile;
         endif;
       ?>
   </div>
   <div class="content _50 pt-0 pb-10">
      <h5><?php echo $you_get_title; ?></h5>
      <?php if (have_rows('you_get_feature')):
             while (have_rows('you_get_feature')): the_row();
                $tickbox = get_sub_field('tickbox');
                $details = get_sub_field('details');
                ?>
                <div class="list-item mb-10">
                    <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                    <div><?php echo $details; ?></div>
                </div>
                <?php
             endwhile;
         endif;
       ?>
      
   </div>
</div>

</div>



<div class="container">
    <div class="content section-bottomPadding">
        <?php if (have_rows('accordions')):
             while (have_rows('accordions')): the_row();
                $accordion_title = get_sub_field('accordion_title');
                $accordion_description = get_sub_field('accordion_description');
                ?>
                <button class="accordion"><?php echo $accordion_title; ?></button>
            <div class="panel">
                <?php echo $accordion_description; ?>
            </div>
                <?php
             endwhile;
         endif;
       ?>
    </div>
</div>

<div class="container">
     <div class="text-center section-bottomPadding">
     <a href="https://app.acuityscheduling.com/schedule.php?owner=16422817" target="_blank" class="btn w-button">Estimate my project now</a>
     </div>

  </div>

</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

<?php get_footer(); ?>





