# Gamer Minds WordPress Gutenberg Theme

A professional WordPress Gutenberg block theme converted from a React Figma design for the Gamer Minds game localization platform.

## Overview

This theme converts a React-based website into a fully-functional WordPress Gutenberg block theme. It maintains the exact design from the React project while providing a server-rendered, SEO-friendly WordPress experience.

**Design System**: Dark theme with purple/indigo accents, based on Tailwind CSS color palette
**Framework**: WordPress 6.0+, Gutenberg blocks  
**Architecture**: Block-based custom post types with native block rendering
**Animations**: CSS animations with IntersectionObserver scroll triggers (replacing Framer Motion)

## Folder Structure

```
gamer-minds-theme/
├── assets/
│   ├── css/
│   │   ├── main.css           # Core styles & design variables
│   │   └── animations.css      # Animations & transitions
│   └── js/
│       ├── main.js            # General functionality
│       └── animations.js       # Scroll animations & IntersectionObserver
├── blocks/                      # Gutenberg blocks (each in subdirectory)
│   ├── hero/                   # Hero section block
│   ├── services/               # Services grid block
│   ├── faq/                    # FAQ accordion block
│   ├── cta/                    # Call-to-action block
│   ├── content-sections/       # Text content blocks
│   ├── two-paths/              # Split screen (landing)
│   ├── split-cards/            # Path selection cards
│   ├── trust-grid/             # Trust/value grid
│   ├── gallery-grid/           # Images portfolio
│   ├── process-timeline/       # Process steps
│   ├── language-grid/          # Language tags
│   ├── quote-form/             # Quote request form
│   ├── campaigns-grid/         # Voting campaigns
│   ├── how-it-works/           # 3-step flow
│   ├── regions-grid/           # Target regions
│   ├── success-stories/        # Victory cards
│   └── [block-name]/
│       ├── block.json          # Block registration & attributes
│       ├── render.php          # Block rendering template
│       └── (optional) js/scss   # Block-specific code
├── template-parts/              # Optional template parts
├── functions.php               # Theme setup & block registration
├── index.php                   # Main template fallback
├── front-page.php              # Homepage template
├── page.php                    # Generic page template
├── header.php                  # Header template
├── footer.php                  # Footer template
├── theme.json                  # Gutenberg theme configuration
├── style.css                   # Theme metadata
└── README.md                   # This file

```

## Design System

### CSS Custom Properties (CSS Variables)

All colors, spacing, and sizing use CSS custom properties defined in `assets/css/main.css`:

```css
/* Colors */
--gm-purple: #a855f7
--gm-indigo: #6366f1
--gm-blue: #3b82f6
--gm-orange: #f97316
--gm-text-primary: #ffffff
--gm-text-secondary: #c7d5e0
--gm-bg-dark: #000000
--gm-bg-card: #1b2838

/* Spacing (8px scale) */
--gm-spacing-md: 1rem
--gm-spacing-lg: 1.5rem
--gm-spacing-xl: 2rem
--gm-spacing-2xl: 3rem
--gm-spacing-3xl: 4rem
--gm-spacing-4xl: 6rem

/* Shadows */
--gm-shadow-glow-purple: 0 0 20px rgba(168, 85, 247, 0.4)

/* Typography */
--gm-font-family-display: "Urbanist", "Montserrat", sans-serif
--gm-font-weight-bold: 700
--gm-font-weight-black: 900
```

### Color Palette

| Name | Hex | Usage |
|------|-----|-------|
| Purple | #a855f7 | Primary accent, buttons, glows |
| Indigo | #6366f1 | Secondary accent, gradients |
| Blue | #3b82f6 | Links, developer side |
| Orange | #f97316 | Player side accent |
| Dark Blue | #1b2838 | Card backgrounds |
| Dark Gray | #0f1419 | Section backgrounds |
| White | #ffffff | Primary text |
| Light Text | #c7d5e0 | Secondary text |
| Muted | #8f98a0 | Tertiary text |

