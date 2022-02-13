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
            <h4 class="page-title">Gallery Category</h4>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-scenery"></i> Gallery Category Information</strong>
                <a href="{{ route('gallery-category.index') }}" class="btn btn-secondary btn-sm">All Gallery Categories</a>
            </div>
            <div class="card-body">

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Galley Category Name <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $gallery_category->galcate_name }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Gallery Category Remark <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $gallery_category->galcate_remarks }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Gallery Category Order <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $gallery_category->galcate_order }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Create By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $gallery_category->user->name }}">
                    </div>
                </div>

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Update By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        @if ($gallery_category->galcate_editor)
                        <input disabled type="text" class="form-control" value="{{ $gallery_category->user->name }}">
                        @else
                        <input disabled type="text" class="form-control" value="Not yet edited">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
