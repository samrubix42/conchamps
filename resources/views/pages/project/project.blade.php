@section('meta_title', 'Projects')
@section('meta_description', 'Browse the Concrete Champs project portfolio, showcasing industrial, commercial, and infrastructure work executed with structural precision.')

<div class="bg-background text-on-surface font-body overflow-x-hidden">
    <section class="relative overflow-hidden min-h-[46vh] sm:min-h-[52vh] flex items-center">
        <img src="{{ asset('building/illustration-construction-site.webp') }}" alt="Concrete Champs Projects" class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-slate-950/58 to-slate-950/30"></div>

        <div class="container-custom relative z-10 py-20 md:py-24">
            <p class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.16em] font-semibold text-white">
                <i class="ri-building-line"></i> Portfolio
            </p>
            <h1 class="mt-4 text-white text-3xl sm:text-5xl lg:text-7xl leading-[0.95] uppercase max-w-4xl">Projects Built To Perform For Decades</h1>
            <p class="mt-5 max-w-2xl text-white/85 text-sm sm:text-base lg:text-lg leading-7">
                Explore a sample of our structural engineering and construction work across industrial, commercial, and infrastructure environments.
            </p>
        </div>
    </section>

    <section
        class="section bg-surface border-y border-border"
        x-data="{
            activeFilter: 'all',
            isSwitching: false,
            filters: @js($filters),
            projects: @js($projects),
            switchFilter(nextFilter) {
                if (this.isSwitching || this.activeFilter === nextFilter) return;

                this.isSwitching = true;

                setTimeout(() => {
                    this.activeFilter = nextFilter;

                    this.$nextTick(() => {
                        setTimeout(() => {
                            this.isSwitching = false;
                        }, 70);
                    });
                }, 180);
            },
            filteredProjects() {
                if (this.activeFilter === 'all') return this.projects;
                return this.projects.filter((item) => item.filter === this.activeFilter);
            }
        }"
    >
        <div class="container-custom">
            <div class="relative mb-8 sm:mb-10 lg:mb-12 flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 lg:gap-8">
                <div>
                    <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                        <i class="ri-layout-grid-line"></i> Selected Work
                    </span>
                    <h2 class="mt-3 text-4xl sm:text-5xl lg:text-6xl uppercase text-primary relative z-10">Built Environments</h2>
                </div>

                <div class="flex flex-nowrap lg:flex-wrap overflow-x-auto pb-1 no-scrollbar items-center gap-3 sm:gap-4 text-[11px] sm:text-xs font-medium text-primary/90">
                    <template x-for="item in filters" :key="item.value">
                        <button
                            @click="switchFilter(item.value)"
                            class="rounded-full border px-4 py-2 transition-all"
                            :class="activeFilter === item.value ? 'border-secondary bg-secondary text-white' : 'border-border bg-white hover:border-secondary hover:text-secondary'"
                            x-text="item.label"
                        ></button>
                    </template>
                </div>
            </div>

            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-5 transition-all duration-300"
                :class="isSwitching ? 'opacity-0 translate-y-3 scale-[0.985]' : 'opacity-100 translate-y-0 scale-100'"
            >
                <template x-for="(project, index) in filteredProjects()" :key="`${activeFilter}-${index}-${project.title}`">
                    <article
                        x-transition:enter="transition ease-out duration-400"
                        x-transition:enter-start="opacity-0 translate-y-4 scale-[0.98]"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-250"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-[0.98]"
                        :style="`transition-delay: ${Math.min(index * 60, 220)}ms`"
                        class="group rounded-2xl border border-border overflow-hidden bg-white shadow-[0_12px_32px_rgba(15,23,42,0.06)]"
                    >
                        <div class="overflow-hidden">
                            <img :src="project.image" :alt="project.title" class="w-full h-56 sm:h-60 lg:h-[220px] object-cover transition-transform duration-500 group-hover:scale-[1.04]" />
                        </div>
                        <div class="p-5">
                            <span class="project-category-chip" x-text="project.category"></span>
                            <h3 class="mt-3 text-2xl leading-7 text-primary font-headline" x-text="project.title"></h3>
                            <p class="mt-2 text-sm text-muted inline-flex items-center gap-2"><i class="ri-map-pin-2-line text-secondary"></i><span x-text="project.location"></span></p>
                        </div>
                    </article>
                </template>
            </div>

            <div x-show="filteredProjects().length === 0" class="mt-4 rounded-xl border border-dashed border-border bg-white px-5 py-8 text-center text-sm text-muted">
                No active projects available right now.
            </div>
        </div>
    </section>

    <section class="section bg-surface-2 border-y border-border">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                <div class="lg:col-span-6 rounded-3xl overflow-hidden border border-border shadow-[0_20px_45px_rgba(15,23,42,0.12)]">
                    <img src="{{ $featuredProject['image'] ?? 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?q=80&w=1974&auto=format&fit=crop' }}" alt="Featured project" class="w-full h-72 md:h-[440px] object-cover" />
                </div>

                <div class="lg:col-span-6">
                    <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                        <i class="ri-star-line"></i> Featured Case Study
                    </span>
                    <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary">{{ $featuredProject['title'] ?? 'Metrolink Operations Center' }}</h2>
                    <p class="mt-5 text-sm sm:text-base text-muted leading-7">
                        {{ $featuredProject['description'] ?? 'A phased delivery involving structural retrofitting, concrete reinforcement, and high-traffic operational constraints. Completed with zero safety incidents and ahead of milestone schedule.' }}
                    </p>

                    <div class="mt-7 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="rounded-2xl border border-border bg-white p-4">
                            <p class="text-2xl font-headline text-primary">210K</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted">SQ FT Upgraded</p>
                        </div>
                        <div class="rounded-2xl border border-border bg-white p-4">
                            <p class="text-2xl font-headline text-primary">11 Mo</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted">Delivery Window</p>
                        </div>
                        <div class="rounded-2xl border border-border bg-white p-4">
                            <p class="text-2xl font-headline text-primary">0</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted">Safety Incidents</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-surface">
        <div class="container-custom">
            <div class="max-w-3xl mb-10 md:mb-12">
                <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                    <i class="ri-settings-4-line"></i> Project Workflow
                </span>
                <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary">How We Deliver Results</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 md:gap-6">
                <div class="card">
                    <div class="card-icon"><i class="ri-search-eye-line"></i></div>
                    <h3 class="text-xl uppercase text-primary">Scope Audit</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Analyze constraints, constructability, and critical path before mobilization.</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="ri-draft-line"></i></div>
                    <h3 class="text-xl uppercase text-primary">Execution Plan</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Define method statements, sequencing, procurement, and quality gates.</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="ri-hard-drive-3-line"></i></div>
                    <h3 class="text-xl uppercase text-primary">Field Control</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Maintain traceable quality records and live delivery visibility on site.</p>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="ri-checkbox-circle-line"></i></div>
                    <h3 class="text-xl uppercase text-primary">Handover</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Deliver documented closeout packages and post-completion support.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-surface-2 border-t border-border">
        <div class="container-custom">
            <div class="cta-shell rounded-3xl p-7 sm:p-10 md:p-12 lg:p-14 relative overflow-hidden">
                <div class="absolute -top-28 -right-16 h-72 w-72 rounded-full bg-secondary/30 blur-3xl"></div>
                <div class="absolute -bottom-24 -left-16 h-72 w-72 rounded-full bg-accent/30 blur-3xl"></div>

                <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div class="max-w-3xl">
                        <span class="cta-kicker"><i class="ri-flashlight-line text-white"></i> Start Your Project</span>
                        <h2 class="mt-4 text-white text-3xl sm:text-4xl lg:text-5xl uppercase leading-[0.95]">Need A Team That Delivers Predictably?</h2>
                        <p class="mt-4 text-white/80 text-sm sm:text-base leading-7">Share your scope and target timeline. We will provide a delivery roadmap and budget guidance.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <a href="{{ route('contact') }}" wire:navigate class="btn-primary w-full sm:w-auto !py-2.5  !bg-white !text-zinc-800 !border-0 hover:!bg-zinc-100"><i class="ri-send-plane-line !text-zinc-800"></i> Contact Us</a>
                        <a href="{{ route('about') }}" wire:navigate class="btn-secondary w-full sm:w-auto !py-2.5 !bg-white !text-zinc-800 !border-white hover:!bg-zinc-100"><i class="ri-team-line !text-zinc-800"></i> About Team</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>