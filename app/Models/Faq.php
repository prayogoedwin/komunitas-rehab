<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Faq extends Model
{
    protected $table = 'faqs';
    protected $fillable = [
        'nama',
        'description',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('faqs_data');
        });

        static::deleted(function () {
            Cache::forget('faqs_data');
        });
    }
}
