@extends('layouts.frontend')

@section('title', 'Your Cart | Lakhadatar Pharma')

@section('content')

<main class="cart-page">

    <div class="container">

        <!-- Cart Header -->
        <div class="cart-page-header">

            <div>
                <span class="cart-eyebrow">
                    LAKHADATAR PHARMA
                </span>

                <h1>
                    Your Shopping Cart
                </h1>

                <p>
                    Review your medicines and healthcare products before checkout.
                </p>
            </div>

            <a href="{{ url('/frontend/medicines') }}"
               class="cart-continue-btn">
                ← Continue Shopping
            </a>

        </div>


        <!-- Cart Layout -->
        <div class="cart-layout" id="cart-layout">

            <!-- Cart Items -->
            <div class="cart-items-area">

                <div class="cart-items-header">
                    <div>
                        <h2>Cart Items</h2>
                        <span>Review your selected products</span>
                    </div>
                </div>


                <!-- JS will populate this -->
                <div id="cart-items"></div>


                <!-- Empty Cart -->
                <div id="cart-empty"
                     class="cart-empty-state"
                     style="display:none">

                    <div class="cart-empty-icon">
                        🛒
                    </div>

                    <h3>
                        Your cart is empty
                    </h3>

                    <p>
                        You haven't added any medicines or healthcare
                        products yet.
                    </p>

                    <div class="cart-empty-actions">

                        <a href="{{ url('/frontend/medicines') }}"
                           class="btn btn-primary">
                            Shop Medicines
                        </a>

                        <a href="{{ url('/frontend/products') }}"
                           class="btn btn-outline">
                            Healthcare Products
                        </a>

                    </div>

                </div>

            </div>


            <!-- Order Summary -->
            <aside class="cart-summary">

                <div class="cart-summary-card">

                    <div class="cart-summary-header">

                        <div>
                            <span>
                                ORDER SUMMARY
                            </span>

                            <h2>
                                Your Order
                            </h2>
                        </div>

                        <div class="cart-summary-icon">
                            🛍️
                        </div>

                    </div>


                    <!-- Subtotal -->
                    <div class="cart-summary-row">

                        <span>
                            Subtotal
                        </span>

                        <strong id="subtotal">
                            ₹0
                        </strong>

                    </div>


                    <!-- Delivery -->
                    <div class="cart-summary-row">

                        <span>
                            Delivery
                        </span>

                        <span id="delivery"
                              class="cart-delivery-text">
                            Calculated at checkout
                        </span>

                    </div>


                    <!-- Divider -->
                    <div class="cart-summary-divider"></div>


                    <!-- Total -->
                    <div class="cart-total-row">

                        <div>
                            <span>
                                Total Amount
                            </span>

                            <small>
                                Inclusive of applicable charges
                            </small>
                        </div>

                        <strong id="total">
                            ₹0
                        </strong>

                    </div>


                    <!-- Minimum Order -->
                    <div id="min-order-notice"
                         class="cart-minimum-notice"
                         style="display:none">

                        <span class="cart-notice-icon">
                            ⚠️
                        </span>

                        <div>
                            <strong>
                                Minimum order ₹100
                            </strong>

                            <p>
                                Add more items to continue with checkout.
                            </p>
                        </div>

                    </div>


                    <!-- Checkout -->
                    <a href="{{ url('/frontend/checkout') }}"
                       id="checkout-btn"
                       class="btn btn-primary cart-checkout-btn"
                       style="pointer-events:none;opacity:0.5">

                        Proceed to Checkout

                        <span>
                            →
                        </span>

                    </a>


                    <div class="cart-secure-note">

                        <span>🔒</span>

                        <span>
                            Secure checkout · No account required
                        </span>

                    </div>

                </div>


                <!-- Trust -->
                <div class="cart-trust">

                    <div>
                        <span>✓</span>
                        Genuine Products
                    </div>

                    <div>
                        <span>✓</span>
                        Local Delivery
                    </div>

                    <div>
                        <span>✓</span>
                        Easy Ordering
                    </div>

                </div>

            </aside>

        </div>

    </div>

</main>

@endsection