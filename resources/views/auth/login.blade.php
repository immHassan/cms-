<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('/assets/css/main.css') }}"/>
<link rel="stylesheet" href="{{asset('/assets/css/theme4.css') }}"/>

<style>

.text-red-600{
color:#dc2626
}
ul.mt-3.list-disc.list-inside.text-sm.text-red-600{
    padding-left: 15px;
    font-size: 13px;
}


    </style>

<div class="auth">
    <div class="auth_left">
        <div class="card">
            <div class="text-center mb-2">
                <a class="header-brand" href="#"><img src="{{asset('/images/cloudsolutions-logo.png') }}" alt="" width="60"/></a>
            </div>
            <div class="card-body">


            
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />


            <form method="POST" action="{{ route('login') }}">
            @csrf


                <div class="card-title loginTitle">{{__('languages.welcome')}}</div><small class="loginSubTitle">{{__('languages.login_username_password')}}</small>

                <div class="form-group mt-2">
                    <input 
                    placeholder="{{__('languages.enter_email')}}"

                    id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')"  autofocus>
                </div>
                <div class="form-group">
                   
                    <input id="password" class="block mt-1 w-full form-control" placeholder="{{__('languages.enter_password')}}"
                                type="password" name="password" autocomplete="current-password">
                </div>
                <!-- <div class="form-group">
                    <label class="custom-control custom-checkbox">
                    
                    <a href="forgot-password.html" class="float-right small">Forgot file Number?</a>
                    </label>
                </div> -->
                <div class="form-footer">
                    <input  type="submit" class="btn btn-primary btn-block" value="{{__('languages.signin')}}"/>
                </div>

                <!-- <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif -->

            <!-- </div> -->
        </form>
        
            </div>
            <!-- <div class="text-center text-muted">
                <a href="register.html">Register? </a>
            </div> -->
        </div>        
    </div>
    <div class="auth_right">
        <div class="carousel slide" data-ride="carousel" data-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/slider (1).png') }}" class="img-fluid" alt="login page" />
                    <div class="px-4 mt-4">
                        <h4>Login Authentication </h4>
                        <p>Please enter your username and password for login</p>
                    </div>
                </div>
                <div class="carousel-item">
                  <img src="{{asset('images/slider (2).png') }}" class="img-fluid" alt="login page" />
                    <div class="px-4 mt-4">
                         <h4>Login Authentication </h4>
                        <p>Please enter your username and password for login</p>
                    </div>
                </div>
                <div class="carousel-item">
                  <img src="{{asset('images/slider (3).png') }}" class="img-fluid" alt="login page" />
                    <div class="px-4 mt-4">
                         <h4>Login Authentication </h4>
                        <p>Please enter your username and password for login</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('/assets/bundles/lib.vendor.bundle.js') }}"></script>
<script src="{{asset('/assets/js/core.js') }}"></script>