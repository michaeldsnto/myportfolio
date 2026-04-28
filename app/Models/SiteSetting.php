<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_title',
        'hero_title',
        'hero_subtitle',
        'hero_description',
        'about_title',
        'about_description',
        'contact_email',
        'contact_phone',
        'location',
        'profile_photo',
        'favicon',
        'logo',
    ];

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getProfilePhotoUrlAttribute(): string
    {
        if ($this->profile_photo) {
            return asset('storage/profile/' . $this->profile_photo);
        }

        return asset('images/default-profile.jpg');
    }

    public function getLogoUrlAttribute(): string
    {
        if ($this->logo) {
            return asset('storage/' . $this->logo);
        }

        return asset('images/default-logo.png');
    }
}