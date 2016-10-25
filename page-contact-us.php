<?php get_header() ; ?>


<section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="hero-content">
        <h1><?php echo get_field('hero-title') ; ?> </h1>
        <p><?php echo get_field('hero-text') ; ?> </p>
    </div>
    <div class="hero-menu">
        <div class="hero-item active-hero-item">
            <p>Direct Conversion</p>
        </div>
        <div class="hero-item">
            <p>XCounter (UK) Ltd.</p>
        </div>
        <div class="hero-item">
            <p>Ajat</p>
        </div>
    </div>
</section>
<div class="all-wrapper">

</div>

<?php get_footer() ; ?>