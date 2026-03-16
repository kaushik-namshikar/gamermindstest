<?php
/**
 * Block: gm/regions
 * Mirrors: Players.tsx — Regions section EXACTLY.
 * bg-[#171a21] py-12 px-6 | grid md:grid-cols-2 lg:grid-cols-4 gap-4
 * Card: bg-[#1b2838] hover:bg-[#2a475e] p-5 border-t border-[#2a475e]
 */
$a = $attributes ?? [];
$heading    = isset( $a['heading'] )    ? esc_html( $a['heading'] )    : 'Regions we focus on';
$subheading = isset( $a['subheading'] ) ? esc_html( $a['subheading'] ) : 'Huge gaming markets often left out';

$regions = [];
for ( $r = 1; $r <= 4; $r++ ) {
    $regions[] = [
        'name'    => isset( $a["region{$r}Name"] )    ? esc_html( $a["region{$r}Name"] )    : '',
        'code'    => isset( $a["region{$r}Code"] )    ? esc_html( $a["region{$r}Code"] )    : '',
        'langs'   => isset( $a["region{$r}Langs"] )   ? esc_html( $a["region{$r}Langs"] )   : '',
        'players' => isset( $a["region{$r}Players"] ) ? esc_html( $a["region{$r}Players"] ) : '',
        'flag'    => isset( $a["region{$r}Flag"] )    ? esc_html( $a["region{$r}Flag"] )    : '',
    ];
}
$regions = array_values( array_filter( $regions, fn($r) => ! empty( $r['name'] ) ) );
?>
<section style="background:#171a21;padding:3rem 1.5rem;">
    <div style="max-width:72rem;margin:0 auto;">

        <div class="gm-fade-in" style="margin-bottom:2rem;">
            <h2 style="font-size:1.875rem;font-weight:900;color:#fff;margin:0 0 0.5rem;"><?php echo $heading; ?></h2>
            <?php if ( $subheading ) : ?>
            <p style="color:#8f98a0;margin:0;"><?php echo $subheading; ?></p>
            <?php endif; ?>
        </div>

        <div class="gm-regions-grid" style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;">
            <?php foreach ( $regions as $ri => $region ) : ?>
            <div class="gm-fade-in gm-fade-in--delay-<?php echo $ri + 1; ?>"
                 style="background:#1b2838;padding:1.25rem;border-top:1px solid #2a475e;transition:background 0.2s ease;"
                 onmouseover="this.style.background='#2a475e';"
                 onmouseout="this.style.background='#1b2838';">

                <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.75rem;">
                    <span style="font-size:1.5rem;"><?php echo $region['flag']; ?></span>
                    <span style="font-size:0.75rem;background:#2a475e;color:#c7d5e0;padding:2px 8px;font-weight:700;"><?php echo $region['code']; ?></span>
                </div>

                <h3 style="font-size:1.125rem;font-weight:700;color:#fff;margin:0 0 0.25rem;"><?php echo $region['name']; ?></h3>
                <p style="font-size:0.75rem;color:#8f98a0;font-family:var(--gm-font-mono,monospace);margin:0 0 0.5rem;"><?php echo $region['langs']; ?></p>

                <div style="display:flex;align-items:center;gap:6px;font-size:0.875rem;color:#66c0f4;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <span style="font-weight:500;"><?php echo $region['players']; ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<style>
@media (max-width:767px)  { .gm-regions-grid { grid-template-columns:1fr !important; } }
@media (min-width:768px) and (max-width:1023px) { .gm-regions-grid { grid-template-columns:repeat(2,1fr) !important; } }
</style>
