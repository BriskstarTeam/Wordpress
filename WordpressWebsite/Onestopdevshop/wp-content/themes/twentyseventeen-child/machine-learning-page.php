<?php
   /* Template Name: Machine Learning Page */
   get_header();
   ?>
<?php 
    $main_title = get_field('main_title');
    $main_tagline = get_field('main_tagline');
    $estimate_link = get_field('estimate_link');
    $estimate_button = get_field('estimate_button');
    $main_image = get_field('main_image');
?>
<div class="hero-section">
   <div class="hero-wrapper">
      <div class="hero-container">
         <div class="hero-content service-hero">
            <h1 class="hero-h1 pb-10"><?php echo $main_title; ?></h1>
            <p class="p20 pb-10"><?php echo $main_tagline; ?></p>
            <a href="<?php echo $estimate_link; ?>" target="_blank" class="btn w-button"><?php echo $estimate_button; ?></a>
         </div>
         <div class="htext-center"><img src="<?php echo $main_image['url']; ?>" alt="<?php echo $main_image['name']; ?>" class="img-hero large">
         </div>
      </div>
   </div>
</div>

<div class="section lightblue">
<?php 
    $highlight_text = get_field('highlight_text');
    $bussiness_detail = get_field('bussiness_detail');
?>
   <div class="container">
      <div class="highlight-text">
         <?php echo $highlight_text; ?>
      </div>
      <div class="wrapper bussiness-detail">
         <?php echo $bussiness_detail; ?>
      </div>
   </div>
   <div class="container">
      <div class="line-wrapper pt-0 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line small"></div>
   </div>
 
<?php 
    $what_is_machine_learning_title = get_field('what_is_machine_learning_title');
    $machine_learning_description = get_field('machine_learning_description');
    $call_us_link = get_field('call_us_link');
    $call_us_button = get_field('call_us_button');
?>
   <div class="container">
      <div class="highlight-text pb-10">
         <h2 class="title-content mb-0 pb-10"><?php echo $what_is_machine_learning_title; ?></h2>
         <?php echo $machine_learning_description; ?>
         <a href="<?php echo $call_us_link; ?>" target="_blank" class="btn w-button"><?php echo $call_us_button; ?></a>
      </div>
   </div>
   <div class="container">
      <div class="line-wrapper pt-0 "><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1.svg" class="img-line"></div>
   </div>
<?php 
    $types_of_machine_learning = get_field('types_of_machine_learning');
    $features_of_machine_learning = get_field('features_of_machine_learning');
    $machine_learning_image = get_field('machine_learning_image');
?>
   <div class="container section-padding pt-0 ">
      <div class="content center pb-0 pt-0">
         <h2 class="title-content mb-0 pb-10"><?php echo $types_of_machine_learning; ?></h2>
         <?php echo $features_of_machine_learning; ?>
         <div class="graph-vector"><img src="<?php echo $machine_learning_image['url']; ?>" alt="<?php echo $machine_learning_image['name']; ?>" class="">
         </div>
      </div>
   </div>
   
<?php 
    $supervised_learning_image = get_field('supervised_learning_image');
    $supervised_learning_title = get_field('supervised_learning_title');
    $supervised_learning_details = get_field('supervised_learning_details');
    $applications_include = get_field('applications_include');
?>
   <div class="container">
      <div class="wrapper rev">
         <div class="content _50 ">
            <div class="img-bgshape graph-vector">
               <img src="<?php echo $supervised_learning_image['url']; ?>" alt="<?php echo $supervised_learning_image['name']; ?>">
            </div>
         </div>
         <div class="content _50">
            <h2 class="title-content mb-0"><?php echo $supervised_learning_title; ?> </h2>
            <?php echo $supervised_learning_details; ?>
            <div class="wrapper rev">
               <div class="content _50 p-0">
                   <?php if (have_rows('applications_include_type')):
                        while (have_rows('applications_include_type')): the_row();
                            $tickbox = get_sub_field('tickbox');
                            $title = get_sub_field('title');
                            ?>
                            <div class="list-item mb-10">
                                <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                                <div><?php echo $title; ?></div>
                            </div>
                            <?php
                         endwhile;
                     endif;
                   ?>
               </div>
               <div class="content _50 p-0">
                  <?php if (have_rows('applications_information_type')):
                        while (have_rows('applications_information_type')): the_row();
                            $tickbox = get_sub_field('tickbox');
                            $title = get_sub_field('title');
                            ?>
                            <div class="list-item mb-10">
                                <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                                <div><?php echo $title; ?></div>
                            </div>
                            <?php
                         endwhile;
                     endif;
                   ?>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="line-wrapper r pt-0 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-2.svg" alt="dashed-line-2" class="img-line"></div>
   </div>
   
