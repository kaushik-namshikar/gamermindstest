<?php
$faq_locker_video_section_title = get_field('faq_locker_video_section_title');
$faq_locker_video_section_description = get_field('faq_locker_video_section_description');
$faq_locker_video_section_placeholder = get_field('faq_locker_video_section_placeholder');
$faq_locker_video_section_video = get_field('faq_locker_video_section_video');
$faq_locker_video_section_bg_color = sanitize_hex_color(get_field('faq_locker_video_section_background_color')) ?: 'rgba(43, 42, 41, 1)';
$faq_locker_video_section_text_color = sanitize_hex_color(get_field('faq_locker_video_section_text_color')) ?: '#f0f0f0';
$faq_locker_video_section_inline_style = sprintf(
    '--faq-locker-video-bg:%s;--faq-locker-video-text:%s;',
    esc_attr($faq_locker_video_section_bg_color),
    esc_attr($faq_locker_video_section_text_color)
);
?>

<section <?php echo get_block_wrapper_attributes(['class' => 'faq-locker-video-section ']); ?>
    style="<?php echo esc_attr($faq_locker_video_section_inline_style); ?>">
    <div class="faq-locker-video-section__layout">
        <div class="faq-locker-video-section__content">
            <?php if (!empty($faq_locker_video_section_title)): ?>
                <h2 class="faq-locker-video-section__title"><?php echo esc_html($faq_locker_video_section_title); ?></h2>
            <?php endif; ?>

            <?php if (!empty($faq_locker_video_section_description)): ?>
                <p class="faq-locker-video-section__description">
                    <?php echo esc_html($faq_locker_video_section_description); ?>
                </p>
            <?php endif; ?>

            <?php if (!empty($faq_locker_video_section_placeholder)): ?>
                <div class="faq-locker-video-section__search" role="search">
                    <input type="text" class="faq-locker-video-section__search-input js-faq-search-input"
                        data-suggestion-limit="3"
                        placeholder="<?php echo esc_attr($faq_locker_video_section_placeholder); ?>"
                        aria-label="<?php echo esc_attr__('Search your question', 'intervaults'); ?>" />
                    <span class="faq-locker-video-section__search-icon" aria-hidden="true">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/search-icon.svg'); ?>"
                            alt="" />
                    </span>
                    <div class="faq-locker-video-section__suggestions js-faq-search-suggestions" hidden></div>
                </div>
            <?php endif; ?>
        </div>

        <div class="faq-locker-video-section__media">
            <?php if (is_array($faq_locker_video_section_video) && !empty($faq_locker_video_section_video['url'])): ?>
                <video class="faq-locker-video-section__video js-faq-locker-video" autoplay muted loop playsinline
                    preload="metadata">
                    <source src="<?php echo esc_url($faq_locker_video_section_video['url']); ?>"
                        type="<?php echo esc_attr($faq_locker_video_section_video['mime_type'] ?? 'video/mp4'); ?>">
                </video>
            <?php endif; ?>
        </div>
    </div>
</section>
