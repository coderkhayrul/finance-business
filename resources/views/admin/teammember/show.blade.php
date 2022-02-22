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
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-trademark-circle"></i> New Team Member Create</strong>
                    <a href="{{ route('team-member.index') }}" class="btn btn-dark btn-sm"><i class="uil-trademark-circle"></i> All Team Member</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Team Membar Name <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" value="{{ $data->team_name }}" class="form-control " id="team_name" name="team_name">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Designation <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="text" value="{{ $data->team_designation }}" class="form-control" id="team_designation" name="team_designation" placeholder="Enter Designation">

                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Facebook Url <strong
                            class="text-danger">*</strong></label>
                        <div class="col-9">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-facebook"></i></span>
                                <input disabled type="text" class="form-control" value="{{ $data->team_facebook }}">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Twitter Url <strong
                            class="text-danger">*</strong></label>
                        <div class="col-9">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-twitter"></i></span>
                                <input disabled type="text" class="form-control" placeholder="twitter url"
                                name="team_twitter" value="{{ $data->team_twitter }}">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Linkedin Url <strong
                            class="text-danger">*</strong></label>
                        <div class="col-9">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-linkedin"></i></span>
                                <input disabled type="text" class="form-control" placeholder="Linkidin url"
                                name="team_linkedin" value="{{ $data->team_linkedin }}">

                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="name" class="col-3 col-form-label">Instragram Url <strong
                            class="text-danger">*</strong></label>
                        <div class="col-9">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-instagram"></i></span>
                                <input disabled type="text" class="form-control" placeholder="instragram url"
                                name="team_instragram" value="{{ $data->team_instragram }}">

                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-3 col-form-label">Order By <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <input disabled type="number" value="{{ $data->team_order }}" class="form-control" id="team_order" name="team_order" placeholder="Team Member Order">

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="feedback" class="col-3 col-form-label">Remarks <strong
                                class="text-danger">*</strong></label>
                        <div class="col-9">
                            <textarea disabled class="form-control" placeholder="Leave a remaks here" name="team_remarks" id="team_remarks" style="height: 100px" > {{ $data->team_remarks }} </textarea>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="image" class="col-3 col-form-label">Image Upload</label>
                        <div class="col-9">
                        @if ($data->team_image)
                        <img src="{{ asset('uploads/teammember/'.$data->team_image) }}" alt="image"
                            class="img-fluid avatar-sm rounded">
                        @else
                        <img src="{{ asset('uploads/noimage.png') }}" alt="image" class="img-fluid avatar-sm rounded">
                        @endif
                    </div>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection
