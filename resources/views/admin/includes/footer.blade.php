<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Dashboard
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-md-block">
                    <a href="javascript: void(0);">About</a>
                    <a href="javascript: void(0);">Support</a>
                    <a href="javascript: void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

{{-- Preloader Start --}}
<script>
    $(document).ready(function() {
        //Preloader
        preloaderFadeOutTime = 1000;

        function hidePreloader() {
            var preloader = $('#preloader');
            preloader.fadeOut(preloaderFadeOutTime);
        }
        hidePreloader();
    });
</script>
{{-- Preloader End --}}

{{-- NOTIFICATION START --}}
<script>
    @if (Session::has('success'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.success("{{ session('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.error("{{ session('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.info("{{ session('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.warning("{{ session('warning') }}");
    @endif
    @if (Session::has('updatepassword'))
        toastr.options =
        {
        "closeButton" : true,
        "progressBar" : true
        }
        toastr.warning("{{ session('updatepassword') }}");
    @endif
</script>

{{-- NOTIFICATION END --}}

<script src="{{ asset('admin') }}/assets/js/custom.js"></script>
<script src="{{ asset('admin') }}/assets/js/vendor.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/app.min.js"></script>
@yield('admin-custrom-js')

<!-- Datatables js -->
<script src="{{ asset('admin') }}/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="{{ asset('admin') }}/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/vendor/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('admin') }}/assets/js/pages/demo.datatable-init.js"></script>
<!-- Delete Model Notification -->
@include('admin.includes.delete_alert')
</body>

</html>
