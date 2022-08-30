<?php
   /* Template Name: Current Opportunity page */
   get_header(); 
?>
<?php 

$dataminr_image = get_field('dataminr_image');
$description = get_field('description');
?>
<h3 class="page_title"><?php the_title(); ?></h3>
<div class="dataminr">
    <span>
      <a href="#"><img src="<?php echo $dataminr_image['url']; ?>" alt="<?php echo $dataminr_image['title']; ?>" width="350" class="dataminr-logo center"></a>
    </span>
    <div class="description">
        <?php echo $description; ?>
    </div>
</div>