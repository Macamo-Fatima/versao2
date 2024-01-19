<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registar</title>
    <!-- Favicon icon -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('assets/images/favicon.png')}}">
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet">


</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        @if(Session::get('success'))
                                        <div class="alert alert-success">
                                            {{Session::get('success')}}
                                        </div>
                                        @endif
                                        @if(Session::get('error'))
                                        <div class="alert alert-danger">
                                            {{Session::get('error')}}
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" class="form-control" placeholder="username" name="name" id="name" value="{{ old('name') }}">
                                            <span class="text-danger">
                                                @error('name'){{$message}} @enderror
                                            </span>

                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="hello@example.com" value="{{ old('email') }}">

                                            <span class="text-danger">
                                                @error('email'){{$message}} @enderror
                                            </span>

                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" id="password">

                                            <span class="text-danger">
                                                @error('password'){{$message}} @enderror
                                            </span>

                                        </div>
                                        <div class="form-group">
                                            <label><strong> Confirm Password</strong></label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            <span class="text-danger">
                                                @error('password_confirmation'){{$message}} @enderror
                                            </span>

                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{route('login')}}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="{{URL::to('assets/vendor/global/global.min.js')}}"></script>
    <script src="{{URL::to('assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{URL::to('assets/js/custom.min.js')}}"></script>
    <script src="{{URL::to('assets/js/dlabnav-init.js')}}"></script>

    <!--endRemoveIf(production)-->
</body>

</html>
