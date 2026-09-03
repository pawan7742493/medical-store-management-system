<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
public function index()
{
    $customers = Customer::latest()->paginate(10);
    return view('admin.customers.index', compact('customers'));
}

// public function create()
// {
//     return view('admin.customers.create');
// }

// public function store(Request $request)
// {

// }

public function show(Customer $customer)
{
    return view('admin.customers.show', compact('customer'));
}


public function approve(Customer $customer)
{
    $customer->update([
        'status' => 'active',
    ]);

    return redirect()
        ->route('customers.index')
        ->with('success', 'Customer approved successfully.');
}

public function reject(Customer $customer)
{
    $customer->update([
        'status' => 'rejected',
    ]);

    return redirect()
        ->route('customers.index')
        ->with('success', 'Customer rejected successfully.');
}


public function edit(Customer $customer)
{
    return view('admin.customers.edit', compact('customer'));
}



public function update(Request $request, Customer $customer)
{
    $validated = $request->validate([

        'customer_type' => 'required|in:medical_store,hospital,clinic',

        'customer_name' => [
            'required',
            'string',
            'max:255',
            'regex:/^[a-zA-Z\s]+$/',
        ],

        'shop_name' => 'nullable|string|max:255',

        'mobile' => [
            'required',
            'digits:10',
        ],

        'email' => [
            'nullable',
            'email',
            'max:255',
        ],

        'address' => 'required|string',

        'city' => 'required|string|max:255',

        'gst_number' => 'nullable|string|max:200',

        'drug_license_number' => 'nullable|string|max:200',

        'status' => 'required|in:pending,active,rejected',

    ]);


    $customer->update($validated);


    return redirect()
        ->route('customers.show', $customer->id)
        ->with('success', 'Customer updated successfully.');
}

// public function destroy(Customer $customer)
// {

// }
}