## Gutenberg Blocks

### Available Blocks

1. **Hero** (`gm/hero`)
   - Full-width hero section with title, subtitle, buttons
   - Optional background image and gradient overlay
   - Used on Developers, Players, Privacy, Legal landing areas

2. **Services** (`gm/services`)
   - Grid of services with icons and descriptions
   - 4-column responsive grid
   - From Developers page

3. **FAQ** (`gm/faq`)
   - Accordion-style FAQ section
   - Keyboard accessible, ARIA-compliant
   - Used on Players page

4. **Call-to-Action** (`gm/cta`)
   - Centered CTA box with heading, description, button
   - Multiple background color options
   - Used for conversion sections

5. **Content Sections** (`gm/content-sections`)
   - Text-based content blocks with headings and body
   - For privacy policy, terms & legal pages
   - Supports full HTML content

6. **Two Paths** (`gm/two-paths`) [TODO]
   - Split screen landing page
   - Developer vs Player paths
   - Links to respective pages

7. **Services Gallery** (`gm/gallery-grid`) [TODO]
   - Responsive image grid
   - Hover effects and lightbox support

8. **Process Timeline** (`gm/process-timeline`) [TODO]
   - Horizontal process flow (5 steps)
   - Currently hidden in Developers page design

9. **Language Grid** (`gm/language-grid`) [TODO]  
   - Tag cloud of 12 supported languages
   - From Developers page

10. **Quote Form** (`gm/quote-form`) [TODO]
    - Contact form for quote requests
    - Name, studio, email, wordcount, languages, notes fields

11. **Campaigns Grid** (`gm/campaigns-grid`) [TODO]
    - 3-column grid of voting campaign cards
    - Shows vote progress, status, languages
    - From Players page

12. **How It Works** (`gm/how-it-works`) [TODO]
    - 3-step simple flow (Vote → Pitch → Track)
    - From Players page

13. **Regions Grid** (`gm/regions-grid`)  [TODO]
    - 4-column grid of target markets
    - Region, languages, player count data
    - From Players page

14. **Success Stories** (`gm/success-stories`) [TODO]
    - 3-column grid of localization victories
    - From Players page

### Block Usage in Pages

#### Front Page (Landing)
- Two Paths split screen

#### /developers
- Hero (Localization pitch)
- Why Us (3 trust points)
- Services (4 services)
- Gallery Grid (6 past projects)
- Languages (12 language tags)
- Quote Form

#### /players  
- Hero (Community pitch)
- Campaigns Grid (3 voting campaigns)
- How It Works (3-step flow)
- Regions Grid (4 regions)
- Success Stories (3 victories)
- FAQ (5 common questions)
- CTA (Join community)

#### /privacy
- Hero (Privacy header)
- Content Sections (Multiple legal sections)

#### /legal
- Hero (Legal header)  
- Content Sections (Terms, legal notice, disclaimers)

## Animations

### CSS Animations

All animations are in `assets/css/animations.css`:

- **Fade-in animations**: `fadeIn`, `fadeInUp`, `fadeInDown`, `fadeInLeft`, `fadeInRight`
- **Slide animations**: `slideInLeft`, `slideInRight`
- **Glow effects**: `glow`, `glowBlue`, `glowOrange` (pulsing)
- **Float & pulse**: Subtle movement for emphasis
- **Rotate**: Continuous 360° rotation for spinners

### Scroll Animations

JavaScript (`assets/js/animations.js`) uses `IntersectionObserver` to trigger animations:

```html
<!-- Element appears with fade-in when scrolled into view -->
<div class="scroll-fade-in animate-once"></div>

<!-- Element slides in from left -->
<div class="scroll-slide-in-left animate-once"></div>

<!-- Grid items stagger on appearance -->
<div class="stagger-container">
    <div class="stagger-item"></div>
    <div class="stagger-item"></div>
</div>
```

### Hover Effects

