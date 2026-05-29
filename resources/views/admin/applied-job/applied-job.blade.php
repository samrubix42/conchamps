<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6" x-data="{ detailsOpen: false, deleteOpen: false }" 
     x-on:open-details-modal.window="detailsOpen = true"
     x-on:close-details-modal.window="detailsOpen = false"
     x-on:open-delete-modal.window="deleteOpen = true"
     x-on:close-delete-modal.window="deleteOpen = false">

    <!-- Header -->
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-xl font-semibold text-slate-900">
                Job Applications
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Manage and review candidate profiles who have applied for careers on Concrete Champs.
            </p>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="space-y-4">
        <div class="grid grid-cols-1 gap-3 md:grid-cols-4 sm:grid-cols-2">
            <!-- Search -->
            <div class="col-span-1 md:col-span-2">
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Search Candidates
                </label>
                <div class="relative">
                    <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400 text-sm">
                        <i class="ri-search-line"></i>
                    </span>
                    <input
                        type="text"
                        wire:model.live="search"
                        placeholder="Search by name, email, phone..."
                        class="block w-full rounded-md border border-slate-300 bg-white pl-9 pr-3 py-2 text-sm
                               text-slate-700 placeholder:text-slate-400
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                </div>
            </div>

            <!-- Job Opening Filter -->
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Job Opening
                </label>
                <select
                    wire:model.live="careerFilter"
                    class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm
                           text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                    <option value="">All Job Openings</option>
                    @foreach($this->getCareersProperty() as $career)
                        <option value="{{ $career->id }}">{{ $career->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Status Filter -->
            <div>
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Application Status
                </label>
                <select
                    wire:model.live="statusFilter"
                    class="block w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm
                           text-slate-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/40 outline-none">
                    <option value="">All Statuses</option>
                    <option value="pending">Pending</option>
                    <option value="reviewed">Reviewed</option>
                    <option value="accepted">Accepted</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
        </div>

        <!-- Desktop Table View -->
        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3">Candidate</th>
                            <th class="px-4 py-3">Contact</th>
                            <th class="px-4 py-3">Applied Job</th>
                            <th class="px-4 py-3">Applied Date</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-right w-48">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($this->getAppliedJobsProperty() as $row)
                            <tr wire:key="app-{{ $row->id }}" class="hover:bg-slate-50/80">
                                <td class="px-4 py-3 text-slate-500">{{ $loop->iteration + ($this->getAppliedJobsProperty()->currentPage() - 1) * 10 }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="h-9 w-9 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold flex items-center justify-center">
                                            <i class="ri-user-3-line text-base text-slate-500"></i>
                                        </div>
                                        <div>
                                            <span class="font-medium text-slate-800 block">{{ $row->full_name }}</span>
                                            <span class="text-xs text-slate-400 block">{{ $row->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-slate-600">
                                    {{ $row->phone ?: 'N/A' }}
                                </td>
                                <td class="px-4 py-3">
                                    <span class="font-medium text-slate-700">
                                        {{ $row->career ? $row->career->title : 'Deleted Position' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-slate-500">
                                    {{ $row->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-4 py-3">
                                    @if($row->status === 'pending')
                                        <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 border border-amber-200 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Pending
                                        </span>
                                    @elseif($row->status === 'reviewed')
                                        <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 border border-blue-200 px-2.5 py-1 text-xs font-semibold text-blue-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-blue-500"></span>
                                            Reviewed
                                        </span>
                                    @elseif($row->status === 'accepted')
                                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 border border-emerald-200 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Accepted
                                        </span>
                                    @elseif($row->status === 'rejected')
                                        <span class="inline-flex items-center gap-1 rounded-full bg-rose-50 border border-rose-200 px-2.5 py-1 text-xs font-semibold text-rose-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-rose-500"></span>
                                            Rejected
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-slate-100 border border-slate-200 px-2.5 py-1 text-xs font-semibold text-slate-600">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            wire:click="viewDetails({{ $row->id }})"
                                            class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                                   text-xs font-medium text-slate-700 hover:bg-slate-100 transition">
                                            <i class="ri-eye-line text-sm"></i>
                                            View
                                        </button>

                                        @if($row->resume_doc)
                                            <button
                                                wire:click="downloadResume({{ $row->id }})"
                                                class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                                       text-xs font-medium text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition">
                                                <i class="ri-download-2-line text-sm"></i>
                                                Resume
                                            </button>
                                        @endif

                                        <button
                                            @click="
                                                $dispatch('open-delete-modal');
                                                $wire.confirmDelete({{ $row->id }})
                                            "
                                            class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2.5 py-1.5
                                                   text-xs font-medium text-rose-600 hover:bg-rose-50 transition">
                                            <i class="ri-delete-bin-6-line text-sm"></i>
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-sm text-slate-500">
                                    No job applications found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mobile Card View -->
        <div class="space-y-3 sm:hidden">
            @forelse($this->getAppliedJobsProperty() as $row)
                <div wire:key="app-card-{{ $row->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $row->full_name }}</p>
                            <p class="mt-0.5 text-xs text-slate-500">{{ $row->career ? $row->career->title : 'Deleted Position' }}</p>
                            <p class="text-[11px] text-slate-400 mt-1">Applied: {{ $row->created_at->format('M d, Y') }}</p>
                        </div>

                        @if($row->status === 'pending')
                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 border border-amber-200 px-2 py-0.5 text-[11px] font-semibold text-amber-700">Pending</span>
                        @elseif($row->status === 'reviewed')
                            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 border border-blue-200 px-2 py-0.5 text-[11px] font-semibold text-blue-700">Reviewed</span>
                        @elseif($row->status === 'accepted')
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 border border-emerald-200 px-2 py-0.5 text-[11px] font-semibold text-emerald-700">Accepted</span>
                        @elseif($row->status === 'rejected')
                            <span class="inline-flex items-center gap-1 rounded-full bg-rose-50 border border-rose-200 px-2 py-0.5 text-[11px] font-semibold text-rose-700">Rejected</span>
                        @endif
                    </div>

                    <div class="mt-3 pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-2">
                        <span class="text-xs text-slate-500">{{ $row->email }}</span>
                        
                        <div class="flex items-center gap-2">
                            <button
                                wire:click="viewDetails({{ $row->id }})"
                                class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2.5 py-1.5
                                       text-xs font-medium text-slate-700 hover:bg-slate-100 transition">
                                <i class="ri-eye-line text-sm"></i>
                                View
                            </button>

                            @if($row->resume_doc)
                                <button
                                    wire:click="downloadResume({{ $row->id }})"
                                    class="inline-flex items-center gap-1 rounded-md border border-slate-200 px-2 py-1
                                           text-xs font-medium text-blue-600 hover:bg-blue-50 hover:border-blue-200 transition">
                                    <i class="ri-download-2-line text-sm"></i>
                                    Resume
                                </button>
                            @endif

                            <button
                                @click="
                                    $dispatch('open-delete-modal');
                                    $wire.confirmDelete({{ $row->id }})
                                "
                                class="inline-flex items-center gap-1 rounded-md border border-rose-200 px-2 py-1
                                       text-xs font-medium text-rose-600 hover:bg-rose-50 transition">
                                <i class="ri-delete-bin-6-line text-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">
                    No job applications found.
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-end">
            {{ $this->getAppliedJobsProperty()->links() }}
        </div>
    </div>

    <!-- Application Details Modal (Premium Center Modal / Slide-over) -->
    <div x-show="detailsOpen" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
        <!-- Backdrop -->
        <div x-show="detailsOpen" 
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="detailsOpen = false; $wire.resetDetails()"
             class="fixed inset-0 bg-black/40 backdrop-blur-sm"></div>

        <!-- Modal Dialog -->
        <div class="flex min-h-screen items-center justify-center p-4">
            <div x-show="detailsOpen"
                 x-transition:enter="transition-transform ease-out duration-300"
                 x-transition:enter-start="scale-95 opacity-0"
                 x-transition:enter-end="scale-100 opacity-100"
                 x-transition:leave="transition-transform ease-in duration-200"
                 x-transition:leave-start="scale-100 opacity-100"
                 x-transition:leave-end="scale-95 opacity-0"
                 class="relative w-full max-w-2xl overflow-hidden rounded-2xl bg-white shadow-2xl transition-all">
                
                @if($selectedApplication)
                    <!-- Modal Header -->
                    <div class="flex items-center justify-between border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">Application Details</h3>
                            <p class="text-xs text-slate-500 mt-0.5">Applied on {{ $selectedApplication->created_at->format('M d, Y \a\t g:i A') }}</p>
                        </div>
                        <button @click="detailsOpen = false; $wire.resetDetails()" class="rounded-lg p-1 text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition">
                            <i class="ri-close-line text-xl"></i>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="px-6 py-6 space-y-6">
                        <!-- Candidate Summary Card -->
                        <div class="flex items-center gap-4 bg-slate-50 p-4 rounded-xl border border-slate-100">
                            <div class="h-12 w-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-lg font-semibold">
                                {{ strtoupper(substr($selectedApplication->full_name, 0, 1)) }}
                            </div>
                            <div>
                                <h4 class="font-semibold text-slate-900 text-base">{{ $selectedApplication->full_name }}</h4>
                                <p class="text-sm text-slate-600 font-medium">Applied for: {{ $selectedApplication->career ? $selectedApplication->career->title : 'Deleted Position' }}</p>
                            </div>
                        </div>

                        <!-- Details Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Email Address</span>
                                <span class="text-sm text-slate-700 mt-0.5 block select-all font-medium">{{ $selectedApplication->email }}</span>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Phone Number</span>
                                <span class="text-sm text-slate-700 mt-0.5 block select-all font-medium">{{ $selectedApplication->phone }}</span>
                            </div>
                            <div class="md:col-span-2">
                                <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Address / Location</span>
                                <span class="text-sm text-slate-700 mt-0.5 block font-medium">{{ $selectedApplication->address ?: 'Not Provided' }}</span>
                            </div>
                        </div>

                        <!-- Resume Section -->
                        @if($selectedApplication->resume_doc)
                            <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <div class="h-10 w-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center">
                                        <i class="ri-file-pdf-line text-xl"></i>
                                    </div>
                                    <div>
                                        <span class="block text-sm font-semibold text-slate-800">Resume Document</span>
                                        <span class="block text-xs text-slate-500">File uploaded by candidate</span>
                                    </div>
                                </div>
                                <button
                                    wire:click="downloadResume({{ $selectedApplication->id }})"
                                    class="inline-flex items-center gap-2 rounded-lg bg-blue-600 hover:bg-blue-700 px-4 py-2 text-xs font-semibold text-white shadow-sm transition">
                                    <i class="ri-download-2-line"></i>
                                    Download Resume
                                </button>
                            </div>
                        @endif

                        <!-- Status Action Area -->
                        <div class="border-t border-slate-100 pt-6">
                            <span class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-3">Update Application Status</span>
                            
                            <div class="flex flex-wrap gap-2">
                                <button
                                    wire:click="updateStatus({{ $selectedApplication->id }}, 'pending')"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-xs font-semibold border transition
                                    {{ $selectedApplication->status === 'pending' 
                                        ? 'bg-amber-500 border-amber-500 text-white shadow-sm' 
                                        : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                                    <span class="h-2 w-2 rounded-full {{ $selectedApplication->status === 'pending' ? 'bg-white' : 'bg-amber-500' }}"></span>
                                    Pending
                                </button>

                                <button
                                    wire:click="updateStatus({{ $selectedApplication->id }}, 'reviewed')"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-xs font-semibold border transition
                                    {{ $selectedApplication->status === 'reviewed' 
                                        ? 'bg-blue-600 border-blue-600 text-white shadow-sm' 
                                        : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                                    <span class="h-2 w-2 rounded-full {{ $selectedApplication->status === 'reviewed' ? 'bg-white' : 'bg-blue-500' }}"></span>
                                    Reviewed
                                </button>

                                <button
                                    wire:click="updateStatus({{ $selectedApplication->id }}, 'accepted')"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-xs font-semibold border transition
                                    {{ $selectedApplication->status === 'accepted' 
                                        ? 'bg-emerald-600 border-emerald-600 text-white shadow-sm' 
                                        : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                                    <span class="h-2 w-2 rounded-full {{ $selectedApplication->status === 'accepted' ? 'bg-white' : 'bg-emerald-500' }}"></span>
                                    Accepted
                                </button>

                                <button
                                    wire:click="updateStatus({{ $selectedApplication->id }}, 'rejected')"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-lg text-xs font-semibold border transition
                                    {{ $selectedApplication->status === 'rejected' 
                                        ? 'bg-rose-600 border-rose-600 text-white shadow-sm' 
                                        : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-50' }}">
                                    <span class="h-2 w-2 rounded-full {{ $selectedApplication->status === 'rejected' ? 'bg-white' : 'bg-rose-500' }}"></span>
                                    Rejected
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end gap-3 border-t border-slate-100 bg-slate-50 px-6 py-4">
                        <button
                            @click="detailsOpen = false; $wire.resetDetails()"
                            class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 transition"
                        >
                            Close
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal (Alpine.js) -->
    <div x-show="deleteOpen" class="fixed inset-0 z-50 overflow-y-auto" x-cloak>
        <!-- Backdrop -->
        <div x-show="deleteOpen"
             x-transition.opacity
             @click="deleteOpen = false"
             class="fixed inset-0 bg-black/40 z-40"
        ></div>

        <!-- Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center px-4">
            <div x-show="deleteOpen"
                 x-transition
                 class="w-full max-w-md rounded-xl bg-white shadow-2xl overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 bg-gray-50 border-b border-slate-100">
                    <h2 class="text-lg font-semibold text-gray-800">
                        Delete Job Application
                    </h2>
                    <button
                        @click="deleteOpen = false"
                        class="text-gray-400 hover:text-gray-600 transition-colors"
                    >
                        <i class="ri-close-line text-xl"></i>
                    </button>
                </div>

                <div class="px-6 py-6 text-sm text-gray-700">
                    Are you sure you want to delete this job application? This will also delete the uploaded resume file.
                    <p class="mt-2 text-xs text-rose-600 font-medium">
                        This action cannot be undone.
                    </p>
                </div>

                <div class="flex justify-end gap-3 px-6 py-4 bg-gray-50 border-t border-slate-100">
                    <button
                        @click="deleteOpen = false"
                        class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 transition"
                    >
                        Cancel
                    </button>

                    <button
                        wire:click="deleteConfirmed"
                        class="rounded-lg bg-rose-600 px-4 py-2 text-sm font-medium text-white hover:bg-rose-500 transition"
                    >
                        Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>