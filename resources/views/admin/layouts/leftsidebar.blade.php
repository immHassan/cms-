
<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">{{__('languages.app_name')}} <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">
            <li class="g_heading">{{__('languages.directories')}}</li>
            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-dashboard"></i><span>{{__('languages.dashboard')}}</span></a></li>
             


            @if(auth()->user()->can('cms-read') || auth()->user()->can('cms-read') || auth()->user()->can('navbar-read') )

            <li class="{{ request()->is('cms/pages','banners','navbar') ? 'active' : ''  }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-rocket"></i><span>{{__('languages.cms')}}</span></a>
                <ul>


                @if(auth()->user()->can('cms-read') )
                    <li class="{{ request()->is('cms/pages') ? 'active' : '' }}"><a href="{{route('cms.list')}}"><span>{{__('languages.managepages')}}</span></a></li>
                @endif

                @if(auth()->user()->can('banner-read'))
                    <li class="{{ request()->is('banners') ? 'active' : '' }}"><a href="{{route('banners.list')}}"><span>{{__('languages.managebanners')}}</span></a></li> 
                @endif

                @if(auth()->user()->can('navbar-read'))
                    <li class="{{ request()->is('navbar') ? 'active' : '' }}"><a href="{{route('navbar.list')}}"><span>{{__('languages.managenavbar')}}</span></a></li>
                @endif

                </ul>
            </li>
            @endif


            
            @if(auth()->user()->can('categories-read') )
            <li class="{{ request()->is('categories') ? 'active' : ''  }}"><a href="{{route('category.list')}}"><i class="icon-list"></i><span>{{__('languages.categories')}}</span></a></li>
            @endif
            
            
            @if(auth()->user()->can('blogs-read') )
            <li class="{{ request()->is('blog') ? 'active' : ''  }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-feed"></i><span>{{__('languages.blogs')}}</span></a>
                <ul>
                    <li class="{{ request()->is('blog') ? 'active' : ''  }}"><a href="{{route('blog.list')}}">{{__('languages.manageblogs')}}</a></li>
                </ul>
            </li>
            @endif


            
            @if(auth()->user()->can('news-read') )
            <li class="{{ request()->is('news') ? 'active' : '' }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-envelope"></i><span>{{__('languages.news')}}</span></a>
                <ul>
                    <li class="{{ request()->is('news') ? 'active' : '' }}"><a href="{{route('news.list')}}"><span>{{__('languages.managenews')}}</span></a></li>
                </ul>
            </li>            
            @endif

            
            @if(auth()->user()->can('service-read') )
            <li class="{{ request()->is('services') ? 'active' : '' }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-wrench"></i><span>{{__('languages.services')}}</span></a>
                <ul>
                    <li class="{{ request()->is('services') ? 'active' : '' }}"><a href="{{route('services.list')}}">{{__('languages.manageservices')}}</a></li>
                </ul>
            </li>
            @endif

            
            @if(auth()->user()->can('form-read') )
            <li class="{{ request()->is('forms') ? 'active' : '' }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-note"></i><span>Forms</span></a>
                <ul>
                    <li class="{{ request()->is('forms') ? 'active' : '' }}"><a href="{{route('forms.list')}}">{{__('languages.manageservicesforms')}}</a></li>
                </ul>
            </li>
            @endif

            
            @if(auth()->user()->can('event-read') )
            <li class="{{ request()->is('events') ? 'active' : '' }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-calendar"></i><span>{{__('languages.events')}}</span></a>
                <ul>
                    <li class="{{ request()->is('events') ? 'active' : '' }}"><a href="{{route('events.list')}}">{{__('languages.manageevents')}}</a></li>
                </ul>
            </li>
            @endif
            
            
            
            @if(auth()->user()->can('poll-read') )
                <li class="{{ request()->is('polls','questions/*') ? 'active' : '' }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-bar-chart"></i><span>{{__('languages.poll')}}</span></a>
                <ul>
                    <li class="{{ request()->is('polls') ? 'active' : '' }}"><a href="{{route('poll.list')}}">{{__('languages.managepolls')}}</a></li>
                </ul>
            </li>
            @endif


            @if(auth()->user()->can('gallery-read') )
            <li class="{{ request()->is('gallery') ? 'active' : '' }}"><a href="{{route('gallery.list')}}"><i class="icon-picture"></i><span>{{__('languages.gallery')}}</span></a></li>
            @endif
            
            
            @if(auth()->user()->can('file-manager-read') )
            <li class="{{ request()->is('file-manager') ? 'active' : '' }}"><a href="{{route('file_manager.list')}}"><i class="icon-cloud-upload"></i><span>{{__('languages.filemanager')}}</span></a></li>
            @endif
            
            
            @if(auth()->user()->can('user-read') ||  auth()->user()->can('role-read'))
            <li class="{{ request()->is('users','roles') ? 'active' : '' }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="icon-users"></i><span>{{__('languages.users')}}</span></a>
                <ul>
                    
                    @if(auth()->user()->can('user-read') )
                    <li class="{{ request()->is('users') ? 'active' : '' }}"><a href="{{route('users.list')}}">{{__('languages.manage_users')}}</a></li>
                    @endif

                    @if(auth()->user()->can('role-read') )
                    <li class="{{ request()->is('roles') ? 'active' : '' }}"><a href="{{route('roles.list')}}">{{__('languages.user_roles')}}</a></li>
                    @endif
                </ul>
            </li>
            @endif

        </ul>
    </nav>        
</div>