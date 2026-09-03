<?php

namespace App\Http\Controllers\Frontend;

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
                  ->orWhere('description', 'like', "%{$search}%");

            });
        }

        $products = $query
            ->latest()
            ->paginate()
            ->withQueryString();

        return view(
            'frontend.products.index',
            compact('products')
        );
    }


        public function show(Product $product)
    {
        if ($product->status !== 'active') {
            abort(404);
        }

        $product->load('category');

        return view(
            'frontend.products.show',
            compact('product')
        );
    }
}