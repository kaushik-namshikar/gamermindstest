<?php
/**
 * Template Name: Players Page
 * Template: page-players
 * Mirrors: Players.tsx
 * Blocks (in order):
 *   1. gm/players-hero
 *   2. gm/campaigns
 *   3. gm/how-it-works
 *   4. gm/regions
 *   5. gm/success-stories
 *   6. gm/discord-cta
 *   7. gm/faq
 */
get_header();

$editor_content = '';
if ( have_posts() ) { the_post(); $editor_content = trim( get_the_content() ); }
?>

<main id="gm-main" class="gm-page gm-page--players">
    <?php
    if ( ! empty( $editor_content ) ) :
        echo apply_filters( 'the_content', $editor_content );
    else :
        echo do_blocks( '<!-- wp:gm/players-hero /-->' );
        echo do_blocks( '<!-- wp:gm/campaigns /-->' );
        echo do_blocks( '<!-- wp:gm/how-it-works /-->' );
        echo do_blocks( '<!-- wp:gm/regions /-->' );
        echo do_blocks( '<!-- wp:gm/success-stories /-->' );
        echo do_blocks( '<!-- wp:gm/discord-cta /-->' );
        echo do_blocks( '<!-- wp:gm/faq /-->' );
    endif;
    ?>
</main>

<?php get_footer(); ?>
