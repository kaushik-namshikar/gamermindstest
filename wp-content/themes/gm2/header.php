<?php
/**
 * The header for the theme
 *
 * @package gamer-minds-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Professional game localization: Translation, editing, LQA. Connect with players who want your games localized.">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    
    <div id="page" class="site">
        <header id="masthead" class="site-header" role="banner">
            <nav class="site-navigation">
                <div class="nav-container">
                    <div class="site-branding">
                        <?php 
                        if ( has_custom_logo() ) {
                            the_custom_logo();
                        } else {
                            ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                            <?php
                        }
                        ?>
                    </div>

                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'fallback_cb'     => 'wp_page_menu',
                        'container_class' => 'primary-menu-container',
                        'menu_class'      => 'primary-menu',
                    ) );
                    ?>
                </div>
            </nav>
        </header>

        <div id="content" class="site-content">
