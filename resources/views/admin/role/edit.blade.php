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

            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-keyhole-square-full"></i> Role Information Update</strong>
                <a href="{{ route('role.index') }}" class="btn btn-secondary btn-sm">All Role</a>
            </div>
            <div class="card-body">

                @if (Session::Has('success'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Success - </strong> {{ Session::get('success') }}
                </div>
                @endif
                <form class="form-horizontal" action="{{ route('role.update',$role->id) }}" method="POST"
                    id="update-form">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ $role->name }}"
                                class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Name">
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
            </div>
            </form>
            <div class="card-footer bg-dark">
                <div class="justify-content-end row">
                    <div class="col-9">
                        <button onclick="event.preventDefault(); getElementById('update-form').submit();"
                            class="btn btn-primary"><i class=" uil-sync me-1"></i>
                            <span>Update Role</span> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
