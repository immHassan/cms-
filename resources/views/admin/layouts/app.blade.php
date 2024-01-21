 <!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ (str_replace('_', '-', app()->getLocale()) == 'ar') ? "dir=rtl" : "dir=ltr" }}>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
 
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{__('languages.app_name')}}</title>
 
<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<!-- <link rel="stylesheet" href="{{ url('/') }}/admin/dist/css/style.css"> -->



<link rel="stylesheet" href="{{asset('/assets/css/main.css') }}"/>
<link rel="stylesheet" href="{{asset('/assets/css/theme4.css') }}"/>
<link href="{{ url('/') }}/admin/css/dropzone.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('css/daterangepicker.css')}}" />

<link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
<link rel="stylesheet" href="/assets/plugins/dropify/css/dropify.min.css">


<style>
    .mce-notification-warning,.mce-branding{
      display:none !important;
    }
    .dataTables_filter {
      display: none;
    }

  .advanced-search-toggle {
    border-radius: 10px;
  }
  
.feild-i {
    position: absolute;
    left: 7%;
    top: 20%;
}

.feild-i i {
    transition: 0.3s linear;
}

.feild-s:hover .feild-i i {
    transform: rotate(360deg);
}


.search-details label {
    margin: 0px 0px 10px 0px;
    display: block;
    font-size: 16px;
    font-weight: 500 !important; 
}

.search-details select {
    width: 100%;
    outline: none;
    padding: 10px 10px;
    border: 1px solid #7f8c9f;
    border-radius: 5px; 
}

.search-details select option {
    outline: none;
    padding: 0px;
}

.search-details {
    background: #fff;
    padding: 20px;
    margin: 0px 0px 20px 0px;
    transform: scaleY(0);
    transition: 0.5s;
    transform-origin: top;
    position: absolute;
    width: 100%;
}
.feild-s {
    position: relative;
    border: none;
    padding: 10.5px 12px 10.5px 40px;
    border-radius: 50px 0px 0px 50px;
    outline: none;
    border: 2px solid #ffffff;
    /* border-left: 1px solid #30415e; */
    color: #ffffff;
    background-color: #343a40;
    cursor: pointer;
}
.invoices-search {
    display: flex;
    align-items: center;
}
.active {
    transform: scaleY(1);
    position: relative;
}
@media only screen and (max-width: 575px){
    .invoices-search {
        display: flex;
        align-items: center;
        flex-direction: column;
    }
    .feild input {
        padding: 6px 12px 6px 40px;
        border-radius: 50px;
        border: 2px solid #30415e;
        border-right: 2px solid #30415e;
        font-size: 14px;
    }
    .feild-s {
        border-radius: 50px;
        border: 2px solid #30415e;
        border-left: 2px solid #30415e;
        width: 100%;
        padding: 8.5px 12px 8.5px 40px;
    }
}
.close{
    font-size:x-large
}
.cke_editable{
    height: 200px;
    padding: 16px;
    border: solid 1px lightgray;
    }
    .cke_inner{
        width:550px !important;
    }
</style>

@yield('pageCss')
</head>

