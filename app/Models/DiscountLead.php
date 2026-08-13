<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountLead extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'discount_code',
        'is_used',
    ];

    protected $casts = [
        'is_used' => 'boolean',
    ];
}
