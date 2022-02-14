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
            <div class="card-header d-flex justify-content-between">
                <strong class="fs-4"> <i class="dripicons-checklist"></i> All Roles Information</strong>
                <a href="{{ route('role.create') }}" class="btn btn-dark btn-sm"><i class="dripicons-tags"></i> Create Role</a>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->role_name }}</td>
                                <td>
                                    @if ($role->role_status === 1)
                                    <span class="badge badge-success-lighten">Active</span>
                                    @else
                                    <span class="badge badge-danger-lighten">Blocked</span>
                                    @endif
                                </td>
                                <td class="table-action">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('role.edit',$role->id) }}" class="dropdown-item"> <i class="mdi mdi-pencil"></i> Edit</a>

                                    <a href="#" class="dropdown-item text-danger" title="Delete" onclick="event.preventDefault();">
                                        <i class="mdi mdi-delete" ></i> Delete</a>
                                    </div>
                                </td>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-dark">
                <a href="#" class="btn btn-success btn-sm">PRINT</a>
                <a href="#" class="btn btn-danger btn-sm">PDF</a>
                <a href="#" class="btn btn-secondary btn-sm">EXCEL</a>
                <a href="#" class="btn btn-warning btn-sm">CGV</a>
            </div>
        </div>
    </div>
</div>

@endsection
