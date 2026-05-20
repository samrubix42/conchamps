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
                x-trap.noscroll="modalOpen"
                class="relative w-full max-w-3xl overflow-hidden rounded-xl bg-white shadow-xl ring-1 ring-slate-200"
            >
                <div class="border-b border-slate-200 bg-white px-6 py-4">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">{{ $projectId ? 'Edit Project' : 'Create Project' }}</h3>
                            <p class="mt-1 text-sm text-slate-500">Add project details, category, and gallery images.</p>
                        </div>

                        <button
                            type="button"
                            @click="modalOpen = false"
                            wire:loading.attr="disabled"
                            wire:target="save"
                            class="inline-flex h-8 w-8 items-center justify-center rounded-md text-slate-400 transition hover:bg-slate-100 hover:text-slate-600 disabled:cursor-not-allowed disabled:opacity-60"
                            aria-label="Close modal"
                        >
                            <i class="ri-close-line text-lg"></i>
                        </button>
                    </div>
                </div>

                <div class="max-h-[75vh] overflow-y-auto p-6">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Title</label>
                            <input
                                wire:model.defer="title"
                                placeholder="Project title"
                                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            @error('title') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Slug</label>
                            <input
                                wire:model.defer="slug"
                                placeholder="project-slug"
                                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            @error('slug') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Category</label>
                            <select
                                wire:model.defer="category_id"
                                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                                <option value="">Select category</option>
                                @foreach($this->getCategoriesProperty() as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Status</label>
                            <label class="inline-flex items-center gap-2 text-sm text-slate-700 mt-2">
                                <input type="checkbox" wire:model="status" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                                <span>Active</span>
                            </label>
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-slate-600 mb-1">Address</label>
                            <input
                                wire:model.defer="address"
                                placeholder="Project location"
                                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            @error('address') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-slate-600 mb-1">Description</label>
                            <div wire:ignore>
                                <textarea
                                    id="project-description-editor"
                                    rows="4"
                                    class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                                    placeholder="Project summary"
                                >{{ $description }}</textarea>
                            </div>
                            @error('description') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-slate-600 mb-1">Project Images</label>
                            <input
                                type="file"
                                accept="image/*"
                                multiple
                                wire:model="images"
                                wire:loading.attr="disabled"
                                wire:target="images"
                                class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 file:mr-3 file:rounded file:border-0 file:bg-slate-100 file:px-2 file:py-1 file:text-xs file:font-semibold file:text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                            >
                            <p class="mt-1 text-xs text-slate-500">JPG, PNG, WEBP up to 3MB each.</p>
                            <p wire:loading wire:target="images" class="mt-1 inline-flex items-center gap-1 text-xs font-medium text-blue-600">
                                <i class="ri-loader-4-line animate-spin"></i>
                                Uploading images...
                            </p>
                            @error('images') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                            @error('images.*') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-medium text-slate-600 mb-1">Gallery Preview</label>
                            @if ($existingImages || $images)
                                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
                                    @foreach($existingImages as $existingImage)
                                        <div wire:key="existing-project-image-{{ $existingImage['id'] }}" class="group relative aspect-video overflow-hidden rounded-md border border-slate-200 bg-slate-50">
                                            <img src="{{ asset($existingImage['image_path']) }}" alt="Project image" class="h-full w-full object-cover">
                                            <button
                                                type="button"
                                                wire:click="deleteProjectImage({{ $existingImage['id'] }})"
                                                wire:loading.attr="disabled"
                                                wire:target="deleteProjectImage({{ $existingImage['id'] }})"
                                                class="absolute right-2 top-2 inline-flex h-7 w-7 items-center justify-center rounded-md bg-white/90 text-rose-600 shadow-sm transition hover:bg-rose-50 disabled:cursor-not-allowed disabled:opacity-60"
                                                aria-label="Remove image"
                                            >
                                                <i class="ri-delete-bin-6-line text-sm"></i>
                                            </button>
                                        </div>
                                    @endforeach

                                    @foreach($images as $index => $image)
                                        <div wire:key="new-project-image-{{ $index }}" class="relative aspect-video overflow-hidden rounded-md border border-dashed border-blue-200 bg-blue-50 p-1">
                                            <img src="{{ $image->temporaryUrl() }}" alt="New project image preview" class="h-full w-full rounded object-cover">
                                            <button
                                                type="button"
                                                wire:click="removePendingImage({{ $index }})"
                                                wire:loading.attr="disabled"
                                                wire:target="removePendingImage({{ $index }})"
                                                class="absolute right-2 top-2 inline-flex h-7 w-7 items-center justify-center rounded-md bg-white/90 text-rose-600 shadow-sm transition hover:bg-rose-50 disabled:cursor-not-allowed disabled:opacity-60"
                                                aria-label="Remove selected image"
                                            >
                                                <i class="ri-close-line text-sm"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @elseif ($image_path)
                                <div class="aspect-video overflow-hidden rounded-md border border-slate-200 bg-slate-50 sm:max-w-xs">
                                    <img src="{{ asset($image_path) }}" alt="Current image" class="h-full w-full object-cover">
                                </div>
                            @else
                                <div class="flex h-32 w-full items-center justify-center rounded-md border border-dashed border-slate-300 bg-slate-50 p-2">
                                    <div class="text-center text-xs text-slate-400">
                                        <i class="ri-image-line text-base"></i>
                                        <p>No images selected</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 border-t border-slate-200 bg-slate-50 px-6 py-4">
                    <button
                        @click="modalOpen=false"
                        wire:loading.attr="disabled"
                        wire:target="save"
                        class="rounded-md border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 disabled:cursor-not-allowed disabled:opacity-60"
                    >
                        Cancel
                    </button>
                    <button
                        type="button"
                        x-on:click="window.ConchampsProjectEditor?.save($wire)"
                        wire:loading.attr="disabled"
                        wire:target="save"
                        class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-70"
                    >
                        <i wire:loading.remove wire:target="save" class="ri-save-3-line text-base"></i>
                        <i wire:loading wire:target="save" class="ri-loader-4-line text-base animate-spin"></i>
                        <span wire:loading.remove wire:target="save">Save Project</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </button>
                </div>
            </div>
        </div>
    </template>
</div>

@once
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            const editorId = 'project-description-editor';
            let pendingContent = '';

            const setEditorContent = (content) => {
                const editor = window.tinymce?.get(editorId);
                const textarea = document.getElementById(editorId);
                const nextContent = content || '';

                pendingContent = nextContent;

                if (editor && editor.getContent() !== nextContent) {
                    editor.setContent(nextContent);
                }

                if (textarea) {
                    textarea.value = nextContent;
                }
            };

            const initEditor = () => {
                if (! window.tinymce || window.tinymce.get(editorId) || ! document.getElementById(editorId)) {
                    return;
                }

                window.tinymce.init({
                    selector: `#${editorId}`,
                    base_url: '{{ asset('tinymce') }}',
                    suffix: '.min',
                    license_key: 'gpl',
                    height: 280,
                    menubar: false,
                    branding: false,
                    promotion: false,
                    plugins: 'autolink lists link table code fullscreen preview wordcount',
                    toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | link table | removeformat code fullscreen',
                    setup(editor) {
                        const sync = ($wire = null) => {
                            const content = editor.getContent();
                            pendingContent = content;

                            if ($wire) {
                                $wire.description = content;
                            }
                        };

                        window.ConchampsProjectEditor = {
                            sync,
                            setContent: setEditorContent,
                            save($wire) {
                                sync($wire);
                                $wire.save();
                            },
                        };

                        editor.on('change keyup input undo redo', () => sync());
                        editor.on('init', () => setEditorContent(pendingContent));
                    },
                });
            };

            window.addEventListener('open-modal', () => {
                setTimeout(() => {
                    initEditor();
                    setEditorContent(pendingContent);
                }, 150);
            });

            window.addEventListener('project-description-editor-content', (event) => {
                setTimeout(() => {
                    initEditor();
                    setEditorContent(event.detail?.content || '');
                }, 75);
            });

            initEditor();
        });
    </script>
@endonce
