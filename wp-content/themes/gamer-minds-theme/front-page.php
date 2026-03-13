<?php
/**
 * Template: Front Page
 * Mirrors: Landing.tsx — gm/landing-hero
 */
get_header();

// Check for editor-placed Gutenberg content
$editor_content = '';
if ( have_posts() ) { the_post(); $editor_content = trim( get_the_content() ); }
?>

<main id="gm-main" class="gm-page gm-page--landing">
    <?php
    if ( ! empty( $editor_content ) ) :
        echo apply_filters( 'the_content', $editor_content );
    else :
        echo do_blocks( '<!-- wp:gm/landing-hero /-->' );
    endif;
    ?>
</main>

<?php
// Landing page intentionally has no footer (matches React Landing.tsx)
wp_footer();
?>
</body>
</html>
