<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
<style>
    .dcp_button { 
  color: #ffffff; 
  background-color: #4F0000; 
  border-color: #4F0000; 
} 

.dcp_text a{ 
  color: #4F0000; 
} 

.dcp_card{ 
  color: ; 
} 
 
.card {
  border: color: burgundy;
}

.label {
    color: #4F0000;
}



.dcp_button:hover, 
.dcp_button:focus, 
.dcp_button:active, 
.dcp_button.active, 
.open .dropdown-toggle.dcp_button { 
  color: #ffffff; 
  background-color: #52521A; 
  border-color: #4F0000; 
} 
 
.dcp_button:active, 
.dcp_button.active, 
.open .dropdown-toggle.dcp_button { 
  background-image: none; 
} 
 
.dcp_button.disabled, 
.dcp_button[disabled], 
fieldset[disabled] .dcp_button, 
.dcp_button.disabled:hover, 
.dcp_button[disabled]:hover, 
fieldset[disabled] .dcp_button:hover, 
.dcp_button.disabled:focus, 
.dcp_button[disabled]:focus, 
fieldset[disabled] .dcp_button:focus, 
.dcp_button.disabled:active, 
.dcp_button[disabled]:active, 
fieldset[disabled] .dcp_button:active, 
.dcp_button.disabled.active, 
.dcp_button[disabled].active, 
fieldset[disabled] .dcp_button.active { 
  background-color: #4F0000; 
  border-color: #4F0000; 
} 
 
.dcp_button .badge { 
  color: #4F0000; 
  background-color: #ffffff; 
}

.bg-primary {
    background-color: #007bff!important;
}

</style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card dcp_card card-outline card-primary">
            <div class="card-header text-center">
                <img src={{asset('dist/img/dcplogo11.jpg  elevation-2 alt=Logo')}}>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">


                        <input id="email" type="email" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>




                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="input-group mb-3">


                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">




                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="row">
                        <div class="col-8 ">
                            <div class="icheck-primary">

                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn dcp_button btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">

                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1 dcp_text">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p>
                <p class="mb-0 dcp_text">

                    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>