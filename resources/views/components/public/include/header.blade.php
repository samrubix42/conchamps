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
    @scroll.window="scrolled = (window.pageYOffset > 24)"
    :class="scrolled ? 'shadow-[0_12px_32px_rgba(15,23,42,0.12)]' : ''"
    class="fixed inset-x-0 top-0 z-[100] transition-all duration-300">
    <div
        class="hidden lg:block overflow-hidden bg-[#272944] backdrop-blur transition-all duration-300 ease-out"
        :class="scrolled
            ? 'max-h-0 opacity-0 -translate-y-2 border-0'
            : 'max-h-10 opacity-100 translate-y-0 border-b border-white/10'"
    >
        <div
            class="container-custom h-10 flex items-center justify-between text-[13px] text-slate-600 transition-all duration-300"
            :class="scrolled ? 'opacity-0 -translate-y-2 pointer-events-none' : 'opacity-100 translate-y-0'"
        >
            <div class="flex items-center gap-6">
                <a href="tel:+12312345678901" class="inline-flex text-white items-center gap-1.5 hover:text-white transition-colors">
                    <i class="ri-phone-line text-white"></i> +(123) 1234-567-8901
                </a>
                <a href="mailto:info@domain.com" class="inline-flex text-white items-center gap-1.5 hover:text-white transition-colors">
                    <i class="ri-mail-line text-white"></i> info@domain.com
                </a>
                <span class="inline-flex items-center text-white gap-1.5">
                    <i class="ri-time-line text-white"></i> Mon - Sat 8:00 - 17:30
                </span>
            </div>

            <div class="flex items-center gap-3 text-white text-base">
                <a href="#" class="hover:text-white transition-colors"><i class="ri-twitter-x-line"></i></a>
                <a href="#" class="hover:text-white transition-colors"><i class="ri-facebook-fill"></i></a>
                <a href="#" class="hover:text-white transition-colors"><i class="ri-linkedin-fill"></i></a>
            </div>
        </div>
    </div>

    <div class=" bg-[#272944] backdrop-blur">
        <nav class="container-custom h-16 md:h-[72px] grid grid-cols-[1fr_auto] lg:grid-cols-[220px_1fr_190px] items-center gap-4">
            <a href="{{ url('/') }}" class="relative z-[120] inline-flex items-center">
                <img src="{{ asset('Concrete-Champs-dark.png') }}" alt="Concrete Champs" class="h-8 sm:h-9 md:h-10" />
            </a>

            <div class="hidden lg:flex items-center justify-center gap-2">
                <a href="{{ route('home') }}" wire:navigate class="px-4 py-2 rounded-lg text-[15px] font-medium text-white hover:text-slate-900 hover:bg-white/20 transition-colors">Home</a>
                <a href="{{ route('about') }}" wire:navigate class="px-4 py-2 rounded-lg text-[15px] font-medium text-white hover:text-slate-900 hover:bg-white/20 transition-colors">About</a>
                <a href="{{ route('projects') }}" wire:navigate class="px-4 py-2 rounded-lg text-[15px] font-medium text-white hover:text-slate-900 hover:bg-white/20 transition-colors">Projects</a>
                <a href="{{ route('services') }}" wire:navigate class="px-4 py-2 rounded-lg text-[15px] font-medium text-white hover:text-slate-900 hover:bg-white/20 transition-colors">Services</a>
                <a href="{{ route('contact') }}" wire:navigate class="px-4 py-2 rounded-lg text-[15px] font-medium text-white hover:text-slate-900 hover:bg-white/20 transition-colors">Contact</a>
            </div>

            <div class="flex items-center justify-end gap-2">
                <button class="hidden lg:inline-flex btn-primary !bg-[#3c38a1] shadow shadow-md !text-white !font-semibold !rounded-lg !px-5 !py-2.5 !text-xs uppercase !tracking-[0.08em]">
                    Contact Now
                </button>

                <button
                    @click="mobileMenuOpen = !mobileMenuOpen"
                    class="lg:hidden relative z-[120] inline-flex h-10 w-10 items-center justify-center text-white"
                    :aria-label="mobileMenuOpen ? 'Close menu' : 'Open menu'"
                    type="button">
                    <i class="text-xl" :class="mobileMenuOpen ? 'ri-close-line' : 'ri-menu-4-line'"></i>
                </button>
            </div>
        </nav>
    </div>

  <div
    x-show="mobileMenuOpen"
        x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-x-full"
    x-transition:enter-end="opacity-100 translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-x-0"
    x-transition:leave-end="opacity-0 translate-x-full"
    class="lg:hidden fixed inset-0 z-[110] bg-white flex flex-col"
