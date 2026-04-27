<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name'),
                TextInput::make('site_title'),
                TextInput::make('hero_title'),
                TextInput::make('hero_subtitle'),
                Textarea::make('hero_description')
                    ->columnSpanFull(),
                TextInput::make('about_title'),
                Textarea::make('about_description')
                    ->columnSpanFull(),
                TextInput::make('contact_email')
                    ->email(),
                TextInput::make('contact_phone')
                    ->tel(),
                TextInput::make('location'),
                TextInput::make('profile_photo'),
                TextInput::make('favicon'),
                TextInput::make('logo'),
            ]);
    }
}
