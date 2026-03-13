( function ( wp ) {
  const { registerBlockType } = wp.blocks;
  const { __ } = wp.i18n;
  const { RichText, InspectorControls } = wp.blockEditor;
  const { PanelBody, Button } = wp.components;
  const { useState } = wp.element;

  registerBlockType( 'gm/faq-accordion', {
    title: __( 'FAQ Accordion', 'gamer-minds-theme' ),
    description: __( 'Collapsible FAQ section with questions and answers.', 'gamer-minds-theme' ),
    icon: 'editor-help',
    category: 'gm',
    supports: {
      html: false,
      align: [ 'wide', 'full' ],
    },

    edit: function ( props ) {
      const { attributes, setAttributes, className } = props;
      const { title, faqs } = attributes;

      const updateFaq = ( index, key, value ) => {
        const updated = faqs.map( ( faq, i ) => {
          if ( i !== index ) {
            return faq;
          }
          return { ...faq, [key]: value };
        } );
        setAttributes( { faqs: updated } );
      };

      const toggleFaq = ( index ) => {
        const updated = faqs.map( ( faq, i ) => {
          if ( i !== index ) {
            return { ...faq, isOpen: false };
          }
          return { ...faq, isOpen: !faq.isOpen };
        } );
        setAttributes( { faqs: updated } );
      };

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-faq-accordion gm-fade-in' },
          wp.element.createElement( InspectorControls, null,
            wp.element.createElement( PanelBody, {
              title: __( 'FAQ Items', 'gamer-minds-theme' ),
              initialOpen: true,
            },
              wp.element.createElement( Button, {
                onClick: () => setAttributes( { faqs: [...faqs, {
                  question: 'New Question',
                  answer: 'Answer goes here...',
                  isOpen: false
                }] } ),
                isPrimary: true,
              }, __( 'Add FAQ Item', 'gamer-minds-theme' ) )
            )
          ),

          wp.element.createElement( 'h2', { className: 'gm-faq-accordion__heading' },
            wp.element.createElement( RichText, {
              tagName: 'span',
              value: title,
              onChange: ( value ) => setAttributes( { title: value } ),
              placeholder: __( 'Frequently Asked Questions', 'gamer-minds-theme' ),
            } )
          ),

          wp.element.createElement( 'div', { className: 'gm-faq-accordion__list' },
            faqs.map( ( faq, index ) =>
              wp.element.createElement( 'div', {
                key: index,
                className: 'gm-faq-accordion__item' + ( faq.isOpen ? ' gm-faq-accordion__item--open' : '' )
              },
                wp.element.createElement( 'button', {
                  className: 'gm-faq-accordion__question',
                  onClick: () => toggleFaq( index ),
                  'aria-expanded': faq.isOpen,
                  'aria-controls': `faq-answer-${index}`,
                },
                  wp.element.createElement( RichText, {
                    tagName: 'span',
                    className: 'gm-faq-accordion__question-text',
                    value: faq.question,
                    onChange: ( value ) => updateFaq( index, 'question', value ),
                    placeholder: __( 'Enter your question here...', 'gamer-minds-theme' ),
                  } ),
                  wp.element.createElement( 'span', { className: 'gm-faq-accordion__icon' },
                    wp.element.createElement( 'svg', {
                      width: '16',
                      height: '16',
                      viewBox: '0 0 16 16',
                      fill: 'none',
                      xmlns: 'http://www.w3.org/2000/svg'
                    },
                      wp.element.createElement( 'path', {
                        d: 'M4 6L8 10L12 6',
                        stroke: 'currentColor',
                        strokeWidth: '2',
                        strokeLinecap: 'round',
                        strokeLinejoin: 'round'
                      } )
                    )
                  )
                ),
                wp.element.createElement( 'div', {
                  className: 'gm-faq-accordion__answer',
                  id: `faq-answer-${index}`,
                  style: { display: faq.isOpen ? 'block' : 'none' }
                },
                  wp.element.createElement( RichText, {
                    tagName: 'div',
                    className: 'gm-faq-accordion__answer-content',
                    value: faq.answer,
                    onChange: ( value ) => updateFaq( index, 'answer', value ),
                    placeholder: __( 'Enter your answer here...', 'gamer-minds-theme' ),
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
      const { title, faqs } = attributes;

      return (
        wp.element.createElement( 'div', { className: ( className || '' ) + ' gm-faq-accordion' },
          wp.element.createElement( 'h2', { className: 'gm-faq-accordion__heading' }, title ),
          wp.element.createElement( 'div', { className: 'gm-faq-accordion__list' },
            faqs.map( ( faq, index ) =>
              wp.element.createElement( 'div', {
                key: index,
                className: 'gm-faq-accordion__item'
              },
                wp.element.createElement( 'button', {
                  className: 'gm-faq-accordion__question',
                  'aria-expanded': 'false',
                  'aria-controls': `faq-answer-${index}`,
                },
                  wp.element.createElement( 'span', { className: 'gm-faq-accordion__question-text' }, faq.question ),
                  wp.element.createElement( 'span', { className: 'gm-faq-accordion__icon' },
                    wp.element.createElement( 'svg', {
                      width: '16',
                      height: '16',
                      viewBox: '0 0 16 16',
                      fill: 'none',
                      xmlns: 'http://www.w3.org/2000/svg'
                    },
                      wp.element.createElement( 'path', {
                        d: 'M4 6L8 10L12 6',
                        stroke: 'currentColor',
                        strokeWidth: '2',
                        strokeLinecap: 'round',
                        strokeLinejoin: 'round'
                      } )
                    )
                  )
                ),
                wp.element.createElement( 'div', {
                  className: 'gm-faq-accordion__answer',
                  id: `faq-answer-${index}`
                },
                  wp.element.createElement( 'div', { className: 'gm-faq-accordion__answer-content' }, faq.answer )
                )
              )
            )
          )
        )
      );
    },
  } );
} )( window.wp );