<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" x-data="{ open: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 50">
    <div :class="scrolled ? 'bg-white shadow-md py-3' : 'bg-transparent py-5'" class="transition-all duration-300">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <span class="font-serif text-xl font-bold" style="color: #3d2c2c;">Lady Salon</span>
                    <span class="font-serif text-xl" style="color: #c9a84c;">Sri Windany</span>
                </a>
                
                <!-- Desktop Nav -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="font-medium text-sm tracking-wide transition-colors duration-200 {{ request()->routeIs('home') ? '' : '' }}" style="{{ request()->routeIs('home') ? 'color: #c9a84c;' : 'color: #3d2c2c;' }}" onmouseover="this.style.color='#c9a84c'" onmouseout="this.style.color='{{ request()->routeIs('home') ? '#c9a84c' : '#3d2c2c' }}'">{{ __('app.nav.home') }}</a>
                    <a href="{{ route('about') }}" class="font-medium text-sm tracking-wide transition-colors duration-200" style="{{ request()->routeIs('about') ? 'color: #c9a84c;' : 'color: #3d2c2c;' }}" onmouseover="this.style.color='#c9a84c'" onmouseout="this.style.color='{{ request()->routeIs('about') ? '#c9a84c' : '#3d2c2c' }}'">{{ __('app.nav.about') }}</a>
                    <a href="{{ route('services') }}" class="font-medium text-sm tracking-wide transition-colors duration-200" style="{{ request()->routeIs('services') ? 'color: #c9a84c;' : 'color: #3d2c2c;' }}" onmouseover="this.style.color='#c9a84c'" onmouseout="this.style.color='{{ request()->routeIs('services') ? '#c9a84c' : '#3d2c2c' }}'">{{ __('app.nav.services') }}</a>
                    <a href="{{ route('gallery') }}" class="font-medium text-sm tracking-wide transition-colors duration-200" style="{{ request()->routeIs('gallery') ? 'color: #c9a84c;' : 'color: #3d2c2c;' }}" onmouseover="this.style.color='#c9a84c'" onmouseout="this.style.color='{{ request()->routeIs('gallery') ? '#c9a84c' : '#3d2c2c' }}'">{{ __('app.nav.gallery') }}</a>
                    <a href="{{ route('testimonials') }}" class="font-medium text-sm tracking-wide transition-colors duration-200" style="{{ request()->routeIs('testimonials') ? 'color: #c9a84c;' : 'color: #3d2c2c;' }}" onmouseover="this.style.color='#c9a84c'" onmouseout="this.style.color='{{ request()->routeIs('testimonials') ? '#c9a84c' : '#3d2c2c' }}'">{{ __('app.nav.testimonials') }}</a>
                    <a href="{{ route('contact') }}" class="font-medium text-sm tracking-wide transition-colors duration-200" style="{{ request()->routeIs('contact') ? 'color: #c9a84c;' : 'color: #3d2c2c;' }}" onmouseover="this.style.color='#c9a84c'" onmouseout="this.style.color='{{ request()->routeIs('contact') ? '#c9a84c' : '#3d2c2c' }}'">{{ __('app.nav.contact') }}</a>
                </div>
                
                <!-- Right Side -->
                <div class="hidden lg:flex items-center space-x-4">
                    <!-- Language Switcher -->
                    @php $currentLocale = app()->getLocale(); @endphp
                    <div class="flex items-center border rounded-full overflow-hidden text-xs font-semibold" style="border-color: #d4a5a5;">
                        <a href="{{ route('lang.switch', 'id') }}" class="px-3 py-1.5 transition-colors duration-200" style="{{ $currentLocale === 'id' ? 'background-color: #c9a84c; color: white;' : 'color: #3d2c2c;' }}">ID</a>
                        <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1.5 transition-colors duration-200" style="{{ $currentLocale === 'en' ? 'background-color: #c9a84c; color: white;' : 'color: #3d2c2c;' }}">EN</a>
                    </div>
                    <a href="{{ route('contact') }}" class="btn-primary text-sm py-2 px-6">{{ __('app.hero.cta') }}</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="lg:hidden p-2" style="color: #3d2c2c;">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div x-show="open" x-transition class="lg:hidden mt-4 pb-4 border-t" style="border-color: #f4d4c8;">
                <div class="flex flex-col space-y-3 mt-4">
                    <a href="{{ route('home') }}" class="font-medium transition-colors" style="color: #3d2c2c;">{{ __('app.nav.home') }}</a>
                    <a href="{{ route('about') }}" class="font-medium transition-colors" style="color: #3d2c2c;">{{ __('app.nav.about') }}</a>
                    <a href="{{ route('services') }}" class="font-medium transition-colors" style="color: #3d2c2c;">{{ __('app.nav.services') }}</a>
                    <a href="{{ route('gallery') }}" class="font-medium transition-colors" style="color: #3d2c2c;">{{ __('app.nav.gallery') }}</a>
                    <a href="{{ route('testimonials') }}" class="font-medium transition-colors" style="color: #3d2c2c;">{{ __('app.nav.testimonials') }}</a>
                    <a href="{{ route('contact') }}" class="font-medium transition-colors" style="color: #3d2c2c;">{{ __('app.nav.contact') }}</a>
                    <div class="flex items-center space-x-2 pt-2">
                        <a href="{{ route('lang.switch', 'id') }}" class="px-4 py-2 rounded-full text-sm font-semibold" style="{{ app()->getLocale() === 'id' ? 'background-color: #c9a84c; color: white;' : 'border: 1px solid #3d2c2c; color: #3d2c2c;' }}">ID</a>
                        <a href="{{ route('lang.switch', 'en') }}" class="px-4 py-2 rounded-full text-sm font-semibold" style="{{ app()->getLocale() === 'en' ? 'background-color: #c9a84c; color: white;' : 'border: 1px solid #3d2c2c; color: #3d2c2c;' }}">EN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
