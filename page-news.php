<?php get_header() ; ?>


<section class="hero" style="background-image:radial-gradient(ellipse at 50% 100%, rgba(42,43,47, 0.4) 0%, rgba(42,43,47, 0.8) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="hero-content">
        <h1><?php echo get_field('hero-title') ; ?> </h1>
        <p><?php echo get_field('hero-text') ; ?> </p>
    </div>
</section>
<div class="all-wrapper">
    <section class="news-section">
        <div class="news-section-left">
            <?php get_template_part( 'template-parts/news-content', get_post_format() ); ?>
            <div class="load-news slide-effect">
                <a href="#">Load more news</a>
            </div>
        </div>
        <div class="news-section-right">
            <?php dynamic_sidebar('global-sidebar') ; ?>
        </div>
    </section>
</div>

<?php get_footer() ; ?>
