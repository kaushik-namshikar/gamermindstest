<?php
/**
 * Block: gm/games-portfolio
 * Mirrors: Developers.tsx — games portfolio section EXACTLY.
 * grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6
 * rounded-2xl border-2 border-purple-400/30 — content always visible at bottom
 */
$a            = $attributes ?? [];
$heading      = isset( $a['heading'] )      ? esc_html( $a['heading'] )    : 'GAMES WE WORKED ON';
$subheading   = isset( $a['subheading'] )   ? esc_html( $a['subheading'] ) : 'Trusted by studios across multiple genres';
$per_page     = isset( $a['postsPerPage'] ) ? intval( $a['postsPerPage'] ) : 6;
$featured_only = ! empty( $a['featuredOnly'] );

$args = [
    'post_type'      => 'gm_game',
    'posts_per_page' => $per_page,
    'orderby'        => 'meta_value_num',
    'meta_key'       => 'display_order',
    'order'          => 'ASC',
    'post_status'    => 'publish',
];
if ( $featured_only ) {
    $args['meta_query'] = [ [ 'key' => 'featured', 'value' => '1' ] ];
}
$query = new WP_Query( $args );
?>
<section class="gm-portfolio" style="padding:5rem 1.5rem;position:relative;overflow:hidden;">

    <!-- Animated background orbs -->
    <div style="position:absolute;top:25%;left:25%;width:24rem;height:24rem;border-radius:50%;background:rgba(168,85,247,0.08);filter:blur(3rem);pointer-events:none;"></div>
    <div style="position:absolute;bottom:25%;right:25%;width:24rem;height:24rem;border-radius:50%;background:rgba(99,102,241,0.08);filter:blur(3rem);pointer-events:none;"></div>

    <div style="max-width:80rem;margin:0 auto;position:relative;z-index:1;">

        <div class="gm-fade-in" style="text-align:center;margin-bottom:4rem;">
            <h2 style="font-size:clamp(2.25rem,4vw,3rem);font-weight:900;color:#fff;margin:0 0 1rem;"><?php echo $heading; ?></h2>
            <?php if ( $subheading ) : ?>
            <p style="color:#d8b4fe;font-size:1.25rem;font-weight:700;margin:0;"><?php echo $subheading; ?></p>
            <?php endif; ?>
        </div>

        <?php if ( $query->have_posts() ) : ?>
        <div class="gm-portfolio-grid" style="display:grid;grid-template-columns:repeat(6,1fr);gap:1.5rem;">
            <?php $gi = 0; while ( $query->have_posts() ) : $query->the_post(); $gi++;
                $lang_count = get_post_meta( get_the_ID(), 'language_count', true );
                $game_link  = get_post_meta( get_the_ID(), 'game_link',      true );
                $thumb      = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
                if ( ! $thumb ) $thumb = get_post_meta( get_the_ID(), '_seed_image_url', true );
                $tag   = $game_link ? 'a' : 'div';
                $attrs = $game_link ? ' href="' . esc_url( $game_link ) . '" target="_blank" rel="noopener"' : '';
            ?>
            <div class="gm-portfolio-item gm-fade-in gm-fade-in--delay-<?php echo min( $gi, 5 ); ?>"
                 style="position:relative;">
                <!-- Hover glow border -->
                <div class="gm-portfolio-glow" style="position:absolute;inset:-4px;background:linear-gradient(135deg,#a855f7,#6366f1);border-radius:1rem;opacity:0;transition:opacity 0.5s ease;filter:blur(8px);pointer-events:none;"></div>

                <<?php echo $tag; ?><?php echo $attrs; ?>
                    style="position:relative;display:block;aspect-ratio:3/4;border-radius:1rem;overflow:hidden;border:2px solid rgba(192,132,252,0.3);box-shadow:0 8px 24px rgba(0,0,0,0.4);text-decoration:none;transition:all 0.3s ease;"
                    onmouseover="this.parentElement.querySelector('.gm-portfolio-glow').style.opacity='0.5';this.style.borderColor='rgba(192,132,252,0.7)';"
                    onmouseout="this.parentElement.querySelector('.gm-portfolio-glow').style.opacity='0';this.style.borderColor='rgba(192,132,252,0.3)';">

                    <?php if ( $thumb ) : ?>
                        <img src="<?php echo esc_url( $thumb ); ?>"
                             alt="<?php the_title_attribute(); ?>"
                             loading="lazy"
                             style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s ease;">
                    <?php else : ?>
                        <div style="width:100%;height:100%;background:rgba(88,28,135,0.2);display:flex;align-items:center;justify-content:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="rgba(192,132,252,0.4)" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        </div>
                    <?php endif; ?>

                    <!-- Gradient overlay always visible — from gray-950 to transparent (like React) -->
                    <div style="position:absolute;inset:0;background:linear-gradient(to top,#030712 0%,rgba(3,7,18,0.6) 40%,transparent 100%);pointer-events:none;"></div>

                    <!-- Shine effect on hover -->
                    <div class="gm-portfolio-shine" style="position:absolute;inset:0;background:linear-gradient(45deg,transparent 30%,rgba(255,255,255,0.08) 50%,transparent 70%);opacity:0;transition:opacity 0.3s;pointer-events:none;"></div>

                    <!-- Content always at bottom -->
                    <div style="position:absolute;bottom:0;left:0;right:0;padding:1rem;">
                        <p style="color:#fff;font-weight:900;font-size:0.875rem;margin:0 0 0.25rem;line-height:1.3;"><?php the_title(); ?></p>
                        <?php if ( $lang_count ) : ?>
                        <p style="color:#d8b4fe;font-size:0.75rem;font-weight:600;margin:0;"><?php echo esc_html( $lang_count ); ?></p>
                        <?php endif; ?>
                    </div>
                </<?php echo $tag; ?>>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <?php else : ?>
        <div style="text-align:center;padding:4rem 2rem;border:2px dashed rgba(192,132,252,0.3);border-radius:1rem;">
            <p style="color:rgba(216,180,254,0.6);margin:0 0 0.75rem;">No games found.</p>
            <?php if ( current_user_can( 'edit_posts' ) ) : ?>
            <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=gm_game' ) ); ?>" style="color:#a855f7;font-size:0.875rem;">Add your first game →</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

    </div>
</section>
<style>
.gm-portfolio-item:hover .gm-portfolio-shine { opacity:1 !important; }
.gm-portfolio-item:hover img { transform:scale(1.1) !important; }
/* React: grid-cols-2 md:grid-cols-3 lg:grid-cols-6 */
@media (max-width:767px)  { .gm-portfolio-grid { grid-template-columns:repeat(2,1fr) !important; } }
@media (min-width:768px) and (max-width:1023px) { .gm-portfolio-grid { grid-template-columns:repeat(3,1fr) !important; } }
</style>
