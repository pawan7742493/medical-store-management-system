@extends('layouts.admin')


@section('content')


<main class="dashboard-content">

<div class="container-fluid p-4">


<h3>Medicine Details</h3>


<div class="card">

<div class="card-body">


<table class="table table-bordered">


<tr>
<th>Medicine Name</th>
<td>{{ $medicine->medicine_name }}</td>
</tr>


<tr>
<th>Category</th>
<td>{{ $medicine->category->category_name }}</td>
</tr>


<tr>
<th>Company</th>
<td>{{ $medicine->company_name }}</td>
</tr>


<tr>
<th>Batch Number</th>
<td>{{ $medicine->batch_no }}</td>
</tr>


<tr>
<th>Expiry Date</th>
<td>{{ $medicine->expiry_date }}</td>
</tr>


<tr>
<th>Purchase Price</th>
<td>₹{{ $medicine->purchase_price }}</td>
</tr>


<tr>
<th>Wholesale Price</th>
<td>₹{{ $medicine->wholesale_price }}</td>
</tr>


<tr>
<th>Retail Price</th>
<td>₹{{ $medicine->retail_price }}</td>
</tr>


<tr>
<th>Stock</th>
<td>{{ $medicine->stock }}</td>
</tr>


<tr>
<th>Minimum Stock Alert</th>
<td>{{ $medicine->minimum_stock }}</td>
</tr>


<tr>
<th>Description</th>
<td>{{ $medicine->description }}</td>
</tr>


<tr>
<th>Status</th>
<td>{{ $medicine->status }}</td>
</tr>


</table>


<a 
href="{{ route('medicines.index') }}"
class="btn btn-secondary">

Back

</a>


<a 
href="{{ route('medicines.edit',$medicine->id) }}"
class="btn btn-primary">

Edit

</a>


</div>

</div>


</div>

</main>


@endsection