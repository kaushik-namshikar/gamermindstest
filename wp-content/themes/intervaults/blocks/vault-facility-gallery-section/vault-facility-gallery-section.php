<?php
$vault_facility_gallery_section_title = get_field('vault_facility_gallery_section_title');
?>

<section <?php echo get_block_wrapper_attributes(['class' => 'vault-facility-gallery side-padding']); ?>>
    <div class="vault-facility-gallery__container">
        <?php if (!empty($vault_facility_gallery_section_title)) : ?>
            <h2 class="vault-facility-gallery__title"><?php echo esc_html($vault_facility_gallery_section_title); ?></h2>
        <?php endif; ?>

        <?php if (have_rows('vault_facility_gallery_section_items')) : ?>
            <div class="vault-facility-gallery__grid">
                <?php
                while (have_rows('vault_facility_gallery_section_items')) :
                    the_row();
                    $vault_facility_gallery_section_image = get_sub_field('vault_facility_gallery_section_image');

                    if (empty($vault_facility_gallery_section_image) || !is_array($vault_facility_gallery_section_image) || empty($vault_facility_gallery_section_image['url'])) {
                        continue;
                    }

                    $vault_facility_gallery_section_alt = '';
                    if (!empty($vault_facility_gallery_section_image['alt'])) {
                        $vault_facility_gallery_section_alt = $vault_facility_gallery_section_image['alt'];
                    } elseif (!empty($vault_facility_gallery_section_image['title'])) {
                        $vault_facility_gallery_section_alt = $vault_facility_gallery_section_image['title'];
                    }
                    ?>
                    <figure class="vault-facility-gallery__item">
                        <a class="vault-facility-gallery__link js-vault-facility-gallery-item"
                            href="<?php echo esc_url($vault_facility_gallery_section_image['url']); ?>"
                            title="<?php echo esc_attr($vault_facility_gallery_section_alt); ?>">
                            <img class="vault-facility-gallery__image"
                                src="<?php echo esc_url($vault_facility_gallery_section_image['url']); ?>"
                                alt="<?php echo esc_attr($vault_facility_gallery_section_alt); ?>" loading="lazy" decoding="async">
                        </a>
                    </figure>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
