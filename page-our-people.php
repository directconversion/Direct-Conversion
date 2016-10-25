<?php get_header() ; ?>


    <section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
        <div class="hero-content">
            <h1><?php echo get_field('hero-title') ; ?> </h1>
            <p><?php echo get_field('hero-text') ; ?> </p>
        </div>
        <div class="hero-menu">
            <div class="hero-item active-hero-item">
                <p>Board</p>
            </div>
            <div class="hero-item">
                <p>Leadership Team</p>
            </div>
        </div>
    </section>
    <section class="people-grid">
        <?php if( have_rows('our-people') ): ?>
            <?php while( have_rows('our-people') ) : the_row(); remove_filter('acf_the_content', 'wpautop'); ?>
                <div class="people-grid-content">
                    <div class="people-grid-image" style="background-image: url('<?php echo get_sub_field('people-image') ; ?>')">
                        <div class="people-grid-overlay">
                            <p>Biography</p>
                        </div>
                    </div>
                    <div class="people-grid-text">
                        <h4><?php echo get_sub_field('people-name') ; ?></h4>
                        <p><?php echo strip_tags(get_sub_field('people-title')) ; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>

        <?php endif; ?>
    </section>

<?php get_footer() ; ?>