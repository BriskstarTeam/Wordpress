<?php
   /* Template Name: Dashboard page */
   get_header(); ?>

<main>
  <div class="waymark-content-box">  
    
    <?php if (have_rows('dashboard_boxes')): ?>
	<?php
		while (have_rows('dashboard_boxes')): the_row();
    		$image = get_sub_field('image');
    		$title = get_sub_field('title');
    		$url = get_sub_field('url');
		?>
		<a href="<?php echo $url; ?>" class="waymark-content-block" data-toggle="modal" data-target="#currentDeal" >
          <div class="waymark-content-bordered-div">
            <div class="waymark-content-img">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" class="img-fluid">
            </div>
            <div class="waymark-content-details">
              <h3><?php echo $title; ?></h3>
              <p></p>
            </div>
          </div>
        </a>
        
		<?php
		endwhile;
		?>
  <?php endif; ?>
  </div>
</main>




<?php //get_footer(); ?>