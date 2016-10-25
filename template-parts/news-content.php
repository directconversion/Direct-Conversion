<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package Skeleton
 */
?>
<?php $loop = new WP_Query("post"); ?>


<?php if ( $loop->have_posts() ) : ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="news-grid">
                <a href="<?php echo get_permalink(); ?>"></a>
                <div class="news-date">
                    <span><?php echo get_the_date() ; ?></span>
                    <div class="news-date-border"></div>
                </div>
                <h2><?php the_title(); ?></h2>
                <p><?php echo the_excerpt() ; ?></p>
            </div>
        <?php endwhile; wp_reset_query(); ?>
<?php endif; ?>
