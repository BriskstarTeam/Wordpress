<?php 
    /*
     * Template Name: Photogallery Page
     */
    ?>
<?php get_header(); ?>
<section class="photogallery section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="section-title">SOCO Harbor Photo Gallery</h2>
            </div>
        </div>
        <div class="cont">
            <div id="js-grid-masonry-projects" class="cbp cbp-l-grid-masonry-projects lightgallery">
                <?php 
                    $gallery = get_field('gallery');
                    if( $gallery ): 
                    	foreach( $gallery as $content ): 	
                    		if ($content['type'] == 'Image') { ?>
                <div class="cbp-item" data-src="<?php echo $content['image']; ?>">
                    <div class="cbp-caption">
                        <div class="cbp-caption-defaultWrap"> <img src="<?php echo $content['image']; ?>"> </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body"> <img src="<?php echo get_theme_file_uri();?>/assets/img/plus-icon.png"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else { 
                    $image = explode('v=', $content['video']);
                    ?>
                <div class="cbp-item"  data-src="<?php echo $content['video']; ?>">
                    <div class="cbp-caption">
                        <div class="cbp-caption-defaultWrap"> <img src="https://i.ytimg.com/vi/<?php echo $image[1]; ?>/maxresdefault.jpg"> </div>
                        <div class="cbp-caption-activeWrap">
                            <div class="cbp-l-caption-alignCenter">
                                <div class="cbp-l-caption-body"> <img src="<?php echo get_theme_file_uri();?>/assets/img/plus-icon.png"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 	}
                    endforeach;  
                    endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>