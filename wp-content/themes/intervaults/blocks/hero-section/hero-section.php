<!-- Hero section -->
<?php
$hs_video = get_field('hero_section_bg_video');
$hs_text = get_field('hero_section_text_above_title');
$hs_title = get_field('hero_section_title');
$hs_button1 = get_field('hero_section_button_one');
$hs_button2 = get_field('hero_section_button_two');

?>
<section class="hero">
    <!-- Background (video or image) -->

    <div class="hero__bg">
        <?php if ($hs_video): ?>
            <video autoplay muted loop playsinline>
                <source src="<?php echo $hs_video['url']; ?>" type="video/mp4" />
            </video>
        <?php endif ?>
    </div>

    <!-- Dark overlay -->
    <div class="hero__overlay"></div>

    <!-- Content -->
    <div class="hero__content-wrapper">
        <div class="hero__content">
            <?php if ($hs_text): ?>
                <span class="hero__eyebrow">
                    <?php echo esc_html($hs_text); ?>
                </span>
            <?php endif ?>

            <?php if ($hs_video): ?>
                <h2 class="hero__title"> <?php echo esc_html($hs_title); ?></h2>
            <?php endif ?>

            <div class="hero__buttons">
                <?php if ($hs_video): ?>
                    <a href=" <?php echo esc_url($hs_button1['url']); ?>" class="btn btn--primary">
                        <?php echo esc_html($hs_button1['title']); ?></a>
                <?php endif ?>
                <?php if ($hs_video): ?>
                    <a href=" <?php echo esc_url($hs_button2['url']); ?>" class="btn btn--outline">
                        <?php echo esc_html($hs_button2['title']); ?></a>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>