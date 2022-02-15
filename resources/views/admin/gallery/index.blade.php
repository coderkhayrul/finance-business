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
            <div class="card-header d-flex justify-content-between">
                <strong class="fs-4"> <i class="uil-images"></i> All Gallery Information</strong>
                <a href="{{ route('gallery.create') }}" class="btn btn-dark btn-sm"><i class="dripicons-plus"></i> Create Gallery</a>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Order By</th>
                            <th>Creator</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallerys as $gallery)
                        <tr>
                            <td>
                                @if ($gallery->gallery_image)
                                <img src="{{ asset('uploads/gallery/'.$gallery->gallery_image) }}" alt="image"
                                    class="img-fluid avatar-sm rounded">
                                @else
                                <img src="{{ asset('uploads/no image.png') }}" alt="image"
                                    class="img-fluid avatar-sm rounded">
                                @endif
                            </td>
                            <td>{{ $gallery->gallery_title }}</td>
                            <td>{{ $gallery->gallery_order }}</td>
                            <td>{{ $gallery->user->name }}</td>
                            <td>
                                @if ($gallery->gallery_status == 1)
                                <span class="badge badge-success-lighten">Active</span>
                                @else
                                <span class="badge badge-danger-lighten">Blocked</span>
                                @endif
                            </td>
                            <td class="table-action">
                                <button type="button" class="btn btn-primary dropdown-toggle btn-sm"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('gallery.show',$gallery->gallery_slug) }}" class="dropdown-item"> <i
                                            class="mdi mdi-eye"></i> Show</a>
                                    <a href="{{ route('gallery.edit',$gallery->gallery_slug) }}" class="dropdown-item"> <i
                                            class="mdi mdi-pencil"></i> Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-value="{{ $gallery->gallery_id }}"
                                        data-bs-target="#deleteModal" class=" text-danger delete-modal dropdown-item">
                                        <i class="mdi mdi-delete"></i> Delete</a>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Are you sure?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                    </div> <!-- end modal header -->
                                    <div class="modal-body">
                                        Do you really want to delete these records? This process cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('gallery.destroy',$gallery->gallery_slug) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" name="delete_data">Yes, delete
                                                it</button>
                                        </form>
                                    </div> <!-- end modal footer -->
                                </div> <!-- end modal content-->
                            </div> <!-- end modal dialog-->
                        </div>
                        <!-- end modal-->
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-dark">
                <a href="#" class="btn btn-success btn-sm">PRINT</a>
                <a href="#" class="btn btn-danger btn-sm">PDF</a>
                <a href="#" class="btn btn-secondary btn-sm">EXCEL</a>
                <a href="#" class="btn btn-warning btn-sm">CGV</a>
            </div>
        </div>
    </div>
</div>
@endsection
