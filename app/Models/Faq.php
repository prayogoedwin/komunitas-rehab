<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';
    protected $fillable = [
        'nama',
        'description',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
