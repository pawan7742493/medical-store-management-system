<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle customer registration.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'customer_type' => 'required|in:medical_store,hospital,clinic',

            'customer_name' => 'required|string|max:255',

            'shop_name' => 'required|string|max:255',

            'mobile' => 'required|string|max:15',

            'email' => 'required|email|max:255|unique:users,email',

            'address' => 'required|string',

            'city' => 'required|string|max:255',

            'gst_number' => 'nullable|string|max:200',

            'drug_license_number' => 'nullable|string|max:200',

            'password' => 'required|confirmed|min:8',

        ], [
            'gst_number.required_without' => 'GST Number or Drug License Number is required.',

            'drug_license_number.required_without' => 'GST Number or Drug License Number is required.',
        ]);

        if (!$request->gst_number && !$request->drug_license_number) {

            return back()
                ->withErrors([
                    'gst_number' => 'GST Number or Drug License Number is required.',
                ])
                ->withInput();
        }

        DB::transaction(function () use ($request) {

            $user = User::create([
                'name' => $request->customer_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'customer',
            ]);

            Customer::create([
                'user_id' => $user->id,
                'customer_type' => $request->customer_type,
                'customer_name' => $request->customer_name,
                'shop_name' => $request->shop_name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'gst_number' => $request->gst_number,
                'drug_license_number' => $request->drug_license_number,
                'status' => 'pending',
            ]);

            event(new Registered($user));
        });

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Registration submitted successfully. Your account is waiting for admin approval.'
            );
    }
}