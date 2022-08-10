<?php
   get_header();
   if (have_posts()):
       while (have_posts()):
           the_post();
   ?>
<?php
   $suite_location = get_field('suite_location');
   ?>
<section class="innerpage-banner">
   <?php if (!empty($suite_video_link = get_field('suite_video_link'))){ ?>
        <iframe id="video" width="100%" class="pdp_banner_youtube" src="" allow="autoplay" frameborder="0"></iframe>           
    <?php
        }
        elseif (!empty(get_field('suite_video')))
        {
          ?><video controls="" autoplay="" playsinline="" muted="" loop="" disablepictureinpicture="" controlslist="nodownload" >
            <source src="<?php the_field('suite_video'); ?>" >
        </video>
        <?php }
        else
        {
          the_content(); ?>
            <div class="view-btn-box"><a class="view-btn" href="#"><img src="<?php echo get_theme_file_uri() ?>/assets/img/360-icon.svg" class="img-fluid" /></a></div>
   <?php
      } ?> 
</section>
<section class="contact section-padding loading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title margin-bottom-remove"><?php echo the_title();?></h2>
            </div>
        </div>
    </div>
</section>
    <section class="details_strap d-none d-sm-block" id="section1">
        <div class="pdp_details_mainbox">
            <ul>
                <?php
                    // Check rows exists.
                    if( have_rows('pdp_details_box') ):
                    
                        // Loop through rows.
                        while( have_rows('pdp_details_box') ) : the_row();
                    
                            // Load sub field value.
                            $pdp_icon = get_sub_field('pdp_icon');
                            $pdp_attribute = get_sub_field('pdp_attribute');
                            $pdp_value = get_sub_field('pdp_value');
                    
                            echo '<li>
                    <div class="pdp_detail_box"> 
                    <img src="'.$pdp_icon.'" alt="" loading="lazy">
                            <h3 class="">'.$pdp_value.'</h3>
                              <p class="sq_feet">'.$pdp_attribute.'</p>
                            </div>
                          </li>';
                        endwhile;
                      else : 
                    endif;
                    ?>
            </ul>
        </div>
    </section>
    <section class="details_strap d-md-none">
        <div class="details_strap_slider slider">
            <?php
                // Check rows exists.
                if( have_rows('pdp_details_box') ):
                
                    // Loop through rows.
                    while( have_rows('pdp_details_box') ) : the_row();
                
                        // Load sub field value.
                        $pdp_icon = get_sub_field('pdp_icon');
                        $pdp_attribute = get_sub_field('pdp_attribute');
                        $pdp_value = get_sub_field('pdp_value');
                
                        echo '<div class="slide-item loading" style = "display : none">
                        <div class="pdp_detail_box"> <img src="'.$pdp_icon.'" loading="lazy">
                          <h3 class="">'.$pdp_value.'</h3>
                          <p class="sq_feet">'.$pdp_attribute.'</p>
                        </div>
                      </div>';
                    endwhile;
                  else : 
                endif;
                ?>
        </div>
    </section>
</section>
<section class="feature-slider section-padding loading" style = "display : none">
    <div class="container-fluid">
        <div class="row row-alignment">
            <div class="col-lg-6">
                <div class="floorplan-img"> <img src="<?php the_field('floor_plan_image'); ?>" class="img-fluid" /> </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <div class="slider slider-for" id="feature-slider">
                        <?php 
                            $slider_images = get_field('slider_images');
                            if( $slider_images ): 
                                ?>
                        <?php foreach( $slider_images as $image ):  ?>
                        <div data-download-url=false data-src="<?php echo $image; ?>    " > 
                            <a href="<?php echo $image; ?>"> 
                            <img src="<?php echo $image; ?>" class="img-fluid" loading="lazy"/> 
                            </a> 
                        </div>
                        <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="" id="oepl_map" style="display: none; height: 471px;">
                    </div>
                    <div class="" id="oepl_panorama" style="display: none; height: 471px;">
                    </div>
                    <a href="javascript:void(0);" class="gallary-icon">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/gallary-icon.png" alt="slider" loading="lazy">
                        <p>Gallery</p>
                    </a>
                    <a href="javascript:void(0);" class="location-icon">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/location-icon.png" loading="lazy">
                        <p>Map</p>
                    </a>
                    <a href="javascript:void(0);" class="streetview-icon" id="streetview">
                        <img src="<?php echo get_theme_file_uri();?>/assets/img/streetview.png" alt="slider" loading="lazy">
                        <p>Street View</p>
                    </a>
                </div>
                <div class="featured-option">
                    <a class="primary-btn btn-lg" href="<?php echo get_field('flyer_file');?>" download>Download flyer</a> 
                    <a href="javascript:void(0);" class="primary-btn btn-lg"  data-toggle="modal" data-target="#myModal" > Schedule Tour</a> 
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact section-padding loading" style="display: none">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="section-title"> Brokers </h2>
        </div>
    </div>
    <div class="row">
    <div class="col-xl-11 mx-auto">
        <div class="slider slider-contact">
             <?php          
                        $featured_posts = get_field('broker');
                        if( $featured_posts ): 
                            foreach( $featured_posts as $post ): 
                               setup_postdata($post); ?>
                    <div class="teamMember_box">
                        <div class="team_img"><img src="<?php $image= get_field( 'profile_image' ); echo $image;?>" > </div>
                        <div class="team_content">
                            <h4><?php $name= get_field( 'name' ); echo $name;?></h4>
                            <p class="agent_designation"><?php $designation= get_field( 'designation' ); echo $designation;?> </p>
                            <a href="tel:<?php $phone_no= get_field( 'phone'); echo $phone_no;?> ">
                                <p class="phone"><?php echo $phone_no;?> </p>
                            </a>
                            <a href="mailto:<?php $email= get_field( 'e-mail_address'); echo $email;?>"> <?php echo $email;?></a>
                            <p>CA RE Lic. <?php
                                                if( have_rows('add_license') ):
                                                    while( have_rows('add_license') ) : the_row();
                                                        $add_license = get_field('add_license');
                                                        $lic_no = $add_license[0]['license_no'];
                                                    endwhile;    
                                                    echo $lic_no;
                                                else :
                                                endif;
                                                ?></p>
                        </div>              
                    </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
        </div>
    </div>
