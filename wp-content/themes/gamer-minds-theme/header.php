<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="gm-header" id="gm-header">
    <nav class="gm-header__nav gm-container">

        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="gm-header__logo" aria-label="<?php bloginfo( 'name' ); ?>">
            <?php
            $logo = get_theme_mod( 'gm_logo_light' );
            if ( $logo ) :
            ?>
                <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="gm-header__logo-img">
            <?php else : ?>
                <span class="gm-header__logo-text">
                    <span class="gm-header__logo-gm">GM</span>
                    <span class="gm-header__logo-label">GAMER MINDS</span>
                </span>
            <?php endif; ?>
        </a>

        <!-- Navigation Buttons -->
        <div class="gm-header__actions">
            <a href="<?php echo esc_url( home_url( '/developers' ) ); ?>"
               class="gm-header__btn gm-header__btn--dev <?php echo is_page( 'developers' ) ? 'is-active' : ''; ?>">
                For Studios
            </a>
            <a href="<?php echo esc_url( home_url( '/players' ) ); ?>"
               class="gm-header__btn gm-header__btn--players <?php echo is_page( 'players' ) ? 'is-active' : ''; ?>">
                For Players
            </a>
        </div>

        <!-- Mobile toggle -->
        <button class="gm-header__mobile-toggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="gm-mobile-menu">
            <span class="gm-header__bar"></span>
            <span class="gm-header__bar"></span>
            <span class="gm-header__bar"></span>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div class="gm-mobile-menu" id="gm-mobile-menu" hidden>
        <a href="<?php echo esc_url( home_url( '/developers' ) ); ?>" class="gm-mobile-menu__link gm-mobile-menu__link--dev">
            For Studios
        </a>
        <a href="<?php echo esc_url( home_url( '/players' ) ); ?>" class="gm-mobile-menu__link gm-mobile-menu__link--players">
            For Players
        </a>
    </div>
</header>
