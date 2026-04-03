<x-sidebar>
    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-7xl mx-auto">

            <div
                class="min-h-screen bg-gray-50"
                x-data="{
            deleteOpen: false,
            moveOpen: false,
            batchId: null,
            batchName: '',

        }"
            >

            <!-- Success Toast -->
            @if(session('success'))
                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 3000)"
                    x-show="show"
                    x-transition
                    class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50">
                    <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-xl font-semibold flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Header Section -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Class Batches</h1>
                <p class="text-gray-600"></p>
            </div>

            <!-- Search Bar -->
            <div class="flex justify-between mb-6">
                <form action="/dashboard/class_batch" method="GET" class="relative">
                    <div class="relative max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="search_batch"
                            value="{{ request('search_batch') }}"
                            class="w-full pl-10 pr-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                            placeholder="Search class batch"
                        />
                        @if(request('search_batch'))
                            <a
                                href="/dashboard/class_batch"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </form>

                <a href="/class_batch/create"
                   class="flex items-center gap-2 bg-[#3a8a0f] hover:bg-green-700 text-white font-bold px-6 py-2 rounded-lg shadow-lg transition-all transform hover:scale-105 active:scale-95">
                    + Batch
                </a>
            </div>

            @if($batches->isEmpty())
                <!-- Empty State -->

                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <svg class="mx-auto h-20 w-20 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>

                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Batch Found</h3>
                    <p class="text-gray-500 mb-6">
                        @if(request('search_batch'))
                            No batch match your search "{{ request('search_batch') }}"
                        @else
                            Start by adding Batch
                        @endif
                    </p>
                    @if(request('search_batch'))
                        <a
                            href="/dashboard/class_batch"
                            class="inline-flex items-center gap-2 bg-[#3a8a0f] hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Clear Search
                        </a>
                    @endif
                </div>
            @else
                <!-- user Table -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">

                    <!-- Table Header -->
                    <div class="bg-[#3a8a0f] px-6 py-4">
                        <div class="grid grid-cols-5 gap-4 text-white font-semibold text-sm">
                            <div class="text-center">BATCH NAME</div>
                            <div class="text-center">ADVISER</div>
                            <div class="text-center">SCHOOL YEAR</div>
                            <div class="text-center">CURRICULUM</div>
                            <div class="text-center">ACTIONS</div>
                        </div>
                    </div>

                    <!-- Table Body -->
                    <div class="divide-y divide-gray-200">
                        @foreach($batches as $batch)
                            <div class="px-6 py-4 hover:bg-gray-50 transition">
                                <div class="grid grid-cols-5 gap-4 items-center">

                                    <!--username -->
                                    <div class="text-center font-semibold text-gray-900 uppercase">
                                        <a href="/class_batch/students/{{$batch->id}}">
                                            {{$batch->batch_name}}
                                        </a>

                                    </div>

                                    <!-- role -->
                                    <div class="text-center text-gray-800 uppercase">
                                        {{$batch->adviser}}
                                    </div>

                                    <div class="text-center font-semibold text-gray-900 uppercase">
                                        {{$batch->school_year}}
                                    </div>

                                    <div class="text-center font-semibold text-gray-900 uppercase">
                                        {{$batch->curriculum}}
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex items-center justify-center gap-2">


                                        {{--old delette button--}}
                                      {{--  <form action="/class_batch/{{$batch->id}}" method="post"
                                              class="inline-flex items-center gap-1 px-4 py-2 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg font-medium transition text-sm"
                                              title="Delete Batch">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                @click="deleteOpen = true;
                                        batchId = '{{$classBatch->id}}';
                                        batchName = '{{ addslashes($classBatch->batch_name) }} ';"
                                                type="submit"
                                                class="flex items-center">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>

                                            </button>
                                        </form>--}}

                                        <!--edit batch-->

                                            <a href="/dashboard/classBatch/{{$batch->id}}/edit"

                                                class="flex items-center inline-flex items-center gap-1 px-4 py-2 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg font-medium transition text-sm">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>

                                            </a>

                                        <!-- Delete batch -->
                                        <button
                                            type="button"
                                            class="inline-flex items-center gap-1 px-4 py-2 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg font-medium transition text-sm cursor-pointer"
                                            @click="deleteOpen = true;
                                        batchId = '{{$batch->id}}';
                                        batchName = '{{ addslashes($batch->batch_name) }} ';">

                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>

                                        </button>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <!-- Results Count -->
                <div class="mt-4 text-sm text-gray-600">
                    Showing {{ $batches->firstItem() }} to {{ $batches->lastItem() }} of {{ $batches->total() }} class batch
                </div>


                <!-- Pagination -->
                <div class="mt-6">
                    {{$batches->links()}}
                </div>
            @endif

            <!-- DELETE MODAL -->
            <div
                x-show="deleteOpen"
                x-transition.opacity
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4"
                style="display: none;"
            >
                <div
                    @click.outside="deleteOpen = false"
                    x-transition
                    class="bg-white rounded-xl p-6 w-full max-w-md shadow-2xl"
                >
                    <!-- Modal Header -->
                    <div class="flex items-start gap-4 mb-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-xl font-bold text-gray-900 mb-1">
                                Delete Batch
                            </h2>
                            <p class="text-sm text-gray-600">
                                This action cannot be undone.
                            </p>
                        </div>
                    </div>

                    <!-- Modal Body -->
                    <div class="bg-gray-50 rounded-lg p-4 mb-6">
                        <p class="text-gray-700">
                            Are you sure you want to delete
                            <span class="font-bold text-gray-900 uppercase" x-text="batchName"></span>?
                            All associated students and grades will be permanently removed.
                        </p>
                    </div>

                    <!-- Modal Actions -->
                    <form
                        :action="`/class_batch/${batchId}`"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <div class="flex gap-3 justify-end">
                            <button
                                type="button"
                                @click="deleteOpen = false"
                                class="px-4 py-2 rounded-lg bg-white border-2 border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition"
                            >
                                Cancel
                            </button>

                            <button
                                type="submit"
                                class="px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition flex items-center gap-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete Batch
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-sidebar>

