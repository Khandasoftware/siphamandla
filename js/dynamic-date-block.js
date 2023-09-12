// Import necessary WordPress components
const { registerBlockType } = wp.blocks;
const { TextControl } = wp.components;

// Register your dynamic block
registerBlockType('siphamandla/dynamic-date-block', {
  title: 'Dynamic Date Block',
  icon: 'calendar',
  category: 'common',
  attributes: {
    date: {
      type: 'string',
      default: '',
    },
  },

  edit: function (props) {
    const { attributes, setAttributes } = props;

    return (
      <div>
        <p>Dynamic Date: {attributes.date}</p>
        <TextControl
          label="Enter a Date Format:"
          value={attributes.date}
          onChange={(newDate) => setAttributes({ date: newDate })}
        />
      </div>
    );
  },

  save: function () {
    // Dynamic content rendering in the front-end
    return <div dangerouslySetInnerHTML={{ __html: attributes.content }} />;
  },
});
