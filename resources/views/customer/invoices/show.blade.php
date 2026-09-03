@extends('layouts.customer')

@section('title', 'Invoice ' . $invoice->invoice_number)

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>
            Invoice
        </h3>

        <div>

            <a
                href="{{ route('customer.invoices.index') }}"
                class="btn btn-secondary"
            >
                Back
            </a>

            <!-- <button
                onclick="window.print()"
                class="btn btn-primary"
            >
                Print Invoice
            </button> -->

        </div>

    </div>


    <div class="card">

        <div class="card-body p-5">

            <div class="row mb-4">

                <div class="col-md-6">

                    <h2>
                        Lakhadatar Pharma
                    </h2>

                    <p class="text-muted">
                        Pharma & Medical Store
                    </p>

                </div>

                <div class="col-md-6 text-md-end">

                    <h4>
                        INVOICE
                    </h4>

                    <p class="mb-1">

                        <strong>
                            Invoice No:
                        </strong>

                        {{ $invoice->invoice_number }}

                    </p>

                    <p>

                        <strong>
                            Date:
                        </strong>

                        {{ $invoice->invoice_date->format('d M Y') }}

                    </p>

                </div>

            </div>


            <hr>


            <div class="row my-4">

                <div class="col-md-6">

                    <h5>
                        Bill To
                    </h5>

                    <p class="mb-1">

                        <strong>
                            {{ $invoice->order->customer->customer_name ?? '-' }}
                        </strong>

                    </p>

                    <p class="mb-1">
                        {{ $invoice->order->customer->shop_name ?? '-' }}
                    </p>

                    <p class="mb-1">
                        {{ $invoice->order->customer->mobile ?? '-' }}
                    </p>

                </div>


                <div class="col-md-6 text-md-end">

                    <h5>
                        Order Information
                    </h5>

                    <p class="mb-1">

                        <strong>
                            Order Number:
                        </strong>

                        {{ $invoice->order->order_number }}

                    </p>

                    <p>

                        <strong>
                            Status:
                        </strong>

                        {{ ucfirst($invoice->order->status) }}

                    </p>

                </div>

            </div>


            <div class="table-responsive">

                <table class="table table-bordered align-middle">

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

                        @forelse($invoice->order->items as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->item_name }}
                                </td>

                                <td>

                                    @if($item->item_type === 'medicine')
                                        Medicine
                                    @else
                                        Product
                                    @endif

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

                </table>

            </div>


            <div class="row justify-content-end mt-4">

                <div class="col-md-5">

                    <table class="table">

                        <tr>

                            <th>
                                Subtotal
                            </th>

                            <td class="text-end">
                                ₹{{ number_format(
                                    $invoice->subtotal,
                                    2
                                ) }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Tax
                            </th>

                            <td class="text-end">
                                ₹{{ number_format(
                                    $invoice->tax_amount,
                                    2
                                ) }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Grand Total
                            </th>

                            <th class="text-end">
                                ₹{{ number_format(
                                    $invoice->total_amount,
                                    2
                                ) }}
                            </th>

                        </tr>

                    </table>

                </div>

            </div>


            <hr>


            <div class="text-center mt-4">

                <p class="mb-0">
                    Thank you for your business.
                </p>

            </div>

        </div>

    </div>

</div>


<style>

@media print {

    body * {
        visibility: hidden;
    }

    .card,
    .card * {
        visibility: visible;
    }

    .card {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        border: none;
    }

    .btn,
    a {
        display: none !important;
    }

}

</style>

@endsection