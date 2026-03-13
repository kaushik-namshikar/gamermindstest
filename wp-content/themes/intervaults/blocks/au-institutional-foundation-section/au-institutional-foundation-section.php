<?php
$ls_title = get_field('lsb_title');
$ls_image = get_field('lsb_image');
$ls_button = get_field('lsb_button');
?>

<section class="institutional-foundation side-padding">
    <div class="institutional-foundation__container">
        <!-- LEFT SIDE -->
        <div class="institutional-foundation__left">
            <?php if ($ls_title): ?>
                <h2 class="institutional-foundation__title">
                    <?php echo $ls_title; ?>
                </h2>
            <?php endif; ?>

            <div class="institutional-foundation__image-wrapper">
                <?php if ($ls_image): ?>
                    <img src="<?php echo esc_url($ls_image['url']); ?>" alt="Jewelry and valuables"
                        class="institutional-foundation__image" />
                <?php endif; ?>
            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="institutional-foundation__right">
            <div class="institutional-foundation-item-wrapper">
                <?php
                if (have_rows('lsb_list_repeater')):
                    while (have_rows('lsb_list_repeater')):
                        the_row();
                        $ls_list_icon = get_sub_field('lsb_list_icon');
                        $ls_list_title = get_sub_field('lsb_list_title');
                        $ls_list_desc = get_sub_field('lsb_list_desc');

                        ?>
                        <div class="institutional-foundation__item">
                            <?php if ($ls_list_icon): ?>
                                <div class="institutional-foundation__item-icon">
                                    <img src="<?php echo esc_url($ls_list_icon['url']); ?>"
                                        alt="<?php echo esc_attr($ls_list_icon['alt'] ?: $ls_list_title); ?>" />
                                </div>
                            <?php endif; ?>
                            <div class="institutional-foundation__item-content">
                                <h4><?php echo $ls_list_title; ?></h4>
                                <p>
                                    <?php echo $ls_list_desc; ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>

            <?php if ($ls_button): ?>
                <a href="<?php echo esc_url($ls_button['url']); ?>"
                    class="institutional-foundation__button"><?php echo $ls_button['title']; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>
