<?php
   /* Template Name: Login page */
   get_header(); 
?>

<h3 class="page_title"><?php the_title(); ?></h3>
<?php
echo do_shortcode('[wp_user]');
?>