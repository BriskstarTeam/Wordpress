<?php
   /* Template Name: My Investments page */
   get_header(); 
?>
<?php 
    $currentId = get_current_user_id();
    $user_info = get_user_meta($currentId);
    //echo "<pre>"; print_r($user_info['investors_instruction']); exit;
?>


<div class="dataminr">
    <h3 class="page_title"><?php the_title(); ?></h3>
    <?php echo isset($user_info['investors_instruction'][0])?$user_info['investors_instruction'][0]:""; ?>
</div>


<?php get_footer(); ?>