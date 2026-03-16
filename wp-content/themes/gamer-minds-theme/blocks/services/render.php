<?php
/**
 * Block: gm/services
 * Circular icon + connecting line + card layout.
 * Mirrors: Developers.tsx services section exactly.
 */
$a          = $attributes ?? [];
$heading    = isset( $a['heading'] )      ? esc_html( $a['heading'] )    : 'SERVICES';
$subheading = isset( $a['subheading'] )   ? esc_html( $a['subheading'] ) : '';
$per_page   = isset( $a['postsPerPage'] ) ? intval( $a['postsPerPage'] ) : -1;

$query = new WP_Query( [
    'post_type'      => 'gm_service',
    'posts_per_page' => $per_page,
    'orderby'        => 'meta_value_num',
    'meta_key'       => 'display_order',
    'order'          => 'ASC',
    'post_status'    => 'publish',
] );

// Default SVG icon paths (one per service slot)
$default_icons = [
    // Globe / Translation
    '<path d="M12.87 15.07l-2.54-2.51.03-.03c1.74-1.94 2.98-4.17 3.71-6.53H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"/>',
    // FileCheck / Editing
    '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><path d="m9 15 2 2 4-4"/>',
    // TestTube / LQA
    '<path d="M14.5 2v17.5c0 1.4-1.1 2.5-2.5 2.5h0c-1.4 0-2.5-1.1-2.5-2.5V2"/><path d="M8.5 2h7"/><path d="M14.5 16h-5"/><path d="M6 6 L18 6"/><path d="M12 2 L12 6"/><circle cx="12" cy="13" r="1"/>',
    // Clipboard / PM
    '<path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/>',
];

