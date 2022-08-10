<?php 
    /*
     * Template Name: tet Page
     */
    ?>
<?php get_header(); ?>
<section id="home">
    <div class="banner-section">
        <?php if(get_field('banner_type') == 'Video'): {?>
        <video controls="" autoplay="" playsinline="" muted="" loop="" disablepictureinpicture="" controlslist="nodownload">
            <source src="<?php the_field('banner_video'); ?>" >
        </video>
        <?php } ?>
        <?php elseif(get_field('banner_type') == 'Image' ): ?><img src="<?php the_field('banner_image'); ?>" />
        <?php endif; ?>
        <div class="container-fluid">
            <div class="banner-text">
                <h1><?php the_field('banner_title'); ?></h1>
                <p><?php the_field('address'); ?> <?php the_field('zipcode'); ?> </p>
            </div>
        </div>
    </div>
</section>
<div class="main_content">
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
            
                    echo '<div class="slide-item">
                    <div class="pdp_detail_box"> <img src="'.$pdp_icon.'" loading="lazy">
                      <h3 class="">'.$pdp_value.' </h3>
                      <p class="sq_feet">'.$pdp_attribute.'</p>
                    </div>
                  </div>';
                endwhile;
              else : 
            endif;
            ?>
    </div>
</section>
<section class="available-space section-padding" id="AvailableSpace">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="available-space-content">
                    <?php the_field('description'); ?>        
                    <?php if( get_field('leasing_brochure_file') ): ?><a href="<?php the_field('leasing_brochure_file'); ?>" download ><button class="btn primary-btn">Download Leasing Brochure</button></a><?php endif; ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table table-fixed available-space-table">
                        <thead>
                            <tr>
                                <th width="40%">Suite Number</th>
                                <th width="40%">Rentable Area</th>
                                <th width="20%">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $args = array( 'post_type' => 'suites', 'posts_per_page' => -1 , 'orderby' => 'title', 'order'  => 'ASC',);
                                $the_query = new WP_Query( $args ); 
                                ?>
                            <?php if ( $the_query->have_posts() ) : ?>
                            <?php 
                                foreach($the_query->posts as $keys => $value)
                                { ?>
                            <tr>
                                <td width="40%"><?php echo get_the_title($value->ID); ?></td>
                                <td width="40%" class="rentable_area"><?php $rentable_area = get_field( "rentable_area", $value->ID ); echo $rentable_area;?> SF</td>
                                <td width="20%"><a class="btn primary-btn" href="<?php echo get_the_permalink($value->ID); ?>">View</a></td>
                            </tr>
                            <?php 
                                } 
                                //wp_reset_postdata();
                                ?>
                            <?php else:  ?>
                            <p><?php _e( 'Sorry, no posts found' ); ?></p>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="current-tenants section-padding" id="CurrentTenants">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title">Current Tenants</h2>
            </div>
        </div>
        <div class="row">
            <?php
                if( have_rows('tenants') ):
                 while( have_rows('tenants') ) : the_row();
                  $tenant_image = get_sub_field('tenant_image');            
                  echo '
                  <div class="col-md-6 col-lg-3">
                          <div class="tenant-box"> <img src="'.$tenant_image.'" class="img-fluid" /> </div>
                          </div>';
                 endwhile;
                else :
                endif;
                ?> 
        </div>
    </div>
