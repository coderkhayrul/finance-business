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
            <h4 class="page-title">Socail Media</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form class="form-horizontal" action="{{ route('admin.manage.socialmedia.update') }}" method="POST">
                @csrf
                <div class="card-header d-flex justify-content-between">
                    <strong class="fs-4"> <i class="uil-chat-bubble-user"></i> Social Media</strong>
                    <a href="{{ route('admin.manage.basic') }}" class="btn btn-dark btn-sm">Basic Information</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3 mt-3">
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-facebook"></i></span>
                                <input type="text" class="form-control @error('sm_facebook') is-invalid @enderror" placeholder="facebook url"
                                name="sm_facebook" value="{{ $socialmedia->sm_facebook }}">
                                @error('sm_facebook')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-twitter"></i></span>
                                <input type="text" class="form-control @error('sm_twitter') is-invalid @enderror" placeholder="twitter url"
                                name="sm_twitter" value="{{ $socialmedia->sm_twitter }}">
                                @error('sm_twitter')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class=" uil-linkedin-alt"></i></span>
                                <input type="text" class="form-control @error('sm_linkedin') is-invalid @enderror" placeholder="linkedin url"
                                name="sm_linkedin" value="{{ $socialmedia->sm_linkedin }}">
                                @error('sm_linkedin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-dribbble"></i></span>
                                <input type="text" class="form-control @error('sm_dribbble') is-invalid @enderror" placeholder="dribbble url"
                                name="sm_dribbble" value="{{ $socialmedia->sm_dribbble }}">
                                @error('sm_dribbble')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-youtube"></i></span>
                                <input type="text" class="form-control @error('sm_youtube') is-invalid @enderror" placeholder="youtube url"
                                name="sm_youtube" value="{{ $socialmedia->sm_youtube }}">
                                @error('sm_youtube')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-slack"></i></span>
                                <input type="text" class="form-control @error('sm_slack') is-invalid @enderror" placeholder="slack url"
                                name="sm_slack" value="{{ $socialmedia->sm_slack }}">
                                @error('sm_slack')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-instagram"></i></span>
                                <input type="text" class="form-control @error('sm_instagram') is-invalid @enderror" placeholder="instagram url"
                                name="sm_instagram" value="{{ $socialmedia->sm_instagram }}">
                                @error('sm_instagram')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-behance"></i></span>
                                <input type="text" class="form-control @error('sm_behance') is-invalid @enderror" placeholder="behance url"
                                name="sm_behance" value="{{ $socialmedia->sm_behance }}">
                                @error('sm_behance')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-google"></i></span>
                                <input type="text" class="form-control @error('sm_google') is-invalid @enderror" placeholder="google url"
                                name="sm_google" value="{{ $socialmedia->sm_google }}">
                                @error('sm_google')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="basic-addon1"><i class="uil-raddit-alien-alt"></i></span>
                                <input type="text" class="form-control @error('sm_raddit') is-invalid @enderror" placeholder="raddit url"
                                name="sm_raddit" value="{{ $socialmedia->sm_raddit }}">
                                @error('sm_raddit')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-dark row justify-content-md-center">
                    <div class="col col-lg-2">
                        <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                        <span>Update</span> </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
