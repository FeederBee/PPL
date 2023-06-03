<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'nama', 'harga', 'stok'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
