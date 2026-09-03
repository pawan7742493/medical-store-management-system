@extends('layouts.frontend')

@section('title', 'Lakhadatar Pharma | Medicines & Healthcare Products')

@section('content')

  <main>
    <!-- HERO -->
    <section class="hero">

    <div class="container hero-grid">

        <!-- LEFT CONTENT -->
        <div class="hero-content">

            <div class="hero-brand-marquee">
                <div class="hero-brand-track">
                    <span>Lakhadatar Pharma</span>
                    <span>Lakhadatar Pharma</span>
                    <span>Lakhadatar Pharma</span>
                </div>
            </div>

            <h3>
                Medicines & Healthcare Products
                <br>
                Delivered to Your Door
            </h3>

            <p>
                Genuine medicines and healthcare products with reliable
                local supply and convenient ordering. Shop without
                creating an account.
            </p>

            <div class="hero-ctas">

                <a href="{{ url('/frontend/contact') }}"
                   class="btn btn-primary btn-lg">
                    Contact Us
                </a>

                <a href="https://wa.me/918769426133"
                   class="btn btn-whatsapp btn-lg"
                   target="_blank"
                   rel="noopener">
                    WhatsApp Us
                </a>

            </div>

        </div>


        <!-- RIGHT IMAGE -->
        <div class="hero-visual">

            <div class="hero-illustration">

                <img
                    src="{{ asset('frontend/images/3.png') }}"
                    alt="Lakhadatar Pharma"
                    class="hero-image"
                >

            </div>

        </div>

    </div>

</section>

   <!-- QUICK CATEGORIES -->
<section class="section categories-section">

    <div class="container">

        <div class="categories-heading">
            <div>
                <h2 class="section-title">Shop by Category</h2>
                <p class="section-subtitle">
                    Find medicines and healthcare products by category
                </p>
            </div>

            <a href="{{ url('/frontend/medicines') }}"
               class="btn btn-outline btn-sm">
                View All
            </a>
        </div>


        <div class="category-grid">

            <!-- Category -->
            <a href="{{ url('/frontend/medicines?cat=antibiotics') }}"
               class="category-card-new">

                <div class="category-card-icon">
                    🦠
                </div>

                <div class="category-card-content">

                    <h3>Antibiotics</h3>

                    <p>
                        Medicines for bacterial infections
                    </p>

                </div>

                <span class="category-arrow">
                    →
                </span>

            </a>


            <a href="{{ url('/frontend/medicines?cat=pain-relief') }}"
               class="category-card-new">

                <div class="category-card-icon">
                    💊
                </div>

                <div class="category-card-content">

                    <h3>Pain Relief</h3>

                    <p>
                        Pain and fever relief medicines
                    </p>

                </div>

                <span class="category-arrow">
                    →
                </span>

            </a>


            <a href="{{ url('/frontend/medicines?cat=vitamins') }}"
               class="category-card-new">

                <div class="category-card-icon">
                    🍊
                </div>

                <div class="category-card-content">

                    <h3>Vitamins</h3>

                    <p>
                        Vitamins and nutritional support
                    </p>

                </div>

                <span class="category-arrow">
                    →
                </span>

            </a>


            <a href="{{ url('/frontend/medicines?cat=digestive') }}"
               class="category-card-new">

                <div class="category-card-icon">
                    🫁
                </div>

                <div class="category-card-content">

                    <h3>Digestive Care</h3>

                    <p>
                        Digestive health medicines
                    </p>

                </div>

                <span class="category-arrow">
                    →
                </span>

            </a>


            <a href="{{ url('/frontend/medicines?cat=first-aid') }}"
               class="category-card-new">

                <div class="category-card-icon">
                    🩹
                </div>

                <div class="category-card-content">

                    <h3>First Aid</h3>

                    <p>
                        Essential first aid products
                    </p>

                </div>

                <span class="category-arrow">
                    →
                </span>

            </a>


            <a href="{{ url('/frontend/products?cat=personal-care') }}"
               class="category-card-new">

                <div class="category-card-icon">
                    🧴
                </div>

                <div class="category-card-content">

                    <h3>Personal Care</h3>

                    <p>
                        Everyday personal care essentials
                    </p>

                </div>

                <span class="category-arrow">
                    →
                </span>

            </a>


            <a href="{{ url('/frontend/products') }}"
               class="category-card-new">

                <div class="category-card-icon">
                    🩺
                </div>

                <div class="category-card-content">

                    <h3>Healthcare Products</h3>

                    <p>
                        Medical and healthcare essentials
                    </p>

                </div>

                <span class="category-arrow">
                    →
                </span>

            </a>


            <a href="{{ url('/frontend/medicines') }}"
               class="category-card-new">

                <div class="category-card-icon">
                    📋
                </div>

                <div class="category-card-content">

                    <h3>All Medicines</h3>

                    <p>
                        Browse our complete medicine range
                    </p>

                </div>

                <span class="category-arrow">
                    →
                </span>

            </a>

        </div>

    </div>

