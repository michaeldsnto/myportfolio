<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Experience extends Model
{
    protected $fillable = [
        'title',
        'company_name',
        'employment_type',
        'location',
        'description',
        'start_date',
        'end_date',
        'is_current',
        'sort_order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_current' => 'boolean',
        'sort_order' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeOrdered(Builder $query): Builder
    {
        return $query
            ->orderBy('sort_order')
            ->orderByDesc('start_date');
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getDurationAttribute(): string
    {
        $start = $this->start_date?->format('Y');
        $end = $this->is_current
            ? 'Present'
            : $this->end_date?->format('Y');

        return "{$start} - {$end}";
    }
}