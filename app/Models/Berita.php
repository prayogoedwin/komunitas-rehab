<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Berita extends Model
{
    protected $table = 'beritas';
    protected $fillable = [
        'cover',
        'judul',
        'deskripsi',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('beritas_data');
        });

        static::deleted(function () {
            Cache::forget('beritas_data');
        });
    }
}
