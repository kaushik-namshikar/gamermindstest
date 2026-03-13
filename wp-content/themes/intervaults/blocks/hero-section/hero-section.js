function playHeroVideos(scope = document) {
  const videos = scope.querySelectorAll(".hero video");
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

document.addEventListener("DOMContentLoaded", function () {
  playHeroVideos(document);
});

function registerHeroAcfHooks() {
  if (!window.acf || typeof window.acf.addAction !== "function") return false;

  const initFromPreview = function ($block) {
    if (!$block || !$block[0]) return;
    playHeroVideos($block[0]);
  };

  window.acf.addAction(
    "render_block_preview/type=hero-section",
    initFromPreview,
  );
  window.acf.addAction(
    "render_block_preview/type=acf/hero-section",
    initFromPreview,
  );
  return true;
}

if (!registerHeroAcfHooks()) {
  let attempts = 0;
  const intervalId = window.setInterval(() => {
    attempts += 1;
    if (registerHeroAcfHooks() || attempts >= 20) {
      window.clearInterval(intervalId);
    }
  }, 150);
}
