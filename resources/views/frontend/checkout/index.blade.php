@extends('layouts.frontend')

@section('title', 'Checkout | Lakhadatar Pharma')

@section('content')

<main class="checkout-page">

    <div class="container">

        <!-- Header -->
        <div class="checkout-header">

            <div>
                <span class="checkout-eyebrow">
                    LAKHADATAR PHARMA
                </span>

                <h1>
                    Complete Your Order
                </h1>

                <p>
                    Enter your delivery details and confirm your order.
                </p>
            </div>

            <div class="checkout-secure">
                🔒 Secure Checkout
            </div>

        </div>


        <div class="checkout-layout" id="checkout-layout">

            <!-- LEFT -->
            <form id="checkout-form"
                  class="checkout-form">

                <!-- Delivery Details -->
                <section class="checkout-card">

                    <div class="checkout-section-header">

                        <div class="checkout-section-number">
                            01
                        </div>

                        <div>
                            <h2>
                                Delivery Details
                            </h2>

                            <p>
                                Where should we deliver your order?
                            </p>
                        </div>

                    </div>


                    <div class="checkout-form-grid">

                        <div class="form-group">

                            <label class="form-label"
                                   for="name">
                                Full Name *
                            </label>

                            <input
                                type="text"
                                id="name"
                                class="form-input"
                                required
                                placeholder="Your full name"
                                autocomplete="name">

                        </div>


                        <div class="form-group">

                            <label class="form-label"
                                   for="mobile">
                                Mobile Number *
                            </label>

                            <input
                                type="tel"
                                id="mobile"
                                class="form-input"
                                required
                                placeholder="10-digit mobile number"
                                pattern="[0-9]{10}"
                                autocomplete="tel">

                        </div>


                        <div class="form-group checkout-full">

                            <label class="form-label"
                                   for="email">
                                Email
                                <span>(Optional)</span>
                            </label>

                            <input
                                type="email"
                                id="email"
                                class="form-input"
                                placeholder="you@example.com"
                                autocomplete="email">

                        </div>


                        <div class="form-group checkout-full">

                            <label class="form-label"
                                   for="address">
                                Delivery Address *
                            </label>

                            <textarea
                                id="address"
                                class="form-input"
                                rows="3"
                                required
                                placeholder="House / Flat no., Street, Area"></textarea>

                        </div>


                        <div class="form-group">

                            <label class="form-label"
                                   for="city">
                                City *
                            </label>

                            <input
                                type="text"
                                id="city"
                                class="form-input"
                                required
                                placeholder="Your city">

                        </div>

                    </div>

                </section>


                <!-- Prescription -->
                <section class="checkout-card">

                    <div class="checkout-section-header">

                        <div class="checkout-section-number">
                            02
                        </div>

                        <div>
                            <h2>
                                Prescription
                            </h2>

                            <p>
                                Upload a prescription if your order requires one.
                            </p>
                        </div>

                    </div>


                    <div class="prescription-info">

                        <span class="prescription-icon">
                            ℹ️
                        </span>

                        <p>
                            Prescription is not required for all items.
                            If any medicine requires a prescription,
                            upload it below.
                        </p>

                    </div>


                    <div class="form-group">

                        <label class="form-label">
                            Do you have a prescription?
                        </label>

                        <div class="prescription-options">

                            <label class="prescription-option">

                                <input
                                    type="radio"
                                    name="has_rx"
                                    value="yes"
                                    id="rx-yes">

                                <span class="custom-radio"></span>

                                <span>
                                    Yes, I have one
                                </span>

                            </label>


                            <label class="prescription-option">

                                <input
                                    type="radio"
                                    name="has_rx"
                                    value="no"
                                    id="rx-no"
                                    checked>

                                <span class="custom-radio"></span>

                                <span>
                                    No prescription
                                </span>

                            </label>

                        </div>

                    </div>


                    <!-- Upload -->
                    <div id="rx-upload"
                         class="prescription-upload"
                         style="display:none">

                        <div class="upload-zone"
                             id="upload-zone">

                            <input
                                type="file"
                                id="rx-file"
                                accept="image/*,.pdf"
                                style="display:none">


                            <div class="upload-icon">
                                📄
                            </div>

                            <strong>
                                Upload prescription
                            </strong>

                            <p>
                                JPG, PNG or PDF · Maximum 5MB
                            </p>

                            <button
                                type="button"
                                class="upload-button">
                                Choose File
                            </button>

                        </div>


                        <div class="prescription-review-note">

                            <span>✓</span>

                            <p>
                                Your prescription will be reviewed before
                                order confirmation. If an item is unavailable,
                                we will contact you.
                            </p>

                        </div>

                    </div>

                </section>


                <!-- Submit -->
                <button
                    type="submit"
                    class="btn btn-primary btn-lg checkout-place-order">

                    <span>
                        Place Order
                    </span>

                    <span>
                        →
                    </span>

                </button>


                <p class="checkout-bottom-note">
                    🔒 Your information is used only to process your order.
                </p>

            </form>


            <!-- RIGHT -->
            <aside class="checkout-sidebar">

                <div class="checkout-summary-card">

                    <div class="checkout-summary-header">

                        <div>
                            <span>
                                ORDER SUMMARY
                            </span>

                            <h2>
                                Your Order
                            </h2>
                        </div>

                        <div class="checkout-summary-icon">
                            🛍️
                        </div>

                    </div>


                    <!-- Items -->
                    <div id="summary-items"
                         class="checkout-summary-items">
                    </div>


                    <!-- Subtotal -->
                    <div class="checkout-summary-row">

                        <span>
                            Subtotal
                        </span>

                        <strong id="c-subtotal">
                            ₹0
                        </strong>

                    </div>


                    <!-- Delivery -->
                    <div class="checkout-summary-row">

                        <span>
                            Delivery
                        </span>

                        <span>
                            To be confirmed
                        </span>

                    </div>


                    <div class="checkout-summary-divider"></div>


                    <!-- Total -->
                    <div class="checkout-total">

                        <div>
                            <span>
                                Total Amount
                            </span>

                            <small>
                                Minimum order ₹100
                            </small>
                        </div>

                        <strong id="c-total">
                            ₹0
                        </strong>

                    </div>


                    <div class="checkout-delivery-note">

                        🚚

                        <span>
                            Delivery charges may apply based on your location.
                        </span>

                    </div>

                </div>


                <!-- Trust -->
                <div class="checkout-trust">

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
                        Secure Ordering
                    </div>

                </div>

            </aside>

        </div>

    </div>

</main>

@endsection