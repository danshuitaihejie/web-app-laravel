<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeiXinUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'wxopen_id', 'nickname', 'avatar','user_id'
    ];

    public function User(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
