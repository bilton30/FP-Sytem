<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box w-75 p-3 rounded-10">
    {{-- <div class="login-logo"> --}}
        {{-- <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a> --}}
    {{-- </div> --}}
    <!-- /.login-logo -->

    <!-- /.login-box-body -->
    <div class="card " style="border-radius:100px">
        <div class="card-body login-card-body  "style="border-radius:50px">
            {{-- <p class="login-box-msg">Sign in to start your session</p> --}}
            <div class="left">
                <a href="/" style="margin-top:15%; margin-button:15%">
                    <img style="" src="{{ asset('images/22472-removebg-preview.png') }}" alt="">
                </a>
               
            </div>
            <div class="footer">
                {{-- <img style="width: 28px " src="{{ asset('images/polegar.png') }}" alt=""> --}}
                <a href="/">Powered by Polegar Group!</a>
            </div>
            <div class="form">
            <form method="post" action="{{ url('/login') }}">
                @csrf
                <a href="/">
                    <img style="width: 120px;" src="{{ asset('images/polegar.png') }}" alt="">
                </a>
                <h4>Welcome Back</h4>
                {{-- <h4>Kuhandza Farmácia - <span>LOGIN</span></h4> --}}
                <p>Login to continue</p>

                <div class="input-group mb-3">
                    {{-- <label for="email" class="centered-label">Email</label> --}}

                    <input type="email"
                    id="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Email"
                           class="form-control input-field @error('email') is-invalid @enderror">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    {{-- <label for="password" class="centered-label">Password</label> --}}
                    <input type="password"
                    id="password"
                           name="password"
                           placeholder="Password"
                           class="form-control @error('password') is-invalid @enderror">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
               
                <div class="input-group mb-3">
                
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember me</label>
                        </div>
                    
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="">Sign In</button>
                </div>
                <a href="/register" class="signup-image-link">Don't have an account? Register</a>
            </form>
            </div>
    
              
              
           
        </div>
        <!-- /.login-card-body -->
    </div>

</div>
<!-- /.login-box -->

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
