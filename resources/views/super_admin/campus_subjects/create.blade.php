<x-layout>
    <div class="min-h-screen bg-gradient-to-br from-violet-50 to-violet-100 flex items-center justify-center p-6">

        <!-- Success Toast -->
        <x-notification class="mt-6"/>

        <div class="w-full max-w-3xl">
            <!-- Back Button -->
            <a href="/campus_subjects/superadmin" class="inline-flex items-center gap-2 text-[#3a8a0f] hover:text-green-700 font-semibold mb-6 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Subjects
            </a>

            <x-error-notification />
            <!-- Form Card -->
            <form action="/subject" method="POST" onsubmit="handleSubmit(event)" class="bg-white shadow-2xl rounded-2xl overflow-hidden">
                @csrf

                <!-- Header -->
                <div class="bg-gradient-to-r from-[#005104] to-[#3a8a0f] px-8 py-6">
                    <h1 class="text-2xl font-bold text-white text-center">Add New Subject</h1>

                </div>

                <!-- Form Body -->
                <div class="p-8 space-y-6">

                    <!-- Course Code and Descriptive Title -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <!-- Course Code -->
                        <div>
                            <label for="course_code" class="block text-sm font-semibold text-gray-700 mb-2">
                                Course Code <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="course_code"
                                name="course_code"
                                required
                                value="{{ old('course_code') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition placeholder-gray-400"
                                placeholder="e.g. IT 101"
                            />
                        </div>

                        <!-- Descriptive Title -->
                        <div>
                            <label for="descriptive_title" class="block text-sm font-semibold text-gray-700 mb-2">
                                Descriptive Title <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="descriptive_title"
                                name="descriptive_title"
                                required
                                value="{{ old('descriptive_title') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition placeholder-gray-400"
                                placeholder="e.g. Introduction to Programming"
                            />
                        </div>
                    </div>

                    <!-- Units Section -->
                    <div>
                        <h3 class="text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5 text-[#3a8a0f]" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                            </svg>
                            Units Breakdown
                        </h3>
                        <div class="grid grid-cols-3 gap-4">

                            <!-- Total Units -->
                            <div>
                                <label for="total_units" class="block text-xs font-semibold text-gray-600 mb-2">
                                    Total Units <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="number"
                                    id="total_units"
                                    name="total_units"
                                    required
                                    min="0"
                                    step="0.1"
                                    value="{{ old('total_units') }}"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition text-center font-semibold"
                                    placeholder="3"
                                />
                            </div>


                            <!-- Lecture Units -->
                            <div>
                                <label for="lec_units" class="block text-xs font-semibold text-gray-600 mb-2">
                                    Lecture Units <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="number"
                                    id="lec_units"
                                    name="lec_units"
                                    required
                                    min="0"
                                    step="0.1"
                                    value="{{ old('lec_units') }}"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition text-center font-semibold"
                                    placeholder="2"
                                />
                            </div>

                            <!-- Lab Units -->
                            <div>
                                <label for="lab_units" class="block text-xs font-semibold text-gray-600 mb-2">
                                    Lab Units <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="number"
                                    id="lab_units"
                                    name="lab_units"
                                    required
                                    min="0"
                                    step="0.1"
                                    value="{{ old('lab_units') }}"
                                    class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition text-center font-semibold"
                                    placeholder="1"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Hours and Pre-requisite -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                        <!-- Hours per Week -->
                        <div>
                            <label for="hours_week" class="block text-sm font-semibold text-gray-700 mb-2">
                                Hours/Week <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="number"
                                id="hours_week"
                                name="hours_week"
                                required
                                min="0"
                                step="0.1"
                                value="{{ old('hours_week') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition text-center font-semibold"
                                placeholder="3"
                            />
                        </div>

                        <!-- Pre-requisite -->
                        <div class="md:col-span-2">
                            <label for="pre_requisite" class="block text-sm font-semibold text-gray-700 mb-2">
                                Pre-requisite <span class="text-gray-400 text-xs">(Optional)</span>
                            </label>
                            <input
                                type="text"
                                id="pre_requisite"
                                name="pre_requisite"
                                value="{{ old('pre_requisite') }}"
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition placeholder-gray-400"
                                placeholder="e.g. IT 100 or None"
                            />
                        </div>

                        <!-- classifications-->
                        <div>
                            <label for="classification" class="block text-xs font-semibold text-gray-600 mb-2">
                                CLassification <span class="text-red-500">*</span>
                            </label>
                            <select
                                id="classification"
                                name="classification"
                                required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition appearance-none cursor-pointer text-center font-semibold">
                                <option value="major">Major</option>
                                <option value="minor">Minor</option>

                            </select>
                        </div>

                    </div>

                </div>

                <!-- Form Footer -->
                <div class="bg-gray-50 px-8 py-6 flex gap-3 justify-end border-t border-gray-200">
                    <a href="/subjects" class="px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button
                        type="submit"
                        id="submitBtn"
                        class="px-6 py-3 bg-[#3a8a0f] hover:bg-green-700 text-white font-semibold rounded-lg shadow-lg transition transform hover:scale-105 active:scale-95">
                        Add Subject
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function handleSubmit(event) {
            const btn = document.getElementById('submitBtn');
            btn.disabled = true;
            btn.innerHTML = `
                <span class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Creating...
                </span>
            `;
            btn.classList.add('opacity-50', 'cursor-not-allowed');
        }
    </script>
</x-layout>

