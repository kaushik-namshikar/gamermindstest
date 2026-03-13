function initVaultFeaturesInstance(section) {
  if (!section || section.dataset.vaultFeaturesInitialized === "true") return;

  const tabs = section.querySelectorAll(".v-security__tab");
  const images = section.querySelectorAll(".v-security__image");
  const infos = section.querySelectorAll(".v-security__info-item");
  const itemCount = Math.min(tabs.length, images.length, infos.length);

  if (!itemCount) return;

  section.dataset.vaultFeaturesInitialized = "true";

  let currentIndex = 0;
  let interval;

  function updateTabArrows(activeIndex) {
    tabs.forEach((tab, index) => {
      const arrow = tab.querySelector(".v-security__tab-arrow");
      if (!arrow) return;

      const activeIcon = arrow.dataset.activeIcon;
      const inactiveIcon = arrow.dataset.inactiveIcon;
      arrow.src = index === activeIndex ? activeIcon : inactiveIcon;
    });
  }

  function activateTab(index) {
    if (index < 0 || index >= itemCount) return;

    tabs.forEach((t) => t.classList.remove("active"));
    images.forEach((i) => i.classList.remove("active"));
    infos.forEach((info) => info.classList.remove("active"));

    tabs[index].classList.add("active");
    images[index].classList.add("active");
    infos[index].classList.add("active");
    updateTabArrows(index);

    currentIndex = index;
  }

  function startAutoLoop() {
    interval = setInterval(() => {
      activateTab((currentIndex + 1) % itemCount);
    }, 5000);
  }

  function resetAutoLoop() {
    clearInterval(interval);
    startAutoLoop();
  }

  tabs.forEach((tab, index) => {
    if (index >= itemCount) return;

    tab.addEventListener("click", () => {
      activateTab(index);
      resetAutoLoop();
    });
  });

  activateTab(currentIndex);
  startAutoLoop();
}

function initVaultFeaturesBlock(scope = document) {
  if (!scope) return;

  if (scope.matches && scope.matches(".vault-security")) {
    initVaultFeaturesInstance(scope);
    return;
  }

  const sections = scope.querySelectorAll
    ? scope.querySelectorAll(".vault-security")
    : [];
  sections.forEach((section) => initVaultFeaturesInstance(section));
}

document.addEventListener("DOMContentLoaded", function () {
  initVaultFeaturesBlock(document);
});

function registerVaultFeaturesAcfHooks() {
  if (!window.acf || typeof window.acf.addAction !== "function") return false;

  const initFromPreview = function ($block) {
    if (!$block || !$block[0]) return;
    initVaultFeaturesBlock($block[0]);
  };

  window.acf.addAction("render_block_preview/type=vault-features-section", initFromPreview);
  window.acf.addAction("render_block_preview/type=acf/vault-features-section", initFromPreview);
  return true;
}

if (!registerVaultFeaturesAcfHooks()) {
  let attempts = 0;
  const intervalId = window.setInterval(() => {
    attempts += 1;
    if (registerVaultFeaturesAcfHooks() || attempts >= 20) {
      window.clearInterval(intervalId);
    }
  }, 150);
}
