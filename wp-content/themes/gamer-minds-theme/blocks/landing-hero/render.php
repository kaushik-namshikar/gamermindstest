<?php
/**
 * Block: gm/landing-hero
 * Mirrors: Landing.tsx — full-screen two-path split hero
 * Left  = Developer path (blue/Briefcase icon)
 * Right = Player path (orange/Users icon)
 * Center = "GAMER MINDS" title + "CHOOSE YOUR PATH" subtitle
 */
$a               = $attributes ?? [];
$dev_url         = esc_url( home_url( '/developers' ) );
$players_url     = esc_url( home_url( '/players' ) );
$dev_label       = isset( $a['devLabel'] )        ? $a['devLabel']        : 'DEVELOPER';
$dev_subtitle    = isset( $a['devSubtitle'] )      ? $a['devSubtitle']     : 'Professional Localization';
$dev_cta         = isset( $a['devCta'] )           ? $a['devCta']          : 'ENTER';
$players_label   = isset( $a['playersLabel'] )     ? $a['playersLabel']    : 'PLAYER';
$players_subtitle = isset( $a['playersSubtitle'] ) ? $a['playersSubtitle'] : 'Voice &amp; Community';
$players_cta     = isset( $a['playersCta'] )       ? $a['playersCta']      : 'ENTER';
$center_title    = isset( $a['centerTitle'] )      ? $a['centerTitle']     : 'GAMER MINDS';
$center_subtitle = isset( $a['centerSubtitle'] )   ? $a['centerSubtitle']  : 'CHOOSE YOUR PATH';
$learn_more_text = isset( $a['learnMoreText'] )    ? $a['learnMoreText']   : 'Not sure? Learn more';
?>

<section class="gm-landing" aria-label="Choose your path">

    <div class="gm-landing__divider" aria-hidden="true"></div>

    <!-- LEFT HALF — Developer -->
    <a href="<?php echo $dev_url; ?>" class="gm-landing__half gm-landing__half--dev" aria-label="For game studios and developers">
        <svg class="gm-landing__pattern" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <defs>
                <pattern id="dev-grid" x="0" y="0" width="50" height="50" patternUnits="userSpaceOnUse">
                    <path d="M 50 0 L 0 0 0 50" fill="none" stroke="rgba(96,165,250,0.3)" stroke-width="0.5"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#dev-grid)"/>
        </svg>
        <div class="gm-landing__diagonal" aria-hidden="true"></div>

        <!-- Large circular icon (w-72 h-72) -->
        <div class="gm-landing__icon" aria-hidden="true">
            <div class="gm-landing__icon-glow gm-landing__icon-glow--blue"></div>
            <div class="gm-landing__icon-circle gm-landing__icon-circle--blue">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24" fill="none" stroke="rgba(96,165,250,0.8)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                </svg>
            </div>
        </div>

        <!-- Text content (bottom) -->
        <div class="gm-landing__content gm-fade-in">
            <div class="gm-landing__content-icon gm-landing__content-icon--blue" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
                </svg>
            </div>
            <h2><?php echo esc_html( $dev_label ); ?></h2>
            <p class="gm-landing__subtitle gm-landing__subtitle--blue"><?php echo esc_html( $dev_subtitle ); ?></p>
            <span class="gm-landing__cta gm-landing__cta--blue">
                <span><?php echo esc_html( $dev_cta ); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
        </div>
    </a>

    <!-- RIGHT HALF — Player -->
    <a href="<?php echo $players_url; ?>" class="gm-landing__half gm-landing__half--players" aria-label="For players and the community">
        <svg class="gm-landing__pattern" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <defs>
                <pattern id="player-dots" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1" fill="rgba(251,146,60,0.3)"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#player-dots)"/>
        </svg>
        <div class="gm-landing__diagonal" aria-hidden="true"></div>

        <!-- Large circular icon (w-72 h-72) -->
        <div class="gm-landing__icon" aria-hidden="true">
            <div class="gm-landing__icon-glow gm-landing__icon-glow--orange"></div>
            <div class="gm-landing__icon-circle gm-landing__icon-circle--orange">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 24 24" fill="none" stroke="rgba(251,146,60,0.8)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
        </div>

        <!-- Text content (bottom) -->
        <div class="gm-landing__content gm-fade-in gm-fade-in--delay-1">
            <div class="gm-landing__content-icon gm-landing__content-icon--orange" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <h2><?php echo esc_html( $players_label ); ?></h2>
            <p class="gm-landing__subtitle gm-landing__subtitle--orange"><?php echo esc_html( $players_subtitle ); ?></p>
            <span class="gm-landing__cta gm-landing__cta--orange">
                <span><?php echo esc_html( $players_cta ); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </span>
        </div>
    </a>

    <!-- CENTER OVERLAY -->
    <div class="gm-landing__center" aria-hidden="true">
        <div class="gm-landing__title-block gm-fade-in">
            <h1><?php echo esc_html( $center_title ); ?></h1>
            <p><?php echo esc_html( $center_subtitle ); ?></p>
        </div>
        <button class="gm-landing__learn-more" id="gm-learn-more" aria-label="Learn more about Gamer Minds">
            <span><?php echo esc_html( $learn_more_text ); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </button>
    </div>

</section>

<!-- EXPLAINER MODAL -->
<div class="gm-modal-backdrop" id="gm-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="gm-modal-title" hidden>
    <div class="gm-modal">
        <button class="gm-modal__close" id="gm-modal-close" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </button>
        <h2 id="gm-modal-title">Two Sides of the Same Mission</h2>
        <p>Gamer Minds connects studios with professional localization services while giving players a voice in what gets translated.</p>
        <div class="gm-modal__cards">
            <div class="gm-modal__card gm-modal__card--dev">
                <h3>For Studios &amp; Publishers</h3>
                <p>Professional translation, editing, and LQA services with production-ready workflows.</p>
                <a href="<?php echo $dev_url; ?>" class="gm-modal__card-link gm-modal__card-link--blue">
                    Explore Services
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="gm-modal__card gm-modal__card--players">
                <h3>For Players</h3>
                <p>Vote for the games and languages you want to see localized.</p>
                <a href="<?php echo $players_url; ?>" class="gm-modal__card-link gm-modal__card-link--orange">
                    Join Community
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
    </div>
</div>