</section>


<!-- FEATURED MEDICINES -->
<section class="section featured-medicines-section">

    <div class="container">

        <div class="featured-header">

            <div>
                <span class="section-eyebrow">
                    Trusted Medicines
                </span>

                <h2 class="section-title">
                    Featured Medicines
                </h2>

                <p class="section-subtitle">
                    Genuine medicines from trusted brands
                </p>
            </div>

            <a href="{{ url('frontend/medicines') }}"
               class="btn btn-outline btn-sm">
                View All Medicines
                <span class="btn-arrow">→</span>
            </a>

        </div>


        <div class="featured-medicine-grid"
             id="featured-medicines">


            <!-- Medicine 1 -->
            <article class="featured-medicine-card">

                <div class="medicine-card-top">

                    <div class="medicine-icon">
                        💊
                    </div>

                    <span class="medicine-status status-in-stock">
                        In Stock
                    </span>

                </div>

                <div class="medicine-card-content">

                    <h3>
                        Paracetamol 500mg
                    </h3>

                    <p class="medicine-company">
                        XYZ Pharma
                    </p>

                    <div class="medicine-card-bottom">

                        <span class="medicine-price">
                            ₹25
                        </span>

                        <button
                            class="medicine-add-btn"
                            data-add-to-cart
                            data-id="m1"
                            data-name="Paracetamol 500mg"
                            data-brand="XYZ Pharma"
                            data-price="25">

                            <span>+</span>
                            Add

                        </button>

                    </div>

                </div>

            </article>


            <!-- Medicine 2 -->
            <article class="featured-medicine-card">

                <div class="medicine-card-top">

                    <div class="medicine-icon">
                        💊
                    </div>

                    <span class="medicine-status status-rx">
                        Rx Required
                    </span>

                </div>

                <div class="medicine-card-content">

                    <h3>
                        Amoxicillin 250mg
                    </h3>

                    <p class="medicine-company">
                        MediCare Labs
                    </p>

                    <div class="medicine-card-bottom">

                        <span class="medicine-price">
                            ₹85
                        </span>

                        <button
                            class="medicine-add-btn"
                            data-add-to-cart
                            data-id="m2"
                            data-name="Amoxicillin 250mg"
                            data-brand="MediCare Labs"
                            data-price="85">

                            <span>+</span>
                            Add

                        </button>

                    </div>

                </div>

            </article>


            <!-- Medicine 3 -->
            <article class="featured-medicine-card">

                <div class="medicine-card-top">

                    <div class="medicine-icon">
                        🍊
                    </div>

                    <span class="medicine-status status-in-stock">
                        In Stock
                    </span>

                </div>

                <div class="medicine-card-content">

                    <h3>
                        Vitamin C 1000mg
                    </h3>

                    <p class="medicine-company">
                        HealthPlus
                    </p>

                    <div class="medicine-card-bottom">

                        <span class="medicine-price">
                            ₹120
                        </span>

                        <button
                            class="medicine-add-btn"
                            data-add-to-cart
                            data-id="m3"
                            data-name="Vitamin C 1000mg"
                            data-brand="HealthPlus"
                            data-price="120">

                            <span>+</span>
                            Add

                        </button>

                    </div>

                </div>

            </article>


            <!-- Medicine 4 -->
            <article class="featured-medicine-card">

                <div class="medicine-card-top">

                    <div class="medicine-icon">
                        💊
                    </div>

                    <span class="medicine-status status-rx">
                        Rx Required
                    </span>

                </div>

                <div class="medicine-card-content">

                    <h3>
                        Omeprazole 20mg
                    </h3>

                    <p class="medicine-company">
                        GastroCare
                    </p>

                    <div class="medicine-card-bottom">

                        <span class="medicine-price">
                            ₹65
                        </span>

                        <button
                            class="medicine-add-btn"
                            data-add-to-cart
                            data-id="m4"
                            data-name="Omeprazole 20mg"
                            data-brand="GastroCare"
                            data-price="65">

                            <span>+</span>
                            Add

                        </button>

                    </div>

                </div>

            </article>

        </div>

    </div>

</section>




   <!-- HEALTHCARE PRODUCTS -->
