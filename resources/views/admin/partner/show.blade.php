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
            <h4 class="page-title">Partner</h4>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-symbol"></i> Partner Information</strong>
                <a href="{{ route('partner.index') }}" class="btn btn-secondary btn-sm">All Partner</a>
            </div>
            <div class="card-body">

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Partner Title <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $partner->partner_title }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Partner Url <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $partner->partner_url }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Partner Order <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $partner->partner_order }}">
                    </div>
                </div>
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Partner Create By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" value="{{ $partner->user->name }}">
                    </div>
                </div>

                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Partner Update By <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        @if ($partner->partner_editor)
                        <input disabled type="text" class="form-control" value="{{ $partner->partner_editor }}">
                        @else
                        <input disabled type="text" class="form-control" value="Not yet edited">
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="partner_logo" class="col-3 col-form-label">Partner Logo</label>
                    <div class="col-9">
                        @if ($partner->partner_logo)
                        <img src="{{ asset('uploads/partner/'.$partner->partner_logo) }}" alt="image"
                            class="img-fluid avatar-sm rounded">
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
