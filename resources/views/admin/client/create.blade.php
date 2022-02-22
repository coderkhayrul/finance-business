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
            <h4 class="page-title">Client</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('client.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-book-reader"></i> New Client Create</strong>
                    <a href="{{ route('client.index') }}" class="btn btn-dark btn-sm"><i class="uil-book-reader"></i> All Client</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Title <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ old('client_title') }}" class="form-control @error('client_title') is-invalid @enderror" id="client_title" name="client_title" placeholder="Client Title">
                            @error('client_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Url <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ old('client_url') }}" class="form-control @error('client_url') is-invalid @enderror" id="client_url" name="client_url" placeholder="Enter Url">
                            @error('client_url')
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
                            <input type="number" value="{{ old('client_order') }}" class="form-control @error('client_order') is-invalid @enderror" id="client_order" name="client_order" placeholder="Client Order">
                            @error('client_order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="feedback" class="col-3 col-form-label">Remarks <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <textarea class="form-control @error('client_remarks') is-invalid @enderror" placeholder="Leave a remaks here" name="client_remarks" id="client_remarks" style="height: 100px" value="{{ old('client_remarks') }}"></textarea>
                            @error('client_remarks')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Image Upload</label>
                        <div class="col-6">
                            <input type="file" id="example-fileinput" name="client_image" class="form-control @error('client_image') is-invalid @enderror">
                            @error('client_image')
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

                <div class="card-footer bg-dark row justify-content-md-center justify-content-sm-center">
                    <div class="col col-lg-3 col-sm-3">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                        <span>Client Save</span> </button>
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
