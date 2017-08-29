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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="icon" href="<?php echo esc_url(home_url( '/wp-content/themes/DirectConversion/assets/images/favicon.png' ) ); ?>">

    <?php wp_head(); ?>
</head>
<body>
<div class="blog-header max-width">
    <img src="<?php echo esc_url(home_url( '/wp-content/themes/DirectConversion/assets/images/dc-logo.png' ) ); ?>">
    <p>Here you will find the latest happenings and insights in and around <a href="<?php echo home_url(); ?>">Direct Conversion</a>.</p>
</div>
<section class="blog-hero">
    <div class="blog-hero-content blog-single-hero max-width medium-width">
        <h5>DC insights</h5>
        <h1><?php the_title() ; ?></h1>
        <div class="blog-grid-info">
            <a href="#"><?php the_author() ; ?></a>
            <p><?php echo get_the_date() ; ?></p>
            <a  href="#disqus-comment-section"><span class="disqus-comment-count" data-disqus-url="<?php the_permalink(); ?>"></span></a>

        </div>
    </div>
</section>
<section class="insight-section">
    <div class="insight-content max-width medium-width">
        <?php the_content() ; ?>
        <div id="disqus-comment-section" class="disqus-comment-section">
            <?php comments_template(); ?>
        </div>
    </div>
    <div class="social-sidebar">
        <div class="testis">
            <div class="sharer social-icon-box" data-sharer="facebook" data-width="800" data-height="600" data-title="Checkout Sharer.js!" data-url="<?php the_permalink(); ?>">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </div>
            <div class="sharer social-icon-box"  data-sharer="twitter" data-width="800" data-height="600" data-title="Checkout Sharer.js!" data-url="<?php the_permalink(); ?>" style="background-color: #1BA6FF;">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </div>
            <div class="social-icon-box" style="background-color: #E5362E;">
                <a class="absolute-link" href="mailto:info@directconversion.com"></a>
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
            <div class="sharer social-icon-box" data-sharer="linkedin" data-width="800" data-height="600" data-title="Checkout Sharer.js!" data-url="<?php the_permalink(); ?>" style="background-color: #0077B5;">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</section>
<div class="subscribe-form-section">
    <h6>SUBSCRIBE</h6>
    <div class="subscribe-form max-width">
        <h3>Get the latest DC insights</h3>
        <p>Don't miss anything from the Direct Conversion blog. Leave your email to sign up for our newsletter.</p>
        <?php echo do_shortcode('[mc4wp_form id="291"]')?>
    </div>
</div>

<script id="dsq-count-scr" src="//http-localhost-direct-conversion.disqus.com/count.js" async></script>
</body>
<script src="<?php echo esc_url(home_url( '/wp-content/themes/DirectConversion/assets/js/src/blog.min.js' ) ); ?>"></script>
<script src="<?php echo esc_url(home_url( '/wp-content/themes/DirectConversion/assets/js/lib/sharer.min.js' ) ); ?>"></script>

</html>
