/**
 * Gamer Minds — Gutenberg Block Editor
 *
 * All 17 custom blocks registered with:
 *  - ServerSideRender for WYSIWYG live preview (frontend HTML in the editor)
 *  - InspectorControls sidebars for all editable fields
 *  - MediaUpload for image selection via WordPress Media Library
 *  - RangeControl / ToggleControl for numeric and boolean settings
 */
(function() {
    'use strict';

    var el                = wp.element.createElement;
    var Fragment          = wp.element.Fragment;
    var registerBlockType = wp.blocks.registerBlockType;
    var ServerSideRender  = wp.serverSideRender;

    // Block Editor components
    var InspectorControls = wp.blockEditor.InspectorControls;
    var MediaUpload       = wp.blockEditor.MediaUpload;
    var MediaUploadCheck  = wp.blockEditor.MediaUploadCheck;

    // UI Components
    var PanelBody     = wp.components.PanelBody;
    var TextControl   = wp.components.TextControl;
    var TextareaControl = wp.components.TextareaControl;
    var RangeControl  = wp.components.RangeControl;
    var ToggleControl = wp.components.ToggleControl;
    var SelectControl = wp.components.SelectControl;
    var Button        = wp.components.Button;
    var Notice        = wp.components.Notice;

    // ─────────────────────────────────────────────────────────────────────────
    // HELPERS
    // ─────────────────────────────────────────────────────────────────────────

    /** Standard text field row */
    function txt(label, attr, props, placeholder) {
        return el(TextControl, {
            label: label,
            value: props.attributes[attr] || '',
            placeholder: placeholder || '',
            onChange: function(v) { var u = {}; u[attr] = v; props.setAttributes(u); }
        });
    }

    /** Standard textarea row */
    function area(label, attr, props, rows) {
        return el(TextareaControl, {
            label: label,
            value: props.attributes[attr] || '',
            rows: rows || 3,
            onChange: function(v) { var u = {}; u[attr] = v; props.setAttributes(u); }
        });
    }

    /** MediaUpload image selector */
    function imgPicker(label, attr, props) {
        var currentUrl = props.attributes[attr] || '';
        return el(MediaUploadCheck, null,
            el('div', { style: { marginBottom: '16px' } },
                el('p', { style: { fontWeight: '600', marginBottom: '8px', fontSize: '11px', textTransform: 'uppercase', color: '#1e1e1e' } }, label),
                currentUrl && el('img', {
                    src: currentUrl,
                    style: { width: '100%', maxHeight: '120px', objectFit: 'cover', marginBottom: '8px', borderRadius: '4px' }
                }),
                el(MediaUpload, {
                    onSelect: function(media) { var u = {}; u[attr] = media.url; props.setAttributes(u); },
                    allowedTypes: ['image'],
                    value: currentUrl,
                    render: function(ref) {
                        return el(Button, {
                            onClick: ref.open,
                            variant: currentUrl ? 'secondary' : 'primary',
                            style: { marginRight: '8px' }
                        }, currentUrl ? 'Change Image' : 'Select Image');
                    }
                }),
                currentUrl && el(Button, {
                    onClick: function() { var u = {}; u[attr] = ''; props.setAttributes(u); },
                    variant: 'link',
                    isDestructive: true
                }, 'Remove')
            )
        );
    }

    /** Live SSR preview wrapper */
    function preview(blockName, props) {
        return el(ServerSideRender, {
            block: blockName,
            attributes: props.attributes,
            EmptyResponsePlaceholder: function() {
                return el('div', { style: { padding: '20px', textAlign: 'center', color: '#999', border: '1px dashed #ccc', borderRadius: '4px' } },
                    'Loading preview...'
                );
            }
        });
    }

    // ─────────────────────────────────────────────────────────────────────────
    // 1. LANDING HERO
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/landing-hero', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Center Panel', initialOpen: true },
                        txt('Main Title', 'centerTitle', props),
                        txt('Subtitle', 'centerSubtitle', props),
                        txt('"Learn More" Button Text', 'learnMoreText', props)
                    ),
                    el(PanelBody, { title: 'Developer Path', initialOpen: false },
                        txt('Label', 'devLabel', props),
                        txt('Subtitle', 'devSubtitle', props),
                        txt('CTA Button Text', 'devCta', props)
                    ),
                    el(PanelBody, { title: 'Player Path', initialOpen: false },
                        txt('Label', 'playersLabel', props),
                        txt('Subtitle', 'playersSubtitle', props),
                        txt('CTA Button Text', 'playersCta', props)
                    )
                ),
                preview('gm/landing-hero', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 2. DEV HERO
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/dev-hero', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Hero Image', initialOpen: true },
                        imgPicker('Hero Image', 'heroImage', props),
                        txt('Image Alt Text', 'heroImageAlt', props)
                    ),
                    el(PanelBody, { title: 'Content', initialOpen: false },
                        txt('Badge Text', 'badge', props),
                        txt('Title (Line 1)', 'title', props),
                        txt('Title Accent (Line 2, gradient)', 'titleAccent', props),
                        area('Description', 'description', props),
                        area('Info Box Text', 'infoText', props)
                    ),
                    el(PanelBody, { title: 'Buttons', initialOpen: false },
                        txt('CTA Button Text', 'ctaText', props),
                        txt('Email Button Label', 'emailLabel', props),
                        txt('Email Address', 'emailAddress', props, 'hello@example.com')
                    )
                ),
                preview('gm/dev-hero', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 3. WHY US
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/why-us', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section', initialOpen: true },
                        txt('Heading', 'heading', props),
                        area('Value Proposition', 'proposition', props)
                    ),
                    el(PanelBody, { title: 'Card 1', initialOpen: false },
                        txt('Title', 'card1Title', props),
                        area('Description', 'card1Desc', props)
                    ),
                    el(PanelBody, { title: 'Card 2', initialOpen: false },
                        txt('Title', 'card2Title', props),
                        area('Description', 'card2Desc', props)
                    ),
                    el(PanelBody, { title: 'Card 3', initialOpen: false },
                        txt('Title', 'card3Title', props),
                        area('Description', 'card3Desc', props)
                    )
                ),
                preview('gm/why-us', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 4. SERVICES  (CPT-driven)
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/services', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section Settings', initialOpen: true },
                        txt('Heading', 'heading', props),
                        txt('Subheading', 'subheading', props),
                        el(RangeControl, {
                            label: 'Max Services to Show (-1 = all)',
                            value: props.attributes.postsPerPage || -1,
                            min: -1, max: 20, step: 1,
                            onChange: function(v) { props.setAttributes({ postsPerPage: v }); }
                        })
                    ),
                    el(PanelBody, { title: 'Manage Content', initialOpen: false },
                        el('p', { style: { fontSize: '12px', color: '#666', lineHeight: '1.5' } },
                            'Services are managed as Custom Post Types. '
                        ),
                        el(Button, {
                            variant: 'secondary',
                            href: '/wp-admin/edit.php?post_type=gm_service',
                            target: '_blank',
                            style: { marginTop: '8px' }
                        }, 'Manage Services →')
                    )
                ),
                preview('gm/services', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 5. GAMES PORTFOLIO  (CPT-driven)
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/games-portfolio', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section Settings', initialOpen: true },
                        txt('Heading', 'heading', props),
                        txt('Subheading', 'subheading', props),
                        el(RangeControl, {
                            label: 'Max Games to Show',
                            value: props.attributes.postsPerPage || 6,
                            min: 1, max: 24, step: 1,
                            onChange: function(v) { props.setAttributes({ postsPerPage: v }); }
                        }),
                        el(ToggleControl, {
                            label: 'Featured Games Only',
                            checked: props.attributes.featuredOnly || false,
                            onChange: function(v) { props.setAttributes({ featuredOnly: v }); }
                        })
                    ),
                    el(PanelBody, { title: 'Manage Games', initialOpen: false },
                        el(Button, {
                            variant: 'secondary',
                            href: '/wp-admin/edit.php?post_type=gm_game',
                            target: '_blank'
                        }, 'Manage Games →'),
                        el(Button, {
                            variant: 'primary',
                            href: '/wp-admin/post-new.php?post_type=gm_game',
                            target: '_blank',
                            style: { marginTop: '8px' }
                        }, '+ Add New Game')
                    )
                ),
                preview('gm/games-portfolio', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 6. PROCESS TIMELINE
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/process-timeline', {
        edit: function(props) {
            var steps = [
                { t: 'step1Title', d: 'step1Desc', label: 'Step 1: Scope' },
                { t: 'step2Title', d: 'step2Desc', label: 'Step 2: Prep' },
                { t: 'step3Title', d: 'step3Desc', label: 'Step 3: Translate' },
                { t: 'step4Title', d: 'step4Desc', label: 'Step 4: LQA' },
                { t: 'step5Title', d: 'step5Desc', label: 'Step 5: Deliver' },
            ];
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section', initialOpen: true },
                        txt('Heading', 'heading', props),
                        txt('Subheading', 'subheading', props)
                    ),
                    steps.map(function(s) {
                        return el(PanelBody, { title: s.label, initialOpen: false, key: s.t },
                            txt('Title', s.t, props),
                            area('Description', s.d, props)
                        );
                    })
                ),
                preview('gm/process-timeline', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 7. LANGUAGES  (CPT-driven)
    // ───────────────────────���─────────────────────────────────────────────────
    registerBlockType('gm/languages', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section Settings', initialOpen: true },
                        txt('Heading', 'heading', props)
                    ),
                    el(PanelBody, { title: 'Manage Languages', initialOpen: false },
                        el('p', { style: { fontSize: '12px', color: '#666', marginBottom: '8px' } },
                            'Languages are managed as Custom Post Types. The fallback list below is used when no language posts exist.'
                        ),
                        area('Fallback Language List (comma-separated)', 'languageList', props, 4),
                        el(Button, {
                            variant: 'secondary',
                            href: '/wp-admin/edit.php?post_type=gm_language',
                            target: '_blank',
                            style: { marginTop: '8px' }
                        }, 'Manage Languages →')
                    )
                ),
                preview('gm/languages', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 8. QUOTE FORM
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/quote-form', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Email Recipient', initialOpen: true },
                        el('p', { style: { fontSize: '12px', color: '#757575', marginBottom: '8px', lineHeight: '1.5' } },
                            'Quote submissions are sent to this address. Leave blank to use the WordPress admin email.'
                        ),
                        txt('Send Quotes To (email)', 'toEmail', props, 'hello@yourstudio.com')
                    ),
                    el(PanelBody, { title: 'Form Copy', initialOpen: false },
                        txt('Heading', 'heading', props),
                        txt('Subheading', 'subheading', props),
                        txt('Submit Button Text', 'submitText', props),
                        area('Success Message', 'successMessage', props),
                        txt('Disclaimer Text', 'disclaimer', props)
                    )
                ),
                preview('gm/quote-form', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 9. PLAYERS HERO
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/players-hero', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Hero Content', initialOpen: true },
                        txt('Member Count Badge', 'memberCount', props, '5,247 members online'),
                        txt('Main Title', 'title', props),
                        txt('Highlighted Span (blue text)', 'titleSpan', props),
                        area('Description', 'description', props)
                    ),
                    el(PanelBody, { title: 'Buttons', initialOpen: false },
                        txt('Browse Button Label', 'browseLabel', props),
                        txt('Browse Button Link', 'browseLink', props, '#campaigns'),
                        txt('Discord Button Label', 'discordLabel', props),
                        txt('Discord Button Link', 'discordLink', props, 'https://discord.gg/...')
                    ),
                    el(PanelBody, { title: 'Stats', initialOpen: false },
                        txt('Stat 1', 'stat1', props, '25 successful campaigns'),
                        txt('Stat 2', 'stat2', props, '40+ languages'),
                        txt('Stat 3', 'stat3', props, '5,000+ members')
                    )
                ),
                preview('gm/players-hero', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 10. CAMPAIGNS  (CPT-driven)
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/campaigns', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section Settings', initialOpen: true },
                        txt('Heading', 'heading', props),
                        txt('Subheading', 'subheading', props),
                        txt('"View All" Button Text', 'viewAllText', props),
                        el(RangeControl, {
                            label: 'Campaigns to Show',
                            value: props.attributes.postsPerPage || 3,
                            min: 1, max: 12, step: 1,
                            onChange: function(v) { props.setAttributes({ postsPerPage: v }); }
                        })
                    ),
                    el(PanelBody, { title: 'Manage Campaigns', initialOpen: false },
                        el(Button, {
                            variant: 'secondary',
                            href: '/wp-admin/edit.php?post_type=gm_campaign',
                            target: '_blank'
                        }, 'Manage Campaigns →'),
                        el(Button, {
                            variant: 'primary',
                            href: '/wp-admin/post-new.php?post_type=gm_campaign',
                            target: '_blank',
                            style: { marginTop: '8px' }
                        }, '+ Add New Campaign')
                    )
                ),
                preview('gm/campaigns', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 11. HOW IT WORKS
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/how-it-works', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section', initialOpen: true },
                        txt('Heading', 'heading', props),
                        txt('Subheading', 'subheading', props)
                    ),
                    el(PanelBody, { title: 'Step 1', initialOpen: false },
                        txt('Title', 'step1Title', props),
                        area('Description', 'step1Desc', props)
                    ),
                    el(PanelBody, { title: 'Step 2', initialOpen: false },
                        txt('Title', 'step2Title', props),
                        area('Description', 'step2Desc', props)
                    ),
                    el(PanelBody, { title: 'Step 3', initialOpen: false },
                        txt('Title', 'step3Title', props),
                        area('Description', 'step3Desc', props)
                    )
                ),
                preview('gm/how-it-works', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 12. REGIONS
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/regions', {
        edit: function(props) {
            var regions = [
                { n: 1, label: 'Region 1' },
                { n: 2, label: 'Region 2' },
                { n: 3, label: 'Region 3' },
                { n: 4, label: 'Region 4' },
            ];
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section', initialOpen: true },
                        txt('Heading', 'heading', props),
                        txt('Subheading', 'subheading', props)
                    ),
                    regions.map(function(r) {
                        return el(PanelBody, { title: r.label, initialOpen: false, key: r.n },
                            txt('Region Name',    'region' + r.n + 'Name',    props),
                            txt('Code Badge',     'region' + r.n + 'Code',    props, 'LATAM'),
                            txt('Languages',      'region' + r.n + 'Langs',   props, 'PT-BR, ES'),
                            txt('Player Count',   'region' + r.n + 'Players', props, '120M+'),
                            txt('Flag Emoji',     'region' + r.n + 'Flag',    props, '🌎')
                        );
                    })
                ),
                preview('gm/regions', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 13. SUCCESS STORIES
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/success-stories', {
        edit: function(props) {
            var stories = [
                { n: 1, label: 'Story 1' },
                { n: 2, label: 'Story 2' },
                { n: 3, label: 'Story 3' },
            ];
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section', initialOpen: true },
                        txt('Heading', 'heading', props),
                        txt('Subheading', 'subheading', props)
                    ),
                    stories.map(function(s) {
                        return el(PanelBody, { title: s.label, initialOpen: false, key: s.n },
                            txt('Game Title',   'story' + s.n + 'Title',   props),
                            txt('Genre',        'story' + s.n + 'Genre',   props),
                            txt('Outcome',      'story' + s.n + 'Outcome', props),
                            txt('Languages',    'story' + s.n + 'Langs',   props),
                            txt('Impact',       'story' + s.n + 'Impact',  props),
                            txt('Vote Count',   'story' + s.n + 'Votes',   props, '4,200'),
                            txt('Timeframe',    'story' + s.n + 'Time',    props, '3 months')
                        );
                    })
                ),
                preview('gm/success-stories', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 14. DISCORD CTA
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/discord-cta', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'CTA Content', initialOpen: true },
                        txt('Heading', 'heading', props),
                        area('Description', 'description', props),
                        txt('Button Label', 'ctaLabel', props),
                        txt('Button Link (Discord URL)', 'ctaLink', props, 'https://discord.gg/...')
                    )
                ),
                preview('gm/discord-cta', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 15. FAQ  (CPT-driven)
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/faq', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Section Settings', initialOpen: true },
                        txt('Heading', 'heading', props),
                        txt('Subheading', 'subheading', props)
                    ),
                    el(PanelBody, { title: 'Manage FAQ Items', initialOpen: false },
                        el('p', { style: { fontSize: '12px', color: '#666', marginBottom: '8px', lineHeight: '1.5' } },
                            'FAQ items are managed as Custom Post Types. Use the post title as the question and post content as the answer. Order by "Menu Order" in Quick Edit.'
                        ),
                        el(Button, {
                            variant: 'secondary',
                            href: '/wp-admin/edit.php?post_type=gm_faq',
                            target: '_blank'
                        }, 'Manage FAQ Items →'),
                        el(Button, {
                            variant: 'primary',
                            href: '/wp-admin/post-new.php?post_type=gm_faq',
                            target: '_blank',
                            style: { marginTop: '8px' }
                        }, '+ Add FAQ Item')
                    )
                ),
                preview('gm/faq', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 16. POLICY HEADER
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/policy-header', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Policy Header', initialOpen: true },
                        el(SelectControl, {
                            label: 'Page Variant',
                            value: props.attributes.variant || 'privacy',
                            options: [
                                { label: 'Privacy Policy', value: 'privacy' },
                                { label: 'Terms & Legal', value: 'legal' }
                            ],
                            onChange: function(v) { props.setAttributes({ variant: v }); }
                        }),
                        txt('Last Updated Date', 'date', props, 'Last updated: March 2, 2026')
                    )
                ),
                preview('gm/policy-header', props)
            );
        },
        save: function() { return null; }
    });

    // ─────────────────────────────────────────────────────────────────────────
    // 17. POLICY CONTENT
    // ─────────────────────────────────────────────────────────────────────────
    registerBlockType('gm/policy-content', {
        edit: function(props) {
            return el(Fragment, null,
                el(InspectorControls, null,
                    el(PanelBody, { title: 'Policy Content', initialOpen: true },
                        el(SelectControl, {
                            label: 'Page Variant',
                            value: props.attributes.variant || 'privacy',
                            options: [
                                { label: 'Privacy Policy', value: 'privacy' },
                                { label: 'Terms & Legal', value: 'legal' }
                            ],
                            onChange: function(v) { props.setAttributes({ variant: v }); }
                        }),
                        el('p', { style: { fontSize: '12px', color: '#666', lineHeight: '1.5', marginTop: '8px' } },
                            'To edit the policy text, modify the render.php file or contact your developer to convert this to a Gutenberg native text block.'
                        )
                    )
                ),
                preview('gm/policy-content', props)
            );
        },
        save: function() { return null; }
    });

}());
