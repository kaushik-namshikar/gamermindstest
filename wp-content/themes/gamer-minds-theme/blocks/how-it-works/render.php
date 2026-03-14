<?php
/**
 * Block: gm/how-it-works
 * Mirrors: Players.tsx — How it works Section
 * bg-[#1b2838], steps have bg-[#0e1419] border-l-2 border-[#66c0f4]
 */
$a = $attributes ?? [];
$section_heading = isset( $a['heading'] )    ? $a['heading']    : 'How it works';
$section_sub     = isset( $a['subheading'] ) ? $a['subheading'] : 'Three steps from vote to localization';
$steps = [
    [
        'icon'  => '<line x1="12" y1="19" x2="12" y2="5"/><polyline points="5 12 12 5 19 12"/>',
        'title' => isset( $a['step1Title'] ) ? $a['step1Title'] : 'Vote',
        'desc'  => isset( $a['step1Desc'] )  ? $a['step1Desc']  : 'Find a game you want in your language. Hit that upvote.',
    ],
    [
        'icon'  => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
        'title' => isset( $a['step2Title'] ) ? $a['step2Title'] : 'We pitch',
        'desc'  => isset( $a['step2Desc'] )  ? $a['step2Desc']  : 'We turn votes into professional data and present it to devs.',
    ],
    [
        'icon'  => '<circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/>',
        'title' => isset( $a['step3Title'] ) ? $a['step3Title'] : 'Track',
        'desc'  => isset( $a['step3Desc'] )  ? $a['step3Desc']  : 'Follow progress and celebrate when it ships.',
    ],
];
?>

<section class="gm-how-it-works" id="how-it-works" style="background:#1b2838;padding:3rem 1.5rem;">
    <div style="max-width:64rem;margin:0 auto;">

        <div class="gm-fade-in" style="margin-bottom:2.5rem;">
            <h2 style="font-size:1.875rem;font-weight:900;color:#fff;margin-bottom:0.5rem;"><?php echo esc_html( $section_heading ); ?></h2>
            <p style="color:#8f98a0;"><?php echo esc_html( $section_sub ); ?></p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:1.5rem;">
            <?php foreach ( $steps as $i => $step ) : ?>
            <div class="gm-fade-in gm-fade-in--delay-<?php echo $i + 1; ?>"
                 style="background:#0e1419;padding:1.5rem;border-left:2px solid #66c0f4;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#66c0f4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-bottom:0.75rem;">
                    <?php echo $step['icon']; ?>
                </svg>
                <h3 style="font-size:1.25rem;font-weight:700;color:#fff;margin-bottom:0.5rem;"><?php echo esc_html( $step['title'] ); ?></h3>
                <p style="color:#8f98a0;line-height:1.6;"><?php echo esc_html( $step['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
