<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
public function index(Request $request)
{
    $query = Medicine::with('category')
        ->where('status', 'active');

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('medicine_name', 'like', "%{$search}%")
              ->orWhere('company_name', 'like', "%{$search}%")
              ->orWhere('batch_no', 'like', "%{$search}%");

        });
    }

    $medicines = $query
        ->latest()
        ->paginate(12)
        ->withQueryString();

    return view(
        'customer.medicines.index',
        compact('medicines')
    );
}
    public function show(Medicine $medicine)
    {
        if ($medicine->status !== 'active') {
            abort(404);
        }

        return view('customer.medicines.show', compact('medicine'));
    }
}