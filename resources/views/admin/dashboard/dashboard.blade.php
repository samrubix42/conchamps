<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-3xl font-semibold text-slate-900">Dashboard</h1>
            <p class="mt-2 text-sm text-slate-500">Quick overview of your Concrete Champs admin data and recent activity.</p>
        </div>

        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.projects') }}" class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800">
                <i class="ri-briefcase-4-line"></i>
                Projects
            </a>
            <a href="{{ route('admin.contacts') }}" class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-200">
                <i class="ri-mail-line"></i>
                Contacts
            </a>
            <a href="{{ route('admin.settings') }}" class="inline-flex items-center gap-2 rounded-xl bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-200">
                <i class="ri-settings-3-line"></i>
                Settings
            </a>
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @foreach($this->metrics as $metric)
            <div class="rounded-3xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-medium uppercase tracking-wide text-slate-500">{{ $metric['label'] }}</p>
                        <p class="mt-4 text-3xl font-semibold text-slate-900">{{ number_format($metric['value']) }}</p>
                    </div>
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-100 text-slate-700">
                        {!! $metric['icon'] !!}
                    </div>
                </div>
                <p class="mt-4 text-sm text-slate-500">{{ $metric['description'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-8 grid gap-6 xl:grid-cols-2">
        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Recent contacts</h2>
                    <p class="mt-1 text-sm text-slate-500">Latest messages from your website visitors.</p>
                </div>
                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-600">{{ $this->recentContacts->count() }} shown</span>
            </div>

            <div class="mt-6 space-y-3">
                @forelse($this->recentContacts as $contact)
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                            <div class="space-y-1">
                                <p class="text-sm font-semibold text-slate-900">{{ $contact->name }}</p>
                                <p class="text-sm text-slate-500">{{ $contact->email ?? 'No email' }} · {{ $contact->phone ?? 'No phone' }}</p>
                            </div>
                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $contact->status ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                {{ $contact->status ? 'Responded' : 'New' }}
                            </span>
                        </div>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ \Illuminate\Support\Str::limit($contact->message, 120) }}</p>
                    </div>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 p-6 text-center text-sm text-slate-500">No recent contact messages yet.</div>
                @endforelse
            </div>
        </section>

        <section class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-slate-900">Recent projects</h2>
                    <p class="mt-1 text-sm text-slate-500">Newest projects added to the portfolio.</p>
                </div>
                <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-slate-600">{{ $this->recentProjects->count() }} shown</span>
            </div>

            <div class="mt-6 space-y-3">
                @forelse($this->recentProjects as $project)
                    <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">{{ $project->title }}</p>
                                <p class="mt-1 text-sm text-slate-500">{{ $project->category?->title ?? 'Uncategorized' }}</p>
                            </div>
                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $project->status ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                {{ $project->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        @if($project->address)
                            <p class="mt-3 text-sm text-slate-600">{{ $project->address }}</p>
                        @endif
                    </div>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50 p-6 text-center text-sm text-slate-500">No recent projects found.</div>
                @endforelse
            </div>
        </section>
    </div>
</div>