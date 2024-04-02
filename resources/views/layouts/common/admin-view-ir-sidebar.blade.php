<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-center">
            <a href="{{ env('APP_URL') }}/admin/dashboard" class="text-nowrap logo-img">
                <h4>LittleLife</h4>
                {{-- <img src="{{ asset('import/assets/images/logos/cms-logo.png') }}" width="200" alt="" /> --}}
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>

                {{-- DASHBOARD --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/dashboard" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                {{-- POSTING --}}
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">POSTING</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/activities" aria-expanded="false">
                        <span>
                            <i class="ti ti-bowl"></i>
                        </span>
                        <span class="hide-menu">Activities</span>
                    </a>
                </li>
                
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/calendar" aria-expanded="false">
                        <span>
                            <i class="ti ti-calendar"></i>
                        </span>
                        <span class="hide-menu">Calendar</span>
                    </a>
                </li>

                {{-- RECORDS --}}
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">RECORDS</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/individual_records" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Individual Records</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/complementary_feeding" aria-expanded="false">
                        <span>
                            <i class="ti fa-user-circle"></i>
                        </span>
                        <span class="hide-menu">Complementary Feeding</span>
                    </a>
                </li>

                <!-- {{-- USER MANAGEMENT --}}
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">USER MANAGEMENT</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/users" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">User Accounts</span>
                    </a>
                </li> -->
                <!-- <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/roles" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-check"></i>
                        </span>
                        <span class="hide-menu">Roles</span>
                    </a>
                </li> -->


                {{-- REPORTS --}}
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">REPORTS</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/graph_reports" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-chart-pie"></i>
                        </span>
                        <span class="hide-menu">Graph Reports</span>
                    </a>
                </li> 
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/reports_overview" aria-expanded="false">
                        <span>
                            <i class="fa-solid fa-signal"></i>
                        </span>
                        <span class="hide-menu">Reports Overview</span>
                    </a>
                </li> 


                {{-- EXTRAS --}}
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">EXTRAS</span>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/slideshow_contents" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-plus"></i>
                        </span>
                        <span class="hide-menu">Slideshow Contents</span>
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/faqs" aria-expanded="false">
                        <span>
                            <i class="ti ti-archive"></i>
                        </span>
                        <span class="hide-menu">FAQs</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ env('APP_URL') }}/admin/categories" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-grid"></i>
                        </span>
                        <span class="hide-menu">Categories / Legends</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
