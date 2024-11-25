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
                    <h4>Basic Forms</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item"><a href="javascript:void()">Forms</a>
                        </li> -->
                        <li class="breadcrumb-item active">Basic Forms
                        </li>
                    </ol>
                </div>
            </div>

            <div class="row">
                
                <div class="col-8 offset-2">
                    <div class="card form-card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">New Designation</h4>
                            <form class="form-horizontal" method="post" action="{{route('designation.update', $designation->id)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleInputuname_4"
                                        class="col-sm-3 control-label">Designation*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="exampleInputuname_4"
                                                name="designation" value="{{$designation->name}}" placeholder="Enter Designation">
                                            <div class="input-group-addon"><i class="icon-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail_4"
                                        class="col-sm-3 control-label">Details*</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <textarea name="details" id="" class="form-control"
                                                placeholder="Enter details" rows="10">{{$designation->details}}</textarea>
                                            <div class="input-group-addon"><i class="icon-envelope-open"></i>
                                            </div>
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
