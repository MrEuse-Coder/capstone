<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ClassBatch;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(ClassBatch $class_batch, Request $request)
    {
        //
        $class_batches = $class_batch->all();
        $students = $class_batch->students()->orderBy('last_name','asc')
            ->when($request->search_student, function ($query, $search_student) {
                $query->where('last_name', 'like', '%' . $search_student . '%')
                ->orWhere('first_name', 'like', '%' . $search_student . '%');
            })
            ->paginate(10);
        return view('student.index', compact('students','class_batches', 'class_batch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ClassBatch $class_batch)
    {
        //
        return view('student.create', compact('class_batch'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassBatch $class_batch, Request $request)
    {
        // Validate the request
        $attrs = $request->validate([
            'student_number' => 'required|unique:students,student_number|regex:/^\d{2}-\d{4}$/',
            'section' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'nullable',
            'gender' => 'nullable',
        ]);

        // Check for duplicate full name in the same batch
        $existingStudent = Student::where('first_name', $request->first_name)
            ->where('last_name', $request->last_name)
            ->where('middle_name', $request->middle_name)
            ->where('class_batch_id', $class_batch->id) // ensure it's the same batch
            ->first();

        if ($existingStudent) {
            return back()
                ->withInput()
                ->withErrors([
                    'first_name' => 'A student with this exact name already exists in this batch.'
                ]);
        }

        // Assign class batch
        $attrs['class_batch_id'] = $class_batch->id;

        // Create student
        $student = Student::create($attrs);

        // Get all subject IDs
        $subjectIds = Subject::pluck('id');

        // Create grades for each subject
        foreach ($subjectIds as $subjectId) {
            Grade::updateOrCreate(
                [
                    'student_id' => $student->id,
                    'subject_id' => $subjectId
                ]
            );
        }

        ActivityLog::create([
            'user' => auth()->user()->name,
            'role' => auth()->user()->role,
            'action' => 'Added Student',
            'details' => $student->student_number.' | '.$student->first_name.' '.$student->middle_name.' '.$student->last_name
        ]);

        return redirect('/class_batch/students/'.$class_batch->id)
            ->with('success', 'Student added successfully');
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
    public function move(Student $student, Request $request)
    {
        $attrs = $request->validate([
            'target_batch_id' => 'required|exists:class_batches,id',
        ]);

        // Update the student's class_batch_id
        $student->update([
            'class_batch_id' => $attrs['target_batch_id']
        ]);

        return redirect('/class_batch')->with('success', 'Student moved successfully!');
    }

    public function destroy(Student $student)
    {
        //
        $batchId = $student->class_batch->id;
        $student->grades()->delete();
        $student->delete();
        ActivityLog::create([
            'user' => auth()->user()->name,
            'role' => auth()->user()->role,
            'action' => 'Deleted Student',
            'details' => $student->student_number.' | '.$student->first_name.' '.$student->middle_name.' '.$student->last_name
        ]);
        return redirect()->route('class_batch_students.index', $batchId);
    }
}
