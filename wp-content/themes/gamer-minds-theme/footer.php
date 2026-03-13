<footer class="gm-footer">
    <div class="gm-footer__inner gm-container">

        <!-- Top grid -->
        <div class="gm-footer__grid">

            <!-- Brand column -->
            <div class="gm-footer__col gm-footer__col--brand">
                <?php $footer_logo = get_theme_mod( 'gm_footer_logo' ); ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="gm-footer__logo">
                    <?php if ( $footer_logo ) : ?>
                        <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                    <?php else : ?>
                        <span class="gm-footer__logo-text">
                            <span class="gm-footer__logo-gm">GM</span>
                            <span class="gm-footer__logo-label">GAMER MINDS</span>
                        </span>
                    <?php endif; ?>
                </a>
                <p class="gm-footer__tagline">Bridging game studios and global players through community-driven localization.</p>

                <!-- Social icons -->
                <div class="gm-footer__social">
                    <?php if ( $twitter = get_theme_mod( 'gm_social_twitter' ) ) : ?>
                        <a href="<?php echo esc_url( $twitter ); ?>" class="gm-footer__social-link" target="_blank" rel="noopener" aria-label="Twitter">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L1.254 2.25H8.08l4.261 5.632 5.902-5.632Zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    <?php endif; ?>
                    <?php if ( $discord = get_theme_mod( 'gm_social_discord' ) ) : ?>
                        <a href="<?php echo esc_url( $discord ); ?>" class="gm-footer__social-link" target="_blank" rel="noopener" aria-label="Discord">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.317 4.37a19.791 19.791 0 0 0-4.885-1.515.074.074 0 0 0-.079.037c-.21.375-.444.864-.608 1.25a18.27 18.27 0 0 0-5.487 0 12.64 12.64 0 0 0-.617-1.25.077.077 0 0 0-.079-.037A19.736 19.736 0 0 0 3.677 4.37a.07.07 0 0 0-.032.027C.533 9.046-.32 13.58.099 18.057c.002.022.015.043.033.057a19.9 19.9 0 0 0 5.993 3.03.078.078 0 0 0 .084-.028 14.09 14.09 0 0 0 1.226-1.994.076.076 0 0 0-.041-.106 13.107 13.107 0 0 1-1.872-.892.077.077 0 0 1-.008-.128 10.2 10.2 0 0 0 .372-.292.074.074 0 0 1 .077-.01c3.928 1.793 8.18 1.793 12.062 0a.074.074 0 0 1 .078.01c.12.098.246.198.373.292a.077.077 0 0 1-.006.127 12.299 12.299 0 0 1-1.873.892.077.077 0 0 0-.041.107c.36.698.772 1.362 1.225 1.993a.076.076 0 0 0 .084.028 19.839 19.839 0 0 0 6.002-3.03.077.077 0 0 0 .032-.054c.5-5.177-.838-9.674-3.549-13.66a.061.061 0 0 0-.031-.03z"/></svg>
                        </a>
                    <?php endif; ?>
                    <?php if ( $linkedin = get_theme_mod( 'gm_social_linkedin' ) ) : ?>
                        <a href="<?php echo esc_url( $linkedin ); ?>" class="gm-footer__social-link" target="_blank" rel="noopener" aria-label="LinkedIn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    <?php endif; ?>
                    <?php if ( $email_addr = get_theme_mod( 'gm_social_email' ) ) : ?>
                        <a href="mailto:<?php echo esc_attr( $email_addr ); ?>" class="gm-footer__social-link" aria-label="Email">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- For Studios column -->
            <div class="gm-footer__col">
                <h6 class="gm-footer__col-title">For Studios</h6>
                <ul class="gm-footer__links">
                    <li><a href="<?php echo esc_url( home_url( '/developers' ) ); ?>">Our Services</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/developers#quote-form' ) ); ?>">Get a Quote</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/developers#process' ) ); ?>">How We Work</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/developers#languages' ) ); ?>">Languages</a></li>
                </ul>
            </div>

            <!-- For Players column -->
            <div class="gm-footer__col">
                <h6 class="gm-footer__col-title">For Players</h6>
                <ul class="gm-footer__links">
                    <li><a href="<?php echo esc_url( home_url( '/players' ) ); ?>">Browse Campaigns</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/players#how-it-works' ) ); ?>">How It Works</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/players#faq' ) ); ?>">FAQ</a></li>
                    <?php if ( $discord = get_theme_mod( 'gm_social_discord' ) ) : ?>
                        <li><a href="<?php echo esc_url( $discord ); ?>" target="_blank" rel="noopener">Join Discord</a></li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Legal column -->
            <div class="gm-footer__col">
                <h6 class="gm-footer__col-title">Company</h6>
                <ul class="gm-footer__links">
                    <li><a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy Policy</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/legal' ) ); ?>">Terms & Legal</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="gm-footer__bottom">
            <p class="gm-footer__copyright">
                <?php echo esc_html( get_theme_mod( 'gm_copyright_text', '© 2025 Gamer Minds. All rights reserved.' ) ); ?>
            </p>
            <div class="gm-footer__legal-links">
                <a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy</a>
                <a href="<?php echo esc_url( home_url( '/legal' ) ); ?>">Terms</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
