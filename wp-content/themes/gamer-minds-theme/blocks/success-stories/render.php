<?php
/**
 * Block: gm/success-stories
 * Mirrors: Players.tsx — Success Stories section EXACTLY.
 * bg-gradient-to-br from-[#1b2838] to-[#0e1419] py-12
 * grid lg:grid-cols-3 gap-5
 * Card: bg-[#1b2838] p-5 border-t-2 border-[#5c7e10]
 */
$a = $attributes ?? [];
$heading    = isset( $a['heading'] )    ? esc_html( $a['heading'] )    : 'Success stories';
$subheading = isset( $a['subheading'] ) ? esc_html( $a['subheading'] ) : 'Real campaigns that shipped';

$stories = [];
for ( $s = 1; $s <= 3; $s++ ) {
    $stories[] = [
        'title'   => isset( $a["story{$s}Title"] )   ? esc_html( $a["story{$s}Title"] )   : '',
        'genre'   => isset( $a["story{$s}Genre"] )   ? esc_html( $a["story{$s}Genre"] )   : '',
        'outcome' => isset( $a["story{$s}Outcome"] ) ? esc_html( $a["story{$s}Outcome"] ) : '',
        'langs'   => isset( $a["story{$s}Langs"] )   ? esc_html( $a["story{$s}Langs"] )   : '',
        'impact'  => isset( $a["story{$s}Impact"] )  ? esc_html( $a["story{$s}Impact"] )  : '',
        'votes'   => isset( $a["story{$s}Votes"] )   ? esc_html( $a["story{$s}Votes"] )   : '',
        'time'    => isset( $a["story{$s}Time"] )    ? esc_html( $a["story{$s}Time"] )    : '',
    ];
}
$stories = array_values( array_filter( $stories, fn($s) => ! empty( $s['title'] ) ) );
?>
<section style="background:linear-gradient(to bottom right,#1b2838,#0e1419);padding:3rem 1.5rem;">
    <div style="max-width:72rem;margin:0 auto;">

        <div class="gm-fade-in" style="margin-bottom:2rem;">
            <h2 style="font-size:1.875rem;font-weight:900;color:#fff;margin:0 0 0.5rem;"><?php echo $heading; ?></h2>
            <?php if ( $subheading ) : ?>
            <p style="color:#8f98a0;margin:0;"><?php echo $subheading; ?></p>
            <?php endif; ?>
        </div>

        <div class="gm-stories-grid" style="display:grid;grid-template-columns:repeat(3,1fr);gap:1.25rem;">
            <?php foreach ( $stories as $si => $story ) : ?>
            <div class="gm-fade-in gm-fade-in--delay-<?php echo $si + 1; ?>"
                 style="background:#1b2838;padding:1.25rem;border-top:2px solid #5c7e10;">

                <!-- SHIPPED badge -->
                <div style="display:flex;align-items:center;gap:0.5rem;margin-bottom:0.75rem;">
                    <div style="width:32px;height:32px;background:#5c7e10;display:flex;align-items:center;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2z"/></svg>
                    </div>
                    <span style="font-size:0.75rem;background:#5c7e10;color:#fff;padding:2px 8px;font-weight:700;">SHIPPED</span>
                </div>

                <h3 style="font-size:1.25rem;font-weight:700;color:#fff;margin:0 0 0.25rem;"><?php echo $story['title']; ?></h3>
                <p style="font-size:0.875rem;color:#66c0f4;margin:0 0 0.75rem;"><?php echo $story['genre']; ?></p>

                <div style="display:flex;flex-direction:column;gap:0.5rem;margin-bottom:1rem;">
                    <div style="display:flex;align-items:flex-start;gap:0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#5c7e10" stroke-width="2" style="flex-shrink:0;margin-top:2px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <p style="font-size:0.875rem;color:#c7d5e0;margin:0;"><?php echo $story['outcome']; ?></p>
                    </div>
                    <div style="display:flex;align-items:flex-start;gap:0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#66c0f4" stroke-width="2" style="flex-shrink:0;margin-top:2px;"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        <p style="font-size:0.875rem;color:#8f98a0;margin:0;"><?php echo $story['langs']; ?></p>
                    </div>
                    <div style="display:flex;align-items:flex-start;gap:0.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffa500" stroke-width="2" style="flex-shrink:0;margin-top:2px;"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
                        <p style="font-size:0.875rem;color:#8f98a0;margin:0;"><?php echo $story['impact']; ?></p>
                    </div>
                </div>

                <div style="padding-top:0.75rem;border-top:1px solid #2a475e;display:flex;align-items:center;justify-content:space-between;font-size:0.75rem;color:#8f98a0;">
                    <span><?php echo number_format( intval( $story['votes'] ) ); ?> votes</span>
                    <span><?php echo $story['time']; ?></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<style>
@media (max-width:767px)  { .gm-stories-grid { grid-template-columns:1fr !important; } }
@media (min-width:768px) and (max-width:1023px) { .gm-stories-grid { grid-template-columns:repeat(2,1fr) !important; } }
</style>
