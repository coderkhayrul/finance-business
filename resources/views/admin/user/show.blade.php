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

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> User Information</strong>
                <a href="{{ route('user.index') }}" class="btn btn-secondary btn-sm">All Users</a>
            </div>
            <div class="card-body">
                <div class="row mb-3 mt-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Name <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                            placeholder="Name">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Email <strong
                            class="text-danger">*</strong></label>
                    <div class="col-9">
                        <input disabled type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{ $user->email }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-3 col-form-label">Phone</label>
                    <div class="col-9">
                        <input disabled type="text" class="form-control" id="phone" name="phone" placeholder="Phone"
                            value="{{ $user->phone }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
