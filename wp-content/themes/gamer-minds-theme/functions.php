<?php
/**
 * Gamer Minds Theme — functions.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ─────────────────────────────────────────
// 0. INCLUDES
// ─────────────────────────────────────────
require_once get_template_directory() . '/inc/cpt-registration.php';
require_once get_template_directory() . '/inc/cpt-meta-boxes.php';
require_once get_template_directory() . '/inc/seed-data.php';

// ─────────────────────────────────────────
// 1. THEME SETUP
// ─────────────────────────────────────────
function gm_theme_setup() {
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/main.css' );
    add_editor_style( 'assets/css/editor-canvas.css' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'appearance-tools' );
    add_theme_support( 'custom-spacing' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'gallery', 'caption' ] );
    load_theme_textdomain( 'gamer-minds', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'gm_theme_setup' );

// ─────────────────────────────────────────
// 2. MENU REGISTRATION
// ─────────────────────────────────────────
function gm_register_menus() {
    register_nav_menus( [
        'primary-menu' => __( 'Primary Navigation', 'gamer-minds' ),
        'footer-menu'  => __( 'Footer Menu',         'gamer-minds' ),
    ] );
}
add_action( 'after_setup_theme', 'gm_register_menus' );

// ─────────────────────────────────────────
// 3. ENQUEUE STYLES & SCRIPTS
// ─────────────────────────────────────────
function gm_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'gm-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap',
        [],
        null
    );

    // Main theme CSS
    wp_enqueue_style(
        'gm-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'gm-google-fonts' ],
        filemtime( get_template_directory() . '/assets/css/main.css' )
    );

    // Theme JavaScript
    wp_enqueue_script(
        'gm-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        filemtime( get_template_directory() . '/assets/js/main.js' ),
        true
    );

    // Pass AJAX URL and nonce to JS
    wp_localize_script( 'gm-main', 'gmAjax', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'gm_quote_form' ),
        'homeUrl' => home_url(),
    ] );
}
add_action( 'wp_enqueue_scripts', 'gm_enqueue_assets' );

// ─────────────────────────────────────────
// 4. GUTENBERG BLOCK REGISTRATION
// ─────────────────────────────────────────
function gm_register_blocks() {
    // Register the shared editor script first so blocks can reference it
    wp_register_script(
        'gm-blocks-editor',
        get_template_directory_uri() . '/assets/js/editor.js',
        [ 'wp-blocks', 'wp-element', 'wp-editor', 'wp-block-editor', 'wp-components', 'wp-i18n', 'wp-server-side-render' ],
        filemtime( get_template_directory() . '/assets/js/editor.js' ),
        false
    );

    $block_dirs = glob( get_template_directory() . '/blocks/*' );
    if ( empty( $block_dirs ) ) return;

    foreach ( $block_dirs as $block_dir ) {
        if ( is_dir( $block_dir ) && file_exists( $block_dir . '/block.json' ) ) {
            register_block_type( $block_dir, [
                'editor_script' => 'gm-blocks-editor',
            ] );
        }
    }
}
add_action( 'init', 'gm_register_blocks' );

// Also enqueue the editor script on the block editor screen
function gm_enqueue_block_editor_assets() {
    wp_enqueue_script( 'gm-blocks-editor' );

    // Load Google Fonts in the editor
    wp_enqueue_style(
        'gm-google-fonts-editor',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'gm-editor-styles',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'gm-google-fonts-editor' ],
        filemtime( get_template_directory() . '/assets/css/main.css' )
    );

    // Override fade-in animation in the editor — elements start opacity:0 on frontend
    // (waiting for scroll observer), but in the editor they must be immediately visible.
    wp_add_inline_style( 'gm-editor-styles',
        '.gm-fade-in { opacity: 1 !important; transform: none !important; }
         .gm-fade-in--delay-1,
         .gm-fade-in--delay-2,
         .gm-fade-in--delay-3,
         .gm-fade-in--delay-4,
         .gm-fade-in--delay-5 { transition-delay: 0s !important; }'
    );
}
add_action( 'enqueue_block_editor_assets', 'gm_enqueue_block_editor_assets' );

// ─────────────────────────────────────────
// 5. QUOTE FORM AJAX HANDLER
// ─────────────────────────────────────────
function gm_handle_quote_form() {
    check_ajax_referer( 'gm_quote_form', 'nonce' );

    $name      = sanitize_text_field( wp_unslash( $_POST['name']      ?? '' ) );
    $studio    = sanitize_text_field( wp_unslash( $_POST['studio']    ?? '' ) );
    $email     = sanitize_email(      wp_unslash( $_POST['email']     ?? '' ) );
    $wordcount = sanitize_text_field( wp_unslash( $_POST['wordcount'] ?? '' ) );
    $languages = sanitize_text_field( wp_unslash( $_POST['languages'] ?? '' ) );
    $notes     = sanitize_textarea_field( wp_unslash( $_POST['notes'] ?? '' ) );

    if ( empty( $name ) || empty( $email ) || ! is_email( $email ) ) {
        wp_send_json_error( [ 'message' => __( 'Please fill in your name and a valid email address.', 'gamer-minds' ) ] );
        return;
    }

    // Use block-configured recipient → fallback to admin email.
    $to = get_option( 'gm_quote_to_email' );
    if ( ! $to || ! is_email( $to ) ) {
        $to = get_option( 'admin_email' );
    }

    $subject = sprintf( 'New Quote Request from %s — %s', $name, $studio );
    $body    = sprintf(
        "Name: %s\nStudio: %s\nEmail: %s\nWord Count: %s\nTarget Languages: %s\n\nNotes:\n%s",
        $name, $studio, $email, $wordcount, $languages, $notes
    );
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $email,
    ];

    // Capture wp_mail failure reason.
    $mail_error = '';
    $fail_cb = function( $wp_error ) use ( &$mail_error ) {
        $mail_error = $wp_error->get_error_message();
    };
    add_action( 'wp_mail_failed', $fail_cb );

    $sent = wp_mail( $to, $subject, $body, $headers );

    remove_action( 'wp_mail_failed', $fail_cb );

    if ( $sent ) {
        wp_send_json_success( [ 'message' => __( "Thanks! We'll be in touch within 1–2 business days.", 'gamer-minds' ) ] );
    } else {
        $debug = $mail_error ?: __( 'wp_mail() returned false — check your server mail configuration or install WP Mail SMTP.', 'gamer-minds' );
        wp_send_json_error( [ 'message' => $debug ] );
    }
}
add_action( 'wp_ajax_gm_quote_form',        'gm_handle_quote_form' );
add_action( 'wp_ajax_nopriv_gm_quote_form', 'gm_handle_quote_form' );

// ─────────────────────────────────────────
// 6. CUSTOMIZER SETTINGS
// ─────────────────────────────────────────
function gm_customizer_settings( $wp_customize ) {

    // ── Logo ──
    $wp_customize->add_section( 'gm_logo_section', [
        'title'    => __( 'Logo', 'gamer-minds' ),
        'priority' => 30,
    ] );
    $wp_customize->add_setting( 'gm_logo_light', [ 'sanitize_callback' => 'esc_url_raw', 'default' => '' ] );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gm_logo_light', [
        'label'   => __( 'Logo (Light)', 'gamer-minds' ),
        'section' => 'gm_logo_section',
    ] ) );
    $wp_customize->add_setting( 'gm_logo_dark', [ 'sanitize_callback' => 'esc_url_raw', 'default' => '' ] );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gm_logo_dark', [
        'label'   => __( 'Logo (Dark)', 'gamer-minds' ),
        'section' => 'gm_logo_section',
    ] ) );

    // ── Footer ──
    $wp_customize->add_section( 'gm_footer_section', [
        'title'    => __( 'Footer', 'gamer-minds' ),
        'priority' => 50,
    ] );
    $wp_customize->add_setting( 'gm_copyright_text', [ 'sanitize_callback' => 'sanitize_text_field', 'default' => '© 2025 Gamer Minds. All rights reserved.' ] );
    $wp_customize->add_control( 'gm_copyright_text', [
        'label'   => __( 'Copyright Text', 'gamer-minds' ),
        'section' => 'gm_footer_section',
        'type'    => 'text',
    ] );
    $wp_customize->add_setting( 'gm_footer_logo', [ 'sanitize_callback' => 'esc_url_raw', 'default' => '' ] );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'gm_footer_logo', [
        'label'   => __( 'Footer Logo', 'gamer-minds' ),
        'section' => 'gm_footer_section',
    ] ) );

    // ── Social Links ──
    $wp_customize->add_section( 'gm_social_section', [
        'title'    => __( 'Social Links', 'gamer-minds' ),
        'priority' => 60,
    ] );
    foreach ( [ 'twitter' => 'Twitter / X', 'discord' => 'Discord', 'linkedin' => 'LinkedIn', 'email' => 'Email Address' ] as $key => $label ) {
        $wp_customize->add_setting( "gm_social_{$key}", [ 'sanitize_callback' => 'sanitize_text_field', 'default' => '' ] );
        $wp_customize->add_control( "gm_social_{$key}", [
            'label'   => $label,
            'section' => 'gm_social_section',
            'type'    => 'text',
        ] );
    }
}
add_action( 'customize_register', 'gm_customizer_settings' );

// ─────────────────────────────────────────
// 7. HELPER: BODY CLASS FOR PAGE TYPE
// ─────────────────────────────────────────
function gm_body_classes( $classes ) {
    if ( is_front_page() ) $classes[] = 'gm-page--landing';
    if ( is_page( 'developers' ) ) $classes[] = 'gm-page--developers';
    if ( is_page( 'players' ) )    $classes[] = 'gm-page--players';
    if ( is_page( 'privacy' ) )    $classes[] = 'gm-page--privacy';
    if ( is_page( 'legal' ) )      $classes[] = 'gm-page--legal';
    return $classes;
}
add_filter( 'body_class', 'gm_body_classes' );

// ─────────────────────────────────────────
// 8. DISABLE ADMIN BAR ON FRONT-END (optional)
// ─────────────────────────────────────────
add_filter( 'show_admin_bar', '__return_false' );

// ─────────────────────────────────────────
// 9. REMOVE DEFAULT BLOCK STYLES THAT CONFLICT
// ─────────────────────────────────────────
function gm_dequeue_block_library_theme() {
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'gm_dequeue_block_library_theme', 100 );

// ─────────────────────────────────────────
// 10. ONE-TIME SEED TRIGGER
// URL: /wp-admin/?gm_seed=1 (admin only)
// ─────────────────────────────────────────
function gm_seed_trigger() {
    if ( isset( $_GET['gm_seed'] ) && current_user_can( 'manage_options' ) ) {
        gm_seed_cpt_data();
        wp_redirect( admin_url( 'edit.php?post_type=gm_game&gm_seeded=1' ) );
        exit;
    }
}
add_action( 'admin_init', 'gm_seed_trigger' );
