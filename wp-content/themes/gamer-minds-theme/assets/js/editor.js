/**
 * Gamer Minds — editor.js
 * Registers all gm/ blocks in the Gutenberg block inserter.
 * Each block is server-side rendered (save returns null).
 * The edit() function shows a labelled placeholder in the editor canvas.
 */
(function () {
  var registerBlockType = wp.blocks.registerBlockType;
  var el = wp.element.createElement;

  // Shared editor preview renderer
  function makeEdit(name, label, color) {
    color = color || '#a855f7';
    return function () {
      return el(
        'div',
        {
          style: {
            padding: '18px 20px',
            background: 'rgba(10,10,20,0.9)',
            border: '1px dashed ' + color,
            borderRadius: '8px',
            fontFamily: 'monospace',
            fontSize: '12px',
            lineHeight: '1.5',
          },
        },
        el('strong', { style: { color: color, display: 'block', marginBottom: '4px' } }, name),
        el('span', { style: { color: '#8f98a0' } }, label + ' — server-side rendered')
      );
    };
  }

  var blocks = [
    // Landing
    {
      name: 'gm/landing-hero',
      title: 'GM: Landing Hero',
      description: 'Full-screen two-path split hero (Landing page)',
      icon: 'screenoptions',
      color: '#7677ff',
    },
    // Developers
    {
      name: 'gm/dev-hero',
      title: 'GM: Developers Hero',
      description: 'Two-column hero for the Studios/Developers page',
      icon: 'admin-home',
      color: '#a855f7',
    },
    {
      name: 'gm/why-us',
      title: 'GM: Why Us',
      description: 'Value proposition + 3 benefit cards',
      icon: 'star-filled',
      color: '#a855f7',
    },
    {
      name: 'gm/services',
      title: 'GM: Services',
      description: 'Alternating service cards layout',
      icon: 'list-view',
      color: '#a855f7',
    },
    {
      name: 'gm/games-portfolio',
      title: 'GM: Games Portfolio',
      description: '6-column game cover grid',
      icon: 'grid-view',
      color: '#a855f7',
    },
    {
      name: 'gm/process-timeline',
      title: 'GM: Process Timeline',
      description: '5-step horizontal process flow',
      icon: 'editor-ol',
      color: '#a855f7',
    },
    {
      name: 'gm/languages',
      title: 'GM: Language Grid',
      description: 'Tag cloud of supported languages',
      icon: 'translation',
      color: '#a855f7',
    },
    {
      name: 'gm/quote-form',
      title: 'GM: Quote Form',
      description: 'AJAX quote request form for studios',
      icon: 'email-alt',
      color: '#a855f7',
    },
    // Players
    {
      name: 'gm/players-hero',
      title: 'GM: Players Hero',
      description: 'Community hero with stats (Players page)',
      icon: 'groups',
      color: '#66c0f4',
    },
    {
      name: 'gm/campaigns',
      title: 'GM: Active Campaigns',
      description: '3-column campaign cards with vote UI',
      icon: 'megaphone',
      color: '#66c0f4',
    },
    {
      name: 'gm/how-it-works',
      title: 'GM: How It Works',
      description: '3-step process for players',
      icon: 'info',
      color: '#66c0f4',
    },
    {
      name: 'gm/regions',
      title: 'GM: Regions / Markets',
      description: '4-column market region cards',
      icon: 'location',
      color: '#66c0f4',
    },
    {
      name: 'gm/success-stories',
      title: 'GM: Success Stories',
      description: 'Victory/shipped game cards',
      icon: 'awards',
      color: '#66c0f4',
    },
    {
      name: 'gm/discord-cta',
      title: 'GM: Discord CTA',
      description: 'Community join call-to-action section',
      icon: 'share',
      color: '#66c0f4',
    },
    {
      name: 'gm/faq',
      title: 'GM: FAQ Accordion',
      description: 'Accordion FAQ section',
      icon: 'editor-help',
      color: '#66c0f4',
    },
    // Shared
    {
      name: 'gm/policy-header',
      title: 'GM: Policy Header',
      description: 'Header for Privacy/Legal pages',
      icon: 'shield',
      color: '#a855f7',
    },
    {
      name: 'gm/policy-content',
      title: 'GM: Policy Content',
      description: 'Legal content sections card',
      icon: 'media-document',
      color: '#a855f7',
    },
  ];

  blocks.forEach(function (block) {
    registerBlockType(block.name, {
      title: block.title,
      description: block.description || '',
      category: 'formatting',
      icon: block.icon || 'screenoptions',
      keywords: ['gamer minds', 'gm'],
      edit: makeEdit(block.name, block.title, block.color),
      save: function () {
        return null; // server-side rendered
      },
    });
  });
})();
