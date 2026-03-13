<?php
$contact_map_section_text_above_title = get_field('contact_map_section_text_above_title');
$contact_map_section_title = get_field('contact_map_section_title');
$contact_map_section_map_embed_url = get_field('contact_map_section_map_embed_url');
?>

<section <?php echo get_block_wrapper_attributes(['class' => 'contact-map side-padding']); ?>>


    <div class="contact-map__container">
        <div class="contact-map__left">
            <?php if (!empty($contact_map_section_text_above_title)): ?>
                <span class="contact-map__label"><?php echo esc_html($contact_map_section_text_above_title); ?></span>
            <?php endif; ?>

            <?php if (!empty($contact_map_section_title)): ?>
                <h2 class="contact-map__title"><?php echo esc_html($contact_map_section_title); ?></h2>
            <?php endif; ?>

            <?php if (!empty($contact_map_section_map_embed_url)): ?>
                <div class="contact-map__map">
                    <iframe src="<?php echo esc_url($contact_map_section_map_embed_url); ?>" loading="lazy" allowfullscreen
                        referrerpolicy="no-referrer-when-downgrade"
                        title="<?php echo esc_attr__('Location map', 'intervaults'); ?>"></iframe>
                </div>
            <?php endif; ?>
        </div>

        <div class="contact-map__right">
            <?php if (have_rows('contact_map_section_contact_repeater')): ?>
                <?php while (have_rows('contact_map_section_contact_repeater')):
                    the_row(); ?>
                    <?php
                    $contact_map_section_contact_title = get_sub_field('contact_map_section_contact_title');
                    $contact_map_section_contact_desc = get_sub_field('contact_map_section_contact_desc');
                    ?>
                    <div class="contact-map__item">
                        <div class="contact-map__item-title">
                            <img class="contact-map__icon"
                                src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/ticker-icon-black.svg'); ?>"
                                alt="">
                            <?php if (!empty($contact_map_section_contact_title)): ?>
                                <h4><?php echo esc_html($contact_map_section_contact_title); ?></h4>
                            <?php endif; ?>
                        </div>

                        <?php if (!empty($contact_map_section_contact_desc)): ?>
                            <div class="contact-map__item-content">
                                <?php echo wp_kses_post($contact_map_section_contact_desc); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>