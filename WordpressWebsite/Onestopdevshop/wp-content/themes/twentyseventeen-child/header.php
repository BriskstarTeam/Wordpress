<!DOCTYPE html>
<html lang="en" data-wf-page="5eb40071fa63c85922a62789" data-wf-site="5e8b4cfdbb73f603407121d1">
<head>
  
  <meta name="facebook-domain-verification" content="784140zphq2wu9d2jy1el9xl0ttvoi" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="google-site-verification" content="MBS2Z7MKuahmwO-WkP82miZaJOSnfWXSRYI5adZLKXg" />
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  
  <!--<link href="<?php //echo get_theme_file_uri(); ?>/assets/images/webclip.png" rel="apple-touch-icon">-->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  

  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
   <script type="text/javascript">WebFont.load({  google: {    families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"]  }});</script>
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  
 <!--<script id='pixel-script-poptin' src='https://cdn.popt.in/pixel.js?id=8057534f9e2f3' async='true'></script> -->
  <?php wp_head(); ?>
  <script src="https://www.10seos.com/scripts/badge.js"></script>
  <!-- Google Tag Manager -->
   <script type="text/javascript">
	   (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KFBDNVL');
</script>
  <!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
     
    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KFBDNVL"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  <header id="transparent-header">
  		<div class="container">
  		  <div class="header-wrap ">
			<div class="header-wrap ">
            <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $logo = wp_get_attachment_image_src( $custom_logo_id ,'full');
                  if(is_page('sales')){ ?>
                    <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_theme_file_uri('/assets/images/seo-logo.png'); ?>" alt="hero-clock" class="logo-img top"></a>
                <?php  }else{ ?>
                    <a href="<?php echo get_site_url(); ?>"><img src="<?php echo $logo[0]; ?>" alt="hero-clock" class="logo-img top"></a>
               <?php } ?>

  			
  			</div>
  			<nav>
  			    
  				<a href="#" class="menulinks"><span></span></a>
  				<ul class="mainmenu">
                    <?php
                    wp_nav_menu( array(
                        'menu'              => 'Primary Menu',
                        'theme_location'    => 'top-menu',
                      ) );
                    ?>
  				</ul>
  			</nav>
  		  </div>
  		</div>
  	</header>
<style>
    
</style>