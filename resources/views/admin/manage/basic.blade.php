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
            <h4 class="page-title">Basic Information</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> Basic Information</strong>
                    <a href="{{ route('admin.manage.contactinfo') }}" class="btn btn-secondary btn-sm">Contact Information</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Company Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" placeholder="Enter Company Name">
                            @error('company_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="company_title" class="col-3 col-form-label">Company Title <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('company_title') is-invalid @enderror" id="company_title" name="company_title" placeholder="Company Title">
                            @error('company_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Main Logo Upload</label>
                        <div class="col-6">
                            <input type="file" id="mainlogo-fileinput" name="image" class="form-control">
                        </div>
                        <div class="col-3 text-center">
                            <img id="main-preview-image" src="{{ asset('uploads/avatar.png') }}" alt="image" class="img-fluid rounded" width="50"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Footer Logo Upload</label>
                        <div class="col-6">
                            <input type="file" id="footerlogo-fileinput" name="image" class="form-control">
                        </div>
                        <div class="col-3 text-center">
                            <img id="footer-preview-image" src="{{ asset('uploads/avatar.png') }}" alt="image" class="img-fluid rounded" width="50"/>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Favicon Upload</label>
                        <div class="col-6">
                            <input type="file" id="favicon-fileinput" name="image" class="form-control">
                        </div>
                        <div class="col-3 text-center">
                            <img id="favicon-preview-image" src="{{ asset('uploads/avatar.png') }}" alt="image" class="img-fluid rounded" width="50"/>
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

<script type="text/javascript">
    // Main Logo
    $('#mainlogo-fileinput').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#main-preview-image').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);

    });
    // Footer Logo
    $('#footerlogo-fileinput').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#footer-preview-image').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);

    });

    // Favicon
    $('#favicon-fileinput').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#favicon-preview-image').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);

    });
</script>

@endsection

{{-- @section('admin-custrom-js')

@endsection --}}
