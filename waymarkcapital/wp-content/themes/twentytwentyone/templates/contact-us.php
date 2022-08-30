<?php
   /* Template Name: Contact page */
   get_header(); 
?>

<h3 class="page_title"><?php the_title(); ?></h3>
<?php echo do_shortcode('[contact-form-7 id="185" title="Contact Us" html_class="waymark_contact"]'); ?>
