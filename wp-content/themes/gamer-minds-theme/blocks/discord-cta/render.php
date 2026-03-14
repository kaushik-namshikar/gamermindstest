<?php
/**
 * Block: gm/discord-cta
 * Mirrors: Players.tsx — CTA Section
 * bg-[#171a21], inner bg-gradient-br from-[#2a475e] to-[#1b2838] border border-[#417a9b]
 */
$a           = $attributes ?? [];
$cta_heading = isset( $a['heading'] )     ? $a['heading']     : "You shouldn't need to learn English to play good games";
$cta_desc    = isset( $a['description'] ) ? $a['description'] : "Your vote shows developers there's demand (and revenue) in your region.";
$cta_label   = isset( $a['ctaLabel'] )    ? $a['ctaLabel']    : 'Join the community';
$discord_url = get_theme_mod( 'gm_social_discord', '#' );
?>

<section class="gm-discord-cta" id="discord-cta" style="background:#171a21;padding:3rem 1.5rem;">
    <div style="max-width:56rem;margin:0 auto;">
        <div style="background:linear-gradient(135deg,#2a475e,#1b2838);padding:2.5rem;text-align:center;border:1px solid #417a9b;">

            <!-- Gamepad2 icon: #66c0f4, opacity 50% -->
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#66c0f4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin:0 auto 1rem;display:block;opacity:0.5;">
                <line x1="6" y1="12" x2="10" y2="12"/>
                <line x1="8" y1="10" x2="8" y2="14"/>
                <line x1="15" y1="13" x2="15.01" y2="13"/>
                <line x1="18" y1="11" x2="18.01" y2="11"/>
                <rect x="2" y="6" width="20" height="12" rx="2"/>
            </svg>

            <h2 class="gm-fade-in" style="font-size:1.875rem;font-weight:900;color:#fff;margin-bottom:0.75rem;">
                <?php echo esc_html( $cta_heading ); ?>
            </h2>

            <p class="gm-fade-in gm-fade-in--delay-1" style="font-size:1.125rem;color:#c7d5e0;margin-bottom:1.5rem;max-width:40rem;margin-left:auto;margin-right:auto;">
                <?php echo esc_html( $cta_desc ); ?>
            </p>

            <a href="<?php echo esc_url( $discord_url ); ?>"
               class="gm-btn gm-fade-in gm-fade-in--delay-2"
               style="display:inline-flex;align-items:center;gap:0.5rem;background:#66c0f4;color:#1b2838;font-weight:700;font-size:1.125rem;padding:1rem 2rem;border:none;text-decoration:none;"
               target="_blank" rel="noopener">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <?php echo esc_html( $cta_label ); ?>
            </a>
        </div>
    </div>
</section>
