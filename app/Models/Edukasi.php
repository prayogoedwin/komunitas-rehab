<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Edukasi extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll() // Log semua atribut
            ->logOnlyDirty() // Hanya log field yang berubah
            ->dontSubmitEmptyLogs() // Skip jika tidak ada perubahan
            ->setDescriptionForEvent(fn(string $eventName) => "Edukasi {$eventName}");
    }

    protected $fillable = [
        'judul',
        'slug',
        'kategori_id',
        'cover',
        'deskripsi_singkat',
        'deskripsi',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('edukasi');
        });

        static::deleted(function ($model) {
            if ($model->cover) {
                Storage::disk('public')->delete($model->cover);
            }
            Cache::forget('edukasi');
        });
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriMaster::class);
    }
}
