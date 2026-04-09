<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        'name',
        'hero_title_id',
        'hero_title_en',
        'hero_title2_id',
        'hero_title2_en',
        'hero_subtitle_id',
        'hero_subtitle_en',
        'hero_image',
        'hero_badge_title_id',
        'hero_badge_title_en',
        'hero_badge_subtitle_id',
        'hero_badge_subtitle_en',
        'stat1_value',
        'stat1_label_id',
        'stat1_label_en',
        'stat2_value',
        'stat2_label_id',
        'stat2_label_en',
        'stat3_value',
        'stat3_label_id',
        'stat3_label_en',
        'services_title_id',
        'services_title_en',
        'services_subtitle_id',
        'services_subtitle_en',
        'services_description_id',
        'services_description_en',
        'services_empty_message_id',
        'services_empty_message_en',
        'testimonials_title_id',
        'testimonials_title_en',
        'testimonials_subtitle_id',
        'testimonials_subtitle_en',
        'testimonials_empty_message_id',
        'testimonials_empty_message_en',
        'cta_badge_id',
        'cta_badge_en',
        'cta_title_id',
        'cta_title_en',
        'cta_highlight_id',
        'cta_highlight_en',
        'cta_subtitle_id',
        'cta_subtitle_en',
        'cta_button_text_id',
        'cta_button_text_en',
    ];

    public function localized(string $idField, string $enField, ?string $default = null): ?string
    {
        $idValue = $this->{$idField};
        $enValue = $this->{$enField};

        return app()->getLocale() === 'en'
            ? ($enValue ?: $idValue ?: $default)
            : ($idValue ?: $enValue ?: $default);
    }
}
