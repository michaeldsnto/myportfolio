<?php

namespace App\Filament\Resources\SeoSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SeoSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('meta_title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),
                Textarea::make('meta_keywords')
                    ->columnSpanFull(),
                FileUpload::make('og_image')
                    ->image(),
                TextInput::make('twitter_card'),
                TextInput::make('canonical_url')
                    ->url(),
                Toggle::make('robots_index')
                    ->required(),
                Toggle::make('robots_follow')
                    ->required(),
                TextInput::make('google_analytics_id'),
                Textarea::make('google_search_console_code')
                    ->columnSpanFull(),
            ]);
    }
}
