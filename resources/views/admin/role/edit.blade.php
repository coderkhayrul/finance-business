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

<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header d-flex justify-content-between">
                <strong class="fs-4"> <i class="dripicons-tags"></i> Role Information Update</strong>
                <a href="{{ route('role.index') }}" class="btn btn-dark btn-sm"><i class="dripicons-tagss"></i> All Role</a>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('role.update',$role->role_slug) }}" method="POST"
                    id="update-form">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $role->id }}">
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ $role->role_name }}"
                                class="form-control @error('role_name') is-invalid @enderror" id="role_name" name="role_name"
                                placeholder="Name">
                            @error('role_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
            </div>
            </form>
            <div class="card-footer bg-dark">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-3">
                        <button onclick="event.preventDefault(); getElementById('update-form').submit();"
                            class="btn btn-primary btn-sm"><i class=" uil-sync me-1"></i>
                            <span>Update Role</span> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
