<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;

class ProdukStokVarian extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'produk_stok_varians';

    protected $fillable = [
        'produk_id',
        'varian',
        'ukuran',
        'stok'
    ];

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
