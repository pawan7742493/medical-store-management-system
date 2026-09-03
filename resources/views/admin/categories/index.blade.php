@extends('layouts.admin')

@section('content')

<main class="dashboard-content">

<div class="container-fluid p-4">

<h3>Categories</h3>


<a href="{{ route('categories.create') }}"
class="btn btn-primary mb-3">

Add Category

</a>

<div class="table-responsive">
<table class="table text-nowrap">

<tr>

<th>ID</th>
<th>Name</th>
<th>Description</th>
<th>Status</th>
<th>Action</th>

</tr>


@foreach($categories as $category)

<tr>

<td>{{ $category->id }}</td>

<td>{{ $category->category_name }}</td>

<td>{{ $category->description}}</td>

<td>{{ $category->status }}</td>
<td><a href="{{route('categories.delete',$category->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
<td><a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-primary">Edit</a></td>

</tr>

@endforeach


</table>
</div>

</div>

</main>

@endsection