@extends('layouts.admin-layout')
@section('admin-content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex">
                    <div class="input-group">
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ms-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                    <a href="javascript: void(0);" class="btn btn-primary ms-1">
                        <i class="mdi mdi-filter-variant"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title">Roles</h4>
        </div>
    </div>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card">
            @if (Session::Has('updatepassword'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Success - </strong> {{ Session::get('updatepassword') }}
                </div>
            @endif
            @if (Session::Has('success'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Success - </strong> {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-keyhole-square-full"></i> All Roles Information</strong>
                <a href="{{ route('role.create') }}" class="btn btn-secondary btn-sm">Create Role</a>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td class="table-action" style="width: 90px;">
                                    {{-- <a href="{{ route('role.show',$role->id) }}" class="action-icon text-primary"> <i class="mdi mdi-eye"></i></a> --}}
                                    <a href="{{ route('role.edit',$role->id) }}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                    <a href="{{ route('role.destroy',$role->id) }}" class="action-icon text-danger" onclick="event.preventDefault(); getElementById('delete-form').submit();"> <i class="mdi mdi-delete"></i></a>
                                    <form id="delete-form" action="{{ route('role.destroy',$role->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>

@endsection
@section('admin-custrom-css')
<!-- Datatables css -->
<link href="{{ asset('admin') }}/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin') }}/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
@endsection

@section('admin-custrom-js')
<!-- Datatables js -->
<script src="{{ asset('admin') }}/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="{{ asset('admin') }}/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/vendor/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="{{ asset('admin') }}/assets/js/pages/demo.datatable-init.js"></script>
@endsection
