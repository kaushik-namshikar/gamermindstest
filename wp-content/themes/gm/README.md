README.md
=======

# Gamer Minds WordPress Theme

A custom Gutenberg block-based WordPress theme that replicates the design from a React/Figma project. This theme uses native WordPress blocks to create a pixel-perfect recreation of the original design.

## Features

- **Block-Based Architecture**: Each UI section is a reusable Gutenberg block
- **Pixel-Accurate Design**: Matches the React version exactly in visual fidelity
- **Responsive Design**: Full desktop and mobile support
- **Accessibility**: Proper heading hierarchy, ARIA labels, keyboard navigation
- **Performance**: Optimized CSS and JavaScript with minimal dependencies
- **Custom Design System**: Colors, typography, spacing, and animations from the original

## Theme Structure

```
gamer-minds-theme/
├── assets/
│   ├── css/
│   │   ├── style.css          # Main theme styles
│   │   └── blocks.css         # Block-specific styles
│   ├── js/
│   │   └── scripts.js         # Theme JavaScript
│   └── fonts/                 # Custom fonts
├── blocks/                    # Custom Gutenberg blocks
│   ├── gm-hero/               # Hero block
│   └── gm-services-grid/      # Services grid block
├── template-parts/            # Reusable template parts
│   ├── header.php
│   └── footer.php
├── functions.php              # Theme functions
├── theme.json                 # Global styles and settings
├── style.css                  # Theme header
├── index.php                  # Main template
├── front-page.php             # Front page template
├── page-developers.php        # Developers page template
├── page-players.php           # Players page template
├── header.php                 # Header wrapper
└── footer.php                 # Footer wrapper
```

## Installation

1. Download or clone this theme into your `wp-content/themes/` directory
2. Activate the theme in WordPress Admin > Appearance > Themes
3. Create a new page and use the Gutenberg editor to add Gamer Minds blocks

## Custom Blocks

### gm/hero
Full-screen hero section with two entry cards for Developers and Players.

### gm/services-grid
Responsive grid of service cards with icons, titles, and descriptions.

## Design System

The theme uses a custom design system extracted from the React version:

- **Colors**: Dark theme with blue and orange accents
- **Typography**: Inter font family with custom weights and sizes
- **Spacing**: Consistent spacing scale
- **Animations**: Smooth transitions and hover effects
- **Shadows**: Custom shadow system for depth

## Development

To modify the theme:

1. Edit CSS in `assets/css/style.css` and `assets/css/blocks.css`
2. Modify JavaScript in `assets/js/scripts.js`
3. Add new blocks in the `blocks/` directory
4. Update global styles in `theme.json`

## Browser Support

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## Accessibility

The theme follows WCAG 2.1 AA guidelines with:
- Proper semantic HTML
- Keyboard navigation support
- Screen reader compatibility
- Sufficient color contrast
- Focus management

## License

This theme is provided as-is for the specific project requirements.