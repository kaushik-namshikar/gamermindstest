<?php
/**
 * Block: gm/dev-hero
 * Two-column hero — mirrors Developers.tsx hero section.
 */
$a            = $attributes ?? [];
$badge        = isset( $a['badge'] )        ? esc_html( $a['badge'] )        : 'PRODUCTION-READY LOCALIZATION';
$title_raw    = isset( $a['title'] )        ? $a['title']                    : 'Game localization';
$title_accent_raw = isset( $a['titleAccent'] ) && $a['titleAccent'] ? $a['titleAccent'] : 'that ships.';
$description  = isset( $a['description'] )  ? esc_html( $a['description'] )  : 'Translation, editing, and LQA for studios shipping globally — streamlined workflow, single point of contact.';
$info_text    = isset( $a['infoText'] )     ? esc_html( $a['infoText'] )     : '60%+ of Steam users browse in non-English languages — localization is a growth multiplier';
$cta_text     = isset( $a['ctaText'] )      ? esc_html( $a['ctaText'] )      : 'REQUEST QUOTE';
$email_label  = isset( $a['emailLabel'] )   ? esc_html( $a['emailLabel'] )   : 'EMAIL US';
$email_addr   = isset( $a['emailAddress'] ) ? sanitize_email( $a['emailAddress'] ) : 'hello@gamerminds.com';
$hero_image   = isset( $a['heroImage'] )    ? esc_url( $a['heroImage'] )     : '';
$hero_alt     = isset( $a['heroImageAlt'] ) ? esc_attr( $a['heroImageAlt'] ) : 'Localization dashboard';
$quote_url    = esc_url( home_url( '#quote-form' ) );

