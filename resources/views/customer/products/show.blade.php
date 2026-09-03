@extends('layouts.customer')

@section('title', 'My Cart')

@section('content')


<div class="container py-5">

    <div class="mb-4">

        <a href="{{ route('customer.products.index') }}" class="btn btn-secondary">
            ← Back to Products
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="row g-5">

                <div class="col-md-5">

                    @if($product->image)

                        <img
                            src="{{ asset('uploads/products/'.$product->image) }}"
                            class="img-fluid"
                            style="width:100%; height:350px; object-fit:contain;"
                            alt="{{ $product->product_name }}"
                        >

                    @else

                        <div
                            class="d-flex align-items-center justify-content-center bg-light"
                            style="height:350px;"
                        >
                            No Image
                        </div>

                    @endif

                </div>


                <div class="col-md-7">

                    <h2>
                        {{ $product->product_name }}
                    </h2>


                    <p class="text-muted">

                        Category:

                        {{ $product->category->category_name ?? '-' }}

                    </p>


                    <h3 class="mb-4">

                        ₹{{ number_format($product->selling_price, 2) }}

                    </h3>


                    <div class="mb-4">

                        <strong>Description</strong>

                        <p class="mt-2">

                            {{ $product->description ?? 'No description available.' }}

                        </p>

                    </div>


                    @if($product->stock > 0)

                        <div class="mb-3">

                            <span class="badge bg-success">
                                In Stock
                            </span>

                        </div>


                        <form
                            method="POST"
                            action="{{ route('customer.cart.add', $product->id) }}"
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
                                        max="{{ $product->stock }}"
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