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
            <h4 class="page-title">Service</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-yellow"></i> New Service Create</strong>
                    <a href="{{ route('service.index') }}" class="btn btn-dark btn-sm"><i class="uil-yellow"></i> All Service</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Service Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ old('service_title') }}" class="form-control @error('service_title') is-invalid @enderror" id="service_title" name="service_title" placeholder="Service Title">
                            @error('service_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Service Icon <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ old('service_icon') }}" class="form-control @error('service_icon') is-invalid @enderror" id="service_icon" name="service_icon" placeholder="Enter Icon Name">
                            @error('service_icon')
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
                            <input type="number" value="{{ old('service_order') }}" class="form-control @error('service_order') is-invalid @enderror" id="service_order" name="service_order" placeholder="Service Order">
                            @error('service_order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="feedback" class="col-3 col-form-label">Service Subtitle <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <textarea class="form-control @error('service_subtitle') is-invalid @enderror" placeholder="Leave a subtitle here" name="service_subtitle" id="service_subtitle" style="height: 100px" value="{{ old('service_subtitle') }}"></textarea>
                            @error('service_subtitle')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="feedback" class="col-3 col-form-label">Service Details <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <textarea class="form-control @error('service_details') is-invalid @enderror" placeholder="Leave a details here" name="service_details" id="service_details" style="height: 100px" value="{{ old('service_details') }}"></textarea>
                            @error('service_details')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Image Upload</label>
                        <div class="col-6">
                            <input type="file" id="example-fileinput" name="service_image" class="form-control @error('service_image') is-invalid @enderror">
                            @error('service_image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3 text-center">
                            <img id="preview-image" src="{{ asset('uploads/noimage.png') }}" alt="image" class="img-fluid rounded" width="100"/>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-dark row justify-content-md-center">
                    <div class="col col-lg-3">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                        <span>Service Save</span> </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#example-fileinput').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#preview-image').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);

    });
</script>

@endsection
