<?php
/**
 * Block: gm/campaigns
 * Mirrors: Players.tsx — Active Campaigns section EXACTLY.
 * bg-[#171a21] py-12 | grid lg:grid-cols-3 gap-5
 * Card: bg-[#1b2838] hover:bg-[#25374e] border-t border-[#2a475e]
 * Image: h-44 (176px) object-cover | ArrowUp vote button
 */
$a          = $attributes ?? [];
$heading    = isset( $a['heading'] )      ? esc_html( $a['heading'] )      : 'Active campaigns';
$subheading = isset( $a['subheading'] )   ? esc_html( $a['subheading'] )   : 'Help these games reach your region';
$view_all   = isset( $a['viewAllText'] )  ? esc_html( $a['viewAllText'] )  : 'View all 150+ campaigns';
$per_page   = isset( $a['postsPerPage'] ) ? intval( $a['postsPerPage'] )   : 3;

$query = new WP_Query( [
    'post_type'      => 'gm_campaign',
    'posts_per_page' => $per_page,
    'orderby'        => 'meta_value_num',
    'meta_key'       => 'display_order',
    'order'          => 'ASC',
    'post_status'    => 'publish',
] );
?>
<section style="background:#171a21;padding:3rem 1.5rem;">
    <div style="max-width:80rem;margin:0 auto;">

        <div class="gm-fade-in" style="margin-bottom:2rem;">
            <h2 style="font-size:1.875rem;font-weight:900;color:#fff;margin:0 0 0.5rem;"><?php echo $heading; ?></h2>
            <?php if ( $subheading ) : ?>
            <p style="color:#8f98a0;margin:0;"><?php echo $subheading; ?></p>
            <?php endif; ?>
        </div>

        <?php if ( $query->have_posts() ) : ?>
        <div class="gm-campaigns-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.25rem;">
            <?php $ci = 0; while ( $query->have_posts() ) : $query->the_post(); $ci++;
                $genre    = get_post_meta( get_the_ID(), 'game_genre',    true );
                $dev      = get_post_meta( get_the_ID(), 'developer',     true );
                $votes    = intval( get_post_meta( get_the_ID(), 'vote_count',    true ) );
                $target   = intval( get_post_meta( get_the_ID(), 'vote_target',   true ) ) ?: 5000;
                $langs    = get_post_meta( get_the_ID(), 'languages',     true );
                $status   = get_post_meta( get_the_ID(), 'status',        true );
                $trending = get_post_meta( get_the_ID(), 'trending',      true );
                $comments = intval( get_post_meta( get_the_ID(), 'comment_count', true ) );
                $pct      = $target > 0 ? min( 100, round( ( $votes / $target ) * 100 ) ) : 0;
                $thumb    = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
                if ( ! $thumb ) $thumb = get_post_meta( get_the_ID(), '_seed_image_url', true );
                $lang_list = $langs ? array_slice( array_map( 'trim', explode( ',', $langs ) ), 0, 3 ) : [];
            ?>
            <div class="gm-fade-in gm-fade-in--delay-<?php echo min( $ci, 5 ); ?>"
                 style="background:#1b2838;border-top:1px solid #2a475e;transition:background 0.2s ease;"
                 onmouseover="this.style.background='#25374e';"
                 onmouseout="this.style.background='#1b2838';">

                <!-- Game image — h-44 = 176px -->
                <div style="position:relative;height:176px;overflow:hidden;">
                    <?php if ( $thumb ) : ?>
                        <img src="<?php echo esc_url( $thumb ); ?>"
                             alt="<?php the_title_attribute(); ?>"
                             style="width:100%;height:100%;object-fit:cover;transition:transform 0.5s ease;"
                             onmouseover="this.style.transform='scale(1.05)';"
                             onmouseout="this.style.transform='';">
                    <?php else : ?>
                        <div style="width:100%;height:100%;background:linear-gradient(135deg,#2a475e,#1b2838);display:flex;align-items:center;justify-content:center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#66c0f4" stroke-width="1" opacity="0.35"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                        </div>
                    <?php endif; ?>

                    <?php if ( $trending ) : ?>
                    <div style="position:absolute;top:8px;left:8px;display:flex;align-items:center;gap:4px;background:#ff6b2b;padding:3px 8px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                        <span style="font-size:0.65rem;font-weight:700;color:#fff;">HOT</span>
                    </div>
                    <?php endif; ?>

                    <!-- Gradient overlay -->
                    <div style="position:absolute;inset:0;background:linear-gradient(to top,#1b2838 0%,transparent 60%);opacity:0.6;pointer-events:none;"></div>
                </div>

                <div style="padding:1rem;">
                    <h3 style="font-size:1.25rem;font-weight:700;color:#fff;margin:0 0 0.25rem;"><?php the_title(); ?></h3>
                    <?php if ( $genre ) : ?><p style="font-size:0.875rem;color:#66c0f4;margin:0 0 2px;"><?php echo esc_html( $genre ); ?></p><?php endif; ?>
                    <?php if ( $dev )   : ?><p style="font-size:0.75rem;color:#8f98a0;margin:0 0 0.75rem;">by <?php echo esc_html( $dev ); ?></p><?php endif; ?>

                    <!-- Vote + progress — ArrowUp style -->
                    <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:0.75rem;">
                        <div style="display:flex;align-items:center;gap:6px;">
                            <div style="width:32px;height:32px;background:#2a475e;display:flex;align-items:center;justify-content:center;cursor:pointer;transition:background 0.2s;"
                                 onmouseover="this.style.background='#66c0f4';"
                                 onmouseout="this.style.background='#2a475e';">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#c7d5e0" stroke-width="2"><line x1="12" y1="19" x2="12" y2="5"/><polyline points="5 12 12 5 19 12"/></svg>
                            </div>
                            <div>
                                <div style="font-size:1.125rem;font-weight:900;color:#fff;"><?php echo number_format( $votes ); ?></div>
                                <div style="font-size:0.7rem;color:#8f98a0;">votes</div>
                            </div>
                        </div>
                        <div style="flex:1;">
                            <div style="font-size:0.75rem;color:#8f98a0;margin-bottom:4px;">Goal: <?php echo number_format( $target ); ?></div>
                            <div style="height:6px;background:#0e1419;overflow:hidden;">
                                <div style="height:100%;background:linear-gradient(to right,#5c7e10,#6d9513);width:<?php echo $pct; ?>%;transition:width 1s ease;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Language tags -->
                    <?php if ( $lang_list ) : ?>
                    <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:0.75rem;">
                        <?php foreach ( $lang_list as $lang ) : ?>
                        <span style="font-size:0.75rem;background:#2a475e;color:#c7d5e0;padding:2px 8px;"><?php echo esc_html( $lang ); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Status + comments footer -->
                    <div style="display:flex;align-items:center;justify-content:space-between;padding-top:0.75rem;border-top:1px solid #2a475e;">
                        <?php if ( $status ) : ?>
                        <div style="display:flex;align-items:center;gap:6px;font-size:0.75rem;color:#5c7e10;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            <span style="font-weight:500;"><?php echo esc_html( $status ); ?></span>
                        </div>
                        <?php endif; ?>
                        <?php if ( $comments ) : ?>
                        <div style="display:flex;align-items:center;gap:6px;font-size:0.75rem;color:#8f98a0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                            <span><?php echo $comments; ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <!-- View all button -->
        <div style="margin-top:1.5rem;">
            <button style="display:inline-flex;align-items:center;gap:0.5rem;border:1px solid #2a475e;background:#2a475e;color:#c7d5e0;padding:0.625rem 1.25rem;font-weight:700;font-size:0.875rem;cursor:pointer;transition:background 0.2s;"
                    onmouseover="this.style.background='#417a9b';"
                    onmouseout="this.style.background='#2a475e';">
                <?php echo $view_all; ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
            </button>
        </div>

        <?php else : ?>
        <div style="text-align:center;padding:4rem 2rem;border:2px dashed #2a475e;">
            <p style="color:#8f98a0;margin:0 0 0.75rem;">No campaigns found.</p>
            <?php if ( current_user_can( 'edit_posts' ) ) : ?>
            <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=gm_campaign' ) ); ?>" style="color:#66c0f4;font-size:0.875rem;">Add your first campaign →</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

    </div>
</section>
<style>
@media (max-width:767px)  { .gm-campaigns-grid { grid-template-columns:1fr !important; } }
@media (min-width:768px) and (max-width:1023px) { .gm-campaigns-grid { grid-template-columns:repeat(2,1fr) !important; } }
</style>
