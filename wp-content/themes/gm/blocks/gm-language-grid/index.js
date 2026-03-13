( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText } = wp.blockEditor;

  registerBlockType( 'gm/language-grid', {
    title: __( 'Languages Grid', 'gamer-minds-theme' ),
    description: __( 'Grid displaying supported languages with flags or icons.', 'gamer-minds-theme' ),
    icon: 'translation',
    category: 'gm',
    supports: {
      html: false,
      align: [ 'wide', 'full' ],
    },

    edit: function ( props ) {
      const { attributes, setAttributes, className } = props;
      const { title, languages } = attributes;

      const updateLanguage = ( index, value ) => {
        const updated = languages.map( ( lang, i ) => i === index ? value : lang );
        setAttributes( { languages: updated } );
      };

      const addLanguage = () => {
        setAttributes( { languages: [...languages, 'New Language'] } );
      };

      const removeLanguage = ( index ) => {
        const updated = languages.filter( ( _, i ) => i !== index );
        setAttributes( { languages: updated } );
      };

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-language-grid gm-fade-in' },
          wp.element.createElement( 'h2', { className: 'gm-language-grid__heading' },
            wp.element.createElement( RichText, {
              tagName: 'span',
              value: title,
              onChange: ( value ) => setAttributes( { title: value } ),
              placeholder: __( 'Supported Languages', 'gamer-minds-theme' ),
            } )
          ),
          wp.element.createElement( 'div', { className: 'gm-language-grid__grid' },
            languages.map( ( language, index ) =>
              wp.element.createElement( 'div', { key: index, className: 'gm-language-grid__item' },
                wp.element.createElement( 'div', { className: 'gm-language-grid__flag' }, '🌍' ),
                wp.element.createElement( RichText, {
                  tagName: 'span',
                  className: 'gm-language-grid__name',
                  value: language,
                  onChange: ( value ) => updateLanguage( index, value ),
                  placeholder: __( 'Language name', 'gamer-minds-theme' ),
                } ),
                wp.element.createElement( 'button', {
                  className: 'gm-language-grid__remove',
                  onClick: () => removeLanguage( index ),
                  type: 'button',
                }, '×' )
              )
            ),
            wp.element.createElement( 'button', {
              className: 'gm-language-grid__add',
              onClick: addLanguage,
              type: 'button',
            }, '+ Add Language' )
          )
        )
      );
    },

    save: function ( props ) {
      const { attributes, className } = props;
      const { title, languages } = attributes;

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-language-grid' },
          wp.element.createElement( 'h2', { className: 'gm-language-grid__heading' }, title ),
          wp.element.createElement( 'div', { className: 'gm-language-grid__grid' },
            languages.map( ( language, index ) =>
              wp.element.createElement( 'div', { key: index, className: 'gm-language-grid__item' },
                wp.element.createElement( 'div', { className: 'gm-language-grid__flag' }, '🌍' ),
                wp.element.createElement( 'span', { className: 'gm-language-grid__name' }, language )
              )
            )
          )
        )
      );
    },
  } );
} )( window.wp );