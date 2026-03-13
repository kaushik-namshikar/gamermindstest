<?php
/**
 * Template Name: Front Page
 *
 * Uses block editor content to build the homepage. Blocks can be assembled
 * with the reusable Gamer Minds components.
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
