function playVideosInScope(scope = document) {
  const videos = scope.querySelectorAll("video");
  if (!videos.length) return;

  videos.forEach((video) => {
    video.muted = true;
    video.defaultMuted = true;
    video.setAttribute("muted", "");
    video.setAttribute("playsinline", "");

    const tryPlay = () => {
      const playPromise = video.play();
      if (playPromise && typeof playPromise.catch === "function") {
        playPromise.catch(() => {});
      }
    };

    if (video.readyState >= 2) {
      tryPlay();
    } else {
      video.addEventListener("loadeddata", tryPlay, { once: true });
    }
  });
}

function initFaqBlock(scope = document) {
  playVideosInScope(scope);

  const items = scope.querySelectorAll(".faq__item");
  if (!items.length) return;

  items.forEach((item) => {
    if (item.dataset.faqInitialized === "true") return;

    const header = item.querySelector(".faq__header");
    const body = item.querySelector(".faq__body");
    if (!header || !body) return;

    item.dataset.faqInitialized = "true";

    if (item.classList.contains("active")) {
      body.style.maxHeight = body.scrollHeight + "px";
    }

    header.addEventListener("click", () => {
      const isOpen = item.classList.contains("active");

      if (isOpen) {
        body.style.maxHeight = null;
        item.classList.remove("active");
      } else {
        body.style.maxHeight = body.scrollHeight + "px";
        item.classList.add("active");
      }
    });
  });
}

document.addEventListener("DOMContentLoaded", function () {
  initFaqBlock(document);
});

function registerFaqAcfHooks() {
  if (!window.acf || typeof window.acf.addAction !== "function") return false;

  const initFromPreview = function ($block) {
    if (!$block || !$block[0]) return;
    initFaqBlock($block[0]);
  };

  window.acf.addAction("render_block_preview/type=faq-section", initFromPreview);
  window.acf.addAction("render_block_preview/type=acf/faq-section", initFromPreview);
  return true;
}

if (!registerFaqAcfHooks()) {
  let attempts = 0;
  const intervalId = window.setInterval(() => {
    attempts += 1;
    if (registerFaqAcfHooks() || attempts >= 20) {
      window.clearInterval(intervalId);
    }
  }, 150);
}
