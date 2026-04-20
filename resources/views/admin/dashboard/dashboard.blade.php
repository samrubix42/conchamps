<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-8">

    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-semibold text-slate-900">Dashboard</h1>
            <p class="mt-1 text-sm text-slate-500">
                Overview of your admin data and activity
            </p>
        </div>

        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.projects') }}"
                class="inline-flex items-center gap-2 rounded-lg bg-blue-500 px-4 py-2 text-sm font-medium text-white hover:bg-blue-600">
                <i class="ri-briefcase-4-line"></i>
                Projects
            </a>

            <a href="{{ route('admin.contacts') }}"
                class="inline-flex items-center gap-2 rounded-lg bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-200">
                <i class="ri-mail-line"></i>
                Contacts
            </a>

            <a href="{{ route('admin.settings') }}"
                class="inline-flex items-center gap-2 rounded-lg bg-slate-100 px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-200">
                <i class="ri-settings-3-line"></i>
                Settings
            </a>
        </div>
    </div>

    <!-- Metrics -->
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        @foreach($this->metrics as $metric)
            <div class="rounded-xl bg-white/70 backdrop-blur p-5 shadow-sm">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wide text-slate-500">
                            {{ $metric['label'] }}
                        </p>
                        <p class="mt-3 text-2xl font-semibold text-slate-900">
                            {{ number_format($metric['value']) }}
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-500">
                        {!! $metric['icon'] !!}
                    </div>
                </div>

                <p class="mt-3 text-sm text-slate-500">
                    {{ $metric['description'] }}
                </p>

            </div>
        @endforeach
    </div>

    <!-- Content -->
    <div class="grid gap-6 xl:grid-cols-2">

        <!-- Contacts -->
        <section class="rounded-xl bg-white/70 backdrop-blur p-5 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Recent contacts</h2>
                    <p class="text-sm text-slate-500">Latest messages</p>
                </div>

                <span class="text-xs font-medium text-slate-500">
                    {{ $this->recentContacts->count() }} items
                </span>
            </div>

            <div class="mt-4 space-y-2">
                @forelse($this->recentContacts as $contact)
                    <div class="rounded-lg bg-slate-50 px-4 py-3">

                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-medium text-slate-900">
                                    {{ $contact->name }}
                                </p>
                                <p class="text-xs text-slate-500">
                                    {{ $contact->email ?? 'No email' }}
                                </p>
                            </div>

                            <span class="text-xs px-2 py-1 rounded-md
                                {{ $contact->status ? 'bg-blue-100 text-blue-600' : 'bg-slate-200 text-slate-600' }}">
                                {{ $contact->status ? 'Done' : 'New' }}
                            </span>
                        </div>

                        <p class="mt-2 text-sm text-slate-600">
                            {{ \Illuminate\Support\Str::limit($contact->message, 100) }}
                        </p>

                    </div>
                @empty
                    <p class="text-sm text-slate-400 text-center py-6">
                        No messages yet
                    </p>
                @endforelse
            </div>
        </section>

        <!-- Projects -->
        <section class="rounded-xl bg-white/70 backdrop-blur p-5 shadow-sm">

            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">Recent projects</h2>
                    <p class="text-sm text-slate-500">Latest entries</p>
                </div>

                <span class="text-xs font-medium text-slate-500">
                    {{ $this->recentProjects->count() }} items
                </span>
            </div>

            <div class="mt-4 space-y-2">
                @forelse($this->recentProjects as $project)
                    <div class="rounded-lg bg-slate-50 px-4 py-3">

                        <div class="flex justify-between items-start">
                            <div>
                                <p class="text-sm font-medium text-slate-900">
                                    {{ $project->title }}
                                </p>
                                <p class="text-xs text-slate-500">
                                    {{ $project->category?->title ?? 'Uncategorized' }}
                                </p>
                            </div>

                            <span class="text-xs px-2 py-1 rounded-md
                                {{ $project->status ? 'bg-blue-100 text-blue-600' : 'bg-slate-200 text-slate-600' }}">
                                {{ $project->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                    </div>
                @empty
                    <p class="text-sm text-slate-400 text-center py-6">
                        No projects yet
                    </p>
                @endforelse
            </div>

        </section>

    </div>

</div>