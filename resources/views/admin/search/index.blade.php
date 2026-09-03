@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">

    <div class="mb-4">

        <h3>
            Search Results
        </h3>

        <p class="text-muted mb-0">
            Results for:
            <strong>{{ $search }}</strong>
        </p>

    </div>


    {{-- =========================
         CATEGORIES
    ========================== --}}

    <div class="card mb-4">

        <div class="card-header">

            <h5 class="mb-0">
                Categories
            </h5>

        </div>


        <div class="card-body">

            @forelse($categories as $category)

                <div class="d-flex justify-content-between align-items-center border-bottom py-3">

                    <div>

                        <strong>
                            {{ $category->category_name }}
                        </strong>

                    </div>

                    <a
                        href="{{ route('categories.index', $category->id) }}"
                        class="btn btn-sm btn-info"
                    >
                        View
                    </a>

                </div>

            @empty

                <p class="text-muted mb-0">
                    No categories found.
                </p>

            @endforelse

        </div>

    </div>



    {{-- =========================
         MEDICINES
    ========================== --}}

    <div class="card">

        <div class="card-header">

            <h5 class="mb-0">
                Medicines
            </h5>

        </div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>#</th>
                            <th>Medicine Name</th>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Batch</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($medicines as $medicine)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $medicine->medicine_name }}
                                </td>

                                <td>
                                    {{ $medicine->company_name }}
                                </td>

                                <td>
                                    {{ $medicine->category->category_name ?? '-' }}
                                </td>

                                <td>
                                    {{ $medicine->batch_no }}
                                </td>

                                <td>

                                    @if($medicine->status === 'active')

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-danger">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a
                                        href="{{ route('medicines.show', $medicine->id) }}"
                                        class="btn btn-sm btn-info"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('medicines.edit', $medicine->id) }}"
                                        class="btn btn-sm btn-primary"
                                    >
                                        Edit
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center text-muted"
                                >
                                    No medicines found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection