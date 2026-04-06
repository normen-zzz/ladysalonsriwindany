@extends('layouts.app')
@section('title', __('app.site_name') . ' — ' . __('app.tagline'))
@section('content')

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center overflow-hidden" style="background: linear-gradient(135deg, #faf7f4 0%, #fdf9f7 50%, #f4d4c8 100%);">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-96 h-96 opacity-10 rounded-full blur-3xl" style="background-color: #c9a84c;"></div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 opacity-20 rounded-full blur-3xl" style="background-color: #d4a5a5;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] opacity-10 rounded-full blur-3xl" style="background-color: #e8c4b8;"></div>
    </div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center min-h-screen py-24">
            <div class="order-2 lg:order-1">
                <p class="section-subtitle mb-4">✦ {{ __('app.tagline') }}</p>
                <h1 class="section-title text-5xl md:text-6xl lg:text-7xl mb-6 leading-none">
                    {{ $heroText['title'] }}<br>
                    <span class="italic" style="color: #c9a84c;">{{ $heroText['title2'] }}</span>
                </h1>
                <p class="text-gray-600 text-lg leading-relaxed mb-10 max-w-lg">{{ $heroText['subtitle'] }}</p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}" class="btn-primary">
                        {{ __('app.hero.cta') }}
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="{{ route('services') }}" class="btn-secondary">{{ __('app.hero.cta_secondary') }}</a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-3 gap-6 mt-16 pt-8 border-t" style="border-color: #f4d4c8;">
                    <div class="text-center">
                        <div class="font-serif text-3xl font-bold" style="color: #3d2c2c;">{{ __('app.about.stat1_value') }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ __('app.about.stat1_label') }}</div>
                    </div>
                    <div class="text-center border-x" style="border-color: #f4d4c8;">
                        <div class="font-serif text-3xl font-bold" style="color: #3d2c2c;">{{ __('app.about.stat2_value') }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ __('app.about.stat2_label') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="font-serif text-3xl font-bold" style="color: #3d2c2c;">{{ __('app.about.stat3_value') }}</div>
                        <div class="text-xs text-gray-500 mt-1">{{ __('app.about.stat3_label') }}</div>
                    </div>
                </div>
            </div>
            
            <div class="order-1 lg:order-2 flex justify-center lg:justify-end">
                <div class="relative">
                    <div class="w-72 h-96 lg:w-96 lg:h-[520px] rounded-[3rem] overflow-hidden shadow-2xl flex items-center justify-center" style="background: linear-gradient(to bottom, #f4d4c8, #d4a5a5);">
                        <div class="text-center p-8">
                            <div class="text-8xl mb-4">💆‍♀️</div>
                            <div class="font-serif text-2xl font-bold" style="color: #3d2c2c;">Premium</div>
                            <div class="font-serif text-lg" style="color: #c9a84c;">Beauty Care</div>
                        </div>
                    </div>
                    <!-- Floating badge -->
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl shadow-xl p-4 border" style="border-color: #f4d4c8;">
                        <div class="flex items-center space-x-3">
                            <div class="flex -space-x-2">
                                <div class="w-8 h-8 rounded-full" style="background-color: #d4a5a5;"></div>
                                <div class="w-8 h-8 rounded-full" style="background-color: #c9a84c;"></div>
                                <div class="w-8 h-8 rounded-full" style="background-color: #f4d4c8;"></div>
                            </div>
                            <div>
                                <div class="text-xs font-bold" style="color: #3d2c2c;">5000+ Clients</div>
                                <div class="text-xs text-gray-400">★★★★★</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Preview -->
@if($services->count() > 0)
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <p class="section-subtitle">{{ __('app.services.title') }}</p>
            <h2 class="section-title mb-4">{{ __('app.services.subtitle') }}</h2>
            <p class="text-gray-500">{{ __('app.services.description') }}</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="card-luxury group">
                @if($service->image)
                <div class="h-48 overflow-hidden">
                    <img src="{{ Storage::url($service->image) }}" alt="{{ $service->getTitle() }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </div>
                @else
                <div class="h-48 flex items-center justify-center" style="background: linear-gradient(135deg, #f4d4c8, #e8c4b8);">
                    <span class="text-5xl">✨</span>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="font-serif text-lg font-semibold mb-2" style="color: #3d2c2c;">{{ $service->getTitle() }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ Str::limit($service->getDescription(), 100) }}</p>
                    @if($service->price)
                    <div class="flex items-center justify-between">
                        <span class="font-semibold" style="color: #c9a84c;">{{ __('app.services.price_from') }} Rp {{ number_format($service->price, 0, ',', '.') }}</span>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="btn-primary">{{ __('app.services.view_all') }}</a>
        </div>
    </div>
