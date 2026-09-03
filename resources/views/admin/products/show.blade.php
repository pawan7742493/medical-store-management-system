@extends('layouts.admin')


@section('content')


<main class="dashboard-content">

<div class="container-fluid p-4">


<h3>Product Details</h3>


<div class="card">

<div class="card-body">


<table class="table table-bordered">

<!-- <tr>
<th>Category_ID</th>
<td>{{ $product->category->category ?? '-' }}</td>
</tr> -->

<tr>
<th>Category_Name</th>
<td>{{ $product->category->category_name ?? '-' }}</td>
</tr>



<tr>
<th>Product_Name</th>
<td>{{ $product->product_name }}</td>
</tr>




<tr>
<th>Image</th>
<td>
    @if($product->image)

<img src="{{ asset('uploads/products/'.$product->image) }}"
     width="150">

@endif
</td>
</tr>


<tr>
<th>Price</th>
<td>₹{{ $product->selling_price }}</td>
</tr>


<tr>
<th>Stock</th>
<td>{{ $product->stock }}</td>
</tr>


<tr>
<th>Status</th>
<td>{{ $product->status }}</td>
</tr>




</table>


<a 
href="{{ route('products.index') }}"
class="btn btn-secondary">

Back

</a>


<a 
href="{{ route('products.edit',$product) }}"
class="btn btn-primary">

Edit

</a>


</div>

</div>


</div>

</main>


@endsection