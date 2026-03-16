<?php
/**
 * Block: gm/languages
 * Mirrors: Developers.tsx — Languages tag cloud EXACTLY.
 * Badge: px-6 py-3 bg-gradient-to-br from-purple-600/40 to-indigo-600/40
 *        border-2 border-purple-400/50 text-purple-100 font-bold text-base
 */
$a       = $attributes ?? [];
$heading = isset( $a['heading'] ) ? esc_html( $a['heading'] ) : 'LANGUAGES';

$query = new WP_Query( [
    'post_type'      => 'gm_language',
    'posts_per_page' => -1,
    'orderby'        => 'meta_value_num',
    'meta_key'       => 'display_order',
    'order'          => 'ASC',
    'post_status'    => 'publish',
] );

$has_cpt = $query->have_posts();
if ( ! $has_cpt ) {
    $fallback = isset( $a['languageList'] ) ? $a['languageList'] : 'Chinese (Simplified), Chinese (Traditional), French, German, Italian, Japanese, Korean, Polish, Portuguese (Brazil), Spanish (Spain), Spanish (LATAM), Turkish';
    $langs = array_map( 'trim', explode( ',', $fallback ) );
}
?>
<section style="padding:5rem 1.5rem;position:relative;">
    <div style="max-width:72rem;margin:0 auto;">

        <div class="gm-fade-in" style="text-align:center;margin-bottom:3rem;">
            <h2 style="font-size:clamp(2.25rem,4vw,3rem);font-weight:900;color:#fff;margin:0;"><?php echo $heading; ?></h2>
        </div>

        <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:1rem;">
            <?php
            $li = 0;
            if ( $has_cpt ) {
                while ( $query->have_posts() ) {
                    $query->the_post(); $li++;
                    $flag = get_post_meta( get_the_ID(), 'flag_emoji', true );
                    ?>
                    <div class="gm-fade-in gm-fade-in--delay-<?php echo min( $li, 5 ); ?>"
                         style="display:inline-flex;align-items:center;gap:0.375rem;padding:0.75rem 1.5rem;background:linear-gradient(135deg,rgba(147,51,234,0.4),rgba(79,70,229,0.4));border:2px solid rgba(192,132,252,0.5);border-radius:9999px;color:#f3e8ff;font-weight:700;font-size:1rem;cursor:pointer;transition:all 0.2s ease;"
                         onmouseover="this.style.background='linear-gradient(135deg,rgba(147,51,234,0.6),rgba(79,70,229,0.6))';this.style.transform='scale(1.1)';"
                         onmouseout="this.style.background='linear-gradient(135deg,rgba(147,51,234,0.4),rgba(79,70,229,0.4))';this.style.transform='';">
                        <?php if ( $flag ) : ?><span><?php echo esc_html( $flag ); ?></span><?php endif; ?>
                        <span><?php the_title(); ?></span>
                    </div>
                    <?php
                }
                wp_reset_postdata();
            } else {
                foreach ( $langs as $lang ) {
                    $li++;
                    echo '<div class="gm-fade-in gm-fade-in--delay-' . min( $li, 5 ) . '" '
                        . 'style="padding:0.75rem 1.5rem;background:linear-gradient(135deg,rgba(147,51,234,0.4),rgba(79,70,229,0.4));border:2px solid rgba(192,132,252,0.5);border-radius:9999px;color:#f3e8ff;font-weight:700;font-size:1rem;cursor:pointer;transition:all 0.2s ease;" '
                        . 'onmouseover="this.style.background=\'linear-gradient(135deg,rgba(147,51,234,0.6),rgba(79,70,229,0.6))\';this.style.transform=\'scale(1.1)\';" '
                        . 'onmouseout="this.style.background=\'linear-gradient(135deg,rgba(147,51,234,0.4),rgba(79,70,229,0.4))\';this.style.transform=\'\';">'
                        . esc_html( $lang ) . '</div>';
                }
            }
            ?>
        </div>

        <?php if ( current_user_can( 'edit_posts' ) && ! $has_cpt ) : ?>
        <p style="text-align:center;margin-top:2rem;">
            <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=gm_language' ) ); ?>" style="color:#a855f7;font-size:0.875rem;">Manage languages in admin →</a>
        </p>
        <?php endif; ?>

    </div>
</section>
