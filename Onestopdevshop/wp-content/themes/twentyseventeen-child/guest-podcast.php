<?php
   /* Template Name: Guest Podcast page */
   get_header();
   ?>

<?php
    $as_featured_title = get_field('as_featured_title');
    $as_featured_details = get_field('as_featured_details');
    $main_image = get_field('main_image');
?>
<div class="hero-section podcast__banner mobile_bg cust-hero-section">
   <div class="hero-wrapper podcast__banner__wrapper pb-0 cust-hero-wrapper">
      <div class="container ">
         <div class="banner_bg_color p-0">
            <div class="blog__banner_content flex-wrap">
               <div class="hero-content blog__banner_p w-80">
                  <h1 class="hero-h1"><?php echo $as_featured_title; ?></h1>
                  <p class="hero-p"><?php echo $as_featured_details; ?></p>
                  <div class="wpcf7-response-output wpcf7-display-none"></div>
               </div>
               <div class="hero-content blog__banner_p display_aliment vidio_pos w-40">
                  <img src="<?php echo $main_image['url']; ?>" alt="<?php echo $main_image['name']; ?>" class="podcast-img">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="section lightblue custom_p_m section-bottomPadding">
   <div class="container ">
      <div class="banner_bg_color p-0">
         <div class="blog__banner_content podcast-listing">
            <?php 
            if( get_query_var('page') ) {
              $page = get_query_var( 'page' );
            } else {
              $page = 1;
            }
            
            // Variables
            $row              = 0;
            $showRecordPerPage  = 20; // How many images to display on each page
            $podcast           = get_field( 'guest_podcast_details' );
            $total            = count( $podcast );
            $pages            = ceil( $total / $showRecordPerPage );
            $min              = ( ( $page * $showRecordPerPage ) - $showRecordPerPage ) + 1;
            $max              = ( $min + $showRecordPerPage ) - 1;
            
            
            $startFrom = ($page * $showRecordPerPage) - $showRecordPerPage;
            
            $podcast = get_field( 'guest_podcast_details' );
            $lastPage = ceil($total/$showRecordPerPage);
            $firstPage = 1;
            $nextPage = $page + 1;
            $previousPage = $page - 1;
            

            if (have_rows('guest_podcast_details')):
                while (have_rows('guest_podcast_details')): the_row();
                    $row++;

                    // Ignore this image if $row is lower than $min
                    if($row < $min) { continue; }
                    
                    // Stop loop completely if $row is higher than $max
                    if($row > $max) { break; }
                    
                    $podcast_image = get_sub_field('podcast_image');
                    $podcast_name = get_sub_field('podcast_name');
                    $host_name = get_sub_field('host_name');
                    $podcast_details = get_sub_field('podcast_details');
                    $podcast_url = get_sub_field('podcast_url');
                    ?>
                    <div class="podcast-list">
                       <div>
                          <a href="<?php echo $podcast_url; ?>" target="_blank"><img src="<?php echo $podcast_image['url']; ?>" alt="<?php echo $podcast_image['name']; ?>" class="podcast-img"></a>
                       </div>
                       <div class="content">
                          <a href="<?php echo $podcast_url; ?>" target="_blank"><h4><?php echo $podcast_name; ?></h4></a>
                          <p><?php echo $podcast_details; ?></p>
                          <h5>Host: <span class="bule-text"><?php echo $host_name; ?></span></h5>
                       </div>
                       <div class="link">
                          <a href="<?php echo $podcast_url; ?>" target="_blank">View <span><i class="fa fa-external-link" aria-hidden="true"></i></span></a>
                       </div>
                    </div>
                    <?php
                 endwhile; ?>
                 <nav aria-label="Page navigation">
                    <ul class="pagination">
                    <?php if($page != $firstPage) { ?>
                    <li class="page-item">
                    <a class="page-link" href="<?php echo home_url(); ?>/?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
                    <span aria-hidden="true">First</span>
                    </a>
                    </li>
                    <?php } ?>
                    <?php if($page >= 2) { ?>
                    <li class="page-item"><a class="page-link" href="<?php echo home_url(); ?>/?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
                    <?php } ?>
                    <li class="page-item active"><a class="page-link" href="<?php echo home_url(); ?>/?page=<?php echo $page ?>"><?php echo $page ?></a></li>
                    <?php if($page != $lastPage) { ?>
                    <li class="page-item"><a class="page-link" href="<?php echo home_url(); ?>/?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
                    <li class="page-item">
                    <a class="page-link" href="<?php echo home_url(); ?>/?page=<?php echo $lastPage ?>" aria-label="Next">
                    <span aria-hidden="true">Last</span>
                    </a>
                    </li>
                    <?php } ?>
                    </ul>
                    </nav>
                <?php
             endif;
           ?>
         </div>
      </div>
   </div>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

    <?php get_footer(); ?>





