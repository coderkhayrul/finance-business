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
            <h4 class="page-title">Gallery</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <strong class="fs-4"> <i class="uil-symbol"></i> New Gallery Create</strong>
                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary btn-sm">All Gallery</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Gallery Title <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ old('gallery_title') }}" class="form-control @error('gallery_title') is-invalid @enderror" id="gallery_title" name="gallery_title" placeholder="Gallery Title">
                            @error('gallery_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Gallery Remarks <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ old('gallery_remarks') }}" class="form-control @error('gallery_remarks') is-invalid @enderror" id="gallery_remarks" name="gallery_remarks" placeholder="Gallery Remarks">
                            @error('gallery_remarks')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="order_by" class="col-3 col-form-label">Order By <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="number" value="{{ old('gallery_order') }}" class="form-control @error('gallery_order') is-invalid @enderror" id="gallery_order" name="gallery_order" placeholder="Partner Order">
                            @error('gallery_order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="order_by" class="col-3 col-form-label">Galley Category Select <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <select class="form-select mb-3 @error('gallery_category_id') is-invalid @enderror" name="gallery_category_id">
                                <option selected>Select Your Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->galcate_id }}">{{ $category->galcate_name }}</option>
                                @endforeach
                            </select>
                            @error('gallery_category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Galler Logo Upload</label>
                        <div class="col-6">
                            <input type="file" id="example-fileinput" name="gallery_image" class="form-control">
                        </div>
                        <div class="col-3 text-center">
                            <img id="preview-image" src="{{ asset('uploads/noimage.png') }}" alt="image" class="img-fluid rounded" width="100"/>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-dark row justify-content-md-center">
                    <div class="col col-lg-2">
                        <button type="submit" class="btn btn-primary"><i class="uil-sync me-1"></i>
                        <span>Gallery Save</span> </button>
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
