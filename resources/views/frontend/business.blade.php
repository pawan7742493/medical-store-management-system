@extends('layouts.frontend')

@section('title', 'For Businesses | Lakhadatar Pharma')

@section('content')

<main class="business-page">

    <!-- BUSINESS HERO -->
    <section class="business-hero">

        <div class="container">

            <div class="business-hero-content">

                <span class="business-eyebrow">
                    BUSINESS HEALTHCARE SUPPLY
                </span>

                <h1>
                    Reliable Healthcare Supply
                    <span>for Your Business.</span>
                </h1>

                <p>
                    Make regular medicine and healthcare product ordering
                    easier with reliable local supply and dedicated support.
                </p>

                <!-- <div class="business-hero-actions">

                    <a href="{{ url('/frontend/contact') }}"
                       class="btn btn-primary btn-lg">
                        Talk to Us
                    </a>

                    <a href="https://wa.me/918769426133"
                       class="btn btn-outline btn-lg"
                       target="_blank"
                       rel="noopener">
                        WhatsApp Us
                    </a>

                </div> -->

            </div>

        </div>

    </section>


    <!-- WHO WE SERVE -->
    <section class="section business-customers">

        <div class="container">

            <div class="business-section-heading">

                <span class="business-label">
                    WHO WE SERVE
                </span>

                <h2>
                    Create Your Businesse Account Now.
                </h2>

                <p>
                    Whether you manage a hospital, clinic or medical store,
                    we help simplify your regular healthcare supply needs.
                </p>

            </div>
            <a href="{{url('register')}}">

            <div class="business-customer-grid">

                <div class="business-customer-card">

                    <div class="business-card-icon">
                        🏥
                    </div>

                    <h3>
                        Hospitals
                    </h3>

                    <p>
                        Support for regular and larger medicine and
                        healthcare product requirements.
                    </p>

                </div>

</a>

                 <a href="{{url('register')}}">
                <div class="business-customer-card">

                    <div class="business-card-icon">
                        🩺
                    </div>

                    <h3>
                        Clinics
                    </h3>

                    <p>
                        Convenient ordering for medicines and products
                        required for everyday clinical operations.
                    </p>

                </div>

</a>

 <a href="{{url('register')}}">
                <div class="business-customer-card">

                    <div class="business-card-icon">
                        🏪
                    </div>

                    <h3>
                        Medical Stores
                    </h3>

                    <p>
                        Regular wholesale supply support for maintaining
                        your medicine and healthcare product stock.
                    </p>

                </div>
 </a>
            </div>

        </div>

    </section>


    <!-- BENEFITS -->
    <section class="section business-benefits">

        <div class="container">

            <div class="business-benefits-grid">

                <div class="business-benefits-content">

                    <span class="business-label">
                        BUSINESS BENEFITS
                    </span>

                    <h2>
                        Everything you need
                        for easier ordering.
                    </h2>

                    <p>
                        Our business-focused service is designed around
                        regular ordering, reliable supply and convenient
                        local support.
                    </p>

                </div>


                <div class="business-benefits-list">

                    <div class="business-benefit">

                        <span>✓</span>

                        <div>
                            <strong>Regular & Bulk Ordering</strong>

                            <p>
                                Order medicines and healthcare products
                                according to your business requirements.
                            </p>
                        </div>

                    </div>


                    <div class="business-benefit">

                        <span>✓</span>

                        <div>
                            <strong>Reliable Local Supply</strong>

                            <p>
                                Convenient access to available products
                                through local supply.
                            </p>
                        </div>

                    </div>


                    <div class="business-benefit">

                        <span>✓</span>

                        <div>
                            <strong>Digital Invoices</strong>

                            <p>
                                Keep clear digital records for your
                                business orders.
                            </p>
                        </div>

                    </div>


                    <div class="business-benefit">

                        <span>✓</span>

                        <div>
                            <strong>Easy Reordering</strong>

                            <p>
                                Make repeat ordering simpler for
                                regularly required products.
                            </p>
                        </div>

                    </div>


                    <div class="business-benefit">

                        <span>✓</span>

                        <div>
                            <strong>Dedicated Support</strong>

                            <p>
                                Get assistance when you need help
                                finding a medicine or product.
                            </p>
                        </div>

                    </div>


                    <div class="business-benefit">

                        <span>✓</span>

                        <div>
                            <strong>Local Delivery</strong>

                            <p>
                                Convenient delivery support within
                                the available service area.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- HOW BUSINESS ORDERING WORKS -->
    <section class="section business-process">

        <div class="container">

            <div class="business-section-heading">

                <span class="business-label">
                    SIMPLE PROCESS
                </span>

                <h2>
                    How business ordering works.
                </h2>

            </div>


            <div class="business-steps">

                <div class="business-step">

                    <div class="business-step-number">
                        01
                    </div>

                    <h3>
                        Contact Us
                    </h3>

                    <p>
                        Tell us about your business and
                        healthcare supply requirements.
                    </p>

                </div>


                <div class="business-step">

                    <div class="business-step-number">
                        02
                    </div>

                    <h3>
                        Share Requirements
                    </h3>

                    <p>
                        Share the medicines or healthcare
                        products you need.
                    </p>

                </div>


                <div class="business-step">

                    <div class="business-step-number">
                        03
                    </div>

                    <h3>
                        Confirm Order
                    </h3>

                    <p>
                        We confirm product availability,
                        pricing and order details.
                    </p>

                </div>


                <div class="business-step">

                    <div class="business-step-number">
                        04
                    </div>

                    <h3>
                        Receive Supply
                    </h3>

                    <p>
                        Your order is prepared and delivered
                        according to the agreed requirements.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- CTA -->
    <section class="section business-cta">

        <div class="container">

            <div class="business-cta-card">

                <div>

                    <span class="business-label">
                        LET'S WORK TOGETHER
                    </span>

                    <h2>
                        Looking for a reliable
                        local healthcare supplier?
                    </h2>

                    <p>
                        Get in touch with Lakhadatar Pharma
                        to discuss your business requirements.
                    </p>

                </div>


                <div class="business-cta-actions">

                    <a href="{{ url('/frontend/contact') }}"
                       class="btn btn-primary">
                        Contact Us
                    </a>

                    <a href="https://wa.me/918769426133"
                       class="btn btn-outline"
                       target="_blank"
                       rel="noopener">
                        WhatsApp Us
                    </a>

                </div>

            </div>

        </div>

    </section>

</main>

@endsection