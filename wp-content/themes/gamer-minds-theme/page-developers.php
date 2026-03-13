<?php
/**
 * Template Name: Developers Page
 * Template: page-developers
 * Mirrors: Developers.tsx
 * Blocks (in order):
 *   1. gm/dev-hero
 *   2. gm/why-us
 *   3. gm/services
 *   4. gm/games-portfolio
 *   5. gm/process-timeline
 *   6. gm/languages
 *   7. gm/quote-form
 */
get_header();

$editor_content = '';
if ( have_posts() ) { the_post(); $editor_content = trim( get_the_content() ); }
?>

<main id="gm-main" class="gm-page gm-page--developers">
    <?php
    if ( ! empty( $editor_content ) ) :
        echo apply_filters( 'the_content', $editor_content );
    else :
        echo do_blocks( '<!-- wp:gm/dev-hero /-->' );
        echo do_blocks( '<!-- wp:gm/why-us /-->' );
        echo do_blocks( '<!-- wp:gm/services /-->' );
        echo do_blocks( '<!-- wp:gm/games-portfolio /-->' );
        echo do_blocks( '<!-- wp:gm/process-timeline /-->' );
        echo do_blocks( '<!-- wp:gm/languages /-->' );
        echo do_blocks( '<!-- wp:gm/quote-form /-->' );
    endif;
    ?>
</main>

<?php get_footer(); ?>
