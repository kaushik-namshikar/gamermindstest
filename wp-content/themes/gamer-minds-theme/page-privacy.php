<?php
/**
 * Template Name: Privacy Policy
 * Template: page-privacy
 * Mirrors: Privacy.tsx
 * Blocks (in order):
 *   1. gm/policy-header
 *   2. gm/policy-content (privacy variant)
 */
get_header();

$editor_content = '';
if ( have_posts() ) { the_post(); $editor_content = trim( get_the_content() ); }
?>

<main id="gm-main" class="gm-page gm-page--privacy">
    <?php
    if ( ! empty( $editor_content ) ) :
        echo apply_filters( 'the_content', $editor_content );
    else :
        echo do_blocks( '<!-- wp:gm/policy-header {"variant":"privacy"} /-->' );
        echo do_blocks( '<!-- wp:gm/policy-content {"variant":"privacy"} /-->' );
    endif;
    ?>
</main>

<?php get_footer(); ?>
