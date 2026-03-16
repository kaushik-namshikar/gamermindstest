<?php
/**
 * Custom Post Type registration for Gamer Minds theme.
 * CPTs: gm_game, gm_service, gm_language, gm_campaign, gm_faq
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ─────────────────────────────────────────────────────────────────────────────
// 1. REGISTER CUSTOM POST TYPES
// ─────────────────────────────────────────────────────────────────────────────
function gm_register_cpts() {

    // ── GAMES ─────────────────────────────────────────────────────────────────
    register_post_type( 'gm_game', [
        'labels' => [
            'name'               => 'Games',
            'singular_name'      => 'Game',
            'add_new'            => 'Add New Game',
            'add_new_item'       => 'Add New Game',
            'edit_item'          => 'Edit Game',
            'new_item'           => 'New Game',
            'view_item'          => 'View Game',
            'search_items'       => 'Search Games',
            'not_found'          => 'No games found',
            'not_found_in_trash' => 'No games found in Trash',
            'menu_name'          => 'Games',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'supports'            => [ 'title', 'thumbnail', 'excerpt' ],
        'menu_icon'           => 'dashicons-games',
        'menu_position'       => 20,
        'capability_type'     => 'post',
        'has_archive'         => false,
        'rewrite'             => false,
    ] );

    // ── SERVICES ──────────────────────────────────────────────────────────────
    register_post_type( 'gm_service', [
        'labels' => [
            'name'               => 'Services',
            'singular_name'      => 'Service',
            'add_new'            => 'Add New Service',
            'add_new_item'       => 'Add New Service',
            'edit_item'          => 'Edit Service',
            'menu_name'          => 'Services',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'supports'            => [ 'title', 'thumbnail' ],
        'menu_icon'           => 'dashicons-list-view',
        'menu_position'       => 21,
        'capability_type'     => 'post',
        'has_archive'         => false,
        'rewrite'             => false,
    ] );

    // ── LANGUAGES ─────────────────────────────────────────────────────────────
    register_post_type( 'gm_language', [
        'labels' => [
            'name'               => 'Languages',
            'singular_name'      => 'Language',
            'add_new'            => 'Add New Language',
            'add_new_item'       => 'Add New Language',
            'edit_item'          => 'Edit Language',
            'menu_name'          => 'Languages',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'supports'            => [ 'title' ],
        'menu_icon'           => 'dashicons-translation',
        'menu_position'       => 22,
        'capability_type'     => 'post',
        'has_archive'         => false,
        'rewrite'             => false,
    ] );

    // ── CAMPAIGNS ─────────────────────────────────────────────────────────────
    register_post_type( 'gm_campaign', [
        'labels' => [
            'name'               => 'Campaigns',
            'singular_name'      => 'Campaign',
            'add_new'            => 'Add New Campaign',
            'add_new_item'       => 'Add New Campaign',
            'edit_item'          => 'Edit Campaign',
            'menu_name'          => 'Campaigns',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'supports'            => [ 'title', 'thumbnail' ],
        'menu_icon'           => 'dashicons-megaphone',
        'menu_position'       => 23,
        'capability_type'     => 'post',
        'has_archive'         => false,
        'rewrite'             => false,
    ] );

    // ── FAQ ───────────────────────────────────────────────────────────────────
    register_post_type( 'gm_faq', [
        'labels' => [
            'name'               => 'FAQ Items',
            'singular_name'      => 'FAQ Item',
            'add_new'            => 'Add New FAQ',
            'add_new_item'       => 'Add New FAQ',
            'edit_item'          => 'Edit FAQ',
            'menu_name'          => 'FAQ',
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'supports'            => [ 'title', 'editor' ],
        'menu_icon'           => 'dashicons-editor-help',
        'menu_position'       => 24,
        'capability_type'     => 'post',
        'has_archive'         => false,
        'rewrite'             => false,
    ] );
}
add_action( 'init', 'gm_register_cpts' );


// ─────────────────────────────────────────────────────────────────────────────
// 2. REGISTER POST META FIELDS (REST API exposed)
// ─────────────────────────────────────────────────────────────────────────────
function gm_register_meta_fields() {

    // ── gm_game ───────────────────────────────────────────────────────────────
    $game_meta = [
        'studio_name'    => 'string',
        'platforms'      => 'string',
        'language_count' => 'string',
        'game_link'      => 'string',
        'featured'       => 'boolean',
        'display_order'  => 'integer',
    ];
    foreach ( $game_meta as $key => $type ) {
        register_post_meta( 'gm_game', $key, [
            'type'              => $type,
            'single'            => true,
            'show_in_rest'      => true,
            'sanitize_callback' => $type === 'string' ? 'sanitize_text_field' : null,
            'auth_callback'     => function() { return current_user_can( 'edit_posts' ); },
            'default'           => $type === 'boolean' ? false : ( $type === 'integer' ? 0 : '' ),
        ] );
    }

    // ── gm_service ────────────────────────────────────────────────────────────
    $service_meta = [
        'service_description' => 'string',
        'service_details'     => 'string',
        'icon_svg_path'       => 'string',
        'display_order'       => 'integer',
    ];
    foreach ( $service_meta as $key => $type ) {
        register_post_meta( 'gm_service', $key, [
            'type'          => $type,
            'single'        => true,
            'show_in_rest'  => true,
            'auth_callback' => function() { return current_user_can( 'edit_posts' ); },
            'default'       => $type === 'integer' ? 0 : '',
        ] );
    }

    // ── gm_language ───────────────────────────────────────────────────────────
    register_post_meta( 'gm_language', 'flag_emoji',    [ 'type' => 'string',  'single' => true, 'show_in_rest' => true, 'auth_callback' => function(){ return current_user_can('edit_posts'); }, 'default' => '' ] );
    register_post_meta( 'gm_language', 'display_order', [ 'type' => 'integer', 'single' => true, 'show_in_rest' => true, 'auth_callback' => function(){ return current_user_can('edit_posts'); }, 'default' => 0 ] );

    // ── gm_campaign ───────────────────────────────────────────────────────────
    $campaign_meta = [
        'game_genre'    => 'string',
        'developer'     => 'string',
        'vote_count'    => 'integer',
        'vote_target'   => 'integer',
        'languages'     => 'string',
        'status'        => 'string',
        'trending'      => 'boolean',
        'comment_count' => 'integer',
        'display_order' => 'integer',
    ];
    foreach ( $campaign_meta as $key => $type ) {
        register_post_meta( 'gm_campaign', $key, [
            'type'          => $type,
            'single'        => true,
            'show_in_rest'  => true,
            'auth_callback' => function() { return current_user_can( 'edit_posts' ); },
            'default'       => $type === 'boolean' ? false : ( $type === 'integer' ? 0 : '' ),
        ] );
    }
}
add_action( 'init', 'gm_register_meta_fields' );


// ─────────────────────────────────────────────────────────────────────────────
// 3. ADMIN COLUMNS for CPTs
// ─────────────────────────────────────────────────────────────────────────────

// Games: show Studio + Featured + Order columns
add_filter( 'manage_gm_game_posts_columns', function( $cols ) {
    return array_merge( $cols, [ 'studio' => 'Studio', 'lang_count' => 'Languages', 'featured' => 'Featured', 'order' => 'Order' ] );
} );
add_action( 'manage_gm_game_posts_custom_column', function( $col, $post_id ) {
    if ( $col === 'studio' )     echo esc_html( get_post_meta( $post_id, 'studio_name', true ) );
    if ( $col === 'lang_count' ) echo esc_html( get_post_meta( $post_id, 'language_count', true ) );
    if ( $col === 'featured' )   echo get_post_meta( $post_id, 'featured', true ) ? '⭐' : '—';
    if ( $col === 'order' )      echo esc_html( get_post_meta( $post_id, 'display_order', true ) ?: '0' );
}, 10, 2 );

// Campaigns: show genre + votes + trending
add_filter( 'manage_gm_campaign_posts_columns', function( $cols ) {
    return array_merge( $cols, [ 'genre' => 'Genre', 'votes' => 'Votes', 'trending' => 'Trending' ] );
} );
add_action( 'manage_gm_campaign_posts_custom_column', function( $col, $post_id ) {
    if ( $col === 'genre' )    echo esc_html( get_post_meta( $post_id, 'game_genre', true ) );
    if ( $col === 'votes' )    echo esc_html( get_post_meta( $post_id, 'vote_count', true ) ?: '0' );
    if ( $col === 'trending' ) echo get_post_meta( $post_id, 'trending', true ) ? '🔥' : '—';
}, 10, 2 );

// Services: show order column
add_filter( 'manage_gm_service_posts_columns', function( $cols ) {
    return array_merge( $cols, [ 'order' => 'Order' ] );
} );
add_action( 'manage_gm_service_posts_custom_column', function( $col, $post_id ) {
    if ( $col === 'order' ) echo esc_html( get_post_meta( $post_id, 'display_order', true ) ?: '0' );
}, 10, 2 );
