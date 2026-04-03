<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\ClassBatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Batch extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $adminId = $user->role === 'admin'
            ? $user->id
            : $user->admin_id;
        //
        $batches = ClassBatch::orderBy('batch_name','asc')->
            when(request('search_batch'), function ($query, $search_batch) {
                $query->where('batch_name', 'like', '%' . $search_batch . '%');
        })->where('admin_id', $adminId)->paginate(10);

        return view('dashboard.classBatch.index', compact('batches'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassBatch $batch)
    {
        //
        return view('dashboard.classBatch.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassBatch $batch)
    {
        $attrs = $request->validate([
            'batch_name' => 'required|unique:class_batches,batch_name,' . $batch->id,
            'school_year' => 'required',
            'curriculum' => 'required',
        ]);

        // Capture OLD values BEFORE update
        $original = $batch->getOriginal();

        $attrs['admin_id'] = $request->user()->id;

        // Perform update
        $batch->update($attrs);

        // Get only changed fields
        $changes = $batch->getChanges();

        // Optional: ignore fields like updated_at
        $ignore = ['updated_at'];

        $labels = [
            'batch_name' => 'Batch Name',
            'school_year' => 'School Year',
            'curriculum' => 'Curriculum',
        ];

        $logDetails = collect($changes)
            ->except($ignore)
            ->map(function ($newValue, $field) use ($original, $labels) {
                $oldValue = $original[$field] ?? null;
                $label = $labels[$field] ?? $field;

                return "$label: $oldValue → $newValue";
            })
            ->implode(' | ');

        ActivityLog::create([
            'user' => auth()->user()->name,
            'role' => auth()->user()->role,
            'action' => 'Updated Batch',
            'details' => $logDetails,
        ]);

        return redirect('/class_batch')->with('success', 'Batch updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
