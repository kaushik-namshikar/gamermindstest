<?php
$rv_label = get_field('bv_label');
$rv_title = get_field('bv_title');
$rv_bottom_text = get_field('bv_bottom_text');
?>

<section class="biometric side-padding">
    <div class="biometric__container">

        <div class="biometric__label-title-wrapper">
            <!-- LEFT SIDE -->
            <div class="biometric__left">
                <?php if ($rv_label): ?>
                    <span class="biometric__label">
                        <?php echo esc_html($rv_label); ?>
                    </span>
                <?php endif; ?>

                <?php if ($rv_title): ?>
                    <h2 class="biometric__title">
                        <?php echo nl2br(esc_html($rv_title)); ?>
                    </h2>
                <?php endif; ?>
            </div>
        </div>



        <!-- RIGHT SIDE -->
        <div class="biometric__right">

            <!-- Tabs -->
            <div class="biometric__tabs" role="tablist">
                <?php if (have_rows('bv_sizes_repeater')):
                    $index = 0;
                    while (have_rows('bv_sizes_repeater')):
                        the_row();
                        $size_name = get_sub_field('bv_size_name');
                        ?>
                        <button class="biometric__tab <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-tab="tab-<?php echo $index; ?>" role="tab">
                            <?php echo esc_html($size_name); ?>
                        </button>
                        <?php
                        $index++;
                    endwhile;
                endif; ?>
                <span class="biometric__indicator"></span>
            </div>

            <!-- Product Area -->
            <div class="biometric__product">

                <?php if (have_rows('bv_sizes_repeater')):
                    $index = 0;
                    while (have_rows('bv_sizes_repeater')):
                        the_row();

                        $image = get_sub_field('bv_size_image');
                        $capacity = get_sub_field('bv_size_capacity_text');
                        $width = get_sub_field('bv_size_width');
                        $height = get_sub_field('bv_size_height');
                        $depth = get_sub_field('bv_size_depth');
                        ?>
                        <div class="biometric__content <?php echo ($index === 0) ? 'active' : ''; ?>"
                            data-content="tab-<?php echo $index; ?>">

                            <div class="biometric__image">

                                <?php if ($image): ?>
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="">
                                <?php endif; ?>

                                <!-- Dimension Markers -->
                                <div class="biometric__dimension biometric__dimension--width">
                                    <span>
                                        <?php echo esc_html($width); ?>
                                    </span>
                                </div>

                                <div class="biometric__dimension biometric__dimension--height">
                                    <span>
                                        <?php echo esc_html($height); ?>
                                    </span>
                                </div>

                            </div>


                            <div class="biometric__info-card">
                                <div class="vault__card-heading-icon-wrapper">

                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/vault-card-icon.png">

                                    <h4>
                                        <?php the_sub_field('bv_size_name'); ?>
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
                <p class="biometric__bottom">
                    <?php echo esc_html($rv_bottom_text); ?>
                </p>
            <?php endif; ?>

        </div>
    </div>
</section>