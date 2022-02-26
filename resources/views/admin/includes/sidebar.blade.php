<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{ url('dashboard') }}" class="logo text-center logo-light">
        <span class="logo-lg">
            <h3><strong>FINANCE</strong></h3>
        </span>
        <span class="logo-sm">
            <h3><strong>FINANCE</strong></h3>
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav nav-font">

            <li class="side-nav-title side-nav-item">Navigation</li>
            <li class="side-nav-item">
                <a href="{{ url('/dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> DASHBOARD </span>
                </a>
            </li>


            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebaruUser" aria-expanded="false" aria-controls="sidebaruUser"
                    class="side-nav-link">
                    <i class="dripicons-user-group"></i>
                    <span> USERS </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebaruUser">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('user.index') }}">ALL USER</a>
                        </li>
                        <li>
                            <a href="{{ route('user.create') }}">ADD USER</a>
                        </li>
                        <li>
                            <a href="{{ route('role.index') }} ">ROLES</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('banner.index') }}" class="side-nav-link">
                    <i class="uil-meeting-board"></i>
                    <span> BANNERS </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('partner.index') }}" class="side-nav-link">
                    <i class="uil-symbol"></i>
                    <span> PARTNERS </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('testimonial.index') }}" class="side-nav-link">
                    <i class="uil-bag"></i>
                    <span> TESTIMONAIL </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('service.index') }}" class="side-nav-link">
                    <i class="uil-yellow"></i>
                    <span> SERVICES </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('team-member.index') }}" class="side-nav-link">
                    <i class="uil-trademark-circle"></i>
                    <span> TEAM MEMBER </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('client.index') }}" class="side-nav-link">
                    <i class="uil-book-reader"></i>
                    <span> CLIENT </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProject" aria-expanded="false" aria-controls="sidebaruUser"
                    class="side-nav-link">
                    <i class="uil-briefcase"></i>
                    <span> PROJECT </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProject">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('project.index') }}">ALL PROJECT</a>
                        </li>
                        <li>
                            <a href="{{ route('project.create') }}">ADD PROJECT</a>
                        </li>
                        <li>
                            <a href="{{ route('project-category.index') }}">PROJECT CATEGORIES</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarGallery" aria-expanded="false" aria-controls="sidebaruUser"
                    class="side-nav-link">
                    <i class="uil-images"></i>
                    <span> GALLERY </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarGallery">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('gallery.index') }}">ALL GALLERY</a>
                        </li>
                        <li>
                            <a href="{{ route('gallery.create') }}">ADD GALLERY</a>
                        </li>
                        <li>
                            <a href="{{ route('gallery-category.index') }}">GALLERY CATEGORIES</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="{{ route('contact-message.index') }}" class="side-nav-link">
                    <i class="uil-comments-alt"></i>
                    <span> CONTACT MESSAGE </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('newsletter.index') }}" class="side-nav-link">
                    <i class="uil-envelope-share"></i>
                    <span> NEWSLETTER </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarManager" aria-expanded="false" aria-controls="sidebarManager"
                    class="side-nav-link">
                    <i class=" uil-cog"></i>
                    <span> MANAGE </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarManager">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.manage.basic') }}">BASIC INFORMATION</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.manage.contactinfo') }}">CONTACT INFORMATION</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.manage.socialmedia') }} ">SOCIAL MEDIA</a>
                        </li>
                        <li>
                            <a href="#">CONTENT</a>
                        </li>
                        <li>
                            <a href="{{ route('page.index') }}">PAGES</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('logout') }}" class="side-nav-link"
                    onclick="event.preventDefault('logout-form'); getElementById('logout-form').submit();">
                    <i class="uil-chat-bubble-user"></i>
                    <span> LOGOUT </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            <hr>
            <li class="side-nav-item">
                <a target="_blank" href="{{ url('/') }}" class="side-nav-link">
                    <i class="uil-volleyball"></i>
                    <span> LIVE WEBSITE </span>
                </a>
            </li>
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
