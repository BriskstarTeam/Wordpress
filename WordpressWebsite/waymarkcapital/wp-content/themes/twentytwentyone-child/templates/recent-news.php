<?php
   /* Template Name: Recent News page */
   get_header(); 
?>

<h3 class="page_title"><?php the_title(); ?></h3>

<ul class="recent-news">
    <?php if (have_rows('recent_news')): ?>
	<?php
		while (have_rows('recent_news')): the_row();
    		$news_title = get_sub_field('news_title');
    		$news_url = get_sub_field('news_url');
		?>
		<li>
          <p><a href="<?php echo $news_url; ?>" target="_blank" rel="noreferrer"><?php echo $news_title; ?></a></p>
        </li>
		<?php
		endwhile;
		?>
  <?php endif; ?>
</ul>