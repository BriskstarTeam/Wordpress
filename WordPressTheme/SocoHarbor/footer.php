<!--  START FOOTER SECTION  -->
<section id="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-center">
          <div class="footer-topbar"> <a href="<?php echo site_url();?>"><img src="<?php echo get_theme_file_uri();?>/assets/img/SOCO HARBOR.png" class="img-fluid footer-logo" /></a>
                <?php
                    wp_nav_menu( array( 'theme_location' => 'footer-menu','container' => false,'menu_class' => 'footer_ul') ); 
                ?>
          </div>
        </div>
      </div>
    </div>
    <p class="info footer_text"><i class="far fa-copyright"></i> <?php echo currentYear(); ?> SOCO Harbor, All Rights</p>
  </section>
</div>
<?php wp_footer(); ?>
</body>
</html>
