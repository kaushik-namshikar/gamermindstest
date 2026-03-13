( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText, InspectorControls } = wp.blockEditor;
  const { PanelBody, TextControl } = wp.components;

  registerBlockType( 'gm/split-cards', {
    title: __( 'Split Landing Cards', 'gamer-minds-theme' ),
    description: __( 'Two-column layout with cards for different sections.', 'gamer-minds-theme' ),
    icon: 'columns',
    category: 'gm',
    supports: {
      html: false,
      align: [ 'wide', 'full' ],
    },

    edit: function ( props ) {
      const {
        attributes: {
          leftTitle,
          leftDescription,
          leftButtonText,
          leftButtonUrl,
          rightTitle,
          rightDescription,
          rightButtonText,
          rightButtonUrl,
        },
        setAttributes,
        className,
      } = props;

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-split-cards gm-fade-in' },
          wp.element.createElement( InspectorControls, null,
            wp.element.createElement( PanelBody, {
              title: __( 'Left Card Settings', 'gamer-minds-theme' ),
              initialOpen: true,
            },
              wp.element.createElement( TextControl, {
                label: __( 'Button URL', 'gamer-minds-theme' ),
                value: leftButtonUrl,
                onChange: ( value ) => setAttributes( { leftButtonUrl: value } ),
                placeholder: '#developers',
              } )
            ),
            wp.element.createElement( PanelBody, {
              title: __( 'Right Card Settings', 'gamer-minds-theme' ),
              initialOpen: false,
            },
              wp.element.createElement( TextControl, {
                label: __( 'Button URL', 'gamer-minds-theme' ),
                value: rightButtonUrl,
                onChange: ( value ) => setAttributes( { rightButtonUrl: value } ),
                placeholder: '#players',
              } )
            )
          ),

          wp.element.createElement( 'div', { className: 'gm-split-cards__grid' },
            wp.element.createElement( 'div', { className: 'gm-split-cards__card gm-split-cards__left' },
              wp.element.createElement( RichText, {
                tagName: 'h2',
                className: 'gm-split-cards__title',
                value: leftTitle,
                onChange: ( value ) => setAttributes( { leftTitle: value } ),
                placeholder: __( 'For Developers', 'gamer-minds-theme' ),
              } ),
              wp.element.createElement( RichText, {
                tagName: 'p',
                className: 'gm-split-cards__description',
                value: leftDescription,
                onChange: ( value ) => setAttributes( { leftDescription: value } ),
                placeholder: __( 'Professional localization services...', 'gamer-minds-theme' ),
              } ),
              wp.element.createElement( 'a', {
                className: 'gm-btn gm-btn--primary',
                href: leftButtonUrl || '#',
              },
                wp.element.createElement( RichText, {
                  tagName: 'span',
                  value: leftButtonText,
                  onChange: ( value ) => setAttributes( { leftButtonText: value } ),
                  placeholder: __( 'Learn More', 'gamer-minds-theme' ),
                } )
              )
            ),
            wp.element.createElement( 'div', { className: 'gm-split-cards__card gm-split-cards__right' },
              wp.element.createElement( RichText, {
                tagName: 'h2',
                className: 'gm-split-cards__title',
                value: rightTitle,
                onChange: ( value ) => setAttributes( { rightTitle: value } ),
                placeholder: __( 'For Players', 'gamer-minds-theme' ),
              } ),
              wp.element.createElement( RichText, {
                tagName: 'p',
                className: 'gm-split-cards__description',
                value: rightDescription,
                onChange: ( value ) => setAttributes( { rightDescription: value } ),
                placeholder: __( 'Community and localization...', 'gamer-minds-theme' ),
              } ),
              wp.element.createElement( 'a', {
                className: 'gm-btn gm-btn--secondary',
                href: rightButtonUrl || '#',
              },
                wp.element.createElement( RichText, {
                  tagName: 'span',
                  value: rightButtonText,
                  onChange: ( value ) => setAttributes( { rightButtonText: value } ),
                  placeholder: __( 'Join Community', 'gamer-minds-theme' ),
                } )
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
          leftDescription,
          leftButtonText,
          leftButtonUrl,
          rightTitle,
          rightDescription,
          rightButtonText,
          rightButtonUrl,
        },
        className,
      } = props;

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-split-cards' },
          wp.element.createElement( 'div', { className: 'gm-split-cards__grid' },
            wp.element.createElement( 'div', { className: 'gm-split-cards__card gm-split-cards__left' },
              wp.element.createElement( 'h2', { className: 'gm-split-cards__title' }, leftTitle ),
              wp.element.createElement( 'p', { className: 'gm-split-cards__description' }, leftDescription ),
              wp.element.createElement( 'a', {
                className: 'gm-btn gm-btn--primary',
                href: leftButtonUrl || '#',
              }, leftButtonText )
            ),
            wp.element.createElement( 'div', { className: 'gm-split-cards__card gm-split-cards__right' },
              wp.element.createElement( 'h2', { className: 'gm-split-cards__title' }, rightTitle ),
              wp.element.createElement( 'p', { className: 'gm-split-cards__description' }, rightDescription ),
              wp.element.createElement( 'a', {
                className: 'gm-btn gm-btn--secondary',
                href: rightButtonUrl || '#',
              }, rightButtonText )
            )
          )
        )
      );
    },
  } );
} )( window.wp );