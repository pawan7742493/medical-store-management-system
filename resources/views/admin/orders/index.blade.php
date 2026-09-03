@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">

    <h3 class="mb-4">
        Orders
    </h3>


    {{-- Medical Stores --}}

    <div class="card mb-4">

        <div class="card-header">

            <h5 class="mb-0">
                Medical Stores
            </h5>

        </div>


        <div class="card-body">

            <div class="row g-3">

                @forelse($medicalStores as $customer)

                    <div class="col-md-4 col-lg-3">

                        <div class="card h-100 shadow-sm">

                            <div class="card-body">

                                <h5>
                                    {{ $customer->shop_name }}
                                </h5>

                                <p class="text-muted mb-2">

                                    {{ $customer->customer_name }}

                                </p>

                                <span class="badge bg-primary mb-3">

                                    {{ $customer->orders_count }}

                                    Orders

                                </span>


                                <a
                                    href="{{ route('admin.orders.customer', $customer->id) }}"
                                    class="btn btn-primary w-100"
                                >
                                    See Orders
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <p class="text-muted mb-0">
                            No medical store orders found.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>



    {{-- Hospitals --}}

    <div class="card mb-4">

        <div class="card-header">

            <h5 class="mb-0">
                Hospitals
            </h5>

        </div>


        <div class="card-body">

            <div class="row g-3">

                @forelse($hospitals as $customer)

                    <div class="col-md-4 col-lg-3">

                        <div class="card h-100 shadow-sm">

                            <div class="card-body">

                                <h5>
                                    {{ $customer->shop_name }}
                                </h5>

                                <p class="text-muted mb-2">

                                    {{ $customer->customer_name }}

                                </p>

                                <span class="badge bg-primary mb-3">

                                    {{ $customer->orders_count }}

                                    Orders

                                </span>


                                <a
                                    href="{{ route('admin.orders.customer', $customer->id) }}"
                                    class="btn btn-primary w-100"
                                >
                                    See Orders
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <p class="text-muted mb-0">
                            No hospital orders found.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>



    {{-- Clinics --}}

    <div class="card mb-4">

        <div class="card-header">

            <h5 class="mb-0">
                Clinics
            </h5>

        </div>


        <div class="card-body">

            <div class="row g-3">

                @forelse($clinics as $customer)

                    <div class="col-md-4 col-lg-3">

                        <div class="card h-100 shadow-sm">

                            <div class="card-body">

                                <h5>
                                    {{ $customer->shop_name }}
                                </h5>

                                <p class="text-muted mb-2">

                                    {{ $customer->customer_name }}

                                </p>

                                <span class="badge bg-primary mb-3">

                                    {{ $customer->orders_count }}

                                    Orders

                                </span>


                                <a
                                    href="{{ route('admin.orders.customer', $customer->id) }}"
                                    class="btn btn-primary w-100"
                                >
                                    See Orders
                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <p class="text-muted mb-0">
                            No clinic orders found.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection