<?php
$private_vault_discretion_section_eyebrow = get_field('private_vault_discretion_section_eyebrow');
$private_vault_discretion_section_title = get_field('private_vault_discretion_section_title');
$private_vault_discretion_section_description = get_field('private_vault_discretion_section_description');
$private_vault_discretion_section_button = get_field('private_vault_discretion_section_button');
$private_vault_discretion_section_image = get_field('private_vault_discretion_section_image');
?>

<section <?php echo get_block_wrapper_attributes(['class' => 'private-vault-discretion']); ?>>
    <div class="private-vault-discretion__container">
        <div class="private-vault-discretion__content">
            <?php if (!empty($private_vault_discretion_section_eyebrow)) : ?>
                <p class="private-vault-discretion__eyebrow"><?php echo esc_html($private_vault_discretion_section_eyebrow); ?></p>
            <?php endif; ?>

            <?php if (!empty($private_vault_discretion_section_title)) : ?>
                <h2 class="private-vault-discretion__title"><?php echo esc_html($private_vault_discretion_section_title); ?></h2>
            <?php endif; ?>

            <?php if (!empty($private_vault_discretion_section_description)) : ?>
                <p class="private-vault-discretion__description">
                    <?php echo esc_html($private_vault_discretion_section_description); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($private_vault_discretion_section_button) && !empty($private_vault_discretion_section_button['url']) && !empty($private_vault_discretion_section_button['title'])) : ?>
                <a class="private-vault-discretion__button" href="<?php echo esc_url($private_vault_discretion_section_button['url']); ?>"
                    target="<?php echo esc_attr(!empty($private_vault_discretion_section_button['target']) ? $private_vault_discretion_section_button['target'] : '_self'); ?>">
                    <?php echo esc_html($private_vault_discretion_section_button['title']); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if (!empty($private_vault_discretion_section_image) && is_array($private_vault_discretion_section_image) && !empty($private_vault_discretion_section_image['url'])) : ?>
            <?php
            $private_vault_discretion_section_alt = '';
            if (!empty($private_vault_discretion_section_image['alt'])) {
                $private_vault_discretion_section_alt = $private_vault_discretion_section_image['alt'];
            } elseif (!empty($private_vault_discretion_section_image['title'])) {
                $private_vault_discretion_section_alt = $private_vault_discretion_section_image['title'];
            }
            ?>
            <figure class="private-vault-discretion__media">
                <img class="private-vault-discretion__image"
                    src="<?php echo esc_url($private_vault_discretion_section_image['url']); ?>"
                    alt="<?php echo esc_attr($private_vault_discretion_section_alt); ?>" loading="lazy" decoding="async">
            </figure>
        <?php endif; ?>
    </div>
</section>
