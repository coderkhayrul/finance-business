@include('admin.includes.header')
@include('admin.includes.sidebar')
<div class="content-page">
    <div class="content">
        <!-- Topbar Start -->
        @include('admin.includes.topbar')
        <!-- end Topbar -->
        <!-- Start Content-->
        <div class="container-fluid">
            @yield('admin-content')
        </div>
        <!-- container -->
    </div>
    <!-- content -->
    @include('admin.includes.footer')
