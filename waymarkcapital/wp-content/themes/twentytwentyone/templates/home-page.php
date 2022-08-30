<?php
   /* Template Name: Home page */
   get_header(); 
?>
<?php 
    $banner_image = get_field('banner_image');
    $banner_title = get_field('banner_title');
    $banner_tagline = get_field('banner_tagline');
    $lode_more_button = get_field('lode_more_button');
    $connecting_line = get_field('connecting_line');
?>
<main>
  <section class="hero-area">
    <div class="row row-alignment">
      <div class="col-sm-6">
        <div class="banner-img">
          <img src="<?php echo $banner_image['url']; ?>" alt="<?php echo $banner_image['name']; ?>" class="img-fluid" />
        </div>
      </div>
      <div class="col-sm-6">
        <div class="banner-content">
          <h1><?php echo $banner_title; ?></h1>
          <p><?php echo $banner_tagline; ?></p><a class="theme_btn thm-btn border-radius-5 show-more" tabindex="0"><?php echo $lode_more_button; ?></a>
        </div>
      </div>
    </div>
    <div class="connecting-line">
      <img src="<?php echo $connecting_line['url'];?>" alt="<?php echo $connecting_line['name'];?>" class="img-fluid" />
    </div>
  </section>
  <?php 
    $ipo_offerings_title = get_field('ipo_offerings_title');
    $ipo_offerings_details = get_field('ipo_offerings_details');
    $ipo_image = get_field('ipo_image');
    $before_ipo_details = get_field('before_ipo_details');
    $now_ipo_details = get_field('now_ipo_details');
?>
  <section class="pre-ipo">
    <div class="row row-alignment">
      <div class="col-sm-6">
        <div class="pre-ipo-content">
          <h2 class="section-title"><?php echo $ipo_offerings_title; ?></h2>
          <p class="pre-ipo-text"><?php echo $ipo_offerings_details; ?></p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="pre-ipo-before-after">
          <img src="<?php echo $ipo_image['url']; ?>" alt="<?php echo $ipo_image['name']; ?>" class="img-fluid" />
          <div class="pre-ipo-before-after-content">
            <h3>Before</h3>
            <p><?php echo $before_ipo_details; ?> </p>
            <h3>Now</h3>
            <p><?php echo $now_ipo_details; ?></p>
          </div>
        </div>
      </div>
      
    </div>
    <div class="connecting-line">
        <img src="<?php echo $connecting_line['url'];?>" alt="<?php echo $connecting_line['name'];?>" class="img-fluid" />
    </div>
  </section>
   <?php 
    $pre_ipo_stocks_title = get_field('pre_ipo_stocks_title');
    $pre_ipo_stocks_image = get_field('pre_ipo_stocks_image');
    $pre_ipo_stocks_description = get_field('pre_ipo_stocks_description');
?>
  <section class="pre-ipo-stocks">
    <div class="row row-alignment">
      <div class="col-sm-6">
        <div class="pre-ipo-before-after">
          <img src="<?php echo $pre_ipo_stocks_image['url']; ?>" alt="<?php echo $pre_ipo_stocks_image['name']; ?>" class="img-fluid" />
        </div>
      </div>
      <div class="col-sm-6">
        <div class="pre-ipo-content">
          <h2 class="section-title"><?php echo $pre_ipo_stocks_title; ?></h2>
          <p class="pre-ipo-text"><?php echo $pre_ipo_stocks_description; ?></p>
          <ul class="pre-ipo-list">
              <?php if (have_rows('pre_ipo_stocks_details')): 
            		while (have_rows('pre_ipo_stocks_details')): the_row();
                		$details = get_sub_field('details');
            		?>
            		    <li><?php echo $details; ?></li>
            		<?php
            		endwhile;
        		 endif; ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="connecting-line">
        <img src="<?php echo $connecting_line['url'];?>" alt="<?php echo $connecting_line['name'];?>" class="img-fluid" />
    </div>
  </section>
  <?php 
    $pre_ipo_investing_title = get_field('pre_ipo_investing_title');
    $pre_ipo_investing_details = get_field('pre_ipo_investing_details');
