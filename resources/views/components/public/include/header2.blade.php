<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<header
    x-data="{ scrolled: false, mobileMenuOpen: false }"
    x-effect="document.body.classList.toggle('overflow-hidden', mobileMenuOpen)"
    @scroll.window="scrolled = (window.pageYOffset > 12)"
    :class="(scrolled || mobileMenuOpen) ? 'shadow-[0_10px_28px_rgba(15,23,42,0.2)]' : ''"
    class="fixed inset-x-0 top-0 z-[100] transition-all duration-300"
>
    <div class="hidden md:block bg-white border-b border-border">
        <div class="container-custom h-9 flex items-center justify-between text-muted text-[13px]">
            <div class="flex items-center gap-4 lg:gap-6">
                <a href="tel:+12312345678901" class="inline-flex items-center gap-1.5 hover:text-secondary transition-colors">
                    <i class="ri-phone-line text-secondary"></i> +(123) 1234-567-8901
                </a>
                <a href="mailto:info@domain.com" class="inline-flex items-center gap-1.5 hover:text-secondary transition-colors">
                    <i class="ri-mail-line text-secondary"></i> info@domain.com
                </a>
                <span class="hidden lg:inline-flex items-center gap-1.5">
                    <i class="ri-time-line text-secondary"></i> Mon - Sat 8:00 - 17:30
                </span>
            </div>

            <div class="flex items-center gap-3 text-base">
                <a href="#" class="hover:text-secondary transition-colors"><i class="ri-twitter-x-line"></i></a>
                <a href="#" class="hover:text-secondary transition-colors"><i class="ri-facebook-fill"></i></a>
                <a href="#" class="hover:text-secondary transition-colors"><i class="ri-linkedin-fill"></i></a>
            </div>
        </div>
    </div>

    <div class="bg-white border-b border-border">
        <nav class="container-custom h-16 md:h-[74px] grid grid-cols-[1fr_auto] lg:grid-cols-[230px_1fr_170px] items-center gap-4">
            <a href="{{ url('/') }}" class="relative z-[120] inline-flex items-center gap-3">
                <img src="{{ asset('Concrete-Champs-dark.png') }}" alt="Concrete Champs" class="h-8 sm:h-9 md:h-10" />
            </a>

            <div class="hidden lg:flex items-center justify-center gap-8">
                <a href="#" class="text-primary font-body text-[15px] hover:text-secondary transition-colors">Home</a>
                <a href="#" class="text-primary/90 font-body text-[15px] hover:text-secondary transition-colors">About</a>
                <a href="#" class="text-primary/90 font-body text-[15px] hover:text-secondary transition-colors">Projects</a>
                <a href="#" class="text-primary/90 font-body text-[15px] hover:text-secondary transition-colors">Services</a>
                <a href="#" class="text-primary/90 font-body text-[15px] hover:text-secondary transition-colors">Contact</a>
            </div>

            <div class="flex items-center justify-end gap-2 sm:gap-3">
                <button class="hidden lg:inline-flex btn-primary !rounded-lg !px-5 !py-2.5 !text-xs uppercase !tracking-[0.08em] shadow-[0_8px_20px_rgba(255,106,0,0.22)]">
                    Contact Now
                </button>

                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden relative z-[120] inline-flex h-10 w-10 items-center justify-center rounded-lg border border-border bg-surface-2 text-primary"
                    :aria-label="mobileMenuOpen ? 'Close menu' : 'Open menu'"
                    type="button"
                >
                    <i class="text-xl" :class="mobileMenuOpen ? 'ri-close-line' : 'ri-menu-4-line'"></i>
                </button>
            </div>
        </nav>
    </div>

    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-x-full"
        x-transition:enter-end="opacity-100 translate-x-0"
        x-transition:leave="transition ease-in duration-350"
        x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-0 translate-x-full"
        class="md:hidden fixed inset-0 z-[110] bg-white text-primary"
    >
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_85%_15%,rgba(255,106,0,0.14),transparent_45%)]"></div>
        <div class="container-custom relative z-[111] h-full pt-20 pb-8 flex flex-col">
            <div class="mb-6 rounded-xl border border-border bg-surface-2 p-4 text-sm text-muted space-y-2">
                <p class="inline-flex items-center gap-2"><i class="ri-phone-line text-secondary"></i> +(123) 1234-567-8901</p>
                <p class="inline-flex items-center gap-2"><i class="ri-mail-line text-secondary"></i> info@domain.com</p>
            </div>

            <div class="flex-1 flex flex-col gap-2">
                <a href="#" @click="mobileMenuOpen = false" class="group flex items-center justify-between rounded-xl px-4 py-3.5 bg-surface-2 border border-border font-headline text-2xl uppercase tracking-[0.08em] hover:bg-[#e8edf5] transition-colors">
                    Home
                    <i class="ri-home-5-line text-xl text-secondary group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#" @click="mobileMenuOpen = false" class="group flex items-center justify-between rounded-xl px-4 py-3.5 bg-white border border-border font-headline text-2xl uppercase tracking-[0.08em] hover:bg-surface-2 transition-colors">
                    About
                    <i class="ri-information-line text-xl text-secondary group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#" @click="mobileMenuOpen = false" class="group flex items-center justify-between rounded-xl px-4 py-3.5 bg-white border border-border font-headline text-2xl uppercase tracking-[0.08em] hover:bg-surface-2 transition-colors">
                    Projects
                    <i class="ri-building-2-line text-xl text-secondary group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#" @click="mobileMenuOpen = false" class="group flex items-center justify-between rounded-xl px-4 py-3.5 bg-white border border-border font-headline text-2xl uppercase tracking-[0.08em] hover:bg-surface-2 transition-colors">
                    Services
                    <i class="ri-tools-line text-xl text-secondary group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="#" @click="mobileMenuOpen = false" class="group flex items-center justify-between rounded-xl px-4 py-3.5 bg-white border border-border font-headline text-2xl uppercase tracking-[0.08em] hover:bg-surface-2 transition-colors">
                    Contact
                    <i class="ri-chat-1-line text-xl text-secondary group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <button class="btn-primary w-full mt-5 !py-3.5 !text-sm">
                <i class="ri-send-plane-line text-lg"></i>
                Contact Now
            </button>

            <div class="mt-6 flex items-center justify-between text-xs text-muted">
                <span class="uppercase tracking-[0.16em]">Follow us</span>
                <div class="flex items-center gap-4 text-xl">
                    <a href="#" class="text-primary/80 hover:text-secondary transition-colors"><i class="ri-linkedin-fill"></i></a>
                    <a href="#" class="text-primary/80 hover:text-secondary transition-colors"><i class="ri-instagram-line"></i></a>
                    <a href="#" class="text-primary/80 hover:text-secondary transition-colors"><i class="ri-youtube-fill"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
