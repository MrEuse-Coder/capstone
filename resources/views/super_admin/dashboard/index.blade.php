<x-layout>
    <div class="min-h-screen bg-gradient-to-br from-violet-50 to-indigo-50 p-8">
        <div class="grid grid-cols-2 gap-6 h-full">

            <!-- Manage Accounts -->
            <a href="/accounts/superadmin"
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

        </div>
    </div>
</x-layout>