// Backwards-compat: old blocks had both lines merged in 'title' ("Game localization that ships.")
// Strip the accent portion from the main title so it only appears once.
if ( $title_accent_raw && stripos( $title_raw, $title_accent_raw ) !== false ) {
    $title_raw = trim( str_ireplace( $title_accent_raw, '', $title_raw ) );
}
$title        = esc_html( $title_raw ?: 'Game localization' );
$title_accent = esc_html( $title_accent_raw );
?>
<section class="gm-dev-hero" style="background:linear-gradient(135deg,#030712 0%,#0f0c29 30%,#1a0a2e 60%,#0f0c29 80%,#030712 100%);padding:6rem 1.5rem;overflow:hidden;position:relative;">

    <!-- Grid background pattern -->
    <div style="position:absolute;inset:0;opacity:0.08;pointer-events:none;">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="gm-hero-grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#a855f7" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#gm-hero-grid)"/>
        </svg>
    </div>

    <!-- Diagonal accent stripes (right side) -->
    <div style="position:absolute;top:0;right:0;width:50%;height:100%;opacity:0.04;pointer-events:none;overflow:hidden;">
        <?php for ( $i = 0; $i < 10; $i++ ) : ?>
        <div style="position:absolute;top:0;bottom:0;width:2px;background:#a855f7;left:<?php echo $i * 10; ?>%;transform:skewX(-15deg);"></div>
        <?php endfor; ?>
    </div>

    <div style="max-width:1280px;margin:0 auto;position:relative;z-index:1;">
        <div class="gm-dev-hero__grid" style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:center;">

            <!-- Left: Text content -->
            <div class="gm-fade-in">

                <!-- Badge -->
                <div style="display:inline-flex;align-items:center;gap:0.5rem;padding:0.5rem 1rem;border-radius:9999px;background:rgba(168,85,247,0.2);border:1px solid rgba(168,85,247,0.35);margin-bottom:1.75rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(216,180,254,0.9)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                    <span style="font-size:0.75rem;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;color:rgba(216,180,254,0.9);"><?php echo $badge; ?></span>
                </div>

                <!-- Title: two lines, accent in gradient -->
                <h1 style="font-size:clamp(3rem,7vw,4.5rem);font-weight:900;line-height:1.1;margin:0 0 1.5rem;color:#fff;">
                    <?php echo $title; ?>
                    <br>
                    <span style="background:linear-gradient(135deg,#c084fc,#818cf8,#60a5fa);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;"><?php echo $title_accent; ?></span>
                </h1>

                <p style="font-size:1.125rem;color:rgba(216,180,254,0.75);line-height:1.7;margin:0 0 1.5rem;"><?php echo $description; ?></p>

                <!-- Info callout box -->
                <div style="display:flex;align-items:flex-start;gap:0.875rem;padding:1rem 1.25rem;background:rgba(139,92,246,0.12);border-left:4px solid #8b5cf6;margin-bottom:2.25rem;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(167,139,250,0.9)" stroke-width="2" stroke-linecap="round" style="flex-shrink:0;margin-top:2px;"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                    <p style="font-size:0.9rem;color:rgba(196,181,253,0.9);margin:0;line-height:1.55;font-weight:600;"><?php echo $info_text; ?></p>
                </div>

                <!-- CTA buttons -->
                <div style="display:flex;flex-wrap:wrap;gap:1rem;align-items:center;">
                    <a href="<?php echo $quote_url; ?>"
                       style="display:inline-flex;align-items:center;gap:0.5rem;background:linear-gradient(135deg,#9333ea,#6366f1);color:#fff;padding:1.5rem 2rem;border-radius:1rem;font-weight:700;font-size:1.125rem;letter-spacing:0.04em;text-decoration:none;box-shadow:0 8px 30px rgba(147,51,234,0.5);"
                       onmouseover="this.style.boxShadow='0 12px 40px rgba(147,51,234,0.7)';this.style.transform='translateY(-2px)';"
                       onmouseout="this.style.boxShadow='0 8px 30px rgba(147,51,234,0.5)';this.style.transform='';">
                        <?php echo $cta_text; ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <?php if ( $email_addr ) : ?>
                    <a href="mailto:<?php echo $email_addr; ?>"
                       style="display:inline-flex;align-items:center;gap:0.5rem;background:transparent;border:2px solid rgba(168,85,247,0.4);color:rgba(216,180,254,0.85);padding:1.5rem 2rem;border-radius:1rem;font-weight:700;font-size:1.125rem;text-decoration:none;transition:all 0.2s;"
                       onmouseover="this.style.background='rgba(168,85,247,0.15)';this.style.borderColor='rgba(168,85,247,0.7)';"
                       onmouseout="this.style.background='transparent';this.style.borderColor='rgba(168,85,247,0.4)';">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <?php echo $email_label; ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Right: Hero image — mirrors React: relative wrapper, absolute glow, relative inner, w-full image -->
            <div class="gm-fade-in gm-fade-in--delay-1 gm-dev-hero__image-col" style="position:relative;">
                <!-- Glow blur: absolute inset:0, blur-3xl — from-purple-500/30 to-indigo-500/30 -->
                <div style="position:absolute;inset:0;background:linear-gradient(to bottom right,rgba(168,85,247,0.3),rgba(99,102,241,0.3));border-radius:3rem;filter:blur(3rem);pointer-events:none;"></div>

                <div style="position:relative;">
                    <?php if ( $hero_image ) : ?>
                        <img src="<?php echo $hero_image; ?>"
                             alt="<?php echo $hero_alt; ?>"
                             style="width:100%;height:auto;border-radius:3rem;box-shadow:0 25px 50px -12px rgba(0,0,0,0.6);">
                    <?php else : ?>
                        <div style="width:100%;aspect-ratio:4/3;background:rgba(168,85,247,0.08);border:2px solid rgba(168,85,247,0.2);border-radius:3rem;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:1rem;padding:2rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="rgba(168,85,247,0.5)" stroke-width="1"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                            <p style="color:rgba(168,85,247,0.5);font-size:0.875rem;margin:0;text-align:center;">Select a hero image<br>in block settings</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>
<style>
@media (max-width:768px) {
    .gm-dev-hero__grid { grid-template-columns:1fr !important; }
    .gm-dev-hero__image-col { margin-top:2rem; }
}
</style>
