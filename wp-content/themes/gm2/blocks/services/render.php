<?php if ( ! defined( 'ABSPATH' ) ) exit; 

$title = isset( $attributes['title'] ) ? sanitize_text_field( $attributes['title'] ) : 'Our Services';
$subtitle = isset( $attributes['subtitle'] ) ? sanitize_text_field( $attributes['subtitle'] ) : '';
$services = isset( $attributes['services'] ) ? (array) $attributes['services'] : array(
    array( 'title' => 'Translation', 'description' => 'Native-speaking translators with gaming expertise', 'icon' => '🌍' ),
    array( 'title' => 'Editing', 'description' => 'Consistency, quality, and polish', 'icon' => '✓' ),
    array( 'title' => 'LQA', 'description' => 'In-context testing before launch', 'icon' => '⚙️' ),
    array( 'title' => 'Project Management', 'description' => 'Single point of contact', 'icon' => '📋' ),
);
?>

<section class="services-section">
    <div class="container">
        <div class="section-header text-center">
            <?php if ( $title ) : ?>
                <h2 class="section-title scroll-slide-in-up"><?php echo esc_html( $title ); ?></h2>
            <?php endif; ?>
            <?php if ( $subtitle ) : ?>
                <p class="section-subtitle"><?php echo esc_html( $subtitle ); ?></p>
            <?php endif; ?>
        </div>

        <div class="services-grid stagger-container">
            <?php foreach ( $services as $index => $service ) : ?>
                <div class="service-card stagger-item hover-lift">
                    <?php if ( isset( $service['icon'] ) ) : ?>
                        <div class="service-icon">
                            <?php echo isset( $service['icon'] ) ? wp_kses_post( $service['icon'] ) : ''; ?>
                        </div>
                    <?php endif; ?>
                    
                    <h3><?php echo esc_html( $service['title'] ?? '' ); ?></h3>
                    <p><?php echo esc_html( $service['description'] ?? '' ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.services-section {
    padding: 6rem 1.5rem;
    background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(168, 85, 247, 0.05) 100%);
}

.section-header {
    margin-bottom: 4rem;
}

.section-title {
    font-size: clamp(2rem, 6vw, 3.5rem);
}

.section-subtitle {
    font-size: var(--gm-font-size-lg);
    color: var(--gm-text-muted);
    max-width: 600px;
    margin: 1rem auto 0;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 2rem;
}

.service-card {
    background: rgba(27, 40, 56, 0.5);
    border: 1px solid rgba(168, 85, 247, 0.2);
    border-radius: var(--gm-radius-xl);
    padding: 2.5rem 2rem;
    text-align: center;
    transition: all var(--gm-transition-base);
}

.service-card:hover {
    background: rgba(27, 40, 56, 0.8);
    border-color: rgba(168, 85, 247, 0.4);
    box-shadow: 0 0 20px rgba(168, 85, 247, 0.2);
}

.service-icon {
    font-size: 3.5rem;
    margin-bottom: 1.5rem;
}

.service-card h3 {
    font-size: var(--gm-font-size-xl);
    margin-bottom: 1rem;
}

.service-card p {
    color: var(--gm-text-muted);
    font-size: var(--gm-font-size-sm);
}

@media (max-width: 768px) {
    .services-section {
        padding: 3rem 1rem;
    }
    
    .services-grid {
        grid-template-columns: 1fr;
    }
}
</style>
