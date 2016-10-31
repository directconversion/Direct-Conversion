<?php get_header() ; ?>


    <section class="hero small-hero">
        <div class="hero-content">
            <h1><?php echo get_field('hero-title') ; ?> </h1>
            <p><?php echo get_field('hero-text') ; ?> </p>
        </div>
    </section>
    <div class="all-wrapper">
        <section class="news-section">
            <div class="news-section-left">
                <div class="investor-section">
                    <?php echo get_field('investor-content') ; ?>
                </div>
                <div class="investor-section">
                    <h1>Latest Press releases and Documents</h1>
                    <div class="press-release-section">
                        <?php get_template_part( 'template-parts/press-release', get_post_format() ); ?>
                    </div>
                </div>
                <div class="investor-section slide-effect">
                    <?php echo get_field('auditor') ; ?>
                </div>
            </div>
            <div class="news-section-right">
                <?php dynamic_sidebar('reports') ; ?>
                <?php dynamic_sidebar('investor-info') ; ?>
                <?php dynamic_sidebar('global-sidebar') ; ?>
            </div>
        </section>
    </div>

<?php get_footer() ; ?>