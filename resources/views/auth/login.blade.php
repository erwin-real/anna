<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Anna</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.css" rel="stylesheet">
        {{--    <link href="{{ asset('css/vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">--}}
        {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        {{--    <script src="{{ URL::asset('js/app.js') }}" defer></script>--}}
    </head>

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-6 col-md-8">

                    <div class="card shadow o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                                <div class="col-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h2 text-gray-900">Welcome!</h1>
                                            <h6 class="h5 text-gray-900 mb-4">Machineries & Equipments</h6>
                                        </div>
                                        <hr>

                                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" class="user">
                                            @csrf
                                            <div class="form-group">
                                                <input id="username" type="text"
                                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                                       name="username" value="{{ old('username') }}" required autofocus
                                                       placeholder="Username"
                                                >

                                                @if ($errors->has('username'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <input id="password" type="password"
                                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                       name="password" required placeholder="Password"
                                                >

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        </form>
                                        <hr>
                                        {{--<div class="text-center">--}}
                                            {{--<a class="small" href="/register">Create an Account!</a>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>

</html>
