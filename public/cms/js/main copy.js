

function myPlugin(editor){
  editor.BlockManager.add('my-first-block', {
    label: 'Simple block',
    content: '<div class="my-block">This is a simple block</div> <script> console.log(2);</script>',
  });
}



const editor = grapesjs.init({
  container: "#editor",
  fromElement: true,
  width: "auto",
  storageManager: false,
  plugins: ["gjs-preset-webpage","grapesjs-custom-code",'grapesjs-script-editor',myPlugin],
  pluginsOpts: {
    "gjs-preset-webpage": {},
    'grapesjs-custom-code': {
      // options
    },
    'grapesjs-script-editor':{}
  },
  allowScripts: 1,
  storageManager: {
    autosave: false,
    setStepsBeforeSave: 1,
    type: 'remote',
    urlStore: 'http://cimailer.dev/templates/template',
    urlLoad: 'http://cimailer.dev/templates/template',
    contentTypeJson: true,
    },
    assetManager: {
      assets: [
       'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
       // Pass an object with your properties
       {
         type: 'image',
         src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
         height: 350,
         width: 250,
         name: 'displayName'
       },
       {
         // As the 'image' is the base type of assets, omitting it will
         // be set as `image` by default
         src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
         height: 350,
         width: 250,
         name: 'displayName'
       },
       {
        // As the 'image' is the base type of assets, omitting it will
        // be set as `image` by default
        src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
        height: 350,
        width: 250,
        name: 'displayName'
      },
      {
        // As the 'image' is the base type of assets, omitting it will
        // be set as `image` by default
        src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
        height: 350,
        width: 250,
        name: 'displayName'
      },
      {
        // As the 'image' is the base type of assets, omitting it will
        // be set as `image` by default
        src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
        height: 350,
        width: 250,
        name: 'displayName'
      },
      {
        // As the 'image' is the base type of assets, omitting it will
        // be set as `image` by default
        src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
        height: 350,
        width: 250,
        name: 'displayName'
      },
      {
        // As the 'image' is the base type of assets, omitting it will
        // be set as `image` by default
        src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
        height: 350,
        width: 250,
        name: 'displayName'
      },
      {
        // As the 'image' is the base type of assets, omitting it will
        // be set as `image` by default
        src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
        height: 350,
        width: 250,
        name: 'displayName'
      },
      {
        // As the 'image' is the base type of assets, omitting it will
        // be set as `image` by default
        src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
        height: 350,
        width: 250,
        name: 'displayName'
      },
      {
        // As the 'image' is the base type of assets, omitting it will
        // be set as `image` by default
        src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
        height: 350,
        width: 250,
        name: 'displayName'
      },
      {
        // As the 'image' is the base type of assets, omitting it will
        // be set as `image` by default
        src: 'https://cloudsolutions.com.sa/images/logo/cloudsolutions-logo-trans.png',
        height: 350,
        width: 250,
        name: 'displayName'
      },
        
      ],
    }
});


const comp = {
  tagName: 'div',
  components: [
    {
      type: 'image',
      attributes: { src: 'https://img-c.udemycdn.com/organization/W_70/154574_1ebf_2.png' },
    }, {
      tagName: 'span',
      type: 'text',
      attributes: { title: 'foo' },
      components: [{
        type: 'textnode',
        content: 'Hello world!!! 2'
      }]
    }
  ]
};

const components = editor.addComponents(comp);









// This is our custom script (avoid using arrow functions)
const script = function() {
  alert('Hi');
  // `this` is bound to the component element
  console.log('the element', this);
};

// Define a new custom component
editor.Components.addType('comp-with-js', {
  model: {
    defaults: {
      script,
      // Add some style, just to make the component visible
      style: {
        width: '100px',
        height: '100px',
        background: 'red',
      }
    }
  }
});

// Create a block for the component, so we can drop it easily
editor.Blocks.add('test-block', {
  label: 'Test block',
  attributes: { class: 'fa fa-text' },
  content: { type: 'comp-with-js' },
});


// components[0].toHTML()


editor.on('storage:store', function(e) {
alert(3);
  
})



editor.Panels.addButton
('options',
  [{
    id: 'save-db',
    className: 'fa fa-floppy-o',
    command: 'save-db',
    attributes: {title: 'Save DB'}
  }]
);





   // Add the command
   editor.Commands.add
   ('save-db',
   {
       run: function(editor, sender)
       {
         sender && sender.set('active', 0); // turn off the button
         editor.store();

         var htmldata = editor.getHtml();
         var cssdata = editor.getCss();
         console.log(htmldata);
         console.log(cssdata);
         $.post("templates/template",
         {
           html: htmldata,
           css: cssdata
         });
       }
   });
   


//    const bm = editor.BlockManager;
// editor.on('load', () => {
// editor.BlockManager.render([
// bm.get('column4').set('category', '33')
// ])
// });



