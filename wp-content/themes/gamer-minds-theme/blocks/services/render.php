<?php
/**
 * Block: gm/services
 * Mirrors: Developers.tsx — Services Section
 * 4 services with alternating flex-row/flex-row-reverse layout
 * Large circular icons (w-32 h-32) + numbered badge top-right
 */
$services = [
    [
        // Globe icon
        'icon' => '<circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
        'title' => 'Translation',
        'desc'  => 'Native-speaking translators with gaming expertise',
    ],
    [
        // FileCheck icon
        'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><path d="m9 15 2 2 4-4"/>',
        'title' => 'Editing',
        'desc'  => 'Consistency, quality, and polish',
    ],
    [
        // TestTube / Flask icon
        'icon' => '<path d="M9 2v6l-4 4.5A2 2 0 0 0 6.5 16h11a2 2 0 0 0 1.5-3.5L15 8V2"/><path d="M9 2h6"/><path d="M6 15h12"/>',
        'title' => 'LQA',
        'desc'  => 'In-context testing before launch',
    ],
    [
        // ClipboardList icon
        'icon' => '<rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M12 11h4"/><path d="M12 16h4"/><path d="M8 11h.01"/><path d="M8 16h.01"/>',
        'title' => 'PM',
        'desc'  => 'Single point of contact',
    ],
];

$extra_badges = [
    [
        // Store icon
        'icon'  => '<path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/>',
        'label' => 'Store page localization',
    ],
    [
        // Wrench icon
        'icon'  => '<path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>',
        'label' => 'Post-launch support',
    ],
];
?>

<section class="gm-services" id="services">

    <div class="gm-services__heading gm-fade-in">
        <h2>SERVICES</h2>
    </div>

    <div class="gm-services__list">
        <?php foreach ( $services as $i => $service ) :
            $is_even = ( $i % 2 === 0 );
            $row_class = 'gm-services__item' . ( $is_even ? '' : ' gm-services__item--reverse' );
        ?>
        <div class="<?php echo $row_class; ?> gm-fade-in gm-fade-in--delay-<?php echo min( $i + 1, 4 ); ?>">

            <!-- Circular icon with number badge -->
            <div class="gm-services__icon-wrap">
                <div class="gm-services__icon-glow"></div>
                <div class="gm-services__icon-ring"></div>
                <div class="gm-services__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <?php echo $service['icon']; ?>
                    </svg>
                </div>
                <div class="gm-services__icon-num"><?php echo $i + 1; ?></div>
            </div>

            <!-- Connecting line -->
            <div class="gm-services__connector" aria-hidden="true">
                <div class="gm-services__connector-shine"></div>
            </div>

            <!-- Content card -->
            <div class="gm-services__content<?php echo $is_even ? '' : ' gm-services__content--right'; ?>">
                <div class="gm-services__diagonal<?php echo $is_even ? '' : ' gm-services__diagonal--right'; ?>" aria-hidden="true"></div>
                <div class="gm-services__card">
                    <h3><?php echo esc_html( $service['title'] ); ?></h3>
                    <p><?php echo esc_html( $service['desc'] ); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Extra badges -->
    <div class="gm-services__badge-row gm-fade-in">
        <?php foreach ( $extra_badges as $badge ) : ?>
        <span class="gm-badge gm-badge--purple" style="padding:0.75rem 1.5rem;font-size:1rem;font-weight:700;">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <?php echo $badge['icon']; ?>
            </svg>
            <?php echo esc_html( $badge['label'] ); ?>
        </span>
        <?php endforeach; ?>
    </div>

</section>
