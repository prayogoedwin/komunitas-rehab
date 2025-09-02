<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Proyek extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll() // Log semua atribut
            ->logOnlyDirty() // Hanya log field yang berubah
            ->dontSubmitEmptyLogs() // Skip jika tidak ada perubahan
            ->setDescriptionForEvent(fn(string $eventName) => "Proyek {$eventName}");
    }

    protected $fillable = [
        'judul',
        'slug',
        'cover',
        'kategori_id',
        'from_date',
        'to_date',
        'jumlah_peserta',
        'deskripsi_singkat',
        'deskripsi',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::tags('proyek')->flush();
        });

        static::deleted(function ($model) {
            if ($model->cover) {
                Storage::disk('public')->delete($model->cover);
            }
            $model->deleted_by = Auth::user()->id;
            $model->save();
            Cache::tags('proyek')->flush();
        });
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriMaster::class);
    }
}
