<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6">
        <h1 class="text-xl font-semibold text-slate-900">Project List</h1>
        <p class="mt-1 text-sm text-slate-500">Manage projects with category, image, and status.</p>
    </div>

    <div class="space-y-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full sm:max-w-xs">
                <label class="block text-xs font-medium text-slate-500 mb-1">Search Projects</label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Search by title, category..."
                        class="block w-full rounded-md border border-slate-300 bg-white pl-9 pr-3 py-2 text-sm text-slate-700 placeholder:text-slate-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none"
                    >
                </div>
            </div>

            <div class="flex sm:justify-end">
                <button
                    @click="$dispatch('open-modal');$wire.resetForm()"
                    class="inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/60 focus:ring-offset-1"
                >
                    <i class="ri-add-line text-base"></i>
                    <span>Add Project</span>
                </button>
            </div>
        </div>

        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Category</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right w-40">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($this->getProjectsProperty() as $project)
                            <tr wire:key="project-{{ $project->id }}" class="hover:bg-slate-50/80">
                                <td class="px-4 py-3 text-slate-500">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">
                                    @if($project->image_path)
                                        <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" class="h-12 w-20 rounded object-cover">
                                    @else
                                        <span class="text-slate-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <p class="font-medium text-slate-800">{{ $project->title }}</p>
                                    <p class="text-xs text-slate-500">{{ $project->slug }}</p>
                                </td>
                                <td class="px-4 py-3 text-slate-700">{{ $project->category?->title ?: '-' }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ $project->address ?: '-' }}</td>
                                <td class="px-4 py-3">
                                    @if($project->status)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-rose-100 px-2.5 py-1 text-xs font-semibold text-rose-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                                            Inactive
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            @click="$dispatch('open-modal');$wire.openEditModal({{ $project->id }})"
                                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-100"
                                        >
                                            <i class="ri-edit-line text-sm"></i>
                                            Edit
                                        </button>

                                        <button
                                            @click="$dispatch('open-delete-modal');$wire.confirmDelete({{ $project->id }})"
                                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5 text-xs font-medium text-rose-600 hover:bg-rose-50"
                                        >
                                            <i class="ri-delete-bin-6-line text-sm"></i>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-sm text-slate-500">No projects found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-3 sm:hidden">
            @forelse($this->getProjectsProperty() as $project)
                <div wire:key="project-card-{{ $project->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $project->title }}</p>
                            <p class="text-xs text-slate-500">{{ $project->category?->title ?: '-' }}</p>
                        </div>
                        @if($project->status)
                            <span class="inline-flex rounded-full bg-emerald-100 px-2 py-0.5 text-[11px] font-semibold text-emerald-700">Active</span>
                        @else
                            <span class="inline-flex rounded-full bg-rose-100 px-2 py-0.5 text-[11px] font-semibold text-rose-700">Inactive</span>
                        @endif
                    </div>

                    @if($project->image_path)
                        <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" class="mt-3 h-32 w-full rounded object-cover">
                    @endif

                    <p class="mt-2 text-xs text-slate-600">{{ $project->address ?: '-' }}</p>

                    <div class="mt-4 flex items-center justify-end gap-2">
                        <button @click="$dispatch('open-modal');$wire.openEditModal({{ $project->id }})" class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5 text-xs font-medium text-slate-700 hover:bg-slate-100">Edit</button>
                        <button @click="$dispatch('open-delete-modal');$wire.confirmDelete({{ $project->id }})" class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5 text-xs font-medium text-rose-600 hover:bg-rose-50">Delete</button>
                    </div>
                </div>
            @empty
                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">No projects found.</div>
            @endforelse
        </div>

        <div class="mt-3 flex justify-end">
            {{ $this->getProjectsProperty()->links() }}
        </div>

        @include('project-list.project-modal')
        @include('project-list.delete')
    </div>
</div>