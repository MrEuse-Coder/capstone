
<!doctype html>
<html lang="en" class="bg-white">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Evaluation Sheet</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    .page-break-before {
        page-break-before: always;
        break-before: always; /* modern */
    }

</style>
</head>


<body class="text-black m-4">

<div class="flex justify-center">
    @if(isset($headerLogoBase64 ) && $headerLogoBase64 )
        <img src="{{ $headerLogoBase64 }}" alt="header_logo" class="w-[40rem] h-[5rem] ">
    @endif
</div>

<div class="flex flex-col items-center ">
    <div class="font-bold text-sm">{{$template->bachelors_degree?? ''}}</div>
    <div class="text-xs">Effective SY {{$template->curriculum?? ''}}</div>
    <div class="text-xs">(Revised per CMO 25 S 2015, CHED CMO 20 S of 2013 and CHED CMO 04 s 2018)</div>
</div>

<div class="grid grid-cols-2 mt-2">
    <div><span class="text-xs">Name:</span> <strong><span class="text-xs ml-7">{{strtoupper($student->last_name)}}, {{$student->first_name}}</span> <span class="text-xs">{{substr($student->middle_name,0,1)}}.</span></strong></div>
    <div><span class="text-xs">Sex:</span> <strong><span class="text-xs">{{$student->gender}}</span></strong></div>
    <div><span class="text-xs">Student No:</span> <strong><span class="text-xs">{{$student->student_number}}</span></strong></div>
</div>

<!-- FIRST YEAR -->
<div class="text-sm font-bold mt-2 bg-gray-100 px-1">FIRST YEAR</div>

