
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
            <div class="card-header d-flex justify-content-between bg-light text-dark">
                <strong class="fs-4"> <i class="uil-symbol"></i> All Partner Information</strong>
                <a href="{{ route('partner.create') }}" class="btn btn-secondary btn-sm"><i class="uil-plus-square"></i> Create Partner</a>
            </div>
            <div class="card-body">
                
            </div>
            <div class="card-footer bg-dark">
                <a href="#" class="btn btn-success">PRINT</a>
                <a href="#" class="btn btn-danger">PDF</a>
                <a href="#" class="btn btn-secondary">EXCEL</a>
                <a href="#" class="btn btn-warning">CGV</a>
            </div>
        </div>
    </div>
</div>
@endsection

