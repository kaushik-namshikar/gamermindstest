/**
 * Gamer Minds — main.js
 * Handles: sticky header, mobile menu, animations, accordion, quote form, landing modal
 */

(function () {
  'use strict';

  // ──────────────────────────────────────────
  // 1. STICKY HEADER
  // ──────────────────────────────────────────
  const header = document.getElementById('gm-header');
  if (header) {
    const syncScroll = () => {
      header.classList.toggle('is-scrolled', window.scrollY > 10);
    };
    syncScroll();
    window.addEventListener('scroll', syncScroll, { passive: true });
  }

  // ──────────────────────────────────────────
  // 2. MOBILE MENU TOGGLE
  // ──────────────────────────────────────────
  const mobileToggle = document.querySelector('.gm-header__mobile-toggle');
  const mobileMenu   = document.getElementById('gm-mobile-menu');

  if (mobileToggle && mobileMenu) {
    mobileToggle.addEventListener('click', () => {
      const isOpen = mobileMenu.hidden === false;
      mobileMenu.hidden = isOpen;
      mobileToggle.setAttribute('aria-expanded', String(!isOpen));
      mobileToggle.classList.toggle('is-open', !isOpen);
      document.body.classList.toggle('no-scroll', !isOpen);
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!header.contains(e.target) && !mobileMenu.hidden) {
        mobileMenu.hidden = true;
        mobileToggle.setAttribute('aria-expanded', 'false');
        mobileToggle.classList.remove('is-open');
        document.body.classList.remove('no-scroll');
      }
    });
  }

  // ──────────────────────────────────────────
  // 3. INTERSECTION OBSERVER — FADE-IN
  // ──────────────────────────────────────────
  const fadeEls = document.querySelectorAll('.gm-fade-in');
  if (fadeEls.length && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    fadeEls.forEach((el) => observer.observe(el));
  } else {
    // Fallback: show all immediately
    fadeEls.forEach((el) => el.classList.add('is-visible'));
  }

  // ──────────────────────────────────────────
  // 4. FAQ ACCORDION
  // ──────────────────────────────────────────
  document.querySelectorAll('.gm-accordion__trigger').forEach((trigger) => {
    trigger.addEventListener('click', () => {
      const item = trigger.closest('.gm-accordion__item');
      if (!item) return;

      const isOpen = item.classList.contains('is-open');

      // Close all
      document.querySelectorAll('.gm-accordion__item.is-open').forEach((openItem) => {
        openItem.classList.remove('is-open');
        openItem.querySelector('.gm-accordion__trigger').setAttribute('aria-expanded', 'false');
      });

      // Open clicked (if it was closed)
      if (!isOpen) {
        item.classList.add('is-open');
        trigger.setAttribute('aria-expanded', 'true');
      }
    });
  });

  // Open first FAQ item by default
  const firstFaqItem = document.querySelector('.gm-accordion__item');
  if (firstFaqItem) {
    firstFaqItem.classList.add('is-open');
    const t = firstFaqItem.querySelector('.gm-accordion__trigger');
    if (t) t.setAttribute('aria-expanded', 'true');
  }

  // ──────────────────────────────────────────
  // 5. LANDING — LEARN MORE MODAL
  // ──────────────────────────────────────────
  const learnMoreBtn    = document.getElementById('gm-learn-more');
  const modalBackdrop   = document.getElementById('gm-modal-backdrop');
  const modalCloseBtn   = document.getElementById('gm-modal-close');

  function openModal() {
    if (!modalBackdrop) return;
    modalBackdrop.classList.add('is-open');
    document.body.classList.add('no-scroll');
    modalBackdrop.removeAttribute('hidden');
  }
  function closeModal() {
    if (!modalBackdrop) return;
    modalBackdrop.classList.remove('is-open');
    document.body.classList.remove('no-scroll');
    setTimeout(() => { modalBackdrop.setAttribute('hidden', ''); }, 300);
  }

  if (learnMoreBtn) learnMoreBtn.addEventListener('click', openModal);
  if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeModal);
  if (modalBackdrop) {
    modalBackdrop.addEventListener('click', (e) => {
      if (e.target === modalBackdrop) closeModal();
    });
  }
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modalBackdrop && !modalBackdrop.hidden) closeModal();
  });

  // ──────────────────────────────────────────
  // 6. QUOTE FORM — AJAX SUBMIT
  // ──────────────────────────────────────────
  const quoteForm    = document.getElementById('gm-quote-form');
  const formSuccess  = document.getElementById('gm-form-success');
  const formError    = document.getElementById('gm-form-error');
  const submitBtn    = document.getElementById('gm-form-submit');

  if (quoteForm && typeof gmAjax !== 'undefined') {
    quoteForm.addEventListener('submit', async (e) => {
      e.preventDefault();

      if (formSuccess) formSuccess.style.display = 'none';
      if (formError)   formError.style.display   = 'none';
      if (submitBtn)   { submitBtn.disabled = true; submitBtn.textContent = 'Sending…'; }

      const formData = new FormData(quoteForm);
      formData.append('action', 'gm_quote_form');
      formData.append('nonce', gmAjax.nonce);

      try {
        const res  = await fetch(gmAjax.ajaxUrl, { method: 'POST', body: formData });
        const data = await res.json();

        if (data.success) {
          quoteForm.reset();
          if (formSuccess) { formSuccess.textContent = data.data.message; formSuccess.style.display = 'block'; }
        } else {
          if (formError) { formError.textContent = data.data.message; formError.style.display = 'block'; }
        }
      } catch {
        if (formError) { formError.textContent = 'Connection error. Please try again.'; formError.style.display = 'block'; }
      } finally {
        if (submitBtn) { submitBtn.disabled = false; submitBtn.textContent = 'Send Request'; }
      }
    });
  }

  // ──────────────────────────────────────────
  // 7. LANDING — HALF HOVER EXPAND (pointer move)
  // ──────────────────────────────────────────
  const landingHalves = document.querySelectorAll('.gm-landing__half');
  landingHalves.forEach((half) => {
    half.addEventListener('mouseenter', () => {
      landingHalves.forEach((h) => h.classList.remove('is-hovered'));
      half.classList.add('is-hovered');
    });
    half.addEventListener('mouseleave', () => {
      half.classList.remove('is-hovered');
    });
  });

  // ──────────────────────────────────────────
  // 8. SMOOTH SCROLL FOR ANCHOR LINKS
  // ──────────────────────────────────────────
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', (e) => {
      const target = document.querySelector(anchor.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      const offset = 80; // header height
      const top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });

  // ──────────────────────────────────────────
  // 9. PROGRESS BAR ANIMATION (campaigns)
  // ──────────────────────────────────────────
  const progressBars = document.querySelectorAll('.gm-campaign-card__progress-fill');
  if (progressBars.length && 'IntersectionObserver' in window) {
    const progressObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const target = entry.target;
            const pct = target.dataset.pct || '0';
            target.style.width = pct + '%';
            progressObserver.unobserve(target);
          }
        });
      },
      { threshold: 0.5 }
    );
    progressBars.forEach((bar) => {
      bar.style.width = '0%';
      progressObserver.observe(bar);
    });
  }

})();
