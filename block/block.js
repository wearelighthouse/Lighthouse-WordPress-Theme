const { RichText, MediaUpload, PlainText } = wp.editor;
const { registerBlockType } = wp.blocks;
const { Button,SelectControl } = wp.components;


registerBlockType('custom/screen', {   
  title: 'Screen',
  //icon: 'heart',
  category: 'common',
  attributes: {
    type: {
      source: 'text',
      selector: '.screen__type'
    },
    imageAlt: {
      attribute: 'alt',
      selector: '.screen__image'
    },
    imageUrl: {
      attribute: 'src',
      selector: '.screen__image'
    }
  },
  edit({ attributes, className, setAttributes }) {

    const getImageButton = (openEvent) => {
      if(attributes.imageUrl) {
        return (
          <img 
            src={ attributes.imageUrl }
            onClick={ openEvent }
            className="image"
          />
        );
      }
      else {
        return (
          <div className="button-container">
            <Button 
              onClick={ openEvent }
              className="button button-large"
            >
              Pick an image
            </Button>
          </div>
          <SelectControl
          label={ __( 'Select Type' ) }
          value={ this.state.type } // e.g: value = [ 'a', 'c' ]
          onChange={ ( type ) => { this.setState( { type } ) } }
          options={ [
              { value: 'desktop', label: 'Desktop' },
              { value: 'mobile', label: 'Mobile' },              
          ] }
      />
        );
      }
    };

    return (
      <div className="container">
        <MediaUpload
          onSelect={ media => { setAttributes({ imageAlt: media.alt, imageUrl: media.url }); } }
          type="image"
          value={ attributes.imageID }
          render={ ({ open }) => getImageButton(open) }
        />
        <SelectControl
          label={ __( 'Select Type' ) }
          value={ this.state.type } // e.g: value = [ 'a', 'c' ]
          onChange={ ( type ) => { this.setState( { type } ) } }
          options={ [
              { value: 'desktop', label: 'Desktop' },
              { value: 'mobile', label: 'Mobile' },              
          ] }
      />       
      </div>
    );

  },

  save({ attributes }) {

    const screenImage = (src, alt) => {
      if(!src) return null;

      if(alt) {
        return (
          <img 
            className="screen__image" 
            src={ src }
            alt={ alt }
          /> 
        );
      }
      
      return (
        <img 
          className="screen__image" 
          src={ src }
          alt=""
          aria-hidden="true"
        /> 
      );
    };
    
    return (
      <div className="screen">
        { screenImage(attributes.imageUrl, attributes.imageAlt) }
        <div className="screen__content">
          <h3 className="screen__type">{ attributes.type }</h3>
          
        </div>
      </div>
    );
  }
});