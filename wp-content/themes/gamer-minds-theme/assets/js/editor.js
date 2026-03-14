/**
 * Gamer Minds — editor.js
 * All gm/ blocks are server-side rendered (save → null).
 * Each edit() shows a labelled placeholder in the canvas PLUS
 * an InspectorControls sidebar panel for editing block attributes.
 */
(function () {
  var registerBlockType  = wp.blocks.registerBlockType;
  var el                 = wp.element.createElement;
  var Fragment           = wp.element.Fragment;
  var InspectorControls  = wp.blockEditor.InspectorControls;
  var PanelBody          = wp.components.PanelBody;
  var TextControl        = wp.components.TextControl;
  var TextareaControl    = wp.components.TextareaControl;
  var SelectControl      = wp.components.SelectControl;

  /* ── shared canvas placeholder ───────────────────────────── */
  function placeholder(name, label, color) {
    color = color || '#a855f7';
    return el(
      'div',
      {
        style: {
          padding: '18px 20px',
          background: 'rgba(10,10,20,0.9)',
          border: '2px dashed ' + color,
          borderRadius: '8px',
          fontFamily: 'monospace',
          fontSize: '12px',
          lineHeight: '1.5',
        },
      },
      el('strong', { style: { color: color, display: 'block', marginBottom: '4px', fontSize: '13px' } }, name),
      el('span',   { style: { color: '#8f98a0' } }, label + ' — server-side rendered. Edit settings in the sidebar →')
    );
  }

  /* ── TextControl factory ──────────────────────────────────── */
  function tc(label, key, props) {
    return el(TextControl, {
      label: label,
      value: props.attributes[key] !== undefined ? props.attributes[key] : '',
      onChange: function (v) {
        var obj = {};
        obj[key] = v;
        props.setAttributes(obj);
      },
    });
  }

  /* ── TextareaControl factory ──────────────────────────────── */
  function tac(label, key, props) {
    return el(TextareaControl, {
      label: label,
      value: props.attributes[key] !== undefined ? props.attributes[key] : '',
      rows: 3,
      onChange: function (v) {
        var obj = {};
        obj[key] = v;
        props.setAttributes(obj);
      },
    });
  }

  /* ══════════════════════════════════════════════════════════
     LANDING HERO
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/landing-hero', {
    title: 'GM: Landing Hero',
    description: 'Full-screen two-path split hero (Landing page)',
    category: 'formatting',
    icon: 'screenoptions',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Developer Side', initialOpen: true },
            tc('Label (e.g. DEVELOPER)',       'devLabel',    props),
            tc('Subtitle',                      'devSubtitle', props),
            tc('CTA Button Text',               'devCta',      props)
          ),
          el(PanelBody, { title: 'Player Side', initialOpen: false },
            tc('Label (e.g. PLAYER)',           'playersLabel',    props),
            tc('Subtitle',                      'playersSubtitle', props),
            tc('CTA Button Text',               'playersCta',      props)
          ),
          el(PanelBody, { title: 'Center Overlay', initialOpen: false },
            tc('Main Title',                    'centerTitle',    props),
            tc('Subtitle',                      'centerSubtitle', props),
            tc('"Not sure?" Button Text',       'learnMoreText',  props)
          )
        ),
        placeholder('gm/landing-hero', 'Landing Hero — Two Path Split', '#7677ff')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     DEV HERO
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/dev-hero', {
    title: 'GM: Developers Hero',
    description: 'Two-column hero for the Studios/Developers page',
    category: 'formatting',
    icon: 'admin-home',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Hero Content', initialOpen: true },
            tc('Badge Text',                    'badge',        props),
            tc('Heading',                       'title',        props),
            tac('Description',                  'description',  props),
            tac('Info Box Text',                'infoText',     props)
          ),
          el(PanelBody, { title: 'CTA Buttons', initialOpen: false },
            tc('Primary CTA Label',             'ctaText',      props),
            tc('Email Button Label',            'emailLabel',   props),
            tc('Email Address',                 'emailAddress', props)
          ),
          el(PanelBody, { title: 'Hero Image', initialOpen: false },
            tc('Image URL',                     'heroImage',    props)
          )
        ),
        placeholder('gm/dev-hero', 'Developers Hero', '#a855f7')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     WHY US
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/why-us', {
    title: 'GM: Why Us',
    description: 'Value proposition + 3 benefit cards',
    category: 'formatting',
    icon: 'star-filled',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Section', initialOpen: true },
            tc('Heading',                       'heading',     props),
            tac('Proposition Text',             'proposition', props)
          ),
          el(PanelBody, { title: 'Card 1', initialOpen: false },
            tc('Title',                         'card1Title',  props),
            tac('Description',                  'card1Desc',   props)
          ),
          el(PanelBody, { title: 'Card 2', initialOpen: false },
            tc('Title',                         'card2Title',  props),
            tac('Description',                  'card2Desc',   props)
          ),
          el(PanelBody, { title: 'Card 3', initialOpen: false },
            tc('Title',                         'card3Title',  props),
            tac('Description',                  'card3Desc',   props)
          )
        ),
        placeholder('gm/why-us', 'Why Us — 3 Benefit Cards', '#a855f7')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     SERVICES
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/services', {
    title: 'GM: Services',
    description: 'Alternating service cards layout',
    category: 'formatting',
    icon: 'list-view',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Section', initialOpen: true },
            tc('Section Heading',               'heading',     props)
          )
        ),
        placeholder('gm/services', 'Services — Alternating Layout', '#a855f7')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     GAMES PORTFOLIO
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/games-portfolio', {
    title: 'GM: Games Portfolio',
    description: '6-column game cover grid',
    category: 'formatting',
    icon: 'grid-view',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Section', initialOpen: true },
            tc('Heading',                       'heading',     props),
            tc('Subheading',                    'subheading',  props)
          )
        ),
        placeholder('gm/games-portfolio', 'Games Portfolio — 6-column Grid', '#a855f7')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     PROCESS TIMELINE
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/process-timeline', {
    title: 'GM: Process Timeline',
    description: '5-step horizontal process flow',
    category: 'formatting',
    icon: 'editor-ol',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Section', initialOpen: true },
            tc('Section Heading',               'heading',     props)
          )
        ),
        placeholder('gm/process-timeline', 'Process Timeline — 5 Steps', '#a855f7')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     LANGUAGES
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/languages', {
    title: 'GM: Language Grid',
    description: 'Tag cloud of supported languages',
    category: 'formatting',
    icon: 'translation',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Languages', initialOpen: true },
            tc('Section Heading',               'heading',      props),
            tac('Language List (comma-separated)', 'languageList', props)
          )
        ),
        placeholder('gm/languages', 'Language Tag Grid', '#a855f7')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     QUOTE FORM
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/quote-form', {
    title: 'GM: Quote Form',
    description: 'AJAX quote request form for studios',
    category: 'formatting',
    icon: 'email-alt',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Form Copy', initialOpen: true },
            tc('Heading',                       'heading',     props),
            tc('Subheading',                    'subheading',  props),
            tc('Disclaimer Text',               'disclaimer',  props)
          )
        ),
        placeholder('gm/quote-form', 'Quote Request Form', '#a855f7')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     PLAYERS HERO
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/players-hero', {
    title: 'GM: Players Hero',
    description: 'Community hero with stats (Players page)',
    category: 'formatting',
    icon: 'groups',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Hero Content', initialOpen: true },
            tc('Member Count Badge',            'memberCount',  props),
            tc('Title',                         'title',        props),
            tac('Description',                  'description',  props)
          ),
          el(PanelBody, { title: 'Buttons', initialOpen: false },
            tc('Browse Campaigns Label',        'browseLabel',  props),
            tc('Discord Button Label',          'discordLabel', props)
          ),
          el(PanelBody, { title: 'Stats', initialOpen: false },
            tc('Stat 1 (campaigns)',            'stat1',        props),
            tc('Stat 2 (languages)',            'stat2',        props),
            tc('Stat 3 (members)',              'stat3',        props)
          )
        ),
        placeholder('gm/players-hero', 'Players Hero', '#66c0f4')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     CAMPAIGNS
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/campaigns', {
    title: 'GM: Active Campaigns',
    description: '3-column campaign cards with vote UI',
    category: 'formatting',
    icon: 'megaphone',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Section', initialOpen: true },
            tc('Heading',                       'heading',     props),
            tc('Subheading',                    'subheading',  props),
            tc('"View All" Button Text',        'viewAllText', props)
          )
        ),
        placeholder('gm/campaigns', 'Active Campaigns — 3 Cards', '#66c0f4')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     HOW IT WORKS
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/how-it-works', {
    title: 'GM: How It Works',
    description: '3-step process for players',
    category: 'formatting',
    icon: 'info',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Section', initialOpen: true },
            tc('Heading',                       'heading',    props),
            tc('Subheading',                    'subheading', props)
          ),
          el(PanelBody, { title: 'Step 1', initialOpen: false },
            tc('Title',                         'step1Title', props),
            tac('Description',                  'step1Desc',  props)
          ),
          el(PanelBody, { title: 'Step 2', initialOpen: false },
            tc('Title',                         'step2Title', props),
            tac('Description',                  'step2Desc',  props)
          ),
          el(PanelBody, { title: 'Step 3', initialOpen: false },
            tc('Title',                         'step3Title', props),
            tac('Description',                  'step3Desc',  props)
          )
        ),
        placeholder('gm/how-it-works', 'How It Works — 3 Steps', '#66c0f4')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     REGIONS
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/regions', {
    title: 'GM: Regions / Markets',
    description: '4-column market region cards',
    category: 'formatting',
    icon: 'location',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Section', initialOpen: true },
            tc('Heading',                       'heading',    props),
            tc('Subheading',                    'subheading', props)
          )
        ),
        placeholder('gm/regions', 'Regions / Markets — 4 Cards', '#66c0f4')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     SUCCESS STORIES
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/success-stories', {
    title: 'GM: Success Stories',
    description: 'Victory/shipped game cards',
    category: 'formatting',
    icon: 'awards',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Section', initialOpen: true },
            tc('Heading',                       'heading',    props),
            tc('Subheading',                    'subheading', props)
          )
        ),
        placeholder('gm/success-stories', 'Success Stories — Cards', '#66c0f4')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     DISCORD CTA
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/discord-cta', {
    title: 'GM: Discord CTA',
    description: 'Community join call-to-action section',
    category: 'formatting',
    icon: 'share',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'CTA Content', initialOpen: true },
            tac('Heading',                      'heading',     props),
            tac('Description',                  'description', props),
            tc('Button Label',                  'ctaLabel',    props)
          )
        ),
        placeholder('gm/discord-cta', 'Discord CTA', '#66c0f4')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     FAQ
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/faq', {
    title: 'GM: FAQ Accordion',
    description: 'Accordion FAQ section',
    category: 'formatting',
    icon: 'editor-help',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Section', initialOpen: true },
            tc('Heading',                       'heading',    props),
            tc('Subheading',                    'subheading', props)
          )
        ),
        placeholder('gm/faq', 'FAQ Accordion', '#66c0f4')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     POLICY HEADER
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/policy-header', {
    title: 'GM: Policy Header',
    description: 'Header for Privacy/Legal pages',
    category: 'formatting',
    icon: 'shield',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Settings', initialOpen: true },
            el(SelectControl, {
              label: 'Page Variant',
              value: props.attributes.variant || 'privacy',
              options: [
                { label: 'Privacy Policy', value: 'privacy' },
                { label: 'Terms & Legal',  value: 'legal'   },
              ],
              onChange: function (v) { props.setAttributes({ variant: v }); },
            }),
            tc('Last Updated Date',             'date',    props)
          )
        ),
        placeholder('gm/policy-header', 'Policy Page Header', '#a855f7')
      );
    },
    save: function () { return null; },
  });

  /* ══════════════════════════════════════════════════════════
     POLICY CONTENT
     ══════════════════════════════════════════════════════════ */
  registerBlockType('gm/policy-content', {
    title: 'GM: Policy Content',
    description: 'Legal content sections card',
    category: 'formatting',
    icon: 'media-document',
    edit: function (props) {
      return el(Fragment, null,
        el(InspectorControls, null,
          el(PanelBody, { title: 'Settings', initialOpen: true },
            el(SelectControl, {
              label: 'Page Variant',
              value: props.attributes.variant || 'privacy',
              options: [
                { label: 'Privacy Policy', value: 'privacy' },
                { label: 'Terms & Legal',  value: 'legal'   },
              ],
              onChange: function (v) { props.setAttributes({ variant: v }); },
            })
          )
        ),
        placeholder('gm/policy-content', 'Policy Content Sections', '#a855f7')
      );
    },
    save: function () { return null; },
  });

})();
