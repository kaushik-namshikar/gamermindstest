<?php
$csb_title = get_field('csb_title');
?>

<section class="certifications side-padding">
    <!-- Certifications -->
    <div class="vault-certifications">
        <?php if ($csb_title): ?>
            <h3><?php echo $csb_title; ?></h3>
        <?php endif; ?>
        <div class="vault-logos">
            <?php
            if (have_rows('csb_logo_repeater')):
                while (have_rows('csb_logo_repeater')):
                    the_row();
                    $csb_image = get_sub_field('csb_logo_image');
                    ?>
                    <?php if ($csb_image): ?>
                        <img src="<?php echo esc_url($csb_image['url']); ?>" alt="" />
                    <?php endif; ?>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>