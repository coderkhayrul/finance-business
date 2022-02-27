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
                <h4 class="page-title">Page</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('page.update', $data->page_slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="text" value="{{ $data['page_id'] }}" class="form-control" name="page_id">
                    <div class="card-header d-flex justify-content-between">
                        <strong class="fs-4"> <i class="uil-bag"></i> Update Page</strong>
                        <a href="{{ route('page.index') }}" class="btn btn-dark btn-sm"><i class="uil-bag"></i> All
                            Page</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3 mt-3">
                            <label for="name" class="col-3 col-form-label">Name <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <input type="text" value="{{ $data['page_title'] }}"
                                    class="form-control @error('page_title') is-invalid @enderror" id="page_title"
                                    name="page_title" placeholder="Partner Title">
                                @error('page_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="name" class="col-3 col-form-label">URL <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <input type="text" value="{{ $data['page_url'] }}"
                                    class="form-control @error('page_url') is-invalid @enderror" id="page_url"
                                    name="page_url" placeholder="Designation">
                                @error('page_url')
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
                                <input type="number" value="{{ $data['page_order'] }}"
                                    class="form-control @error('page_order') is-invalid @enderror" id="page_order"
                                    name="page_order" placeholder="Partner Order">
                                @error('page_order')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="feedback" class="col-3 col-form-label">Remakrs <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <textarea class="form-control @error('page_remarks') is-invalid @enderror"
                                    placeholder="Leave a remarks here" name="page_remarks" id="page_remarks"
                                    style="height: 100px">{{ $data['page_remarks'] }}</textarea>
                                @error('page_remarks')
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
                                <span>Page Update</span> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
