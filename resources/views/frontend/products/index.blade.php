@extends('layouts.frontend')

@section('title', 'Healthcare Products | Lakhadatar Pharma')

@section('content')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<main class="products-page">

    {{-- =========================================
        PRODUCTS HERO
    ========================================== --}}

    <section class="products-hero">

        <div class="container">

            <div class="products-hero-content">

                <h1>
                    Healthcare Products
                </h1>

                <p>
                    Find quality healthcare products from trusted brands
                    and order conveniently from your local pharmacy.
                </p>


                {{-- Search --}}

                <div class="products-search-box">

                    <svg
                        width="22"
                        height="22"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24">

                        <circle cx="11" cy="11" r="8"/>
                        <path d="m21 21-4.35-4.35"/>

                    </svg>

                    <input
                        type="search"
                        id="product-search"
                        placeholder="Search product, brand or company..."
                        autocomplete="off"
                    >

                    <button
                        type="button"
                        id="clear-product-search"
                        aria-label="Clear search">

                        ✕

                    </button>

                </div>

                <div class="products-search-hint">
                    Try: Thermometer, Blood Pressure Monitor, Pulse Oximeter
                </div>

            </div>

        </div>

    </section>


    {{-- =========================================
        PRODUCTS
    ========================================== --}}

    <section class="products-list-section">

        <div class="container">


            {{-- Products Header --}}

            <div class="products-section-header">

                <div>

                    <span class="products-section-label">
                        HEALTHCARE ESSENTIALS
                    </span>

                    <h2>
                        Our Products
                    </h2>

                </div>

                <span class="products-count">
                    {{ $products->total() }} Products
                </span>

            </div>


            {{-- =========================================
                PRODUCTS GRID
            ========================================== --}}

            <div
                class="products-grid"
                id="products-grid">

                @forelse($products as $product)

                    <article
                        class="product-card-new"
                        data-product-search="{{ strtolower($product->product_name . ' ' . ($product->category->name ?? '')) }}">


                        {{-- Product Image --}}

                        <a
                            href="{{ url('/frontend/products/' . $product->id) }}"
                            class="product-image">


                            {{-- Stock --}}

                            @if($product->stock > 0)

                                <span class="product-stock-badge">
                                    In Stock
                                </span>

                            @else

                                <span class="product-stock-badge out-stock">
                                    Out of Stock
                                </span>

                            @endif


                            {{-- Image --}}

                          

@if($product->image)

    <img
        src="{{ asset('uploads/products/' . $product->image) }}"
        alt="{{ $product->product_name }}"
        class="product-real-image">

@else

    <div class="product-image-placeholder">
        🩺
    </div>

@endif

                        </a>


                        {{-- Product Content --}}

                        <div class="product-card-content">


                            {{-- Category --}}

                            <span class="product-brand">
                                {{ $product->category->name ?? 'Healthcare' }}
                            </span>


                            {{-- Product Name --}}

                            <a
                                href="{{ url('/frontend/products/' . $product->id) }}"
                                class="product-title">

                                {{ $product->product_name }}

                            </a>


                            {{-- Price + Cart --}}

                            <div class="product-card-footer">

                                <strong class="product-price">
                                    ₹{{ number_format($product->selling_price, 2) }}
                                </strong>


                                @if($product->stock > 0)

                                    <button
                                        class="product-cart-btn"
                                        data-add-to-cart
                                        data-id="p{{ $product->id }}"
                                        data-name="{{ $product->product_name }}"
                                        data-brand="{{ $product->category->name ?? 'Healthcare' }}"
                                        data-price="{{ $product->selling_price }}">

                                        Add to Cart

                                    </button>

                                @else

                                    <button
                                        class="product-cart-btn disabled"
                                        disabled>

                                        Unavailable

                                    </button>

                                @endif

                            </div>

                        </div>

                    </article>

                @empty


                    {{-- No Products --}}

                    <div
                        class="medicine-no-result"
                        style="display:block;grid-column:1/-1;">

                        <div class="medicine-no-result-icon">
                            🔍
                        </div>

                        <h3>
                            No products available
                        </h3>

                        <p>
                            Please check back later.
                        </p>

                    </div>

                @endforelse

            </div>


            {{-- =========================================
                PAGINATION
            ========================================== --}}

            @if($products->hasPages())

                <div class="medicine-pagination">

                    {{-- Previous --}}

                    @if($products->onFirstPage())

                        <span class="pagination-arrow disabled">
                            ←
                        </span>

                    @else

                        <a
                            href="{{ $products->previousPageUrl() }}"
                            class="pagination-arrow">

                            ←

                        </a>

                    @endif


                    {{-- First Page + Dots --}}

                    @if($products->currentPage() > 3)

                        <a
                            href="{{ $products->url(1) }}"
                            class="pagination-number">

                            1

                        </a>

                        <span class="pagination-dots">
                            ...
                        </span>

                    @endif


                    {{-- Current Page Range --}}

                    @foreach(
                        $products->getUrlRange(
                            max(1, $products->currentPage() - 1),
                            min($products->lastPage(), $products->currentPage() + 1)
                        )
                        as $page => $url
                    )

                        @if($page == $products->currentPage())

                            <span class="pagination-number active">
                                {{ $page }}
                            </span>

                        @else

                            <a
                                href="{{ $url }}"
                                class="pagination-number">

                                {{ $page }}

                            </a>

                        @endif

                    @endforeach


                    {{-- Last Page --}}

                    @if($products->currentPage() < $products->lastPage() - 2)

                        <span class="pagination-dots">
                            ...
                        </span>

                        <a
                            href="{{ $products->url($products->lastPage()) }}"
                            class="pagination-number">

                            {{ $products->lastPage() }}

                        </a>

                    @endif


                    {{-- Next --}}

                    @if($products->hasMorePages())

                        <a
                            href="{{ $products->nextPageUrl() }}"
                            class="pagination-arrow">

                            →

                        </a>

                    @else

                        <span class="pagination-arrow disabled">
                            →
                        </span>

                    @endif

                </div>

            @endif


            {{-- =========================================
                CAN'T FIND PRODUCT
            ========================================== --}}

            <div class="medicine-help">

                <div class="medicine-help-icon">
                    🩺
                </div>


                <div class="medicine-help-content">

                    <h3>
                        Can't find the product you're looking for?
                    </h3>

                    <p>
                        Send us the product name and we'll help you
                        find it.
                    </p>

                </div>


                <a
                    href="https://wa.me/918769426133"
                    target="_blank"
                    rel="noopener"
                    class="btn btn-whatsapp">

                    Ask on WhatsApp

                </a>

            </div>


        </div>

    </section>

</main>

@endsection