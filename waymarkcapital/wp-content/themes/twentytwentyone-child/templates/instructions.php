<?php
   /* Template Name: Instructions page */
   get_header(); 
?>

<main>
  <div class="waymark-content-box">  
    
    <?php if (have_rows('instructions_boxes')): ?>
	<?php
		while (have_rows('instructions_boxes')): the_row();
    		$icon = get_sub_field('icon');
    		$title = get_sub_field('title');
    		$pdf_urlsl = get_sub_field('pdf_urls');
		?>
		<a href="<?php echo $pdf_urlsl; ?>" class="waymark-content-section">
          <div class="waymark-content-bordered-div">
            <div class="waymark-content-img">
              <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['title']; ?>" class="img-fluid">
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