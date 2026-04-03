<x-layout>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 m-4">
        @foreach($admins as $admin)
            <div class="bg-white rounded-2xl shadow-md p-4 hover:shadow-lg transition duration-300">

                <!-- Avatar -->
                <div class="flex items-center justify-center mb-3">
                    <div class="w-12 h-12 rounded-full bg-blue-500 text-white flex items-center justify-center text-lg font-bold">
                        {{ strtoupper(substr($admin->name, 0, 1)) }}
                    </div>
                </div>

                <!-- User Info -->
                <div class="text-center">
                    <h2 class="text-lg font-semibold text-gray-800">
                        {{ $admin->name }}
                    </h2>
                    <p class="text-sm text-gray-500">
                        {{ $admin->college }}
                    </p>
                </div>

                <!-- Divider -->
                <div class="border-t my-3"></div>

                <!-- Action Buttons -->
                <div class="flex justify-center gap-2">
                    <a href="{{ route('impersonate', $admin->id) }}"
                       class="bg-blue-500 text-white px-3 py-1 rounded">
                        Access System
                    </a>
                </div>

            </div>
        @endforeach
    </div>
</x-layout>

