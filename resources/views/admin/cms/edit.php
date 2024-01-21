<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="<?= csrf_token() ?>">

  <title>CMS</title>

  
  <link rel="stylesheet" href="<?= asset('/css/sweetalert2.min.css')?>" />

  <link rel="stylesheet" href="<?= asset('/cms/css/lib/grapesjs-preset-webpage.min.css') ?>" />
  <link rel="stylesheet" href="<?= asset('/cms/css/main.css') ?>" />
  <link rel="stylesheet" href="<?= asset('/cms/css/lib/grapes.min.css') ?>" />

  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   -->
  
   
   <script src="<?=url('/')?>/admin/plugins/jquery/jquery.min.js"></script>

    <script src="<?= asset('/cms/js/lib/grapes.min.js') ?>"></script>


  <!-- BOOTSTRAP CSS -->
  <link rel="stylesheet" href="<?= asset('/bootstrap5/bootstrap.css')?>" />

  <!-- Grape JS Scripts -->
  <script src="<?= asset('/cms/js/lib/grapesjs-tabs.min.js')?>"></script>
  <script src="<?= asset('/cms/js/lib/grapesjs-lory-slider.min.js') ?>"></script>
  <script src="<?= asset('/cms/js/lib/grapesjs-touch.min.js') ?>"></script>
  <script src="<?= asset('/cms/js/lib/grapesjs-preset-webpage.min.js') ?>"></script>
  <script src="<?= asset('/cms/js/lib/grapesjs-custom-code.min.js') ?>"></script>


  <!-- SWEET ALERT -->

  <script src="<?= asset('/admin/js/sweetalert.min.js')?>"></script>

  <!-- BOOTSTRAP JS -->
  <script src="<?= asset('/bootstrap5/bootstrap.bundle.min.js')?>"></script>




</head>

