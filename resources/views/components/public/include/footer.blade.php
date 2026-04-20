<?php

use Livewire\Component;
use App\Helpers\SettingHelper;

new class extends Component
{
    public array $site = [];

    public function mount(): void
    {
        $this->site = SettingHelper::websiteDefaults();
    }
};
?>

<footer class="border-t border-slate-200 bg-gradient-to-b from-white to-slate-50">
    <div class="container-custom py-10 sm:py-12">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6 lg:p-7 flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-10">
            <div>
                <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Need Expert Guidance?</p>
                <p class="mt-1 text-xl sm:text-2xl font-headline uppercase text-slate-900">Let's Discuss Your Project</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
                <a href="tel:{{ $site['phone_tel'] }}" class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 hover:text-secondary hover:border-secondary transition-colors">
                    <i class="ri-phone-line"></i> {{ $site['phone_number'] }}
                </a>
                <button class="btn-primary !rounded-lg !px-5 !py-2.5 !text-xs uppercase tracking-[0.08em]">Get A Quote</button>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">
            <div class="sm:col-span-2 lg:col-span-1">
                <a href="{{ url('/') }}" class="inline-flex items-center mb-5">
                    <img src="{{ $site['logo_url'] }}" alt="{{ $site['project_name'] }}" class="h-11 md:h-12" />
                </a>
                <p class="text-slate-600 text-sm leading-7 max-w-xs">
                    Modern structural engineering and construction delivery focused on safety, speed, and long-term quality.
                </p>
                <div class="mt-5 flex items-center gap-3 text-xl">
                    <a href="{{ $site['linkedin'] }}" target="_blank" class="h-9 w-9 rounded-full border border-slate-200 inline-flex items-center justify-center text-slate-600 hover:text-secondary hover:border-secondary transition-colors"><i class="ri-linkedin-fill"></i></a>
                    <a href="{{ $site['instagram'] }}" target="_blank" class="h-9 w-9 rounded-full border border-slate-200 inline-flex items-center justify-center text-slate-600 hover:text-secondary hover:border-secondary transition-colors"><i class="ri-instagram-line"></i></a>
                    <a href="{{ $site['facebook'] }}" target="_blank" class="h-9 w-9 rounded-full border border-slate-200 inline-flex items-center justify-center text-slate-600 hover:text-secondary hover:border-secondary transition-colors"><i class="ri-youtube-fill"></i></a>
                </div>
            </div>

            <div>
                <h6 class="font-headline text-lg uppercase tracking-[0.1em] text-slate-900 mb-4">Quick Links</h6>
                <ul class="space-y-3 text-sm">
                    <li><a wire:navigate class="text-slate-600 hover:text-secondary transition-colors inline-flex items-center gap-2" href="{{ route('home') }}"><i class="ri-arrow-right-s-line"></i>Home</a></li>
                    <li><a wire:navigate class="text-slate-600 hover:text-secondary transition-colors inline-flex items-center gap-2" href="{{ route('about') }}"><i class="ri-arrow-right-s-line"></i>About</a></li>
                    <li><a wire:navigate class="text-slate-600 hover:text-secondary transition-colors inline-flex items-center gap-2" href="{{ route('projects') }}"><i class="ri-arrow-right-s-line"></i>Projects</a></li>
                    <li><a wire:navigate class="text-slate-600 hover:text-secondary transition-colors inline-flex items-center gap-2" href="{{ route('services') }}"><i class="ri-arrow-right-s-line"></i>Services</a></li>
                    <li><a wire:navigate class="text-slate-600 hover:text-secondary transition-colors inline-flex items-center gap-2" href="{{ route('contact') }}"><i class="ri-arrow-right-s-line"></i>Contact</a></li>
                </ul>
            </div>

            <div>
                <h6 class="font-headline text-lg uppercase tracking-[0.1em] text-slate-900 mb-4">Contact</h6>
                <ul class="space-y-3 text-sm text-slate-600">
                    <li class="inline-flex items-start gap-2"><i class="ri-map-pin-2-line mt-0.5 text-secondary"></i><span>{{ $site['address'] }}</span></li>
                    <li class="inline-flex items-center gap-2"><i class="ri-phone-line text-secondary"></i><span>{{ $site['phone_number'] }}</span></li>
                    <li class="inline-flex items-center gap-2"><i class="ri-mail-line text-secondary"></i><span>{{ $site['email'] }}</span></li>
                </ul>
            </div>

            <div>
                <h6 class="font-headline text-lg uppercase tracking-[0.1em] text-slate-900 mb-4">Newsletter</h6>
                <p class="text-sm text-slate-600 leading-6 mb-4">Get monthly updates on new projects and capabilities.</p>
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-1.5 flex items-center">
                    <input type="email" placeholder="Your email" class="w-full px-3 py-2 bg-transparent text-sm text-slate-900 placeholder:text-slate-500 focus:outline-none" />
                    <button class="h-10 w-10 rounded-lg bg-secondary text-white inline-flex items-center justify-center">
                        <i class="ri-send-plane-line"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="border-t border-slate-200 bg-white">
        <div class="container-custom py-4 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs sm:text-sm">
            <p class="text-slate-500">&copy; {{ date('Y') }} Concrete Champs. All rights reserved.</p>
            <div class="flex items-center gap-5">
                <a href="#" class="text-slate-500 hover:text-secondary transition-colors">Privacy Policy</a>
                <a href="#" class="text-slate-500 hover:text-secondary transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
