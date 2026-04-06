@extends('layouts.app')
@section('title', __('app.services.title') . ' — ' . __('app.site_name'))
@section('content')
<div class="pt-24">
    <section class="py-20" style="background: linear-gradient(135deg, #faf7f4, #fdf9f7);">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <p class="section-subtitle">{{ __('app.services.title') }}</p>
                <h1 class="section-title mb-4">{{ __('app.services.subtitle') }}</h1>
                <p class="text-gray-500">{{ __('app.services.description') }}</p>
            </div>
            
            @if($services->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="card-luxury group">
                    @if($service->image)
                    <div class="h-56 overflow-hidden">
                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->getTitle() }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    </div>
                    @else
                    <div class="h-56 flex items-center justify-center transition-opacity duration-300" style="background: linear-gradient(135deg, #f4d4c8, #e8c4b8);">
                        <span class="text-6xl">✨</span>
                    </div>
                    @endif
                    <div class="p-6">
                        <h3 class="font-serif text-xl font-semibold mb-3" style="color: #3d2c2c;">{{ $service->getTitle() }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $service->getDescription() }}</p>
                        <div class="flex items-center justify-between pt-4 border-t" style="border-color: #f4d4c8;">
                            @if($service->price)
                            <span class="font-bold" style="color: #3d2c2c;">Rp {{ number_format($service->price, 0, ',', '.') }}</span>
                            @else
                            <span class="text-gray-400 text-sm">{{ app()->getLocale() === 'en' ? 'Contact us' : 'Hubungi kami' }}</span>
                            @endif
                            <a href="{{ route('contact') }}" class="text-sm font-semibold transition-colors" style="color: #c9a84c;">{{ __('app.services.book') }} →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([['💆‍♀️','Hair Treatment','Perawatan Rambut','Perawatan rambut premium menggunakan produk terbaik untuk rambut sehat berkilau.','Hair Treatment','Premium hair care using the finest products for healthy, shiny hair.','150000'],['💅','Nail Art','Nail Art','Nail art eksklusif dengan desain terkini oleh nail artist profesional.','Nail Art','Exclusive nail art with the latest designs by professional nail artists.','75000'],['🧖‍♀️','Facial','Facial Premium','Facial wajah dengan teknologi terkini untuk kulit glowing sempurna.','Facial Premium','Facial treatment with the latest technology for perfectly glowing skin.','250000'],['✂️','Haircut','Haircut & Styling','Potong dan styling rambut oleh stylist berpengalaman.','Haircut & Styling','Haircut and styling by experienced stylists.','85000'],['💆','Spa','Spa Treatment','Paket spa lengkap untuk relaksasi total tubuh dan pikiran.','Spa Treatment','Complete spa package for total body and mind relaxation.','300000'],['👁️','Eyelash','Eyelash Extension','Ekstensi bulu mata natural hingga dramatic sesuai keinginan.','Eyelash Extension','Natural to dramatic eyelash extensions as desired.','180000']] as $svc)
                <div class="card-luxury group">
                    <div class="h-56 flex items-center justify-center transition-opacity duration-300" style="background: linear-gradient(135deg, #f4d4c8, #e8c4b8);">
                        <span class="text-6xl">{{ $svc[0] }}</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-serif text-xl font-semibold mb-3" style="color: #3d2c2c;">{{ app()->getLocale() === 'en' ? $svc[4] : $svc[2] }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ app()->getLocale() === 'en' ? $svc[5] : $svc[3] }}</p>
                        <div class="flex items-center justify-between pt-4 border-t" style="border-color: #f4d4c8;">
                            <span class="font-bold" style="color: #3d2c2c;">Rp {{ number_format((float)$svc[6], 0, ',', '.') }}</span>
                            <a href="{{ route('contact') }}" class="text-sm font-semibold transition-colors" style="color: #c9a84c;">{{ __('app.services.book') }} →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
</div>
@endsection
