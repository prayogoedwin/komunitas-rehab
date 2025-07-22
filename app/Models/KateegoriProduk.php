<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KateegoriProduk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kateegori_produks';

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
            Cache::forget('kategori_produk_data');
        });

        static::deleted(function () {
            Cache::forget('kategori_produk_data');
        });
    }
}
