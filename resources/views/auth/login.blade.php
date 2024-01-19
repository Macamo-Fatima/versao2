<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    {{-- Meta data  --}}
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta content="Admitro - Admin Panel HTML template" name="description" />
    <meta content="Spruko Technologies Private Limited" name="author" />
    <meta name="keywords" content="admin panel ui, user dashboard template, web application templates, premium admin templates, html css admin templates, premium admin templates, best admin template bootstrap 4, dark admin template, bootstrap 4 template admin, responsive admin template, bootstrap panel template, bootstrap simple dashboard, html web app template, bootstrap report template, modern admin template, nice admin template" />

    {{-- Title  --}}
    <title>Login</title>

    {{-- Favicon  --}}
    <link rel="icon" href="{{URL::to('assets/images/brand/favicon.ico')}}" type="image/x-icon" />

    {{-- Bootstrap css  --}}
    <link href="{{URL::to('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    {{-- Toastr --}}
    <link href="{{URL::to('assets/css/toastr.min.css')}}" rel="stylesheet">

    {{-- Style css  --}}
    <link href="{{URL::to('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{URL::to('assets/css/dark.css')}}" rel="stylesheet" />
    <link href="{{URL::to('assets/css/skin-modes.css')}}" rel="stylesheet" />

    {{-- Animate css --}}
    <link href="{{URL::to('assets/css/animated.css')}}" rel="stylesheet" />

    {{-- Icons css --}}
    <link href="{{URL::to('assets/css/icons.css')}}" rel="stylesheet" />

    {{-- Color Skin css  --}}
    <link id="theme" href="{{URL::to('assets/colors/color1.css')}}" rel="stylesheet" type="text/css" />
</head>

<body class="h-100vh page-style1">
    <div class="page">
        <div class="page-single">
            <div class="p-5">
                <div class="row">
                    <div class="col mx-auto">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-xl-8">
                                <div class="card-group mb-0">
                                    <div class="card p-4">
                                        <div class="card-body">
                                            <div class="text-center title-style mb-6">
                                                <h1 class="mb-2">Login</h1>
                                                <hr />
                                                <p class="text-muted">Entra na sua conta</p>
                                            </div>
                                            <div class="btn-list d-flex">
                                                <a href="javascript:void(0)" class="btn btn-google btn-block"><i class="fa fa-google fa-1x mr-2"></i> Google</a>
                                                <a href="javascript:void(0)" class="btn btn-twitter"><i class="fa fa-twitter fa-1x"></i></a>
                                                <a href="javascript:void(0)" class="btn btn-facebook"><i class="fa fa-facebook fa-1x"></i></a>
                                            </div>
                                            <hr class="divider my-6" />
                                            <form method="POST" action="{{route('login') }}">
                                                @csrf
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-user"></i>
                                                        </div>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu username" onfocus="this.placeholder=''" onblur="this.placeholder='Digite seu username'" />
                                                </div>
                                                <div class="input-group mb-4">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fe fe-lock"></i>
                                                        </div>
                                                    </div>
                                                    <input type="password" class="form-control" name="password" id="password" class="form-control" placeholder="**********" onfocus="this.placeholder=''" onblur="this.placeholder='**********'" />
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary btn-block px-4">
                                                            Login
                                                        </button>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <a href="javascript:void(0)" class="btn btn-link box-shadow-0 px-0">Esqueceu password?</a>
                                                    </div>
                                                </div>
                                                <div class="text-center pt-4">
                                                    <div class="font-weight-normal fs-16">
                                                        Não possui conta? 
                                                        <a class="btn-link font-weight-normal" href="javascript:void(0)">Cria aqui</a>
                                                        {{-- {{route('register')}} --}}
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card text-white bg-primary py-5 d-md-down-none page-content mt-0">
                                        <div class="text-center justify-content-center page-single-content">
                                            <div class="box">
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                                <div></div>
                                            </div>
                                            <img src="{{URL::to('assets/images/png/login.png')}}" alt="img" />

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery js-->
    <script src="{{URL::to('assets/js/jquery-3.5.1.min.js')}}"></script>

    {{-- Bootstrap4 js --}}
    <script src="{{URL::to('assets/plugins/bootstrap/popper.min.js')}}"></script>
    <script src="{{URL::to('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    {{-- Othercharts js --}}
    <script src="{{URL::to('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

    {{-- Circle-progress js --}}
    <script src="{{URL::to('assets/js/circle-progress.min.js')}}"></script>

    {{-- Jquery-rating js --}}
    <script src="{{URL::to('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

    {{-- Custom js --}}
    <script src="{{URL::to('assets/js/custom.js')}}"></script>
    {{-- Toastr JS --}}
    <script src="{{URL::to('assets/js/toastr.min.js')}}"></script>
    {!! Toastr::message() !!}
</body>
</html>
