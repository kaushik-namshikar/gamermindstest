<?php if ( ! defined( 'ABSPATH' ) ) exit;

$sections = isset( $attributes['sections'] ) ? (array) $attributes['sections'] : array();
?>

<div class="content-sections">
    <div class="container" style="max-width: 900px;">
        <?php foreach ( $sections as $section ) : ?>
            <section class="content-block scroll-fade-in">
                <?php if ( isset( $section['heading'] ) && $section['heading'] ) : ?>
                    <h2 class="content-heading">
                        <?php echo esc_html( $section['heading'] ); ?>
                    </h2>
                <?php endif; ?>
                
                <?php if ( isset( $section['body'] ) && $section['body'] ) : ?>
                    <div class="content-body">
                        <?php echo wp_kses_post( $section['body'] ); ?>
                    </div>
                <?php endif; ?>
            </section>
        <?php endforeach; ?>
    </div>
</div>

<style>
.content-sections {
    padding: 4rem 1.5rem;
}

.content-block {
    margin-bottom: 3rem;
}

.content-block:last-child {
    margin-bottom: 0;
}

.content-heading {
    font-size: var(--gm-font-size-2xl);
    font-weight: 900;
    margin-bottom: 1.5rem;
    color: var(--gm-text-primary);
}

.content-body {
    font-size: var(--gm-font-size-base);
    line-height: var(--gm-line-height-relaxed);
    color: var(--gm-text-secondary);
}

.content-body p {
    margin-bottom: 1rem;
}

.content-body ul,
.content-body ol {
    margin-left: 2rem;
    margin-bottom: 1rem;
}

.content-body li {
    margin-bottom: 0.5rem;
}

.content-body strong {
    color: var(--gm-text-primary);
    font-weight: var(--gm-font-weight-bold);
}

.content-body a {
    color: var(--gm-blue);
}

.content-body a:hover {
    text-decoration: underline;
}
</style>
