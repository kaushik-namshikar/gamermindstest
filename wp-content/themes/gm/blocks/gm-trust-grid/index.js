( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText } = wp.blockEditor;

  registerBlockType( 'gm/trust-grid', {
    title: __( 'Trust Grid', 'gamer-minds-theme' ),
    description: __( 'Grid of trust indicators, logos, or testimonials.', 'gamer-minds-theme' ),
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
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-trust-grid gm-fade-in' },
          wp.element.createElement( 'h2', { className: 'gm-trust-grid__heading' },
            wp.element.createElement( RichText, {
              tagName: 'span',
              value: title,
              onChange: ( value ) => setAttributes( { title: value } ),
              placeholder: __( 'Trusted By', 'gamer-minds-theme' ),
            } )
          ),
          wp.element.createElement( 'div', { className: 'gm-trust-grid__grid' },
            items.map( ( item, index ) =>
              wp.element.createElement( 'div', { key: index, className: 'gm-trust-grid__item' },
                wp.element.createElement( 'div', { className: 'gm-trust-grid__logo' }, item.logo || '🏆' ),
                wp.element.createElement( RichText, {
                  tagName: 'h3',
                  className: 'gm-trust-grid__title',
                  value: item.title,
                  onChange: ( value ) => updateItem( index, 'title', value ),
                  placeholder: __( 'Trust item title', 'gamer-minds-theme' ),
                } ),
                wp.element.createElement( RichText, {
                  tagName: 'p',
                  className: 'gm-trust-grid__description',
                  value: item.description,
                  onChange: ( value ) => updateItem( index, 'description', value ),
                  placeholder: __( 'Trust item description', 'gamer-minds-theme' ),
                } )
              )
            )
          )
        )
      );
    },

    save: function ( props ) {
      const { attributes, className } = props;
      const { title, items } = attributes;

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-trust-grid' },
          wp.element.createElement( 'h2', { className: 'gm-trust-grid__heading' }, title ),
          wp.element.createElement( 'div', { className: 'gm-trust-grid__grid' },
            items.map( ( item, index ) =>
              wp.element.createElement( 'div', { key: index, className: 'gm-trust-grid__item' },
                wp.element.createElement( 'div', { className: 'gm-trust-grid__logo' }, item.logo || '🏆' ),
                wp.element.createElement( 'h3', { className: 'gm-trust-grid__title' }, item.title ),
                wp.element.createElement( 'p', { className: 'gm-trust-grid__description' }, item.description )
              )
            )
          )
        )
      );
    },
  } );
} )( window.wp );