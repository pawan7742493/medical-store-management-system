@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>
            Invoices
        </h3>

    </div>


    <!-- <div class="card"> -->

        <!-- <div class="card-body"> -->

        <form
    method="GET"
    action="{{ route('admin.invoices.index') }}"
    class="mb-4"
>

    <div class="row g-2">

        <div class="col-md-6">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search invoice, order, customer..."
                value="{{ request('search') }}"
            >

        </div>


        <div class="col-md-2">

            <button
                type="submit"
                class="btn btn-primary w-100"
            >
                Search
            </button>

        </div>


        @if(request('search'))

            <div class="col-md-2">

                <a
                    href="{{ route('admin.invoices.index') }}"
                    class="btn btn-secondary w-100"
                >
                    Clear
                </a>

            </div>

        @endif

    </div>

</form>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>Invoice Number</th>
                            <th>Order Number</th>
                            <th>Customer</th>
                            <th>Organization</th>
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
                                    {{ $invoice->order->customer->customer_name ?? '-' }}
                                </td>


                                <td>
                                    {{ $invoice->order->customer->shop_name ?? '-' }}
                                </td>


                                <td>
                                    ₹{{ number_format($invoice->total_amount, 2) }}
                                </td>


                                <td>
                                    {{ $invoice->invoice_date->format('d M Y') }}
                                </td>


                                <td>

                                    <a
                                        href="{{ route('admin.invoices.show', $invoice->id) }}"
                                        class="btn btn-sm btn-primary"
                                    >
                                        View
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
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