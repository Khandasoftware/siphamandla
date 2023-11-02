const { registerBlockType } = wp.blocks;
const { PanelBody, TextControl, ColorPalette, BaseControl } = wp.components;
const { withSelect, withDispatch } = wp.data;
const { InspectorControls, RichText } = wp.blockEditor;

registerBlockType('custom-repeater-block/custom-repeater-block', {
    title: 'Custom Repeater Block',
    icon: 'star-filled',
    category: 'common',
    attributes: {
        items: {
            type: 'array',
            default: [],
        },
    },
    edit: function (props) {
        const { attributes, setAttributes } = props;

        const onUpdateItem = (newItem, index) => {
            const newItems = [...attributes.items];
            newItems[index] = newItem;
            setAttributes({ items: newItems });
        };

        return (
            <div>
                {/* Add your block editing interface here */}
                <InspectorControls>
                    <PanelBody title="Customize">
                        <BaseControl label="Font Size">
                            <TextControl
                                value={attributes.fontSize}
                                onChange={(fontSize) => setAttributes({ fontSize })}
                            />
                        </BaseControl>
                        <BaseControl label="Font Color">
                            <ColorPalette
                                value={attributes.fontColor}
                                onChange={(fontColor) => setAttributes({ fontColor })}
                            />
                        </BaseControl>
                    </PanelBody>
                </InspectorControls>
            </div>
        );
    },
    save: function () {
        // Define the save function for your block
    },
});

export default registerBlockType
