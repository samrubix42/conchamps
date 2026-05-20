@section('meta_title', 'About Concrete Champs')
@section('meta_description', 'Learn about Concrete Champs Consortium LLP, our director Sachin Sharma, our mission, and our construction and engineering achievements.')

<div class="bg-background text-on-surface font-body overflow-x-hidden">
    <!-- Hero Section -->
    <section class="relative overflow-hidden min-h-[46vh] sm:min-h-[52vh] flex items-center">
        <img src="{{ asset('building/construction-site-sunset.webp') }}" alt="About Concrete Champs" class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/80 via-slate-950/60 to-slate-950/35"></div>

        <div class="container-custom relative z-10 py-20 md:py-24">
            <p class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.16em] font-semibold text-white">
                <i class="ri-team-line"></i> About Us
            </p>
            <h1 class="mt-4 text-white text-3xl sm:text-5xl lg:text-7xl leading-[0.95] uppercase max-w-4xl">About Concrete Champs</h1>
            <p class="mt-5 max-w-2xl text-white/85 text-sm sm:text-base lg:text-lg leading-7">
                Concrete Champs Consortium LLP is a Greater Noida-based infrastructure and construction firm with over a decade of experience, delivering quality and world-class engineering across India.
            </p>
        </div>
    </section>

    <!-- Company Overview & Stats Grid -->
    <section class="section bg-white border-y border-border">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                <div class="lg:col-span-7">
                    <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm font-semibold uppercase tracking-[0.2em]">
                        <i class="ri-compass-3-line"></i> Who We Are
                    </span>
                    <h2 class="mt-3 text-3xl sm:text-4xl lg:text-6xl uppercase text-primary leading-[0.95]">
                        A Decade of Engineering Excellence
                    </h2>
                    <p class="mt-6 text-muted text-sm sm:text-base leading-7 max-w-2xl">
                        Concrete Champs Consortium LLP is a Greater Noida-based infrastructure and construction firm with over a decade of experience. Led by Director Sachin Sharma and a management team with 20 years of industry expertise, the company specializes in civil, structural, and MEP services across India.
                    </p>
                    <p class="mt-4 text-muted text-sm sm:text-base leading-7 max-w-2xl">
                        The company delivers turnkey projects for major clients like CPWD, MPPHIDC, and The Time Research Foundation, maintaining a diverse and modern equipment fleet. The firm has demonstrated rapid financial growth, with turnover reaching ₹7,706.13 Lakh in FY 2025-26. Our mission focuses on delivering quality, world-class engineering while maintaining integrity and safety.
                    </p>

                    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="rounded-2xl border border-border bg-surface-2 p-5 flex flex-col justify-between">
                            <div>
                                <p class="text-3xl font-headline text-primary">₹7,706.13 Lakh</p>
                                <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted font-semibold">FY 2025-26 Turnover</p>
                            </div>
                            <p class="mt-3 text-xs text-slate-500">Demonstrating rapid financial growth and financial stability.</p>
                        </div>
                        <div class="rounded-2xl border border-border bg-surface-2 p-5 flex flex-col justify-between">
                            <div>
                                <p class="text-3xl font-headline text-primary">10+ Years</p>
                                <p class="mt-1 text-xs uppercase tracking-[0.16em] text-muted font-semibold">Decade of Experience</p>
                            </div>
                            <p class="mt-3 text-xs text-slate-500">Building landmark turnkey projects and maintaining a diverse equipment fleet.</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 space-y-5">
                    <div class="rounded-3xl border border-border p-6 bg-slate-50">
                        <h3 class="text-xl uppercase font-headline text-primary tracking-wide mb-4">Key Highlighting Stats</h3>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 p-3 bg-white rounded-xl border border-border">
                                <div class="h-10 w-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary text-lg">
                                    <i class="ri-user-star-line"></i>
                                </div>
                                <div>
                                    <p class="font-headline text-lg uppercase text-primary">20 Years</p>
                                    <p class="text-xs text-muted">Management Team Expertise</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 p-3 bg-white rounded-xl border border-border">
                                <div class="h-10 w-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary text-lg">
                                    <i class="ri-government-line"></i>
                                </div>
                                <div>
                                    <p class="font-headline text-lg uppercase text-primary">Major Clients</p>
                                    <p class="text-xs text-muted">CPWD, MPPHIDC, & The Time Research Foundation</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 p-3 bg-white rounded-xl border border-border">
                                <div class="h-10 w-10 rounded-lg bg-secondary/10 flex items-center justify-center text-secondary text-lg">
                                    <i class="ri-truck-line"></i>
                                </div>
                                <div>
                                    <p class="font-headline text-lg uppercase text-primary">Diverse Fleet</p>
                                    <p class="text-xs text-muted">Advanced Infrastructure Equipment</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-border p-6 bg-white shadow-[0_12px_32px_rgba(15,23,42,0.04)]">
                        <h3 class="text-xl uppercase font-headline text-primary tracking-wide mb-4">Core Specializations</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 border border-slate-200 text-xs sm:text-sm font-semibold uppercase text-slate-800 tracking-wider">Civil Construction</span>
                            <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 border border-slate-200 text-xs sm:text-sm font-semibold uppercase text-slate-800 tracking-wider">Structural Engineering</span>
                            <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 border border-slate-200 text-xs sm:text-sm font-semibold uppercase text-slate-800 tracking-wider">MEP Services</span>
                            <span class="px-3.5 py-1.5 rounded-lg bg-slate-100 border border-slate-200 text-xs sm:text-sm font-semibold uppercase text-slate-800 tracking-wider">Turnkey Projects</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Welcome Message Section -->
    <section class="section bg-slate-50 border-b border-border relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none opacity-[0.03]" style="background-image: radial-gradient(circle at 100% 100%, #2A2872 1px, transparent 1px); background-size: 24px 24px;"></div>
        <div class="container-custom relative z-10 max-w-5xl">
            <div class="text-center mb-8 md:mb-10">
                <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                    <i class="ri-message-3-line"></i> Director's Message
                </span>
                <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary">Welcome Message</h2>
                <div class="mt-4 h-1 w-20 bg-secondary/80 mx-auto rounded-full"></div>
            </div>

            <div class="bg-white rounded-3xl border border-border p-6 sm:p-8 md:p-12 shadow-[0_20px_45px_rgba(15,23,42,0.06)] relative">
                <!-- Quote marks styling -->
                <div class="absolute top-6 left-6 text-slate-100 text-7xl font-serif select-none pointer-events-none">“</div>
                <div class="absolute bottom-6 right-6 text-slate-100 text-7xl font-serif select-none pointer-events-none">”</div>

                <div class="relative z-10 space-y-6 text-slate-700 text-sm sm:text-base leading-8">
                    <p class="font-medium text-slate-900 italic text-base sm:text-lg">
                        Every foundation of edifice begins its journey upward with one small brick. Today, we as Concrete Champs Consortium LLP have completed more than a decade and every step of this journey has been full of challenges.
                    </p>
                    <p>
                        Along the journey we have completed several landmark projects. Our company's reputation for reliable construction, adherence to stringent international quality standards, has garnered numerous projects, helping us build a solid foundation.
                    </p>
                    <p>
                        Our mission is to become one of the best managed construction companies that not just delivers superlative financial performance but is also adept at anticipating changes, learning and staying ahead of its peers with a high social commitment.
                    </p>
                    <p>
                        As we continue to grow and as our businesses become increasingly complex, a shared well communicated corporate philosophy is more important than ever. We are not perfect and at times our actions may fall short of our aspirations. But such shortcomings should be viewed as an opportunity to learn and to refocus our efforts to live up to our values and corporate philosophy. It is your continued dedication that will ensure our success.
                    </p>
                </div>

                <div class="mt-10 pt-6 border-t border-slate-100 flex items-center justify-between flex-wrap gap-4">
                    <div>
                        <h4 class="font-headline text-xl sm:text-2xl uppercase text-primary">Sachin Sharma</h4>
                        <p class="text-xs text-muted uppercase tracking-widest font-semibold mt-1">Director, Concrete Champs Consortium LLP</p>
                    </div>
                    <div class="h-10 w-24 border-b-2 border-secondary/40 opacity-70"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Philosophy & Mission -->
    <section class="section bg-white border-b border-border">
        <div class="container-custom max-w-6xl">
            <div class="text-center mb-10 md:mb-12">
                <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                    <i class="ri-focus-2-line"></i> Our Mission & Core Focus
                </span>
                <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary">What Guides Us</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                <article class="group rounded-2xl border border-border p-8 bg-white transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="h-12 w-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary text-2xl transition-all duration-300 group-hover:bg-secondary group-hover:text-white mb-6">
                        <i class="ri-award-line"></i>
                    </div>
                    <h3 class="text-2xl font-headline uppercase text-primary">World-Class Engineering</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Delivering construction quality built on strict technical disciplines, international standards, and field precision.</p>
                </article>

                <article class="group rounded-2xl border border-border p-8 bg-white transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="h-12 w-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary text-2xl transition-all duration-300 group-hover:bg-secondary group-hover:text-white mb-6">
                        <i class="ri-shield-user-line"></i>
                    </div>
                    <h3 class="text-2xl font-headline uppercase text-primary">Integrity & Safety</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Upholding professional safety standards and transparent practices to protect workers and client trust.</p>
                </article>

                <article class="group rounded-2xl border border-border p-8 bg-white transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
                    <div class="h-12 w-12 rounded-xl bg-secondary/10 flex items-center justify-center text-secondary text-2xl transition-all duration-300 group-hover:bg-secondary group-hover:text-white mb-6">
                        <i class="ri-global-line"></i>
                    </div>
                    <h3 class="text-2xl font-headline uppercase text-primary">High Social Commitment</h3>
                    <p class="text-muted mt-3 leading-7 text-sm">Anticipating infrastructure demands, embracing learning, and developing sustainable, durable spaces for communities.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
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