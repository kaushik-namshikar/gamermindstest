<?php
/**
 * Block: gm/why-us
 * Mirrors: Developers.tsx — Why Us Section
 * whyUsPoints: Professional Localization / Player Community / Proven Demand
 */
$a = $attributes ?? [];
$cards = [
    [
        'icon'  => '<path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>',
        'title' => isset( $a['card1Title'] ) ? $a['card1Title'] : 'Professional Localization',
        'desc'  => isset( $a['card1Desc'] )  ? $a['card1Desc']  : 'Native-speaking translators with gaming expertise, editing, and LQA services.',
    ],
    [
        'icon'  => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'title' => isset( $a['card2Title'] ) ? $a['card2Title'] : 'Player Community',
        'desc'  => isset( $a['card2Desc'] )  ? $a['card2Desc']  : 'Access to a growing community of players actively interested in localized titles.',
    ],
    [
        'icon'  => '<circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>',
        'title' => isset( $a['card3Title'] ) ? $a['card3Title'] : 'Proven Demand',
        'desc'  => isset( $a['card3Desc'] )  ? $a['card3Desc']  : 'Your games are introduced to players who care about localization and want to experience them.',
    ],
];
$section_heading = isset( $a['heading'] )     ? $a['heading']     : 'Why Us?';
$proposition     = isset( $a['proposition'] ) ? $a['proposition'] : 'Gamer Minds combines professional game localization with a growing community of players interested in localized titles.';
?>

<section class="gm-why-us" id="why-us">

    <div class="gm-why-us__heading gm-fade-in">
        <h2><?php echo esc_html( $section_heading ); ?></h2>
    </div>

    <!-- Value proposition box -->
    <div class="gm-why-us__proposition gm-fade-in gm-fade-in--delay-1">
        <p><?php echo esc_html( $proposition ); ?></p>
        <hr class="gm-why-us__divider" aria-hidden="true">
        <p>When studios work with us, they are not just receiving translation services. Their games are also introduced to a community of players who actively follow localization efforts and care about seeing games become available in their language.</p>
        <p>This creates a unique bridge between developers and international players. Localization is not just delivered as files, but shared with an audience that is excited to experience the game.</p>
    </div>

    <!-- 3 benefit cards -->
    <div class="gm-why-us__grid">
        <?php foreach ( $cards as $i => $card ) : ?>
        <div class="gm-why-us__card gm-shine gm-fade-in gm-fade-in--delay-<?php echo $i + 2; ?>"
             style="<?php echo $i === 1 ? 'margin-top:2rem;' : ( $i === 2 ? 'margin-top:-1rem;' : '' ); ?>">
            <div class="gm-why-us__card-icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <?php echo $card['icon']; ?>
                </svg>
            </div>
            <h3><?php echo esc_html( $card['title'] ); ?></h3>
            <p><?php echo esc_html( $card['desc'] ); ?></p>
        </div>
        <?php endforeach; ?>
    </div>

</section>
