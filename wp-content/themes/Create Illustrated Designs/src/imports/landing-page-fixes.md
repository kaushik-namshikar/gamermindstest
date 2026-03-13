Fix Landing Page Scroll & Footer Overlap Issue

Modify the landing page layout to resolve structural issues.

1️⃣ Make Landing Page Truly Non-Scrollable

The landing page must fit entirely within the viewport height (100vh).

Requirements:

Remove vertical scroll.

Prevent any content from extending below the viewport.

Ensure all visible elements (hero + Developer card + Player card + “Not sure? Explore both”) fit inside 100vh.

Use a structured layout:

Full-height wrapper (min-height: 100vh).

Flexbox or grid layout.

Vertically center content.

Maintain safe spacing above and below cards.

2️⃣ Fix Footer Overlapping Cards

Current issue:
The footer is overlapping the Developer / Player cards, and the “Not sure? Explore both” section is hidden beneath it.

Fix:

The footer must NOT appear on the initial gateway view.

Remove footer from landing page entirely OR

Hide footer until user navigates to Developer or Player pages.

The landing page should function as a clean gateway screen without footer.

If footer must exist structurally:

Position it outside the 100vh container.

Ensure it does not overlap content.

Do NOT use absolute positioning for footer.

3️⃣ Fix “Not sure? Explore both” Behavior

Currently it is hidden below the footer.

Update behavior:

Keep it visible inside the 100vh layout.

Position it below the two cards but still within viewport.

When clicked:

Reveal the “Two Sides of the Same Mission” section using expand animation or modal overlay.

Do NOT reveal it by scroll.

Do NOT push footer upward.

Do NOT break layout height.

The expanded section should:

Either appear as modal overlay
OR

Replace the gateway content with smooth transition.

4️⃣ Spacing & Alignment

Ensure:

Equal spacing between hero and cards.

Cards vertically centered.

No content touching edges.

Proper padding on mobile.

Mobile:

Cards stack vertically.

Entire content still fits within viewport height.

No scroll unless user expands content.

Goal:
Landing page must feel like a controlled gateway screen — no scroll, no overlapping footer, no hidden content.

Do not redesign visually. Only fix structure and layout behavior.