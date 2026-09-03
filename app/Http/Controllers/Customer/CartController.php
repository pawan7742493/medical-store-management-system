<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Medicine;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function add(Request $request, Product $product)
{
    if ($product->status !== 'active') {
        abort(404);
    }

    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $quantity = $request->quantity;

    if ($quantity > $product->stock) {
        return back()->withErrors([
            'quantity' => 'Requested quantity is not available in stock.',
        ]);
    }

    $cart = session()->get('cart', []);

    $cartKey = 'product_' . $product->id;

    if (isset($cart[$cartKey])) {

        $newQuantity = $cart[$cartKey]['quantity'] + $quantity;

        if ($newQuantity > $product->stock) {
            return back()->withErrors([
                'quantity' => 'Requested quantity exceeds available stock.',
            ]);
        }

        $cart[$cartKey]['quantity'] = $newQuantity;

    } else {

        $cart[$cartKey] = [
            'type' => 'product',
            'item_id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->selling_price,
            'quantity' => $quantity,
            'image' => $product->image,
        ];
    }

    session()->put('cart', $cart);

    return redirect()
        ->route('customer.cart.index')
        ->with('success', 'Product added to cart.');
}

    public function index()
    {
        $cart = session()->get('cart', []);

        return view('customer.cart.index', compact('cart'));
    }



   public function update(Request $request, $key)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $cart = session()->get('cart', []);

    if (!isset($cart[$key])) {
        return back()->withErrors([
            'cart' => 'Item not found in cart.',
        ]);
    }

    $item = $cart[$key];

    if ($item['type'] === 'medicine') {

        $medicine = Medicine::find($item['item_id']);

        if (!$medicine || $medicine->status !== 'active') {
            unset($cart[$key]);

            session()->put('cart', $cart);

            return back()->withErrors([
                'cart' => 'Medicine is no longer available.',
            ]);
        }

        if ($request->quantity > $medicine->stock) {
            return back()->withErrors([
                'quantity' => 'Requested quantity exceeds available stock.',
            ]);
        }

    } elseif ($item['type'] === 'product') {

        $product = Product::find($item['item_id']);

        if (!$product || $product->status !== 'active') {
            unset($cart[$key]);

            session()->put('cart', $cart);

            return back()->withErrors([
                'cart' => 'Product is no longer available.',
            ]);
        }

        if ($request->quantity > $product->stock) {
            return back()->withErrors([
                'quantity' => 'Requested quantity exceeds available stock.',
            ]);
        }
    }

    $cart[$key]['quantity'] = $request->quantity;

    session()->put('cart', $cart);

    return redirect()
        ->route('customer.cart.index')
        ->with('success', 'Cart updated successfully.');
}


public function remove($key)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$key])) {
        unset($cart[$key]);
    }

    session()->put('cart', $cart);

    return redirect()
        ->route('customer.cart.index')
        ->with('success', 'Item removed from cart.');
}



public function addMedicine(Request $request, Medicine $medicine)
{
    if ($medicine->status !== 'active') {
        abort(404);
    }

    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $quantity = $request->quantity;

    if ($quantity > $medicine->stock) {
        return back()->withErrors([
            'quantity' => 'Requested quantity is not available in stock.',
        ]);
    }

    $cart = session()->get('cart', []);

    $cartKey = 'medicine_'.$medicine->id;

    if (isset($cart[$cartKey])) {

        $newQuantity = $cart[$cartKey]['quantity'] + $quantity;

        if ($newQuantity > $medicine->stock_qty) {
            return back()->withErrors([
                'quantity' => 'Requested quantity exceeds available stock.',
            ]);
        }

        $cart[$cartKey]['quantity'] = $newQuantity;

    } else {

        $cart[$cartKey] = [
            'type' => 'medicine',
            'item_id' => $medicine->id,
            'name' => $medicine->medicine_name,
            'price' => $medicine->retail_price,
            'quantity' => $quantity,
            'image' => null,
        ];
    }

    session()->put('cart', $cart);

    return redirect()
        ->route('customer.cart.index')
        ->with('success', 'Medicine added to cart.');
}
}