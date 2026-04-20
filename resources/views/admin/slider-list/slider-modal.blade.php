<div
    x-data="{ modalOpen: false }"
    x-on:open-modal.window="modalOpen = true"
    x-on:close-modal.window="modalOpen = false"
    x-on:keydown.escape.window="modalOpen = false"
    x-cloak>
    <template x-teleport="body">
        <div x-show="modalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6">
            <div @click="modalOpen=false" class="absolute inset-0 bg-slate-900/45"></div>

            <div
                x-show="modalOpen"
                x-transition
                x-trap.inert.noscroll="modalOpen"
                class="relative w-full max-w-3xl overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-slate-200">

                <div class="border-b border-slate-200 bg-white px-6 py-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">
                                {{ $sliderId ? 'Edit Slider' : 'Create Slider' }}
                            </h3>
                            <p class="mt-1 text-sm text-slate-500">
                                Configure content, image, and action links for your homepage banner.
                            </p>
                        </div>

                        <button
                            type="button"
                            @click="modalOpen = false"
                            wire:loading.attr="disabled"
                            wire:target="save"
                            class="inline-flex h-8 w-8 items-center justify-center rounded-md text-slate-400 transition hover:bg-slate-100 hover:text-slate-600 disabled:cursor-not-allowed disabled:opacity-60"
                            aria-label="Close modal">
                            <i class="ri-close-line text-lg"></i>
                        </button>
                    </div>
                </div>

                <div class="max-h-[75vh] overflow-y-auto p-6">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="rounded-lg border border-slate-200 bg-white p-4">
                            <p class="mb-3 text-xs font-semibold uppercase tracking-wide text-slate-500">Main Details</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Badge</label>
                                    <input
                                        wire:model.defer="badge_name"
                                        placeholder="Featured"
                                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800
                                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                                    @error('badge_name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Slider Image</label>
                                    <input
                                        type="file"
                                        accept="image/*"
                                        wire:model="image"
                                        wire:loading.attr="disabled"
                                        wire:target="image"
                                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800
                                               file:mr-3 file:rounded file:border-0 file:bg-slate-100 file:px-2 file:py-1 file:text-xs file:font-semibold file:text-slate-700
                                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                                    <p class="mt-1 text-xs text-slate-500">JPG, PNG, WEBP up to 3MB.</p>
                                    <p wire:loading wire:target="image" class="mt-1 inline-flex items-center gap-1 text-xs font-medium text-blue-600">
                                        <i class="ri-loader-4-line animate-spin"></i>
                                        Uploading image...
                                    </p>
                                    @error('image') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Preview</label>
                                    <div class="flex h-24 w-full items-center justify-center rounded-md border border-dashed border-slate-300 bg-slate-50 p-2">
                                        @if ($image)
                                            <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="h-20 w-full rounded object-cover">
                                        @elseif ($image_path)
                                            <img src="{{ asset($image_path) }}" alt="Current image" class="h-20 w-full rounded object-cover">
                                        @else
                                            <div class="text-center text-xs text-slate-400">
                                                <i class="ri-image-line text-base"></i>
                                                <p>No image selected</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Title</label>
                                    <input
                                        wire:model.defer="title"
                                        placeholder="Slider title"
                                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800
                                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                                    @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div class="sm:col-span-2">
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Description</label>
                                    <textarea
                                        wire:model.defer="description"
                                        rows="3"
                                        placeholder="Optional description"
                                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800
                                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"></textarea>
                                    @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="rounded-lg border border-slate-200 bg-white p-4">
                            <p class="mb-3 text-xs font-semibold uppercase tracking-wide text-slate-500">Action Buttons</p>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Button 1 Text</label>
                                    <input
                                        wire:model.defer="button1_text"
                                        placeholder="Read More"
                                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800
                                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                                    @error('button1_text') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Button 1 Link</label>
                                    <input
                                        wire:model.defer="button1_link"
                                        placeholder="/projects"
                                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800
                                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                                    @error('button1_link') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Button 2 Text</label>
                                    <input
                                        wire:model.defer="button2_text"
                                        placeholder="Contact Us"
                                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800
                                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                                    @error('button2_text') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="block text-xs font-medium text-slate-600 mb-1">Button 2 Link</label>
                                    <input
                                        wire:model.defer="button2_link"
                                        placeholder="/contact"
                                        class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800
                                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                                    @error('button2_link') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">
                    <button
                        @click="modalOpen=false"
                        wire:loading.attr="disabled"
                        wire:target="save"
                        class="rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 disabled:cursor-not-allowed disabled:opacity-60">
                        Cancel
                    </button>
                    <button
                        wire:click="save"
                        wire:loading.attr="disabled"
                        wire:target="save"
                        class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white
                               hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-70">
                        <i wire:loading.remove wire:target="save" class="ri-save-3-line text-base"></i>
                        <i wire:loading wire:target="save" class="ri-loader-4-line text-base animate-spin"></i>
                        <span wire:loading.remove wire:target="save">Save Slider</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