?>
  <section class="pre-ipo-investing">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h2 class="section-title"><?php echo $pre_ipo_investing_title; ?></h2>
        </div>
        <div class="col-sm-12">
          <p class="investing-text"><?php echo $pre_ipo_investing_details; ?></p>
        </div>
        <div class="col-sm-12">
          <div class="investing-mainbox">
            <div class="row">
                <?php if (have_rows('pre_ipo_investing_features')): ?>
                	<?php
                		while (have_rows('pre_ipo_investing_features')): the_row();
                    		$image = get_sub_field('image');
                    		$title = get_sub_field('title');
                    		$details = get_sub_field('details');
                		?>
                    		<div class="col-sm-6 col-md-4">
                                <div class="investing-box">
                                  <img src="<?php echo $image['url'] ?>" alt="<?php echo $image['name'] ?>" class="img-fluid" />
                                  <h5><?php echo $title ?></h5>
                                  <p><?php echo $details ?></p>
                                </div>
                              </div>
                		<?php
                		endwhile;
                		?>
                  <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="connecting-line">
        <img src="<?php echo $connecting_line['url'];?>" alt="<?php echo $connecting_line['name'];?>" class="img-fluid" />
    </div>
     <?php 
        $our_philosophy_title = get_field('our_philosophy_title');
        $our_philosophy_details = get_field('our_philosophy_details');
    ?>
    <div class="our-philosophy">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="section-title"><?php echo $our_philosophy_title; ?></h2>
        </div>
        <div class="col-sm-12">
          <p class="investing-text"><?php echo $our_philosophy_details; ?> </p>
        </div>
      </div>
    </div>
  </section>
  <div class="connecting-line">
      <img src="<?php echo $connecting_line['url'];?>" alt="<?php echo $connecting_line['name'];?>" class="img-fluid" />
  </div>
    <?php 
        $we_are_title = get_field('we_are_title');
        $we_are_details = get_field('we_are_details');
        $we_are_image = get_field('we_are_image');
    ?>
  <section class="who-we-are">
    <div class="row row-alignment">
      <div class="col-sm-6">
        <div class="who-we-are-content">
          <h2 class="section-title"><?php echo $we_are_title; ?></h2>
          <p class="who-we-are-text"><?php echo $we_are_details; ?></p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="who-we-are-img">
          <img src="<?php echo $we_are_image['url']; ?>" alt="<?php echo $we_are_image['name']; ?>" class="img-fluid" />
        </div>
      </div>
      
    </div>
    <div class="connecting-line">
        <img src="<?php echo $connecting_line['url'];?>" alt="<?php echo $connecting_line['name'];?>" class="img-fluid" />
    </div>
  </section>
  <?php 
        $buying_pre_ipo_stocks_title = get_field('buying_pre_ipo_stocks_title');
        $buying_pre_ipo_stocks_details = get_field('buying_pre_ipo_stocks_details');
        $buying_pre_ipo_stocks_image = get_field('buying_pre_ipo_stocks_image');
        $book_a_call_button_url = get_field('book_a_call_button_url');
        $book_a_call_button = get_field('book_a_call_button');
        $footer_logo = get_field('footer_logo');
        $copyright_text = get_field('copyright_text');
    ?>
  <footer>
    <div class="footer">
      <div class="row">
        <div class="col-sm-6">
          <div class="footer-box">
            <img src="<?php echo $buying_pre_ipo_stocks_image['url']; ?>" alt="<?php echo $buying_pre_ipo_stocks_image['name']; ?>" class="img-fluid">
            <div class="footer-content">
              <h3><?php echo $buying_pre_ipo_stocks_title; ?></h3>
              <p><?php echo $buying_pre_ipo_stocks_details; ?></p>
              <a href="#" class="theme_btn thm-btn border-radius-5 show-more" tabindex="0"><?php echo $book_a_call_button; ?></a>
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
</main>  

<? get_footer(); ?>