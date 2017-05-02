<?php get_header() ;
$menu = array();

?>


<section class="hero" style="background-image: url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="hero-content">
        <h1><?php echo get_field('hero-title') ; ?> </h1>
        <p><?php echo get_field('hero-text') ; ?> </p>
    </div>
    <div class="hero-menu">
<!--        --><?php //if( have_rows('products') ): ?>
<!--            --><?php //while( have_rows('products') ) : the_row();
//                $currentRow = get_sub_field('product-branch');
//
//                if( !in_array($currentRow, $menu) ) {
//                    array_push($menu, $currentRow);
//                }else{
//                    continue;
//                }
//            endwhile;
//
//        endif;
//        sort($menu);
//        ?>
        <div data-value="" class="hero-item active-hero-item">
            <a href="#Ajatproductline">Ajat product line</a>
        </div>
        <div data-value="" class="hero-item">
            <a href="#XCounterproductline">XCounter product line</a>
        </div>
<!--        --><?php //foreach ($menu as $key => $item) : ?>
<!--            <div data-value="--><?php //echo preg_replace('/\s+/', '', $item); ?><!--" class="hero-item --><?php //if ( $key == 0 ) echo 'active-hero-item'; ?><!--">-->
<!--                <p>--><?php //echo $item ?><!--</p>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>

    </div>
</section>
<div class="all-wrapper">
    <section class="news-section products-section">
        <div class="product-info">
            <div class="news-section-left">
                <?php if( have_rows('product-info') ): ?>
                    <?php while( have_rows('product-info') ) : the_row(); remove_filter('acf_the_content', 'wpautop'); ?>
                        <?php $productBranchClass =  preg_replace('/\s+/', '', get_sub_field('product-info-branch')); ?>
                        <div class="investor-section slide-effect  <?php echo $productBranchClass; ?>" id="<?php echo $productBranchClass; ?>" data-name="<?php echo $productBranchClass; ?>">
                            <?php echo get_sub_field('product-info-content') ; ?>
                            <div class="products-grid">
                                <?php if( have_rows('products') ): ?>
                                    <?php while( have_rows('products') ) : the_row(); remove_filter('acf_the_content', 'wpautop'); ?>
                                        <?php $productBranchClass =  preg_replace('/\s+/', '', get_sub_field('product-branch')); ?>
                                        <?php $firstMenuItem =  preg_replace('/\s+/', '', $menu[0]); ?>
                                        <div class="product-grid-content  <?php echo $productBranchClass; ?>" style="background-image: url('<?php the_sub_field('product-image') ; ?>')">
                                            <div class="product-grid-overlay">
                                                <p><?php echo get_sub_field('product-title') ; ?></p>
                                            </div>
                                            <a target="_blank" href="<?php echo get_sub_field('product-link') ; ?>"></a>
                                        </div>
                                    <?php endwhile; ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="news-section-right">
                <?php if( have_rows('product-info') ): ?>
                    <?php while( have_rows('product-info') ) : the_row(); remove_filter('acf_the_content', 'wpautop'); ?>
                        <?php $productBranchClass =  preg_replace('/\s+/', '', get_sub_field('product-info-branch')); ?>
                        <div class="<?php echo $productBranchClass; ?>">
                            <?php dynamic_sidebar(get_sub_field('product-info-branch')) ; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
<!--        <div class="product-button">-->
<!--                --><?php //foreach( $menu as $key => $m_item ) :  ?>
<!--                    --><?php //$key == 0 ? $i = 1 : $i = 0;  ?>
<!--                    <div style="display: none" class="change-productline --><?php //echo preg_replace('/\s+/', '', $m_item); ?><!-- js-cone-grid-content">-->
<!--                        <p>--><?php //echo  $menu[$i]; ?><!--<i class="material-icons">arrow_forward</i></p>-->
<!--                    </div>-->
<!--                --><?php //endforeach; ?>
<!--        </div>-->
    </section>
</div>

<?php get_footer() ; ?>
