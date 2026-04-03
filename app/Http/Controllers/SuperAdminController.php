<?php

namespace App\Http\Controllers;

use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use function Pest\Laravel\get;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function impersonate($id)
    {
        $user = auth()->user();

        // 🛑 Only super admin allowed
        if (!$user->isSuperAdmin()) {

            // 🔥 If currently impersonating, restore first
            if (session()->has('impersonator_id')) {
                auth()->loginUsingId(session('impersonator_id'));
                session()->forget('impersonator_id');

                // Refresh user after restoring
                $user = auth()->user();
            }

            // Still not super admin? Block
            if (!$user->isSuperAdmin()) {
                abort(403);
            }
        }

        $admin = User::findOrFail($id);

        // 🛑 Make sure target is admin
        if (!$admin->isAdmin()) {
            abort(403);
        }

        // 🔁 ALWAYS reset old impersonation (KEY FIX)
        if (session()->has('impersonator_id')) {
            auth()->loginUsingId(session('impersonator_id'));
            session()->forget('impersonator_id');
        }

        // 💾 Save original super admin
        session(['impersonator_id' => auth()->id()]);

        // 🔄 Login as admin
        auth()->login($admin);

        return redirect('/class_batch');
    }

    public function stopImpersonation()
    {
        if (!session()->has('impersonator_id')) {
            abort(403);
        }

        // Go back to super admin
        auth()->loginUsingId(session('impersonator_id'));

        session()->forget('impersonator_id');

        return redirect('/superadmin/home');
    }

    public function index()
    {
        //
        if (session()->has('impersonator_id')) {
            auth()->loginUsingId(session('impersonator_id'));
            session()->forget('impersonator_id');
        }

        $admins = User::where('role','admin')->get();
        return view('super_admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuperAdmin $superAdmin)
    {
        //
    }
}
