<?php
/**
 * Block: gm/players-hero
 * Mirrors: Players.tsx — Hero Section
 * bg-gradient-br from-[#1b2838] via-[#2a475e] to-[#1b2838]
 * Left-aligned, max-w-4xl, Steam/Discord inspired
 */
$a            = $attributes ?? [];
$member_count  = isset( $a['memberCount'] )  ? $a['memberCount']  : '5,247 members online';
$hero_title    = isset( $a['title'] )        ? $a['title']        : 'Get your favorite games in your language';
$hero_desc     = isset( $a['description'] )  ? $a['description']  : 'Vote for games you want localized. We show developers there\'s real demand in your region. It\'s like an upvote, but for getting devs to actually listen.';
$browse_label  = isset( $a['browseLabel'] )  ? $a['browseLabel']  : 'Browse campaigns';
$discord_label = isset( $a['discordLabel'] ) ? $a['discordLabel'] : 'Join Discord';
$stat1         = isset( $a['stat1'] )        ? $a['stat1']        : '25 successful campaigns';
$stat2         = isset( $a['stat2'] )        ? $a['stat2']        : '40+ languages';
$stat3         = isset( $a['stat3'] )        ? $a['stat3']        : '5,000+ members';
$discord_url   = get_theme_mod( 'gm_social_discord', '#' );
?>

<section class="gm-players-hero" id="players-hero" style="background: linear-gradient(135deg, #1b2838 0%, #2a475e 50%, #1b2838 100%);">
    <div class="gm-players-hero__inner">

        <!-- Community badge: bg-[#171a21], #66c0f4 pulse dot -->
        <div class="gm-players-hero__badge gm-fade-in">
            <span class="gm-players-hero__badge-inner" style="display:inline-flex;align-items:center;gap:0.5rem;background:#171a21;padding:0.375rem 0.75rem;">
                <span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:#66c0f4;flex-shrink:0;animation:gm-pulse 2s infinite;"></span>
                <span style="color:#c7d5e0;font-size:0.875rem;font-weight:500;"><?php echo esc_html( $member_count ); ?></span>
            </span>
        </div>

        <h1 class="gm-players-hero__title gm-fade-in gm-fade-in--delay-1">
            <?php echo esc_html( $hero_title ); ?>
        </h1>

        <p class="gm-players-hero__desc gm-fade-in gm-fade-in--delay-2">
            <?php echo esc_html( $hero_desc ); ?>
        </p>

        <div class="gm-players-hero__actions gm-fade-in gm-fade-in--delay-3">
            <a href="#campaigns" class="gm-btn" style="background:#5c7e10;color:#fff;font-weight:700;display:inline-flex;align-items:center;gap:0.5rem;padding:0.875rem 1.5rem;border:none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="19" x2="12" y2="5"/><polyline points="5 12 12 5 19 12"/></svg>
                <?php echo esc_html( $browse_label ); ?>
            </a>
            <a href="<?php echo esc_url( $discord_url ); ?>" class="gm-btn" style="background:#417a9b;color:#fff;font-weight:700;display:inline-flex;align-items:center;gap:0.5rem;padding:0.875rem 1.5rem;border:none;" target="_blank" rel="noopener">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <?php echo esc_html( $discord_label ); ?>
            </a>
        </div>

        <!-- Quick stats -->
        <div class="gm-players-hero__stats gm-fade-in gm-fade-in--delay-4">
            <div class="gm-players-hero__stat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffa500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="8 21 12 17 16 21"/><path d="M4 4h16c0 4-2 7-6 9-1 .4-2 .6-2 .6s-1-.2-2-.6C6 11 4 8 4 4z"/></svg>
                <span style="color:#8f98a0;"><?php echo esc_html( $stat1 ); ?></span>
            </div>
            <div class="gm-players-hero__stat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#66c0f4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                <span style="color:#8f98a0;"><?php echo esc_html( $stat2 ); ?></span>
            </div>
            <div class="gm-players-hero__stat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5c7e10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <span style="color:#8f98a0;"><?php echo esc_html( $stat3 ); ?></span>
            </div>
        </div>
    </div>
</section>
