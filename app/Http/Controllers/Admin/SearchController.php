<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->search);

        if (empty($search)) {
            return redirect()->route('medicines.index');
        }


        /*
        |--------------------------------------------------------------------------
        | Medicine Search
        |--------------------------------------------------------------------------
        */

        $medicines = Medicine::with('category')
            ->where(function ($query) use ($search) {

                $query->where(
                    'medicine_name',
                    'LIKE',
                    "%{$search}%"
                )
                ->orWhere(
                    'company_name',
                    'LIKE',
                    "%{$search}%"
                )
                ->orWhere(
                    'batch_no',
                    'LIKE',
                    "%{$search}%"
                );

            })
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Category Search
        |--------------------------------------------------------------------------
        */

        $categories = Category::where(
            'category_name',
            'LIKE',
            "%{$search}%"
        )
        ->latest()
        ->get();


        return view(
            'admin.search.index',
            compact(
                'medicines',
                'categories',
                'search'
            )
        );
    }
}