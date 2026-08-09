<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'apartment_number',
        'area',
        'city',
        'po_box',
        'age',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
