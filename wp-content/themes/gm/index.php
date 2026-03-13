<?php
/**
 * The main template file
 *
 * This template is used when no other template matches a query.
 * It simply renders the content via the block editor.
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
