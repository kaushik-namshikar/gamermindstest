<?php if (!defined('ABSPATH')) exit; ?>
<div class="split-cards-container">
    <div class="split-card blue-side"><h2>Developers</h2></div>
    <div class="split-card orange-side"><h2>Players</h2></div>
</div>
<style>
.split-cards-container { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
.split-card { padding: 2rem; border-radius: var(--gm-radius-lg); }
.blue-side { background: rgba(59, 130, 246, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); }
.orange-side { background: rgba(249, 115, 22, 0.1); border: 1px solid rgba(249, 115, 22, 0.3); }
@media (max-width: 768px) { .split-cards-container { grid-template-columns: 1fr; } }
</style>
