<?php
/**
 * Block: gm/success-stories
 * Mirrors: Players.tsx — victories section
 * bg-gradient-br from-[#1b2838] to-[#0e1419]
 * Cards: bg-[#1b2838] p-5 border-t-2 border-[#5c7e10]
 */
$victories = [
    [
        'title'     => 'Crimson Vanguard',
        'genre'     => 'Tactical RPG',
        'outcome'   => 'Full localization shipped',
        'languages' => 'PT-BR, Spanish, French',
        'impact'    => '+40% sales in LATAM',
        'votes'     => 4200,
        'timeframe' => '3 months',
    ],
    [
        'title'     => 'Void Chronicles',
        'genre'     => 'Narrative Adventure',
        'outcome'   => 'JP + KR localization',
        'languages' => 'Japanese, Korean',
        'impact'    => 'SEA expansion successful',
        'votes'     => 3500,
        'timeframe' => '2 months',
    ],
    [
        'title'     => 'Shadowrun Legacy',
        'genre'     => 'Indie Roguelike',
        'outcome'   => 'Community patch went official',
        'languages' => 'Multiple languages',
        'impact'    => 'Fans now on studio payroll',
        'votes'     => 2800,
        'timeframe' => '4 months',
    ],
];
?>

<section class="gm-success" id="success-stories" style="background:linear-gradient(135deg,#1b2838,#0e1419);padding:3rem 1.5rem;">
    <div style="max-width:72rem;margin:0 auto;">

        <div class="gm-fade-in" style="margin-bottom:2rem;">
            <h2 style="font-size:1.875rem;font-weight:900;color:#fff;margin-bottom:0.5rem;">Success stories</h2>
            <p style="color:#8f98a0;">Real campaigns that shipped</p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1.25rem;">
            <?php foreach ( $victories as $i => $v ) : ?>
            <div class="gm-fade-in gm-fade-in--delay-<?php echo $i + 1; ?>"
                 style="background:#1b2838;padding:1.25rem;border-top:2px solid #5c7e10;">

                <!-- Trophy + SHIPPED badge -->
                <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.75rem;">
                    <div style="width:2rem;height:2rem;background:#5c7e10;display:flex;align-items:center;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="8 21 12 17 16 21"/><path d="M4 4h16c0 4-2 7-6 9-1 .4-2 .6-2 .6s-1-.2-2-.6C6 11 4 8 4 4z"/></svg>
                    </div>
                    <span style="font-size:0.75rem;background:#5c7e10;color:#fff;padding:0.125rem 0.5rem;font-weight:700;">SHIPPED</span>
                </div>

                <h3 style="font-size:1.25rem;font-weight:700;color:#fff;margin-bottom:0.25rem;"><?php echo esc_html( $v['title'] ); ?></h3>
                <p style="font-size:0.875rem;color:#66c0f4;margin-bottom:0.75rem;"><?php echo esc_html( $v['genre'] ); ?></p>

                <div style="display:flex;flex-direction:column;gap:0.5rem;margin-bottom:1rem;">
                    <div style="display:flex;align-items:flex-start;gap:0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5c7e10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:0.125rem;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <p style="font-size:0.875rem;color:#c7d5e0;"><?php echo esc_html( $v['outcome'] ); ?></p>
                    </div>
                    <div style="display:flex;align-items:flex-start;gap:0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#66c0f4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:0.125rem;"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        <p style="font-size:0.875rem;color:#8f98a0;"><?php echo esc_html( $v['languages'] ); ?></p>
                    </div>
                    <div style="display:flex;align-items:flex-start;gap:0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffa500" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:0.125rem;"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                        <p style="font-size:0.875rem;color:#8f98a0;"><?php echo esc_html( $v['impact'] ); ?></p>
                    </div>
                </div>

                <div style="padding-top:0.75rem;border-top:1px solid #2a475e;display:flex;align-items:center;justify-content:space-between;font-size:0.75rem;color:#8f98a0;">
                    <span><?php echo number_format( $v['votes'] ); ?> votes</span>
                    <span><?php echo esc_html( $v['timeframe'] ); ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
