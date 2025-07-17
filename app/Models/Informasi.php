<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasis';
    protected $fillable = [
        'slug',
        'nama',
        'description',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
