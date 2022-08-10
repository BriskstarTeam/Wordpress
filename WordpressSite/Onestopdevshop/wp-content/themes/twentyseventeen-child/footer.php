<?php wp_footer(); ?>
<div id="10seos-badge" class="verified-icon" data-company-id="389245"></div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="footer_section">
  <div class="container">
    <?php if(!is_page('seo-wordpress-agency')){ ?>
      <div class="wrapper top">
        <div class="content _25">
          <div id="footer-widgets">
            <div class="widget-column footer-widget-1">
              <?php dynamic_sidebar( 'footer-1' ); ?>
            </div></div>
        </div>
        <div class="content _25">
          <div id="footer-widgets">
               <div id="footer-widget1">
                 <div class="widget-column footer-widget-1">
                   <?php dynamic_sidebar( 'footer-2' ); ?>
                 </div>
               </div>
           </div>
         </div>
        <div class="content _25">
          <div class="widget-column footer-widget-1">
            <?php dynamic_sidebar( 'footer-3' ); ?>
          </div>
        </div>
        <div class="content _25">
          <div id="footer-widgets">
               <div id="footer-widget1">
                 <div class="widget-column footer-widget-1">
                   <?php dynamic_sidebar( 'footer-4' ); ?>
                 </div>
               </div>
           </div>
        </div>
      </div>
    <?php } ?>

    <hr>
    <div class="footer-div">
      <div>
         <b><p >Made with <span><i class="fa fa-heart red" aria-hidden="true"></i></span> in <span id="spin"></span></p></b>
         <div class="below-link">
            <p>OneStopDevShop © <?php echo date('Y');?> </p>
            <p> // </p>
            <a href="<?php echo home_url(); ?>/privacy/" target="_blank">Privacy Policy</a>
         </div>
      </div>
      <div>
         <ul class="socila-links">
            <li><a href="https://www.facebook.com/groups/softwarestartupsgrowthhiring" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="https://twitter.com/geordiewardman" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href=" https://www.linkedin.com/in/geordiewardman/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
         </ul>
      </div>
   </div>
  </div>
</div>

<script>
setTimeout(function(){
  jQuery("template").eq(38).attr("id");
  var tag_new = jQuery("template").last().attr("id");
  console.log(tag_new);
  jQuery('#'+tag_new).css("display","none");
  jQuery('#',+tag_new).next().next().css('display','none');
},100);
</script>
</body>
</html>
