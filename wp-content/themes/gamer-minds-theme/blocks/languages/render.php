<?php
/**
 * Block: gm/languages
 * Mirrors: Developers.tsx — Languages Section (12 badge flex-wrap tags)
 * Exact order and names from React source
 */
$a = $attributes ?? [];
$section_heading = isset( $a['heading'] ) ? $a['heading'] : 'LANGUAGES';
$raw_list = isset( $a['languageList'] ) ? $a['languageList'] : 'Chinese (Simplified), Chinese (Traditional), French, German, Italian, Japanese, Korean, Polish, Portuguese (Brazil), Spanish (Spain), Spanish (LATAM), Turkish';
$languages = array_filter( array_map( 'trim', explode( ',', $raw_list ) ) );
?>

<section class="gm-languages" id="languages">

    <div class="gm-languages__heading gm-fade-in">
        <h2><?php echo esc_html( $section_heading ); ?></h2>
    </div>

    <div class="gm-languages__grid">
        <?php foreach ( $languages as $i => $lang ) : ?>
            <span class="gm-languages__tag gm-fade-in gm-fade-in--delay-<?php echo min( $i + 1, 5 ); ?>"><?php echo esc_html( $lang ); ?></span>
        <?php endforeach; ?>
    </div>

</section>
