<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    protected $fillable = [
        'slug_ind',
        'slug_eng',
        'title_ind',
        'title_eng',
        'publish_date',
        'content_ind',
        'content_eng',
        'category',
        'image',
        'is_active',
    ];

    protected $casts = [
        'publish_date' => 'date',
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'slug',
        'title',
        'content',
        'publish_date_formatted',
    ];

    public function getSlugAttribute(): string
    {
        // Get current locale from config
        $locale = config('app.locale');

        return $locale === 'id' ? ($this->slug_ind ?: '') : ($this->slug_eng ?: '');
    }

    public function getTitleAttribute(): string
    {
        // Get current locale from config
        $locale = config('app.locale');

        return $locale === 'id' ? ($this->title_ind ?: '') : ($this->title_eng ?: '');
    }

    public function getContentAttribute(): string
    {
        // Get current locale from config
        $locale = config('app.locale');

        return $locale === 'id' ? ($this->content_ind ?: '') : ($this->content_eng ?: '');
    }

    public function getPublishDateFormattedAttribute(): string
    {
        // Check if publish_date exists
        if (!$this->publish_date) {
            return '';
        }

        // Get current locale from config
        $locale = config('app.locale');

        if ($locale === 'id') {
            return $this->publish_date->translatedFormat('j F Y');
        }

        return $this->publish_date->format('j F Y');
    }
}
