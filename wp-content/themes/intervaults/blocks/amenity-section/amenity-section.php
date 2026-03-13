<?php
$as_title_one = get_field('asb_title_one');
$as_title_two = get_field('asb_title_second');
$as_image = get_field('asb_image');
$as_button = get_field('asb_button');
?>

<section class="amenity">
    <div style="text-align: center" class="d-none d-lg-block">
        <?php if ($as_title_one): ?>
            <h2 class="<?php echo is_page(243) ? 'title-first-line2' : 'title-first-line' ?>"><?php echo $as_title_one; ?>
            </h2>
        <?php endif; ?>
    </div>
    <div class="amenity__container">
        <!-- LEFT IMAGE -->

        <div class="amenity__image-wrapper">
            <?php if ($as_image): ?>
                <img src="<?php echo esc_url($as_image['url']); ?>" alt="Luxury Building" class="amenity__image" />
            <?php endif; ?>
        </div>

        <!-- RIGHT CONTENT -->
        <div class="amenity__content">

            <?php if ($as_title_two): ?>
                <h2 class="<?php echo is_page(243) ? 'amenity__title2' : 'amenity__title' ?>"> <?php if ($as_title_one): ?>
                        <span class="title-first-line d-lg-none">
                            <?php echo $as_title_one; ?>
                        </span>
                    <?php endif; ?>     <?php echo $as_title_two; ?>
                </h2>
            <?php endif; ?>

            <ul class="amenity__list">
                <?php
                if (have_rows('asb_list_repeater')):
                    while (have_rows('asb_list_repeater')):
                        the_row();
                        $asb_list_text = get_sub_field('asb_list_text');


                        ?>
                        <li class="amenity__item">
                            <span class="amenity__icon"><img
                                    src="<?php echo get_template_directory_uri() ?>/assets/images/ticker-svg-icon-red.svg" /></span>

                            <p>
                                <?php echo $asb_list_text; ?>
                            </p>
                        </li>
                        <?php
                    endwhile;
                endif;
                ?>
            </ul>
            <?php if ($as_button): ?>
                <a href="<?php echo esc_url($as_button['url']); ?>"
                    class="amenity__button"><?php echo $as_button['title']; ?></a>
            <?php endif; ?>
        </div>
    </div>
</section>