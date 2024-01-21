@extends('admin.layouts.app')
@section('pageCSS')
@endsection
@section('mainContent')
    <div class="section-body mt-3">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <h4>{{__('languages.welcome')}} {{Auth::user()->name }}</h4>
                        <small>Measure How Fast You’re CMS is Working...</small>
                    </div>                        
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green">{{$pages_count}}</div>
                                <a href="{{route('cms.list')}}" class="my_sort_cut text-muted">
                                    <i class="fa fa-pagelines"></i>
                                    <span>{{__('languages.pages')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green">{{$user_count}}</div>
                                <a href="{{route('users.list')}}" class="my_sort_cut text-muted">
                                    <i class="icon-users"></i>
                                    <span>{{__('languages.users')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                            <div class="ribbon-box green">{{$service_count}}</div>
                                <a href="{{route('services.list')}}" class="my_sort_cut text-muted">
                                    <i class="fa fa-wrench"></i>
                                    <span>{{__('languages.services')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box orange">{{$events_count}}</div>
                                <a href="{{route('events.list')}}" class="my_sort_cut text-muted">
                                    <i class="icon-calendar"></i>
                                    <span>{{__('languages.events')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green">{{$blog_count}}</div>
                                <a href="{{route('blog.list')}}" class="my_sort_cut text-muted">
                                    <i class="icon-feed"></i>
                                    <span>{{__('languages.blogs')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-xl-2">
                        <div class="card">
                            <div class="card-body ribbon">
                                <div class="ribbon-box green">{{$news_count}}</div>
                                <a href="{{route('news.list')}}" class="my_sort_cut text-muted">
                                    <i class="icon-envelope"></i>
                                    <span>{{__('languages.news')}}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Blogs</h3>
                            <b class="ml-1"> ({{$blog_count}})</b>
                        </div>
                        <div class="card-body">
                            <div id="donut"></div>
                        </div>
                    </div>              
                </div>   
                <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <b class="ml-1 blog_name">{{$blog_name}}</b>
                                <small class="ml-2"> (<b class="trend_count_blog">{{$trend_count}}</b>) Hits</small>
                                <div class="card-options">
                                    <h3 class="card-title">Trending Blog</h3>
                                </div>
                            </div>
                            <div class="row">
                                <span class="ml-3 mt-1" style="background: rgb(255, 69, 96); color: rgb(255, 69, 96); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 5px;"></span>
                                <span class="ml-1">Unique Users (<b class="unique_user_blog">{{$unique_user_blog}}</b>)</span>
                                <span class="ml-2 mt-1" style="background: rgb(0, 143, 251); color: rgb(0, 143, 251); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 5px;"></span>
                                <span class="ml-1">Non Auth Users (<b class="count_non_auth_blog">{{$count_non_auth_blog}}</b>)</span>
                                <span class="ml-2 mt-1" style="background: rgb(0, 227, 150); color: rgb(0, 227, 150); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 5px;"></span>
                                <span class="ml-1">Auth Users (<b class="count_auth_blog">{{$count_auth_blog}}</b>)</span>
                            </div>
                            <div class="mt-3 ml-1 col-md-8">
                            @if(isset($blogs) && count($blogs) > 0)
                            <div class="d-flex">
                                <b class="ml-2 mt-1">Blogs:</b>
                                <select class="form-control ml-2" id="select_blog">
                                    <option style="display:none">Select Blog</option>
                                    @foreach($blogs as $blog)
                                    <option value="{{$blog->id}}">{{$blog->title}}</option>
                                    @endforeach
                                </select>
                            </div> 
                            @endif                           
                        </div> 
                            <div class="card-body">
                                <div id="apex-trending-blog"></div> 
                            </div>
                        </div>
                    </div>
                                
                </div>
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Poll Results</h3>
                            <div class="card-options">
                                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-sm-3 border-right">
                                    <label class="mb-0">Total <br> Polls</label>
                                    <h4 class="font-30 font-weight-bold text-green">{{count($questions)}}</h4>
                                </div>
                                <div class="col-sm-3 border-right">
                                    <label class="mb-0">On Going Polls</label>
                                    <h4 class="font-30 font-weight-bold text-yellow">{{$isRunning}}</h4>
                                </div>
                                <div class="col-sm-3 border-right">
                                    <label class="mb-0">Upcoming Polls</label>
                                    <h4 class="font-30 font-weight-bold text-blue">{{$isComingSoon}}</h4>
                                </div>
                                <div class="col-sm-3">
                                    <label class="mb-0">Finished Polls</label>
                                    <h4 class="font-30 font-weight-bold text-red">{{$hasEnded}}</h4>
                                </div>
                            </div>
                        </div>
                        @foreach($count_record as $question)
                            <div class="ml-4 mr-4">
                                <b>Poll: {{ $question->question }}
                                    <b class="float-right">{{$question->votes_count}} Votes</b>
                                </b>
                                @foreach($question->options as $option)
                                    <div class="clearfix">
                                        <div class="float-left"><strong>{{ $option->percent }}%</strong></div>
                                        <div class="float-right"><small class="text-muted">{{ $option->name }}</small></div>
                                    </div>
                                    <div class="progress progress-xs">
                                        <div class="progress-bar bg-green progress-bar-striped active" role="progressbar" aria-valuenow='{{ $option->percent }}' aria-valuemin='0' aria-valuemax='100' style="width: {{ $option->percent }}%"></div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                        @endforeach
                    </div>
                </div>
             
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <b class="page_name">{{$page_name}}</b>
                            <small class="ml-1"> (<b class="trend_count_page">{{$trend_count_page}}</b>) Views</small>
                            <div class="card-options">
                                <h3 class="card-title">Trending Page</h3>
                            </div>
                        </div>
                        <div class="row">
                            <span class="ml-3 mt-1" style="background: rgb(255, 69, 96); color: rgb(255, 69, 96); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 5px;"></span>
                            <span class="ml-1">Unique Users (<b class="unique_user_page">{{$unique_user_page}}</b>)</span>
                            <span class="ml-2 mt-1" style="background: rgb(0, 143, 251); color: rgb(0, 143, 251); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 5px;"></span>
                            <span class="ml-1">Non Auth Users (<b class="count_non_auth_page">{{$count_non_auth_page}}</b>)</span>
                            <span class="ml-2 mt-1" style="background: rgb(0, 227, 150); color: rgb(0, 227, 150); height: 10px; width: 10px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 5px;"></span>
                            <span class="ml-1">Auth Users (<b class="count_auth_page">{{$count_auth_page}}</b>)</span>
                        </div>
                        <div class="mt-3 ml-1 col-md-8">
                            @if(isset($pages) && count($pages) > 0)
                            <div class="d-flex">
                                <b class="ml-2 mt-1">Pages:</b>
                                <select name="" class="form-control ml-2" id="select_page">
                                    <option style="display:none">Select Page</option>
                                    @foreach($pages as $page)
                                    <option value="{{$page->id}}">{{$page->name}}</option>
                                    @endforeach
                                </select>
                            </div> 
                            @endif                           
                        </div>                        
                        <div class="card-body">
                            <div id="apex-trending-page"></div> 
                        </div>
                    </div>
                </div>


            </div>
                       
        </div>
    </div>
@section('pageJs') 
    <script src="/assets/bundles/apexcharts.bundle.js"></script>
    <script src="/assets/js/core.js"></script>

<script>
 
    // SIMPLE DONUT
    $(document).ready(function() {
        var options = {
            chart: {
                height: 365,
                type: 'donut',
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                show: true,
            },
            // colors: ['#1b6079', '#18BADD','#0846r0', '#00036e', '#34738a'],
            series: [{{$created_counts}}],
        
        labels: [<?php echo $month ?>],
            responsive: [{
                breakpoint: 280,
                options: {
                    chart: {
                        w0dth: 200
                    },
                    legend: {
                        position: 'top'
                    }
                }
            }]
        }

        var chart = new ApexCharts(
                document.querySelector("#donut"),
                options
            );
            
            chart.render();
    });

    // trending-blog
    $(document).ready(function() {
        var options = {
            chart: {
                id:"blog1",
                height: 280,
                type: 'bar',
                zoom: {
                    enabled: true
                },
            },
            colors: ['#1b6079', '#18BADD', '#868e96'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    // endingShape: 'rounded'	
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Hits',
                data:[{{$hits_counts}}]
            }, ],
            xaxis: {
                categories: [<?php echo $trending_month ?>],
            },
            yaxis: {
                title: {
                    text: 'Hits'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 100]
                }
            },
            noData: {
                text: 'No Data...'
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val 
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#apex-trending-blog"),
            options
        );

        chart.render();
        var resetCssClasses = function (activeEl) {
   
        var els = document.querySelectorAll("button");
        Array.prototype.forEach.call(els, function (el) {
        el.classList.remove('active');
        });

        activeEl.target.classList.add('active')
        }

        $(function() {
        $("#select_blog").change(function(e) {
            var blog_id = $('option:selected', this).val()
            var viewSettings = {
                "url": `/check-trending-blog/${blog_id}`,
                "method": "GET",
                "timeout": 0,
                "headers": {
                "Content-Type": "application/json",
                "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                }
            };
            $.ajax(viewSettings).done(function(response) {
                if (response.status == false) {
                    swal("Error!", "Something went wrong", "error");
                } else { 
                $('.count_non_auth_blog').html(response.count_non_auth_blog);
                $('.count_auth_blog').html(response.count_auth_blog);
                $('.unique_user_blog').html(response.unique_user_blog);
                $('.blog_name').html(response.blog_name);
                $('.trend_count_blog').html(response.trend_count_blog);
                    resetCssClasses(e)

                    ApexCharts.exec('blog1', "updateOptions", {
                        xaxis: {
                        categories: response.trending_blog_month
                        }
                    });

                    ApexCharts.exec('blog1', "updateSeries", [
                        {
                        data: response.hits_counts_blog
                        }
                    ]);

                }
            });
        });
        });
    });

    // trending-page
    $(document).ready(function() {
        var options = {
            chart: {
                id:'page1',
                height: 350,
                type: 'area', 
               
                zoom: {
                    enabled: true
                },
            },
            colors: [ '#18BADD', '#868e96'],
            markers: {
                size: 0,
                style: 'hollow',
            },
            // plotOptions: {
            //     bar: {
            //         horizontal: false,
            //         columnWidth: '55%',
            //         // endingShape: 'rounded'	
            //     },
            // },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                
                colors: ['transparent']
            },
            noData: {
                text: 'No Data...'
            },
            series: [{
                name: 'Hits',
                data:[{{$hits_counts_page}}]
            }, ],
            xaxis: {
                categories: [<?php echo $trending_page_month ?>],
            },
            yaxis: {
                title: {
                    text: 'Hits'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 100]
                }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val 
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#apex-trending-page"),
            options
        );

        chart.render();

        var resetCssClasses = function (activeEl) {
   
            var els = document.querySelectorAll("button");
            Array.prototype.forEach.call(els, function (el) {
            el.classList.remove('active');
            });

            activeEl.target.classList.add('active')
        }

        $(function() {
            $("#select_page").change(function(e) {
                var page_id = $('option:selected', this).val()
                var viewSettings = {
                    "url": `/check-trending-page/${page_id}`,
                    "method": "GET",
                    "timeout": 0,
                    "headers": {
                    "Content-Type": "application/json",
                    "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                    }
                };
                $.ajax(viewSettings).done(function(response) {
                    if (response.status == false) {
                     swal("Error!", "Something went wrong", "error");
                    } else { 
                    $('.count_non_auth_page').html(response.count_non_auth_page);
                    $('.count_auth_page').html(response.count_auth_page);
                    $('.unique_user_page').html(response.unique_user_page);
                    $('.page_name').html(response.page_name);
                    $('.trend_count_page').html(response.trend_count_page);
                        resetCssClasses(e)

                        ApexCharts.exec('page1', "updateOptions", {
                            xaxis: {
                            categories: response.trending_page_month
                            }
                        });

                        ApexCharts.exec('page1', "updateSeries", [
                            {
                            data: response.hits_counts_page
                            }
                        ]);

                    }
                });
            });
        });
    });
</script>
@endsection
@endsection