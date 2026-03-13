<?php if (!defined('ABSPATH')) exit; ?>
<section class="success-stories-section">
    <div class="container">
        <h2>Success Stories</h2>
        <div class="stories-grid stagger-container">
            <div class="story-card stagger-item scroll-fade-in">
                <div class="story-header">
                    <span class="story-badge">SHIPPED</span>
                </div>
                <h3>Game Title</h3>
                <p class="story-genre">Genre</p>
                <div class="story-details">
                    <p><strong>Outcome:</strong> Localization shipped</p>
                    <p><strong>Languages:</strong> Multiple</p>
                    <p><strong>Impact:</strong> Sales increased</p>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.success-stories-section { padding: 4rem 1.5rem; background: linear-gradient(180deg, rgba(92, 126, 16, 0.05) 0%, transparent 100%); }
.stories-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-top: 2rem; }
.story-card { background: rgba(27, 40, 56, 0.8); border-top: 2px solid var(--gm-green); border-radius: var(--gm-radius-lg); padding: 1.5rem; transition: all var(--gm-transition-base); }
.story-card:hover { transform: translateY(-4px); }
.story-header { display: flex; gap: 0.5rem; margin-bottom: 1rem; }
.story-badge { background: var(--gm-green); color: white; padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 900; }
.story-card h3 { margin-bottom: 0.5rem; font-size: var(--gm-font-size-lg); }
.story-genre { color: var(--gm-blue); font-size: 0.875rem; margin-bottom: 1rem; }
.story-details { font-size: 0.875rem; color: var(--gm-text-muted); space-y: 0.5rem; }
.story-details p { margin-bottom: 0.5rem; }
</style>
