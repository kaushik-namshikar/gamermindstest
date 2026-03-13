<?php
/**
 * Gamer Minds Theme Functions
 * 
 * Theme setup, block registration, and custom functionality
 * 
 * @package gamer-minds-theme
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'GAMER_MINDS_THEME_VERSION', '1.0.0' );
define( 'GAMER_MINDS_THEME_DIR', get_template_directory() );
define( 'GAMER_MINDS_THEME_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function gamer_minds_theme_setup() {
    // Add theme support
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'appearance-tools' );
    add_theme_support( 'custom-spacing' );
    add_theme_support( 'custom-line-height' );
    add_theme_support( 'custom-units' );
    add_theme_support( 'wp-block-styles' );
    
    // Register menus
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'gamer-minds-theme' ),
        'footer'  => esc_html__( 'Footer Menu', 'gamer-minds-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'gamer_minds_theme_setup' );

/**
 * Enqueue Theme Assets
 */
function gamer_minds_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap',
        array(),
        null
    );
    
    // Main stylesheet
    wp_enqueue_style(
        'gamer-minds-style',
        GAMER_MINDS_THEME_URI . '/assets/css/main.css',
        array(),
        GAMER_MINDS_THEME_VERSION
    );

    // Animation stylesheet
    wp_enqueue_style(
        'gamer-minds-animations',
        GAMER_MINDS_THEME_URI . '/assets/css/animations.css',
        array(),
        GAMER_MINDS_THEME_VERSION
    );

    // Main JavaScript
    wp_enqueue_script(
        'gamer-minds-script',
        GAMER_MINDS_THEME_URI . '/assets/js/main.js',
        array(),
        GAMER_MINDS_THEME_VERSION,
        true
    );

    // Animations JS (IntersectionObserver for fade-in, scroll effects)
    wp_enqueue_script(
        'gamer-minds-animations',
        GAMER_MINDS_THEME_URI . '/assets/js/animations.js',
        array(),
        GAMER_MINDS_THEME_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'gamer_minds_enqueue_assets' );

/**
 * Register Custom Blocks
 */
function gamer_minds_register_blocks() {
    $blocks = array(
        'hero',
        'two-paths',
        'split-cards',
        'trust-grid',
        'services',
        'gallery-grid',
        'process-timeline',
        'language-grid',
        'quote-form',
        'campaigns-grid',
        'how-it-works',
        'regions-grid',
        'success-stories',
        'faq',
        'cta',
        'content-sections',
    );

    foreach ( $blocks as $block ) {
        $block_path = GAMER_MINDS_THEME_DIR . '/blocks/' . $block;
        if ( file_exists( $block_path . '/block.json' ) ) {
            register_block_type( $block_path );
        }
    }
}
add_action( 'init', 'gamer_minds_register_blocks' );

/**
 * Register Custom Post Types (if needed for custom content)
 */
function gamer_minds_register_post_types() {
    // Can be extended for custom post types like 'game' or 'campaign'
}
add_action( 'init', 'gamer_minds_register_post_types' );

/**
 * Body Classes
 */
function gamer_minds_body_classes( $classes ) {
    // Add dark mode class by default
    $classes[] = 'dark-mode';
    return $classes;
}
add_filter( 'body_class', 'gamer_minds_body_classes' );

/**
 * Custom REST API endpoints (optional for dynamic data)
 */
function gamer_minds_register_rest_routes() {
    // Can add custom REST endpoints here
}
add_action( 'rest_api_init', 'gamer_minds_register_rest_routes' );
