<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

public function index(Request $request)
{
    $query = Invoice::with([
        'order.customer'
    ])->latest();

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where('invoice_number', 'like', "%{$search}%")
            ->orWhereHas('order', function ($orderQuery) use ($search) {

                $orderQuery->where(
                    'order_number',
                    'like',
                    "%{$search}%"
                );

                $orderQuery->orWhereHas('customer', function ($customerQuery) use ($search) {

                    $customerQuery
                        ->where('customer_name', 'like', "%{$search}%")
                        ->orWhere('shop_name', 'like', "%{$search}%");

                });

            });
    }

    $invoices = $query
        ->paginate(15)
        ->withQueryString();

    return view(
        'admin.invoices.index',
        compact('invoices')
    );
}

    public function show(Invoice $invoice)
    {
        $invoice->load([
            'order.customer',
            'order.items',
        ]);

        return view('admin.invoices.show', compact('invoice'));
    }
}