<x-layout>
    <!-- Header -->
    <div class="bg-white shadow-sm border-b sticky top-0 z-20">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex items-center gap-6">
                <!-- Back Button -->
                <a href="{{url()->previous()}}" class="flex items-center justify-center w-10 h-10 bg-[#3a8a0f] hover:bg-green-700 text-white rounded-lg transition shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>



            </div>
        </div>
    </div>

    <div class="min-h-screen bg-gray-50 p-6">
        <div class="flex justify-center mt-4 gap-2">
            <!-- Print Button -->
            <div class="fixed z-50 right-1 bottom-20">
                <div class="flex flex-col justify-center mt-8 gap-2">
                    <button
                        type="submit"
                        form="form"
                        id="submitBtn"
                        class="bg-[#3a8a0f] gap-1 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg transition transform hover:scale-105 inline-flex items-center">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"/>
                        </svg>
                        Refresh
                    </button>

                    <a href="/evaluation/{{ $student->id }}/pdf"
                       class="bg-[#3a8a0f] gap-1 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg transition transform hover:scale-105 inline-flex items-center">
                        <svg class=" w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2 2 2 0 0 0 2 2h12a2 2 0 0 0 2-2 2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V4a2 2 0 0 0-2-2h-7Zm-6 9a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h.5a2.5 2.5 0 0 0 0-5H5Zm1.5 3H6v-1h.5a.5.5 0 0 1 0 1Zm4.5-3a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h1.376A2.626 2.626 0 0 0 15 15.375v-1.75A2.626 2.626 0 0 0 12.375 11H11Zm1 5v-3h.375a.626.626 0 0 1 .625.626v1.748a.625.625 0 0 1-.626.626H12Zm5-5a1 1 0 0 0-1 1v5a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1h1a1 1 0 1 0 0-2h-2Z" clip-rule="evenodd"/>
                        </svg>

                        Download
                    </a>

                    <a href="/evaluation/{{ $student->id }}/pdf_print"
                       target="_blank"
                       class="bg-[#3a8a0f] gap-1 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg transition transform hover:scale-105 inline-flex items-center">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z"/>
                        </svg>

                        Print
                    </a>
                </div>
            </div>



        </div>

        <div class="max-w-7xl mx-auto bg-white shadow-lg rounded-lg p-8">

          {{--  <!-- Header with Logo -->
            <div class="text-center mb-6">
                <img
                    src="https://i.postimg.cc/vm3zNzrV/essu-new-logo-header-2-removebg-preview.png"
                    alt="ESSU Logo"
                    class="mx-auto h-24 mb-4"
                >

                <h1 class="text-2xl font-bold text-gray-800 mb-2">
                {{$template->bachelors_degree?? ''}}
                </h1>
                <p class="text-gray-600 text-sm">Effective SY {{$template->curriculum?? ''}}</p>
                <p class="text-gray-500 text-xs">
                    (Revised per CMO 25 S 2015, CHED CMO 20 S of 2013 and CHED CMO 04 s 2018)
                </p>
            </div>--}}

            <!-- Student Information Card -->
            <div class="bg-[#3a8a0f] rounded-lg p-6 mb-6 border border-[#3a8a0f]">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <span class="text-white font-medium">Name:</span>
                        <span class="font-bold text-white ml-2 uppercase">
                            {{ $student->last_name }}, {{ $student->first_name }} {{ substr($student->middle_name, 0, 1) }}.
                        </span>
                    </div>
                    <div>
                        <span class="text-white font-medium">Sex:</span>
                        <span class="font-bold text-white ml-2 uppercase">{{ substr($student->gender ,0,1) }}</span>
                    </div>
                    <div class="md:col-span-2">
                        <span class="text-white font-medium">Student No:</span>
                        <span class="font-bold text-white ml-2 uppercase">{{ $student->student_number }}</span>
                    </div>
                </div>
            </div>

            @php
                // Define all year/semester data structure to eliminate repetition
                $academicStructure = [
                    ['year' => 'FIRST YEAR', 'semesters' => [
                        ['title' => 'First Semester', 'subjects' => $year1Sem1Subjects],
                        ['title' => 'Second Semester', 'subjects' => $year1Sem2Subjects]
                    ]],
                    ['year' => 'SECOND YEAR', 'semesters' => [
                        ['title' => 'First Semester', 'subjects' => $year2Sem1Subjects],
                        ['title' => 'Second Semester', 'subjects' => $year2Sem2Subjects]
                    ]],
                    ['year' => 'THIRD YEAR', 'semesters' => [
                        ['title' => 'First Semester', 'subjects' => $year3Sem1Subjects],
                        ['title' => 'Second Semester', 'subjects' => $year3Sem2Subjects]
                    ]],
                    ['year' => 'FOURTH YEAR', 'semesters' => [
                        ['title' => 'First Semester', 'subjects' => $year4Sem1Subjects],
                        ['title' => 'Second Semester', 'subjects' => $year4Sem2Subjects]
                    ]]
                ];
            @endphp

                <!-- Academic Records -->
            @foreach($academicStructure as $yearData)
                <!-- Year Header -->
                <div class="bg-[#3a8a0f] text-white font-bold text-lg px-6 py-3 rounded-t-lg mt-8">
                    {{ $yearData['year'] }}
                </div>

                @foreach($yearData['semesters'] as $semesterData)
                    @if($semesterData['subjects']->count() > 0)
                        <!-- Semester Subheader -->
                        <div class="bg-green-100 text-[#3a8a0f] font-semibold px-6 py-2 border-l-4 border-[#3a8a0f]">
                            {{ $semesterData['title'] }}
                        </div>

                        <!-- Subjects Table -->
                        <div class="overflow-x-auto mb-6">
                            <table class="min-w-full border border-gray-200 rounded-b-lg">
                                <thead class="bg-gray-100">
                                <tr class="text-center text-sm">
                                    <th class="px-4 py-3 font-semibold text-gray-700 border-r">Final Grade</th>
                                    <th class="px-4 py-3 font-semibold text-gray-700 border-r">Course Code</th>
                                    <th class="px-4 py-3 font-semibold text-gray-700 border-r">Descriptive Title</th>
                                    <th class="px-4 py-3 font-semibold text-gray-700 border-r">Total Units</th>
                                    <th class="px-4 py-3 font-semibold text-gray-700 border-r">Lec Units</th>
                                    <th class="px-4 py-3 font-semibold text-gray-700 border-r">Lab Units</th>
                                    <th class="px-4 py-3 font-semibold text-gray-700 border-r">Hours/Week</th>
                                    <th class="px-4 py-3 font-semibold text-gray-700">Pre-Requisite</th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($semesterData['subjects'] as $subject)
                                    <tr class="text-center hover:bg-gray-50 transition text-sm">
                                        <td class="px-4 py-3 text-gray-800 border-r font-semibold">
                                            @php
                                                $midterm = $subject->pivot->midterm ?? 0;
                                                $final = $subject->pivot->final ?? 0;
                                                $average = ($midterm + $final) / 2;
                                                $final_grade = $subject->pivot->final_grade ;
                                            @endphp
                                            @if($final_grade)
                                                {{$final_grade}}
                                            @elseif(!$midterm || !$final)

                                            @else
                                                {{ number_format($average, 1) }}
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-gray-800 border-r font-medium uppercase">
                                            {{ $subject->course_code }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-800 border-r text-left">
                                            {{ $subject->descriptive_title }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-800 border-r">
                                            {{ ($u = $subject->total_units) == floor($u) ? floor($u) : number_format($u, 1) }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-800 border-r">
                                            {{ ($u = $subject->lec_units) == floor($u) ? floor($u) : number_format($u, 1) }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-800 border-r">
                                            {{ ($u = $subject->lab_units) == floor($u) ? floor($u) : number_format($u, 1) }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-800 border-r">
                                            {{ ($u = $subject->hours_week) == floor($u) ? floor($u) : number_format($u, 1) }}
                                        </td>
                                        <td class="px-4 py-3 text-gray-800 text-sm">
                                            {{ $subject->pre_requisite ?? 'None' }}
                                        </td>
                                    </tr>
                                @endforeach

                                <!-- Total Row -->
                                <tr class="bg-green-50 font-bold text-center text-sm border-t-2 border-[#3a8a0f]">
                                    <td class="px-4 py-3 border-r"></td>
                                    <td class="px-4 py-3 border-r"></td>
                                    <td class="px-4 py-3 text-right border-r text-[#3a8a0f]">TOTAL</td>
                                    <td class="px-4 py-3 border-r text-[#3a8a0f]">
                                        @php
                                            $total = $semesterData['subjects']->sum('total_units');
                                        @endphp
                                        {{ (floor($total) == $total) ? $total : number_format($total, 1) }}
                                    </td>

                                    <td class="px-4 py-3 border-r text-[#3a8a0f]">
                                        @php
                                            $total = $semesterData['subjects']->sum('lec_units');
                                        @endphp
                                        {{ (floor($total) == $total) ? $total : number_format($total, 1) }}
                                    </td>
                                    <td class="px-4 py-3 border-r text-[#3a8a0f]">
                                        @php
                                            $total = $semesterData['subjects']->sum('lab_units');
                                        @endphp
                                        {{ (floor($total) == $total) ? $total : number_format($total, 1) }}
                                    </td>
                                    <td class="px-4 py-3 border-r text-[#3a8a0f]">
                                        @php
                                            $total = $semesterData['subjects']->sum('hours_week');
                                        @endphp
                                        {{ (floor($total) == $total) ? $total : number_format($total, 1) }}
                                    </td>
                                    <td class="px-4 py-3"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endforeach
            @endforeach


        </div>
    </div>

    {{--REload subjects--==========================================--}}
    <form action="/class_batch/students/{{ $student->id }}/reload"
          method="POST"
          class="max-w-7xl mx-auto p-6 hidden"
          id="form"
          onsubmit="handleSubmit(event)">
        @csrf


            <!-- Table Header -->
            <div class="bg-gradient-to-r from-violet-600 to-violet-700 rounded-t-lg p-4 mb-1 shadow-md sticky top-0 z-10">
                <div class="grid grid-cols-3 text-white font-bold text-center items-center">
                    <div class="flex justify-center gap-4">
                        <div class="w-32">MIDTERM</div>
                        <div class="w-32">FINALS</div>
                        <div class="w-32">FINAL GRADE</div>
                    </div>
                    <div>COURSE CODE</div>
                    <div>DESCRIPTIVE TITLE</div>
                </div>
            </div>

            <!-- Subjects by Year and Semester -->
            @php
                $yearSemesters = [
                    ['year' => 'FIRST YEAR', 'semesters' => [
                        ['title' => 'First Semester', 'subjects' => $subjectsYear1Sem1],
                        ['title' => 'Second Semester', 'subjects' => $subjectsYear1Sem2]
                    ]],
                    ['year' => 'SECOND YEAR', 'semesters' => [
                        ['title' => 'First Semester', 'subjects' => $subjectsYear2Sem1],
                        ['title' => 'Second Semester', 'subjects' => $subjectsYear2Sem2]
                    ]],
                    ['year' => 'THIRD YEAR', 'semesters' => [
                        ['title' => 'First Semester', 'subjects' => $subjectsYear3Sem1],
                        ['title' => 'Second Semester', 'subjects' => $subjectsYear3Sem2]
                    ]],
                    ['year' => 'FOURTH YEAR', 'semesters' => [
                        ['title' => 'First Semester', 'subjects' => $subjectsYear4Sem1],
                        ['title' => 'Second Semester', 'subjects' => $subjectsYear4Sem2]
                    ]]
                ];
            @endphp

            @foreach($yearSemesters as $yearData)
                <!-- Year Header -->
                <div class="bg-violet-100 border-l-4 border-violet-600 px-4 py-3 mt-6 mb-3 rounded">
                    <h2 class="text-xl font-bold text-violet-900">{{ $yearData['year'] }}</h2>
                </div>

                @foreach($yearData['semesters'] as $semesterData)
                    @if(count($semesterData['subjects']) > 0)
                        <!-- Semester Header -->
                        <div class="bg-gray-100 px-4 py-2 mb-2 rounded">
                            <h3 class="text-lg font-semibold text-gray-700">{{ $semesterData['title'] }}</h3>
                        </div>

                        <!-- Subject List -->
                        <div class="space-y-2 mb-4">
                            @foreach($semesterData['subjects'] as $subject)
                                <div class="grid grid-cols-3 items-center bg-white rounded-lg shadow-sm p-4 hover:shadow-md transition-shadow duration-200">

                                    @php
                                        // Get the pivot data for this student
                                        $studentSubject = $subject->students->first();
                                        $midterm = $studentSubject->pivot->midterm ?? '';
                                        $final = $studentSubject->pivot->final ?? '';
                                        $final_grade = $studentSubject->pivot->final_grade ?? '';
                                    @endphp

                                        <!-- Grades Input -->
                                    <div class="flex justify-center gap-4">
                                        <input type="text"
                                               name="midterm[{{ $subject->id }}]"
                                               class="w-32 px-3 py-2 bg-violet-50 border border-violet-200 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition"
                                               placeholder="0.0"
                                               value="{{ $midterm}}"
                                               pattern="[0-9]*\.?[0-9]*"
                                               maxlength="4"/>

                                        <input type="text"
                                               name="final[{{ $subject->id }}]"
                                               class="w-32 px-3 py-2 bg-violet-50 border border-violet-200 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition"
                                               placeholder="0.0"
                                               value="{{ $final}}"
                                               pattern="[0-9]*\.?[0-9]*"
                                               maxlength="4"/>

                                                                                    final grade input
                                        <input type="text"
                                               name="final_grade[{{ $subject->id }}]"
                                               class="w-32 px-3 py-2 bg-violet-50 border border-violet-200 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-violet-500 focus:border-transparent transition"
                                               placeholder="0.0"
                                               value="{{ $final_grade}}"
                                        />
                                    </div>

                                    <!-- Course Code -->
                                    <div class="text-center">
                                            <span class="inline-block px-3 py-1 bg-violet-100 text-violet-800 font-bold rounded-md uppercase text-sm">
                                                {{ $subject->course_code }}
                                            </span>
                                    </div>

                                    <!-- Descriptive Title -->
                                    <div class="text-center">
                                            <span class="font-semibold text-gray-800 uppercase text-sm">
                                                {{ $subject->descriptive_title }}
                                            </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            @endforeach


    </form>

</x-layout>























{{--<x-layout>--}}
{{--    <div class="m-4">--}}
{{--        <div class="w-100">--}}
{{--            <img src="https://i.postimg.cc/vm3zNzrV/essu-new-logo-header-2-removebg-preview.png">--}}
{{--        </div>--}}

{{--        <div class="flex flex-col text-center mb-3">--}}
{{--            <h1 class="font-bold text-xl">BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY (BSIT)</h1>--}}
{{--            <span class="text-lg">Effective SY 2022-2023</span>--}}
{{--            <span class="text-lg">(Revised per CMO 25 S 2015, CHED CMO 20 S of 2013 and CHED CMO 04 s 2018)</span>--}}
{{--        </div>--}}

{{--        <div class="grid grid-cols-2 mb-5 text-lg">--}}
{{--            <div class="">--}}
{{--                <span>Name: <span class="font-bold">{{$student->last_name}}, {{$student->first_name}} {{substr($student->middle_name,0,1)}}.  </span></span>--}}
{{--            </div>--}}
{{--            <div class="">--}}
{{--                <span>Sex: <span class="font-bold">{{$student->gender}}</span></span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="mb-3 text-lg">--}}
{{--            <div class="flex justify-start">--}}
{{--                <span>Student No: <span class="font-bold">{{$student->student_number}}</span></span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="overflow-x-auto m-4">--}}
{{--        <div class="font-bold text-lg">--}}
{{--            FIRST YEAR--}}
{{--        </div>--}}
{{--        <div class="text-lg">--}}
{{--            First Semester--}}
{{--        </div>--}}

{{--        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-md ">--}}
{{--            <thead class="bg-gray-100">--}}
{{--            <tr class="text-center">--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Final Grade</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Course Code</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Descriptive Title</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Total Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lec Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lab Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Hours/Week</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Pre-Requisite</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody class="bg-white divide-y divide-gray-200">--}}
{{--            @foreach($year1Sem1Subjects as $subject)--}}

{{--                    <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                        <td class="px-4 py-2 text-sm text-gray-800">--}}
{{--                            @php--}}
{{--                            $midterm = $subject->pivot->midterm;--}}
{{--                            $final = $subject->pivot->final;--}}
{{--                            $average = round(($midterm + $final) / 2, 1);--}}
{{--                            @endphp--}}
{{--                            {{$average}}--}}
{{--                        </td>--}}
{{--                        <td class="px-4 py-2 text-sm text-gray-800">{{$subject->course_code}}</td>--}}
{{--                        <td class="px-4 py-2 text-sm text-gray-800">{{$subject->descriptive_title}}</td>--}}
{{--                        <td class="px-4 py-2 text-sm text-gray-800">{{$subject->total_units}}</td>--}}
{{--                        <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lec_units}}</td>--}}
{{--                        <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lab_units}}</td>--}}
{{--                        <td class="px-4 py-2 text-sm text-gray-800">{{$subject->hours_week}}</td>--}}
{{--                        <td class="px-4 py-2 text-sm text-gray-800">{{$subject->pre_requisite}}</td>--}}
{{--                    </tr>--}}

{{--            @endforeach--}}

{{--            <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">TOTAL</td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                @php--}}
{{--                $total_units = $year1Sem1Subjects->sum('total_units');--}}
{{--                @endphp--}}
{{--                    {{$total_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lec_units = $year1Sem1Subjects->sum('lec_units');--}}
{{--                    @endphp--}}
{{--                    {{$lec_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lab_units = $year1Sem1Subjects->sum('lab_units');--}}
{{--                    @endphp--}}
{{--                    {{$lab_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $hours_week = $year1Sem1Subjects->sum('hours_week');--}}
{{--                    @endphp--}}
{{--                    {{$hours_week}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--            </tr>--}}

{{--            </tbody>--}}
{{--        </table>--}}

{{----------------------------------------------------------------------------------------------------------------------}}
{{--        <div class="text-lg mt-4">--}}
{{--            Second Semester--}}
{{--        </div>--}}

{{--        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-md ">--}}
{{--            <thead class="bg-gray-100">--}}
{{--            <tr class="text-center">--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Final Grade</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Course Code</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Descriptive Title</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Total Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lec Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lab Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Hours/Week</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Pre-Requisite</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody class="bg-white divide-y divide-gray-200">--}}
{{--            @foreach($year1Sem2Subjects as $subject)--}}

{{--                <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">--}}
{{--                        @php--}}
{{--                            $midterm = $subject->pivot->midterm;--}}
{{--                            $final = $subject->pivot->final;--}}
{{--                            $average = round(($midterm + $final) / 2, 1);--}}
{{--                        @endphp--}}
{{--                        {{$average}}--}}
{{--                    </td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->course_code}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->descriptive_title}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->total_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lec_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lab_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->hours_week}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->pre_requisite}}</td>--}}
{{--                </tr>--}}

{{--            @endforeach--}}

{{--            <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">TOTAL</td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $total_units = $year1Sem2Subjects->sum('total_units');--}}
{{--                    @endphp--}}
{{--                    {{$total_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lec_units = $year1Sem2Subjects->sum('lec_units');--}}
{{--                    @endphp--}}
{{--                    {{$lec_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lab_units = $year1Sem2Subjects->sum('lab_units');--}}
{{--                    @endphp--}}
{{--                    {{$lab_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $hours_week = $year1Sem2Subjects->sum('hours_week');--}}
{{--                    @endphp--}}
{{--                    {{$hours_week}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--            </tr>--}}

{{--            </tbody>--}}
{{--        </table>--}}

{{------------------------------------------------------------------------------------------------------------------------}}
{{--        <div class="font-bold text-lg  mt-4">--}}
{{--            SECOND YEAR--}}
{{--        </div>--}}
{{--        <div class="text-lg">--}}
{{--            First Semester--}}
{{--        </div>--}}

{{--        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-md ">--}}
{{--            <thead class="bg-gray-100">--}}
{{--            <tr class="text-center">--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Final Grade</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Course Code</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Descriptive Title</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Total Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lec Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lab Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Hours/Week</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Pre-Requisite</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody class="bg-white divide-y divide-gray-200">--}}
{{--            @foreach($year2Sem1Subjects as $subject)--}}

{{--                <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">--}}
{{--                        @php--}}
{{--                            $midterm = $subject->pivot->midterm;--}}
{{--                            $final = $subject->pivot->final;--}}
{{--                            $average = round(($midterm + $final) / 2, 1);--}}
{{--                        @endphp--}}
{{--                        {{$average}}--}}
{{--                    </td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->course_code}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->descriptive_title}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->total_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lec_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lab_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->hours_week}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->pre_requisite}}</td>--}}
{{--                </tr>--}}

{{--            @endforeach--}}

{{--            <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">TOTAL</td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $total_units = $year2Sem1Subjects->sum('total_units');--}}
{{--                    @endphp--}}
{{--                    {{$total_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lec_units = $year2Sem1Subjects->sum('lec_units');--}}
{{--                    @endphp--}}
{{--                    {{$lec_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lab_units = $year2Sem1Subjects->sum('lab_units');--}}
{{--                    @endphp--}}
{{--                    {{$lab_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $hours_week = $year2Sem1Subjects->sum('hours_week');--}}
{{--                    @endphp--}}
{{--                    {{$hours_week}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--            </tr>--}}

{{--            </tbody>--}}
{{--        </table>--}}

{{--        --}}{{------------------------------------------------------------------------------------------------------------------------}}
{{--        <div class="text-lg mt-4">--}}
{{--            Second Semester--}}
{{--        </div>--}}

{{--        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-md ">--}}
{{--            <thead class="bg-gray-100">--}}
{{--            <tr class="text-center">--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Final Grade</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Course Code</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Descriptive Title</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Total Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lec Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lab Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Hours/Week</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Pre-Requisite</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody class="bg-white divide-y divide-gray-200">--}}
{{--            @foreach($year2Sem2Subjects as $subject)--}}

{{--                <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">--}}
{{--                        @php--}}
{{--                            $midterm = $subject->pivot->midterm;--}}
{{--                            $final = $subject->pivot->final;--}}
{{--                            $average = round(($midterm + $final) / 2, 1);--}}
{{--                        @endphp--}}
{{--                        {{$average}}--}}
{{--                    </td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->course_code}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->descriptive_title}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->total_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lec_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lab_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->hours_week}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->pre_requisite}}</td>--}}
{{--                </tr>--}}

{{--            @endforeach--}}

{{--            <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">TOTAL</td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $total_units = $year2Sem2Subjects->sum('total_units');--}}
{{--                    @endphp--}}
{{--                    {{$total_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lec_units = $year2Sem2Subjects->sum('lec_units');--}}
{{--                    @endphp--}}
{{--                    {{$lec_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lab_units = $year2Sem2Subjects->sum('lab_units');--}}
{{--                    @endphp--}}
{{--                    {{$lab_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $hours_week = $year2Sem2Subjects->sum('hours_week');--}}
{{--                    @endphp--}}
{{--                    {{$hours_week}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--            </tr>--}}

{{--            </tbody>--}}
{{--        </table>--}}

{{--        --}}{{------------------------------------------------------------------------------------------------------------------------}}
{{--        <div class="font-bold text-lg  mt-4">--}}
{{--            THIRD YEAR--}}
{{--        </div>--}}
{{--        <div class="text-lg">--}}
{{--            First Semester--}}
{{--        </div>--}}

{{--        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-md ">--}}
{{--            <thead class="bg-gray-100">--}}
{{--            <tr class="text-center">--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Final Grade</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Course Code</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Descriptive Title</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Total Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lec Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lab Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Hours/Week</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Pre-Requisite</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody class="bg-white divide-y divide-gray-200">--}}
{{--            @foreach($year3Sem1Subjects as $subject)--}}

{{--                <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">--}}
{{--                        @php--}}
{{--                            $midterm = $subject->pivot->midterm;--}}
{{--                            $final = $subject->pivot->final;--}}
{{--                            $average = round(($midterm + $final) / 2, 1);--}}
{{--                        @endphp--}}
{{--                        {{$average}}--}}
{{--                    </td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->course_code}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->descriptive_title}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->total_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lec_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lab_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->hours_week}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->pre_requisite}}</td>--}}
{{--                </tr>--}}

{{--            @endforeach--}}

{{--            <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">TOTAL</td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $total_units = $year3Sem1Subjects->sum('total_units');--}}
{{--                    @endphp--}}
{{--                    {{$total_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lec_units = $year3Sem1Subjects->sum('lec_units');--}}
{{--                    @endphp--}}
{{--                    {{$lec_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lab_units = $year3Sem1Subjects->sum('lab_units');--}}
{{--                    @endphp--}}
{{--                    {{$lab_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $hours_week = $year3Sem1Subjects->sum('hours_week');--}}
{{--                    @endphp--}}
{{--                    {{$hours_week}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--            </tr>--}}

{{--            </tbody>--}}
{{--        </table>--}}

{{--        --}}{{------------------------------------------------------------------------------------------------------------------------}}

{{--        <div class="text-lg mt-4">--}}
{{--            Second Semester--}}
{{--        </div>--}}

{{--        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-md ">--}}
{{--            <thead class="bg-gray-100">--}}
{{--            <tr class="text-center">--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Final Grade</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Course Code</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Descriptive Title</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Total Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lec Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lab Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Hours/Week</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Pre-Requisite</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody class="bg-white divide-y divide-gray-200">--}}
{{--            @foreach($year3Sem2Subjects as $subject)--}}

{{--                <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">--}}
{{--                        @php--}}
{{--                            $midterm = $subject->pivot->midterm;--}}
{{--                            $final = $subject->pivot->final;--}}
{{--                            $average = ($midterm + $final) / 2;--}}
{{--                        @endphp--}}
{{--                        {{ number_format($average,1) }}--}}
{{--                    </td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->course_code}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->descriptive_title}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->total_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lec_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lab_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->hours_week}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->pre_requisite}}</td>--}}
{{--                </tr>--}}

{{--            @endforeach--}}

{{--            <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">TOTAL</td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $total_units = $year3Sem2Subjects->sum('total_units');--}}
{{--                    @endphp--}}
{{--                    {{$total_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lec_units = $year3Sem2Subjects->sum('lec_units');--}}
{{--                    @endphp--}}
{{--                    {{$lec_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lab_units = $year3Sem2Subjects->sum('lab_units');--}}
{{--                    @endphp--}}
{{--                    {{$lab_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $hours_week = $year3Sem2Subjects->sum('hours_week');--}}
{{--                    @endphp--}}
{{--                    {{$hours_week}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--            </tr>--}}

{{--            </tbody>--}}
{{--        </table>--}}

{{--        --}}{{------------------------------------------------------------------------------------------------------------------------}}
{{--        <div class="font-bold text-lg  mt-4">--}}
{{--            FOURTH YEAR--}}
{{--        </div>--}}
{{--        <div class="text-lg">--}}
{{--            First Semester--}}
{{--        </div>--}}

{{--        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-md ">--}}
{{--            <thead class="bg-gray-100">--}}
{{--            <tr class="text-center">--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Final Grade</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Course Code</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Descriptive Title</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Total Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lec Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lab Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Hours/Week</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Pre-Requisite</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody class="bg-white divide-y divide-gray-200">--}}
{{--            @foreach($year4Sem1Subjects as $subject)--}}

{{--                <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">--}}
{{--                        @php--}}
{{--                            $midterm = $subject->pivot->midterm;--}}
{{--                            $final = $subject->pivot->final;--}}
{{--                            $average = round(($midterm + $final) / 2, 1);--}}
{{--                        @endphp--}}
{{--                        {{$average}}--}}
{{--                    </td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->course_code}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->descriptive_title}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->total_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lec_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lab_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->hours_week}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->pre_requisite}}</td>--}}
{{--                </tr>--}}

{{--            @endforeach--}}

{{--            <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">TOTAL</td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $total_units = $year4Sem1Subjects->sum('total_units');--}}
{{--                    @endphp--}}
{{--                    {{$total_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lec_units = $year4Sem1Subjects->sum('lec_units');--}}
{{--                    @endphp--}}
{{--                    {{$lec_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lab_units = $year4Sem1Subjects->sum('lab_units');--}}
{{--                    @endphp--}}
{{--                    {{$lab_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $hours_week = $year4Sem1Subjects->sum('hours_week');--}}
{{--                    @endphp--}}
{{--                    {{$hours_week}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--            </tr>--}}

{{--            </tbody>--}}
{{--        </table>--}}


{{--        --}}{{------------------------------------------------------------------------------------------------------------------------}}

{{--        <div class="text-lg mt-4">--}}
{{--            Second Semester--}}
{{--        </div>--}}

{{--        <table class="min-w-full border border-gray-200 divide-y divide-gray-200 rounded-lg shadow-md ">--}}
{{--            <thead class="bg-gray-100">--}}
{{--            <tr class="text-center">--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Final Grade</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Course Code</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Descriptive Title</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Total Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lec Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Lab Units</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Hours/Week</th>--}}
{{--                <th class="px-4 py-2 text-sm font-semibold text-gray-700">Pre-Requisite</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody class="bg-white divide-y divide-gray-200">--}}
{{--            @foreach($year4Sem2Subjects as $subject)--}}

{{--                <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">--}}
{{--                        @php--}}
{{--                            $midterm = $subject->pivot->midterm;--}}
{{--                            $final = $subject->pivot->final;--}}
{{--                            $average = round(($midterm + $final) / 2, 1);--}}
{{--                        @endphp--}}
{{--                        {{$average}}--}}
{{--                    </td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->course_code}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->descriptive_title}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->total_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lec_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->lab_units}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->hours_week}}</td>--}}
{{--                    <td class="px-4 py-2 text-sm text-gray-800">{{$subject->pre_requisite}}</td>--}}
{{--                </tr>--}}

{{--            @endforeach--}}

{{--            <tr class="text-center hover:bg-gray-50 transition">--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">TOTAL</td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $total_units = $year4Sem2Subjects->sum('total_units');--}}
{{--                    @endphp--}}
{{--                    {{$total_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lec_units = $year4Sem2Subjects->sum('lec_units');--}}
{{--                    @endphp--}}
{{--                    {{$lec_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $lab_units = $year4Sem2Subjects->sum('lab_units');--}}
{{--                    @endphp--}}
{{--                    {{$lab_units}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold">--}}
{{--                    @php--}}
{{--                        $hours_week = $year4Sem2Subjects->sum('hours_week');--}}
{{--                    @endphp--}}
{{--                    {{$hours_week}}--}}
{{--                </td>--}}
{{--                <td class="px-4 py-2 text-sm text-gray-800 font-bold"></td>--}}
{{--            </tr>--}}

{{--            </tbody>--}}
{{--        </table>--}}

{{--    </div>--}}





{{--</x-layout>--}}
