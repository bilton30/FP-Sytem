<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Registration Page</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

      <link rel="stylesheet" href="{{ asset('assets/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}"  rel="stylesheet">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body >

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" method="post" action="{{ route('register') }}" class="register-form" id="register-form">

                @csrf
                            @error('name')
                                <div class="alert">{{ $message }}</div>       
                            @enderror
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" value="{{ old('name') }}"  id="name" placeholder="Your Name"/>
                                
                            </div>
                             @error('email')
                                <div class="alert">{{ $message }}</div>       
                            @enderror
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" required  id="email" placeholder="Your Email"/>
                            </div>
                            @error('password')
                                <div class="alert">{{ $message }}</div>       
                            @enderror
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" required   value="{{ old('email') }}" id="pass" placeholder="Password"/>
                            </div>
                          
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation"  required id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <span class="invalid-feedback alert" style="display:none" >
                                <strong>Agree with all the statements</strong>
                            </span>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term"   id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image" >
                        <figure><img src="{{ asset('assets/images/7wec_s1wt_220517.jpg') }}" alt="sing up image"></figure>
                        <a href="/login" class="signup-image-link">I already have an account</a>
                    </div>
                </div>
            </div>
        </section>


    </div>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}" defer></script>
<script src="{{ asset('assets/js/main.js') }}" defer></script>
<script>
document.querySelector('form').addEventListener('submit', function(e) {
    var terms = document.querySelector('#agree-term');
    var error = document.querySelector('.invalid-feedback');
    if (!terms.checked) {
        e.preventDefault();
        error.style.display = 'block'; // mostra a mensagem de erro
    } else {
        error.style.display = 'none'; // esconde a mensagem de erro
    }
});
</script>

   {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    {{-- <script src="js/main.js"></script> --}}
</body>
</html>
