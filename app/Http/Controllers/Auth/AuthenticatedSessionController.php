<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();

    $request->session()->regenerate();

    $user = Auth::user();


    /*
    |--------------------------------------------------------------------------
    | Customer Account Verification
    |--------------------------------------------------------------------------
    */

    if ($user->role === 'customer') {

        $customer = $user->customer;

        if (!$customer) {

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Customer profile not found.',
                ]);
        }

        if ($customer->status === 'pending') {

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Your account is waiting for admin approval.',
                ]);
        }

        if ($customer->status === 'rejected') {

            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Your customer account has been rejected.',
                ]);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Redirect According to Role
    |--------------------------------------------------------------------------
    */

    if ($user->role === 'admin') {

        return redirect()->route('dashboard');
    }

    if ($user->role === 'customer') {

        return redirect()->route('customer.dashboard');
    }

    Auth::logout();

    return redirect()
        ->route('login')
        ->withErrors([
            'email' => 'Invalid account role.',
        ]);
}

public function destroy(Request $request): RedirectResponse
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

}