<section class="section healthcare-products-section">

    <div class="container">

        <div class="products-topbar">

            <div class="products-heading">
                <span class="section-eyebrow">Healthcare Essentials</span>

                <h2 class="section-title">
                    Healthcare Products
                </h2>

                <p class="section-subtitle">
                    Quality healthcare products for everyday needs
                </p>
            </div>

            <div class="products-actions">

                <!-- <div class="product-search">
                    <svg width="18"
                         height="18"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2"
                         viewBox="0 0 24 24">

                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>

                    </svg>

                    <input
                        type="search"
                        id="home-product-search"
                        placeholder="Search products..."
                        aria-label="Search healthcare products"
                    >
                </div> -->

                <a href="{{ url('/frontend/products') }}"
                   class="btn btn-outline btn-sm">
                    View All Products
                    <span class="btn-arrow">→</span>

                </a>

            </div>

        </div>


        <div class="product-showcase-grid" id="home-product-grid">

            <!-- PRODUCT 1 -->

            <article class="modern-product-card"
                     data-product-name="Digital Thermometer">

                <a href="{{ url('/frontend/products') }}"
                   class="modern-product-image">

                    <span class="product-status">
                        In Stock
                    </span>

                    <img
                        src="{{ asset('frontend/images/product-placeholder.png') }}"
                        alt="Digital Thermometer"
                    >

                </a>

                <div class="modern-product-content">

                    <span class="modern-product-category">
                        Medical Device
                    </span>

                    <h3>
                        <a href="{{ url('/frontend/products') }}">
                            Digital Thermometer
                        </a>
                    </h3>

                    <p class="modern-product-brand">
                        HealthTech
                    </p>

                    <div class="modern-product-bottom">

                        <strong class="modern-product-price">
                            ₹299
                        </strong>

                        <button
                            class="modern-add-cart"
                            data-add-to-cart
                            data-id="p1"
                            data-name="Digital Thermometer"
                            data-brand="HealthTech"
                            data-price="299">

                            <span>+</span>
                            Add

                        </button>

                    </div>

                </div>

            </article>


            <!-- PRODUCT 2 -->

            <article class="modern-product-card"
                     data-product-name="Blood Pressure Monitor">

                <a href="{{ url('/frontend/products') }}"
                   class="modern-product-image">

                    <span class="product-status">
                        In Stock
                    </span>

                    <img
                        src="{{ asset('frontend/images/product-placeholder.png') }}"
                        alt="Blood Pressure Monitor"
                    >

                </a>

                <div class="modern-product-content">

                    <span class="modern-product-category">
                        Medical Device
                    </span>

                    <h3>
                        <a href="{{ url('/frontend/products') }}">
                            Blood Pressure Monitor
                        </a>
                    </h3>

                    <p class="modern-product-brand">
                        MediCheck
                    </p>

                    <div class="modern-product-bottom">

                        <strong class="modern-product-price">
                            ₹1,499
                        </strong>

                        <button
                            class="modern-add-cart"
                            data-add-to-cart
                            data-id="p2"
                            data-name="Blood Pressure Monitor"
                            data-brand="MediCheck"
                            data-price="1499">

                            <span>+</span>
                            Add

                        </button>

                    </div>

                </div>

            </article>


            <!-- PRODUCT 3 -->

            <article class="modern-product-card"
                     data-product-name="Pulse Oximeter">

                <a href="{{ url('/frontend/products') }}"
                   class="modern-product-image">

                    <span class="product-status">
                        In Stock
                    </span>

                    <img
                        src="{{ asset('frontend/images/product-placeholder.png') }}"
                        alt="Pulse Oximeter"
                    >

                </a>

                <div class="modern-product-content">

                    <span class="modern-product-category">
                        Monitoring Device
                    </span>

                    <h3>
                        <a href="{{ url('/frontend/products') }}">
                            Pulse Oximeter
                        </a>
                    </h3>

                    <p class="modern-product-brand">
                        OxyCare
                    </p>

                    <div class="modern-product-bottom">

                        <strong class="modern-product-price">
                            ₹899
                        </strong>

                        <button
                            class="modern-add-cart"
                            data-add-to-cart
                            data-id="p3"
                            data-name="Pulse Oximeter"
                            data-brand="OxyCare"
                            data-price="899">

                            <span>+</span>
                            Add

                        </button>

                    </div>

                </div>

            </article>


            <!-- PRODUCT 4 -->

            <article class="modern-product-card"
                     data-product-name="First Aid Kit">

                <a href="{{ url('/frontend/products') }}"
                   class="modern-product-image">

                    <span class="product-status">
                        In Stock
                    </span>

                    <img
                        src="{{ asset('frontend/images/product-placeholder.png') }}"
                        alt="First Aid Kit"
                    >

                </a>

                <div class="modern-product-content">

                    <span class="modern-product-category">
                        First Aid
                    </span>

                    <h3>
                        <a href="{{ url('/frontend/products') }}">
                            First Aid Kit
                        </a>
                    </h3>

                    <p class="modern-product-brand">
                        SafeCare
                    </p>

                    <div class="modern-product-bottom">

                        <strong class="modern-product-price">
                            ₹450
                        </strong>

                        <button
                            class="modern-add-cart"
                            data-add-to-cart
                            data-id="p4"
                            data-name="First Aid Kit"
                            data-brand="SafeCare"
                            data-price="450">

                            <span>+</span>
                            Add

                        </button>

                    </div>

                </div>

            </article>

        </div>


        <div id="home-product-no-results"
             class="product-search-empty"
             style="display:none;">

            <span>🔍</span>

            <p>
                No products found.
            </p>

        </div>

    </div>

