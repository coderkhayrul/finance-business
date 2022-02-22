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
            <h4 class="page-title">Team Member</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('team-member.update',$data->team_slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="team_id" value="{{ $data->team_id }}">
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-trademark-circle"></i> Edit Team Member Create</strong>
                    <a href="{{ route('team-member.index') }}" class="btn btn-dark btn-sm"><i class="uil-trademark-circle"></i> All Team Member</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Team Membar Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="text" value="{{ $data->team_name }}" class="form-control @error('team_name') is-invalid @enderror" id="team_name" name="team_name" placeholder="Team Member Name">
                            @error('team_name')
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
                            <input type="text" value="{{ $data->team_designation }}" class="form-control @error('team_designation') is-invalid @enderror" id="team_designation" name="team_designation" placeholder="Enter Designation">
                            @error('team_designation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Facebook Url <strong
                            class="text-danger">*</strong></label>
                        <div class="col-9">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-facebook"></i></span>
                                <input type="text" class="form-control @error('team_facebook') is-invalid @enderror" placeholder="facebook url"
                                name="team_facebook" value="{{ $data->team_facebook }}">
                                @error('team_facebook')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Twitter Url <strong
                            class="text-danger">*</strong></label>
                        <div class="col-9">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-twitter"></i></span>
                                <input type="text" class="form-control @error('team_twitter') is-invalid @enderror" placeholder="twitter url"
                                name="team_twitter" value="{{ $data->team_twitter }}">
                                @error('team_twitter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Linkedin Url <strong
                            class="text-danger">*</strong></label>
                        <div class="col-9">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-linkedin"></i></span>
                                <input type="text" class="form-control @error('team_linkedin') is-invalid @enderror" placeholder="Linkidin url"
                                name="team_linkedin" value="{{ $data->team_linkedin }}">
                                @error('team_linkedin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Instragram Url <strong
                            class="text-danger">*</strong></label>
                        <div class="col-9">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-instagram"></i></span>
                                <input type="text" class="form-control @error('team_instragram') is-invalid @enderror" placeholder="instragram url"
                                name="team_instragram" value="{{ $data->team_instragram }}">
                                @error('team_instragram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-3 col-form-label">Order By <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input type="number" value="{{ $data->team_order }}" class="form-control @error('team_order') is-invalid @enderror" id="team_order" name="team_order" placeholder="Team Member Order">
                            @error('team_order')
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
                            <textarea class="form-control @error('team_remarks') is-invalid @enderror" placeholder="Leave a remaks here" name="team_remarks" id="team_remarks" style="height: 100px" >{{ $data->team_remarks }}</textarea>
                            @error('team_remarks')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Image Upload</label>
                        <div class="col-6">
                            <input type="file" id="example-fileinput" name="team_image" class="form-control @error('team_image') is-invalid @enderror">
                            @error('team_image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-3 text-center">
                            @if ($data->team_image)
                            <img id="preview-image" src="{{ asset('uploads/teammember/'.$data->team_image) }}" alt="image" class="img-fluid avatar-sm rounded">
                            @else
                            <img id="preview-image" src="{{ asset('uploads/noimage.png') }}" alt="image" class="img-fluid avatar-sm rounded">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-dark row justify-content-md-center">
                    <div class="col col-lg-3">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                        <span>Update</span> </button>
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
