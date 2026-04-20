<div
    x-data="{ modalOpen: false }"
    x-on:open-modal.window="modalOpen = true"
    x-on:close-modal.window="modalOpen = false"
    x-cloak>
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed inset-0 z-[99] flex items-center justify-center px-4">
            <div @click="modalOpen=false" class="absolute inset-0 bg-black/40"></div>

            <div
                x-show="modalOpen"
                x-transition
                x-trap.inert.noscroll="modalOpen"
                class="relative w-full max-w-xl rounded-xl bg-white p-6 shadow-xl">
                <h3 class="text-lg font-semibold text-slate-900 mb-4">
                    {{ $BlogCategoryId ? 'Edit Category' : 'Add Category' }}
                </h3>

                <div class="space-y-3">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Title</label>
                        <input
                            wire:model.live="title"
                            placeholder="Category title"
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                        @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Slug</label>
                        <input
                            wire:model="slug"
                            placeholder="auto-generated or custom slug"
                            class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm text-slate-800
                                    focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                         @error('slug') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                        <!-- description removed (not present in migration) -->

                    <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                        <input type="checkbox" wire:model="status" class="rounded border-slate-300 bg-blue-500 text-blue-600 focus:ring-blue-500">
                        <span>Active</span>
                    </label>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <button
                        @click="modalOpen=false"
                        class="rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">
                        Cancel
                    </button>
                    <button
                        wire:click="save"
                        class="inline-flex items-center gap-1 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white
                                hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1">
                        <i class="ri-save-3-line text-base"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
