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
                <h4 class="page-title">Project</h4>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-symbol"></i> Project Information</strong>
                    <a href="{{ route('project.index') }}" class="btn btn-dark btn-sm"><i class="uil-briefcase"></i>
                        All Project</a>
                </div>
                <div class="card-body">

                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Title <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" class="form-control" value="{{ $data->project_title }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Url<strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" class="form-control" value="{{ $data->project_url }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Project Category <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" class="form-control"
                                value="{{ $data->proCategory->procate_name }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Remakrs <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <textarea disabled class="form-control">{{ $data->project_remarks }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Order <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" class="form-control" value="{{ $data->project_order }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Creator <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" class="form-control" value="{{ $data->user->name }}">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="project_image" class="col-3 col-form-label">Project Image</label>
                        <div class="col-9">
                            @if ($data->project_image)
                                <img src="{{ asset('uploads/project/' . $data->project_image) }}" alt="image"
                                    class="img-fluid avatar-sm rounded">
                            @else
                                <img src="{{ asset('uploads/noimage.png') }}" alt="image"
                                    class="img-fluid avatar-sm rounded">
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
