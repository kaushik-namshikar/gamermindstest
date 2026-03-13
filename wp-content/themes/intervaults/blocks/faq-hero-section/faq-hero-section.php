<?php
$faq_hero_tagline = get_field('faq_hero_tagline');
$faq_hero_title = get_field('faq_hero_title');
$faq_hero_desc = get_field('faq_hero_desc');
$faq_hero_placeholder_text = get_field('faq_hero_placeholder_text');
$faq_hero_background_video = get_field('faq_hero_background_video');
$faq_hero_background_color = sanitize_hex_color(get_field('faq_hero_background_color')) ?: '#2B2A29';
$faq_hero_font_color = sanitize_hex_color(get_field('faq_hero_font_color')) ?: '#FFFFFF';
$faq_hero_inline_style = sprintf(
    '--faq-hero-bg:%s;--faq-hero-text:%s;',
    esc_attr($faq_hero_background_color),
    esc_attr($faq_hero_font_color)
);
?>

<section <?php echo get_block_wrapper_attributes(['class' => 'faq-hero side-padding']); ?>
    style="<?php echo $faq_hero_inline_style; ?>">
    <?php if (!empty($faq_hero_background_video['url'])): ?>
        <div class="faq-hero__bg" aria-hidden="true">
            <video autoplay muted loop playsinline>
                <source src="<?php echo esc_url($faq_hero_background_video['url']); ?>"
                    type="<?php echo esc_attr($faq_hero_background_video['mime_type'] ?? 'video/mp4'); ?>" />
            </video>
        </div>
        <div class="faq-hero__overlay" aria-hidden="true"></div>
    <?php endif; ?>

    <div class="faq-hero__container">

        <div class="faq-hero__label">
            <span class="faq-hero__icon"><img
                    src="<?php echo get_template_directory_uri() ?>/assets/images/ticker-svg-icon-red.svg"></span>
            <?php if ($faq_hero_tagline): ?>
                <span class="faq-hero__label-text"><?php echo $faq_hero_tagline; ?></span>
            <?php endif; ?>
        </div>

        <?php if ($faq_hero_title): ?>
            <h1 class="faq-hero__title">
                <?php echo $faq_hero_title; ?>
            </h1>
        <?php endif; ?>

        <?php if ($faq_hero_desc): ?>
            <p class="faq-hero__subtitle">
                <?php echo $faq_hero_desc; ?>
            </p>
        <?php endif; ?>

        <?php if ($faq_hero_placeholder_text): ?>
            <div class="faq-hero__search">
                <input type="text" class="js-faq-search-input"
                    placeholder="<?php echo esc_attr($faq_hero_placeholder_text); ?>" aria-label="Search questions" />
                <span class="faq-hero__search-icon"><img
                        src="<?php echo get_template_directory_uri() ?>/assets/images/search-icon.svg"></span>
                <div class="faq-hero__suggestions js-faq-search-suggestions" hidden></div>
            </div>
        <?php endif; ?>

    </div>
</section>