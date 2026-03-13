<?php
/**
 * Block: gm/faq
 * Mirrors: Players.tsx — FAQ Section
 * 5-item accordion, bg-[#1b2838], items bg-[#171a21] border border-[#2a475e]
 */
$faqs = [
    [
        'q' => 'How is this different from asking on Reddit or forums?',
        'a' => 'Reddit posts get buried. We organize demand across platforms and turn it into data packages that studios actually review. Think of it as aggregating all those scattered forum posts into one professional pitch.',
    ],
    [
        'q' => 'Does this actually work?',
        'a' => "We've helped ship 25+ localizations. Can't guarantee every campaign succeeds, but we've got a track record. Check the success stories — these are real games that got localized because the community showed up.",
    ],
    [
        'q' => 'What makes a campaign successful?',
        'a' => "Vote count matters, but so does showing you'll actually buy it. We track ownership data, purchase intent, and regional demographics. It's about quality data, not just raw numbers.",
    ],
    [
        'q' => 'Can I help translate?',
        'a' => "Yeah! When devs are interested but budget-constrained, we connect them with community translators. Some of our members have landed actual industry jobs this way.",
    ],
    [
        'q' => 'What kind of games do you focus on?',
        'a' => 'Mostly indie and mid-size studios who want to localize but need proof of demand. JRPGs, visual novels, narrative games, story-heavy indies are our bread and butter.',
    ],
];
?>

<section class="gm-faq" id="faq" style="background:#1b2838;padding:3rem 1.5rem;">
    <div style="max-width:56rem;margin:0 auto;">

        <div class="gm-fade-in" style="margin-bottom:2rem;">
            <h2 style="font-size:1.875rem;font-weight:900;color:#fff;margin-bottom:0.5rem;">Common questions</h2>
            <p style="color:#8f98a0;">Everything you need to know</p>
        </div>

        <div class="gm-accordion" role="list" style="display:flex;flex-direction:column;gap:0.75rem;">
            <?php foreach ( $faqs as $i => $faq ) :
                $item_id = 'gm-faq-' . $i;
            ?>
            <div class="gm-accordion__item gm-fade-in gm-fade-in--delay-<?php echo min( $i + 1, 5 ); ?>"
                 role="listitem"
                 style="background:#171a21;border:1px solid #2a475e;padding:0 1.25rem;">
                <button
                    class="gm-accordion__trigger"
                    aria-expanded="false"
                    aria-controls="<?php echo $item_id; ?>"
                    id="<?php echo $item_id; ?>-btn"
                    style="color:#fff;font-weight:700;text-align:left;"
                >
                    <?php echo esc_html( $faq['q'] ); ?>
                    <svg class="gm-accordion__chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m6 9 6 6 6-6"/>
                    </svg>
                </button>
                <div
                    class="gm-accordion__content"
                    id="<?php echo $item_id; ?>"
                    role="region"
                    aria-labelledby="<?php echo $item_id; ?>-btn"
                    style="color:#c7d5e0;"
                >
                    <?php echo esc_html( $faq['a'] ); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
