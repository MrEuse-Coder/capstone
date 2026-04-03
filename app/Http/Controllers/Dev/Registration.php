<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Registration extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

                $attrs = $request->validate([
                    'name' => 'required|unique:users,name',
                    'college' => 'required',
                    'role' => 'required',
                    'password' => 'required|confirmed',
                ]);


                User::create($attrs);
                return redirect('login');


    }

}
