/**
 * Gamer Minds Theme - Animations with IntersectionObserver
 * 
 * Scroll-triggered animations using intersection observer
 * Replaces Framer Motion with CSS/JS animations
 */

(function() {
  'use strict';

  // Configuration
  const ANIMATION_CONFIG = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  // Observer for scroll animations
  if ('IntersectionObserver' in window) {
    const animationObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Trigger in-view animation
          entry.target.classList.add('in-view');
          
          // Optional: stop observing after animation completes
          if (entry.target.classList.contains('animate-once')) {
            animationObserver.unobserve(entry.target);
          }
        } else if (!entry.target.classList.contains('animate-once')) {
          // Reset for re-trigger if not animate-once
          entry.target.classList.remove('in-view');
        }
      });
    }, ANIMATION_CONFIG);

    // Observe all scroll trigger elements
    const scrollElements = document.querySelectorAll(
      '.scroll-fade-in, .scroll-slide-in-left, .scroll-slide-in-right, .scroll-scale-in, [data-scroll-animate]'
    );
    
    scrollElements.forEach(element => {
      animationObserver.observe(element);
    });
  }

  // Stagger animations for lists and grids
  function setupStaggerAnimations() {
    const staggerContainers = document.querySelectorAll('.stagger-container');
    
    staggerContainers.forEach(container => {
      const items = container.querySelectorAll('.stagger-item');
      items.forEach((item, index) => {
        item.style.setProperty('--stagger-delay', index * 100);
      });
    });
  }

  // Parallax effect for hero sections
  function setupParallax() {
    const parallaxElements = document.querySelectorAll('[data-parallax]');
    
    if (parallaxElements.length > 0) {
      window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        
        parallaxElements.forEach(element => {
          const speed = element.dataset.parallax || 0.5;
          element.style.transform = `translateY(${scrolled * speed}px)`;
        });
      }, { passive: true });
    }
  }

  // CountUp animation for numbers
  function animateCounters() {
    const counters = document.querySelectorAll('[data-count]');
    
    const counterObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
          const target = parseInt(entry.target.dataset.count);
          const duration = parseInt(entry.target.dataset.duration) || 2000;
          const increment = target / (duration / 16);
          let current = 0;

          const counter = setInterval(() => {
            current += increment;
            if (current >= target) {
              entry.target.textContent = target.toLocaleString();
              clearInterval(counter);
              entry.target.classList.add('counted');
            } else {
              entry.target.textContent = Math.floor(current).toLocaleString();
            }
          }, 16);

          counterObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    counters.forEach(counter => counterObserver.observe(counter));
  }

  // Hover lift effect for cards
  function setupCardHover() {
    const cards = document.querySelectorAll('.card, [data-hoverable]');
    
    cards.forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-8px)';
        this.style.boxShadow = 'var(--gm-shadow-lg)';
      });

      card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
        this.style.boxShadow = '';
      });
    });
  }

  // Smooth number increment for stats/metrics
  function smoothIncrement(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        element.textContent = target;
        clearInterval(timer);
      } else {
        element.textContent = Math.floor(current);
      }
    }, 16);
  }

  // Typing animation for text
  function setupTypingAnimation(element, text, speed = 50) {
    let index = 0;
    element.textContent = '';

    const type = () => {
      if (index < text.length) {
        element.textContent += text.charAt(index);
        index++;
        setTimeout(type, speed);
      }
    };

    type();
  }

  // Setup background gradient animation (for cards, buttons, etc.)
  function setupGradientAnimations() {
    const gradientElements = document.querySelectorAll('.gradient-animate');
    
    gradientElements.forEach(element => {
      const bgSize = element.style.backgroundSize || '200% 200%';
      element.style.backgroundSize = bgSize;
    });
  }

  // Initialize all animations
  function init() {
    setupStaggerAnimations();
    setupParallax();
    animateCounters();
    setupCardHover();
    setupGradientAnimations();
  }

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

  // Expose functions to global scope for use in blocks
  window.GamerMindsAnimations = {
    smoothIncrement,
    setupTypingAnimation,
    animateCounters
  };

})();
