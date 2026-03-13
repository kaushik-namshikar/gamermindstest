(function () {
  "use strict";

  function syncCardHeights(slots, forcedHeight) {
    var cards = [];

    slots.forEach(function (slot) {
      if (slot.style.display === "none" || slot.getAttribute("aria-hidden") === "true") {
        return;
      }

      var card = slot.querySelector(".biometric-lockers__card");
      if (!card) {
        return;
      }

      card.style.minHeight = "";
      cards.push(card);
    });

    if (!cards.length) {
      return;
    }

    var tallest = typeof forcedHeight === "number" && forcedHeight > 0 ? forcedHeight : 0;

    if (!tallest) {
      cards.forEach(function (card) {
        var cardHeight = card.getBoundingClientRect().height;
        if (cardHeight > tallest) {
          tallest = cardHeight;
        }
      });
    }

    cards.forEach(function (card) {
      card.style.minHeight = tallest + "px";
    });
  }

  function renderSlot(slot, item) {
    var image = slot.querySelector(".biometric-lockers__image");
    var imageWrap = slot.querySelector(".biometric-lockers__image-wrap");
    var icon = slot.querySelector(".biometric-lockers__icon");
    var cardTitle = slot.querySelector(".biometric-lockers__card-title");
    var cardDesc = slot.querySelector(".biometric-lockers__card-desc");
    var meta = slot.querySelector(".biometric-lockers__meta");

    if (!item) {
      slot.style.visibility = "hidden";
      return;
    }

    slot.style.visibility = "visible";

    if (image && item.imageUrl) {
      image.src = item.imageUrl;
      image.alt = item.imageAlt || "";
      imageWrap.style.display = "";
    } else if (imageWrap) {
      imageWrap.style.display = "none";
    }

    if (icon && item.iconUrl) {
      icon.src = item.iconUrl;
      icon.alt = item.iconAlt || "";
      icon.style.display = "";
    } else if (icon) {
      icon.style.display = "none";
    }

    if (cardTitle) {
      cardTitle.textContent = item.title || "";
    }

    if (cardDesc) {
      cardDesc.textContent = item.description || "";
      cardDesc.style.display = item.description ? "" : "none";
    }

    if (meta) {
      var parts = [];
      if (item.width) parts.push("Width: " + item.width);
      if (item.height) parts.push("Height: " + item.height);
      if (item.depth) parts.push("Depth: " + item.depth);

      meta.innerHTML = "";
      parts.forEach(function (part) {
        var span = document.createElement("span");
        span.textContent = part;
        meta.appendChild(span);
      });
    }
  }

  function initBlock(block) {
    if (!block || block.dataset.biometricLockersInitialized === "true") {
      return;
    }

    var datasetNode = block.querySelector(".biometric-lockers__dataset");
    var slotsWrap = block.querySelector(".biometric-lockers__slots");
    var controls = Array.from(block.querySelectorAll(".biometric-lockers__controls"));
    var prevButtons = Array.from(block.querySelectorAll(".biometric-lockers__control--prev"));
    var nextButtons = Array.from(block.querySelectorAll(".biometric-lockers__control--next"));
    var slots = Array.from(block.querySelectorAll(".biometric-lockers__slot"));

    if (!datasetNode || !slotsWrap || !slots.length) {
      return;
    }

    var items = [];
    try {
      items = JSON.parse(datasetNode.textContent || "[]");
    } catch (e) {
      items = [];
    }

    if (!items.length) {
      return;
    }

    var startIndex = 0;
    var activeVisibleCount = slots.length;
    var tallestCardHeight = 0;
    var isSwipeEnabled = false;

    var getVisibleCount = function () {
      if (window.matchMedia("(min-width: 1000px)").matches) {
        return Math.min(4, slots.length);
      }

      if (window.matchMedia("(min-width: 600px)").matches) {
        return Math.min(2, slots.length);
      }

      return Math.min(1, slots.length);
    };

    var renderAll = function () {
      activeVisibleCount = getVisibleCount();
      var canSlide = items.length > activeVisibleCount;
      isSwipeEnabled = canSlide;

      if (!canSlide) {
        startIndex = 0;
      }

      for (var i = 0; i < slots.length; i += 1) {
        if (i >= activeVisibleCount) {
          slots[i].style.display = "none";
          slots[i].setAttribute("aria-hidden", "true");
          continue;
        }

        slots[i].style.display = "";
        slots[i].removeAttribute("aria-hidden");

        var itemIndex = canSlide ? (startIndex + i) % items.length : i;
        var item = items[itemIndex];
        renderSlot(slots[i], item);
      }

      var widthSourceSlot = null;
      for (var j = 0; j < slots.length; j += 1) {
        if (slots[j].style.display !== "none" && slots[j].getAttribute("aria-hidden") !== "true") {
          widthSourceSlot = slots[j];
          break;
        }
      }

      var slotWidth = widthSourceSlot
        ? widthSourceSlot.getBoundingClientRect().width
        : slotsWrap.getBoundingClientRect().width;

      if (slotWidth > 0) {
        var probe = slots[0].cloneNode(true);
        probe.style.position = "absolute";
        probe.style.visibility = "hidden";
        probe.style.pointerEvents = "none";
        probe.style.left = "-9999px";
        probe.style.top = "0";
        probe.style.display = "block";
        probe.style.width = slotWidth + "px";
        probe.removeAttribute("aria-hidden");

        slotsWrap.appendChild(probe);

        var probeCard = probe.querySelector(".biometric-lockers__card");
        var maxHeight = 0;

        for (var k = 0; k < items.length; k += 1) {
          renderSlot(probe, items[k]);
          if (!probeCard) {
            continue;
          }
          probeCard.style.minHeight = "";
          var probeHeight = probeCard.getBoundingClientRect().height;
          if (probeHeight > maxHeight) {
            maxHeight = probeHeight;
          }
        }

        probe.remove();
        tallestCardHeight = maxHeight;
      }

      syncCardHeights(slots, tallestCardHeight);

      if (!canSlide) {
        block.dataset.controlsPlacement = "sidebar";
      } else if (activeVisibleCount === 2) {
        block.dataset.controlsPlacement = "slots-two";
      } else if (activeVisibleCount === 1) {
        block.dataset.controlsPlacement = "slots-one";
      } else {
        block.dataset.controlsPlacement = "sidebar";
      }

      controls.forEach(function (controlGroup) {
        controlGroup.hidden = !canSlide;
        controlGroup.setAttribute("aria-hidden", String(!canSlide));
      });

      prevButtons.forEach(function (button) {
        button.disabled = !canSlide;
      });

      nextButtons.forEach(function (button) {
        button.disabled = !canSlide;
      });
    };

    var goPrev = function () {
      if (!isSwipeEnabled) {
        return;
      }
      startIndex = (startIndex - 1 + items.length) % items.length;
      renderAll();
    };

    var goNext = function () {
      if (!isSwipeEnabled) {
        return;
      }
      startIndex = (startIndex + 1) % items.length;
      renderAll();
    };

    prevButtons.forEach(function (button) {
      button.addEventListener("click", goPrev);
    });

    nextButtons.forEach(function (button) {
      button.addEventListener("click", goNext);
    });

    var minSwipeDistance = 40;
    var swipeState = {
      active: false,
      pointerId: null,
      startX: 0,
      startY: 0,
      deltaX: 0,
      deltaY: 0,
      axisLocked: false,
      isHorizontal: false,
    };

    var resetSwipeState = function () {
      swipeState.active = false;
      swipeState.pointerId = null;
      swipeState.startX = 0;
      swipeState.startY = 0;
      swipeState.deltaX = 0;
      swipeState.deltaY = 0;
      swipeState.axisLocked = false;
      swipeState.isHorizontal = false;
    };

    var handleSwipeEnd = function () {
      if (!swipeState.active || !isSwipeEnabled) {
        resetSwipeState();
        return;
      }

      if (swipeState.isHorizontal && Math.abs(swipeState.deltaX) >= minSwipeDistance) {
        if (swipeState.deltaX > 0) {
          goPrev();
        } else {
          goNext();
        }
      }

      resetSwipeState();
    };

    if (window.PointerEvent) {
      slotsWrap.addEventListener("pointerdown", function (event) {
        if (!isSwipeEnabled) {
          return;
        }

        if (event.pointerType === "mouse" && event.button !== 0) {
          return;
        }

        swipeState.active = true;
        swipeState.pointerId = event.pointerId;
        swipeState.startX = event.clientX;
        swipeState.startY = event.clientY;
        swipeState.deltaX = 0;
        swipeState.deltaY = 0;
        swipeState.axisLocked = false;
        swipeState.isHorizontal = false;

        if (typeof slotsWrap.setPointerCapture === "function") {
          slotsWrap.setPointerCapture(event.pointerId);
        }
      });

      slotsWrap.addEventListener(
        "pointermove",
        function (event) {
          if (!swipeState.active || event.pointerId !== swipeState.pointerId) {
            return;
          }

          swipeState.deltaX = event.clientX - swipeState.startX;
          swipeState.deltaY = event.clientY - swipeState.startY;

          if (!swipeState.axisLocked) {
            var absX = Math.abs(swipeState.deltaX);
            var absY = Math.abs(swipeState.deltaY);
            if (absX > 8 || absY > 8) {
              swipeState.axisLocked = true;
              swipeState.isHorizontal = absX > absY;
            }
          }

          if (swipeState.axisLocked && swipeState.isHorizontal) {
            event.preventDefault();
          }
        },
        { passive: false }
      );

      slotsWrap.addEventListener("pointerup", function (event) {
        if (swipeState.active && event.pointerId === swipeState.pointerId) {
          handleSwipeEnd();
        }
      });

      slotsWrap.addEventListener("pointercancel", resetSwipeState);
    }

    window.addEventListener("resize", renderAll);
    window.addEventListener("load", renderAll, { once: true });

    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(renderAll).catch(function () {});
    }

    var pendingHeightSync = false;
    var scheduleHeightSync = function () {
      if (pendingHeightSync) {
        return;
      }
      pendingHeightSync = true;
      window.requestAnimationFrame(function () {
        pendingHeightSync = false;
        // Respect temporary DOM edits (for example from DevTools) and only resync heights.
        syncCardHeights(slots);
      });
    };

    var mutationObserver = new MutationObserver(function () {
      scheduleHeightSync();
    });

    mutationObserver.observe(slotsWrap, {
      childList: true,
      subtree: true,
      characterData: true,
    });

    renderAll();
    block.dataset.biometricLockersInitialized = "true";
  }

  function initAll(scope) {
    var root = scope || document;
    var blocks = root.querySelectorAll(".biometric-lockers");
    blocks.forEach(initBlock);
  }

  document.addEventListener("DOMContentLoaded", function () {
    initAll(document);
  });

  if (window.wp && window.wp.domReady) {
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

    window.acf.addAction("render_block_preview/type=biometric-lockers-section", onRender);
    window.acf.addAction("render_block_preview/type=acf/biometric-lockers-section", onRender);
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
