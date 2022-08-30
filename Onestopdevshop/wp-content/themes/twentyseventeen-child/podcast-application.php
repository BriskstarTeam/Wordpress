<?php
   /* Template Name: Podcast Application page */
   get_header(); ?>
   <?php
   $apply_here_title = get_field('apply_here_title');
   $fill_out_description = get_field('fill_out_description');
   $software_podcast_form = get_field('software_podcast_form');
   
   ?>
   <div class="entry-content">
		<h3 style="text-align: center;"><?php echo $apply_here_title; ?></h3>
        <p style="text-align: center;"><?php echo $fill_out_description; ?></p>
        <p style="text-align: center;"><?php echo $software_podcast_form; ?></p>
	</div>
   
   
   
</body>
</html>
