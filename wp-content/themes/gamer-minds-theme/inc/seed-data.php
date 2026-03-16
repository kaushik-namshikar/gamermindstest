<?php
/**
 * Seed default content for all CPTs on theme activation.
 * Only inserts posts if the CPT has zero published posts.
 * Runs on `after_switch_theme` hook.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function gm_seed_cpt_data() {
    gm_seed_games();
    gm_seed_services();
    gm_seed_languages();
    gm_seed_campaigns();
    gm_seed_faq();
}
add_action( 'after_switch_theme', 'gm_seed_cpt_data' );

// Helper: insert post + meta only if no posts exist
function gm_maybe_insert( $post_type, $title, $meta = [], $thumb_url = '' ) {
    $existing = get_posts( [ 'post_type' => $post_type, 'posts_per_page' => 1, 'post_status' => 'publish', 'fields' => 'ids' ] );
    // Only seed if the CPT is completely empty
    return empty( $existing ) ? gm_insert_post( $post_type, $title, $meta, $thumb_url ) : 0;
}

function gm_insert_post( $post_type, $title, $meta = [], $excerpt = '' ) {
    $id = wp_insert_post( [
        'post_title'   => $title,
        'post_status'  => 'publish',
        'post_type'    => $post_type,
        'post_excerpt' => $excerpt,
    ] );
    if ( $id && ! is_wp_error( $id ) ) {
        foreach ( $meta as $key => $value ) {
            update_post_meta( $id, $key, $value );
        }
    }
    return $id;
}

// ─────────────────────────────────────────────────────────────────────────────
// GAMES
// ─────────────────────────────────────────────────────────────────────────────
function gm_seed_games() {
    $existing = get_posts( [ 'post_type' => 'gm_game', 'posts_per_page' => 1, 'post_status' => 'publish', 'fields' => 'ids' ] );
    if ( ! empty( $existing ) ) return;

    $games = [
        [ 'Fantasy Quest',       'Ember Games',     'PC, PS5',         '12 languages', 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=800&q=80',  1 ],
        [ 'Cyber Warriors',      'Neon Studio',     'PC, Xbox',        '9 languages',  'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=800&q=80',   2 ],
        [ 'Pixel Legends',       'Pixel Forge',     'PC',              '6 languages',  'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=800&q=80',  3 ],
        [ 'Empire Simulator',    'Grand Arc',       'PC, Mobile',      '8 languages',  'https://images.unsplash.com/photo-1614294148960-9aa740632a87?w=800&q=80',  4 ],
        [ 'Tactical Command',    'Iron Flag',       'PC, PS5, Xbox',   '11 languages', 'https://images.unsplash.com/photo-1580327332925-a10e6cb11baa?w=800&q=80',  5 ],
        [ 'Adventure Odyssey',   'Wanderer Dev',    'PC, Switch',      '7 languages',  'https://images.unsplash.com/photo-1509198397868-475647b2a1e5?w=800&q=80',  6 ],
    ];

    foreach ( $games as [ $title, $studio, $platforms, $langs, $img, $order ] ) {
        $id = gm_insert_post( 'gm_game', $title, [
            'studio_name'    => $studio,
            'platforms'      => $platforms,
            'language_count' => $langs,
            'game_link'      => '',
            'featured'       => '1',
            'display_order'  => $order,
        ] );
        // Store image URL as post meta for the renderer (media library not available for seeding)
        if ( $id ) update_post_meta( $id, '_seed_image_url', $img );
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// SERVICES
// ─────────────────────────────────────────────────────────────────────────────
function gm_seed_services() {
    $existing = get_posts( [ 'post_type' => 'gm_service', 'posts_per_page' => 1, 'post_status' => 'publish', 'fields' => 'ids' ] );
    if ( ! empty( $existing ) ) return;

    $services = [
        [
            'title'       => 'Translation',
            'description' => 'Native-speaking translators with deep gaming expertise.',
            'details'     => 'Game strings, UI text, subtitles, scripts, marketing copy',
            'icon'        => '<path d="M12.87 15.07l-2.54-2.51.03-.03c1.74-1.94 2.98-4.17 3.71-6.53H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"/>',
            'order'       => 1,
        ],
        [
            'title'       => 'Editing & Proofreading',
            'description' => 'Professional linguistic quality assurance and editing.',
            'details'     => 'Grammar, consistency, tone matching, brand voice preservation',
            'icon'        => '<path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>',
            'order'       => 2,
        ],
        [
            'title'       => 'LQA Testing',
            'description' => 'Linguistic quality assurance to catch in-context issues.',
            'details'     => 'Text overflow, encoding errors, cultural accuracy, contextual review',
            'icon'        => '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>',
            'order'       => 3,
        ],
        [
            'title'       => 'Project Management',
            'description' => 'Single point of contact with a streamlined workflow.',
            'details'     => 'Timeline management, file handling, delivery coordination',
            'icon'        => '<path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>',
            'order'       => 4,
        ],
    ];

    foreach ( $services as $s ) {
        gm_insert_post( 'gm_service', $s['title'], [
            'service_description' => $s['description'],
            'service_details'     => $s['details'],
            'icon_svg_path'       => $s['icon'],
            'display_order'       => $s['order'],
        ] );
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// LANGUAGES
// ─────────────────────────────────────────────────────────────────────────────
function gm_seed_languages() {
    $existing = get_posts( [ 'post_type' => 'gm_language', 'posts_per_page' => 1, 'post_status' => 'publish', 'fields' => 'ids' ] );
    if ( ! empty( $existing ) ) return;

    $languages = [
        [ 'Chinese (Simplified)',  '🇨🇳', 1  ],
        [ 'Chinese (Traditional)', '🇹🇼', 2  ],
        [ 'French',                '🇫🇷', 3  ],
        [ 'German',                '🇩🇪', 4  ],
        [ 'Italian',               '🇮🇹', 5  ],
        [ 'Japanese',              '🇯🇵', 6  ],
        [ 'Korean',                '🇰🇷', 7  ],
        [ 'Polish',                '🇵🇱', 8  ],
        [ 'Portuguese (Brazil)',   '🇧🇷', 9  ],
        [ 'Spanish (Spain)',       '🇪🇸', 10 ],
        [ 'Spanish (LATAM)',       '🌎', 11 ],
        [ 'Turkish',               '🇹🇷', 12 ],
        [ 'Russian',               '🇷🇺', 13 ],
        [ 'Arabic',                '🇸🇦', 14 ],
        [ 'Thai',                  '🇹🇭', 15 ],
        [ 'Vietnamese',            '🇻🇳', 16 ],
        [ 'Indonesian',            '🇮🇩', 17 ],
        [ 'Czech',                 '🇨🇿', 18 ],
    ];

    foreach ( $languages as [ $name, $flag, $order ] ) {
        gm_insert_post( 'gm_language', $name, [
            'flag_emoji'    => $flag,
            'display_order' => $order,
        ] );
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// CAMPAIGNS
// ─────────────────────────────────────────────────────────────────────────────
function gm_seed_campaigns() {
    $existing = get_posts( [ 'post_type' => 'gm_campaign', 'posts_per_page' => 1, 'post_status' => 'publish', 'fields' => 'ids' ] );
    if ( ! empty( $existing ) ) return;

    $campaigns = [
        [
            'title'    => 'Echoes of the Abyss',
            'genre'    => 'Soulslike JRPG',
            'dev'      => 'Moonlit Studios',
            'votes'    => 3847,
            'target'   => 5000,
            'langs'    => 'Portuguese (BR), Spanish, French',
            'status'   => 'Dev is listening',
            'trending' => '1',
            'comments' => 127,
            'img'      => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=800&q=80',
            'order'    => 1,
        ],
        [
            'title'    => 'Neon Protocols',
            'genre'    => 'Cyberpunk RPG',
            'dev'      => 'Pixel Forge',
            'votes'    => 2921,
            'target'   => 4000,
            'langs'    => 'Korean, Japanese, Chinese',
            'status'   => 'Building case',
            'trending' => '',
            'comments' => 89,
            'img'      => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?w=800&q=80',
            'order'    => 2,
        ],
        [
            'title'    => 'Celestial Forge',
            'genre'    => 'Fantasy Tactics',
            'dev'      => 'Ember Games',
            'votes'    => 2104,
            'target'   => 3500,
            'langs'    => 'Polish, Russian, Turkish',
            'status'   => 'Just launched',
            'trending' => '',
            'comments' => 54,
            'img'      => 'https://images.unsplash.com/photo-1538481199705-c710c4e965fc?w=800&q=80',
            'order'    => 3,
        ],
    ];

    foreach ( $campaigns as $c ) {
        $id = gm_insert_post( 'gm_campaign', $c['title'], [
            'game_genre'    => $c['genre'],
            'developer'     => $c['dev'],
            'vote_count'    => $c['votes'],
            'vote_target'   => $c['target'],
            'languages'     => $c['langs'],
            'status'        => $c['status'],
            'trending'      => $c['trending'],
            'comment_count' => $c['comments'],
            'display_order' => $c['order'],
        ] );
        if ( $id ) update_post_meta( $id, '_seed_image_url', $c['img'] );
    }
}

// ─────────────────────────────────────────────────────────────────────────────
// FAQ
// ─────────────────────────────────────────────────────────────────────────────
function gm_seed_faq() {
    $existing = get_posts( [ 'post_type' => 'gm_faq', 'posts_per_page' => 1, 'post_status' => 'publish', 'fields' => 'ids' ] );
    if ( ! empty( $existing ) ) return;

    $faqs = [
        [ 'How is this different from asking on Reddit or forums?', "Reddit posts get buried. We organize demand across platforms and turn it into data packages that studios actually review. Think of it as aggregating all those scattered forum posts into one professional pitch.", 1 ],
        [ "Does this actually work?", "We've helped ship 25+ localizations. Can't guarantee every campaign succeeds, but we've got a track record. Check the success stories — these are real games that got localized because the community showed up.", 2 ],
        [ 'What makes a campaign successful?', "Vote count matters, but so does showing you'll actually buy it. We track ownership data, purchase intent, and regional demographics. It's about quality data, not just raw numbers.", 3 ],
        [ 'Can I help translate?', "Yeah! When devs are interested but budget-constrained, we connect them with community translators. Some of our members have landed actual industry jobs this way.", 4 ],
        [ 'What kind of games do you focus on?', 'Mostly indie and mid-size studios who want to localize but need proof of demand. JRPGs, visual novels, narrative games, story-heavy indies are our bread and butter.', 5 ],
    ];

    foreach ( $faqs as [ $q, $a, $order ] ) {
        $id = wp_insert_post( [
            'post_title'   => $q,
            'post_content' => $a,
            'post_status'  => 'publish',
            'post_type'    => 'gm_faq',
            'menu_order'   => $order,
        ] );
    }
}
