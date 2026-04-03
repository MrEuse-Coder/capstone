<x-layout>
    <div
        class="min-h-screen bg-gray-50">

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

                    <!-- Title -->
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-800">{{ $class_batch->batch_name }}</h1>
                        <p class="text-sm text-gray-500">Student Management</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Toast -->
        <x-notification class="mt-6"/>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto px-6 py-6">

            <!-- Search Bar and Subject Selection -->
            <form method="GET" id="filterForm" class="mb-6">
                <div class="flex flex-col md:flex-row justify-between items-stretch md:items-center gap-4">
                    <!-- Search Bar -->
                    <div class="relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="search_student"
                            onchange="document.getElementById('filterForm').submit()"
                            class="w-full pl-10 pr-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition"
                            placeholder="Search by name or student ID..."
                            value="{{ request('search_student') }}"
                        >
                    </div>

                    <!-- Subject Selection -->
                    <div class="w-full md:w-96">
                        <select
                            name="subject"
                            id="subject"
                            onchange="document.getElementById('filterForm').submit()"
                            class="w-full bg-white border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition cursor-pointer"
                        >
                            <option>Select Subject</option>
                                <option class="font-bold" disabled>FIRST YEAR</option>
                                <option class="font-semibold" disabled>First Semester</option>
                                @foreach($subjects as $subject)
                                    @if($subject->year_level === 1 && $subject->semester === 1 )
                                        <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->descriptive_title }}
                                        </option>
                                    @endif
                                @endforeach

                            <option class="font-semibold" disabled>Second Semester</option>
                            @foreach($subjects as $subject)
                                @if($subject->year_level === 1 && $subject->semester === 2 )
                                    <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->descriptive_title }}
                                    </option>
                                @endif
                            @endforeach

                            <option class="font-bold" disabled>Second Year</option>
                            <option class="font-semibold" disabled>First Semester</option>
                        @foreach($subjects as $subject)
                                @if($subject->year_level === 2 && $subject->semester === 1)
                                    <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->descriptive_title }}
                                    </option>
                                @endif
                            @endforeach

                            <option class="font-semibold" disabled>Second Semester</option>
                            @foreach($subjects as $subject)
                                @if($subject->year_level === 2 && $subject->semester === 2)
                                    <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->descriptive_title }}
                                    </option>
                                @endif
                            @endforeach

                            <option class="font-bold" disabled>Third Year</option>
                            <option class="font-semibold" disabled>First Semester</option>
                            @foreach($subjects as $subject)
                                @if($subject->year_level === 3 && $subject->semester === 1)
                                    <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->descriptive_title }}
                                    </option>
                                @endif
                            @endforeach

                            <option class="font-semibold" disabled>Second Semester</option>
                            @foreach($subjects as $subject)
                                @if($subject->year_level === 3 && $subject->semester === 2)
                                    <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->descriptive_title }}
                                    </option>
                                @endif
                            @endforeach

                            <option class="font-bold" disabled>Fourth Year</option>
                            <option class="font-semibold" disabled>First Semester</option>
                            @foreach($subjects as $subject)
                                @if($subject->year_level === 4 && $subject->semester === 1)
                                    <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->descriptive_title }}
                                    </option>
                                @endif
                            @endforeach

                            <option class="font-semibold" disabled>Second Semester</option>
                            @foreach($subjects as $subject)
                                @if($subject->year_level === 4 && $subject->semester === 2)
                                    <option value="{{ $subject->id }}" {{ request('subject') == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->descriptive_title }}
                                    </option>
                                @endif
                            @endforeach

                        </select>
                        @error('subject_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </form>

            <!-- Grade Submission Form -->
            <form method="POST" action="/class_batch/{{$class_batch->id}}/grades/store-multiple">
                @csrf
                <input type="hidden" name="subject" value="{{ request('subject') }}">

                <!-- Students Table -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <!-- Table Header -->
                    <div class="bg-[#3a8a0f] px-6 py-4">
                        <div class="grid grid-cols-4 gap-4 text-white font-semibold text-sm">
                            <div>STUDENT ID</div>
                            <div>LAST NAME</div>
                            <div>FIRST NAME</div>
                            <div class="text-center">FINAL GRADE</div>
                        </div>
                    </div>

                    <!-- Table Body -->
                    <div class="divide-y divide-gray-200">
                        @forelse($students as $student)
                            <div class="px-6 py-4 hover:bg-gray-50 transition">
                                <div class="grid grid-cols-4 gap-4 items-center">

                                    <!-- Student ID -->
                                    <a href="/evaluation/{{ $student->id }}" class="block cursor-pointer hover:text-violet-600 transition">
                                        <div class="font-semibold text-gray-900 uppercase">
                                            {{ $student->student_number }}
                                        </div>
                                    </a>

                                    <!-- Last Name -->
                                    <a href="/evaluation/{{ $student->id }}" class="block cursor-pointer hover:text-violet-600 transition">
                                        <div class="text-gray-800 uppercase">
                                            {{ $student->last_name }}
                                        </div>
                                    </a>

                                    <!-- First Name -->
                                    <a href="/evaluation/{{ $student->id }}" class="block cursor-pointer hover:text-violet-600 transition">
                                        <div class="text-gray-800 uppercase">
                                            {{ $student->first_name }}
                                        </div>
                                    </a>

                                    @php
                                        $existingGrade = $student->grades->where('subject_id', request('subject'))->first();
                                    @endphp

                                    <input
                                        name="grades[{{ $student->id }}]"
                                        type="number"
                                        step="0.01"
                                        min="0"
                                        max="100"
                                        placeholder="0.00"
                                        value="{{ $existingGrade->final_grade ?? '' }}"
                                        class="w-32 px-3 py-2 bg-green-50 border border-violet-200 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-[#3a8a0f]"
                                        {{ request('subject') ? '' : 'disabled' }}
                                    >


                                </div>
                            </div>
                        @empty
                            <div class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                                <p class="mt-4 text-gray-500 font-medium">
                                    @if(!request('subject'))
                                        Please select a subject to view and edit grades
                                    @else
                                        No students found
                                    @endif
                                </p>
                                @if(!request('subject'))
                                    <p class="mt-1 text-sm text-gray-400">Choose a subject from the dropdown above</p>
                                @else
                                    <p class="mt-1 text-sm text-gray-400">Try adjusting your search criteria</p>
                                @endif
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Submit Button -->
                @if(request('subject') && $students->isNotEmpty())
                    <div class="mt-6 flex justify-end">
                        <button
                            type="submit"
                            class="px-6 py-3 bg-[#3a8a0f] hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition flex items-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Submit Grades
                        </button>
                    </div>
                @endif
            </form>

        </main>
    </div>
</x-layout>
