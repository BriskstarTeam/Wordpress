<?php wp_footer(); ?>
		<footer class="footer">
		 <div class="container">
			<div class="row content">
			   <div class="col-lg-3">
				  <img src="<?php echo get_theme_file_uri(); ?>/assets/images/logo.png" width="150">
				  <p class="copy-right">© <?php echo date('Y'); ?> Waymarkcapital</p>
			   </div>
			   <div class="col-lg-9">
				  <ul class="footer-menu">
					 <?php
						$footerMenu = wp_get_menu_array('footer-menu');
						foreach($footerMenu as $footerMenuItem){ 
						?>
						<li>
							<a href="<?php echo $footerMenuItem['url']; ?>"><?php echo $footerMenuItem['title']; ?></a>
						</li>
					<?php } ?>
					 <!--<li><a class="btn login-btn" href="http://www.waymarkcapital.com/login" target="_blank"></a></li>-->
				  </ul>
			   </div>
			</div>
		 </div>
		</footer>
	</body>
</html>
	  