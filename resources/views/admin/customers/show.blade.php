@extends('layouts.admin')

@section('content')

<main class="dashboard-content">

    <div class="container-fluid p-4">

<div class="d-flex justify-content-between align-items-center mb-4">

    <h3>Customer Details</h3>

    <div>

        <a
            href="{{ route('customers.edit', $customer->id) }}"
            class="btn btn-primary"
        >
            Edit Customer
        </a>

        <a
            href="{{ route('customers.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

</div>

        <div class="card">

            <div class="card-header">
                <h5 class="mb-0">Customer Information</h5>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <strong>Customer Type</strong>

                        <p>
                            {{ ucwords(str_replace('_', ' ', $customer->customer_type)) }}
                        </p>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>Customer Name</strong>

                        <p>
                            {{ $customer->customer_name }}
                        </p>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>Shop / Organization</strong>

                        <p>
                            {{ $customer->shop_name ?? '-' }}
                        </p>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>Mobile</strong>

                        <p>
                            {{ $customer->mobile }}
                        </p>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>Email</strong>

                        <p>
                            {{ $customer->email ?? '-' }}
                        </p>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>City</strong>

                        <p>
                            {{ $customer->city }}
                        </p>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>GST Number</strong>

                        <p>
                            {{ $customer->gst_number ?? '-' }}
                        </p>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>Drug License Number</strong>

                        <p>
                            {{ $customer->drug_license_number ?? '-' }}
                        </p>

                    </div>


                    <div class="col-md-12 mb-3">

                        <strong>Address</strong>

                        <p>
                            {{ $customer->address }}
                        </p>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>Status</strong>

                        <p>

                            @if($customer->status === 'pending')

                                <span class="badge bg-warning text-dark">
                                    Pending
                                </span>

                            @elseif($customer->status === 'active')

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @elseif($customer->status === 'rejected')

                                <span class="badge bg-danger">
                                    Rejected
                                </span>

                            @endif

                        </p>

                    </div>


                    <div class="col-md-6 mb-3">

                        <strong>Registered On</strong>

                        <p>
                           {{ $customer->created_at?->format('d M Y, h:i A') ?? '-' }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

@endsection