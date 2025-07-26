<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{

    use SoftDeletes;

    protected $table = 'banners';
    protected $primaryKey = 'id';

    protected static function booted()
    {
        static::deleted(function (Banner $banner) {
            // Hapus file saat model dihapus
            if ($banner->foto) {
                Storage::disk('public')->delete($banner->foto);
            }
            Cache::forget('banner_data');
        });

        static::saved(function () {
            Cache::forget('banner_data');
        });
    }

     protected $fillable = [
        'judul',
        'status',
        'foto'
    ];

     protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
