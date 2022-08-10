<?php
   /* Template Name: About */
   get_header(); 
   ?>
   
   
<?php 
    $about_details = get_field('about_details');
    $tom_image = get_field('tom_image');
    $tom_name = get_field('tom_name');
    $tom_details = get_field('tom_details');
    $dave_image = get_field('dave_image');
    $dave_name = get_field('dave_name');
    $dave_details = get_field('dave_details');
?>
<div class="how-section1 recent-news">
    
    <span class="about">
        <h1 class="page_title"><?php the_title(); ?></h1>
    </span>
    <div class="about-detail">
        <?php echo $about_details; ?>
    </div>

    <div class="row">
        <div class="col-md-3 how-img">
            <img src="<?php echo $tom_image['url']; ?>" alt="<?php echo $tom_image['name']; ?>" class="img-fluid" alt=""/>
        </div>
        <div class="col-md-9 content">
            <h4><?php echo $tom_name; ?></h4>
            <p><?php echo $tom_details; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 content">
            <h4><?php echo $dave_name; ?></h4>
                <p><?php echo $dave_details; ?></p>
        </div>
        <div class="col-md-3 second-image">
            <img src="<?php echo $dave_image['url']; ?>" alt="<?php echo $dave_image['name']; ?>" class="img-fluid" alt=""/>
        </div>
    </div>
</div>
 <?php
 $buying_pre_ipo_stocks_image = get_field('buying_pre_ipo_stocks_image');
 $footer_logo = get_field('footer_logo');
 $copyright_text = get_field('copyright_text');
 $buying_pre_ipo_stocks_title = get_field('buying_pre_ipo_stocks_title');
 
 ?>
 <footer>
    <div class="footer">
      <div class="row">
        <div class="col-sm-6">
          <div class="footer-box">
            <img src="<?php echo $buying_pre_ipo_stocks_image['url']; ?>" alt="<?php echo $buying_pre_ipo_stocks_image['name']; ?>" class="img-fluid">
            <div class="footer-content">
                <h3><?php echo $buying_pre_ipo_stocks_title; ?></h3>
              <a href="#" class="theme_btn thm-btn border-radius-5 show-more" tabindex="0">Book a Call Now</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="footer-bottom-content">
            <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['name']; ?>" class="img-fluid" />
            <p><?php echo $copyright_text; ?></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
<?php //get_footer(); ?>