<?php 
    $unsupervised_learning_image = get_field('unsupervised_learning_image');
    $unsupervised_learning_title = get_field('unsupervised_learning_title');
    $unsupervised_learning_tagline = get_field('unsupervised_learning_tagline');
?>
   <div class="container">
      <div class="wrapper rev">
         <div class="content _50">
            <h2 class="title-content mb-0 pb-10"><?php echo $unsupervised_learning_title; ?></h2>
            <?php echo $unsupervised_learning_tagline; ?>
            <?php if (have_rows('unsupervised_applications')):
                while (have_rows('unsupervised_applications')): the_row();
                    $tickbox = get_sub_field('checkbox');
                    $title = get_sub_field('titles');
                    ?>
                    <div class="list-item mb-10">
                       <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                       <div><?php echo $title; ?></div>
                    </div>
                    <?php
                 endwhile;
             endif;
           ?>
         </div>
         <div class="content _50 ">
            <div class="img-bgshape graph-vector">
               <img src="<?php echo $unsupervised_learning_image['url']; ?>" alt="<?php echo $unsupervised_learning_image['name']; ?>">
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="line-wrapper pt-0 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1.svg" class="img-line"></div>
   </div>
   
   <?php 
    $reinforcement_learning_image = get_field('reinforcement_learning_image');
    $reinforcement_learning_title = get_field('reinforcement_learning_title');
    $reinforcement_learning_description = get_field('reinforcement_learning_description');
    $deepening_our_capacity = get_field('deepening_our_capacity');
?>
   <div class="container">
      <div class="wrapper rev">
         <div class="content _50 ">
            <div class="img-bgshape graph-vector">
               <img src="<?php echo $reinforcement_learning_image['url']; ?>" alt="<?php echo $reinforcement_learning_image['name']; ?>">
            </div>
         </div>
         <div class="content _50">
            <h2 class="title-content mb-0"><?php echo $reinforcement_learning_title; ?></h2>
            <?php echo $reinforcement_learning_description; ?>
         </div>
      </div>
      <div class="highlight-text pt-0">
         <p><?php echo $deepening_our_capacity; ?>
         </p>
      </div>
   </div>
   
<?php 
    $what_can_machine_learning = get_field('what_can_machine_learning');
    $what_can_machine_learning_description = get_field('what_can_machine_learning_description');
?>
   <div class="container pb-40">
      <div class="highlight-text section-bottomPadding">
         <h2 class="title-content mb-0 pb-10"><?php echo $what_can_machine_learning; ?></h2>
         <?php echo $what_can_machine_learning_description; ?>
         
            <?php if (have_rows('machine_learning_recognition')):
                while (have_rows('machine_learning_recognition')): the_row();
                    $title = get_sub_field('title');
                    $details = get_sub_field('details');
                    ?>
                    <button class="accordion"><?php echo $title; ?></button>
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

<?php 
    $incorporate_machine_image = get_field('incorporate_machine_image');
    $incorporate_machine_title = get_field('incorporate_machine_title');
    $incorporate_machine_description = get_field('incorporate_machine_description');
    $estimate_links = get_field('estimate_links');
    $estimate_buttons = get_field('estimate_buttons');
?>
<div class="container pb-0">
   <div class="wrapper rev">
      <div class="content _50">
         <h2 class="title-content mb-0 pb-10"><?php echo $incorporate_machine_title; ?> </h2>
         <?php echo $incorporate_machine_description; ?>
         <a href="<?php echo $estimate_links; ?>" target="_blank" class="btn w-button"><?php echo $estimate_buttons; ?></a>
      </div>
      <div class="content _50 ">
         <div class="img-bgshape graph-vector">
            <img src="<?php echo $incorporate_machine_image['url']; ?>" alt="<?php echo $incorporate_machine_image['name']; ?>">
         </div>
      </div>
   </div>
</div>
<?php
    $saas_industry_title = get_field('saas_industry_title');
    $big_data = get_field('big_data');
    $big_data_details = get_field('big_data_details');
