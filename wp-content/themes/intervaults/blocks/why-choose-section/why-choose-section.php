<?php
$wcbs_label = get_field('wcsb_label');
$wcbs_title = get_field('wcsb_title');
$wcbs_button = get_field('wcsb_button');
$card_count = 0;
if (have_rows('wcsb_card_repeater')) {
    $card_count = count(get_field('wcsb_card_repeater'));
}
?>

<section class="why-choose side-padding">
    <div class="why-choose__container">
        <div class="why-choose__header">
            <div class="why-choose-title-button-wrapper">
                <div>
                    <?php if ($wcbs_label): ?>
                        <span class="why-choose__label"><?php echo esc_html($wcbs_label); ?></span>
                    <?php endif; ?>

                    <?php if ($wcbs_title): ?>
                        <h2 class="why-choose__title">
                            <?php echo esc_html($wcbs_title); ?>
                        </h2>
                    <?php endif; ?>
                </div>

                <?php if ($wcbs_button): ?>
                    <a href="<?php echo esc_url($wcbs_button['url']); ?>"
                        class="who-we-are__button why-choose-button"><?php echo esc_html($wcbs_button['title']); ?></a>
                <?php endif; ?>
            </div>
        </div>

        <div
            class="why-choose__grid <?php echo $card_count === 3 ? 'why-choose__grid--three' : 'why-choose__grid--two'; ?>">

            <?php
            if (have_rows('wcsb_card_repeater')):

                while (have_rows('wcsb_card_repeater')):
                    the_row();
                    $wcsb_card_image = get_sub_field('wcsb_card_image');
                    $wcsb_card_title = get_sub_field('wcsb_card_title');
                    $wcsb_card_desc = get_sub_field('wcsb_card_description');
                    $wcsb_card_button = get_sub_field('wcsb_card_button');
                    $card_url = !empty($wcsb_card_button['url']) ? $wcsb_card_button['url'] : '';
                    $card_target = !empty($wcsb_card_button['target']) ? $wcsb_card_button['target'] : '_self';
                    $card_rel = $card_target === '_blank' ? 'noopener noreferrer' : '';
                    ?>
                    <!-- CARD -->
                    <?php if ($card_url): ?>
                        <a class="why-card" href="<?php echo esc_url($card_url); ?>" target="<?php echo esc_attr($card_target); ?>"
                            <?php echo $card_rel ? ' rel="' . esc_attr($card_rel) . '"' : ''; ?>>
                        <?php else: ?>
                            <div class="why-card">
                            <?php endif; ?>
                            <?php if ($wcsb_card_image): ?>
                                <img src="<?php echo esc_url($wcsb_card_image['url']); ?>" alt="Technological Innovation"
                                    class="why-card__image" />
                            <?php endif; ?>

                            <div class="why-card__overlay">
                                <div class="why-card__content">
                                    <div class="why-card__icon">
                                        <img
                                            src="<?php echo get_template_directory_uri() ?>/assets/images/ticker-svg-icon-red.svg" />
                                    </div>
                                    <h3 class="why-card__heading"><?php echo esc_html($wcsb_card_title); ?></h3>

                                    <p class="why-card__text">
                                        <?php echo esc_html($wcsb_card_desc); ?>
                                    </p>

                                    <?php if (!empty($wcsb_card_button['title'])): ?>
                                        <span class="why-card__link">
                                            <?php echo esc_html($wcsb_card_button['title']); ?>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ($card_url): ?>
                        </a>
                    <?php else: ?>
                    </div>
                <?php endif; ?>
                <?php
                endwhile;
            endif;
            ?>

    </div>
    </div>
</section>