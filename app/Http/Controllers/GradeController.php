<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\ClassBatch;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Template;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showAddMultipleGrades(ClassBatch $class_batch, Request $request)
    {
        $subjects = Subject::where('curriculum',$class_batch->curriculum)->get();

        $subjectId = $request->subject;


        $students = $class_batch->students()
            ->with(['grades' => function ($q) use ($subjectId) {
                if ($subjectId) {
                    $q->where('subject_id', $subjectId);
                }
            }])
            ->when($request->search_student, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('last_name', 'like', "%{$search}%")
                        ->orWhere('first_name', 'like', "%{$search}%")
                        ->orWhere('student_number', 'like', "%{$search}%");
                });
            })
            ->orderBy('last_name', 'asc')
            ->paginate(10)
            ->withQueryString(); // keeps search + subject in pagination

        return view('grade.multiple-add', compact(
            'class_batch',
            'students',
            'subjects',
            'subjectId',
        ));
    }

    public function storeMultipleGrades(Request $request, ClassBatch $class_batches)
    {
        $validated = $request->validate([
            'subject' => 'required|exists:subjects,id',
            'grades' => 'required|array',
            'grades.*' => 'nullable|numeric|min:0|max:100'
        ]);

        $logs = [];

        foreach ($validated['grades'] as $studentId => $gradeValue) {

            if ($gradeValue === null || $gradeValue === '') {
                continue;
            }

            // Check if grade already exists
            $existing = Grade::where('student_id', $studentId)
                ->where('subject_id', $validated['subject'])
                ->first();

            if ($existing) {
                $oldValue = $existing->final_grade;

                // Only update if changed
                if ($oldValue != $gradeValue) {
                    $existing->update([
                        'final_grade' => $gradeValue
                    ]);

                    $logs[] = "Student ID $studentId: $oldValue → $gradeValue";
                }
            } else {
                // Create new grade
                Grade::create([
                    'student_id' => $studentId,
                    'subject_id' => $validated['subject'],
                    'final_grade' => $gradeValue
                ]);

                $logs[] = "Student ID $studentId: added ($gradeValue)";
            }
        }

        // Save ONE log for all changes
        if (!empty($logs)) {
            $subject = Subject::findOrFail($validated['subject']);
            ActivityLog::create([
                'user' => auth()->user()->name,
                'role' => auht()->user()->role,
                'action' => 'Updated Grades  ',
                'details' => 'Subject Title: '.$subject->descriptive_title.' | '. implode(' | ', $logs),
            ]);
        }

        return redirect()
            ->back()
            ->with('success', "Successfully saved!");
    }
    public function add( Student $student){

        $curriculum = $student->class_batch->curriculum;

        $subjectsYear1Sem1 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 1)
            ->where('semester', 1)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear1Sem2 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 1)
            ->where('semester', 2)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear2Sem1 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 2)
            ->where('semester', 1)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear2Sem2 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 2)
            ->where('semester', 2)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear3Sem1 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 3)
            ->where('semester', 1)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear3Sem2 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 3)
            ->where('semester', 2)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear4Sem1 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 4)
            ->where('semester', 1)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();
        $subjectsYear4Sem2 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 4)
            ->where('semester', 2)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectExist = $subjectsYear1Sem1->isNotEmpty() || $subjectsYear1Sem2->isNotEmpty() ||
                        $subjectsYear2Sem1->isNotEmpty() || $subjectsYear2Sem2->isNotEmpty() ||
                        $subjectsYear3Sem1->isNotEmpty() || $subjectsYear3Sem2->isNotEmpty() ||
                        $subjectsYear4Sem1->isNotEmpty() || $subjectsYear4Sem2->isNotEmpty();




        return view('grade.add', compact(
            'subjectExist',
            'student',
            'subjectsYear1Sem1',
            'subjectsYear1Sem2',
            'subjectsYear2Sem1',
            'subjectsYear2Sem2',
            'subjectsYear3Sem1',
            'subjectsYear3Sem2',
            'subjectsYear4Sem1',
            'subjectsYear4Sem2',

        ));
    }

        public function store(Request $request, Student $student)
        {
            $request->validate([
                'midterm.*' => 'nullable|numeric|min:0|max:100',
                'final.*'   => 'nullable|numeric|min:0|max:100',
                'final_grade.*' => 'nullable',
            ]);

            $logs = [];

            foreach ($request->midterm as $subjectId => $midtermGrade) {

                $finalGrade = $request->final[$subjectId] ?? null;
                $final_grade = $request->final_grade[$subjectId] ?? null;

                $subject = Subject::find($subjectId);
                $subjectName = $subject->descriptive_title ?? "Subject $subjectId";

                $existing = Grade::where('student_id', $student->id)
                    ->where('subject_id', $subjectId)
                    ->first();

                if ($existing) {

                    $changes = [];

                    // Midterm
                    if ($existing->midterm != $midtermGrade) {
                        $old = $existing->midterm ?? 'N/A';
                        $new = $midtermGrade ?? 'N/A';
                        $changes[] = "Midterm: $old → $new";
                    }

                    // Final
                    if ($existing->final != $finalGrade) {
                        $old = $existing->final ?? 'N/A';
                        $new = $finalGrade ?? 'N/A';
                        $changes[] = "Final: $old → $new";
                    }

                    // Final Grade
                    if ($existing->final_grade != $final_grade) {
                        $old = $existing->final_grade ?? 'N/A';
                        $new = $final_grade ?? 'N/A';
                        $changes[] = "Final Grade: $old → $new";
                    }

                    // Update only if changed
                    if (!empty($changes)) {
                        $existing->update([
                            'midterm' => $midtermGrade,
                            'final' => $finalGrade,
                            'final_grade' => $final_grade,
                        ]);

                        $logs[] = "$subjectName (" . implode(', ', $changes) . ")";
                    }

                } else {
                    // New record
                    Grade::create([
                        'student_id' => $student->id,
                        'subject_id' => $subjectId,
                        'midterm' => $midtermGrade,
                        'final' => $finalGrade,
                        'final_grade' => $final_grade,
                    ]);

                    $logs[] = "$subjectName (Added: Midterm: $midtermGrade, Final: $finalGrade, Final Grade: $final_grade)";
                }
            }

// Save ONE log
            if (!empty($logs)) {
                ActivityLog::create([
                    'user' => auth()->user()->name,
                    'role' => auth()->user()->role,
                    'action' => 'Updated Grades',
                    'details' =>'Student ID: '. $student->student_number.' | '. implode(' | ', $logs),
                ]);
            }

            return redirect('/evaluation/'.$student->id)->with('success', 'Grades saved successfully!');
        }

        public function reload(Request $request, Student $student){
            $request->validate([
                'midterm.*' => 'nullable|numeric|min:0|max:100',
                'final.*'   => 'nullable|numeric|min:0|max:100',
                'final_grade.*'   => 'nullable',
            ]);

            foreach ($request->midterm as $subjectId => $midtermGrade) {

                $finalGrade = $request->final[$subjectId] ?? null;
                $final_grade = $request->final_grade[$subjectId] ?? null;

                Grade::updateOrCreate(
                    [
                        'student_id' => $student->id,
                        'subject_id' => $subjectId,
                    ],
                    [
                        'midterm' => $midtermGrade,
                        'final'   => $finalGrade,
                        'final_grade' => $final_grade,
                    ]
                );
            }

            return redirect('/evaluation/'.$student->id)->with('success', 'Grades saved successfully!');
        }

    public function destroy(Grade $grade)
    {
        //
    }

    public function evaluation(Student $student){
        $curriculum = $student->class_batch->curriculum;

        $subjectsYear1Sem1 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 1)
            ->where('semester', 1)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear1Sem2 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 1)
            ->where('semester', 2)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear2Sem1 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 2)
            ->where('semester', 1)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear2Sem2 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 2)
            ->where('semester', 2)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear3Sem1 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 3)
            ->where('semester', 1)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear3Sem2 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 3)
            ->where('semester', 2)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();

        $subjectsYear4Sem1 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 4)
            ->where('semester', 1)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();
        $subjectsYear4Sem2 = Subject::where('curriculum', $curriculum)
            ->where('year_level', 4)
            ->where('semester', 2)
            ->with([
                'students' => function ($query) use ($student) {
                    $query->where('students.id', $student->id);
                }
            ])
            ->get();
        /*--------------------------------------------*/
        $student = $student->load('subjects');
        $template = Template::first();

        $year1Sem1Subjects = $student->subjects->where('year_level', 1)
        ->where('semester', 1)
        ->where('curriculum', $student->class_batch->curriculum);

        $year1Sem2Subjects = $student->subjects->where('year_level', 1)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        $year2Sem1Subjects = $student->subjects->where('year_level', 2)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year2Sem2Subjects = $student->subjects->where('year_level', 2)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        $year3Sem1Subjects = $student->subjects->where('year_level', 3)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year3Sem2Subjects = $student->subjects->where('year_level', 3)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        $year4Sem1Subjects = $student->subjects->where('year_level', 4)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year4Sem2Subjects = $student->subjects->where('year_level', 4)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);


        return view('grade.evaluation',compact(
            'template',
            'student',
            'year1Sem1Subjects',
            'year1Sem2Subjects',
            'year2Sem1Subjects',
            'year2Sem2Subjects',
            'year3Sem1Subjects',
            'year3Sem2Subjects',
            'year4Sem1Subjects',
            'year4Sem2Subjects',

            'subjectsYear1Sem1',
            'subjectsYear1Sem2',
            'subjectsYear2Sem1',
            'subjectsYear2Sem2',
            'subjectsYear3Sem1',
            'subjectsYear3Sem2',
            'subjectsYear4Sem1',
            'subjectsYear4Sem2',

        ));
    }



    public function generatePdf(Student $student)
    {
        set_time_limit(120);

        $student = $student->load('subjects');

        $template = Template::first();

        $year1Sem1Subjects = $student->subjects->where('year_level', 1)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year1Sem2Subjects = $student->subjects->where('year_level', 1)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        $year2Sem1Subjects = $student->subjects->where('year_level', 2)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year2Sem2Subjects = $student->subjects->where('year_level', 2)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        $year3Sem1Subjects = $student->subjects->where('year_level', 3)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year3Sem2Subjects = $student->subjects->where('year_level', 3)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        $year4Sem1Subjects = $student->subjects->where('year_level', 4)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year4Sem2Subjects = $student->subjects->where('year_level', 4)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        // Read the compiled Tailwind CSS
        $cssFiles = glob(public_path('build/assets/app-*.css'));
        $tailwindCSS = '';
        if (!empty($cssFiles)) {
            $tailwindCSS = file_get_contents($cssFiles[0]);
        }

        // Convert logo to base64 - DYNAMIC VERSION
        $headerLogoBase64 = '';
        if ($template && $template->header_logo) {
            $logoPath = storage_path('app/public/' . $template->header_logo);

            if (file_exists($logoPath)) {
                $logoData = file_get_contents($logoPath);

                // Auto-detect MIME type
                $extension = pathinfo($logoPath, PATHINFO_EXTENSION);
                $mimeType = match(strtolower($extension)) {
                    'jpg', 'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    'webp' => 'image/webp',
                    'svg' => 'image/svg+xml',
                    default => 'image/jpeg'
                };

                $headerLogoBase64 = 'data:' . $mimeType . ';base64,' . base64_encode($logoData);
            }
        }

//        // Convert logo to base64
//        $footerLogoPath = public_path('images/socotec.jpg');
//        $footerBase64 = '';
//        if (file_exists($footerLogoPath)) {
//            $logoData = file_get_contents($footerLogoPath);
//            $footerBase64 = 'data:image/jpeg;base64,' . base64_encode($logoData);
//        }

        // Convert logo to base64 - DYNAMIC VERSION
        $footerLogoBase64 = '';
        if ($template && $template->footer_logo) {
            $logoPath = storage_path('app/public/' . $template->footer_logo);

            if (file_exists($logoPath)) {
                $logoData = file_get_contents($logoPath);

                // Auto-detect MIME type
                $extension = pathinfo($logoPath, PATHINFO_EXTENSION);
                $mimeType = match(strtolower($extension)) {
                    'jpg', 'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    'webp' => 'image/webp',
                    'svg' => 'image/svg+xml',
                    default => 'image/jpeg'
                };

                $footerLogoBase64 = 'data:' . $mimeType . ';base64,' . base64_encode($logoData);
            }
        }

        $html = view('grade.eval-sheetPdf', compact(
            'template',
            'student',
            'headerLogoBase64',
            'footerLogoBase64',
            'tailwindCSS',
            'year1Sem1Subjects',
            'year1Sem2Subjects',
            'year2Sem1Subjects',
            'year2Sem2Subjects',
            'year3Sem1Subjects',
            'year3Sem2Subjects',
            'year4Sem1Subjects',
            'year4Sem2Subjects',
        ))->render();

        $filename = 'evaluation_' . $student->student_number . '_' . date('Y-m-d') . '.pdf';
        $tempPath = storage_path('app/temp/' . $filename);

        if (!file_exists(storage_path('app/temp'))) {
            mkdir(storage_path('app/temp'), 0755, true);
        }

        try {
            Browsershot::html($html)
                ->paperSize(8.5, 13, 'in')
                ->showBackground()
                ->timeout(120)
                ->save($tempPath);

            return response()->download($tempPath, $filename)->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            \Log::error('PDF Generation Error: ' . $e->getMessage());
            return back()->with('error', 'Failed to generate PDF: ' . $e->getMessage());
        }
    }

    public function printPdf(Student $student)
    {
        set_time_limit(120);

        $student = $student->load('subjects');

        $template = Template::first();

        $year1Sem1Subjects = $student->subjects->where('year_level', 1)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year1Sem2Subjects = $student->subjects->where('year_level', 1)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        $year2Sem1Subjects = $student->subjects->where('year_level', 2)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year2Sem2Subjects = $student->subjects->where('year_level', 2)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        $year3Sem1Subjects = $student->subjects->where('year_level', 3)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year3Sem2Subjects = $student->subjects->where('year_level', 3)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        $year4Sem1Subjects = $student->subjects->where('year_level', 4)
            ->where('semester', 1)
            ->where('curriculum', $student->class_batch->curriculum);

        $year4Sem2Subjects = $student->subjects->where('year_level', 4)
            ->where('semester', 2)
            ->where('curriculum', $student->class_batch->curriculum);

        // Read the compiled Tailwind CSS
        $cssFiles = glob(public_path('build/assets/app-*.css'));
        $tailwindCSS = '';
        if (!empty($cssFiles)) {
            $tailwindCSS = file_get_contents($cssFiles[0]);
        }

        // Convert logo to base64 - DYNAMIC VERSION
        $headerLogoBase64 = '';
        if ($template && $template->header_logo) {
            $logoPath = storage_path('app/public/' . $template->header_logo);

            if (file_exists($logoPath)) {
                $logoData = file_get_contents($logoPath);

                // Auto-detect MIME type
                $extension = pathinfo($logoPath, PATHINFO_EXTENSION);
                $mimeType = match(strtolower($extension)) {
                    'jpg', 'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    'webp' => 'image/webp',
                    'svg' => 'image/svg+xml',
                    default => 'image/jpeg'
                };

                $headerLogoBase64 = 'data:' . $mimeType . ';base64,' . base64_encode($logoData);
            }
        }

//        // Convert logo to base64
//        $footerLogoPath = public_path('images/socotec.jpg');
//        $footerBase64 = '';
//        if (file_exists($footerLogoPath)) {
//            $logoData = file_get_contents($footerLogoPath);
//            $footerBase64 = 'data:image/jpeg;base64,' . base64_encode($logoData);
//        }

        // Convert logo to base64 - DYNAMIC VERSION
        $footerLogoBase64 = '';
        if ($template && $template->footer_logo) {
            $logoPath = storage_path('app/public/' . $template->footer_logo);

            if (file_exists($logoPath)) {
                $logoData = file_get_contents($logoPath);

                // Auto-detect MIME type
                $extension = pathinfo($logoPath, PATHINFO_EXTENSION);
                $mimeType = match(strtolower($extension)) {
                    'jpg', 'jpeg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif',
                    'webp' => 'image/webp',
                    'svg' => 'image/svg+xml',
                    default => 'image/jpeg'
                };

                $footerLogoBase64 = 'data:' . $mimeType . ';base64,' . base64_encode($logoData);
            }
        }

        return view('grade.eval-sheetPdf', compact(
            'template',
            'student',
            'headerLogoBase64',
            'footerLogoBase64',
            'tailwindCSS',
            'year1Sem1Subjects',
            'year1Sem2Subjects',
            'year2Sem1Subjects',
            'year2Sem2Subjects',
            'year3Sem1Subjects',
            'year3Sem2Subjects',
            'year4Sem1Subjects',
            'year4Sem2Subjects',
        ));
    }

}


