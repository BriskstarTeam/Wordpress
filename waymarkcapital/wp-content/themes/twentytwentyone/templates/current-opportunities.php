<?php
   /* Template Name: Current Opportunity page */
   if (!is_user_logged_in()) {
        wp_redirect('user-login');
        exit;
    }
   get_header(); 
?>
<?php 

$dataminr_image = get_field('dataminr_image');
$about_title = get_field('about_title');
$about_description = get_field('about_description');
$customer_title = get_field('customer_title');
$customer_description = get_field('customer_description');
$investors_title = get_field('investors_title');
$investors_description = get_field('investors_description');
$valuations_title = get_field('valuations_title');
$opportunity_title = get_field('opportunity_title');
$opportunity_description = get_field('opportunity_description');
$invest_button = get_field('invest_button');
$docusign_link = get_field('docusign_link');
$invest_text = get_field('invest_text');
?>

<div class="dataminr">
    <h3 class="page_title"><?php the_title(); ?></h3>
    <span>
      <a href="#"><img src="<?php echo $dataminr_image['url']; ?>" alt="<?php echo $dataminr_image['title']; ?>" width="350" class="dataminr-logo center"></a>
    </span>
    <div class="description">
        <?php //echo $description; ?>
        <h4 class="title"><strong><?php echo $about_title ?></strong></h4>
        <p><?php echo $about_description ?></p>
        <h4 class="title"><strong><?php echo $customer_title ?></strong></h4>
        <p><?php echo $customer_description ?></p>
        <h4 class="title"><strong><?php echo $investors_title ?></strong></h4>
        <p><?php echo $investors_description ?></p>
        <h4 class="title"><strong><?php echo $valuations_title ?></strong></h4>
        <ul class="recent-news">
            <?php if (have_rows('valuations_features')): ?>
        	<?php
        		while (have_rows('valuations_features')): the_row();
            		$features = get_sub_field('features');
        		?>
        		<li><?php echo $features; ?></li>
        		<?php
        		endwhile;
        		?>
          <?php endif; ?>
        </ul>
        <h4 class="title"><strong><?php echo $opportunity_title ?></strong></h4>
        <p><?php echo $opportunity_description ?></p>
        <p><span class="button_remaining"><a class="invest-btn" href="<?php echo $docusign_link ?>" target="_blank" rel="noopener"><?php echo $invest_button ?></a> 
        <span class="remaining"><?php echo $invest_text ?></span></span></p>
    </div>
</div>

<?php get_footer(); ?>