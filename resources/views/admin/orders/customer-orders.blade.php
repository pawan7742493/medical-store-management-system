@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3>
                {{ $customer->shop_name }}
            </h3>

            <p class="text-muted mb-0">

                {{ $customer->customer_name }}

                |

                {{ $customer->mobile }}

            </p>

        </div>


        <a
            href="{{ route('admin.orders.index') }}"
            class="btn btn-secondary"
        >
            Back to Customers
        </a>

    </div>


    <div class="card">

        <div class="card-header">

            <h5 class="mb-0">
                Customer Orders
            </h5>

            <form
    method="GET"
    action="{{ route('admin.orders.customer', $customer->id) }}"
    class="mb-4"
>

    <div class="row">

        <div class="col-md-6">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search Order Number..."
                value="{{ request('search') }}"
            >

        </div>


        <div class="col-md-2">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Search
            </button>

        </div>


        <div class="col-md-2">

            @if(request('search'))

                <a
                    href="{{ route('admin.orders.customer', $customer->id) }}"
                    class="btn btn-secondary"
                >
                    Clear
                </a>

            @endif

        </div>

    </div>

</form>

        </div>


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
                                    ₹{{ number_format($order->total_amount, 2) }}
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

                                    @elseif($order->status === 'processing')

                                        <span class="badge bg-primary">
                                            Processing
                                        </span>

                                    @elseif($order->status === 'shipped')

                                        <span class="badge bg-secondary">
                                            Shipped
                                        </span>

                                    @elseif($order->status === 'delivered')

                                        <span class="badge bg-success">
                                            Delivered
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Cancelled
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $order->created_at->format('d M Y') }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route('admin.orders.show', $order->id) }}"
                                        class="btn btn-sm btn-primary"
                                    >
                                        View
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center">

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