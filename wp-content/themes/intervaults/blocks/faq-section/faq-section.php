<?php
$fsb_title = get_field('fsb_title');
$fsb_video = get_field('fsb_video');
$fsb_button = get_field('fsb_button');
?>

<section class="faq">
    <div class="faq__container">

        <!-- RIGHT CONTENT -->
        <div class="faq__content">
            <?php if ($fsb_title): ?>
                <h3 class="faq__title">
                    <?php echo $fsb_title; ?>
                </h3>
            <?php endif; ?>

            <div class="faq__accordion">
                <?php
                if (have_rows('fsb_qa_repeater')):
                    while (have_rows('fsb_qa_repeater')):
                        the_row();
                        $fsb_question = get_sub_field('fsb_question');
                        $fsb_answer = get_sub_field('fsb_answer');
                        ?>
                        <div class="faq__item">
                            <div class="faq__header">
                                <?php if ($fsb_question): ?>
                                    <h4>
                                        <?php echo $fsb_question; ?>
                                    </h4>
                                <?php endif; ?>
                                <span class="faq__icon"><img
                                        src="<?php echo get_template_directory_uri() ?>/assets/images/plus-icon.svg"></span>
                            </div>
                            <div class="faq__body">
                                <div class="faq__body-inner">
                                    <?php if ($fsb_answer): ?>
                                        <p>
                                            <?php echo $fsb_answer; ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                endif;
                ?>
            </div>

            <?php if ($fsb_button): ?>
                <a href="<?php echo $fsb_button['url']; ?>" class="faq__btn">
                    <?php echo $fsb_button['title']; ?>
                </a>
            <?php endif; ?>
        </div>
        <!-- LEFT IMAGE -->
        <div class="faq__image">
            <!--<img
            src="./images/Screenshot 2026-02-03 162217.png"
            alt="Vault Lockers"
          />-->
            <?php if ($fsb_video): ?>
                <video src="<?php echo esc_url($fsb_video['url']); ?>" autoplay muted loop playsinline></video>
            <?php endif; ?>
        </div>


    </div>
</section>