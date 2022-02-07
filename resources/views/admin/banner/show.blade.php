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

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-meeting-board"></i> Banner Information</strong>
                <a href="{{ route('banner.index') }}" class="btn btn-secondary btn-sm">All Banner</a>
            </div>
            <div class="card-body">

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Banner Title <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $banner->ban_title }}"
                            >
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Banner Sub Title <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $banner->ban_subtitle }}"
                            >
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Banner Button <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $banner->ban_button }}"
                            >
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Banner Order <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $banner->ban_order }}"
                            >
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Banner Url <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $banner->ban_url }}"
                            >
                    </div>
                </div>

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Banner Published By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $banner->user->name }}"
                            >
                    </div>
                </div>

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Banner Create By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $banner->user->name }}">
                    </div>
                </div>

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Banner Update By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        @if ($banner->ban_editor)
                        <input disabled type="text" class="form-control" value="{{ $banner->user->name }}">
                        @else
                        <input disabled type="text" class="form-control" value="Not yet edited">
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputEmail3" class="col-3 col-form-label">User Image</label>
                    <div class="col-9">
                        @if ($banner->ban_image)
                        <img src="{{ asset('uploads/banner/'.$banner->ban_image) }}" alt="image" class="img-fluid avatar-sm rounded">
                        @else
                        <img src="{{ asset('uploads/no image.png') }}" alt="image" class="img-fluid avatar-sm rounded">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
