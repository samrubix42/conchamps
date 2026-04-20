<div
    x-data="{ open: false }"
    x-on:open-delete-modal.window="open = true"
    x-on:close-delete-modal.window="open = false"
    x-cloak
>
    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 bg-black/40 z-40"
    ></div>

    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center px-4"
    >
        <div class="w-full max-w-md rounded-xl bg-white shadow-2xl overflow-hidden">
            <div class="flex items-center justify-between px-6 py-4 bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800">
                    Delete Slider
                </h2>
                <button
                    @click="open = false"
                    class="text-gray-400 hover:text-gray-600 transition-colors"
                >
                    x
                </button>
            </div>

            <div class="px-6 py-6 text-sm text-gray-700">
                Are you sure you want to delete this slider?
                <p class="mt-2 text-xs text-rose-600">
                    This action cannot be undone.
                </p>
            </div>

            <div class="flex justify-end gap-3 px-6 py-4 bg-gray-50">
                <button
                    @click="open = false"
                    class="rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 transition-colors"
                >
                    Cancel
                </button>

                <button
                    wire:click="deleteConfirmed"
                    class="rounded-lg bg-rose-600 px-4 py-2 text-sm font-medium text-white hover:bg-rose-500 transition-colors"
                >
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>
</div>
