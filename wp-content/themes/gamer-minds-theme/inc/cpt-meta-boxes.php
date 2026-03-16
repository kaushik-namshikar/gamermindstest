<?php
/**
 * Admin meta boxes for all Gamer Minds CPTs.
 * Provides a clean editing UI in wp-admin for each custom post type.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ─────────────────────────────────────────────────────────────────────────────
// REGISTER META BOXES
// ─────────────────────────────────────────────────────────────────────────────
function gm_add_meta_boxes() {
    add_meta_box( 'gm_game_details',     'Game Details',     'gm_game_meta_box',     'gm_game',     'normal', 'high' );
    add_meta_box( 'gm_service_details',  'Service Details',  'gm_service_meta_box',  'gm_service',  'normal', 'high' );
    add_meta_box( 'gm_language_details', 'Language Details', 'gm_language_meta_box', 'gm_language', 'normal', 'high' );
    add_meta_box( 'gm_campaign_details', 'Campaign Details', 'gm_campaign_meta_box', 'gm_campaign', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'gm_add_meta_boxes' );

// Shared nonce field helper
function gm_nonce( $action ) {
    wp_nonce_field( 'gm_' . $action . '_save', 'gm_' . $action . '_nonce' );
}

// Shared field row helper
function gm_field_row( $label, $content ) {
    echo '<tr><th style="width:180px;padding:8px 12px 8px 0;vertical-align:top"><label>' . esc_html( $label ) . '</label></th><td style="padding:6px 0">' . $content . '</td></tr>';
}

function gm_text( $name, $value, $placeholder = '' ) {
    return '<input type="text" name="' . esc_attr( $name ) . '" value="' . esc_attr( $value ) . '" class="large-text" placeholder="' . esc_attr( $placeholder ) . '">';
}

function gm_url( $name, $value ) {
    return '<input type="url" name="' . esc_attr( $name ) . '" value="' . esc_attr( $value ) . '" class="large-text">';
}

function gm_number( $name, $value, $min = 0 ) {
    return '<input type="number" name="' . esc_attr( $name ) . '" value="' . esc_attr( $value ) . '" class="small-text" min="' . esc_attr( $min ) . '">';
}

function gm_checkbox( $name, $checked ) {
    return '<input type="checkbox" name="' . esc_attr( $name ) . '" value="1" ' . checked( $checked, '1', false ) . '> Yes';
}

function gm_textarea( $name, $value, $rows = 3 ) {
    return '<textarea name="' . esc_attr( $name ) . '" class="large-text" rows="' . esc_attr( $rows ) . '">' . esc_textarea( $value ) . '</textarea>';
}

// ─────────────────────────────────────────────────────────────────────────────
// GAME META BOX
// ─────────────────────────────────────────────────────────────────────────────
function gm_game_meta_box( $post ) {
    gm_nonce( 'game' );
    $s = get_post_meta( $post->ID, 'studio_name',    true );
    $p = get_post_meta( $post->ID, 'platforms',      true );
    $l = get_post_meta( $post->ID, 'language_count', true );
    $u = get_post_meta( $post->ID, 'game_link',      true );
    $f = get_post_meta( $post->ID, 'featured',       true );
    $o = get_post_meta( $post->ID, 'display_order',  true );
    ?>
    <p style="margin:0 0 12px;color:#666;font-size:13px">
        Set the featured image (top right) as the game cover. The post title is the game name.
    </p>
    <table class="form-table" style="margin:0">
        <?php
        gm_field_row( 'Studio Name',    gm_text( 'studio_name', $s, 'e.g. Moonlit Studios' ) );
        gm_field_row( 'Platforms',      gm_text( 'platforms', $p, 'PC, PS5, Xbox' ) );
        gm_field_row( 'Language Count', gm_text( 'language_count', $l, 'e.g. 8 languages' ) );
        gm_field_row( 'Game URL',       gm_url( 'game_link', $u ) );
        gm_field_row( 'Featured',       gm_checkbox( 'featured', $f ) );
        gm_field_row( 'Display Order',  gm_number( 'display_order', $o ?: 0 ) );
        ?>
    </table>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// SERVICE META BOX
// ─────────────────────────────────────────────────────────────────────────────
function gm_service_meta_box( $post ) {
    gm_nonce( 'service' );
    $d  = get_post_meta( $post->ID, 'service_description', true );
    $dt = get_post_meta( $post->ID, 'service_details',     true );
    $ic = get_post_meta( $post->ID, 'icon_svg_path',       true );
    $o  = get_post_meta( $post->ID, 'display_order',       true );
    ?>
    <p style="margin:0 0 12px;color:#666;font-size:13px">
        The post title is the service name. Set a featured image as the service icon (optional).
    </p>
    <table class="form-table" style="margin:0">
        <?php
        gm_field_row( 'Short Description',   gm_text( 'service_description', $d, 'One-line service summary' ) );
        gm_field_row( 'Details / Scope',     gm_textarea( 'service_details', $dt ) );
        gm_field_row( 'SVG Icon Path',       gm_textarea( 'icon_svg_path', $ic, 2 ) . '<p class="description">Paste the SVG <code>&lt;path&gt;</code> / <code>&lt;circle&gt;</code> elements only (no outer &lt;svg&gt; tag). Leave empty to use default icon.</p>' );
        gm_field_row( 'Display Order',       gm_number( 'display_order', $o ?: 0 ) );
        ?>
    </table>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// LANGUAGE META BOX
// ─────────────────────────────────────────────────────────────────────────────
function gm_language_meta_box( $post ) {
    gm_nonce( 'language' );
    $f = get_post_meta( $post->ID, 'flag_emoji',    true );
    $o = get_post_meta( $post->ID, 'display_order', true );
    ?>
    <p style="margin:0 0 12px;color:#666;font-size:13px">
        The post title is the language name (e.g. <em>Japanese</em>).
    </p>
    <table class="form-table" style="margin:0">
        <?php
        gm_field_row( 'Flag Emoji',    gm_text( 'flag_emoji', $f, '🇯🇵' ) );
        gm_field_row( 'Display Order', gm_number( 'display_order', $o ?: 0 ) );
        ?>
    </table>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// CAMPAIGN META BOX
// ─────────────────────────────────────────────────────────────────────────────
function gm_campaign_meta_box( $post ) {
    gm_nonce( 'campaign' );
    $genre    = get_post_meta( $post->ID, 'game_genre',    true );
    $dev      = get_post_meta( $post->ID, 'developer',     true );
    $votes    = get_post_meta( $post->ID, 'vote_count',    true );
    $target   = get_post_meta( $post->ID, 'vote_target',   true );
    $langs    = get_post_meta( $post->ID, 'languages',     true );
    $status   = get_post_meta( $post->ID, 'status',        true );
    $trending = get_post_meta( $post->ID, 'trending',      true );
    $comments = get_post_meta( $post->ID, 'comment_count', true );
    $order    = get_post_meta( $post->ID, 'display_order', true );
    ?>
    <p style="margin:0 0 12px;color:#666;font-size:13px">
        The post title is the game name. Set a featured image as the game cover.
    </p>
    <table class="form-table" style="margin:0">
        <?php
        gm_field_row( 'Genre',          gm_text( 'game_genre', $genre, 'e.g. Soulslike JRPG' ) );
        gm_field_row( 'Developer',      gm_text( 'developer', $dev, 'e.g. Moonlit Studios' ) );
        gm_field_row( 'Vote Count',     gm_number( 'vote_count', $votes ?: 0 ) );
        gm_field_row( 'Vote Target',    gm_number( 'vote_target', $target ?: 5000 ) );
        gm_field_row( 'Languages',      gm_text( 'languages', $langs, 'Portuguese (BR), Spanish, French' ) . '<p class="description">Comma-separated list of target languages</p>' );
        gm_field_row( 'Status Text',    gm_text( 'status', $status, 'Dev is listening' ) );
        gm_field_row( 'Trending',       gm_checkbox( 'trending', $trending ) );
        gm_field_row( 'Comment Count',  gm_number( 'comment_count', $comments ?: 0 ) );
        gm_field_row( 'Display Order',  gm_number( 'display_order', $order ?: 0 ) );
        ?>
    </table>
    <?php
}

// ─────────────────────────────────────────────────────────────────────────────
// SAVE META BOX DATA
// ─────────────────────────────────────────────────────────────────────────────
function gm_save_meta( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) )    return;

    $type = get_post_type( $post_id );

    // GAME
    if ( $type === 'gm_game' && isset( $_POST['gm_game_nonce'] ) &&
         wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['gm_game_nonce'] ) ), 'gm_game_save' ) ) {
        update_post_meta( $post_id, 'studio_name',    sanitize_text_field( wp_unslash( $_POST['studio_name']    ?? '' ) ) );
        update_post_meta( $post_id, 'platforms',      sanitize_text_field( wp_unslash( $_POST['platforms']      ?? '' ) ) );
        update_post_meta( $post_id, 'language_count', sanitize_text_field( wp_unslash( $_POST['language_count'] ?? '' ) ) );
        update_post_meta( $post_id, 'game_link',      esc_url_raw(         wp_unslash( $_POST['game_link']      ?? '' ) ) );
        update_post_meta( $post_id, 'featured',       isset( $_POST['featured'] ) ? '1' : '' );
        update_post_meta( $post_id, 'display_order',  absint( $_POST['display_order'] ?? 0 ) );
    }

    // SERVICE
    if ( $type === 'gm_service' && isset( $_POST['gm_service_nonce'] ) &&
         wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['gm_service_nonce'] ) ), 'gm_service_save' ) ) {
        update_post_meta( $post_id, 'service_description', sanitize_text_field( wp_unslash( $_POST['service_description'] ?? '' ) ) );
        update_post_meta( $post_id, 'service_details',     sanitize_textarea_field( wp_unslash( $_POST['service_details'] ?? '' ) ) );
        update_post_meta( $post_id, 'icon_svg_path',       wp_kses( wp_unslash( $_POST['icon_svg_path'] ?? '' ), [ 'path' => [ 'd' => true, 'fill' => true, 'stroke' => true ], 'circle' => [ 'cx' => true, 'cy' => true, 'r' => true ], 'rect' => [ 'x' => true, 'y' => true, 'width' => true, 'height' => true, 'rx' => true ] ] ) );
        update_post_meta( $post_id, 'display_order',       absint( $_POST['display_order'] ?? 0 ) );
    }

    // LANGUAGE
    if ( $type === 'gm_language' && isset( $_POST['gm_language_nonce'] ) &&
         wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['gm_language_nonce'] ) ), 'gm_language_save' ) ) {
        update_post_meta( $post_id, 'flag_emoji',    sanitize_text_field( wp_unslash( $_POST['flag_emoji']    ?? '' ) ) );
        update_post_meta( $post_id, 'display_order', absint( $_POST['display_order'] ?? 0 ) );
    }

    // CAMPAIGN
    if ( $type === 'gm_campaign' && isset( $_POST['gm_campaign_nonce'] ) &&
         wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['gm_campaign_nonce'] ) ), 'gm_campaign_save' ) ) {
        update_post_meta( $post_id, 'game_genre',    sanitize_text_field( wp_unslash( $_POST['game_genre']  ?? '' ) ) );
        update_post_meta( $post_id, 'developer',     sanitize_text_field( wp_unslash( $_POST['developer']   ?? '' ) ) );
        update_post_meta( $post_id, 'vote_count',    absint( $_POST['vote_count']    ?? 0 ) );
        update_post_meta( $post_id, 'vote_target',   absint( $_POST['vote_target']   ?? 5000 ) );
        update_post_meta( $post_id, 'languages',     sanitize_text_field( wp_unslash( $_POST['languages']   ?? '' ) ) );
        update_post_meta( $post_id, 'status',        sanitize_text_field( wp_unslash( $_POST['status']      ?? '' ) ) );
        update_post_meta( $post_id, 'trending',      isset( $_POST['trending'] ) ? '1' : '' );
        update_post_meta( $post_id, 'comment_count', absint( $_POST['comment_count'] ?? 0 ) );
        update_post_meta( $post_id, 'display_order', absint( $_POST['display_order'] ?? 0 ) );
    }
}
add_action( 'save_post', 'gm_save_meta' );
