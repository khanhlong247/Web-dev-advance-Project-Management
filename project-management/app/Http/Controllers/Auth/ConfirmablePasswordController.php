<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmablePasswordController extends Controller
{
    public function show(Request $request)
    {
        return view('auth.confirm-password');
    }

    public function store(Request $request)
    {
        if (! Auth::guard('web')->validate([
            'email'    => Auth::user()->email,
            'password' => $request->password,
        ])) {
            return back()->withErrors(['password' => 'The provided password is incorrect.']);
        }

        $request->session()->passwordConfirmed();
        return redirect()->intended();
    }
}
