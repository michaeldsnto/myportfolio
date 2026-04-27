<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'full_description',
        'proble_statement',
        'solution',
        'result',
        'tech_stack',
        'project_url',
        'github_url',
        'featured_image',
        'status',
        'is_featured',
        'views_count',
        'published_at',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'views_count' => 'integer',
        'published_at' => 'datetime',
        'sort_order' => 'integer',
    ];

    //Boot

    protected static function boot(){
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title') && empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    //Relationships

    public function images() {
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }

    //Query Scopes
    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', 'published')
            ->whereNotNull('published_at');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query
            ->where('is_featured', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query
            ->orderBy('sort_order')
            ->latest();
    }

    //Helpers

    public function incrementViews(): void
    {
        $this->increment('views_count');
    }

    public function hasGithub(): bool
    {
        return !empty($this->github_url);
    }

    public function hasLiveDemo(): bool
    {
        return !empty($this->project_url);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    //Accessor

    public function getFeaturedImageUrlAttribute(): string
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }

        return asset('images/default-project.jpg');
    }
}
