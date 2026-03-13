<?php
/**
 * Front Page Template - Landing Page
 *
 * This page displays the two-path landing page with Developer and Player options.
 *
 * @package gamer-minds-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>

<main id="primary" class="site-main front-page">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    else :
        ?>
        <section class="hero hero--two-paths">
            <h1><?php esc_html_e( 'Game Localization Platform', 'gamer-minds-theme' ); ?></h1>
            <p><?php esc_html_e( 'Connect with players who want your games localized or vote for localizations you want to see.', 'gamer-minds-theme' ); ?></p>
        </section>
        <?php
    endif;
    ?>
</main>

<?php
get_footer();
