@extends('layouts.app')

@section('content')

<!-- Hero Slider Section -->
<div x-data="{ 
        currentSlide: 0,
        slides: [
            {
                image: 'https://images.unsplash.com/photo-1541888086225-f6404f456106?q=80&w=2000&auto=format&fit=crop',
                title: 'Building the Future Skyline',
                subtitle: 'Engineering permanence with every pour.'
            },
            {
                image: 'https://images.unsplash.com/photo-1504307651254-35680f356f58?q=80&w=2000&auto=format&fit=crop',
                title: 'Structural Sophistication',
                subtitle: 'Where precision meets architectural ambition.'
            },
            {
                image: 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=2000&auto=format&fit=crop',
                title: 'Industrial Excellence',
                subtitle: 'Large-scale infrastructure built to outlast.'
            }
        ],
        next() { this.currentSlide = (this.currentSlide + 1) % this.slides.length },
        prev() { this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length },
        init() { setInterval(() => this.next(), 6000) }
    }" 
    class="relative h-[85vh] min-h-[600px] w-full bg-[#05111e] overflow-hidden group">
    
    <!-- Slides -->
    <template x-for="(slide, index) in slides" :key="index">
        <div 
            x-show="currentSlide === index"
            x-transition:enter="transition ease-out duration-1000 transform"
            x-transition:enter-start="opacity-0 scale-105"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-1000 transform absolute top-0"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute inset-0 w-full h-full"
        >
            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-[#05111e]/90 to-[#05111e]/40 z-10"></div>
            <!-- Image -->
            <img :src="slide.image" class="w-full h-full object-cover" alt="Hero Background">
            
            <!-- Content -->
            <div class="absolute inset-0 z-20 flex items-center justify-start max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl text-white">
                    <span class="text-[#ae3100] font-bold tracking-widest uppercase text-sm mb-4 block" x-text="'Project 0' + (index + 1)"></span>
                    <h1 class="text-5xl md:text-7xl font-display font-extrabold leading-tight mb-6" x-text="slide.title"></h1>
                    <p class="text-xl md:text-2xl text-[#bbc7da] font-inter mb-10 min-h-[4rem]" x-text="slide.subtitle"></p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#" class="bg-[#ae3100] hover:bg-[#852400] text-white px-8 py-4 rounded font-bold transition-colors uppercase tracking-wide text-sm">Explore Our Work</a>
                        <a href="#" class="border border-white/30 hover:border-white bg-white/5 backdrop-blur-sm text-white px-8 py-4 rounded font-bold transition-all uppercase tracking-wide text-sm">Consult With Us</a>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <!-- Controls -->
    <div class="absolute bottom-8 right-8 z-30 flex space-x-2">
        <button @click="prev" class="bg-black/50 hover:bg-[#ae3100] text-white p-4 rounded backdrop-blur transition-colors opacity-0 group-hover:opacity-100">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
        </button>
        <button @click="next" class="bg-black/50 hover:bg-[#ae3100] text-white p-4 rounded backdrop-blur transition-colors opacity-0 group-hover:opacity-100">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
        </button>
    </div>

    <!-- Indicators -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-30 flex space-x-3">
        <template x-for="(slide, index) in slides" :key="index">
            <button @click="currentSlide = index" :class="currentSlide === index ? 'w-8 bg-[#ae3100]' : 'w-2 bg-white/50'" class="h-2 rounded-full transition-all duration-300"></button>
        </template>
    </div>
</div>

<!-- Stats / Trust Section -->
<div class="bg-white py-16 border-b border-gray-100 relative -mt-4 z-40 rounded-t-xl mx-4 sm:mx-8 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-gray-100">
            <div class="px-6 text-center">
                <p class="text-4xl md:text-5xl font-display font-bold text-[#05111e] mb-2">25<span class="text-[#ae3100]">+</span></p>
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest">Years Experience</p>
            </div>
            <div class="px-6 text-center">
                <p class="text-4xl md:text-5xl font-display font-bold text-[#05111e] mb-2">120<span class="text-[#ae3100]">+</span></p>
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest">Major Projects</p>
            </div>
            <div class="px-6 text-center">
                <p class="text-4xl md:text-5xl font-display font-bold text-[#05111e] mb-2">3M<span class="text-[#ae3100]">+</span></p>
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest">Sq Ft Poured</p>
            </div>
            <div class="px-6 text-center">
                <p class="text-4xl md:text-5xl font-display font-bold text-[#05111e] mb-2">100<span class="text-[#ae3100]">%</span></p>
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-widest">Safety Compliance</p>
            </div>
        </div>
    </div>
</div>

<!-- Services / Expertise Section -->
<section class="py-24 bg-[#f3f4f6]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-[#ae3100] font-bold tracking-widest uppercase text-sm mb-4">Our Expertise</h2>
            <h3 class="text-4xl md:text-5xl font-display font-extrabold text-[#05111e] mb-6">The Science of Solid Grounds</h3>
            <p class="text-lg text-gray-600 font-inter">We utilize high-density polymer reinforcement and laser-leveled pouring techniques to ensure that every cubic meter exceeds structural requirements.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white p-10 rounded-lg border border-gray-100 hover:shadow-xl transition-shadow group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white to-[#f3f4f6] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#05111e] text-white flex items-center justify-center rounded mb-8 shadow-md">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    </div>
                    <h4 class="text-2xl font-bold font-display text-[#05111e] mb-4 group-hover:text-[#ae3100] transition-colors">Commercial Towers</h4>
                    <p class="text-gray-600 mb-6 font-inter leading-relaxed">High-rise structural foundations and reinforced cohesive superstructures engineered for metropolitan skylines.</p>
                    <a href="#" class="text-[#05111e] font-bold uppercase text-sm flex items-center hover:text-[#ae3100] transition-colors">Learn More <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg></a>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-white p-10 rounded-lg border border-gray-100 hover:shadow-xl transition-shadow group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white to-[#f3f4f6] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#05111e] text-white flex items-center justify-center rounded mb-8 shadow-md">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h4 class="text-2xl font-bold font-display text-[#05111e] mb-4 group-hover:text-[#ae3100] transition-colors">Infrastructure</h4>
                    <p class="text-gray-600 mb-6 font-inter leading-relaxed">Heavy-duty bridges, roadways, and civil engineering projects requiring exact tolerances and immense load-bearing capabilities.</p>
                    <a href="#" class="text-[#05111e] font-bold uppercase text-sm flex items-center hover:text-[#ae3100] transition-colors">Learn More <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg></a>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="bg-white p-10 rounded-lg border border-gray-100 hover:shadow-xl transition-shadow group relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-white to-[#f3f4f6] opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#05111e] text-white flex items-center justify-center rounded mb-8 shadow-md">
                        <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                    </div>
                    <h4 class="text-2xl font-bold font-display text-[#05111e] mb-4 group-hover:text-[#ae3100] transition-colors">Advanced Materials</h4>
                    <p class="text-gray-600 mb-6 font-inter leading-relaxed">Laser precision leveling and custom aggregate mixes tailored for site-specific curing protocols ensuring max durability.</p>
                    <a href="#" class="text-[#05111e] font-bold uppercase text-sm flex items-center hover:text-[#ae3100] transition-colors">Learn More <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16">
            <div class="max-w-2xl text-left">
                <h2 class="text-[#ae3100] font-bold tracking-widest uppercase text-sm mb-4">Our Portfolio</h2>
                <h3 class="text-4xl md:text-5xl font-display font-extrabold text-[#05111e]">Architectural Milestones</h3>
            </div>
            <a href="#" class="hidden md:flex items-center text-[#ae3100] font-bold uppercase text-sm hover:text-[#05111e] transition-colors mt-6 md:mt-0 group">
                View All Projects 
                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Project 1 -->
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-lg mb-6 shadow-md">
                    <div class="absolute inset-0 bg-[#05111e]/20 group-hover:bg-transparent transition-colors z-10 transition-duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1541888086225-f6404f456106?q=80&w=800&auto=format&fit=crop" alt="Skyline Plaza" class="w-full h-80 object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute bottom-4 left-4 z-20">
                        <span class="bg-white text-[#05111e] px-3 py-1 rounded-sm text-xs font-bold tracking-wider uppercase shadow">Commercial</span>
                    </div>
                </div>
                <h4 class="text-2xl font-bold font-display text-[#05111e] mb-2 group-hover:text-[#ae3100] transition-colors">Skyline Plaza</h4>
                <p class="text-gray-500 font-inter text-sm flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    Downtown Metro District, 2024
                </p>
            </div>

            <!-- Project 2 -->
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-lg mb-6 shadow-md">
                    <div class="absolute inset-0 bg-[#05111e]/20 group-hover:bg-transparent transition-colors z-10 transition-duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1504307651254-35680f356f58?q=80&w=800&auto=format&fit=crop" alt="Urban Bridge" class="w-full h-80 object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute bottom-4 left-4 z-20">
                        <span class="bg-white text-[#05111e] px-3 py-1 rounded-sm text-xs font-bold tracking-wider uppercase shadow">Infrastructure</span>
                    </div>
                </div>
                <h4 class="text-2xl font-bold font-display text-[#05111e] mb-2 group-hover:text-[#ae3100] transition-colors">Westbank Suspension Bridge</h4>
                <p class="text-gray-500 font-inter text-sm flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    River Valley, 2023
                </p>
            </div>

            <!-- Project 3 -->
            <div class="group cursor-pointer">
                <div class="relative overflow-hidden rounded-lg mb-6 shadow-md">
                    <div class="absolute inset-0 bg-[#05111e]/20 group-hover:bg-transparent transition-colors z-10 transition-duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=800&auto=format&fit=crop" alt="Residential Heights" class="w-full h-80 object-cover transform group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute bottom-4 left-4 z-20">
                        <span class="bg-white text-[#05111e] px-3 py-1 rounded-sm text-xs font-bold tracking-wider uppercase shadow">Industrial</span>
                    </div>
                </div>
                <h4 class="text-2xl font-bold font-display text-[#05111e] mb-2 group-hover:text-[#ae3100] transition-colors">Apex Manufacturing Hub</h4>
                <p class="text-gray-500 font-inter text-sm flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    Industrial Sector B, 2025
                </p>
            </div>
            
            <div class="md:hidden mt-6 text-center">
               <a href="#" class="inline-flex items-center justify-center bg-[#05111e] text-white px-8 py-4 rounded font-bold uppercase tracking-wide text-sm w-full">View All Projects</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-[#05111e] z-0"></div>
    <div class="absolute inset-0 opacity-20 bg-[url('https://images.unsplash.com/photo-1541888086225-f6404f456106?q=80&w=2000&auto=format&fit=crop')] bg-cover bg-center mix-blend-overlay z-0"></div>
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="text-4xl md:text-6xl font-display font-extrabold text-white mb-6">Ready to Break Ground?</h2>
        <p class="text-xl text-[#bbc7da] font-inter mb-10 max-w-2xl mx-auto">Consult with our senior engineering team to receive a blueprint-accurate quote for your next major development.</p>
        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
            <a href="#" class="bg-[#ae3100] hover:bg-[#852400] text-white px-10 py-5 rounded font-bold transition-colors uppercase tracking-wide shadow-lg w-full sm:w-auto">Get a Quote</a>
            <a href="#" class="text-white hover:text-[#ae3100] font-bold uppercase tracking-wide transition-colors flex items-center">
                Contact Sales
                <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
            </a>
        </div>
    </div>
</section>

@endsection
