<x-layout>
    <div class="flex min-h-screen bg-gray-50">

        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 flex flex-col shadow-sm">

            <!-- Sidebar Header -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-center items-center gap-3">
                    <div>
                        @if(auth()->user()->isSuperAdmin())
                            <h2 class="text-xl font-bold  text-center ">SUPER ADMIN</h2>
                        @else
                            <h2 class="text-xl font-bold  text-center ">ADMIN</h2>
                        @endif

                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-1">

                @if(auth()->user()->isSuperAdmin())
                    <!-- Manage Accounts -->
                    <a href="/accounts/superadmin"
                       class="{{ request()->is('accounts/superadmin') ? 'bg-violet-100 text-[#3a8a0f] border-[#3a8a0f]' : 'text-gray-700 hover:bg-gray-100' }} flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition border-l-4
                   {{ request()->is('dashboard/manage-accounts') ? 'border-[#3a8a0f]' : 'border-transparent' }}">
                        <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        <span>Manage Accounts</span>
                    </a>

                    <!-- Subjects -->
                    <a href="/campus_subjects/superadmin"
                       class="{{ request()->is('campus_subjects/superadmin') ? 'bg-violet-100 text-[#3a8a0f] border-[#3a8a0f]' : 'text-gray-700 hover:bg-gray-100' }} flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition border-l-4 {{ request()->is('subjects') ? 'border-[#3a8a0f]' : 'border-transparent' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span>Subjects</span>
                    </a>
                @else
                    <!-- Manage Accounts -->
                    <a href="/dashboard/manage-accounts"
                       class="{{ request()->is('dashboard/manage-accounts') ? 'bg-violet-100 text-[#3a8a0f] border-[#3a8a0f]' : 'text-gray-700 hover:bg-gray-100' }} flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition border-l-4
                   {{ request()->is('dashboard/manage-accounts') ? 'border-[#3a8a0f]' : 'border-transparent' }}">
                        <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        <span>Manage Accounts</span>
                    </a>

                    <!-- Students Profile -->
                    <a href="/dashboard/students-profile"
                       class="{{ request()->is('dashboard/students-profile') ? 'bg-violet-100 text-[#3a8a0f] border-[#3a8a0f]' : 'text-gray-700 hover:bg-gray-100' }} flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition border-l-4
                   {{ request()->is('dashboard/students-profile') ? 'border-[#3a8a0f]' : 'border-transparent' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span>Student Profiles</span>
                    </a>


                    <!-- Subjects -->
                    <a href="/subjects"
                       class="{{ request()->is('subjects') ? 'bg-violet-100 text-[#3a8a0f] border-[#3a8a0f]' : 'text-gray-700 hover:bg-gray-100' }} flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition border-l-4 {{ request()->is('subjects') ? 'border-[#3a8a0f]' : 'border-transparent' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        <span>Subjects</span>
                    </a>

                    <!-- Class Batches -->
                    <a href="/dashboard/class_batch"
                       class="{{ request()->is('dashboard/class_batch') ? 'bg-violet-100 text-[#3a8a0f] border-[#3a8a0f]' : 'text-gray-700 hover:bg-gray-100' }} flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition border-l-4 {{ request()->is('dashboard/class_batch') ? 'border-[#3a8a0f]' : 'border-transparent' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <span>Class Batches</span>
                    </a>

                    <a href="/dashboard/evaluation_template"
                       class="{{ request()->is('dashboard/evaluation_template') ? 'bg-violet-100 text-[#3a8a0f] border-[#3a8a0f]' : 'text-gray-700 hover:bg-gray-100' }} flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition border-l-4 {{ request()->is('dashboard/evaluation_template') ? 'border-[#3a8a0f]' : 'border-transparent' }}">
                        <svg class="w-5 h-5  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z"/>
                        </svg>
                        <span>Evaluation Template</span>
                    </a>

                @endif

                <!-- Divider -->
                <div class="border-t border-gray-200 my-4"></div>


            </nav>




        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 overflow-auto">
            {{ $slot }}
        </main>
    </div>
</x-layout>
