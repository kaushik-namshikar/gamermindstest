<?php
/**
 * The footer for the theme
 *
 * @package gamer-minds-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
        </div><!-- #content -->

        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="footer-container">
                <div class="footer-content">
                    <div class="footer-section">
                        <h3><?php bloginfo( 'name' ); ?></h3>
                        <p><?php bloginfo( 'description' ); ?></p>
                    </div>

                    <div class="footer-section">
                        <h4><?php esc_html_e( 'Quick Links', 'gamer-minds-theme' ); ?></h4>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'fallback_cb'     => false,
                            'container_class' => 'footer-menu-container',
                            'menu_class'      => 'footer-menu',
                        ) );
                        ?>
                    </div>

                    <div class="footer-section">
                        <h4><?php esc_html_e( 'Contact', 'gamer-minds-theme' ); ?></h4>
                        <p>
                            <a href="mailto:contact@gamerminds.com">contact@gamerminds.com</a>
                        </p>
                    </div>
                </div>

                <div class="footer-bottom">
                    <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'gamer-minds-theme' ); ?></p>
                    <ul class="footer-links">
                        <li><a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'gamer-minds-theme' ); ?></a></li>
                        <li><a href="<?php echo esc_url( home_url( '/legal' ) ); ?>"><?php esc_html_e( 'Terms & Legal', 'gamer-minds-theme' ); ?></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div><!-- #page -->

    <?php wp_footer(); ?>
</body>
</html>
