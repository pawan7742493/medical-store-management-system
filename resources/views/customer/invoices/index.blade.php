@extends('layouts.customer')

@section('title', 'My Invoices')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2>
                My Invoices
            </h2>

            <p class="text-muted mb-0">
                View your invoice history
            </p>

        </div>

        <a
            href="{{ route('customer.dashboard') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>


    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>
                            <th>#</th>
                            <th>Invoice Number</th>
                            <th>Order Number</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($invoices as $invoice)

                            <tr>

                                <td>
                                    {{ $invoices->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    {{ $invoice->invoice_number }}
                                </td>

                                <td>
                                    {{ $invoice->order->order_number ?? '-' }}
                                </td>

                                <td>
                                    ₹{{ number_format(
                                        $invoice->total_amount,
                                        2
                                    ) }}
                                </td>

                                <td>
                                    {{ $invoice->invoice_date->format('d M Y') }}
                                </td>

                                <td>

                                    <a
                                        href="{{ route(
                                            'customer.invoices.show',
                                            $invoice->id
                                        ) }}"
                                        class="btn btn-sm btn-primary"
                                    >
                                        View Invoice
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center"
                                >
                                    No Invoices Found
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <div class="mt-3">

                {{ $invoices->links() }}

            </div>

        </div>

    </div>

</div>

@endsection