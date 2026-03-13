<?php
/**
 * Locker Consultation Section Block.
 *
 * @package intervaults
 */

$heading = get_field('locker_consultation_section_heading');
$description = get_field('locker_consultation_section_description');
$locker_image = get_field('locker_consultation_section_locker_image');
$time_icon_url = trailingslashit(get_template_directory_uri()) . 'assets/images/time-field-icon.svg';
?>

<section class="locker-consultation-section">
    <div class="locker-consultation-section__container">
        <div class="locker-consultation-section__content">
            <?php if (!empty($heading)): ?>
                <h2 class="locker-consultation-section__title"><?php echo esc_html($heading); ?></h2>
            <?php endif; ?>

            <?php if (!empty($description)): ?>
                <p class="locker-consultation-section__description"><?php echo nl2br(esc_html($description)); ?></p>
            <?php endif; ?>

            <?php if (have_rows('locker_consultation_section_highlights')): ?>
                <ul class="locker-consultation-section__highlights">
                    <?php while (have_rows('locker_consultation_section_highlights')):
                        the_row(); ?>
                        <?php $highlight_text = get_sub_field('locker_consultation_section_highlight_text'); ?>
                        <?php if (!empty($highlight_text)): ?>
                            <li class="locker-consultation-section__highlight-item"><?php echo esc_html($highlight_text); ?></li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>

            <div class="locker-consultation-section__form">
                <?php
                if (class_exists('FrmFormsController')) {
                    echo FrmFormsController::get_form_shortcode(array('id' => 6));
                }
                ?>
            </div>
            <script>
                jQuery(function ($) {
                    var $section = $('.locker-consultation-section');
                    var timeIconUrl = '<?php echo esc_js($time_icon_url); ?>';
                    if (!$section.length) {
                        return;
                    }

                    /*
                     * Workaround for Formidable free:
                     * Add two Single Line Text fields in form ID 6 and set their field CSS classes to:
                     * - js-locker-date
                     * - js-locker-time
                     * This script upgrades those text inputs to native date/time inputs.
                     */
                    $section.each(function () {
                        var $scope = $(this);
                        var $dateInput = $scope.find('.js-locker-date input[type="text"], .js-locker-date input').first();
                        var $timeInput = $scope.find('.js-locker-time input[type="text"], .js-locker-time input').first();
                        var setupPickerInput = function ($input, pickerType, placeholderText) {
                            if (!$input.length) {
                                return;
                            }

                            $input.attr({
                                autocomplete: 'off',
                                step: pickerType === 'time' ? 60 : null
                            });

                            if (!$input.val()) {
                                $input.attr({
                                    type: 'text',
                                    inputmode: 'none',
                                    placeholder: placeholderText
                                });
                            } else {
                                $input.attr({
                                    type: pickerType,
                                    inputmode: 'numeric'
                                });
                            }

                            $input
                                .off('.lockerPicker')
                                .on('focus.lockerPicker click.lockerPicker', function () {
                                    var el = this;
                                    if (pickerType === 'time') {
                                        el.style.backgroundImage = 'none';
                                    }
                                    el.type = pickerType;
                                    el.inputMode = 'numeric';
                                    if (typeof el.showPicker === 'function') {
                                        el.showPicker();
                                    }
                                })
                                .on('blur.lockerPicker', function () {
                                    if (!this.value) {
                                        this.type = 'text';
                                        this.inputMode = 'none';
                                        this.placeholder = placeholderText;
                                    }
                                });
                        };

                        setupPickerInput($timeInput, 'time', 'Select time');
                        setupPickerInput($dateInput, 'date', 'Select');

                        if ($timeInput.length) {
                            var toggleTimeIcon = function () {
                                var isPlaceholderMode = $timeInput.attr('type') === 'text' && !$timeInput.val();
                                $timeInput.css('background-image', isPlaceholderMode ? 'url("' + timeIconUrl + '")' : 'none');
                            };

                            toggleTimeIcon();

                            $timeInput
                                .off('.lockerTimeIcon')
                                .on('focus.lockerTimeIcon click.lockerTimeIcon input.lockerTimeIcon change.lockerTimeIcon blur.lockerTimeIcon', function () {
                                    setTimeout(toggleTimeIcon, 0);
                                });
                        }
                    });
                });
            </script>
        </div>

        <?php if (!empty($locker_image) && is_array($locker_image) && !empty($locker_image['url'])): ?>
            <?php
            $image_alt = '';
            if (!empty($locker_image['alt'])) {
                $image_alt = $locker_image['alt'];
            } elseif (!empty($locker_image['title'])) {
                $image_alt = $locker_image['title'];
            }
            ?>
            <figure class="locker-consultation-section__media">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/locker-effect.png" class="locker-effect">
                <img class="locker-consultation-section__image" src="<?php echo esc_url($locker_image['url']); ?>"
                    alt="<?php echo esc_attr($image_alt); ?>" loading="lazy" decoding="async" />
            </figure>
        <?php endif; ?>
    </div>
</section>
