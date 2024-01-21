
  function cleartext(){
    $("input[name=end_date]").val('')
  }
  $('.create_modal').click(function() {
    //button value
    $('#saveBtn').html('Save');
    $("#reloadform")[0].reset(); 
    $(".dropify-clear").trigger("click");
    $(`.laravel_validation`).html('');
    $('.action').val('add');
    $('#createModal').modal('toggle');   
    CKEDITOR.instances.content.setData('')
  });
  
  if($("#" + 'button-image').length > 0) {
    document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('button-image').addEventListener('click', (event) => {
        event.preventDefault();
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });
  }
 // set file link
 function fmSetLink(url) { 
   $(".dropify-clear").trigger("click");
   $(".default_image").val('');           
  $(".file_media").val(url);
  $("input[name=image_selection]").val(1);
  $(".dropify-wrapper").addClass("has-preview");
  $('.dropify-loader').css("display","none");
  $('.dropify-preview').css("display","block");
  $('.dropify-render').html('<img src="'+url+'">');
  $('.dropify-filename-inner').html(url);

}
  function onOff(th){
    var z = document.getElementById('check');
    var on = th.parentElement.parentElement.querySelectorAll('.on')[0]; //document.getElementsByClassName('on');
    var off = th.parentElement.parentElement.querySelectorAll('.off')[0]; //document.getElementsByClassName('off');
    
    if (th.checked == false) {
      on.innerHTML="No";
      on.style.color="#253b52";
    } else {
      on.style.color="green";
      on.innerHTML="Yes";   
    
    }
  }
  $('#saveBtn').click(function() {
    $("#reloadform").submit();    
  });
  function convertToSlug(Text) {
    return Text.toLowerCase()
      .replace(/[^\w ]+/g, '')
      .replace(/ +/g, '-');
  }
  $($("input[name=title]")).on('keyup',function(){
    var slug = convertToSlug($(this).val());
    $("input[name=slug]").val(slug);
  });
  $('#searchBtn').click(() => {
    dateRange = $('#reportrange span').html();
    table.draw();
  });
  $(function() {
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

   

  $('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    autoUpdateInput: false,
    ranges: {
      'Today': [moment(), moment()],
      'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Last 7 Days': [moment().subtract(6, 'days'), moment()],
      'Last 30 Days': [moment().subtract(29, 'days'), moment()],
      'This Month': [moment().startOf('month'), moment().endOf('month')],
      'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
    }, cb);

    // cb(start, end);

  });
  $(function() {
    var dateToday = new Date();
   
    $('input[name="start_date"]').daterangepicker({
      timePicker: true,
      singleDatePicker: true,      
      drops:'up',
      changeMonth: true,
      showDropdowns:true,
      numberOfMonths: 3,
      minDate: dateToday,
      onSelect: function(selected) {
          var option = this.id == "from" ? "minDate" : "maxDate",
              instance = $(this).data("datepicker"),
              date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selected, instance.settings);
          dates.not(this).datepicker("option", option, date);
          
      },
      locale: {
        format: 'YYYY-MM-DD hh:mm:ss'
      }
    });
    $('input[name="end_date"]').daterangepicker({
      timePicker: true,
      singleDatePicker: true,      
      drops:'up',
      changeMonth: true,
      showDropdowns:true,
      numberOfMonths: 3,
      minDate: dateToday,
      onSelect: function(selected) {
          var option = this.id == "from" ? "minDate" : "maxDate",
              instance = $(this).data("datepicker"),
              date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selected, instance.settings);
          dates.not(this).datepicker("option", option, date);
      },
      locale: {
        format: 'YYYY-MM-DD hh:mm:ss'
      }
    });
  });
  if ($(".meta_tags")[0]){
    document.querySelector('.meta_tags').onclick = function(){

    $('#meta_tags_table').append(`<tr> 
      <td> <input type="text" class="form-control" name="meta_tag_name[]" placeholder="Please enter meta tag name">
      </td> 
      <td><input type="text" class="form-control" name="meta_tag_content[]" placeholder="Please enter meta tag content">
      </td> 
      <td> <i class="fa fa-trash removeMetaTag" onclick="removeMetaTag(this)"  aria-hidden="true"></i>
      </td> 
      </tr>`);
    };
    
    function removeMetaTag(el){
    el.parentNode.parentNode.remove();
    }
  }

  $(document).ready(function () {

    $("#dropify-event").change(function(){
      $('.file_media').val('');
      $(".default_image").val('');           

      $("input[name=image_selection]").val(0);
    });
  });
  $(function() {
    "use strict"; 
    var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
          $('.file_media').val('')
          $(".default_image").val('');                         
          $("input[name=image_selection]").val(0);

    });
});