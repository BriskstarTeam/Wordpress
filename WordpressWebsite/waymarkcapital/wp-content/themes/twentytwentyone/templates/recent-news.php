<?php
   /* Template Name: Recent News page */
   if (!is_user_logged_in()) {
        wp_redirect('user-login');
        exit;
    }
   get_header(); 
?>



<ul class="recent-news">
    <h3 class="page_title"><?php the_title(); ?></h3>
    <?php if (have_rows('recent_news')): ?>
	<?php
		while (have_rows('recent_news')): the_row();
    		$news_title = get_sub_field('news_title');
    		$news_url = get_sub_field('news_url');
		?>
		<li>
          <a href="<?php echo $news_url; ?>" target="_blank" rel="noreferrer"><?php echo $news_title; ?></a>
        </li>
		<?php
		endwhile;
		?>
  <?php endif; ?>
</ul>

<?php get_footer(); ?>