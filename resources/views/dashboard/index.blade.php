<x-layout>
    <div class="min-h-screen bg-gradient-to-br from-violet-50 to-indigo-50 p-8">
        <div class="grid grid-cols-2 gap-6 h-full">

            <!-- Manage Accounts -->
            <a href="/dashboard/manage-accounts"
               class="{{ request()->is('dashboard/manage-accounts') ? 'bg-gradient-to-br from-violet-500 to-purple-600 text-white shadow-xl scale-105' : 'bg-white text-gray-700 hover:shadow-lg hover:scale-102' }}
                      flex flex-col items-center justify-center gap-4 p-8 rounded-2xl font-medium transition-all duration-300 min-h-[250px] group">
                <div class="{{ request()->is('dashboard/manage-accounts') ? 'bg-white/20' : 'bg-violet-100 group-hover:bg-violet-200' }} p-6 rounded-full transition-colors">
                    <svg class="w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>
                </div>
                <span class="text-xl font-semibold">Manage Accounts</span>
                <p class="{{ request()->is('dashboard/manage-accounts') ? 'text-white/80' : 'text-gray-500' }} text-sm">Control user permissions and roles</p>
            </a>

            <!-- Students Profile -->
            <a href="/dashboard/students-profile"
               class="{{ request()->is('dashboard/students-profile') ? 'bg-gradient-to-br from-violet-500 to-purple-600 text-white shadow-xl scale-105' : 'bg-white text-gray-700 hover:shadow-lg hover:scale-102' }}
                      flex flex-col items-center justify-center gap-4 p-8 rounded-2xl font-medium transition-all duration-300 min-h-[250px] group">
                <div class="{{ request()->is('dashboard/students-profile') ? 'bg-white/20' : 'bg-violet-100 group-hover:bg-violet-200' }} p-6 rounded-full transition-colors">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <span class="text-xl font-semibold">Student Profiles</span>
                <p class="{{ request()->is('dashboard/students-profile') ? 'text-white/80' : 'text-gray-500' }} text-sm">View and manage student information</p>
            </a>

            <!-- Subjects -->
            <a href="/subjects"
               class="{{ request()->is('subjects') ? 'bg-gradient-to-br from-violet-500 to-purple-600 text-white shadow-xl scale-105' : 'bg-white text-gray-700 hover:shadow-lg hover:scale-102' }}
                      flex flex-col items-center justify-center gap-4 p-8 rounded-2xl font-medium transition-all duration-300 min-h-[250px] group">
                <div class="{{ request()->is('subjects') ? 'bg-white/20' : 'bg-violet-100 group-hover:bg-violet-200' }} p-6 rounded-full transition-colors">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
                <span class="text-xl font-semibold">Subjects</span>
                <p class="{{ request()->is('subjects') ? 'text-white/80' : 'text-gray-500' }} text-sm">Organize and manage course subjects</p>
            </a>

            <!-- Class Batches -->
            <a href="/dashboard/class_batch"
               class="{{ request()->is('dashboard/class_batch') ? 'bg-gradient-to-br from-violet-500 to-purple-600 text-white shadow-xl scale-105' : 'bg-white text-gray-700 hover:shadow-lg hover:scale-102' }}
                      flex flex-col items-center justify-center gap-4 p-8 rounded-2xl font-medium transition-all duration-300 min-h-[250px] group">
                <div class="{{ request()->is('dashboard/class_batch') ? 'bg-white/20' : 'bg-violet-100 group-hover:bg-violet-200' }} p-6 rounded-full transition-colors">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                </div>
                <span class="text-xl font-semibold">Class Batches</span>
                <p class="{{ request()->is('dashboard/class_batch') ? 'text-white/80' : 'text-gray-500' }} text-sm">Create and organize class groups</p>
            </a>


            <a href="/dashboard/evaluation_template"
               class="{{ request()->is('evaluation_template') ? 'bg-gradient-to-br from-violet-500 to-purple-600 text-white shadow-xl scale-105' : 'bg-white text-gray-700 hover:shadow-lg hover:scale-102' }}
                      flex flex-col items-center justify-center gap-4 p-8 rounded-2xl font-medium transition-all duration-300 min-h-[250px] group">
                <div class="{{ request()->is('evaluation_template') ? 'bg-white/20' : 'bg-violet-100 group-hover:bg-violet-200' }} p-6 rounded-full transition-colors">
                    <svg class="w-12 h-12  " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z"/>
                    </svg>

                </div>
                <span class="text-xl font-semibold">Evaluation Template</span>
                <p class="{{ request()->is('evaluation_template') ? 'text-white/80' : 'text-gray-500' }} text-sm">Create and customize evaluation template</p>
            </a>

        </div>
    </div>
</x-layout>
