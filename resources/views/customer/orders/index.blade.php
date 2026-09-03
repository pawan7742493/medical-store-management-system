@extends('layouts.customer')

@section('title', 'My Orders')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2>
                My Orders
            </h2>

            <p class="text-muted mb-0">
                View your orders and their current status.
            </p>

        </div>

        <a
            href="{{ route('customer.dashboard') }}"
            class="btn btn-secondary"
        >
            ← Back
        </a>

    </div>


    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>Order Number</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($orders as $order)

                            <tr>

                                <td>
                                    {{ $orders->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    {{ $order->order_number }}
                                </td>

                                <td>
                                    ₹{{ number_format(
                                        $order->total_amount,
                                        2
                                    ) }}
                                </td>

                                <td>

                                    @if($order->status === 'pending')

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @elseif($order->status === 'confirmed')

                                        <span class="badge bg-info">
                                            Confirmed
                                        </span>

                                    @elseif($order->status === 'delivered')

                                        <span class="badge bg-success">
                                            Delivered
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $order->created_at->format('d M Y') }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route(
                                            'customer.orders.show',
                                            $order->id
                                        ) }}"
                                        class="btn btn-sm btn-primary"
                                    >
                                        View
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center"
                                >
                                    No Orders Found
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <div class="mt-3">

                {{ $orders->links() }}

            </div>

        </div>

    </div>

</div>

@endsection