<?php
$vpr_title = get_field('vpr_title');
?>

<section class="vault-pricing side-padding">
    <div class="vault-pricing__container">

        <!-- LEFT TITLE -->
        <div class="vault-pricing__left">
            <?php if ($vpr_title): ?>
                <h2 class="vault-pricing__title">
                    <?php echo nl2br(esc_html($vpr_title)); ?>
                </h2>
            <?php endif; ?>
        </div>

        <!-- RIGHT ITEMS -->
        <div class="vault-pricing__right">
            <?php if (have_rows('vpr_items')): ?>
                <?php while (have_rows('vpr_items')):
                    the_row(); ?>

                    <?php
                    $duration = get_sub_field('vpr_duration');
                    $label = get_sub_field('vpr_label');
                    $subtext = get_sub_field('vpr_subtext');
                    ?>

                    <div class="vault-pricing__item">
                        <?php if ($duration): ?>
                            <h3 class="vault-pricing__duration">
                                <?php echo esc_html($duration); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($label): ?>
                            <p class="vault-pricing__label">
                                <?php echo esc_html($label); ?>
                            </p>
                        <?php endif; ?>

                        <?php if ($subtext): ?>
                            <p class="vault-pricing__subtext">
                                <?php echo esc_html($subtext); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>

    </div>
</section>