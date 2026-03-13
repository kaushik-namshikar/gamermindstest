( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText, InspectorControls } = wp.blockEditor;
  const { PanelBody, TextControl } = wp.components;

  registerBlockType( 'gm/services-grid', {
    title: __( 'Services Grid', 'gamer-minds-theme' ),
    description: __( 'A responsive grid of service cards with icons and descriptions.', 'gamer-minds-theme' ),
    icon: 'grid-view',
    category: 'gm',
    supports: {
      html: false,
      align: [ 'wide', 'full' ],
    },

    edit: function ( props ) {
      const { attributes, setAttributes, className } = props;
      const { title, items } = attributes;

      const updateItem = ( index, key, value ) => {
        const updated = items.map( ( item, i ) => {
          if ( i !== index ) {
            return item;
          }
          return { ...item, [key]: value };
        } );
        setAttributes( { items: updated } );
      };

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-grid gm-fade-in' },
          wp.element.createElement( InspectorControls, null,
            wp.element.createElement( PanelBody, {
              title: __( 'Section Settings', 'gamer-minds-theme' ),
              initialOpen: true,
            },
              wp.element.createElement( TextControl, {
                label: __( 'Section Title', 'gamer-minds-theme' ),
                value: title,
                onChange: ( value ) => setAttributes( { title: value } ),
              } )
            )
          ),
          wp.element.createElement( 'h2', { className: 'gm-grid__heading' },
            wp.element.createElement( RichText, {
              tagName: 'span',
              value: title,
              onChange: ( value ) => setAttributes( { title: value } ),
              placeholder: __( 'Our Services', 'gamer-minds-theme' ),
            } )
          ),
          items.map( ( item, index ) =>
            wp.element.createElement( 'div', { key: index, className: 'gm-grid__item' },
              wp.element.createElement( 'div', { className: 'gm-grid__icon' }, item.icon || '★' ),
              wp.element.createElement( RichText, {
                tagName: 'h3',
                className: 'gm-grid__title',
                value: item.title,
                onChange: ( value ) => updateItem( index, 'title', value ),
                placeholder: __( 'Service title', 'gamer-minds-theme' ),
              } ),
              wp.element.createElement( RichText, {
                tagName: 'p',
                className: 'gm-grid__description',
                value: item.description,
                onChange: ( value ) => updateItem( index, 'description', value ),
                placeholder: __( 'Service description', 'gamer-minds-theme' ),
              } )
            )
          )
        )
      );
    },

    save: function ( props ) {
      const { attributes, className } = props;
      const { title, items } = attributes;

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-grid' },
          wp.element.createElement( 'h2', { className: 'gm-grid__heading' }, title ),
          items.map( ( item, index ) =>
            wp.element.createElement( 'div', { key: index, className: 'gm-grid__item' },
              wp.element.createElement( 'div', { className: 'gm-grid__icon' }, item.icon || '★' ),
              wp.element.createElement( 'h3', { className: 'gm-grid__title' }, item.title ),
              wp.element.createElement( 'p', { className: 'gm-grid__description' }, item.description )
            )
          )
        )
      );
    },
  } );
} )( window.wp );
