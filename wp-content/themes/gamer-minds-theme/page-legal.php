<?php
/**
 * Template Name: Legal / Terms
 * Template: page-legal
 * Mirrors: Legal.tsx
 * Blocks (in order):
 *   1. gm/policy-header
 *   2. gm/policy-content (legal variant)
 */
get_header();

$editor_content = '';
if ( have_posts() ) { the_post(); $editor_content = trim( get_the_content() ); }
?>

<main id="gm-main" class="gm-page gm-page--legal">
    <?php
    if ( ! empty( $editor_content ) ) :
        echo apply_filters( 'the_content', $editor_content );
    else :
        echo do_blocks( '<!-- wp:gm/policy-header {"variant":"legal"} /-->' );
        echo do_blocks( '<!-- wp:gm/policy-content {"variant":"legal"} /-->' );
    endif;
    ?>
</main>

<?php get_footer(); ?>