</section>
<!-- Modal for schedule toor button-->
<div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="section-title">Schedule Tour</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <!-- Schedule tour contact form -->
            <?php echo do_shortcode('[contact-form-7 id="241" title="Schedule Tour"]'); ?>
            <!-- Modal footer -->
        </div>
    </div>
</div>

<!-- Modal for schedule toor submitted successfully-->
    <div class="modal" id="myModalsubmitted">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <!-- Schedule tour contact form -->
            <div class="modal-body pb-4">
        <div class="row">
        <div class="col-md-12">
        <div><p class="text-left text-center">Thank you for your inquiry. A member of our team will be in touch shortly.</p></div>
          </div>
        </div>
      </div>
            <!-- Modal footer -->
     

        </div>
        </div>
    </div>

    <!-- Modal for schedule toor not submitted successfully-->
    <div class="modal" id="myModalerror">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <!-- Schedule tour contact form -->
            <div class="modal-body pb-4">
        <div class="row">
        <div class="col-md-12">
        <div><p class="text-left text-center">Sorry, Something went wrong.</p></div>
          </div>
        </div>
      </div>
            <!-- Modal footer -->
     

        </div>
        </div>
    </div>
<?php endwhile; 
    endif;?>

<script type="text/javascript">

    jQuery( document ).ready(function() {
        var url = "<?php echo $suite_video_link; ?>";
        var ID = YouTubeGetID(url);
        //console.log(ID);
        if($("#video").length){
            $("#video")[0].src = "https://www.youtube-nocookie.com/embed/" + ID + "?controls=0&autoplay=1&mute=1&playlist=" + ID +"&loop=1&modestbranding=1";
        }
        function YouTubeGetID(url)
        {
            url = url.split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
            return (url[2] !== undefined) ? url[2].split(/[^0-9a-z_\-]/i)[0] : url[0];
        }
        var wpcf7Elm = document.querySelector( '.wpcf7' );
        wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) { 
            $('#myModal').modal('hide');
            $('#myModalsubmitted').modal('show');
        }, false );

        var wpcf7Elm = document.querySelector( '.wpcf7' );
        wpcf7Elm.addEventListener( 'wpcf7mailfailed', function( event ) {
            $('#myModalerror').modal('show');
        }, false );

        var market = '{"latitude":"<?php echo $suite_location['lat']?>","longitude":"<?php echo $suite_location['lng']?>","title":"<?php $suite_location['address']?>"}';
        propertymap.setup({
          marker : '{"latitude":"<?php echo $suite_location['lat']?>","longitude":"<?php echo $suite_location['lng']?>","title":"<?php echo $suite_location['address']?>"}',
          //setMapTypeId : '{"latitude":"34.060976","longitude":"-118.414892","title":"test09July1"}',
      });
        jQuery('.location-icon').click(function(){
            jQuery('#feature-slider').hide();
            jQuery('#oepl_map').show();
            jQuery('#oepl_panorama').hide();
        });
            
        jQuery('.gallary-icon').click(function(){
            jQuery('#feature-slider').show();
            jQuery('#oepl_map').hide();
            jQuery('#oepl_panorama').hide();
        });
        jQuery('#streetview').click(function(){
            jQuery('#feature-slider').hide();
            jQuery('#oepl_map').hide();
            jQuery('#oepl_panorama').show();
            propertymap.setMapTypeId(market);
        });
    });
</script>
<?php get_footer(); ?>