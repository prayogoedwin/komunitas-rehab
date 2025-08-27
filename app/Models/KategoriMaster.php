<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class KategoriMaster extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll() // Log semua atribut
            ->logOnlyDirty() // Hanya log field yang berubah
            ->dontSubmitEmptyLogs() // Skip jika tidak ada perubahan
            ->setDescriptionForEvent(fn(string $eventName) => "Kategori Halaman {$eventName}");
    }

    protected $fillable = ['nama_kategori', 'jenis_kategori', 'created_by', 'updated_by', 'deleted_by'];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('kategori_halaman');
        });

        static::deleted(function () {
            Cache::forget('kategori_halaman');
        });
    }

    public function edukasi()
    {
        return $this->hasOne(Edukasi::class);
    }

    public function edukasis()
    {
        return $this->hasOne(Edukasi::class);
    }

    public function forum()
    {
        return $this->hasOne(Forum::class);
    }
}
