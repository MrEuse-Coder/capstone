<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // for super admin only
        $attrs = $request->validate([
            'name' => 'required|unique:users,name',
            'college' => 'required',
            'role' => 'required',
            'password' => 'required|confirmed',
        ]);


        User::create($attrs);
        return redirect('/superAdmin/dashboard');

    }
}
