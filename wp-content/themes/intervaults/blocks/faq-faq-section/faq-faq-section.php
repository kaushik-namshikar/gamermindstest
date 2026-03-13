<?php
$faq_title = get_field('faq_faq_title');
$left_items = [];
$right_items = [];

if (have_rows('faq_faq_left_items')) {
    while (have_rows('faq_faq_left_items')) {
        the_row();
        $question = get_sub_field('faq_faq_question');
        $answer = get_sub_field('faq_faq_answer');

        if (!empty($question)) {
            $left_items[] = [
                'question' => $question,
                'answer' => $answer,
            ];
        }
    }
}

if (have_rows('faq_faq_right_items')) {
    while (have_rows('faq_faq_right_items')) {
        the_row();
        $question = get_sub_field('faq_faq_question');
        $answer = get_sub_field('faq_faq_answer');

        if (!empty($question)) {
            $right_items[] = [
                'question' => $question,
                'answer' => $answer,
            ];
        }
    }
}

if (empty($left_items) && empty($right_items) && have_rows('faq_faq_items')) {
    $legacy_items = [];

    while (have_rows('faq_faq_items')) {
        the_row();
        $question = get_sub_field('faq_faq_question');
        $answer = get_sub_field('faq_faq_answer');

        if (!empty($question)) {
            $legacy_items[] = [
                'question' => $question,
                'answer' => $answer,
            ];
        }
    }

    foreach ($legacy_items as $index => $item) {
        if ($index % 2 === 0) {
            $left_items[] = $item;
        } else {
            $right_items[] = $item;
        }
    }
}

$block_id_suffix = !empty($block['id']) ? sanitize_title($block['id']) : wp_unique_id('faq-faq-');
$has_faq_items = !empty($left_items) || !empty($right_items);
$open_first_right_item = !is_page(243);
?>

<section <?php echo get_block_wrapper_attributes(['class' => 'faq-section side-padding js-faq-section-target']); ?>>
    <div class="faq-section__container">
        <?php if ($faq_title): ?>
            <h4 class="faq-title"><?php echo esc_html($faq_title); ?></h4>
        <?php endif; ?>

        <?php if ($has_faq_items): ?>
            <div class="faq-section__columns js-faq-results">
                <div class="accordion faq-accordion faq-accordion--left"
                    id="faqAccordionLeft-<?php echo esc_attr($block_id_suffix); ?>">
                    <?php foreach ($left_items as $index => $item): ?>
                        <?php $collapse_id = 'faqLeftItem-' . $block_id_suffix . '-' . $index; ?>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button <?php echo $index !== 0 ? 'collapsed' : ''; ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                                    aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                    <span class="faq-question"><?php echo esc_html($item['question']); ?></span>
                                    <span class="faq-icon" aria-hidden="true">
                                        <img class="faq-icon-plus"
                                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/plus-icon-black.svg'); ?>"
                                            alt="">
                                        <img class="faq-icon-dash"
                                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/dash-icon.svg'); ?>"
                                            alt="">
                                    </span>
                                </button>
                            </h3>
                            <div id="<?php echo esc_attr($collapse_id); ?>"
                                class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>">
                                <div class="accordion-body">
                                    <?php echo wp_kses_post($item['answer']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="accordion faq-accordion faq-accordion--right"
                    id="faqAccordionRight-<?php echo esc_attr($block_id_suffix); ?>">
                    <?php foreach ($right_items as $index => $item): ?>
                        <?php $collapse_id = 'faqRightItem-' . $block_id_suffix . '-' . $index; ?>
                        <?php $is_right_item_open = $index === 0 && $open_first_right_item; ?>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button <?php echo !$is_right_item_open ? 'collapsed' : ''; ?>" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
                                    aria-expanded="<?php echo $is_right_item_open ? 'true' : 'false'; ?>">
                                    <span class="faq-question"><?php echo esc_html($item['question']); ?></span>
                                    <span class="faq-icon" aria-hidden="true">
                                        <img class="faq-icon-plus"
                                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/plus-icon-black.svg'); ?>"
                                            alt="">
                                        <img class="faq-icon-dash"
                                            src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/dash-icon.svg'); ?>"
                                            alt="">
                                    </span>
                                </button>
                            </h3>
                            <div id="<?php echo esc_attr($collapse_id); ?>"
                                class="accordion-collapse collapse <?php echo $is_right_item_open ? 'show' : ''; ?>">
                                <div class="accordion-body">
                                    <?php echo wp_kses_post($item['answer']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="faq-section__empty-state-wrap">
                <div class="faq-empty-state" role="status" aria-live="polite">
                    <p class="faq-empty-state__title"><?php echo esc_html__('No FAQs found.', 'intervaults'); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
