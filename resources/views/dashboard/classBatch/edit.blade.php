<x-layout>
    <div class="min-h-screen bg-gradient-to-br from-violet-50 to-violet-100 flex items-center justify-center p-6">

        <div class="w-full max-w-md">
            <!-- Back Button -->
            <a href="/class_batch" class="inline-flex items-center gap-2 text-[#3a8a0f] hover:text-green-700 font-semibold mb-6 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Batches
            </a>

            <x-error-notification class="mt-6"/>

            <!-- Form Card -->
            <form action="/dashboard/classBatch/{{$batch->id}}" method="POST" onsubmit="handleSubmit(event)" class="bg-white shadow-2xl rounded-2xl overflow-hidden">
                @csrf
                @method('PATCH')

                <!-- Header -->
                <div class="bg-gradient-to-r from-[#005104] to-[#3a8a0f] px-8 py-6">
                    <h1 class="text-2xl font-bold text-white text-center">Edit Batch</h1>

                </div>

                <!-- Form Body -->
                <div class="p-8 space-y-6">

                    <!-- Batch Name -->
                    <div>
                        <label for="batch_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Batch Name <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="batch_name"
                            name="batch_name"
                            value="{{$batch->batch_name}}"
                            required
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition uppercase placeholder-gray-400"
                            placeholder="e.g. BATCH A2025"
                        />
                        <p class="text-xs text-gray-500 mt-1">Enter a unique identifier for this batch</p>
                    </div>
                    <x-error-message name="batch_name"/>

{{--                    <!-- Adviser -->--}}
{{--                    <div>--}}
{{--                        <label for="adviser" class="block text-sm font-semibold text-gray-700 mb-2">--}}
{{--                            Adviser <span class="text-red-500">*</span>--}}
{{--                        </label>--}}
{{--                        <input--}}
{{--                            type="text"--}}
{{--                            id="adviser"--}}
{{--                            name="adviser"--}}
{{--                            value="{{$batch->adviser}}"--}}
{{--                            required--}}
{{--                            class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition placeholder-gray-400"--}}
{{--                            placeholder="e.g. Mr. Villalongja"--}}
{{--                        />--}}
{{--                        <p class="text-xs text-gray-500 mt-1">Name of the assigned batch adviser</p>--}}
{{--                    </div>--}}

                    <!-- Curriculum and Freshmen Year -->
                    <div class="grid grid-cols-2 gap-4">

                        <!-- Curriculum -->
                        <div>
                            <label for="curriculum" class="block text-sm font-semibold text-gray-700 mb-2">
                                Curriculum <span class="text-red-500">*</span>
                            </label>
                            <select
                                name="curriculum"
                                id="curriculum"
                                required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition appearance-none cursor-pointer">
                                <option value="" disabled selected>Select Year</option>
                                @for($year = 2022; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}-{{ $year + 1 }}">{{ $year }}-{{ $year + 1 }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Freshmen Year -->
                        <div>
                            <label for="school_year" class="block text-sm font-semibold text-gray-700 mb-2">
                                Freshmen Year <span class="text-red-500">*</span>
                            </label>
                            <select
                                name="school_year"
                                id="school_year"
                                required
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition appearance-none cursor-pointer">
                                <option value="" disabled selected>Select Year</option>
                                @for($year = 2022; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <!-- Info Box -->
                    <div class="bg-green-50 border border-violet-200 rounded-lg p-4 flex gap-3">
                        <svg class="w-5 h-5 text-[#3a8a0f] flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="text-sm text-[#3a8a0f]">
                            <p class="font-semibold mb-1">Please note:</p>
                            <p>All fields marked with <span class="text-red-500">*</span> are required. Make sure the batch name is unique to avoid conflicts.</p>
                        </div>
                    </div>

                </div>

                <!-- Form Footer -->
                <div class="bg-gray-50 px-8 py-6 flex gap-3 justify-end border-t border-gray-200">
                    <a href="/class_batch" class="px-6 py-3 bg-white border-2 border-gray-300 text-gray-700 font-semibold rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button
                        type="submit"
                        id="submitBtn"
                        class="px-6 py-3 bg-[#3a8a0f] hover:bg-green-700 text-white font-semibold rounded-lg shadow-lg transition transform hover:scale-105 active:scale-95">
                        Update Batch
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







