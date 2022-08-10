<?php get_header(); ?>
<div class="site-content-contain">	
	<?php 
	if ( have_posts() ) : 
		while ( have_posts() ) : the_post();
			the_content();  

		endwhile; 
	endif; 
	?>
</div>

<?php get_footer(); ?>


<!-- this file is responsible for post. wordpress will look for single.php file for posts and if this file is missing index.php is used for navigation -->