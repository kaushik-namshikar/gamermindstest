<?php
$trusted_privacy_testimonials_section_heading = get_field('trusted_privacy_testimonials_section_heading');
$trusted_privacy_testimonials_section_section_label = get_field('trusted_privacy_testimonials_section_section_label');
$trusted_privacy_testimonials_section_testimonials = get_field('trusted_privacy_testimonials_section_testimonials');
$trusted_privacy_testimonials_section_count = is_array($trusted_privacy_testimonials_section_testimonials) ? count($trusted_privacy_testimonials_section_testimonials) : 0;
$trusted_privacy_testimonials_section_arrow_left = trailingslashit(get_template_directory_uri()) . 'assets/images/testimonials-arrow-left.svg';
$trusted_privacy_testimonials_section_arrow_right = trailingslashit(get_template_directory_uri()) . 'assets/images/testimonials-arrow-right.svg';
?>

<section <?php echo get_block_wrapper_attributes(['class' => 'trusted-privacy-testimonials-section side-padding']); ?>>
    <div class="trusted-privacy-testimonials-section__inner">
        <header class="trusted-privacy-testimonials-section__header">
            <div class="trusted-privacy-testimonials-section__headline-wrap">
                <?php if (!empty($trusted_privacy_testimonials_section_section_label)): ?>
                    <p class="trusted-privacy-testimonials-section__label">
                        <?php echo esc_html($trusted_privacy_testimonials_section_section_label); ?>
                    </p>
                <?php endif; ?>

                <?php if (!empty($trusted_privacy_testimonials_section_heading)): ?>
                    <h4 class="trusted-privacy-testimonials-section__heading">
                        <?php echo esc_html($trusted_privacy_testimonials_section_heading); ?>
                    </h4>
                <?php endif; ?>
            </div>

            <?php if ($trusted_privacy_testimonials_section_count > 1): ?>
                <nav class="trusted-privacy-testimonials-section__controls"
                    aria-label="<?php echo esc_attr__('Testimonial navigation', 'intervaults'); ?>">
                    <button type="button"
                        class="trusted-privacy-testimonials-section__control trusted-privacy-testimonials-section__control--prev"
                        aria-label="<?php echo esc_attr__('Previous testimonial', 'intervaults'); ?>">
                        <img src="<?php echo esc_url($trusted_privacy_testimonials_section_arrow_left); ?>" alt=""
                            aria-hidden="true" class="trusted-privacy-testimonials-section__control-icon">
                    </button>
                    <button type="button"
                        class="trusted-privacy-testimonials-section__control trusted-privacy-testimonials-section__control--next"
                        aria-label="<?php echo esc_attr__('Next testimonial', 'intervaults'); ?>">
                        <img src="<?php echo esc_url($trusted_privacy_testimonials_section_arrow_right); ?>" alt=""
                            aria-hidden="true" class="trusted-privacy-testimonials-section__control-icon">
                    </button>
                </nav>
            <?php endif; ?>
        </header>

        <?php if (have_rows('trusted_privacy_testimonials_section_testimonials')): ?>
            <div class="trusted-privacy-testimonials-section__viewport" data-role="viewport">
                <div class="trusted-privacy-testimonials-section__track" data-role="track">
                    <?php
                    while (have_rows('trusted_privacy_testimonials_section_testimonials')):
                        the_row();

                        $trusted_privacy_testimonials_section_quote = get_sub_field('trusted_privacy_testimonials_section_quote');
                        $trusted_privacy_testimonials_section_client_name = get_sub_field('trusted_privacy_testimonials_section_client_name');
                        $trusted_privacy_testimonials_section_client_meta = get_sub_field('trusted_privacy_testimonials_section_client_meta');
                        ?>
                        <article class="trusted-privacy-testimonials-section__card" data-role="card">
                            <?php if (!empty($trusted_privacy_testimonials_section_quote)): ?>
                                <blockquote class="trusted-privacy-testimonials-section__quote">
                                    <p><?php echo esc_html($trusted_privacy_testimonials_section_quote); ?></p>
                                </blockquote>
                            <?php endif; ?>

                            <div class="trusted-privacy-testimonials-section__meta">
                                <?php if (!empty($trusted_privacy_testimonials_section_client_name)): ?>
                                    <p class="trusted-privacy-testimonials-section__name">
                                        <?php echo esc_html($trusted_privacy_testimonials_section_client_name); ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($trusted_privacy_testimonials_section_client_meta)): ?>
                                    <p class="trusted-privacy-testimonials-section__role">
                                        <?php echo esc_html($trusted_privacy_testimonials_section_client_meta); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>