</section>




    <!-- WHY CHOOSE -->
    <section class="section" style="background:var(--bg-alt)">
      <div class="container">
        <h2 class="section-title text-center">Why Choose Lakhadatar Pharma</h2>
        <p class="section-subtitle text-center">Trusted local healthcare supply for families and businesses</p>
        <div class="trust-grid">
          <div class="trust-item">
            <div class="trust-icon">✓</div>
            <div>
              <h3 style="font-size:1rem;margin-bottom:0.25rem">Genuine Products</h3>
              <p class="text-muted" style="font-size:0.875rem;margin:0">Authentic medicines and healthcare products from reliable sources.</p>
            </div>
          </div>
          <div class="trust-item">
            <div class="trust-icon">📦</div>
            <div>
              <h3 style="font-size:1rem;margin-bottom:0.25rem">Reliable Supply</h3>
              <p class="text-muted" style="font-size:0.875rem;margin:0">Consistent local stock for retail and regular business orders.</p>
            </div>
          </div>
          <div class="trust-item">
            <div class="trust-icon">💰</div>
            <div>
              <h3 style="font-size:1rem;margin-bottom:0.25rem">Competitive Pricing</h3>
              <p class="text-muted" style="font-size:0.875rem;margin:0">Fair prices for individuals and wholesale for businesses.</p>
            </div>
          </div>
          <div class="trust-item">
            <div class="trust-icon">🚚</div>
            <div>
              <h3 style="font-size:1rem;margin-bottom:0.25rem">Local Delivery</h3>
              <p class="text-muted" style="font-size:0.875rem;margin:0">Convenient home delivery for your area.</p>
            </div>
          </div>
          <div class="trust-item">
            <div class="trust-icon">🛒</div>
            <div>
              <h3 style="font-size:1rem;margin-bottom:0.25rem">Easy Ordering</h3>
              <p class="text-muted" style="font-size:0.875rem;margin:0">Shop without registration. Guest checkout available.</p>
            </div>
          </div>
          <div class="trust-item">
            <div class="trust-icon">📄</div>
            <div>
              <h3 style="font-size:1rem;margin-bottom:0.25rem">Digital Invoices</h3>
              <p class="text-muted" style="font-size:0.875rem;margin:0">Clear digital invoices for every order.</p>
            </div>
          </div>
          <div class="trust-item">
            <div class="trust-icon">🏥</div>
            <div>
              <h3 style="font-size:1rem;margin-bottom:0.25rem">Business Supply Support</h3>
              <p class="text-muted" style="font-size:0.875rem;margin:0">Dedicated support for hospitals, clinics and medical stores.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FOR BUSINESSES -->
    <section class="section">
      <div class="container">
        <div class="business-section">
          <h2>Reliable Healthcare Supply for Your Business</h2>
          <p>Make regular medicine and healthcare product ordering easier with reliable local supply. Serving hospitals, clinics and medical stores.</p>
          <div class="business-types">
            <div class="business-type">
              <span>🏥</span>
              <strong>Hospitals</strong>
            </div>
            <div class="business-type">
              <span>🩺</span>
              <strong>Clinics</strong>
            </div>
            <div class="business-type">
              <span>🏪</span>
              <strong>Medical Stores</strong>
            </div>
          </div>
          <div class="flex justify-center gap-3" style="flex-wrap:wrap">
            <a href="{{ route('register') }}" class="btn btn-primary" style="background:white;color:var(--primary)">Create Business Account</a>
            <a href="{{url('/frontend/contact')}}" class="btn btn-outline" style="border-color:rgba(255,255,255,0.6);color:white">Talk to Us</a>
          </div>
        </div>
      </div>
    </section>

    <!-- HOW IT WORKS -->
    <!-- <section class="section" style="background:var(--bg-alt)">
      <div class="container">
        <h2 class="section-title text-center">How It Works</h2>
        <p class="section-subtitle text-center">Simple steps from browse to delivery</p>
        <div class="steps">
          <div class="step">
            <div class="step-num">1</div>
            <h3>Browse</h3>
            <p>Search medicines or products, or browse by category.</p>
          </div>
          <div class="step">
            <div class="step-num">2</div>
            <h3>Add to Cart</h3>
            <p>Select quantity and add items. No account needed.</p>
          </div>
          <div class="step">
            <div class="step-num">3</div>
            <h3>Place Order</h3>
            <p>Enter delivery details. Upload prescription if required.</p>
          </div>
          <div class="step">
            <div class="step-num">4</div>
            <h3>Get Delivery</h3>
            <p>We confirm and deliver to your door.</p>
          </div>
        </div>
      </div>
    </section> -->

    <!-- CAN'T FIND MEDICINE -->
    <section class="section">
      <div class="container">
        <div class="whatsapp-banner">
          <div>
            <h3 style="font-size:1.125rem;margin-bottom:0.25rem">Can't find the medicine or product you're looking for?</h3>
            <p class="text-muted" style="margin:0;font-size:0.9375rem">Send us the medicine name or prescription and we'll help you.</p>
          </div>
          <a href="https://wa.me/918769426133?text=Hi%2C%20I%20need%20help%20finding%20a%20medicine" class="btn btn-whatsapp" target="_blank" rel="noopener">Ask on WhatsApp</a>
        </div>
      </div>
    </section>

    <!-- RETAIL BENEFITS -->
    <section class="section" style="background:var(--bg-alt)">
      <div class="container">
        <div class="grid" style="grid-template-columns:1fr 1fr;gap:3rem" id="benefits-grid">
          <div>
            <h2 class="section-title">For Retail Customers</h2>
            <p class="text-muted" style="margin-bottom:1.5rem">Order medicines and healthcare products from home with ease.</p>
            <ul style="display:flex;flex-direction:column;gap:0.75rem">
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Check availability online</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Order from home — no account required</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Local delivery to your door</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Easy cart and guest checkout</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Digital order tracking</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Digital invoice for every order</li>
            </ul>
          </div>
          <div>
            <h2 class="section-title">For Business Customers</h2>
            <p class="text-muted" style="margin-bottom:1.5rem">Hospitals, clinics and medical stores get dedicated supply support.</p>
            <ul style="display:flex;flex-direction:column;gap:0.75rem">
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Regular & bulk ordering</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Order history and easy reorder</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Digital invoices</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Centralized ordering</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Reliable local supply</li>
              <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Business account dashboard</li>
            </ul>
            <a href="{{url('frontend/business')}}" class="btn btn-primary" style="margin-top:1.25rem">Learn More</a>
          </div>
        </div>
      </div>
    </section>

    <!-- CONTACT / LOCATION -->
    <section class="section">
      <div class="container">
        <h2 class="section-title text-center">Get in Touch</h2>
        <p class="section-subtitle text-center">We're here to help with your medicine and healthcare needs</p>
        <div class="grid grid-3" style="max-width:900px;margin:0 auto">
          <div class="card" style="padding:1.5rem;text-align:center">
            <div style="font-size:1.75rem;margin-bottom:0.75rem">📞</div>
            <h3 style="font-size:1rem;margin-bottom:0.375rem">Phone</h3>
            <a href="tel:+91XXXXXXXXXX" class="text-primary">+91 8769426133</a>
          </div>
          <div class="card" style="padding:1.5rem;text-align:center">
            <div style="font-size:1.75rem;margin-bottom:0.75rem">💬</div>
            <h3 style="font-size:1rem;margin-bottom:0.375rem">WhatsApp</h3>
            <a href="https://wa.me/918769426133" class="text-primary" target="_blank" rel="noopener">Chat with us</a>
          </div>
          <div class="card" style="padding:1.5rem;text-align:center">
            <div style="font-size:1.75rem;margin-bottom:0.75rem">📍</div>
            <h3 style="font-size:1rem;margin-bottom:0.375rem">Location</h3>
            <p class="text-muted" style="font-size:0.875rem;margin:0">Lakhadatar Pharma | Near Shree Ram Hospital | Alwar/Jaipur Road | Thanagazi</p>
          </div>
        </div>
        <div class="text-center" style="margin-top:2rem">
          <a href="{{url('frontend/contact')}}" class="btn btn-primary">Contact Us</a>
        </div>
      </div>
    </section>
  </main>
@endsection