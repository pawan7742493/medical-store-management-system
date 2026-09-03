<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('partials.sidebar', function ($view) {

            $totalSales = Order::where('status', 'delivered')
                ->sum('total_amount');

            $view->with('totalSales', $totalSales);
        });
    }
}