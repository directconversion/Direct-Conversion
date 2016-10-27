<?php get_header() ;
$menu = array();
?>


<section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="hero-content">
        <h1><?php echo get_field('hero-title') ; ?> </h1>
        <p><?php echo get_field('hero-text') ; ?> </p>
    </div>
    <div class="hero-menu">
        <?php if( have_rows('contact') ): ?>
            <?php while( have_rows('contact') ) : the_row();
                $currentRow = get_sub_field('contact-company');

                if( !in_array($currentRow, $menu) ) {
                    array_push($menu, $currentRow);
                }else{
                    continue;
                }
            endwhile;

        endif;
        sort($menu);
        ?>

        <?php foreach ($menu as $key => $item) : ?>
            <div data-value="<?php echo preg_replace('/\s+/', '', $item); ?>" class="hero-item <?php if ( $key == 0 ) echo 'active-hero-item'; ?>">
                <p><?php echo $item ?></p>
            </div>
        <?php endforeach; ?>

    </div>
</section>
<div class="all-wrapper">
    <div class="contact-section">
        <div class="contact-section-left">
            <?php if( have_rows('contact') ): ?>
                <?php while( have_rows('contact') ) : the_row();  ?>
                    <?php $peopleTypeClass =  preg_replace('/\s+/', '', get_sub_field('contact-company')); ?>
                    <?php $firstMenuItem =  preg_replace('/\s+/', '', $menu[0]); ?>
                    <div data-long="<?php the_sub_field('lng'); ?>" data-lat="<?php the_sub_field('lat'); ?>" class="contact-content slide-effect <?php echo $peopleTypeClass . ' active-map'; ?>">
                        <?php echo get_sub_field('contact-content') ; ?>
                    </div>
                <?php endwhile; ?>

            <?php endif; ?>
        </div>
        <div class="contact-section-right">
            <div id="map"></div>
            <div></div>
        <input type="hidden" value="">
            <script>
                 var lat = $('.active-map').data('lat');
                 var long = $('.active-map').data('long');
                 console.log(lat);
                function initMap() {
                    var mapDiv = document.getElementById('map');
                    var uluru =  {lat: parseInt(lat), lng: parseInt(long)};
                    var map = new google.maps.Map(mapDiv, {
                        center: uluru,
                        zoom: 16,
                        scrollwheel: false


                    });
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                        title: 'Uluru (Ayers Rock)'
                    });
                }
            </script>

        </div>
    </div>
</div>

<?php get_footer() ; ?>