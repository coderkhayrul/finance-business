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
            <h4 class="page-title">Contact Message</h4>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-dark text-light">
                <strong class="fs-4"> <i class="uil-symbol"></i> Contact Message Information</strong>
                <a href="{{ route('contact-message.index') }}" class="btn btn-secondary btn-sm">All Contact Message</a>
            </div>
            <div class="card-body">
                <!-- Contact Message title-->
                <h5 class="text-primary">Subject:</h5>
                <h3 class="mt-0">
                    {{ $contactmessage->cm_subject }}
                </h3>
                @if ($contactmessage->cm_status === 1)
                    <div class="badge bg-success text-light mb-3">Active</div>
                @else
                    <div class="badge bg-danger text-light mb-3">Ongoing</div>
                @endif

                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-4">
                            <h5 class="text-primary">Full Name</h5>
                            <p>{{ $contactmessage->cm_name }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-4">
                            <h5 class="text-primary">Email</h5>
                            <p>{{ $contactmessage->cm_email }}</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-4">
                            <h5 class="text-primary">Phone</h5>
                            <p>{{ $contactmessage->cm_phone }}</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-4">
                            <h5 class="text-primary">Recived Date</h5>
                            <p>22 December 2018 <small class="text-muted">1:00 PM</small></p>
                        </div>
                    </div>
                </div>

                <h5 class="text-primary">Message Overview:</h5>

                <p class="text-muted mb-2">
                    {{ $contactmessage->cm_message }}
                </p>

            </div>
        </div>
    </div>
</div>
@endsection
