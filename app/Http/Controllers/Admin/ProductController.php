<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
public function index(Request $request)
{
    $query = Product::with('category');

    /*
    |--------------------------------------------------------------------------
    | Product Name Search
    |--------------------------------------------------------------------------
    */

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(
            'product_name',
            'like',
            '%' . $search . '%'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Status Filter
    |--------------------------------------------------------------------------
    */

    if ($request->filled('status')) {

        $query->where(
            'status',
            $request->status
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    */

    $products = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();


    return view(
        'admin.products.index',
        compact('products')
    );
}



public function create()
{
    $categories = Category::where('status', 'active')->get();

    return view('admin.products.create', compact('categories'));
}


public function store(Request $request)
{
    $request->validate([
        'category_id'     => 'required|exists:categories,id',
        'product_name'    => 'required|max:255',
        'image'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'selling_price'   => 'required|numeric|min:0',
        'stock'           => 'required|integer|min:0',
        'description'     => 'nullable',
        'status'          => 'required|in:active,inactive',
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads/products'), $imageName);
    }

    Product::create([
        'category_id'     => $request->category_id,
        'product_name'    => $request->product_name,
        'image'           => $imageName,
        'selling_price'   => $request->selling_price,
        'stock'           => $request->stock,
        'description'     => $request->description,
        'status'          => $request->status,
    ]);

    return redirect()
            ->route('products.index')
            ->with('success','Product Added Successfully.');
}

public function show(Product $product)
{
    return view('admin.products.show', compact('product'));
}



public function edit(Product $product)
{
    $categories = Category::where('status', 'active')->get();

    return view('admin.products.edit', compact('product','categories'));
}




public function update(Request $request, Product $product)
{
    $request->validate([
        'category_id'    => 'required|exists:categories,id',
        'product_name'   => 'required|max:255',
        // 'brand_name'     => 'nullable|max:255',
        'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        // 'purchase_price' => 'required|numeric|min:0',
        'selling_price'  => 'required|numeric|min:0',
        'stock'          => 'required|integer|min:0',
        'status'         => 'required|in:active,inactive',
    ]);

    $imageName = $product->image;

    if ($request->hasFile('image')) {

        if ($product->image && file_exists(public_path('uploads/products/'.$product->image))) {
            unlink(public_path('uploads/products/'.$product->image));
        }

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('uploads/products'), $imageName);
    }

    $product->update([
        'category_id'     => $request->category_id,
        'product_name'    => $request->product_name,
        // 'brand_name'      => $request->brand_name,
        'image'           => $imageName,
        // 'purchase_price'  => $request->purchase_price,
        'selling_price'   => $request->selling_price,
        'stock'           => $request->stock,
        'description'     => $request->description,
        'status'          => $request->status,
    ]);

    return redirect()->route('products.index')
                     ->with('success','Product Updated Successfully.');
}


public function destroy(Product $product)
{
    if ($product->image && file_exists(public_path('uploads/products/'.$product->image))) {

        unlink(public_path('uploads/products/'.$product->image));
    }

    $product->delete();

    return redirect()->route('products.index')
                     ->with('success','Product Deleted Successfully.');
}







}
