<?php if (!defined('ABSPATH')) exit;
$title = isset($attributes['title']) ? sanitize_text_field($attributes['title']) : 'Gallery';
$images = isset($attributes['images']) ? (array)$attributes['images'] : [];
?>
<section class="gallery-grid-section">
    <div class="container">
        <h2><?php echo esc_html($title); ?></h2>
        <div class="gallery-grid">
            <?php foreach ($images as $image) :
                if (isset($image['url'])) :
            ?>
                <div class="gallery-item hover-scale">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>">
                </div>
            <?php endif; endforeach; ?>
        </div>
    </div>
</section>
<style>
.gallery-grid-section { padding: 4rem 1.5rem; }
.gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; }
.gallery-item { border-radius: var(--gm-radius-lg); overflow: hidden; aspect-ratio: 3/4; }
.gallery-item img { width: 100%; height: 100%; object-fit: cover; }
</style>
