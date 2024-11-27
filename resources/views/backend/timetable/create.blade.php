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
                    <h4>New Timetable</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                                    </li> -->
                        <li class="breadcrumb-item active">New Timetable
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">

                <div class="col-8 offset-2">
                    <div class="card form-card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">New Timetable</h4>
                            <form class="form-horizontal" method="post" action="{{ route('timetable.store') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Classroom*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="classroom" id="" class="form-control">
                                                <option value="">Select One</option>

                                                @foreach ($classrooms as $classroom)
                                                    <option value="{{ $classroom->id }}" @selected(old('classroom') == $classroom->id)>
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
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Teacher*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="teacher" id="" class="form-control">
                                                <option value="">Select One</option>

                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}" @selected(old('teacher') == $teacher->id)>
                                                        {{ $teacher->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('teacher')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Subject*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <select name="subject" id="" class="form-control">
                                                <option value="">Select One</option>

                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}" @selected(old('subject') == $subject->id)>
                                                        {{ $subject->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('subject')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Day*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="exampleInputuname_4"
                                                name="day" value="{{ old('day') }}">
                                        </div>
                                        @error('day')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">Start Time*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="time" class="form-control" id="exampleInputuname_4"
                                                name="startTime" value="{{ old('startTime') }}">
                                        </div>
                                        @error('startTime')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputuname_4" class="col-sm-3 control-label">End Time*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="time" class="form-control" id="exampleInputuname_4"
                                                name="endTime" value="{{ old('endTime') }}">
                                        </div>
                                        @error('endTime')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-info ">Add</button>
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
