@extends('backend.layouts.app')

@section('css')
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('') }}assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('') }} assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('') }}main/css/style.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Lacturer</h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard')}}">Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item"><a href="javascript:void(0)">Apps</a>
                            </li> -->
                        <li class="breadcrumb-item active">Lacturer</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                
                <div class="col-8 offset-2">
                    <div class="card card-full-width rounded-0">
                        <div class="card-body user-details-contact text-center">
                            <div class="user-image mb-3">
                                <img class="rounded-circle" src="{{ asset($teacher->photo) }}" alt="" width="150">
                            </div>
                            <div class="user-intro">
                                <h4 class="text-primary mb-0">{{$teacher->name}}</h4>
                                <p><b>@</b>{{$teacher->name}}</p>
                                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of
                                    spring which I enjoy with my heart I alone feel the charm of existence.</p>
                            </div>
                            <div class="contact-addresses">
                                <ul class="contact-address-list">
                                    <li class="email">
                                        <h5><i class="fa fa-envelope text-primary"></i> Email Address</h5>
                                        <p>{{$teacher->email}}</p>
                                    </li>
                                    <li class="phone">
                                        <h5><i class="fa fa-phone text-primary"></i> Phone</h5>
                                        <p>{{$teacher->phone}}</p>
                                    </li>
                                    <li class="address">
                                        <h5><i class="fa fa-map text-primary" aria-hidden="true"></i> Address</h5>
                                        <p>{{$teacher->address}}</p>
                                    </li>
                                    <li class="location">
                                        <h5><i class="fa fa-map-marker text-primary" aria-hidden="true"></i> Location</h5>
                                        <div id="location-map"></div>
                                    </li>
                                    <li class="social">
                                        <h5>Social Profile</h5>
                                        <ul class="social-navigation">
                                            <li>
                                                <a class="bg-facebook" href="javascript:void()"><i
                                                        class="fa fa-facebook color-white"></i></a>
                                            </li>
                                            <li>
                                                <a class="bg-instagram" href="javascript:void()"><i
                                                        class="fa fa-instagram color-white"></i></a>
                                            </li>
                                            <li>
                                                <a class="bg-twitter" href="javascript:void()"><i
                                                        class="fa fa-twitter color-white"></i></a>
                                            </li>
                                            <li>
                                                <a class="bg-youtube" href="javascript:void()"><i
                                                        class="fa fa-youtube color-white"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
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

    <script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('main/js/plugins-init/datatable-page-contact-init.js') }}"></script>
@endsection
