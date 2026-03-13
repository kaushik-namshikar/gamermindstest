<?php

/**
 * Theme bootstrap for Gamer Minds.
 *
 * This theme uses a block-based architecture where each UI section is a reusable
 * Gutenberg block. Assets are loaded from /assets.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function gm_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'custom-line-height' );
    add_theme_support( 'custom-spacing' );
    add_theme_support( 'custom-units' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'experimental-custom-spacing' );

    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'gamer-minds-theme' ),
            'footer'  => __( 'Footer Menu', 'gamer-minds-theme' ),
        )
    );
}
add_action( 'after_setup_theme', 'gm_theme_setup' );

function gm_enqueue_assets() {
    $theme_dir = get_template_directory_uri();
    $theme_dir_path = get_template_directory();

    wp_enqueue_style(
        'gm-theme-style',
        $theme_dir . '/assets/css/style.css',
        array(),
        filemtime( $theme_dir_path . '/assets/css/style.css' )
    );

    wp_enqueue_style(
        'gm-block-styles',
        $theme_dir . '/assets/css/blocks.css',
        array( 'gm-theme-style' ),
        filemtime( $theme_dir_path . '/assets/css/blocks.css' )
    );

    wp_enqueue_script(
        'gm-theme-scripts',
        $theme_dir . '/assets/js/scripts.js',
        array(),
        filemtime( $theme_dir_path . '/assets/js/scripts.js' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'gm_enqueue_assets' );

function gm_enqueue_block_editor_assets() {
    $theme_dir = get_template_directory_uri();
    $theme_dir_path = get_template_directory();

    wp_enqueue_style(
        'gm-editor-style',
        $theme_dir . '/assets/css/style.css',
        array(),
        filemtime( $theme_dir_path . '/assets/css/style.css' )
    );

    // Enqueue block editor scripts
    $blocks_dir = get_template_directory() . '/blocks';
    if ( is_dir( $blocks_dir ) ) {
        $block_dirs = glob( $blocks_dir . '/*', GLOB_ONLYDIR );
        foreach ( $block_dirs as $block_dir ) {
            $block_name = basename( $block_dir );
            $script_path = $block_dir . '/index.js';
            if ( file_exists( $script_path ) ) {
                wp_enqueue_script(
                    'gm-block-' . $block_name,
                    $theme_dir . '/blocks/' . $block_name . '/index.js',
                    array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
                    filemtime( $script_path ),
                    true
                );
            }
            $editor_style_path = $block_dir . '/editor.css';
            if ( file_exists( $editor_style_path ) ) {
                wp_enqueue_style(
                    'gm-block-editor-' . $block_name,
                    $theme_dir . '/blocks/' . $block_name . '/editor.css',
                    array(),
                    filemtime( $editor_style_path )
                );
            }
        }
    }
}
add_action( 'enqueue_block_editor_assets', 'gm_enqueue_block_editor_assets' );


function gm_register_block_category( $categories ) {
    $categories[] = array(
        'slug'  => 'gm',
        'title' => __( 'Gamer Minds', 'gamer-minds-theme' ),
        'icon'  => 'star-filled',
    );

    return $categories;
}
add_filter( 'block_categories_all', 'gm_register_block_category' );

function gm_register_theme_blocks() {
    $blocks_dir = get_template_directory() . '/blocks';

    if ( ! function_exists( 'register_block_type' ) ) {
        return;
    }

    $block_directories = glob( $blocks_dir . '/*', GLOB_ONLYDIR );
    if ( ! $block_directories ) {
        return;
    }

    foreach ( $block_directories as $block_dir ) {
        register_block_type( $block_dir );
    }
}
add_action( 'init', 'gm_register_theme_blocks' );

/**
 * Helper to safely output attributes for HTML elements.
 */
function gm_esc_attr( $value ) {
    return esc_attr( $value );
}
