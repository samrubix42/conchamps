<div class="bg-background text-on-surface font-body overflow-x-hidden">
    <section
        x-data="{
            activeSlide: 0,
            slides: [
                {
                    image: 'https://images.unsplash.com/photo-1541888086422-482bc6db1ce0?q=80&w=2070&auto=format&fit=crop',
                    subtitle: 'Engineered for Strength',
                    title1: 'BUILD SMART',
                    highlight: 'BUILD BOLD',
                    title2: 'BUILD MODERN'
                },
                {
                    image: 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=2071&auto=format&fit=crop',
                    subtitle: 'Precision Construction',
                    title1: 'FROM PLAN',
                    highlight: 'TO STRUCTURE',
                    title2: 'WITHOUT DELAY'
                }
            ],
            init() {
                setInterval(() => {
                    this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                }, 6000);
            }
        }"
        class="relative min-h-[92vh] sm:min-h-screen flex items-center overflow-hidden"
    >
        <template x-for="(slide, index) in slides" :key="index">
            <div class="absolute inset-0 transition-opacity duration-1000" :class="activeSlide === index ? 'opacity-100' : 'opacity-0 z-[-1]'">
                <img :src="slide.image" class="w-full h-full object-cover transition-transform duration-[9000ms] ease-linear" :class="activeSlide === index ? 'scale-110' : 'scale-100'" alt="Hero background" />
                <div class="absolute inset-0 hero-overlay"></div>
            </div>
        </template>

        <div class="container-custom relative z-10 pt-28 sm:pt-32 pb-16 sm:pb-20">
            <template x-for="(slide, index) in slides" :key="`content-${index}`">
                <div
                    x-show="activeSlide === index"
                    x-transition:enter="transition ease-out duration-700"
                    x-transition:enter-start="opacity-0 translate-y-8"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="max-w-5xl mx-auto text-center px-4 sm:px-6"
                >
                    <span class="hero-glass inline-flex items-center gap-2 text-white px-4 py-1.5 rounded-full text-[11px] sm:text-xs uppercase tracking-[0.16em] font-semibold">
                        <i class="ri-compasses-2-line"></i>
                        <span x-text="slide.subtitle"></span>
                    </span>

                    <h1 class="mt-5 uppercase leading-[0.95] text-white drop-shadow-[0_8px_20px_rgba(2,6,23,0.35)]">
                        <span class="hero-title-line delay-1 block text-4xl sm:text-5xl md:text-7xl lg:text-[5.5rem] font-semibold" x-text="slide.title1"></span>
                        <span class="hero-title-line delay-2 block text-4xl sm:text-5xl md:text-7xl lg:text-[5.3rem] gradient-text font-semibold py-1" x-text="slide.highlight"></span>
                        <span class="hero-title-line delay-3 block text-4xl sm:text-5xl md:text-7xl lg:text-[5.5rem] font-semibold" x-text="slide.title2"></span>
                    </h1>

                    <p class="mt-6 text-sm sm:text-base md:text-lg text-white/85 max-w-2xl mx-auto">
                        We help developers, architects, and contractors ship landmark projects faster with stronger engineering systems.
                    </p>

                    <div class="mt-8 flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                        <button class="btn-primary">
                            <i class="ri-hammer-line"></i>
                            Explore Services
                        </button>
                        <button class="btn-secondary hero-btn-ghost">
                            <i class="ri-building-3-line"></i>
                            View Projects
                        </button>
                    </div>
                </div>
            </template>
        </div>

        <div class="absolute inset-x-0 bottom-7 z-20">
            <div class="container-custom flex items-center justify-center gap-2 mb-4">
                <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length" class="hero-nav-btn"><i class="ri-arrow-left-s-line"></i></button>
                <template x-for="(slide, idx) in slides" :key="`hero-dot-${idx}`">
                    <button
                        @click="activeSlide = idx"
                        class="h-2.5 rounded-full transition-all duration-300"
                        :class="activeSlide === idx ? 'w-8 bg-secondary' : 'w-2.5 bg-white/60'"
                    ></button>
                </template>
                <button @click="activeSlide = (activeSlide + 1) % slides.length" class="hero-nav-btn"><i class="ri-arrow-right-s-line"></i></button>
            </div>
        </div>

        <div class="absolute bottom-3 left-1/2 -translate-x-1/2 text-center text-white/75">
            <i class="ri-mouse-line text-xl"></i>
            <p class="text-[11px] uppercase tracking-[0.16em] mt-1">Scroll</p>
        </div>
    </section>

    <section class="section stats-surface border-y border-border blueprint-grid">
        <div class="container-custom grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <div class="stats-card">
                <div class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-secondary/10 text-secondary mb-3"><i class="ri-building-4-line"></i></div>
                <p class="stat-number">1.2M <span class="stat-highlight">SQ FT</span></p>
                <p class="stat-label mt-3">Built With Quality</p>
            </div>
            <div class="stats-card">
                <div class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-secondary/10 text-secondary mb-3"><i class="ri-hammer-line"></i></div>
                <p class="stat-number">450+ <span class="stat-highlight">Projects</span></p>
                <p class="stat-label mt-3">Delivered On Time</p>
            </div>
            <div class="stats-card">
                <div class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-secondary/10 text-secondary mb-3"><i class="ri-award-line"></i></div>
                <p class="stat-number">98% <span class="stat-highlight">Repeat</span></p>
                <p class="stat-label mt-3">Client Retention</p>
            </div>
            <div class="stats-card">
                <div class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-secondary/10 text-secondary mb-3"><i class="ri-customer-service-2-line"></i></div>
                <p class="stat-number">24/7 <span class="stat-highlight">Support</span></p>
                <p class="stat-label mt-3">Site Coordination</p>
            </div>
        </div>
    </section>

    <section class="section bg-surface">
        <div class="container-custom">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5 mb-10 md:mb-12">
                <div>
                    <span class="text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold inline-flex items-center gap-2"><i class="ri-settings-4-line"></i> What We Do</span>
                    <h2 class="text-3xl sm:text-4xl lg:text-6xl uppercase text-primary mt-3">Core Services</h2>
                </div>
                <p class="text-muted max-w-xl text-sm sm:text-base leading-7">From structural analysis to execution planning, we combine technical rigor with practical speed.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 md:gap-6">
                <article class="card">
                    <div class="card-icon"><i class="ri-building-4-line"></i></div>
                    <h3 class="text-2xl uppercase text-primary">Structural Engineering</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Performance-first designs for towers, bridges, campuses, and mission-critical facilities.</p>
                    <a href="#" class="inline-flex items-center gap-2 text-secondary font-semibold mt-5">Learn More <i class="ri-arrow-right-line"></i></a>
                </article>

                <article class="card">
                    <div class="card-icon"><i class="ri-tools-line"></i></div>
                    <h3 class="text-2xl uppercase text-primary">Concrete Execution</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Advanced mixes and precision pouring workflows that reduce risk and increase lifespan.</p>
                    <a href="#" class="inline-flex items-center gap-2 text-secondary font-semibold mt-5">Learn More <i class="ri-arrow-right-line"></i></a>
                </article>

                <article class="card md:col-span-2 xl:col-span-1">
                    <div class="card-icon"><i class="ri-ruler-2-line"></i></div>
                    <h3 class="text-2xl uppercase text-primary">Architectural Modeling</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Detailed BIM and feasibility plans that keep design intent aligned with site realities.</p>
                    <a href="#" class="inline-flex items-center gap-2 text-secondary font-semibold mt-5">Learn More <i class="ri-arrow-right-line"></i></a>
                </article>
            </div>
        </div>
    </section>

    <section class="section bg-surface-2 border-y border-border relative overflow-hidden">
        <div class="absolute -top-24 -right-20 h-72 w-72 rounded-full bg-secondary/12 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-20 h-72 w-72 rounded-full bg-primary/10 blur-3xl"></div>

        <div class="container-custom relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <div>
                    <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm font-semibold uppercase tracking-[0.2em]">
                        <i class="ri-team-line"></i> Who Are We
                    </span>
                    <h2 class="mt-3 text-3xl sm:text-4xl lg:text-6xl uppercase text-primary leading-[0.95]">
                        Built By Engineers, Trusted By Builders
                    </h2>
                    <p class="mt-6 text-muted text-sm sm:text-base leading-7 max-w-xl">
                        We are a multidisciplinary construction and structural engineering team focused on predictable delivery, design clarity, and field-ready execution. From planning to pour day, we operate as one accountable partner.
                    </p>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="bg-white rounded-2xl border border-border p-4 sm:p-5">
                            <p class="text-3xl font-headline text-primary">18+ Years</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted">Industry Experience</p>
                        </div>
                        <div class="bg-white rounded-2xl border border-border p-4 sm:p-5">
                            <p class="text-3xl font-headline text-primary">450+ Sites</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted">Successfully Delivered</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 sm:gap-5">
                    <div class="col-span-2 rounded-3xl overflow-hidden border border-border shadow-[0_20px_45px_rgba(15,23,42,0.12)]">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=2070&auto=format&fit=crop" alt="Construction team discussion" class="w-full h-56 sm:h-72 object-cover" />
                    </div>
                    <div class="rounded-2xl bg-white border border-border p-5">
                        <i class="ri-shield-check-line text-2xl text-secondary"></i>
                        <h3 class="mt-3 text-xl uppercase text-primary">Safety First</h3>
                        <p class="mt-2 text-sm text-muted leading-6">Clear site standards and proactive quality checks in every phase.</p>
                    </div>
                    <div class="rounded-2xl bg-white border border-border p-5">
                        <i class="ri-timer-line text-2xl text-secondary"></i>
                        <h3 class="mt-3 text-xl uppercase text-primary">On-Time Culture</h3>
                        <p class="mt-2 text-sm text-muted leading-6">Planning discipline that keeps milestones on schedule.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section
        class="section bg-[#f3f4f6] border-y border-[#e6e9ef]"
        x-data="{
            activeFilter: 'all',
            filters: [
                { label: 'Show All', value: 'all' },
                { label: 'Interior', value: 'interior' },
                { label: 'Recent', value: 'recent' },
                { label: 'Big Building', value: 'big-building' },
                { label: 'Park', value: 'park' }
            ],
            projects: [
                { title: 'Floride Chemicals', category: 'Factory', filter: 'big-building', image: '{{ asset('images/project1.png') }}' },
                { title: 'Floride Chemicals', category: 'Factory', filter: 'interior', image: '{{ asset('images/project2.png') }}' },
                { title: 'Floride Chemicals', category: 'Factory', filter: 'recent', image: '{{ asset('images/project3.png') }}' },
                { title: 'Floride Chemicals', category: 'Factory', filter: 'park', image: '{{ asset('images/project1.png') }}' },
                { title: 'Floride Chemicals', category: 'Factory', filter: 'interior', image: '{{ asset('images/project2.png') }}' },
                { title: 'Floride Chemicals', category: 'Factory', filter: 'big-building', image: '{{ asset('images/project3.png') }}' }
            ],
            filteredProjects() {
                if (this.activeFilter === 'all') return this.projects;
                return this.projects.filter((item) => item.filter === this.activeFilter);
            }
        }"
    >
        <div class="container-custom">
            <div class="relative mb-8 sm:mb-10 lg:mb-12 flex flex-col lg:flex-row lg:items-end lg:justify-between gap-4 lg:gap-8">
                <div>
                    <h2 class="text-4xl sm:text-5xl lg:text-6xl uppercase text-primary relative z-10">Our Projects</h2>
                    <p class="hidden lg:block absolute -top-6 left-36 text-[5.5rem] font-headline uppercase tracking-tight text-primary/5 select-none">Gallery</p>
                </div>

                <div class="flex flex-wrap items-center gap-4 sm:gap-6 text-[11px] sm:text-xs font-medium text-primary/85 lg:justify-end">
                    <template x-for="item in filters" :key="item.value">
                        <button
                            @click="activeFilter = item.value"
                            class="transition-colors"
                            :class="activeFilter === item.value ? 'text-secondary' : 'hover:text-secondary'"
                            x-text="item.label"
                        ></button>
                    </template>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-5">
                <template x-for="(project, index) in filteredProjects()" :key="`${activeFilter}-${index}-${project.image}`">
                    <article
                        x-transition:enter="transition ease-out duration-400"
                        x-transition:enter-start="opacity-0 translate-y-4 scale-[0.98]"
                        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                        x-transition:leave="transition ease-in duration-250"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-[0.98]"
                        class="group bg-[#eceff3]"
                    >
                        <div class="overflow-hidden">
                            <img :src="project.image" :alt="`${project.title} ${project.category}`" class="w-full h-64 sm:h-60 lg:h-[220px] object-cover transition-transform duration-500 group-hover:scale-[1.04]" />
                        </div>
                        <div class="px-2.5 py-2.5">
                            <h3 class="text-[22px] leading-6 text-primary font-headline" x-text="project.title"></h3>
                            <p class="text-[22px] leading-6 text-primary font-headline" x-text="project.category"></p>
                        </div>
                    </article>
                </template>
            </div>
        </div>
    </section>

    <section
        class="section bg-surface"
        x-data="{
            current: 0,
            testimonials: [
                {
                    quote: 'Concrete Champs brought technical clarity from day one. We cut rework dramatically and still accelerated delivery.',
                    name: 'Ariana Walsh',
                    role: 'Project Director, Horizon Developments',
                    company: 'Horizon Developments',
                    initials: 'AW'
                },
                {
                    quote: 'Their site team communicates fast, documents every change, and executes with almost zero surprises.',
                    name: 'Mark Rios',
                    role: 'Operations Lead, Northline Infrastructure',
                    company: 'Northline Infrastructure',
                    initials: 'MR'
                },
                {
                    quote: 'The quality benchmark they maintain has become our internal standard across all new projects.',
                    name: 'Janelle Brooks',
                    role: 'Senior Architect, Axis Studio',
                    company: 'Axis Studio',
                    initials: 'JB'
                }
            ],
            next() {
                this.current = (this.current + 1) % this.testimonials.length;
            },
            prev() {
                this.current = (this.current - 1 + this.testimonials.length) % this.testimonials.length;
            },
            init() {
                setInterval(() => this.next(), 5000);
            }
        }"
    >
        <div class="container-custom">
            <div class="max-w-5xl mx-auto text-center mb-10">
                <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                    <i class="ri-chat-quote-line"></i> Testimonials
                </span>
                <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary">What Clients Say</h2>
            </div>

            <div class="relative overflow-hidden rounded-3xl border border-border bg-white shadow-[0_18px_45px_rgba(15,23,42,0.08)] p-6 sm:p-8 md:p-10 lg:p-12 max-w-5xl mx-auto">
                <div class="absolute -top-20 -right-20 h-56 w-56 rounded-full bg-secondary/10 blur-3xl"></div>

                <div class="relative min-h-[220px] sm:min-h-[190px]">
                    <template x-for="(item, index) in testimonials" :key="index">
                        <div
                            x-show="current === index"
                            x-transition:enter="transition ease-out duration-450"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="space-y-6 text-center"
                        >
                            <i class="ri-double-quotes-l text-4xl text-secondary/80 block"></i>
                            <p class="text-primary text-lg sm:text-xl md:text-2xl leading-relaxed max-w-3xl mx-auto">"<span x-text="item.quote"></span>"</p>

                            <div class="pt-1">
                                <p class="font-headline text-2xl uppercase text-primary" x-text="item.name"></p>
                                <p class="text-sm text-muted mt-1 inline-flex items-center gap-2"><i class="ri-briefcase-4-line text-secondary"></i><span x-text="item.role"></span></p>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="mt-8 flex items-center justify-center gap-3">
                    <button @click="prev()" class="h-10 w-10 rounded-full border border-border text-primary hover:bg-surface-2 transition-colors"><i class="ri-arrow-left-s-line text-xl"></i></button>
                    <div class="flex items-center gap-2 mx-2">
                        <template x-for="(item, index) in testimonials" :key="`dot-${index}`">
                            <button @click="current = index" :class="current === index ? 'testimonial-dot active' : 'testimonial-dot'"></button>
                        </template>
                    </div>
                    <button @click="next()" class="h-10 w-10 rounded-full border border-border text-primary hover:bg-surface-2 transition-colors"><i class="ri-arrow-right-s-line text-xl"></i></button>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-surface-2 border-t border-border">
        <div class="container-custom">
            <div class="cta-shell rounded-3xl p-7 sm:p-10 md:p-12 lg:p-14 relative overflow-hidden">
                <div class="absolute -top-28 -right-16 h-72 w-72 rounded-full bg-secondary/30 blur-3xl"></div>
                <div class="absolute -bottom-24 -left-16 h-72 w-72 rounded-full bg-accent/30 blur-3xl"></div>

                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                    <div class="lg:col-span-8">
                        <span class="cta-kicker"><i class="ri-flashlight-line text-white"></i> Let's Build Something Great</span>
                        <h2 class="mt-4 text-white text-3xl sm:text-4xl lg:text-6xl uppercase leading-[0.95]">Ready To Start Your Next Project?</h2>
                        <p class="mt-4 text-white/80 text-sm sm:text-base md:text-lg leading-7 max-w-2xl">
                            Share your timeline and project goals. Our team will send a practical execution roadmap and quote plan within 24 hours.
                        </p>

                        <div class="mt-7 flex flex-col sm:flex-row gap-3 sm:gap-4">
                            <button class="btn-primary !bg-white !text-zinc-800 !border-0 hover:!bg-zinc-100"><i class="ri-file-list-3-line !text-zinc-800"></i> Request a Bid</button>
                            <button class="btn-secondary !bg-white !text-zinc-800 !border-white hover:!bg-zinc-100"><i class="ri-customer-service-2-line !text-zinc-800"></i> Talk to Expert</button>
                        </div>
                    </div>

                    <div class="lg:col-span-4">
                        <div class="space-y-3">
                            <div class="cta-point inline-flex items-center gap-2 w-full"><i class="ri-time-line text-white"></i> Response in under 24 hours</div>
                            <div class="cta-point inline-flex items-center gap-2 w-full"><i class="ri-shield-check-line text-white"></i> Safety-first delivery process</div>
                            <div class="cta-point inline-flex items-center gap-2 w-full"><i class="ri-award-line text-white"></i> Trusted by 450+ project teams</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
