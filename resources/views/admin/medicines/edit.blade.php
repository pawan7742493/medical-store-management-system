@extends('layouts.admin')

@section('content')

<main class="dashboard-content">

<div class="container-fluid p-4">

<h3>Add Medicine</h3>


<form method="POST" action="{{ route('medicines.update',$medicine->id) }}">

@csrf
@method('PUT')

<div class="mb-3">
<label>Category</label>

<select name="category_id" class="form-control">

@foreach($categories as $category)

<option value="{{ $category->id }}" {{ $medicine->category_id == $category->id ? 'selected':'' }} > {{ $category->category_name }} </option>

@endforeach

</select>

</div>

<div class="mb-3">
<label>Medicine Name</label>
<input type="text" name="medicine_name" value=" {{$medicine->medicine_name}} " class="form-control">
</div>
<div class="mb-3    ">
<label>Company Name</label>
<input type="text" name="company_name" value=" {{$medicine->company_name}} " class="form-control">
</div>
<div class="mb-3">
<label>Batch No</label>
<input type="text" value=" {{$medicine->batch_no}} " name="batch_no" class="form-control">
</div>
<div class="mb-3">
<label>Expiry Date</label>
<input type="date" value=" {{$medicine->expiry_date}} " name="expiry_date" class="form-control">
</div>
<div class="mb-3">
<label>Purchase Price</label>
<input type="text" value=" {{$medicine->purchase_price}} " name="purchase_price" class="form-control">
</div>
<div class="mb-3">
<label>Wholesale Price</label>
<input type="text" value=" {{$medicine->wholesale_price}} " name="wholesale_price" class="form-control">
</div>
<div class="mb-3">
<label>Retail Price</label>
<input type="text" value=" {{$medicine->retail_price}} " name="retail_price" class="form-control">
</div>
<div class="mb-3">
<label>Stock</label>
<input type="text" value=" {{$medicine->stock}} " name="stock" class="form-control">
</div>
<div class="mb-3">
<label>Minimum Stock</label>
<input type="text" value=" {{$medicine->minimum_stock}} " name="minimum_stock" class="form-control">
</div>
<div class="mb-3">
<label>Description</label>
<input type="text" value=" {{$medicine->description}} " name="description" class="form-control">
</div>
<div class="mb-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="active" {{ $medicine->status=='active' ? 'selected' : '' }}>
    Active
</option>

<option value="inactive" {{ $medicine->status=='inactive' ? 'selected' : '' }}>
    Inactive
</option>
</select>

</div>

<button class="btn btn-primary">Save Medicine</button>




</form>


</div>

</main>

@endsection