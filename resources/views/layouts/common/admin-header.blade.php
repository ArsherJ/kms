<!--  Header Start -->
<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link nav-icon-hover" href="javascript:void(0)">
            <i class="ti ti-bell-ringing"></i>
            <div class="notification bg-primary rounded-circle"></div>
          </a>
        </li> --}}
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav" style="display:flex; height:auto">
        <ul class="align-items-center" style="margin-right: auto;">
            <div style="display: flex; align-items: center; padding: 10px;">
                <img src="{{ asset('landing_page_assets/images/cms-logo-header.png') }}" style="width: 50px; margin-right: 10px;">
                <p style="margin: 0; padding: 5px; color: black; border-radius: 5px; font-size: 1em; @media (max-width: 768px) { font-size: 0.8em; }">PAMPLONA TRES, LAS PINAS CITY</p>
            </div>
        </ul>
        <ul style="padding-right:10px">
          <li class="nav-item dropdown"> 
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
              aria-expanded="false">
              <img src="{{ asset('import/assets/images/profile/user-admin.png') }}" alt="" width="35" height="35" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <a href="{{ env('APP_URL') }}/admin/settings" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-user fs-6"></i>
                  <p class="mb-0 fs-3">Settings</p>
                </a>
                </a>
                <a href="{{ env('APP_URL') . '/logout' }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!--  Header End -->
