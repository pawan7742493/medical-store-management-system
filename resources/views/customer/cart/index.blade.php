@extends('layouts.customer')

@section('title', 'My Cart')

@section('content')

<div class="container py-5">

    {{-- Page Header --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2>
                Your Cart
            </h2>

            <p class="text-muted mb-0">
                Review your selected medicines and products.
            </p>

        </div>


        <a
            href="{{ route('customer.medicines.index') }}"
            class="btn btn-secondary"
        >
            ← Continue Shopping
        </a>

    </div>


    {{-- Cart --}}

    <div class="card">

        <div class="card-body">

            @if(empty($cart))

                <div class="text-center py-5">

                    <h5>
                        Your cart is empty
                    </h5>

                    <p class="text-muted">
                        Add medicines or products to your cart.
                    </p>

                    <a
                        href="{{ route('customer.medicines.index') }}"
                        class="btn btn-primary"
                    >
                        Browse Medicines
                    </a>

                </div>

            @else

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>

                                <th>#</th>
                                <th>Item</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>

                            </tr>

                        </thead>


                        <tbody>

                            @php
                                $grandTotal = 0;
                            @endphp


                            @foreach($cart as $key => $item)

                                @php
                                    $itemTotal = $item['price'] * $item['quantity'];
                                    $grandTotal += $itemTotal;
                                @endphp


                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>


                                    <td>
                                        {{ $item['name'] }}
                                    </td>


                                    <td>

                                        @if($item['type'] === 'medicine')

                                            <span class="badge bg-primary">
                                                Medicine
                                            </span>

                                        @else

                                            <span class="badge bg-secondary">
                                                Product
                                            </span>

                                        @endif

                                    </td>


                                    <td>
                                        ₹{{ number_format($item['price'], 2) }}
                                    </td>


                                    <td>

                                        <form
                                            method="POST"
                                            action="{{ route('customer.cart.update', $key) }}"
                                            class="d-flex align-items-center"
                                        >

                                            @csrf

                                            @method('PATCH')


                                            <input
                                                type="hidden"
                                                name="key"
                                                value="{{ $key }}"
                                            >


                                            <input
                                                type="number"
                                                name="quantity"
                                                value="{{ $item['quantity'] }}"
                                                min="1"
                                                class="form-control"
                                                style="width: 80px;"
                                            >


                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-primary ms-2"
                                            >
                                                Update
                                            </button>

                                        </form>

                                    </td>


                                    <td>

                                        ₹{{ number_format(
                                            $itemTotal,
                                            2
                                        ) }}

                                    </td>


                                    <td>

                                        <form
                                            method="POST"
                                            action="{{ route(
                                                'customer.cart.remove',
                                                $key
                                            ) }}"
                                        >

                                            @csrf

                                            @method('DELETE')


                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                            >
                                                Remove
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- Cart Summary --}}

                <div class="row justify-content-end mt-4">

                    <div class="col-md-5">

                        <div class="card bg-light">

                            <div class="card-body">

                                <div class="d-flex justify-content-between mb-2">

                                    <span>
                                        Subtotal
                                    </span>

                                    <strong>
                                        ₹{{ number_format(
                                            $grandTotal,
                                            2
                                        ) }}
                                    </strong>

                                </div>


                                <hr>


                                <div class="d-flex justify-content-between mb-3">

                                    <strong>
                                        Grand Total
                                    </strong>

                                    <strong>
                                        ₹{{ number_format(
                                            $grandTotal,
                                            2
                                        ) }}
                                    </strong>

                                </div>


                                <a
                                    href="{{ route('customer.checkout.index') }}"
                                    class="btn btn-success w-100"
                                >
                                    Proceed to Checkout
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection