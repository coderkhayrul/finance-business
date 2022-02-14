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
            <h4 class="page-title">Partner</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('partner.update',$partner->partner_slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header d-flex justify-content-between bg-dark text-light">
                    <strong class="fs-4"> <i class="uil-symbol"></i> Update Partner Create</strong>
                    <a href="{{ route('partner.index') }}" class="btn btn-secondary btn-sm">All Partner</a>
                </div>
                <div class="card-body">
                    <input type="hidden" name="partner_id" value="{{ $partner->partner_id}}">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Partner Title <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ $partner->partner_title }}" class="form-control @error('partner_title') is-invalid @enderror" id="partner_title" name="partner_title" placeholder="Partner Title">
                            @error('partner_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Partner Url <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ $partner->partner_url }}" class="form-control @error('partner_url') is-invalid @enderror" id="partner_url" name="partner_url" placeholder="Partner Url">
                            @error('partner_url')
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
                            <input type="number" value="{{ $partner->partner_order }}" class="form-control @error('partner_order') is-invalid @enderror" id="partner_order" name="partner_order" placeholder="Partner Order">
                            @error('partner_order')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Partner Logo Upload</label>
                        <div class="col-6">
                            <input type="file" id="example-fileinput" name="partner_logo" class="form-control">
                        </div>
                        <div class="col-3 text-center">
                            @if ($partner->partner_logo)
                            <img name="ban_image" id="preview-image" src="{{ asset('uploads/partner/'.$partner->partner_logo) }}" alt="image"
                                class="img-fluid rounded" width="100" />
                            @else
                            <img id="preview-image" src="{{ asset('uploads/avatar.png') }}" alt="image"
                                class="img-fluid rounded" width="100" />
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-dark row justify-content-md-center">
                    <div class="col col-lg-3">
                        <button type="submit" class="btn btn-primary"><i class="uil-sync me-1"></i>
                        <span>Partner Update</span> </button>
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
