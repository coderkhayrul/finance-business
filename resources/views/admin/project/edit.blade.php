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
                <h4 class="page-title">Project</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal" action="{{ route('project.update', $data->project_slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="project_id" value="{{ $data->project_id }}" />
                    <div class="card-header d-flex justify-content-between">
                        <strong class="fs-4"> <i class="uil-briefcase"></i> Update Project</strong>
                        <a href="{{ route('project.index') }}" class="btn btn-dark btn-sm"><i class="uil-briefcase"></i>
                            All Project</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3 mt-3">
                            <label for="name" class="col-3 col-form-label">Project Title <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <input type="text" value="{{ $data['project_title'] }}"
                                    class="form-control @error('project_title') is-invalid @enderror" id="project_title"
                                    name="project_title" placeholder="Project Title">
                                @error('project_title')
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
                                <input type="text" value="{{ $data['project_url'] }}"
                                    class="form-control @error('project_url') is-invalid @enderror" id="project_url"
                                    name="project_url" placeholder="www.example.com">
                                @error('project_url')
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
                                <input type="number" value="{{ $data['project_order'] }}"
                                    class="form-control @error('project_order') is-invalid @enderror" id="project_order"
                                    name="project_order" placeholder="Partner Order">
                                @error('project_order')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-3 col-form-label">Selete Project Category <strong
                                    class="text-danger">*</strong></label>
                            <div class="col-9">
                                <select class="form-select mb-3 @error('procate_id') is-invalid @enderror"
                                    name="procate_id">
                                    <option disabled selected>Select Your Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->procate_id }}"
                                            {{ $category->procate_id == $data->procate_id ? ' selected ' : '' }}>
                                            {{ $category->procate_name }}</option>
                                    @endforeach
                                </select>
                                @error('procate_id')
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
                                <textarea class="form-control @error('project_remarks') is-invalid @enderror"
                                    placeholder="Leave a feedback here" name="project_remarks" id="project_remarks"
                                    style="height: 100px">{{ $data['project_remarks'] }}</textarea>
                                @error('project_remarks')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-3 col-form-label">Image Upload</label>
                            <div class="col-6">
                                <input type="file" id="example-fileinput" name="project_image"
                                    class="form-control @error('project_image') is-invalid @enderror">
                                @error('project_image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-3 text-center">
                                @if ($data['project_image'])
                                    <img id="preview-image" src="{{ asset('uploads/project/' . $data->project_image) }}"
                                        alt="image" class="img-fluid rounded" width="80px" />
                                @else
                                    <img id="preview-image" src="{{ asset('uploads/noimage.png') }}" alt="image"
                                        class="img-fluid rounded" width="80px" />
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-dark row justify-content-md-center">
                        <div class="col col-lg-3">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="uil-sync me-1"></i>
                                <span>Project Update</span> </button>
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
