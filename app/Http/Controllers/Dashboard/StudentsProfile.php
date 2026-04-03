<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentsProfile extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $adminId = $user->role === 'admin'
            ? $user->id
            : $user->admin_id;

        $students = Student::when($request->student_search, function ($query, $search) {
            $query->where('last_name', 'like', "{$search}%")
                ->orWhere('first_name', 'like', "{$search}%");
        })
            ->whereHas('class_batch', function ($query) use ($adminId) {
                $query->where('admin_id', $adminId);
            })
            ->paginate(10);

        return view('dashboard.students-profile.index', compact('students'));
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
    public function edit(Student $student){
        return view('dashboard.students-profile.show', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student){
        $attrs = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'gender' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'address' => 'nullable|string',
            'guardian_name' => 'nullable|string',
            'guardian_phone' => 'nullable|string',
        ]);



        // Capture OLD values BEFORE update
        $original = $student->getOriginal();

        $student->update($attrs);

        // Get only changed fields
        $changes = $student->getChanges();

        // Optional: ignore fields like updated_at
        $ignore = ['updated_at'];

        $labels = [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'gender' => 'Gender',
            'birth_date' => 'Birth Date',
            'address' => 'Address',
            'guardian_name' => 'Guardian Name',
            'guardian_phone' => 'Guardian Phone',
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
            'action' => 'Updated Student',
            'details' => $student->student_number.' | '. $logDetails,
        ]);

        return redirect('/dashboard/students-profile')->with('success', 'Profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
