@extends('layouts.customer')

@section('title', 'My Cart')

@section('content')


<div class="container py-5">

<form
    method="GET"
    action="{{ route('customer.products.index') }}"
    class="mb-4"
>

    <div class="d-flex gap-2">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search product.. "
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
                href="{{ route('customer.products.index') }}"
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

            <h2>Products</h2>

            <p class="text-muted mb-0">
                Browse available products
            </p>

        </div>

        <a href="{{ route('customer.dashboard') }}"
           class="btn btn-secondary">
              ← Back
        </a>

    </div>


    <div class="row g-4">

        @forelse($products as $product)

            <div class="col-md-4 col-lg-3">

                <div class="card h-100 shadow-sm">

                    @if($product->image)

                        <img
                            src="{{ asset('uploads/products/'.$product->image) }}"
                            class="card-img-top"
                            style="height: 180px; object-fit: contain;"
                            alt="{{ $product->product_name }}"
                        >

                    @else

                        <div
                            class="d-flex align-items-center justify-content-center bg-light"
                            style="height: 180px;"
                        >
                            No Image
                        </div>

                    @endif


                    <div class="card-body">

                        <h5 class="card-title">
                            {{ $product->product_name }}
                        </h5>


                        <p class="text-muted mb-2">

                            Category:

                            {{ $product->category->category_name ?? '-' }}

                        </p>


                        <h6 class="mb-3">

                            ₹{{ number_format($product->selling_price, 2) }}

                        </h6>


                        @if($product->stock > 0)

                            <span class="badge bg-success">
                                In Stock
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Out of Stock
                            </span>

                        @endif

                        <div class="mt-3">

                      <a href="{{ route('customer.products.show', $product->id) }}"
                          class="btn btn-primary w-100">View Product
                      </a>

                    </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info text-center">

                    No products available.

                </div>

            </div>

        @endforelse

    </div>


    <div class="mt-4">

        {{ $products->links() }}

    </div>



</div>

@endsection