<?php get_header() ; ?>


<section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="hero-content">
        <h1><?php echo get_field('hero-title') ; ?> </h1>
        <p><?php echo get_field('hero-text') ; ?> </p>
    </div>
</section>
<div class="all-wrapper">
    <section class="news-section">
        <div class="news-section-left">
            <?php get_template_part( 'template-parts/news-content', get_post_format() ); ?>
            <div class="load-news">
                <a href="#">Load more news</a>
            </div>
        </div>
        <div class="news-section-right">
            <?php echo dynamic_sidebar() ; ?>
        </div>
    </section>
</div>

<?php get_footer() ; ?>
