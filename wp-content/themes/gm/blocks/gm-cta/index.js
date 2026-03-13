( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText, InspectorControls, URLInputButton } = wp.blockEditor;
  const { PanelBody, TextControl, SelectControl, ColorPicker, Button } = wp.components;

  registerBlockType( 'gm/cta', {
    title: __( 'Call to Action', 'gamer-minds-theme' ),
    description: __( 'Prominent call-to-action section with heading, text, and button.', 'gamer-minds-theme' ),
    icon: 'megaphone',
    category: 'gm',
    supports: {
      html: false,
      align: [ 'wide', 'full' ],
    },

    edit: function ( props ) {
      const { attributes, setAttributes, className } = props;
      const { title, subtitle, buttonText, buttonUrl, backgroundColor, textColor, buttonStyle } = attributes;

      return (
        wp.element.createElement( 'div', {
          className: ( className || '' ) + ' gm-cta gm-fade-in',
          style: { backgroundColor: backgroundColor, color: textColor }
        },
          wp.element.createElement( InspectorControls, null,
            wp.element.createElement( PanelBody, {
              title: __( 'Call to Action Settings', 'gamer-minds-theme' ),
              initialOpen: true,
            },
              wp.element.createElement( TextControl, {
                label: __( 'Button Text', 'gamer-minds-theme' ),
                value: buttonText,
                onChange: ( value ) => setAttributes( { buttonText: value } ),
              } ),
              wp.element.createElement( 'div', { className: 'components-base-control' },
                wp.element.createElement( 'label', { className: 'components-base-control__label' },
                  __( 'Button URL', 'gamer-minds-theme' )
                ),
                wp.element.createElement( URLInputButton, {
                  url: buttonUrl,
                  onChange: ( url ) => setAttributes( { buttonUrl: url } ),
                } )
              ),
              wp.element.createElement( SelectControl, {
                label: __( 'Button Style', 'gamer-minds-theme' ),
                value: buttonStyle,
                options: [
                  { label: __( 'Primary', 'gamer-minds-theme' ), value: 'primary' },
                  { label: __( 'Secondary', 'gamer-minds-theme' ), value: 'secondary' },
                  { label: __( 'Outline', 'gamer-minds-theme' ), value: 'outline' },
                ],
                onChange: ( value ) => setAttributes( { buttonStyle: value } ),
              } ),
              wp.element.createElement( 'div', { className: 'components-base-control' },
                wp.element.createElement( 'label', { className: 'components-base-control__label' },
                  __( 'Background Color', 'gamer-minds-theme' )
                ),
                wp.element.createElement( ColorPicker, {
                  color: backgroundColor,
                  onChangeComplete: ( color ) => setAttributes( { backgroundColor: color.hex } ),
                  disableAlpha: false,
                } )
              ),
              wp.element.createElement( 'div', { className: 'components-base-control' },
                wp.element.createElement( 'label', { className: 'components-base-control__label' },
                  __( 'Text Color', 'gamer-minds-theme' )
                ),
                wp.element.createElement( ColorPicker, {
                  color: textColor,
                  onChangeComplete: ( color ) => setAttributes( { textColor: color.hex } ),
                  disableAlpha: false,
                } )
              )
            )
          ),

          wp.element.createElement( 'div', { className: 'gm-cta__container' },
            wp.element.createElement( 'div', { className: 'gm-cta__content' },
              wp.element.createElement( 'h2', { className: 'gm-cta__title' },
                wp.element.createElement( RichText, {
                  tagName: 'span',
                  value: title,
                  onChange: ( value ) => setAttributes( { title: value } ),
                  placeholder: __( 'Ready to Localize Your Game?', 'gamer-minds-theme' ),
                  style: { color: textColor },
                } )
              ),
              wp.element.createElement( 'p', { className: 'gm-cta__subtitle' },
                wp.element.createElement( RichText, {
                  tagName: 'span',
                  value: subtitle,
                  onChange: ( value ) => setAttributes( { subtitle: value } ),
                  placeholder: __( 'Get started with professional game localization services today.', 'gamer-minds-theme' ),
                  style: { color: textColor, opacity: 0.9 },
                } )
              ),
              wp.element.createElement( 'a', {
                href: buttonUrl,
                className: 'gm-cta__button gm-cta__button--' + buttonStyle,
                style: { color: textColor },
              }, buttonText )
            )
          )
        )
      );
    },

    save: function ( props ) {
      const { attributes, className } = props;
      const { title, subtitle, buttonText, buttonUrl, backgroundColor, textColor, buttonStyle } = attributes;

      return (
        wp.element.createElement( 'div', {
          className: ( className || '' ) + ' gm-cta',
          style: { backgroundColor: backgroundColor, color: textColor }
        },
          wp.element.createElement( 'div', { className: 'gm-cta__container' },
            wp.element.createElement( 'div', { className: 'gm-cta__content' },
              wp.element.createElement( 'h2', { className: 'gm-cta__title' }, title ),
              wp.element.createElement( 'p', { className: 'gm-cta__subtitle' }, subtitle ),
              wp.element.createElement( 'a', {
                href: buttonUrl,
                className: 'gm-cta__button gm-cta__button--' + buttonStyle,
              }, buttonText )
            )
          )
        )
      );
    },
  } );
} )( window.wp );