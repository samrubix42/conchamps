<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">
                {{ $careerId ? 'Edit Job Description' : 'Add Job Description' }}
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Specify job details and the rich text description.
            </p>
        </div>

        <a
            href="{{ route('admin.careers') }}"
            class="inline-flex items-center gap-2 rounded-md border border-slate-300 bg-white
                   px-4 py-2 text-sm font-medium text-slate-700 shadow-sm
                   hover:bg-slate-50 focus:outline-none focus:ring-2
                   focus:ring-blue-500/60 focus:ring-offset-1"
        >
            <i class="ri-arrow-left-line"></i>
            <span>Back to List</span>
        </a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
        <form
            x-data="{
                submitForm() {
                    const editor = window.tinymce?.get('career-description-editor');
                    if (editor) {
                        $wire.description = editor.getContent();
                    }
                    $wire.save();
                }
            }"
            @submit.prevent="submitForm"
            class="space-y-6"
        >
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Job Title -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Job Title *</label>
                    <input
                        type="text"
                        wire:model="title"
                        placeholder="e.g. Lead Cement Mason"
                        class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                    >
                    @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Location -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Location</label>
                    <input
                        type="text"
                        wire:model="location"
                        placeholder="e.g. Austin, TX"
                        class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                    >
                    @error('location') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Experience -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Experience Needed</label>
                    <input
                        type="text"
                        wire:model="experience"
                        placeholder="e.g. 3-5 years"
                        class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                    >
                    @error('experience') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Job Type -->
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Job Type</label>
                    <select
                        wire:model="type"
                        class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                    >
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Internship">Internship</option>
                    </select>
                    @error('type') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Status -->
            <div class="flex items-center gap-2">
                <input
                    type="checkbox"
                    id="career-status"
                    wire:model="status"
                    class="rounded border-slate-300 text-blue-600 focus:ring-blue-500"
                >
                <label for="career-status" class="text-sm font-medium text-slate-700 select-none">Active / Open Position</label>
            </div>

            <!-- Description with TinyMCE -->
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2">Job Description</label>
                <div wire:ignore>
                    <textarea
                        id="career-description-editor"
                        rows="10"
                        class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                    >{{ $description }}</textarea>
                </div>
                @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Submit buttons -->
            <div class="flex justify-end gap-3 pt-4 border-t border-slate-200">
                <a
                    href="{{ route('admin.careers') }}"
                    class="rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1"
                >
                    <i class="ri-save-3-line text-base"></i>
                    <span>{{ $careerId ? 'Update Job' : 'Save Job' }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

@once
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const editorId = 'career-description-editor';
            
            const initEditor = () => {
                if (!window.tinymce) return;
                
                // Destroy existing instance if any
                if (window.tinymce.get(editorId)) {
                    window.tinymce.get(editorId).destroy();
                }

                window.tinymce.init({
                    selector: `#${editorId}`,
                    base_url: '{{ asset('tinymce') }}',
                    suffix: '.min',
                    license_key: 'gpl',
                    height: 400,
                    menubar: false,
                    branding: false,
                    promotion: false,
                    plugins: 'autolink lists link table code fullscreen preview wordcount',
                    toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | link table | removeformat code fullscreen',
                    setup(editor) {
                        editor.on('change keyup input undo redo', () => {
                            // Sync content back to Livewire component
                            @this.set('description', editor.getContent(), false);
                        });
                    }
                });
            };

            initEditor();
        });
    </script>
@endonce
