@section('meta_title', 'Services')
@section('meta_description', 'Explore Concrete Champs service offerings, including structural engineering, concrete works, BIM coordination, site planning, renovation, and QA/QC supervision.')

<div class="bg-background text-on-surface font-body overflow-x-hidden">
    <section class="relative overflow-hidden min-h-[46vh] sm:min-h-[56vh] flex items-center">
        <img src="{{ asset('building/beautiful-view-construction-site-city-sunset.webp') }}" alt="Concrete Champs Services" class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-linear-to-r from-slate-950/82 via-slate-950/64 to-slate-950/38"></div>

        <div class="container-custom relative z-10 py-20 md:py-24">
            <p class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.16em] font-semibold text-white">
                <i class="ri-settings-4-line"></i> Services
            </p>
            <h1 class="mt-4 text-white text-3xl sm:text-5xl lg:text-7xl leading-[0.95] uppercase max-w-4xl">Engineering-Led Construction Services</h1>
            <p class="mt-5 max-w-2xl text-white/85 text-sm sm:text-base lg:text-lg leading-7">
                From concept support to site execution, we deliver structured services designed for safety, speed, and long-term performance.
            </p>
        </div>
    </section>

    <section class="section bg-white border-y border-border relative overflow-hidden">
        <div class="absolute -top-24 -right-20 h-72 w-72 rounded-full bg-secondary/12 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-20 h-72 w-72 rounded-full bg-primary/10 blur-3xl"></div>

        <div class="container-custom relative z-10">
            <div class="text-center mb-10 sm:mb-12">
                <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                    <i class="ri-hammer-line"></i> What We Offer
                </span>
                <h2 class="mt-3 text-3xl sm:text-4xl lg:text-6xl uppercase text-primary">Core Service Pillars</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 md:gap-6">
                @foreach($services as $service)
                    <article class="rounded-2xl border border-border bg-surface p-5 sm:p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_16px_36px_rgba(15,23,42,0.12)]">
                        <div class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-secondary/12 text-secondary text-xl">
                            <i class="{{ $service['icon'] }}"></i>
                        </div>
                        <h3 class="mt-4 text-xl sm:text-2xl uppercase text-primary">{{ $service['title'] }}</h3>
                        <p class="mt-3 text-sm text-muted leading-7">{{ $service['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section bg-surface-2 border-y border-border" x-data="{ activeStep: 0 }">
        <div class="container-custom">
            <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5 mb-9 sm:mb-11">
                <div>
                    <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                        <i class="ri-flow-chart"></i> Delivery Workflow
                    </span>
                    <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary">How We Execute</h2>
                </div>
                <p class="text-muted max-w-xl text-sm sm:text-base leading-7">A clear process keeps communication simple and project outcomes predictable.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-5">
                @foreach($process as $index => $step)
                    <article
                        @mouseenter="activeStep = {{ $index }}"
                        :class="activeStep === {{ $index }} ? 'border-secondary shadow-[0_16px_34px_rgba(15,23,42,0.12)]' : 'border-border'"
                        class="rounded-2xl border bg-white p-5 sm:p-6 transition-all duration-300"
                    >
                        <div class="flex items-center justify-between gap-3">
                            <p class="text-xs uppercase tracking-[0.2em] text-muted">Step {{ $index + 1 }}</p>
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-secondary/15 text-secondary text-sm font-semibold">{{ $index + 1 }}</span>
                        </div>
                        <h3 class="mt-4 text-xl uppercase text-primary">{{ $step['title'] }}</h3>
                        <p class="mt-3 text-sm text-muted leading-7">{{ $step['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section bg-white border-y border-border">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
                <div class="lg:col-span-5">
                    <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                        <i class="ri-building-2-line"></i> Sectors
                    </span>
                    <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary leading-[0.95]">Built For Complex Project Types</h2>
                    <p class="mt-5 text-sm sm:text-base text-muted leading-7">
                        Our teams regularly coordinate across consultants, site teams, and stakeholders in technically demanding environments.
                    </p>

                    <div class="mt-7 grid grid-cols-2 gap-3">
                        <div class="rounded-xl border border-border bg-surface p-4">
                            <p class="text-3xl sm:text-4xl font-headline text-primary">450+</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted">Projects Delivered</p>
                        </div>
                        <div class="rounded-xl border border-border bg-surface p-4">
                            <p class="text-3xl sm:text-4xl font-headline text-primary">18+</p>
                            <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted">Years Experience</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">
                    @foreach($sectors as $sector)
                        <div class="rounded-2xl border border-border bg-surface p-5 sm:p-6">
                            <div class="inline-flex h-9 w-9 items-center justify-center rounded-lg bg-primary/8 text-primary">
                                <i class="ri-check-line"></i>
                            </div>
                            <h3 class="mt-3 text-lg sm:text-xl uppercase text-primary">{{ $sector }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-surface">
        <div class="container-custom">
            <div class="rounded-3xl border border-border bg-white px-6 py-8 sm:px-10 sm:py-12 lg:px-12 lg:py-14 relative overflow-hidden">
                <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-secondary/10 blur-3xl"></div>
                <div class="absolute -left-16 -bottom-16 h-48 w-48 rounded-full bg-primary/10 blur-3xl"></div>

                <div class="relative z-10 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div>
                        <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                            <i class="ri-rocket-line"></i> Next Step
                        </span>
                        <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary leading-[0.95]">Start Your Service Consultation</h2>
                        <p class="mt-4 text-sm sm:text-base text-muted max-w-2xl leading-7">Tell us about your requirement and we will map the best technical and execution path for your project.</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="/contact" class="btn-primary inline-flex justify-center">
                            <i class="ri-customer-service-2-line"></i>
                            <span>Contact Us</span>
                        </a>
                        <a href="/projects" class="inline-flex items-center justify-center gap-2 rounded-xl border border-border bg-surface px-6 py-3.5 font-semibold text-primary hover:bg-slate-100 transition-colors">
                            <i class="ri-building-3-line"></i>
                            <span>View Projects</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>