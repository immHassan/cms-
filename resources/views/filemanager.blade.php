 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
    <link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <input type="text" class="form-control" name="image"
          aria-label="Image" aria-describedby="button-image">
  <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
  </div>




<!-- <div class="container mt-5">
    <form method="post">
        <textarea id="content"></textarea>
    </form>
</div>  -->

 
<!-- <div class="row">
    <div class="col-md-12" id="fm-main-block">
        <div id="fm"></div>
    </div>
</div>  -->
<!-- <div class="container">
    <textarea name="editor"></textarea>
</div> -->

<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script> 
<script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
<script>
    var editor =CKEDITOR.replace( 'editor', {
      filebrowserImageBrowseUrl: '/file-manager/ckeditor',
    });
</script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
      selector: '#content',
      paste_block_drop: false,
      paste_data_images: true,
      paste_as_text: true,
      visual: false, 
      plugins: [
        'advlist autolink lists link image print charmap preview hr anchor pagebreak',
        'searchreplace wordcount code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'codesample emoticons hr paste textcolor colorpicker textpattern',
      ],
      toolbar: ' undo redo print | formatselect | fontselect | fontsizeselect | blockquote colorpicker | superscript subscript backcolor forecolor bold italic underline strikethrough | codesample emoticons hr table | alignleft aligncenter alignright alignjustify paragraph charmap | bullist numlist outdent indent | code link image media preview fullscreen ',
      relative_urls: false,
      font_formats: 'Sacramento=Sacramento; Cookie=Cookie; Great Vibes=Great Vibes; Fredoka One=Fredoka One; Alfa Slab One=Alfa Slab One; Satisfy=Satisfy; Permanent Marker=Permanent Marker; Staatliches=Staatliches; Abril Fatface=Abril Fatface; Dancing Script=Dancing Script; Pacifico=Pacifico; Josefin Sans=Josefin Sans; Montserrat=Montserrat; Mogra=Mogra; Andale Mono=andale mono; Arial=arial; Arial Black=arial black; Book Antiqua=book antiqua; Comic Sans MS=comic sans ms; Courier New=courier new; Georgia=georgia; Helvetica=helvetica; Impact=impact; Symbol=symbol; Tahoma=tahoma; Terminal=terminal; Times New Roman=times new roman; Verdana=verdana; Webdings=webdings; Wingdings=wingdings',
      fontsize_formats: '11px 12px 14px 16px 18px 24px 36px 48px 60px 72px 84px',
     
      file_browser_callback: function(field_name, url, type, win) {
        tinyMCE.activeEditor.windowManager.open({
          file: '/file-manager/tinymce',
          title: ' Media Manager',
          width: window.innerWidth * 0.8,
          height: window.innerHeight * 0.8,
          resizable: 'yes',
          close_previous: 'no',
        }, {
          setUrl: function(url) {
            win.document.getElementById(field_name).value = url;
          },
        });
      },
    });
  });
</script> 
<script>
  document.addEventListener("DOMContentLoaded", function() {

    document.getElementById('button-image').addEventListener('click', (event) => {
        
      event.preventDefault();
      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800'); 

    });
  });

  // set file link
  function fmSetLink($url) {
    $('.file_media').val($url);
    $(".dropify-wrapper").addClass("has-preview");
    $('.dropify-loader').css("display","none");
    $('.dropify-preview').css("display","block");
    $('.dropify-render').html('<img src="'+$url+'">');
    $('.dropify-filename-inner').html($url);
 
  }

    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

    fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
    window.opener.fmSetLink(fileUrl);
    window.close();
    });
    });
</script>


 
  <link rel="stylesheet" href="/assets/plugins/dropify/css/dropify.min.css">

 <form id="form" action="" method="post" enctype="multipart/form-data">
 @csrf
    <div class="col-sm-4 mt-3">
        <input type="hidden" name="file" class="file_media"> 
        <input type="file" name="image" data-show-loader="true" id="dropify-event" data-max-file-size="200K" data-allowed-file-extensions="jpg png">
        <small class="text-danger">Recommended image size is 200px and Type Should be Jpg or Png</small>
        <button type="submit" class="btn btn-primary">SAVE</button>
    </div>
</form>

<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="assets/plugins/dropify/js/dropify.min.js"></script>
<script>
    $(function() {
        "use strict";
        
        var drEvent = $('#dropify-event').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete ?");
        });
    });


    $(document).ready(function (e) {
        $("#form").on('submit',(function(e) {
            e.preventDefault(); 
            $.ajax({
                url: "filemanager",
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                        cache: false,
                processData:false,
            
                success: function(data)
                    {
                        $("#form")[0].reset(); 
                    },
                    error: function(e) 
                    {
                    
                    }          
            });
        }));
    });
</script>