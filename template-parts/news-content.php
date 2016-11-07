<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Skeleton
 */
?>
<?php $loop = new WP_Query( array( 'posts_per_page' => 3 )); ?>


<?php if ( $loop->have_posts() ) : ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="news-grid slide-effect">
                <a href="<?php echo get_permalink(); ?>"></a>
                <div class="news-date">
                    <span><?php echo get_the_date() ; ?></span>
                    <div class="news-date-border"></div>
                </div>
                <h2><?php the_title(); ?></h2>
                <p><?php echo the_excerpt() ; ?></p>
            </div>

        <?php endwhile; ?>
        <?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="3" offset="3" pause="true" scroll="false" transition="fade" transition_container="false" button_label="Load more news" button_loading_label="Loading..."]');
        wp_reset_query();?>
<?php endif; ?>
