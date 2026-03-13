<?php
$rv_label = get_field('rv_label');
$rv_title = get_field('rv_title');
$rv_button = get_field('rv_button');
$rv_bottom_text = get_field('rv_bottom_text');
$enable_sticky = get_field('block_slug_enable_sticky');
?>

<section class="robovault side-padding <?php echo $enable_sticky ? 'sticky-block' : ''; ?>">
    <div class="robovault__container">

        <div class="robovault__label-title-wrapper">
            <!-- LEFT SIDE -->
            <div class="robovault__left">
                <?php if ($rv_label): ?>
                    <span class="robovault__label">
                        <?php echo esc_html($rv_label); ?>
                    </span>
                <?php endif; ?>

                <?php if ($rv_title): ?>
                    <h2 class="robovault__title">
                        <?php echo nl2br(esc_html($rv_title)); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($rv_button) && !empty($rv_button['url']) && !empty($rv_button['title'])) : ?>
                    <a class="robovault__button" href="<?php echo esc_url($rv_button['url']); ?>"
                        target="<?php echo esc_attr(!empty($rv_button['target']) ? $rv_button['target'] : '_self'); ?>">
                        <?php echo esc_html($rv_button['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>



        <!-- RIGHT SIDE -->
        <div class="robovault__right">

            <!-- Tabs -->
            <div class="robovault__tabs" role="tablist">
                <?php if (have_rows('rv_sizes_repeater')):
                    $index = 0;
                    while (have_rows('rv_sizes_repeater')):
                        the_row();
                        $size_name = get_sub_field('rv_size_name');
                        ?>
                        <button class="robovault__tab <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-tab="tab-<?php echo $index; ?>" role="tab">
                            <?php echo esc_html($size_name); ?>
                        </button>
                        <?php
                        $index++;
                    endwhile;
                endif; ?>
                <span class="robovault__indicator"></span>
            </div>

            <!-- Product Area -->
            <div class="robovault__product">

                <?php if (have_rows('rv_sizes_repeater')):
                    $index = 0;
                    while (have_rows('rv_sizes_repeater')):
                        the_row();

                        $image = get_sub_field('rv_size_image');
                        $capacity = get_sub_field('rv_size_capacity_text');
                        $width = get_sub_field('rv_size_width');
                        $height = get_sub_field('rv_size_height');
                        $depth = get_sub_field('rv_size_depth');
                        ?>
                        <div class="robovault__content <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-content="tab-<?php echo $index; ?>">

                            <div class="robovault__image">

                                <?php if ($image): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="">
                                <?php endif; ?>

                                <!-- Dimension Markers -->
                                <div class="robovault__dimension robovault__dimension--width">
                                    <span><?php echo esc_html($width); ?></span>
                                </div>

                                <div class="robovault__dimension robovault__dimension--height">
                                    <span><?php echo esc_html($height); ?></span>
                                </div>

                            </div>


                            <div class="robovault__info-card">
                                <div class="vault__card-heading-icon-wrapper">

                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/vault-card-icon.png">

                                    <h4>
                                        <?php the_sub_field('rv_size_name'); ?>
                                    </h4>
                                </div>
                                <p>
                                    <?php echo esc_html($capacity); ?>
                                </p>
                                <ul>
                                    <li>Width:
                                        <?php echo esc_html($width); ?>
                                    </li>
                                    <li>Height:
                                        <?php echo esc_html($height); ?>
                                    </li>
                                    <li>Depth:
                                        <?php echo esc_html($depth); ?>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <?php
                        $index++;
                    endwhile;
                endif; ?>

            </div>

            <?php if ($rv_bottom_text): ?>
                <p class="robovault__bottom">
                    <?php echo esc_html($rv_bottom_text); ?>
                </p>
            <?php endif; ?>

        </div>
    </div>
</section>
