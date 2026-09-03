<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {

                    if (!Hash::check($value, Auth::user()->password)) {

                        $fail('Current password is incorrect.');

                    }
                },
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);


        auth::user()->update([
            'password' => Hash::make($request->password),
        ]);


        return redirect()
            ->route('admin.account.settings')
            ->with(
                'success',
                'Password changed successfully.'
            );
    }
}