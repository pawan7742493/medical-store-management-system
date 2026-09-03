<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $medicalStores = Customer::where('customer_type', 'medical_store')
            ->whereHas('orders')
            ->withCount('orders')
            ->orderBy('shop_name')
            ->get();

        $hospitals = Customer::where('customer_type', 'hospital')
            ->whereHas('orders')
            ->withCount('orders')
            ->orderBy('shop_name')
            ->get();

        $clinics = Customer::where('customer_type', 'clinic')
            ->whereHas('orders')
            ->withCount('orders')
            ->orderBy('shop_name')
            ->get();

        return view('admin.orders.index', compact(
            'medicalStores',
            'hospitals',
            'clinics'
        ));
    }


    public function show(Order $order)
    {
        $order->load([
            'customer',
            'items',
            'invoice',
        ]);

        return view('admin.orders.show', compact('order'));
    }


    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,delivered',
        ]);

        $oldStatus = $order->status;
        $newStatus = $request->status;


        /*
        |--------------------------------------------------------------------------
        | Pending → Confirmed
        |--------------------------------------------------------------------------
        */

        if ($oldStatus === 'pending' && $newStatus === 'confirmed') {

            /*
            |--------------------------------------------------------------------------
            | Check Stock
            |--------------------------------------------------------------------------
            */

            foreach ($order->items as $item) {

                if ($item->item_type === 'medicine') {

                    $medicine = \App\Models\Medicine::find($item->item_id);

                    if (!$medicine) {

                        return back()->withErrors([
                            'stock' => "Medicine '{$item->item_name}' no longer exists.",
                        ]);
                    }

                    if ($medicine->stock < $item->quantity) {

                        return back()->withErrors([
                            'stock' => "Insufficient stock for {$item->item_name}.",
                        ]);
                    }
                }


                if ($item->item_type === 'product') {

                    $product = \App\Models\Product::find($item->item_id);

                    if (!$product) {

                        return back()->withErrors([
                            'stock' => "Product '{$item->item_name}' no longer exists.",
                        ]);
                    }

                    if ($product->stock < $item->quantity) {

                        return back()->withErrors([
                            'stock' => "Insufficient stock for {$item->item_name}.",
                        ]);
                    }
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Deduct Stock
            |--------------------------------------------------------------------------
            */

            foreach ($order->items as $item) {

                if ($item->item_type === 'medicine') {

                    $medicine = \App\Models\Medicine::find($item->item_id);

                    $medicine->decrement(
                        'stock',
                        $item->quantity
                    );
                }


                if ($item->item_type === 'product') {

                    $product = \App\Models\Product::find($item->item_id);

                    $product->decrement(
                        'stock',
                        $item->quantity
                    );
                }
            }


            /*
            |--------------------------------------------------------------------------
            | Create Invoice
            |--------------------------------------------------------------------------
            */

            if (!$order->invoice) {

                $subtotal = 0;

                foreach ($order->items as $item) {

                    $subtotal += $item->total;
                }


                Invoice::create([
                    'order_id' => $order->id,

                    'invoice_number' =>
                        'INV-' . strtoupper(Str::random(10)),

                    'invoice_date' => Carbon::today(),

                    'subtotal' => $subtotal,

                    'tax_amount' => 0,

                    'total_amount' => $order->total_amount,
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Update Order Status
        |--------------------------------------------------------------------------
        */

        $order->update([
            'status' => $newStatus,
        ]);


        return redirect()
            ->route('admin.orders.show', $order->id)
            ->with('success', 'Order status updated successfully.');
    }


    public function customerOrders(Request $request, Customer $customer)
    {
        $query = $customer->orders()
            ->latest();

        if ($request->filled('search')) {

            $query->where(
                'order_number',
                'like',
                '%' . $request->search . '%'
            );
        }

        $orders = $query->paginate(15)
            ->withQueryString();

        return view(
            'admin.orders.customer-orders',
            compact('customer', 'orders')
        );
    }
}