@extends('layouts.admin')

@section('content')

<main class="dashboard-content">

<div class="container-fluid p-4">

    <h3>Add Product</h3>


    <div class="card-body">
<form
    method="POST"
    action="{{ route('products.update', $product) }}"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

<div class="row">
<div class="col-md-4 mb-3">
<label class="form-label">
            Category <span class="text-danger">*</span>
        </label>

        <select name="category_id" class="form-control">

            <option value="">Select Category</option>

            @foreach($categories as $category)

            <option
            value="{{ $category->id }}"
            {{ old('category_id',$product->category_id)==$category->id ? 'selected' : '' }}>
        
            {{ $category->category_name }}

            </option>

            @endforeach

        </select>
</div>


    <div class="col-md-4 mb-3">

        <label class="form-label">
            Product Name <span class="text-danger">*</span>
        </label>

<input
            type="text"
            name="product_name"
            class="form-control"
            placeholder="Enter Product Name"
            value="{{ old('product_name',$product->product_name) }}">
            

    </div>

<div class="col-md-4 mb-3">
            <label class="form-label">
                Image
            </label>
    
    <input type="file"
           name="image"
           class="form-control">

    
    </div>

<div class="col-md-4 mb-3">
        <label class="form-label">
            Price
        </label>

<input type="number"
       step="0.01"
       name="selling_price"
       value="{{ old('selling_price',$product->selling_price) }}"
       class="form-control">

</div>


<div class="col-md-4 mb-3">
        <label class="form-label">
            Stock
        </label>

<input type="number"
       name="stock"
       value="{{ old('stock',$product->stock) }}"
       class="form-control">

</div>

<div class="col-md-4 mb-3">
        <label class="form-label">
            Status
        </label>

<select name="status" class="form-control">

<option value="active"
{{ old('status',$product->status)=='active' ? 'selected' : '' }}>

Active

</option>

<option value="inactive"
{{ old('status',$product->status)=='inactive' ? 'selected' : '' }}>

Inactive

</option>
</select>

</div>

<div class="col-md-4 mb-3">
        <label class="form-label">
            Description
        </label>

<textarea
name="description"
rows="4"
class="form-control">{{ old('description',$product->description) }}</textarea>

</div>

<div class="mb-3">
        <!-- <label class="form-label">
            
        </label> -->

<button class="btn btn-primary">

Save Product

</button>

<a href="{{ route('products.index') }}"
class="btn btn-secondary">

Cancel

</a>

</div>





</div>

</form>


</div>

</main>

@endsection