<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price_after',
        'price_before',
        'discount_percentage',
        'badge_text',
        'is_featured',
        'image','slug'
    ];

    protected $casts = [
        'price_after'               => 'float',
        'price_before'              => 'float',
        'is_featured'               => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class , 'area_services');
    }

   public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
