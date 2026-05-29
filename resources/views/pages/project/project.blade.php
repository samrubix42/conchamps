@section('meta_title', 'Projects')
@section('meta_description', 'Browse the Concrete Champs project portfolio, showcasing industrial, commercial, and infrastructure work executed with structural precision.')

<div class="bg-background text-on-surface font-body overflow-x-hidden">
    <section class="relative bg-slate-50 border-b border-border py-12 overflow-hidden blueprint-grid">
        <div class="absolute inset-0 pointer-events-none" style="background: radial-gradient(circle at 80% 50%, rgba(42, 40, 114, 0.06), transparent 50%);"></div>
        
        <div class="container-custom relative z-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-headline uppercase text-primary font-bold tracking-tight">Projects</h1>
                    <p class="mt-2 text-xs sm:text-sm text-muted font-medium inline-flex items-center gap-1.5">
                        <a href="{{ route('home') }}" wire:navigate class="hover:text-secondary transition-colors">Home</a>
                        <span class="text-slate-400">/</span>
                        <span class="text-secondary font-semibold">Projects</span>
                    </p>
                </div>
                
                <div class="hidden md:block">
                    <span class="inline-flex items-center gap-2 rounded-full border border-secondary/12 bg-secondary/6 px-4 py-1.5 text-[11px] uppercase tracking-[0.16em] font-semibold text-secondary">
                        <i class="ri-building-line"></i> Our Portfolio
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section
        class="section bg-surface border-y border-border"
        x-data="{
            projects: @js($projects),
        }"
    >
        <div class="container-custom">
            <div class="space-y-8 lg:space-y-10">
                <template x-for="(project, index) in projects" :key="`${index}-${project.title}`">
                    <article
                        x-data="{
                            activeImage: 0,
                            sliderTimer: null,
                            nextImage() {
                                if (project.images.length < 2) return;
                                this.activeImage = this.activeImage === project.images.length - 1 ? 0 : this.activeImage + 1;
                            },
                            previousImage() {
                                if (project.images.length < 2) return;
                                this.activeImage = this.activeImage === 0 ? project.images.length - 1 : this.activeImage - 1;
                            },
                            goToImage(imageIndex) {
                                this.activeImage = imageIndex;
                                this.restartSlider();
                            },
                            startSlider() {
                                if (project.images.length < 2 || this.sliderTimer) return;
                                this.sliderTimer = setInterval(() => this.nextImage(), 3500);
                            },
                            stopSlider() {
                                if (! this.sliderTimer) return;
                                clearInterval(this.sliderTimer);
                                this.sliderTimer = null;
                            },
                            restartSlider() {
                                this.stopSlider();
                                this.startSlider();
                            },
                        }"
                        x-init="startSlider()"
                        @mouseenter="stopSlider()"
                        @mouseleave="startSlider()"
                        class="grid grid-cols-1 lg:grid-cols-12 gap-0 overflow-hidden rounded-3xl border border-border bg-white shadow-[0_18px_44px_rgba(15,23,42,0.08)]"
                    >
                        <div class="relative lg:col-span-6 min-h-[280px] sm:min-h-[360px] lg:min-h-[430px] overflow-hidden bg-slate-100" :class="index % 2 === 1 ? 'lg:order-2' : 'lg:order-1'">
                            <template x-for="(image, imageIndex) in project.images" :key="`${project.title}-${imageIndex}`">
                                <img
                                    x-show="activeImage === imageIndex"
                                    x-transition.opacity.duration.300ms
                                    :src="image"
                                    :alt="`${project.title} image ${imageIndex + 1}`"
                                    class="absolute inset-0 h-full w-full object-cover"
                                />
                            </template>

                            <template x-if="project.images.length > 1">
                                <div class="absolute inset-x-0 bottom-4 flex items-center justify-center gap-2">
                                    <template x-for="(image, imageIndex) in project.images" :key="`dot-${project.title}-${imageIndex}`">
                                        <button
                                            type="button"
                                            @click="goToImage(imageIndex)"
                                            class="h-2.5 rounded-full border border-white/70 transition-all"
                                            :class="activeImage === imageIndex ? 'w-8 bg-white' : 'w-2.5 bg-white/45 hover:bg-white/75'"
                                            aria-label="View project image"
                                        ></button>
                                    </template>
                                </div>
                            </template>

                            <template x-if="project.images.length > 1">
                                <div class="absolute inset-y-0 left-0 right-0 flex items-center justify-between px-3">
                                    <button
                                        type="button"
                                        @click="previousImage(); restartSlider()"
                                        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-primary shadow-lg transition hover:bg-white"
                                        aria-label="Previous image"
                                    >
                                        <i class="ri-arrow-left-s-line text-2xl"></i>
                                    </button>
                                    <button
                                        type="button"
                                        @click="nextImage(); restartSlider()"
                                        class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-primary shadow-lg transition hover:bg-white"
                                        aria-label="Next image"
                                    >
                                        <i class="ri-arrow-right-s-line text-2xl"></i>
                                    </button>
                                </div>
                            </template>
                        </div>

                        <div class="lg:col-span-6 p-6 sm:p-8 lg:p-10 flex flex-col justify-center" :class="index % 2 === 1 ? 'lg:order-1' : 'lg:order-2'">
                            <span class="inline-flex w-fit items-center gap-2 rounded-full border border-secondary/20 bg-secondary/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.16em] text-secondary">
                                <i class="ri-building-2-line"></i>
                                <span x-text="project.category"></span>
                            </span>
                            <h2 class="mt-4 text-3xl sm:text-4xl lg:text-5xl uppercase text-primary" x-text="project.title"></h2>
                            <p class="mt-3 inline-flex items-center gap-2 text-sm font-medium text-primary">
                                <i class="ri-map-pin-2-line text-secondary"></i>
                                <span x-text="project.location"></span>
                            </p>
                            <div
                                class="mt-5 text-sm sm:text-base text-muted leading-7 [&_ul]:list-disc [&_ul]:pl-5 [&_ol]:list-decimal [&_ol]:pl-5 [&_a]:text-secondary [&_a]:font-semibold"
                                x-html="project.description"
                            ></div>
                        </div>
                    </article>
                </template>
            </div>

            <div x-show="projects.length === 0" class="mt-4 rounded-xl border border-dashed border-border bg-white px-5 py-8 text-center text-sm text-muted">
                No active projects available right now.
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
