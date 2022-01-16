<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('admin') }}/assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('admin') }}/assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('admin') }}/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('admin') }}/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                    aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Ecommerce </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">Products</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products-details.html">Products Details</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-orders.html">Orders</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebaruUser" aria-expanded="false" aria-controls="sidebaruUser"
                    class="side-nav-link">
                    <i class=" uil-chat-bubble-user"></i>
                    <span> User </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebaruUser">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="#">All User</a>
                        </li>
                        <li>
                            <a href="#">User Create</a>
                        </li>
                        <li>
                            <a href="#">User Role</a>
                        </li>
                        <li>
                            <a href="#">User Parmition</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
