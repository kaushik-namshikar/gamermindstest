<?php
$cs_text_above_title = get_field('cs_text_above_title');
$cs_title = get_field('cs_title');
?>

<section class="contact side-padding">

    <div class="contact__container">
        <div class="contact__bg-icon">
            <picture>
                <source media="(min-width: 1441px)"
                    srcset="<?php echo get_template_directory_uri() ?>/assets/images/ticker-bg-full-icon-contact.svg">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/ticker-bg-icon-contact.svg" alt="">
            </picture>
        </div>
        <!-- LEFT SIDE -->
        <div class="contact__left">


            <?php if ($cs_text_above_title): ?>
                <span class="contact__label"><?php echo $cs_text_above_title; ?></span>
            <?php endif; ?>

            <?php if ($cs_title): ?>
                <h2 class="contact__title"><?php echo $cs_title; ?></h2>
            <?php endif; ?>
        </div>

        <!-- RIGHT SIDE -->
        <div class="contact__right">
            <?php
            if (have_rows('cs_contact_repeater')):
                while (have_rows('cs_contact_repeater')):
                    the_row();
                    $cs_contact_title = get_sub_field('cs_contact_title');
                    $cs_contact_desc = get_sub_field('cs_contact_desc');
                    ?>
                    <div class="contact__item">
                        <div class="contact__item-title">
                            <img class="contact__icon"
                                src="<?php echo get_template_directory_uri() ?>/assets/images/ticker-icon-black.svg">

                            <?php if ($cs_contact_title): ?>
                                <h4><?php echo $cs_contact_title; ?></h4>
                            <?php endif; ?>
                        </div>

                        <?php if ($cs_contact_desc): ?>
                            <p>
                                <?php echo $cs_contact_desc; ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>