@if($year1Sem1Subjects->count() > 0)
    <div class="text-xs">First Semester</div>
    <table class=" border border-black border-collapse w-full">
        <thead class="">
        <tr>
            <th style="width:7%" class="text-center border border-black text-xs">FINAL<br>GRADE</th>
            <th style="width:11%" class="border border-black text-xs">COURSE<br>CODE</th>
            <th style="width:35%" class="border border-black text-xs">DESCRIPTIVE TITLE</th>
            <th style="width:6%" class="border border-black text-xs">TOTAL<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LEC<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LAB<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">HOURS/<br>WEEK</th>
            <th style="width:13%" class="border border-black text-xs">PRE-<br>REQUISITE</th>
        </tr>
        </thead>
        <tbody class="w-full">
        @foreach($year1Sem1Subjects as $subject)
            <tr class="text-[10px]">
                <td class="text-center border border-black">
                    @php
                        $midterm = $subject->pivot->midterm ;
                        $final = $subject->pivot->final ;
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
                <td class="border border-black px-1">{{$subject->course_code}}</td>
                <td class="border border-black px-1">{{$subject->descriptive_title}}</td>
                <td class="text-center border border-black">
                    {{fmod($subject->total_units, 1) == 0 ? floor($subject->total_units) : $subject->total_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lec_units, 1) == 0 ? floor($subject->lec_units) : $subject->lec_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lab_units, 1) == 0 ? floor($subject->lab_units) : $subject->lab_units}}
                </td>

                <td class="text-center border border-black">
                    {{fmod($subject->hours_week, 1) == 0 ? floor($subject->hours_week) : $subject->hours_week}}
                </td>
                <td class="text-center border border-black text-left px-1 text-[9px]">
                    {{$subject->pre_requisite}}
                </td>
            </tr>
        @endforeach
        <tr class="text-xs">
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class="col-span-5 text-right border border-black px-1 font-bold">TOTAL</td>
            <td class="text-center border border-black font-bold">{{$year1Sem1Subjects->sum('total_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year1Sem1Subjects->sum('lec_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year1Sem1Subjects->sum('lab_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year1Sem1Subjects->sum('hours_week')}}</td>
            <td class="border border-black"></td>
        </tr>
        </tbody>
    </table>
@endif


@if($year1Sem2Subjects->count() > 0)
    <div class="text-xs mt-2">Second Semester</div>
    <table class=" border border-black border-collapse w-full">
        <thead class="">
        <tr>
            <th style="width:7%" class="text-center border border-black text-xs">FINAL<br>GRADE</th>
            <th style="width:11%" class="border border-black text-xs">COURSE<br>CODE</th>
            <th style="width:35%" class="border border-black text-xs">DESCRIPTIVE TITLE</th>
            <th style="width:6%" class="border border-black text-xs">TOTAL<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LEC<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LAB<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">HOURS/<br>WEEK</th>
            <th style="width:13%" class="border border-black text-xs ">PRE-<br>REQUISITE</th>
        </tr>
        </thead>
        <tbody class="w-full">
        @foreach($year1Sem2Subjects as $subject)
            <tr class=" text-[10px]">
                <td class="text-center border border-black">
                    @php
                        $midterm = $subject->pivot->midterm ;
                        $final = $subject->pivot->final ;
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
                <td class="border border-black px-1">{{$subject->course_code}}</td>
                <td class="border border-black px-1">{{$subject->descriptive_title}}</td>
                <td class="text-center border border-black">
                    {{fmod($subject->total_units, 1) == 0 ? floor($subject->total_units) : $subject->total_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lec_units, 1) == 0 ? floor($subject->lec_units) : $subject->lec_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lab_units, 1) == 0 ? floor($subject->lab_units) : $subject->lab_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->hours_week, 1) == 0 ? floor($subject->hours_week) : $subject->hours_week}}
                </td>
                <td class="text-center border border-black text-left px-1 text-[9px]">
                    {{$subject->pre_requisite}}
                </td>
            </tr>
        @endforeach
        <tr class="text-xs">
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class="col-span-5 text-right border border-black px-1 font-bold">TOTAL</td>
            <td class="text-center border border-black font-bold">{{$year1Sem2Subjects->sum('total_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year1Sem2Subjects->sum('lec_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year1Sem2Subjects->sum('lab_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year1Sem2Subjects->sum('hours_week')}}</td>
            <td class="border border-black"></td>
        </tr>
        </tbody>
    </table>
@endif

<!-- SECOND YEAR -->
<div class="text-xs font-bold mt-2 bg-gray-100 px-1">SECOND YEAR</div>

@if($year2Sem1Subjects->count() > 0)
    <div class="text-xs">First Semester</div>
    <table class=" border border-black border-collapse w-full">
        <thead class="">
        <tr>
            <th style="width:7%" class="text-center border border-black text-xs">FINAL<br>GRADE</th>
            <th style="width:11%" class="border border-black text-xs">COURSE<br>CODE</th>
            <th style="width:35%" class="border border-black text-xs">DESCRIPTIVE TITLE</th>
            <th style="width:6%" class="border border-black text-xs">TOTAL<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LEC<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LAB<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">HOURS/<br>WEEK</th>
            <th style="width:13%" class="border border-black text-xs">PRE-<br>REQUISITE</th>
        </tr>
        </thead>
        <tbody class="w-full">
        @foreach($year2Sem1Subjects as $subject)
            <tr class=" text-[10px]">
                <td class="text-center border border-black">
                    @php
                        $midterm = $subject->pivot->midterm ;
                        $final = $subject->pivot->final ;
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
                <td class="border border-black px-1">{{$subject->course_code}}</td>
                <td class="border border-black px-1">{{$subject->descriptive_title}}</td>
                <td class="text-center border border-black">
                    {{fmod($subject->total_units, 1) == 0 ? floor($subject->total_units) : $subject->total_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lec_units, 1) == 0 ? floor($subject->lec_units) : $subject->lec_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lab_units, 1) == 0 ? floor($subject->lab_units) : $subject->lab_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->hours_week, 1) == 0 ? floor($subject->hours_week) : $subject->hours_week}}
                </td>
                <td class="text-center border border-black text-left px-1 text-[9px]">
                    {{$subject->pre_requisite}}
                </td>
            </tr>
        @endforeach
        <tr class="text-xs">
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class="col-span-5 text-right border border-black px-1 font-bold">TOTAL</td>
            <td class="text-center border border-black font-bold">{{$year2Sem1Subjects->sum('total_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year2Sem1Subjects->sum('lec_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year2Sem1Subjects->sum('lab_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year2Sem1Subjects->sum('hours_week')}}</td>
            <td class="border border-black"></td>
        </tr>
        </tbody>
    </table>
@endif


@if($year2Sem2Subjects->count() > 0)
    <div class="text-xs mt-2">Second Semester</div>
    <table class=" border border-black border-collapse w-full">
        <thead class="">
        <tr>
            <th style="width:7%" class="text-center border border-black text-xs">FINAL<br>GRADE</th>
            <th style="width:11%" class="border border-black text-xs">COURSE<br>CODE</th>
            <th style="width:35%" class="border border-black text-xs">DESCRIPTIVE TITLE</th>
            <th style="width:6%" class="border border-black text-xs">TOTAL<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LEC<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LAB<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">HOURS/<br>WEEK</th>
            <th style="width:13%" class="border border-black text-xs">PRE-<br>REQUISITE</th>
        </tr>
        </thead>
        <tbody class="w-full">
        @foreach($year2Sem2Subjects as $subject)
            <tr class=" text-[10px]">
                <td class="text-center border border-black">
                    @php
                        $midterm = $subject->pivot->midterm ;
                        $final = $subject->pivot->final ;
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
                <td class="border border-black px-1">{{$subject->course_code}}</td>
                <td class="border border-black px-1">{{$subject->descriptive_title}}</td>
                <td class="text-center border border-black">
                    {{fmod($subject->total_units, 1) == 0 ? floor($subject->total_units) : $subject->total_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lec_units, 1) == 0 ? floor($subject->lec_units) : $subject->lec_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lab_units, 1) == 0 ? floor($subject->lab_units) : $subject->lab_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->hours_week, 1) == 0 ? floor($subject->hours_week) : $subject->hours_week}}
                </td>
                <td class="text-center border border-black text-left px-1 text-[9px]">
                    {{$subject->pre_requisite}}
                </td>
            </tr>
        @endforeach
        <tr class="text-xs">
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class="col-span-5 text-right border border-black px-1 font-bold">TOTAL</td>
            <td class="text-center border border-black font-bold">{{$year2Sem2Subjects->sum('total_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year2Sem2Subjects->sum('lec_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year2Sem2Subjects->sum('lab_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year2Sem2Subjects->sum('hours_week')}}</td>
            <td class="border border-black"></td>
        </tr>
        </tbody>
    </table>
@endif

<hr class="border-t border-black mt-4">
<div class="flex justify-between">
    <div class="text-[10px] font-semibold">
        <p>{{$template->department?? ''}}</p>
        <p>{{$template->address?? ''}}</p>
        <p>{{$template->email?? ''}}</p>
        <p>{{$template->phone?? ''}}</p>
    </div>
</div>

<div class="flex justify-center">
    @if(isset($footerLogoBase64) && $footerLogoBase64)
        <img src="{{ $footerLogoBase64 }}" alt="footer_logo" class="w-[40rem] h-[3.5rem]">
    @endif
</div>


<!-- PAGE BREAK -->
<div class="page-break-before"></div>

<!-- THIRD YEAR -->
<div>
    @if(isset($logoBase64) && $logoBase64)
        <img src="{{ $logoBase64 }}" alt="ESSU Logo" class="w-[23rem] h-[6rem]">
    @endif
</div>

<div class="text-xs font-bold mt-2 bg-gray-100 px-1">THIRD YEAR</div>

@if($year3Sem1Subjects->count() > 0)
    <div class="text-xs">First Semester</div>
    <table class=" border border-black border-collapse w-full">
        <thead class="">
        <tr>
            <th style="width:7%" class="text-center border border-black text-xs">FINAL<br>GRADE</th>
            <th style="width:11%" class="border border-black text-xs">COURSE<br>CODE</th>
            <th style="width:35%" class="border border-black text-xs">DESCRIPTIVE TITLE</th>
            <th style="width:6%" class="border border-black text-xs">TOTAL<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LEC<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LAB<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">HOURS/<br>WEEK</th>
            <th style="width:13%" class="border border-black text-xs">PRE-<br>REQUISITE</th>
        </tr>
        </thead>
        <tbody class="w-full">
        @foreach($year3Sem1Subjects as $subject)
            <tr class=" text-[10px]">
                <td class="text-center border border-black">
                    @php
                        $midterm = $subject->pivot->midterm ;
                        $final = $subject->pivot->final ;
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
                <td class="border border-black px-1">{{$subject->course_code}}</td>
                <td class="border border-black px-1">{{$subject->descriptive_title}}</td>
                <td class="text-center border border-black">
                    {{fmod($subject->total_units, 1) == 0 ? floor($subject->total_units) : $subject->total_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lec_units, 1) == 0 ? floor($subject->lec_units) : $subject->lec_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lab_units, 1) == 0 ? floor($subject->lab_units) : $subject->lab_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->hours_week, 1) == 0 ? floor($subject->hours_week) : $subject->hours_week}}
                </td>
                <td class="text-center border border-black text-left px-1 text-[9px]">
                    {{$subject->pre_requisite}}
                </td>
            </tr>
        @endforeach
        <tr class="text-xs">
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class="col-span-5 text-right border border-black px-1 font-bold">TOTAL</td>
            <td class="text-center border border-black font-bold">{{$year3Sem1Subjects->sum('total_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year3Sem1Subjects->sum('lec_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year3Sem1Subjects->sum('lab_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year3Sem1Subjects->sum('hours_week')}}</td>
            <td class="border border-black"></td>
        </tr>
        </tbody>
    </table>
@endif


@if($year3Sem2Subjects->count() > 0)
    <div class="text-xs mt-2">Second Semester</div>
    <table class=" border border-black border-collapse w-full">
        <thead class="">
        <tr>
            <th style="width:7%" class="text-center border border-black text-xs">FINAL<br>GRADE</th>
            <th style="width:11%" class="border border-black text-xs">COURSE<br>CODE</th>
            <th style="width:35%" class="border border-black text-xs">DESCRIPTIVE TITLE</th>
            <th style="width:6%" class="border border-black text-xs">TOTAL<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LEC<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LAB<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">HOURS/<br>WEEK</th>
            <th style="width:13%" class="border border-black text-xs">PRE-<br>REQUISITE</th>
        </tr>
        </thead>
        <tbody class="w-full">
        @foreach($year3Sem2Subjects as $subject)
            <tr class=" text-[10px]">
                <td class="text-center border border-black">
                    @php
                        $midterm = $subject->pivot->midterm ;
                        $final = $subject->pivot->final ;
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
                <td class="border border-black px-1">{{$subject->course_code}}</td>
                <td class="border border-black px-1">{{$subject->descriptive_title}}</td>
                <td class="text-center border border-black">
                    {{fmod($subject->total_units, 1) == 0 ? floor($subject->total_units) : $subject->total_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lec_units, 1) == 0 ? floor($subject->lec_units) : $subject->lec_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lab_units, 1) == 0 ? floor($subject->lab_units) : $subject->lab_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->hours_week, 1) == 0 ? floor($subject->hours_week) : $subject->hours_week}}
                </td>
                <td class="text-center border border-black text-left px-1 text-[9px]">
                    {{$subject->pre_requisite}}
                </td>
            </tr>
        @endforeach
        <tr class="text-xs">
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class="col-span-5 text-right border border-black px-1 font-bold">TOTAL</td>
            <td class="text-center border border-black font-bold">{{$year3Sem2Subjects->sum('total_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year3Sem2Subjects->sum('lec_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year3Sem2Subjects->sum('lab_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year3Sem2Subjects->sum('hours_week')}}</td>
            <td class="border border-black"></td>
        </tr>
        </tbody>
    </table>
@endif

<!-- FOURTH YEAR -->
<div class="text-xs font-bold mt-2 bg-gray-100 px-1">FOURTH YEAR</div>

@if($year4Sem1Subjects->count() > 0)
    <div class="text-xs">First Semester</div>
    <table class=" border border-black border-collapse w-full">
        <thead class="">
        <tr>
            <th style="width:7%" class="text-center border border-black text-xs">FINAL<br>GRADE</th>
            <th style="width:11%" class="border border-black text-xs">COURSE<br>CODE</th>
            <th style="width:35%" class="border border-black text-xs">DESCRIPTIVE TITLE</th>
            <th style="width:6%" class="border border-black text-xs">TOTAL<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LEC<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LAB<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">HOURS/<br>WEEK</th>
            <th style="width:13%" class="border border-black text-xs">PRE-<br>REQUISITE</th>
        </tr>
        </thead>
        <tbody class="w-full">
        @foreach($year4Sem1Subjects as $subject)
            <tr class=" text-[10px]">
                <td class="text-center border border-black">
                    @php
                        $midterm = $subject->pivot->midterm ;
                        $final = $subject->pivot->final ;
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
                <td class="border border-black px-1">{{$subject->course_code}}</td>
                <td class="border border-black px-1">{{$subject->descriptive_title}}</td>
                <td class="text-center border border-black">
                    {{fmod($subject->total_units, 1) == 0 ? floor($subject->total_units) : $subject->total_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lec_units, 1) == 0 ? floor($subject->lec_units) : $subject->lec_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lab_units, 1) == 0 ? floor($subject->lab_units) : $subject->lab_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->hours_week, 1) == 0 ? floor($subject->hours_week) : $subject->hours_week}}
                </td>
                <td class="text-center border border-black text-left px-1 text-[9px]">
                    {{$subject->pre_requisite}}
                </td>
            </tr>
        @endforeach
        <tr class="text-xs">
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class="col-span-5 text-right border border-black px-1 font-bold">TOTAL</td>
            <td class="text-center border border-black font-bold">{{$year4Sem1Subjects->sum('total_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year4Sem1Subjects->sum('lec_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year4Sem1Subjects->sum('lab_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year4Sem1Subjects->sum('hours_week')}}</td>
            <td class="border border-black"></td>
        </tr>
        </tbody>
    </table>
@endif


@if($year4Sem2Subjects->count() > 0)
    <div class="text-xs mt-2">Second Semester</div>
    <table class=" border border-black border-collapse w-full">
        <thead class="">
        <tr>
            <th style="width:7%" class="text-center border border-black text-xs">FINAL<br>GRADE</th>
            <th style="width:11%" class="border border-black text-xs">COURSE<br>CODE</th>
            <th style="width:35%" class="border border-black text-xs">DESCRIPTIVE TITLE</th>
            <th style="width:6%" class="border border-black text-xs">TOTAL<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LEC<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">LAB<br>UNITS</th>
            <th style="width:6%" class="border border-black text-xs">HOURS/<br>WEEK</th>
            <th style="width:13%" class="border border-black text-xs">PRE-<br>REQUISITE</th>
        </tr>
        </thead>
        <tbody class="w-full">
        @foreach($year4Sem2Subjects as $subject)
            <tr class=" text-[10px]">
                <td class="text-center border border-black">
                    @php
                        $midterm = $subject->pivot->midterm ;
                        $final = $subject->pivot->final ;
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
                <td class="border border-black px-1">{{$subject->course_code}}</td>
                <td class="border border-black px-1">{{$subject->descriptive_title}}</td>
                <td class="text-center border border-black">
                    {{fmod($subject->total_units, 1) == 0 ? floor($subject->total_units) : $subject->total_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lec_units, 1) == 0 ? floor($subject->lec_units) : $subject->lec_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->lab_units, 1) == 0 ? floor($subject->lab_units) : $subject->lab_units}}
                </td>
                <td class="text-center border border-black">
                    {{fmod($subject->hours_week, 1) == 0 ? floor($subject->hours_week) : $subject->hours_week}}
                </td>
                <td class="text-center border border-black text-left px-1 text-[9px]">
                    {{$subject->pre_requisite}}
                </td>
            </tr>
        @endforeach
        <tr class="text-xs">
            <td class=" border border-black"></td>
            <td class=" border border-black"></td>
            <td class="col-span-5 text-right border border-black px-1 font-bold">TOTAL</td>
            <td class="text-center border border-black font-bold">{{$year4Sem2Subjects->sum('total_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year4Sem2Subjects->sum('lec_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year4Sem2Subjects->sum('lab_units')}}</td>
            <td class="text-center border border-black font-bold">{{$year4Sem2Subjects->sum('hours_week')}}</td>
            <td class="border border-black"></td>
        </tr>
        </tbody>
    </table>
@endif


<div class="mt-105">
    <hr class="border-t border-black mt-4">

        <div class="text-[10px] font-semibold">
            <p>{{$template->department?? ''}}</p>
            <p>{{$template->address?? ''}}</p>
            <p>{{$template->email?? ''}}</p>
            <p>{{$template->phone?? ''}}</p>
        </div>
        <div class="flex justify-center">
            @if(isset($footerLogoBase64) && $footerLogoBase64)
                <img src="{{ $footerLogoBase64 }}" alt="footer_logo" class="w-[40rem] h-[3.5rem]">
            @endif
        </div>

</div>

<script>
    window.onload = function () {
        window.print();

        // Close tab after printing (works if opened by button)
        setTimeout(function () {
            window.close();
        }, 500);
    };
</script>

</body>
</html>
