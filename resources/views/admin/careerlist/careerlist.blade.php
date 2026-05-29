
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">
                Career Management
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Manage job descriptions and careers available on Concrete Champs.
            </p>
        </div>
        
        @if (session()->has('message'))
            <div class="rounded-md bg-emerald-50 p-3 text-sm text-emerald-800 border border-emerald-200">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="space-y-4">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div class="w-full sm:max-w-sm">
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Search Jobs
                </label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Search by title, location, experience..."
                        class="block w-full rounded-md border border-slate-300 bg-white pl-9 pr-3 py-2 text-sm
                               text-slate-700 placeholder:text-slate-400
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                </div>
            </div>

            <div class="flex sm:justify-end">
                <a
                    href="{{ route('admin.careers.create') }}"
                    class="inline-flex items-center gap-2 rounded-md bg-blue-600
                           px-4 py-2 text-sm font-medium text-white shadow-sm
                           hover:bg-blue-500 focus:outline-none focus:ring-2
                           focus:ring-blue-500/60 focus:ring-offset-1">
                    <i class="ri-add-line text-base"></i>
                    <span>Add Job Description</span>
                </a>
            </div>
        </div>

        <!-- Desktop view -->
        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3">Job Title</th>
                            <th class="px-4 py-3">Location</th>
                            <th class="px-4 py-3">Experience</th>
                            <th class="px-4 py-3">Type</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right w-40">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($this->getCareersProperty() as $row)
                            <tr wire:key="career-{{ $row->id }}" class="hover:bg-slate-50/80">
                                <td class="px-4 py-3 text-slate-500">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="h-9 w-9 rounded-full bg-blue-100 text-blue-600 text-xs font-semibold flex items-center justify-center">
                                            <i class="ri-briefcase-line text-base"></i>
                                        </div>
                                        <span class="font-medium text-slate-800">{{ $row->title }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-slate-600">
                                    {{ $row->location ?: 'N/A' }}
                                </td>
                                <td class="px-4 py-3 text-slate-600">
                                    {{ $row->experience ?: 'N/A' }}
                                </td>
                                <td class="px-4 py-3 text-slate-600">
                                    {{ $row->type ?: 'N/A' }}
                                </td>
                                <td class="px-4 py-3">
                                    @if($row->status)
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
                                        <a
                                            href="{{ route('admin.careers.edit', $row->id) }}"
                                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                                   text-xs font-medium text-slate-700 hover:bg-slate-100">
                                            <i class="ri-edit-line text-sm"></i>
                                            Edit
                                        </a>

                                        <button
                                            @click="
                                                $dispatch('open-delete-modal');
                                                $wire.confirmDelete({{ $row->id }})
                                            "
                                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                                   text-xs font-medium text-rose-600 hover:bg-rose-50">
                                            <i class="ri-delete-bin-6-line text-sm"></i>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-sm text-slate-500">
                                    No careers found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mobile view -->
        <div class="space-y-3 sm:hidden">
            @forelse($this->getCareersProperty() as $row)
                <div wire:key="career-card-{{ $row->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $row->title }}</p>
                            <p class="mt-0.5 text-xs text-slate-500">{{ $row->location }} | {{ $row->type }}</p>
                        </div>

                        @if($row->status)
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-[11px] font-semibold text-emerald-700">Active</span>
                        @else
                            <span class="inline-flex items-center gap-1 rounded-full bg-rose-100 px-2 py-0.5 text-[11px] font-semibold text-rose-700">Inactive</span>
                        @endif
                    </div>

                    <p class="mt-2 text-xs text-slate-600">Experience: {{ $row->experience ?: 'N/A' }}</p>

                    <div class="mt-4 flex items-center justify-end gap-2">
                        <a
                            href="{{ route('admin.careers.edit', $row->id) }}"
                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                   text-xs font-medium text-slate-700 hover:bg-slate-100">
                            <i class="ri-edit-line text-sm"></i>
                            Edit
                        </a>

                        <button
                            @click="
                                $dispatch('open-delete-modal');
                                $wire.confirmDelete({{ $row->id }})
                            "
                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                   text-xs font-medium text-rose-600 hover:bg-rose-50">
                            <i class="ri-delete-bin-6-line text-sm"></i>
                            Delete
                        </button>
                    </div>
                </div>
            @empty
                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">
                    No careers found.
                </div>
            @endforelse
        </div>

        <div class="mt-3 flex justify-end">
            {{ $this->getCareersProperty()->links() }}
        </div>

        @include('admin.careerlist.delete')
    </div>
</div>