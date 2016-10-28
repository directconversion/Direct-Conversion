<?php get_header() ;
$menu = array();

?>


<section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="hero-content">
        <h1><?php echo get_field('hero-title') ; ?> </h1>
        <p><?php echo get_field('hero-text') ; ?> </p>
    </div>
    <div class="hero-menu">
        <?php if( have_rows('products') ): ?>
            <?php while( have_rows('products') ) : the_row();
                $currentRow = get_sub_field('product-branch');

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
    <section class="news-section products-section">
        <div class="products-grid">
            <?php if( have_rows('products') ): ?>
                <?php while( have_rows('products') ) : the_row(); remove_filter('acf_the_content', 'wpautop'); ?>
                    <?php $productBranchClass =  preg_replace('/\s+/', '', get_sub_field('product-branch')); ?>
                    <?php $firstMenuItem =  preg_replace('/\s+/', '', $menu[0]); ?>
                    <div class="product-grid-content <?php echo $productBranchClass; ?>" style="background-image: url('<?php echo get_sub_field('product-image') ; ?>')">
                        <div class="product-grid-overlay">
                            <p><?php echo get_sub_field('product-title') ; ?></p>
                        </div>
                        <a target="_blank" href="<?php echo get_sub_field('product-link') ; ?>"></a>
                    </div>
                <?php endwhile; ?>

            <?php endif; ?>
        </div>
        <div class="product-info">
            <div class="news-section-left">
                <div class="investor-section slide-effect">
                    <h1>The Ajat product line</h1>
                    <p>Over the past 20 years the X-ray imaging industry has undergone significant changes in the move to digital imaging. Our charge integrating AJAT sensor has been at the forefront of this change in being able to provide the market with leading sensitivity to photon radiation, high image resolution and sharpness even at low radiation dose. This long term development has resulted in established relationships with suppliers and partners across the world and built an expertise within the AJAT product team that specializes in: – Design and development of CdTe-CMOS, CdZnTe-CMOS, Si-CMOS radiation imaging sensors; – Single crystal interconnection to ASICs; – Electronic hardware and firmware with full custom ASIC design; – Image reconstruction, data processing and application software, Ajat products are now the leading direct conversion X-ray imaging detector in the Dental field</p>
                    <a href="#">more information</a>
                </div>
            </div>
            <div class="news-section-right">
                <?php dynamic_sidebar('global-sidebar') ; ?>
            </div>
        </div>
    </section>
</div>

<?php get_footer() ; ?>
