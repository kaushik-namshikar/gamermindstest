<?php
/**
 * Block: gm/regions
 * Mirrors: Players.tsx — targetMarkets section
 * bg-[#171a21], cards bg-[#1b2838] hover:bg-[#2a475e] border-t border-[#2a475e]
 */
$a = $attributes ?? [];
$section_heading = isset( $a['heading'] )    ? $a['heading']    : 'Regions we focus on';
$section_sub     = isset( $a['subheading'] ) ? $a['subheading'] : 'Huge gaming markets often left out';

$regions = [
    [
        'flag'    => '🌎',
        'code'    => 'LATAM',
        'region'  => 'Latin America',
        'langs'   => 'PT-BR, ES-LATAM',
        'players' => '120M+',
    ],
    [
        'flag'    => '🌏',
        'code'    => 'SEA',
        'region'  => 'Southeast Asia',
        'langs'   => 'TH, VI, ID, MS',
        'players' => '95M+',
    ],
    [
        'flag'    => '🌍',
        'code'    => 'EU-East',
        'region'  => 'Eastern Europe',
        'langs'   => 'PL, RU, CZ, RO',
        'players' => '85M+',
    ],
    [
        'flag'    => '🌍',
        'code'    => 'MENA',
        'region'  => 'Middle East',
        'langs'   => 'AR, TR, FA',
        'players' => '70M+',
    ],
];
?>

<section class="gm-regions" id="regions" style="background:#171a21;padding:3rem 1.5rem;">
    <div style="max-width:72rem;margin:0 auto;">

        <div class="gm-fade-in" style="margin-bottom:2rem;">
            <h2 style="font-size:1.875rem;font-weight:900;color:#fff;margin-bottom:0.5rem;"><?php echo esc_html( $section_heading ); ?></h2>
            <p style="color:#8f98a0;"><?php echo esc_html( $section_sub ); ?></p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1rem;">
            <?php foreach ( $regions as $i => $r ) : ?>
            <div class="gm-fade-in gm-fade-in--delay-<?php echo $i + 1; ?>"
                 style="background:#1b2838;border-top:1px solid #2a475e;padding:1.25rem;transition:background 0.2s;"
                 onmouseover="this.style.background='#2a475e'" onmouseout="this.style.background='#1b2838'">

                <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.75rem;">
                    <span style="font-size:1.5rem;"><?php echo $r['flag']; ?></span>
                    <span style="font-size:0.75rem;background:#2a475e;color:#c7d5e0;padding:0.125rem 0.5rem;font-weight:700;"><?php echo esc_html( $r['code'] ); ?></span>
                </div>

                <h3 style="font-size:1.125rem;font-weight:700;color:#fff;margin-bottom:0.25rem;"><?php echo esc_html( $r['region'] ); ?></h3>
                <p style="font-size:0.75rem;color:#8f98a0;font-family:monospace;margin-bottom:0.5rem;"><?php echo esc_html( $r['langs'] ); ?></p>

                <div style="display:flex;align-items:center;gap:0.375rem;font-size:0.875rem;color:#66c0f4;font-weight:500;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    <?php echo esc_html( $r['players'] ); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
