@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">

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
            href="{{ route('admin.orders.customer', $order->customer_id) }}"
            class="btn btn-secondary"
        >
            Back to Customer Orders
        </a>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            @foreach($errors->all() as $error)

                <div>{{ $error }}</div>

            @endforeach

        </div>

    @endif


    <div class="row g-4">


        {{-- Customer Information --}}

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">

                    <h5 class="mb-0">
                        Customer Information
                    </h5>

                </div>


                <div class="card-body">

                    <p>

                        <strong>Name:</strong><br>

                        {{ $order->customer->customer_name ?? '-' }}

                    </p>


                    <p>

                        <strong>Organization:</strong><br>

                        {{ $order->customer->shop_name ?? '-' }}

                    </p>


                    <p>

                        <strong>Type:</strong><br>

                        {{ ucwords(
                            str_replace(
                                '_',
                                ' ',
                                $order->customer->customer_type ?? ''
                            )
                        ) }}

                    </p>


                    <p>

                        <strong>Mobile:</strong><br>

                        {{ $order->customer->mobile ?? '-' }}

                    </p>


                    <p>

                        <strong>Email:</strong><br>

                        {{ $order->customer->email ?? '-' }}

                    </p>

                </div>

            </div>

        </div>


        {{-- Delivery Information --}}

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">

                    <h5 class="mb-0">
                        Delivery Information
                    </h5>

                </div>


                <div class="card-body">

                    <p>

                        <strong>Address:</strong><br>

                        {{ $order->shipping_address }}

                    </p>


                    <p>

                        <strong>City:</strong><br>

                        {{ $order->city }}

                    </p>

                </div>

            </div>

        </div>


        {{-- Order Status --}}

        <div class="col-md-4">

            <div class="card">

                <div class="card-header">

                    <h5 class="mb-0">
                        Order Status
                    </h5>

                </div>


                <div class="card-body">

                    <form
                        method="POST"
                        action="{{ route(
                            'admin.orders.update-status',
                            $order->id
                        ) }}"
                    >

                        @csrf

                        @method('PATCH')


                        <label class="form-label">
                            Change Status
                        </label>


                        <select
                            name="status"
                            class="form-control mb-3"
                        >

                            <option
                                value="pending"
                                {{ $order->status === 'pending' ? 'selected' : '' }}
                            >
                                Pending
                            </option>


                            <option
                                value="confirmed"
                                {{ $order->status === 'confirmed' ? 'selected' : '' }}
                            >
                                Confirmed
                            </option>


                            <!-- <option
                                value="processing"
                                {{ $order->status === 'processing' ? 'selected' : '' }}
                            >
                                Processing
                            </option>


                            <option
                                value="shipped"
                                {{ $order->status === 'shipped' ? 'selected' : '' }}
                            >
                                Shipped
                            </option> -->


                            <option
                                value="delivered"
                                {{ $order->status === 'delivered' ? 'selected' : '' }}
                            >
                                Delivered
                            </option>

<!-- 
                            <option
                                value="cancelled"
                                {{ $order->status === 'cancelled' ? 'selected' : '' }}
                            >
                                Cancelled
                            </option> -->

                        </select>


                        <button
                            type="submit"
                            class="btn btn-primary w-100"
                        >
                            Update Status
                        </button>

                    </form>

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
                                    <th>Type</th>
                                    <th>Item</th>
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
                                            {{ $item->item_name }}
                                        </td>


                                        <td>
                                            ₹{{ number_format($item->price, 2) }}
                                        </td>


                                        <td>
                                            {{ $item->quantity }}
                                        </td>


                                        <td>
                                            ₹{{ number_format($item->total, 2) }}
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


                            <tfoot>

                                <tr>

                                    <th
                                        colspan="5"
                                        class="text-end"
                                    >
                                        Grand Total:
                                    </th>

                                    <th>

                                        ₹{{ number_format(
                                            $order->total_amount,
                                            2
                                        ) }}

                                    </th>

                                </tr>

                            </tfoot>

                        </table>

                    </div>

                </div>

            </div>

        </div>

            <!-- @if($order->invoice)

        <a
            href="{{ route('admin.invoices.show', $order->invoice->id) }}"
            class="btn btn-success w-100 mt-2"
        >
            View Invoice
        </a>

    @endif   -->


    </div>

</div>

@endsection