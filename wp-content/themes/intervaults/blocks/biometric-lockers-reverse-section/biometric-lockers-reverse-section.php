<?php
$biometric_lockers_reverse_section_label = get_field('biometric_lockers_reverse_section_label');
$biometric_lockers_reverse_section_title = get_field('biometric_lockers_reverse_section_title');
$biometric_lockers_reverse_section_button = get_field('biometric_lockers_reverse_section_button');
$biometric_lockers_reverse_section_items = get_field('biometric_lockers_reverse_section_items');
$biometric_lockers_reverse_section_count = is_array($biometric_lockers_reverse_section_items) ? count($biometric_lockers_reverse_section_items) : 0;
$biometric_lockers_reverse_section_slot_count = 4;
$enable_sticky = get_field('br-block-sticky');
$block_classes = [
    'biometric-lockers-reverse',
    'side-padding',
    get_field('br-block-sticky') === true ? 'make-block-sticky' : '',
];

?>

<section <?php echo get_block_wrapper_attributes(['class' => implode(' ', $block_classes)]); ?>>
    <div class="biometric-lockers-reverse__container">
        <div class="biometric-lockers-reverse__left">
            <?php if ($biometric_lockers_reverse_section_count > 0): ?>
                <div class="biometric-lockers-reverse__slots"
                    data-slot-count="<?php echo esc_attr((string) $biometric_lockers_reverse_section_slot_count); ?>">
                    <?php for ($slot_index = 0; $slot_index < $biometric_lockers_reverse_section_slot_count; $slot_index++): ?>
                        <?php
                        $item = isset($biometric_lockers_reverse_section_items[$slot_index]) ? $biometric_lockers_reverse_section_items[$slot_index] : null;
                        $image = is_array($item) && !empty($item['biometric_lockers_reverse_section_image']) ? $item['biometric_lockers_reverse_section_image'] : null;
                        $icon = is_array($item) && !empty($item['biometric_lockers_reverse_section_icon']) ? $item['biometric_lockers_reverse_section_icon'] : null;
                        $title = is_array($item) && !empty($item['biometric_lockers_reverse_section_item_title']) ? $item['biometric_lockers_reverse_section_item_title'] : '';
                        $desc = is_array($item) && !empty($item['biometric_lockers_reverse_section_item_description']) ? $item['biometric_lockers_reverse_section_item_description'] : '';
                        $width = is_array($item) && !empty($item['biometric_lockers_reverse_section_item_width']) ? $item['biometric_lockers_reverse_section_item_width'] : '';
                        $height = is_array($item) && !empty($item['biometric_lockers_reverse_section_item_height']) ? $item['biometric_lockers_reverse_section_item_height'] : '';
                        $depth = is_array($item) && !empty($item['biometric_lockers_reverse_section_item_depth']) ? $item['biometric_lockers_reverse_section_item_depth'] : '';
                        ?>
                        <article class="biometric-lockers-reverse__slot"
                            data-slot-index="<?php echo esc_attr((string) $slot_index); ?>">
                            <div class="biometric-lockers-reverse__image-wrap">
                                <?php if (is_array($image) && !empty($image['url'])): ?>
                                    <img class="biometric-lockers-reverse__image" src="<?php echo esc_url($image['url']); ?>"
                                        alt="<?php echo esc_attr(!empty($image['alt']) ? $image['alt'] : ''); ?>" loading="lazy"
                                        decoding="async">
                                <?php endif; ?>
                            </div>
                            <div class="biometric-lockers-reverse__card">
                                <div class="biometric-lockers-reverse__card-head">
                                    <?php if (is_array($icon) && !empty($icon['url'])): ?>
                                        <img class="biometric-lockers-reverse__icon" src="<?php echo esc_url($icon['url']); ?>"
                                            alt="<?php echo esc_attr(!empty($icon['alt']) ? $icon['alt'] : ''); ?>" loading="lazy"
                                            decoding="async">
                                    <?php endif; ?>
                                    <?php if (!empty($title)): ?>
                                        <h3 class="biometric-lockers-reverse__card-title"><?php echo esc_html($title); ?></h3>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($desc)): ?>
                                    <p class="biometric-lockers-reverse__card-desc"><?php echo esc_html($desc); ?></p>
                                <?php endif; ?>
                                <p class="biometric-lockers-reverse__meta">
                                    <?php if (!empty($width)): ?>
                                        <span><?php echo esc_html__('Width:', 'intervaults') . ' ' . esc_html($width); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($height)): ?>
                                        <span><?php echo esc_html__('Height:', 'intervaults') . ' ' . esc_html($height); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($depth)): ?>
                                        <span><?php echo esc_html__('Depth:', 'intervaults') . ' ' . esc_html($depth); ?></span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </article>
                    <?php endfor; ?>
                </div>
                <?php if ($biometric_lockers_reverse_section_count > 1): ?>
                    <div class="biometric-lockers-reverse__controls biometric-lockers-reverse__controls--slots"
                        aria-label="<?php echo esc_attr__('Biometric locker navigation', 'intervaults'); ?>">
                        <button type="button"
                            class="biometric-lockers-reverse__control biometric-lockers-reverse__control--prev"
                            aria-label="<?php echo esc_attr__('Show previous locker', 'intervaults'); ?>">
                            <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                        </button>
                        <button type="button"
                            class="biometric-lockers-reverse__control biometric-lockers-reverse__control--next"
                            aria-label="<?php echo esc_attr__('Show next locker', 'intervaults'); ?>">
                            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                        </button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (have_rows('biometric_lockers_reverse_section_items')): ?>
                <script type="application/json" class="biometric-lockers-reverse__dataset">
                                                [
                                                <?php
                                                $index = 0;
                                                while (have_rows('biometric_lockers_reverse_section_items')):
                                                    the_row();
                                                    $row_image = get_sub_field('biometric_lockers_reverse_section_image');
                                                    $row_icon = get_sub_field('biometric_lockers_reverse_section_icon');
                                                    $row_title = get_sub_field('biometric_lockers_reverse_section_item_title');
                                                    $row_desc = get_sub_field('biometric_lockers_reverse_section_item_description');
                                                    $row_width = get_sub_field('biometric_lockers_reverse_section_item_width');
                                                    $row_height = get_sub_field('biometric_lockers_reverse_section_item_height');
                                                    $row_depth = get_sub_field('biometric_lockers_reverse_section_item_depth');

                                                    $row = [
                                                        'imageUrl' => is_array($row_image) && !empty($row_image['url']) ? $row_image['url'] : '',
                                                        'imageAlt' => is_array($row_image) && !empty($row_image['alt']) ? $row_image['alt'] : '',
                                                        'iconUrl' => is_array($row_icon) && !empty($row_icon['url']) ? $row_icon['url'] : '',
                                                        'iconAlt' => is_array($row_icon) && !empty($row_icon['alt']) ? $row_icon['alt'] : '',
                                                        'title' => !empty($row_title) ? $row_title : '',
                                                        'description' => !empty($row_desc) ? $row_desc : '',
                                                        'width' => !empty($row_width) ? $row_width : '',
                                                        'height' => !empty($row_height) ? $row_height : '',
                                                        'depth' => !empty($row_depth) ? $row_depth : '',
                                                    ];

                                                    echo wp_json_encode($row);
                                                    if ($index < ($biometric_lockers_reverse_section_count - 1)) {
                                                        echo ',';
                                                    }
                                                    $index++;
                                                endwhile;
                                                ?>
                                                ]
                                            </script>
            <?php endif; ?>
        </div>

        <div class="biometric-lockers-reverse__right">
            <?php if (!empty($biometric_lockers_reverse_section_label)): ?>
                <p class="biometric-lockers-reverse__label">
                    <?php echo esc_html($biometric_lockers_reverse_section_label); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($biometric_lockers_reverse_section_title)): ?>
                <h3 class="biometric-lockers-reverse__title">
                    <?php echo esc_html($biometric_lockers_reverse_section_title); ?>
                </h3>
            <?php endif; ?>

            <?php if (is_array($biometric_lockers_reverse_section_button) && !empty($biometric_lockers_reverse_section_button['url']) && !empty($biometric_lockers_reverse_section_button['title'])): ?>
                <a class="biometric-lockers-reverse__btn"
                    href="<?php echo esc_url($biometric_lockers_reverse_section_button['url']); ?>"
                    <?php echo !empty($biometric_lockers_reverse_section_button['target']) ? 'target="' . esc_attr($biometric_lockers_reverse_section_button['target']) . '"' : ''; ?>>
                    <?php echo esc_html($biometric_lockers_reverse_section_button['title']); ?>
                </a>
            <?php endif; ?>

            <?php if ($biometric_lockers_reverse_section_count > 1): ?>
                <div class="biometric-lockers-reverse__controls biometric-lockers-reverse__controls--sidebar"
                    aria-label="<?php echo esc_attr__('Biometric locker navigation', 'intervaults'); ?>">
                    <button type="button"
                        class="biometric-lockers-reverse__control biometric-lockers-reverse__control--prev"
                        aria-label="<?php echo esc_attr__('Show previous locker', 'intervaults'); ?>">
                        <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                    </button>
                    <button type="button"
                        class="biometric-lockers-reverse__control biometric-lockers-reverse__control--next"
                        aria-label="<?php echo esc_attr__('Show next locker', 'intervaults'); ?>">
                        <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
