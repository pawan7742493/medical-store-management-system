<header class="navbar">
    <div class="container navbar-inner">

    <!-- Logo -->
    <a href="{{ url('/home') }}"
       class="logo"
       aria-label="Lakhadatar Pharma Home">

        <span class="navbar-logo-wrap">
            <img
                src="{{ asset('frontend/images/3.png') }}"
                alt="Lakhadatar Pharma"
                class="navbar-logo"
            >
        </span>

        <span class="logo-text">
            Lakhadatar Pharma
        </span>

    </a>


    <!-- Mobile Center Branding -->
    <div class="mobile-brand-text">
        <span>श्री श्याम</span>
    </div>


    <!-- Navigation + Actions -->
    



        <!-- Desktop Navigation -->
        <nav class="nav-links" aria-label="Main navigation">

            <a href="{{ url('/home') }}"
               class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ url('/frontend/medicines') }}"
               class="nav-link {{ request()->is('frontend/medicines*') ? 'active' : '' }}">
                Medicines
            </a>

            <a href="{{ url('/frontend/products') }}"
               class="nav-link {{ request()->is('frontend/products*') ? 'active' : '' }}">
                Products
            </a>

            <a href="{{ url('/frontend/about') }}"
               class="nav-link {{ request()->is('frontend/about') ? 'active' : '' }}">
                About
            </a>

            <a href="{{ url('/frontend/business') }}"
               class="nav-link {{ request()->is('frontend/business') ? 'active' : '' }}">
                For Businesses
            </a>

            <a href="{{ url('/frontend/contact') }}"
               class="nav-link {{ request()->is('frontend/contact') ? 'active' : '' }}">
                Contact
            </a>

        </nav>


        <!-- Actions -->
        <div class="nav-actions">

            <button class="search-btn"
                    aria-label="Search">

                <svg width="20"
                     height="20"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     viewBox="0 0 24 24">

                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.35-4.35"/>

                </svg>

            </button>


            <a href="{{ url('frontend/cart') }}"
               class="cart-btn"
               aria-label="Cart">

                <svg width="20"
                     height="20"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     viewBox="0 0 24 24">

                    <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/>
                    <path d="M3 6h18"/>
                    <path d="M16 10a4 4 0 0 1-8 0"/>

                </svg>

                <span class="cart-badge" style="display:none">0</span>

            </a>


            <!-- Auth Buttons -->
            <div class="auth-buttons">

                <a href="{{ route('login') }}"
                   class="btn btn-sm btn-outline">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="btn btn-sm btn-primary">
                    Register
                </a>

            </div>


            <!-- Mobile Menu Button -->
            <button class="menu-btn"
                    aria-label="Open menu">

                <svg width="22"
                     height="22"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2"
                     viewBox="0 0 24 24">

                    <path d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </button>

        </div>

    </div>
</header>


<!-- Mobile Menu -->

<div class="mobile-menu"
     role="dialog"
     aria-label="Mobile menu">

    <div class="mobile-menu-panel">

        <div class="mobile-menu-header">

            <a href="{{ url('/home') }}"
               class="logo">

                <img
                    src="{{ asset('frontend/images/3.png') }}"
                    alt="Lakhadatar Pharma"
                    class="navbar-logo"
                >

                <span class="mobile-logo-text">
                    Lakhadatar
                </span>

            </a>

            <button class="close-menu btn btn-ghost"
                    aria-label="Close menu">
                ✕
            </button>

        </div>


        <div class="mobile-nav-links">

            <a href="{{ url('/home') }}"
               class="mobile-nav-link {{ request()->is('home') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ url('/frontend/medicines') }}"
               class="mobile-nav-link {{ request()->is('frontend/medicines*') ? 'active' : '' }}">
                Medicines
            </a>

            <a href="{{ url('/frontend/products') }}"
               class="mobile-nav-link {{ request()->is('frontend/products*') ? 'active' : '' }}">
                Products
            </a>

            <a href="{{ url('/frontend/about') }}"
               class="mobile-nav-link {{ request()->is('frontend/about') ? 'active' : '' }}">
                About
            </a>

            <a href="{{ url('/frontend/business') }}"
               class="mobile-nav-link {{ request()->is('frontend/business') ? 'active' : '' }}">
                For Businesses
            </a>

            <a href="{{ url('/frontend/contact') }}"
               class="mobile-nav-link {{ request()->is('frontend/contact') ? 'active' : '' }}">
                Contact
            </a>

        </div>


        <div class="mobile-auth">

            <a href="{{ route('login') }}"
               class="btn btn-outline">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="btn btn-primary">
                Register
            </a>

        </div>


        <div class="mobile-whatsapp">

            <a href="https://wa.me/8769426133"
               class="btn btn-whatsapp w-full"
               target="_blank"
               rel="noopener">

                WhatsApp Us

            </a>

        </div>

    </div>

</div>


<!-- Search Overlay -->

<div class="search-overlay"
     role="dialog"
     aria-label="Search">

    <div class="search-box">

        <form class="search-form search-input-wrap">

            <svg width="20"
                 height="20"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 viewBox="0 0 24 24">

                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.35-4.35"/>

            </svg>

            <input type="search"
                   placeholder="Search medicines or products..."
                   aria-label="Search medicines or products..."
                   autocomplete="off">

            <button type="button"
                    class="close-search btn btn-ghost btn-sm"
                    aria-label="Close search">
                ✕
            </button>

        </form>

        <div style="padding:1rem;font-size:0.875rem;color:var(--text-muted)">
            Popular: Paracetamol, Vitamin C, Thermometer, First Aid
        </div>

    </div>

</div>