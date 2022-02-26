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
                <h4 class="page-title">Testimonial</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('testimonial.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-header d-flex justify-content-between">
                        <strong class="fs-4"> <i class="uil-bag"></i> New Testimonial Create</strong>
                        <a href="{{ route('testimonial.index') }}" class="btn btn-dark btn-sm"><i
                                class="uil-bag"></i> All Testimonial</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3 mt-3">
                            <label for="name" class="col-3 col-form-label">Client Name <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <input type="text" value="{{ old('tm_name') }}"
                                    class="form-control @error('tm_name') is-invalid @enderror" id="tm_name" name="tm_name"
                                    placeholder="Partner Title">
                                @error('tm_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="name" class="col-3 col-form-label">Designation <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <input type="text" value="{{ old('tm_designation') }}"
                                    class="form-control @error('tm_designation') is-invalid @enderror" id="tm_designation"
                                    name="tm_designation" placeholder="www.example.com">
                                @error('tm_designation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="name" class="col-3 col-form-label">Company Name <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <input type="text" value="{{ old('tm_company') }}"
                                    class="form-control @error('tm_company') is-invalid @enderror" id="tm_company"
                                    name="tm_company" placeholder="Company Name">
                                @error('tm_company')
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
                                <input type="number" value="{{ old('tm_order') }}"
                                    class="form-control @error('tm_order') is-invalid @enderror" id="tm_order"
                                    name="tm_order" placeholder="Partner Order">
                                @error('tm_order')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="feedback" class="col-3 col-form-label">Feedback <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <textarea class="form-control @error('tm_feedback') is-invalid @enderror"
                                    placeholder="Leave a feedback here" name="tm_feedback" id="tm_feedback"
                                    style="height: 100px" value="{{ old('tm_feedback') }}"></textarea>
                                @error('tm_feedback')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">Image Upload</label>
                            <div class="col-6">
                                <input type="file" id="example-fileinput" name="tm_image"
                                    class="form-control @error('tm_image') is-invalid @enderror">
                                @error('tm_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-3 text-center">
                                <img id="preview-image" src="{{ asset('uploads/noimage.png') }}" alt="image"
                                    class="img-fluid rounded" width="100" />
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-dark row justify-content-md-center">
                        <div class="col col-lg-3">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                                <span>Testimonial Save</span> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#example-fileinput').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

        });
    </script>
@endsection
