<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--<title>CyberValence</title>-->
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="<?php echo get_theme_file_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <?php /*<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122817492-1"></script>
 <script>
   window.dataLayer = window.dataLayer || [];
   function gtag(){dataLayer.push(arguments);}
   gtag('js', new Date());
   gtag('config', 'UA-122817492-1');
 </script> */ ?>
  <?php wp_head(); ?>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light fixed-top <?php echo $className; ?>">
         <div class="container-fluid px-lg-5  res-padding">
            <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_theme_file_uri(); ?>/assets/images/waymark-logo.png" class="web-logo" width="250"></a>
            
            <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>-->
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="nav navbar-nav ml-auto">
			  <?php
				$primaruMenu = wp_get_menu_array('primary-menu');
				foreach($primaruMenu as $primaruMenuItem){
					$active = "";
					if($primaruMenuItem['title'] == "Home"){
						$active = "active";
					}
				?>
				<li class="nav-item <?php echo $active; ?>">
					<a class="nav-link" href="<?php echo $primaruMenuItem['url']; ?>"><?php echo $primaruMenuItem['title']; ?></a>
				</li>
			  <?php } ?>
                  
               </ul>
            </div>
         </div>
      </nav>
	  <script type="text/javascript">
		  jQuery(".nav a").on("click", function(){
			  jQuery(".nav").find(".active").removeClass("active");
			  jQuery(this).parent().addClass("active");
		  });
		  jQuery(window).scroll(function () {
			 //console.log(jQuery(window).scrollTop())
			 if (jQuery(window).scrollTop() > 43) {
			   jQuery('.navbar').addClass('navbar-fixed');
			 }
			 if (jQuery(window).scrollTop() < 44) {
			   jQuery('.navbar').removeClass('navbar-fixed');
			 }
			 });
	  </script>