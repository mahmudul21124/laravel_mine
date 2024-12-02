<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gleek - Bootstrap Admin Dashboard HTML Template</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }} ">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('main/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div class="login-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content login-form">
                        <div class="card">
                            <div class="card-body">
                                <div class="logo text-center">
                                    <a href="index.html">
                                        <img src="{{asset('main/assets/images/f-logo.png')}}" alt="">
                                    </a>
                                </div>
                                <h4 class="text-center mt-4">Sign up to Your Account</h4>
                                <form class="form-horizontal" method="post" action="{{ route('front_student.register') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Student
                                            Name*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="exampleInputuname_4"
                                                    name="name" value="{{ old('name') }}" placeholder="Enter Name">
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputuname_4"
                                            class="col-sm-3 control-label">Classroom*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <select name="classroom" id="" class="form-control">
                                                    <option value="">Select One</option>

                                                    @foreach ($classrooms as $classroom)
                                                        <option value="{{ $classroom->id }}"
                                                            @selected(old('classroom') == $classroom->id)>
                                                            {{ $classroom->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            @error('classroom')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Email*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="email" class="form-control" id="exampleInputuname_4"
                                                    name="email" value="{{ old('email') }}"
                                                    placeholder="Enter Email">
                                            </div>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputuname_4"
                                            class="col-sm-3 control-label">Password*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="exampleInputuname_4"
                                                    name="password" placeholder="Enter Password">
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Confirm
                                            Password*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="exampleInputuname_4"
                                                    name="password_confirmation" placeholder="Repeat Password">
                                            </div>
                                            @error('password_confirmation')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Date of
                                            Birth*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="exampleInputuname_4"
                                                    name="dob" value="{{ old('dob') }}">
                                            </div>
                                            @error('dob')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputuname_4"
                                            class="col-sm-3 control-label">Gender*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input id="radio1" class="form-control" name="gender" type="radio"
                                                    value="male" @if (old('status') == 'male') checked @endif>
                                                <label for="radio1" class="">Male</label>

                                                <input id="radio2" class="form-control" name="gender" type="radio"
                                                    value="female" @if (old('status') == 'female') checked @endif>
                                                <label for="radio2" class="">Female</label>
                                            </div>
                                            @error('gender')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail_4"
                                            class="col-sm-3 control-label">Address*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <textarea name="address" id="" class="form-control" placeholder="Enter address" rows="10">{{ old('address') }}</textarea>
                                            </div>
                                            @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Phone*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="exampleInputuname_4"
                                                    name="phone" value="{{ old('phone') }}"
                                                    placeholder="Enter Phone Number">
                                            </div>
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputuname_4" class="col-sm-3 control-label">Photo*</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <input type="file" class="form-control" id="exampleInputuname_4"
                                                    name="photo">
                                            </div>
                                            @error('photo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>




                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-info ">Add</button>
                                </div>
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
                                <p class="mt-5">Already have an account? <a href="{{route('student.login')}}">Login Now</a>
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
