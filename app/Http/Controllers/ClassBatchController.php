<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ClassBatch;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //for the dropdown list of class year batches
        $classSchoolYears = ClassBatch::where('admin_id', auth()->id())
            ->select('school_year')
            ->distinct()
            ->orderBy('school_year')
            ->pluck('school_year');

        //counting no. of students
        //getting the value of the dropdown and query it
        $classBatches = ClassBatch::withCount('students')->when($request->filled('school_year'), function ($query) use ($request) {$query->where('school_year', $request->school_year)->where('admin_id', auth()->user()->id);
        });

        $user = Auth::user();

        $adminId = $user->role === 'admin'
            ? $user->id
            : $user->admin_id;

        //get the filtered class batches
        $classBatches = $classBatches->where('admin_id', $adminId)->latest()->get();

        return view('class_batch.index', compact('classBatches',  'classSchoolYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('class_batch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $attrs = $request->validate([
            'batch_name' => 'required|unique:class_batches,batch_name',
            'school_year' => 'required',
            'curriculum' => 'required',
        ]);

        if(auth()->user()->role === 'admin'){
            $attrs['admin_id'] = auth()->id();
        }else if(auth()->user()->role === 'user'){
            $attrs['admin_id'] = auth()->user()->admin_id;
        }

        ClassBatch::create($attrs);

        $user = session()->has('impersonator_id')
            ? User::find(session('impersonator_id')) // super admin
            : auth()->user(); // normal user

        $actor = auth()->user(); // current logged-in (admin if impersonating)

        if (session()->has('impersonator_id')) {
            $superAdmin = User::find(session('impersonator_id'));

            $action ='Added Batch (through ' . $actor->name.')';
        } else {
            $action = 'Added Batch';
        }

        ActivityLog::create([
           'user' => $user->name,
           'role' => $user->role,
           'action' => $action,
            'details' => $attrs['batch_name']
        ]);
        return redirect('/class_batch')->with('success', 'Batch created');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassBatch $classBatch)
    {
        //
        foreach ($classBatch->students as $student) {
            $student->grades()->delete();
        }

        $classBatch->students()->delete();
        $classBatch->delete();

        ActivityLog::create([
            'user' => auth()->user()->name,
            'role' => auth()->user()->role,
            'action' => 'Deleted Batch',
            'details' => $classBatch->batch_name
        ]);
        return redirect('/class_batch')->with('success', 'Batch deleted');
    }
}
