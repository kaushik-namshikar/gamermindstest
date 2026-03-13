<?php
$sb_title = get_field('sb_title');
$sb_desc = get_field('sb_desc');
$sb_layout = get_field('sb_layout');
?>

<section class="security <?php echo ($sb_layout === 'reverse') ? 'security--reverse' : ''; ?>">
    <div class="security__container">

        <!-- LEFT -->
        <div class="security__left">

            <?php if ($sb_title): ?>
                <h2 class="security__title">
                    <?php echo esc_html($sb_title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($sb_desc): ?>
                <p class="security__desc">
                    <?php echo esc_html($sb_desc); ?>
                </p>
            <?php endif; ?>

            <ul class="security__tabs">
                <?php
                if (have_rows('sb_tabs_repeater')):
                    $index = 0;
                    while (have_rows('sb_tabs_repeater')):
                        the_row();

                        $sb_tname = get_sub_field('sb_tab_name');
                        ?>
                        <li class="security__tab <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-tab="<?php echo $index; ?>">
                            <?php echo esc_html($sb_tname); ?>

                            <img class="security__tab-arrow"
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


        <!-- RIGHT -->
        <div class="security__right">

            <?php
            if (have_rows('sb_tabs_repeater')):
                $index = 0;
                while (have_rows('sb_tabs_repeater')):
                    the_row();

                    $sb_timage = get_sub_field('sb_tab_image');
                    ?>
                    <?php if ($sb_timage): ?>
                        <img src="<?php echo esc_url($sb_timage['url']); ?>" alt="<?php echo esc_attr($sb_timage['alt']); ?>"
                            class="security__image <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-content="<?php echo $index; ?>" />
                    <?php endif; ?>
                    <?php
                    $index++;
                endwhile;
            endif;
            ?>


            <div class="security__info">
                <?php
                if (have_rows('sb_tabs_repeater')):
                    $index = 0;
                    while (have_rows('sb_tabs_repeater')):
                        the_row();

                        $sb_tcard_title = get_sub_field('sb_tab_card_title');
                        $sb_tcard_desc = get_sub_field('sb_tab_card_desc');
                        ?>
                        <div class="security__info-item <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-content="<?php echo $index; ?>">

                            <?php if ($sb_tcard_title): ?>
                                <h4><?php echo esc_html($sb_tcard_title); ?></h4>
                            <?php endif; ?>

                            <?php if ($sb_tcard_desc): ?>
                                <p><?php echo esc_html($sb_tcard_desc); ?></p>
                            <?php endif; ?>

                        </div>
                        <?php
                        $index++;
                    endwhile;
                endif;
                ?>
            </div>

        </div>
    </div>
</section>