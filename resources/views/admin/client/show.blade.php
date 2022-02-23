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
            <h4 class="page-title">Client</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <strong class="fs-4"> <i class="uil-book-reader"></i> Show Client Information </strong>
                <a href="{{ route('client.index') }}" class="btn btn-dark btn-sm"><i class="uil-book-reader"></i> All Client</a>
            </div>
            <div class="card-body">
                <div class="row mb-3 mt-3">
                    <label for="name" class="col-3 col-form-label">Title <strong class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" value="{{ $data->client_title }}" class="form-control"  name="client_title">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="name" class="col-3 col-form-label">Url <strong class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" value="{{ $data->client_url }}" class="form-control" name="client_url">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-3 col-form-label">Order By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="number" value="{{ $data->client_order }}" class="form-control" name="client_order">
                        
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="feedback" class="col-3 col-form-label">Remarks <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <textarea disabled class="form-control" name="client_remarks" id="client_remarks"
                            style="height: 100px">{{ $data->client_remarks }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-3 col-form-label">Image</label>
                    <div class="col-9 text-center">
                        @if ($data->client_image)
                        <img src="{{ asset('uploads/client/'.$data->client_image) }}" alt="image"
                            class="img-fluid avatar-sm rounded">
                        @else
                        <img src="{{ asset('uploads/noimage.png') }}" alt="image" class="img-fluid avatar-sm rounded">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
