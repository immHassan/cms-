@extends('admin.layouts.app')
@section('pageCss') 
<link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('css/eventboot.css')}}" />

<link rel="stylesheet" href="{{asset('css/eventtoastr.css')}}" />
<script src="{{asset('js/eventjquery.js')}}"></script>
<script src="{{asset('js/eventtoaster.js')}}"></script>


<style>
    .eventscroll{
        overflow-y:scroll;
        height:230px !important
    }
    .cke_inner{
        width:765px !important;
    }
</style>
@endsection

@section('mainContent')
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix row-deck">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                    <h3 class="card-title">{{__('languages.upcoming_event')}} <small>{{__('languages.this_month_upcomming')}}</small></h3>
                        
                    <div class="todo_list mb-4">
                            <ul class="list-unstyled mb-0 eventscroll">
                            @foreach($upcomming as $key => $upcome)
                                <li>
                                    <label class="custom-control pl-0">
                                        <span>{{$upcome->title}}</span>
                                        <span class="float-right">{{$upcome->start}} </span>
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <h3 class="card-title mt-3">{{__('languages.events_list')}} <small>{{__('languages.this_month_event')}}</small></h3>
                        
                        <div id="event-list" class="fc event_list eventscroll">
                            @foreach($data as $event)
                                <?php
                                $string = $event->title;
                                if (strlen($string) >= 20) {
                                    
                                    $string = substr($string, 0, 10). " ... " . substr($string, -5);
                                }
                                else {
                                    $string = $string;
                                }
                                
                                ?>
                            <div class='fc-event {{$event->className}}' id="{{$event->id}}" data-class="{{$event->className}}"> {{$string}}  <span class="float-right">{{$event->start}} </span></div>

                            @endforeach
                            
                        </div>
                        
                    </div>                            
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header bline">
                        <h3 class="card-title">{{__('languages.events')}}</h3>
                        <div class="card-options"> 
                            <button type="button" class="btn btn-primary addDirectEvent" data-toggle="modal" data-target="#addDirectEvent"><i class="fe fe-plus mr-2"></i>{{__('languages.add')}}</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="calendar"></div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
 
