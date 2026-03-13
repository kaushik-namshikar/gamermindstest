function initBioVaultBlock(scope = document) {
  const tabs = scope.querySelectorAll(".biometric__tab");
  const contents = scope.querySelectorAll(".biometric__content");
  const indicator = scope.querySelector(".biometric__indicator");

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
  document.querySelectorAll(".biometric").forEach((block) => {
    initBioVaultBlock(block);
  });
});

function registerVsBVaultAcfHooks() {
  if (!window.acf || typeof window.acf.addAction !== "function") return false;

  const initFromPreview = function ($block) {
    if (!$block || !$block[0]) return;
    initBioVaultBlock($block[0]);
  };

  window.acf.addAction("render_block_preview/type=vs-b-vault-section", initFromPreview);
  window.acf.addAction("render_block_preview/type=acf/vs-b-vault-section", initFromPreview);
  return true;
}

if (!registerVsBVaultAcfHooks()) {
  let attempts = 0;
  const intervalId = window.setInterval(() => {
    attempts += 1;
    if (registerVsBVaultAcfHooks() || attempts >= 20) {
      window.clearInterval(intervalId);
    }
  }, 150);
}
