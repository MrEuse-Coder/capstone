<x-sidebar>
    <div class="min-h-screen bg-gray-50 p-6">
        <!-- Header Section -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Customize Template</h1>
        </div>

        <x-notification class="mt-6"></x-notification>

        <div class="max-w-2xl mx-auto">

            <!-- Form -->
            <div class="bg-white rounded-lg shadow p-6">
                <form method="post" action="/dashboard/evaluation_template" enctype="multipart/form-data" class="space-y-6">
                    <!-- Header Logo -->
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Header Logo
                        </label>
                        <input
                            type="file"
                            name="header_logo"
                            accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Footer Logo
                        </label>
                        <input
                            type="file"
                            name="footer_logo"
                            accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                        >
                    </div>


                    <!-- bachelors_degree-->

                    <div>
                        <label for="bachelors_degree" class="block text-sm font-medium text-gray-700 mb-2">
                            Bachelor's Degree
                        </label>
                        <input
                            type="text"
                            id="bachelors_degree"
                            name="bachelors_degree"
                            value="{{$template->bachelors_degree?? ''}}"
                            placeholder="BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY (BSIT)"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent"
                        >
                    </div>

                    <!-- Curriculum -->
                    <div>
                        <label for="curriculum" class="block text-sm font-medium text-gray-700 mb-2">
                            Curriculum
                        </label>
                        <input
                            type="text"
                            id="curriculum"
                            name="curriculum"
                            value="{{$template->curriculum?? ''}}"
                            placeholder="2022-2023"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent"
                        >
                    </div>

                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700 mb-2">
                            College | Bachelor's Degree
                        </label>
                        <input
                            type="text"
                            id="department"
                            name="department"
                            value="{{$template->department?? ''}}"
                            placeholder="College of Computer Studies | Bachelor of Science in Information Technology"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent"
                        >
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                            Address
                        </label>
                        <input
                            type="text"
                            id="address"
                            name="address"
                            value="{{$template->address?? ''}}"
                            placeholder="Guiuan, Eastern Samar, Philippines"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent"
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input
                            type="text"
                            id="email"
                            name="email"
                            value="{{$template->email?? ''}}"
                            placeholder="essuguiuan.css@gmail.com"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent"
                        >
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Phone
                        </label>
                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            value="{{$template->phone?? ''}}"
                            placeholder="09xxxxxxxxx | 09xxxxxxxxx"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#3a8a0f] focus:border-transparent"
                        >
                    </div>


                    <!-- Buttons -->
                    <div class="flex gap-3 pt-4">
                        <button
                            type="submit"
                            class="px-6 py-2 bg-[#3a8a0f] text-white rounded-lg hover:bg-green-700"
                        >
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>




    </div>
</x-sidebar>
