(function () {
  "use strict";

  function initTicker(section) {
    if (!section || section.dataset.tickerInitialized === "true") {
      return;
    }

    var ticker = section.querySelector(".hero__ticker");
    var track = section.querySelector(".hero__ticker-track");
    var groups = track ? track.querySelectorAll(".hero__ticker-group") : [];

    if (!ticker || !track || groups.length < 1) {
      return;
    }

    var offset = 0;
    var lastTs = 0;
    var rafId = 0;
    var paused = false;
    var groupWidth = 0;
    var speed = 72; // px per second

    function getGroupStride() {
      groups = track.querySelectorAll(".hero__ticker-group");
      if (!groups.length) {
        return 0;
      }

      var firstGroup = groups[0];
      var baseWidth = firstGroup.getBoundingClientRect().width;
      if (baseWidth <= 0) {
        return 0;
      }

      if (groups.length > 1) {
        var secondGroup = groups[1];
        var firstRect = firstGroup.getBoundingClientRect();
        var secondRect = secondGroup.getBoundingClientRect();
        var stride = secondRect.left - firstRect.left;

        if (stride > 0) {
          return stride;
        }

        var secondGroupStyles = window.getComputedStyle(secondGroup);
        var marginLeft = parseFloat(secondGroupStyles.marginLeft) || 0;
        return baseWidth + marginLeft;
      }

      return baseWidth;
    }

    function ensureContinuousCoverage() {
      var stride = getGroupStride();
      if (stride <= 0) {
        return;
      }

      var requiredWidth = ticker.getBoundingClientRect().width + stride;

      groups = track.querySelectorAll(".hero__ticker-group");
      var firstGroup = groups[0];

      while (track.scrollWidth < requiredWidth) {
        var clone = firstGroup.cloneNode(true);
        clone.setAttribute("aria-hidden", "true");
        track.appendChild(clone);
      }

      groups = track.querySelectorAll(".hero__ticker-group");
    }

    function measure() {
      ensureContinuousCoverage();
      groups = track.querySelectorAll(".hero__ticker-group");
      if (!groups.length) {
        return;
      }

      groupWidth = getGroupStride();

      if (groupWidth > 0) {
        offset = offset % groupWidth;
        track.style.transform = "translate3d(" + -offset + "px,0,0)";
      }
    }

    function tick(ts) {
      if (!lastTs) {
        lastTs = ts;
      }

      var delta = (ts - lastTs) / 1000;
      lastTs = ts;

      if (!paused && groupWidth > 0) {
        offset = (offset + speed * delta) % groupWidth;
        track.style.transform = "translate3d(" + -offset + "px,0,0)";
      }

      rafId = window.requestAnimationFrame(tick);
    }

    measure();
    rafId = window.requestAnimationFrame(tick);

    ticker.addEventListener("mouseenter", function () {
      paused = true;
    });
    ticker.addEventListener("mouseleave", function () {
      paused = false;
    });
    ticker.addEventListener("focusin", function () {
      paused = true;
    });
    ticker.addEventListener("focusout", function () {
      paused = false;
    });

    window.addEventListener("resize", measure);

    section.dataset.tickerInitialized = "true";
    section._tickerCleanup = function () {
      if (rafId) {
        window.cancelAnimationFrame(rafId);
      }
    };
  }

  function initAll(scope) {
    var root = scope || document;
    var sections = root.querySelectorAll(".scrolling-ticker");
    sections.forEach(initTicker);
  }

  document.addEventListener("DOMContentLoaded", function () {
    initAll(document);
  });

  if (window.wp && window.wp.domReady) {
    window.wp.domReady(function () {
      initAll(document);
    });
  }

  function registerAcfHooks() {
    if (!window.acf || typeof window.acf.addAction !== "function") {
      return false;
    }

    var onRender = function ($block) {
      if ($block && $block[0]) {
        initAll($block[0]);
      }
    };

    window.acf.addAction("render_block_preview/type=ticker-section", onRender);
    window.acf.addAction("render_block_preview/type=acf/ticker-section", onRender);
    return true;
  }

  if (!registerAcfHooks()) {
    var attempts = 0;
    var intervalId = window.setInterval(function () {
      attempts += 1;
      if (registerAcfHooks() || attempts >= 20) {
        window.clearInterval(intervalId);
      }
    }, 150);
  }
})();
