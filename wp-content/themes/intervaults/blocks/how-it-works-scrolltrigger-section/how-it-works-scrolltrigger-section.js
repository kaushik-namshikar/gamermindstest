(function () {
  "use strict";

  function initHowItWorksGsapSection(section) {
    if (!section) {
      return;
    }

    if (typeof section.__howGsapCleanup === "function") {
      section.__howGsapCleanup();
    }

    var panelsWrap = section.querySelector(".how-gsap__panels");
    if (!panelsWrap) {
      return;
    }

    var panels = Array.prototype.slice.call(
      section.querySelectorAll(".how-gsap__panel"),
    );
    if (!panels.length) {
      return;
    }

    var currentIndex = 0;

    function applyPanelState() {
      var prevCount = currentIndex;
      var next1Count = currentIndex + 1 < panels.length ? 1 : 0;
      var next2Count = currentIndex + 2 < panels.length ? 1 : 0;

      panelsWrap.style.setProperty("--prev-count", String(prevCount));
      panelsWrap.style.setProperty("--next1-count", String(next1Count));
      panelsWrap.style.setProperty("--next2-count", String(next2Count));

      panels.forEach(function (panel, idx) {
        panel.classList.toggle("active", idx === currentIndex);
        panel.classList.toggle("prev", idx < currentIndex);
        panel.classList.toggle("next-1", idx === currentIndex + 1);
        panel.classList.toggle("next-2", idx === currentIndex + 2);
      });
    }

    function setActive(index) {
      if (index < 0 || index >= panels.length || index === currentIndex) {
        return;
      }
      currentIndex = index;
      applyPanelState();
    }

    applyPanelState();

    if (!window.gsap || !window.ScrollTrigger || panels.length < 2) {
      section.__howGsapCleanup = null;
      return;
    }

    window.gsap.registerPlugin(window.ScrollTrigger);

    var maxIndex = panels.length - 1;
    var panelContents = panels.map(function (panel) {
      return panel.querySelector(".how-gsap__panel-content");
    });

    function clamp(value, min, max) {
      return Math.min(Math.max(value, min), max);
    }

    function lerp(start, end, progress) {
      return start + (end - start) * progress;
    }

    function resolveCssLengthPx(varName) {
      var probe = document.createElement("div");
      probe.style.position = "absolute";
      probe.style.visibility = "hidden";
      probe.style.pointerEvents = "none";
      probe.style.height = "0";
      probe.style.width = "var(" + varName + ")";
      panelsWrap.appendChild(probe);
      var value = probe.getBoundingClientRect().width;
      panelsWrap.removeChild(probe);
      return Number.isFinite(value) ? value : 0;
    }

    function readMetrics() {
      return {
        wrapWidth: panelsWrap.clientWidth,
        peekPrev: resolveCssLengthPx("--peek-prev"),
        peek1: resolveCssLengthPx("--peek-1"),
        peek2: resolveCssLengthPx("--peek-2"),
        overlapStep: resolveCssLengthPx("--overlap-step"),
      };
    }

    function getState(index, metrics) {
      var widths = new Array(panels.length).fill(0);
      var prevCount = index;
      var next1Count = index + 1 < panels.length ? 1 : 0;
      var next2Count = index + 2 < panels.length ? 1 : 0;
      var activeWidth =
        metrics.wrapWidth -
        prevCount * metrics.peekPrev -
        next1Count * metrics.peek1 -
        next2Count * metrics.peek2;

      for (var i = 0; i < index; i += 1) {
        widths[i] = metrics.peekPrev;
      }

      widths[index] = Math.max(activeWidth, 0);

      if (index + 1 < panels.length) {
        widths[index + 1] = metrics.peek1;
      }

      if (index + 2 < panels.length) {
        widths[index + 2] = metrics.peek2;
      }

      return {
        widths: widths,
        overlap: prevCount * metrics.overlapStep,
      };
    }

    function applyContinuousProgress(progress) {
      var metrics = readMetrics();
      var scaled = clamp(progress, 0, 1) * maxIndex;
      var baseIndex = Math.floor(scaled);
      var mix = scaled - baseIndex;
      var nextIndex = Math.min(baseIndex + 1, maxIndex);
      var stateA = getState(baseIndex, metrics);
      var stateB = getState(nextIndex, metrics);

      panelsWrap.style.setProperty(
        "--overlap-total",
        String(lerp(stateA.overlap, stateB.overlap, mix)) + "px",
      );
      panelsWrap.style.setProperty("--panel-transition-ms", "0ms");

      panels.forEach(function (panel, idx) {
        var width = Math.max(0, lerp(stateA.widths[idx], stateB.widths[idx], mix));
        var visibility = width > 0.5 ? 1 : 0;
        var content = panelContents[idx];

        panel.style.width = String(width) + "px";
        panel.style.opacity = String(visibility);
        panel.style.pointerEvents = visibility ? "auto" : "none";

        if (content) {
          var contentProgress =
            metrics.wrapWidth > 0 ? clamp(width / (metrics.wrapWidth * 0.42), 0, 1) : 0;
          content.style.opacity = String(contentProgress);
          content.style.transform =
            "translateY(" + String((1 - contentProgress) * 20) + "px)";
          content.style.transition = "none";
        }

        panel.classList.toggle("active", idx === Math.round(scaled));
        panel.classList.toggle("prev", idx < Math.floor(scaled));
        panel.classList.toggle("next-1", idx === Math.ceil(scaled));
        panel.classList.toggle("next-2", idx === Math.ceil(scaled) + 1);
      });
    }

    var trigger = window.ScrollTrigger.create({
      trigger: section,
      start: "top top",
      end: function () {
        return "+=" + String(maxIndex * window.innerHeight);
      },
      pin: true,
      scrub: 0.1,
      invalidateOnRefresh: true,
      onUpdate: function (self) {
        applyContinuousProgress(self.progress);
      },
      onRefresh: function (self) {
        applyContinuousProgress(self.progress);
      },
    });

    applyContinuousProgress(trigger.progress);

    section.__howGsapCleanup = function () {
      trigger.kill();
      panelsWrap.style.removeProperty("--overlap-total");
      panelsWrap.style.removeProperty("--panel-transition-ms");
      panels.forEach(function (panel, idx) {
        panel.style.removeProperty("width");
        panel.style.removeProperty("opacity");
        panel.style.removeProperty("pointer-events");
        if (panelContents[idx]) {
          panelContents[idx].style.removeProperty("opacity");
          panelContents[idx].style.removeProperty("transform");
          panelContents[idx].style.removeProperty("transition");
        }
      });
      section.__howGsapCleanup = null;
    };
  }

  function initAll(scope) {
    var root = scope || document;
    var sections = root.querySelectorAll(".how-gsap");
    sections.forEach(initHowItWorksGsapSection);
  }

  document.addEventListener("DOMContentLoaded", function () {
    initAll(document);
  });

  if (window.wp && typeof window.wp.domReady === "function") {
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

    window.acf.addAction(
      "render_block_preview/type=how-it-works-scrolltrigger-section",
      onRender,
    );
    window.acf.addAction(
      "render_block_preview/type=acf/how-it-works-scrolltrigger-section",
      onRender,
    );
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
