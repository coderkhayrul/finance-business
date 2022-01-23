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
            <h4 class="page-title">Users</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> User Information Update</strong>
                <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">All Users</a>
            </div>
            <div class="card-body">

                @if (Session::Has('message'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Success - </strong> {{ Session::get('message') }}
                </div>
                @endif
                <form class="form-horizontal" action="{{ route('user.update',$user->id) }}" method="POST"
                    id="update-form">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ $user->name }}"
                                class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                placeholder="Name">
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Email <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="email" value="{{ $user->email }}"
                                class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                                placeholder="Email">
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Phone</label>
                        <div class="col-9">
                            <input value="{{ $user->phone }}" type="text"
                                class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                                placeholder="Phone">
                            @error('phone')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
            </div>
            </form>
            <div class="card-footer bg-dark">
                <div class="justify-content-end row">
                    <div class="col-9">
                        <button onclick="event.preventDefault(); getElementById('update-form').submit();"
                            class="btn btn-primary"><i class=" uil-sync me-1"></i>
                            <span>Update User</span> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            {{-- @if (Session::Has('up_password'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success - </strong> {{ Session::get('up_password') }}
        </div>
        @endif --}}
        <div class="card-header bg-dark text-light">
            <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> User Password Update</strong>
        </div>
        <form action="{{ route('user.password.update',$user->id) }}" method="post" id="password_update">
            @csrf
            <div class="card-body">
                @if (Session::Has('up_password'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Success - </strong> {{ Session::get('up_password') }}
                </div>
                @endif
                <div class="row mb-2">
                    <div class="col-12 mb-2">
                        <input type="password" class="form-control @error('old_password') is-invalid @enderror"
                            id="old_password" name="old_password" placeholder="Old Password">
                        @error('old_password')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-12 mb-2">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" placeholder="Password">
                        @error('password')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                        @error('password_confirmation')
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
        </form>
        <div class="card-footer bg-dark">
            <div class="justify-content-end row">
                <div class="col-9">
                    <button onclick="event.preventDefault(); getElementById('password_update').submit();"
                        class="btn btn-primary"><i class="uil-sync me-1"></i>
                        <span>Update Password</span> </button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
