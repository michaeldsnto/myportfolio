<?php

namespace App\Providers;

use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function (View $view): void {
            $siteSetting = once(fn () => Schema::hasTable('site_settings')
                ? SiteSetting::query()->first()
                : null);

            $seoSetting = once(fn () => Schema::hasTable('seo_settings')
                ? SeoSetting::query()->first()
                : null);

            $view->with('siteSetting', $siteSetting ?? new SiteSetting([
                'site_name' => 'My Portfolio',
                'site_title' => 'Laravel Developer Portfolio',
                'hero_title' => 'Building clean systems, not just websites.',
                'hero_subtitle' => 'Laravel Developer',
                'hero_description' => 'Portfolio focused on business-ready Laravel applications with clean architecture and maintainable delivery.',
                'about_title' => 'About Me',
                'contact_email' => 'hello@example.com',
                'contact_phone' => '-',
                'location' => 'Indonesia',
            ]));

            $view->with('seoSetting', $seoSetting ?? new SeoSetting([
                'meta_title' => null,
                'meta_description' => 'Professional portfolio showcasing Laravel projects, case studies, and contact information.',
                'twitter_card' => 'summary_large_image',
                'robots_index' => true,
                'robots_follow' => true,
            ]));
        });
    }
}
