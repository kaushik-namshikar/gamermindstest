<?php if ( ! defined( 'ABSPATH' ) ) exit;

$heading = isset( $attributes['heading'] ) ? sanitize_text_field( $attributes['heading'] ) : 'Ready to get started?';
$description = isset( $attributes['description'] ) ? wp_kses_post( $attributes['description'] ) : '';
$button_text = isset( $attributes['buttonText'] ) ? sanitize_text_field( $attributes['buttonText'] ) : 'Get Started';
$button_url = isset( $attributes['buttonUrl'] ) ? esc_url( $attributes['buttonUrl'] ) : '#';
$bg_color = isset( $attributes['backgroundColor'] ) ? sanitize_text_field( $attributes['backgroundColor'] ) : 'purple';
?>

<section class="cta-section cta-bg-<?php echo esc_attr( $bg_color ); ?>">
    <div class="container">
        <div class="cta-content">
            <?php if ( $heading ) : ?>
                <h2 class="cta-heading">
                    <?php echo esc_html( $heading ); ?>
                </h2>
            <?php endif; ?>

            <?php if ( $description ) : ?>
                <p class="cta-description">
                    <?php echo $description; ?>
                </p>
            <?php endif; ?>

            <?php if ( $button_text ) : ?>
                <a href="<?php echo $button_url; ?>" class="btn btn--primary cta-button">
                    <?php echo esc_html( $button_text ); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.cta-section {
    padding: 4rem 1.5rem;
    text-align: center;
    background: linear-gradient(135deg, rgba(168, 85, 247, 0.1) 0%, rgba(99, 102, 241, 0.1) 100%);
    border: 1px solid rgba(168, 85, 247, 0.2);
    border-radius: var(--gm-radius-xl);
    margin: 0 1.5rem;
}

.cta-content {
    max-width: 600px;
    margin: 0 auto;
}

.cta-heading {
    font-size: clamp(1.5rem, 5vw, 2.5rem);
    margin-bottom: 1rem;
}

.cta-description {
    font-size: var(--gm-font-size-lg);
    color: var(--gm-text-secondary);
    margin-bottom: 2rem;
}

.cta-button {
    display: inline-block;
    padding: 1rem 2rem;
}

@media (max-width: 768px) {
    .cta-section {
        margin-left: 1rem;
        margin-right: 1rem;
    }
}
</style>
