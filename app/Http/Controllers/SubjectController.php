<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $subjects = Subject::orderBy('year_level','asc')
            ->orderBy('semester','asc')
            ->orderBy('curriculum','asc')
            ->orderBy('descriptive_title','asc')
            ->when($request->search_subject, function ($query, $search_subject) {
                $query->where('descriptive_title', 'like', '%' . $search_subject . '%')
                    ->orWhere('course_code', 'like', '%' . $search_subject . '%');
            })
            ->paginate(10);


        return view('subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $attrs = $request->validate([
            'course_code' => 'required',
            'descriptive_title' => 'required',
            'total_units' => 'required|min:1|max:3',
            'lec_units' => 'required|min:1|max:3',
            'lab_units' => 'required|min:1|max:3',
            'hours_week' => 'required|min:1|max:3',
            'pre_requisite' => 'required',
            'year_level' => 'required',
            'semester' => 'required',
            'curriculum' => 'required',
        ]);

        Subject::create($attrs);
        ActivityLog::create([
            'user' => auth()->user()->name,
            'role' => auth()->user()->role,
            'action' => 'Added subject',
            'details' =>$attrs['descriptive_title'],
        ]);

        return redirect('/subject/create')->withInput()->with('success', 'Subject created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
        $attrs = $request->validate([
            'course_code' => 'required',
            'descriptive_title' => 'required',
            'total_units' => 'required|min:1|max:3',
            'lec_units' => 'required|min:1|max:3',
            'lab_units' => 'required|min:1|max:3',
            'hours_week' => 'required|min:1|max:3',
            'pre_requisite' => 'required',
            'year_level' => 'required',
            'semester' => 'required',
            'curriculum' => 'required',
        ]);

// Capture OLD values
        $original = $subject->getOriginal();

// Update
        $subject->update($attrs);

// Get changes
        $changes = $subject->getChanges();

// Labels (VERY IMPORTANT)
        $labels = [
            'course_code' => 'Course Code',
            'descriptive_title' => 'Title',
            'total_units' => 'Total Units',
            'lec_units' => 'Lecture Units',
            'lab_units' => 'Lab Units',
            'hours_week' => 'Hours/Week',
            'pre_requisite' => 'Pre-requisite',
            'year_level' => 'Year Level',
            'semester' => 'Semester',
            'curriculum' => 'Curriculum',
        ];

// Ignore unnecessary fields
        $ignore = ['updated_at'];

        $logDetails = collect($changes)
            ->except($ignore)
            ->map(function ($newValue, $field) use ($original, $labels) {
                $oldValue = $original[$field] ?? 'N/A';
                $label = $labels[$field] ?? $field;

                return "$label: $oldValue → $newValue";
            })
            ->implode(' | ');

// Save log only if something changed
        if (!empty($logDetails)) {
            ActivityLog::create([
                'user' => auth()->user()->name,
                'role' => auth()->user()->role,
                'action' => 'Updated Subject' ,
                'details' => $logDetails,
            ]);
        }
        return redirect('/subjects')->with('success', 'Subject updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
        $subject->delete();
        ActivityLog::create([
            'user' => auth()->user()->name,
            'role' => auth()->user()->role,
            'action' => 'Deleted Subject' ,
            'details' => $subject->descriptive_title,
        ]);
        return redirect('/subjects');
    }
}
