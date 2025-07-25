<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class TipeProduk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tipe_produks';

    protected $fillable = [
        'nama',
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
            Cache::forget('tipe_produk_data');
        });

        static::deleted(function () {
            Cache::forget('tipe_produk_data');
        });
    }
}
