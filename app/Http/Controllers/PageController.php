<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\HomeContent;
use App\Models\Setting;

class PageController extends Controller
{
    public function home()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->take(6)->get();
        $testimonials = Testimonial::where('is_active', true)->take(3)->get();
        $homeContent = HomeContent::query()->latest('id')->first();

        $heroText = [
            'title' => $homeContent?->localized('hero_title_id', 'hero_title_en', Setting::get('hero_title_' . app()->getLocale(), __('app.hero.title'))),
            'title2' => $homeContent?->localized('hero_title2_id', 'hero_title2_en', Setting::get('hero_title2_' . app()->getLocale(), __('app.hero.title2'))),
            'subtitle' => $homeContent?->localized('hero_subtitle_id', 'hero_subtitle_en', Setting::get('hero_subtitle_' . app()->getLocale(), __('app.hero.subtitle'))),
            'badge_title' => $homeContent?->localized('hero_badge_title_id', 'hero_badge_title_en', '5000+ Clients'),
            'badge_subtitle' => $homeContent?->localized('hero_badge_subtitle_id', 'hero_badge_subtitle_en', '★★★★★'),
        ];

        $stats = [
            [
                'value' => $homeContent?->stat1_value ?: __('app.about.stat1_value'),
                'label' => $homeContent?->localized('stat1_label_id', 'stat1_label_en', __('app.about.stat1_label')),
            ],
            [
                'value' => $homeContent?->stat2_value ?: __('app.about.stat2_value'),
                'label' => $homeContent?->localized('stat2_label_id', 'stat2_label_en', __('app.about.stat2_label')),
            ],
            [
                'value' => $homeContent?->stat3_value ?: __('app.about.stat3_value'),
                'label' => $homeContent?->localized('stat3_label_id', 'stat3_label_en', __('app.about.stat3_label')),
            ],
        ];

        $servicesSection = [
            'title' => $homeContent?->localized('services_title_id', 'services_title_en', __('app.services.title')),
            'subtitle' => $homeContent?->localized('services_subtitle_id', 'services_subtitle_en', __('app.services.subtitle')),
            'description' => $homeContent?->localized('services_description_id', 'services_description_en', __('app.services.description')),
            'empty_message' => $homeContent?->localized('services_empty_message_id', 'services_empty_message_en', __('app.services.description')),
        ];

        $testimonialsSection = [
            'title' => $homeContent?->localized('testimonials_title_id', 'testimonials_title_en', __('app.testimonials.title')),
            'subtitle' => $homeContent?->localized('testimonials_subtitle_id', 'testimonials_subtitle_en', __('app.testimonials.subtitle')),
            'empty_message' => $homeContent?->localized('testimonials_empty_message_id', 'testimonials_empty_message_en', __('app.testimonials.subtitle')),
        ];

        $cta = [
            'badge' => $homeContent?->localized('cta_badge_id', 'cta_badge_en', '✦ Reservasi'),
            'title' => $homeContent?->localized('cta_title_id', 'cta_title_en', app()->getLocale() === 'en' ? 'Ready for Your' : 'Siap Untuk'),
            'highlight' => $homeContent?->localized('cta_highlight_id', 'cta_highlight_en', app()->getLocale() === 'en' ? 'Transformation?' : 'Transformasi Anda?'),
            'subtitle' => $homeContent?->localized('cta_subtitle_id', 'cta_subtitle_en', app()->getLocale() === 'en' ? 'Book your appointment today and experience luxury beauty care.' : 'Buat janji sekarang dan rasakan pengalaman kecantikan yang mewah.'),
            'button' => $homeContent?->localized('cta_button_text_id', 'cta_button_text_en', __('app.hero.cta')),
        ];

        return view('pages.home', compact('services', 'testimonials', 'heroText', 'stats', 'servicesSection', 'testimonialsSection', 'cta', 'homeContent'));
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
