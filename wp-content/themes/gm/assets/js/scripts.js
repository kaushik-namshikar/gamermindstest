(function () {
  const header = document.querySelector('.gm-header');
  const nav = document.querySelector('.gm-navigation');
  const hamburger = document.getElementById('gm-hamburger');

  if (hamburger && nav && header) {
    hamburger.addEventListener('click', function () {
      const expanded = this.getAttribute('aria-expanded') === 'true';
      this.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      nav.classList.toggle('gm-navigation--open');
      document.body.classList.toggle('gm-nav-open');
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && nav.classList.contains('gm-navigation--open')) {
        hamburger.setAttribute('aria-expanded', 'false');
        nav.classList.remove('gm-navigation--open');
        document.body.classList.remove('gm-nav-open');
      }
    });
  }

  if (header) {
    const onScroll = () => {
      if (window.scrollY > 12) {
        header.classList.add('gm-header--scrolled');
      } else {
        header.classList.remove('gm-header--scrolled');
      }
    };

    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // IntersectionObserver for fade-in elements
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('gm-fade-in--visible');
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.15,
      }
    );

    document.querySelectorAll('.gm-fade-in').forEach((el) => {
      observer.observe(el);
    });
  } else {
    // If IntersectionObserver is not supported, make everything visible.
    document.querySelectorAll('.gm-fade-in').forEach((el) => {
      el.classList.add('gm-fade-in--visible');
    });
  }
})();
