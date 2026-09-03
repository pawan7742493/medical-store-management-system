@extends('layouts.admin')

@section('content')

<main class="dashboard-content">

<div class="container-fluid px-4 py-4">

<h3>Add Category</h3>

<form action="{{ route('categories.update',$category->id) }}" method="POST">
@csrf

@method('PUT')

<div class="mb-3">
<label>Category Name</label>
<input type="text" name="category_name" value="{{$category->category_name}}" class="form-control">
</div>


<div class="mb-3">
<label>Description</label>
<textarea name="description"  class="form-control" >{{$category->description}}  </textarea>
</div>


<div class="mb-3">
<label>Status</label>

<select name="status" class="form-control">

<option value="active" {{ $category->status=='active' ? 'selected' : '' }}>
    Active
</option>

<option value="inactive" {{ $category->status=='inactive' ? 'selected' : '' }}>
    Inactive
</option>
</select>

</div>


<button class="btn btn-primary">

Save Category

</button>


</form>

</div>

</main>

@endsection