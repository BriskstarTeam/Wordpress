<!DOCTYPE html>
<html lang="en">
<head>
    
<!-- Meta Tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="google-site-verification" content="9Qzrr7NVVmx2yuuHQJV3bOMTTLEQtoS1Yz6j-OWFoNo" />
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PRZDDDK');</script>
<!-- End Google Tag Manager -->

<!-- Page Title -->
<title>SOCO Harbor</title> 

<!-- Favicon -->
<link rel="icon" href="<?php echo get_theme_file_uri();?>/assets/img/favicon.png">

    <?php wp_head(); ?>
</head>



<body data-spy="scroll" data-target=".navbar" data-offset="150" <?php if ( is_single() || is_page_template( 'templates/photogallery.php' ) ) { body_class( 'inner-page' ); } else { body_class(); } ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PRZDDDK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- <a class="scroll-top-arrow" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a> --> 

<!-- START NAVBAR SECTION -->
<header>
  <div class="logo margin_navbar-logo logo_display"> <a href="<?php echo site_url(); ?>"> <img src=" <?php echo get_theme_file_uri();?>/assets/img/soco-logo.png" alt="Logo Img" class="img-fluid"></a> </div>
  <div class="my-tog-btn"> <span></span> <span></span> <span></span> </div>
  
  <nav id="my-nav1" class="navbar navbar-expand-sm navbar-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarSupportedContent1" >
        <div class="collapse navbar-collapse">
          <div class="logo"> <a href="<?php echo home_url(); ?>"  ><img src="<?php echo get_theme_file_uri();?>/assets/img/soco-logo.png" alt="Logo Img" class="img-fluid"></a> </div>
				<?php
					wp_nav_menu( array( 'theme_location' => 'main-menu','container' => false,'menu_class' => 'navbar-nav') ); 
				?>  
        </div>
      </div>
    </div>
  </nav> 
  
  <!--MODEL WINDOW FOR NAVBAR-->
  
  <div class="outer-window">
    <div class="navbar_small"> <a class="close-outerwindow"><i class="fas fa-times"></i></a>
      <div class="logo"> <a href="<?php echo home_url();?>" ><img src="<?php echo get_theme_file_uri();?>/assets/img/soco-logo.svg" alt="Logo Img" class="img-fluid"></a> </div>
      <?php
					wp_nav_menu( array( 'theme_location' => 'main-menu','container' => false,'menu_class' => 'navbar-nav') ); 
				?>  
    </div>  
  </div>
</header>
