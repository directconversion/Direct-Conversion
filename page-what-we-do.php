<?php get_header() ; ?>


<section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="hero-content">
        <h1><?php echo get_field('hero-title') ; ?> </h1>
        <p><?php echo get_field('hero-text') ; ?> </p>
    </div>
</section>


<div class="about-grid">
    <?php if( have_rows('what-grid') ): ?>

    <?php while( have_rows('what-grid') ) : the_row(); 	remove_filter('acf_the_content', 'wpautop'); ?>
    <div class="about-grid-content slide-effect" style="background-image: linear-gradient(to bottom, rgba(193, 193, 193, 0.1), rgba(0, 0, 0, 0.4)), url('<?php echo get_sub_field('what-image') ; ?>')">
        <div class="about-grid-overlay"></div>
        <div class="about-grid-info">
        <h4><?php echo get_sub_field('what-headline') ; ?></h4>
        <p><?php echo strip_tags(get_sub_field('what-content')) ; ?></p>
            </div>
    </div>
    <?php endwhile; ?>

    <?php endif; ?>
    <div class="about-grid-content about-grid-contact slide-effect">
        <a class="about-grid-link" href="<?php echo home_url('/contact-us')?>"></a>
        <h2>Special request?</h2>
        <a href="<?php echo home_url('/contact-us')?>">Contact Us <i class="material-icons">trending_flat</i> </a>
    </div>
</div>

<?php get_footer() ; ?>
