<?php
/**
 * Template Name: Event
 */
?>
<?php get_header() ; ?>

<div class="lightbox-section">
    <div class="lightbox">
        <i class="material-icons close-lightbox">close</i>
        <div class="lightbox-icon">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
        </div>
        <h5>Let's have a talk at RSNA!</h5>
        <p>Submit your information below and we will contact you as soon as possible.</p>
        <?php echo do_shortcode('[contact-form-7 id="332" title="Register"]') ; ?>
    </div>
</div>

<section class="hero event-hero" style="background-image: url('<?php  the_post_thumbnail_url(); ?>')">
    <div class="hero-overlay"></div>
    <div class="hero-content event-hero-content">
        <h1><?php echo get_field('hero-title') ; ?> </h1>
        <p><?php echo get_field('hero-text') ; ?> </p>
        <a href="#meeting-section">Schedule a Meeting</a>
    </div>
</section>
<section class="event-section">
    <div class="event-max-width">
        <h2><?php the_title() ; ?></h2>
        <div class="share-event">
            <div class="sharer" data-sharer="twitter" data-width="800" data-height="600" data-title="Checkout Sharer.js!" data-url="<?php the_permalink(); ?>" style="background-color: #1c94e0">
                <i class="fa fa-twitter" aria-hidden="true"></i><span>Tweet</span>
            </div>
            <div class="sharer" data-sharer="facebook" data-width="800" data-height="600" data-title="Checkout Sharer.js!" data-url="<?php the_permalink(); ?>" style="background-color: #4267b1">
                <i class="fa fa-facebook-square" aria-hidden="true"></i><span>Share</span>
            </div>
            <div class="sharer" data-sharer="linkedin" data-width="800" data-height="600" data-title="Checkout Sharer.js!" data-url="<?php the_permalink(); ?>" style="background-color: #0f77b3">
                <i class="fa fa-linkedin" aria-hidden="true"></i><span>Share</span>
            </div>
        </div>
        <?php the_content() ; ?>
    </div>
</section>
<section class="event-background-section" style="background-image: url('<?php the_field('background-section-img') ; ?>')">
    <div class="event-section">
        <div class="event-max-width slide-effect">
            <?php the_field('background-section-content') ; ?>
        </div>
    </div>
    <div class="hero-overlay"></div>
</section>
<section class="meeting-section event-section" id="meeting-section" data-name="meeting-section">
    <div class="meeting-grid slide-effect">
        <?php if( have_rows('schedule') ): ?>
            <?php while( have_rows('schedule') ) : the_row();?>
                <div class="meeting-content">
                    <h4><?php the_sub_field('schedule-headline') ; ?></h4>
                    <span><?php the_sub_field('schedule-info') ; ?></span>
                    <p><?php the_sub_field('schedule-time') ; ?></p>
                    <a  href="<?php the_sub_field('schedule-link') ; ?>"><?php the_sub_field('schedule-link-text') ; ?></a>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
<!--    <div class="apester-section slide-effect">-->
<!--        --><?php //the_field('apester-content') ; ?>
<!--    </div>-->
    <div class="event-author slide-effect">
        <div class="event-author-img" style="background-image: url('http://xcounter.com/wp-content/uploads/2016/11/nat.jpg')"></div>
        <div>
            <h5>For questions</h5>
            <p>Nathanael Allison</p>
            <a href="mailto:nathanael.allison@directconversion.com">nathanael.allison@directconversion.com</a>
        </div>
    </div>
</section>

<?php get_footer() ; ?>
