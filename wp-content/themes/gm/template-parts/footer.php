<?php
/**
 * Footer template part for Gamer Minds theme.
 */
?>

<footer class="gm-footer" role="contentinfo">
    <div class="gm-footer__overlay"></div>
    
    <div class="gm-footer__container">
        <!-- Footer Content Grid -->
        <div class="gm-footer__grid">
            <!-- Brand Column -->
            <div>
                <a class="gm-footer__logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    <svg class="gm-footer__logo" viewBox="0 0 1044.63 187.79" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient id="footer-logo-gradient-1" x1="519.36" y1="186.72" x2="519.36" y2="147.56" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stopColor="#f84bff"/>
                                <stop offset="1" stopColor="#7677ff"/>
                            </linearGradient>
                        </defs>
                        <g>
                            <path fill="#fff" d="M241.23,69.67h35.18c.15,1.02.22,2.5.22,4.47,0,11.18-3.34,20.52-10.02,27.99-7.26,8.13-16.59,12.2-27.99,12.2s-20.48-3.94-28.32-11.82c-7.84-7.88-11.76-17.34-11.76-28.37s3.92-20.48,11.76-28.32c7.84-7.84,17.28-11.76,28.32-11.76,6.39,0,12.45,1.45,18.19,4.36,5.74,2.91,10.49,6.94,14.27,12.09l-11.55,8.06c-2.47-3.27-5.54-5.84-9.2-7.73-3.67-1.89-7.57-2.83-11.71-2.83-7.19,0-13.33,2.56-18.41,7.68-5.08,5.12-7.62,11.27-7.62,18.46s2.54,13.34,7.62,18.46c5.08,5.12,11.22,7.68,18.41,7.68,5.95,0,10.87-1.61,14.76-4.85,3.88-3.23,6.55-7.39,8.01-12.47h-20.15v-13.29Z"/>
                        </g>
                    </svg>
                </a>
                <p class="gm-footer__tagline">Game Localization Collective</p>
            </div>
            
            <!-- For Studios Column -->
            <div>
                <h3 class="gm-footer__heading">For Studios</h3>
                <ul class="gm-footer__links-list">
                    <li><a href="<?php echo esc_url( home_url( '/developers' ) ); ?>">Services</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/developers#quote' ) ); ?>">Request Quote</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/developers#languages' ) ); ?>">Languages</a></li>
                </ul>
            </div>
            
            <!-- For Players Column -->
            <div>
                <h3 class="gm-footer__heading">For Players</h3>
                <ul class="gm-footer__links-list">
                    <li><a href="<?php echo esc_url( home_url( '/players' ) ); ?>">How it Works</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/players#faq' ) ); ?>">FAQ</a></li>
                    <li><a href="#">Join Discord</a></li>
                </ul>
            </div>
            
            <!-- Connect Column -->
            <div>
                <h3 class="gm-footer__heading">Connect</h3>
                <div class="gm-footer__social-links">
                    <a href="#" class="gm-footer__social-link" title="Email">
                        <svg class="gm-footer__social-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </a>
                    <a href="#" class="gm-footer__social-link" title="Twitter">
                        <svg class="gm-footer__social-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2s9 5 20 5a9.5 9.5 0 00-9-5.5c4.75 2.25 7-1 7-4 0-.5-.02-1-.05-1.5A7.55 7.55 0 0023 3z"/>
                        </svg>
                    </a>
                    <a href="#" class="gm-footer__social-link" title="LinkedIn">
                        <svg class="gm-footer__social-icon" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                            <circle cx="4" cy="4" r="2"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="gm-footer__bottom">
            <p class="gm-footer__copyright">&copy; <?php echo date_i18n( 'Y' ); ?> Gamer Minds. All rights reserved.</p>
            <div class="gm-footer__legal-links">
                <a href="<?php echo esc_url( home_url( '/privacy' ) ); ?>">Privacy Policy</a>
                <span>•</span>
                <a href="<?php echo esc_url( home_url( '/legal' ) ); ?>">Terms & Legal</a>
            </div>
        </div>
    </div>
</footer>
