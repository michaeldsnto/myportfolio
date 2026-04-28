<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'twitter_card',
        'canonical_url',
        'robots_index',
        'robots_follow',
        'google_analytics_id',
        'google_search_console_code',
    ];

    protected $casts = [
        'robots_index' => 'boolean',
        'robots_follow' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessor
    |--------------------------------------------------------------------------
    */

    public function getOgImageUrlAttribute(): string
    {
        if ($this->og_image) {
            return asset('storage/' . $this->og_image);
        }

        return asset('images/default-og.jpg');
    }
}