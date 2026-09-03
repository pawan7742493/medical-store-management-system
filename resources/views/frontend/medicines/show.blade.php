@extends('layouts.frontend')

@section('title', $medicine->medicine_name . ' | Lakhadatar Pharma')

@section('content')

<main class="medicine-detail-page">

    <div class="container">

        {{-- Breadcrumb --}}
        <div class="medicine-breadcrumb">

            <a href="{{ url('/home') }}">Home</a>

            <span>/</span>

            <a href="{{ url('/frontend/medicines') }}">Medicines</a>

            <span>/</span>

            <span>{{ $medicine->medicine_name }}</span>

        </div>


        {{-- Main Medicine --}}
        <div class="medicine-detail-card">


            {{-- Product Visual --}}
            <div class="medicine-detail-visual">

                <div class="medicine-detail-image">

                    <span class="detail-medicine-icon">
                        💊
                    </span>

                    @if($medicine->stock > 0)

                        <span class="detail-stock-badge">
                            ✓ In Stock
                        </span>

                    @else

                        <span class="detail-stock-badge out-stock">
                            Out of Stock
                        </span>

                    @endif

                </div>

                <div class="detail-image-note">
                    Genuine medicine from a trusted supplier
                </div>

            </div>


            {{-- Product Information --}}
            <div class="medicine-detail-info">


                {{-- Category --}}
                <div class="detail-category">
                    {{ $medicine->category->name ?? 'General Medicine' }}
                </div>


                {{-- Medicine Name --}}
                <h1>
                    {{ $medicine->medicine_name }}
                </h1>


                {{-- Company --}}
                <p class="detail-brand">
                    {{ $medicine->company_name }}
                </p>


                {{-- Trust --}}
                <div class="detail-trust-row">

                    <span>
                        ✓ Genuine Product
                    </span>

                    <span>
                        ✓ Quality Checked
                    </span>

                </div>


                {{-- Price --}}
                <div class="detail-price-row">

                    <span class="detail-price">
                        ₹{{ number_format($medicine->retail_price, 2) }}
                    </span>

                    <span class="detail-pack">
                        / pack
                    </span>

                </div>


                {{-- Prescription Notice --}}
                <div class="detail-notice">

                    <div class="detail-notice-icon">
                        ✓
                    </div>

                    <div>

                        <strong>
                            Prescription information
                        </strong>

                        <p>
                            Please check the medicine requirements
                            before placing your order.
                        </p>

                    </div>

                </div>


                {{-- Quantity --}}
                @if($medicine->stock > 0)

                    <div class="detail-purchase-row">

                        <div>

                            <span class="detail-label">
                                Quantity
                            </span>

                            <div class="detail-quantity">

                                <button
                                    type="button"
                                    class="qty-btn qty-minus"
                                    aria-label="Decrease quantity">
                                    −
                                </button>

                                <input
                                    type="number"
                                    class="qty-input"
                                    value="1"
                                    min="1"
                                    max="{{ min($medicine->stock, 20) }}"
                                    aria-label="Quantity">

                                <button
                                    type="button"
                                    class="qty-btn qty-plus"
                                    aria-label="Increase quantity">
                                    +
                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="detail-actions">

                        <button
                            class="btn btn-primary btn-lg detail-add-cart"
                            id="add-detail"
                            data-id="m{{ $medicine->id }}"
                            data-name="{{ $medicine->medicine_name }}"
                            data-brand="{{ $medicine->company_name }}"
                            data-price="{{ $medicine->retail_price }}">

                            Add to Cart

                        </button>

                        <a
                            href="https://wa.me/918769426133?text={{ urlencode('Hi, I have a question about ' . $medicine->medicine_name) }}"
                            class="btn btn-outline btn-lg"
                            target="_blank"
                            rel="noopener">

                            Ask on WhatsApp

                        </a>

                    </div>

                @else

                    <div class="detail-actions">

                        <button
                            class="btn btn-primary btn-lg detail-add-cart"
                            disabled>

                            Currently Unavailable

                        </button>

                        <a
                            href="https://wa.me/918769426133?text={{ urlencode('Hi, I want to know about ' . $medicine->medicine_name) }}"
                            class="btn btn-outline btn-lg"
                            target="_blank"
                            rel="noopener">

                            Ask on WhatsApp

                        </a>

                    </div>

                @endif


                {{-- Product Information --}}
                <div class="detail-information">

                    <h2>
                        Product Information
                    </h2>


                    <p class="detail-description">

                        {{ $medicine->description ?? 'Medicine information is currently unavailable.' }}

                    </p>


                    <div class="detail-specifications">


                        <div class="detail-spec">

                            <span>
                                Category
                            </span>

                            <strong>
                                {{ $medicine->category->name ?? 'General' }}
                            </strong>

                        </div>


                        <div class="detail-spec">

                            <span>
                                Company
                            </span>

                            <strong>
                                {{ $medicine->company_name }}
                            </strong>

                        </div>


                        <div class="detail-spec">

                            <span>
                                Batch No.
                            </span>

                            <strong>
                                {{ $medicine->batch_no }}
                            </strong>

                        </div>


                        <div class="detail-spec">

                            <span>
                                Expiry
                            </span>

                            <strong>
                                {{ $medicine->expiry_date }}
                            </strong>

                        </div>


                        <div class="detail-spec">

                            <span>
                                Prescription
                            </span>

                            <strong>
                                Check Before Ordering
                            </strong>

                        </div>


                        <div class="detail-spec">

                            <span>
                                Availability
                            </span>

                            <strong>
                                {{ $medicine->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Bottom Trust Section --}}
        <div class="detail-trust-grid">

            <div class="detail-trust-card">

                <span>✓</span>

                <div>
                    <strong>Genuine Products</strong>
                    <small>Authentic medicines</small>
                </div>

            </div>


            <div class="detail-trust-card">

                <span>🚚</span>

                <div>
                    <strong>Local Delivery</strong>
                    <small>Convenient doorstep delivery</small>
                </div>

            </div>


            <div class="detail-trust-card">

                <span>🔒</span>

                <div>
                    <strong>Secure Ordering</strong>
                    <small>Safe and simple checkout</small>
                </div>

            </div>


            <div class="detail-trust-card">

                <span>💬</span>

                <div>
                    <strong>Need Help?</strong>
                    <small>Contact us on WhatsApp</small>
                </div>

            </div>

        </div>

    </div>

</main>

@endsection