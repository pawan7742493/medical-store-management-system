  <nav class="navbar admin-navbar navbar-expand bg-white flex-wrap">
    <div class="container-fluid px-3 px-lg-4 d-flex flex-wrap">
            <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <form class="d-none d-md-flex ms-3 flex-grow-1"  action="{{route('search')}}" method="GET" >
            <input class="form-control search-input" name="search" value="{{@$search ?? ''}}" type="search" placeholder="Search Medicines Categories..." aria-label="Search">
            <button class="btn btn-sm btn-primary" style="margin: 5px;" type="submit">Search</button>
          </form>

            <div class="navbar-actions ms-auto d-flex align-items-center gap-2">            
              <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme" title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>
            <div class="dropdown">
              <button class="icon-button" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notifications">
                <span class="notification-dot"></span>
                <i class="bi bi-bell" aria-hidden="true"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end notification-menu">
                <div class="dropdown-header fw-bold text-body">Notifications</div>
                <a class="dropdown-item" href="users.html">
                  <span class="notification-title">New user registered</span>
                  <span class="notification-time">4 minutes ago</span>
                </a>
                <a class="dropdown-item" href="charts.html">
                  <span class="notification-title">Revenue target reached</span>
                  <span class="notification-time">32 minutes ago</span>
                </a>
                <a class="dropdown-item" href="settings.html">
                  <span class="notification-title">Security review completed</span>
                  <span class="notification-time">1 hour ago</span>
                </a>
              </div>
            </div>

            <div class="dropdown">
<button class="profile-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">

    <span class="mobile-profile-icon" aria-hidden="true">
        <i class="bi bi-person-circle"></i>
    </span>

    <span class="d-none d-md-inline">
        Welcome, {{ Auth::user()->name }}
    </span>

</button>
              <ul class="dropdown-menu dropdown-menu-end">
                <!-- <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li> -->
<li>
    <a
        class="dropdown-item"
        href="{{ route('admin.account.settings') }}"
    >
        Account settings
    </a>
</li>                <li><hr class="dropdown-divider"></li>

                <!-- <li><a class="dropdown-item" href="login.html">Sign out</a></li> -->
                 <li>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
            
                    <button type="submit" class="dropdown-item">
                        Log Out
                    </button>
                </form>
                 
                 </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>