<section class="scrolling-ticker">
    <!-- Scrolling ticker -->
    <div class="hero__ticker">
        <div class="hero__ticker-track">
            <?php
            $ticker_items = array();

            if (have_rows('ticker_section_repeater_text')):
                while (have_rows('ticker_section_repeater_text')):
                    the_row();
                    $ticker_items[] = get_sub_field('ticker_section_text');
                endwhile;
            endif;

            if (!empty($ticker_items)):
                $loop_group_count = 2;
                for ($group_index = 0; $group_index < $loop_group_count; $group_index++):
                    ?>
                    <div class="hero__ticker-group"<?php echo $group_index > 0 ? ' aria-hidden="true"' : ''; ?>>
                        <?php foreach ($ticker_items as $ts_text): ?>
                            <div class="hero__ticker-item">
                                <?php echo esc_html($ts_text); ?>
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/ticker-svg-icon.svg"
                                    alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php
                endfor;
            endif;
            ?>
        </div>
    </div>
</section>
