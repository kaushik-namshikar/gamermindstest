<?php
/**
 * Template Name: Players Page
 *
 * A player-focused landing page which can be assembled using the
 * Gutenberg blocks provided by this theme.
 */

get_header();
?>

<main id="site-content" class="gm-site-content">
    <?php
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            the_content();
        }
    }
    ?>
</main>

<?php
get_footer();
