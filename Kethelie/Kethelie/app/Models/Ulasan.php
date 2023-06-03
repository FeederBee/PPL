<?php

namespace App\Models;
use App\Models\User;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ulasan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'id_pengulas', 'id_product', 'nama_produk', 'nama_pengulas', 'ulasan'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_pengulas');
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'id_product');
    }
}
