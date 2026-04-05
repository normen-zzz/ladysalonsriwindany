<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image', 'caption_id', 'caption_en', 'is_active', 'sort_order'];

    protected $casts = ['is_active' => 'boolean'];

    public function getCaption(): ?string
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? ($this->caption_en ?: $this->caption_id) : ($this->caption_id ?: $this->caption_en);
    }
}
