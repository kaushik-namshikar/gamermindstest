<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?><?php wp_title('|', true, 'left'); ?></title>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <nav class="nav navbar iv-header side-padding">
            <div class="header-logo">
                <a href="<?php echo site_url(); ?>">
                    <?php if (is_page(304) || is_page(289)): ?>
                        <img src="<?php echo esc_url(get_theme_mod('black_logo')); ?>" class="header-logo-img">
                    <?php else: ?>
                        <img src="<?php echo esc_url(get_theme_mod('mytheme_logo')); ?>" class="header-logo-img">
                    <?php endif; ?>
                </a>
            </div>

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <div class="header-nav-container">
                <div class="header-nav-items d-flex">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'navbar-menu',
                        'menu_class' => 'main-nav',
                    ]);
                    ?>

                    <div class="header-nav-button btn">
                        <a href="<?php echo get_theme_mod('navbar_button_link'); ?>">
                            <?php echo get_theme_mod('navbar_button_text'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>