<?php if (!defined('ABSPATH')) exit; ?>
<section class="regions-section">
    <div class="container">
        <h2>Regions We Focus On</h2>
        <div class="regions-grid">
            <div class="region-card scroll-fade-in">
                <h3>Latin America</h3>
                <p><strong>Languages:</strong> PT-BR, ES-LATAM</p>
                <p><strong>Players:</strong> 120M+</p>
            </div>
            <div class="region-card scroll-fade-in">
                <h3>Southeast Asia</h3>
                <p><strong>Languages:</strong> TH, VI, ID, MS</p>
                <p><strong>Players:</strong> 95M+</p>
            </div>
            <div class="region-card scroll-fade-in">
                <h3>Eastern Europe</h3>
                <p><strong>Languages:</strong> PL, RU, CZ, RO</p>
                <p><strong>Players:</strong> 85M+</p>
            </div>
            <div class="region-card scroll-fade-in">
                <h3>Middle East</h3>
                <p><strong>Languages:</strong> AR, TR, FA</p>
                <p><strong>Players:</strong> 70M+</p>
            </div>
        </div>
    </div>
</section>
<style>
.regions-section { padding: 4rem 1.5rem; }
.regions-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; margin-top: 2rem; }
.region-card { background: rgba(27, 40, 56, 0.8); border: 1px solid rgba(99, 102, 241, 0.2); border-radius: var(--gm-radius-lg); padding: 1.5rem; }
.region-card h3 { margin-bottom: 1rem; }
.region-card p { font-size: 0.875rem; color: var(--gm-text-muted); margin-bottom: 0.5rem; }
</style>
