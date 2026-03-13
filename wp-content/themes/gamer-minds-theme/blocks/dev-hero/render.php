<?php
/**
 * Block: gm/dev-hero
 * Mirrors: Developers.tsx — Hero Section (2-column grid)
 * Left: Badge, h1 gradient title, desc, info box, 2 buttons
 * Right: Hero image with purple glow
 */
$quote_url = esc_url( home_url( '/developers#quote' ) );
$email_url = 'mailto:hello@gamerminds.com';
$hero_img  = 'https://images.unsplash.com/photo-1732203971761-e9d4a6f5e93f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2Rlcm4lMjBzb2Z0d2FyZSUyMGRhc2hib2FyZCUyMGludGVyZmFjZXxlbnwxfHx8fDE3NzI0MTk1ODB8MA&ixlib=rb-4.1.0&q=80&w=1080';
?>

<section class="gm-dev-hero gm-fade-in" id="dev-hero">

    <!-- Left: Content -->
    <div class="gm-dev-hero__content">

        <div class="gm-dev-hero__badge">
            <span class="gm-badge gm-badge--purple">
                <!-- Code icon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                PRODUCTION-READY LOCALIZATION
            </span>
        </div>

        <h1 class="gm-dev-hero__title">
            Game localization<br>
            <span class="gm-gradient-text-purple">that ships.</span>
        </h1>

        <p class="gm-dev-hero__desc">
            Translation, editing, and LQA for studios shipping globally — streamlined workflow, single point of contact.
        </p>

        <div class="gm-dev-hero__info-box">
            <!-- TrendingUp icon -->
            <svg class="gm-dev-hero__info-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
            <p>60%+ of Steam users browse in non-English languages — localization is a growth multiplier</p>
        </div>

        <div class="gm-dev-hero__actions">
            <a href="<?php echo $quote_url; ?>" class="gm-btn gm-btn--primary">
                REQUEST QUOTE
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="<?php echo $email_url; ?>" class="gm-btn gm-btn--outline">EMAIL US</a>
        </div>
    </div>

    <!-- Right: Visual -->
    <div class="gm-dev-hero__visual">
        <div class="gm-dev-hero__visual-glow" aria-hidden="true"></div>
        <img
            src="<?php echo esc_url( $hero_img ); ?>"
            alt="Localization dashboard"
            loading="lazy"
            width="600"
            height="450"
            class="gm-dev-hero__img"
        >
    </div>

</section>
