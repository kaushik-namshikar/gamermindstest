<?php
/**
 * Hero Block Render
 * 
 * @package gamer-minds-theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$eyebrow = isset( $attributes['eyebrow'] ) ? sanitize_text_field( $attributes['eyebrow'] ) : '';
$title = isset( $attributes['title'] ) ? sanitize_text_field( $attributes['title'] ) : 'Powerful Game Localization';
$subtitle = isset( $attributes['subtitle'] ) ? sanitize_text_field( $attributes['subtitle'] ) : '';
$content = isset( $attributes['content'] ) ? wp_kses_post( $attributes['content'] ) : '';
$button1_text = isset( $attributes['button1Text'] ) ? sanitize_text_field( $attributes['button1Text'] ) : '';
$button1_url = isset( $attributes['button1Url'] ) ? esc_url( $attributes['button1Url'] ) : '';
$button2_text = isset( $attributes['button2Text'] ) ? sanitize_text_field( $attributes['button2Text'] ) : '';
$button2_url = isset( $attributes['button2Url'] ) ? esc_url( $attributes['button2Url'] ) : '';
$bg_color = isset( $attributes['backgroundColor'] ) ? sanitize_text_field( $attributes['backgroundColor'] ) : 'dark-blue';
$show_gradient = isset( $attributes['gradientOverlay'] ) ? $attributes['gradientOverlay'] : true;
$show_image = isset( $attributes['showImage'] ) ? $attributes['showImage'] : true;
$image_url = isset( $attributes['imageUrl'] ) ? esc_url( $attributes['imageUrl'] ) : '';

$bg_class = 'bg-' . $bg_color;
?>

<section class="hero hero--main scroll-fade-in animate-once" style="--gm-bg-color: var(--gm-bg-card)">
    <?php if ( $show_gradient ) : ?>
        <div class="hero__gradient-overlay"></div>
    <?php endif; ?>

    <?php if ( $show_image && $image_url ) : ?>
        <div class="hero__image">
            <img src="<?php echo $image_url; ?>" alt="<?php echo esc_attr( $title ); ?>" class="hero__image-img">
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="hero__content">
            <?php if ( $eyebrow ) : ?>
                <div class="hero__eyebrow">
                    <?php echo esc_html( $eyebrow ); ?>
                </div>
            <?php endif; ?>

            <?php if ( $title ) : ?>
                <h1 class="hero__title">
                    <?php echo esc_html( $title ); ?>
                </h1>
            <?php endif; ?>

            <?php if ( $subtitle ) : ?>
                <p class="hero__subtitle">
                    <?php echo esc_html( $subtitle ); ?>
                </p>
            <?php endif; ?>

            <?php if ( $content ) : ?>
                <div class="hero__body">
                    <?php echo $content; ?>
                </div>
            <?php endif; ?>

            <?php if ( $button1_text || $button2_text ) : ?>
                <div class="hero__actions">
                    <?php if ( $button1_text ) : ?>
                        <a href="<?php echo $button1_url; ?>" class="btn btn--primary">
                            <?php echo esc_html( $button1_text ); ?>
                        </a>
                    <?php endif; ?>
                    
                    <?php if ( $button2_text ) : ?>
                        <a href="<?php echo $button2_url; ?>" class="btn btn--outline">
                            <?php echo esc_html( $button2_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.hero {
    position: relative;
    padding: 6rem 1.5rem;
    min-height: 600px;
    display: flex;
    align-items: center;
    overflow: hidden;
    background: linear-gradient(135deg, #1b2838 0%, #0f1419 100%);
}

.hero__gradient-overlay {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at center, rgba(168, 85, 247, 0.1) 0%, transparent 70%);
    pointer-events: none;
}

.hero__image {
    position: absolute;
    inset: 0;
    overflow: hidden;
    z-index: 0;
}

.hero__image-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.3;
}

.hero__content {
    position: relative;
    z-index: 2;
    max-width: 700px;
}

.hero__eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 9999px;
    background: rgba(168, 85, 247, 0.2);
    border: 1px solid rgba(168, 85, 247, 0.3);
    color: var(--gm-purple);
    font-size: var(--gm-font-size-sm);
    font-weight: var(--gm-font-weight-bold);
    margin-bottom: 1.5rem;
    text-transform: uppercase;
}

.hero__title {
    font-size: clamp(2rem, 8vw, 5rem);
    font-weight: 900;
    line-height: 1.1;
    color: var(--gm-text-primary);
    margin-bottom: 1rem;
}

.hero__subtitle {
    font-size: var(--gm-font-size-xl);
    color: var(--gm-text-secondary);
    margin-bottom: 2rem;
    line-height: var(--gm-line-height-relaxed);
}

.hero__body {
    font-size: var(--gm-font-size-lg);
    color: var(--gm-text-muted);
    margin-bottom: 2rem;
}

.hero__actions {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    align-items: center;
}

@media (max-width: 768px) {
    .hero {
        min-height: 400px;
        padding: 4rem 1rem;
    }
    
    .hero__title {
        font-size: clamp(1.5rem, 6vw, 3rem);
    }
    
    .hero__actions {
        flex-direction: column;
        width: 100%;
    }
    
    .hero__actions .btn {
        width: 100%;
    }
}
</style>
