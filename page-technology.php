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
    <section class="tech-bottom">
        <div class="half-left">
            <h3>Journal Papers, Technical Reports, Patents</h3>
            <?php if( have_rows('pdfs') ): ?>
                <?php while( have_rows('pdfs') ) : the_row(); remove_filter('acf_the_content', 'wpautop'); ?>
                    <a target="_blank" href="<?php the_sub_field('pdf-file') ; ?>"><?php the_sub_field('pdf-title') ; ?></a>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="half-right" style="background-image: url('')">
            <img src="<?php echo get_field('tech-img') ?>">
        </div>
    </section>
</div>

<?php get_footer() ; ?>
