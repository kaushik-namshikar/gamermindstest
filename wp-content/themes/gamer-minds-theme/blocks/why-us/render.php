<?php
/**
 * Block: gm/why-us
 * Mirrors: Developers.tsx — Why Us section EXACTLY.
 * py-32 px-6 | value-prop box max-w-4xl | 3-col card grid mt-20
 */
$a = $attributes ?? [];
$cards = [
    [
        'icon'  => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
        'title' => isset( $a['card1Title'] ) ? $a['card1Title'] : 'Professional Localization',
        'desc'  => isset( $a['card1Desc'] )  ? $a['card1Desc']  : 'Native-speaking translators with gaming expertise, editing, and LQA services.',
        'mt'    => '0',
    ],
    [
        'icon'  => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'title' => isset( $a['card2Title'] ) ? $a['card2Title'] : 'Player Community',
        'desc'  => isset( $a['card2Desc'] )  ? $a['card2Desc']  : 'Access to a growing community of players actively interested in localized titles.',
        'mt'    => '2rem',
    ],
    [
        'icon'  => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
        'title' => isset( $a['card3Title'] ) ? $a['card3Title'] : 'Proven Demand',
        'desc'  => isset( $a['card3Desc'] )  ? $a['card3Desc']  : 'Your games are introduced to players who care about localization and want to experience them.',
        'mt'    => '-1rem',
    ],
];
$section_heading = isset( $a['heading'] )     ? $a['heading']     : 'Why Us?';
$proposition     = isset( $a['proposition'] ) ? $a['proposition'] : 'Gamer Minds combines professional game localization with a growing community of players interested in localized titles.';
?>
<section style="padding:8rem 1.5rem;position:relative;background:linear-gradient(to bottom,rgba(59,7,100,0.3),transparent);overflow:hidden;">

    <!-- Floating orb decorations -->
    <div style="position:absolute;top:5rem;left:2.5rem;width:16rem;height:16rem;border-radius:50%;background:rgba(168,85,247,0.08);filter:blur(3rem);pointer-events:none;"></div>
    <div style="position:absolute;bottom:5rem;right:2.5rem;width:24rem;height:24rem;border-radius:50%;background:rgba(99,102,241,0.08);filter:blur(3rem);pointer-events:none;"></div>

    <!-- Grid line background -->
    <div style="position:absolute;inset:0;opacity:0.04;pointer-events:none;">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs><pattern id="gm-wu-grid" width="50" height="50" patternUnits="userSpaceOnUse">
                <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#a855f7" stroke-width="1"/>
            </pattern></defs>
            <rect width="100%" height="100%" fill="url(#gm-wu-grid)"/>
        </svg>
    </div>

    <div style="max-width:72rem;margin:0 auto;position:relative;z-index:1;">

        <!-- Section heading -->
        <div class="gm-fade-in" style="text-align:center;margin-bottom:5rem;">
            <h2 style="font-size:clamp(2.25rem,4vw,3rem);font-weight:900;color:#fff;margin:0;display:inline-block;position:relative;">
                <?php echo esc_html( $section_heading ); ?>
                <!-- Animated underline -->
                <div style="position:absolute;bottom:-0.5rem;left:0;right:0;height:4px;background:linear-gradient(to right,transparent,#a855f7,transparent);border-radius:9999px;"></div>
            </h2>
        </div>

        <!-- Value proposition box -->
        <div style="position:relative;max-width:56rem;margin:0 auto;" class="gm-fade-in gm-fade-in--delay-1">
            <!-- Animated border glow -->
            <div style="position:absolute;inset:-1rem;border-radius:1.5rem;background:linear-gradient(45deg,#a855f7,#6366f1,#a855f7);opacity:0.2;pointer-events:none;filter:blur(1px);"></div>

            <div style="position:relative;background:linear-gradient(135deg,rgba(88,28,135,0.6),rgba(49,46,129,0.6));border:2px solid rgba(192,132,252,0.4);border-radius:1.5rem;padding:2rem;">
                <p style="font-size:clamp(1rem,2vw,1.25rem);color:#fff;font-weight:700;line-height:1.7;margin:0 0 2rem;">
                    <?php echo esc_html( $proposition ); ?>
                </p>

                <!-- Animated divider -->
                <div style="height:4px;width:6rem;background:linear-gradient(to right,#a855f7,#6366f1);border-radius:9999px;margin:2rem auto;"></div>

                <p style="font-size:clamp(0.9375rem,1.5vw,1.125rem);color:#f3e8ff;line-height:1.75;margin:0 0 1.5rem;">
                    When studios work with us, they are not just receiving translation services. Their games are also introduced to a community of players who actively follow localization efforts and care about seeing games become available in their language.
                </p>
                <p style="font-size:clamp(0.9375rem,1.5vw,1.125rem);color:#f3e8ff;line-height:1.75;margin:0;">
                    This creates a unique bridge between developers and international players. Localization is not just delivered as files, but shared with an audience that is excited to experience the game.
                </p>
            </div>
        </div>

        <!-- 3 benefit cards -->
        <div class="gm-why-us-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;margin-top:5rem;">
            <?php foreach ( $cards as $i => $card ) : ?>
            <div class="gm-fade-in gm-fade-in--delay-<?php echo $i + 2; ?>"
                 style="position:relative;margin-top:<?php echo esc_attr( $card['mt'] ); ?>;">

                <!-- Diagonal accent line -->
                <div style="position:absolute;left:-1rem;top:0;bottom:0;width:4px;background:linear-gradient(to bottom,#a855f7,#6366f1);transform:skewY(-3deg);border-radius:9999px;opacity:0.7;"></div>

                <!-- Corner accents -->
                <div style="position:absolute;top:-0.5rem;right:-0.5rem;width:1rem;height:1rem;border-top:2px solid rgba(192,132,252,0.5);border-right:2px solid rgba(192,132,252,0.5);"></div>
                <div style="position:absolute;bottom:-0.5rem;left:-0.5rem;width:1rem;height:1rem;border-bottom:2px solid rgba(129,140,248,0.5);border-left:2px solid rgba(129,140,248,0.5);"></div>

                <div style="background:linear-gradient(135deg,rgba(88,28,135,0.5),rgba(49,46,129,0.5));border:2px solid rgba(192,132,252,0.3);border-radius:1rem;padding:2rem;transition:all 0.3s ease;"
                     onmouseover="this.style.borderColor='rgba(192,132,252,0.6)';this.style.transform='translateY(-0.5rem) rotate(1deg)';this.style.boxShadow='0 0 40px rgba(168,85,247,0.4)';"
                     onmouseout="this.style.borderColor='rgba(192,132,252,0.3)';this.style.transform='';this.style.boxShadow='';">

                    <!-- Icon circle -->
                    <div style="position:relative;display:inline-block;margin-bottom:1.5rem;">
                        <!-- Rotating ring -->
                        <div style="position:absolute;inset:-0.5rem;border-radius:0.75rem;border:2px solid rgba(192,132,252,0.2);animation:gm-spin 8s linear infinite;"></div>
                        <div style="width:5rem;height:5rem;border-radius:0.75rem;background:linear-gradient(135deg,#9333ea,#6366f1);display:flex;align-items:center;justify-content:center;box-shadow:0 4px 20px rgba(147,51,234,0.4);border:2px solid rgba(192,132,252,0.3);transition:transform 0.3s;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <?php echo $card['icon']; ?>
                            </svg>
                        </div>
                    </div>

                    <h3 style="font-size:1.5rem;font-weight:900;color:#fff;margin:0 0 0.75rem;line-height:1.2;"><?php echo esc_html( $card['title'] ); ?></h3>
                    <p style="font-size:1.125rem;color:#f3e8ff;font-weight:500;line-height:1.7;margin:0;"><?php echo esc_html( $card['desc'] ); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<style>
@media (max-width:768px) {
    .gm-why-us-grid { grid-template-columns:1fr !important; }
    .gm-why-us-grid > div { margin-top:0 !important; }
}
</style>
