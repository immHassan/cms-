<meta name="csrf-token" content="{{ csrf_token() }}">
 
<link rel="icon" href="{{asset('admin/images/favicon-1.png')}}" type="image/x-icon">

<title>{{ $blog->title }}</title>
 
<link href="{{ asset('comment/css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<style>
  
    .card{
    background-color: #fff;

    }
    .form-color{
    background-color: #fafafa ;
    }
    input{
        height: 45px !important;
        border-radius: 25px !important;
        width: 85% !important;
    margin-left: 15%;
    }
    textarea{
        height: 100px !important;
        border-radius: 10px !important;
    }
    span{
        cursor:pointer
    }
    .replyflex{
    display: flex;
    align-items: baseline;
    flex-direction: column;
    }
    .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #35b69f;
    outline: 0;
    box-shadow: none;
    text-indent: 10px;
    }
   
    } 
    .user-feed{
        font-size: 15px;
        margin-top: 10px;
    }
</style>
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    

    <script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

<script type="text/javascript">
$("#input-id").rating();
 
</script>

</body>
</html>
