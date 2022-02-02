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
            <form class="form-horizontal" action="{{ route('user.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> Contact Information</strong>
                    <a href="{{ route('admin.manage.socialmedia') }}" class="btn btn-secondary btn-sm">Social Media</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-phone"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-phone"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-phone"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-phone"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
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
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-envelope"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-envelope"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-envelope"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- LOCATION --}}
                    <div class="row mb-3">
                        <div class="col-6 form-floating">
                            <div class="form-floating mb-3 input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-location"></i></span>
                                <input type="text" class="form-control" id="address"/>
                            </div>
                        </div>
                        <div class="col-6 form-floating">
                            <div class="form-floating mb-3 input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-location"></i></span>
                                <input type="text" class="form-control" id="address"/>
                            </div>
                        </div>
                        <div class="col-6 form-floating">
                            <div class="form-floating mb-3 input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-location"></i></span>
                                <input type="text" class="form-control" id="address"/>
                            </div>
                        </div>
                        <div class="col-6 form-floating">
                            <div class="form-floating mb-3 input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="dripicons-location"></i></span>
                                <input type="text" class="form-control" id="address"/>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer bg-dark">
                    <div class="justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-primary"><i class="uil-sync me-1"></i>
                                <span>Update</span> </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
