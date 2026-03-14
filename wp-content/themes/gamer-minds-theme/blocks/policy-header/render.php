<?php
/**
 * Block: gm/policy-header
 * Mirrors: Privacy.tsx + Legal.tsx — header section with icon, gradient h1, date
 * Accepts attribute: variant = 'privacy' | 'legal'
 */
$a       = $attributes ?? [];
$variant = isset( $a['variant'] ) ? $a['variant'] : 'privacy';
$date    = isset( $a['date'] )    ? $a['date']    : 'Last updated: March 2, 2026';

if ( $variant === 'legal' ) {
    $title    = 'Terms &amp; Legal';
    // FileText icon
    $icon_path = '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>';
} else {
    $title    = 'Privacy Policy';
    // Shield icon
    $icon_path = '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>';
}
?>

<header class="gm-policy-header gm-fade-in" style="text-align:center;margin-bottom:3rem;">

    <!-- Icon box: 80x80 rounded-2xl bg-gradient purple/indigo with shadow -->
    <div class="gm-policy-header__icon" aria-hidden="true"
         style="display:inline-flex;align-items:center;justify-content:center;width:80px;height:80px;border-radius:1rem;background:linear-gradient(135deg,#a855f7,#6366f1);margin-bottom:1.5rem;box-shadow:0 10px 30px rgba(168,85,247,0.5);">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <?php echo $icon_path; ?>
        </svg>
    </div>

    <h1 class="gm-gradient-text-purple" style="font-size:clamp(2rem,5vw,3rem);font-weight:900;margin-bottom:1rem;"><?php echo $title; ?></h1>
    <p class="gm-policy-header__date" style="color:rgba(192,132,252,0.6);"><?php echo esc_html( $date ); ?></p>

</header>
