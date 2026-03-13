<?php if (!defined('ABSPATH')) exit; ?>
<section class="trust-grid-section">
    <div class="container">
        <h2 class="text-center">Why Choose Us?</h2>
        <div class="trust-grid">
            <div class="trust-item scroll-fade-in">
                <h3>Professional Localization</h3>
                <p>Native-speaking translators with gaming expertise</p>
            </div>
            <div class="trust-item scroll-fade-in">
                <h3>Player Community</h3>
                <p>Access to players interested in localized titles</p>
            </div>
            <div class="trust-item scroll-fade-in">
                <h3>Proven Demand</h3>
                <p>Data showing real market demand in your region</p>
            </div>
        </div>
    </div>
</section>
<style>
.trust-grid-section { padding: 4rem 1.5rem; }
.text-center { text-align: center; }
.trust-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 2rem; }
.trust-item { background: rgba(168, 85, 247, 0.05); border: 1px solid rgba(168, 85, 247, 0.2); border-radius: var(--gm-radius-lg); padding: 2rem; text-align: center; }
.trust-item h3 { margin-bottom: 1rem; }
.trust-item p { color: var(--gm-text-muted); }
</style>
