<?php
/**
 * Block: gm/process-timeline
 * Mirrors: Developers.tsx — Process Section (hidden in React, shown in WP)
 * 5-step horizontal flow: Scope / Prep / Translate / LQA / Deliver
 */
$a = $attributes ?? [];
$section_heading = isset( $a['heading'] ) ? $a['heading'] : 'OUR PROCESS';

$steps = [
    [
        // Target icon
        'icon'  => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
        'num'   => 1,
        'title' => 'Scope',
        'desc'  => 'Requirements & targets',
    ],
    [
        // BookOpen icon
        'icon'  => '<path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>',
        'num'   => 2,
        'title' => 'Prep',
        'desc'  => 'Glossary + Style Guide',
    ],
    [
        // Globe icon
        'icon'  => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
        'num'   => 3,
        'title' => 'Translate',
        'desc'  => 'Professional work',
    ],
    [
        // Shield icon
        'icon'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>',
        'num'   => 4,
        'title' => 'LQA',
        'desc'  => 'Quality assurance',
    ],
    [
        // Zap icon
        'icon'  => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
        'num'   => 5,
        'title' => 'Deliver',
        'desc'  => 'Final files & support',
    ],
];
?>

<section class="gm-process" id="process">

    <div class="gm-process__heading gm-fade-in">
        <h2><?php echo esc_html( $section_heading ); ?></h2>
    </div>

    <!-- Connection line -->
    <div class="gm-process__line" aria-hidden="true"></div>

    <div class="gm-process__steps">
        <?php foreach ( $steps as $i => $step ) : ?>
        <div class="gm-process__step gm-fade-in gm-fade-in--delay-<?php echo min( $i + 1, 5 ); ?>">
            <div class="gm-process__step-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <?php echo $step['icon']; ?>
                </svg>
                <span class="gm-process__step-num"><?php echo $step['num']; ?></span>
            </div>
            <h3><?php echo esc_html( $step['title'] ); ?></h3>
            <p><?php echo esc_html( $step['desc'] ); ?></p>
        </div>
        <?php endforeach; ?>
    </div>

</section>
