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
