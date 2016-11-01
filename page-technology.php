<?php get_header() ; ?>


<section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
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