?>
<div class="section wave2 pb-10">
   <div class="container kickstart">
      <div class="line-wrapper c pt-20 pb-0"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line"></div>
      <h2 class="text-center"><?php echo $saas_industry_title; ?></h2>
   </div>
   <div class="container">
      <div class="content _50 highlight-text pb-10">
         <h2 class="title-content mb-0 pt-40"><?php echo $big_data; ?></h2>
      </div>
      <div class="wrapper bussiness-detail">
         <?php echo $big_data_details; ?>
      </div>
   </div>
<?php
    $deep_learning_title = get_field('deep_learning_title');
    $deep_learning_details = get_field('deep_learning_details');
    $applications_for_deep_learning = get_field('applications_for_deep_learning');
    $get_med_devs = get_field('get_med_devs');
    $tensor_flow_project = get_field('tensor_flow_project');
    $book_a_call_link = get_field('book_a_call_link');
    $book_a_call_button = get_field('book_a_call_button');
?>
   <div class="container">
      <div class="content _50 highlight-text pb-10">
         <h2 class="title-content mb-0 pt-40"><?php echo $deep_learning_title; ?></h2>
      </div>
      <div class="wrapper bussiness-detail">
         <div class="content _50 pt-0 pb-10">
            <?php echo $deep_learning_details; ?>
         </div>
         <div class="content _50 pt-0 pb-10">
            <h5 class="mb-0 pb-10"> <?php echo $applications_for_deep_learning; ?> </h5>
            <?php if (have_rows('deep_learning_include')):
                while (have_rows('deep_learning_include')): the_row();
                    $tickbox = get_sub_field('tickbox');
                    $title = get_sub_field('title');
                    ?>
                    <div class="list-item mb-10">
                       <p class="mb-0"><img class="icon-list" src="<?php echo $tickbox['url']; ?>" alt="checkmark.svg" width="20px" height="20px"></p>
                       <div><?php echo $title; ?></div>
                    </div>
                    <?php
                 endwhile;
             endif;
            ?>
            
            <p><?php echo $get_med_devs; ?></p>
         </div>
      </div>
      <div class="highlight-text pt-0 ">
         <?php echo $tensor_flow_project; ?>
         <a href="<?php echo $book_a_call_link; ?>" target="_blank" class="btn w-button"><?php echo $book_a_call_button; ?></a>
      </div>
   </div>
   
<?php
    $learning_in_python = get_field('learning_in_python');
    $learning_in_python_description = get_field('learning_in_python_description');
    $estimate_link = get_field('estimate_link');
    $estimate_button = get_field('estimate_button');
    $today_digital_age = get_field('today_digital_age');
?>
   <div class="container">
      <div class="highlight-text pb-10">
         <h2 class="title-content mb-0 pt-40"><?php echo $learning_in_python; ?></h2>
      </div>
      <div class="highlight-text pt-0 ">
         <?php echo $learning_in_python_description; ?>
         <a href="<?php echo $estimate_link; ?>" target="_blank" class="btn w-button"><?php echo $estimate_button; ?></a>
         <p class="pt-20"><?php echo $today_digital_age; ?>
         </p>
      </div>
   </div>
   <div class="line-wrapper c pb-0 pt-20"><img src="https://onestopdevshop.io/wp-content/themes/twentyseventeen-child/assets/images/dashed-line-1.svg" alt="dashed-line-1" class="img-line small"></div>
   
   
<?php
    $improved_by_machine_learning = get_field('improved_by_machine_learning');
?>
   <div class="container">
      <div class="content section-bottomPadding">
         <h3><?php echo $improved_by_machine_learning; ?></h3>
         <?php if (have_rows('machine_learning_accordion')):
                while (have_rows('machine_learning_accordion')): the_row();
                    $title = get_sub_field('title');
                    $details = get_sub_field('details');
                    ?>
                    <button class="accordion"><?php echo $title; ?></button>
                    <div class="panel">
                        <?php echo $details; ?>
                    </div>
                    <?php
                 endwhile;
             endif;
            ?>
      </div>
   </div>
   
<?php
    $successful_team = get_field('successful_team');
    $successful_team_description = get_field('successful_team_description');
    $estimate_link = get_field('estimate_link');
    $estimate_button = get_field('estimate_button');
?>
   <div class="container pb-40">
      <div class="content pb-10">
         <h2 class="title-content mb-0"><?php echo $successful_team; ?></h2>
      </div>
      <div class="content pt-0 ">
         <?php echo $successful_team_description; ?>
         <a href="<?php echo $estimate_link; ?>" target="_blank" class="btn w-button"><?php echo $estimate_button; ?></a>
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