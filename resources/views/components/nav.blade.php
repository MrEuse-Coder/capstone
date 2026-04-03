<div class="fixed  top-0 left-0 w-full h-[6rem] bg-gradient-to-r from-[#005104] to-[#3a8a0f] flex items-center justify-between shadow-xl z-40">

    <div class="m-4 flex justify-center items-center">
        @auth
            @if(auth()->user()->isSuperAdmin())
                <a href="/dashboard/superadmin">
                    <svg class="w-10 h-10 text-gray-800 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                    </svg>
                </a>
            @else
                <a href="/dashboard/admin">
                    <svg class="w-10 h-10 text-gray-800 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                    </svg>
                </a>
            @endif

        @endauth



            @auth
                @if(auth()->user()->isSuperAdmin())
                    <a href="/superadmin/home" class="mr-2 ml-2  ">
                        <img src="{{ asset('images/essu_logo-1.png') }}" class="w-20 h-20 ">
                    </a>

                    <a href="/superadmin/home" class="flex justify-center">
                        <div class="flex flex-col justify-center">
                            <div class=" text-white font-bold text-xl">EASTERN SAMAR STATE UNIVERSITY</div>
                            <div class="text-white text-lg font-bold">Student Academic Evaluation System</div>
                        </div>
                    </a>
                @else
                    <a href="/" class="mr-2 ml-2  ">
                        <img src="{{ asset('images/essu_logo-1.png') }}" class="w-20 h-20 ">
                    </a>

                    <a href="/" class="flex justify-center">
                        <div class="flex flex-col justify-center">
                            <div class=" text-white font-bold text-xl">EASTERN SAMAR STATE UNIVERSITY</div>
                            <div class="text-white text-lg font-bold">Student Academic Evaluation System</div>
                        </div>
                    </a>
                @endif

            @endauth

    </div>

    <div class="mr-4 flex items-center">

        @if(session()->has('impersonator_id'))
                <a href="{{ route('stop.impersonation') }}"
                   class=" p-2 w-auto bg-red-500 text-white text-xl rounded m-2 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg shadow-lg transition-all transform hover:scale-105 active:scale-95">
                    Super Admin
                </a>
        @endif

        <form action="/logout" method="POST">
            @csrf
            <button class=" p-2 w-auto bg-red-500 text-white text-xl rounded m-2 hover:bg-red-700 text-white font-semibold px-6 py-2 rounded-lg shadow-lg transition-all transform hover:scale-105 active:scale-95">Logout</button>
        </form>

    </div>
</div>


