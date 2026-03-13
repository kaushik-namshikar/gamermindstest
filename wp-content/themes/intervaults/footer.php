<footer class="site-footer side-padding">
    <div class="footer-container">
        <!-- TOP SECTION -->
        <div class="row footer-top align-items-start">
            <div class="col-lg-6 footer-left">

                <a class="footer-logo" href="<?php echo site_url(); ?>">
                    <img src="<?php echo esc_url(get_theme_mod('footer_logo')); ?>">
                </a>
            </div>

            <div class="col-lg-6 footer-right">
                <div class="footer-links-wrapper">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer-menu',
                        'container' => false,
                        'menu_class' => false,
                        'items_wrap' => '%3$s',
                        'walker' => new Footer_Menu_Walker(),
                    ]);
                    ?>

                </div>
            </div>
        </div>

        <!-- BOTTOM SECTION -->
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-6 copyright-text">
                    <p><?php echo esc_html(get_theme_mod('copyright_text')); ?></p>
                </div>
                <div class="col-md-6 text-md-end powered_text">
                    <p><?php echo esc_html(get_theme_mod('powered_by_text')); ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>