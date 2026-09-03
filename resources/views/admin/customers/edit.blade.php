@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>Edit Customer</h3>

        <a
            href="{{ route('customers.show', $customer->id) }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>


    <div class="card">

        <div class="card-header">

            <h5 class="mb-0">
                Customer Information
            </h5>

        </div>


        <div class="card-body">

            <form
                method="POST"
                action="{{ route('customers.update', $customer->id) }}"
            >

                @csrf

                @method('PUT')


                {{-- Customer Type --}}

                <div class="mb-3">

                    <label class="form-label">
                        Customer Type
                    </label>

                    <select
                        name="customer_type"
                        class="form-select"
                        required
                    >

                        <option
                            value="medical_store"
                            {{ $customer->customer_type === 'medical_store' ? 'selected' : '' }}
                        >
                            Medical Store
                        </option>

                        <option
                            value="hospital"
                            {{ $customer->customer_type === 'hospital' ? 'selected' : '' }}
                        >
                            Hospital
                        </option>

                        <option
                            value="clinic"
                            {{ $customer->customer_type === 'clinic' ? 'selected' : '' }}
                        >
                            Clinic
                        </option>

                    </select>

                </div>


                {{-- Customer Name --}}

                <div class="mb-3">

                    <label class="form-label">
                        Customer Name
                    </label>

                    <input
                        type="text"
                        name="customer_name"
                        class="form-control"
                        value="{{ old('customer_name', $customer->customer_name) }}"
                        required
                    >

                </div>


                {{-- Shop / Organization --}}

                <div class="mb-3">

                    <label class="form-label">
                        Shop / Organization
                    </label>

                    <input
                        type="text"
                        name="shop_name"
                        class="form-control"
                        value="{{ old('shop_name', $customer->shop_name) }}"
                    >

                </div>


                {{-- Mobile --}}

                <div class="mb-3">

                    <label class="form-label">
                        Mobile
                    </label>

                    <input
                        type="text"
                        name="mobile"
                        class="form-control"
                        value="{{ old('mobile', $customer->mobile) }}"
                        maxlength="10"
                        pattern="[0-9]{10}"
                        inputmode="numeric"
                        required
                    >

                </div>


                {{-- Email --}}

                <div class="mb-3">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $customer->email) }}"
                    >

                </div>


                {{-- Address --}}

                <div class="mb-3">

                    <label class="form-label">
                        Address
                    </label>

                    <textarea
                        name="address"
                        class="form-control"
                        rows="3"
                        required
                    >{{ old('address', $customer->address) }}</textarea>

                </div>


                {{-- City --}}

                <div class="mb-3">

                    <label class="form-label">
                        City
                    </label>

                    <input
                        type="text"
                        name="city"
                        class="form-control"
                        value="{{ old('city', $customer->city) }}"
                        required
                    >

                </div>


                {{-- GST Number --}}

                <div class="mb-3">

                    <label class="form-label">
                        GST Number
                    </label>

                    <input
                        type="text"
                        name="gst_number"
                        class="form-control"
                        value="{{ old('gst_number', $customer->gst_number) }}"
                    >

                </div>


                {{-- Drug License Number --}}

                <div class="mb-3">

                    <label class="form-label">
                        Drug License Number
                    </label>

                    <input
                        type="text"
                        name="drug_license_number"
                        class="form-control"
                        value="{{ old('drug_license_number', $customer->drug_license_number) }}"
                    >

                </div>


                {{-- Status --}}

                <div class="mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select"
                        required
                    >

                        <option
                            value="pending"
                            {{ $customer->status === 'pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="active"
                            {{ $customer->status === 'active' ? 'selected' : '' }}
                        >
                            Active
                        </option>

                        <!-- <option
                            value="inactive"
                            {{ $customer->status === 'inactive' ? 'selected' : '' }}
                        >
                            Inactive
                        </option> -->

                        <option
                            value="rejected"
                            {{ $customer->status === 'rejected' ? 'selected' : '' }}
                        >
                            Rejected
                        </option>

                    </select>

                </div>


                <button type="submit" class="btn btn-primary">
                   Update Customer
                </button>


                <a
                    href="{{ route('customers.show', $customer->id) }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection