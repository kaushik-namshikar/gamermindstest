(function () {
  "use strict";

  function initFaqLockerVideo(scope) {
    var root = scope || document;
    var videos = root.querySelectorAll(".js-faq-locker-video");

    videos.forEach(function (video) {
      video.muted = true;
      video.playsInline = true;
      video.setAttribute("muted", "");
      video.setAttribute("playsinline", "");
      video.setAttribute("autoplay", "");
      video.setAttribute("loop", "");

      var playPromise = video.play();
      if (playPromise && typeof playPromise.catch === "function") {
        playPromise.catch(function () {
          // Autoplay can be blocked in editor until user interaction.
        });
      }
    });
  }

  document.addEventListener("DOMContentLoaded", function () {
    initFaqLockerVideo(document);
  });

  if (window.wp && window.wp.domReady) {
    window.wp.domReady(function () {
      initFaqLockerVideo(document);
    });
  }

  function registerAcfHooks() {
    if (!window.acf || typeof window.acf.addAction !== "function") {
      return false;
    }

    var initFromPreview = function ($block) {
      if ($block && $block[0]) {
        initFaqLockerVideo($block[0]);
      }
    };

    window.acf.addAction(
      "render_block_preview/type=faq-locker-video-section",
      initFromPreview,
    );
    window.acf.addAction(
      "render_block_preview/type=acf/faq-locker-video-section",
      initFromPreview,
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
