<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListTeman extends Model
{
    use HasFactory;
    protected $table = 'list_teman';

    protected $fillable = [
        'user_id','id_teman_user','status', 'nama', 'umur', 'jenis_kelamin', 'no_hp', 'image'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
