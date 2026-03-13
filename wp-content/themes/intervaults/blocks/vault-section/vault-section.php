<?php
$vsb_title = get_field('vsb_title');
$vsb_button = get_field('vsb_button');
?>

<section class="vault side-padding">
    <div class="vault__bg-icon"><img
            src="<?php echo get_template_directory_uri() ?>/assets/images/ticker-bg-icon-vault.svg"></div>
    <div class="vault__container">

        <!-- LEFT SIDE -->
        <div class="vault__left">
            <div class="vault__title-button-wrapper">
                <?php if ($vsb_title): ?>
                    <h2 class="vault__title">
                        <?php echo $vsb_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if ($vsb_button): ?>
                    <a href="<?php echo esc_url($vsb_button['url']); ?>" class="vault__button">
                        <?php echo $vsb_button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="vault__right">

            <!-- Tabs -->
            <div class="vault__tabs" role="tablist">
                <?php
                if (have_rows('vsb_locker_repeater')):
                    $i = 0;
                    while (have_rows('vsb_locker_repeater')):
                        the_row();
                        $vsb_lname = get_sub_field('vsb_locker_name');
                        ?>
                        <button class="vault__tab <?php echo $i === 0 ? 'active' : ''; ?>" data-tab="tab-<?php echo $i; ?>"
                            role="tab">
                            <?php echo esc_html($vsb_lname); ?>
                        </button>
                        <?php
                        $i++;
                    endwhile;
                endif;
                ?>
                <span class="vault__indicator"></span>
            </div>

            <!-- Panels -->
            <div class="vault__panels">
                <?php
                if (have_rows('vsb_locker_repeater')):
                    $i = 0;
                    while (have_rows('vsb_locker_repeater')):
                        the_row();

                        $vsb_lsize = get_sub_field('vsb_locker_size');
                        $vsb_lvideo = get_sub_field('vsb_locker_video');
                        $vsb_lsize_desc = get_sub_field('vsb_locker_size_desc');
                        $vsb_lwidth = get_sub_field('vsb_locker_width');
                        $vsb_lheight = get_sub_field('vsb_locker_height');
                        $vsb_llength = get_sub_field('vsb_locker_length');
                        $vsb_ldesc = get_sub_field('vsb_locker_description');
                        ?>

                        <div class="vault__panel <?php echo $i === 0 ? 'active' : ''; ?>" data-content="tab-<?php echo $i; ?>">

                            <div class="vault__media">
                                <div class="vault__video">
                                    <?php if ($vsb_lvideo): ?>
                                        <video autoplay muted loop playsinline>
                                            <source src="<?php echo esc_url($vsb_lvideo['url']); ?>" type="video/mp4" />
                                        </video>
                                    <?php endif; ?>
                                </div>

                                <div class="vault__card">
                                    <div class="vault__card-heading-icon-wrapper">

                                        <img
                                            src="<?php echo get_template_directory_uri() ?>/assets/images/vault-svg-card-icon.svg">

                                        <?php if ($vsb_lsize): ?>
                                            <h4><?php echo esc_html($vsb_lsize); ?></h4>
                                        <?php endif; ?>

                                    </div>


                                    <?php if ($vsb_lsize_desc): ?>
                                        <p><?php echo esc_html($vsb_lsize_desc); ?></p>
                                    <?php endif; ?>

                                    <ul>
                                        <?php if ($vsb_lwidth): ?>
                                            <li>Width: <?php echo esc_html($vsb_lwidth); ?></li><?php endif; ?>
                                        <?php if ($vsb_lheight): ?>
                                            <li>Height: <?php echo esc_html($vsb_lheight); ?></li><?php endif; ?>
                                        <?php if ($vsb_llength): ?>
                                            <li>Length: <?php echo esc_html($vsb_llength); ?></li><?php endif; ?>
                                    </ul>
                                </div>
                            </div>

                            <?php if ($vsb_ldesc): ?>
                                <p class="vault__description">
                                    <?php echo esc_html($vsb_ldesc); ?>
                                </p>
                            <?php endif; ?>

                        </div>

                        <?php
                        $i++;
                    endwhile;
                endif;
                ?>
            </div>

        </div>

    </div>
</section>