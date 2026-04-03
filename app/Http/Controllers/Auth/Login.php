<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $attrs = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($attrs)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // 🔥 Role-based redirect
            if ($user->role === 'super_admin') {
                return redirect()->intended('/superadmin/home');
            }

            return redirect()->intended('/class_batch/');//.auth()->user()->id
        }

        return back()->withErrors([
            'password' => 'The provided credentials do not match our records.',
        ]);
    }
}
