<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Forum extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll() // Log semua atribut
            ->logOnlyDirty() // Hanya log field yang berubah
            ->dontSubmitEmptyLogs() // Skip jika tidak ada perubahan
            ->setDescriptionForEvent(fn(string $eventName) => "Forum {$eventName}");
    }

    protected $fillable = [
        'judul',
        'slug',
        'kategori_id',
        'deskripsi',
        'created_by',
        'updated_by',
        'deleted_by',
        'verified_at',
        'verified_by',
        'sender_id',
        'viewers',
        'is_admin_sender'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriMaster::class);
    }

    public function adminSender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relasi ke tabel members
    public function memberSender()
    {
        return $this->belongsTo(Member::class, 'sender_id');
    }

    // Accessor untuk ambil nama pengirim
    public function getSenderNameAttribute()
    {
        if ($this->is_admin_sender) {
            return $this->adminSender ? $this->adminSender->name : 'Admin';
        }
        return $this->memberSender ? $this->memberSender->name : 'Member';
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
