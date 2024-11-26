@extends('backend.layouts.app')

@section('css')
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <link href="{{ asset('assets/plugins/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('main/css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles">
                <div class="col p-md-0">
                    <h4>Hello, <span>Welcome here</span></h4>
                </div>
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a>
                        </li>
                        <li class="breadcrumb-item active">Department</li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-12">
                    @if (session('msg'))
                        <div class="alert alert-success">{{ session('msg') }}</div>
                    @elseif(session('dlt'))
                        <div class="alert alert-danger">{{ session('dlt') }}</div>
                    @elseif(session('upt'))
                        <div class="alert alert-info">{{ session('upt') }}</div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Departments</h4>
                            <div class="table-responsive">
                                <a href="{{ route('department.create') }}" class="btn btn-success pull-right">Add
                                    new</a><br><br>
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <form action="{{ route('department.destroy', $item->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ route('department.edit', $item->id) }}"
                                                            class="btn btn-sm btn-success btn-anim"><i
                                                                class="fa fa-pencil-square-o"></i><span
                                                                class="btn-text">EDIT</span></a>
                                                        |
                                                        <button name="submit" type="submit"
                                                            class="btn btn-sm btn-danger btn-anim"><i
                                                                class="fa fa-trash-o"></i><span
                                                                class="btn-text">DELETE</span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
    <script src="{{ asset('main/js/plugins-init/datatables.init.js') }}"></script>
@endsection
