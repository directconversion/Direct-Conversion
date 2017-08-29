<?php
/**
 * The template for displaying the header
 *
 * @package cone
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( ' - ', true, 'right' ); ?></title>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <?php cone_og_meta_tags(); ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo esc_url(home_url( '/wp-content/themes/DirectConversion/assets/images/favicon.png' ) ); ?>">

    <?php wp_head(); ?>
</head>
<body>
    <div class="blog-header max-width">
        <img src="<?php echo esc_url(home_url( '/wp-content/themes/DirectConversion/assets/images/dc-logo.png' ) ); ?>">
        <p>Here you will find the latest happenings and insights in and around <a href="<?php echo home_url(); ?>">Direct Conversion</a>.</p>
    </div>
    <section class="blog-hero">
        <div class="blog-hero-content max-width medium-width">
            <h1><?php the_field('hero-title') ; ?></h1>
            <p><?php the_field('hero-text') ; ?></p>
        </div>
    </section>
    <section class="blog-section">
        <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
        <?php $loop = new WP_Query( array( 'post_type' => 'insights', 'posts_per_page' => 10, 'paged' => get_query_var('paged') ? get_query_var('paged') : 1 ) ); ?>
        <?php if ( $loop->have_posts() ) : ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="blog-grid">
                    <div class="blog-grid-content max-width medium-width">
                        <h5>DC insights</h5>
                        <h3><?php the_title() ; ?> <a class="absolute-link" href="<?php the_permalink() ; ?>"></a></h3>
                        <div class="blog-grid-info">
                            <a href="#"><?php the_author() ; ?></a>
                            <p><?php echo get_the_date() ; ?></p>
                            <a href="<?php the_permalink() ;?>#disqus-comment-section"><span class="disqus-comment-count" data-disqus-url="<?php the_permalink(); ?>"></span></a>
                        </div>
                    </div>
                </div>
            <?php endwhile ;  wp_reset_query();?>
            <div class="max-width medium-width pagination-section">
                <?php pagination_bar( $loop ); ?>
            </div>
        <?php endif; ?>
        <div class="subscribe-form-section">
            <h6>SUBSCRIBE</h6>
            <div class="subscribe-form max-width">
                <h3>Get the latest DC insights</h3>
                <p>Don't miss anything from the Direct Conversion blog. Leave your email to sign up for our newsletter.</p>
                <?php echo do_shortcode('[mc4wp_form id="291"]')?>
            </div>
        </div>
    </section>
    <script id="dsq-count-scr" src="//http-localhost-direct-conversion.disqus.com/count.js" async></script>
</body>
</html>
