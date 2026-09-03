<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Lakhadatar Pharma')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        .cart-link {
            text-decoration: none;
            color: white;
            font-size: 16px;
        }

        .cart-link:hover {
            color: #ddd;
        }

        .cart-badge {
            font-size: 11px;
            margin-left: 4px;
        }


        @media (max-width: 576px) {

            .navbar .container {
                flex-wrap: wrap;
            }

            .navbar-brand {
                width: 100%;
                margin-bottom: 8px;
            }

            .navbar-right {
                width: 100%;
                display: flex;
                align-items: center;
            }

            .customer-name {
                margin-right: auto !important;
            }

            .cart-link {
                margin-right: 15px;
            }

        }

    </style>

</head>


<body>


{{-- =========================
     CUSTOMER NAVBAR
========================= --}}

<nav class="navbar navbar-expand-lg bg-dark navbar-dark">

    <div class="container">


        {{-- Brand --}}

        <a
            class="navbar-brand"
            href="{{ route('customer.dashboard') }}"
        >
            Lakhadatar Pharma
        </a>


        {{-- Right Side --}}

        <div class="navbar-right d-flex align-items-center">


            {{-- Customer Name --}}

            <span class="text-white customer-name me-4">

                Welcome,
                {{ Auth::user()->name }}

            </span>


            {{-- Cart --}}

            <a
                href="{{ route('customer.cart.index') }}"
                class="cart-link"
            >

                🛒 Cart

                @php

                    $cart = session('cart', []);

                    $cartCount = 0;

                    foreach ($cart as $item) {

                        $cartCount += $item['quantity'];

                    }

                @endphp


                @if($cartCount > 0)

                    <span class="badge bg-danger cart-badge">

                        {{ $cartCount }}

                    </span>

                @endif

            </a>


            {{-- Logout --}}

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="ms-3"
            >

                @csrf

                <button
                    type="submit"
                    class="btn btn-outline-light btn-sm"
                >
                    Logout
                </button>

            </form>


        </div>

    </div>

</nav>


{{-- =========================
     PAGE CONTENT
========================= --}}

<main>

    @yield('content')

</main>


</body>

</html>