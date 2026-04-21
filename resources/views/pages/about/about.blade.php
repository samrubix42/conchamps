@section('meta_title', 'About Concrete Champs')
@section('meta_description', 'Learn about Concrete Champs and our engineering-led approach to building safe, reliable, and efficient structures.')

<div class="bg-background text-on-surface font-body overflow-x-hidden">
    <section class="relative overflow-hidden min-h-[46vh] sm:min-h-[52vh] flex items-center">
        <img src="{{ asset('building/construction-site-sunset.webp') }}" alt="About Concrete Champs" class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-slate-950/60 to-slate-950/35"></div>

        <div class="container-custom relative z-10 py-20 md:py-24">
            <p class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.16em] font-semibold text-white">
                <i class="ri-team-line"></i> About Us
            </p>
            <h1 class="mt-4 text-white text-3xl sm:text-5xl lg:text-7xl leading-[0.95] uppercase max-w-4xl">Built With Engineering Discipline</h1>
            <p class="mt-5 max-w-2xl text-white/85 text-sm sm:text-base lg:text-lg leading-7">
                Concrete Champs is a construction and structural engineering partner focused on predictable delivery, technical depth, and site-level execution excellence.
            </p>
        </div>
    </section>

    <section class="section bg-white border-y border-border">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                <div class="lg:col-span-7">
                    <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm font-semibold uppercase tracking-[0.2em]">
                        <i class="ri-compass-3-line"></i> Our Mission
                    </span>
                    <h2 class="mt-3 text-3xl sm:text-4xl lg:text-6xl uppercase text-primary leading-[0.95]">
                        Deliver Durable Spaces Without Delivery Surprises
                    </h2>
                    <p class="mt-6 text-muted text-sm sm:text-base leading-7 max-w-2xl">
                        We combine design intent, material science, and practical site coordination to keep quality high and project risk low. Every milestone is tracked against measurable performance indicators.
                    </p>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="rounded-2xl border border-border bg-surface-2 p-5">
                            <p class="text-3xl font-headline text-primary">18+ Years</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted">Industry Experience</p>
                        </div>
                        <div class="rounded-2xl border border-border bg-surface-2 p-5">
                            <p class="text-3xl font-headline text-primary">450+ Projects</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted">Completed Across Sectors</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 grid grid-cols-2 gap-4 sm:gap-5">
                    <div class="col-span-2 rounded-3xl overflow-hidden border border-border shadow-[0_20px_45px_rgba(15,23,42,0.12)]">
                        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1974&auto=format&fit=crop" alt="Site planning" class="w-full h-56 sm:h-64 object-cover" />
                    </div>
                    <div class="rounded-2xl bg-white border border-border p-5">
                        <i class="ri-shield-check-line text-2xl text-secondary"></i>
                        <h3 class="mt-3 text-xl uppercase text-primary">Safety Culture</h3>
                        <p class="mt-2 text-sm text-muted leading-6">Protocols designed for people, schedule, and asset integrity.</p>
                    </div>
                    <div class="rounded-2xl bg-white border border-border p-5">
                        <i class="ri-line-chart-line text-2xl text-secondary"></i>
                        <h3 class="mt-3 text-xl uppercase text-primary">Data-Driven</h3>
                        <p class="mt-2 text-sm text-muted leading-6">Daily field visibility through clear quality and progress metrics.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-surface-2 border-y border-border">
        <div class="container-custom">
            <div class="text-center max-w-3xl mx-auto mb-10 md:mb-12">
                <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                    <i class="ri-focus-2-line"></i> What Guides Us
                </span>
                <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary">Core Values In Action</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 md:gap-6">
                <article class="card">
                    <div class="card-icon"><i class="ri-eye-line"></i></div>
                    <h3 class="text-xl uppercase text-primary">Transparency</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Clear reporting and proactive communication from kickoff to handover.</p>
                </article>
                <article class="card">
                    <div class="card-icon"><i class="ri-tools-line"></i></div>
                    <h3 class="text-xl uppercase text-primary">Craftsmanship</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Execution standards built around detail, accuracy, and durability.</p>
                </article>
                <article class="card">
                    <div class="card-icon"><i class="ri-time-line"></i></div>
                    <h3 class="text-xl uppercase text-primary">Reliability</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Schedule discipline that protects timelines and stakeholder confidence.</p>
                </article>
                <article class="card">
                    <div class="card-icon"><i class="ri-rocket-2-line"></i></div>
                    <h3 class="text-xl uppercase text-primary">Innovation</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Modern materials and digital workflows that improve site outcomes.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section bg-surface blueprint-grid">
        <div class="container-custom">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5 mb-10 md:mb-12">
                <div>
                    <span class="text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold inline-flex items-center gap-2">
                        <i class="ri-route-line"></i> How We Work
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-6xl uppercase text-primary mt-3">Our Delivery Method</h2>
                </div>
                <p class="text-muted max-w-xl text-sm sm:text-base leading-7">A structured process that reduces uncertainty while preserving flexibility for real-world conditions.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 md:gap-6">
                <div class="rounded-2xl border border-border bg-white p-6">
                    <p class="text-[11px] uppercase tracking-[0.18em] text-secondary font-semibold">01</p>
                    <h3 class="mt-3 text-2xl uppercase text-primary">Discover</h3>
                    <p class="mt-3 text-sm text-muted leading-7">Capture scope, constraints, and risk points with all key stakeholders.</p>
                </div>
                <div class="rounded-2xl border border-border bg-white p-6">
                    <p class="text-[11px] uppercase tracking-[0.18em] text-secondary font-semibold">02</p>
                    <h3 class="mt-3 text-2xl uppercase text-primary">Engineer</h3>
                    <p class="mt-3 text-sm text-muted leading-7">Translate goals into buildable designs, quantities, and schedules.</p>
                </div>
                <div class="rounded-2xl border border-border bg-white p-6">
                    <p class="text-[11px] uppercase tracking-[0.18em] text-secondary font-semibold">03</p>
                    <h3 class="mt-3 text-2xl uppercase text-primary">Execute</h3>
                    <p class="mt-3 text-sm text-muted leading-7">Coordinate site operations with strict quality and safety controls.</p>
                </div>
                <div class="rounded-2xl border border-border bg-white p-6">
                    <p class="text-[11px] uppercase tracking-[0.18em] text-secondary font-semibold">04</p>
                    <h3 class="mt-3 text-2xl uppercase text-primary">Optimize</h3>
                    <p class="mt-3 text-sm text-muted leading-7">Review outcomes and continuously improve methods for future phases.</p>
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
                        <span class="cta-kicker"><i class="ri-hammer-line text-white"></i> Partner With Concrete Champs</span>
                        <h2 class="mt-4 text-white text-3xl sm:text-4xl lg:text-5xl uppercase leading-[0.95]">Let's Build A Better Project Outcome</h2>
                        <p class="mt-4 text-white/80 text-sm sm:text-base leading-7">Talk with our team about your project goals and get a practical execution roadmap.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-2 sm:gap-3">

                        <a href="{{ route('projects') }}" wire:navigate
                            class="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium rounded-lg bg-white text-zinc-800 border border-zinc-200 hover:bg-zinc-100 transition">
                            <i class="ri-building-2-line text-base"></i>
                            <span>View Projects</span>
                        </a>

                        <a href="{{ route('contact') }}" wire:navigate
                            class="inline-flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium rounded-lg bg-white text-zinc-800 border border-zinc-200 hover:bg-zinc-100 transition">
                            <i class="ri-send-plane-line text-base"></i>
                            <span>Contact Team</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>