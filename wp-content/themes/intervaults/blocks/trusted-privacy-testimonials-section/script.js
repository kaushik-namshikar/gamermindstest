(function () {
  "use strict";

  const SELECTORS = {
    block: ".trusted-privacy-testimonials-section",
    viewport: '[data-role="viewport"]',
    track: '[data-role="track"]',
    cards: '[data-role="card"]',
    prev: ".trusted-privacy-testimonials-section__control--prev",
    next: ".trusted-privacy-testimonials-section__control--next"
  };

  function updateNavState(swiper, prev, next) {
    if (!swiper) return;

    const disablePrev = swiper.isBeginning || swiper.isLocked;
    const disableNext = swiper.isEnd || swiper.isLocked;

    if (prev) prev.disabled = disablePrev;
    if (next) next.disabled = disableNext;
  }

  function initFallbackSlider(block, track, cards, prev, next) {
    let index = 0;

    function currentSlidesPerView() {
      if (window.matchMedia("(max-width: 767.98px)").matches) return 1;
      if (window.matchMedia("(max-width: 991.98px)").matches) return 2;
      return 3;
    }

    const update = function () {
      const visible = currentSlidesPerView();
      const maxIndex = Math.max(0, cards.length - visible);

      if (index > maxIndex) {
        index = maxIndex;
      }

      const cardWidth = cards[0].offsetWidth;
      const gap = parseFloat(window.getComputedStyle(track).gap || "0");
      const offset = index * (cardWidth + gap);

      track.style.transform = "translate3d(" + -offset + "px,0,0)";

      if (prev) prev.disabled = index <= 0;
      if (next) next.disabled = index >= maxIndex;
    };

    if (prev) {
      prev.addEventListener("click", function () {
        index -= 1;
        update();
      });
    }

    if (next) {
      next.addEventListener("click", function () {
        index += 1;
        update();
      });
    }

    window.addEventListener("resize", update);
    update();
  }

  function initSlider(block) {
    if (!block || block.dataset.tptsInitialized === "true") return;

    const viewport = block.querySelector(SELECTORS.viewport);
    const track = block.querySelector(SELECTORS.track);
    const cards = Array.from(block.querySelectorAll(SELECTORS.cards));
    const prev = block.querySelector(SELECTORS.prev);
    const next = block.querySelector(SELECTORS.next);

    if (!viewport || !track || cards.length === 0) return;

    if (typeof window.Swiper === "function") {
      const swiper = new window.Swiper(viewport, {
        wrapperClass: "trusted-privacy-testimonials-section__track",
        slideClass: "trusted-privacy-testimonials-section__card",
        slidesPerView: 3,
        spaceBetween: 20,
        speed: 350,
        watchOverflow: true,
        observeParents: true,
        observer: true,
        navigation: prev && next ? { prevEl: prev, nextEl: next } : undefined,
        breakpoints: {
          0: {
            slidesPerView: 1,
            spaceBetween: 12
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 16
          },
          992: {
            slidesPerView: 3,
            spaceBetween: 20
          }
        },
        on: {
          init: function () {
            updateNavState(this, prev, next);
          },
          slideChange: function () {
            updateNavState(this, prev, next);
          },
          resize: function () {
            updateNavState(this, prev, next);
          },
          lock: function () {
            updateNavState(this, prev, next);
          },
          unlock: function () {
            updateNavState(this, prev, next);
          }
        }
      });

      block.tptsSwiper = swiper;
    } else {
      initFallbackSlider(block, track, cards, prev, next);
    }

    block.dataset.tptsInitialized = "true";
  }

  function initAll(scope) {
    const root = scope || document;

    if (root.matches && root.matches(SELECTORS.block)) {
      initSlider(root);
    }

    if (root.querySelectorAll) {
      const blocks = root.querySelectorAll(SELECTORS.block);
      blocks.forEach(initSlider);
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    initAll(document);
  });

  if (window.wp && window.wp.domReady) {
    window.wp.domReady(function () {
      initAll(document);
    });
  }

  function registerAcfPreviewHook() {
    if (!window.acf || typeof window.acf.addAction !== "function") {
      return false;
    }

    const onRender = function ($block) {
      if ($block && $block[0]) {
        initAll($block[0]);
      }
    };

    window.acf.addAction("render_block_preview/type=trusted-privacy-testimonials-section", onRender);
    window.acf.addAction("render_block_preview/type=acf/trusted-privacy-testimonials-section", onRender);
    return true;
  }

  if (!registerAcfPreviewHook()) {
    let attempts = 0;
    const interval = window.setInterval(function () {
      attempts += 1;
      if (registerAcfPreviewHook() || attempts >= 20) {
        window.clearInterval(interval);
      }
    }, 150);
  }
})();
