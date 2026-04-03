<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class register extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
        $attrs = $request->validate([
            'name' => 'required|unique:users,name',
            'college' => 'required',
            'role' => 'required',
            'password' => 'required|confirmed',
        ]);


        $attrs['admin_id'] = auth()->id();

        User::create($attrs);
        return redirect('/dashboard/manage-accounts');


    }
}
