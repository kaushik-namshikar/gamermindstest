<?php
/**
 * Block: gm/faq
 * Queries gm_faq CPT — smooth accordion.
 * Mirrors: Players.tsx FAQ section.
 */
$a               = $attributes ?? [];
$section_heading = isset( $a['heading'] )    ? esc_html( $a['heading'] )    : 'Common questions';
$section_sub     = isset( $a['subheading'] ) ? esc_html( $a['subheading'] ) : 'Everything you need to know';

$query = new WP_Query( [
    'post_type'      => 'gm_faq',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'post_status'    => 'publish',
] );
?>
<section class="gm-faq" id="faq" style="background:#1b2838;padding:3rem 1.5rem;">
    <div style="max-width:56rem;margin:0 auto;">
        <div class="gm-fade-in" style="margin-bottom:2rem;">
            <h2 style="font-size:1.875rem;font-weight:900;color:#fff;margin-bottom:0.5rem;"><?php echo $section_heading; ?></h2>
            <p style="color:#8f98a0;margin:0;"><?php echo $section_sub; ?></p>
        </div>

        <?php if ( $query->have_posts() ) : ?>
        <div class="gm-accordion" role="list" style="display:flex;flex-direction:column;gap:0.75rem;">
            <?php $fi = 0; while ( $query->have_posts() ) : $query->the_post(); $fi++;
                $item_id = 'gm-faq-' . get_the_ID();
            ?>
            <div class="gm-accordion__item gm-fade-in gm-fade-in--delay-<?php echo min( $fi, 5 ); ?>"
                 role="listitem"
                 style="background:#171a21;border:1px solid #2a475e;padding:0 1.25rem;">
                <button
                    class="gm-accordion__trigger"
                    aria-expanded="false"
                    aria-controls="<?php echo esc_attr( $item_id ); ?>"
                    id="<?php echo esc_attr( $item_id ); ?>-btn"
                    style="color:#fff;font-weight:700;text-align:left;"
                >
                    <?php the_title(); ?>
                    <svg class="gm-accordion__chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </button>
                <div
                    class="gm-accordion__content"
                    id="<?php echo esc_attr( $item_id ); ?>"
                    role="region"
                    aria-labelledby="<?php echo esc_attr( $item_id ); ?>-btn"
                    style="color:#c7d5e0;"
                >
                    <?php echo wp_kses_post( get_the_content() ); ?>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php else : ?>
        <div style="text-align:center;padding:3rem;border:2px dashed #2a475e;border-radius:0.5rem;">
            <p style="color:#8f98a0;margin:0 0 0.75rem;">No FAQ items found.</p>
            <?php if ( current_user_can( 'edit_posts' ) ) : ?>
            <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=gm_faq' ) ); ?>" style="color:#66c0f4;font-size:0.875rem;">Add your first FAQ item →</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
