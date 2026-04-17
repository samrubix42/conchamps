<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<footer class="bg-surface border-t border-border">
    <div class="container-custom py-14 md:py-16 lg:py-20 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">
        <div class="sm:col-span-2 lg:col-span-1">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3 mb-5">
                <img src="{{ asset('Concrete-Champs-dark.png') }}" alt="Concrete Champs" class="h-12 md:h-14" />
            </a>
            <p class="text-muted text-sm leading-7 max-w-xs">
                Concrete Champs delivers modern structural engineering and construction services with speed, safety, and precision.
            </p>
            <div class="mt-5 flex items-center gap-4 text-xl">
                <a href="#" class="text-muted hover:text-secondary transition-colors"><i class="ri-linkedin-fill"></i></a>
                <a href="#" class="text-muted hover:text-secondary transition-colors"><i class="ri-instagram-line"></i></a>
                <a href="#" class="text-muted hover:text-secondary transition-colors"><i class="ri-youtube-fill"></i></a>
            </div>
        </div>

        <div>
            <h6 class="font-headline text-xl uppercase tracking-[0.1em] text-primary mb-4">Quick Links</h6>
            <ul class="space-y-3 text-sm">
                <li><a class="text-muted hover:text-secondary transition-colors inline-flex items-center gap-2" href="#"><i class="ri-arrow-right-s-line"></i>Home</a></li>
                <li><a class="text-muted hover:text-secondary transition-colors inline-flex items-center gap-2" href="#"><i class="ri-arrow-right-s-line"></i>Projects</a></li>
                <li><a class="text-muted hover:text-secondary transition-colors inline-flex items-center gap-2" href="#"><i class="ri-arrow-right-s-line"></i>Services</a></li>
                <li><a class="text-muted hover:text-secondary transition-colors inline-flex items-center gap-2" href="#"><i class="ri-arrow-right-s-line"></i>Contact</a></li>
            </ul>
        </div>

        <div>
            <h6 class="font-headline text-xl uppercase tracking-[0.1em] text-primary mb-4">Contact</h6>
            <ul class="space-y-3 text-sm text-muted">
                <li class="inline-flex items-start gap-2"><i class="ri-map-pin-2-line mt-0.5 text-secondary"></i><span>1200 Industrial Way, New York, NY</span></li>
                <li class="inline-flex items-center gap-2"><i class="ri-phone-line text-secondary"></i><span>+1 (800) 787-8201</span></li>
                <li class="inline-flex items-center gap-2"><i class="ri-mail-line text-secondary"></i><span>hello@concretechamps.com</span></li>
            </ul>
        </div>

        <div>
            <h6 class="font-headline text-xl uppercase tracking-[0.1em] text-primary mb-4">Newsletter</h6>
            <p class="text-sm text-muted leading-6 mb-4">Get monthly updates on projects and new capabilities.</p>
            <div class="rounded-xl border border-border bg-surface-2 p-1.5 flex items-center">
                <input type="email" placeholder="Your email" class="w-full px-3 py-2 bg-transparent text-sm text-primary placeholder:text-muted/80 focus:outline-none" />
                <button class="h-10 w-10 rounded-lg bg-secondary text-white inline-flex items-center justify-center">
                    <i class="ri-send-plane-line"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="border-t border-border/80">
        <div class="container-custom py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs sm:text-sm">
            <p class="text-muted">&copy; {{ date('Y') }} Concrete Champs. All rights reserved.</p>
            <div class="flex items-center gap-5">
                <a href="#" class="text-muted hover:text-secondary transition-colors">Privacy Policy</a>
                <a href="#" class="text-muted hover:text-secondary transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
