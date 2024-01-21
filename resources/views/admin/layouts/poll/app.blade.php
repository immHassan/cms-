<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ (str_replace('_', '-', app()->getLocale()) == 'ar') ? "dir=rtl" : "dir=ltr" }}>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
 
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{asset('/assets/css/main.css') }}"/>
<link rel="stylesheet" href="{{asset('/assets/css/theme4.css') }}"/>  
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/fontawesome-free/css/all.min.css">
<link href="{{asset('js/tailwind.css')}}" rel="stylesheet">  
<link rel="stylesheet" href="{{ url('/') }}/admin/dist/css/style.css">
<script src="{{ url('/') }}/admin/js/sweetalert.min.js"></script>
<title>{{__('languages.app_name')}}</title>

@yield('style')
</head>
<body class="font-montserrat {{ (str_replace('_', '-', app()->getLocale()) == 'ur') || (str_replace('_', '-', app()->getLocale()) == 'ar') ? "rtl" : "ltr" }}">
 
  <div class="page-loader-wrapper">
    <div class="loader"></div>
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

            @yield('content')

            @include('admin.layouts.footer')
        </div> 
    </div>   
    
  <script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>  
  <script src="{{ url('/') }}/admin/js/moment.min.js"></script>
  <script src="{{asset('/assets/bundles/lib.vendor.bundle.js')}}"></script> 
    <script src="{{ url('/') }}/admin/js/sweetalert.min.js"></script>
    <script src="{{asset('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('/assets/js/core.js')}}"></script>
    <script src="{{asset('/assets/js/page/dialogs.js')}}"></script> 
    <script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
 
  <script src="{{ url('/') }}/admin/dist/js/adminlte.min.js"></script> 
  <link href="{{asset('css/datetimepicker.css')}}" rel="stylesheet" /> 

<script>
    
  $('.advanced-search-toggle').on('click', function() {
      $('.search-details').toggleClass('active');
    });

</script>

    @yield('js')
</body>

</html>
