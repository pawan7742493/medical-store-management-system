@extends('layouts.frontend')

@section('title', $product->product_name . ' | Lakhadatar Pharma')

@section('content')

<main class="product-detail-page">

    <div class="container">

        <div class="product-detail-layout">

            {{-- Product Image --}}
            <div class="product-detail-image-card">

                <div class="product-detail-image">

                    @if($product->stock > 0)

                        <span class="product-detail-stock">
                            In Stock
                        </span>

                    @else

                        <span class="product-detail-stock out-stock">
                            Out of Stock
                        </span>

                    @endif


                    @if($product->image)

                        <img
                            src="{{ asset('uploads/products/' . $product->image) }}"
                            alt="{{ $product->product_name }}"
                        >

                    @else

                        <div class="product-image-placeholder">
                            🩺
                        </div>

                    @endif

                </div>

            </div>


            {{-- Product Information --}}
            <div class="product-detail-info">

                <span class="product-detail-category">
                    {{ strtoupper($product->category->name ?? 'HEALTHCARE PRODUCT') }}
                </span>


                <h1>
                    {{ $product->product_name }}
                </h1>


                <p class="product-detail-brand">
                    {{ $product->category->name ?? 'Healthcare' }}
                </p>


                <div class="product-detail-rating">

                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>

                    <small>
                        Trusted Healthcare Product
                    </small>

                </div>


                <div class="product-detail-price">
                    ₹{{ number_format($product->selling_price, 2) }}
                </div>


                @if($product->description)

                    <p class="product-detail-description">
                        {{ $product->description }}
                    </p>

                @else

                    <p class="product-detail-description">
                        Quality healthcare product from Lakhadatar Pharma.
                    </p>

                @endif


                {{-- Quantity --}}
                @if($product->stock > 0)

                    <div class="product-detail-quantity">

                        <span>
                            Quantity
                        </span>

                        <div class="qty-control">

                            <button
                                type="button"
                                class="qty-btn qty-minus"
                                aria-label="Decrease quantity">
                                −
                            </button>

                            <input
                                type="number"
                                class="qty-value qty-input"
                                value="1"
                                min="1"
                                max="{{ min($product->stock, 20) }}"
                                aria-label="Quantity"
                            >

                            <button
                                type="button"
                                class="qty-btn qty-plus"
                                aria-label="Increase quantity">
                                +
                            </button>

                        </div>

                    </div>


                    {{-- Cart --}}
                    <div class="product-detail-actions">

                        <button
                            class="btn btn-primary btn-lg product-detail-cart-btn"
                            id="add-pd"
                            data-id="p{{ $product->id }}"
                            data-name="{{ $product->product_name }}"
                            data-brand="{{ $product->category->name ?? 'Healthcare' }}"
                            data-price="{{ $product->selling_price }}">

                            Add to Cart

                        </button>

                    </div>

                @else

                    <div class="product-detail-actions">

                        <button
                            class="btn btn-primary btn-lg product-detail-cart-btn"
                            disabled>

                            Currently Unavailable

                        </button>

                    </div>

                @endif


                {{-- Product Information --}}
                <div class="product-information">

                    <h2>
                        Product Information
                    </h2>


                    <p>
                        {{ $product->description ?? 'Quality healthcare product from Lakhadatar Pharma.' }}
                    </p>


                    <div class="product-information-grid">

                        <div class="product-info-item">

                            <span>
                                Category
                            </span>

                            <strong>
                                {{ $product->category->name ?? 'Healthcare Products' }}
                            </strong>

                        </div>


                        <div class="product-info-item">

                            <span>
                                Product
                            </span>

                            <strong>
                                {{ $product->product_name }}
                            </strong>

                        </div>


                        <div class="product-info-item">

                            <span>
                                Prescription
                            </span>

                            <strong>
                                Not Required
                            </strong>

                        </div>


                        <div class="product-info-item">

                            <span>
                                Availability
                            </span>

                            @if($product->stock > 0)

                                <strong class="info-stock">
                                    In Stock
                                </strong>

                            @else

                                <strong>
                                    Out of Stock
                                </strong>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

@endsection