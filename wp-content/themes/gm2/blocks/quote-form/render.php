<?php if (!defined('ABSPATH')) exit; ?>
<section class="quote-form-section">
    <div class="container" style="max-width: 700px;">
        <h2>Request a Quote</h2>
        <form class="quote-form" data-form-handler="true">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="studio">Studio</label>
                <input type="text" id="studio" name="studio">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="wordcount">Wordcount</label>
                <input type="number" id="wordcount" name="wordcount">
            </div>
            <div class="form-group">
                <label for="languages">Target Languages</label>
                <input type="text" id="languages" name="languages">
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn--primary" style="width: 100%;">SEND REQUEST</button>
            <p style="font-size: 0.875rem; color: var(--gm-text-muted); text-align: center; margin-top: 1rem;">
                We reply within 1–2 business days. NDAs welcome.
            </p>
        </form>
    </div>
</section>
<style>
.quote-form-section { padding: 4rem 1.5rem; }
.quote-form { display: flex; flex-direction: column; gap: 1.5rem; }
.form-group { display: flex; flex-direction: column; gap: 0.5rem; }
.form-group label { font-weight: var(--gm-font-weight-bold); }
.form-group input,
.form-group textarea {
    background: rgba(27, 40, 56, 0.5);
    border: 1px solid rgba(168, 85, 247, 0.2);
    border-radius: var(--gm-radius-md);
    color: var(--gm-text-primary);
    padding: 0.75rem 1rem;
    font-family: inherit;
    transition: all var(--gm-transition-base);
}
.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: var(--gm-purple);
    background: rgba(27, 40, 56, 0.8);
    box-shadow: 0 0 10px rgba(168, 85, 247, 0.2);
}
</style>
