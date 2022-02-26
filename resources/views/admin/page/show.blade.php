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
                <h4 class="page-title">Pages</h4>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-symbol"></i> Page Information</strong>
                    <a href="{{ route('page.index') }}" class="btn btn-dark btn-sm"><i class="uil-symbol"></i> All
                        Page</a>
                </div>
                <div class="card-body">

                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Page Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" class="form-control" value="{{ $data->page_title }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Page Url <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" class="form-control" value="{{ $data->page_url }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Page Order <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" class="form-control" value="{{ $data->page_order }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Page Create By <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" class="form-control" value="{{ $data->user->name }}">
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Page Update By <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            @if ($data->page_editor)
                                <input disabled type="text" class="form-control" value="{{ $data->page_editor }}">
                            @else
                                <input disabled type="text" class="form-control" value="Not yet edited">
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
