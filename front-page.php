<?php get_header() ; ?>


    <section class="hero" style="background-image:-webkit-linear-gradient(top, rgba(0, 0, 0, 0.45) 0%, rgba(0, 0, 0, 0.2) 27.33%, rgba(0, 0, 0, 0.4) 66.67%, rgba(0, 0, 0, 0.85) 100%), url('<?php  the_post_thumbnail_url(); ?>')">
        <div class="hero-content">
            <h1><?php echo get_field('hero-title') ; ?> </h1>
            <p><?php echo get_field('hero-text') ; ?> </p>
            <a href="#">See how</a>
        </div>
    </section>
    <div class="all-wrapper">
        <div class="home-section">
        <section class="home-top-section slide-effect">
            <h2><?php echo get_field('global-header') ; ?></h2>
            <p><?php echo get_field('global-content') ; ?></p>
        </section>
        <section class="home-grid">
            <div class="home-grid-section">
                <div class="home-grid-content hgc-text">
                    <div class="slide-effect">
                        <?php echo get_field('knowledge-content') ; ?>
                    </div>
                </div>
                <div class="home-grid-content" style="background-image: url(' <?php echo get_field('knowledge-image') ; ?>')">
                </div>
            </div>
            <div class="home-grid-section">
                <div class="home-grid-content " style="background-image: url(' <?php echo get_field('partner-image') ; ?>')">
                </div>
                <div class="home-grid-content  hgc-text">
                    <div class="slide-effect">
                        <?php echo get_field('partner-content') ; ?>
                    </div>
                </div>
            </div>
            <div class="home-grid-section">
                <div class="home-grid-content hgc-text">
                    <div class="slide-effect">
                        <?php echo get_field('brand-content') ; ?>
                        <a href="<?php echo home_url('/products')?>"><i class="material-icons">trending_flat</i> Products</a>
                    </div>
                </div>
                <div class="home-grid-content " style="background-image: url(' <?php echo get_field('brand-image') ; ?>')">
                </div>
            </div>
        </section>
            </div>
    </div>
<?php get_footer() ; ?>