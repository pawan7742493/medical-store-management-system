@extends('layouts.admin')

@section('content')

<main class="dashboard-content">

<div class="container-fluid p-4">

    <h3>Products</h3>
    

<!-- <form method="GET" class="d-flex gap-2">

<select name="product" class="form-select">
    <option value="">All Products</option>
    @foreach($products as $product)
        <option value="{{ $product->id }}"
            {{ request('product_name') == $product->id ? 'selected' : '' }}>
            {{ $product->product_name }}
        </option>
    @endforeach
</select>

<select name="status" class="form-select">
    <option value="">All Status</option>
    <option value="active" {{ request('status')=='active' ? 'selected' : '' }}>Active</option>
    <option value="inactive" {{ request('status')=='inactive' ? 'selected' : '' }}>Inactive</option>
</select>

<button class="btn btn-primary">Filter</button>

</form> -->

<form
    method="GET"
    action="{{ route('products.index') }}"
    class="d-flex gap-2 mb-3"
>

    <input
        type="text"
        name="search"
        class="form-control"
        placeholder="Search product name..."
        value="{{ request('search') }}"
    >

    
    
    <select
    name="status"
    class="form-select"
    >
    
    <option value="">
        All Status
    </option>
    
    <option
    value="active"
    {{ request('status') == 'active' ? 'selected' : '' }}
    >
    Active
</option>

<option
value="inactive"
{{ request('status') == 'inactive' ? 'selected' : '' }}
>
Inactive
</option>

</select>

<button
    type="submit"
    class="btn btn-primary"
    style="white-space: nowrap;"
>
    Search
</button>

    @if(request('search') || request('status'))

        <a
            href="{{ route('products.index') }}"
            class="btn btn-secondary"
            style="white-space: nowrap;"
        >
            Clear
        </a>

    @endif

</form>

<br>

    <a href="{{route('products.create')}}" class="btn btn-primary mb-3">Add Products</a>
    <div class="table-responsive">
    <table class="table text-nowrap" >
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
<tbody>

@forelse($products as $product)

<tr>

    <td>{{ $loop->iteration }}</td>

    <td>

        @if($product->image)

            <img src="{{ asset('uploads/products/'.$product->image) }}"
                 width="60"
                 height="60"
                 class="rounded">

        @else

            No Image

        @endif

    </td>

    <td>{{ $product->product_name }}</td>

    <td>{{ $product->category->category_name ?? '-' }}</td>

    <!-- <td>{{ $product->brand_name }}</td> -->

    <td>₹ {{ number_format($product->selling_price,2) }}</td>

    <td>{{ $product->stock }}</td>

    <td>

        @if($product->status=='active')

            <span class="badge bg-success">Active</span>

        @else

            <span class="badge bg-danger">Inactive</span>

        @endif

    </td>

<td>

    <a href="{{ route('products.show',$product) }}"
       class="btn btn-sm btn-info">
        View
    </a>

    <a href="{{ route('products.edit',$product) }}"
       class="btn btn-sm btn-primary">
        Edit
    </a>

    <form action="{{ route('products.destroy',$product) }}"
          method="POST"
          style="display:inline;">

        @csrf
        @method('DELETE')

        <button class="btn btn-sm btn-danger"
                onclick="return confirm('Delete this product?')">

            Delete

        </button>

    </form>

</td>

</tr>

@empty

<tr>

    <td colspan="9" class="text-center">

        No Product Found

    </td>

</tr>

@endforelse

</tbody>

    </table>
    </div>

    @if(session('success'))

<div class="alert alert-success">

    {{ session('success') }}

</div>

@endif

<div class="mt-3">

{{ $products->withQueryString()->links() }}
</div>

</div>
</main>

@endsection