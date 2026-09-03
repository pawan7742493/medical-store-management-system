@extends('layouts.customer')

@section('title', 'My Cart')

@section('content')


<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2>My Profile</h2>

            <p class="text-muted mb-0">
                Your registered business information
            </p>

        </div>

        <a href="{{ route('customer.dashboard') }}"
           class="btn btn-secondary">
           ← Back
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-header">

            <h5 class="mb-0">
                Business Information
            </h5>

        </div>


        <div class="card-body">

            <div class="row">


                <div class="col-md-6 mb-4">

                    <strong>Customer Type</strong>

                    <p class="mb-0 mt-1">
                        {{ ucwords(str_replace('_', ' ', $customer->customer_type)) }}
                    </p>

                </div>


                <div class="col-md-6 mb-4">

                    <strong>Customer Name</strong>

                    <p class="mb-0 mt-1">
                        {{ $customer->customer_name }}
                    </p>

                </div>


                <div class="col-md-6 mb-4">

                    <strong>Shop / Organization Name</strong>

                    <p class="mb-0 mt-1">
                        {{ $customer->shop_name }}
                    </p>

                </div>


                <div class="col-md-6 mb-4">

                    <strong>Mobile</strong>

                    <p class="mb-0 mt-1">
                        {{ $customer->mobile }}
                    </p>

                </div>


                <div class="col-md-6 mb-4">

                    <strong>Email</strong>

                    <p class="mb-0 mt-1">
                        {{ $customer->email }}
                    </p>

                </div>


                <div class="col-md-6 mb-4">

                    <strong>City</strong>

                    <p class="mb-0 mt-1">
                        {{ $customer->city }}
                    </p>

                </div>


                <div class="col-md-6 mb-4">

                    <strong>GST Number</strong>

                    <p class="mb-0 mt-1">
                        {{ $customer->gst_number ?? '-' }}
                    </p>

                </div>


                <div class="col-md-6 mb-4">

                    <strong>Drug License Number</strong>

                    <p class="mb-0 mt-1">
                        {{ $customer->drug_license_number ?? '-' }}
                    </p>

                </div>


                <div class="col-md-12 mb-4">

                    <strong>Address</strong>

                    <p class="mb-0 mt-1">
                        {{ $customer->address }}
                    </p>

                </div>


                <div class="col-md-6">

                    <strong>Account Status</strong>

                    <p class="mb-0 mt-1">

                        @if($customer->status === 'active')

                            <span class="badge bg-success">
                                Active
                            </span>

                        @elseif($customer->status === 'pending')

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Rejected
                            </span>

                        @endif

                    </p>

                </div>


                <div class="col-md-6">

                    <strong>Registered On</strong>

                    <p class="mb-0 mt-1">
                        {{ $customer->created_at->format('d M Y, h:i A') }}
                    </p>

                </div>


            </div>

        </div>

    </div>

</div>

@endsection