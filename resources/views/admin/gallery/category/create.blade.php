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
            <h4 class="page-title">Gallery Category</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('gallery-category.store') }}" method="POST">
                @csrf
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-scenery"></i> Gallery Category Create</strong>
                    <a href="{{ route('gallery-category.index') }}" class="btn btn-dark btn-sm"><i class="uil-scenery"></i> All Category</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Gallery Category Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ old('galcate_name') }}" class="form-control @error('galcate_name') is-invalid @enderror" id="galcate_name" name="galcate_name" placeholder="Category Name">
                            @error('galcate_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Gallery Category Url <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ old('galcate_url') }}" class="form-control @error('galcate_url') is-invalid @enderror" id="galcate_url" name="galcate_url" placeholder="Category Name">
                            @error('galcate_url')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Gallery Category Remark <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ old('galcate_remarks') }}" class="form-control @error('galcate_remarks') is-invalid @enderror" id="galcate_remarks" name="galcate_remarks" placeholder="Remarks">
                            @error('galcate_remarks')
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
                            <input type="number" value="{{ old('galcate_order') }}" class="form-control @error('galcate_order') is-invalid @enderror" id="galcate_order" name="galcate_order" placeholder="Category Order">
                            @error('galcate_order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-dark row justify-content-md-center">
                    <div class="col col-lg-3">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                        <span>Category Save</span> </button>
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
