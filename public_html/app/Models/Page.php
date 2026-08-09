<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'content'];

    public function histories()
    {
        return $this->hasMany(PageHistory::class)->latest();
    }

    protected static function booted()
    {
        static::saved(function ($page) {
            if ($page->isDirty('content')) {
                $page->histories()->create([
                    'content' => $page->content,
                ]);
            }
        });
    }
}
