<?php get_header() ; ?>


    <section class="hero small-hero">
        <div class="hero-content">
            <h1>Page is not available (404)</h1>
        </div>
    </section>
    <div class="all-wrapper">
        <section class="news-section">
            <div class="news-section-left">
                <div class="investor-section">
                    <h1>We can’t find the page you are looking for</h1>
                    <p>Here are som useful links instead:</p>
                    <a href="<?php echo home_url('/')?>">Home</a><br/>
                    <a href="<?php echo home_url('/our-people')?>">Our People</a><br/>
                    <a href="<?php echo home_url('/investor-info')?>">Investor Info</a><br/>
                    <a href="<?php echo home_url('/contact-us')?>">Contact Us</a>
                </div>
            </div>
            <div class="news-section-right">
                <?php dynamic_sidebar('global-sidebar') ; ?>
            </div>
        </section>
    </div>

<?php get_footer() ; ?>