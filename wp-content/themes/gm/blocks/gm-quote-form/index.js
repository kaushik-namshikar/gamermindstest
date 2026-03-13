( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText, InspectorControls, MediaUpload } = wp.blockEditor;
  const { PanelBody, TextControl, Button, ColorPicker } = wp.components;

  registerBlockType( 'gm/quote-form', {
    title: __( 'Quote Form', 'gamer-minds-theme' ),
    description: __( 'Contact form for requesting project quotes.', 'gamer-minds-theme' ),
    icon: 'forms',
    category: 'gm',
    supports: {
      html: false,
      align: [ 'wide', 'full' ],
    },

    edit: function ( props ) {
      const { attributes, setAttributes, className } = props;
      const { title, subtitle, formAction, submitText, backgroundImage, backgroundColor } = attributes;

      const selectBackgroundImage = () => {
        const mediaLibrary = wp.media({
          title: __( 'Select Background Image', 'gamer-minds-theme' ),
          button: { text: __( 'Use this image', 'gamer-minds-theme' ) },
          multiple: false,
        });

        mediaLibrary.on( 'select', function () {
          const attachment = mediaLibrary.state().get( 'selection' ).first().toJSON();
          setAttributes( { backgroundImage: attachment.url } );
        });

        mediaLibrary.open();
      };

      return (
        wp.element.createElement( 'div', {
          className: ( className || '' ) + ' gm-quote-form gm-fade-in',
          style: {
            backgroundColor: backgroundColor,
            backgroundImage: backgroundImage ? `url(${backgroundImage})` : 'none',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
          }
        },
          wp.element.createElement( InspectorControls, null,
            wp.element.createElement( PanelBody, {
              title: __( 'Form Settings', 'gamer-minds-theme' ),
              initialOpen: true,
            },
              wp.element.createElement( TextControl, {
                label: __( 'Form Action URL', 'gamer-minds-theme' ),
                value: formAction,
                onChange: ( value ) => setAttributes( { formAction: value } ),
                placeholder: 'https://formspree.io/your-email',
              } ),
              wp.element.createElement( TextControl, {
                label: __( 'Submit Button Text', 'gamer-minds-theme' ),
                value: submitText,
                onChange: ( value ) => setAttributes( { submitText: value } ),
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
              wp.element.createElement( Button, {
                onClick: selectBackgroundImage,
                isSecondary: true,
              }, backgroundImage ? __( 'Change Background Image', 'gamer-minds-theme' ) : __( 'Add Background Image', 'gamer-minds-theme' ) )
            )
          ),

          wp.element.createElement( 'div', { className: 'gm-quote-form__container' },
            wp.element.createElement( 'div', { className: 'gm-quote-form__content' },
              wp.element.createElement( 'h2', { className: 'gm-quote-form__title' },
                wp.element.createElement( RichText, {
                  tagName: 'span',
                  value: title,
                  onChange: ( value ) => setAttributes( { title: value } ),
                  placeholder: __( 'Get Your Free Quote', 'gamer-minds-theme' ),
                } )
              ),
              wp.element.createElement( 'p', { className: 'gm-quote-form__subtitle' },
                wp.element.createElement( RichText, {
                  tagName: 'span',
                  value: subtitle,
                  onChange: ( value ) => setAttributes( { subtitle: value } ),
                  placeholder: __( 'Tell us about your project...', 'gamer-minds-theme' ),
                } )
              ),

              wp.element.createElement( 'form', {
                className: 'gm-quote-form__form',
                action: formAction,
                method: 'POST'
              },
                wp.element.createElement( 'div', { className: 'gm-quote-form__field-group' },
                  wp.element.createElement( 'input', {
                    type: 'text',
                    name: 'name',
                    placeholder: __( 'Your Name', 'gamer-minds-theme' ),
                    className: 'gm-quote-form__input',
                    required: true,
                  } ),
                  wp.element.createElement( 'input', {
                    type: 'email',
                    name: 'email',
                    placeholder: __( 'Your Email', 'gamer-minds-theme' ),
                    className: 'gm-quote-form__input',
                    required: true,
                  } )
                ),

                wp.element.createElement( 'div', { className: 'gm-quote-form__field-group' },
                  wp.element.createElement( 'input', {
                    type: 'text',
                    name: 'company',
                    placeholder: __( 'Company Name', 'gamer-minds-theme' ),
                    className: 'gm-quote-form__input',
                  } ),
                  wp.element.createElement( 'input', {
                    type: 'tel',
                    name: 'phone',
                    placeholder: __( 'Phone Number', 'gamer-minds-theme' ),
                    className: 'gm-quote-form__input',
                  } )
                ),

                wp.element.createElement( 'select', {
                  name: 'service',
                  className: 'gm-quote-form__select',
                  required: true,
                },
                  wp.element.createElement( 'option', { value: '' }, __( 'Select Service', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'game-localization' }, __( 'Game Localization', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'voice-acting' }, __( 'Voice Acting', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'translation' }, __( 'Translation Services', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'testing' }, __( 'Game Testing', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'other' }, __( 'Other', 'gamer-minds-theme' ) )
                ),

                wp.element.createElement( 'textarea', {
                  name: 'message',
                  placeholder: __( 'Tell us about your project...', 'gamer-minds-theme' ),
                  className: 'gm-quote-form__textarea',
                  rows: 5,
                  required: true,
                } ),

                wp.element.createElement( 'button', {
                  type: 'submit',
                  className: 'gm-quote-form__submit',
                }, submitText )
              )
            )
          )
        )
      );
    },

    save: function ( props ) {
      const { attributes, className } = props;
      const { title, subtitle, formAction, submitText, backgroundImage, backgroundColor } = attributes;

      return (
        wp.element.createElement( 'div', {
          className: ( className || '' ) + ' gm-quote-form',
          style: {
            backgroundColor: backgroundColor,
            backgroundImage: backgroundImage ? `url(${backgroundImage})` : 'none',
            backgroundSize: 'cover',
            backgroundPosition: 'center',
          }
        },
          wp.element.createElement( 'div', { className: 'gm-quote-form__container' },
            wp.element.createElement( 'div', { className: 'gm-quote-form__content' },
              wp.element.createElement( 'h2', { className: 'gm-quote-form__title' }, title ),
              wp.element.createElement( 'p', { className: 'gm-quote-form__subtitle' }, subtitle ),

              wp.element.createElement( 'form', {
                className: 'gm-quote-form__form',
                action: formAction,
                method: 'POST'
              },
                wp.element.createElement( 'div', { className: 'gm-quote-form__field-group' },
                  wp.element.createElement( 'input', {
                    type: 'text',
                    name: 'name',
                    placeholder: __( 'Your Name', 'gamer-minds-theme' ),
                    className: 'gm-quote-form__input',
                    required: true,
                  } ),
                  wp.element.createElement( 'input', {
                    type: 'email',
                    name: 'email',
                    placeholder: __( 'Your Email', 'gamer-minds-theme' ),
                    className: 'gm-quote-form__input',
                    required: true,
                  } )
                ),

                wp.element.createElement( 'div', { className: 'gm-quote-form__field-group' },
                  wp.element.createElement( 'input', {
                    type: 'text',
                    name: 'company',
                    placeholder: __( 'Company Name', 'gamer-minds-theme' ),
                    className: 'gm-quote-form__input',
                  } ),
                  wp.element.createElement( 'input', {
                    type: 'tel',
                    name: 'phone',
                    placeholder: __( 'Phone Number', 'gamer-minds-theme' ),
                    className: 'gm-quote-form__input',
                  } )
                ),

                wp.element.createElement( 'select', {
                  name: 'service',
                  className: 'gm-quote-form__select',
                  required: true,
                },
                  wp.element.createElement( 'option', { value: '' }, __( 'Select Service', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'game-localization' }, __( 'Game Localization', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'voice-acting' }, __( 'Voice Acting', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'translation' }, __( 'Translation Services', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'testing' }, __( 'Game Testing', 'gamer-minds-theme' ) ),
                  wp.element.createElement( 'option', { value: 'other' }, __( 'Other', 'gamer-minds-theme' ) )
                ),

                wp.element.createElement( 'textarea', {
                  name: 'message',
                  placeholder: __( 'Tell us about your project...', 'gamer-minds-theme' ),
                  className: 'gm-quote-form__textarea',
                  rows: 5,
                  required: true,
                } ),

                wp.element.createElement( 'button', {
                  type: 'submit',
                  className: 'gm-quote-form__submit',
                }, submitText )
              )
            )
          )
        )
      );
    },
  } );
} )( window.wp );