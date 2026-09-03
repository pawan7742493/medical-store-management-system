@extends('layouts.customer')

@section('title', 'Customer Dashboard')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <h2>
            Customer Dashboard
        </h2>

        <p class="text-muted">
            Welcome to Lakhadatar Pharma.
        </p>

    </div>


    <div class="row g-4">

        {{-- Medicines --}}

        <div class="col-md-4">

            <div class="card h-100 shadow-sm">

                <div class="card-body">

                    <h5 class="card-title">
                        Medicines
                    </h5>

                    <p class="card-text">
                        Browse available medicines.
                    </p>

                    <a
                        href="{{ route('customer.medicines.index') }}"
                        class="btn btn-primary"
                    >
                        Browse Medicines
                    </a>

                </div>

            </div>

        </div>


        {{-- Products --}}

        <div class="col-md-4">

            <div class="card h-100 shadow-sm">

                <div class="card-body">

                    <h5 class="card-title">
                        Products
                    </h5>

                    <p class="card-text">
                        Browse available products.
                    </p>

                    <a
                        href="{{ route('customer.products.index') }}"
                        class="btn btn-primary"
                    >
                        Browse Products
                    </a>

                </div>

            </div>

        </div>


        {{-- Orders --}}

        <div class="col-md-4">

            <div class="card h-100 shadow-sm">

                <div class="card-body">

                    <h5 class="card-title">
                        My Orders
                    </h5>

                    <p class="card-text">
                        View your orders and their current status.
                    </p>

                    <a
                        href="{{ route('customer.orders.index') }}"
                        class="btn btn-primary"
                    >
                        My Orders
                    </a>

                </div>

            </div>

        </div>


        {{-- Invoices --}}

        <div class="col-md-4">

            <div class="card h-100 shadow-sm">

                <div class="card-body">

                    <h5 class="card-title">
                        Invoices
                    </h5>

                    <p class="card-text">
                        View and print your invoices.
                    </p>

                    <a
                        href="{{ route('customer.invoices.index') }}"
                        class="btn btn-success"
                    >
                        My Invoices
                    </a>

                </div>

            </div>

        </div>


        {{-- Profile --}}

        <div class="col-md-4">

            <div class="card h-100 shadow-sm">

                <div class="card-body">

                    <h5 class="card-title">
                        My Profile
                    </h5>

                    <p class="card-text">
                        View and manage your business information.
                    </p>

                    <a
                        href="{{ route('customer.profile') }}"
                        class="btn btn-primary"
                    >
                        My Profile
                    </a>

                </div>

            </div>

        </div>


        {{-- Account Settings --}}

        <div class="col-md-4">

            <div class="card h-100 shadow-sm">

                <div class="card-body">

                    <h5 class="card-title">
                        Account
                    </h5>

                    <p class="card-text">
                        Account settings will be available later.
                    </p>

                    <button
                        type="button"
                        class="btn btn-secondary"
                        disabled
                    >
                        Account Settings
                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection