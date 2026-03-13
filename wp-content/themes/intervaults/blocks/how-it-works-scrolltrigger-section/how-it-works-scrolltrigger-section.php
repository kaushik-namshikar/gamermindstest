<?php
$hwsstb_title = get_field('hwsstb_title');
$hwsstb_desc = get_field('hwsstb_desc');
$hwsstb_button = get_field('hwsstb_button');
?>

<section class="how-gsap">
    <div class="how-gsap__wrapper">
        <div class="how-gsap__intro">
            <div>
                <?php if ($hwsstb_title): ?>
                    <h2><?php echo $hwsstb_title; ?></h2>
                <?php endif; ?>

                <?php if ($hwsstb_desc): ?>
                    <p><?php echo $hwsstb_desc; ?></p>
                <?php endif; ?>
            </div>

            <?php if ($hwsstb_button): ?>
                <a href="<?php echo $hwsstb_button['url']; ?>"
                    class="how-gsap__btn"><?php echo $hwsstb_button['title']; ?></a>
            <?php endif; ?>
        </div>

        <div class="how-gsap__panels">
            <?php
            if (have_rows('hwsstb_slides_repeater')):
                $index = 0;
                while (have_rows('hwsstb_slides_repeater')):
                    the_row();
                    $hwsstb_slide_title = get_sub_field('hwsstb_slide_title');
                    $hwsstb_slide_desc = get_sub_field('hwsstb_slide_desc');
                    $hwsstb_slide_img = get_sub_field('hwsstb_slide_image');
                    $slide_parity_class = (($index + 1) % 2 === 0) ? 'is-even' : 'is-odd';
                    ?>
                    <div
                        class="how-gsap__panel <?php echo $index === 0 ? 'active' : ''; ?> <?php echo esc_attr($slide_parity_class); ?>">
                        <div class="how-gsap__panel-content">
                            <?php if ($hwsstb_slide_title): ?>
                                <h3><?php echo $hwsstb_slide_title; ?></h3><?php endif; ?>
                            <?php if ($hwsstb_slide_desc): ?>
                                <p><?php echo $hwsstb_slide_desc; ?></p><?php endif; ?>
                        </div>

                        <?php if ($hwsstb_slide_img): ?>
                            <img src="<?php echo esc_url($hwsstb_slide_img['url']); ?>" alt="" />
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