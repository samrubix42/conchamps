@section('meta_title', 'Careers')
@section('meta_description', "Explore open positions and join the professional concrete and structural engineering team at Concrete Champs.")

<div class="bg-background text-on-surface font-body overflow-x-hidden">
    <!-- Hero Banner -->
    <section class="relative overflow-hidden min-h-[44vh] sm:min-h-[50vh] flex items-center">
        <img src="{{ asset('images/careers_hero.png') }}" alt="Join Concrete Champs" class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-linear-to-r from-slate-950/82 via-slate-950/60 to-slate-950/32"></div>

        <div class="container-custom relative z-10 py-20 md:py-24">
            <p class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.16em] font-semibold text-white">
                <i class="ri-briefcase-line"></i> Careers
            </p>
            <h1 class="mt-4 text-white text-3xl sm:text-5xl lg:text-7xl leading-[0.95] uppercase max-w-4xl">Join The Champs Team</h1>
            <p class="mt-5 max-w-2xl text-white/85 text-sm sm:text-base lg:text-lg leading-7">
                Grow your skills with engineering precision and high-standard construction project execution. Explore open opportunities below.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="section bg-slate-50 py-12 sm:py-16 md:py-20 border-t border-border">
        <div class="container-custom">
            @php
                $careersList = $this->getCareersProperty();
                $selectedCareer = $this->getSelectedCareerProperty();
            @endphp

            @if($careersList->isEmpty())
                <!-- Empty State -->
                <div class="max-w-xl mx-auto text-center py-16 bg-white rounded-3xl border border-border p-8 shadow-[0_12px_32px_rgba(15,23,42,0.04)]">
                    <div class="inline-flex h-16 w-16 items-center justify-center rounded-full bg-blue-50 text-blue-600 mb-6">
                        <i class="ri-briefcase-line text-3xl"></i>
                    </div>
                    <h2 class="text-2xl font-headline uppercase text-primary">No Open Positions</h2>
                    <p class="mt-3 text-sm text-slate-500 leading-6">
                        We don't have any active openings at this moment. However, we are always looking for exceptional talent! Feel free to send your resume and general inquiry to our team.
                    </p>
                    <a href="{{ route('contact') }}" class="btn-primary mt-6 inline-flex items-center gap-2 uppercase tracking-wider text-xs">
                        <i class="ri-mail-line"></i>
                        Contact Us
                    </a>
                </div>
            @else
                <!-- Active Careers Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
                    <!-- Left Side: Jobs List -->
                    <div class="lg:col-span-4 space-y-4">
                        <h3 class="text-xs uppercase tracking-[0.2em] font-semibold text-secondary flex items-center gap-2 mb-2">
                            <i class="ri-list-check-3"></i> Open Positions ({{ $careersList->count() }})
                        </h3>

                        <div class="space-y-3 max-h-[75vh] overflow-y-auto pr-2 no-scrollbar">
                            @foreach($careersList as $career)
                                <button
                                    type="button"
                                    wire:click="selectCareer({{ $career->id }})"
                                    class="w-full text-left p-5 rounded-2xl border transition-all duration-300 bg-white
                                           {{ $selectedCareerId === $career->id
                                               ? 'border-blue-600 ring-2 ring-blue-600/10 shadow-md'
                                               : 'border-slate-200 hover:border-slate-300 hover:shadow-sm' }}"
                                >
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <h4 class="font-headline uppercase text-lg leading-tight text-primary">
                                                {{ $career->title }}
                                            </h4>
                                            <div class="mt-2 flex flex-wrap gap-x-4 gap-y-1.5 text-xs text-slate-500">
                                                <span class="inline-flex items-center gap-1">
                                                    <i class="ri-map-pin-2-line"></i>
                                                    {{ $career->location ?: 'Anywhere' }}
                                                </span>
                                                <span class="inline-flex items-center gap-1">
                                                    <i class="ri-time-line"></i>
                                                    {{ $career->type ?: 'Full-time' }}
                                                </span>
                                            </div>
                                        </div>
                                        <i class="ri-arrow-right-s-line text-slate-400 text-lg"></i>
                                    </div>
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <!-- Right Side: Job details & form -->
                    <div class="lg:col-span-8">
                        @if($selectedCareer)
                            <div class="rounded-3xl border border-border bg-white p-6 sm:p-8 md:p-10 shadow-[0_18px_40px_rgba(15,23,42,0.04)]">
                                <!-- Title Header -->
                                <div class="border-b border-slate-100 pb-6 mb-6">
                                    <h2 class="text-3xl font-headline uppercase text-primary">{{ $selectedCareer->title }}</h2>
                                    
                                    <div class="mt-4 flex flex-wrap gap-4 text-sm text-slate-600">
                                        <div class="inline-flex items-center gap-1.5 bg-slate-100 px-3 py-1.5 rounded-lg">
                                            <i class="ri-map-pin-line text-secondary"></i>
                                            <span><strong>Location:</strong> {{ $selectedCareer->location ?: 'N/A' }}</span>
                                        </div>
                                        <div class="inline-flex items-center gap-1.5 bg-slate-100 px-3 py-1.5 rounded-lg">
                                            <i class="ri-briefcase-line text-secondary"></i>
                                            <span><strong>Type:</strong> {{ $selectedCareer->type ?: 'N/A' }}</span>
                                        </div>
                                        <div class="inline-flex items-center gap-1.5 bg-slate-100 px-3 py-1.5 rounded-lg">
                                            <i class="ri-history-line text-secondary"></i>
                                            <span><strong>Experience:</strong> {{ $selectedCareer->experience ?: 'N/A' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Rich Text Description -->
                                <div class="prose max-w-none text-slate-600 leading-8">
                                    {!! $selectedCareer->description !!}
                                </div>

                                <!-- Application Form Section -->
                                <div class="mt-10 pt-8 border-t border-slate-100">
                                    <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                                        <i class="ri-file-list-3-line"></i> Apply Now
                                    </span>
                                    <h3 class="mt-2 text-2xl uppercase text-primary">Submit Your Application</h3>
                                    <p class="mt-1 text-sm text-slate-500 mb-6">Interested in this role? Fill in the details below and attach your resume.</p>

                                    @if (session('message'))
                                        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700 inline-flex items-start gap-3 w-full">
                                            <i class="ri-checkbox-circle-line mt-0.5 text-lg text-emerald-600"></i>
                                            <span>{{ session('message') }}</span>
                                        </div>
                                    @endif

                                    <form wire:submit="apply" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <!-- Full Name -->
                                        <div>
                                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Full Name *</label>
                                            <input wire:model.defer="full_name" type="text" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/35" placeholder="Jane Cooper" />
                                            @error('full_name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <!-- Email -->
                                        <div>
                                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Email Address *</label>
                                            <input wire:model.defer="email" type="email" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/35" placeholder="jane@example.com" />
                                            @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <!-- Phone -->
                                        <div>
                                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Phone Number *</label>
                                            <input wire:model.defer="phone" type="tel" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/35" placeholder="+1 (555) 000-0000" />
                                            @error('phone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <!-- Address -->
                                        <div>
                                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Current Address</label>
                                            <input wire:model.defer="address" type="text" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/35" placeholder="e.g. Austin, TX" />
                                            @error('address') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <!-- Resume Upload -->
                                        <div class="sm:col-span-2">
                                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Attach Resume * (PDF, DOC, DOCX up to 10MB)</label>
                                            
                                            <div class="mt-2 flex items-center justify-center w-full">
                                                <label class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-slate-300 rounded-xl cursor-pointer bg-slate-50 hover:bg-slate-100 transition-colors">
                                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                        <i class="ri-upload-cloud-2-line text-3xl text-slate-400 mb-2"></i>
                                                        <p class="text-sm text-slate-600 font-semibold">
                                                            @if($resume)
                                                                {{ $resume->getClientOriginalName() }}
                                                            @else
                                                                Click to upload resume
                                                            @endif
                                                        </p>
                                                        <p class="text-xs text-slate-400 mt-1">PDF, DOC, DOCX (Max 10MB)</p>
                                                    </div>
                                                    <input wire:model="resume" type="file" class="hidden" accept=".pdf,.doc,.docx" />
                                                </label>
                                            </div>

                                            <div wire:loading wire:target="resume" class="mt-2 inline-flex items-center gap-2 text-xs font-semibold text-blue-600">
                                                <i class="ri-loader-4-line animate-spin"></i>
                                                Uploading resume...
                                            </div>
                                            @error('resume') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="sm:col-span-2 pt-4">
                                            <button
                                                type="submit"
                                                wire:loading.attr="disabled"
                                                wire:target="apply, resume"
                                                class="btn-primary w-full sm:w-auto disabled:opacity-75 disabled:cursor-not-allowed"
                                            >
                                                <i wire:loading.remove wire:target="apply" class="ri-checkbox-circle-line"></i>
                                                <i wire:loading wire:target="apply" class="ri-loader-4-line animate-spin"></i>
                                                <span wire:loading.remove wire:target="apply">Submit Application</span>
                                                <span wire:loading wire:target="apply">Submitting...</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="rounded-3xl border border-dashed border-slate-300 bg-white p-12 text-center text-slate-400 shadow-sm">
                                <i class="ri-cursor-line text-4xl mb-4 block"></i>
                                <p class="text-sm font-semibold">Select a position from the left to view details and apply.</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>