<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'link',
        'is_active',
        'is_permanent',
        'expires_at',
        'sort_order',
    ];

    protected $casts = [
        'is_active'    => 'boolean',
        'is_permanent' => 'boolean',
        'expires_at'   => 'datetime',
        'sort_order'   => 'integer',
    ];

    /**
     * Currently live announcements: active, and either permanent or not yet expired.
     */
    public function scopeLive(Builder $query): Builder
    {
        return $query->where('is_active', true)
            ->where(function (Builder $q) {
                $q->where('is_permanent', true)
                    ->orWhereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            })
            ->orderBy('sort_order', 'asc')
            ->latest();
    }

    /**
     * Whether this announcement has expired (non-permanent and past its expiry date).
     */
    public function getIsExpiredAttribute(): bool
    {
        return !$this->is_permanent && $this->expires_at !== null && $this->expires_at->isPast();
    }
}
