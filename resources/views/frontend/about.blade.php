@extends('layouts.frontend')

@section('title', 'About Us | Lakhadatar Pharma')

@section('content')

<main class="about-page">

    <!-- ABOUT HERO -->
    <section class="about-hero">
        <div class="container">

            <div class="about-hero-content">

                <span class="about-eyebrow">
                    ABOUT LAKHADATAR PHARMA
                </span>

                <h1>
                    Trusted Healthcare Supply,
                    <span>Closer to You.</span>
                </h1>

                <p>
                    Lakhadatar Pharma is a local pharmacy and healthcare
                    supply business committed to providing genuine medicines
                    and healthcare products with reliable service.
                </p>

            </div>

        </div>
    </section>


    <!-- INTRO -->
    <section class="section about-intro">

        <div class="container">

            <div class="about-intro-grid">

                <div>

                    <span class="about-section-label">
                        WHO WE ARE
                    </span>

                    <h2>
                        Reliable healthcare support
                        for everyday needs.
                    </h2>

                </div>

                <div>

                    <p class="about-lead">
                        We focus on making medicine and healthcare
                        product ordering simple, reliable and convenient
                        for local customers and businesses.
                    </p>

                    <p class="text-muted">
                        From individual home orders to regular supply
                        requirements, Lakhadatar Pharma aims to provide
                        genuine products, competitive pricing and
                        dependable local delivery.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- WHO WE SERVE -->
    <section class="section about-serve">

        <div class="container">

            <div class="about-section-heading">

                <span class="about-section-label">
                    WHO WE SERVE
                </span>

                <h2>
                    Healthcare supply for
                    different needs.
                </h2>

                <p>
                    Supporting individuals as well as healthcare
                    and medical businesses.
                </p>

            </div>


            <div class="serve-grid">

                <!-- Retail -->
                <div class="serve-card">

                    <div class="serve-icon">
                        🏠
                    </div>

                    <h3>
                        Retail Customers
                    </h3>

                    <p>
                        Order medicines and healthcare products
                        for home delivery without creating an account.
                    </p>

                </div>


                <!-- Medical Stores -->
                <div class="serve-card">

                    <div class="serve-icon">
                        🏪
                    </div>

                    <h3>
                        Medical Stores
                    </h3>

                    <p>
                        Regular wholesale supply support for
                        medical stores and their day-to-day requirements.
                    </p>

                </div>


                <!-- Clinics -->
                <div class="serve-card">

                    <div class="serve-icon">
                        🩺
                    </div>

                    <h3>
                        Clinics
                    </h3>

                    <p>
                        Reliable ordering support for medicines
                        and healthcare products needed regularly.
                    </p>

                </div>


                <!-- Hospitals -->
                <div class="serve-card">

                    <div class="serve-icon">
                        🏥
                    </div>

                    <h3>
                        Hospitals
                    </h3>

                    <p>
                        Consistent supply support for larger
                        and regular healthcare orders.
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- OUR PROMISE -->
    <section class="section about-promise">

        <div class="container">

            <div class="promise-card">

                <div class="promise-content">

                    <span class="about-section-label">
                        OUR PROMISE
                    </span>

                    <h2>
                        Simple service.
                        Reliable supply.
                    </h2>

                    <p>
                        We focus on the things that matter most when
                        ordering medicines and healthcare products.
                    </p>

                </div>


                <div class="promise-list">

                    <div class="promise-item">
                        <span>✓</span>
                        <div>
                            <strong>Genuine Products</strong>
                            <p>Reliable medicines and healthcare products.</p>
                        </div>
                    </div>

                    <div class="promise-item">
                        <span>✓</span>
                        <div>
                            <strong>Competitive Pricing</strong>
                            <p>Fair pricing for retail and business customers.</p>
                        </div>
                    </div>

                    <div class="promise-item">
                        <span>✓</span>
                        <div>
                            <strong>Local Delivery</strong>
                            <p>Convenient delivery within our service area.</p>
                        </div>
                    </div>

                    <div class="promise-item">
                        <span>✓</span>
                        <div>
                            <strong>Easy Ordering</strong>
                            <p>Simple ordering with support when you need it.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- CTA -->
    <section class="section about-cta">

        <div class="container">

            <div class="about-cta-card">

                <div>

                    <span class="about-section-label">
                        NEED HELP?
                    </span>

                    <h2>
                        Can't find the medicine
                        you're looking for?
                    </h2>

                    <p>
                        Contact us or talk to us on WhatsApp.
                        We'll help you find what you need.
                    </p>

                </div>


                <div class="about-cta-actions">

                    <a href="{{ url('/frontend/contact') }}"
                       class="btn btn-primary">
                        Contact Us
                    </a>

                    <a href="{{ url('/frontend/business') }}"
                       class="btn btn-outline">
                        For Businesses
                    </a>

                </div>

            </div>

        </div>

    </section>

</main>

@endsection