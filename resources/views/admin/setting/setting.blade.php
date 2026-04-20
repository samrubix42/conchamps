<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-5">
    <div>
        <h1 class="text-xl font-semibold text-slate-900">Settings</h1>
        <p class="mt-1 text-sm text-slate-500">Manage project details with key-value configuration.</p>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-5">
        <div class="xl:col-span-8 space-y-5">
            <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-5 py-4">
                    <h2 class="text-sm font-semibold text-slate-800">Project Details</h2>
                </div>

                <div class="p-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Project Name</label>
                        <input wire:model.defer="project_name" type="text" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="Conchamps">
                        @error('project_name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Email</label>
                        <input wire:model.defer="email" type="email" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="info@conchamps.com">
                        @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Phone Number</label>
                        <input wire:model.defer="phone_number" type="text" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="+91 98765 43210">
                        @error('phone_number') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">WhatsApp Number</label>
                        <input wire:model.defer="whatsapp_number" type="text" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="+91 98765 43210">
                        @error('whatsapp_number') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Office Timing</label>
                        <input wire:model.defer="office_timing" type="text" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="Mon - Sat, 8:00 AM - 5:30 PM">
                        @error('office_timing') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="sm:col-span-2 lg:col-span-3">
                        <label class="block text-xs font-medium text-slate-600 mb-1">Address</label>
                        <textarea wire:model.defer="address" rows="2" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="Project office address"></textarea>
                        @error('address') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 px-5 py-4">
                    <h2 class="text-sm font-semibold text-slate-800">Social Links</h2>
                </div>

                <div class="p-5 grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Instagram</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400"><i class="ri-instagram-line"></i></span>
                            <input wire:model.defer="instagram" type="url" class="w-full rounded-md border border-slate-300 pl-9 pr-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="https://instagram.com/your-page">
                        </div>
                        @error('instagram') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">X (Twitter)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400"><i class="ri-twitter-x-line"></i></span>
                            <input wire:model.defer="x" type="url" class="w-full rounded-md border border-slate-300 pl-9 pr-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="https://x.com/your-page">
                        </div>
                        @error('x') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">LinkedIn</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400"><i class="ri-linkedin-box-line"></i></span>
                            <input wire:model.defer="linkedin" type="url" class="w-full rounded-md border border-slate-300 pl-9 pr-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="https://linkedin.com/company/your-page">
                        </div>
                        @error('linkedin') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Facebook</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400"><i class="ri-facebook-circle-line"></i></span>
                            <input wire:model.defer="facebook" type="url" class="w-full rounded-md border border-slate-300 pl-9 pr-3 py-2 text-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none" placeholder="https://facebook.com/your-page">
                        </div>
                        @error('facebook') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="xl:col-span-4">
            <div class="xl:sticky xl:top-6 space-y-5">
                <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
                    <div class="border-b border-slate-100 px-5 py-4">
                        <h2 class="text-sm font-semibold text-slate-800">Brand Assets</h2>
                    </div>

                    <div class="p-5 grid grid-cols-1 gap-5">
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Header Logo</label>
                            <input wire:model="header_logo" type="file" accept="image/*" wire:loading.attr="disabled" wire:target="header_logo" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm file:mr-3 file:rounded file:border-0 file:bg-slate-100 file:px-2 file:py-1 file:text-xs file:font-semibold file:text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none">
                            <p wire:loading wire:target="header_logo" class="mt-1 text-xs font-medium text-blue-600 inline-flex items-center gap-1"><i class="ri-loader-4-line animate-spin"></i>Uploading header logo...</p>
                            @error('header_logo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            <div class="mt-2 h-16 rounded-md border border-dashed border-slate-300 bg-slate-50 flex items-center justify-center overflow-hidden">
                                @if ($header_logo)
                                    <img src="{{ $header_logo->temporaryUrl() }}" alt="Header logo preview" class="h-full object-contain">
                                @elseif ($header_logo_path)
                                    <img src="{{ asset($header_logo_path) }}" alt="Saved header logo" class="h-full object-contain">
                                @else
                                    <span class="text-xs text-slate-400">No header logo selected</span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Footer Logo</label>
                            <input wire:model="footer_logo" type="file" accept="image/*" wire:loading.attr="disabled" wire:target="footer_logo" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm file:mr-3 file:rounded file:border-0 file:bg-slate-100 file:px-2 file:py-1 file:text-xs file:font-semibold file:text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none">
                            <p wire:loading wire:target="footer_logo" class="mt-1 text-xs font-medium text-blue-600 inline-flex items-center gap-1"><i class="ri-loader-4-line animate-spin"></i>Uploading footer logo...</p>
                            @error('footer_logo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            <div class="mt-2 h-16 rounded-md border border-dashed border-slate-300 bg-slate-50 flex items-center justify-center overflow-hidden">
                                @if ($footer_logo)
                                    <img src="{{ $footer_logo->temporaryUrl() }}" alt="Footer logo preview" class="h-full object-contain">
                                @elseif ($footer_logo_path)
                                    <img src="{{ asset($footer_logo_path) }}" alt="Saved footer logo" class="h-full object-contain">
                                @else
                                    <span class="text-xs text-slate-400">No footer logo selected</span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Logo</label>
                            <input wire:model="logo" type="file" accept="image/*" wire:loading.attr="disabled" wire:target="logo" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm file:mr-3 file:rounded file:border-0 file:bg-slate-100 file:px-2 file:py-1 file:text-xs file:font-semibold file:text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none">
                            <p wire:loading wire:target="logo" class="mt-1 text-xs font-medium text-blue-600 inline-flex items-center gap-1"><i class="ri-loader-4-line animate-spin"></i>Uploading logo...</p>
                            @error('logo') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            <div class="mt-2 h-16 rounded-md border border-dashed border-slate-300 bg-slate-50 flex items-center justify-center overflow-hidden">
                                @if ($logo)
                                    <img src="{{ $logo->temporaryUrl() }}" alt="Logo preview" class="h-full object-contain">
                                @elseif ($logo_path)
                                    <img src="{{ asset($logo_path) }}" alt="Saved logo" class="h-full object-contain">
                                @else
                                    <span class="text-xs text-slate-400">No logo selected</span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Favicon</label>
                            <input wire:model="favicon" type="file" accept="image/*" wire:loading.attr="disabled" wire:target="favicon" class="w-full rounded-md border border-slate-300 px-3 py-2 text-sm file:mr-3 file:rounded file:border-0 file:bg-slate-100 file:px-2 file:py-1 file:text-xs file:font-semibold file:text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none">
                            <p wire:loading wire:target="favicon" class="mt-1 text-xs font-medium text-blue-600 inline-flex items-center gap-1"><i class="ri-loader-4-line animate-spin"></i>Uploading favicon...</p>
                            @error('favicon') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            <div class="mt-2 h-16 rounded-md border border-dashed border-slate-300 bg-slate-50 flex items-center justify-center overflow-hidden">
                                @if ($favicon)
                                    <img src="{{ $favicon->temporaryUrl() }}" alt="Favicon preview" class="h-10 w-10 rounded object-cover">
                                @elseif ($favicon_path)
                                    <img src="{{ asset($favicon_path) }}" alt="Saved favicon" class="h-10 w-10 rounded object-cover">
                                @else
                                    <span class="text-xs text-slate-400">No favicon selected</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-xl border border-slate-200 bg-white shadow-sm p-4">
                    <button
                        wire:click="save"
                        wire:loading.attr="disabled"
                        wire:target="save"
                        class="w-full inline-flex items-center justify-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1 disabled:opacity-70">
                        <i wire:loading.remove wire:target="save" class="ri-save-3-line"></i>
                        <i wire:loading wire:target="save" class="ri-loader-4-line animate-spin"></i>
                        <span wire:loading.remove wire:target="save">Save Settings</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>