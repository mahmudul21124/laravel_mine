<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page2">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('main/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    
    <div class="login-bg2 h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-between h-100">
                
                <div class="col-xl-3 p-0">
                    <div class="form-input-content login-form bg-white">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.html">
                                        <img src="../../assets/images/f-logo.png" alt="">
                                    </a>
                                </div>
                                <h4 class="text-center mt-4">Log into Admin Account</h4>

                                <form class="mt-5 mb-5" method="POST" action="{{route('admin.login')}}" >
                                    @csrf
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Enter password">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-check p-l-0">
                                                <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                <label class="form-check-label ml-3" for="basic_checkbox_1">Check me
                                                    out</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 text-right"><a href="javascript:void()">Forgot
                                                Password?</a>
                                        </div>
                                    </div>
                                    <div class="text-center mb-4 mt-4">
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <h5 class="mb-5">Or with Login</h5>
                                    <ul class="list-inline">
                                        <li class="list-inline-item m-t-10"><a href="javascript:void()"
                                                class="btn btn-facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item m-t-10"><a href="javascript:void()"
                                                class="btn btn-twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item m-t-10"><a href="javascript:void()"
                                                class="btn btn-linkedin"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li class="list-inline-item m-t-10"><a href="javascript:void()"
                                                class="btn btn-google-plus"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                    </ul>
                                    <p class="mt-5">Dont have an account? <a href="javascript:void()">Register Now</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
    <!-- Common JS -->
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <!-- Custom script -->
    <script src="{{ asset('main/js/custom.min.js') }}"></script>
    <script src="{{ asset('main/js/settings.js') }}"></script>
    <script src="{{ asset('main/js/gleek.js') }}"></script>
</body>

</html>
