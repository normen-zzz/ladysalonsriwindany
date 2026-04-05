@extends('layouts.app')
@section('title', __('app.about.title') . ' — ' . __('app.site_name'))
@section('meta_description', __('app.about.description'))
@section('content')
<div class="pt-24">
    <!-- Hero -->
    <section class="py-20" style="background: linear-gradient(135deg, #faf7f4, #fdf9f7);">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-3xl">
                <p class="section-subtitle">{{ __('app.about.title') }}</p>
                <h1 class="section-title mb-6">{{ __('app.about.subtitle') }}</h1>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">{{ __('app.about.description') }}</p>
                <p class="text-gray-600 leading-relaxed">{{ __('app.about.description2') }}</p>
            </div>
        </div>
    </section>
    
    <!-- Stats -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="grid grid-cols-3 gap-8 text-center">
                <div class="p-8 rounded-2xl" style="background-color: #fdf9f7;">
                    <div class="font-serif text-5xl font-bold mb-2" style="color: #3d2c2c;">{{ __('app.about.stat1_value') }}</div>
                    <div class="text-gray-500">{{ __('app.about.stat1_label') }}</div>
                </div>
                <div class="p-8 rounded-2xl" style="background-color: #fdf9f7;">
                    <div class="font-serif text-5xl font-bold mb-2" style="color: #3d2c2c;">{{ __('app.about.stat2_value') }}</div>
                    <div class="text-gray-500">{{ __('app.about.stat2_label') }}</div>
                </div>
                <div class="p-8 rounded-2xl" style="background-color: #fdf9f7;">
                    <div class="font-serif text-5xl font-bold mb-2" style="color: #3d2c2c;">{{ __('app.about.stat3_value') }}</div>
                    <div class="text-gray-500">{{ __('app.about.stat3_label') }}</div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Why Choose Us -->
    <section class="py-20" style="background-color: #faf7f4;">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="section-title">{{ __('app.about.why_title') }}</h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach([['reason1','🌟'],['reason2','💎'],['reason3','🏛️'],['reason4','✨']] as [$key, $icon])
                <div class="text-center p-8 bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300">
                    <div class="text-5xl mb-4">{{ $icon }}</div>
                    <h3 class="font-serif text-lg font-semibold mb-3" style="color: #3d2c2c;">{{ __('app.about.'.$key.'_title') }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">{{ __('app.about.'.$key.'_desc') }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
