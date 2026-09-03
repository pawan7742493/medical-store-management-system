@extends('layouts.admin')

@section('content')

<main class="dashboard-content">

    <div class="container-fluid p-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3>Customers</h3>

        </div>

        <!-- <div class="card"> -->

            <!-- <div class="card-body"> -->

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Type</th>
                                <th>Customer</th>
                                <th>Shop / Organization</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($customers as $customer)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ ucwords(str_replace('_', ' ', $customer->customer_type)) }}
                                </td>

                                <td>
                                    {{ $customer->customer_name }}
                                </td>

                                <td>
                                    {{ $customer->shop_name ?? '-' }}
                                </td>

                                <td>
                                    {{ $customer->mobile }}
                                </td>

                                <td>
                                    {{ $customer->city }}
                                </td>

                                <td>

                                    @if($customer->status === 'pending')

                                        <span class="badge bg-warning text-dark">
                                            Pending
                                        </span>

                                    @elseif($customer->status === 'active')

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @elseif($customer->status === 'rejected')

                                        <span class="badge bg-danger">
                                            Rejected
                                        </span>

                                    @endif

                                </td>

                                <td>

    <a href="{{ route('customers.show', $customer->id) }}"
       class="btn btn-sm btn-info mb-1">
        View
    </a>

    @if($customer->status === 'pending')

        <form action="{{ route('customers.approve', $customer->id) }}"
              method="POST"
              class="d-inline">

            @csrf

            @method('PATCH')

            <button type="submit"
                    class="btn btn-sm btn-success mb-1">
                Approve
            </button>

        </form>

        <form action="{{ route('customers.reject', $customer->id) }}"
              method="POST"
              class="d-inline">

            @csrf

            @method('PATCH')

            <button type="submit"
                    class="btn btn-sm btn-danger mb-1">
                Reject
            </button>

        </form>

    @endif

</td>

                                

                            </tr>

                            @empty

                            <tr>

                                <td colspan="8" class="text-center py-4">

                                    No Customers Found

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">

                    {{ $customers->links() }}

                </div>

            </div>

        </div>

    </div>

</main>

@endsection