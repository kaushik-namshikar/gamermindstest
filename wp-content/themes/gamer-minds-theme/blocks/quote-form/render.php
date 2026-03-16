<?php
/**
 * Block: gm/quote-form
 * Mirrors: Developers.tsx — Quote Form section EXACTLY (id="quote").
 * max-w-3xl | bg-purple-900/30 border-2 border-purple-400/40 rounded-3xl p-8
 * Fields: bg-purple-950/50 border-2 border-purple-400/30 rounded-xl
 */
$a          = $attributes ?? [];
$heading    = isset( $a['heading'] )    ? $a['heading']    : 'REQUEST A QUOTE';
$subheading = isset( $a['subheading'] ) ? $a['subheading'] : 'Share wordcount, languages, and deadline';
$submit_txt = isset( $a['submitText'] ) ? $a['submitText'] : 'SEND REQUEST';
$disclaimer = isset( $a['disclaimer'] ) ? $a['disclaimer'] : 'We reply within 1–2 business days. NDAs welcome.';

// Persist recipient email to a WP option so the AJAX handler (outside block context) can read it.
$to_email = isset( $a['toEmail'] ) ? sanitize_email( $a['toEmail'] ) : '';
if ( $to_email ) {
    update_option( 'gm_quote_to_email', $to_email );
}
?>
<section id="quote-form" style="padding:5rem 1.5rem;">
    <div style="max-width:48rem;margin:0 auto;">

        <div class="gm-fade-in" style="text-align:center;margin-bottom:3rem;">
            <h2 style="font-size:clamp(2.25rem,4vw,3rem);font-weight:900;color:#fff;margin:0 0 1rem;"><?php echo esc_html( $heading ); ?></h2>
            <p style="color:#d8b4fe;font-size:1.125rem;font-weight:700;margin:0;"><?php echo esc_html( $subheading ); ?></p>
        </div>

        <div class="gm-fade-in gm-fade-in--delay-1"
             style="background:rgba(88,28,135,0.3);backdrop-filter:blur(24px);-webkit-backdrop-filter:blur(24px);border:2px solid rgba(192,132,252,0.4);border-radius:1.5rem;padding:2rem;">

            <form id="gm-quote-form" novalidate style="display:flex;flex-direction:column;gap:1.5rem;">
                <?php wp_nonce_field( 'gm_quote_form', 'gm_nonce' ); ?>

                <!-- Name + Studio row -->
                <div class="gm-qf-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                    <div>
                        <label style="display:block;color:#e9d5ff;font-weight:700;font-size:0.9375rem;margin-bottom:0.5rem;" for="gm-name">Name</label>
                        <input id="gm-name" name="name" type="text" required autocomplete="name"
                               style="width:100%;background:rgba(59,7,100,0.5);border:2px solid rgba(192,132,252,0.3);border-radius:0.75rem;color:#fff;padding:0.625rem 0.875rem;font-size:0.9375rem;outline:none;box-sizing:border-box;transition:border-color 0.2s;"
                               onfocus="this.style.borderColor='rgba(192,132,252,0.7)';"
                               onblur="this.style.borderColor='rgba(192,132,252,0.3)';">
                    </div>
                    <div>
                        <label style="display:block;color:#e9d5ff;font-weight:700;font-size:0.9375rem;margin-bottom:0.5rem;" for="gm-studio">Studio</label>
                        <input id="gm-studio" name="studio" type="text" required autocomplete="organization"
                               style="width:100%;background:rgba(59,7,100,0.5);border:2px solid rgba(192,132,252,0.3);border-radius:0.75rem;color:#fff;padding:0.625rem 0.875rem;font-size:0.9375rem;outline:none;box-sizing:border-box;transition:border-color 0.2s;"
                               onfocus="this.style.borderColor='rgba(192,132,252,0.7)';"
                               onblur="this.style.borderColor='rgba(192,132,252,0.3)';">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label style="display:block;color:#e9d5ff;font-weight:700;font-size:0.9375rem;margin-bottom:0.5rem;" for="gm-email">Email</label>
                    <input id="gm-email" name="email" type="email" required autocomplete="email"
                           style="width:100%;background:rgba(59,7,100,0.5);border:2px solid rgba(192,132,252,0.3);border-radius:0.75rem;color:#fff;padding:0.625rem 0.875rem;font-size:0.9375rem;outline:none;box-sizing:border-box;transition:border-color 0.2s;"
                           onfocus="this.style.borderColor='rgba(192,132,252,0.7)';"
                           onblur="this.style.borderColor='rgba(192,132,252,0.3)';">
                </div>

                <!-- Wordcount + Languages row -->
                <div class="gm-qf-row" style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                    <div>
                        <label style="display:block;color:#e9d5ff;font-weight:700;font-size:0.9375rem;margin-bottom:0.5rem;" for="gm-wordcount">Wordcount</label>
                        <input id="gm-wordcount" name="wordcount" type="text"
                               style="width:100%;background:rgba(59,7,100,0.5);border:2px solid rgba(192,132,252,0.3);border-radius:0.75rem;color:#fff;padding:0.625rem 0.875rem;font-size:0.9375rem;outline:none;box-sizing:border-box;transition:border-color 0.2s;"
                               onfocus="this.style.borderColor='rgba(192,132,252,0.7)';"
                               onblur="this.style.borderColor='rgba(192,132,252,0.3)';">
                    </div>
                    <div>
                        <label style="display:block;color:#e9d5ff;font-weight:700;font-size:0.9375rem;margin-bottom:0.5rem;" for="gm-languages">Target Languages</label>
                        <input id="gm-languages" name="languages" type="text"
                               style="width:100%;background:rgba(59,7,100,0.5);border:2px solid rgba(192,132,252,0.3);border-radius:0.75rem;color:#fff;padding:0.625rem 0.875rem;font-size:0.9375rem;outline:none;box-sizing:border-box;transition:border-color 0.2s;"
                               onfocus="this.style.borderColor='rgba(192,132,252,0.7)';"
                               onblur="this.style.borderColor='rgba(192,132,252,0.3)';">
                    </div>
                </div>

                <!-- Notes -->
                <div>
                    <label style="display:block;color:#e9d5ff;font-weight:700;font-size:0.9375rem;margin-bottom:0.5rem;" for="gm-notes">Notes</label>
                    <textarea id="gm-notes" name="notes" rows="4"
                              style="width:100%;background:rgba(59,7,100,0.5);border:2px solid rgba(192,132,252,0.3);border-radius:0.75rem;color:#fff;padding:0.625rem 0.875rem;font-size:0.9375rem;outline:none;box-sizing:border-box;resize:vertical;transition:border-color 0.2s;font-family:inherit;"
                              onfocus="this.style.borderColor='rgba(192,132,252,0.7)';"
                              onblur="this.style.borderColor='rgba(192,132,252,0.3)';"></textarea>
                </div>

                <!-- Feedback messages -->
                <div id="gm-form-success" role="alert" aria-live="polite" style="display:none;background:rgba(92,126,16,0.2);border:1px solid #5c7e10;border-radius:0.5rem;padding:0.75rem 1rem;color:#d4edda;font-size:0.9375rem;"></div>
                <div id="gm-form-error"   role="alert" aria-live="polite" style="display:none;background:rgba(220,38,38,0.15);border:1px solid rgba(220,38,38,0.4);border-radius:0.5rem;padding:0.75rem 1rem;color:#fca5a5;font-size:0.9375rem;"></div>

                <!-- Submit button -->
                <button type="submit" id="gm-form-submit"
                        style="width:100%;background:linear-gradient(135deg,#9333ea,#6366f1);color:#fff;padding:1.5rem 2rem;border:none;border-radius:1rem;font-size:1.125rem;font-weight:900;letter-spacing:0.04em;cursor:pointer;box-shadow:0 8px 30px rgba(147,51,234,0.5);transition:all 0.2s ease;"
                        onmouseover="this.style.background='linear-gradient(135deg,#7e22ce,#4f46e5)';this.style.boxShadow='0 12px 40px rgba(147,51,234,0.7)';"
                        onmouseout="this.style.background='linear-gradient(135deg,#9333ea,#6366f1)';this.style.boxShadow='0 8px 30px rgba(147,51,234,0.5)';">
                    <?php echo esc_html( $submit_txt ); ?>
                </button>

                <p style="font-size:0.875rem;color:#c084fc;text-align:center;font-weight:600;margin:0;"><?php echo esc_html( $disclaimer ); ?></p>

            </form>
        </div>
    </div>
</section>
<style>
@media (max-width:640px) { .gm-qf-row { grid-template-columns:1fr !important; } }
/* Input placeholder color */
#gm-quote-form input::placeholder,
#gm-quote-form textarea::placeholder { color:rgba(216,180,254,0.35); }
</style>
