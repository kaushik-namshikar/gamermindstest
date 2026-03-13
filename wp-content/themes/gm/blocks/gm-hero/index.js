( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText, InspectorControls } = wp.blockEditor;
  const { PanelBody, TextControl } = wp.components;

  registerBlockType( 'gm/hero', {
    title: __( 'Hero (Split Paths)', 'gamer-minds-theme' ),
    description: __( 'A full-screen hero section with two entry cards for Developers and Players.', 'gamer-minds-theme' ),
    icon: 'star-filled',
    category: 'gm',
    supports: {
      html: false,
      align: [ 'full', 'wide' ],
    },

    edit: function ( props ) {
      const {
        attributes: {
          leftTitle,
          leftSubtitle,
          leftLabel,
          leftUrl,
          rightTitle,
          rightSubtitle,
          rightLabel,
          rightUrl,
        },
        setAttributes,
        className,
      } = props;

      const rootClass = ( className || '' ) + ' gm-hero gm-fade-in';

      return (
        wp.element.createElement( 'div', { className: rootClass },
          wp.element.createElement( InspectorControls, null,
            wp.element.createElement( PanelBody, {
              title: __( 'Links', 'gamer-minds-theme' ),
              initialOpen: true,
            },
              wp.element.createElement( TextControl, {
                label: __( 'Developer Path URL', 'gamer-minds-theme' ),
                value: leftUrl,
                onChange: ( value ) => setAttributes( { leftUrl: value } ),
                placeholder: '#developers',
              } ),
              wp.element.createElement( TextControl, {
                label: __( 'Player Path URL', 'gamer-minds-theme' ),
                value: rightUrl,
                onChange: ( value ) => setAttributes( { rightUrl: value } ),
                placeholder: '#players',
              } )
            )
          ),

          wp.element.createElement( 'div', { className: 'gm-hero__background' } ),
          wp.element.createElement( 'div', { className: 'gm-hero__inner' },
            wp.element.createElement( 'div', { className: 'gm-hero__card gm-hero__card--left' },
              wp.element.createElement( 'div', { className: 'gm-hero__card-content' },
                wp.element.createElement( RichText, {
                  tagName: 'h2',
                  className: 'gm-hero__title',
                  value: leftTitle,
                  onChange: ( value ) => setAttributes( { leftTitle: value } ),
                  placeholder: __( 'DEVELOPER', 'gamer-minds-theme' ),
                } ),
                wp.element.createElement( RichText, {
                  tagName: 'p',
                  className: 'gm-hero__subtitle',
                  value: leftSubtitle,
                  onChange: ( value ) => setAttributes( { leftSubtitle: value } ),
                  placeholder: __( 'Professional Localization', 'gamer-minds-theme' ),
                } ),
                wp.element.createElement( 'a', {
                  className: 'gm-hero__cta',
                  href: leftUrl || '#',
                },
                  wp.element.createElement( RichText, {
                    tagName: 'span',
                    value: leftLabel,
                    onChange: ( value ) => setAttributes( { leftLabel: value } ),
                    placeholder: __( 'ENTER', 'gamer-minds-theme' ),
                  } ),
                  wp.element.createElement( 'span', { className: 'gm-hero__cta-icon' }, '→' )
                )
              )
            ),
            wp.element.createElement( 'div', { className: 'gm-hero__card gm-hero__card--right' },
              wp.element.createElement( 'div', { className: 'gm-hero__card-content' },
                wp.element.createElement( RichText, {
                  tagName: 'h2',
                  className: 'gm-hero__title',
                  value: rightTitle,
                  onChange: ( value ) => setAttributes( { rightTitle: value } ),
                  placeholder: __( 'PLAYER', 'gamer-minds-theme' ),
                } ),
                wp.element.createElement( RichText, {
                  tagName: 'p',
                  className: 'gm-hero__subtitle',
                  value: rightSubtitle,
                  onChange: ( value ) => setAttributes( { rightSubtitle: value } ),
                  placeholder: __( 'Voice & Community', 'gamer-minds-theme' ),
                } ),
                wp.element.createElement( 'a', {
                  className: 'gm-hero__cta',
                  href: rightUrl || '#',
                },
                  wp.element.createElement( RichText, {
                    tagName: 'span',
                    value: rightLabel,
                    onChange: ( value ) => setAttributes( { rightLabel: value } ),
                    placeholder: __( 'ENTER', 'gamer-minds-theme' ),
                  } ),
                  wp.element.createElement( 'span', { className: 'gm-hero__cta-icon' }, '→' )
                )
              )
            )
          )
        )
      );
    },

    save: function ( props ) {
      const {
        attributes: {
          leftTitle,
          leftSubtitle,
          leftLabel,
          leftUrl,
          rightTitle,
          rightSubtitle,
          rightLabel,
          rightUrl,
        },
        className,
      } = props;

      const rootClass = ( className || '' ) + ' gm-hero';

      return (
        wp.element.createElement( 'div', { className: rootClass },
          wp.element.createElement( 'div', { className: 'gm-hero__background' } ),
          wp.element.createElement( 'div', { className: 'gm-hero__inner' },
            wp.element.createElement( 'div', { className: 'gm-hero__card gm-hero__card--left' },
              wp.element.createElement( 'div', { className: 'gm-hero__card-content' },
                wp.element.createElement( 'h2', { className: 'gm-hero__title' }, leftTitle ),
                wp.element.createElement( 'p', { className: 'gm-hero__subtitle' }, leftSubtitle ),
                wp.element.createElement( 'a', {
                  className: 'gm-hero__cta',
                  href: leftUrl || '#',
                },
                  wp.element.createElement( 'span', null, leftLabel ),
                  wp.element.createElement( 'span', { className: 'gm-hero__cta-icon' }, '→' )
                )
              )
            ),
            wp.element.createElement( 'div', { className: 'gm-hero__card gm-hero__card--right' },
              wp.element.createElement( 'div', { className: 'gm-hero__card-content' },
                wp.element.createElement( 'h2', { className: 'gm-hero__title' }, rightTitle ),
                wp.element.createElement( 'p', { className: 'gm-hero__subtitle' }, rightSubtitle ),
                wp.element.createElement( 'a', {
                  className: 'gm-hero__cta',
                  href: rightUrl || '#',
                },
                  wp.element.createElement( 'span', null, rightLabel ),
                  wp.element.createElement( 'span', { className: 'gm-hero__cta-icon' }, '→' )
                )
              )
            )
          )
        )
      );
    },
  } );
} )( window.wp );
