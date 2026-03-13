( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText, MediaUpload, InspectorControls } = wp.blockEditor;
  const { PanelBody, Button } = wp.components;

  registerBlockType( 'gm/case-grid', {
    title: __( 'Case Studies Grid', 'gamer-minds-theme' ),
    description: __( 'Grid of case studies or portfolio items with images and details.', 'gamer-minds-theme' ),
    icon: 'portfolio',
    category: 'gm',
    supports: {
      html: false,
      align: [ 'wide', 'full' ],
    },

    edit: function ( props ) {
      const { attributes, setAttributes, className } = props;
      const { title, cases } = attributes;

      const updateCase = ( index, key, value ) => {
        const updated = cases.map( ( caseItem, i ) => {
          if ( i !== index ) {
            return caseItem;
          }
          return { ...caseItem, [key]: value };
        } );
        setAttributes( { cases: updated } );
      };

      const selectImage = ( index ) => {
        const mediaLibrary = wp.media({
          title: __( 'Select Image', 'gamer-minds-theme' ),
          button: { text: __( 'Use this image', 'gamer-minds-theme' ) },
          multiple: false,
        });

        mediaLibrary.on( 'select', function () {
          const attachment = mediaLibrary.state().get( 'selection' ).first().toJSON();
          updateCase( index, 'image', attachment.url );
        });

        mediaLibrary.open();
      };

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-case-grid gm-fade-in' },
          wp.element.createElement( InspectorControls, null,
            wp.element.createElement( PanelBody, {
              title: __( 'Case Studies', 'gamer-minds-theme' ),
              initialOpen: true,
            },
              wp.element.createElement( Button, {
                onClick: () => setAttributes( { cases: [...cases, {
                  title: 'New Case Study',
                  image: '',
                  languages: 'Multiple languages',
                  description: 'Case study description'
                }] } ),
                isPrimary: true,
              }, __( 'Add Case Study', 'gamer-minds-theme' ) )
            )
          ),

          wp.element.createElement( 'h2', { className: 'gm-case-grid__heading' },
            wp.element.createElement( RichText, {
              tagName: 'span',
              value: title,
              onChange: ( value ) => setAttributes( { title: value } ),
              placeholder: __( 'Case Studies', 'gamer-minds-theme' ),
            } )
          ),
          wp.element.createElement( 'div', { className: 'gm-case-grid__grid' },
            cases.map( ( caseItem, index ) =>
              wp.element.createElement( 'div', { key: index, className: 'gm-case-grid__item' },
                wp.element.createElement( 'div', {
                  className: 'gm-case-grid__image',
                  style: { backgroundImage: `url(${caseItem.image || 'https://via.placeholder.com/400x250'})` },
                  onClick: () => selectImage( index ),
                },
                  !caseItem.image && wp.element.createElement( 'div', { className: 'gm-case-grid__image-placeholder' },
                    wp.element.createElement( 'span', null, __( 'Click to select image', 'gamer-minds-theme' ) )
                  )
                ),
                wp.element.createElement( 'div', { className: 'gm-case-grid__content' },
                  wp.element.createElement( RichText, {
                    tagName: 'h3',
                    className: 'gm-case-grid__title',
                    value: caseItem.title,
                    onChange: ( value ) => updateCase( index, 'title', value ),
                    placeholder: __( 'Case study title', 'gamer-minds-theme' ),
                  } ),
                  wp.element.createElement( RichText, {
                    tagName: 'div',
                    className: 'gm-case-grid__languages',
                    value: caseItem.languages,
                    onChange: ( value ) => updateCase( index, 'languages', value ),
                    placeholder: __( 'Number of languages', 'gamer-minds-theme' ),
                  } ),
                  wp.element.createElement( RichText, {
                    tagName: 'p',
                    className: 'gm-case-grid__description',
                    value: caseItem.description,
                    onChange: ( value ) => updateCase( index, 'description', value ),
                    placeholder: __( 'Case study description', 'gamer-minds-theme' ),
                  } )
                )
              )
            )
          )
        )
      );
    },

    save: function ( props ) {
      const { attributes, className } = props;
      const { title, cases } = attributes;

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-case-grid' },
          wp.element.createElement( 'h2', { className: 'gm-case-grid__heading' }, title ),
          wp.element.createElement( 'div', { className: 'gm-case-grid__grid' },
            cases.map( ( caseItem, index ) =>
              wp.element.createElement( 'div', { key: index, className: 'gm-case-grid__item' },
                wp.element.createElement( 'div', {
                  className: 'gm-case-grid__image',
                  style: { backgroundImage: `url(${caseItem.image})` },
                } ),
                wp.element.createElement( 'div', { className: 'gm-case-grid__content' },
                  wp.element.createElement( 'h3', { className: 'gm-case-grid__title' }, caseItem.title ),
                  wp.element.createElement( 'div', { className: 'gm-case-grid__languages' }, caseItem.languages ),
                  wp.element.createElement( 'p', { className: 'gm-case-grid__description' }, caseItem.description )
                )
              )
            )
          )
        )
      );
    },
  } );
} )( window.wp );