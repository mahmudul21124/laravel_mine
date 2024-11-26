@extends('backend.layouts.app')

@section('css')
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <!-- wysihtml5 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/wysihtml5/css/bootstrap-wysihtml5.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('main/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>New Lacturer</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                                                            </li> -->
                        <li class="breadcrumb-item active">Edit Lacturer
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">

                <div class="col-8 offset-2">
                    <div class="card form-card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Lacturer</h4>
                            <form class="form-horizontal" method="post"
                                action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Student Name*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputuname_4"
                                                name="name" value="{{ old('name') ?? $student->name }}"
                                                placeholder="Enter Name">
                                        </div>
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Classroom*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="classroom" id="" class="form-control">
                                                <option value="">Select One</option>

                                                @foreach ($classrooms as $classroom)
                                                    <option value="{{ $classroom->id }}" @selected(old('classroom') ?? $student->classroom_id == $classroom->id)>
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
                                                name="email" value="{{ old('email') ?? $student->email }}"
                                                placeholder="Enter Email">
                                        </div>
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Password*</label>
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
                                </div> --}}

                                <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Date of Birth*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="exampleInputuname_4"
                                                name="dob" value="{{ old('dob') ?? $student->dob }}">
                                        </div>
                                        @error('dob')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Gender*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input id="radio1" class="" name="gender" type="radio"
                                                value="male"
                                                @if (old('gender') == 'male') checked 
												@elseif($student->gender == 'male')
												 checked @endif>
                                            <label for="radio1" class="">Male</label>

                                            <input id="radio2" class="" name="gender" type="radio"
                                                value="female" @if (old('gender') == 'female') checked 
												@elseif($student->gender == 'female')
												 checked @endif>
                                            <label for="radio2" class="">Female</label>
                                        </div>
                                        @error('gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail_4" class="col-sm-3 control-label">Address*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea name="address" id="" class="form-control" placeholder="Enter address" rows="10">{{ old('address') ?? $student->address }}</textarea>
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
                                                name="phone" value="{{ old('phone') ?? $student->phone }}"
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
                                <button type="submit" class="btn btn-info ">Update</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- #/ container -->
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('main/js/custom.min.js') }}"></script>
    <script src="{{ asset('main/js/settings.js') }}"></script>
    <script src="{{ asset('main/js/gleek.js') }}"></script>
    <script src="{{ asset('main/js/styleSwitcher.js') }}"></script>
@endsection
