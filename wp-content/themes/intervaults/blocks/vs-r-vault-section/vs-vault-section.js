function initRoboVaultBlock(scope = document) {
  const tabs = scope.querySelectorAll(".robovault__tab");
  const contents = scope.querySelectorAll(".robovault__content");
  const indicator = scope.querySelector(".robovault__indicator");

  if (!tabs.length || !contents.length || !indicator) return;
  if (indicator.dataset.robovaultInitialized === "true") return;
  indicator.dataset.robovaultInitialized = "true";

  indicator.style.width = `${100 / tabs.length}%`;

  tabs.forEach((tab, index) => {
    tab.addEventListener("click", () => {
      const target = tab.dataset.tab;

      tabs.forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");

      contents.forEach((content) => {
        content.classList.remove("active");
        if (content.dataset.content === target) {
          content.classList.add("active");
        }
      });

      indicator.style.transform = `translateX(${index * 100}%)`;
    });
  });
}

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".robovault").forEach((block) => {
    initRoboVaultBlock(block);
  });
});

function registerVsRVaultAcfHooks() {
  if (!window.acf || typeof window.acf.addAction !== "function") return false;

  const initFromPreview = function ($block) {
    if (!$block || !$block[0]) return;
    initRoboVaultBlock($block[0]);
  };

  window.acf.addAction("render_block_preview/type=vs-r-vault-section", initFromPreview);
  window.acf.addAction("render_block_preview/type=acf/vs-r-vault-section", initFromPreview);
  return true;
}

if (!registerVsRVaultAcfHooks()) {
  let attempts = 0;
  const intervalId = window.setInterval(() => {
    attempts += 1;
    if (registerVsRVaultAcfHooks() || attempts >= 20) {
      window.clearInterval(intervalId);
    }
  }, 150);
}