<!-- Add Event popup -->
<div class="modal fade" id="addDirectEvent"  role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('languages.add_event')}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_name')}}</label>
                        <div class="input-group">
                            <input class="form-control" placeholder="{{__('languages.event_name')}}" name="event-name" type="text" />
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label>{{__('languages.event_type')}}</label>
                     
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-database"></i></span>
                            </div>                                   
                           <select name="event-bg" class="form-control" id="">
                                <option>{{__('languages.select_event_type')}}</option>
                               <option value="bg-blue">{{__('languages.blue')}}</option>
                               <option value="bg-green">{{__('languages.green')}}</option>
                               <option value="bg-orange">{{__('languages.orange')}}</option>
                               <option value="bg-purple">{{__('languages.purple')}}</option>
                               <option value="bg-red">{{__('languages.red')}}</option>
                               <option value="bg-yellow">{{__('languages.yellow')}}</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_start_date')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            <input placeholder="{{__('languages.event_start_date')}}" data-date-format="yyyy-mm-dd" name="event-start-date" type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_end_date')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input class="form-control"  data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" placeholder="{{__('languages.event_end_date')}}" name="event-end-date" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_start_time')}}</label>
                            <b>{{__('languages.time_formate')}}</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-clock"></i></span>
                                </div>
                                <input type="text" class="form-control time24" name="event-start-time" placeholder="Ex: 23:59">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_end_time')}}</label>
                            <b>{{__('languages.time_formate')}}</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-clock"></i></span>
                                </div>
                                <input type="text" class="form-control time24" name="event-end-time" placeholder="Ex: 23:59">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_organizer')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user width-1 text-align-center"></i></span>
                                </div> 
                            <input class="form-control" placeholder="{{__('languages.event_organizer')}}" name="event-organizer" type="text" />
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="custom-switch mb-3">
                        <label for=""> {{__('languages.is_virtual')}}</label>
                        <input class="toggle-check custom-switch-input" name="is_virtual" onclick="onOff(this)" type="checkbox">
                        <span class="custom-switch-indicator toggle ml-2 mb-1"></span>
                        <div class="on ml-1">{{__('languages.no')}}</div>
                        </label>
                        <br>
                        <!-- <label class="custom-switch">
                        <label for=""> {{__('languages.is_recurrence')}}</label>
                        <input class="toggle-check custom-switch-input" name="is_recurrence" onclick="onOff2(this)" type="checkbox">
                        <span class="custom-switch-indicator toggle ml-2 mb-1"></span>
                        <div class="on1 ml-1">{{__('languages.no')}}</div>
                        </label> -->
                    </div>     
                    
                    <div class="col-md-6 event_url" style="">
                        <div class="form-group">
                            <label>{{__('languages.event_location')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-building width-1 text-align-center"></i></span>
                                </div> 
                            <input class="form-control" placeholder="{{__('languages.event_location')}}" name="event-location" type="text" />
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 event_location" style="display:none">
                        <div class="form-group">
                            <label>{{__('languages.event_url')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-desktop width-1 text-align-center"></i></span>
                                </div> 
                                <input class="form-control url" data-inputmask="'alias': 'url'"  placeholder="{{__('languages.event_url')}}" name="event-url" />
                            </div>
                            <span class="help-block">http:// or ftp://</span>
                        </div>
                                         
                    </div>
 

                    <div class="col-md-12 event_recurrence" style="display:none">
                        <div class="form-group">
                            <label>{{__('languages.recurrence_pattren')}}</label>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="example-inline-radios" value="daily" checked>
                                    <span class="custom-control-label">{{__('languages.daily')}}</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="example-inline-radios" value="weekly">
                                    <span class="custom-control-label">{{__('languages.weekly')}}</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="example-inline-radios" value="monthly">
                                    <span class="custom-control-label">{{__('languages.monthly')}}</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="example-inline-radios" value="yearly">
                                    <span class="custom-control-label">{{__('languages.yearly')}}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                    <label>{{__('languages.event_description')}}</label>
                        
                        <textarea name="content" id="content"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn save-btn custom-save btn-success">{{__('languages.save')}}</button>
                <button class="btn btn-secondary" data-dismiss="modal">{{__('languages.close')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- Event Edit Modal popup -->
<div class="modal fade" id="eventEditModal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('languages.edit_event')}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_name')}}</label>
                        <div class="input-group">
                            <input class="form-control" placeholder="{{__('languages.event_name')}}" name="event-name" type="text" />
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label>{{__('languages.event_type')}}</label>
                     
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-database"></i></span>
                            </div>                                   
                           <select name="event-bg" class="form-control" id="selectclassName">
                                <option>{{__('languages.select_event_type')}}</option>
                               <option value="bg-blue">{{__('languages.blue')}}</option>
                               <option value="bg-green">{{__('languages.green')}}</option>
                               <option value="bg-orange">{{__('languages.orange')}}</option>
                               <option value="bg-purple">{{__('languages.purple')}}</option>
                               <option value="bg-red">{{__('languages.red')}}</option>
                               <option value="bg-yellow">{{__('languages.yellow')}}</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_start_date')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                            <input placeholder="{{__('languages.event_start_date')}}" data-date-format="yyyy-mm-dd" name="event-start-date" type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_end_date')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input class="form-control"  data-provide="datepicker" data-date-autoclose="true" data-date-format="yyyy-mm-dd" placeholder="{{__('languages.event_end_date')}}" name="event-end-date" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_start_time')}}</label>
                            <b>{{__('languages.time_formate')}}</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-clock"></i></span>
                                </div>
                                <input type="text" class="form-control time24" name="event-start-time" placeholder="Ex: 23:59">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_end_time')}}</label>
                            <b>{{__('languages.time_formate')}}</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-clock"></i></span>
                                </div>
                                <input type="text" class="form-control time24" name="event-end-time" placeholder="Ex: 23:59">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>{{__('languages.event_organizer')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user width-1 text-align-center"></i></span>
                                </div> 
                            <input class="form-control" placeholder="{{__('languages.event_organizer')}}" name="event-organizer" type="text" />
                        </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="custom-switch mb-3">
                        <label for=""> {{__('languages.is_virtual')}}</label>
                        <input class="toggle-check custom-switch-input" name="is_virtual" onclick="onOff(this)" type="checkbox">
                        <span class="custom-switch-indicator toggle ml-2 mb-1"></span>
                        <div class="on ml-1">{{__('languages.no')}}</div>
                        </label>
                        <br>
                        <!-- <label class="custom-switch">
                        <label for=""> {{__('languages.is_recurrence')}}</label>
                        <input class="toggle-check custom-switch-input" name="is_recurrence" onclick="onOff2(this)" type="checkbox">
                        <span class="custom-switch-indicator toggle ml-2 mb-1"></span>
                        <div class="on1 ml-1">{{__('languages.no')}}</div>
                        </label> -->
                    </div>     
                    
                    <div class="col-md-6 event_url" style="">
                        <div class="form-group">
                            <label>{{__('languages.event_location')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-building width-1 text-align-center"></i></span>
                                </div> 
                            <input class="form-control" placeholder="{{__('languages.event_location')}}" name="event-location" type="text" />
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 event_location" style="display:none">
                        <div class="form-group">
                            <label>{{__('languages.event_url')}}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-desktop width-1 text-align-center"></i></span>
                                </div> 
                                <input class="form-control url" data-inputmask="'alias': 'url'"  placeholder="{{__('languages.event_url')}}" name="event-url" />
                            </div>
                            <span class="help-block">http:// or ftp://</span>
                        </div>
                                         
                    </div>
 

                    <div class="col-md-12 event_recurrence" style="display:none">
                        <div class="form-group">
                            <label>{{__('languages.recurrence_pattren')}}</label>
                            <div class="custom-controls-stacked">
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="example-inline-radios" value="daily" checked>
                                    <span class="custom-control-label">{{__('languages.daily')}}</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="example-inline-radios" value="weekly">
                                    <span class="custom-control-label">{{__('languages.weekly')}}</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="example-inline-radios" value="monthly">
                                    <span class="custom-control-label">{{__('languages.monthly')}}</span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" name="example-inline-radios" value="yearly">
                                    <span class="custom-control-label">{{__('languages.yearly')}}</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                    <label>{{__('languages.event_description')}}</label>
                        
                        <textarea name="content2" id="content2"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn mr-auto delete-btn btn-danger deleteevent" id="">{{__('languages.delete')}}</button>
                <button class="btn update-btn btn-success">{{__('languages.update')}}</button>
                <button class="btn btn-default" data-dismiss="modal">{{__('languages.cancel')}}</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pageJs') 
<script src="{{asset('assets/bundles/fullcalendar.bundle.js')}}"></script> 
<script src="{{asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>

<script>
    $(function() {
        $('.url').inputmask();
        $('.time24').inputmask('hh:mm', { placeholder: '__:__ _m', alias: 'time24', hourFormat: '24' });
    });
    function onOff(th){
        var on = th.parentElement.parentElement.querySelectorAll('.on')[0]; //document.getElementsByClassName('on');
        if (th.checked == true) {
            on.innerHTML="{{__('languages.yes')}}";   
            on.style.color="green";
            $('.event_location').css('display','block')
            $('.event_url').css('display','none')

            $('#addDirectEvent input[name="event-location"]').val('');

        } else {
            $('.event_url').css('display','block')
            $('.event_location').css('display','none')
            $('#addDirectEvent input[name="event-url"]').val('');
            on.style.color="#253b52";
            on.innerHTML="{{__('languages.no')}}";
        
        }
    }
    function onOff2(th){
        var on = th.parentElement.parentElement.querySelectorAll('.on1')[0];

        if (th.checked == true) {
            on.innerHTML="{{__('languages.yes')}}";   
            on.style.color="green";
            $('.event_recurrence').css('display','block')
        } else {
            $('.event_recurrence').css('display','none')
            
            on.style.color="#253b52";
            on.innerHTML="{{__('languages.no')}}";
        
        }
    }
    $('#addDirectEvent .custom-save').on('click', function() {
        var calendar = $('#calendar');
        var title = $('#addDirectEvent input[name="event-name"]').val();
        var start =  $('#addDirectEvent input[name="event-start-date"]').val();
        var end =  $('#addDirectEvent input[name="event-end-date"]').val();
        var className = $('#addDirectEvent select[name="event-bg"]').val();
        var organizer = $('#addDirectEvent input[name="event-organizer"]').val();
        var content = CKEDITOR.instances.content.getData();
        var url = $('#addDirectEvent input[name="event-url"]').val();
        var location = $('#addDirectEvent input[name="event-location"]').val();
        var start_time = $('#addDirectEvent input[name="event-start-time"]').val();
        var end_time = $('#addDirectEvent input[name="event-end-time"]').val();
        if (title && className && organizer && start) {
            
            var location_or_url = '';
            if(location == '' && url == ''){
                alert('Location or URL Is Required.')
                }
                else{
                if(location == ''){
                    location_or_url = url;
                }
                else{
                    location_or_url = location;                    
                }
                if(start > end){
                    alert('End Date should be greater');
                }
                else{
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/events",
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            className:className,
                            organizer:organizer,
                            content:content,
                            location_or_url:location_or_url,
                            start_time:start_time,
                            end_time:end_time,
                            action: 'add'
                        },
                        type: "POST",
                        success: function (data) {
                            displayMessage("{{__('languages.event_created')}}");
                            if(start_time){
                                start = start+' '+start_time;
                            }
                            if(end_time){
                                end = end+' '+end_time;
                            }
                            var eventData = {
                                id: data.id,
                                title: title,
                                start: start,
                                end: end,
                                className:className,
                                organizer:organizer,
                                content:content,
                                location_or_url:data.location_or_url,
                                allDay: true
                            };
                            calendar.fullCalendar('renderEvent', eventData, true);
                            $('#addDirectEvent').modal('hide');

                            if (title !== null && title.length != 0) {
                                $('#event-list').prepend('<div id="'+data.id+'" class="fc-event ' + className + '" data-class="' + className + '">' + title + '<span class="float-right">' + start + '</span></div>');
                                $('#addDirectEvent').find("input[name='event-organizer']").val("");
                                $('#addDirectEvent').find("input[name='event-name']").val("");
                                $('#addDirectEvent').find("input[name='event-start-time']").val("");
                                $('#addDirectEvent').find("input[name='event-end-time']").val("");
                                $('#addDirectEvent').find("input[name='event-location']").val("");
                                $('#addDirectEvent').find("input[name='event-url']").val("");
                                $('#addDirectEvent').find("input[name='event-start-date']").val("");
                                $('#addDirectEvent').find("input[name='event-end-date']").val("");
                                $('#addDirectEvent').find("select[name='event-bg']").val("");
                                CKEDITOR.instances.content.setData('');
                                enableDrag();
                            }
                        }
                    });
                }
            }
        } else {
            alert("{{__('languages.title_not_blank')}}")
        }
    });

$(function() {
    enableDrag();
    function enableDrag() {
        $('#external-events .fc-event').each(function() {
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 
            });
        });
    }
    var calendar = $('#calendar');
  
    // initialize the calendar
    calendar.fullCalendar({
        header: {
            left: 'title',
            center: '',
            right: 'today, month, agendaWeek, agendaDay, prev, next'
        },
        buttonText: {
            today: '{{__("languages.today")}}',
            day: '{{__("languages.day")}}',
            week:'{{__("languages.week")}}',
            month:'{{__("languages.month")}}'
          },
          
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                    event.allDay = true;
            } else {
                    event.allDay = false;
            }
            element.attr('href', 'javascript:void(0);');
                element.click(function() {
                    // Rebind the Remove button click handler
                    $(".deleteevent").off('click').on('click', function(e) {
                        $.ajaxSetup({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: '/events',
                            data: {
                                id: this.id,
                                action: 'delete'
                            },
                            type: "POST",
                            success: function (response) {
                                displayMessage("{{__('languages.event_deleted')}}");
                                $('#'+event.id).remove();
                                
                                
                            }
                        });
                        $('#calendar').fullCalendar('removeEvents', event._id);
                        $('#eventEditModal').modal('hide');
                    });
                    
                });
        },
        editable: true,
        displayEventTime: true,
        droppable: true,
        displayEventEnd: true,
        eventLimit: true,
        selectable: true,
        selectHelper: true,
        events: "/events",
        drop: function(date, jsEvent) {
           
            if ($('#drop-remove').is(':checked')) { 
                $(this).remove();
            }
        },
        select: function(start, end, allDay) {
            $('#addDirectEvent input[name="event-name"]').val("");
            $('#addDirectEvent input[name="event-start-date"]').val("");
            $('#addDirectEvent input[name="event-end-date"]').val("");
            $('#addDirectEvent select[name="event-bg"]').val("");
            $('#addDirectEvent input[name="event-organizer"]').val("");
            CKEDITOR.instances.content.setData('');
            $('#addDirectEvent input[name="event-url"]').val("");
            $('#addDirectEvent input[name="event-location"]').val("");
            $('#addDirectEvent input[name="event-start-time"]').val("");
            $('#addDirectEvent input[name="event-end-time"]').val("");

            var start_hour = $.fullCalendar.formatDate(start, "HH");
            var start_minute = $.fullCalendar.formatDate(start, "mm");
            
            if(start_hour == '00' && start_minute == '00'){
                var start_date = $.fullCalendar.formatDate(start, "Y-MM-DD");
                $('#addDirectEvent input[name="event-start-date"]').val(start_date);

            }else{
                var start_date = $.fullCalendar.formatDate(start, "Y-MM-DD");
                var start_time = $.fullCalendar.formatDate(start, "HH:mm");
                $('#addDirectEvent input[name="event-start-date"]').val(start_date);                
                $('#addDirectEvent input[name="event-start-time"]').val(start_time);
                
            }
            
            var end_hour = $.fullCalendar.formatDate(end, "HH");
            var end_minute = $.fullCalendar.formatDate(end, "mm");
            if(end_hour == '00' && end_minute == '00'){
                var end_date = $.fullCalendar.formatDate(end, "Y-MM-DD");
                $('#addDirectEvent input[name="event-end-date"]').val(end_date);
                
            }else{
                var end_date = $.fullCalendar.formatDate(end, "Y-MM-DD");
                var end_time = $.fullCalendar.formatDate(end, "HH:mm");
                $('#addDirectEvent input[name="event-end-date"]').val(end_date);                
                $('#addDirectEvent input[name="event-end-time"]').val(end_time);        
            }

            $('#addDirectEvent').modal('show');
            $('#addDirectEvent .save-btn').unbind();

            $('#addDirectEvent .save-btn').on('click', function() {
               
                var title = $('#addDirectEvent input[name="event-name"]').val();
                var start =  $('#addDirectEvent input[name="event-start-date"]').val();
                var end =  $('#addDirectEvent input[name="event-end-date"]').val();
                var className = $('#addDirectEvent select[name="event-bg"]').val();
                var organizer = $('#addDirectEvent input[name="event-organizer"]').val();
                var content = CKEDITOR.instances.content.getData();
                var url = $('#addDirectEvent input[name="event-url"]').val();
                var location = $('#addDirectEvent input[name="event-location"]').val();
                var start_time = $('#addDirectEvent input[name="event-start-time"]').val();
                var end_time = $('#addDirectEvent input[name="event-end-time"]').val();

                if (title && className && organizer && start) {
                    
                    var location_or_url = '';
                    if(location == '' && url == ''){
                        alert('Location or URL Is Required.')
                        }
                        else{
                        if(location == ''){
                            location_or_url = url;
                        }
                        else{
                            location_or_url = location;                    
                        }
                        if(start > end){
                            alert('End Date should be greater');
                        }
                        else{
                            $.ajaxSetup({
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                url: "/events",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    className:className,
                                    organizer:organizer,
                                    content:content,
                                    location_or_url:location_or_url,
                                    start_time:start_time,
                                    end_time:end_time,
                                    action: 'add'
                                },
                                type: "POST",
                                success: function (data) {
                                    displayMessage("{{__('languages.event_created')}}");
                                    if(start_time){
                                        start = start+' '+start_time;
                                    }
                                    if(end_time){
                                        end = end+' '+end_time;
                                    }
                                    var eventData = {
                                        id: data.id,
                                        title: title,
                                        start: start,
                                        end: end,
                                        className:className,
                                        organizer:organizer,
                                        content:content,
                                        location_or_url:location_or_url,
                                        allDay: allDay
                                    };
                                    calendar.fullCalendar('renderEvent', eventData, true);
                                    $('#addDirectEvent').modal('hide');

                                    if (title !== null && title.length != 0) {
                                        $('#event-list').prepend('<div id="'+data.id+'" class="fc-event ' + className + '" data-class="' + className + '">' + title + '<span class="float-right">' + start + '</span></div>');
                                        $('#addDirectEvent').find("input[name='event-organizer']").val("");
                                        $('#addDirectEvent').find("input[name='event-name']").val("");
                                        $('#addDirectEvent').find("select[name='event-bg']").val("");
                                        CKEDITOR.instances.content.setData('');
                                        enableDrag();
                                    }
                                }
                            });
                        }
                    }
                } else {
                    alert("{{__('languages.title_not_blank')}}")
                }
            });
        },
        eventClick: function(calEvent, jsEvent, view) {
            $('.deleteevent').attr('id',calEvent.id);
            $('.check_gallery').attr('href','/check-event-gallery/'+calEvent.id);
            var CurrentDate = new Date();
            selected = new Date($.fullCalendar.formatDate(calEvent.start, "Y-MM-DD"));
            
            if(CurrentDate > selected){
                $('.check_gallery').text('{{__("languages.view_gallery")}}');                
            }
            else{
                $('.check_gallery').text('{{__("languages.want_to_add_gallery")}}');
            }
            var eventModal = $('#eventEditModal');

            event_start_date = $.fullCalendar.formatDate(calEvent.start, "Y-MM-DD");
            event_end_date = $.fullCalendar.formatDate(calEvent.end, "Y-MM-DD");
            event_start_time =$.fullCalendar.formatDate(calEvent.start, "HH:mm");
            event_end_time =$.fullCalendar.formatDate(calEvent.end, "HH:mm");

            $('#eventEditModal input[name="event-name"]').val(calEvent.title);
            $('#eventEditModal input[name="event-organizer"]').val(calEvent.organizer);
        
            $('#eventEditModal input[name="event-start-date"]').val(event_start_date);
            $('#eventEditModal input[name="event-end-date"]').val(event_end_date);
            $('#eventEditModal input[name="event-url"]').val(calEvent.location_or_url);
            $('#eventEditModal input[name="event-location"]').val(calEvent.location_or_url);
            $('#eventEditModal input[name="event-start-time"]').val(event_start_time);
            $('#eventEditModal input[name="event-end-time"]').val(event_end_time);
            
            $("#selectclassName option").each(function(){
                if($(this).val() == calEvent.className){
                    $('select[name^="event-bg"] option[value="'+$(this).val()+'"]').attr("selected","selected");
                }
            });
            
            if(CKEDITOR.instances.content2.getData() == ''){
                CKEDITOR.instances.content2.setData(calEvent.content);            
            }else{
                CKEDITOR.instances.content2.setData(CKEDITOR.instances.content2.getData());            
            }
            
            eventModal.modal('show');
            eventModal.find('.update-btn').click(function() {

            var title = $('#eventEditModal input[name="event-name"]').val();
            var start =  $('#eventEditModal input[name="event-start-date"]').val();
            var end =  $('#eventEditModal input[name="event-end-date"]').val();
            var className = $('#eventEditModal select[name="event-bg"]').val();
            var organizer = $('#eventEditModal input[name="event-organizer"]').val();
            var content = CKEDITOR.instances.content2.getData();
            var url = $('#eventEditModal input[name="event-url"]').val();
            var location = $('#eventEditModal input[name="event-location"]').val();
            var start_time = $('#eventEditModal input[name="event-start-time"]').val();
            var end_time = $('#eventEditModal input[name="event-end-time"]').val();

            if (title && className && organizer && start) {
                
                var location_or_url = '';
                if(location == '' && url == ''){
                    alert('Location or URL Is Required.')
                }
                else{
                if(location == ''){
                    location_or_url = url;
                }
                else{
                    location_or_url = location;                    
                }
                if(start > end){
                    alert('End Date should be greater');
                }
                else{
                   
                    $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/events',
                        data: {
                            id:calEvent.id,                            
                            title: title,
                            start: start,
                            end: end,
                            className:className,
                            organizer:organizer,
                            content:content,
                            location_or_url:location_or_url,
                            start_time:start_time,
                            end_time:end_time,                     
                            action: 'update'
                        },
                        type: "POST",
                        success: function (response) {
                            displayMessage("{{__('languages.event_updated')}}");

                            eventModal.modal('hide');
                                    
                            calendar.fullCalendar('updateEvent', calEvent);
                            
                            $('#'+calEvent.id).html(title + '<span class="float-right">'+start+'</span>');
                            $('#'+calEvent.id).attr('data-class', className);
                            $('#'+calEvent.id).attr('class', 'fc-event ' + className);
                        }
                    });
                }
                    }
                } else {
                    alert("{{__('languages.title_not_blank')}}")
                }

            });
           
        },
        eventDrop: function (event, delta) {
                       
            var start_hour = $.fullCalendar.formatDate(event.start, "HH");
                var start_minute = $.fullCalendar.formatDate(event.start, "mm");
                if(start_hour == '00' && start_minute == '00'){
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                }else{
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm");                
                }
                
                var end_hour = $.fullCalendar.formatDate(event.end, "HH");
                var end_minute = $.fullCalendar.formatDate(event.end, "mm");
                if(end_hour == '00' && end_minute == '00'){
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                }else{
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm");                
                }


            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/events',
                data: {
                    title: event.title,
                    start: start,
                    className:event.className[0],
                    organizer:event.organizer,
                    content:event.content,                                         
                    end: end,
                    id: event.id,
                    action: 'update'
                },
                type: "POST",
                success: function (response) {
                    displayMessage("{{__('languages.event_updated')}}");
                    $('#'+event.id).html(event.title + '<span class="float-right">'+start+'</span>');
                    $('#'+event.id).attr('data-class', event.className[0]);
                    $('#'+event.id).attr('class', 'fc-event ' + event.className[0]);
                }
            });
        },
    });
});

function displayMessage(message) {
    toastr.success(message, "{{__('languages.event')}}");
} 

</script> 
@endsection