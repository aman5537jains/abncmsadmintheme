<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $theme->getSetting('PROJECT_NAME')}} - Admin</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{$theme->getSetting('FAV_ICON')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{$theme->getSetting('FAV_ICON')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{$theme->getSetting('FAV_ICON')}}">

        {!! $theme->loadStylesheets() !!}
        
</head>
 <body >
    <div style='flex-direction:column' class="page-dashboard dlogin-panel">
        <div class="dlogin-logo">
            <a href="#"><img src="{{$theme->getSetting('LOGO')}}" alt=""></a>
        </div>
        <div class="dlogin-body">
            <div class="dlogin-logo">
                 <h2>Welcome back!</h2>
                 <p>Enter Credentials to access the system</p>
            </div>

            <div class="dLogin-form">
           
                     @if(session("error"))  <div style='color:red;text-align:center' >{{ session("error") }}</div> @endif

                <form method="POST" action="{{ route('admin-post-login') }}" id='admin-login' autocomplete='off' >
                    @csrf
                    <div class="dlogin-control">
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="dlogin-control">
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"  placeholder="Enter Password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="dlogin-action form-button">
                        <button class="buttons theme" type="submit" name="button">Login</button>
                    </div>
                    <div class="dlogin-action loader" style="display: none;">
                        <a class="buttons theme" href="javascript:;" type="submit" name="button"><img src="{{url('public/asset/images/loader.gif')}}" class="loader_img"> </a>
                    </div>

                     {{-- <h2>or</h2>
                     <div class="dlogin-action form-button">
                        <a class="buttons theme" href='{{$abno360URL}}' name="button">Login with Abno360</a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
   

</body>
{!! $theme->loadScripts() !!}
</html>

