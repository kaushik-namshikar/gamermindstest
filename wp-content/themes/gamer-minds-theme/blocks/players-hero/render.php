<?php
/**
 * Block: gm/players-hero
 * Community hero — fully attribute-driven.
 */
$a            = $attributes ?? [];
$member_count = isset( $a['memberCount'] )  ? esc_html( $a['memberCount'] )  : '5,247 members online';
$title        = isset( $a['title'] )        ? esc_html( $a['title'] )        : 'Get your favorite games in your language';
$title_span   = isset( $a['titleSpan'] )    ? esc_html( $a['titleSpan'] )    : 'in your language';
$description  = isset( $a['description'] )  ? esc_html( $a['description'] )  : "Vote for games you want localized. We show developers there's real demand in your region. It's like an upvote, but for getting devs to actually listen.";
$browse_label = isset( $a['browseLabel'] )  ? esc_html( $a['browseLabel'] )  : 'Browse campaigns';
$browse_link  = isset( $a['browseLink'] )   ? esc_url( $a['browseLink'] )    : '#campaigns';
$discord_label= isset( $a['discordLabel'] ) ? esc_html( $a['discordLabel'] ) : 'Join Discord';
$discord_link = isset( $a['discordLink'] )  ? esc_url( $a['discordLink'] )   : get_theme_mod( 'gm_social_discord', '#' );
$stat1        = isset( $a['stat1'] )        ? esc_html( $a['stat1'] )        : '25 successful campaigns';
$stat2        = isset( $a['stat2'] )        ? esc_html( $a['stat2'] )        : '40+ languages';
$stat3        = isset( $a['stat3'] )        ? esc_html( $a['stat3'] )        : '5,000+ members';

// Split title at titleSpan — insert <br> then highlight in Steam blue
// React: "Get your favorite games<br /><span className="text-[#66c0f4]">in your language</span>"
$title_highlighted = $title;
if ( $title_span && strpos( $title, $title_span ) !== false ) {
    $before = trim( str_replace( $title_span, '', $title ) );
    $title_highlighted = esc_html( $before ) . '<br><span style="color:#66c0f4;">' . esc_html( $title_span ) . '</span>';
} else {
    $title_highlighted = esc_html( $title );
}
?>
<section class="gm-players-hero" style="position:relative;padding:4rem 1.5rem;background:linear-gradient(to bottom right,#1b2838,#2a475e,#1b2838);overflow:hidden;">
    <!-- Noise texture -->
    <div style="position:absolute;inset:0;opacity:0.015;background-image:url(\"data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E\");pointer-events:none;"></div>

    <div style="max-width:1200px;margin:0 auto;position:relative;z-index:1;">
        <div style="max-width:56rem;">
            <div class="gm-fade-in">
                <!-- Member count badge -->
                <div style="display:inline-flex;align-items:center;gap:0.5rem;background:#171a21;padding:0.375rem 0.75rem;margin-bottom:1.5rem;">
                    <div style="width:8px;height:8px;background:#66c0f4;border-radius:50%;animation:pulse 2s infinite;"></div>
                    <span style="color:#c7d5e0;font-size:0.875rem;font-weight:500;"><?php echo $member_count; ?></span>
                </div>

                <h1 style="font-size:clamp(3rem,6vw,3.75rem);font-weight:900;color:#fff;margin:0 0 1rem;line-height:1.1;">
                    <?php echo $title_highlighted; ?>
                </h1>

                <p style="font-size:1.25rem;color:#c7d5e0;margin:0 0 2rem;line-height:1.6;"><?php echo $description; ?></p>

                <div style="display:flex;flex-wrap:wrap;gap:0.75rem;margin-bottom:2rem;">
                    <a href="<?php echo $browse_link; ?>"
                       style="display:inline-flex;align-items:center;gap:0.5rem;background:#5c7e10;color:#fff;padding:0.75rem 1.5rem;font-weight:700;text-decoration:none;transition:background 0.2s;"
                       onmouseover="this.style.background='#6d9513';" onmouseout="this.style.background='#5c7e10';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="18 15 12 9 6 15"/></svg>
                        <?php echo $browse_label; ?>
                    </a>
                    <?php if ( $discord_link ) : ?>
                    <a href="<?php echo $discord_link; ?>" target="_blank" rel="noopener"
                       style="display:inline-flex;align-items:center;gap:0.5rem;background:#417a9b;color:#fff;padding:0.75rem 1.5rem;font-weight:700;text-decoration:none;transition:background 0.2s;"
                       onmouseover="this.style.background='#66c0f4';this.style.color='#1b2838';" onmouseout="this.style.background='#417a9b';this.style.color='#fff';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        <?php echo $discord_label; ?>
                    </a>
                    <?php endif; ?>
                </div>

                <div style="display:flex;flex-wrap:wrap;gap:1.5rem;font-size:0.875rem;">
                    <div style="display:flex;align-items:center;gap:0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffa500" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2z"/></svg>
                        <span style="color:#8f98a0;"><?php echo $stat1; ?></span>
                    </div>
                    <div style="display:flex;align-items:center;gap:0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#66c0f4" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        <span style="color:#8f98a0;"><?php echo $stat2; ?></span>
                    </div>
                    <div style="display:flex;align-items:center;gap:0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5c7e10" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        <span style="color:#8f98a0;"><?php echo $stat3; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