</section>
<section class="photogallery section-padding" id="photogallery">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title">Photo Gallery</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div id="photogallery-slider" class="slider photogallery-slider">
                    
                    <?php 
                        $post_id = "";
                        $gallery = get_field('gallery',136);
                        if( $gallery ): 
                            foreach( $gallery as $content ):    
                                if ($content['type'] == 'Image') { ?>
                                    <figure class="photogallery-slider-image" data-src="<?php echo $content['image']; ?>">
                                        <a class="" data-src="<?php echo $content['image']; ?>" href="<?php echo $content['image']; ?>" >
                                            <img src="<?php echo $content['image']; ?>" alt="" />
                                        </a>
                                        <div class="cbp-caption-activeWrap">
                                            <div class="cbp-l-caption-alignCenter">
                                                <div class="cbp-l-caption-body" href="<?php echo $content['image']; ?>"> 
                                                    <img src="<?php echo get_theme_file_uri();?>/assets/img/plus-icon.png">    
                                                </div> 
                                            </div>
                                        </div> 
                                    </figure>
                    <?php } 
                        else {
                            $image = explode('v=', $content['video']); ?>
                                <figure class="">
                                    <a class="custom-selector" data-src="<?php echo $content['video']; ?>" href="<?php echo $content['video']; ?>" >
                                        <img src="https://i.ytimg.com/vi/<?php echo $image[1]; ?>/maxresdefault.jpg" alt="" />
                                    </a>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignCenter">
                                            <div class="cbp-l-caption-body"> <img src="<?php echo get_theme_file_uri();?>/assets/img/plus-icon.png"> </div>
                                        </div>
                                    </div>
                                </figure>
                    <?php }
                        endforeach;  
                        endif;?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="amenities section-padding" id="Amenities">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title">Amenities</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="amenities-imgbox">
                    <?php if( get_field('left_image') ): ?><img src="<?php the_field('left_image'); ?>" class="img-fluid" /><?php endif; ?>
                    <div class="bottom-icon"><i class="fas fa-arrow-down"></i></div>
                </div>
                <div class="amenities-contentbox">
                    <?php 
                        $left_title = get_field("left_title");
                        $left_description = get_field("left_description");
                        
                        if (isset($left_title))
                        {
                            echo '<h4 class="list-title">'; echo $left_title; echo '</h4>';
                            echo $left_description;
                        }
                        else
                        {
                            echo $left_description;
                        }
                        ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="amenities-imgbox">
                    <?php if( get_field('middle_image') ): ?><img src="<?php the_field('middle_image'); ?>" class="img-fluid" /><?php endif; ?>
                    <div class="bottom-icon"><i class="fas fa-arrow-down"></i></div>
                </div>
                <div class="amenities-contentbox">
                    <?php 
                        $middle_title = get_field("middle_title");
                        $middle_description = get_field("middle_description");
                        
                        if (isset($middle_title))
                        {
                            echo '<h4 class="list-title">'; echo $middle_title; echo '</h4>';
                            echo $middle_description;
                        }
                        else
                        {
                            echo $middle_description;
                        }
                        ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="amenities-imgbox">
                    <?php if( get_field('right_image') ): ?><img src="<?php the_field('right_image'); ?>" class="img-fluid" /><?php endif; ?>
                    <div class="bottom-icon"><i class="fas fa-arrow-down"></i></div>
                </div>
                <div class="amenities-contentbox">
                    <?php 
                        $right_title = get_field("right_title");
                        $right_description = get_field("right_description");
                        
                        if (isset($right_title))
                        {
                            echo '<h4 class="list-title">'; echo $right_title; echo '</h4>';
                            echo $right_description;
                        }
                        else
                        {
                            echo $right_description;
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    include 'location.php';
    ?>
<section class="contact section-padding" id="Contact">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title"> Contact </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-11 mx-auto">
                <div class="slider slider-contact">
                    <?php          
                        $featured_posts = get_field('contact');
                        if( $featured_posts ): 
                            foreach( $featured_posts as $post ): 
                               setup_postdata($post); ?>
                    <div class="teamMember_box">
                        <div class="team_img"><img src="<?php $image= get_field( 'image' ); echo $image;?>" > </div>
                        <div class="team_content">
                            <h4><?php $name= get_field( 'name' ); echo $name;?></h4>
                            <p class="agent_designation"><?php $designation= get_field( 'designation' ); echo $designation;?> </p>
                            <a href="tel:<?php $phone_no= get_field( 'phone_no'); echo $phone_no;?> ">
                                <p class="phone"><?php echo $phone_no;?> </p>
                            </a>
                            <a href="mailto:<?php $email= get_field( 'email'); echo $email;?>"> <?php echo $email;?></a>
                            <p>CA RE Lic. #<?php $lic_no= get_field( 'lic_no' ); echo $lic_no;?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>   
<?php get_footer(); ?>