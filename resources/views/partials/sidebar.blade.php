<aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header">
        <a class="brand-mark" href="{{route('dashboard')}}" aria-label="adminHMD dashboard">
        <img class="avatar-img avatar-sm sidebar-user-avatar" src="{{ url('/assets/images/avatar/avatar.jpg') }}" alt="Admin Hasan">
          <span class="brand-copy">
            <span class="brand-title">Lakhadatar-Pharma</span>
            <span class="brand-subtitle">Admin</span>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
        <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }} " href="{{route('categories.index')}}">
          <span class="nav-icon"><i class="bi bi-tags" aria-hidden="true"></i></span>
          <span class="nav-text">Categories</span>
        </a>
        <a class="nav-link {{ request()->routeIs('medicines.*') ? 'active' : '' }}" href="{{route('medicines.index')}}">
          <span class="nav-icon"><i class="bi bi-capsule" aria-hidden="true"></i></span>
          <span class="nav-text">Medicines</span>
        </a>
        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"   href="{{ route('products.index') }}">
          <span class="nav-icon"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
          <span class="nav-text">Products</span>
        </a>
        <a class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Customers</span>
        </a>
        <a class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}"   href="{{ route('admin.orders.index') }}">
          <span class="nav-icon"><i class="bi bi-cart-check" aria-hidden="true"></i></span>
          <span class="nav-text">Orders</span>
        </a>
        <a class="nav-link {{ request()->routeIs('invoices.*') ? 'active' : '' }}" href="{{ route('admin.invoices.index') }}">
          <span class="nav-icon"><i class="bi bi-receipt" aria-hidden="true"></i></span>
          <span class="nav-text">Invoices</span>
        </a>
        <a class="nav-link "   href="#">
          <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
          <span class="nav-text">Settings</span>
        </a>
<form method="POST" action="{{ route('logout') }}" class="m-0">

    @csrf

    <button
        type="submit"
        class="nav-link border-0 bg-transparent w-100 text-start"
    >

        <span class="nav-icon">
            <i
                class="bi bi-box-arrow-right"
                aria-hidden="true"
            ></i>
        </span>

        <span>
            Log Out
        </span>

    </button>

</form>
        <!-- <a class="nav-link" href="modals.html">
          <span class="nav-icon"><i class="bi bi-window-stack" aria-hidden="true"></i></span>
          <span class="nav-text">Modals</span>
        </a>
        <a class="nav-link" href="settings.html">
          <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
          <span class="nav-text">Settings</span>
        </a>
        <a class="nav-link" href="blank.html">
          <span class="nav-icon"><i class="bi bi-file-earmark" aria-hidden="true"></i></span>
          <span class="nav-text">Blank Page</span>
        </a> -->
      </nav>

      <div class="sidebar-user">
        <span class="sales-label">Total Sales</span>

        <h1>
            ₹{{ number_format($totalSales, 2) }}
        </h1>
 
      </div>



      <div class="sidebar-footer">
        <span class="status-dot"></span>
        <span class="sidebar-footer-text">System running smoothly</span>
      </div>
    </aside>
