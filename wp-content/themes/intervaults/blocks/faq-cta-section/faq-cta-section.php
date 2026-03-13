<?php
$cta_title = get_field('faq_cta_title');
$cta_description = get_field('faq_cta_description');
$cta_button = get_field('faq_cta_button');
$cta_image = get_field('faq_cta_image');
?>

<section class="cta-section side-padding">

    <div class="cta-section__container">
        <div class="cta-section__bg-icon"><img
                src="<?php echo get_template_directory_uri() ?>/assets/images/ticker-bg-icon-faq-cta.svg"></div>
        <div class="cta-section__content">

            <?php if ($cta_title): ?>
                <h4 class="cta-section__title">
                    <?php echo esc_html($cta_title); ?>
                </h4>
            <?php endif; ?>

            <?php if ($cta_description): ?>
                <p class="cta-section__desc">
                    <?php echo esc_html($cta_description); ?>
                </p>
            <?php endif; ?>

            <?php if ($cta_button): ?>
                <a href="<?php echo esc_url($cta_button['url']); ?>" class="cta-section__btn">
                    <?php echo esc_html($cta_button['title']); ?>
                </a>
            <?php endif; ?>

        </div>

        <?php if ($cta_image): ?>
            <div class="cta-section__image">
                <img src="<?php echo esc_url($cta_image['url']); ?>" alt="<?php echo esc_attr($cta_image['alt']); ?>">
            </div>
        <?php endif; ?>

    </div>
</section>