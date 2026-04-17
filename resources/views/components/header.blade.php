<header class="bg-white sticky top-0 z-50 border-b border-gray-100 shadow-sm" x-data="{ mobileMenuOpen: false }">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="/">
                <img src="{{ asset('Concrete-Champs-dark.png') }}" alt="Concrete Champs Logo" class="h-10 w-auto">
            </a>
        </div>

        <!-- Desktop Nav -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="#" class="text-[#05111e] font-semibold text-sm hover:text-[#ae3100] transition-colors tracking-wide uppercase">Expertise</a>
            <a href="#" class="text-[#05111e] font-semibold text-sm hover:text-[#ae3100] transition-colors tracking-wide uppercase">Portfolio</a>
            <a href="#" class="text-[#05111e] font-semibold text-sm hover:text-[#ae3100] transition-colors tracking-wide uppercase">Safety</a>
            <a href="#" class="bg-[#05111e] text-white px-5 py-2.5 rounded text-sm font-semibold hover:bg-[#1a2634] transition-all shadow-md">Request a Bid</a>
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-[#05111e] hover:text-[#ae3100] focus:outline-none">
                <svg class="h-6 w-6" x-show="!mobileMenuOpen" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="h-6 w-6" x-show="mobileMenuOpen" style="display:none;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" style="display:none;" class="md:hidden bg-[#f8f9fb] border-b border-gray-200">
        <div class="px-4 pt-2 pb-6 space-y-2">
            <a href="#" class="block px-3 py-2 rounded-md text-base font-bold text-[#05111e] hover:bg-gray-200 hover:text-[#ae3100]">Expertise</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-bold text-[#05111e] hover:bg-gray-200 hover:text-[#ae3100]">Portfolio</a>
            <a href="#" class="block px-3 py-2 rounded-md text-base font-bold text-[#05111e] hover:bg-gray-200 hover:text-[#ae3100]">Safety</a>
            <a href="#" class="block w-full text-center mt-6 bg-[#05111e] text-white px-5 py-3 rounded text-base font-bold hover:bg-[#1a2634] transition-all shadow-md">Request a Bid</a>
        </div>
    </div>
</header>
