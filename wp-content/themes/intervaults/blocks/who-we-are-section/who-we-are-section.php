<?php
$whsb_label = get_field('wsb_label');
$whsb_title = get_field('wsb_title');
$whsb_button = get_field('wsb_button');

?>

<section <?php echo get_block_wrapper_attributes(['class' => 'who-we-are side-padding']); ?>>

    <div class="who-we-are__container">
        <?php if ($whsb_label): ?>
            <span class="who-we-are__label"><?php echo esc_html($whsb_label); ?></span>
        <?php endif; ?>

        <?php if ($whsb_title): ?>
            <h4 class="who-we-are__title">
                <?php echo esc_html($whsb_title); ?>
            </h4>
        <?php endif; ?>

        <?php if ($whsb_button): ?>
            <a href="<?php echo esc_html($whsb_button['url']); ?>" class="who-we-are__button">
                <?php echo esc_html($whsb_button['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</section>