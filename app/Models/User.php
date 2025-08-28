<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // protected static function booted()
    // {
    //     static::creating(function ($user) {
    //         if ($user->password) {
    //             $user->password = Hash::make($user->password);
    //         }
    //     });

    //     static::updating(function ($user) {
    //         if ($user->isDirty('password')) {
    //             $user->password = Hash::make($user->password);
    //         }
    //     });
    // }

    public function forum()
    {
        return $this->hasMany(Forum::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
