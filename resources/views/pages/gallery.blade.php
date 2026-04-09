@extends('layouts.app')
@section('title', __('app.gallery.title') . ' — ' . __('app.site_name'))
@section('content')
<div class="pt-24">
    <section class="py-20" style="background: linear-gradient(135deg, #faf7f4, #fdf9f7);">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <p class="section-subtitle">{{ __('app.gallery.title') }}</p>
                <h1 class="section-title mb-4">{{ __('app.gallery.subtitle') }}</h1>
                <p class="text-gray-500">{{ __('app.gallery.description') }}</p>
            </div>
            
            @if($galleries->count() > 0)
            <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
                @foreach($galleries as $item)
                <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300 group relative">
                    <img src="{{ Storage::disk('s3')->url($item->image) }}" alt="{{ $item->getCaption() ?? 'Gallery' }}" class="w-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    @if($item->getCaption())
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <p class="text-white text-sm font-medium">{{ $item->getCaption() }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach(range(1,8) as $i)
                <div class="rounded-2xl overflow-hidden shadow-sm aspect-square flex items-center justify-center" style="background: linear-gradient(135deg, {{ $i % 3 === 0 ? '#f4d4c8, #d4a5a5' : ($i % 3 === 1 ? '#e8c4b8, #f4d4c8' : '#e8d5c4, #e8c4b8') }});">
                    <span class="text-5xl opacity-50">✨</span>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
</div>
@endsection
