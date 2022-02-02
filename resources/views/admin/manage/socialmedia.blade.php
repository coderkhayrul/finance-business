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
            <h4 class="page-title">Socail Media</h4>
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
                    <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> Social Media</strong>
                    <a href="{{ route('admin.manage.basic') }}" class="btn btn-secondary btn-sm">Basic Information</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-facebook"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="facebook url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-twitter"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="twitter url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class=" uil-linkedin-alt"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="linkedin url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-dribbble"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="dribbble url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-youtube"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="youtube url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-slack"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="slack url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-instagram"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="instagram url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-behance"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="behance url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-google"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="google url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-raddit-alien-alt"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="raddit url" aria-label="Username" aria-describedby="basic-addon1">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
