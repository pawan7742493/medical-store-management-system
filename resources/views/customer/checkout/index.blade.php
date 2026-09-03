@extends('layouts.customer')

@section('title', 'My Cart')

@section('content')


<div class="container py-5">

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>
        Checkout
    </h2>

    <a
        href="{{ route('customer.cart.index') }}"
        class="btn btn-secondary"
    >
        ← Back
    </a>

</div>


    @if($errors->any())

        <div class="alert alert-danger">

            @foreach($errors->all() as $error)

                <div>{{ $error }}</div>

            @endforeach

        </div>

    @endif


    <div class="row g-4">


        <!-- Customer Information -->

        <div class="col-md-7">

            <div class="card">

                <div class="card-header">

                    <h5 class="mb-0">
                        Delivery Information
                    </h5>

                </div>


                <div class="card-body">

                    <form
                        method="POST"
                        action="{{ route('customer.checkout.place-order') }}"
                    >

                        @csrf


                        <div class="mb-3">

                            <label class="form-label">
                                Customer Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $customer->customer_name }}"
                                readonly
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Shop / Organization
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $customer->shop_name }}"
                                readonly
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Mobile
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $customer->mobile }}"
                                readonly
                            >

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Delivery Address
                            </label>

                            <textarea
                                name="shipping_address"
                                rows="4"
                                class="form-control"
                                required
                            >{{ old('shipping_address', $customer->address) }}</textarea>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                City
                            </label>

                            <input
                                type="text"
                                name="city"
                                class="form-control"
                                value="{{ old('city', $customer->city) }}"
                                required
                            >

                        </div>


                        <button
                            type="submit"
                            class="btn btn-success w-100"
                        >
                            Place Order
                        </button>

                    </form>

                </div>

            </div>

        </div>


        <!-- Order Summary -->

        <div class="col-md-5">

            <div class="card">

                <div class="card-header">

                    <h5 class="mb-0">
                        Order Summary
                    </h5>

                </div>


                <div class="card-body">

                    @foreach($cart as $item)

                        @php
                            $itemTotal = $item['price'] * $item['quantity'];
                        @endphp

                        <div class="d-flex justify-content-between mb-3">

                            <div>

                                <strong>
                                    {{ $item['name'] }}
                                </strong>

                                <br>

                                <small class="text-muted">

                                    {{ ucfirst($item['type']) }}

                                    ×

                                    {{ $item['quantity'] }}

                                </small>

                            </div>


                            <div>

                                ₹{{ number_format($itemTotal, 2) }}

                            </div>

                        </div>

                    @endforeach


                    <hr>


                    <div class="d-flex justify-content-between">

                        <strong>
                            Grand Total
                        </strong>

                        <strong>
                            ₹{{ number_format($grandTotal, 2) }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>


    </div>

</div>

@endsection