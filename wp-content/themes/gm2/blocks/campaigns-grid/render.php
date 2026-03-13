<?php if (!defined('ABSPATH')) exit; ?>
<section class="campaigns-section">
    <div class="container">
        <h2>Active Campaigns</h2>
        <div class="campaigns-grid">
            <!-- Campaign cards will be populated via attributes -->
            <div class="campaign-card scroll-fade-in">
                <div class="campaign-image"></div>
                <div class="campaign-content">
                    <h3>Campaign Title</h3>
                    <p class="campaign-genre">Genre</p>
                    <p class="campaign-dev">Developer</p>
                    <div class="campaign-vote"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.campaigns-section { padding: 4rem 1.5rem; }
.campaigns-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 2rem; }
.campaign-card { background: rgba(27, 40, 56, 0.8); border: 1px solid rgba(99, 102, 241, 0.2); border-radius: var(--gm-radius-lg); overflow: hidden; transition: all var(--gm-transition-base); }
.campaign-card:hover { transform: translateY(-8px); border-color: rgba(99, 102, 241, 0.4); }
.campaign-image { width: 100%; height: 200px; background: linear-gradient(135deg, var(--gm-blue), var(--gm-cyan)); }
.campaign-content { padding: 1.5rem; }
.campaign-content h3 { margin-bottom: 0.5rem; }
.campaign-genre { color: var(--gm-blue); font-size: 0.875rem; }
.campaign-dev { color: var(--gm-text-muted); font-size: 0.875rem; }
.campaign-vote { margin-top: 1rem; padding-top: 1rem; border-top: 1px solid rgba(255, 255, 255, 0.1); }
</style>
