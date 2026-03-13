<?php
$vfsb_title = get_field('vfsb_title');
$vfsb_desc = get_field('vfsb_desc');
$vfsb_layout = get_field('vfsb_layout_order');

?>

<section class="vault-security <?php echo ($vfsb_layout === 'reverse') ? 'vault-security--reverse' : ''; ?>">

    <div class="v-security__container">




        <!-- RIGHT -->
        <div class="v-security__right">

            <?php
            if (have_rows('vfsb_tabs_repeater')):
                $index = 0;
                while (have_rows('vfsb_tabs_repeater')):
                    the_row();

                    $vfsb_timage = get_sub_field('vfsb_tab_image');
                    ?>
                    <?php if ($vfsb_timage): ?>
                        <img src="<?php echo esc_url($vfsb_timage['url']); ?>" alt="<?php echo esc_attr($vfsb_timage['alt']); ?>"
                            class="v-security__image <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-content="<?php echo $index; ?>" />
                    <?php endif; ?>
                    <?php
                    $index++;
                endwhile;
            endif;
            ?>


            <div class="v-security__info">
                <?php
                if (have_rows('vfsb_tabs_repeater')):
                    $index = 0;
                    while (have_rows('vfsb_tabs_repeater')):
                        the_row();

                        $vfsb_tcard_title = get_sub_field('vfsb_tab_card_title');
                        $vfsb_tcard_desc = get_sub_field('vfsb_tab_card_desc');
                        ?>
                        <div class="v-security__info-item <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-content="<?php echo $index; ?>">

                            <?php if ($vfsb_tcard_title): ?>
                                <h4><?php echo esc_html($vfsb_tcard_title); ?></h4>
                            <?php endif; ?>

                            <?php if ($vfsb_tcard_desc): ?>
                                <p><?php echo esc_html($vfsb_tcard_desc); ?></p>
                            <?php endif; ?>

                        </div>
                        <?php
                        $index++;
                    endwhile;
                endif;
                ?>
            </div>

        </div>

        <!-- LEFT -->
        <div class="v-security__left">

            <?php if ($vfsb_title): ?>
                <h2 class="v-security__title">
                    <?php echo esc_html($vfsb_title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($vfsb_desc): ?>
                <p class="v-security__desc">
                    <?php echo esc_html($vfsb_desc); ?>
                </p>
            <?php endif; ?>

            <ul class="v-security__tabs">
                <?php
                if (have_rows('vfsb_tabs_repeater')):
                    $index = 0;
                    while (have_rows('vfsb_tabs_repeater')):
                        the_row();

                        $vfsb_tname = get_sub_field('vfsb_tab_name');
                        ?>
                        <li class="v-security__tab <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-tab="<?php echo $index; ?>">
                            <?php echo esc_html($vfsb_tname); ?>

                            <img class="v-security__tab-arrow"
                                src="<?php echo get_template_directory_uri() . '/assets/images/' . (($index === 0) ? 'right-arrow-svg-icon.svg' : 'arrow-right-svg-non-hover.svg'); ?>"
                                data-active-icon="<?php echo get_template_directory_uri(); ?>/assets/images/right-arrow-svg-icon.svg"
                                data-inactive-icon="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-svg-non-hover.svg"
                                alt="">
                        </li>
                        <?php
                        $index++;
                    endwhile;
                endif;
                ?>
            </ul>
        </div>
    </div>
</section>