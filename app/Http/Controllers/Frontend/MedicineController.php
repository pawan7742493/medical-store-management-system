<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index(Request $request)
    {
        $query = Medicine::with('category')
            ->where('status', 'active');

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('medicine_name', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%");

            });
        }

        // Category filter
        if ($request->filled('category')) {

            $category = $request->category;

            $query->whereHas('category', function ($q) use ($category) {
                $q->where('name', $category);
            });
        }

        // Sorting
        if ($request->sort === 'price-low') {

            $query->orderBy('retail_price', 'asc');

        } elseif ($request->sort === 'price-high') {

            $query->orderBy('retail_price', 'desc');

        } elseif ($request->sort === 'name') {

            $query->orderBy('medicine_name', 'asc');

        } else {

            $query->latest();
        }

        $medicines = $query
            ->paginate(8)
            ->withQueryString();

        return view(
            'frontend.medicines.index',
            compact('medicines')
        );
    }

    public function show(Medicine $medicine)
    {
        if ($medicine->status !== 'active') {
            abort(404);
        }

        return view(
            'frontend.medicines.show',
            compact('medicine')
        );
    }
}