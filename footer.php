<?php
/**
 * The template for displaying the footer
 *
 * @package cone
 */
?>
    <?php wp_footer(); ?>
    </div>
    <section class="footer">
        <div class="footer-sections">
            <h4>Direct conversion</h4>
            <a href="<?php echo home_url('/our-people')?>">Our people</a>
            <a href="<?php echo home_url('/what-we-do')?>">What we do</a>
            <a href="<?php echo home_url('/products')?>">Products</a>
            <a href="<?php echo home_url('/news')?>">News</a>
            <a href="<?php echo home_url('/contact-us')?>">Contact</a>
            <a href="<?php echo home_url('/insights')?>">Insights</a>
        </div>
        <div class="footer-sections">
            <h4>XCOUNTER</h4>
            <a target="_blank" href="http://xcounter.com/company/">Company</a>
            <a target="_blank" href="http://xcounter.com/products/">Products</a>
            <a target="_blank" href="http://xcounter.com/news/">News</a>
            <a target="_blank" href="http://xcounter.com/contact/">Contact</a>
            <h4>Ajat</h4>
            <a target="_blank" href="http://ajat.fi/company/">Company</a>
            <a target="_blank" href="http://ajat.fi/service/">Service</a>
            <a target="_blank" href="http://ajat.fi/contact/">Contact</a>
        </div>
        <div class="footer-sections">
            <h4>Get in touch</h4>
            <h6>Technical Support</h6>
            <a href="mailto:info@directconversion.com">info@directconversion.com</a>
            <h6 class="mt">Sales</h6>
            <a href="mailto:sales@directconversion.com">sales@directconversion.com</a>
            <h4>Accreditations</h4>
            <a target="_blank" href="http://directconversion.com/wp-content/uploads/2017/04/Certificate-13485-en.pdf">ISO 13485:2012</a>
            <a target="_blank" href="http://directconversion.com/wp-content/uploads/2017/04/Certificate-9001-en.pdf">ISO 9001:2008</a>
        </div>
        <div class="footer-sections">
            <?php $args = array( 'numberposts' => '1' ); ?>
            <?php $recent_posts = wp_get_recent_posts( $args ); ?>
            <h4>Latest news</h4>
           <?php  foreach( $recent_posts as $recent ) : ?>
               <h3><?php echo  $recent["post_title"] ?>
                   <a href="<?php echo get_permalink($recent["ID"]) ?>"></a>
               </h3>
               <p><?php echo  wp_trim_excerpt( $recent['post_content']) ?>
               <a href="<?php echo get_permalink($recent["ID"]) ?>">read more</a>
               </p>
           <?php endforeach; wp_reset_query(); ?>
            <div class="footer-icons">
                <a target="_blank" href="https://www.linkedin.com/company/18038816/">
                    <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                </a>
                <a target="_blank" href="https://www.youtube.com/channel/UC-nRMr2Z7pNUaaXBjH2rj_w">
                    <i class="fa fa-youtube-square" aria-hidden="true"></i>
                </a>
                <a target="_blank" href="https://twitter.com/DirectConv">
                    <i class="fa fa-twitter-square" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXWF-zTaNyT5bR64le1M2Xrp7P6_8Shtw&callback=initMap" type="text/javascript"></script>
</body>
</html>