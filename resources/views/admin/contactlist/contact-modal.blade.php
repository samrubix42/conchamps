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
                                {{ $contactId ? 'View/Edit Contact' : 'Create Contact' }}
                            </h3>
                            <p class="mt-1 text-sm text-slate-500">Manage contact inquiry details and status.</p>
                        </div>

                        <button type="button" @click="modalOpen = false" class="inline-flex h-8 w-8 items-center justify-center rounded-md text-slate-400 transition hover:bg-slate-100 hover:text-slate-600" aria-label="Close modal">
                            <i class="ri-close-line text-lg"></i>
                        </button>
                    </div>
                </div>

                <div class="max-h-[75vh] overflow-y-auto p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Name</label>
                            <input wire:model.defer="name" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                            @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Email</label>
                            <input wire:model.defer="email" type="email" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                            @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Company</label>
                            <input wire:model.defer="company" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                            @error('company') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Phone</label>
                            <input wire:model.defer="phone" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                            @error('phone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-slate-600 mb-1">Project Type</label>
                            <input wire:model.defer="project_type" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                            @error('project_type') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-slate-600 mb-1">Message</label>
                            <textarea wire:model.defer="message" rows="5" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"></textarea>
                            @error('message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="inline-flex items-center gap-2 text-sm text-slate-700">
                                <input type="checkbox" wire:model="status" class="rounded border-slate-300 bg-blue-500 text-blue-600 focus:ring-blue-500">
                                <span>Mark as reviewed</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">
                    <button @click="modalOpen=false" class="rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Cancel</button>
                    <button wire:click="save" class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500">
                        <i class="ri-save-3-line"></i> Save
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>
