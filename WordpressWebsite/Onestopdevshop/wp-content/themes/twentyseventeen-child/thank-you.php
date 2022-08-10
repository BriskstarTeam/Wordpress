<?php
   /* Template Name: Thank you page */
   get_header();
   ?>

<?php
    $thank_you_title = get_field('thank_you_title');
    $project_details = get_field('project_details');
    $book_call_button = get_field('book_call_button');
?>
<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="section pb-40">
                <div class="container">
                    <?php /* <div id="notfound">
                        <div class="notfound">
                            <div class="notfound-404">
                                <h1>Oops!</h1>
                            </div>
                            <h2>404 - Page not found</h2>
                            <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                            <a class="btn w-button" href="<?php echo get_home_url(); ?>">Go To Homepage</a>
                        </div>
                    </div>  */ ?>
                    <div id="error-page">
                      <div class="error-page thankyou-page">
                        <div class="margin-minus">
                            <img src="https://onestopdevshop.io/wp-content/uploads/2021/09/thankyou.svg" class="img-fluid">
                            <h2><?php echo $thank_you_title; ?></h2>
                            <p><?php echo $project_details; ?>.</p>
                            <a href="<?php echo $book_call_button; ?>" class="btn w-button">Book a Call</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .wrap -->
<!-- <div class="hero-section">
    <div class="hero-wrapper">   
      <div class="simple-container">
       <div class="simple-content">
         <h2 class="thank-you">Thank you for your interest</h2>
         <p>We are checking into your project details now. If you would like to schedule a call with one of our software entrepreneurs, you can do so <a href="https://onestop.as.me/discovery" target="_blank">HERE</a>.</p>
       </div>
        
   </div>
    </div>
  </div> -->
<?php get_footer(); ?>