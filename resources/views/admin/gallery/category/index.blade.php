
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
            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-scenery"></i> All Category Information</strong>
                <a href="{{ route('gallery-category.create') }}" class="btn btn-secondary btn-sm">Create Category</a>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Order By</th>
                            <th>Creator</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery_categories as $gallery_category)
                            <tr>
                                <td>{{ $gallery_category->galcate_name }}</td>
                                <td>{{ $gallery_category->galcate_order }}</td>
                                <td>{{ $gallery_category->user->name }}</td>
                                <td>
                                    @if ($gallery_category->galcate_status === 1)
                                    <span class="badge badge-success-lighten">Active</span>
                                    @else
                                    <span class="badge badge-danger-lighten">Blocked</span>
                                    @endif
                                </td>
                                <td class="table-action">
                                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</button>
                                    <div class="dropdown-menu">
                                    <a href="{{ route('gallery-category.show',$gallery_category->galcate_id) }}" class="dropdown-item"> <i class="mdi mdi-eye"></i> Show</a>
                                    <a href="{{ route('gallery-category.edit',$gallery_category->galcate_id) }}" class="dropdown-item"> <i class="mdi mdi-pencil"></i> Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-value="{{ $gallery_category->galcate_id }}" data-bs-target="#deleteModal" class=" text-danger delete-modal dropdown-item"> <i class="mdi mdi-delete"></i> Delete</a>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Are you sure?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                        </div> <!-- end modal header -->
                                        <div class="modal-body">
                                            Do you really want to delete these records? This process cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('partner.destroy',$gallery_category->galcate_id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger" name="delete_data">Yes, delete it</button>
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
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
@endsection

@section('admin-custrom-css')
<!-- Datatables css -->
<link href="{{ asset('admin') }}/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin') }}/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
@endsection

@section('admin-custrom-js')
<!-- Datatables js -->
<script src="{{ asset('admin') }}/assets/js/vendor/jquery.dataTables.min.js"></>
<script src="{{ asset('admin') }}/assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="{{ asset('admin') }}/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/vendor/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="{{ asset('admin') }}/assets/js/pages/demo.datatable-init.js"></script>

{{-- Delete Alert --}}
@include('admin.includes.delete_alert')
@endsection
