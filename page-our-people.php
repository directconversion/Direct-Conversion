<?php get_header() ;
$menu = array();

?>


    <section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
        <div class="hero-content">
            <h1><?php echo get_field('hero-title') ; ?> </h1>
            <p><?php echo get_field('hero-text') ; ?> </p>
        </div>
        <div class="hero-menu">
            <?php if( have_rows('our-people') ): ?>
                <?php while( have_rows('our-people') ) : the_row();
                    $currentRow = get_sub_field('people-type');

                    if (strpos($currentRow, ';') !== false) {
                        $multipleBranch = explode(';',$currentRow);
                        foreach ($multipleBranch as $branch){
                            if( !in_array($branch, $menu) ) {
                                array_push($menu, $branch);
                            }else{
                                continue;
                            }
                        }
                    }else{
                        if( !in_array($currentRow, $menu) ) {
                            array_push($menu, $currentRow);
                        }else{
                            continue;
                        }
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
    <section class="people-grid">
        <?php if( have_rows('our-people') ): ?>
            <?php while( have_rows('our-people') ) : the_row(); remove_filter('acf_the_content', 'wpautop'); ?>
                <?php $peopleTypeClass =  preg_replace('/\s+/', '', get_sub_field('people-type')); ?>
                <?php $firstMenuItem =  preg_replace('/\s+/', '', $menu[0]);

                if (strpos($peopleTypeClass, ';') !== false) {
                    $multipleBranch = explode(';',$peopleTypeClass);
                    $peopleTypeClass = '';
                    foreach ($multipleBranch as $branch){
                        $peopleTypeClass .= $branch;
                        $peopleTypeClass .= ' ';
                    }
                }
                ?>
                <div class="people-grid-content js-cone-grid-content <?php echo $peopleTypeClass; ?>">
                    <input type="hidden" class="hidden-biography" value="<?php the_sub_field( 'people-biography' )?>">
                    <div class="people-grid-image" style="background-image: url('<?php echo get_sub_field('people-image') ; ?>')">
                        <div class="people-grid-overlay">
                            <p>Biography</p>
                        </div>
                    </div>
                    <div class="people-grid-text">
                        <h4><?php echo get_sub_field('people-name') ; ?></h4>
                        <p><?php echo strip_tags(get_sub_field('people-title')) ; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>

        <?php endif; ?>
    </section>

<?php get_footer() ; ?>