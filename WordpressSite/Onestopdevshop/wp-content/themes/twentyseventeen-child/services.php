<?php
   /* Template Name: Services page */
   get_header();
   ?>

<?php
   $small_text = get_field('small_text');
   $section_title = get_field('section_title');
   $description = get_field('description');
   $description_small = get_field('description_small');
   $get_started_link = get_field('get_started_link');
   $get_started_title = get_field('get_started_title');
   $main_image = get_field('main_image');

?>
<div class="hero-section">
    <div class="hero-wrapper">   
      <div class="hero-container">
       <div class="hero-content service-hero">
        <h5 class="small-text"><?php echo $small_text; ?></h5>
       <h1 class="hero-h1"><?php echo $section_title; ?></h1>
       <p class="hero-p"><?php echo $description; ?></p> 
       <p class="hero-p"><?php echo $description_small; ?> </p>
       <a href="<?php echo $get_started_link['url']; ?>" target="_blank" class="btn w-button"><?php echo $get_started_title; ?></a></div>
        <div class="hero-content padding"><img src="<?php echo $main_image['url']; ?>" alt="<?php echo $main_image['title']; ?>" class="img-hero large">
     </div>
   </div>
    </div>
  </div>

<?php
   $highlight_text = get_field('highlight_text');
   $business_text = get_field('business_text');
   $business_title_one = get_field('business_title_one');
   $business_title_two = get_field('business_title_two');
   $business_title_three = get_field('business_title_three');
   $business_title_four = get_field('business_title_four');
   $simple_phone_call = get_field('simple_phone_call');
   $call_us_link = get_field('call_us_link');
   $call_us_button = get_field('call_us_button');
   $multiple_freelancer_text = get_field('multiple_freelancer_text');

?>
<div class="section lightblue">
<div class="container">
  <div class="highlight-text">
 <h4><?php echo $highlight_text; ?></h4></div>
<div class="wrapper bussiness-detail">
   <div class="content _50 pt-0">
      <h2 class="title-content"><?php echo $business_text; ?> #1</h2>
      <?php echo $business_title_one; ?>
   </div>
   <div class="content _50 pt-0">
      <h2 class="title-content"><?php echo $business_text; ?> #2</h2>
      <?php echo $business_title_two; ?>
   </div>
</div>
</div>


<div class="container">
<div class="line-wrapper pt-0 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1.svg" class="img-line"></div>
</div>


<div class="container pb-40">
<div class="wrapper bussiness-detail">
   <div class="content _50 pt-0 pb-10">
      <h2 class="title-content"><?php echo $business_text; ?> #3</h2>
      <?php echo $business_title_three; ?>
   </div>
   <div class="content _50 pb-10">
      <?php echo $business_title_four; ?>
   </div>
</div>
 <div class="highlight-text pt-0">
 <h4><?php echo $simple_phone_call; ?></h4>
 <a href="<?php echo $call_us_link; ?>" target="_blank" class="btn w-button"><?php echo $call_us_button; ?></a>
</div>
</div>

</div>



<div class="section dark">
  <div class="container service-darkContent">
      <?php echo $multiple_freelancer_text; ?>
     <a href="<?php echo $call_us_link; ?>" target="_blank" class="btn w-button"><?php echo $call_us_button; ?></a>
 </div>
</div>


<?php
$choose_dot_net_title = get_field('choose_dot_net_title');
$bussiness_detail = get_field('bussiness_detail');
$highlight_text_three = get_field('highlight_text_three');

?>

<div class="section lightblue">
    <div class="container section-padding">
      <div class="content center pb-0 pt-0">
            <h2 class="title-content"><?php echo $choose_dot_net_title; ?></h2>
       </div>
    <div class="wrapper bussiness-detail pt-0">
       <?php echo $bussiness_detail; ?>
    </div>
    <div class="highlight-text pt-0">
         <h4><?php echo $highlight_text_three; ?></h4>
    </div>
</div>

<?php 
$satisfied_clients_title = get_field('satisfied_clients_title');
?>

   <div class="container section-bottomPadding">
     <div class="section-bottomPadding">
      <div class="highlight-text pt-0"><h2 class="title-content mb-0"><?php echo $satisfied_clients_title; ?> </h2></div>
        <?php if (have_rows('testimonial')):
             while (have_rows('testimonial')): the_row();
                $testimonial_image = get_sub_field('testimonial_image');
                $testimonial_text = get_sub_field('testimonial_text');
                $testimonial_name = get_sub_field('testimonial_name');
                ?>
                <div class="testimonial-wrapper nomargin"><img src="<?php echo $testimonial_image['url']; ?>" alt="<?php echo $testimonial_image['title']; ?>" class="img-testimonial">
                    <div class="testimonial-text-wrapper">
                        <p class="testimonial-text"><?php echo $testimonial_text; ?></p>
                    <div class="testimonial-name">- <?php echo $testimonial_name; ?></div>
                    </div>
                </div>
            <?php
            endwhile;
         endif;
       ?>
   </div>
  </div>
