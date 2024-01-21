

// function myPlugin(editor){
//   editor.BlockManager.add('my-first-block', {
//     label: 'Simple block',
//     content: '<div class="my-block">This is a simple block</div> <script> console.log(2);</script>',
//   });
// }





const editor = grapesjs.init({
  container: "#editor",
  fromElement: true,
  width: "auto",
  storageManager: false,
  plugins: ["gjs-preset-webpage","grapesjs-custom-code",'grapesjs-script-editor'],
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
       }
        
      ],
    }
});







