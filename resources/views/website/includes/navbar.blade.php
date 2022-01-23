<header class="">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('website.home') }}">
                <h2>Finance Business</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{  request()->routeIs('website.home') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('website.home') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{  request()->routeIs('website.about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('website.about') }}">About Us</a>
                    </li>
                    <li class="nav-item {{  request()->routeIs('website.service') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('website.service') }}">Our Services</a>
                    </li>
                    <li class="nav-item {{  request()->routeIs('website.contactus') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('website.contactus') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
