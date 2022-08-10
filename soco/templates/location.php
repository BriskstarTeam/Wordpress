<?php
$latitude = get_field('latitude');
$longitude = get_field('longitude');
$main_address = get_field('address');
?>
<style type="text/css">
    #map_Stree_view{
        width: 100%;
        float: left;
        background: #333;
        height: 600px;
    }
</style>
<section id="location" class="section-padding pb-0">
    <div id="section-location" data-magellan-target="section-location"></div>
    <h2 class="section-title"> Location</h2>
    <nav id="map-categories" class="active">
        <ul>
            <li class="active" data-id="restaurant"><i class="fas fa-circle" style="color: #E1E13D;"></i> Restaurant</li>
            <li class="active" data-id="supermarket"><i class="fas fa-circle" style="color: #0EAD45;"></i> Supermarket</li>
            <li class="active" data-id="airport"><i class="fas fa-circle" style="color: #000;"></i> Airport</li>
            <li class="active" data-id="bus_station"><i class="fas fa-circle" style="color: #D8569B;"></i> Bus Station</li>
            <li class="active" data-id="train_station"><i class="fas fa-circle" style="color: #47E6C6;"></i> Train Station</li>
            <li class="active" data-id="gym"><i class="fas fa-circle" style="color: #FF8F00;"></i> Gym</li>
            <li class="active" data-id="hospital"><i class="fas fa-circle" style="color: #F50E11;"></i> Hospital</li>
        </ul>
    </nav>
    <a href="javascript:void(0);" class="location-icon">
                <img src="<?php echo get_theme_file_uri();?>/assets/img/location-pin.png" loading="lazy">
                <p>Map View</p>
            </a>
    <div id="map-container">
        <div id="map_canvas" data-latitude="<?php echo $latitude; ?>" data-longitude="<?php echo $longitude; ?>" data-zoom="14"></div>
        <div class="" id="map_Stree_view"></div>
        <div id="map-tooltip" class="hide"></div>
        <div class="zoom-control show-for-medium">
            <div class="map-type button">
                <i class="fas fa-layer-group"></i> Map Type
                <div class="map-type-options">
                    <ul>
                        <li><img src="<?php echo get_theme_file_uri();?>/assets/img/default.jpg"><a map-type="default" href="#">Default</a></li>
                        <li><img src="<?php echo get_theme_file_uri();?>/assets/img/satelite.jpg"><a map-type="satellite" href="#">Aerial</a></li>
                        <li><img src="<?php echo get_theme_file_uri();?>/assets/img/terrain.jpg"><a map-type="terrain" href="#">Terrain</a></li>
                    </ul>
                </div>
            </div>
            <!-- <div class="center-in button"><i class="icon-location-arrow"></i></div> -->
            
            <div class="zoom-slider-container">
                <div class="zoom-out button">-</div>
                <div id="zoom-slider"></div>
                <div class="zoom-in button">+</div>
            </div>
            <div class="button get-directions"><a href="https://www.google.com/maps/dir/Current+Location/<?php echo $latitude ?>,<?php echo $longitude ?>" target="_blank"><i class="fas fa-directions"></i> Get Directions</a></div>
            <div class="button street-view"><a class="street_view_show"><i class="fas fa-street-view"></i> Street View</a></div>
            <div class="button fullscreen"><a id="enter-full-screen" href="#" target="_blank"><i class="fas fa-expand-arrows-alt"></i> Fullscreen</a></div>
        </div>
    </div>
</section>
<?php
$location = get_field('location');

$map = array();
$map[] =   array(
        'lat'       => $latitude,
        'lng'       => $longitude,
        'address'   => $main_location['address']['address'],
        'category'  => '',
        'name'      => $main_location['address']['address'],
        'logo_media_id' => 0,
        'logo_url'  => get_theme_file_uri().'/wp-content/themes/soco/assets/img/marker_location.png',
    );
foreach ($location as $key => $value) {
    $map[] = array(
        'lat'       => $latitude,
        'lng'       => $longitude,
        'address'   => $value['address']['address'],
        'category'  => $value['category'],
        'name'      => $value['address']['address'],
        'logo_media_id' => $key+1,
        'logo_url'  => get_theme_file_uri().'/wp-content/themes/soco/assets/img/dots/'.$value['category'].'.png',
    );
}

?>

<script type="text/javascript">
    var map_s_data = '<?php echo json_encode($map); ?>';
</script> 
<script type="text/javascript">
        jQuery( document ).ready(function() {
            var market = '{"latitude":"<?php echo $latitude ?>","longitude":"<?php echo $longitude ?>","title":"<?php echo $main_address; ?>","cate":"soco"}';
           
            var pot = { lat: <?php echo $latitude ?>, lng: <?php echo $longitude ?> };
                propertymap.setup({
                    marker : market,
                    pot : { lat: <?php echo $latitude ?>, lng: <?php echo $longitude ?>,'title': "<?php echo $main_address; ?>"},
                    setMapTypeId : '{"latitude":"<?php echo $longitude; ?>","longitude":"<?php echo $longitude; ?>","title":"<?php echo $main_address; ?>"}',
                });

            $(".street_view_show").click(function() {
                $('#map_canvas').hide();
                $('#map_Stree_view').show();
                $('.location-icon').css('visibility', 'visible');
                propertymap.setMapTypeId(market);
            });

            $('.location-icon').click(function()
            {
                $('#map_canvas').show();
                $('.location-icon').css('visibility', 'hidden');
                propertymap.setMapTypeId(market);
            });
            
        });
    </script>