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
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-chart-pie"></i> Show Project Category</strong>
                    <a href="{{ route('project-category.index') }}" class="btn btn-dark btn-sm"><i
                            class="uil-chart-pie"></i> All Category</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" value="{{ $data->procate_name }}" class="form-control "
                                id="procate_name" name="procate_name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-3 col-form-label">Url <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" value="{{ $data->procate_url }}" class="form-control"
                                id="procate_url" name="procate_url">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-3 col-form-label">Order By <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="number" value="{{ $data->procate_order }}" class="form-control"
                                id="procate_order" name="procate_order">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-3 col-form-label">Creator <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" value="{{ $data->user->name }}" class="form-control"
                                id="procate_url" name="procate_url">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="feedback" class="col-3 col-form-label">Remarks <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <textarea disabled class="form-control" name="procate_remarks" id="procate_remarks"
                                style="height: 100px"> {{ $data->procate_remarks }} </textarea>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
