/**
 * Gamer Minds Theme - Main JavaScript
 * 
 * Core functionality and event handlers
 */

(function() {
  'use strict';

  // Mobile menu toggle
  const menuToggle = document.querySelector('.menu-toggle');
  const menuContainer = document.querySelector('.menu-container');

  if (menuToggle && menuContainer) {
    menuToggle.addEventListener('click', function() {
      menuContainer.classList.toggle('menu-open');
      menuToggle.classList.toggle('menu-open');
      document.body.classList.toggle('menu-open');
    });

    // Close menu on link click
    const menuLinks = menuContainer.querySelectorAll('a');
    menuLinks.forEach(link => {
      link.addEventListener('click', function() {
        menuContainer.classList.remove('menu-open');
        menuToggle.classList.remove('menu-open');
        document.body.classList.remove('menu-open');
      });
    });
  }

  // Smooth scroll anchors
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href !== '#' && document.querySelector(href)) {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    });
  });

  // Add scroll listener for sticky header
  const header = document.querySelector('.site-header');
  if (header) {
    let lastScroll = 0;
    window.addEventListener('scroll', function() {
      const currentScroll = window.pageYOffset;
      
      if (currentScroll > 100) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
      
      lastScroll = currentScroll;
    }, { passive: true });
  }

  // Form handling
  const forms = document.querySelectorAll('form[data-form-handler]');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(form);
      const action = form.getAttribute('action') || '/wp-json/gamer-minds/v1/contact';
      
      fetch(action, {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          form.reset();
          alert('Message sent successfully!');
        } else {
          alert('Error sending message. Please try again.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('Error sending message. Please try again.');
      });
    });
  });

  // Lazy load images
  if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const img = entry.target;
          if (img.dataset.src) {
            img.src = img.dataset.src;
            img.removeAttribute('data-src');
          }
          observer.unobserve(img);
        }
      });
    });

    document.querySelectorAll('img[data-src]').forEach(img => imageObserver.observe(img));
  }

})();
