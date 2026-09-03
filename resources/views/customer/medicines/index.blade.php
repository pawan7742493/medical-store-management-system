@extends('layouts.customer')

@section('title', 'Medicines')

@section('content')




<div class="container py-5">

<form
    method="GET"
    action="{{ route('customer.medicines.index') }}"
    class="mb-4"
>

    <div class="d-flex gap-2">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search medicine, company or batch..."
            value="{{ request('search') }}"
        >

        <button
            type="submit"
            class="btn btn-primary"
            style="white-space: nowrap;"
        >
            Search
        </button>

        @if(request('search'))

            <a
                href="{{ route('customer.medicines.index') }}"
                class="btn btn-secondary"
                style="white-space: nowrap;"
            >
                Clear
            </a>

        @endif

    </div>

</form>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2>Medicines</h2>

            <p class="text-muted mb-0">
                Browse available medicines
            </p>

        </div>

        

        <a href="{{ route('customer.dashboard') }}"
           class="btn btn-secondary mb-3">
            ← Back
        </a>

    </div>

    


    <div class="row g-4">

        @forelse($medicines as $medicine)

            <div class="col-md-4 col-lg-3">

                <div class="card h-100 shadow-sm">

                    <div class="card-body">

                        <h5 class="card-title">
                            {{ $medicine->medicine_name }}
                        </h5>


                        <p class="text-muted mb-2">

                            Company:

                            {{ $medicine->company_name ?? '-' }}

                        </p>


                        <p class="text-muted mb-2">

                            Category:

                            {{ $medicine->category->category_name ?? '-' }}

                        </p>


                        <h6 class="mb-3">

                            ₹{{ number_format($medicine->retail_price, 2) }}

                        </h6>


                        @if($medicine->stock > 0)

                            <span class="badge bg-success">
                                In Stock
                            </span>

                        @else


                            <span class="badge bg-danger">
                                Out of Stock
                            </span>

                        @endif


                        <div class="mt-3">

                            <a
                                href="{{ route('customer.medicines.show', $medicine->id) }}"
                                class="btn btn-primary w-100"
                            >
                                View Medicine
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info text-center">

                    No medicines available.

                </div>

            </div>

        @endforelse

    </div>


    <div class="mt-4">

        {{ $medicines->links() }}

    </div>

</div>

@endsection