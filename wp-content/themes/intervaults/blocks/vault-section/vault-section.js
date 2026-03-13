function playVideoElement(video) {
  if (!video) return;
  video.muted = true;
  video.defaultMuted = true;
  video.setAttribute("muted", "");
  video.setAttribute("playsinline", "");
  const playPromise = video.play();
  if (playPromise && typeof playPromise.catch === "function") {
    playPromise.catch(() => {});
  }
}

function syncVaultPanelVideos(scope = document) {
  const panels = scope.querySelectorAll(".vault__panel");
  if (!panels.length) return;

  panels.forEach((panel) => {
    const panelVideo = panel.querySelector("video");
    if (!panelVideo) return;

    if (panel.classList.contains("active")) {
      playVideoElement(panelVideo);
    } else {
      panelVideo.pause();
    }
  });
}

function initVaultBlock(scope = document) {
  const tabs = scope.querySelectorAll(".vault__tab");
  const panels = scope.querySelectorAll(".vault__panel");
  const indicator = scope.querySelector(".vault__indicator");

  if (!tabs.length || !panels.length || !indicator) return;
  if (indicator.dataset.vaultInitialized === "true") return;
  indicator.dataset.vaultInitialized = "true";

  indicator.style.width = `${100 / tabs.length}%`;

  tabs.forEach((tab, index) => {
    tab.addEventListener("click", () => {
      const target = tab.dataset.tab;

      tabs.forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");

      panels.forEach((panel) => {
        panel.classList.remove("active");
        if (panel.dataset.content === target) {
          panel.classList.add("active");
        }
      });

      indicator.style.transform = `translateX(${index * 100}%)`;
      syncVaultPanelVideos(scope);
    });
  });

  syncVaultPanelVideos(scope);
}

document.addEventListener("DOMContentLoaded", function () {
  initVaultBlock(document);
});

function registerVaultAcfHooks() {
  if (!window.acf || typeof window.acf.addAction !== "function") return false;

  const initFromPreview = function ($block) {
    if (!$block || !$block[0]) return;
    initVaultBlock($block[0]);
  };

  window.acf.addAction("render_block_preview/type=vault-section", initFromPreview);
  window.acf.addAction("render_block_preview/type=acf/vault-section", initFromPreview);
  return true;
}

if (!registerVaultAcfHooks()) {
  let attempts = 0;
  const intervalId = window.setInterval(() => {
    attempts += 1;
    if (registerVaultAcfHooks() || attempts >= 20) {
      window.clearInterval(intervalId);
    }
  }, 150);
}
