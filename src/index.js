import { registerBlockType } from '@wordpress/blocks';

registerBlockType('guten-widget/test-block', {
    title: 'Basic Example',
    icon: 'smiley',
    category: 'design',
    edit: () => < div > Hola,
    mundo! < /div>,
    save: () => < div > Hola,
    mundo! < /div>,
});