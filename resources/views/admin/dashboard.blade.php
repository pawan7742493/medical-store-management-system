@extends('layouts.admin')

@section('content')

<main class="dashboard-content">

<div class="container mt-4">

<!-- Head -->


<h2> Welcome, {{ Auth::user()->name }} </h2>

<p> Lakhadatar Pharma & Medical Store </p>




<hr>
        <!-- <h4>Welcome, {{ Auth::user()->name }}</h4> -->

        <!-- <p>You are logged in successfully.</p> -->

<!-- Progress -->

<div class="row g-4">

    {{-- Total Categories --}}
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('categories.index') }}" class="text-decoration-none">
            <div class="stat-card categories">
                <div class="stat-circle">
                    <h2>{{ $totalCategories }}</h2>
                </div>
                <h5>Total Categories</h5>
            </div>
        </a>
    </div>

    {{-- Total Medicines --}}
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('medicines.index') }}" class="text-decoration-none">
            <div class="stat-card medicines">
                <div class="stat-circle">
                    <h2>{{ $totalMedicines }}</h2>
                </div>
                <h5>Total Medicines</h5>
            </div>
        </a>
    </div>

    {{-- Total Products --}}
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('products.index') }}" class="text-decoration-none">
            <div class="stat-card products">
                <div class="stat-circle">
                    <h2>{{ $totalProducts }}</h2>
                </div>
                <h5>Total Products</h5>
            </div>
        </a>
    </div>

    {{-- Total Customers --}}
    <div class="col-lg-3 col-md-6">
        <a href="{{ route('customers.index') }}" class="text-decoration-none">
            <div class="stat-card customers">
                <div class="stat-circle">
                    <h2>{{ $totalCustomers }}</h2>
                </div>
                <h5>Total Customers</h5>
            </div>
        </a>
    </div>

    {{-- Total Orders --}}
    <div class="col-lg-4 col-md-6">
        <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
            <div class="stat-card orders">
                <div class="stat-circle">
                    <h2>{{ $totalOrders }}</h2>
                </div>
                <h5>Total Orders</h5>
            </div>
        </a>
    </div>

    {{-- Pending Orders --}}
    <div class="col-lg-4 col-md-6">
        <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
            <div class="stat-card pending">
                <div class="stat-circle">
                    <h2>{{ $pendingOrders }}</h2>
                </div>
                <h5>Pending Orders</h5>
            </div>
        </a>
    </div>

    {{-- Delivered Orders --}}
    <div class="col-lg-4 col-md-6">
        <a href="{{ route('admin.orders.index') }}" class="text-decoration-none">
            <div class="stat-card delivered">
                <div class="stat-circle">
                    <h2>{{ $deliveredOrders }}</h2>
                </div>
                <h5>Delivered Orders</h5>
            </div>
        </a>
    </div>

</div>
</div>

<br>
<hr>


<!-- Low stock -->

 <!-- <h4>Low Stock Medicines</h4> -->
<!-- <div class="card mt-4"> -->
    <div class="card-header">
        <h5>Low Stock Medicines</h5>
    </div>

<!-- <div class="card-body"> -->

<div class="table-responsive">
<table class="table text-nowrap">
    <tr>
    <th>Id</th>    
    <th>Name</th>
    <th>Stock</th>
    <th>Minimum</th>
    <th>Action</th>
    </tr>

@foreach($lowStockMedicines as $medicine)

<tr>
    <td>
        {{ $medicine->id }}
    </td>
    <td>
        {{ $medicine->medicine_name }}
    </td>
    <td>
        {{ $medicine->stock }}
    </td>
    <td>
        {{ $medicine->minimum_stock }}
    </td>
    <td>
        <a href="{{ route('medicines.show',$medicine->id) }}" class="btn btn-sm btn-info">
            View
        </a>
    </td>
</tr>

@endforeach

</table>

</div>



 <!-- Low Stock Product  -->

<br>
<hr>

<div class="card-header">
    <h5>Low Stock Products</h5>
</div>

<div class="table-responsive">

    <table class="table text-nowrap">

        <thead>

            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>

            @forelse($lowStockProducts as $product)

                <tr>
                    <td>
                        {{ $product->id }}
                    </td>

                    <td>
                        {{ $product->product_name }}
                    </td>

                    <td>
                        {{ $product->stock }}
                    </td>

                    <td>

                        <a
                            href="{{ route('products.show', $product->id) }}"
                            class="btn btn-sm btn-info"
                        >
                            View
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="3"
                        class="text-center text-success"
                    >
                        No Low Stock Products
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


<!-- Out Of Stock Product -->


<br>
<hr>

<div class="card-header">

    <h5>
        Out of Stock Products
    </h5>

</div>

<div class="table-responsive">

    <table class="table text-nowrap">

        <thead>

            <tr>
                <th>Product</th>
                <th>Stock</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>

            @forelse($outOfStockProducts as $product)

                <tr>

                    <td>
                        {{ $product->product_name }}
                    </td>

                    <td>

                        <span class="badge bg-danger">
                            Out of Stock
                        </span>

                    </td>

                    <td>

                        <a
                            href="{{ route('products.show', $product->id) }}"
                            class="btn btn-sm btn-danger"
                        >
                            View
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="3"
                        class="text-center text-success"
                    >
                        No Out of Stock Products
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>




<!-- Expire alert -->

<br>
<hr>

   <!-- <div class="card mt-4"> -->

    <div class="card-header">

        <h5 class="mb-0">
            Expired Medicines
        </h5>

    </div>

    <!-- <div class="card-body"> -->

        @if($expiredMedicines->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>Medicine</th>
                            <th>Company</th>
                            <th>Expiry Date</th>
                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($expiredMedicines as $medicine)

                            <tr>

                                <td>
                                    {{ $medicine->medicine_name }}
                                </td>

                                <td>
                                    {{ $medicine->company_name }}
                                </td>

                                <td>

                                    <span class="badge bg-danger">
                                        {{ $medicine->expiry_date }}
                                    </span>

                                </td>

                                <td>

                                    <a
                                        href="{{ route(
                                            'medicines.show',
                                            $medicine->id
                                        ) }}"
                                        class="btn btn-sm btn-danger"
                                    >
                                        View
                                    </a>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center py-3">

                <span class="text-success">
                    ✓ No Expired Medicines
                </span>

            </div>

        @endif

    </div>

<!-- </div> -->



<!-- End -->

</main>


@endsection

