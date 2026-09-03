<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('customer.cart.index')
                ->withErrors([
                    'cart' => 'Your cart is empty.',
                ]);
        }

$customer = Customer::where('user_id', Auth::id())->firstOrFail();
        $grandTotal = 0;

        foreach ($cart as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }

        return view(
            'customer.checkout.index',
            compact('cart', 'customer', 'grandTotal')
        );
    }


    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('customer.cart.index')
                ->withErrors([
                    'cart' => 'Your cart is empty.',
                ]);
        }

$customer = Customer::where('user_id', Auth::id())->firstOrFail();
        $request->validate([
            'shipping_address' => 'required|string',
            'city' => 'required|string|max:255',
        ]);

        $grandTotal = 0;

        foreach ($cart as $item) {
            $grandTotal += $item['price'] * $item['quantity'];
        }

        $order = Order::create([
            'user_id' => Auth::id(),            
            'customer_id' => $customer->id,
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'total_amount' => $grandTotal,
            'shipping_address' => $request->shipping_address,
            'city' => $request->city,
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {

            $order->items()->create([
                'item_type' => $item['type'],
                'item_id' => $item['item_id'],
                'item_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total' => $item['price'] * $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return redirect()
            ->route('customer.orders.show', $order->id)
            ->with('success', 'Order placed successfully.');
    }
}