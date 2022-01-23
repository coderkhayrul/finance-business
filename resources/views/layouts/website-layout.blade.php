@include('website.includes.header')
@include('website.includes.loader')
@include('website.includes.topbar')
@include('website.includes.navbar')

@if (url()->current() == route('website.home'))
    @include('website.includes.banner')
@endif

@if (url()->current() == route('website.home'))
    <div class="request-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Request a call back right now ?</h4>
                    <span>Mauris ut dapibus velit cras interdum nisl ac urna tempor mollis.</span>
                </div>
                <div class="col-md-4">
                    <a href="#" class="border-button">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- MAIN CONTENT --}}
@yield('website-content')
{{-- MAIN CONTENT END --}}
@if (url()->current() == route('website.about'))

@else
@include('website.includes.brand')
@endif

@include('website.includes.footer')
