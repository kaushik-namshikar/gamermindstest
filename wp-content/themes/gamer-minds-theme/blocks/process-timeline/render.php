<?php
/**
 * Block: gm/process-timeline
 * 5-step horizontal process flow — fully attribute-driven.
 */
$a = $attributes ?? [];
$heading    = isset( $a['heading'] )    ? esc_html( $a['heading'] )    : 'OUR PROCESS';
$subheading = isset( $a['subheading'] ) ? esc_html( $a['subheading'] ) : '';

$steps = [
    [ 'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>',
             'title' => isset( $a['step1Title'] ) ? $a['step1Title'] : 'Scope',
             'desc'  => isset( $a['step1Desc'] )  ? $a['step1Desc']  : 'We review your game and define the full scope.' ],
    [ 'icon' => '<path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/>',
             'title' => isset( $a['step2Title'] ) ? $a['step2Title'] : 'Prep',
             'desc'  => isset( $a['step2Desc'] )  ? $a['step2Desc']  : 'File setup, glossary creation, style guide.' ],
    [ 'icon' => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
             'title' => isset( $a['step3Title'] ) ? $a['step3Title'] : 'Translate',
             'desc'  => isset( $a['step3Desc'] )  ? $a['step3Desc']  : 'Native-speaking gaming translators work through the content.' ],
    [ 'icon' => '<polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>',
             'title' => isset( $a['step4Title'] ) ? $a['step4Title'] : 'LQA',
             'desc'  => isset( $a['step4Desc'] )  ? $a['step4Desc']  : 'In-game testing catches overflow and context errors.' ],
    [ 'icon' => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
             'title' => isset( $a['step5Title'] ) ? $a['step5Title'] : 'Deliver',
             'desc'  => isset( $a['step5Desc'] )  ? $a['step5Desc']  : 'Clean files ready for your pipeline. Post-launch support included.' ],
];
?>
<section class="gm-process" style="background:linear-gradient(160deg,#030712 0%,#0f0c1e 50%,#030712 100%);padding:5rem 1.5rem;">
    <div style="max-width:1280px;margin:0 auto;">
        <div class="gm-process__heading gm-fade-in" style="text-align:center;margin-bottom:3rem;">
            <span style="color:rgba(168,85,247,0.7);letter-spacing:0.15em;font-size:0.75rem;font-weight:600;text-transform:uppercase;display:block;margin-bottom:0.5rem;">Workflow</span>
            <h2 style="font-size:clamp(1.75rem,3vw,2.5rem);font-weight:900;color:#fff;margin:0 0 0.5rem;"><?php echo $heading; ?></h2>
            <?php if ( $subheading ) : ?><p style="color:rgba(216,180,254,0.6);margin:0;"><?php echo $subheading; ?></p><?php endif; ?>
        </div>

        <div style="display:flex;align-items:flex-start;gap:0;position:relative;overflow-x:auto;">
            <!-- Connecting line -->
            <div style="position:absolute;top:40px;left:10%;right:10%;height:1px;background:linear-gradient(to right,transparent,rgba(168,85,247,0.4),transparent);pointer-events:none;"></div>

            <?php foreach ( $steps as $si => $step ) : ?>
            <div class="gm-process__step gm-fade-in gm-fade-in--delay-<?php echo $si + 1; ?>"
                 style="flex:1;min-width:140px;display:flex;flex-direction:column;align-items:center;text-align:center;padding:0 0.5rem;">
                <!-- Step circle -->
                <div style="position:relative;width:80px;height:80px;margin-bottom:1rem;flex-shrink:0;">
                    <div style="position:absolute;inset:0;background:radial-gradient(circle,rgba(168,85,247,0.25) 0%,transparent 70%);border-radius:50%;"></div>
                    <div style="width:80px;height:80px;background:rgba(168,85,247,0.1);border:1px solid rgba(168,85,247,0.3);border-radius:50%;display:flex;align-items:center;justify-content:center;position:relative;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="rgba(168,85,247,0.8)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <?php echo $step['icon']; ?>
                        </svg>
                    </div>
                    <div style="position:absolute;top:-6px;right:-6px;width:22px;height:22px;background:#a855f7;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.65rem;font-weight:700;color:#fff;"><?php echo $si + 1; ?></div>
                </div>
                <h3 style="font-size:0.95rem;font-weight:600;color:#fff;margin:0 0 0.4rem;"><?php echo esc_html( $step['title'] ); ?></h3>
                <p style="font-size:0.8rem;color:rgba(192,132,252,0.6);line-height:1.5;margin:0;"><?php echo esc_html( $step['desc'] ); ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
