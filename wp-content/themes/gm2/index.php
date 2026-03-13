<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 *
 * @package gamer-minds-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();

if ( have_posts() ) :
    while ( have_posts() ) :
        the_post();
        the_content();
    endwhile;
else :
    ?>
    <div class="no-content">
        <p><?php esc_html_e( 'No content found', 'gamer-minds-theme' ); ?></p>
    </div>
    <?php
endif;

get_footer();
