<x-sidebar>
    <div class="min-h-screen bg-gray-50 p-6">
        <div class="max-w-7xl mx-auto">

            <!-- Success Toast -->
            <x-notification class="mt-6"/>

            <!-- Header Section -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Account Management</h1>

            </div>

            <!-- Search Bar -->
            <div class="flex justify-between mb-6">
                <form action="/dashboard/students-profile" method="GET" class="relative">
                    <div class="relative max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input
                            type="text"
                            name="student_search"
                            value="{{ request('student_search') }}"
                            class="w-full pl-10 pr-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent transition"
                            placeholder="Search user"
                        />
                        @if(request('student_search'))
                            <a
                                href="/dashboard/students-profile"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </form>

                <a href="/create-account/user"
                   class="flex items-center gap-2 bg-[#3a8a0f] hover:bg-green-700 text-white font-bold px-6 py-2 rounded-lg shadow-lg transition-all transform hover:scale-105 active:scale-95">
                    + Account
                </a>
            </div>

            @if($accounts->isEmpty())
                <!-- Empty State -->
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <svg class="mx-auto h-20 w-20 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No Accounts Found</h3>
                    <p class="text-gray-500 mb-6">
                        @if(request('student_search'))
                            No account match your search "{{ request('student_search') }}"
                        @else
                            No account available in the system
                        @endif
                    </p>
                    @if(request('student_search'))
                        <a
                            href="/dashboard/students-profile"
                            class="inline-flex items-center gap-2 bg-[#3a8a0f]  text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
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
                        <div class="grid grid-cols-3 gap-4 text-white font-semibold text-sm">
                            <div class="text-center">USERNAME</div>
                            <div class="text-center">ROLE</div>
                            <div class="text-center">ACTIONS</div>
                        </div>
                    </div>

                    <!-- Table Body -->
                    <div class="divide-y divide-gray-200">
                        @foreach($accounts as $account)
                            <div class="px-6 py-4 hover:bg-gray-50 transition">
                                <div class="grid grid-cols-3 gap-4 items-center">

                                    <!--username -->
                                    <div class="text-center font-semibold text-gray-900 uppercase">
                                    {{$account->name}}
                                    </div>

                                    <!-- role -->
                                    <div class="text-center text-gray-800 uppercase">
                                        {{$account->role}}
                                    </div>

                                    <!-- Actions -->
                                    <div class="flex items-center justify-center gap-2">

                                        <!-- Delete User -->
{{--                                        <form action="/dashboard/manage-accounts/{{$account->id}}" method="post"--}}
{{--                                            class="inline-flex items-center gap-1 px-4 py-2 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg font-medium transition text-sm"--}}
{{--                                            title="Delete User">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button--}}
{{--                                            type="submit"--}}
{{--                                            class="flex items-center">--}}
{{--                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>--}}
{{--                                                </svg>--}}

{{--                                            </button>--}}

{{--                                        </form>--}}
                                        <!--new delete button-->
                                        <button
                                            data-id="{{$account->id}}"
                                            data-name="{{$account->name}}"
                                            class="deleteBtn inline-flex items-center gap-1 px-4 py-2 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg font-medium transition text-sm"
                                            title="Delete Button"
                                        >
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
                    Showing {{ $accounts->firstItem() }} to {{ $accounts->lastItem() }} of {{ $accounts->total() }} students
                </div>


                <!-- Pagination -->
                <div class="mt-6">
                    {{$accounts->links()}}
                </div>
            @endif

        </div>
    </div>

    <!--Delete MOdal-->
    <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4 hidden">  <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-2xl">
            <!-- Modal Header -->
            <div class="flex items-start gap-4 mb-4">
                <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <h2 class="text-xl font-bold text-gray-900 mb-1">
                        Delete Account
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
                    <span class="font-bold text-gray-900 uppercase" id="accountName"></span>?
                    This user will be permanently removed.
                </p>
            </div>

            <!-- Modal Actions -->
            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <div class="flex gap-3 justify-end">
                    <button
                        type="button"
                        id="closeModal"
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
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>

        let modal = document.getElementById('modal')
        let closeModal = document.getElementById('closeModal')

        document.querySelectorAll('.deleteBtn').forEach(button => {
            button.addEventListener("click",() => {

                let id = button.dataset.id
                let name = button.dataset.name

                modal.classList.remove('hidden')

                accountName.textContent = name

                deleteForm.action = '/dashboard/manage-accounts/' + id
            })
        })
        closeModal.onclick = () => modal.classList.add('hidden')
    </script>
</x-sidebar>

