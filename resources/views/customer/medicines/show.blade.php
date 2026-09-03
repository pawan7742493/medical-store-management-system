@extends('layouts.customer')

@section('title', 'Medicines')

@section('content')

<div class="container py-5">

    <div class="mb-4">

        <a href="{{ route('customer.medicines.index') }}" class="btn btn-secondary mb-3">
            ← Back to Medicines
        </a>
    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="row g-5">


                <div class="col-md-6">

                    <h2>
                        {{ $medicine->medicine_name }}
                    </h2>

                    <p class="text-muted">
                        {{ $medicine->company_name ?? '-' }}
                    </p>


                    <div class="mb-3">

                        <strong>Category:</strong>

                        {{ $medicine->category->category_name ?? '-' }}

                    </div>


                    <div class="mb-3">

                        <strong>Batch Number:</strong>

                        {{ $medicine->batch_no ?? '-' }}

                    </div>


                    <div class="mb-3">

                        <strong>Expiry Date:</strong>

                        {{ $medicine->expiry_date
                            ? \Carbon\Carbon::parse($medicine->expiry_date)->format('d M Y')
                            : '-' }}

                    </div>


                    <div class="mb-3">

                        <strong>GST:</strong>

                        {{ $medicine->gst ?? 0 }}%

                    </div>


                    <div class="mb-4">

                        <strong>Description:</strong>

                        <p class="mt-2">
                            {{ $medicine->description ?? 'No description available.' }}
                        </p>

                    </div>


                    <h3 class="mb-4">

                        ₹{{ number_format($medicine->retail_price, 2) }}

                    </h3>


                    @if($medicine->stock > 0)

                        <div class="mb-3">

                            <span class="badge bg-success">
                                In Stock
                            </span>

                        </div>


                        <form
                            method="POST"
                            action="{{ route('customer.cart.add-medicine', $medicine->id) }}"
                        >

                            @csrf


                            <div class="row align-items-end">

                                <div class="col-md-4">

                                    <label
                                        for="quantity"
                                        class="form-label"
                                    >
                                        Quantity
                                    </label>

                                    <input
                                        type="number"
                                        id="quantity"
                                        name="quantity"
                                        class="form-control"
                                        value="1"
                                        min="1"
                                        max="{{ $medicine->stock }}"
                                        required
                                    >

                                </div>


                                <div class="col-md-8">

                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >
                                        Add to Cart
                                    </button>

                                </div>

                            </div>

                        </form>

                    @else

                        <span class="badge bg-danger mb-3">
                            Out of Stock
                        </span>

                        <br>

                        <button
                            class="btn btn-secondary"
                            disabled
                        >
                            Add to Cart
                        </button>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>


@endsection