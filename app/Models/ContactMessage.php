<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ContactMessage extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'ip_address',
        'is_read',
        'replied_at',
    ];

    protected $casts = [
        'is_read' => 'boolean',
        'replied_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Query Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('is_read', false);
    }

    public function scopeRead(Builder $query): Builder
    {
        return $query->where('is_read', true);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function markAsRead(): void
    {
        $this->update([
            'is_read' => true,
        ]);
    }

    public function markAsReplied(): void
    {
        $this->update([
            'replied_at' => now(),
            'is_read' => true,
        ]);
    }

    public function isReplied(): bool
    {
        return !is_null($this->replied_at);
    }
}