<body>

  <div id="custom-css-result">

  </div>

  <div id="custom-js-result">

  </div>

  <div id="custom-cdn-result">

  </div>



  <div id="side_nav" style="position: absolute;z-index: 2;width: 20%;opacity: 0;overflow-y: scroll;height: 90%;"> </div>
  <div id="editor">

  </div>



  <!-- Custom CSS Modal -->
  <div class="modal " id="custom-css">
    <div class="modal-dialog">
      <div class="modal-content ">
        <!-- Modal Header -->
        <div class="modal-header gjs-one-bg">
          <h4 class="modal-title text-white">Custom CSS</h4>
          <div onclick="$('#custom-css').modal('hide')" class="gjs-mdl-btn-close" data-close-modal="">⨯</div>
        </div>
        <!-- Modal body -->
        <div class="modal-body gjs-one-bg">
          <div class="conainer">
            <textarea style="background-color:#322931; color: #fff;" class="form-control" id="custom-css-text"
              name="custom-css-text" rows="12" cols="100" placeholder="Add your custom CSS here"><?php
              if ($page_data->custom_css) {
                echo $page_data->custom_css;
              } ?></textarea>
            <button type="button" id="custom-css-save" class="gjs-btn-prim gjs-btn-import text-white mt-1">
              Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Custom JS Modal -->
  <div class="modal " id="custom-js">
    <div class="modal-dialog">
      <div class="modal-content ">
        <!-- Modal Header -->
        <div class="modal-header gjs-one-bg">
          <h4 class="modal-title text-white">Custom JS</h4>
          <div onclick="$('#custom-js').modal('hide')" class="gjs-mdl-btn-close" data-close-modal="">⨯</div>
        </div>
        <!-- Modal body -->
        <div class="modal-body gjs-one-bg">
          <div class="container">
            <textarea style="background-color:#322931; color: #fff;" class="form-control" id="custom-js-text"
              name="custom-js-text" rows="12" cols="100" placeholder="Add your custom CSS here"><?php
              if ($page_data->custom_js) {
                echo $page_data->custom_js;
              } ?></textarea>
            <button type="button" id="custom-js-save" class="gjs-btn-prim gjs-btn-import text-white mt-1"> Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Custom CDN's Modal -->
  <div class="modal " id="custom-cdn">
    <div class="modal-dialog">
      <div class="modal-content ">
        <!-- Modal Header -->
        <div class="modal-header gjs-one-bg">
          <h4 class="modal-title text-white">Custom CDN's</h4>
          <div onclick="$('#custom-cdn').modal('hide')" class="gjs-mdl-btn-close" data-close-modal="">⨯</div>
        </div>
        <!-- Modal body -->
        <div class="modal-body gjs-one-bg">
          <div class="container">
            <textarea style="background-color:#322931; color: #fff;" class="form-control" id="custom-cdn-text"
              name="custom-cdn-text" rows="12" cols="100" placeholder="Add your custom CSS here"><?php
              if ($page_data->custom_cdn) {
                echo $page_data->custom_cdn;
              }
              ?></textarea>
            <button type="button" id="custom-cdn-save" class="gjs-btn-prim gjs-btn-import text-white mt-1">
              Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- Custom Component Modal -->
  <div class="modal " id="custom-modal">
    <div class="modal-dialog">
      <div class="modal-content ">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Custom Component</h4>
          <div onclick="$('#custom-modal').modal('hide')" class="gjs-mdl-btn-close" data-close-modal="">⨯</div>
        </div>
        <!-- Modal body -->
        <div class="modal-body ">
          <div class="container">

            <div class="row">

              <div class="col-12 col-sm-12">
                <div class="pop-field-input">
                  <label for=""> Your Component Name</label>
                  <input class="form-control" required type="text" name="custom_component_name" placeholder="Please enter your component name">
                  <span id="name_err" class="text-danger laravel_validation"> </span>
                </div>
              </div>

              
              <div class="col-12 col-sm-12">
                <div class="pop-field-input mt-2">
                  <button type="button" id="custom-component-save"  style="
                    float: right;"  class="btn btn-success float-right "> Save Component</button>
                </div>
              </div>

            </div>

            
          </div>

          


        </div>
      </div>
    </div>
  </div>





  <script>


    var customCssText = '';
    var customJsText = '';
    var customCdnText = '';

    const editor = grapesjs.init({
      container: "#editor",
      fromElement: true,
      width: "auto",
      storageManager: false,
      plugins: ["gjs-preset-webpage", "grapesjs-custom-code", 'grapesjs-lory-slider', 'grapesjs-touch', 'grapesjs-tabs'],
      pluginsOpts: {
        "gjs-preset-webpage": {},
        'grapesjs-custom-code': {},
        'grapesjs-tabs.min.js': {},
        'grapesjs-lory-slider': {},
        'grapesjs-touch': {},
      },
      allowScripts: 1,
      storageManager: {
        autosave: false,
        setStepsBeforeSave: 2,
        type: 'remote',
        urlStore: '<?= asset("/cms/save") ?>',
        contentTypeJson: true,
        params: {
          'slug': '<?= $page_slug ?>',
          'type': 'basic'
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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



    // const script = function() {
    //   alert('Hi');
    //   console.log('the element', this);
    // };

    // editor.Components.addType('comp-with-js', {
    //   model: {
    //     defaults: {
    //       script,
    //       style: {
    //         width: '100px',
    //         height: '100px',
    //         background: 'red',
    //       }
    //     }
    //   }
    // });


    // Create a block for the component, so we can drop it easily


<?php
    if ($custom_blocks){
      foreach ($custom_blocks as $block) { ?>
  
        editor.Blocks.add('<?= $block->name?>', {
          label: '<?= $block->name?>',
          category: 'Components',
           attributes: { class: 'fa fa-file-o' },
          //media: `<img style="height:70px; width:100%;" src='<?=asset("/admin/custom_placeholder_1.png")?>'>`,
          content: `<?= json_decode($block->block_data) ?>`
        });

    <?php  }      
    } ?>





    editor.Blocks.add('news-slider-block', {
      label: 'News Slider',
      category: 'Components',
      attributes: { class: 'fa fa-file-o' },
      content: news_component('news_slider', 'Dynamic News')
    });

    editor.Blocks.add('custom_navbar-block', {
      label: 'Navbar',
      category: 'Components',
      attributes: { class: 'fa fa-file-o' },
      content: navbar_component('custom_navbar', 'Dynamic Navbar')
    });
    editor.Blocks.add('banner_slider-block', {
      label: 'Banner',
      category: 'Components',
      attributes: { class: 'fa fa-file-o' },
      content: banner_component('banner_slider', 'Dynamic Banner')
    });

    editor.Blocks.add('services_slider-block', {
      label: 'Services',
      category: 'Components',
      attributes: { class: 'fa fa-file-o' },
      content: service_component('services_slider', 'Dynamic Services')
    });

    // editor.Components.addType('new-component', {
    //   extend: 'wrapper',
    //   model: {
    //     defaults: {
    //       attributes: {
    //         class: 'new-component'
    //       },
    //       editable: true,
    //       traits: ['name', 'placeholder', {
    //         type: 'button', label: 'Save',
    //         full: true, text: 'Save', command: editor => {
    //           saveNewComponent(editor)
    //         }
    //       }],
    //       content: `<div class="inner" style="border: 4px dashed #7d7d7d; min:height:10px"> <h2> New Component</h2></div>`
    //     }
    //   },

    // });

    // editor.Blocks.add('new-component-block', {
    //   label: 'New Component',
    //   category: 'Components',
    //   attributes: { class: 'fa fa-crosshairs' },
    //   content: { type: 'new-component' }
    // });






    // #fffbea


    
    function navbar_component(id, placeholder){
      return `<section style="border: 4px dashed #7d7d7d; padding:1px" class="custom_component" >
            <div class="custom_component_ph">
            <?php echo view('admin.cms.components.custom_navbar');?>
            </div>
            <div class="custom_component_content" style="display:none">
              @include('admin.cms.components.${id}')
            </div>
         </section>`;}


    function news_component(id, placeholder){
      return `<section style="border: 4px dashed #7d7d7d; padding:1px" class="custom_component" >
            <div class="custom_component_ph">
            <?php echo view('admin.cms.components.news_slider');?>
            </div>
            <div class="custom_component_content" style="display:none">
              @include('admin.cms.components.${id}')
            </div>
         </section>`;
    }


    function banner_component(id, placeholder){
      return `<section style="border: 4px dashed #7d7d7d; padding:1px" class="custom_component" >
            <div class="custom_component_ph">
            <?php echo view('admin.cms.components.banner_slider');?>
            </div>
            <div class="custom_component_content" style="display:none">
              @include('admin.cms.components.${id}')
            </div>
         </section>`;
    }


    function service_component(id, placeholder){
      return `<section style="border: 4px dashed #7d7d7d; padding:1px" class="custom_component" >
            <div class="custom_component_ph">
            <?php echo view('admin.cms.components.services_slider');?>
            </div>
            <div class="custom_component_content" style="display:none">
              @include('admin.cms.components.${id}')
            </div>
         </section>`;
    }

    function set_component(id, placeholder) {

      // 

      // <img style="height:auto; width:100%;" src='/custom_components/${id}.png'>

      return `<section style="border: 4px dashed #7d7d7d; padding:1px" class="custom_component" >
            <div class="custom_component_ph">
            <h2> ${id}</h2>
            </div>
            <div class="custom_component_content" style="display:none">
              @include('admin.cms.components.${id}')
            </div>
         </section>`;
    }


    // <div style="background-color:#fffbea; padding:5rem;" data-gjs-editable="false"> 
    //                 <p style=" text-align: center; font-size: 32px;" data-gjs-editable="false" > ${placeholder} </p> 
    //               </div>

    // components[0].toHTML()


    editor.on('storage:store', function (e) {

      console.log("e", e);
    })



    editor.Panels.addButton
      ('options',
        [{
          id: 'save-page',
          className: 'fa fa-floppy-o',
          command: 'save-page',
          attributes: { title: 'Save' }
        }, {
          id: 'publish-page',
          className: 'fa fa-share-square-o',
          command: 'publish-page',
          attributes: { title: 'Publish' },
          command(editor) { publish_page(); }
        }, {
          id: 'save-css',
          className: 'fa fa-css3',
          attributes: { title: 'Add Custom CSS' },
          command(editor) {
            add_custom_css();
          }
        }, {
          id: 'save-js',
          className: 'fa fa-jsfiddle',
          attributes: { title: 'Add Custom Js' },
          command(editor) {
            add_custom_js();
          }
        }, {
          id: 'save-cdn',
          className: 'fa fa-window-restore',
          attributes: { title: 'Add CDNs' },
          command(editor) {
            add_custom_cdn();
          }
        }, {
          id: 'back-button',
          className: 'fa fa-arrow-left',
          attributes: { title: 'Back' },
          command(editor) {
            window.location.href = "<?= route('cms.list') ?>"
          }
        } , {
          id: 'back-button',
          className: 'fa fa-code',
          attributes: { title: 'Custom Components' },
          command(editor) {
            $('#side_nav').css('opacity','1'); 
          }
        }]
      );







    // Add the command
    editor.Commands.add
      ('save-page',
        {
          run: function (editor, sender) {
            sender && sender.set('active', 0);

            //  var htmldata = editor.getHtml();
            //  var cssdata = editor.getCss();


            $.ajax({
              url: '<?= asset("/cms/save") ?>',
              type: 'post',
              data: {
                custom_css: customCssText,
                custom_js: customJsText,
                custom_cdn: customCdnText,
                type: 'custom',
                slug: '<?= $page_slug ?>',
              },
              headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
              },
              dataType: 'json',
              success: function (data) {
                editor.store();
              }
            });


            swal("Congractulations!", "Your page has been updated successfully.", "success");

          }
        });




    <?php
    if (isset($page_data->page_data)) {
      ?>

      $(document).ready(function () {
        <?php if ($page_data->custom_css) { ?>
          saveCustomCss();
        <?php }

        if ($page_data->custom_js) { ?>
          saveCustomJs();

        <?php }

        if ($page_data->custom_cdn) { ?>
          saveCustomCdn();
        <?php } ?>
      });



      <?php $dt = json_decode($page_data->page_data);

      if ($dt) {
        foreach ($dt as $key => $value) {
          // gjs-htmlgjs-componentsgjs-assetsgjs-cssgjs-styles
          if ($key == "gjs-components") { ?>
            const components = editor.addComponents(<?= $value ?>);
          <?php }
          if ($key == "gjs-styles") { ?>
            editor.setStyle(<?= $value ?>);
          <?php }
        }
      }
    } ?>



  </script>


  <!-- CUSTOM CSS, JS AND CDN -->
  <script>

    function add_custom_css() {
      $('#custom-css').modal('show');
    }
    function add_custom_js() {
      $('#custom-js').modal('show');
    }
    function add_custom_cdn() {
      $('#custom-cdn').modal('show');
    }

    // iframe.contents().find("head").append($('<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">'));
    // $('#wrapper', iframe.contents()).css('padding-bottom','100px'); // set a backgroud-color for the body






    function publish_page() {


      $.ajax({
        url: "<?= route('cms.publish_page') ?>",
        type: 'post',
        data: {
          slug: '<?= $page_slug ?>',
        },
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        success: function (data) {

          if (data.success) {
            swal("Congractulations!", data.message, "success");
          } else {
            swal("Error!", data.message, "error");
          }
        }
      });
    }





    function saveCustomCss() {
      customCssText = document.getElementById('custom-css-text').value;
      var iframe = $('iframe.gjs-frame');
      iframe.contents().find("head").append('<style>' + customCssText + '</style');
      $('#custom-css').modal('hide');
    }

    $("#custom-css-save").click(function () {
      saveCustomCss();
    });

    function saveCustomJs() {
      customJsText = document.getElementById('custom-js-text').value;
      //customJsTextS = '<script>';
      // customJsTextS += customJsText;
      //customJsTextS += "<script/>";

      var iframe = $('iframe.gjs-frame');
      iframe.contents().find("head").append('<script>'+customJsText+'<script/>');
      $('#custom-js').modal('hide');
    }

    $("#custom-js-save").click(function () {
      saveCustomJs();
    });


    function saveCustomCdn() {
      customCdnText = document.getElementById('custom-cdn-text').value;
      var iframe = $('iframe.gjs-frame');
      iframe.contents().find("head").append(customCdnText);
      $('#custom-cdn').modal('hide');
    }

    $("#custom-cdn-save").click(function () {
      saveCustomCdn();
    });


    function saveNewComponent(editor) {
      let contentHtml = editor.getHtml();
      let contentCss = editor.getCss();
      console.log("content", contentHtml);
    }
  </script>



  <script>


    // define this event handler after editor is defined
    // like in const editor = grapesjs.init({ ...config });
    editor.on('component:selected', () => {

      // whenever a component is selected in the editor

      // set your command and icon here
      const commandToAdd = editor => {
        saveComponent(editor);
      };


      const commandIcon = 'fa fa-floppy-o save-component';

      // get the selected componnet and its default toolbar
      const selectedComponent = editor.getSelected();
      const defaultToolbar = selectedComponent.get('toolbar');

      // check if this command already exists on this component toolbar
      const commandExists = defaultToolbar.some(item => item.command === commandToAdd);

      // if it doesn't already exist, add it
      if (!commandExists) {
        selectedComponent.set({
          toolbar: [...defaultToolbar, { attributes: { class: commandIcon }, command: commandToAdd }]
        });
      }

    });

  </script>



  <script>

    var customComponentHtmlBlock = '';
    var customComponentCssBlock = '';

    function saveComponent(e) {
      customComponentHtmlBlock = e.getSelected().toHTML();
      customComponentCssBlock = '';//e.getSelected().toCSS();
      $('#custom-modal').modal('show');
    }

    $("#custom-component-save").click(function () {
      saveCustomComponent();
    });


    function saveCustomComponent(){

           $.ajax({
              url: '<?= route('cms.create_block') ?>',
              type: 'post',
              data: {
                component_name: $('input[name="custom_component_name"]').val(),
                custom_html: customComponentHtmlBlock,
              },
              headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
              },
              dataType: 'json',
              success: function (data) {
                $('#custom-modal').modal('hide')
                swal("Congractulations!", "Your page has been updated successfully.", "success");
              }
            });


    }

let iframeHtml = '';
    $(document).ready(function () {

  let filtered = editor.Blocks.getAll().filter(block=>  block.get('category').id == 'Components');
      const newBlocksEl = editor.Blocks.render(filtered,{ external: true });
       $('#side_nav').append(newBlocksEl);

       
    $('#side_nav .gjs-block').mousedown(()=>{ 
      iframeHtml = $('iframe.gjs-frame').contents().find("body")
      $('#side_nav').css('opacity','0'); 
    });

      // $('#editor').mouseup(()=>{ 
      // alert("left")
      // })


  
      $('.gjs-block-category')[4].remove();
       });
       

      // $('.gjs-editor').click(()=>{ 
      //   $('#side_nav').css('opacity','0'); 
      // });

 


  </script>
  
</body>

</html>