
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
            <h4 class="page-title">Users</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            @if (Session::Has('updatepassword'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Success - </strong> {{ Session::get('updatepassword') }}
                </div>
            @endif
            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> All User Information</strong>
                <a href="{{ route('user.create') }}" class="btn btn-secondary btn-sm">Create User</a>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    @if ($user->photo)
                                    <img src="{{ asset('uploads/users/'.$user->photo) }}" alt="image" class="img-fluid avatar-sm rounded">
                                    @else
                                    <img src="{{ asset('uploads/avatar.png') }}" alt="image" class="img-fluid avatar-sm rounded">
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ? $user->phone : 'Not Found' }}</td>
                                <td>{{ $user->role->role_name }}</td>
                                <td class="table-action">
                                    <a href="{{ route('user.show',$user->id) }}" class="action-icon text-primary"> <i class="mdi mdi-eye"></i></a>
                                    <a href="{{ route('user.edit',$user->id) }}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                    <a href="{{ route('user.destroy',$user->id) }}" class="action-icon text-danger show_confirm"> <i class="mdi mdi-delete"></i></a>
                                    <form id="delete-form" action="{{ route('user.destroy',$user->id) }}" method="POST">
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

{{-- Delete Alert --}}
@include('admin.includes.delete_alert')
@endsection