</section>
@else
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <p class="section-subtitle">{{ __('app.services.title') }}</p>
            <h2 class="section-title mb-4">{{ __('app.services.subtitle') }}</h2>
        </div>
        <!-- Default services when DB empty -->
        @php
        $defaultServices = [
            ['💆‍♀️', 'Hair Treatment', 'Perawatan rambut premium untuk rambut sehat berkilau.', 'Premium hair care for healthy, shiny hair.', 'Rp 150.000'],
            ['💅', 'Nail Art', 'Nail art eksklusif dengan desain terkini.', 'Exclusive nail art with the latest designs.', 'Rp 75.000'],
            ['🧖‍♀️', 'Facial Premium', 'Facial wajah untuk kulit glowing sempurna.', 'Facial treatment for perfectly glowing skin.', 'Rp 250.000'],
            ['✂️', 'Haircut & Style', 'Potong dan styling rambut oleh stylist berpengalaman.', 'Haircut and styling by experienced stylists.', 'Rp 85.000'],
            ['💆', 'Spa Treatment', 'Paket spa lengkap untuk relaksasi total.', 'Complete spa package for total relaxation.', 'Rp 300.000'],
            ['👁️', 'Eyelash Extension', 'Ekstensi bulu mata natural hingga dramatic.', 'Natural to dramatic eyelash extensions.', 'Rp 180.000'],
        ];
        @endphp
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($defaultServices as $svc)
            <div class="card-luxury group cursor-pointer">
                <div class="h-48 flex items-center justify-center transition-all duration-500" style="background: linear-gradient(135deg, #f4d4c8, #e8c4b8);">
                    <span class="text-6xl">{{ $svc[0] }}</span>
                </div>
                <div class="p-6">
                    <h3 class="font-serif text-lg font-semibold mb-2" style="color: #3d2c2c;">{{ $svc[1] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ app()->getLocale() === 'en' ? $svc[3] : $svc[2] }}</p>
                    <span class="font-semibold text-sm" style="color: #c9a84c;">{{ __('app.services.price_from') }} {{ $svc[4] }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('services') }}" class="btn-primary">{{ __('app.services.view_all') }}</a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials Preview -->
<section class="py-20" style="background-color: #faf7f4;">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <p class="section-subtitle">{{ __('app.testimonials.title') }}</p>
            <h2 class="section-title mb-4">{{ __('app.testimonials.subtitle') }}</h2>
        </div>
        @if($testimonials->count() > 0)
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($testimonials as $t)
            <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="mb-4" style="color: #c9a84c;">★★★★★</div>
                <p class="text-gray-600 italic leading-relaxed mb-6">"{{ $t->getReview() }}"</p>
                <div class="flex items-center space-x-3">
                    @if($t->photo)
                    <img src="{{ Storage::url($t->photo) }}" alt="{{ $t->name }}" class="w-10 h-10 rounded-full object-cover">
                    @else
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background: linear-gradient(135deg, #f4d4c8, #d4a5a5);">{{ substr($t->name, 0, 1) }}</div>
                    @endif
                    <div>
                        <div class="font-semibold text-sm" style="color: #3d2c2c;">{{ $t->name }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="grid md:grid-cols-3 gap-8">
            @foreach([['Sari W.', 'Pelayanannya luar biasa! Saya sangat puas dengan hasilnya. Tim yang ramah dan profesional.'],['Dewi A.', 'Tempat yang sangat nyaman dan mewah. Produk yang digunakan premium. Recommended banget!'],['Maya R.', 'Hair treatment di sini amazing! Rambut jadi lebih sehat dan berkilau. Pasti balik lagi!']] as $review)
            <div class="bg-white rounded-2xl p-8 shadow-sm">
                <div class="mb-4" style="color: #c9a84c;">★★★★★</div>
                <p class="text-gray-600 italic leading-relaxed mb-6">"{{ $review[1] }}"</p>
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm" style="background: linear-gradient(135deg, #f4d4c8, #d4a5a5);">{{ substr($review[0], 0, 1) }}</div>
                    <div class="font-semibold text-sm" style="color: #3d2c2c;">{{ $review[0] }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 text-white" style="background: linear-gradient(to right, #3d2c2c, #1f1515);">
    <div class="container mx-auto px-4 lg:px-8 text-center">
        <p class="section-subtitle" style="color: #c9a84c;">✦ Reservasi</p>
        <h2 class="font-serif text-4xl md:text-5xl mb-6">{{ app()->getLocale() === 'en' ? 'Ready for Your' : 'Siap Untuk' }}<br><span class="italic" style="color: #c9a84c;">{{ app()->getLocale() === 'en' ? 'Transformation?' : 'Transformasi Anda?' }}</span></h2>
        <p class="text-gray-300 mb-10 max-w-xl mx-auto">{{ app()->getLocale() === 'en' ? 'Book your appointment today and experience luxury beauty care.' : 'Buat janji sekarang dan rasakan pengalaman kecantikan yang mewah.' }}</p>
        <a href="{{ route('contact') }}" class="btn-primary text-base px-10 py-4">{{ __('app.hero.cta') }}</a>
    </div>
</section>
@endsection
