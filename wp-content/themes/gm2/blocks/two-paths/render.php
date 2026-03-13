<?php if (!defined('ABSPATH')) exit; ?>
<section class="two-paths-container">
    <a href="/developers" class="path-side path-developer">
        <div class="path-content">
            <h2>DEVELOPER</h2>
            <p>Professional Localization</p>
        </div>
    </a>
    <a href="/players" class="path-side path-player">
        <div class="path-content">
            <h2>PLAYER</h2>
            <p>Vote for Localizations</p>
        </div>
    </a>
</section>
<style>
.two-paths-container { display: flex; min-height: 100vh; }
.path-side { flex: 1; display: flex; align-items: center; justify-content: center; overflow: hidden; position: relative; text-decoration: none; }
.path-developer { background: linear-gradient(135deg, #1b2838 0%, #0f1419 100%); color: var(--gm-purple); border-right: 1px solid rgba(168, 85, 247, 0.2); }
.path-player { background: linear-gradient(135deg, #0f1419 0%, #1b2838 100%); color: var(--gm-orange); border-left: 1px solid rgba(249, 115, 22, 0.2); }
.path-content { text-align: center; }
.path-content h2 { font-size: 3rem; margin-bottom: 0.5rem; }
.path-content p { font-size: 1.125rem; }
@media (max-width: 768px) {
    .two-paths-container { flex-direction: column; min-height: auto; }
    .path-side { min-height: 50vh; }
}
</style>
