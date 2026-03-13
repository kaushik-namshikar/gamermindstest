( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText } = wp.blockEditor;

  registerBlockType( 'gm/process-timeline', {
    title: __( 'Process Timeline', 'gamer-minds-theme' ),
    description: __( 'Horizontal or vertical timeline showing process steps.', 'gamer-minds-theme' ),
    icon: 'list-view',
    category: 'gm',
    supports: {
      html: false,
      align: [ 'wide', 'full' ],
    },

    edit: function ( props ) {
      const { attributes, setAttributes, className } = props;
      const { title, steps } = attributes;

      const updateStep = ( index, key, value ) => {
        const updated = steps.map( ( step, i ) => {
          if ( i !== index ) {
            return step;
          }
          return { ...step, [key]: value };
        } );
        setAttributes( { steps: updated } );
      };

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-process-timeline gm-fade-in' },
          wp.element.createElement( 'h2', { className: 'gm-process-timeline__heading' },
            wp.element.createElement( RichText, {
              tagName: 'span',
              value: title,
              onChange: ( value ) => setAttributes( { title: value } ),
              placeholder: __( 'Our Process', 'gamer-minds-theme' ),
            } )
          ),
          wp.element.createElement( 'div', { className: 'gm-process-timeline__container' },
            steps.map( ( step, index ) =>
              wp.element.createElement( 'div', { key: index, className: 'gm-process-timeline__step' },
                wp.element.createElement( 'div', { className: 'gm-process-timeline__step-number' }, index + 1 ),
                wp.element.createElement( 'div', { className: 'gm-process-timeline__step-content' },
                  wp.element.createElement( 'div', { className: 'gm-process-timeline__step-icon' }, step.icon || '🎯' ),
                  wp.element.createElement( RichText, {
                    tagName: 'h3',
                    className: 'gm-process-timeline__step-title',
                    value: step.title,
                    onChange: ( value ) => updateStep( index, 'title', value ),
                    placeholder: __( 'Step title', 'gamer-minds-theme' ),
                  } ),
                  wp.element.createElement( RichText, {
                    tagName: 'p',
                    className: 'gm-process-timeline__step-description',
                    value: step.description,
                    onChange: ( value ) => updateStep( index, 'description', value ),
                    placeholder: __( 'Step description', 'gamer-minds-theme' ),
                  } )
                ),
                index < steps.length - 1 && wp.element.createElement( 'div', { className: 'gm-process-timeline__connector' } )
              )
            )
          )
        )
      );
    },

    save: function ( props ) {
      const { attributes, className } = props;
      const { title, steps } = attributes;

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-process-timeline' },
          wp.element.createElement( 'h2', { className: 'gm-process-timeline__heading' }, title ),
          wp.element.createElement( 'div', { className: 'gm-process-timeline__container' },
            steps.map( ( step, index ) =>
              wp.element.createElement( 'div', { key: index, className: 'gm-process-timeline__step' },
                wp.element.createElement( 'div', { className: 'gm-process-timeline__step-number' }, index + 1 ),
                wp.element.createElement( 'div', { className: 'gm-process-timeline__step-content' },
                  wp.element.createElement( 'div', { className: 'gm-process-timeline__step-icon' }, step.icon || '🎯' ),
                  wp.element.createElement( 'h3', { className: 'gm-process-timeline__step-title' }, step.title ),
                  wp.element.createElement( 'p', { className: 'gm-process-timeline__step-description' }, step.description )
                ),
                index < steps.length - 1 && wp.element.createElement( 'div', { className: 'gm-process-timeline__connector' } )
              )
            )
          )
        )
      );
    },
  } );
} )( window.wp );