@extends('layouts.customer')

@section('title', 'Order ' . $order->order_number)

@section('content')

<div class="container py-5">

    {{-- Header --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3>
                Order {{ $order->order_number }}
            </h3>

            <p class="text-muted mb-0">
                {{ $order->created_at->format('d M Y, h:i A') }}
            </p>

        </div>

        <a
            href="{{ route('customer.orders.index') }}"
            class="btn btn-secondary"
        >
            ← Back to Orders
        </a>

    </div>


    {{-- Success Message --}}

    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    <div class="row g-4">


        {{-- Order Status --}}

        <div class="col-md-4">

            <div class="card h-100">

                <div class="card-header">

                    <h5 class="mb-0">
                        Order Status
                    </h5>

                </div>

                <div class="card-body">

                    @if($order->status === 'pending')

                        <span class="badge bg-warning text-dark fs-6">
                            Pending
                        </span>

                        <p class="text-muted mt-3 mb-0">
                            Your order is waiting for confirmation.
                        </p>

                    @elseif($order->status === 'confirmed')

                        <span class="badge bg-info fs-6">
                            Confirmed
                        </span>

                        <p class="text-muted mt-3 mb-0">
                            Your order has been confirmed.
                        </p>

                    @elseif($order->status === 'delivered')

                        <span class="badge bg-success fs-6">
                            Delivered
                        </span>

                        <p class="text-muted mt-3 mb-0">
                            Your order has been delivered.
                        </p>

                    @endif

                </div>

            </div>

        </div>


        {{-- Order Information --}}

        <div class="col-md-4">

            <div class="card h-100">

                <div class="card-header">

                    <h5 class="mb-0">
                        Order Information
                    </h5>

                </div>

                <div class="card-body">

                    <p>

                        <strong>
                            Order Number:
                        </strong>

                        <br>

                        {{ $order->order_number }}

                    </p>

                    <p>

                        <strong>
                            Order Date:
                        </strong>

                        <br>

                        {{ $order->created_at->format('d M Y') }}

                    </p>

                    <p class="mb-0">

                        <strong>
                            Total:
                        </strong>

                        <br>

                        ₹{{ number_format(
                            $order->total_amount,
                            2
                        ) }}

                    </p>

                </div>

            </div>

        </div>


        {{-- Delivery Information --}}

        <div class="col-md-4">

            <div class="card h-100">

                <div class="card-header">

                    <h5 class="mb-0">
                        Delivery Information
                    </h5>

                </div>

                <div class="card-body">

                    <p>

                        <strong>
                            Address:
                        </strong>

                        <br>

                        {{ $order->shipping_address ?? '-' }}

                    </p>

                    <p class="mb-0">

                        <strong>
                            City:
                        </strong>

                        <br>

                        {{ $order->city ?? '-' }}

                    </p>

                </div>

            </div>

        </div>


        {{-- Order Items --}}

        <div class="col-12">

            <div class="card">

                <div class="card-header">

                    <h5 class="mb-0">
                        Order Items
                    </h5>

                </div>

                <div class="card-body">

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

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($order->items as $item)

                                    <tr>

                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>
                                            {{ $item->item_name }}
                                        </td>

                                        <td>

                                            @if($item->item_type === 'medicine')

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
                                            ₹{{ number_format(
                                                $item->price,
                                                2
                                            ) }}
                                        </td>

                                        <td>
                                            {{ $item->quantity }}
                                        </td>

                                        <td>
                                            ₹{{ number_format(
                                                $item->total,
                                                2
                                            ) }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="6"
                                            class="text-center"
                                        >
                                            No Items Found
                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Invoice Button --}}

                    @if($order->invoice)

                        <div class="mt-3">

                            <a
                                href="{{ route(
                                    'customer.invoices.show',
                                    $order->invoice->id
                                ) }}"
                                class="btn btn-success"
                            >
                                View Invoice
                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection