<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_renders_successfully(): void
    {
        SiteSetting::query()->create([
            'site_name' => 'Michael Portfolio',
            'site_title' => 'Michael Developer Portfolio',
            'hero_title' => 'Building systems that scale.',
            'hero_subtitle' => 'Laravel Engineer',
            'hero_description' => 'Production-ready Laravel applications for serious business use.',
            'contact_email' => 'hello@example.com',
            'contact_phone' => '+62 812 0000 0000',
            'location' => 'Makassar, Indonesia',
        ]);

        Project::query()->create([
            'title' => 'Inventory Platform',
            'slug' => 'inventory-platform',
            'short_description' => 'Stock and reporting platform for growing operations.',
            'full_description' => 'Detailed case study content.',
            'status' => 'published',
            'is_featured' => true,
            'published_at' => now(),
        ]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Inventory Platform');
        $response->assertSee('Michael Developer Portfolio', false);
    }

    public function test_project_detail_page_is_accessible_and_counts_unique_view(): void
    {
        $project = Project::query()->create([
            'title' => 'CRM Suite',
            'slug' => 'crm-suite',
            'short_description' => 'Customer workflow management system.',
            'full_description' => 'Detailed CRM case study.',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $this->get(route('projects.show', $project->slug))->assertOk();
        $this->get(route('projects.show', $project->slug))->assertOk();

        $this->assertSame(1, $project->fresh()->views_count);
    }
}
