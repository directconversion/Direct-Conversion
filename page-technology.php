<?php get_header() ; ?>


<section class="hero" style="background-image: url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="hero-content">
        <h1><?php echo get_field('hero-title') ; ?> </h1>
        <p><?php echo get_field('hero-text') ; ?> </p>
    </div>
</section>
<div class="all-wrapper">
    <section class="technology-top slide-effect">
        <div class="slide-effect">
        <?php echo get_field('technology-content') ; ?>
        </div>
    </section>
</div>

<?php get_footer() ; ?>
