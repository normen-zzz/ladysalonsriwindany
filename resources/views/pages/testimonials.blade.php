@extends('layouts.app')
@section('title', __('app.testimonials.title') . ' — ' . __('app.site_name'))
@section('content')
<div class="pt-24">
    <section class="py-20" style="background: linear-gradient(135deg, #faf7f4, #fdf9f7);">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <p class="section-subtitle">{{ __('app.testimonials.title') }}</p>
                <h1 class="section-title mb-4">{{ __('app.testimonials.subtitle') }}</h1>
                <p class="text-gray-500">{{ __('app.testimonials.description') }}</p>
            </div>
            
            @if($testimonials->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($testimonials as $t)
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="text-xl mb-4" style="color: #c9a84c;">
                        @for($i=0; $i < $t->rating; $i++)★@endfor
                    </div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">"{{ $t->getReview() }}"</p>
                    <div class="flex items-center space-x-3 pt-4 border-t" style="border-color: #f4d4c8;">
                        @if($t->photo)
                        <img src="{{ Storage::url($t->photo) }}" alt="{{ $t->name }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold" style="background: linear-gradient(135deg, #f4d4c8, #d4a5a5);">{{ substr($t->name, 0, 1) }}</div>
                        @endif
                        <div>
                            <div class="font-semibold" style="color: #3d2c2c;">{{ $t->name }}</div>
                            <div class="text-xs text-gray-400">Verified Client</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([['Sari W.','Pelayanannya luar biasa! Saya sangat puas dengan hasilnya.',5],['Dewi A.','Tempat yang sangat nyaman dan mewah. Produk yang digunakan premium. Recommended!',5],['Maya R.','Hair treatment di sini amazing! Rambut jadi lebih sehat dan berkilau.',5],['Rina K.','Staff yang sangat professional dan ramah. Suka banget!',5],['Putri N.','Harga sepadan dengan kualitas. Salon terbaik yang pernah saya kunjungi.',5],['Citra D.','Ambiance yang mewah, pelayanan bintang 5. Highly recommended!',5]] as $r)
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="text-xl mb-4" style="color: #c9a84c;">{{ str_repeat('★', $r[2]) }}</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">"{{ $r[1] }}"</p>
                    <div class="flex items-center space-x-3 pt-4 border-t" style="border-color: #f4d4c8;">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-white font-bold" style="background: linear-gradient(135deg, #f4d4c8, #d4a5a5);">{{ substr($r[0], 0, 1) }}</div>
                        <div>
                            <div class="font-semibold" style="color: #3d2c2c;">{{ $r[0] }}</div>
                            <div class="text-xs text-gray-400">Verified Client</div>
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
