<?php get_header() ;
$menu = array();
?>


<section class="hero" style="background-image:radial-gradient(ellipse at 50% 100%, rgba(42,43,47, 0.4) 0%, rgba(42,43,47, 0.8) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
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
            <div data-value="<?php echo preg_replace(['/\(|\)/', '/\s+/', '/\.$/', '@[/\\\]@'], ['', '', '', ''], $item); ?>" class="hero-item contact-hero-item <?php if ( $key == 0 ) echo 'active-hero-item'; ?>">
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
                    <?php $peopleTypeClass =  preg_replace(['/\(|\)/', '/\s+/', '/\.$/', '@[/\\\]@'], ['', '', '', ''], get_sub_field('contact-company')); ?>
                    <?php $firstMenuItem =  preg_replace('/\s+/', '', $menu[0]); ?>
                    <div  id="<?php echo $peopleTypeClass; ?>" data-long="<?php the_sub_field('lng'); ?>" data-lat="<?php the_sub_field('lat'); ?>" class="contact-content slide-effect js-cone-grid-content <?php echo $peopleTypeClass . ' active-map'; ?>">
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

            </script>

        </div>
    </div>
</div>

<?php get_footer() ; ?>