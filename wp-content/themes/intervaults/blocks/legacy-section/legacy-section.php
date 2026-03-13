<?php
$ls_title = get_field('lsb_title');
$ls_image = get_field('lsb_image');
$ls_intro = get_field('lsb_intro');
$ls_button = get_field('lsb_button');
?>

<section class="legacy side-padding">
    <div class="legacy__container">
        <!-- LEFT SIDE -->
        <div class="legacy__left">
            <?php if ($ls_title): ?>
                <h3 class="legacy__title">
                    <?php echo $ls_title; ?>
                </h3>
            <?php endif; ?>

            <div class="legacy__image-wrapper">
                <?php if ($ls_image): ?>
                    <img src="<?php echo esc_url($ls_image['url']); ?>" alt="Jewelry and valuables" class="legacy__image" />
                <?php endif; ?>
            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="legacy__right">
            <?php if ($ls_intro): ?>
                <p class="legacy__intro">
                    <?php echo $ls_intro; ?>
                </p>
            <?php endif; ?>

            <div class="legacy-item-wrapper">
                <?php
                if (have_rows('lsb_list_repeater')):
                    while (have_rows('lsb_list_repeater')):
                        the_row();
                        $ls_list_title = get_sub_field('lsb_list_title');
                        $ls_list_desc = get_sub_field('lsb_list_desc');

                        ?>
                        <div class="legacy__item">
                            <h4><?php echo $ls_list_title; ?></h4>
                            <p>
                                <?php echo $ls_list_desc; ?>
                            </p>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>

            <?php if ($ls_button): ?>
                <a href="<?php echo esc_url($ls_button['url']); ?>"
                    class="legacy__button"><?php echo $ls_button['title']; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>