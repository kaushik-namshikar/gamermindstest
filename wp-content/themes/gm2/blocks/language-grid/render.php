<?php if (!defined('ABSPATH')) exit;
$title = isset($attributes['title']) ? sanitize_text_field($attributes['title']) : 'Languages';
$languages = isset($attributes['languages']) ? (array)$attributes['languages'] : [];
?>
<section class="language-grid-section">
    <div class="container">
        <h2><?php echo esc_html($title); ?></h2>
        <div class="language-tags">
            <?php foreach ($languages as $lang) : ?>
                <span class="language-tag hover-scale"><?php echo esc_html($lang); ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<style>
.language-grid-section { padding: 4rem 1.5rem; text-align: center; }
.language-tags { display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; margin-top: 2rem; }
.language-tag {
    background: rgba(168, 85, 247, 0.1);
    border: 1px solid rgba(168, 85, 247, 0.3);
    color: var(--gm-text-secondary);
    padding: 0.75rem 1.5rem;
    border-radius: 9999px;
    font-size: var(--gm-font-size-sm);
    font-weight: var(--gm-font-weight-bold);
    transition: all var(--gm-transition-base);
}
.language-tag:hover { background: rgba(168, 85, 247, 0.3); border-color: rgba(168, 85, 247, 0.5); }
</style>
