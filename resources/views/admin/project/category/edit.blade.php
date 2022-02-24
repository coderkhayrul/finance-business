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
                <h4 class="page-title">Project Category</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('project-category.update', $data->procate_slug) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="procate_id" value="{{ $data->procate_id }}">
                    <div class="card-header d-flex justify-content-between">
                        <strong class="fs-4"> <i class="uil-chart-pie"></i> Edit Project Category</strong>
                        <a href="{{ route('project-category.index') }}" class="btn btn-dark btn-sm"><i
                                class="uil-chart-pie"></i> All Category</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3 mt-3">
                            <label for="name" class="col-3 col-form-label"> Name <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <input type="text" value="{{ $data->procate_name }}"
                                    class="form-control @error('procate_name') is-invalid @enderror" id="procate_name"
                                    name="procate_name" placeholder="Category Name">
                                @error('procate_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-3 col-form-label">Order By <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <input type="number" value="{{ $data->procate_order }}"
                                    class="form-control @error('procate_order') is-invalid @enderror" id="procate_order"
                                    name="procate_order" placeholder="Category Order">
                                @error('procate_order')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="feedback" class="col-3 col-form-label">Remarks <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <textarea class="form-control @error('procate_remarks') is-invalid @enderror"
                                    placeholder="Leave a remaks here" name="procate_remarks" id="procate_remarks"
                                    style="height: 100px">{{ $data->procate_remarks }}</textarea>
                                @error('procate_remarks')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-dark row justify-content-md-center">
                        <div class="col col-lg-3">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                                <span>Update</span> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
