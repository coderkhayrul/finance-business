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
            <h4 class="page-title">Gallery</h4>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <strong class="fs-4"> <i class="uil-symbol"></i> Gallery Information</strong>
                <a href="{{ route('gallery.index') }}" class="btn btn-dark btn-sm"><i class="uil-symbol"></i> All Gallery</a>
            </div>
            <div class="card-body">

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Gallery Title <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $gallery->gallery_title }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Gallery Remarks <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $gallery->gallery_remarks }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Gallery Category <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $gallery->galcategory->galcate_name }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Gallery Order <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $gallery->gallery_order }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Gallery Create By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $gallery->user->name }}">
                    </div>
                </div>

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Partner Update By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        @if ($gallery->gallery_editor)
                        <input disabled type="text" class="form-control" value="{{ $gallery->gallery_editor }}">
                        @else
                        <input disabled type="text" class="form-control" value="Not yet edited">
                        @endif
                    </div>
                </div>

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Gallery Published <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        @if ($gallery->gallery_status === 1)
                        <span class="badge badge-success-lighten">Active</span>
                        @else
                        <span class="badge badge-danger-lighten">Blocked</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="partner_logo" class="col-3 col-form-label">Partner Logo</label>
                    <div class="col-9">
                        @if ($gallery->gallery_image)
                        <img src="{{ asset('uploads/gallery/'.$gallery->gallery_image) }}" alt="image"
                            class="img-fluid avatar-sm rounded">
                        @else
                        <img src="{{ asset('uploads/noimage.png') }}" alt="image" class="img-fluid avatar-sm rounded">
                        @endif
                    </div>
                </div>
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
