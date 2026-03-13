<?php if ( ! defined( 'ABSPATH' ) ) exit;

$title = isset( $attributes['title'] ) ? sanitize_text_field( $attributes['title'] ) : 'Frequently Asked Questions';
$faqs = isset( $attributes['faqs'] ) ? (array) $attributes['faqs'] : array();
?>

<section class="faq-section">
    <div class="container" style="max-width: 800px;">
        <?php if ( $title ) : ?>
            <h2 class="faq-title"><?php echo esc_html( $title ); ?></h2>
        <?php endif; ?>

        <div class="faq-accordion" role="region" aria-label="FAQs">
            <?php foreach ( $faqs as $index => $faq ) :
                $faq_id = 'faq-' . $index;
                $button_id = 'faq-button-' . $index;
                $panel_id = 'faq-panel-' . $index;
            ?>
                <div class="faq-item">
                    <button 
                        id="<?php echo esc_attr( $button_id ); ?>"
                        class="faq-trigger"
                        aria-expanded="false"
                        aria-controls="<?php echo esc_attr( $panel_id ); ?>"
                    >
                        <span class="faq-question">
                            <?php echo esc_html( $faq['question'] ?? '' ); ?>
                        </span>
                        <span class="faq-icon" aria-hidden="true">+</span>
                    </button>
                    
                    <div 
                        id="<?php echo esc_attr( $panel_id ); ?>"
                        class="faq-panel"
                        role="region"
                        aria-labelledby="<?php echo esc_attr( $button_id ); ?>"
                        hidden
                    >
                        <div class="faq-answer">
                            <?php echo wp_kses_post( $faq['answer'] ?? '' ); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
.faq-section {
    padding: 4rem 1.5rem;
    background: rgba(0, 0, 0, 0.5);
}

.faq-title {
    text-align: center;
    margin-bottom: 3rem;
}

.faq-accordion {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.faq-item {
    border: 1px solid rgba(168, 85, 247, 0.2);
    border-radius: var(--gm-radius-lg);
    overflow: hidden;
}

.faq-trigger {
    width: 100%;
    padding: 1.5rem;
    background: rgba(27, 40, 56, 0.5);
    border: none;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    color: var(--gm-text-primary);
    font-weight: var(--gm-font-weight-bold);
    font-size: var(--gm-font-size-base);
    transition: all var(--gm-transition-base);
}

.faq-trigger:hover {
    background: rgba(27, 40, 56, 0.8);
}

.faq-trigger[aria-expanded="true"] {
    background: rgba(168, 85, 247, 0.1);
    border-bottom: 1px solid rgba(168, 85, 247, 0.3);
}

.faq-icon {
    flex-shrink: 0;
    font-size: 1.5rem;
    transition: transform var(--gm-transition-base);
    color: var(--gm-purple);
}

.faq-trigger[aria-expanded="true"] .faq-icon {
    transform: rotate(45deg);
}

.faq-panel {
    max-height: 0;
    overflow: hidden;
    transition: max-height var(--gm-transition-base);
}

.faq-panel[aria-hidden="false"] {
    max-height: 500px;
}

.faq-answer {
    padding: 1.5rem;
    color: var(--gm-text-secondary);
    line-height: var(--gm-line-height-relaxed);
}

@media (max-width: 768px) {
    .faq-section {
        padding: 2rem 1rem;
    }
    
    .faq-trigger {
        padding: 1rem;
        font-size: var(--gm-font-size-sm);
    }
}
</style>

<script>
(function() {
    const triggers = document.querySelectorAll('.faq-trigger');
    
    triggers.forEach(trigger => {
        trigger.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            const panelId = this.getAttribute('aria-controls');
            const panel = document.getElementById(panelId);
            
            // Close other items
            triggers.forEach(t => {
                if (t !== this) {
                    t.setAttribute('aria-expanded', 'false');
                    const otherPanel = document.getElementById(t.getAttribute('aria-controls'));
                    if (otherPanel) {
                        otherPanel.setAttribute('aria-hidden', 'true');
                    }
                }
            });
            
            // Toggle current item
            this.setAttribute('aria-expanded', !isExpanded);
            if (panel) {
                panel.setAttribute('aria-hidden', isExpanded);
            }
        });
    });
})();
</script>
