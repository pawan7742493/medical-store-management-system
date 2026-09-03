<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // User login nahi hai
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // User customer nahi hai
        if ($user->role !== 'customer') {
            abort(403, 'Unauthorized');
        }

        // Customer profile exist nahi karta
        if (!$user->customer) {
            abort(403, 'Customer profile not found.');
        }

        // Customer approved nahi hai
        if ($user->customer->status !== 'active') {
            abort(403, 'Customer account is not active.');
        }

        return $next($request);
    }
}