// Extra badge services (matches React design)
$extra_badges = [
    [
        'icon'  => '<path d="M3 3h18v18H3zM9 9h6M9 13h6M9 17h4"/>',
        'label' => 'Store page localization',
        'color' => 'purple',
    ],
    [
        'icon'  => '<circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/>',
        'label' => 'Post-launch support',
        'color' => 'indigo',
    ],
];
?>
<section class="gm-services" style="background:linear-gradient(160deg,#030712 0%,#0f0c1e 40%,#1a0a2e 70%,#030712 100%);padding:5rem 1.5rem;overflow:hidden;position:relative;">

    <!-- Background particles -->
    <div style="position:absolute;inset:0;pointer-events:none;overflow:hidden;">
        <?php for ( $p = 0; $p < 6; $p++ ) : ?>
        <div style="position:absolute;width:8px;height:8px;background:rgba(168,85,247,0.25);border-radius:50%;left:<?php echo 15 + $p * 15; ?>%;top:<?php echo 20 + ( $p % 3 ) * 20; ?>%;animation:gm-float-<?php echo $p; ?> <?php echo 3 + $p * 0.5; ?>s ease-in-out infinite <?php echo $p * 0.2; ?>s;"></div>
        <?php endfor; ?>
    </div>

    <div style="max-width:1152px;margin:0 auto;position:relative;z-index:1;">

        <!-- Section heading -->
        <div class="gm-fade-in" style="text-align:center;margin-bottom:4rem;">
            <h2 style="font-size:clamp(2rem,4vw,3rem);font-weight:900;color:#fff;margin:0 0 0.5rem;"><?php echo $heading; ?></h2>
            <?php if ( $subheading ) : ?><p style="color:rgba(216,180,254,0.6);margin:0;font-size:1.125rem;"><?php echo $subheading; ?></p><?php endif; ?>
        </div>

        <?php if ( $query->have_posts() ) : ?>

        <!-- Services list -->
        <div style="display:flex;flex-direction:column;gap:4rem;">
            <?php $i = 0; while ( $query->have_posts() ) : $query->the_post(); $i++;
                $desc    = get_post_meta( get_the_ID(), 'service_description', true );
                $details = get_post_meta( get_the_ID(), 'service_details', true );
                $icon    = get_post_meta( get_the_ID(), 'icon_svg_path', true );
                if ( ! $icon ) $icon = $default_icons[ ( $i - 1 ) % count( $default_icons ) ];
                $is_even = ( $i % 2 === 0 );
                $align   = $is_even ? 'text-right' : 'text-left';
                $row_dir = $is_even ? 'row-reverse' : 'row';
                $line_gradient = $is_even ? 'left,#6366f1,#a855f7' : 'right,#a855f7,#6366f1';
                $accent_side   = $is_even ? 'right:-3px' : 'left:-3px';
            ?>
            <div class="gm-fade-in gm-fade-in--delay-<?php echo min($i,5); ?> gm-service-row"
                 style="display:flex;align-items:center;gap:2rem;flex-direction:<?php echo $row_dir; ?>;flex-wrap:wrap;">

                <!-- Icon circle with glow, rotating ring, number badge -->
                <div style="position:relative;flex-shrink:0;display:flex;align-items:center;justify-content:center;width:128px;height:128px;">
                    <!-- Pulsing glow -->
                    <div style="position:absolute;inset:-2rem;background:radial-gradient(circle,rgba(168,85,247,0.2) 0%,rgba(99,102,241,0.15) 50%,transparent 70%);border-radius:50%;pointer-events:none;animation:gm-pulse-glow 3s ease-in-out infinite <?php echo $i * 0.3; ?>s;"></div>
                    <!-- Rotating ring -->
                    <div style="position:absolute;inset:-1rem;border-radius:50%;border:2px dashed rgba(168,85,247,0.3);animation:gm-spin 12s linear infinite;"></div>
                    <!-- Main circle -->
                    <div style="width:128px;height:128px;border-radius:50%;background:linear-gradient(135deg,#9333ea,#6366f1);display:flex;align-items:center;justify-content:center;box-shadow:0 8px 40px rgba(147,51,234,0.5);border:4px solid rgba(168,85,247,0.3);flex-shrink:0;transition:all 0.3s;"
                         onmouseover="this.style.transform='scale(1.08)';this.style.boxShadow='0 12px 60px rgba(147,51,234,0.75)';"
                         onmouseout="this.style.transform='';this.style.boxShadow='0 8px 40px rgba(147,51,234,0.5)';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><?php echo $icon; ?></svg>
                    </div>
                    <!-- Number badge -->
                    <div style="position:absolute;top:-6px;right:-6px;width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,#ffffff,#ede9fe);display:flex;align-items:center;justify-content:center;font-size:1.125rem;font-weight:900;color:#7c3aed;box-shadow:0 4px 12px rgba(0,0,0,0.3);border:2px solid rgba(168,85,247,0.4);"><?php echo $i; ?></div>
                </div>

                <!-- Connecting line (hidden on mobile) -->
                <div class="gm-service-line" style="flex-shrink:0;width:96px;height:4px;background:linear-gradient(to <?php echo $line_gradient; ?>);border-radius:9999px;position:relative;overflow:hidden;">
                    <div style="position:absolute;inset:0;background:linear-gradient(to right,transparent,rgba(255,255,255,0.7),transparent);animation:gm-shimmer 2s linear infinite <?php echo $i * 0.5; ?>s;"></div>
                </div>

                <!-- Content card -->
                <div class="gm-service-card" style="flex:1;min-width:260px;position:relative;">
                    <!-- Left/right diagonal accent bar -->
                    <div style="position:absolute;<?php echo $accent_side; ?>;top:0;bottom:0;width:4px;background:linear-gradient(to bottom,#a855f7,#6366f1);border-radius:9999px;transform:skewY(3deg);"></div>

                    <div style="background:linear-gradient(135deg,rgba(88,28,135,0.2),rgba(49,46,129,0.2));backdrop-filter:blur(8px);border:2px solid rgba(168,85,247,0.3);border-radius:1.25rem;padding:1.75rem 1.75rem 1.75rem <?php echo $is_even ? '1.75rem' : '2rem'; ?>;text-align:<?php echo $is_even ? 'right' : 'left'; ?>;transition:all 0.3s;"
                         onmouseover="this.style.borderColor='rgba(168,85,247,0.6)';this.style.background='linear-gradient(135deg,rgba(88,28,135,0.3),rgba(49,46,129,0.3))';"
                         onmouseout="this.style.borderColor='rgba(168,85,247,0.3)';this.style.background='linear-gradient(135deg,rgba(88,28,135,0.2),rgba(49,46,129,0.2))';">
                        <h3 style="font-size:1.75rem;font-weight:900;color:#fff;margin:0 0 0.625rem;"><?php the_title(); ?></h3>
                        <?php if ( $desc ) : ?>
                        <p style="font-size:1rem;color:rgba(216,180,254,0.8);margin:0 0 0.75rem;font-weight:500;line-height:1.6;"><?php echo esc_html( $desc ); ?></p>
                        <?php endif; ?>
                        <?php if ( $details ) : ?>
                        <div style="display:flex;flex-wrap:wrap;gap:0.4rem;justify-content:<?php echo $is_even ? 'flex-end' : 'flex-start'; ?>;">
                            <?php foreach ( array_map( 'trim', explode( ',', $details ) ) as $tag ) : ?>
                                <span style="background:rgba(168,85,247,0.12);border:1px solid rgba(168,85,247,0.25);border-radius:9999px;padding:0.2rem 0.75rem;font-size:0.75rem;color:rgba(216,180,254,0.8);"><?php echo esc_html( $tag ); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <!-- Extra service badges -->
        <div style="margin-top:4rem;display:flex;flex-wrap:wrap;justify-content:center;gap:1rem;">
            <?php foreach ( $extra_badges as $badge_item ) :
                $col = $badge_item['color'] === 'indigo' ? '99,102,241' : '168,85,247';
            ?>
            <div style="display:inline-flex;align-items:center;gap:0.625rem;padding:0.875rem 1.5rem;background:rgba(<?php echo $col; ?>,0.18);border:2px solid rgba(<?php echo $col; ?>,0.4);border-radius:0.75rem;font-weight:700;font-size:0.9375rem;color:rgba(<?php echo $badge_item['color'] === 'indigo' ? '199,210,254' : '216,180,254'; ?>,0.95);transition:all 0.2s;"
                 onmouseover="this.style.background='rgba(<?php echo $col; ?>,0.28)';"
                 onmouseout="this.style.background='rgba(<?php echo $col; ?>,0.18)';">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $badge_item['icon']; ?></svg>
                <?php echo esc_html( $badge_item['label'] ); ?>
            </div>
            <?php endforeach; ?>
        </div>

        <?php else : ?>
        <div style="text-align:center;padding:4rem 2rem;border:2px dashed rgba(168,85,247,0.3);border-radius:0.75rem;">
            <p style="color:rgba(216,180,254,0.6);margin:0 0 0.75rem;">No services found.</p>
            <?php if ( current_user_can( 'edit_posts' ) ) : ?>
            <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=gm_service' ) ); ?>" style="color:#a855f7;font-size:0.875rem;">Add your first service →</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

    </div>
</section>

<style>
@keyframes gm-pulse-glow {
    0%,100% { opacity:0.4; transform:scale(1); }
    50%      { opacity:0.8; transform:scale(1.15); }
}
@keyframes gm-spin {
    to { transform:rotate(360deg); }
}
@keyframes gm-shimmer {
    0%   { transform:translateX(-200%); }
    100% { transform:translateX(200%); }
}
<?php for ( $p = 0; $p < 6; $p++ ) : ?>
@keyframes gm-float-<?php echo $p; ?> {
    0%,100% { transform:translateY(0); opacity:0.35; }
    50%      { transform:translateY(-28px); opacity:0.7; }
}
<?php endfor; ?>
@media (max-width:768px) {
    .gm-service-row { flex-direction:column !important; align-items:center !important; }
    .gm-service-line { display:none; }
    .gm-service-card { min-width:100% !important; }
    .gm-service-card > div { text-align:left !important; }
}
</style>
