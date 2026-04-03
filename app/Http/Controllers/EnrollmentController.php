<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // app/Http/Controllers/EnrollmentController.php
    public function toggle(Request $request, Student $student)
    {
        $request->validate([
            'sem' => 'required|in:1st_sem,2nd_sem,summer',
        ]);

        $enrollment = Enrollment::firstOrCreate(
            ['student_id' => $student->id]
        );

        $sem = $request->sem;
        $enrollment->$sem = !$enrollment->$sem;
        $enrollment->save();

        return response()->json([
            'enrolled' => $enrollment->$sem,
        ]);
    }

    public function index()
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
