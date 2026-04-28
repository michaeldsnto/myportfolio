<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ResumeFile extends Model
{
    protected $fillable = [
        'title',
        'file_path',
        'version',
        'is_active',
        'uploaded_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'uploaded_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessor
    |--------------------------------------------------------------------------
    */

    public function getFileUrlAttribute(): string
    {
        return asset('storage/resume/' . $this->file_path);
    }

    /*
    |--------------------------------------------------------------------------
    | Helper
    |--------------------------------------------------------------------------
    */

    public function activate(): void
    {
        static::query()->update([
            'is_active' => false,
        ]);

        $this->update([
            'is_active' => true,
        ]);
    }
}