<body class="font-montserrat {{ (str_replace('_', '-', app()->getLocale()) == 'ur') || (str_replace('_', '-', app()->getLocale()) == 'ar') ? "rtl" : "ltr" }}">
    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>
    <div id="main_content">
        @include('admin.layouts.header')
        @include('admin.layouts.rightsidebar')        
        @include('admin.layouts.leftsidebar')
        <div class="page">
            <div id="page_top" class="section-body ">
                <div class="container-fluid">
                    <div class="page-header">
                        <div class="left">
                            <div class="input-group xs-hide">
                                <form action="/search" class="d-flex" autocomplete='off' method="get">
                                    
                                    <input type="text" class="form-control" value="{{isset($keyword)? $keyword : ''}}" placeholder="{{__('languages.search')}}..." name="search">
                                    <button class="btn btn-primary ml-2" type="submit">{{__('languages.search')}}</button>
                                </form>
                                
                            </div>                       
                        </div>
                        <div class="right">
                            <ul class="nav nav-pills">
                               <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img class="w20 mr-2" src="/assets/images/flags/{{Config::get('languages')[App::getLocale()]['flag-icon']}}.svg"> {{ Config::get('languages')[App::getLocale()]['display'] }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                            <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><img class="w20 mr-2" src="/assets/images/flags/{{$language['flag-icon']}}.svg"> {{$language['display']}}</a>
                                            <!-- <div class="dropdown-divider"></div> -->    
                                        @endif
                                    @endforeach
                                    </div>
                                </li>
                            </ul>
                            <div class="notification d-flex">
                               

                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-primary nav-unread"></span></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <ul class="list-unstyled feeds_widget">
                                            <li>
                                                <div class="feeds-left"><i class="fa fa-check"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title text-danger">Issue Fixed <small class="float-right text-muted">11:05</small></h4>
                                                    <small>WE have fix all Design bug with Responsive</small>
                                                </div>
                                            </li>
                                             
                                        </ul>
                                        <div class="dropdown-divider"></div>
                                        <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                                    </div>
                                </div>
                                <div class="dropdown d-flex">
                                    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown"><i class="fa fa-user"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="page-profile.html"><i class="dropdown-icon fe fe-user"></i> {{__('languages.profile')}}</a>
                                        <a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-settings"></i> {{__('languages.settings')}}</a>
                                       
                                        <div class="dropdown-divider"></div>
                                      
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();"><i class="dropdown-icon fe fe-log-out"></i> {{ __('languages.logout') }}</a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @yield('mainContent')

            @include('admin.layouts.footer')
        </div>    
    </div>

    <script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
    <script src="{{ url('/') }}/admin/js/moment.min.js"></script>
    <script src="{{asset('/assets/bundles/lib.vendor.bundle.js')}}"></script>
    <script src="{{asset('/assets/bundles/counterup.bundle.js')}}"></script>
    <script src="{{ url('/') }}/admin/js/sweetalert.min.js"></script>
    <script src="{{asset('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/assets/js/core.js')}}"></script>
    <script src="{{asset('/assets/js/page/dialogs.js')}}"></script> 
    <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
    <script src="{{ url('/') }}/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> 
    <script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>
    <script src="/assets/plugins/dropify/js/dropify.min.js"></script>

    <script>
        CKEDITOR.inline( 'content', {
            filebrowserImageBrowseUrl: '/file-manager/ckeditor',
            toolbarGroups: [
                { name: 'clipboard', groups: [ 'undo', 'clipboard' ] },
                { name: 'document', groups: [ 'mode', 'doctools', 'document' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                '/',
                { name: 'insert', groups: [ 'insert' ] },
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                '/',
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },       
                '/',
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'tools', groups: [ 'tools' ] },
                { name: 'others', groups: [ 'others' ] }
            ],
        });

    CKEDITOR.inline( 'content2', {
        filebrowserImageBrowseUrl: '/file-manager/ckeditor',
        toolbarGroups: [
            { name: 'clipboard', groups: [ 'undo', 'clipboard' ] },
            { name: 'document', groups: [ 'mode', 'doctools', 'document' ] },
            { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
            '/',
            { name: 'insert', groups: [ 'insert' ] },
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
            '/',
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
            { name: 'links', groups: [ 'links' ] },       
            '/',
            { name: 'styles', groups: [ 'styles' ] },
            { name: 'colors', groups: [ 'colors' ] },
            { name: 'tools', groups: [ 'tools' ] },
            { name: 'others', groups: [ 'others' ] }
        ],
    });

</script>

<script>
    
  $('.advanced-search-toggle').on('click', function() {
      $('.search-details').toggleClass('active');
    });

$(function() {
    "use strict";
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    function getRandomValues() {
        // data setup
        var values = new Array(20);

        for (var i = 0; i < values.length; i++) {
            values[i] = [5 + randomVal(), 10 + randomVal(), 15 + randomVal(), 20 + randomVal(), 30 + randomVal(),
                35 + randomVal(), 40 + randomVal(), 45 + randomVal(), 50 + randomVal()
            ];
        }

        return values;
    }    
    function randomVal() {
        return Math.floor(Math.random() * 80);
    }

    // MINI BAR CHART
    var values2 = getRandomValues();    
    var paramsBar = {
        type: 'bar',
        barWidth: 5,
        height: 25,
    };

    $('#mini-bar-chart1').sparkline(values2[0], paramsBar);
    paramsBar.barColor = '#6c757d';
    $('#mini-bar-chart2').sparkline(values2[1], paramsBar);
    paramsBar.barColor = '#6c757d';
    $('#mini-bar-chart3').sparkline(values2[2], paramsBar);
    paramsBar.barColor = '#6c757d';
    $('#mini-bar-chart4').sparkline(values2[3], paramsBar);
    paramsBar.barColor = '#6c757d';
    
});
</script>

@yield('pageJs')

</body>
</html>
