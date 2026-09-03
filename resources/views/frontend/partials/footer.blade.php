<footer class="footer">

    <div class="container">

        <div class="footer-main">

            <!-- Brand -->
            <div class="footer-brand-area">

                <a href="{{ url('/home') }}" class="footer-logo">

                    <span class="footer-logo-icon">
                        <img
                            src="{{ asset('frontend/images/3.png') }}"
                            alt="Lakhadatar Pharma"
                        >
                    </span>

                    <span>Lakhadatar Pharma</span>

                </a>

                <p class="footer-description">
                    Genuine medicines and healthcare products with
                    reliable local supply and convenient delivery.
                </p>

                <div class="footer-trust">
                    <span>✓ Genuine Products</span>
                    <span>✓ Local Delivery</span>
                </div>

            </div>


            <!-- Company -->
            <div class="footer-column">

                <h4>Company</h4>

                <a href="{{ url('/frontend/about') }}">
                    About Us
                </a>

                <a href="{{ url('/frontend/contact') }}">
                    Contact
                </a>

                <a href="{{ url('/frontend/business') }}">
                    For Businesses
                </a>

            </div>


            <!-- Shop -->
            <div class="footer-column">

                <h4>Shop</h4>

                <a href="{{ url('/frontend/medicines') }}">
                    Medicines
                </a>

                <a href="{{ url('/frontend/products') }}">
                    Healthcare Products
                </a>

                <a href="{{ url('/frontend/cart') }}">
                    Cart
                </a>

            </div>


            <!-- Information -->
            <div class="footer-column">

                <h4>Information</h4>

                <a href="#">
                    Privacy Policy
                </a>

                <a href="#">
                    Terms of Use
                </a>

                <a href="#">
                    Refund Policy
                </a>

                <a href="#">
                    Shipping Policy
                </a>

            </div>

        </div>


        <!-- Bottom -->

        <div class="footer-bottom">

            <span>
                © 2026 Lakhadatar Pharma
            </span>

            <span>
                Minimum order ₹100 · Local delivery available
            </span>

        </div>

    </div>

</footer>