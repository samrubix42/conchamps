<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <div class="mb-6">
        <h1 class="text-xl font-semibold text-slate-900">
            Contact List
        </h1>
        <p class="mt-1 text-sm text-slate-500">
            Manage project inquiries from your contact page.
        </p>
    </div>

    <div class="space-y-4">
        <div class="w-full sm:max-w-sm">
                <label class="block text-xs font-medium text-slate-500 mb-1">
                    Search Contacts
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

        <div class="hidden sm:block overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr class="text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-4 py-3 w-12">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Company</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Phone</th>
                            <th class="px-4 py-3">Project Type</th>
                            <th class="px-4 py-3">Message</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 bg-white">
                        @forelse($this->getContactsProperty() as $contact)
                            <tr wire:key="contact-{{ $contact->id }}" class="hover:bg-slate-50/80">
                                <td class="px-4 py-3 text-slate-500">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">
                                    <p class="font-medium text-slate-800">{{ $contact->name }}</p>
                                </td>
                                <td class="px-4 py-3 text-slate-600">{{ $contact->company ?: '-' }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ $contact->email ?: '-' }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ $contact->phone ?: '-' }}</td>
                                <td class="px-4 py-3 text-slate-600">{{ $contact->project_type ?: '-' }}</td>
                                <td class="px-4 py-3 text-slate-600 max-w-xs truncate" title="{{ $contact->message }}">{{ $contact->message }}</td>
                                <td class="px-4 py-3">
                                    @if($contact->status)
                                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                            Read
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-700">
                                            <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                            Unread
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-8 text-center text-sm text-slate-500">No contacts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="space-y-3 sm:hidden">
            @forelse($this->getContactsProperty() as $contact)
                <div wire:key="contact-card-{{ $contact->id }}" class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <div class="flex items-start justify-between gap-3">
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $contact->name }}</p>
                            <p class="text-xs text-slate-500">{{ $contact->company ?: '-' }}</p>
                            <p class="text-xs text-slate-500">{{ $contact->email ?: '-' }}</p>
                            <p class="text-xs text-slate-500">{{ $contact->phone ?: '-' }}</p>
                        </div>
                        @if($contact->status)
                            <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-2 py-0.5 text-[11px] font-semibold text-emerald-700">Read</span>
                        @else
                            <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2 py-0.5 text-[11px] font-semibold text-amber-700">Unread</span>
                        @endif
                    </div>

                    <p class="mt-2 text-xs text-slate-600">{{ $contact->project_type ?: '-' }}</p>
                    <p class="mt-2 text-xs text-slate-600 wrap-break-word">{{ $contact->message }}</p>
                </div>
            @empty
                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-6 text-center text-sm text-slate-500">No contacts found.</div>
            @endforelse
        </div>

        <div class="mt-3 flex justify-end">
            {{ $this->getContactsProperty()->links() }}
        </div>
    </div>
</div>