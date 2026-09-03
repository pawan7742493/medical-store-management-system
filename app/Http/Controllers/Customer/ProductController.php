<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
public function index(Request $request)
{
    $query = Product::with('category')
        ->where('status', 'active');

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('product_name', 'like', "%{$search}%")
             ;

        });
    }

    $products = $query
        ->latest()
        ->paginate(12)
        ->withQueryString();

    return view(
        'customer.products.index',
        compact('products')
    );
}

    public function show(Product $product)
    {
        if ($product->status !== 'active') {
            abort(404);
        }

        return view('customer.products.show', compact('product'));
    }
}