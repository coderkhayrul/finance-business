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
                <strong class="fs-4"> <i class="uil-meeting-board"></i> Banner Information</strong>
                <a href="{{ route('banner.index') }}" class="btn btn-secondary btn-sm">All Banner</a>
            </div>
            <div class="card-body">
                <form action="{{ route('banner.update',$banner->ban_id) }}" method="post">
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Banner Title <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control" value="{{ $banner->ban_title }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Banner Sub Title <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control" value="{{ $banner->ban_subtitle }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Banner Button <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control" value="{{ $banner->ban_button }}">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Banner Order <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control" value="{{ $banner->ban_order }}">
                        </div>
                    </div>

                    <div class="row mb-3 mt-3">
                        <label for="inputEmail3" class="col-3 col-form-label">Banner Url <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" class="form-control" value="{{ $banner->ban_url }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Banner Image Upload</label>
                        <div class="col-6">
                            <input type="file" id="example-fileinput" name="banner_image" class="form-control">
                        </div>
                        <div class="col-3 text-center">
                            @if ($banner->ban_image)
                            <img id="preview-image" src="{{ asset('uploads/banner/'.$banner->ban_image) }}" alt="image"
                                class="img-fluid rounded" width="100" />

                            @else
                            <img id="preview-image" src="{{ asset('uploads/avatar.png') }}" alt="image"
                                class="img-fluid rounded" width="100" />
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#example-fileinput').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);

    });

</script>
@endsection
