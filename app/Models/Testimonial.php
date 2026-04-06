<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['name', 'review_id', 'review_en', 'photo', 'rating', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function getReview(): string
    {
        $locale = app()->getLocale();
        return $locale === 'en' ? ($this->review_en ?: $this->review_id) : ($this->review_id ?: $this->review_en);
    }
}
