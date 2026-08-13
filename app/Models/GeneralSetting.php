<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $fillable = [
        'key','value',
    ];

    public static function getValue($key)
    {
        return self::where('key',$key)->first()->value;
    }
}
