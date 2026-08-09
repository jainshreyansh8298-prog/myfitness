<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name','description','image','slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'area_services');
    }

       public function orders()
    {
        return $this->hasMany(Order::class);
    }
    
}
