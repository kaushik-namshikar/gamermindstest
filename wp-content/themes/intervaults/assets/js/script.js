document.addEventListener("DOMContentLoaded", function () {
  const siteHeader = document.querySelector(".site-header");
  const toggle = document.querySelector(".menu-toggle");
  const navContainer = document.querySelector(".header-nav-container");

  if (siteHeader) {
    const syncHeaderScrollState = function () {
      siteHeader.classList.toggle("is-scrolled", window.scrollY > 0);
    };

    syncHeaderScrollState();
    window.addEventListener("scroll", syncHeaderScrollState, { passive: true });
  }

  if (toggle && navContainer) {
    toggle.addEventListener("click", function () {
      toggle.classList.toggle("active");
      navContainer.classList.toggle("is-open");
      document.body.classList.toggle("no-scroll");
    });
  }

  const initVaultFacilityMagnific = function () {
    if (
      !window.jQuery ||
      !window.jQuery.fn ||
      typeof window.jQuery.fn.magnificPopup !== "function"
    ) {
      return;
    }

    window.jQuery(".vault-facility-gallery__grid").each(function () {
      const $grid = window.jQuery(this);
      if ($grid.data("mfp-initialized")) {
        return;
      }

      $grid.magnificPopup({
        delegate: "a.js-vault-facility-gallery-item",
        type: "image",
        gallery: {
          enabled: true,
          preload: [0, 2],
        },
        mainClass: "mfp-img-mobile",
        closeOnContentClick: true,
      });

      $grid.data("mfp-initialized", true);
    });
  };

  initVaultFacilityMagnific();

  const applyStackedFaqDefaultState = function () {
    if (!window.matchMedia("(max-width: 991.98px)").matches) {
      return;
    }

    document.querySelectorAll(".js-faq-results").forEach(function (resultsContainer) {
      const rightAccordion = resultsContainer.querySelector(".faq-accordion--right");
      if (!rightAccordion) {
        return;
      }

      const firstItem = rightAccordion.querySelector(".accordion-item");
      if (!firstItem) {
        return;
      }

      const toggleButton = firstItem.querySelector(".accordion-button");
      const collapsePanel = firstItem.querySelector(".accordion-collapse");

      if (toggleButton) {
        toggleButton.classList.add("collapsed");
        toggleButton.setAttribute("aria-expanded", "false");
      }

      if (collapsePanel) {
        collapsePanel.classList.remove("show");
      }
    });
  };

  applyStackedFaqDefaultState();

  const searchInputs = Array.from(
    document.querySelectorAll(".js-faq-search-input")
  );
  const faqResultsContainer = document.querySelector(".js-faq-results");
  const faqSectionTarget = document.querySelector(".js-faq-section-target");

  if (!searchInputs.length || !faqResultsContainer || !window.intervaultsFaq) {
    return;
  }

  const defaultFaqMarkup = faqResultsContainer.innerHTML;

  const scrollToFaqSection = function () {
    if (!faqSectionTarget) {
      return;
    }

    faqSectionTarget.scrollIntoView({
      behavior: "smooth",
      block: "start",
    });
  };

  const clearSuggestions = function (container) {
    if (!container) {
      return;
    }

    container.innerHTML = "";
    container.setAttribute("hidden", "hidden");
  };

  const renderSuggestions = function (container, suggestions, searchInput, runFaqSearch) {
    if (!container) {
      return;
    }

    if (!Array.isArray(suggestions) || !suggestions.length) {
      clearSuggestions(container);
      return;
    }

    const suggestionClass = searchInput.closest(".faq-locker-video-section__search")
      ? "faq-locker-video-section__suggestion"
      : "faq-hero__suggestion";

    container.innerHTML = "";

    suggestions.forEach(function (text) {
      const button = document.createElement("button");
      button.type = "button";
      button.className = suggestionClass;
      button.textContent = text;
      let handledFromPointer = false;
      const applySuggestion = function () {
        searchInput.value = text;
        runFaqSearch({ queryOverride: text, shouldScroll: true });
      };

      // Use pointerdown so selection is applied before input blur hides suggestions.
      button.addEventListener("pointerdown", function (event) {
        event.preventDefault();
        handledFromPointer = true;
        applySuggestion();
      });
      button.addEventListener("click", function () {
        if (handledFromPointer) {
          handledFromPointer = false;
          return;
        }
        applySuggestion();
      });
      container.appendChild(button);
    });

    container.removeAttribute("hidden");
  };

  const renderEmptyState = function () {
    faqResultsContainer.innerHTML =
      [
        '<div class="faq-empty-state" role="status" aria-live="polite">',
        '<p class="faq-empty-state__title">No matching FAQs found</p>',
        "</div>",
      ].join("");
  };

  searchInputs.forEach(function (searchInput) {
    const searchWrapper = searchInput.closest(
      ".faq-hero__search, .faq-locker-video-section__search"
    );
    const suggestionLimitValue = Number.parseInt(
      searchInput.getAttribute("data-suggestion-limit") || "",
      10
    );
    const suggestionLimit =
      Number.isFinite(suggestionLimitValue) && suggestionLimitValue > 0
        ? suggestionLimitValue
        : null;
    const suggestionsContainer = searchWrapper
      ? searchWrapper.querySelector(".js-faq-search-suggestions")
      : null;
    let debounceTimer = null;
    let activeRequestController = null;

    const runFaqSearch = function (options = {}) {
      const query =
        typeof options.queryOverride === "string"
          ? options.queryOverride.trim()
          : searchInput.value.trim();
      const shouldScroll = Boolean(options.shouldScroll);

      if (!query.length) {
        faqResultsContainer.innerHTML = defaultFaqMarkup;
        clearSuggestions(suggestionsContainer);
        applyStackedFaqDefaultState();
        return;
      }

      const formData = new URLSearchParams();

      formData.append("action", "intervaults_faq_search");
      formData.append("nonce", window.intervaultsFaq.nonce);
      formData.append("query", query);

      if (activeRequestController) {
        activeRequestController.abort();
      }

      activeRequestController = new AbortController();

      fetch(window.intervaultsFaq.ajaxUrl, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: formData.toString(),
        signal: activeRequestController.signal,
      })
        .then(function (response) {
          return response.json();
        })
        .then(function (data) {
          if (!data || !data.success || !data.data) {
            renderEmptyState();
            clearSuggestions(suggestionsContainer);
            if (shouldScroll) {
              scrollToFaqSection();
            }
            return;
          }

          if (data.data.html) {
            faqResultsContainer.innerHTML = data.data.html;
            applyStackedFaqDefaultState();
          } else {
            renderEmptyState();
          }

          renderSuggestions(
            suggestionsContainer,
            suggestionLimit
              ? (data.data.suggestions || []).slice(0, suggestionLimit)
              : data.data.suggestions || [],
            searchInput,
            runFaqSearch
          );

          if (shouldScroll) {
            scrollToFaqSection();
          }
        })
        .catch(function (error) {
          if (error && error.name === "AbortError") {
            return;
          }

          renderEmptyState();
          clearSuggestions(suggestionsContainer);
          if (shouldScroll) {
            scrollToFaqSection();
          }
        });
    };

    searchInput.addEventListener("input", function () {
      clearTimeout(debounceTimer);
      debounceTimer = setTimeout(runFaqSearch, 250);
    });

    searchInput.addEventListener("keydown", function (event) {
      if (event.key !== "Enter") {
        return;
      }

      event.preventDefault();
      clearTimeout(debounceTimer);
      runFaqSearch({ shouldScroll: true });
    });

    searchInput.addEventListener("blur", function () {
      window.setTimeout(function () {
        clearSuggestions(suggestionsContainer);
      }, 120);
    });

    searchInput.addEventListener("focus", function () {
      if (suggestionsContainer && suggestionsContainer.children.length > 0) {
        suggestionsContainer.removeAttribute("hidden");
      }
    });
  });
});
