<?php
$consult_bg = get_field('consultation_background'); // optional ACF image
$consult_title = get_field('consultation_title');
$consult_bg_url = esc_url($consult_bg['url'] ?? get_template_directory_uri() . '/assets/images/consultation-bg.jpg');
?>

<section <?php echo get_block_wrapper_attributes(['class' => 'consultation']); ?>>

    <figure class="consultation__bg" aria-hidden="true">
        <img class="consultation__bg-image" src="<?php echo $consult_bg_url; ?>" alt="" loading="lazy" decoding="async" />
    </figure>

    <div class="consultation__overlay"></div>

    <div class="consultation__container side-padding">

        <div class="consultation__content">

            <?php if ($consult_title): ?>
                <h2 class="<?php echo is_page(241) ? 'consultation__title2' : 'consultation__title' ?>">
                    <?php echo nl2br(esc_html($consult_title)); ?>
                </h2>
            <?php else: ?>
                <h2 class="consultation__title">
                    Leave us your details for a<br>
                    private consultation with<br>
                    our team.
                </h2>
            <?php endif; ?>

            <div class="consultation__form">
                <?php echo FrmFormsController::get_form_shortcode(array('id' => 2)); ?>
            </div>

        </div>

    </div>
</section>
