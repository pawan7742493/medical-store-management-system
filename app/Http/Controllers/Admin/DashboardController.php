<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Category;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    // Medicine Stock
    $lowStockMedicines = Medicine::whereColumn(
        'stock',
        '<=',
        'minimum_stock'
    )->get();

    //Product Stock 

    $lowStockProducts = Product::where('stock', '>', 0)
    ->where('stock', '<=', 10)
    ->get();

    $outOfStockProducts = Product::where('stock', '<=', 0)
    ->get();


    // Expired Medicines
    $expiredMedicines = Medicine::whereDate(
        'expiry_date',
        '<',
        now()
    )->get();


    // Safe Medicines
    $safeMedicines = Medicine::whereDate(
        'expiry_date',
        '>=',
        now()
    )->count();


    // Basic Counts
    $totalCategories = Category::count();

    $totalMedicines = Medicine::count();

    $totalProducts = Product::count();

    $totalCustomers = Customer::count();


    // Orders
    $totalOrders = Order::count();

    $pendingOrders = Order::where(
        'status',
        'pending'
    )->count();

    $deliveredOrders = Order::where(
        'status',
        'delivered'
    )->count();

        // Total Sales (Delivered Orders Only)
    $totalSales = Order::where('status', 'delivered')
    ->sum('total_amount');



    return view(
        'admin.dashboard',
compact(
    'totalCategories',
    'totalMedicines',
    'totalProducts',
    'totalCustomers',
    'totalOrders',
    'pendingOrders',
    'deliveredOrders',
    'totalSales',
    'lowStockMedicines',
    'expiredMedicines',
    'safeMedicines',
    'lowStockProducts',
    'outOfStockProducts',
)
    );


}
}
