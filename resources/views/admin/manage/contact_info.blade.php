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
            <h4 class="page-title">Contact Information</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('admin.manage.contactinfo.update') }}" method="POST">
                @csrf
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> Contact Information</strong>
                    <a href="{{ route('admin.manage.socialmedia') }}" class="btn btn-dark btn-sm">Social Media</a>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-phone"></i></span>
                                <input type="text" name="cont_phone1" class="form-control @error('cont_phone1') is-invalid @enderror" placeholder="Enter Phone Number" aria-label="Enter Phone Number" aria-describedby="basic-addon1"
                                value="{{ $contactinfo->cont_phone1 }}">
                                @error('cont_phone1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-phone"></i></span>
                                <input type="text" name="cont_phone2" class="form-control @error('cont_phone2') is-invalid @enderror" placeholder="Enter Phone Number" aria-label="Enter Phone Number" aria-describedby="basic-addon1"
                                value="{{ $contactinfo->cont_phone2 }}">
                                @error('cont_phone2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-phone"></i></span>
                                <input type="text" name="cont_phone3" class="form-control @error('cont_phone3') is-invalid @enderror" placeholder="Enter Phone Number" aria-label="Enter Phone Number" aria-describedby="basic-addon1"
                                value="{{ $contactinfo->cont_phone3 }}">
                                @error('cont_phone3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-phone"></i></span>
                                <input type="text" name="cont_phone4" class="form-control @error('cont_phone4') is-invalid @enderror" placeholder="Enter Phone Number" aria-label="Enter Phone Number" aria-describedby="basic-addon1"
                                value="{{ $contactinfo->cont_phone4 }}">
                                @error('cont_phone4')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- EMAIL --}}
                    <div class="row mb-3 mt-3">
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-envelope"></i></span>
                                <input type="text" name="cont_email1" class="form-control @error('cont_email1') is-invalid @enderror" placeholder="Enter Email Address" aria-label="Enter Email Address" aria-describedby="basic-addon1"
                                value="{{ $contactinfo->cont_email1 }}">
                                @error('cont_email1')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-envelope"></i></span>
                                <input type="text" name="cont_email2" class="form-control @error('cont_email2') is-invalid @enderror" placeholder="Enter Email Address" value="{{ $contactinfo->cont_email2 }}">
                                @error('cont_email2')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-envelope"></i></span>
                                <input type="text" name="cont_email3" class="form-control @error('cont_email3') is-invalid @enderror" placeholder="Enter Email Address" aria-label="Enter Email Address" aria-describedby="basic-addon1"
                                value="{{ $contactinfo->cont_email3 }}">
                                @error('cont_email3')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-envelope"></i></span>
                                <input type="text" name="cont_email4" class="form-control @error('cont_email4') is-invalid @enderror" placeholder="Enter Email Address" aria-label="Enter Email Address" aria-describedby="basic-addon1"
                                value="{{ $contactinfo->cont_email4 }}">
                                @error('cont_email4')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- LOCATION --}}
                    <div class="row mb-3">
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-map-marker-shield"></i></span>
                                <textarea name="cont_add1" class="form-control" name="" id="" rows="2" placeholder="Enter Your Address">{{ $contactinfo->cont_add1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-map-marker-shield"></i></span>
                                <textarea name="cont_add2" class="form-control" name="" id="" rows="2" placeholder="Enter Your Address">{{ $contactinfo->cont_add2 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-map-marker-shield"></i></span>
                                <textarea name="cont_add3" class="form-control" name="" id="" rows="2" placeholder="Enter Your Address">{{ $contactinfo->cont_add3 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-map-marker-shield"></i></span>
                                <textarea name="cont_add4" class="form-control" name="" id="" rows="2" placeholder="Enter Your Address">{{ $contactinfo->cont_add4 }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-dark row justify-content-md-center">
                    <div class="col col-lg-2">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                        <span>Update</span> </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
