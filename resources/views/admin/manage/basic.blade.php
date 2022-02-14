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
            <form class="form-horizontal" action="{{ route('admin.manage.basic.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> Basic Information</strong>
                    <a href="{{ route('admin.manage.contactinfo') }}" class="btn btn-dark btn-sm"><i class="uil-chat-bubble-user"></i> Contact Information</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Company Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control @error('basic_company') is-invalid @enderror" id="basic_company" name="basic_company" placeholder="Enter Company Name"
                            value="{{ $basic->basic_company }}">
                            @error('basic_company')
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
                            <input type="text" class="form-control @error('basic_title') is-invalid @enderror" id="basic_title" name="basic_title" placeholder="Company Title"
                            value="{{ $basic->basic_title }}">
                            @error('basic_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Main Logo Upload</label>
                        <div class="col-6">
                            <input type="file" id="mainlogo-fileinput" name="basic_logo" class="form-control">
                        </div>
                        <div class="col-3 text-center">
                            @if ($basic->basic_logo)
                                <img id="main-preview-image" src="{{ asset('uploads/basic/'.$basic->basic_logo) }}" alt="image" class="img-fluid rounded" width="50">
                            @else
                                <img id="main-preview-image" src="{{ asset('uploads/no_image.jpg') }}" alt="image" class="img-fluid rounded" width="80"/>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Footer Logo Upload</label>
                        <div class="col-6">
                            <input type="file" id="footerlogo-fileinput" name="basic_flogo" class="form-control">
                        </div>
                        <div class="col-3 text-center">
                            @if ($basic->basic_flogo)
                                <img id="footer-preview-image" src="{{ asset('uploads/basic/'.$basic->basic_flogo) }}" alt="image" class="img-fluid rounded" width="50">
                            @else
                                <img id="footer-preview-image" src="{{ asset('uploads/no_image.jpg') }}" alt="image" class="img-fluid rounded" width="80"/>
                            @endif
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Favicon Upload</label>
                        <div class="col-6">
                            <input type="file" id="favicon-fileinput" name="basic_favicon" class="form-control">
                        </div>
                        <div class="col-3 text-center">
                            @if ($basic->basic_favicon)
                                <img id="favicon-preview-image" src="{{ asset('uploads/basic/'.$basic->basic_favicon) }}" alt="image" class="img-fluid rounded" width="50">
                            @else
                                <img id="favicon-preview-image" src="{{ asset('uploads/no_image.jpg') }}" alt="image" class="img-fluid rounded" width="80"/>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-dark row justify-content-md-center">
                    <div class="col col-lg-2">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                        <span>Updae</span> </button>
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
