<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::whereHas('order', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->with('order')
        ->latest()
        ->paginate(15);

        return view(
            'customer.invoices.index',
            compact('invoices')
        );
    }


    public function show(Invoice $invoice)
    {
        $invoice->load([
            'order.customer',
            'order.items',
        ]);

        if ($invoice->order->user_id !== auth()->id()) {
            abort(403);
        }

        return view(
            'customer.invoices.show',
            compact('invoice')
        );
    }
}