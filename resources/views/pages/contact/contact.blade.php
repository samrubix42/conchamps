<div class="bg-background text-on-surface font-body overflow-x-hidden">
    <section class="relative overflow-hidden min-h-[44vh] sm:min-h-[50vh] flex items-center">
        <img src="{{ asset('building/beautiful-view-construction-site-city-sunset.webp') }}" alt="Contact Concrete Champs" class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-linear-to-r from-slate-950/82 via-slate-950/60 to-slate-950/32"></div>

        <div class="container-custom relative z-10 py-20 md:py-24">
            <p class="inline-flex items-center gap-2 rounded-full border border-white/30 bg-white/10 px-4 py-1.5 text-xs uppercase tracking-[0.16em] font-semibold text-white">
                <i class="ri-customer-service-2-line"></i> Contact
            </p>
            <h1 class="mt-4 text-white text-3xl sm:text-5xl lg:text-7xl leading-[0.95] uppercase max-w-4xl">Let's Talk About Your Next Build</h1>
            <p class="mt-5 max-w-2xl text-white/85 text-sm sm:text-base lg:text-lg leading-7">
                Share your project scope, location, and schedule goals. Our team will respond with next steps and a practical plan within 24 hours.
            </p>
        </div>
    </section>

    <section class="section bg-white border-y border-border">
        <div class="container-custom">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-5">
                <div class="rounded-2xl border border-border bg-surface p-5 sm:p-6">
                    <i class="ri-phone-line text-2xl text-secondary"></i>
                    <h3 class="mt-3 text-xl sm:text-2xl uppercase text-primary">Call</h3>
                    <p class="mt-2 text-sm text-muted">+1 (800) 787-8201</p>
                </div>
                <div class="rounded-2xl border border-border bg-surface p-5 sm:p-6">
                    <i class="ri-mail-line text-2xl text-secondary"></i>
                    <h3 class="mt-3 text-xl sm:text-2xl uppercase text-primary">Email</h3>
                    <p class="mt-2 text-sm text-muted">hello@concretechamps.com</p>
                </div>
                <div class="rounded-2xl border border-border bg-surface p-5 sm:p-6">
                    <i class="ri-map-pin-2-line text-2xl text-secondary"></i>
                    <h3 class="mt-3 text-xl sm:text-2xl uppercase text-primary">Office</h3>
                    <p class="mt-2 text-sm text-muted">1200 Industrial Way, New York, NY</p>
                </div>
                <div class="rounded-2xl border border-border bg-surface p-5 sm:p-6">
                    <i class="ri-time-line text-2xl text-secondary"></i>
                    <h3 class="mt-3 text-xl sm:text-2xl uppercase text-primary">Hours</h3>
                    <p class="mt-2 text-sm text-muted">Mon - Sat, 8:00 AM - 5:30 PM</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-surface-2">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
                <div class="lg:col-span-7 rounded-3xl border border-border bg-white p-5 sm:p-8 md:p-10 shadow-[0_18px_40px_rgba(15,23,42,0.06)]">
                    <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                        <i class="ri-file-list-3-line"></i> Project Inquiry
                    </span>
                    <h2 class="mt-3 text-3xl sm:text-4xl uppercase text-primary">Request A Consultation</h2>

                    <form wire:submit="save" class="mt-7 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Full Name</label>
                            <input wire:model.defer="name" type="text" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/35" placeholder="Jane Cooper" />
                            @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Company</label>
                            <input wire:model.defer="company" type="text" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/35" placeholder="Northline Infrastructure" />
                            @error('company') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Email</label>
                            <input wire:model.defer="email" type="email" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/35" placeholder="you@company.com" />
                            @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Phone</label>
                            <input wire:model.defer="phone" type="tel" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/35" placeholder="+1 (555) 123-4567" />
                            @error('phone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Project Type</label>
                            <select wire:model.defer="project_type" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary focus:outline-none focus:ring-2 focus:ring-secondary/35">
                                <option value="">Select project type</option>
                                <option>Commercial Build</option>
                                <option>Industrial Facility</option>
                                <option>Structural Engineering</option>
                                <option>Renovation & Retrofit</option>
                            </select>
                            @error('project_type') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label class="text-xs uppercase tracking-[0.14em] text-muted">Message</label>
                            <textarea wire:model.defer="message" rows="5" class="mt-2 w-full rounded-xl border border-border bg-surface px-4 py-3 text-sm text-primary placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-secondary/35" placeholder="Tell us about timeline, location, and goals."></textarea>
                            @error('message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <button type="submit" wire:loading.attr="disabled" wire:target="save" class="btn-primary w-full sm:w-auto disabled:opacity-70">
                                <i class="ri-send-plane-line"></i> Send Request
                            </button>
                        </div>
                    </form>
                </div>

                <div class="lg:col-span-5 space-y-5">
                    <div class="rounded-3xl border border-border overflow-hidden bg-white shadow-[0_16px_40px_rgba(15,23,42,0.06)]">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1974&auto=format&fit=crop" alt="Office interior" class="w-full h-56 object-cover" />
                        <div class="p-6">
                            <h3 class="text-xl sm:text-2xl uppercase text-primary">Visit Our Office</h3>
                            <p class="mt-3 text-sm text-muted leading-7">Meet our estimators and engineering leads for an in-depth scope conversation.</p>
                            <p class="mt-4 inline-flex items-center gap-2 text-sm text-primary"><i class="ri-map-pin-2-line text-secondary"></i> 1200 Industrial Way, New York, NY</p>
                        </div>
                    </div>

                    <div class="rounded-3xl border border-border bg-white p-6 shadow-[0_16px_40px_rgba(15,23,42,0.06)]">
                        <h3 class="text-xl sm:text-2xl uppercase text-primary">Emergency Site Support</h3>
                        <p class="mt-3 text-sm text-muted leading-7">Need urgent site coordination? Our rapid-response team is available for critical project interventions.</p>
                        <a href="tel:+18007878201" class="mt-5 inline-flex items-center gap-2 text-secondary font-semibold">
                            <i class="ri-phone-line"></i> Call Priority Line
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section
        class="section bg-surface border-y border-border"
        x-data="{ activeFaq: 0 }"
    >
        <div class="container-custom max-w-5xl">
            <div class="text-center mb-10">
                <span class="inline-flex items-center gap-2 text-secondary text-xs sm:text-sm uppercase tracking-[0.2em] font-semibold">
                    <i class="ri-question-line"></i> FAQ
                </span>
                <h2 class="mt-3 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-3">
                <div class="rounded-2xl border border-border bg-white p-5 sm:p-6">
                    <button @click="activeFaq = activeFaq === 0 ? -1 : 0" class="w-full flex items-start justify-between gap-4 text-left">
                        <span class="text-base sm:text-xl uppercase text-primary">How quickly can you provide a quote?</span>
                        <i class="text-xl text-secondary" :class="activeFaq === 0 ? 'ri-subtract-line' : 'ri-add-line'"></i>
                    </button>
                    <p x-show="activeFaq === 0" x-transition class="mt-3 text-sm text-muted leading-7">Most standard scopes receive a detailed estimate and execution outline within 24-48 hours.</p>
                </div>

                <div class="rounded-2xl border border-border bg-white p-5 sm:p-6">
                    <button @click="activeFaq = activeFaq === 1 ? -1 : 1" class="w-full flex items-start justify-between gap-4 text-left">
                        <span class="text-base sm:text-xl uppercase text-primary">Do you handle both design and execution?</span>
                        <i class="text-xl text-secondary" :class="activeFaq === 1 ? 'ri-subtract-line' : 'ri-add-line'"></i>
                    </button>
                    <p x-show="activeFaq === 1" x-transition class="mt-3 text-sm text-muted leading-7">Yes. We support end-to-end workflows from structural planning through site execution and quality control.</p>
                </div>

                <div class="rounded-2xl border border-border bg-white p-5 sm:p-6">
                    <button @click="activeFaq = activeFaq === 2 ? -1 : 2" class="w-full flex items-start justify-between gap-4 text-left">
                        <span class="text-base sm:text-xl uppercase text-primary">Can you coordinate with our existing consultants?</span>
                        <i class="text-xl text-secondary" :class="activeFaq === 2 ? 'ri-subtract-line' : 'ri-add-line'"></i>
                    </button>
                    <p x-show="activeFaq === 2" x-transition class="mt-3 text-sm text-muted leading-7">Absolutely. We regularly integrate with external architects, PM teams, and MEP consultants.</p>
                </div>
            </div>
        </div>
    </section>
</div>