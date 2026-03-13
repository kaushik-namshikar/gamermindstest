function initWhoWeAreBlock(scope = document) {
  const titles = scope.querySelectorAll(".who-we-are__title");
  if (!titles.length) return;

  function getScrollParents(el) {
    const parents = [];
    let parent = el.parentElement;

    while (parent) {
      const style = window.getComputedStyle(parent);
      const overflowY = style.overflowY;
      if (overflowY === "auto" || overflowY === "scroll") {
        parents.push(parent);
      }
      parent = parent.parentElement;
    }

    return parents;
  }

  titles.forEach((title) => {
    if (title.dataset.whoWeAreInitialized === "true") return;
    title.dataset.whoWeAreInitialized = "true";

    const letters = [];

    function splitText(node) {
      if (node.nodeType === Node.TEXT_NODE) {
        const text = node.textContent;
        const fragment = document.createDocumentFragment();

        text.split("").forEach((char) => {
          const span = document.createElement("span");
          span.textContent = char;
          fragment.appendChild(span);
          letters.push(span);
        });

        node.parentNode.replaceChild(fragment, node);
      } else {
        node.childNodes.forEach((child) => splitText(child));
      }
    }

    splitText(title);

    function updateLetters() {
      const rect = title.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      const progress = 1 - rect.top / windowHeight;
      const clamped = Math.max(0, Math.min(1, progress));
      const lettersToActivate = Math.floor(clamped * letters.length);

      letters.forEach((letter, index) => {
        letter.style.color =
          index < lettersToActivate
            ? "rgba(60, 57, 57, 1)"
            : "rgba(60, 57, 57, 0.32)";
      });
    }

    const scrollParents = getScrollParents(title);
    scrollParents.forEach((el) => el.addEventListener("scroll", updateLetters));

    window.addEventListener("scroll", updateLetters);
    window.addEventListener("resize", updateLetters);

    const editorCanvas = document.querySelector(
      ".interface-interface-skeleton__content",
    );
    if (editorCanvas) {
      editorCanvas.addEventListener("scroll", updateLetters);
    }

    updateLetters();
  });
}

/* FRONTEND */
document.addEventListener("DOMContentLoaded", function () {
  initWhoWeAreBlock(document);
});

/* ACF EDITOR */
function registerWhoWeAreAcfHooks() {
  if (!window.acf || typeof window.acf.addAction !== "function") return false;

  const initFromPreview = function ($block) {
    if (!$block || !$block[0]) return;
    initWhoWeAreBlock($block[0]);
  };

  window.acf.addAction(
    "render_block_preview/type=who-we-are-section",
    initFromPreview,
  );
  window.acf.addAction(
    "render_block_preview/type=acf/who-we-are-section",
    initFromPreview,
  );
  return true;
}

if (!registerWhoWeAreAcfHooks()) {
  let attempts = 0;
  const intervalId = window.setInterval(() => {
    attempts += 1;
    if (registerWhoWeAreAcfHooks() || attempts >= 20) {
      window.clearInterval(intervalId);
    }
  }, 150);
}
