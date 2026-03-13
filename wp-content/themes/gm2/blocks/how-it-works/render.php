<?php if (!defined('ABSPATH')) exit;
$title = isset($attributes['title']) ? sanitize_text_field($attributes['title']) : 'How It Works';
$steps = isset($attributes['steps']) ? (array)$attributes['steps'] : [];
?>
<section class="how-it-works-section">
    <div class="container">
        <h2><?php echo esc_html($title); ?></h2>
        <div class="steps-grid">
            <?php foreach ($steps as $index => $step) : ?>
                <div class="step-card scroll-fade-in">
                    <div class="step-number"><?php echo $index + 1; ?></div>
                    <h3><?php echo esc_html($step['title'] ?? ''); ?></h3>
                    <p><?php echo esc_html($step['description'] ?? ''); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<style>
.how-it-works-section { padding: 4rem 1.5rem; }
.steps-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 2rem; }
.step-card { background: rgba(27, 40, 56, 0.5); border: 1px solid rgba(168, 85, 247, 0.2); border-radius: var(--gm-radius-lg); padding: 2rem; text-align: center; }
.step-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, var(--gm-purple), var(--gm-indigo));
    color: white;
    border-radius: 50%;
    font-weight: 900;
    font-size: 1.5rem;
    margin-bottom: 1rem;
}
.step-card h3 { margin-bottom: 0.5rem; }
.step-card p { color: var(--gm-text-muted); }
</style>
