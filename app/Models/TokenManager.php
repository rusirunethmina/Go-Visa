<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'access_token',
        'refresh_token',
        'expires_in'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
