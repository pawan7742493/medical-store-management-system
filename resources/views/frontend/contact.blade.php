@extends('layouts.frontend')

@section('title', 'Contact Us | Lakhadatar Pharma')

@section('content')

<main class="contact-page">

    <!-- CONTACT HERO -->
    <section class="contact-hero">

        <div class="container">

            <div class="contact-hero-content">

                <span class="contact-eyebrow">
                    GET IN TOUCH
                </span>

                <h1>
                    We're Here to
                    <span>Help You.</span>
                </h1>

                <p>
                    Have a question about a medicine, product, order,
                    or business supply? Reach out to us.
                </p>

            </div>

        </div>

    </section>


    <!-- CONTACT CONTENT -->
    <section class="section contact-main">

        <div class="container">

            <div class="contact-grid">


                <!-- LEFT -->
                <div class="contact-info">

                    <div class="contact-info-heading">

                        <span class="contact-label">
                            CONTACT INFORMATION
                        </span>

                        <h2>
                            Let's talk.
                        </h2>

                        <p>
                            Choose the easiest way to reach Lakhadatar
                            Pharma. For medicine enquiries, WhatsApp
                            is usually the fastest option.
                        </p>

                    </div>


                    <!-- Phone -->
                    <a href="tel:+918769426133"
                       class="contact-info-card">

                        <div class="contact-info-icon">
                            📞
                        </div>

                        <div>
                            <span>PHONE</span>

                            <strong>
                                +91 8769426133
                            </strong>

                            <p>
                                Call us for general enquiries.
                            </p>
                        </div>

                    </a>


                    <!-- WhatsApp -->
                    <a href="https://wa.me/918769426133"
                       class="contact-info-card"
                       target="_blank"
                       rel="noopener">

                        <div class="contact-info-icon">
                            💬
                        </div>

                        <div>
                            <span>WHATSAPP</span>

                            <strong>
                                Chat with us
                            </strong>

                            <p>
                                Best for medicine enquiries & prescriptions.
                            </p>
                        </div>

                    </a>


                    <!-- Location -->
                    <div class="contact-info-card">

                        <div class="contact-info-icon">
                            📍
                        </div>

                        <div>
                            <span>LOCATION</span>

                            <strong>
                                Lakhadatar Pharma
                            </strong>

                            <p>
                                Near Shree Ram Hospital<br>
                                Alwar, Jaipur Road, Thanagazi,<br>
                                Rajasthan - 301022
                            </p>
                        </div>

                    </div>


                    <!-- Hours -->
                    <div class="contact-info-card">

                        <div class="contact-info-icon">
                            🕐
                        </div>

                        <div>
                            <span>OPENING HOURS</span>

                            <strong>
                                Mon - Sun
                            </strong>

                            <p>
                                8:00 AM - 9:00 PM
                            </p>
                        </div>

                    </div>

                </div>


                <!-- RIGHT FORM -->
                <div class="contact-form-card">

                    <div class="contact-form-header">

                        <span class="contact-label">
                            SEND US A MESSAGE
                        </span>

                        <h2>
                            How can we help?
                        </h2>

                        <p>
                            Send your enquiry and our team will
                            get back to you.
                        </p>

                    </div>


                    <form>

                        <div class="contact-form-row">

                            <div class="form-group">

                                <label class="form-label"
                                       for="contact-name">
                                    Name *
                                </label>

                                <input
                                    type="text"
                                    id="contact-name"
                                    class="form-input"
                                    placeholder="Your name"
                                    required
                                >

                            </div>


                            <div class="form-group">

                                <label class="form-label"
                                       for="contact-mobile">
                                    Mobile *
                                </label>

                                <input
                                    type="tel"
                                    id="contact-mobile"
                                    class="form-input"
                                    placeholder="10-digit mobile number"
                                    required
                                >

                            </div>

                        </div>


                        <div class="form-group">

                            <label class="form-label"
                                   for="contact-message">
                                Message *
                            </label>

                            <textarea
                                id="contact-message"
                                class="form-input"
                                rows="6"
                                placeholder="Tell us how we can help..."
                                required
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="btn btn-primary contact-submit">

                            Send Message

                            <span>→</span>

                        </button>

                    </form>


                    <div class="contact-whatsapp-note">

                        <span>💬</span>

                        <p>
                            Need a faster response?
                            <a href="https://wa.me/918769426133"
                               target="_blank"
                               rel="noopener">
                                Chat with us on WhatsApp
                            </a>
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- BOTTOM CTA -->
    <section class="section contact-bottom">

        <div class="container">

            <div class="contact-bottom-card">

                <div>

                    <span class="contact-label">
                        MEDICINE ENQUIRY
                    </span>

                    <h2>
                        Help... ?
                    </h2>

                    <p>
                        Send us the medicine name or prescription
                        and we'll help you find it.
                    </p>

                </div>

                <a href="https://wa.me/918769426133"
                   class="btn btn-primary"
                   target="_blank"
                   rel="noopener">

                    Ask on WhatsApp

                </a>

            </div>

        </div>

    </section>

</main>

@endsection