<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','service_id',
        'status','payment_status',
        'sessions_number','first_session_date',
        'payed_amount','area_id','type','reference_code'
    ];

    protected $casts = [
        'first_session_date'    =>'datetime',
        'session_number'        =>'integer',
        'payed_amount'          =>'integer',
    ];

    protected static function booted()
    {
        static::creating(function ($order) {
            if (empty($order->reference_code)) {
                $order->reference_code = 'ORD-' . strtoupper(uniqid());
            }
        });
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function scopeOnline(EloquentBuilder $builder)
    {
        return $builder->where('type','online');
    }

    public function scopeOffline(EloquentBuilder $builder)
    {
        return $builder->where('type','offline');
    }

 
}