>

    <!-- 🔥 TOP BAR (NEW) -->
    <div class="flex items-center justify-between px-6 h-16 border-b border-gray-200">
        
        <!-- Logo -->
        <img src="{{ asset('Concrete-Champs-white.png') }}" class="h-8" />

        <!-- Close Button -->
        <button
            @click="mobileMenuOpen = false"
            class="h-10 w-10 flex items-center justify-center rounded-lg bg-gray-100 hover:bg-gray-200 transition"
        >
            <i class="ri-close-line text-xl"></i>
        </button>
    </div>

    <!-- 📱 CONTENT -->
    <div class="flex-1 overflow-y-auto no-scrollbar px-6 py-6 flex flex-col gap-6">

        <!-- Contact -->
        <div class="text-sm text-gray-500 space-y-1">
            <p class="flex items-center gap-2">
                <i class="ri-phone-line text-white"></i> +(123) 1234-567-8901
            </p>
            <p class="flex items-center gap-2">
                <i class="ri-mail-line text-white"></i> info@domain.com
            </p>
        </div>

        <!-- MENU -->
        <div class="flex flex-col gap-2 mt-2">

            <!-- ITEM -->
            <a href="{{ route('home') }}" wire:navigate @click="mobileMenuOpen = false"
               class="flex justify-between items-center px-4 py-4 rounded-xl text-xl font-headline uppercase tracking-wide hover:bg-gray-100 transition">
                Home
                <i class="ri-arrow-right-up-line text-white"></i>
            </a>

            <a href="{{ route('about') }}" wire:navigate @click="mobileMenuOpen = false"
               class="flex justify-between items-center px-4 py-4 rounded-xl text-xl font-headline uppercase tracking-wide hover:bg-gray-100 transition">
                About
                <i class="ri-arrow-right-up-line text-white"></i>
            </a>

            <a href="{{ route('projects') }}" wire:navigate @click="mobileMenuOpen = false"
               class="flex justify-between items-center px-4 py-4 rounded-xl text-xl font-headline uppercase tracking-wide hover:bg-gray-100 transition">
                Projects
                <i class="ri-arrow-right-up-line text-white"></i>
            </a>

            <a href="{{ route('services') }}" wire:navigate @click="mobileMenuOpen = false"
               class="flex justify-between items-center px-4 py-4 rounded-xl text-xl font-headline uppercase tracking-wide hover:bg-gray-100 transition">
                Services
                <i class="ri-arrow-right-up-line text-white"></i>
            </a>

            <a href="{{ route('contact') }}" wire:navigate @click="mobileMenuOpen = false"
               class="flex justify-between items-center px-4 py-4 rounded-xl text-xl font-headline uppercase tracking-wide hover:bg-gray-100 transition">
                Contact
                <i class="ri-arrow-right-up-line text-white"></i>
            </a>

        </div>

        <!-- CTA -->
        <button class="btn-primary w-full mt-4 !py-3.5">
            <i class="ri-send-plane-line"></i>
            Contact Now
        </button>

    </div>

    <!-- 🔻 FOOTER SOCIAL -->
    <div class="px-6 py-4 border-t border-gray-200 flex justify-between items-center text-sm">
        <span class="text-gray-500 uppercase tracking-widest">Follow</span>
        <div class="flex gap-4 text-lg">
            <a href="#" class="hover:text-white"><i class="ri-linkedin-fill"></i></a>
            <a href="#" class="hover:text-white"><i class="ri-instagram-line"></i></a>
            <a href="#" class="hover:text-white"><i class="ri-youtube-fill"></i></a>
        </div>
    </div>

</div>
</header>