function initHowItWorksBlock(scope = document) {
  const howSection = scope.querySelector(".how");
  if (!howSection) return;
  if (howSection.dataset.howInitialized === "true") return;
  howSection.dataset.howInitialized = "true";

  const panelsWrap = howSection.querySelector(".how__panels");
  if (!panelsWrap) return;

  const panels = Array.from(howSection.querySelectorAll(".how__panel"));
  if (!panels.length) return;

  let currentIndex = panels.findIndex((panel) =>
    panel.classList.contains("active"),
  );
  if (currentIndex < 0) currentIndex = 0;

  let animating = false;
  const PANEL_ANIMATION_MS = 700;
  let wheelAccum = 0;
  const WHEEL_THRESHOLD = 90;
  const RELEASE_COOLDOWN_MS = 240;
  const ACTIVATION_ENTER_OFFSET = 80;
  const ACTIVATION_EXIT_OFFSET = 100;
  let releaseUntil = 0;
  let sectionActive = false;
  let touchStartY = null;
  const TOUCH_THRESHOLD = 36;
  const isMobile = window.matchMedia("(max-width: 767px)").matches;

  function syncCaptureClass() {
    howSection.classList.toggle("how--capturing", sectionActive);
  }

  function applyPanelState() {
    const prevCount = currentIndex;
    const next1Count = currentIndex + 1 < panels.length ? 1 : 0;
    const next2Count = currentIndex + 2 < panels.length ? 1 : 0;

    panelsWrap.style.setProperty("--prev-count", String(prevCount));
    panelsWrap.style.setProperty("--next1-count", String(next1Count));
    panelsWrap.style.setProperty("--next2-count", String(next2Count));

    panels.forEach((panel, idx) => {
      panel.classList.toggle("active", idx === currentIndex);
      panel.classList.toggle("prev", idx < currentIndex);
      panel.classList.toggle("next-1", idx === currentIndex + 1);
      panel.classList.toggle("next-2", idx === currentIndex + 2);
    });
  }

  function setActive(index) {
    if (animating) return;
    if (index < 0 || index >= panels.length) return;
    if (index === currentIndex) return;

    animating = true;
    currentIndex = index;
    applyPanelState();

    window.setTimeout(() => {
      animating = false;
    }, PANEL_ANIMATION_MS);
  }

  function initMobileGsapScroll() {
    if (!window.gsap || !window.ScrollTrigger || panels.length < 2) return false;

    window.gsap.registerPlugin(window.ScrollTrigger);
    howSection.classList.add("how--mobile-gsap");
    howSection.classList.remove("how--capturing");

    const totalSteps = panels.length;
    const panelContents = panels.map((panel) =>
      panel.querySelector(".how__panel-content"),
    );

    function clamp(value, min, max) {
      return Math.min(Math.max(value, min), max);
    }

    function applyContinuousProgress(progress) {
      const scaled = clamp(progress, 0, 1) * totalSteps;
      panelsWrap.style.setProperty("--panel-transition-ms", "0ms");
      panelsWrap.style.setProperty("--overlap-total", "0px");

      panels.forEach((panel, idx) => {
        const localProgress = clamp(scaled - idx, 0, 1);
        const xPercent = (1 - localProgress) * 100;
        const content = panelContents[idx];

        panel.style.width = "100%";
        panel.style.opacity = "1";
        panel.style.pointerEvents = "none";
        panel.style.transform = `translate3d(${xPercent}%, 0, 0)`;
        panel.style.zIndex = String(20 + idx);

        if (content) {
          content.style.opacity = String(localProgress);
          content.style.transform = `translateY(${(1 - localProgress) * 16}px)`;
          content.style.transition = "none";
        }

        panel.classList.toggle("active", localProgress > 0.98);
        panel.classList.remove("prev", "next-1", "next-2");
      });
    }

    const trigger = window.ScrollTrigger.create({
      trigger: howSection,
      start: "top top",
      end: () => `+=${totalSteps * window.innerHeight}`,
      pin: true,
      scrub: 0.1,
      invalidateOnRefresh: true,
      onUpdate: (self) => applyContinuousProgress(self.progress),
      onRefresh: (self) => applyContinuousProgress(self.progress),
    });

    applyContinuousProgress(trigger.progress);
    return true;
  }

  if (isMobile && initMobileGsapScroll()) {
    return;
  }

  function updateActivationState() {
    const rect = howSection.getBoundingClientRect();
    const viewportH = window.innerHeight;
    const isVisible = rect.bottom > 0 && rect.top < window.innerHeight;
    const crossedViewportCenter =
      rect.top <= viewportH * 0.35 && rect.bottom >= viewportH * 0.65;
    const isNearFullyInViewport =
      rect.top >= -ACTIVATION_ENTER_OFFSET &&
      rect.bottom <= viewportH + ACTIVATION_ENTER_OFFSET;

    if (Date.now() < releaseUntil) {
      sectionActive = false;
      syncCaptureClass();
      return;
    }

    // Activate when section is in a stable viewport capture zone (works better on touch scroll).
    if (!sectionActive && isVisible && (crossedViewportCenter || isNearFullyInViewport)) {
      sectionActive = true;
    }

    // Release once section is clearly leaving the viewport.
    if (
      sectionActive &&
      (!isVisible ||
        rect.bottom < ACTIVATION_EXIT_OFFSET ||
        rect.top > viewportH - ACTIVATION_EXIT_OFFSET)
    ) {
      sectionActive = false;
    }

    syncCaptureClass();
  }

  function shouldCaptureScroll(e) {
    updateActivationState();
    return sectionActive;
  }

  function wheelControl(e) {
    if (!shouldCaptureScroll(e)) return;

    // Release forward at the last panel so next section can continue naturally.
    if (currentIndex === panels.length - 1 && e.deltaY > 0) {
      wheelAccum = 0;
      sectionActive = false;
      releaseUntil = Date.now() + RELEASE_COOLDOWN_MS;
      return;
    }

    // Release backward at the first panel so previous section can continue naturally.
    if (currentIndex === 0 && e.deltaY < 0) {
      wheelAccum = 0;
      sectionActive = false;
      releaseUntil = Date.now() + RELEASE_COOLDOWN_MS;
      return;
    }

    e.preventDefault();
    if (animating) return;

    wheelAccum += e.deltaY;

    if (wheelAccum > WHEEL_THRESHOLD) {
      wheelAccum = 0;
      setActive(currentIndex + 1);
    } else if (wheelAccum < -WHEEL_THRESHOLD) {
      wheelAccum = 0;
      setActive(currentIndex - 1);
    }
  }

  function releaseToPageScroll() {
    wheelAccum = 0;
    sectionActive = false;
    releaseUntil = Date.now() + RELEASE_COOLDOWN_MS;
    syncCaptureClass();
  }

  function touchStartControl(e) {
    if (!e.touches || !e.touches.length) return;
    touchStartY = e.touches[0].clientY;
  }

  function touchMoveControl(e) {
    if (!e.touches || !e.touches.length) return;
    if (touchStartY === null) {
      touchStartY = e.touches[0].clientY;
      return;
    }

    const touchY = e.touches[0].clientY;
    const deltaY = touchStartY - touchY;
    if (Math.abs(deltaY) < TOUCH_THRESHOLD) return;
    if (!shouldCaptureScroll(e.touches[0])) {
      touchStartY = touchY;
      return;
    }

    // Swiping up moves forward, swiping down moves backward.
    if (deltaY > 0) {
      if (currentIndex === panels.length - 1) {
        releaseToPageScroll();
      } else if (!animating) {
        setActive(currentIndex + 1);
      }
    } else {
      if (currentIndex === 0) {
        releaseToPageScroll();
      } else if (!animating) {
        setActive(currentIndex - 1);
      }
    }

    touchStartY = touchY;
    e.preventDefault();
  }

  function touchEndControl() {
    touchStartY = null;
  }

  window.addEventListener("wheel", wheelControl, { passive: false });
  window.addEventListener("touchstart", touchStartControl, { passive: true });
  window.addEventListener("touchmove", touchMoveControl, { passive: false });
  window.addEventListener("touchend", touchEndControl, { passive: true });
  window.addEventListener("touchcancel", touchEndControl, { passive: true });
  window.addEventListener("scroll", updateActivationState, { passive: true });
  window.addEventListener("resize", updateActivationState);

  applyPanelState();
  updateActivationState();
}

document.addEventListener("DOMContentLoaded", function () {
  initHowItWorksBlock(document);
});

function registerHowItWorksAcfHooks() {
  if (!window.acf || typeof window.acf.addAction !== "function") return false;

  const initFromPreview = function ($block) {
    if (!$block || !$block[0]) return;
    initHowItWorksBlock($block[0]);
  };

  window.acf.addAction(
    "render_block_preview/type=how-it-works-section",
    initFromPreview,
  );
  window.acf.addAction(
    "render_block_preview/type=acf/how-it-works-section",
    initFromPreview,
  );
  return true;
}

if (!registerHowItWorksAcfHooks()) {
  let attempts = 0;
  const intervalId = window.setInterval(() => {
    attempts += 1;
    if (registerHowItWorksAcfHooks() || attempts >= 20) {
      window.clearInterval(intervalId);
    }
  }, 150);
}
