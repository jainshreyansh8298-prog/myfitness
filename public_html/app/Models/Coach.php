<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'photo',
        'bio',
        'instagram',
        'facebook',
        'linkedin',
        'whatsapp',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active'  => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Public URL for the coach photo, with a graceful fallback avatar.
     */
    public function getPhotoUrlAttribute(): string
    {
        if ($this->photo) {
            // Already a full/absolute URL?
            if (str_starts_with($this->photo, 'http') || str_starts_with($this->photo, '/storage/')) {
                return $this->photo;
            }
            return Storage::url($this->photo);
        }

        return 'https://ui-avatars.com/api/?background=dfff00&color=0b0d14&name=' . urlencode($this->name);
    }
}
