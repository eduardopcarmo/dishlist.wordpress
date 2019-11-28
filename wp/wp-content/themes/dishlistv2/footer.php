<?php
/**
 * The footer for our theme
 *
 * @package Dishlist
 * @since 0.1.0
 * @version 0.0.1
 */
?>
    <footer class="footer">
        <div class="footer-cta">
            <div class="footer-cta-container">
                <h2>Get the App Now!</h2>
                <div class="footer-cta-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/get_the_app_bg_2.png" width="352" height="295" alt="Get the App Now!" />
                </div>
                <div class="footer-cta-btns">
                    <a class="btn btn-primary" href="https://play.google.com/store/" target="_blank">Android</a>
                    <a class="btn btn-primary" href="https://www.apple.com/ios/app-store/" target="_blank">Appstore</a>
                </div>
            </div>
            <div class="footer-bgVid-container">
                <video class="footer-bgVid" autoplay muted loop>
                    <source src="<?php echo get_template_directory_uri(); ?>/assets/images/video_-_from_pexels_-_converted_with_clipchamp.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <?php 
            wp_nav_menu( 
                array(
                    'theme_location'  => 'social',
                    'menu'            => '', 
                    'container'       => 'nav', 
                    'container_class' => 'footer-social-links-menu', 
                    'container_id'    => '',
                    'menu_class'      => '', 
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => ''
                ) 
            );
        ?>
        <div class="footer-copyright">
            <p>@Copyright Team 4 - <?= date("Y"); ?>.</p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>