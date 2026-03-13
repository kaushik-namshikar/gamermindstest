<?php
$hwsb_title = get_field('hwsb_title');
$hwsb_desc = get_field('hwsb_desc');
$hwsb_button = get_field('hwsb_button');
?>

<section class="how">
    <div class="how__wrapper">
        <!-- LEFT INTRO PANEL -->
        <div class="how__intro">
            <div>
                <?php if ($hwsb_title): ?>
                    <h2>
                        <?php echo $hwsb_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($hwsb_desc): ?>
                    <p>
                        <?php echo $hwsb_desc; ?>
                    </p>
                <?php endif; ?>
            </div>

            <?php if ($hwsb_button): ?>
                <a href="<?php echo $hwsb_button['url']; ?>" class="how__btn"><?php echo $hwsb_button['title']; ?></a>
            <?php endif; ?>
        </div>

        <!-- EXPANDING PANELS -->
        <div class="how__panels">
            <?php
            if (have_rows('hwsb_slides_repeater')):
                $index = 0;
                while (have_rows('hwsb_slides_repeater')):
                    the_row();
                    $hwsb_slide_title = get_sub_field('hwsb_slide_title');
                    $hwsb_slide_desc = get_sub_field('hswb_slide_desc');
                    $hwsb_slide_img = get_sub_field('hwsb_slide_image');
                    $slide_parity_class = (($index + 1) % 2 === 0) ? 'is-even' : 'is-odd';
                    ?>
                    <div
                        class="how__panel <?php echo $index === 0 ? 'active' : ''; ?> <?php echo esc_attr($slide_parity_class); ?>">
                        <div class="how__panel-content">
                            <?php if ($hwsb_slide_title): ?>
                                <h3><?php echo $hwsb_slide_title; ?></h3><?php endif; ?>
                            <?php if ($hwsb_slide_desc): ?>
                                <p><?php echo $hwsb_slide_desc; ?></p><?php endif; ?>
                        </div>

                        <?php if ($hwsb_slide_img): ?>
                            <img src="<?php echo esc_url($hwsb_slide_img['url']); ?>" alt="" />
                        <?php endif; ?>
                    </div>
                    <?php
                    $index++;
                endwhile;
            endif;
            ?>

        </div>
    </div>
</section>