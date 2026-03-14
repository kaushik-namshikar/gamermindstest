<?php
/**
 * Block: gm/quote-form
 * Mirrors: Developers.tsx — Quote Form (id="quote")
 * Fields: Name, Studio, Email, Wordcount, Target Languages, Notes
 */
$a          = $attributes ?? [];
$heading    = isset( $a['heading'] )    ? $a['heading']    : 'REQUEST A QUOTE';
$subheading = isset( $a['subheading'] ) ? $a['subheading'] : 'Share wordcount, languages, and deadline';
$disclaimer = isset( $a['disclaimer'] ) ? $a['disclaimer'] : 'We reply within 1–2 business days. NDAs welcome.';
$nonce = wp_create_nonce( 'gm_quote_form' );
?>

<section class="gm-quote-form" id="quote">
    <div class="gm-quote-form__inner">

        <div class="gm-quote-form__heading gm-fade-in">
            <h2><?php echo esc_html( $heading ); ?></h2>
            <p><?php echo esc_html( $subheading ); ?></p>
        </div>

        <form class="gm-form gm-fade-in gm-fade-in--delay-1" id="gm-quote-form" novalidate>
            <?php wp_nonce_field( 'gm_quote_form', 'gm_nonce' ); ?>

            <div class="gm-form__row">
                <div class="gm-form__group">
                    <label class="gm-form__label" for="gm-field-name">Name</label>
                    <input class="gm-form__input" type="text" id="gm-field-name" name="name" required autocomplete="name">
                </div>
                <div class="gm-form__group">
                    <label class="gm-form__label" for="gm-field-studio">Studio</label>
                    <input class="gm-form__input" type="text" id="gm-field-studio" name="studio" required autocomplete="organization">
                </div>
            </div>

            <div class="gm-form__group">
                <label class="gm-form__label" for="gm-field-email">Email</label>
                <input class="gm-form__input" type="email" id="gm-field-email" name="email" required autocomplete="email">
            </div>

            <div class="gm-form__row">
                <div class="gm-form__group">
                    <label class="gm-form__label" for="gm-field-wordcount">Wordcount</label>
                    <input class="gm-form__input" type="text" id="gm-field-wordcount" name="wordcount">
                </div>
                <div class="gm-form__group">
                    <label class="gm-form__label" for="gm-field-languages">Target Languages</label>
                    <input class="gm-form__input" type="text" id="gm-field-languages" name="languages">
                </div>
            </div>

            <div class="gm-form__group">
                <label class="gm-form__label" for="gm-field-notes">Notes</label>
                <textarea class="gm-form__textarea" id="gm-field-notes" name="notes" rows="4"></textarea>
            </div>

            <div class="gm-form__success" id="gm-form-success" role="alert" aria-live="polite"></div>
            <div class="gm-form__error"   id="gm-form-error"   role="alert" aria-live="polite"></div>

            <button type="submit" class="gm-btn gm-btn--primary gm-form__submit-btn" id="gm-form-submit">
                SEND REQUEST
            </button>

            <p class="gm-form__disclaimer">
                <?php echo esc_html( $disclaimer ); ?>
            </p>
        </form>
    </div>
</section>
