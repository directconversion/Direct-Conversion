<?php get_header() ;
$menu = array();

?>


<section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
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
                    <div class="product-grid-content js-cone-grid-content <?php echo $productBranchClass; ?>" style="background-image: url('<?php echo get_sub_field('product-image') ; ?>')">
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
                <?php if( have_rows('product-info') ): ?>
                    <?php while( have_rows('product-info') ) : the_row(); remove_filter('acf_the_content', 'wpautop'); ?>
                        <?php $productBranchClass =  preg_replace('/\s+/', '', get_sub_field('product-info-branch')); ?>
                        <div class="investor-section slide-effect js-cone-grid-content <?php echo $productBranchClass; ?>">

                        <?php echo get_sub_field('product-info-content') ; ?>

                        <a href="#">more information</a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="news-section-right">
                <?php dynamic_sidebar('global-sidebar') ; ?>
            </div>
        </div>
        <div class="product-button">
            <div>
                <a href="http://xcounter.com/products/" target="_blank"></a>
                <p>XCounter product line <i class="material-icons">arrow_forward</i></p>
            </div>
        </div>
    </section>
</div>

<?php get_footer() ; ?>
