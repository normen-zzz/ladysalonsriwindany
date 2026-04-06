<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Setting;

class PageController extends Controller
{
    public function home()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->take(6)->get();
        $testimonials = Testimonial::where('is_active', true)->take(3)->get();
        $heroText = [
            'title' => Setting::get('hero_title_' . app()->getLocale(), __('app.hero.title')),
            'title2' => Setting::get('hero_title2_' . app()->getLocale(), __('app.hero.title2')),
            'subtitle' => Setting::get('hero_subtitle_' . app()->getLocale(), __('app.hero.subtitle')),
        ];
        return view('pages.home', compact('services', 'testimonials', 'heroText'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('pages.services', compact('services'));
    }

    public function gallery()
    {
        $galleries = Gallery::where('is_active', true)->orderBy('sort_order')->get();
        return view('pages.gallery', compact('galleries'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where('is_active', true)->get();
        return view('pages.testimonials', compact('testimonials'));
    }

    public function contact()
    {
        $phone = Setting::get('phone', '6281234567890');
        $address = Setting::get('address', 'Jl. Contoh No. 1, Kota');
        $maps_embed = Setting::get('maps_embed', '');
        return view('pages.contact', compact('phone', 'address', 'maps_embed'));
    }
}
