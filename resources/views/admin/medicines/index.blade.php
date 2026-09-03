@extends('layouts.admin')

@section('content')

<main class="dashboard-content">

<div class="container-fluid p-4">

    <h3>Medicines</h3>

    <a href="{{route('medicines.create')}}" class="btn btn-primary mb-3">Add Medicine</a>
    <div class="table-responsive">
    <table class="table text-nowrap" >
        <thead>
            <tr>
                <th>S.no.</th>
                <th>Name</th>
                <th>Category</th>
                <th>Company</th>
                <th>Stock</th>
                <th>Expire</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        @if($medicines->count())
            
        @foreach($medicines as $medicine)
        

            <tr>
                <td> {{$medicine->id}} </td>
                <td> {{$medicine->medicine_name}} </td>
                <td> {{$medicine->category->category_name}} </td>
                <td> {{$medicine->company_name}} </td>
                <td> {{$medicine->stock}} </td>
                <td> {{$medicine->expiry_date }} </td>
                <td> {{$medicine->status}} </td>
                <td><a href=" {{route('medicines.edit',$medicine->id)}} " class="btn btn-sm btn-primary" >Edit</a></td>
                <td><a href="{{route('medicines.delete',$medicine->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                <td><a href="{{ route('medicines.show',$medicine->id) }}" class="btn btn-sm btn-info">View</a></td>

            </tr>  
        @endforeach
        @else

        <tr>

    <td colspan="7" class="text-center">No Medicines Found</td>

        </tr>

        @endif


        </tbody>

    </table>
    </div>


</div>
</main>

@endsection