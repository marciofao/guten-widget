import { registerBlockType } from '@wordpress/blocks';
import { TextControl } from '@wordpress/components';
import { useState } from '@wordpress/element';
import { useSelect } from '@wordpress/data';
import { useEntityProp } from '@wordpress/core-data';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType( 'core/resort-now', {
	apiVersion: 2,
	title: 'Resort Now',
	icon: 'universal-access-alt',
	category: 'media',
	attributes: {
		message: {
			type: 'string',
			source: 'text',
			selector: 'div',
			default: '', // empty default
		},
	},
    edit: ( { setAttributes, attributes } ) => {
        const blockProps = useBlockProps();
        const postType = useSelect(
            ( select ) => select( 'core/editor' ).getCurrentPostType(),
            []
        );

        const [ meta, setMeta ] = useEntityProp( 'postType', postType, 'meta' );

        const metaFieldValue = meta[ 'resort_now' ];
        const updateMetaValue = ( newValue ) => {
            setMeta( { ...meta, resort_now: newValue } );
        };

        return (
            <div { ...blockProps }>
                <TextControl
                    label="Resort Query"
                    value={ metaFieldValue }
                    onChange={ updateMetaValue }
                />
            </div>
        );
    },
	//will use backend render on resort_now_render.php
    save: () => null,
} );