- `.hover-lift` - Lifts element on hover
- `.hover-scale` - Scales up on hover
- `.hover-glow` - Adds box-shadow glow
- `.hover-text-glow` - Glows text on hover

## Typography

### Fonts

- **Display**: Urbanist, Montserrat (900, 700 weights)
- **Body**: System fonts (-apple-system, Segoe UI, etc.)
- **Fallback**: Sans-serif stack for broad compatibility

### Font Sizes

- h1: clamp(2rem, 8vw, 5rem)
- h2: clamp(2rem, 6vw, 3.5rem)  
- h3: 3rem
- Body: 1rem
- Small: 0.875rem

## Responsive Design

### Breakpoints

- **2xl**: 1400px (wide-size)
- **xl**: 1200px (container max-width)
- **lg**: 768px
- **md**: 640px
- **sm**: 480px

Implemented via:
- CSS Grid with `repeat(auto-fit, minmax(...))`
- CSS Media queries
- `clamp()` for fluid typography

## Development

### Adding a New Block

1. Create block directory: `blocks/my-block/`
2. Create `block.json` with registration config
3. Create `render.php` with template
4. Register in `functions.php` (already done automatically)
5. Use in content via Gutenberg editor

Example `block.json`:
```json
{
  "apiVersion": 2,
  "name": "gm/my-block",
  "title": "My Block",
  "category": "formatting",
  "attributes": {
    "title": { "type": "string", "default": "" }
  }
}
```

Example `render.php`:
```php
<?php
$title = isset($attributes['title']) ? sanitize_text_field($attributes['title']) : '';
?>
<section class="my-block">
    <h2><?php echo esc_html($title); ?></h2>
</section>
```

### Customizing Styles

1. Colors: Modify CSS variables in `assets/css/main.css`
2. Animations: Edit keyframes in `assets/css/animations.css`
3. Responsive: Add media queries in respective stylesheets
4. Fonts: Update font-family variables or add Google Fonts

### Adding JavaScript

- Global scripts: `assets/js/main.js`
- Animation scripts: `assets/js/animations.js`
- Block-specific: Create `javascript/block-name.js` and enqueue

## WordPress Integration

### Custom Post Types

Can be extended for:
- Games (portfolio items)
- Campaigns (voting campaigns)
- Studios (client case studies)

### ACF Integration (Optional)

The intervaults reference theme uses ACF. This theme uses native attributes for simplicity, but can be extended to use ACF for admin UI.

### REST API

Can be extended for:
- Campaign data
- Statistics
- Contact form submissions

## Browser Support

- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Mobile browsers (iOS Safari 14+, Chrome Mobile)

CSS features used:
- CSS Grid
- CSS Variables
- `clamp()`, `min()`, `max()`
- Flexbox
- IntersectionObserver API

## Performance

- **Critical CSS**: Inline in header
- **Lazy Loading**: Images can use `loading="lazy"`
- **Code Splitting**: Animations.js only loads on scroll
- **Caching**: Browser cache headers via .htaccess (if using Apache)

## Accessibility

- ARIA labels on buttons and interactive elements
- Keyboard navigation support
- Focus states on all interactive elements
- Color contrast: WCAG AA compliant
- Semantic HTML: `<header>`, `<main>`, `<footer>`, `<section>`

## Deployment

1. Upload theme to `wp-content/themes/gamer-minds-theme/`
2. Activate in WordPress admin
3. Create pages matching templates
4. Add blocks via Gutenberg editor
5. Configure menus and options

## Future Enhancements

- [ ] Two Paths block (split screen landing)
- [ ] Services block visual editor
- [ ] Quote form backend processing
- [ ] Campaign voting system
- [ ] Discord integration
- [ ] Dark/Light mode toggle
- [ ] Contact form submission storage
- [ ] Advanced animation effects (GSAP integration)

## License

GPL v2 or later - Same as WordPress

## Support

For issues or feature requests, contact the development team.
