<?php
/**
 * Block: gm/languages
 * Mirrors: Developers.tsx — Languages Section (12 badge flex-wrap tags)
 * Exact order and names from React source
 */
$languages = [
    'Chinese (Simplified)',
    'Chinese (Traditional)',
    'French',
    'German',
    'Italian',
    'Japanese',
    'Korean',
    'Polish',
    'Portuguese (Brazil)',
    'Spanish (Spain)',
    'Spanish (LATAM)',
    'Turkish',
];
?>

<section class="gm-languages" id="languages">

    <div class="gm-languages__heading gm-fade-in">
        <h2>LANGUAGES</h2>
    </div>

    <div class="gm-languages__grid">
        <?php foreach ( $languages as $i => $lang ) : ?>
            <span class="gm-languages__tag gm-fade-in gm-fade-in--delay-<?php echo min( $i + 1, 5 ); ?>"><?php echo esc_html( $lang ); ?></span>
        <?php endforeach; ?>
    </div>

</section>
