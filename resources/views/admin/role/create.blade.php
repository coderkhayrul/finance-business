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
    <div class="col-md-6">
        <div class="card">
            <form class="form-horizontal" action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="dripicons-tags"></i> New Role Create</strong>
                    <a href="{{ route('role.index') }}" class="btn btn-dark btn-sm"><i class="dripicons-tags"></i> Roles Users</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="role_name" class="col-3 col-form-label">Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('role_name') is-invalid @enderror" id="role_name" name="role_name" placeholder="Name" value="{{ old('role_name') }}">
                            @error('role_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-dark row justify-content-md-center">
                    <div class="col col-lg-3">
                            <button type="submit" class="btn btn-primary"><i class="uil-weight me-1"></i></i>
                                <span>Save</span>
                            </button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