</div>
<?php
$victor_image = get_field('victor_image');
$completed_software_app_text = get_field('completed_software_app_text');
?>
<div class="container">
    <div class="wrapper rev">
      <div class="content _50 img-bgshape graph-vector"><img src="<?php echo $victor_image['url']; ?>" alt="<?php echo $victor_image['name']; ?>"></div>
      <div class="content _50">
          <h5><?php echo $completed_software_app_text; ?></h5>
          <h2 class="title-content mb-0">For you, that means</h2>
           <?php if (have_rows('software_app_details')):
             while (have_rows('software_app_details')): the_row();
                $tick_image = get_sub_field('tick_image');
                $description = get_sub_field('description');
                ?>
                <div class="list-item mb-0">
                    <p><img class="icon-list" src="<?php echo $tick_image['url']; ?>" alt="<?php echo $tick_image['name']; ?>" width="20px" height="20px"></p>
                    <div><?php echo $description; ?></div>
                 </div>
                <?php
                endwhile;
             endif;
           ?>
            <?php if (have_rows('app_details')):
                 while (have_rows('app_details')): the_row();
                    $app_text = get_sub_field('app_text');
                    ?>
                    <p><?php echo $app_text; ?></p>
                    <?php
                 endwhile;
             endif;
           ?>
      </div>
    </div>
</div>

<?php
$highlight_text_four = get_field('highlight_text_four');
$ready_to_kickstart_details = get_field('ready_to_kickstart_details');
$schedule_your_call = get_field('schedule_your_call');
?>


<div class="section wave2 pb-10">

  <div class="container kickstart">
    <div class="line-wrapper c"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line small"></div>
    <div class="content pt-0 pb-10">
      <h2 class="title-content mb-0"><?php echo $highlight_text_four; ?></h2>
      <h5><span><a href="https://app.acuityscheduling.com/schedule.php?owner=16422817" target="_blank" class="link">Book a Call Now</a></span> to see if you qualify.</h5>
        <?php echo $ready_to_kickstart_details; ?>
        
        <h5>Simply<span><a href="https://app.acuityscheduling.com/schedule.php?owner=16422817" target="_blank" class="link"> <?php echo $schedule_your_call; ?> </a></span></h5>
    </div>
     <div class="wrapper pt-0">
   <div class="content _50 pt-0 pb-10">
       <?php if (have_rows('software_project_details')):
             while (have_rows('software_project_details')): the_row();
                $description = get_sub_field('description');
                ?>
                <p><?php echo $description; ?></p>
                <?php
             endwhile;
         endif;
       ?>
      
   </div>
<?php
$software_project_details_content = get_field('software_project_details_content');
$pre_qualifications_link = get_field('pre_qualifications_link');
$pre_qualifications_text = get_field('pre_qualifications_text');
$highlight_text_five = get_field('highlight_text_five');
?>
   
   <div class="content _50 pt-0 pb-10">
      <?php echo $software_project_details_content; ?>
      <p>So here they are: <span><a href="<?php echo $pre_qualifications_link; ?>" target="_blank" class="blue-link"><?php echo $pre_qualifications_text; ?></a></span></p>
       <h5 class="mb-0"><?php echo $highlight_text_five; ?></h5>
            <?php if (have_rows('right_solution')):
                 while (have_rows('right_solution')): the_row();
                    $tick_image = get_sub_field('tick_image');
                    $description = get_sub_field('description');
                    ?>
                    <div class="list-item mb-0">
                        <p><img class="icon-list" src="<?php echo $tick_image['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                        <div><?php echo $description; ?> </div>
                     </div>
                    <?php
                 endwhile;
             endif;
           ?>
           
   </div>
</div>

  </div>


<?php 
   $highlight_text_six = get_field('highlight_text_six');
   $project_problem_description = get_field('project_problem_description');
   ?>
 <div class="container">
    <div class="line-wrapper c"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line small"></div>
        <div class="content pt-0 pb-10">
          <?php echo $project_problem_description; ?>
        </div>
    </div>
</div>
<?php
    $section_dark_sort_details = get_field('section_dark_sort_details');
    $it_projects_description = get_field('it_projects_description');
?>
<div class="section dark bg-image">
  <div class="container text-left">
    <div class="content pt-0 pb-40">
      <?php echo $section_dark_sort_details; ?>
   </div>
 </div>
</div>

<div class="section lightblue">
 <div class="container section-bottomPadding">
 <div class="wrapper">
   <?php echo $it_projects_description; ?>
 </div>

 </div>

<?php
    $freedom_from_stress = get_field('freedom_from_stress');
    $freedom_from_stress_question = get_field('freedom_from_stress_question');
    $freedom_from_stress_description = get_field('freedom_from_stress_description');
    $business_search_image = get_field('business_search_image');
    $business_search_details = get_field('business_search_details');
?>

<div class="container section-padding">
  <div class="content center pb-10 pt-0">
     <h2 class="title-content"><?php echo $freedom_from_stress; ?></h2>
     <?php echo $freedom_from_stress_question; ?>
   </div>
<div class="wrapper bussiness-detail pt-0">
   <div class="content _50 pt-0 pb-10">
      <?php echo $freedom_from_stress_description; ?>
   </div>
   <div class="content _50 pt-0 pb-10">
      <div class="graph-vector"><img src="<?php echo $business_search_image['url']; ?>" alt="<?php echo $business_search_image['name']; ?>"></div>
      <?php echo $business_search_details; ?>
    </div>
</div>
</div>

<?php
$highlight_text_slingshot = get_field('highlight_text_slingshot');
$slingshot_details = get_field('slingshot_details');
?>

<div class="container">
    <div class="content section-bottomPadding">
            <h2 class="title-content mb-0"><?php echo $highlight_text_slingshot; ?> </h2>
            <?php echo $slingshot_details; ?>
             <?php if (have_rows('accordion_description')):
                 while (have_rows('accordion_description')): the_row();
                    $title = get_sub_field('title');
                    $details = get_sub_field('details');
                    ?>
                    <button class="accordion"><?php echo $title; ?> </button>
                    <div class="panel">
                        <?php echo $details; ?>
                    </div>
                    <?php
                 endwhile;
             endif;
           ?>
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






